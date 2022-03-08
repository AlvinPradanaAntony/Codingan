<?php
session_start();
if(!isset($_SESSION["username"]))
{
    header("location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Main Dashboard</title>
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' 
integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
<!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="css/mdb.min.css" rel="stylesheet">
<!-- Your custom styles (optional) -->
<link href="css/style.min.css" rel="stylesheet">

</head>
<body class="grey lighten-3">
  <!--Main Navigation-->
  <header>
    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="navbar-brand waves-effect" href="Dashboard.php">
          <strong class="blue-text">Home</strong>
        </a>
        <!-- Collapse -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left -->
          <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                <a class="nav-link waves-effect" href="Dashboard.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link waves-effect" href="/School_System/User_Admin/admin/" target="_blank"> Attendance All</a>
            </li>
            <li class="nav-item">
              <a class="nav-link waves-effect" href="Tearcher/index.php" target="_blank">Teachers</a>
            </li> 
          </ul>
          <!-- Right -->
          <ul class="navbar-nav nav-flex-icons">
            <li class="nav-item">
              <a href="#" class="nav-link waves-effect" target="_blank">
                <i class="fab fa-facebook-f"style="color:#395599"></i>
              </a>
            </li>
            <li class="nav-item">
              <a href="https://twitter.com/" class="nav-link waves-effect" target="_blank">
                <i class="fab fa-twitter"style="color:#55ADED"></i>
              </a>
            </li>
            <li class="nav-item">
              <a href="logout.php" class="nav-link border border-light rounded waves-effect">
                <i class="far fa-sign-out-alt mr-2"style="color:red;font-weight: bold;"></i>Logout
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Navbar -->
    <!-- Sidebar -->
<div class="sidebar-fixed position-fixed">
  <a class="logo-wrapper waves-effect">
  <img src="img/Logo.png" class="img-fluid" alt=""> </a>
  <div class="list-group list-group-flush">
  <a href="Dashboard.php" class="list-group-item active waves-effect">
  <i class="fas fa-chart-pie mr-3"></i>Dashboard </a>
  <a href="#" class="list-group-item list-group-item-action waves-effect">
  <i class="fas fa-school mr-3"></i>School</a>
  <a href="#" class="list-group-item list-group-item-action waves-effect">
  <i class="fas fa-user mr-3"></i>Profile</a>
  <a href="index.php" class="list-group-item list-group-item-action waves-effect">
  <i class="fas fa-user-friends mr-3"></i>Teacher</a>
  <a href="#" class="list-group-item list-group-item-action waves-effect">
  <i class="fas fa-users mr-3"></i>Student</a>
  <a href="Class.php" class="list-group-item list-group-item-action waves-effect">
  <i class="fa fa-sitemap mr-3"></i>Class</a>
  <a href="#" class="list-group-item list-group-item-action waves-effect">
  <i class="far fa-file-alt mr-3"></i>Subject</a>
  <a href="#" class="list-group-item list-group-item-action waves-effect">
  <i class="fas fa-book-open mr-3"></i>Exam</a>
  <a href="#" class="list-group-item list-group-item-action waves-effect">
  <i class="far fa-check-square mr-3"></i>Attendance</a>
  <a href="#" class="list-group-item list-group-item-action waves-effect">
  <i class="fas fa-user-alt mr-3"></i>Parents</a>
  <a href="Class_Result.php" class="list-group-item list-group-item-action waves-effect">
  <i class="fa fa-signal mr-3"></i>Result</a>
  <a href="#" class="list-group-item list-group-item-action waves-effect">
  <i class="fas fa-user-alt mr-3"></i>Parents</a>
  <a href="#" class="list-group-item list-group-item-action waves-effect">
  <i class="fas fa-book-reader mr-3"></i>Library</a>
  <a href="#" class="list-group-item list-group-item-action waves-effect">
  <i class="fa fa-database mr-3"></i>Database</a>
  <a href="#" class="list-group-item list-group-item-action waves-effect">
  <i class="fa fa-gear mr-3"></i>Setting</a></div>
</div>
<!-- Sidebar -->
</header>
<!--Main layout-->
<main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-5">
      <!-- Heading -->
      <div class="card mb-4 wow fadeIn">
        <!--Card content-->
        <div class="card-body d-sm-flex justify-content-between">
          <h4 class="mb-2 mb-sm-0 pt-1">
            <a href="#">Home Page</a>
            <span>/</span>
            <span>Dashboard</span>
          </h4>
          <form class="d-flex justify-content-center">
            <!-- Default input -->
            <input type="search" placeholder="Type your Search.." aria-label="Search" class="form-control" required>
            <button class="btn btn-primary btn-sm my-0 p" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </form>
        </div>
      </div>
        <!--Card content-->
        <div class="card-body">
        <!-- First row-->
            <div class="row">
            <!--First column-->
            <div class="col-md-3">
                <div class="card">
                    <a href="#Result" style="text-align:center;font-size:400%;text-align:center;" ><i class="fa fa-school one"></i></a>
                    <h2 class="text-center mb-3">School All</h2>
                    <a class="list-group-item list-group-item-action waves-effect">School
                    <span class="badge badge-success badge-pill pull-right">7 MAKARA</span> </a>
                </div>
            </div>
   <!--Display_Cheather-->
  <div class="col-md-3">
        <div class="card">
            <a href="teacher.php" style="text-align:center;font-size:400%;text-align:center;" ><i class="fa fa-user-friends one"></i></a>
            <h2 class="text-center mb-3">Teachers All</h2>
            <a class="list-group-item list-group-item-action waves-effect">Teachers
            <span class="badge badge-success badge-pill pull-right">22</span> </a>
        </div>
    </div>
    <!--Display_Student-->
    <div class="col-md-3">
        <div class="card">
            <a href="#" style="text-align:center;font-size:400%;text-align:center;" ><i class="fa fa-users one"></i></a>
            <h2 class="text-center mb-3">Student All</h2>
            <a class="list-group-item list-group-item-action waves-effect">Student
            <span class="badge badge-success badge-pill pull-right">All</span> </a>
        </div>
    </div>
    <!--First column-->
    <div class="col-md-3">
        <div class="card">
            <a href="Class.php" style="text-align:center;font-size:400%;text-align:center" ><i class="fa fa-sitemap one"></i></a>
            <h2 class="text-center mb-3">Class All</h2>
            <a class="list-group-item list-group-item-action waves-effect">Class
            <span class="badge badge-danger badge-pill pull-right">5</span></a>
        </div>
    </div>
    <!--First column-->
    <div class="col-md-3">
        <div class="card">
            <a href="#Result" style="text-align:center;font-size:400%;text-align:center; " ><i class="fa fa-file-alt one" class="img-fluid z-depth-1"></i></a>
            <h2 class="text-center mb-3">Subject All</h2>
            <a class="list-group-item list-group-item-action waves-effect">Subject
            <span class="badge badge-success badge-pill pull-right">10</span> </a>
        </div>
    </div>
    <!--First column-->
    <div class="col-md-3">
        <div class="card">
            <a href="#Result" style="text-align:center;font-size:400%;text-align:center;" ><i class="fa fa-book-open one" class="img-fluid z-depth-1"></i></a>
            <h2 class="text-center mb-3">Exame</h2>
            <a class="list-group-item list-group-item-action waves-effect">Exame
            <span class="badge badge-primary badge-pill pull-right"> Final 1
            </span><span class="badge badge-success badge-pill pull-right"> Mid Term 2 </span></a>
            
        </div>
    </div>
    <!--Attendance-->
    <div class="col-md-3">
        <div class="card">
            <a href="/School_System/User_Admin/admin/" style="text-align:center;font-size:400%;text-align:center;" ><i class="fa fa-check-square one" class="img-fluid z-depth-1"></i></a>
            <h2 class="text-center mb-3">Attendance All</h2>
            <a class="list-group-item list-group-item-action waves-effect">Attendance
            <span class="badge badge-danger badge-pill pull-right"> <i class="	fa fa-close ml-1"></i> 20
            </span><span class="badge badge-success badge-pill pull-right"> <i class="fa fa-check ml-1"></i> 50 </span></a>
        </div>
    </div>      
    <!--First column-->
    <div class="col-md-3">
        <div class="card">
            <a href="#Result" style="text-align:center;font-size:400%;text-align:center;" ><i class="fa fa-user-alt one" class="img-fluid z-depth-1"></i></a>
            <h2 class="text-center mb-3">Parents All</h2>
            <a class="list-group-item list-group-item-action waves-effect">Parents
            <span class="badge badge-success badge-pill pull-right">60</span> </a>
        </div>
    </div>
    <!--First column-->
    <div class="col-md-3">
        <div class="card">
            <a href="Class_Result.php" style="text-align:center;font-size:400%;text-align:center; " ><i class="fa fa-signal one" class="img-fluid z-depth-1"></i></a>
            <h2 class="text-center mb-3">Result All</h2>
            <a class="list-group-item list-group-item-action waves-effect">Result
            <span class="badge badge-primary badge-pill pull-right"> Pass 50
            </span> <span class="badge badge-danger badge-pill pull-right"> Fail 2 </span></a>
        </div>
    </div>
    <!--First column-->
    <div class="col-md-3">
        <div class="card">
            <a href="#Result" style="text-align:center;font-size:400%;text-align:center;" ><i class="fa fa-book-reader one" class="img-fluid z-depth-1"></i></a>
            <h2 class="text-center mb-3">Library</h2>
            <a class="list-group-item list-group-item-action waves-effect">Book
            <span class="badge badge-danger badge-pill pull-right">10</span></a>
         </div>
    </div>
    <!--First column-->
    <div class="col-md-3">
        <div class="card">
            <a href="#Result" style="text-align:center;font-size:400%;text-align:center;" ><i class="fa fa-database one" class="img-fluid z-depth-1"></i></a>
            <h2 class="text-center mb-3">Database</h2>
            <a class="list-group-item list-group-item-action waves-effect">Name Database
            <span class="badge badge-success badge-pill pull-right">20</span> </a>
        </div>
    </div>
    <!--First column-->
    <div class="col-md-3">
        <div class="card">
            <a href="#Result" style="text-align:center;font-size:400%;text-align:center;" ><i class="fa fa-gear one" class="img-fluid z-depth-1"></i></a>
            <h2 class="text-center mb-3">Setting</h2>
            <a class="list-group-item list-group-item-action waves-effect">Logout
            <span class="badge badge-success badge-pill pull-right">Admin</span> </a>
        </div>
    </div>
    <!--Fourth column-->
</div>
<!-- /.First row-->
</div>
</div>
<!--/.Card-->
</div>
<!--Grid column-->
</div>
<!--Grid row-->
</div>
</main>
<!--Main layout-->
<!--Footer-->
<footer class="page-footer text-center font-small primary-color-dark darken-2 mt-4 wow fadeIn">
<!--Call to action-->
<div class="pt-4">
    <a class="btn btn-outline-white" href="#"role="button">Download<i class="fas fa-download ml-2"></i></a>
    <a class="btn btn-outline-white" href="#" role="button">Start free tutorial<i class="fas fa-graduation-cap ml-2"></i></a>
</div>
<!--/.Call to action-->
<hr class="my-4">
<!-- Social icons -->
<div class="pb-4">
    <a href="#" target="_blank">
    <i class="fab fa-facebook-f mr-3"></i>
    </a>
    <a href="#" target="_blank">
    <i class="fab fa-twitter mr-3"></i>
    </a>
    <a href="https://www.youtube.com/channel/UC3hmSvBOttz62UEkfHLxu5Q" target="_blank">
    <i class="fab fa-youtube mr-3"></i>
    </a>
    <a href="#" target="_blank">
    <i class="fab fa-google-plus mr-3"></i>
    </a>
</div>
<!-- Social icons -->
<!--Copyright-->
<div class="footer-copyright py-3">© 2019 Copyright:
    <a href="https://soengsouy.blogspot.com/" target="_blank">SoengSouy.com </a>
</div>
<!--/.Copyright-->
</footer>
<!--/.Footer-->
</body>
</html>

