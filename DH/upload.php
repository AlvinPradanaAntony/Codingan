<?php
	include "koneksi.php";
	//menggunakan class phpExcelReader
	include "import/excel_reader2.php";

	$dataUpload = $_GET['data'];
	if($dataUpload=='training'){
		//membaca file excel yang diupload
		$data = new Spreadsheet_Excel_Reader($_FILES['userfile']['tmp_name']);
		//membaca jumlah baris dari data excel
		$baris = $data->rowcount($sheet_index=0);
		//nilai awal counter jumlah data yang sukses dan yang gagal diimport
		$sukses = 0;
		$gagal = 0;
		//import data excel dari baris kedua, karena baris pertama adalah nama kolom
		for ($i=2; $i<=$baris; $i++) {			
			$PROPOSAL = $data->val($i,2);		
			$MKD = $data->val($i,3);
			$MKI = $data->val($i,4);
			$MKP = $data->val($i,5); 
			$KEPUTUSAN = $data->val($i,6);
			//setelah data dibaca, sisipkan ke dalam tabel 
			$query = "INSERT INTO data_training (PROPOSAL,MKD,MKI,MKP,KEPUTUSAN) 
			VALUES ('$PROPOSAL','$MKD','$MKI','$MKP','$KEPUTUSAN')";
			$hasil = mysql_query($query);
			//menambah counter jika berhasil atau gagal
			if($hasil) $sukses++;
				else $gagal++;
		}		
		header('location:index.php?menu=data');
	}else if($dataUpload=='uji'){
		//membaca file excel yang diupload
		$data = new Spreadsheet_Excel_Reader($_FILES['userfile']['tmp_name']);
		//membaca jumlah baris dari data excel
		$baris = $data->rowcount($sheet_index=0);
		//nilai awal counter jumlah data yang sukses dan yang gagal diimport
		$sukses = 0;
		$gagal = 0;
		//import data excel dari baris kedua, karena baris pertama adalah nama kolom
		for ($i=2; $i<=$baris; $i++) {	
			$PROPOSAL = $data->val($i,2);		
			$MKD = $data->val($i,3);
			$MKI = $data->val($i,4);
			$MKP = $data->val($i,5); 
			$KEPUTUSAN = $data->val($i,6);
			//setelah data dibaca, sisipkan ke dalam tabel 
			$query = "INSERT INTO data_uji (PROPOSAL,MKD,MKI,MKP,KEPUTUSAN) 
			VALUES ('$PROPOSAL','$MKD','$MKI','$MKP','$KEPUTUSAN')";
			$hasil = mysql_query($query);
			//menambah counter jika berhasil atau gagal
			if($hasil) $sukses++;
				else $gagal++;
		}		
		header('location:index.php?menu=uji_rule');
	}else if($dataUpload=='user'){
		//membaca file excel yang diupload
		$data = new Spreadsheet_Excel_Reader($_FILES['userfile']['tmp_name']);
		//membaca jumlah baris dari data excel
		$baris = $data->rowcount($sheet_index=0);
		//nilai awal counter jumlah data yang sukses dan yang gagal diimport
		$sukses = 0;
		$gagal = 0;
		//import data excel dari baris kedua, karena baris pertama adalah nama kolom
		for ($i=2; $i<=$baris; $i++) {			
			$nim = $data->val($i,1);
			$nama = $data->val($i,2); 
			$jk = $data->val($i,3);
			$angkatan = $data->val($i,4);
			$kelas = $data->val($i,5);			
			//setelah data dibaca, sisipkan ke dalam tabel 
			mysql_query("INSERT INTO mahasiswa VALUES ('$nim','$nama','$jk','$angkatan','$kelas')");
			mysql_query("INSERT INTO user VALUES ('$nim','$nama','$nim','1')");
			//menambah counter jika berhasil atau gagal
			if($hasil) $sukses++;
				else $gagal++;
		}		
		header('location:index.php?menu=user');
	}
	
?>