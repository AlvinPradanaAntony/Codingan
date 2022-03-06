<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
    <!-- Font Awesome -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
      rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
      rel="stylesheet"
    />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="styleFuturic2.css">
    </head>


    <body>
   
    <div class="page">

        <div class="sidebar">
            <div class="sidebar-header">
                <div class="sidebar-logo-container">
                    <div class="logo-container">
                        <img class="logo-sidebar" src="assets/img/logo.png" />
                    </div>
                    <div class="brand-name-container">
                        <p class="brand-name">
                            Futuric<br />
                            <span class="brand-subname">
                                Workspace
                            </span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="sidebar-body">
                <ul class="navigation-list">
                    <li class="navigation-list-item">
                        <a class="navigation-link" href="/">
                            <div class="row">
                                <div class="col-2">
                                    <i class="fas fa-tachometer-alt"></i>
                                </div>
                                <div class="col-9">
                                    Dashboard
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="navigation-list-item">
                        <a class="navigation-link" href="/">
                            <div class="row">
                                <div class="col-2">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div class="col-9">
                                    Teams
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="navigation-list-item active">
                        <a class="navigation-link" href="/">
                            <div class="row">
                                <div class="col-2">
                                    <i class="fas fa-comments"></i>
                                </div>
                                <div class="col-9">
                                    Chat
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="navigation-list-item">
                        <a class="navigation-link" href="/">
                            <div class="row">
                                <div class="col-2">
                                    <i class="fas fa-chart-pie"></i>
                                </div>
                                <div class="col-9">
                                    Analytics
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="navigation-list-item">
                        <a class="navigation-link" href="/">
                            <div class="row">
                                <div class="col-2">
                                    <i class="fas fa-calendar-alt"></i>
                                </div>
                                <div class="col-9">
                                    Calendar
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="navigation-list-item">
                        <a class="navigation-link" href="/">
                            <div class="row">
                                <div class="col-2">
                                    <i class="fas fa-address-book"></i>
                                </div>
                                <div class="col-9">
                                    Contacts
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
                <hr style="color:rgb(255, 255, 255);margin-top:30px;">
                <div class="teams-title-container">
                    <p class="teams-title">TEAMS</p>
                </div>
                <ul class="teams-list">
                    <li class="teams-item">
                        <div class="row">
                            <div class="col-1">
                                <i class="fas fa-circle" style="color: rgb(255, 92, 160, 0.8);"></i>
                            </div>
                            <div class="col-9">
                                Marketing
                            </div>
                        </div>
                    </li>
                    <li class="teams-item">
                        <div class="row">
                            <div class="col-1">
                                <i class="fas fa-circle" style="color: rgb(36, 115, 242, 0.8);"></i>
                            </div>
                            <div class="col-9">
                                Development
                            </div>
                        </div>
                    </li>
                    <li class="teams-item">
                        <div class="row">
                            <div class="col-1">
                                <i class="fas fa-circle" style="color: rgb(51, 242, 105, 0.8);"></i>
                            </div>
                            <div class="col-9">
                                Webmaster
                            </div>
                        </div>
                    </li>
                    <li class="teams-item">
                        <div class="row">
                            <div class="col-1">
                                <i class="fas fa-circle" style="color: rgb(237, 181, 28, 0.8);"></i>
                            </div>
                            <div class="col-9">
                                Administration
                            </div>
                        </div>
                    </li>
                </ul>

            </div>
        </div>
        
        <div class="content">
            <div class="navigationBar">
                <button id="sidebarToggle" class="btn sidebarToggle">
                    <i class="fas fa-bars"></i>
                </a>
            </div>
        </div>
        
    </div>
 

    <script>
        let sidebarToggle = document.querySelector(".sidebarToggle");
        sidebarToggle.addEventListener("click", function(){
            document.querySelector("body").classList.toggle("active");
            document.getElementById("sidebarToggle").classList.toggle("active");
        })
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
  </body>


</html>