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

W
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
	<div class="info-data" data-infodata="<?php if(isset($_SESSION['info'])){ echo $_SESSION['info']; } unset($_SESSION['info']); ?>"></div>
	<div class="d-flex justify-content-center align-items-center h-100">
		<div class="border d-block p-4" style="width: 280px; height: 300px;">
			<form action="function.php" method="POST">
				<div class="mb-3">
					<label for="inputEmail" class="form-label"><b>Email</b></label>
					<input type="email" class="form-control" id="inputEmail" name="txt_email" placeholder="Masukan Email Anda !">
				</div>
				<div class="mb-3">
					<label for="inputPassword" class="form-label"><b>Password</b></label>
					<input type="password" class="form-control" id="inputPassword" name="txt_pass" placeholder="Masukan Password !">
					<p><a href="recoveryPass.php">Lupa kata sandi ?</p>
				</div>
				<button type="submit" class="btn btn-success" name="login">Login</button>
			</form>
			<p><a href="register.php">Register</p>
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