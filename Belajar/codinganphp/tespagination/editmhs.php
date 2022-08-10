<?php
//include('dbconnected.php');
include('koneksidb.php');

$id = $_GET['id_mhs'];
$nama = $_GET['nama_mhs'];
$fakultas = $_GET['fakultas_mhs'];

//query update
$queryupdate = mysqli_query($koneksi, "UPDATE tb_mahasiswa SET nama='$nama' , fakultas='$fakultas' WHERE id='$id' ");

if ($queryupdate) {
	# credirect ke page index
	header("location:index.php");	
}
else{
	echo "ERROR, data gagal diupdate". mysqli_error($koneksi);
}

//mysql_close($host);
?>
