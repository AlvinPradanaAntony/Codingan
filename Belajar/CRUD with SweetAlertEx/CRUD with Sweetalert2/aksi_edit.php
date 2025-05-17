<?php
session_start();
require('config.php');

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $nama = $_POST['txt_nama'];
    $email = $_POST['txt_email'];
    $username = $_POST['txt_username'];
    $jabatan = $_POST['txt_jabatan'];

    $query = "UPDATE user SET usr_nama='$nama', usr_email='$email', usr_username='$username', usr_jabatan='$jabatan' WHERE usr_id=$id";
    $update = mysqli_query($koneksi, $query);

    if($update){
        $_SESSION['info'] = 'Diubah';
    } else {
        $_SESSION['info'] = 'Gagal Diubah';
    }
    header('Location: index.php');
}
?>