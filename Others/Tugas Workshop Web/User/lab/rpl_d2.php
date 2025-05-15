<!-- Modal Dosen NIDN : 30037702-->  
<div class="modal fade" id="profil2" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel2">DETAIL DOSEN</h4>
                <button class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                
                <div class="tab">
                <button class="tablinks2" onclick="openCity(event, 'Biodata2')" id="defaultOpen2">Biodata</button>
                <button class="tablinks2" onclick="openCity(event, 'Publikasi2')">Publikasi</button>
                <button class="tablinks2" onclick="openCity(event, 'Pengabdian2')">Pengabdian</button>
                <button class="tablinks2" onclick="openCity(event, 'Riwayat2')">Pendidikan</button>
                </div>

                <div id="Biodata2" class="tabcontent2">
                <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
                
                <table>

                <?php

                    $query_bio = mysqli_query($db,"SELECT * FROM dosen WHERE nidn=30037702");
                    while($row = mysqli_fetch_array($query_bio)){
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

                <div id="Publikasi2" class="tabcontent2">
                <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
                
                <table>
                    <tr><td><p><b>NO</b></p></td>
                        <td><p><b>TAHUN</b>&nbsp;</td>
                        <td><p><b>JUDUL</b></td>
                        <td><p><b>DANA</b></td>
                    </tr>

                    <?php

                    $query_pub = mysqli_query($db,"SELECT * FROM publikasi JOIN dosen ON publikasi.nidn=dosen.nidn AND dosen.nidn = 30037702");
                    while ($row = mysqli_fetch_assoc($query_pub)){
                        echo 
                        '<tr><td><p><span>-</span></p></td>
                        <td><p>'. $row["tahun"] .'</td>
                        <td><p>'. $row["judul"] .'</td>
                        <td><p>'. $row["dana"] .'</td>
                        </tr> ';
                    }
                    ?>
                                       
                </table> 
                </div>

                <div id="Pengabdian2" class="tabcontent2">
                <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
                
                <table>
                    <tr><td><p><b>NO</b></p></td>
                        <td><p><b>TAHUN</b>&nbsp;</td>
                        <td><p><b>JUDUL</b></td>
                        <td><p><b>DANA</b></td>
                    </tr>
                    <?php

                    $query_pub = mysqli_query($db,"SELECT * FROM pengabdian JOIN dosen ON pengabdian.nidn=dosen.nidn AND dosen.nidn = 30037702");
                    while ($row = mysqli_fetch_assoc($query_pub)){
                        echo 
                        '<tr><td><p><span>-</span></p></td>
                        <td><p>'. $row["tahun"] .'</td>
                        <td><p>'. $row["judul"] .'</td>
                        <td><p>'. $row["dana"] .'</td>
                        </tr> ';
                    }
                    ?>
                    
                    
                </table>
                </div>
                <div id="Riwayat2" class="tabcontent2">
                    <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
                    
                    <table>
                        <tr><td><p><b>NO</b></p></td>
                            <td><p><b>Nama PT</b>&nbsp;</td>
                            <td><p><b>Prodi</b>&nbsp;</td>
                            <td><p><b>Tahun Lulus</b></td>
                        </tr>    
                        
                        <?php

                        $query_pub = mysqli_query($db,"SELECT * FROM pendidikan JOIN dosen ON pendidikan.nidn=dosen.nidn AND dosen.nidn = 30037702");
                        while ($row = mysqli_fetch_assoc($query_pub)){
                            echo 
                            '<tr><td><p><span>-</span></p></td>
                            <td><p>'. $row["namapt"] .'</td>
                            <td><p>'. $row["prodi"] .'</td>
                            <td><p>'. $row["tahun_lulus"] .'</td>
                            </tr> ';
                        }
                        ?>
                        
                    </table>
                </div>

                <script>
                function openCity(evt, cityName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent2");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks2");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(cityName).style.display = "block";
                evt.currentTarget.className += " active";
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
