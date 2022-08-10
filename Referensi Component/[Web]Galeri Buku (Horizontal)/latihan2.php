<!DOCTYPE html>
<html lang="en">
<head>
  <title>Mari Belajar Coding</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <?php include "koneksi.php"; ?>
</head>
<body>

<div class="container" align="center">
    <h2><b>Menampilkan Data Kesamping dengan PHP (Bootstrap)</b></h2>
    <h4><b>Data Buku</b></h4>
    <?php
      $kolom = 3;    
      $i=1;       
      $query=mysqli_query($db, "SELECT * FROM buku");
      while ($data=mysqli_fetch_array($query)) {
        if(($i) % $kolom== 1) {    
        echo'<div class="row">';     
        }  
        echo '<div class="col-sm-4"><img class="img-thumbnail" src="img/'.$data['gambar'].'" width="50%" /><br><b>'.$data['nama_buku'].'<br>'.$data['id_buku'].'</b></div>';
        if(($i) % $kolom== 0) {    
        echo'</div>';        
        }
      $i++;
      }
      ?>
    <br>
    <h3><a href="https://www.maribelajarcoding.com/" target="_blank">www.maribelajarcoding.com</a> </h3> <br><br>
</div>

</body>
</html>
