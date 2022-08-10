<?php

$db = mysqli_connect("localhost","root","","db_galeri");  // database connection

if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
    echo "koneksi gagal!";
}

?>
