<?php
require ('koneksi.php');
require ('query.php');
$obj = new crud;
session_start();
if(!$obj->detailData($_GET['id'])) die ("Error: Id tidak ada");
    if($obj->delete($obj->id)){
        // Sweetalert2
        $_SESSION['info'] = 'Dihapus';
		header('Location: home.php');
        
        // Alert 
        // $_SESSION['statusHapus'] = "Hapus Berhasil";
        //     header('Location: home.php');
    } else {
        // Sweetalert2
        $_SESSION['info'] = 'Gagal Dihapus';
        header('Location: home.php');

        // Alert
        // $_SESSION['statusHapus'] = "Hapus Berhasil";
        // header('Location: home.php');
    }

?>