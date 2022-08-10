<?php
 $i;
 $nama = "Alvin Pradana Antony";
 $Umur = 19;
 $_lokasi_memori = "temp";
 $ANGKA_MAKSIMUM = "125k";
 $nilai1 = "70";
 $nilai2 = "90";
 $jumlah = $nilai1 + $nilai2;
 $jumlah2 = 70 + 90;

 echo ("<p>Nama : $nama</p>");
 echo ("<p>Umur : $Umur Tahun</p>");
 echo ("<p>Lokasi Memori : $_lokasi_memori</p>");
 echo ("<p>Maksimum : $ANGKA_MAKSIMUM</p>");
 print PHP_INT_MAX;
 echo "<br>";
 echo "<hr>";

 $angka_float1= 0.78;
 $angka_float2= 14.99;
 $angka_scientific1=0.314E1;
 $angka_scientific2=0.3365E-3;
 echo $angka_float1; // 0.78
 echo "<br />";
 echo $angka_float2; //14.99
 echo "<br />";
 echo $angka_scientific1; //3.14
 echo "<br />";
 echo $angka_scientific2; //0.0003365
 echo "<br>";
 echo "<hr>";

$string1='Ini adalah string sederhana';
$string2='Ini adalah string
yang bisa memiliki beberapa
baris';
$string3='Dia berkata: "I\'ll be back"';
$string4='Anda telah berhasil menghapus C:\\xamp\\htdoc\\';
$string5='Kalimat ini tidak akan pindah ke: \n baris baru';
$string6='Variabel juga tidak otomatis ditampilkan $string1 dan $string3';
echo $string1; echo "<br>";
echo $string2; echo "<br>";
echo $string3; echo "<br>";
echo $string4; echo "<br>";
echo $string5; echo "<br>";
echo $string6;
echo "<br>";
echo "<hr>";

$IPK=3.9;
$string1 = <<<end
Saya sedang belajar PHP
di Politeknik Negeri Jember <br />
Kali ini tentang pembahasan
mengenai "PHP", <br /> dan berharap
bisa dapat IPK $IPK :) (HEREDOC)
end;

$string2 = <<< 'selesai'
Saya sedang belajar PHP
di \n Politeknik Negeri Jember <br />
Kali ini tentang pembahasan
mengenai "PHP", <br /> dan berharap
bisa dapat IPK $IPK :) (NOWDOC)
selesai;



echo $string1; echo "<br><br>";
echo $string2; echo "<br><br>";
echo "10" + "20"; echo "<br><br>";
echo "Hasil Jumlah : ".$jumlah;  echo "<br><br>";

var_dump ($nilai2);  echo "<br><br>";
var_dump ($jumlah);  echo "<br><br>";
var_dump ($jumlah2);
?>
