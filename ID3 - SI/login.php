<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="Assets/css/bootstrap.min.css" />
  <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/solid.css" />
  <link rel="stylesheet" href="Assets/Private/css/auth.css" />
	<script type="text/javascript">
		function validasi(form){
			if (form.user.value == "" & form.passInput.value == ""){
				alert("Masukkan Username dan Password!");
				form.user.focus();
				return (false);
			} 
			if (form.user.value == ""){
				alert("Masukkan Username!");
				form.user.focus();
				return (false);
			}     
			if (form.passInput.value == ""){
				alert("Masukkan Password!");
				form.passInput.focus();
				return (false);
			}
			return (true);
		}
	</script>
</head>

<body>
  <div class="auth-page d-flex align-items-center min-vh-100">
    <div class="container-fluid p-0">
      <div class="row g-0 vh-100">
        <div class="col-xxl-4 col-lg-4 col-md-4 d-none d-md-block">
          <div class="d-flex flex-column h-100 py-5 px-4 side-left">
            <div class="text-center text-muted mb-2">
              <div class="pb-3 title">
                <a href="#">
                  <div class="logo-details">
                    <img src="Assets/Private/img/logo.png" width="135" alt="Logo" id="logo_sidebar" />
                  </div>
                </a>
                <p class="w-75 mx-auto mt-3 mb-0 description">Sistem Informasi Rekomendasi Kelayakan Skripsi dengan metode ID3</p>
              </div>
            </div>

            <div class="my-auto">
              <div class="p-3 text-center banner-login">
                <img src="Assets/Private/img/auth-img.png" alt="" id="img_login" class="img-fluid" />
              </div>
            </div>

            <div class="mt-4 d-flex justify-content-center">
              <p class="description w-75 m-0 text-center">@<span id="year">TEXT</span> Kelompok 3 & Kelompok 5 - Politeknik Negeri Jember</p>
            </div>
          </div>
        </div>

        <div class="col-xxl-8 col-lg-8 col-md-8 position-relative">
          <div class="nav__btns">
            <i class="uil uil-moon change-theme" id="theme-button"></i>
          </div>
          <div class="auth-bg py-md-5 p-4 d-flex h-100">
            <div class="bg-overlay-gradient"></div>
            <div class="container">
              <div class="row justify-content-center g-0 align-items-center w-100 h-100">
                <div class="col-xxl-6 col-xl-7 col-lg-8 col-md-10 panel">
                  <div class="card panel_login">
                    <div class="card-header justify-content-end pb-0 d-none">
                      <div class="dropdown">
                        <button class="btn btn-link" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="uil uil-ellipsis-v"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end me-1 border border-0 custom-rounded" aria-labelledby="navbarDropdown">
                          <li>
                            <a class="dropdown-item custom-item-dropdown align-items-center" id="theme-button2" href="#">
                            <i class="uil uil-moon change-theme fs-6" id="dark-dropdownItem"></i>
                              <span class="nameItem">Tema Gelap</span>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="pt-md-4 pt-0 px-3 py-3">
                        <div class="text-center">
                          <h5 class="mb-0 title">Login</h5>
                          <a href="#">
                            <div class="logo-details d-none">
                              <img src="Assets/Private/img/logo.png" width="135" alt="Logo" id="logo_sidebar" />
                            </div>
                          </a>
                          <p class="mt-2 description">Masuk dengan data Anda yang Anda masukkan saat pendaftaran.</p>
                        </div>
                        <form class="mt-4 pt-2" action="cekLogin.php" method="post" onSubmit="return validasi(this)">
                          <div class="form-floating form-floating-custom mb-3">
                            <input type="text" class="form-control form-control-custom" id="user" name="user" placeholder="Enter User Name" />
                            <label for="input-username">Username</label>
                            <div class="form-floating-icon">
                              <i class="uil uil-users-alt"></i>
                            </div>
                          </div>
                          <div class="form-floating form-floating-custom mb-3 auth-pass-inputgroup">
                            <input type="password" class="form-control form-control-custom" id="passInput" name="passInput" placeholder="Enter Password" />
                            <span class="eye hidden" id="spanEye">
                              <i class="uil uil-eye-slash show-hide" toggle="#passInput" id="iconShowHide"></i>
                            </span>
                            <label for="password-input">Kata Sandi</label>
                            <div class="form-floating-icon">
                              <i class="uil uil-padlock"></i>
                            </div>
                          </div>
                          <div class="form-check form-check-primary font-size-16 py-1">
                            <input class="form-check-input" type="checkbox" id="remember-check" />
                            <div class="float-end">
                              <a href="auth-resetpassword-basic.html" class="text-decoration-none forget-pass">Lupa Kata Sandi?</a>
                            </div>
                            <label class="form-check-label remember-me" for="remember-check"> Remember me </label>
                          </div>

                          <div class="mt-3">
                            <button class="btn btn-primary w-100 rounded-pill" type="submit">Login</button>
                          </div>

                          <div class="mt-4 pt-3 text-center">
                            <p class="mb-0 sign-up">Belum punya akun ? <a href="auth-signup-cover.html"> Daftar Sekarang ! </a></p>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="Assets/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <script src="Assets/Private/js/script.js"></script>
</body>

</html>