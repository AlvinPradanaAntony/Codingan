<?php
    require "koneksi.php";
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    
    <!-- My Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Viga">
    <!-- My CSS -->
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="plugin/font-awesome/css/font-awesome.min.css">
    <style>
            /* Style the tab */
        .tab {
        overflow: hidden;
        border: 1px solid #ccc;
        background-color: #f1f1f1;
        }

        /* Style the buttons inside the tab */
        .tab button {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
        font-size: 17px;
        }

        
        /* Change background color of buttons on hover */
        .tab button:hover {
        background-color: #ddd;
        }
   

        /* Create an active/current tablink class */
        .tab button.active {
        background-color: #ccc;
        }

        /* Style the tab content */
        .tabcontent {
        display: none;
        padding : 6px 12px;
        border: 1px solid #ccc;
        border-top: none;        
        }

        /* Style the close button */
        .topright {
        float: right;
        cursor: pointer;
        font-size: 0px;
        }

        .topright:hover {color: red;}
    </style>
    
    <!-- Modal Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Praktikum Luring</title>

    
  </head>
  <body>
  <!-- Navbar 1-->
  <!-- "bg-light" merupakan class untuk memberi background pada navbar-->

  <nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <div class="container">
        <a href=""><img class="logo" src="img/logo_polije.png"></a>
        <a class="navbar-brand" href="#">Laboratorium</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <!--Penambahan Class "ml-auto" menambahkan margin leftnya auto sehingga navbar nempel ke kanan -->
        <div class="navbar-nav ml-auto">
            
            <a class="nav-item nav-link active" href="index.php"><i class="fa fa-home"></i>Beranda <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="#">Tentang</a>
            <li class="dropdown">
            <a class="nav-item nav-link" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>Laboratorium<i class="fa fa-chevron-circle-down"></i></a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#"><i class="fa fa-chevron-circle-right"></i>Lab. Multimedia</a>
                    <a class="dropdown-item" href="lab_rpl.html"><i class="fa fa-chevron-circle-right"></i>Lab. Rekayasa Perangkat Lunak</a>
                    <a class="dropdown-item" href="#"><i class="fa fa-chevron-circle-right"></i>Lab. Pemrograman</a>
                    <a class="dropdown-item" href="#"><i class="fa fa-chevron-circle-right"></i>Lab. Pengolahan Citra Digital</a>
                    <a class="dropdown-item" href="#"><i class="fa fa-chevron-circle-right"></i>Lab. Jaringan</a>
                </div>
            </li>
            <li class="dropdown">
            <a class="nav-item nav-link" href="#" id="navbarDropdownMenuLink2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>Civitas<i class="fa fa-chevron-circle-down"></i></a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
                <a class="dropdown-item" href="#"><i class="fa fa-chevron-circle-right"></i>Dosen</a>
                <a class="dropdown-item" href="#"><i class="fa fa-chevron-circle-right"></i>Mahasiswa</a>
            </div>
            </li>
            <a class="nav-item btn btn-primary tombol" href="#">Arsip</a>
        </div>
        </div>
    </div>
  </nav>
  <!-- Akhir Navbar-->

  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img height="500" class="d-block w-100" src="img/01.png" alt="First slide">
      </div>
    </div>
  </div>




  <!-- Jumbotron-->

  <!-- Akhir Jumbotron-->

  
  <!-- Container-->
    <div class="container">
    <!-- Info Panel-->
        <div class="row justify-content-center">
            <div class="col-4 info-panel">
                <div class="row">
                    <div class="col-lg">
                        <img src="img/xy-female.jpg" alt="hires" class="float-left">
                        <h4>Ketua Kelompok Riset</h4>
                        <p><span>NAMA</span> : AAAAA AAAAA, M.Pd.</p>
                        <p><span>NIDN</span> &nbsp;&nbsp;: 0030037700</p>
                        
                    </div>
                </div>
            </div>
        </div>
    <!-- Akhir Info Panel-->
    <!-- Info Panel Anggota-->
    <div class="row justify-content-center">
        <div class="col-16 info-panel-2">
            <div class="row">
                <div class="col-lg" >
                    <img src="img/xy-male.jpg" alt="employee" class="float-left">
                    <table border = "0">
                        <th colspan="3"><h4>Anggota</h4></th>
                        <tr><td><p><span>NAMA</span>&nbsp;</p></td>
                            <td align="center"><p>:</p></td>
                            <td><p>&nbsp;BBBBB BBBBB, S.T., M.Kom.</p></td>
                        </tr>
                        <tr><td><p><span>NIDN</span>&nbsp;</p></td>
                            <td align="center"><p>:</p></td>
                            <td><p>&nbsp;0030037701</p></td>
                        </tr>
                        <tr><td><p><span>JAFUNG</span>&nbsp;</p></td>
                            <td align="center"><p>:</p></td>
                            <td><p>&nbsp;LEKTOR <a href="#profil" data-toggle="modal"></a></p></td>
                            

                        </tr>
                        
                        <tr>
                            <td colspan="3">
                                
                                
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-lg">
                    <img src="img/hires.jpg" alt="hires" class="float-left">
                    <table>
                        <th colspan="3"><h4>Anggota</h4></th>
                        <tr><td><p><span>NAMA</span>&nbsp;</p></td>
                            <td align="center"><p>:</p></td>
                            <td><p>&nbsp;LUKMAN HAKIM, S.Kom., M.Kom.</p></td>
                        </tr>
                        <tr><td><p><span>NIDN</span>&nbsp;</p></td>
                            <td align="center"><p>:</p></td>
                            <td><p>&nbsp;0030037702</p></td>
                        </tr>
                        <tr><td><p><span>JAFUNG</span>&nbsp;</p></td>
                            <td align="center"><p>:</p></td>
                            <td><p>&nbsp;LEKTOR KEPALA <a href="#profil" data-toggle="modal"><i class="fa fa-chevron-circle-right"></a></p></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                           
                            </td>
                            
                        </tr>
                    </table>
                </div>
                <div class="col-lg">
                    <img src="img/xy-male.jpg" alt="security" class="float-left">
                    <table>
                        <th colspan="3"><h4>Anggota</h4></th>
                        <tr><td><p><span>NAMA</span>&nbsp;</p></td>
                            <td align="center"><p>:</p></td>
                            <td><p>&nbsp;CCCCC CCCCC, S.Kom.,M.Kom.</p></td>
                        </tr>
                        <tr><td><p><span>NIDN</span>&nbsp;</p></td>
                            <td align="center"><p>:</p></td>
                            <td><p>&nbsp;0030037703</p></td>
                        </tr>
                        <tr><td><p><span>JAFUNG</span>&nbsp;</p></td>
                            <td align="center"><p>:</p></td>
                            <td><p>&nbsp;LEKTOR KEPALA <a href="#profil" data-toggle="modal"><!--<i class="fa fa-chevron-circle-right">--></a></p></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                               
                            </td>
                            
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-lg">
                    <img src="img/xy-male.jpg" alt="employee" class="float-left">
                    <table>
                        <th colspan="3"><h4>Anggota</h4></th>
                        <tr><td><p><span>NAMA</span>&nbsp;</p></td>
                            <td align="center"><p>:</p></td>
                            <td><p>&nbsp;DDDDD DDDDD, S.T., M.Kom.</p></td>
                        </tr>
                        <tr><td><p><span>NIDN</span>&nbsp;</p></td>
                            <td align="center"><p>:</p></td>
                            <td><p>&nbsp;0030037704</p></td>
                        </tr>
                        <tr><td><p><span>JAFUNG</span>&nbsp;</p></td>
                            <td align="center"><p>:</p></td>
                            <td><p>&nbsp;LEKTOR KEPALA <a href="#profil" data-toggle="modal"><!--<i class="fa fa-chevron-circle-right">--></a></p></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                               
                            </td>
                            
                        </tr>
                    </table>
                </div>
                <div class="col-lg">
                    <img src="img/xy-male.jpg" alt="hires" class="float-left">
                    <table>
                        <th colspan="3"><h4>Anggota</h4></th>
                        <tr><td><p><span>NAMA</span>&nbsp;</p></td>
                            <td align="center"><p>:</p></td>
                            <td><p>&nbsp;EEEEE EEEEE, S.Si., M.Pd.</p></td>
                        </tr>
                        <tr><td><p><span>NIDN</span>&nbsp;</p></td>
                            <td align="center"><p>:</p></td>
                            <td><p>&nbsp;0030037705</p></td>
                        </tr>
                        <tr><td><p><span>JAFUNG</span>&nbsp;</p></td>
                            <td align="center"><p>:</p></td>
                            <td><p>&nbsp;LEKTOR <a href="#profil" data-toggle="modal"><!--<i class="fa fa-chevron-circle-right">--></a></p></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                               
                            </td>
                            
                        </tr>
                    </table>
                </div>
                <div class="col-lg">
                    <img src="img/xy-female.jpg" alt="security" class="float-left">
                    <table>
                        <th colspan="3"><h4>Anggota</h4></th>
                        <tr><td><p><span>NAMA</span>&nbsp;</p></td>
                            <td align="center"><p>:</p></td>
                            <td><p>&nbsp;FFFFF FFFFF, S.Kom.,M.Pd.</p></td>
                        </tr>
                        <tr><td><p><span>NIDN</span>&nbsp;</p></td>
                            <td align="center"><p>:</p></td>
                            <td><p>&nbsp;0030037706</p></td>
                        </tr>
                        <tr><td><p><span>JAFUNG</span>&nbsp;</p></td>
                            <td align="center"><p>:</p></td>
                            <td><p>&nbsp;LEKTOR <a href="#profil" data-toggle="modal"><!--<i class="fa fa-chevron-circle-right">--></a></p></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                               
                            </td>
                            
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
<!-- Akhir Info Panel ANggota-->
    
