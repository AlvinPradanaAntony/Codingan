<?php
session_start();
include "koneksi.php";
if (!isset($_SESSION['usr'])) {
  header("location:login.php");
}
$sesName = $_SESSION['nama'];

if ($_SESSION['lvl'] == 0) {
  $status = "Admin";
} else {
  $status = "User";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>IThesis - Dashboard</title>
  <link rel="shortcut icon" type="image/png" href="Assets/Private/img/logoLtW.png">
  <link rel="stylesheet" href="Assets/Private/css/Dashboard.css" />
  <link rel="stylesheet" href="Assets/css/bootstrap.min.css" />
  <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/solid.css" />
</head>

<body>
  <div class="wrapper">
    <div class="sidebar me-0" id="sidebar">
      <div class="logo-details">
        <img src="Assets/Private/img/logo.png" width="135" alt="Logo" id="logo_sidebar" />
      </div>
      <ul class="nav-links m-0" id="main">
        <?php
        $level = $_SESSION['lvl'];
        ?>
        <li class="nav-item">
          <a href='index.php?menu=home' accesskey='1' class="nav-link">
            <i class="uil-apps"></i>
            <span style="vertical-align: middle" class="link_name"> Beranda </span>
          </a>
          <ul class="sub-menu blank">
            <li><a class="link_name" href="#">Beranda</a></li>
          </ul>
        </li>
        <?php if ($level == "0") : ?>
          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#data" aria-expanded="false" aria-controls="data" class="nav-link">
              <i class="uil uil-database"></i>
              <span style="vertical-align: middle" class="link_name"> Data </span>
              <span class="menu-arrow uil-angle-right"></span>
            </a>
            <div class="collapse" id="data">
              <ul class="sub-menu">
                <li><a class="link_name" href="#">DATA</a></li>
                <li>
                  <a href='?menu=data' accesskey='1'>Lihat Dataset</a>
                </li>
                <li>
                  <a href='?menu=user' accesskey='5'>Data Mahasiswa</a>
                </li>
              </ul>
            </div>
          </li>
        <?php endif ?>
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#proses" aria-expanded="false" aria-controls="proses" class="nav-link">
            <i class="uil uil-atom"></i>
            <span style="vertical-align: middle" class="link_name"> Proses </span>
            <span class="menu-arrow uil-angle-right"></span>
          </a>
          <div class="collapse" id="proses">
            <ul class="sub-menu">
              <li><a class="link_name" href="#">PROSES</a></li>
              <?php if ($level == "0") : ?>
                <li>
                  <a href='?menu=mining' accesskey='2'>ID3</a>
                </li>
              <?php endif ?>
              <li>
                <a href='?menu=uji_rule' accesskey='7'>Lihat Rules</a>
              </li>
              <li>
                <a href='?menu=pohon_tree' accesskey='3'>Pohon Keputusan</a>
              </li>
              <?php if ($level == "0") : ?>
                <li>
                  <a href="#">Cek Akurasi</a>
                </li>
              <?php endif ?>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="uil uil-code-branch"></i>
            <span style="vertical-align: middle" class="link_name"> Prediksi </span>
          </a>
          <ul class="sub-menu blank">
            <li><a class="link_name" href="#">Prediksi</a></li>
          </ul>
        </li>
        <div class="setting mt-5">
          <hr class="sidebar-divider">
          <li class="nav-item">
            <a href="logout.php" class="nav-link sign-out" onClick="return confirm('Anda yakin akan keluar?')">
              <i class="uil uil-sign-out-alt"></i>
              <span style="vertical-align: middle" class="link_name">Logout</span>
            </a>
            <ul class="sub-menu blank">
              <li><a class="link_name" href="logout.php" onClick="return confirm('Anda yakin akan keluar?')">Logout</a></li>
            </ul>
          </li>
        </div>
      </ul>
    </div>
    <section class="home-section">
      <div class="home-navbar sticky-top" id="sticky-element">
        <nav class="navbar-custom navbar-expand-md shadowNavbar">
          <div class="container-fluid d-flex align-items-center">
            <div class="menu" id="menu"><i class="bx bx-menu menu-collapse"></i></div>
            <div class="collapse navbar-collapse justify-content-end " id="navbarSupportedContent">
              <ul class="navbar-nav mb-lg-0">
                <li class="nav-item d-flex align-items-center">
                  <div class="time-frame me-3">
                    <div id="date-part"></div>
                    <div id="time-part"></div>
                  </div>
                  <span class="seperatorVertikal me-3"></span>
                  <div class="nav__btns">
                    <i class="uil uil-moon change-theme" id="theme-button"></i>
                  </div>
                </li>
                <li class="nav-item dropdown frameProfile">
                  <a class="nav-link dropdown-toggle nav-user" href="/#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="account-user-avatar d-inline-block"><img src="Assets/Private/img/images.png" class="cust-avatar img-fluid rounded-circle" /></span>
                    <span class="account-user-name"><?php echo $sesName; ?></span><span class="account-position"><?php echo $status; ?></span>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end me-1 border border-0 custom-rounded" aria-labelledby="navbarDropdown" style="">
                    <li>
                      <a class="text-decoration-none" href="/profile">
                        <div class="dropdown-item custom-item-dropdown d-flex align-items-center">
                          <i class="uil uil-user me-2"></i>
                          <span class="nameItem">My Profile</span>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item custom-item-dropdown d-flex align-items-center" href="logout.php" onClick="return confirm('Anda yakin akan keluar?')">
                        <i class="uil uil-sign-out-alt me-2"></i>
                        <span class="nameItem">Sign Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>

      <div class="content">
        <div class="row pt-4">
          <?php
          if (isset($_GET['act'])) {
            $action = $_GET['act'];
          } else {
            $query1 = mysql_query("select * from mahasiswa ORDER BY(nim)");
            $query2 = mysql_query("select * from data_training order by(id)");
            $jumlahMahasiswa = mysql_num_rows($query1);
            $jumlahDataLatih = mysql_num_rows($query2);
          ?>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card" id="data1">
                <div class="card-body p-4">
                  <div class="d-flex align-items-center">
                    <div class="card-icon text-white">
                      <i class="uil uil-users-alt"></i>
                    </div>
                    <div class=" ms-auto card-detail">
                      <p class="mb-0 card-detail_text">Data Mahasiswa</p>
                      <h4 class="my-1 card-detail_data"><?php echo $jumlahMahasiswa; ?></h4>
                    </div>
                  </div>
                </div>
                <div class="abstract1"></div>
                <div class="abstract2"></div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card" id="data2">
                <div class="card-body p-4">
                  <div class="d-flex align-items-center">
                    <div class="card-icon text-white">
                      <i class="uil uil-database"></i>
                    </div>
                    <div class=" ms-auto card-detail">
                      <p class="mb-0 card-detail_text">Data Latih</p>
                      <h4 class="my-1 card-detail_data"><?php echo $jumlahDataLatih; ?></h4>
                    </div>
                  </div>
                </div>
                <div class="abstract1"></div>
                <div class="abstract2"></div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card" id="data3">
                <div class="card-body p-4">
                  <div class="d-flex align-items-center">
                    <div class="card-icon text-white">
                      <i class="uil uil-server-connection"></i>
                    </div>
                    <div class=" ms-auto card-detail">
                      <p class="mb-0 card-detail_text">Data Uji</p>
                      <h4 class="my-1 card-detail_data">0</h4>
                    </div>
                  </div>
                </div>
                <div class="abstract1"></div>
                <div class="abstract2"></div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card" id="data4">
                <div class="card-body p-4">
                  <div class="d-flex align-items-center">
                    <div class="card-icon text-white">
                      <i class="uil uil-percentage"></i>
                    </div>
                    <div class=" ms-auto card-detail">
                      <p class="mb-0 card-detail_text">Akurasi</p>
                      <h4 class="my-1 card-detail_data">0 <span>%</span></h4>
                    </div>
                  </div>
                </div>
                <div class="abstract1"></div>
                <div class="abstract2"></div>
              </div>
            </div>
          <?php

          }
          ?>
        </div>
        <div class="row gx-4 pt-4">
          <div class="col-lg-9">
            <?php
            //jika menu sudah diset
            if (isset($_GET['menu'])) {
              $kode = $_GET['menu'];
              //menu home
              if ($kode == 'home') {

                // echo '<pre>';
                // print_r($_SESSION);
                // echo '</pre>';
              } //menu olah data
              else if ($kode == 'data') {
                include 'data_training.php';
              }
              //menu mining (proses pembentukan pohon keputusan)
              else if ($kode == 'mining') {
                include 'mining.php';
              }
              //menu pohon keputusan atau rule
              else if ($kode == 'tree') {
                include 'tree.php';
              }
              //menu pohon tree2
              else if ($kode == 'pohon_tree') {
                include 'pohon_tree.php';
              }
              //menu uji pohon keputusan atau rule
              else if ($kode == 'uji_rule') {
                include 'uji_rule.php';
              }
              //menu hasil prediksi
              else if ($kode == 'hasil') {
                include 'hasil_prediksi.php';
              }
              //menu data user
              else if ($kode == 'user') {
                include 'data_user.php';
              }
              //menu prediksi
              else if ($kode == 'prediksi') {
                include 'prediksi.php';
              }
              //menu ubah password
              else if ($kode == 'ubah_password') {
                include 'ubah_password.php';
              }
            } else {
              // echo '<pre>';
              // print_r($_SESSION);
              // echo '</pre>';
            }
            ?>
          </div>
          <div class="col-lg-3 m-0"></div>
        </div>
      </div>
    </section>
  </div>
</body>
<script src="Assets/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="Assets/Private/js/moment.js"></script>
<script src="Assets/Private/js/script.js"></script>
<script src="Assets/Private/js/changeIconMenu.js"></script>
<script></script>

<!-- /*==================== LORDICON ====================*/ -->
<script src="https://cdn.lordicon.com/fudrjiwc.js"></script>

</html>