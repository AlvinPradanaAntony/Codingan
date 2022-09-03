<?php
    $a=4;
    switch ($a){
        case 0 : // Mengecek apakah 4 == 0 ?
            echo "Angka Nol";
            break;
        case 1 : // Mengecek apakah 4 == 1 ?
            echo "Angka Satu";
            break;
        case 2 : // Mengecek apakah 4 == 2 ?
            echo "Angka Dua";
            break;
        case 3 : // Mengecek apakah 4 == 3 ?
            echo "Angka Tiga";
            break;
        case 4 : // Mengecek apakah 4 == 4 ?
            echo "Angka Empat";
            break;
        case 5 : // case tidak dijalankan
            echo "Angka Lima";
            break;
        default : // case tidak dijalankan
            echo "Angka diluar jangkauan";
        break;
    }
?>