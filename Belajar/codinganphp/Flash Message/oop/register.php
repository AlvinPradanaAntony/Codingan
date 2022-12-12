<?php
session_start();

?>
<html>
<head>
    <title>Register Page </title>
</head>
<body>
    <form action="function.php" method="POST">
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