<!-- Deskripsi-->
<div class="row workingspace">
    <div class="col-lg-16">
        <p>
            Laboratorium Rekayasa Perangkat Lunak yang kemudian lebih populer disebut sebagai Lab RPL resmi beroperasi sejak Tanggal/ Bulan/ Tahun. Lab RPL pernah digunakan untuk pelatihan ABC, DEF dan GHI yang merupakan kerjasama Fakultas/ Prodi X Universitas Muhammadiyah Jember dan Industri seperti (Oracle Academy Indonesia) atau yang lain, pelatihan tersebut diikuti (Sejumlah) peserta yang terdiri dari dosen-dosen beberapa perguruan tinggi di wilayah Jawa Timur.
        </p>
        <p>
            Laboratorium ini digunakan untuk kegiatan praktikum Mahasiswa Fakultas Teknik baik dari program studi Manajemen Informatika (D3), dan Teknik Informatika (D4). Secara khusus Lab RPL diperuntukan untuk menunjang kegiatan di bidang pemrograman dan perancangan perangkat lunak. Kapasitas Lab RPL sebanyak () komputer untuk mahasiswa dan 1 komputer untuk dosen.
        </p>
        <h3>DAFTAR MATAKULIAH</h3>
        <ol>
            <li>Basis Data 1</li>
            <li>Basis Data 2</li>
            <li>Dasar-Dasar Pemrograman</li>
            <li>Pemrograman Berorientasi Objek</li>
            <li>Pemrograman Web</li>
            <li>Struktur Data</li>
        </ol>
    
    </div>
