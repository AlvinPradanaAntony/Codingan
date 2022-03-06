<?php

$db = mysqli_connect("localhost","root","","praktikum_lab");  // database connection

if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
    echo "koneksi gagal!";
}

?>