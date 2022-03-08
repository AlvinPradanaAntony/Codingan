
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
<title>Class - A</title>
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' 
integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/form-doc.css">
<link href='https://fonts.googleapis.com/css?family=Bayon|Francois+One' rel='stylesheet' type='text/css'>
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
              <a class="nav-link waves-effect" href="/School_System/User_Admin/admin/" target="_blank">Attendance All</a>
            </li>
            <li class="nav-item">
              <a class="nav-link waves-effect" href="Tearcher/index.php" target="_blank">Teachers</a>
            </li>
            <li class="nav-item">
              <a class="nav-link waves-effect" href="#"target="_blank">Students</a>  
            </li>
            <li class="nav-item">
              <a class="nav-link waves-effect" href="/School_System/Class.php" target="_blank">Class</a>
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
  <a href="#" class="list-group-item list-group-item-action waves-effect">
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
            <a href="Class.php">Home Page</a>
            <span>/</span>
            <span>Class A </span>
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
<style>  
 .card{
   position: relative;
    width: 100%;
  /* padding-right: 15px; */
   margin: 15px;
  }</style>
            <!--Card content-->
            <div class="card-body">
              <!-- First row-->
              <div class="row">
                <!--First column-->
<!-- Card -->
<div class="card mx-xl-5">
    <!-- Card body -->
    <div class="card-body">
     <!-- Default form subscription -->
                    
     <form action="Class_A.php"method="POST">
    <p class="h4 text-center py-4" style="font-family: 'Francois One','Bayon'; font-size: 16px;">Plus​ Score</p>
    <div class="row">
    <div class="col-md-1 select-outline">
    <label for="defaultFormCardNameEx" class="grey-text font-weight-light"
     style="font-family: 'Francois One','Bayon'; font-size: 16px;"> Division Number</label>
     <input type="text" name="option" id="option" class="form-control form-control-sm" required>
     <br>
     </div>
     </div>
          <!--Studen Name-->
            <div class="form-row">
            <div class="form-group col-md-4">
            <label for="defaultFormCardNameEx" class="grey-text font-weight-light"
            style="font-family: 'Francois One','Bayon'; font-size: 16px;">Studen Name</label>
            <input type="text"name="Student_Name" id="Student_Name" class="form-control form-control-sm" required​>
            </div>
           <!--Sex-->
            <div class="form-group col-md- 1">
            <label for="defaultFormCardNameEx" class="grey-text font-weight-light"
            style="font-family: 'Francois One','Bayon'; font-size: 16px;">Sex</label>
           <select class="form-control form-control-sm"  name="Sex" required>
           <option value=""style="font-family: 'Francois One','Bayon'; font-size: 16px;"></option>
           <option value="Male"style="font-family: 'Francois One','Bayon'; font-size: 16px;">Male</option>
           <option value="Female"style="font-family: 'Francois One','Bayon'; font-size: 16px;">Female</option>
           </select>
           </div>
         
           <div class="form-group col-md- 1">
           <label for="defaultFormCardNameEx" class="grey-text font-weight-light"
            style="font-family: 'Francois One','Bayon'; font-size: 16px;">Class</label>
           <select class="form-control form-control-sm"  name="Grand" required>
           <option value="Class A"style="font-family: 'Francois One','Bayon'; font-size: 16px;">Class A </option>
           </select>
            </div>
            </div>
            <!--Khmer-->
            <div class="form-row">
            <div class="form-group col-md-3">
            <label for="defaultFormCardNameEx" class="grey-text font-weight-light"
            style="font-family: 'Francois One','Bayon'; font-size: 16px;">Khmer</label>
            <input type="text"name="Khmer" id="Khmer" class="form-control form-control-sm"​ required>
            </div>
            <!--Mathematics-->
            <div class="form-group col-md-3">
            <label for="defaultFormCardNameEx" class="grey-text font-weight-light"
            style="font-family: 'Francois One','Bayon'; font-size: 16px;">Mathematics</label>
            <input type="text" name="Mathematics" id="Mathematics" class="form-control form-control-sm" required>
            </div>
             <!--Physics-->
            <div class="form-group col-md-3">
            <label for="defaultFormCardNameEx" class="grey-text font-weight-light"
            style="font-family: 'Francois One','Bayon'; font-size: 16px;">Physics</label>
            <input type="text" name="Physics" id="Physics" class="form-control form-control-sm" required>
            </div> 
            <!--Chemistry-->
            <div class="form-group col-md-3">
            <label for="defaultFormCardNameEx" class="grey-text font-weight-light"
            style="font-family: 'Francois One','Bayon'; font-size: 16px;">Chemistry</label>
            <input type="text" name="Chemistry" id="Chemistry" class="form-control form-control-sm" required>
            </div>
            </div>
            <!--Biology-->
            <div class="form-row">
            <div class="form-group col-md-3">
            <label for="defaultFormCardNameEx" class="grey-text font-weight-light" 
            style="font-family: 'Francois One','Bayon'; font-size: 16px;">Biology</label>
            <input type="text" name="Biology" id="Biology" class="form-control form-control-sm" required>
            </div>
            <!--English-->
            <div class="form-group col-md-3">
            <label for="defaultFormCardNameEx" class="grey-text font-weight-light" 
            style="font-family: 'Francois One','Bayon'; font-size: 16px;">English</label>
            <input type="text" name="English" id="English" class="form-control form-control-sm" required>
            </div>
            <!--C_Programe-->
            <div class="form-group col-md-3">
            <label for="defaultFormCardNameEx" class="grey-text font-weight-light" 
            style="font-family: 'Francois One','Bayon'; font-size: 16px;">C_Programe</label>
            <input type="text" name="C_Program" id="C_Program" class="form-control form-control-sm" required>
            </div>
            <!--C++_Programe-->
            <div class="form-group col-md-3">
            <label for="defaultFormCardNameEx" class="grey-text font-weight-light" 
            style="font-family: 'Francois One','Bayon'; font-size: 16px;">C++_Programe</label>
            <input type="text" name="CC_Program" id="CC_Program" class="form-control form-control-sm" required>
            </div>
            </div>
            ​​​​​​​​​​​​​<!--Calculate-->
             <div class="text-center py-6 mt-6">
             <input type="submit"name="submit" class="btn btn-outline-purple" value="Calculate" style="font-family: 'Francois One','Bayon'; font-size: 14px;"></i>
            </div>
         </form>
