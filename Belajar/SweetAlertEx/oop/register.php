<?php
session_start();

?>
<html>
<head>
    <title>Register Page </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.3/dist/sweetalert2.min.css" integrity="sha256-7FY/kD9x8sdXwruZy+8tjKt05pkuxyF52nbrSazsNg8=" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="info-data" data-infodata="<?php if(isset($_SESSION['info'])){ echo $_SESSION['info']; } unset($_SESSION['info']); ?>"></div>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
	</script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.3/dist/sweetalert2.all.min.js" integrity="sha256-+InBGKGbhOQiyCbWrARmIEICqZ8UvYJr/qVhHmlmFpc=" crossorigin="anonymous"></script>
	<script src="jquery/jquery-3.6.0.min.js"></script>
	<script src="custom_SweetAlert2.js"></script>
</body>
</html>