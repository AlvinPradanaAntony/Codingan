<?php
    // Percabangan If
    // $inputHewan = "anjing";
    // if($inputHewan == "anjing"){
    //     echo "Suara hewan ".$inputHewan." = Whof wooff wof...";
    // }
    // if($inputHewan == "kucing"){
    //     echo "Suara hewan ".$inputHewan." = Meong meong meong...";
    // }
    // if($inputHewan == "sapi"){
    //     echo "Suara hewan ".$inputHewan." = Mow meoew.. moooww....";
    // }
    // echo "<br>";

    // // Percabangan If-Else
    // $inputSuhu = "35";
    // if($inputSuhu > 37){
    //     echo "Suhu badan panas (demam)";
    // } else{
    //     echo "Suhu badan keadaan normal";
    // }
    // echo "<br>";

    // // Percabangan If- Else IF
    // $inputNilai = 85;
    // if($inputNilai > 100){
    //     echo "Nilai berlebihan";
    // } else if ($inputNilai >= 90){
    //     echo "Akreditasi A"."<br>";
    // } else if($inputNilai >= 80) {
    //     echo "Akreditasi B"."<br>";
    // } else if($inputNilai >= 75) {
    //     echo "Akreditasi C"."<br>";
    // } else if($inputNilai >= 50) {
    //     echo "Akreditasi D"."<br>";
    // } else if($inputNilai >= 45) {
    //     echo "Akreditasi E"."<br>";
    // } else {
    //     echo "Silakan beljar kembali !!!";
    // } 
    // echo "<br>";

    // // Percabnagan Nested IF
    // $username = "admin";
    // $password = "admin123";
    // $akunName = "Alvin Pradana Antony";

    // if($username == "admin"){
    //     if($password == "admin123"){
    //         echo "<h2>Selamat datang di File PHP ini ".$akunName."</h2>";
    //     } else {
    //         echo "<p>Password salah, coba lagi!</p>";
    //     }
    // } else {
    //     echo "<p>Username salah, coba lagi!</p>";
    // }
    // echo "<br>";


    // Switch case
    $input = 2;
    switch ($input){
        case 1 :
            echo "Home";
        break;
        case 2 :
            echo "Data bus";
        break;
        case 3 :
            echo "Penjualan ticket";
        break;
        case 4 :
            echo "Jadwal Keberangkatan";
        break;
        case 5 :
            echo "Login";
        default:
        echo "Tidak ada menu";
    }
?>