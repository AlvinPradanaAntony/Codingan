<?php
  require ('koneksi.php');
  require ('query.php');
  $obj = new crud;
  
  session_start();

  if(!isset($_SESSION['email'])){
    header('Location: index.php');
  }
  
// $sesID = $_SESSION['id'];
$sesName = $_SESSION['name'];
// $sesLvl = $_SESSION['level'];

    //ambil nilai variabel error
  if (isset($_GET['error']))
  {
    $error=$_GET['error'];
  }
  else
  {
    $error="";
  }
    
  //siapkan pesan kesalahan
  $pesan="";
  if ($error=="sukses")
  {
    $pesan="
    <div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
      <strong>Berhasil melakukan edit data</strong>
      <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
        <span aria-hidden=\"true\">&times;</span>
      </button>
    </div>
    <script src=\"vendor/jquery/jquery.js\"></script>
    <script>
    $(document).ready(function() {
      window.setTimeout(function() {
        $(\".alert\").fadeTo(500, 0).slideUp(500, function(){
              $(this).remove();
        });
      }, 3500);
    });    
    </script>
    ";
    
  }
  if ($error=="gagal1")
  {
    $pesan="
    <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
      <strong>Gagal melakukan edit data</strong>
      <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
        <span aria-hidden=\"true\">&times;</span>
      </button>
    </div>
    <script src=\"vendor/jquery/jquery.js\"></script>
    <script>
    $(document).ready(function() {
      window.setTimeout(function() {
        $(\".alert\").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
          });
        }, 3500);
      });    
    </script>";
  }
  if ($error=="gagal2")
  {
    $pesan="
    <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
      <strong>File gambar terlalu besar</strong>
      <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
        <span aria-hidden=\"true\">&times;</span>
      </button>
    </div>
    <script src=\"vendor/jquery/jquery.js\"></script>
    <script>
    $(document).ready(function() {
      window.setTimeout(function() {
        $(\".alert\").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
          });
        }, 3500);
      });    
    </script>";
  }
  if ($error=="gagal3")
  {
    $pesan="
    <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
      <strong>Format gambar harus JPG, JPEG, dan PNG</strong>
      <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
        <span aria-hidden=\"true\">&times;</span>
      </button>
    </div>
    <script src=\"vendor/jquery/jquery.js\"></script>
    <script>
    $(document).ready(function() {
      window.setTimeout(function() {
        $(\".alert\").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
          });
        }, 3500);
      });    
    </script>";
  }
  if ($error=="gagal4")
  {
    $pesan="
    <div class=\"alert alert-dark alert-dismissible fade show\" role=\"alert\">
      <strong>Kesalahan pada array gambar</strong>
      <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
        <span aria-hidden=\"true\">&times;</span>
      </button>
    </div>
    <script src=\"vendor/jquery/jquery.js\"></script>
    <script>
    $(document).ready(function() {
      window.setTimeout(function() {
        $(\".alert\").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
          });
        }, 3500);
      });    
    </script>";
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  
  <title>Halaman Tabel Data Kegiatan</title>
  
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" href="css/sb-admin-2.css">
  <link rel="stylesheet" href="css/style.css">
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Workshop <sup>*</sup></div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item ">
        <a class="nav-link" href="home.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">Addons</div>
      
      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-table"></i>
          <span>Tabel Data</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Tabel Data:</h6>
            <a class="collapse-item" href="#">Dosen</a>
            <a class="collapse-item" href="#">Karyawan</a>
            <a class="collapse-item" href="tables_kegiatan">Kegiatan</a>
            <a class="collapse-item" href="#">Publikasi</a>
            <a class="collapse-item" href="tables_akun.php">Akun login</a>
          </div>
        </div>
      </li>

      <hr class="sidebar-divider d-none d-md-block">
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul>

    <!-- Pencarian -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" 
                aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button"><i class="fas fa-search fa-sm"></i></button>
              </div>
            </div>
          </form>

          <!-- Navigasi Bar -->
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" 
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Profile -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><b><?php echo $sesName;?></b></span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>

        <!-- Content -->
        <div class="container-fluid">
          
          <div class="row">

            <!-- Card View untuk Total Data pada database 1 -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Data User</div>
                        <div class="row no-gutters align-items-center">
                          <div class="col-auto">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                            <?php
                              $data = $obj->lihatData();
                              $num = $data->rowCount();
                              echo $num;
                            ?>  
                            User 
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Card View untuk Total Data pada database 2 -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Data Kegiatan</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <?php
                        $data = $obj->lihatDataKegiatan();
                        $num = $data->rowCount();
                        echo $num;
                      ?> 
                      Kegiatan</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Card View untuk Total Data pada database 3 -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Data Dosen</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <?php
                        $data = $obj->lihatDataDosen();
                        $num = $data->rowCount();
                        echo $num;
                      ?>     
                      Dosen</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Card View untuk Total Data pada database 4 -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Data Karyawan</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <?php
                        $data = $obj->lihatDataKaryawan();
                        $num = $data->rowCount();
                        echo $num;
                      ?> 
                      Karyawan</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <?php
          echo $pesan;
          ?>

          <!-- Tombol tambah data dan Laporan -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <a href="#">
              <button class="btn btn-primary">Tambah Data</button>
            </a>
              <a href="report.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
              class="fas fa-download fa-sm text-white-50"></i> Laporan</a>
          </div>
          

          <!-- Tabel -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tabel Data Kegiatan</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    <th>No</th>
                      <th>Nama Kegiatan</th>
                      <th>Deskripsi</th>
                      <th>Gambar</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Nama Kegiatan</th>
                      <th>Deskripsi</th>
                      <th>Gambar</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php
                    $data = $obj->lihatDataKegiatan();
                    $no = 1;
                    if($data->rowCount()>0){
                      if($sesLvl == 1){
                          $dis = "";
                      } else{
                          $dis = "disabled";
                      }
                      while($row=$data->fetch(PDO::FETCH_ASSOC)){
                        $namaKeg = $row['nama_keg'];
                        $desk = $row['desk'];
                        $img = $row['img']
                  ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $namaKeg; ?></td>   
                      <td><?php echo $desk; ?></td>
                      <td>
                        <img src="../img/<?php echo $img; ?>" alt="gambarKegiatan" class="img-fluid">
                      </td>
                      <td>
                      <a href="#" class="d-flex justify-content-center">
                          <button class="btn btn-success boxBtn" data-toggle="modal" data-target="#editModal<?php echo $row['id']; ?>" 
                          value="edit"<?php echo $dis;?>><i class="fa fa-edit"></i></button>
                        </a>
                        <a href="#" class="d-flex justify-content-center" >
                          <button class="btn btn-danger boxBtn" data-toggle="modal" data-target="#deleModal<?php echo $row['id']; ?>" 
                          value="hapus"<?php echo $dis;?>><i class="fa fa-trash"></i></button>
                        </a>
                        
                        <!-- Delete Modal-->
                        <div class="modal fade" id="deleModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><b><span style="color: #E02D1B;">Peringatan</span></b></h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                Apakah Anda yakin ingin menghapus data ini ?
                              </div>
                              <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                <a class="btn btn-danger" href="hapus.php?id=<?php echo $row['id']; ?>">Hapus</a>
                              </div>  
                            </div>
                          </div>
                        </div>

                        <!-- Edit Modal-->
                        <div class="modal fade" id="editModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><b>Edit Data</b></h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form role="form" action="editKegiatan.php" method="POST" enctype="multipart/form-data">
                                  <?php
                                    $id = $row['id'];
                                    $query = $obj->pilihKegiatan($id);
                                    while ($row = $query->fetch(PDO::FETCH_ASSOC)){
                                  ?>
                                  <input type="hidden" name="txt_id" value="<?php echo $row['id']; ?>">
                                  <div class="form-group">
                                    <label>Nama Kegiatan</label>
                                    <input type="text" name="txt_namaKeg" class="form-control" value="<?php echo $namaKeg ?>">
                                  </div>
                                  <div class="form-group">
                                    <label for="textarea">Deskripsi</label>
                                    <textarea  name="txt_desk" class="form-control" id="textarea" rows="5"><?php echo $desk ?></textarea>
                                  </div>
                                  <!-- <div class="form-group">
                                    <label>Gambar</label>
                                    <input type="text" name="txt_img" class="form-control" value="<?php echo $img ?>">
                                  </div> -->
                                  <div>
                                    <label for="textarea">Gambar</label>
                                  </div>
                                  <div class="input-group mt-3">
                                    <div class="custom-file">
                                      <input id="inputGroupFile01" type="file" class="custom-file-input" name="txt_img">
                                      <label class="custom-file-label" for="inputGroupFile01"><?php echo $img ?></label>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary" name="update">Update</button>
                                  </div> 
                                </form>
                                <?php 
                                  }
                                ?> 
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>      
                    </tr>
                    <?php
                      $no++;
                      }}
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
    </div>
  </div>

  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><b>Anda yakin ingin keluar?</b></h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pilih "Logout" untuk mengakhiri session atau keluar dari akun ini.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>


  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/sb-admin-2.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="js/demo/datatables-demo.js"></script>
  <script>
      bsCustomFileInput.init()

      var btn = document.getElementById('btnResetForm')
      var form = document.querySelector('form')
      btn.addEventListener('click', function() {
        form.reset()
      });
    </script>
</body>
</html>