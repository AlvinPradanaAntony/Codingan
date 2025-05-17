<?php
require ('function.php');
?>
<html>
<head>
	<title>Login Page </title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.3/dist/sweetalert2.min.css" integrity="sha256-7FY/kD9x8sdXwruZy+8tjKt05pkuxyF52nbrSazsNg8=" crossorigin="anonymous">
</head>

<body>
	<?php
	if (isset($_SESSION['msg'])) {
		echo $_SESSION['msg'];
		unset($_SESSION['msg']);
	}

	// print "<pre>";
	// print_r($_SESSION);
	// print "</pre>";
	// if (isset($_SESSION['statusSignUp'])) {
	// 	statusSignUp();
	// }
	// if (isset($_SESSION['statusErrorPass'])) {
	// 	statusErrorPass();
	// }
	// if (isset($_SESSION['statusNotFound'])) {
	// 	statusNotFound();
	// }
	// if (isset($_SESSION['statusEmpty'])) {
	// 	statusEmpty();
	// }
	?>
	<div class="info-data" data-infodata="<?php if(isset($_SESSION['info']) && $_SESSION['info'] !== 'passwordResetLinkReady'){ echo $_SESSION['info']; } unset($_SESSION['info']); ?>"></div>

	<div class="d-flex justify-content-center align-items-center h-100">
		<div class="border d-block p-4" style="width: 280px; height: 300px;">
			<form action="function.php" method="POST">
				<div class="mb-3">
					<label for="inputEmail" class="form-label"><b>Email</b></label>
					<input type="email" class="form-control" id="inputEmail" name="txt_email" placeholder="Masukan Email Anda !" required>
				</div>
				<button type="submit" class="btn btn-success" name="request_password_reset">Kirim Link Reset</button>
			</form>
			<p><a href="login.php">Kembali ke Login</p>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
	</script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.3/dist/sweetalert2.all.min.js" integrity="sha256-+InBGKGbhOQiyCbWrARmIEICqZ8UvYJr/qVhHmlmFpc=" crossorigin="anonymous"></script>
	<script src="jquery/jquery-3.6.0.min.js"></script>
	<script src="custom_SweetAlert2.js"></script>
	<script>
		$(document).ready(function() {
			window.setTimeout(function() {
				$(".alert").fadeTo(500, 0).slideUp(500, function() {
					$(this).remove();
				});
			}, 3500);
		});
	</script>
</body>
<?php
	// Tampilkan SweetAlert dengan link reset jika tersedia di session
	if (isset($_SESSION['show_reset_link_alert']) && $_SESSION['show_reset_link_alert'] === true && isset($_SESSION['reset_link_debug'])) {
		$resetLink = $_SESSION['reset_link_debug'];
		echo "
		<script>
			Swal.fire({
				title: 'Link Reset Kata Sandi',
				html: 'Untuk tujuan demonstrasi, berikut adalah tautan reset Anda:<br><a href=\"{$resetLink}\"><small>{$resetLink}</small></a><br>Di implementasi sebenarnya, tautan ini akan dikirim melalui email.',
				icon: 'info',
				confirmButtonText: 'OK'
			});
		</script>";
		// Bersihkan session setelah menampilkan alert
		unset($_SESSION['show_reset_link_alert']);
		unset($_SESSION['reset_link_debug']);
		// Pastikan info session juga dihapus jika hanya digunakan untuk reset link
		if(isset($_SESSION['info']) && $_SESSION['info'] === 'passwordResetLinkReady') {
			unset($_SESSION['info']);
		}
	}
	?>
</html>