<?php
// Connect to talable
$connect = mysqli_connect("localhost", "root", "", "system_school"); 
mysqli_set_charset($connect,"utf8");
if(isset($_POST["submit"]))  
 { 
   $option = $_POST['option'];
   $Student_Name = $_POST['Student_Name'];
   $Sex = $_POST['Sex'];
   $Grand = $_POST['Grand'];
   $Khmer = $_POST['Khmer'];
   $Mathematics = $_POST['Mathematics'];
   $Physics = $_POST['Physics'];
   $Chemistry = $_POST['Chemistry'];
   $Biology = $_POST['Biology'];
   $English = $_POST['English'];
   $C_Program = $_POST['C_Program'];
   $CC_Program = $_POST['CC_Program'];
   //Total_Score
   $Total_Score = $Khmer + $Mathematics + $English + $Physics
   + $Chemistry + $Biology + $C_Program + $CC_Program;
   //Average
   $Average = $Total_Score/$option ; 
   $Grade ='';
  //Display Result
 echo "<table class='table table-sm'>";
 echo"<thead>";
 echo "<td>Student Name</td>";
 echo "<td>Sex</td>";
 echo "<td>Class</td>";
 echo "<td>Khmer</td>";
 echo "<td>Mathematics</td>";
 echo "<td>Physics</td>";
 echo "<td>Chemistry</td>";
 echo "<td>Biology</td>"; 
 echo "<td>English</td>";      
 echo "<td>C_Programe</td>";      
 echo "<td>C++_Program</td>";      
 echo "<td>Total_Score</td>";
 echo "<td>Average</td>";
 echo "<td>Grade</td>";
 echo" </thead>";
 echo "<tr>";
 
echo "<td>$Student_Name</td>";
echo "<td>$Sex</td>";
echo "<td>$Grand</td>";
echo "<td>$Khmer</td>";
echo "<td>$Mathematics</td>";
echo "<td>$Physics</td>";
echo "<td>$Chemistry</td>";
echo "<td>$Biology</td>";
echo "<td>$English</td>";
echo "<td>$C_Program</td>";
echo "<td>$CC_Program</td>";
echo "<td>$Total_Score</td>";
echo "<td>$Average</td>";
    if($Average >= 85){
    echo "<td>$Grade A </td>";
            $Grade ='A'; 
    }
    elseif ($Average >= 75 && $Average<85) {
    echo "<td>$Grade B </td>";
            $Grade ='B'; 
    }
    elseif ($Average >= 65 && $Average<75) {
    echo "<td>$Grade C </td>"; 
            $Grade ='C';
    }
    elseif ($Average >= 55 && $Average <65) {
    echo "<td>$Grade D </td>"; 
            $Grade ='D';
    }
    elseif ($Average>=50 && $Average <55) {
    echo "<td>$Grade E </td>";
            $Grade ='E';  
    }
    elseif ($Average < 50) {
    echo "<td>$Grade Fall </td>"; 
            $Grade ='Fall';
    }
    
    $query ="INSERT INTO `tble_class_a`(`Student_Name`, `Sex`, `Grand`, `Khmer`, `Mathematics`, `Physics`, `Chemistry`,
     `Biology`, `English`, `C_Program`, `C++_Program`, `Total_Score`, `Average`, `Grade`)
    VALUES('$Student_Name','$Sex','$Grand','$Khmer','$Mathematics','$Physics','$Chemistry','$Biology','$English','$C_Program','$CC_Program','$Total_Score','$Average','$Grade')";                           
    mysqli_query($connect,$query);
}
 echo "</tr>";
 echo "</table>";
 echo "<form action='Class_A.php' method='post'>";
  ?>
    <div class="text-center py-12 mt-12">
        <input type="submit"name="save" class="btn btn-outline" value="Save" style="font-family: 'Francois One','Bayon'; font-size: 16px;"></i>
    </div>
  <?php
  echo "</form>";
  ?>
