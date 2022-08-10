<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- <title>Dashboard</title> -->

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        @media print {
    @page { margin: 0; }
    body { margin: 1.6cm; }
}
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <table class="table mb-5">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Kegiatan</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Img</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include('../koneksi.php');
                    $query = "SELECT * FROM kegiatan";
                    $result = mysqli_query($koneksi, $query);
                    $no = 1;
                    while($row = mysqli_fetch_array($result)) {
                        $keg  = $row['nama_keg'];
                        $desk = $row['desk'];
                        $img  = $row['img'];

                ?>
                <tr>
                    <th><?php echo $no++; ?></th>
                    <td><?php echo $keg; ?></td>
                    <td><?php echo $desk; ?></td>
                    <td>
                        <?php echo '<img src="../img/' . $img . '" alt="tidak ketemu" width="70px" height="50px">'; ?>
                    </td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>

    <script>
        window.print();
    </script>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>