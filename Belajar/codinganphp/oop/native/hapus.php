<?php
require ('koneksi.php');
$id =$_GET['id'];

$query = "DELETE FROM user_detail WHERE id='$id'";
$result = mysqli_query($koneksi, $query);

header('Location: home.php');
?>