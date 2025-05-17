<?php
session_start();

?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Akun Baru</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.3/dist/sweetalert2.min.css"
        integrity="sha256-7FY/kD9x8sdXwruZy+8tjKt05pkuxyF52nbrSazsNg8=" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 40px;
            padding-bottom: 40px;
        }

        .form-register {
            max-width: 450px;
            margin: 0 auto;
        }

        .register-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        .register-title {
            color: #dc3545;
            margin-bottom: 30px;
            text-align: center;
            font-weight: 600;
        }

        .form-floating {
            margin-bottom: 15px;
        }

        .btn-register {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-register:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }

        .register-footer {
            text-align: center;
            margin-top: 20px;
        }

        .login-link {
            color: #dc3545;
            text-decoration: none;
        }

        .login-link:hover {
            text-decoration: underline;
            color: #c82333;
        }

        .register-logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .register-logo i {
            font-size: 48px;
            color: #dc3545;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="info-data" data-infodata="<?php if (isset($_SESSION['info'])) {
                                                    echo $_SESSION['info'];
                                                }
                                                unset($_SESSION['info']); ?>"></div>

        <div class="form-register">
            <div class="register-container">
                <div class="register-logo">
                    <i class="fas fa-user-plus"></i>
                </div>
                <h2 class="register-title">Pendaftaran Akun Baru</h2>

                <form action="function.php" method="POST">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" name="txt_email" placeholder="nama@contoh.com" required>
                        <label for="email">Alamat Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="password" name="txt_pass" placeholder="Kata Sandi" required>
                        <label for="password">Kata Sandi</label>
                        <div class="position-absolute" style="right: 15px; top: 15px; cursor: pointer;" id="togglePassword">
                            <i class="fas fa-eye text-muted"></i>
                        </div>
                    </div>

                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="nama" name="txt_nama" placeholder="Nama Lengkap" required>
                        <label for="nama">Nama Lengkap</label>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" name="register" class="btn btn-lg text-white btn-register">
                            <i class="fas fa-user-check me-2"></i> Daftar
                        </button>
                    </div>
                </form>
            </div>

            <div class="register-footer">
                <p class="mt-3">Sudah memiliki akun? <a href="login.php" class="login-link">Masuk disini</a></p>
                <p><a href="home.php" class="login-link"><i class="fas fa-home me-1"></i> Kembali ke Beranda</a></p>
            </div>
        </div>
    </div> <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <!-- jQuery -->
    <script src="jquery/jquery-3.6.0.min.js"></script>
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.3/dist/sweetalert2.all.min.js"
        integrity="sha256-+InBGKGbhOQiyCbWrARmIEICqZ8UvYJr/qVhHmlmFpc=" crossorigin="anonymous"></script>
    <!-- Custom SweetAlert2 -->
    <script src="custom_SweetAlert2.js"></script>
    <script>
        // Form validation dengan JavaScript
        (function() {
            'use strict';

            // Fungsi untuk memvalidasi form sebelum submit
            const forms = document.querySelectorAll('.form-register form');

            Array.from(forms).forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            }); // Toggle password visibility
            $("#togglePassword").on('click', function() {
                const passwordField = $("#password");
                const passwordIcon = $(this).find("i");

                if (passwordField.attr("type") === "password") {
                    passwordField.attr("type", "text");
                    passwordIcon.removeClass("fa-eye").addClass("fa-eye-slash");
                } else {
                    passwordField.attr("type", "password");
                    passwordIcon.removeClass("fa-eye-slash").addClass("fa-eye");
                }
            });

            // Password strength indicator (bisa dikembangkan lebih lanjut)
            const passwordInput = document.getElementById('password');
            if (passwordInput) {
                passwordInput.addEventListener('input', function() {
                    // Implementasi sederhana untuk indikator kekuatan password
                    const val = passwordInput.value;
                    const passStrength = document.getElementById('pass-strength');

                    if (!passStrength) {
                        const strengthDiv = document.createElement('div');
                        strengthDiv.id = 'pass-strength';
                        strengthDiv.className = 'progress mt-1';
                        strengthDiv.style.height = '5px';
                        strengthDiv.innerHTML = '<div id="pass-strength-bar" class="progress-bar" role="progressbar" style="width: 0%"></div>';
                        passwordInput.parentNode.appendChild(strengthDiv);
                    }

                    const strengthBar = document.getElementById('pass-strength-bar');

                    // Logika sederhana untuk kekuatan password
                    if (val.length < 6) {
                        strengthBar.className = 'progress-bar bg-danger';
                        strengthBar.style.width = '20%';
                    } else if (val.length < 8) {
                        strengthBar.className = 'progress-bar bg-warning';
                        strengthBar.style.width = '50%';
                    } else if (val.length < 10) {
                        strengthBar.className = 'progress-bar bg-info';
                        strengthBar.style.width = '75%';
                    } else {
                        strengthBar.className = 'progress-bar bg-success';
                        strengthBar.style.width = '100%';
                    }
                });
            }
        })();
    </script>
</body>

</html>