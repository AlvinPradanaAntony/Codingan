<?php
require('function.php');
if (isset($_SESSION['id'])) {
	header('Location: home.php');
	exit();
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Masuk - Sistem Manajemen Pengguna</title>
	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<!-- SweetAlert2 CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.3/dist/sweetalert2.min.css"
		integrity="sha256-7FY/kD9x8sdXwruZy+8tjKt05pkuxyF52nbrSazsNg8=" crossorigin="anonymous">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
	<style>
		body {
			background-color: #f8f9fa;
			height: 100vh;
			display: flex;
			align-items: center;
			padding-top: 40px;
			padding-bottom: 40px;
		}

		.form-login {
			max-width: 380px;
			width: 100%;
			margin: 0 auto;
		}

		.login-container {
			background-color: white;
			border-radius: 10px;
			box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
			padding: 30px;
		}

		.login-title {
			color: #dc3545;
			margin-bottom: 25px;
			text-align: center;
			font-weight: 600;
		}

		.form-floating {
			margin-bottom: 15px;
		}

		.btn-login {
			background-color: #dc3545;
			border-color: #dc3545;
			font-weight: 500;
		}

		.btn-login:hover {
			background-color: #c82333;
			border-color: #bd2130;
		}

		.login-footer {
			text-align: center;
			margin-top: 20px;
		}

		.forgot-password {
			display: block;
			text-align: right;
			margin-bottom: 20px;
			font-size: 0.9rem;
			color: #6c757d;
		}

		.forgot-password:hover {
			color: #dc3545;
		}

		.register-link,
		.home-link {
			color: #dc3545;
			text-decoration: none;
		}

		.register-link:hover,
		.home-link:hover {
			text-decoration: underline;
			color: #c82333;
		}

		.login-logo {
			text-align: center;
			margin-bottom: 25px;
		}

		.login-logo i {
			font-size: 48px;
			color: #dc3545;
		}

		.input-group-text {
			cursor: pointer;
			background-color: white;
		}
	</style>
</head>

<body>
	<div class="container">
		<!-- Pesan status dan info -->
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

		<div class="form-login">
			<div class="login-container">
				<div class="login-logo">
					<i class="fas fa-user-lock"></i>
				</div>
				<h2 class="login-title">Masuk ke Akun Anda</h2>

				<form action="function.php" method="POST">
					<div class="form-floating mb-3">
						<input type="email" class="form-control" id="inputEmail" name="txt_email"
							placeholder="nama@contoh.com" required>
						<label for="inputEmail">Alamat Email</label>
					</div>
					<div class="form-floating mb-2">
						<input type="password" class="form-control" id="inputPassword" name="txt_pass"
							placeholder="Kata Sandi" required>
						<label for="inputPassword">Kata Sandi</label>
						<div class="position-absolute" style="right: 15px; top: 15px; cursor: pointer;" id="togglePassword">
							<i class="fas fa-eye text-muted"></i>
						</div>
					</div>

					<a href="recoveryPass.php" class="forgot-password">Lupa kata sandi?</a>
					<div class="d-grid gap-2">
						<button type="submit" class="btn btn-lg btn-login text-white" name="login">
							<i class="fas fa-sign-in-alt me-2"></i>Masuk
						</button>
					</div>
				</form>
			</div>

			<div class="login-footer">
				<p class="mt-3">Belum memiliki akun? <a href="register.php" class="register-link">Daftar disini</a></p>
			</div>
		</div>
	</div>
	<!-- Bootstrap JS Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
	</script>
	<!-- jQuery -->
	<script src="jquery/jquery-3.6.0.min.js"></script>
	<!-- SweetAlert2 JS -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.3/dist/sweetalert2.all.min.js"
		integrity="sha256-+InBGKGbhOQiyCbWrARmIEICqZ8UvYJr/qVhHmlmFpc=" crossorigin="anonymous"></script>
	<!-- Custom SweetAlert2 -->
	<script src="custom_SweetAlert2.js"></script>
	<script>
		$(document).ready(function() {
			// Fade out untuk alert
			window.setTimeout(function() {
				$(".alert").fadeTo(500, 0).slideUp(500, function() {
					$(this).remove();
				});
			}, 3500);

			// Toggle password visibility
			$("#togglePassword").on('click', function() {
				const passwordField = $("#inputPassword");
				const passwordIcon = $(this).find("i");

				if (passwordField.attr("type") === "password") {
					passwordField.attr("type", "text");
					passwordIcon.removeClass("fa-eye").addClass("fa-eye-slash");
				} else {
					passwordField.attr("type", "password");
					passwordIcon.removeClass("fa-eye-slash").addClass("fa-eye");
				}
			});

			// Form validation
			$('form').on('submit', function(e) {
				const email = $("#inputEmail").val();
				const password = $("#inputPassword").val();

				if (email === "" || password === "") {
					e.preventDefault();
					Swal.fire({
						icon: 'warning',
						title: 'Form Tidak Lengkap',
						text: 'Mohon isi semua field dengan benar!',
					});
				}
			});
		});
	</script>
</body>

</html>