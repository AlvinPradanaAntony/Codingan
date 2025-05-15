<?php
require('koneksi.php');
require('query.php');
$obj = new crud;

session_start();

if (isset($_POST['login'])) {
	$email = $_POST['txt_email'];
	$pass = $_POST['txt_pass'];

	if (!empty(trim($email)) && !empty(trim($pass))) {
		$query = $obj->login($email);
		$num = $query->rowCount();

		while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
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
				// header('Location: home.php?user_fullname=' . urlencode($userName));
				$_SESSION['info'] = 'statusLogin';
				header('Location: home.php');
			} else {
				// Alert
				// $_SESSION['statusErrorPass'] = "User dan Pass Salah";
				// header('Location: login.php');

				// Sweetalert2
				$_SESSION['info'] = 'statusErrorPass';
				header('Location: login.php');
			}
		} else {
			// Alert
			// $_SESSION['statusNotFound'] = "User tidak ditemukan";
			// header('Location: login.php');

			// Sweetalert2
			$_SESSION['info'] = 'statusNotFound';
			header('Location: login.php');
		}
	} else {
		// Alert
		// $_SESSION['statusEmpty'] = "User tidak boleh kosong";
		// header('Location: login.php');

		// Sweetalert2
		$_SESSION['info'] = 'statusEmpty';
		header('Location: login.php');
	}
}

// Daftar
if (isset($_POST['register'])) {
	$email = $_POST['txt_email'];
	$pass = $_POST['txt_pass'];
	$name = $_POST['txt_nama'];
	if (!$obj->ValidasiEmail($email)) {
		if ($obj->insertData($email, $pass, $name)) {
			// Alert
			// $_SESSION['statusSignUp'] = "Daftar Berhasil";
			// header('Location: login.php');

			// Sweetalert2
			$_SESSION['info'] = 'statusSignUp';
			header('Location: login.php');
		} else {
			// Alert
			// echo "Pendaftaran Gagal";
			// header('Location: register.php');

			// Sweetalert2
			$_SESSION['info'] = 'error';
			header('Location: register.php');
		}
	}
}

// Permintaan Pemulihan Kata Sandi
if (isset($_POST['request_password_reset'])) {
	$email = $_POST['txt_email'];

	if (!empty(trim($email))) {
		// Cek apakah email ada di database
		$query = $obj->login($email); // Reusing login method to check email existence
		$num = $query->rowCount();

		if ($num > 0) {
			// Email ditemukan, generate token
			$token = bin2hex(random_bytes(32));
			$expires = date("Y-m-d H:i:s", strtotime('+1 hour')); // Token berlaku 1 jam

			// Simpan token dan waktu kedaluwarsa di database
			// Anda perlu menambahkan kolom 'reset_token' dan 'reset_expires' di tabel pengguna Anda
			// dan membuat method di class crud untuk menyimpan ini.
			// Contoh: $obj->savePasswordResetToken($email, $token, $expires);

			// Simpan token dan waktu kedaluwarsa di database
			$obj->savePasswordResetToken($email, $token, $expires);

			// TODO: Kirim email ke pengguna dengan link reset
			// Ganti 'http://yourwebsite.com' dengan URL dasar aplikasi Anda
			$baseUrl = "http://localhost/Belajar/SweetAlertEx/oop"; // Ganti dengan URL aplikasi Anda
			$resetLink = $baseUrl . "/reset_password.php?token=" . $token;

			// Implementasikan pengiriman email di sini. Contoh menggunakan fungsi mail() (membutuhkan konfigurasi server):
			// $subject = "Permintaan Reset Kata Sandi";
			// $message = "Klik tautan berikut untuk mereset kata sandi Anda: " . $resetLink;
			// $headers = "From: no-reply@yourwebsite.com"; // Ganti dengan alamat email Anda
			// mail($email, $subject, $message, $headers);

			// Untuk tujuan demonstrasi, kita bisa menampilkan link atau menyimpannya di session/log
			// echo "Link Reset Kata Sandi: " . $resetLink; // Debugging
			$_SESSION['reset_link_debug'] = $resetLink; // Simpan di session untuk ditampilkan di recoveryPass.php

			// Set session flag untuk menampilkan SweetAlert di recoveryPass.php
			$_SESSION['show_reset_link_alert'] = true;
			$_SESSION['info'] = 'passwordResetLinkReady'; // Pesan info baru

			header('Location: recoveryPass.php'); // Tetap redirect ke recoveryPass.php
			exit();
		} else {
			// Email tidak ditemukan
			$_SESSION['info'] = 'emailNotFound'; // Pesan error
			header('Location: recoveryPass.php');
			exit();
		}
	} else {
		// Email kosong
		$_SESSION['info'] = 'emailEmpty'; // Pesan error
		header('Location: recoveryPass.php');
		exit();
	}
}

// Fungsi
function statusSignUp()
{
?>
	<div class="alert alert-success alert-dismissible fade show" role="alert">
		<strong>Hey !</strong> <?= $_SESSION['statusSignUp']; ?>
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
<?php
	unset($_SESSION['statusSignUp']);
}
function statusErrorPass()
{
?>
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<strong>Hey !</strong> <?= $_SESSION['statusErrorPass']; ?>
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
<?php
	unset($_SESSION['statusErrorPass']);
}
function statusNotFound()
{
?>
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<strong>Hey !</strong> <?= $_SESSION['statusNotFound']; ?>
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
<?php
	unset($_SESSION['statusNotFound']);
}
function statusEmpty()
{
?>
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<strong>Hey !</strong> <?= $_SESSION['statusEmpty']; ?>
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
<?php
	unset($_SESSION['statusEmpty']);
}
?>