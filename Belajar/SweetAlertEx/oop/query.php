<?php
class crud extends koneksi
{
    public $id;
    public $user_email;
    public $user_password;
    public $user_fullname;

    public function lihatData()
    {
        $sql = "SELECT * FROM user_detail";
        $result = $this->koneksi->prepare($sql);
        $result->execute();
        return $result;
    }

    public function insertData($email, $pass, $name)
    {
        try {
            $sql = "INSERT INTO user_detail(user_email, user_password, user_fullname, level) Values (:email, :pass, :name, 2)";
            $result = $this->koneksi->prepare($sql);
            $result->bindParam(":email", $email);
            $result->bindParam(":pass", $pass);
            $result->bindParam(":name", $name);
            $result->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function detailData($data)
    {
        try {
            $sql = "SELECT * FROM user_detail WHERE id=:id";
            $result = $this->koneksi->prepare($sql);
            $result->bindParam(":id", $data);
            $result->execute();
            $result->bindColumn(1, $this->id);
            $result->bindColumn(2, $this->user_email);
            $result->bindColumn(3, $this->user_password);
            $result->bindColumn(4, $this->user_fullname);
            $result->fetch(PDO::FETCH_ASSOC);
            if ($result->rowCount() == 1):
                return true;
            else:
                return false;
            endif;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function validasi($data)
    {
        try {
            $sql = "SELECT * FROM user_detail WHERE user_email=:email";
            $result = $this->koneksi->prepare($sql);
            $result->bindParam(":email", $data);
            $result->execute();
            $result->bindColumn(1, $this->id);
            $result->bindColumn(2, $this->user_email);
            $result->bindColumn(3, $this->user_password);
            $result->bindColumn(4, $this->user_fullname);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function login($data)
    {
        try {
            $sql = "SELECT * FROM user_detail WHERE user_email=:user_email";
            $result = $this->koneksi->prepare($sql);
            $result->bindParam(":user_email", $data);
            $result->execute();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function ValidasiEmail($data)
    {
        try {
            $sql = "SELECT * FROM user_detail WHERE user_email=:user_email";
            $result = $this->koneksi->prepare($sql);
            $result->bindParam(":user_email", $data);
            $result->execute();

            if ($result->rowCount() > 0) {
                // Email sudah digunakan
                $_SESSION['info'] = 'EmailHasBeenTaken';
                header('Location: register.php');
                exit(); // Menghentikan eksekusi script setelah redirect
            }

            return $result; // Return result untuk diperiksa
        } catch (PDOException $e) {
            // Tangani error dengan lebih baik
            $_SESSION['info'] = 'error';
            header('Location: register.php');
            exit();
        }
    }

    public function updateData($email, $pass, $name, $data)
    {
        try {
            $sql = "UPDATE user_detail SET user_email=:email, user_password=:pass, user_fullname=:name WHERE id=:id";
            $result = $this->koneksi->prepare($sql);
            $result->bindParam(":email", $email);
            $result->bindParam(":pass", $pass);
            $result->bindParam(":name", $name);
            $result->bindParam(":id", $data);
            $result->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function delete($data)
    {
        try {
            $sql = "DELETE FROM user_detail WHERE id=:id";
            $result = $this->koneksi->prepare($sql);
            $result->execute(array("id" => $data));
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function savePasswordResetToken($email, $token, $expires)
    {
        try {
            error_log("Saving reset token for email: " . $email . ", token: " . $token . ", expires: " . $expires);

            // First, verify if the email exists
            $checkEmail = "SELECT user_email FROM user_detail WHERE user_email=:email";
            $checkStmt = $this->koneksi->prepare($checkEmail);
            $checkStmt->bindParam(":email", $email);
            $checkStmt->execute();

            if ($checkStmt->rowCount() == 0) {
                error_log("Cannot save token: Email not found: " . $email);
                return false;
            }

            // Update with the new token
            $sql = "UPDATE user_detail SET reset_token=:token, reset_expires=:expires WHERE user_email=:email";
            $result = $this->koneksi->prepare($sql);
            $result->bindParam(":token", $token);
            $result->bindParam(":expires", $expires);
            $result->bindParam(":email", $email);
            $result->execute();

            if ($result->rowCount() > 0) {
                error_log("Token saved successfully. Rows affected: " . $result->rowCount());

                // Double-check that token was saved correctly
                $verifyToken = "SELECT reset_token, reset_expires FROM user_detail WHERE user_email=:email";
                $verifyStmt = $this->koneksi->prepare($verifyToken);
                $verifyStmt->bindParam(":email", $email);
                $verifyStmt->execute();

                if ($row = $verifyStmt->fetch(PDO::FETCH_ASSOC)) {
                    error_log("Verification - Saved token: " . $row['reset_token'] . ", Expires: " . $row['reset_expires']);

                    // Verify token matches what we just tried to save
                    if ($row['reset_token'] === $token) {
                        return true;
                    } else {
                        error_log("Token verification failed! Saved token doesn't match the generated one.");
                        return false;
                    }
                }
            } else {
                error_log("No rows affected when saving token. Email may not exist: " . $email);
            }

            return true;
        } catch (PDOException $e) {
            error_log("Error saving reset token: " . $e->getMessage());
            echo $e->getMessage();
            return false;
        }
    }
    public function getUserByResetToken($token)
    {
        try {
            error_log("Attempting to get user by token: " . $token);
            // First, get the current server datetime
            $now = date("Y-m-d H:i:s");
            error_log("Current server time: " . $now);

            // Check for a valid, non-expired token
            $sql = "SELECT * FROM user_detail WHERE reset_token=:token";
            $result = $this->koneksi->prepare($sql);
            $result->bindParam(":token", $token);
            $result->execute();

            // Debug: Log the full user record if found
            if ($result->rowCount() > 0) {
                $user = $result->fetch(PDO::FETCH_ASSOC);
                error_log("User found with token: " . print_r($user, true));
                error_log("Token expiry time: " . $user['reset_expires']);

                // Compare the expiry time with the current time
                if (isset($user['reset_expires']) && strtotime($user['reset_expires']) > strtotime($now)) {
                    error_log("Token is valid and not expired");
                    // Reset the result pointer to beginning
                    $result->execute();
                    return $result;
                } else {
                    error_log("Token is expired. Expiry: " . $user['reset_expires'] . ", Now: " . $now);
                    // Reset token is expired
                    return new PDOStatement(); // Return empty result set
                }
            } else {
                error_log("No user found with token: " . $token);
                return $result; // Will be empty
            }
        } catch (PDOException $e) {
            error_log("Error getting user by token: " . $e->getMessage());
            echo $e->getMessage();
            return new PDOStatement(); // Return empty result set on error
        }
    }

    public function updatePassword($token, $newPassword)
    {
        try {
            // Update password and clear the reset token fields
            $sql = "UPDATE user_detail SET user_password=:newPassword, reset_token=NULL, reset_expires=NULL WHERE reset_token=:token";
            $result = $this->koneksi->prepare($sql);
            $result->bindParam(":newPassword", $newPassword);
            $result->bindParam(":token", $token);
            $result->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
