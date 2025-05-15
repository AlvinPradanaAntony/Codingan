<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['title'] ?></title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/bootstrap.css">

    <!-- font -->
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/fontawesome.min.css" integrity="sha512-Rcr1oG0XvqZI1yv1HIg9LgZVDEhf2AHjv+9AuD1JXWGLzlkoKDVvE925qySLcEywpMAYA/rkg296MkvqBF07Yw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <div class="container">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4">
            <a href="" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                <img src="<?= BASE_URL ?>/img/logo.png" class="bi me-2" width="80" height="60" role="img" aria-label="logo" />
            </a>

            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li><a href="<?= BASE_URL ?>" class="nav-link px-2 link-secondary">Beranda</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">Tentang</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link px-2 link-dark dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Laboratorium
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <?php foreach ($data['lab'] as $lab) : ?>
                            <li><a class="dropdown-item" href="<?= BASE_URL ?>/lab/<?= $lab['id'] ?>"><?= $lab['nama_lab'] ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link px-2 link-dark dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Civitas
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="#">Dosen</a></li>
                        <li><a class="dropdown-item" href="#">Mahasiswa</a></li>
                    </ul>
                </li>
                <li><a href="#" class="nav-link px-2 link-dark">Arsip</a></li>
            </ul>

            <div class="col-md-3 text-end">
                <a href="<?= BASE_URL ?>/auth/login" class="btn btn-outline-primary me-2">Login</a>
                <!-- <a href="<?= BASE_URL ?>/auth/register" class="btn btn-primary">Register</a> -->
            </div>
        </header>
    </div>