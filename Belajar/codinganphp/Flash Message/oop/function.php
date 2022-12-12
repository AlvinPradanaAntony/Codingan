<?php
require ('koneksi.php');
require ('query.php');
$obj = new crud;

session_start();

if (isset($_POST['login'])) {
	$email = $_POST['txt_email'];
	$pass = $_POST['txt_pass'];

	if (!empty(trim($email)) && !empty(trim($pass))) {
		$query = $obj->login($email);
		$num = $query->rowCount();
		
		while ($row = $query->fetch(PDO::FETCH_ASSOC)){
			$id = $row['id'];
			$userVal =  $row['user_email'];
			$passVal = $row['user_password'];
			$userName = $row['user_fullname'];
			$level = $row['level'];
		}

		if ($num != 0) {
			if ($userVal == $email && $passVal == $pass) {
				$_SESSION['id'] = $id;
				$_SESSION['name'] = $userName;
				$_SESSION['level'] = $level;
				header('Location: home.php?user_fullname=' . urlencode($userName));
			} else {
				$_SESSION['statusErrorPass'] = "User dan Pass Salah";
        header('Location: login.php');
			}
		} else {
			$_SESSION['statusNotFound'] = "User tidak ditemukan";
      header('Location: login.php');
		}
	} else {
		$_SESSION['statusEmpty'] = "User tidak boleh kosong";
    header('Location: login.php');
	}
}

// Daftar
if(isset($_POST['register'])){
	$email = $_POST['txt_email'];
	$pass = $_POST['txt_pass'];
	$name =$_POST['txt_nama'];
	if($obj->insertData($email, $pass, $name)){
			$_SESSION['statusSignUp'] = "Daftar Berhasil";
			header('Location: login.php');
	} else{
			echo "Pendaftaran Gagal";
			header('Location: register.php');
	}
}

// Fungsi
function statusSignUp(){
	?>
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Hey !</strong> <?= $_SESSION['statusSignUp']; ?>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	<?php
		unset($_SESSION['statusSignUp']);
	}
function statusErrorPass(){
	?>
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Hey !</strong> <?= $_SESSION['statusErrorPass']; ?>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	<?php
		unset($_SESSION['statusErrorPass']);
	} 
function statusNotFound(){
	?>
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Hey !</strong> <?= $_SESSION['statusNotFound']; ?>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	<?php
		unset($_SESSION['statusNotFound']);
	} 
function statusEmpty(){
	?>
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Hey !</strong> <?= $_SESSION['statusEmpty']; ?>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	<?php
		unset($_SESSION['statusEmpty']);
	}
?>