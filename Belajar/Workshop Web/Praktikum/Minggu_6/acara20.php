<?php
    function cariMax($nilaiA, $nilaiB){
        if($nilaiA > $nilaiB){
            $hasil = $nilaiA;
        } else {
            $hasil = $nilaiB;
        }
        return $hasil;
    }

    $nilai1 = 100;
    $nilai2 = 150;
    echo "<b>Penggunaan fungsi : </b>"."<br>";
    echo "Nilai 1 = ".$nilai1."<br>";
    echo "Nilai 2 = ".$nilai2."<br>";
    $hasil = cariMax($nilai1, $nilai2);
    echo "Nilai Terbesar dari kedua nilai tersebut adalah ".$hasil;
    echo "<hr>";
    

    function ImpGetDate(){
        $tgl = getdate();
        echo '<pre>'; print_r($tgl);echo '</pre>';
        $tanggal = getdate()["mday"];
        $bulan = getdate()["mon"];
        $tahun = getdate()["year"];
        echo "Sekarang Tanggal : ".$tanggal."-".$bulan."-".$tahun;
    }

    echo "<b>Penggunaan fungsi getdate() :</b> "."<br>";
    ImpGetDate();
    echo "<hr>";

    echo "<b>Penggunaan fungsi date() :</b>"."<br>";
    $tgl2 = date("d-F-Y");
    echo $tgl2; 
?>