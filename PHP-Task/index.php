<?php

// mencetak output
// echo "Hello world";
// echo "<br>";
// echo 2021;

// variabel
// $namavar = nilai;
// $nama = "Ibnnu";
// $kelas = 12;
// $jurusan = "RPL";

// echo $nama;
// echo "<br>";
// echo $kelas;
// echo "<br>";
// echo $jurusan;

// echo "Nama saya " . $nama . " kelas " . $kelas . " jurusan " . $jurusan;


// Operator
// aritmatika +, -, *, /, %
// $number1 = 5;
// $number2 = 5;
// $result = $number1 * $number2;
// echo $result;

// assignment =, +=, -=, *=, /=, %=
// $number1 = 12;
// $number1 *= 5;
// echo $number1;


// perbandingan >, <, >=, <=
// $number1 = 1;
// $number2 = 2;
// $result = $number1 > $number2;
// echo $result;

// logika AND( && ), OR( || ), NOT( ! )

// AND *
// a b result
// 1 0 0
// 0 1 0
// 0 0 0
// 1 1 1

// $angka1 = 4;
// $angka2 = 3;

// echo $angka1 > $angka2 && $angka1 < 2;
// echo "<br>";

// OR +
// a b result
// 1 0 1
// 0 1 1 
// 0 0 0 
// 1 1 1

// echo $angka1 < $angka2 || $angka1 < 2;


// NOT reverse
// a result
// 1 0
// 0 1

// echo "<br>";
// $ipK = false;
// echo !$ipK;




// Struktur Kontrol
// $angka = 2;
// IF
// if($angka > 1) {
//     echo $angka . " > 1";
// }

// IF ELSE
// $nama = "jhon";
// if($nama == "ibnu") {
//     echo "ini ibnu";
// } else {
//     echo "ini bukan ibnu";
// }
// ELSE IF
// if($nama == "ibnu") {
//     echo "ini adalah ibnu";
// } else if($nama == "abdel") {
//     echo "ini adalah abdel";
// } else {
//     echo "ini bukan ibnu atau abdel";
// }



// PERULANGAN - LOOPING
// FOR
// for($i = 0; $i < 10; $i++) {
//     echo $i;
//     echo "<br>";
// }

// WHILE
// $i = 1;
// while($i < 10) {
//     echo $i;
//     echo "<br>";
//     $i++;
// }

// DO WHILE
// $i = 0;
// do {
//     echo "nilai i ke-" . $i;
//     echo "<br>";
//     $i++;
// } while($i < 10);




// Studi kasus
// menampilkan bilangan genap diantara 1 - 10
// hasil = 2 4 6 8
// bilangan genap adalah bilangan yang hasil dibagi 2 = 0

for($i = 1; $i <= 10; $i++) {
    // cek apakah bilangan genap atau tidak
    if($i % 2 == 0) {
        echo $i;
        echo "<br>";
    }
}