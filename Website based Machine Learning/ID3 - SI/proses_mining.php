<?php
	$awal = microtime(true); 
	include 'koneksi.php';
	include 'fungsi.php';
	mysql_query("TRUNCATE pohon_keputusan");	
	pembentukan_tree("","","");
	echo "<br><h1><center>---PROSES SELESAI---</center></h1>";
	echo "<center><a href='index.php?menu=tree' accesskey='5' title='pohon keputusan'>Lihat pohon keputusan yang terbentuk</a></center>";
	
	$akhir = microtime(true);
	$lama = $akhir - $awal;
	//echo "<br>Lama eksekusi script adalah: ".$lama." detik";
		
	
	//fungsi utama
	function proses_DT($parent , $kasus_cabang1 , $kasus_cabang2, $kasus_cabang3){	
		if($kasus_cabang3 == ""){
			echo "cabang 1<br>";
			pembentukan_tree($parent , $kasus_cabang1);		
			echo "cabang 2<br>";
			pembentukan_tree($parent , $kasus_cabang2);	
		}
		else if($kasus_cabang3 != ""){
			echo "cabang 1<br>";
			pembentukan_tree($parent , $kasus_cabang1);		
			echo "cabang 2<br>";
			pembentukan_tree($parent , $kasus_cabang2);
			echo "cabang 3<br>";
			pembentukan_tree($parent, $kasus_cabang3);	
		}
		
	}		
	
	function pangkas($PARENT, $KASUS, $LEAF){
		//PEMANGKASAN CABANG
		$sql_pangkas = mysql_query("SELECT * FROM pohon_keputusan WHERE parent=\"$PARENT\" AND keputusan=\"$LEAF\"");
		$row_pangkas = mysql_fetch_array($sql_pangkas);
		$jml_pangkas = mysql_num_rows($sql_pangkas);
		//jika keputusan dan parent belum ada maka insert
		if($jml_pangkas==0){			
			mysql_query("INSERT INTO pohon_keputusan (parent,akar,keputusan)VALUES (\"$PARENT\" , \"$KASUS\" , \"$LEAF\")");
		}
		//jika keputusan dan parent sudah ada maka delete
		else{			
			mysql_query("DELETE FROM pohon_keputusan WHERE id='$row_pangkas[0]'");
			
			$exPangkas = explode(" AND ",$PARENT);
			$jmlEXpangkas = count($exPangkas);
			$temp=array();
			for($a=0;$a<($jmlEXpangkas-1);$a++){
				$temp[$a]=$exPangkas[$a];
			}
			$imPangkas = implode(" AND ",$temp);
			$akarPangkas = $exPangkas[$jmlEXpangkas-1];
			
			$que_pangkas = mysql_query("SELECT * FROM pohon_keputusan WHERE parent=\"$imPangkas\" AND keputusan=\"$LEAF\"");
			$baris_pangkas = mysql_fetch_array($que_pangkas);
			$jumlah_pangkas = mysql_num_rows($que_pangkas);
			
			if($jumlah_pangkas==0){		
				mysql_query("INSERT INTO pohon_keputusan (parent,akar,keputusan)VALUES (\"$imPangkas\" , \"$akarPangkas\" , \"$LEAF\")");
				//mysql_query("UPDATE pohon_keputusan SET parent=\"$imPangkas\" , akar=\"$akarPangkas\" , keputusan=\"$LEAF\" WHERE id=\"$row_pangkas[0]\"");
			}else{
				pangkas($imPangkas,$akarPangkas,$LEAF);
			}								
		}
		echo "Keputusan = ".$LEAF."<br>================================<br>";		
	}
	
	//fungsi proses dalam suatu kasus data
	function pembentukan_tree($N_parent , $kasus){
		//mengisi kondisi
		if($N_parent!=''){
			$kondisi = $N_parent." AND ".$kasus;
		}else{
			$kondisi = $kasus;
		}		
		echo $kondisi."<br>";
		//cek data heterogen / homogen???
		$cek = cek_heterohomogen('KEPUTUSAN',$kondisi);		
		if($cek=='homogen'){
			echo "<br>LEAF ";
			$sql_keputusan = mysql_query("SELECT DISTINCT(KEPUTUSAN) FROM data_training WHERE $kondisi");
			$row_keputusan = mysql_fetch_array($sql_keputusan);	
			$keputusan = $row_keputusan['0'];
			//insert atau lakukan pemangkasan cabang
			pangkas($N_parent , $kasus , $keputusan);
			
		}//jika data masih heterogen
		else if($cek=='heterogen'){
			//cek jumlah data
			$jumlah = jumlah_data($kondisi);				
			if($jumlah<1){
				echo "<br>LEAF ";
				$NDiterima = $kondisi." AND KEPUTUSAN='Diterima'";
				$NDitolak = $kondisi." AND KEPUTUSAN='Ditolak'";
				$NDIDDR = $kondisi." AND KEPUTUSAN='Revisi'";
				$jumlahDiterima = jumlah_data("$NDiterima");
				$jumlahDitolak = jumlah_data("$NDitolak");	
				$jumlahDDR = jumlah_data("$NDIDDR");				
				if($jumlahDiterima <= $jumlahDitolak){
					$keputusan = 'Ditolak';
				}else if($jumlahDiterima <= $jumlahDDR){
					$keputusan = 'Revisi';
				}else if($jumlahDDR <= $jumlahDitolak){
					$keputusan = 'Ditolak';
				}else if($jumlahDiterima > $jumlahDitolak){
					$keputusan = 'Diterima';
				}else if($jumlahDiterima > $jumlahDDR){
					$keputusan = 'Diterima';
				}else if($jumlahDDR > $jumlahDitolak){
					$keputusan = 'Revisi';
				}
								
				//insert atau lakukan pemangkasan cabang
				pangkas($N_parent , $kasus , $keputusan);	
				// echo "testparent=".$N_parent ."kasus=".$kasus."keputusan=".$keputusan."<br>";	
			}
			//lakukan perhitungan
			else{			
				//jika kondisi tidak kosong kondisi_KEPUTUSAN=tambah and
				$kondisi_KEPUTUSAN='';
				if($kondisi!=''){
					$kondisi_KEPUTUSAN=$kondisi." AND ";
				}
				$jml_Diterima = jumlah_data("$kondisi_KEPUTUSAN KEPUTUSAN='Diterima'");
				$jml_Ditolak = jumlah_data("$kondisi_KEPUTUSAN KEPUTUSAN='Ditolak'");
				$jml_DDR = jumlah_data("$kondisi_KEPUTUSAN KEPUTUSAN='Revisi'");
				$jml_total = $jml_Diterima + $jml_Ditolak + $jml_DDR;
				echo "Jumlah data = ".$jml_total."<br>";
				echo "Jumlah Diterima = ".$jml_Diterima."<br>";
				echo "Jumlah Ditolak = ".$jml_Ditolak."<br>";
				echo "Jumlah Revisi = ".$jml_DDR."<br>";
				
				//hitung entropy semua
				$entropy_all = hitung_entropy($jml_Diterima , $jml_Ditolak,$jml_DDR);
				echo "Entropy = ".$entropy_all."<br>";
				
				//cek berapa nilai setiap atribut
				$nilai_PROPOSAL = array();
				$nilai_PROPOSAL = cek_nilaiAtribut('PROPOSAL',$kondisi);								
				$jmlPROPOSAL = count($nilai_PROPOSAL);
				$nilai_MKD = array();
				$nilai_MKD = cek_nilaiAtribut('MKD',$kondisi);								
				$jmlMKD = count($nilai_MKD);	
				$nilai_MKI = array();
				$nilai_MKI = cek_nilaiAtribut('MKI',$kondisi);								
				$jmlMKI = count($nilai_MKI);							
				$nilai_MKP = array();
				$nilai_MKP = cek_nilaiAtribut('MKP',$kondisi);								
				$jmlMKP = count($nilai_MKP);
				// echo "$jmlPROPOSAL<br>";
				
							
			//hitung gain atribut
				mysql_query("TRUNCATE gain");
				if($jmlPROPOSAL!=1){
					$NA1PROPOSAL="PROPOSAL='$nilai_PROPOSAL[0]'";
					$NA2PROPOSAL="PROPOSAL='$nilai_PROPOSAL[1]'";
					$NA3PROPOSAL="PROPOSAL='$nilai_PROPOSAL[2]'";
					hitung_gain($kondisi , "PROPOSAL", $entropy_all , $NA1PROPOSAL , $NA2PROPOSAL , $NA3PROPOSAL , "" , "");
				}
				if($jmlMKP!=1){
					$NA1MKP="MKP='$nilai_MKP[0]'";
					if($jmlMKP > 1){
						$NA2MKP="MKP='$nilai_MKP[1]'";
						$NA3MKP="MKP='$nilai_MKP[2]'";
					}
					
					hitung_gain($kondisi , "MKP", $entropy_all , $NA1MKP , $NA2MKP , $NA3MKP , "" , "");
				}
				if($jml_total == 6){
					$NA1MKD="MKD='$nilai_MKD[0]'";
					$NA2MKD="";
					$NA3MKD="";
					if($jmlMKD==2){
						$NA2MKD="MKD='$nilai_MKD[1]'";
					}else if ($jmlMKD==3){
						$NA2MKD="MKD='$nilai_MKD[1]'";
						$NA3MKD="MKD='$nilai_MKD[2]'";
					}				
					hitung_gain($kondisi , "MKD", $entropy_all , $NA1MKD, $NA2MKD, $NA3MKD, "" , "");	
				}
				//MKI
				if($jmlMKI!=1){
					$NA1MKI="MKI='$nilai_MKI[0]'";
					$NA2MKI="";
					$NA3MKI="";
					$NA4MKI="";
					$NA5MKI="";
					if($jmlMKI==2){
						$NA2MKI="MKI='$nilai_MKI[1]'";
					}else if($jmlMKI==3){
						$NA2MKI="MKI='$nilai_MKI[1]'";
						$NA3MKI="MKI='$nilai_MKI[2]'";
					}else if($jmlMKI==4){
						$NA2MKI="MKI='$nilai_MKI[1]'";
						$NA3MKI="MKI='$nilai_MKI[2]'";
						$NA4MKI="MKI='$nilai_MKI[3]'";
					}else if($jmlMKI==5){
						$NA2MKI="MKI='$nilai_MKI[1]'";
						$NA3MKI="MKI='$nilai_MKI[2]'";
						$NA4MKI="MKI='$nilai_MKI[3]'";
						$NA5MKI="MKI='$nilai_MKI[4]'";
					}
					hitung_gain($kondisi , "MKI", $entropy_all , $NA1MKI , $NA2MKI , $NA3MKI , $NA4MKI , $NA5MKI);
				}		
				
				//MKD
				if($jmlMKD!=1){
					$NA1MKD="MKD='$nilai_MKD[0]'";
					$NA2MKD="";
					$NA3MKD="";
					if($jmlMKD==2){
						$NA2MKD="MKD='$nilai_MKD[1]'";
					}else if ($jmlMKD==3){
						$NA2MKD="MKD='$nilai_MKD[1]'";
						$NA3MKD="MKD='$nilai_MKD[2]'";
					}				
					hitung_gain($kondisi , "MKD", $entropy_all , $NA1MKD, $NA2MKD, $NA3MKD, "" , "");	
				}
				//MKP
				// if($jmlMKP!=1){
				// 	$NA1MKP="MKP='$nilai_MKP[0]'";
				// 	$NA2MKP="MKP='$nilai_MKP[1]'";
				// 	hitung_gain($kondisi , "MKP", $entropy_all , $NA1MKP , $NA2MKP , "" , "" , "");
				// }
				
				//PROPOSAL
						
				
				//motivasi
				// if($jmlMotivasi!=1){
				// 	$NA1Motivasi="motivasi='$nilai_motivasi[0]'";
				// 	$NA2Motivasi="";
				// 	$NA3Motivasi="";
				// 	if($jmlMotivasi==2){
				// 		$NA2Motivasi="motivasi='$nilai_motivasi[1]'";
				// 	}else if ($jmlMotivasi==3){
				// 		$NA2Motivasi="motivasi='$nilai_motivasi[1]'";
				// 		$NA3Motivasi="motivasi='$nilai_motivasi[2]'";
				// 	}
				// 	hitung_gain($kondisi , "motivasi" , $entropy_all , $NA1Motivasi, $NA2Motivasi, $NA3Motivasi, "" , "");
				// }																																				
				// //hitung gain atribut Numerik										
				// 	hitung_gain($kondisi , "rata UN posisi 6.5"	, $entropy_all , "rata_un<=6.5"	, "rata_un>6.5" , "" , "" , "");
				// 	hitung_gain($kondisi , "rata UN posisi 6.75"	, $entropy_all , "rata_un<=6.75", "rata_un>6.75", "" , "" , "");
				// 	hitung_gain($kondisi , "rata UN posisi 7"		, $entropy_all , "rata_un<=7"	, "rata_un>7"	, "" , "" , "");
				// 	hitung_gain($kondisi , "rata UN posisi 7.25"	, $entropy_all , "rata_un<=7.25", "rata_un>7.25", "" , "" , "");
				// 	hitung_gain($kondisi , "rata UN posisi 7.5" 	, $entropy_all , "rata_un<=7.5" , "rata_un>7.5" , "" , "" , "");
				// 	hitung_gain($kondisi , "rata UN posisi 7.75"	, $entropy_all , "rata_un<=7.75", "rata_un>7.75", "" , "" , "");
				// 	hitung_gain($kondisi , "rata UN posisi 8"		, $entropy_all , "rata_un<=8"	, "rata_un>8" 	, "" , "" , "");
				// 	hitung_gain($kondisi , "rata UN posisi 8.25"	, $entropy_all , "rata_un<=8.25", "rata_un>8.25", "" , "" , "");
				// 	hitung_gain($kondisi , "rata UN posisi 8.5"	, $entropy_all , "rata_un<=8.5" , "rata_un>8.5" , "" , "" , "");
				// 	hitung_gain($kondisi , "rata UN posisi 8.75"	, $entropy_all , "rata_un<=8.75", "rata_un>8.75", "" , "" , "");
					
				//ambil nilai gain tertinggi
					$sql_max = mysql_query("SELECT MAX(gain) FROM gain");
					$row_max = mysql_fetch_array($sql_max);	
					$max_gain = $row_max['0'];
					$sql = mysql_query("SELECT * FROM gain WHERE gain=$max_gain");
					if($sql){
						$row = mysql_fetch_array($sql);	
						$atribut = $row['1'];
						echo "Atribut terpilih = ".$atribut.", dengan nilai gain = ".$max_gain."<br>";					
						echo "<br>================================<br>";
					
					}
					else{
						$atribut = "";
						$max_gain = 0;
						echo "<br>================================<br>";
					}
					// $row = mysql_fetch_array($sql);	
					// 	$atribut = $row['1'];
					// 	echo "Atribut terpilih = ".$atribut.", dengan nilai gain = ".$max_gain."<br>";					
					// 	echo "<br>================================<br>";
				//percabangan jika nilai atribut lebih dari 2 hitung rasio terlebih dahulu
				//MKD TERPILIH
							
				//MKP TERPILIH
				// else if($atribut=="MKP"){					
				// 	proses_DT($kondisi , "($atribut='BAIK')","($atribut='KURANG')");										
				// }
				// else if($atribut=="MKP"){
				// 	//jika nilai atribut 3
				// 	if($jmlMKP==3){
				// 		//hitung rasio
				// 		$cabang = array();
				// 		$cabang = hitung_rasio($kondisi , 'MKP',$max_gain,$nilai_MKP[0],$nilai_MKP[1],$nilai_MKP[2],'','');
				// 		$exp_cabang = explode(" , ",$cabang[1]);				
				// 		proses_DT($kondisi , "($atribut='$cabang[0]')","($atribut='$exp_cabang[0]' OR $atribut='$exp_cabang[1]')","");						
				// 	}
				// 	//jika nilai atribut 2
				// 	else if($jmlMKP==2){
				// 		proses_DT($kondisi , "($atribut='$nilai_MKP[0]')" , "($atribut='$nilai_MKP[1]')","");
				// 	}
				// }
				if($atribut=="MKP"){					
					proses_DT($kondisi,"($atribut='Kurang')","($atribut='Baik')","($atribut='Sedang')");					
				}
				else if($atribut=="MKD"){
					//jika nilai atribut 5
					if($jmlMKD==5){
						//hitung rasio
						$cabang = array();
						$cabang = hitung_rasio($kondisi , 'MKD',$max_gain,$nilai_MKD[0],$nilai_MKD[1],$nilai_MKD[2],$nilai_MKD[3],$nilai_MKD[4]);
						$exp_cabang = explode(" , ",$cabang[1]);						
						proses_DT($kondisi,"($atribut='$cabang[0]')","($atribut='$exp_cabang[0]' OR $atribut='$exp_cabang[1]' OR $atribut='$exp_cabang[2]' OR $atribut='$exp_cabang[3]')","");						
					}					
					//jika nilai atribut 4
					else if($jmlMKD==4){
						//hitung rasio
						$cabang = array();
						$cabang = hitung_rasio($kondisi , 'MKD',$max_gain,$nilai_MKD[0],$nilai_MKD[1],$nilai_MKD[2],$nilai_MMKD[3],'');
						$exp_cabang = explode(" , ",$cabang[1]);
						proses_DT($kondisi,"($atribut='$cabang[0]')","($atribut='$exp_cabang[0]' OR $atribut='$exp_cabang[1]' OR $atribut='$exp_cabang[2]')","");
					}					
					//jika nilai atribut 3
					else if($jmlMKD==3){
						//hitung rasio
						$cabang = array();
						$cabang = hitung_rasio($kondisi , 'MKD',$max_gain,$nilai_MKD[0],$nilai_MKD[1],$nilai_MKD[2],'','');
						$exp_cabang = explode(" , ",$cabang[1]);
						proses_DT($kondisi,"($atribut='$cabang[0]')","($atribut='$exp_cabang[0]' OR $atribut='$exp_cabang[1]')","");
					}
					//jika nilai atribut 2
					else if($jmlMKD==2){
						proses_DT($kondisi,"($atribut='$nilai_MKD[0]')" , "($atribut='$nilai_MKD[1]')" ,"");
					}
				}
				// else if($atribut=="MKD"){					
				// 	proses_DT($kondisi,"($atribut='Kurang')","($atribut='Baik')","($atribut='Sedang')");					
				// }
				// MKI TERPILIH
				else if($atribut=="MKI"){
					//jika nilai atribut 5
					if($jmlMKI==5){
						//hitung rasio
						$cabang = array();
						$cabang = hitung_rasio($kondisi , 'MKI',$max_gain,$nilai_MKI[0],$nilai_MKI[1],$nilai_MKI[2],$nilai_MKI[3],$nilai_MKI[4]);
						$exp_cabang = explode(" , ",$cabang[1]);						
						proses_DT($kondisi,"($atribut='$cabang[0]')","($atribut='$exp_cabang[0]' OR $atribut='$exp_cabang[1]' OR $atribut='$exp_cabang[2]' OR $atribut='$exp_cabang[3]')","");						
					}					
					//jika nilai atribut 4
					else if($jmlMKI==4){
						//hitung rasio
						$cabang = array();
						$cabang = hitung_rasio($kondisi , 'MKI',$max_gain,$nilai_MKI[0],$nilai_MKI[1],$nilai_MKI[2],$nilai_MKI[3],'');
						$exp_cabang = explode(" , ",$cabang[1]);
						proses_DT($kondisi,"($atribut='$cabang[0]')","($atribut='$exp_cabang[0]' OR $atribut='$exp_cabang[1]' OR $atribut='$exp_cabang[2]')","");
					}					
					//jika nilai atribut 3
					else if($jmlMKI==3){
						//hitung rasio
						$cabang = array();
						$cabang = hitung_rasio($kondisi , 'MKI',$max_gain,$nilai_MKI[0],$nilai_MKI[1],$nilai_MKI[2],'','');
						$exp_cabang = explode(" , ",$cabang[1]);
						proses_DT($kondisi,"($atribut='$cabang[0]')","($atribut='$exp_cabang[0]' OR $atribut='$exp_cabang[1]')","");
					}
					//jika nilai atribut 2
					else if($jmlMKI==2){
						proses_DT($kondisi,"($atribut='$nilai_MKI[0]')" , "($atribut='$nilai_MKI[1]')" ,"");
					}
				}
				// else if($atribut=="MKI"){					
				// 	proses_DT($kondisi,"($atribut='Kurang')","($atribut='Baik')","($atribut='Sedang')");					
				// }
				//RATA UN TERPILIH
				// else if($atribut=="rata UN posisi 6.5"){					
				// 	proses_DT($kondisi,"(rata_un<=6.5)","(rata_un>6.5)");					
				// }
				// else if($atribut=="rata UN posisi 6.75"){					
				// 	proses_DT($kondisi,"(rata_un<=6.75)","(rata_un>6.75)");					
				// }
				// else if($atribut=="rata UN posisi 7"){					
				// 	proses_DT($kondisi,"(rata_un<=7)","(rata_un>7)");					
				// }
				// else if($atribut=="rata UN posisi 7.25"){					
				// 	proses_DT($kondisi,"(rata_un<=7.25)","(rata_un>7.25)");					
				// }
				// else if($atribut=="rata UN posisi 7.5"){					
				// 	proses_DT($kondisi,"(rata_un<=7.5)","(rata_un>7.5)");			
				// }
				// else if($atribut=="rata UN posisi 7.75"){					
				// 	proses_DT($kondisi,"(rata_un<=7.75)","(rata_un>7.75)");					
				// }
				// else if($atribut=="rata UN posisi 8"){					
				// 	proses_DT($kondisi,"(rata_un<=8)","(rata_un>8)");					
				// }
				// else if($atribut=="rata UN posisi 8.25"){					
				// 	proses_DT($kondisi,"(rata_un<=8.25)","(rata_un>8.25)");					
				// }
				// else if($atribut=="rata UN posisi 8.5"){					
				// 	proses_DT($kondisi,"(rata_un<=8.5)","(rata_un>8.5)");					
				// }
				// else if($atribut=="rata UN posisi 8.75"){					
				// 	proses_DT($kondisi,"(rata_un<=8.75)","(rata_un>8.75)");					
				// }
				//PROPOSAL TERPILIH
				else if($atribut=="PROPOSAL"){					
					proses_DT($kondisi,"($atribut='Kurang')","($atribut='Baik')","($atribut='Sedang')");					
				}
				// if($atribut=="MKP"){					
				// 	proses_DT($kondisi,"($atribut='Kurang')","($atribut='Baik')","($atribut='Sedang')");					
				// }
				//MOTIVASI TERPILIH
				// else if($atribut=="motivasi"){
				// 	//jika nilai atribut 3
				// 	if($jmlMotivasi==3){
				// 		$cabang = array();
				// 		$cabang = hitung_rasio($kondisi , 'motivasi',$max_gain,$nilai_motivasi[0],$nilai_motivasi[1],$nilai_motivasi[2],'','');
				// 		$exp_cabang = explode(" , ",$cabang[1]);							
				// 		proses_DT($kondisi,"($atribut='$cabang[0]')","($atribut='$exp_cabang[0]' OR $atribut='$exp_cabang[1]')");						
				// 	}
				// 	//jika nilai atribut 2
				// 	else if($jmlMotivasi==2){
				// 		proses_DT($kondisi,"($atribut='$nilai_motivasi[0]')" , "($atribut='$nilai_motivasi[1]')");
				// 	}
				// }				
			}
		}						
	}
?>