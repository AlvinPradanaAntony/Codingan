<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Dashboard</title>
    <!-- style css php -->
    <?php include_once 'css_style/style.php';?>
    <link href="css/profile_style.css" rel="stylesheet">
    <!-- end style css php -->
<body>
    <div id="wrapper">
        <!-- nav -->
        <?php include_once 'sidebar/nav_dashboard.php';?>
        <!-- end nav -->
        <div id="page-wrapper" class="gray-bg dashbard-1">
            <!-- navbar -->
            <?php include_once 'sidebar/navbar.php';?>
            <!-- end navbar -->
            <div class="wrapper wrapper-content">
                <div class="row wrapper border-bottom white-bg page-heading">
                    <div class="col-lg-10">
                        <h2>Profile</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="welcome.php">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a>Extra Pages</a>
                            </li>
                            <li class="breadcrumb-item active">
                                <strong>Profile</strong>
                            </li>
                        </ol>
                    </div>
                </div>
                <br>
                <div id="content" class="content p-0">
                    <div class="profile-header">
                        <div class="profile-header-cover"></div>

                        <div class="profile-header-content">
                            <div class="profile-header-img">
                                <img src="assets/image/logo.png" alt="picture" />
                            </div>

                            <div class="profile-header-info">
                                <h4 class="m-t-sm">SOENG SOUY</h4>
                                <p class="m-b-sm">UX UI + Frontend Developer</p>
                                <a href="#" class="btn btn-xs btn-primary mb-3">Edit Profile</a>
                            </div>
                        </div>

                        <ul class="profile-header-tab nav nav-tabs">
                            <li class="nav-item"><a href="#profile-post" class="nav-link" data-toggle="tab">POSTS</a></li>
                            <li class="nav-item"><a href="#profile-about" class="nav-link active show" data-toggle="tab">ABOUT</a></li>
                            <li class="nav-item"><a href="#profile-photos" class="nav-link" data-toggle="tab">PHOTOS</a></li>
                            <li class="nav-item"><a href="#profile-videos" class="nav-link" data-toggle="tab">VIDEOS</a></li>
                            <li class="nav-item"><a href="#profile-friends" class="nav-link" data-toggle="tab">FRIENDS</a></li>
                        </ul>
                    </div>

                    <div class="profile-container">
                        <div class="row row-space-20">
                            <div class="col-md-8">
                                <div class="tab-content p-0">
                                    <div class="tab-pane active show" id="profile-about">
                                        <table class="table table-profile">
                                            <thead>
                                                <tr>
                                                    <th colspan="2">WORK AND EDUCATION</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="field">Work</td>
                                                    <td class="value">
                                                        <div class="m-b-5">
                                                            <b>Bank IN PP IT (2020)</b>
                                                            <span class="text-muted">PHP Framework Programmer</span>
                                                        </div>
                                                        <div>
                                                            <b>Front-End IT (2018)</b>
                                                            <span class="text-muted">UXUI / Frontend Developer Videos Editor</span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="field">Education</td>
                                                    <td class="value">
                                                        <div class="m-b-5">
                                                            <b>University RUPP (2015)</b>
                                                            <span class="text-muted">Royal University of Phnom Phenh</span>
                                                        </div>
                                                        <div>
                                                            <b>High School (20010)</b><br />
                                                            <span class="text-muted">N TiSata 7 Makara</span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="field">Skills</td>
                                                    <td class="value">
                                                        PHP, HTML5, CSS, jQuery, MYSQL, Ionic, Laravel, Phonegap, Bootstrap, Angular JS, Angular JS, Asp.net
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-profile">
                                            <thead>
                                                <tr>
                                                    <th colspan="2">CONTACT INFORMATION</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="field">Mobile Phones</td>
                                                    <td class="value">
                                                        +885 09666686371
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="field">Email</td>
                                                    <td class="value">
                                                        soengsouy@gmail.com
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="field">Facebook</td>
                                                    <td class="value">
                                                        http://facebook.com/soengsouy
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="field">Website</td>
                                                    <td class="value">
                                                        http://soengsouy.com
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="field">Address</td>
                                                    <td class="value">
                                                        110 Bvd Street, PP 900<br />
                                                        San Phnom Phenh, PP 120
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-profile">
                                            <thead>
                                                <tr>
                                                    <th colspan="2">BASIC INFORMATION</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="field">Birth of Date</td>
                                                    <td class="value">
                                                        November 25, 1995
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="field">Gender</td>
                                                    <td class="value">
                                                        Male
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="field">Facebook</td>
                                                    <td class="value">
                                                        http://facebook.com/soengsouy
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="field">Website</td>
                                                    <td class="value">
                                                        http://soengsouy.com
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 hidden-xs hidden-sm">
                                <ul class="profile-info-list">
                                    <li class="title">PERSONAL INFORMATION</li>
                                    <li>
                                        <div class="field">Occupation:</div>
                                        <div class="value">UX UI / Frontend Developer</div>
                                    </li>
                                    <li>
                                        <div class="field">Skills:</div>
                                        <div class="value">PHP, HTML5, CSS, jQuery, MYSQL, Ionic, Laravel, Phonegap, Bootstrap, Angular JS, Angular JS, Asp.net</div>
                                    </li>
                                    <li>
                                        <div class="field">Birth of Date:</div>
                                        <div class="value">1995/11/25</div>
                                    </li>
                                    <li>
                                        <div class="field">Country:</div>
                                        <div class="value">Cambodia</div>
                                    </li>
                                    <li>
                                        <div class="field">Address:</div>
                                        <div class="value">
                                            <address class="m-b-0">
                                                Youtobe, Inc.<br />
                                                110 Blvd Street, Suite 9120<br />
                                                San Phnom Phenh, PP 110
                                            </address>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="field">Phone No.:</div>
                                        <div class="value">
                                            (+885) 2333-7890
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- foodter -->
            <?php include_once 'foodter/foodter.php';?>
            <!-- end foodter -->
        </div>
        <!-- chart -->
        <?php include_once 'chart/chart.php'; ?>
        <!-- end chart -->
    </div>
    <!-- <script> js php import</script> -->
    <?php include_once 'script/js.php';?>
    <!-- <script>Library</script> -->
    <!-- <script> import</script> -->
	</body>
</html>