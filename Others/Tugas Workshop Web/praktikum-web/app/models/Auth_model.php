<?php

class Auth_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function loginFunction($data)
    {
        $username = htmlspecialchars($data['username']);
        $password = htmlspecialchars($data['password']);
        $this->db->query('SELECT * FROM user WHERE username=:username');
        $this->db->bindValue('username', $username);
        $result = $this->db->single();
        if (password_verify($password, $result['password'])) {
            if ($data['remember'] == 'on') {
                setcookie('username', $data['username'], time() + 3600, 'http://localhost/praktikum-web/public/');
                setcookie('password', $data['password'], time() + 3600, 'http://localhost/praktikum-web/public/');
            }
            return $result;
        } else {
            return 0;
        }
    }

    public function getUser($data)
    {
        $username = htmlspecialchars($data['username']);
        $this->db->query('SELECT * FROM user WHERE username=:username');
        $this->db->bindValue('username', $username);
        $this->db->execute();
        return $this->db->rowCount();
    }

    // store new user / register
    public function registerAccount($data)
    {
        // var_dump($data);
        $username = strip_tags($data['username']);
        $password = htmlspecialchars($data['password']);
        if ($password == '' || $username == '') {
            return 0;
        } else {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $this->db->query("INSERT INTO user VALUES('', :username, :password, :role_id)");
            $this->db->bindValue('username', $username);
            $this->db->bindValue('password', $password);
            $this->db->bindValue('role_id', 2);
            $this->db->execute();
            return $this->db->rowCount();
        }
    }
}
