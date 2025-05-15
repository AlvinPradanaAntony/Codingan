<?php
require('koneksi.php');
require('query.php');
// $email = $_GET['user_fullname'];
$obj = new crud;
session_start();

if (!isset($_SESSION['id'])) {
	header('Location: login.php');
}
$sesID = $_SESSION['id'];
$sesName = $_SESSION['name'];
$sesLvl = $_SESSION['level'];
?>

<!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Data Pengguna</title>
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
			padding-top: 20px;
			padding-bottom: 20px;
		}

		.content-container {
			background-color: white;
			border-radius: 10px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
			padding: 30px;
			margin-bottom: 20px;
		}

		.page-header {
			color: #dc3545;
			margin-bottom: 20px;
			border-bottom: 2px solid #dc3545;
			padding-bottom: 10px;
			display: flex;
			justify-content: space-between;
			align-items: center;
		}

		.logout-btn {
			text-decoration: none;
		}

		.table-container {
			overflow-x: auto;
		}

		.btn-xs {
			padding: .25rem .5rem;
			font-size: .875rem;
		}

		.user-welcome {
			font-weight: 600;
			color: #343a40;
		}
	</style>
</head>

<body>
	<div class="container">
		<div class="content-container">
			<div class="page-header">
				<div>
					<h2>Data Pengguna</h2>
					<p class="user-welcome">Selamat Datang, <span class="text-danger"><?php echo $sesName; ?></span></p>
				</div>
				<div>
					<a href="logout.php" class="btn btn-outline-danger">
						<i class="fas fa-sign-out-alt"></i> Logout
					</a>
				</div>
			</div>

			<div class="info-data" data-infodata="<?php if (isset($_SESSION['info'])) {
																							echo $_SESSION['info'];
																						}
																						unset($_SESSION['info']); ?>"></div>

			<div class="table-container">
				<table class="table table-striped table-hover">
					<thead class="table-danger">
						<tr>
							<th>No</th>
							<th>Email</th>
							<th>Nama</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$data = $obj->lihatData();
						$no = 1;
						if ($data->rowCount() > 0) {
							if ($sesLvl == 1) {
								$dis = "";
							} else {
								$dis = "disabled";
								$style = "pointer-events: none;";
							}
							while ($row = $data->fetch(PDO::FETCH_ASSOC)) {
								$userMail = $row['user_email'];
								$userName = $row['user_fullname'];
						?>
								<tr>
									<th scope="row"><?php echo $no; ?></th>
									<td><?php echo $userMail; ?></td>
									<td><?php echo $userName; ?></td>
									<td>
										<div class="btn-group" role="group">
											<a href="edit.php?id=<?php echo $row['id']; ?>" style="<?php echo isset($style) ? $style : ''; ?>" class="me-2">
												<button type="button" <?php echo $dis; ?> class="btn btn-sm btn-success">
													<i class="fas fa-edit"></i> Edit
												</button>
											</a>
											<a href="hapus.php?id=<?php echo $row['id']; ?>" class="delete-data" style="<?php echo isset($style) ? $style : ''; ?>">
												<button type="button" <?php echo $dis; ?> class="btn btn-sm btn-danger">
													<i class="fas fa-trash"></i> Hapus
												</button>
											</a>
										</div>
									</td>
								</tr>
							<?php
								$no++;
							}
						} else {
							?>
							<tr>
								<td colspan="4" class="text-center">Tidak ada data pengguna</td>
							</tr>
						<?php
						}
						?>
					</tbody>
				</table>
			</div>

			<?php if ($sesLvl == 1): ?>
				<div class="mt-4">
					<a href="register.php" class="btn btn-primary">
						<i class="fas fa-user-plus"></i> Tambah Pengguna Baru
					</a>
				</div>
			<?php endif; ?>
		</div>

		<footer class="text-center mt-4 text-muted">
			<small>&copy; <?php echo date('Y'); ?> Sistem Manajemen Pengguna</small>
		</footer>
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

			// Konfirmasi hapus dengan SweetAlert2
			$('.delete-data').on('click', function(e) {
				e.preventDefault();
				const href = $(this).attr('href');

				Swal.fire({
					title: 'Apakah Anda yakin?',
					text: "Data pengguna akan dihapus dan tidak dapat dikembalikan!",
					icon: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#dc3545',
					cancelButtonColor: '#6c757d',
					confirmButtonText: 'Ya, hapus!',
					cancelButtonText: 'Batal'
				}).then((result) => {
					if (result.isConfirmed) {
						window.location.href = href;
					}
				});
			});
		});
	</script>
</body>

</html>