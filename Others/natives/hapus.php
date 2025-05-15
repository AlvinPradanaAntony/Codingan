<?php
require ('koneksi.php');
require ('query.php');

$id = $_GET['id'];
$obj = new crud;

if(!$obj->detailData($_GET['id'])) die("Error : id tidak ada");
    if($obj->delete($obj->id)):
        echo '<div class="alert alert-success">Data berhasil disimpan</div>';
    else:
        echo '<div class="alert alert-danger">Data gagal disimpan</div>';
    endif;
?>