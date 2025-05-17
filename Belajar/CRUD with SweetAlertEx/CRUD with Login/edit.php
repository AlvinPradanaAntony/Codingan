<?php
require('koneksi.php');
require('query.php');
$obj = new crud;

session_start();
if (!$obj->detailData($_GET['id'])) die("Error: Id tidak ada");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['txt_email'];
    $pass = $_POST['txt_pass'];
    $name = $_POST['txt_nama'];
    if ($obj->updateData($email, $pass, $name, $obj->id)) {
        // Sweetalert2
        $_SESSION['info'] = 'statusEdit';
        header('Location: home.php');
    } else {
        // Sweetalert2
        $_SESSION['info'] = 'error';
        header('Location: home.php');
    }
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Pengguna</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.3/dist/sweetalert2.min.css"
        integrity="sha256-7FY/kD9x8sdXwruZy+8tjKt05pkuxyF52nbrSazsNg8=" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 20px;
        }

        .form-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 20px;
        }

        .page-title {
            color: #dc3545;
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="form-container">
                    <h2 class="page-title text-center">Edit Data Pengguna</h2>

                    <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
                        <input type="hidden" name="txt_id" value="<?php echo $obj->id; ?>">

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="txt_email"
                                value="<?php echo $obj->user_email; ?>" readonly>
                            <div class="form-text text-muted">Email tidak dapat diubah</div>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="txt_pass"
                                value="<?php echo $obj->user_password; ?>">
                        </div>

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" name="txt_nama"
                                value="<?php echo $obj->user_fullname; ?>">
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" name="update" class="btn btn-danger">Update Data</button>
                            <a href="home.php" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- jQuery -->
    <script src="jquery/jquery-3.6.0.min.js"></script>
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.3/dist/sweetalert2.all.min.js"
        integrity="sha256-+InIGJV7MKkmx361rYBMxoi3KkUSArFPmWpyRCPr6Wg=" crossorigin="anonymous"></script>
    <!-- Custom JS -->
    <script src="custom_SweetAlert2.js"></script>
</body>

</html>