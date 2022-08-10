<?php

$siswa = ["arif", "ibnu", "desti"];
// echo $siswa[0];
// echo $siswa[1];
// echo $siswa[2];
// echo sizeof($siswa);

for($i = 0; $i < sizeof($siswa); $i++) {
    echo $i . " => " . $siswa[$i] . "<br>";
}

// 1 -> $siswa[0] = arif
// 2 -> $siswa[1] = ibnu
// 3 -> $siswa[2] = desti

foreach ($siswa as $sw) {
    echo $sw . "<br>";
}



// Siswa :
// nis : 1001
// nama : Ibnu
// kelas : 12
// jurusan : RPL

// $siswa = [
//     "nis" => 1001,
//     "nama" => "Ibnu",
//     "kelas" => 12,
//     "jurusan" => "RPL"
// ];

// foreach($siswa as $sw) {
//     echo $sw . "<br>";
// }