</div>
<!-- Akhir Deskripsi-->
    <!-- Workingspace-->
        <div class="row workingspace">
            <div class="col-lg-6">
                <img src="img/workingspace.jpg" alt="Workingspace" class="img-fluid">
            </div>
            <div class="col-lg-5">
                <h3><span>workshop</span> pelatihan dosen <span>Fakultas Teknik</span></h3>
                <p>Bekerja dengan suasana hati yang lebih asik dan mempelajari hal baru setiap harinya.</p>
                <a href="" class="btn btn-primary tombol">More</a>
            </div>
        </div>
    <!-- Akhir Workingspace-->

    


    </div><br><br>
  <!-- Akhir Container-->
  <!-- Modal-->  
<div class="modal fade" id="profil" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">DETAIL DOSEN</h4>
                <button class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                
                <div class="tab">
                <button class="tablinks" onclick="openCity(event, 'Biodata')" id="defaultOpen">Biodata</button>
                <button class="tablinks" onclick="openCity(event, 'Publikasi')">Publikasi</button>
                <button class="tablinks" onclick="openCity(event, 'Pengabdian')">Pengabdian</button>
                <button class="tablinks" onclick="openCity(event, 'Riwayat')">Pendidikan</button>
                </div>

                <div id="Biodata" class="tabcontent">
                <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
                
                <table>

                <?php

                    $query = "SELECT * FROM dosen";
                    $result = mysqli_query($koneksi, $query);
                    while($row = mysqli_fetch_array($result)){
                        echo
                        '<tr><td><p><span>NAMA</p></td>
                        <td align="center"><p>:</p></td>
                        <td><p>&nbsp;'. $row["nama"] .'</p></td>
                        </tr>
                        <tr><td><p><span>NIDN</span></p></td>
                            <td align="center"><p>:</p></td>
                            <td><p>&nbsp;'. $row["nidn"] .'</p></td>
                        </tr>
                        <tr><td><p><span>JAFUNG</span>&nbsp;&nbsp;&nbsp;&nbsp</p></td>
                            <td align="center"><p>:</p></td>
                            <td><p>&nbsp;'. $row["jafung"] .'</p></td>
                        </tr>
                        <tr><td><p><span>ALAMAT</span></p></td>
                            <td align="center"><p>:</p></td>
                            <td><p>&nbsp;'. $row["alamat"] .'</p></td>
                        </tr>
                        <tr><td><p><span>NO TELP</span></p></td>
                            <td align="center"><p>:</p></td>
                            <td><p>&nbsp;'. $row["no_telp"] .'</p></td>
                        </tr>
                        <tr><td><p><span>Scholar ID</span></p></td>
                            <td align="center"><p>:</p></td>
                            <td><p>&nbsp;'. $row["scholarid"] .'</p></td>
                        </tr>
                        <tr><td><p><span>Scopus ID</span>&nbsp</p></td>
                            <td align="center"><p>:</p></td>
                            <td><p>&nbsp;'. $row["scopusid"] .'</p></td>
                        </tr>';
                    }

                ?>                    
                </table>
                </div>

                <div id="Publikasi" class="tabcontent">
                <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
                
                <table>
                    <tr><td><p><b>NO</b></p></td>
                        <td><p><b>TAHUN</b>&nbsp;</td>
                        <td><p><b>JUDUL</b></td>
                        <td><p><b>DANA</b></td>
                    </tr>

                    
                                       
                </table> 
                </div>

                <div id="Pengabdian" class="tabcontent">
                <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
                
                <table>
                    <tr><td><p><b>NO</b></p></td>
                        <td><p><b>TAHUN</b>&nbsp;</td>
                        <td><p><b>JUDUL</b></td>
                        <td><p><b>DANA</b></td>
                    </tr>
                    
                    
                    
                </table>
                </div>
                <div id="Riwayat" class="tabcontent">
                    <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
                    
                    <table>
                        <tr><td><p><b>NO</b></p></td>
                            <td><p><b>Nama PT</b>&nbsp;</td>
                            <td><p><b>Prodi</b>&nbsp;</td>
                            <td><p><b>Tahun Lulus</b></td>
                        </tr>    
                        
                        
                        
                    </table>
                </div>

                <script>
                function openCity(evt, cityName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(cityName).style.display = "block";
                evt.currentTarget.className += " active";
                }

                // Get the element with id="defaultOpen" and click on it
                document.getElementById("defaultOpen").click();
                </script>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
  </div>


  <!-- Akhir Modal-->
  <!-- Footer-->
  <div class="row footer bg-primary">
    <div class="col text-center ">
        <p>2021 All Right Reserved by Praktikum</p>
    </div>
  </div>
  <!-- Akhir Footer-->
</body>
</html>