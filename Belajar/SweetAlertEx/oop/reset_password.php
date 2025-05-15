<?php
require('function.php');

$token = $_GET['token'] ?? ''; // Get token from URL

$user = null;
if (!empty($token)) {
	$query = $obj->getUserByResetToken($token);
	$user = $query->fetch(PDO::FETCH_ASSOC);

	if (!$user) {
		$_SESSION['info'] = 'invalidOrExpiredToken'; // Token tidak valid atau kedaluwarsa
		header('Location: recoveryPass.php');
		exit();
	}
} else {
	$_SESSION['info'] = 'noTokenProvided'; // Tidak ada token yang diberikan
	header('Location: recoveryPass.php');
	exit();
}

// Handle password reset form submission
if (isset($_POST['reset_password'])) {
	$newPassword = $_POST['txt_new_pass'];
	$confirmPassword = $_POST['txt_confirm_pass'];

	if ($newPassword === $confirmPassword) {
		if ($obj->updatePassword($token, $newPassword)) {
			$_SESSION['info'] = 'passwordResetSuccess'; // Kata sandi berhasil direset
			header('Location: login.php');
			exit();
		} else {
			$_SESSION['info'] = 'passwordResetFailed'; // Gagal mereset kata sandi
			header('Location: reset_password.php?token=' . $token);
			exit();
		}
	} else {
		$_SESSION['info'] = 'passwordMismatch'; // Kata sandi tidak cocok
		header('Location: reset_password.php?token=' . $token);
		exit();
	}
}

?>
<html>

<head>
	<title>Reset Kata Sandi</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.3/dist/sweetalert2.min.css" integrity="sha256-7FY/kD9x8sdXwruZy+8tjKt05pkuxyF52nbrSazsNg8=" crossorigin="anonymous">
</head>

<body>
	<?php
	if (isset($_SESSION['msg'])) {
		echo $_SESSION['msg'];
		unset($_SESSION['msg']);
	}
	?>
	<div class="info-data" data-infodata="<?php if (isset($_SESSION['info'])) {
																					echo $_SESSION['info'];
																				}
																				unset($_SESSION['info']); ?>"></div>
	<div class="d-flex justify-content-center align-items-center h-100">
		<div class="border d-block p-4" style="width: 320px; height: auto;">
			<h2>Reset Kata Sandi</h2>
			<form action="reset_password.php?token=<?php echo htmlspecialchars($token); ?>" method="POST">
				<div class="mb-3">
					<label for="inputNewPassword" class="form-label"><b>Kata Sandi Baru</b></label>
					<input type="password" class="form-control" id="inputNewPassword" name="txt_new_pass" placeholder="Masukan Kata Sandi Baru !" required>
				</div>
				<div class="mb-3">
					<label for="inputConfirmPassword" class="form-label"><b>Konfirmasi Kata Sandi Baru</b></label>
					<input type="password" class="form-control" id="inputConfirmPassword" name="txt_confirm_pass" placeholder="Konfirmasi Kata Sandi Baru !" required>
				</div>
				<button type="submit" class="btn btn-success" name="reset_password">Reset Kata Sandi</button>
			</form>
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

</html>