<?php
  require ('koneksi.php');
  require ('query.php');
  $obj = new crud;
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['txt_email'];
    $pass = $_POST['txt_pass'];
    $name =$_POST['txt_nama'];
    if($obj->insertData($email, $pass, $name)){
      echo '<div class="alert alert-success">Akun Berhasil Dibuat</div>';
    } else{
      echo '<div class="alert alert-danger">Akun Gagal Dibuat</div>';
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  
  <title>Halaman Register</title>
  
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" href="css/styleCustom.css">
</head>

<body class="bg-gradient-primary">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5" style="height: 550px;">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-5 d-none d-lg-block bgDaftar" style="height: 550px;"></div>
              <div class="col-lg-7">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Buat Akun Segera !</h1>
                  </div>
                  <form action="<?php $_SERVER['PHP_SELF']?>" method="POST" class="user">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address"
                      name="txt_email" required>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password"
                      name="txt_pass" required>
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="exampleInputName" placeholder="Fullname"
                      name="txt_nama" required>
                    </div>
                    <button type="submit" name="register" class="btn btn-primary btn-user btn-block">Daftar</button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="login.php">Sudah punya akun ? Silakan login</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/sb-admin-2.min.js"></script>
</body>
</html>
