<?php
require ('koneksi.php');

session_start();

if(isset($_POST['register'])){
    $userMail = $_POST['txt_email'];
    $userPass = $_POST['txt_pass'];
    $userName =$_POST['txt_nama'];

    $query = "INSERT INTO user_detail VALUES ('', '$userMail', '$userPass', '$userName', 2)";
    $result = mysqli_query($koneksi, $query);
    
    if($result){
        $_SESSION['statusDaftar'] = "Daftar Berhasil";
        header('Location: login.php');
    } else {
        echo "Pendaftaran Gagal";
    }

}
?>
<html>
<head>
    <title>Register Page </title>
</head>
<body>
    <form action="register.php" method="POST">
        <p>Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
            <input type="text" name="txt_email" required>
        </p>
        <p>Password: 
            <input type="password" name="txt_pass" required>
        </p>
        <p>Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
            <input type="text" name="txt_nama" required>
        </p>    
        <button type="submit" name="register">Register</button>
    </form>
    <p><a href="login.php">Login</p>
</body>
</html>