</div> 
</div>
  </main>
  <!--Main layout-->
  <!--Footer-->
  <footer class="page-footer text-center font-small primary-color-dark darken-2 mt-4 wow fadeIn">

    <!--Call to action-->
    <div class="pt-4">
      <a class="btn btn-outline-white" href="#" target="_blank"
        role="button">Download
      
        <i class="fas fa-download ml-2"></i>
      </a>
      <a class="btn btn-outline-white" href="#" target="_blank" role="button">Start
        free tutorial
        <i class="fas fa-graduation-cap ml-2"></i>
      </a>
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
    <div class="footer-copyright py-3">
      © 2019 Copyright:
      <a href="https://soengsouy.blogspot.com/" target="_blank"> SoengSouy.com </a>
    </div>
    <!--/.Copyright-->

  </footer>
  <!--/.Footer-->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();

  </script>

  <!-- Charts -->
  <script>
    // Line
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
        datasets: [{
          label: '# of Votes',
          data: [12, 19, 3, 5, 2, 3],
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)'
          ],
          borderColor: [
            'rgba(255,99,132,1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });

    //pie
    var ctxP = document.getElementById("pieChart").getContext('2d');
    var myPieChart = new Chart(ctxP, {
      type: 'pie',
      data: {
        labels: ["Red", "Green", "Yellow", "Grey", "Dark Grey"],
        datasets: [{
          data: [300, 50, 100, 40, 120],
          backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
          hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
        }]
      },
      options: {
        responsive: true,
        legend: false
      }
    });


    //line
    var ctxL = document.getElementById("lineChart").getContext('2d');
    var myLineChart = new Chart(ctxL, {
      type: 'line',
      data: {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [{
            label: "My First dataset",
            backgroundColor: [
              'rgba(105, 0, 132, .2)',
            ],
            borderColor: [
              'rgba(200, 99, 132, .7)',
            ],
            borderWidth: 2,
            data: [65, 59, 80, 81, 56, 55, 40]
          },
          {
            label: "My Second dataset",
            backgroundColor: [
              'rgba(0, 137, 132, .2)',
            ],
            borderColor: [
              'rgba(0, 10, 130, .7)',
            ],
            data: [28, 48, 40, 19, 86, 27, 90]
          }
        ]
      },
      options: {
        responsive: true
      }
    });


    //radar
    var ctxR = document.getElementById("radarChart").getContext('2d');
    var myRadarChart = new Chart(ctxR, {
      type: 'radar',
      data: {
        labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"],
        datasets: [{
          label: "My First dataset",
          data: [65, 59, 90, 81, 56, 55, 40],
          backgroundColor: [
            'rgba(105, 0, 132, .2)',
          ],
          borderColor: [
            'rgba(200, 99, 132, .7)',
          ],
          borderWidth: 2
        }, {
          label: "My Second dataset",
          data: [28, 48, 40, 19, 96, 27, 100],
          backgroundColor: [
            'rgba(0, 250, 220, .2)',
          ],
          borderColor: [
            'rgba(0, 213, 132, .7)',
          ],
          borderWidth: 2
        }]
      },
      options: {
        responsive: true
      }
    });

    //doughnut
    var ctxD = document.getElementById("doughnutChart").getContext('2d');
    var myLineChart = new Chart(ctxD, {
      type: 'doughnut',
      data: {
        labels: ["Red", "Green", "Yellow", "Grey", "Dark Grey"],
        datasets: [{
          data: [300, 50, 100, 40, 120],
          backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
          hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
        }]
      },
      options: {
        responsive: true
      }
    });

  </script>

  <!--Google Maps-->
  <script src="https://maps.google.com/maps/api/js"></script>
  <script>
    // Regular map
    function regular_map() {
      var var_location = new google.maps.LatLng(40.725118, -73.997699);

      var var_mapoptions = {
        center: var_location,
        zoom: 14
      };

      var var_map = new google.maps.Map(document.getElementById("map-container"),
        var_mapoptions);

      var var_marker = new google.maps.Marker({
        position: var_location,
        map: var_map,
        title: "New York"
      });
    }

    new Chart(document.getElementById("horizontalBar"), {
      "type": "horizontalBar",
      "data": {
        "labels": ["Red", "Orange", "Yellow", "Green", "Blue", "Purple", "Grey"],
        "datasets": [{
          "label": "My First Dataset",
          "data": [22, 33, 55, 12, 86, 23, 14],
          "fill": false,
          "backgroundColor": ["rgba(255, 99, 132, 0.2)", "rgba(255, 159, 64, 0.2)",
            "rgba(255, 205, 86, 0.2)", "rgba(75, 192, 192, 0.2)",
            "rgba(54, 162, 235, 0.2)",
            "rgba(153, 102, 255, 0.2)", "rgba(201, 203, 207, 0.2)"
          ],
          "borderColor": ["rgb(255, 99, 132)", "rgb(255, 159, 64)", "rgb(255, 205, 86)",
            "rgb(75, 192, 192)", "rgb(54, 162, 235)", "rgb(153, 102, 255)",
            "rgb(201, 203, 207)"
          ],
          "borderWidth": 1
        }]
      },
      "options": {
        "scales": {
          "xAxes": [{
            "ticks": {
              "beginAtZero": true
            }
          }]
        }
      }
    });

  </script>
</body>

</html>






