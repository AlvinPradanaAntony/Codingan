<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
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
        <li class="nav-item active">
          <a href="#" class="nav-link">
            <i class="uil-apps"></i>
            <span style="vertical-align: middle" class="link_name"> Beranda </span>
          </a>
          <ul class="sub-menu blank">
            <li><a class="link_name" href="#">Beranda</a></li>
          </ul>
        </li>
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
                <a href="dataset.php">Lihat Dataset</a>
              </li>
              <li>
                <a href="apps-ecommerce-products-details.html">Import Dataset</a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#proses" aria-expanded="false" aria-controls="proses" class="nav-link">
            <i class="uil uil-atom"></i>
            <span style="vertical-align: middle" class="link_name"> Proses </span>
            <span class="menu-arrow uil-angle-right"></span>
          </a>
          <div class="collapse" id="proses">
            <ul class="sub-menu">
              <li><a class="link_name" href="#">PROSES</a></li>
              <li>
                <a href="#">ID3</a>
              </li>
              <li>
                <a href="#">Lihat Rules</a>
              </li>
              <li>
                <a href="#">Pohon Keputusan</a>
              </li>
              <li>
                <a href="#">Cek Akurasi</a>
              </li>
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
            <a href="#" class="nav-link sign-out">
              <i class="uil uil-sign-out-alt"></i>
              <span style="vertical-align: middle" class="link_name">Logout</span>
            </a>
            <ul class="sub-menu blank">
              <li><a class="link_name" href="#">Logout</a></li>
            </ul>
          </li>
        </div>
      </ul>
      <div class="menu" id="menu"><i class="bx bx-menu menu-collapse"></i></div>
    </div>
    <section class="home-section">
      <div class="home-navbar">
        <nav class="navbar-custom navbar-expand-lg shadowNavbar">
          <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
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
                    <span class="account-user-avatar d-inline-block"><img src="https://lh3.googleusercontent.com/a-/AFdZucqo6Dh9Ac4R3nu0r3zqSf_tTEckvSc_0Vpdv8VGZA=s96-c" class="cust-avatar img-fluid rounded-circle" /></span>
                    <span class="account-user-name">Alvin Pradana Antony</span><span class="account-position">Student</span>
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
                      <a class="dropdown-item custom-item-dropdown d-flex align-items-center" href="/#">
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
          <!-- Card Total Data Bus -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 gradientBlue shadow h-100 py-2 rounded">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="RobotoReg14 text-white">Data Bus</div>
                    <div class="RobotoBold18 text-white">
                      5<span> Bus</span></div>
                  </div>
                  <div class="col-auto">
                    <img src="img/ico/icons8_Shuttle_bus_50px.png" alt="logoBus">
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Card Total Data Driver -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 gradientPink shadow h-100 py-2 rounded">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="RobotoReg14 text-white">Data Driver</div>
                    <div class="RobotoBold18 text-white">(Belum Tersedia)</div>
                  </div>
                  <div class="col-auto">
                    <img src="img/ico/icons8_driver_50px.png" alt="logoDriver">
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Card Total Data Pemesanan -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 gradientYellow shadow h-100 py-2 rounded">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="RobotoReg14 text-white">Data Pemesanan</div>
                    <div class="RobotoBold18 text-white">
                      10 Pesanan</div>
                  </div>
                  <div class="col-auto">
                    <img src="img/ico/icons8_bus_tickets_50px.png" alt="logoTicket">
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Card Total Data Penghasilan -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 gradientGreen shadow h-100 py-2 rounded">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="RobotoReg14 text-white">Total Penghasilan</div>
                    <div class="RobotoBold18 text-white"><span>Rp.</span>
                      875000</div>
                  </div>
                  <div class="col-auto">
                    <img src="img/ico/icons8_add_dollar_45px.png" alt="logoPay">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row gx-4 pt-4">
          <div class="col-lg-9">
            <p>
              <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"> Link with href </a>
              <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Button with data-bs-target</button>
            </p>
            <div class="collapse" id="collapseExample">
              <div class="card card-body">Some placeholder content for the collapse component. This panel is hidden by default but revealed when the user activates the relevant trigger.</div>
            </div>
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