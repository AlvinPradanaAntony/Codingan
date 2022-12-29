<?php
	include "koneksi.php";
	$query=mysql_query("select * from data_training order by(id)");
	$jumlah=mysql_num_rows($query);	
	
	if($jumlah==0){
		echo "<center><h3>Data training masih kosong...</h3></center>";
	}else{
		
		if(isset($_POST['submit'])){
			include "proses_mining.php";
		}else{
			?>
			<center>
				Klik "Proses Mining" untuk membentuk pohon keputusan...<br><br><br>
				<form method=POST action=''>		              				
					<input type=submit name=submit value=Proses Mining!>
				</form>
			</center>
			<?php
			echo "Jumlah data : ".$jumlah;
			?>
			<table bgcolor='#7c96ba' border='1' cellspacing='0' cellspading='0' align='center' width=900>
				<tr>
				<th>Mata Kuliah Dasar</th>
                            <th>Mata Kuliah Pendukung</th>
                            <th>Mata Kuliah Inti</th>
                            <th>PROPOSAL</th>
                            <th>KEPUTUSAN</th>	
				</tr>
			<?php
				$warna1 = '#ffffff';
				$warna2 = '#f5f5f5';
				$warna  = $warna1; 	
				$no=1;
				while($row=mysql_fetch_array($query)){
					if($warna == $warna1){ 
						$warna = $warna2; 
					} else { 
						$warna = $warna1; 
					} 		
				?>
					<tr bgcolor=<?php echo $warna; ?> align=center>
						<td><?php echo $row['MKD'];?></td>
						<td><?php echo $row['MKP'];?></td>
						<td><?php echo $row['MKI'];?></td>
						<td><?php echo $row['PROPOSAL'];?></td>
						<td><?php echo $row['KEPUTUSAN'];?></td>			
					</tr>
				<?php
					$no++;
				}
				?>
			</table>		
<?php
		}
	}		    	
?>