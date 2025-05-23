<?php
	session_start();
	require ('config.php');
	$query = "SELECT * FROM user ORDER BY usr_nama ASC";
	$tampil = mysqli_query($koneksi, $query);

?>
<html>
<head>
	<title>Sweet Alert</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	
</head>
<body>
	<!-- SWAL -->
	<div class="info-data" data-infodata="<?php if(isset($_SESSION['info'])){ echo $_SESSION['info']; } unset($_SESSION['info']); ?>"></div>

	<div class="container mt-5">
		<div class="row">
			<div class="col-md-8">
				<table class="table table-hover">
					<thead>
						<th>#</th>
						<th>Nama</th>
						<th>Email</th>
						<th>Username</th>
						<th>Jabatan</th>
						<th>Aksi</th>
					</thead>
					<tbody>
					<?php 
						$no = 1;
						while ($data = mysqli_fetch_array($tampil)) {
					?>
						<tr>
							<td><?=$no?></td>
							<td><?=$data['usr_nama']?></td>
							<td><?=$data['usr_email']?></td>
							<td><?=$data['usr_username']?></td>
							<td><?=$data['usr_jabatan']?></td>
							<td>
								<a href="edit.php?id=<?=$data['usr_id']?>" class="btn btn-primary btn-xs">Edit</a>
								<a href="aksi_delete.php?id=<?=$data['usr_id']?>" class="btn btn-danger btn-xs delete-data">Hapus</a>
							</td>
						</tr>
					<?php $no++; } ?>
					</tbody>
				</table>
			</div>

			<div class="4">
				<form action="aksi_insert.php" method="POST">
					<div class="form-group">
						<label>Nama</label>
						<input type="text" name="txt_nama" class="form-control" required>
					</div>

					<div class="form-group">
						<label>Email</label>
						<input type="email" name="txt_email" class="form-control" required>
					</div>

					<div class="form-group">
						<label>Username</label>
						<input type="text" name="txt_username" class="form-control" required>
					</div>

					<div class="form-group">
						<label>Jabatan</label>
						<input type="text" name="txt_jabatan" class="form-control" required>
					</div>

					<div class="form-group mt-3">
						<input type="submit" name="insert" class="btn btn-success" value="Simpan">
					</div>
				</form>
			</div>

		</div>
	</div>
	<!-- JS -->

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

	<!-- Swal -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.15.2/dist/sweetalert2.all.min.js"></script>
	<!-- Optional: include a polyfill for ES6 Promises for IE11 -->
	<!-- <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script> -->
	<script src="js-ku.js"></script>
</body>
</html>

