<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "praktikum_lab1";
    $koneksi = mysqli_connect($server, $username, $password, $db);

    if(mysqli_connect_errno()) {
        echo "koneksi gagal : ".mysqli_connect_error();
    }
?>