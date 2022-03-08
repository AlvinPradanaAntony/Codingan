<?php

// ----------FUNCTION-----------

//#1
// 1. kita butuh 2 variabel sebagai perbandingan
// 2. kita butuh sebuah percabangan (if)
function perbandingan($nilai1, $nilai2) {
    // cek
    if($nilai1 > $nilai2) {
        echo "nilai 1: $nilai1 lebih besar dari pada nilai 2: $nilai2";
    } else {
        echo "nilai 2: $nilai2 lebih besar dari pada nilai 1: $nilai1";
    }
}

// #2
// kita butuh 3 variabel untuk tanggal, bulan, dan tahun
function tampilkanTanggal($tanggal, $bulan, $tahun) {
    echo "Tanggal manual: " . $tanggal . "-" . $bulan . "-" . $tahun;
}

// #2 - otomatis
function tampilkanTanggalOtomatis() {
    $tanggal = getdate()["mday"];
    $bulan = getdate()["mon"];
    $tahun = getdate()["year"];

    echo "Tanggal otomatis: " . $tanggal . "-" . $bulan . "-" . $tahun;
}



// ------------HASIL-------------
#1
perbandingan(100, 150);
echo "<br>";
#2 - manual
tampilkanTanggal(19, 10, 2021);
echo "<br>";
#2 - otomatis
tampilkanTanggalOtomatis();
echo "<br>";
#3
echo "Tanggal dengan function getdate: " . date("d-m-Y");
echo "<br>";

#4 - array
$arr1 = [
    [1,1,1],
    [2,2,2],
    [3,3,3]
];

$arr2 = [
    [3,3,3],
    [2,2,2],
    [1,1,1]
];


// 1. buat function untuk menjumlahkan 1 array 3D
function totalNilaiArray($arr) {
    $result = 0;
    $iteration = sizeof($arr);
    // perulangan untuk menjumlah total item
    for ($i=0; $i < $iteration; $i++) { 
        $result += array_sum($arr[$i]);
    }
    return $result; // int
}

// membuat variabel penampung hasil penjumlahan
$hasil = totalNilaiArray($arr1) + totalNilaiArray($arr2);
echo $hasil;
echo "<br>";