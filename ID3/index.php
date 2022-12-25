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
    </div>
    <section class="home-section">
      <div class="home-navbar sticky-top">
        <nav class="navbar-custom navbar-expand-lg shadowNavbar">
          <div class="container-fluid d-flex align-items-center">
            <div class="menu" id="menu"><i class="bx bx-menu menu-collapse"></i></div>
            <div class="collapse navbar-collapse justify-content-end " id="navbarSupportedContent">
              <ul class="navbar-nav mb-2 mb-lg-0">
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
            <div class="card" id="data1">
              <div class="card-body p-4">
                <div class="d-flex align-items-center">
                  <div class="card-icon text-white">
                    <i class="uil uil-users-alt"></i>
                  </div>
                  <div class=" ms-auto card-detail">
                    <p class="mb-0 card-detail_text">Total Orders</p>
                    <h4 class="my-1 card-detail_data">4805</h4>
                  </div>
                </div>
              </div>
              <div class="abstract1"></div>
            </div>
          </div>

          <!-- Card Total Data Driver -->
          <div class="col-xl-3 col-md-6 mb-4">
          <div class="card bg-success invoice-card">
							<div class="card-body d-flex">
								<div class="icon me-3">
									<svg width="35px" height="34px">
									<path fill-rule="evenodd" fill="rgb(255, 255, 255)" d="M32.482,9.730 C31.092,6.789 28.892,4.319 26.120,2.586 C22.265,0.183 17.698,-0.580 13.271,0.442 C8.843,1.458 5.074,4.140 2.668,7.990 C0.255,11.840 -0.509,16.394 0.514,20.822 C1.538,25.244 4.224,29.008 8.072,31.411 C10.785,33.104 13.896,34.000 17.080,34.000 L17.286,34.000 C20.456,33.960 23.541,33.044 26.213,31.358 C26.991,30.866 27.217,29.844 26.725,29.067 C26.234,28.291 25.210,28.065 24.432,28.556 C22.285,29.917 19.799,30.654 17.246,30.687 C14.627,30.720 12.067,29.997 9.834,28.609 C6.730,26.671 4.569,23.644 3.752,20.085 C2.934,16.527 3.546,12.863 5.486,9.763 C9.488,3.370 17.957,1.418 24.359,5.414 C26.592,6.808 28.360,8.793 29.477,11.157 C30.568,13.460 30.993,16.016 30.707,18.539 C30.607,19.448 31.259,20.271 32.177,20.371 C33.087,20.470 33.911,19.820 34.011,18.904 C34.363,15.764 33.832,12.591 32.482,9.730 L32.482,9.730 Z"></path>
									<path fill-rule="evenodd" fill="rgb(255, 255, 255)" d="M22.593,11.237 L14.575,19.244 L11.604,16.277 C10.952,15.626 9.902,15.626 9.250,16.277 C8.599,16.927 8.599,17.976 9.250,18.627 L13.399,22.770 C13.725,23.095 14.150,23.254 14.575,23.254 C15.001,23.254 15.427,23.095 15.753,22.770 L24.940,13.588 C25.592,12.937 25.592,11.888 24.940,11.237 C24.289,10.593 23.238,10.593 22.593,11.237 L22.593,11.237 Z"></path>
									</svg>
								</div>
								<div>
									<h2 class="text-white invoice-num">983</h2>
									<span class="text-white fs-18">Paid Invoices</span>
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