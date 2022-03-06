<?php
require ('koneksi.php');
require ('query.php');
$obj = new crud;

session_start();
if(!$obj->detailData($_GET['id'])) die ("Error: Id tidak ada");
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['txt_email'];
    $pass = $_POST['txt_pass'];
    $name =$_POST['txt_nama'];
    if($obj->updateData($email, $pass, $name, $obj->id)){
        // Alert
        // $_SESSION['statusEdit'] = "Edit Berhasil";
        // header('Location: home.php');

        // Sweetalert2
		$_SESSION['info'] = 'statusSignUp';
		header('Location: home.php');
    } else {
        // Alert
        // $_SESSION['statusEdit'] = "Edit Berhasil";
        // header('Location: home.php');

        // Sweetalert2
		$_SESSION['info'] = 'error';
		header('Location: home.php');
    }
}
?>
<html>
<head>
    <title>Edit Page</title>
</head>
<body>
    <form action="<?php $_SERVER['REQUEST_URI']?>" method="POST">
        <p><input type="hidden" name="txt_id" value="<?php echo $id; ?>"></p>
        <p>Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
            <input type="text" name="txt_email" value="<?php echo $obj->user_email ?>" readonly>
        </p>
        <p>Password: 
            <input type="password" name="txt_pass" value="<?php echo $obj->user_password ?>">
        </p>   
        <p>Nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
            <input type="text" name="txt_nama" value="<?php echo $obj->user_fullname ?>">
        </p>
        <button type="submit" name="update">Update</button>
    </form>
    <p><a href="home.php">Kembali</p>
</body>
</html>

