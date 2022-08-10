<!DOCTYPE html>
<html>
<head>
	<title>Mari Belajar Coding</title>
	<?php include "koneksi.php"; ?>
</head>
<body>
	<div align="center">
		<h2><b>Menampilkan Data Kesamping dengan PHP</b></h2>
		<h4><b>Data Buku</b></h4>
		<table >
			<?php
			$kolom = 3;    
			$i=1; 			
			$query= mysqli_query($db, "SELECT * FROM buku");
			while ($data=mysqli_fetch_array($query)) {
				if(($i) % $kolom== 1) {    
				echo'<tr>';			
				}  
				echo '<td align="center" width="300px"><img src="img/'.$data['gambar'].'" width="50%" /><br><b>'.$data['nama_buku'].'<br>'.$data['id_buku'].'</b></td>';
				if(($i) % $kolom== 0) {    
				echo'</tr>';				
				}
			$i++;
			}
			?>
		</table>
		<br>
		<h2><a href="https://www.maribelajarcoding.com/" target="_blank">www.maribelajarcoding.com</a> </h2> <br> <br>
	</div>

</body>
</html>