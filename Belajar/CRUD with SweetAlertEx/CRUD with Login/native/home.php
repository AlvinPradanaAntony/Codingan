<?php
require('koneksi.php');
// $email = $_GET['user_fullname'];
session_start();

if (!isset($_SESSION['id'])) {
    $_SESSION['msg'] = 'Anda harus login untuk mengakses halaman ini';
    header('Location: login.php');
}
$sesID = $_SESSION['id'];
$sesName = $_SESSION['name'];
$sesLvl = $_SESSION['level'];
?>
<html>

<head>
	<title>Home Page</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
	<div class="container">
		<h1 class="mb-4">Selamat Datang <?php echo $sesName; ?></h1>
		<?php
    if (isset($_SESSION['statusEdit'])) {
    ?>
		<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<strong>Hey !</strong> <?= $_SESSION['statusEdit']; ?>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
		<?php
        unset($_SESSION['statusEdit']);
    }
    ?>
		<table class="table table-striped">
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
            $query = "SELECT * FROM user_detail";
            $result = mysqli_query($koneksi, $query);
            $no = 1;

            if ($sesLvl == 1) {
                $dis = "";
            } else {
                $dis = "disabled";
            }
            while ($row = mysqli_fetch_array($result)) {
                $userMail = $row['user_email'];
                $userName = $row['user_fullname'];
            ?>
				<tr>
					<th><?php echo $no; ?></th>
					<td><?php echo $userMail; ?></td>
					<td><?php echo $userName; ?></td>
					<td>
						<a href="edit.php?id=<?php echo $row['id']; ?>">
							<input type="button" value="edit" <?php echo $dis; ?>></a>
						<a href="hapus.php?id=<?php echo $row['id']; ?>">
							<input type="button" value="hapus" <?php echo $dis; ?>></a>
					</td>
				</tr>

				<?php
                $no++;
            }
            ?>
			</tbody>
		</table>
		<p><a href="logout.php">Logout</p>
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