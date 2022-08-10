<?php
	session_start();
	require ('config.php');

	if(isset($_POST['insert'])){
		$nama     = $_POST['txt_nama'];
		$email    = $_POST['txt_email'];
		$username = $_POST['txt_username'];
		$jabatan  = $_POST['txt_jabatan'];

			$query = "INSERT INTO user VALUES ('', '$nama','$email','$username','".MD5($username)."','$jabatan', '')";
			$insert = mysqli_query($koneksi, $query);
			if($insert){
				$_SESSION['info'] = 'Disimpan';
				echo "<script>document.location.href='index.php'</script>";
			}else{
				$_SESSION['info'] = 'Gagal Disimpan';
				echo "<script>document.location.href='index.php'</script>";
			}
		}
?>