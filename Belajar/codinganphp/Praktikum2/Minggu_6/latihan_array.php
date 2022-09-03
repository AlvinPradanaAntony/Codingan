<?php
    function arrayWithKey(){
        $nama = array(
            1=>"Alvin",
            2=>"Tony",
            3=>"Kevin",
            4=>"Dewi",
            5=>"Sari");
           //cara akses array
           echo $nama[1]; //Alvin
           echo "<br />";
           echo $nama[2]; //Tony
           echo "<br />";
           echo $nama[3]; //Kevin
    }

    function arrayWithoutKey(){
        $nama = array("Alvin","Tony","Kevin","Dewi","Sari");
        //cara akses array
        echo $nama[1]; //Tony
        echo "<br />";
        echo $nama[2]; //Kevin
        echo "<br />";
        echo $nama[3]; //Dewi
    }

    function arrayWithoutTypeDataArray(){
        $nama = ["Alvin","Tony","Kevin","Dewi","Sari"];
        //cara akses array
        echo $nama[1]; //Tony
        echo "<br />";
        echo $nama[2]; //Kevin
        echo "<br />";
        echo $nama[3]; //Dewi  
    }

    function arrayWithCombineTypeData(){
        // pembuatan array
        $coba = array (
            2=>"Alvin",
            "dua"=>"Tony",
            'tiga'=>3,
            true=>true,
            9=>"sembilan",);
        // pengaksesan array
        echo $coba[2]; //Andri
        echo "<br />";
        echo $coba["dua"]; //2
        echo "<br />";
        echo $coba['tiga']; //3
        echo "<br />";
        echo $coba[true]; //1 (true di konversi menjadi 1)
        echo "<br />";
        echo $coba[9]; // sembilan
    }

    // Membuat Array dengan Key
    echo "<b>Membuat Array dengan key</b>"."<br>";
    echo '<pre>'."\$nama = array(
            1=>\"Alvin\",
            2=>\"Tony\",
            3=>\"Kevin\",
            4=>\"Dewi\",
            5=>\"Sari\");".
        '</pre>'; 
    echo "<b>Hasil array : </b>"."<br>";
    arrayWithKey();
    echo "<br>"."<hr>";    

    // Membuat Array tanpa Key
    echo "<b>Membuat Array tanpa key</b>"."<br>";
    echo '<pre>'."\$nama = array(\"Alvin\",\"Tony\",\"Kevin\",\"Dewi\",\"Sari\");".'</pre>'; 
    echo "<b>Hasil array : </b>"."<br>";
    arrayWithoutKey();
    echo "<br>"."<hr>";

    // Membuat Array tanpa tipedata array
    echo "<b>Membuat Array tanpa menuliskan tipe data array </b>"."<br>";
    echo '<pre>'."\$nama = [\"Alvin\",\"Tony\",\"Kevin\",\"Dewi\",\"Sari\"];".'</pre>'; 
    echo "<b>Hasil array : </b>"."<br>";
    arrayWithoutTypeDataArray();
    echo "<br>"."<hr>";

    // Pengggunaan array dengan kombinasi tipe data
    echo "<b>Pengggunaan array dengan kombinasi tipe data</b>"."<br>";
    echo '<pre>'."\$nama = array(
            1=>\"Alvin\",
            \"dua\"=>\"Tony\",
            'tiga'=>3,
            true=>true,
            9=>\"Sembilan\");".
    '</pre>'; 
    echo "<b>Hasil array : </b>"."<br>";
    arrayWithCombineTypeData();
    echo "<br>"."<hr>";


?>