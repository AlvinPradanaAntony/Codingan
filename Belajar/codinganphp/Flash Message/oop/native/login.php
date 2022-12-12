<?php
require('koneksi.php');

session_start();

if (isset($_POST['submit'])) {
	$email = $_POST['txt_email'];
	$pass = $_POST['txt_pass'];

	if (!empty(trim($email)) && !empty(trim($pass))) {
		$query = "SELECT * FROM user_detail WHERE user_email = '$email'";
		$result = mysqli_query($koneksi, $query);
		$num = mysqli_num_rows($result);

		while ($row = mysqli_fetch_array($result)) {
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
				$error = 'user atau password salah !!';
				header('Location: login.php');
				echo $error;
			}
		} else {
			$error = 'user tidak ditemukan !!';
			header('Location: login.php');
			echo $error;
		}
	} else {
		$error = 'Data tidak boleh kosong !!';
		echo $error;
	}
}
?>
<html>

<head>
	<title>Login Page </title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
	<?php
	if (isset($_SESSION['statusDaftar'])) {
	?>
	<div class="alert alert-success alert-dismissible fade show" role="alert">
		<strong>Hey !</strong> <?= $_SESSION['statusDaftar']; ?>
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
	<?php
		unset($_SESSION['statusDaftar']);
	}
	?>

	<div class="d-flex justify-content-center align-items-center h-100">
		<div class="border d-block p-4" style="width: 280px; height: 300px;">
			<form action=login.php method="POST">
				<div class="mb-3">
					<label for="inputEmail" class="form-label"><b>Email</b></label>
					<input type="email" class="form-control" id="inputEmail" name="txt_email" placeholder="Masukan Email Anda !">
				</div>
				<div class="mb-3">
					<label for="inputPassword" class="form-label"><b>Password</b></label>
					<input type="password" class="form-control" id="inputPassword" name="txt_pass"
						placeholder="Masukan Password !">
				</div>
				<button type="submit" class="btn btn-success" name="submit">Login</button>
			</form>
			<p><a href="register.php">Register</p>
		</div>
	</div>


	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
	</script>
	<script src="jquery/jquery-3.6.0.min.js"></script>
	<script>
		$(document).ready(function () {
			window.setTimeout(function () {
				$(".alert").fadeTo(500, 0).slideUp(500, function () {
					$(this).remove();
				});
			}, 3500);
		});
	</script>
</body>

</html>