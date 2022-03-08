<?php

// Variabel
// $namaVar = nilai;

// Biodata siswa:
// Nama : > ibnu
// Kelas : > 12
// Jurusan : > RPL
echo "------------VARIABEL------------<br>";
$nama = "Ibnu";
$kelas = 12;
$jurusan = "Tata Boga";

echo "Biodata Siswa <br>";
echo "Nama: " . $nama . "<br>";
echo "Kelas: " . $kelas . "<br>";
echo "Jurusan: " . $jurusan . "<br>";

echo "------------OPERATOR------------<br>";
// penjumlahan
// angka1 + angka2
$angka1 = 25;
$angka2 = 90;
$hasil = $angka1 + $angka2;
// hasil dari  90 + 10 = 100
echo "Hasil dari " . $angka1 . " + " . $angka2 . " = " . $hasil;
echo "<br>";

// tugas gabungan
$tugas1 = "100";
$tugas2 = "80";
$hasilGabungan = $tugas1 . $tugas2;
echo "hasil gabungan dari " . $tugas1 . " dengan " . $tugas2 . " = " . $hasilGabungan . "<br>";



echo "------------KONTROL------------<br>";
// TUGAS
// program mencari angka rahasia, kalau ketemu tampilkan angka rahasia = value

$angkaRahasia = 1;

// IF

// if($angkaRahasia == 1) {
//     echo "angka rahasia = 1";
// } else if($angkaRahasia == 2) {
//     echo "angka rahasia = 2";
// } else if($angkaRahasia == 3) {
//     echo "angka rahasia = 3";
// } else {
//     echo "angka rahasianya tidak diantara 1 - 3";
// }


// SWITCH

switch($angkaRahasia) {
    case 1:
        echo "angka rahasia = 1";
        break;
    case 2:
        echo "angka rahasia = 2";
        break;
    case 3:
        echo "angka rahasia = 3";
        break;
    default:
        echo "angka rahasianya tidak diantara 1 - 3";
        break;
}

echo "<br>------------STUDI KASUS------------<br>";
// login
// username = admin
// password = admin

// 1. jika username = admin
// 2. cek apakah password = admin
// 3. kalau username bukan admin, tampilkan username salah
// 4. kalau password bukan admin, tampilkna password salah


// variabel
$username = "admin";
$password = "samsul";

// kondisi
if($username == "admin") {
    // cek password
    if($password == "admin") {
        // tampilkan login berhasil
        echo "login berhasil!";
    } else {
        echo "password salah";
    }
} else {
    echo "username salah";
}


echo "<br>------------PERULANGAN------------<br>";

// #1
for($i = 100; $i <= 1000; $i++) {
    echo $i . " | ";
}

// #2
/*

    perulangan biasa dipakai ketika:
        1. ingin mencetak data
        2. menampilkan data tertentu saja yang banyak
        3. mengulang suatu proses yang sudah diketahui jumlahnya
    kontrol biasa digunakan ketikan:
        1. melakukan validasi pada data
        2. melakukan filter terhadap data
        3. menjaga aplikasi dari kegagalan sistem

*/




?>