<?php
    require("../koneksi.php");
    
    $id = $_GET['id'];
    $tampil = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM kegiatan WHERE id='$id'"));
    $image = "../img/" . $tampil['img'];
    unlink($image);
    mysqli_query($koneksi, "DELETE FROM kegiatan WHERE id='$id'")or die(mysql_error());
    header("location:index.php")
?>