<?php
    include "koneksi.php";
    $kolom = 3;
    $awalData = 1;
    $sql_query = "SELECT * FROM dosen";
    $sql_run = mysqli_query($db, $sql_query);  
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
        .tabcontent2 {
        display: none;
        padding : 6px 12px;
        border: 1px solid #ccc;
        border-top: none;        
        }
        .trx{
            
            padding : 3px 12px;
            border: 1px solid #ccc;
            
        }
        .tdx{
            
            padding : 3px 12px;
            border: 1px solid #ccc;
            
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
            <a class="nav-item btn btn-primary tombol" href="#">Pengumuman</a>
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
            <div class="col-5 info-panel">
                <div class="row">
                    <div class="col-lg">
                    <?php
                        $query_bio = mysqli_query($db,"SELECT * FROM dosen where kode_lab='L001' AND nidn=30037702");
                        while($row = mysqli_fetch_array($query_bio)){?>
                        <img src="<?php echo $row["img"]?>" alt="hires" class="float-left">
                        <table border = "0" class = "row justify-content-justify">
                            <th colspan="3"><h4>Ketua Kelompok Riset</h4></th>
                        <?php
                            echo'<tr><td><p><span>NAMA</span>&nbsp;</p></td>
                                    <td align="center"><p>:</p></td>
                                    <td><p>&nbsp;'. $row["nama"] .'</p></td>
                                </tr>
                                <tr><td><p><span>NIDN</span>&nbsp;</p></td>
                                    <td align="center"><p>:</p></td>
                                    <td><p>&nbsp;'. $row["nidn"] .'</p></td>
                                </tr>
                                <tr><td><p><span>JAFUNG</span>&nbsp;</p></td>
                                    <td align="center"><p>:</p></td>
                                    <td><p>&nbsp;'. $row["jafung"] .'<a href="#profil2" data-toggle="modal">&nbsp;&nbsp;<i class="fa fa-chevron-circle-right"></a></p></td>
                                </tr>';
                            }
                        ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <!-- Akhir Info Panel-->

    <!-- Info Panel Anggota-->
    <div class="row justify-content-center">
        <div class="col-16 info-panel-2">
            <?php
            while($row = mysqli_fetch_array($sql_run)){
            if(($awalData) % $kolom== 1) { ?>
                <div class="row">
            <?php
                }
            ?>
            <div class="col-lg" >
                <img src="<?php echo $row["img"]?>" alt="employee" class="float-left">
                    <table border = "0" class = "row justify-content-justify">
                        <th colspan="3"><h4>Anggota</h4></th>
                        <tr>
                            <td>
                                <p><span>NAMA</span>&nbsp;</p>
                            </td>
                            <td align="center"><p>:</p></td>
                            <td>
                                <p>&nbsp;<?php echo $row["nama"]?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>
                                    <span>NIDN</span>&nbsp;
                                </p>
                            </td>
                            <td align="center"><p>:</p></td>
                            <td>
                                <p>&nbsp;<?php echo $row["nidn"]?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>
                                    <span>JAFUNG</span>&nbsp;
                                </p>
                            </td>
                            <td align="center"><p>:</p></td>
                            <td>
                                <p>&nbsp;<?php echo $row["jafung"]?>
                                    <a href="#" data-toggle="modal" data-target="#profil<?=$row['nidn'];?>">&nbsp;&nbsp;
                                    <i class="fa fa-chevron-circle-right"></i>
                                    </a>
                                </p>
                            </td>
                        </tr>
                    </table>
            </div>
            <!-- Modal Dosen -->  
            <div class="modal fade" id="profil<?=$row['nidn'];?>" role="dialog">
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
                            <!-- Tab Biodata -->
                            <div id="Biodata" class="tabcontent">
                                <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
                                <table>
                                    <?php
                                    $query_bio = mysqli_query($db,"SELECT * FROM dosen WHERE nidn=30037701");
                                    while($row = mysqli_fetch_array($query_bio)){
                                        echo
                                        '<tr class="trx"><td class="tdx"><p><span><b>NAMA</b></span></p></td>
                                        <td class="tdx" align="center"><p>:</p></td>
                                        <td class="tdx"><p>&nbsp;'. $row["nama"] .'</p></td>
                                        </tr>
                                        <tr class="trx"><td class="tdx"><p><span><b>NIDN</b></span></p></td>
                                            <td class="tdx" align="center"><p>:</p></td>
                                            <td class="tdx"><p>&nbsp;'. $row["nidn"] .'</p></td>
                                        </tr>
                                        <tr class="trx"><td class="tdx"><p><span><b>JAFUNG</b></span>&nbsp;&nbsp;&nbsp;&nbsp</p></td>
                                            <td class="tdx" align="center"><p>:</p></td>
                                            <td class="tdx"><p>&nbsp;'. $row["jafung"] .'</p></td>
                                        </tr>
                                        <tr class="trx"><td class="tdx"><p><span><b>ALAMAT</b></span></p></td>
                                            <td class="tdx" align="center"><p>:</p></td>
                                            <td class="tdx"><p>&nbsp;'. $row["alamat"] .'</p></td>
                                        </tr>
                                        <tr class="trx"><td class="tdx"><p><span><b>NO TELP</b></span></p></td>
                                            <td class="tdx" align="center"><p>:</p></td>
                                            <td class="tdx"><p>&nbsp;'. $row["no_telp"] .'</p></td>
                                        </tr>
                                        <tr class="trx"><td class="tdx"><p><span><b>Scholar ID</b></span></p></td>
                                            <td class="tdx" align="center"><p>:</p></td>
                                            <td class="tdx"><p>&nbsp;'. $row["scholarid"] .'</p></td>
                                        </tr>
                                        <tr class="trx"><td class="tdx"><p><span><b>Scopus ID</b></span>&nbsp</p></td>
                                            <td class="tdx" align="center"><p>:</p></td>
                                            <td class="tdx"><p>&nbsp;'. $row["scopusid"] .'</p></td>
                                        </tr>';
                                    }
                                    ?>                    
                                </table>
                            </div>
                            <!-- Tab Publikasi -->
                            <div id="Publikasi" class="tabcontent">
                                <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
                                <table>
                                    <tr class="trx"><td class="tdx"><p><b>TAHUN</b>&nbsp;</td>
                                        <td class="tdx"><p><b>JUDUL</b></td>
                                        <td class="tdx"><p><b>DANA</b></td>
                                    </tr>
                                    <?php
                                    $query_pub = mysqli_query($db,"SELECT * FROM publikasi JOIN dosen ON publikasi.nidn=dosen.nidn AND dosen.nidn = 30037701");
                                    while ($row = mysqli_fetch_assoc($query_pub)){
                                        echo 
                                        '<td class="tdx"><p><span>'. $row["tahun"] .'</span></td>
                                        <td class="tdx"><p><span>'. $row["judul"] .'</span></td>
                                        <td class="tdx"><p><span>'. $row["dana"] .'</span></td>
                                        </tr> ';
                                    }
                                    ?>              
                                </table> 
                            </div>
                            <!-- Tab Pengabdian -->
                            <div id="Pengabdian" class="tabcontent">
                                <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
                                <table>
                                    <tr class="trx"><td><p><b>TAHUN</b>&nbsp;</td>
                                        <td class="tdx"><p><b>JUDUL</b></td>
                                        <td class="tdx"><p><b>DANA</b></td>
                                    </tr>
                                    <?php
                                    $query_pub = mysqli_query($db,"SELECT * FROM pengabdian JOIN dosen ON pengabdian.nidn=dosen.nidn AND dosen.nidn = 30037701");
                                    while ($row = mysqli_fetch_assoc($query_pub)){
                                        echo 
                                        '<td class="tdx"><p><span>'. $row["tahun"] .'</span></td>
                                        <td class="tdx"><p><span>'. $row["judul"] .'</span></td>
                                        <td class="tdx"><p><span>'. $row["dana"] .'</span></td>
                                        </tr> ';
                                    }
                                    ?> 
                                </table>
                            </div>
                            <!-- Tab Riwayat -->
                            <div id="Riwayat" class="tabcontent">
                                <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
                                <table>
                                    <tr class="trx"><td><p><b>Nama PT</b>&nbsp;</td>
                                        <td class="tdx"><p><b>Prodi</b>&nbsp;</td>
                                        <td class="tdx"><p><b>T.Lulus</b></td>
                                    </tr>            
                                    <?php
                                    $query_pub = mysqli_query($db,"SELECT * FROM pendidikan JOIN dosen ON pendidikan.nidn=dosen.nidn AND dosen.nidn = 30037701");
                                    while ($row = mysqli_fetch_assoc($query_pub)){
                                        echo 
                                        '<td class="tdx"><p><span>'. $row["namapt"] .'</span></td>
                                        <td class="tdx"><p><span>'. $row["prodi"] .'</span></td>
                                        <td class="tdx"><p><span>'. $row["tahun_lulus"] .'</span></td>
                                        </tr> ';
                                    }
                                    ?>
                                </table>
                            </div>
                            <!-- Script -->
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
                        <?php
                            if(($awalData) % $kolom== 0) {    
                                echo'</div>';        
                            }
                            $awalData++;
                        }
                        ?>
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

  
<!-- Modal Dosen NIDN : 30037702--> 
  <div class="modal fade" id="profil2" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">DETAIL DOSEN</h4>
                <button class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                
                <div class="tab">
                <button class="tablinks" onclick="openCity2(event, 'Biodata2')" id="defaultOpen2">Biodata</button>
                <button class="tablinks" onclick="openCity2(event, 'Publikasi2')">Publikasi</button>
                <button class="tablinks" onclick="openCity2(event, 'Pengabdian2')">Pengabdian</button>
                <button class="tablinks" onclick="openCity2(event, 'Riwayat2')">Pendidikan</button>
                </div>

                <div id="Biodata2" class="tabcontent2">
                <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
                
                <table>

                <?php

                    $query_bio = mysqli_query($db,"SELECT * FROM dosen WHERE nidn=30037702");
                    while($row = mysqli_fetch_array($query_bio)){
                        echo
                        '<tr class="trx"><td class="tdx"><p><span><b>NAMA</b></span></p></td>
                        <td class="tdx" align="center"><p>:</p></td>
                        <td class="tdx"><p>&nbsp;'. $row["nama"] .'</p></td>
                        </tr>
                        <tr class="trx"><td class="tdx"><p><span><b>NIDN</b></span></p></td>
                            <td class="tdx" align="center"><p>:</p></td>
                            <td class="tdx"><p>&nbsp;'. $row["nidn"] .'</p></td>
                        </tr>
                        <tr class="trx"><td class="tdx"><p><span><b>JAFUNG</b></span>&nbsp;&nbsp;&nbsp;&nbsp</p></td>
                            <td class="tdx" align="center"><p>:</p></td>
                            <td class="tdx"><p>&nbsp;'. $row["jafung"] .'</p></td>
                        </tr>
                        <tr class="trx"><td class="tdx"><p><span><b>ALAMAT</b></span></p></td>
                            <td class="tdx" align="center"><p>:</p></td>
                            <td class="tdx"><p>&nbsp;'. $row["alamat"] .'</p></td>
                        </tr>
                        <tr class="trx"><td class="tdx"><p><span><b>NO TELP</b></span></p></td>
                            <td class="tdx" align="center"><p>:</p></td>
                            <td class="tdx"><p>&nbsp;'. $row["no_telp"] .'</p></td>
                        </tr>
                        <tr class="trx"><td class="tdx"><p><span><b>Scholar ID</b></span></p></td>
                            <td class="tdx" align="center"><p>:</p></td>
                            <td class="tdx"><p>&nbsp;'. $row["scholarid"] .'</p></td>
                        </tr>
                        <tr class="trx"><td class="tdx"><p><span><b>Scopus ID</b></span>&nbsp</p></td>
                            <td class="tdx" align="center"><p>:</p></td>
                            <td class="tdx"><p>&nbsp;'. $row["scopusid"] .'</p></td>
                        </tr>';
                    }

                ?>                    
                </table>
                </div>

                <div id="Publikasi2" class="tabcontent2">
                <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
                
                <table>
                    <tr class="trx"><td class="tdx"><p><b>TAHUN</b>&nbsp;</td>
                        <td class="tdx"><p><b>JUDUL</b></td>
                        <td class="tdx"><p><b>DANA</b></td>
                    </tr>

                    <?php

                    $query_pub = mysqli_query($db,"SELECT * FROM publikasi JOIN dosen ON publikasi.nidn=dosen.nidn AND dosen.nidn = 30037702");
                    while ($row = mysqli_fetch_assoc($query_pub)){
                        echo 
                        '<td class="tdx"><p><span>'. $row["tahun"] .'</span></td>
                        <td class="tdx"><p><span>'. $row["judul"] .'</span></td>
                        <td class="tdx"><p><span>'. $row["dana"] .'</span></td>
                        </tr> ';
                    }
                    ?>
                                       
                </table> 
                </div>

                <div id="Pengabdian2" class="tabcontent2">
                <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
                
                <table>
                    <tr class="trx"><td class="tdx"><p><b>TAHUN</b>&nbsp;</td>
                        <td class="tdx"><p><b>JUDUL</b></td>
                        <td class="tdx"><p><b>DANA</b></td>
                    </tr>
                    <?php

                    $query_pub = mysqli_query($db,"SELECT * FROM pengabdian JOIN dosen ON pengabdian.nidn=dosen.nidn AND dosen.nidn = 30037702");
                    while ($row = mysqli_fetch_assoc($query_pub)){
                        echo 
                        '<td class="tdx"><p><span>'. $row["tahun"] .'</span></td>
                        <td class="tdx"><p><span>'. $row["judul"] .'</span></td>
                        <td class="tdx"><p><span>'. $row["dana"] .'</span></td>
                        </tr> ';
                    }
                    ?>
                    
                    
                </table>
                </div>
                <div id="Riwayat2" class="tabcontent2">
                    <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
                    
                    <table>
                        <tr class="trx"><td class="tdx"><p><b>Nama PT</b>&nbsp;</td>
                            <td class="tdx"><p><b>Prodi</b>&nbsp;</td>
                            <td class="tdx"><p><b>T.Lulus</b></td>
                        </tr>    
                        
                        <?php

                        $query_pub = mysqli_query($db,"SELECT * FROM pendidikan JOIN dosen ON pendidikan.nidn=dosen.nidn AND dosen.nidn = 30037702");
                        while ($row = mysqli_fetch_assoc($query_pub)){
                            echo 
                            '<td class="tdx"><p><span>'. $row["namapt"] .'</span></td>
                            <td class="tdx"><p><span>'. $row["prodi"] .'</span></td>
                            <td class="tdx"><p><span>'. $row["tahun_lulus"] .'</span></td>
                            </tr> ';
                        }
                        ?>
                        
                    </table>
                </div>

                <script>
                function openCity2(evt2, cityName2) {
                var i, tabcontent, tablinks2;
                tabcontent = document.getElementsByClassName("tabcontent2");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks2 = document.getElementsByClassName("tablinks2");
                for (i = 0; i < tablinks2.length; i++) {
                    tablinks2[i].className = tablinks2[i].className.replace(" active", "");
                }
                document.getElementById(cityName2).style.display = "block";
                evt2.currentTarget.className += " active";
                }

                // Get the element with id="defaultOpen" and click on it
                document.getElementById("defaultOpen2").click();
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