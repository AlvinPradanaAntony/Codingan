<?php
    // Fungsi penjumlahan Matriks 3x3
    function penjumlahanMatriks($a, $b){
        for ($i=0; $i < 3; $i++) {
            echo "[";
            for ($j= 0; $j < 3; $j++) {
                $hasil[$i][$j] = $a[$i][$j] + $b[$i][$j];
              echo $hasil[$i][$j]. " ";
            };
              echo "]<br>";
          }
    }

    $matriks_A = [
        [1,1,1],
        [2,2,2],
        [3,3,3]
    ];

    $matriks_B = [
        [3,3,3],
        [2,2,2],
        [1,1,1]
    ];
    $hasil = [[],[]];

    // Mencetak hasil penjumlahan matriks A dan Matriks B
    echo "<b>Hasil Penjumlahan Matriks 3x3</b>"."<br>";
    echo penjumlahanMatriks($matriks_A, $matriks_B);
    echo "<br>";
?>