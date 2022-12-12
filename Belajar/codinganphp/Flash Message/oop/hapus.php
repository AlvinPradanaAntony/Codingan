<?php
require ('koneksi.php');
require ('query.php');
$obj = new crud;
session_start();
if(!$obj->detailData($_GET['id'])) die ("Error: Id tidak ada");
    if($obj->delete($obj->id)){
        $_SESSION['statusHapus'] = "Hapus Berhasil";
            header('Location: home.php');
    } else {
        $_SESSION['statusHapus'] = "Hapus Berhasil";
        header('Location: home.php');
    }

?>