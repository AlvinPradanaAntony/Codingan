<?php
	session_start();
	require ('config.php');

	if($_GET['id']!=""){
		$id = $_GET['id'];
		$query = "DELETE FROM user WHERE usr_id='$id'";
		$del = mysqli_query($koneksi, $query);
		if($del){
			$_SESSION['info'] = 'Dihapus';
			echo "<script>document.location.href='index.php'</script>";
		}else{
			$_SESSION['info'] = 'Gagal Dihapus';
			echo "<script>document.location.href='index.php'</script>";
		}
	}
?>