<?php
include "koneksi.php";
if (isset($_GET['act'])) {
	$action = $_GET['act'];
	//delete semua data
	if ($action == 'delete_all') {
		mysql_query("TRUNCATE data_uji");
		header('location:index.php?menu=uji_rule');
	}
} else {
	if (isset($_POST['submit'])) {
		include "hitung_akurasi.php";
	} else {
		$query = mysql_query("SELECT * FROM data_uji order by(id)");
		$jumlah = mysql_num_rows($query);
		echo "<br><br>";
		if ($jumlah == 0) {
?>
			<p>
			<form method="post" enctype="multipart/form-data" action="upload.php?data=uji">
				Opsi: <a href="?menu=uji_rule&act=delete_all" onClick="return confirm('Anda yakin akan hapus semua data?')">Hapus Semua Data</a> |
				Import data excel: <input name="userfile" type="file">
				<input name="upload" type="submit" value="import">
			</form>
			</p>
		<?php
			echo "<center><h3>Data uji masih kosong...</h3></center>";
		} else {
		?>
			<p>
			<form method="post" enctype="multipart/form-data" action="upload.php?data=uji">
				Opsi: <a href="?menu=uji_rule&act=delete_all" onClick="return confirm('Anda yakin akan hapus semua data?')">Hapus Semua Data</a> |
				Import data excel: <input name="userfile" type="file">
				<input name="upload" type="submit" value="import">
			</form>
			</p>

			<center>
				<form method=POST action=''>
					<input type='submit' name='submit' value='Hitung Akurasi'>
				</form>
			</center>
			Jumlah data uji: <?php echo $jumlah; ?>

			<table bgcolor='#7c96ba' border='1' cellspacing='0' cellspading='0' align='center' width=900>
				<tr align='center'>
					<th>no</th>
					<th>PROPOSAL</th>
					<th>Mata Kuliah Dasar</th>
					<th>Mata Kuliah Inti</th>
					<th>Mata Kuliah Pendukung</th>
					<th>KEPUTUSAN</th>
				</tr>
				<?php
				$warna1 = '#ffffff';
				$warna2 = '#f5f5f5';
				$warna  = $warna1;
				$no = 1;
				while ($row = mysql_fetch_array($query)) {
					if ($warna == $warna1) {
						$warna = $warna2;
					} else {
						$warna = $warna1;
					}
				?>
					<tr bgcolor=<?php echo $warna; ?> align='center'>
						<td><?php echo $no; ?></td>
						<td><?php echo $row['PROPOSAL']; ?></td>
						<td><?php echo $row['MKD']; ?></td>
						<td><?php echo $row['MKI']; ?></td>
						<td><?php echo $row['MKP']; ?></td>
						<td><?php echo $row['KEPUTUSAN']; ?></td>
					</tr>
				<?php
					$no++;
				}
				?>
			</table>
<?php
		}
	}
}
?>