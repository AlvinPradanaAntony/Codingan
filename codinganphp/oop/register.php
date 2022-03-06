<?php
require ('koneksi.php');
require ('query.php');
$obj = new crud;
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['txt_email'];
    $pass = $_POST['txt_pass'];
    $name =$_POST['txt_nama'];
    if($obj->insertData($email, $pass, $name)){
        echo '<div class="alert alert-success"></div>';
    } else{
        echo '<div class="alert alert-success"></div>';
    }
}
?>
<html>
<head>
    <title>Register Page </title>
</head>
<body>
    <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
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