<?php
	session_start();
	require ('config.php');

	$id = $_GET['id'];
	$query = "SELECT * FROM user WHERE usr_id = $id";
	$tampil = mysqli_query($koneksi, $query);
	$data = mysqli_fetch_array($tampil);

?>
<html>
<head>
	<title>Edit Data</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
	<div class="container mt-5">
		<div class="row">
			<div class="col-md-8">
				<h2>Edit Data User</h2>
				<form action="aksi_edit.php" method="POST">
					<input type="hidden" name="id" value="<?=$data['usr_id']?>">
					<div class="form-group">
						<label>Nama</label>
						<input type="text" name="txt_nama" class="form-control" value="<?=$data['usr_nama']?>" required>
					</div>

					<div class="form-group">
						<label>Email</label>
						<input type="email" name="txt_email" class="form-control" value="<?=$data['usr_email']?>" required>
					</div>

					<div class="form-group">
						<label>Username</label>
						<input type="text" name="txt_username" class="form-control" value="<?=$data['usr_username']?>" required>
					</div>

					<div class="form-group">
						<label>Jabatan</label>
						<input type="text" name="txt_jabatan" class="form-control" value="<?=$data['usr_jabatan']?>" required>
					</div>

					<div class="form-group mt-3">
						<input type="submit" name="update" class="btn btn-success" value="Update">
						<a href="index.php" class="btn btn-secondary">Batal</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>