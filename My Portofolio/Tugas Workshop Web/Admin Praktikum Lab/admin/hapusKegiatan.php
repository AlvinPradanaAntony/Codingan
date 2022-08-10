<?php
require ('koneksi.php');
require ('query.php');
$obj = new crud;

if(!$obj->detailDataKegiatan($_GET['id'])) die ("Error: Id tidak ada");
    if($obj->deleteKeg($obj->id)){
        echo '<div class="alert alert-success">Data Berhasil disimpan</div>';
        header("Location: tables_kegiatan.php");
    } else {
        echo '<div class="alert alert-success">Data gagal disimpan</div>';
        header("Location: tables_kegiatan.php");
    }

?>