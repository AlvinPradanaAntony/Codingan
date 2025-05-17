<?php
require('koneksi.php');
require('query.php');
// $email = $_GET['user_fullname'];
$obj = new crud;
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
  <h1>Halaman Percobaan</h1>
  <?php
  print "<pre>";
  print_r($_SESSION);
  print "</pre>";
    if (isset($_SESSION['status'])) {
    ?>
		<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<strong>Hey !</strong> <?= $_SESSION['status']; ?>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
		<?php
        unset($_SESSION['status']);
    }
    ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
  <script src="jquery/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function () {
      window.setTimeout(function () {
        $(".alert").fadeTo(500, 0).slideUp(500, function () {
          $(this).remove();
        });
      }, 3500);
    });
  </script>
</body>

</html>