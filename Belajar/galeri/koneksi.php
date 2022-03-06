<?php

$db = mysqli_connect("localhost","root","","galeri");  // database connection

if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
    echo "koneksi gagal!";
}

?>
