<?php
  require ('koneksi.php');
  require ('query.php');
  $obj = new crud;
  
  session_start();
  
  if(isset($_COOKIE['cookie_email'])){
    $cookieEmail = $_COOKIE['cookie_email'];
    $cookiePass = $_COOKIE['cookie_password'];
    $cookieName = $_COOKIE['cookie_name'];
    $queryCookie = $obj->login($cookieEmail);
    while ($row = $queryCookie->fetch(PDO::FETCH_ASSOC)){
      $id = $row['id'];
      $userVal =  $row['user_email'];
      $passVal = $row['user_password'];
      $userName = $row['user_fullname'];
      $level = $row['level'];
    }

    if($userVal==$cookieEmail && $passVal==$cookiePass){
      $_SESSION['email'] = $cookieEmail;
      $_SESSION['pass'] = $cookiePass;
      $_SESSION['name'] = $cookieName;
    }

    if(isset($_SESSION['email'])){
      header('Location: home.php');

    }
  }


  if(isset($_POST['submit'])){
    $email = $_POST['txt_email'];
    $pass = $_POST['txt_pass'];
    $rememberMe = !empty($_POST['check_remember']) ? $_POST['check_remember'] : '';
    if(!empty(trim($email)) && !empty(trim($pass))){
      $query = $obj->login($email);
      $num = $query->rowCount();
      
      while ($row = $query->fetch(PDO::FETCH_ASSOC)){
        $id = $row['id'];
        $userVal =  $row['user_email'];
        $passVal = $row['user_password'];
        $userName = $row['user_fullname'];
        $level = $row['level'];
      }
      
      if ($num != 0){
        if($userVal==$email && $passVal==$pass){
          $_SESSION['id'] = $id;
          $_SESSION['email'] = $userVal;
          $_SESSION['name'] = $userName;
          $_SESSION['pass'] = $passVal;
          $_SESSION['level'] = $level;


          if($rememberMe == 1 ){
            $cookie_name = "cookie_email";
            $cookie_value = $userVal;
            $cookie_time = time() + (60 * 60 * 24); //1 hari
            setcookie($cookie_name, $cookie_value, $cookie_time, "/");

            $cookie_name = "cookie_password";
            $cookie_value = $passVal;
            $cookie_time = time() + (60 * 60 * 24); //1 hari
            setcookie($cookie_name, $cookie_value, $cookie_time, "/");

            $cookie_name = "cookie_name";
            $cookie_value = $userName;
            $cookie_time = time() + (60 * 60 * 24); //1 hari
            setcookie($cookie_name, $cookie_value, $cookie_time, "/");
          }
          // header('Location: home.php?user_fullname='.urlencode($userName));
          header('Location: home.php');
        } else {
          ?>  
          <div class="alert alert-danger" role="alert">User atau password salah !!</div>
          <?php  
            }
        } else {
          ?>  
          <div class="alert alert-danger" role="alert">User tidak ditemukan</div>
          <?php 
          }  
    } else { 
      ?>  
        <div class="alert alert-danger" role="alert">Data tidak boleh kosong !!</div>
      <?php  
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
  
  <title>Halaman Login</title>
  
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
              <div class="col-lg-6 d-none d-lg-block bgLogin" style="height: 550px;"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Selamat Datang!</h1>
                  </div>
                  <form class="user" action=index.php method="POST">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" id="exampleInputEmail" name="txt_email" 
                      aria-describedby="emailHelp" placeholder="Enter Email Address...">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="exampleInputPassword" name="txt_pass" 
                      placeholder="Password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck" name="check_remember" value="1">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">Login</button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="register.php">Buat akun segera!</a>
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
