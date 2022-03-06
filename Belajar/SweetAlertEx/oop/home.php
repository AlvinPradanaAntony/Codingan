<?php
require('koneksi.php');
require('query.php');
// $email = $_GET['user_fullname'];
$obj = new crud;
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
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.3/dist/sweetalert2.min.css" integrity="sha256-7FY/kD9x8sdXwruZy+8tjKt05pkuxyF52nbrSazsNg8=" crossorigin="anonymous">
</head>

<body>
	<div class="container">
		<h1 class="mb-4">Selamat Datang <?php echo $sesName; ?></h1>
		<div class="info-data" data-infodata="<?php if(isset($_SESSION['info'])){ echo $_SESSION['info']; } unset($_SESSION['info']); ?>"></div>
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
					<th><?php echo $no; ?></th>
					<td><?php echo $userMail; ?></td>
					<td><?php echo $userName; ?></td>
					<td>
					<a href="edit.php?id=<?php echo $row['id']; ?>" style="<?php echo $style; ?>">
						<input type="button" value="Edit" <?php echo $dis; ?> class="btn btn-success btn-xs"></a>
					<a href="hapus.php?id=<?php echo $row['id']; ?>" class="delete-data" style="<?php echo $style; ?>">
						<input type="button" value="Hapus" <?php echo $dis; ?> class="btn btn-danger btn-xs"></a>
					</td>
				</tr>
				<?php
                $no++;
            }
        }
        ?>
			</tbody>
		</table>
		</table>
		<p><a href="logout.php">Logout</p>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
	</script>
	<script src="jquery/jquery-3.6.0.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.3/dist/sweetalert2.all.min.js" integrity="sha256-+InBGKGbhOQiyCbWrARmIEICqZ8UvYJr/qVhHmlmFpc=" crossorigin="anonymous"></script>
	<script src="custom_SweetAlert2.js"></script>
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