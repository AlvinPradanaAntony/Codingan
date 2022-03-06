-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2021 at 06:39 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `praktikum_lab`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nidn` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jafung` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `scholarid` varchar(10) NOT NULL,
  `scopusid` varchar(10) NOT NULL,
  `img` varchar(30) NOT NULL,
  `kode_lab` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nidn`, `nama`, `jafung`, `alamat`, `no_telp`, `scholarid`, `scopusid`, `img`, `kode_lab`) VALUES
(30037701, 'Adi Heru Utomo S.kom, M.Kom', 'LEKTOR KEPALA', 'JL. Adi Podai No. 136 Besuki Situbondo Jawa Timur', '087654456543', '-', '-', 'img/bpk_adi_heru.png', 'L001'),
(30037702, 'Lukman Hakim, S.Kom., M.Kom.', 'LEKTOR KEPALA', ' JL. Adi Podai No. 136 Besuki Situbondo Jawa Timur', '-', '-', '-', 'img/hires.jpg', 'L001'),
(30037703, 'Nugroho Setyo Wibowo, ST, MT', 'LEKTOR', 'JL. Adi Podai No. 136 Besuki Situbondo Jawa Timur', '-', '-', '-', 'img/bpk_nugroho.png', 'L002'),
(30037704, 'Bety Etikasari', 'LEKTOR', 'JL. Adi Podai No. 136 Besuki Situbondo Jawa Timur', '-', '-', '-', 'img/bu_bety.png', 'L003'),
(30037705, 'Ery Setiyawan Jullev Atmadji, S.Kom, M.C', 'Tenaga Pengajar', '-', '08978271', '-', '-', 'img/bpk_ery.png', 'L003'),
(30037706, 'Mukhamad Angga Gumilang, S.Pd, M.Eng', 'Tenaga Pengajar', '-', '088361232', '-', '-', 'img/bpk_angga.png', 'L002');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `nik` int(10) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`nik`, `nama_karyawan`) VALUES
(11111, 'Joko2 Purwanto, S.Kom'),
(22222, 'Anita Andini, S.Kom');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` int(11) NOT NULL,
  `nama_keg` text NOT NULL,
  `desk` text NOT NULL,
  `img` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `nama_keg`, `desk`, `img`) VALUES
(9, 'Workshop Pelatihan Dosen Fakultas Teknik', 'Bekerja dengan suasana hati yang lebih asik dan mempelajari hal baru setiap harinya.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Eum voluptas sunt maiores iure! Optio perspiciatis, dolores perferendis deleniti ipsam, nam culpa labore ea velit adipisci, necessitatibus error officiis aliquid voluptate.\r\n\r\nLorem ipsum dolor sit, amet consectetur adipisicing elit. Sunt in repellat nemo esse earum magni, dolorum temporibus voluptatem aliquid quae?', 'workingspace-min.jpg'),
(10, 'Kegiatan Pengenalan Kampus Mahasiswa Jurusan Teknologi Informasi', 'Setelah rangkaian kegiatan Pengenalan Kehidupan Kampus bagi Mahasiswa Baru (PKKMB) dan Bela Negara tahun 2017 oleh Politeknik Negeri Jember, pada tanggal 30 Agustus 2017 di penghujung bulan ini Jurusan Teknologi Informasi mendapatkan kesempatan bertemu langsung ke mahasiswa baru.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Tempore ex, ducimus quis debitis laudantium omnis, harum placeat atque optio dolores odit! Eaque dolore maiores explicabo perspiciatis dicta fuga eligendi culpa placeat distinctio odit assumenda ut obcaecati incidunt, nostrum magni enim voluptatem quam quidem suscipit, ipsa porro? Nam error minus sint vero sapiente natus quam obcaecati! Impedit fugiat molestias repellat dolorum.', 'ospek.jpg'),
(11, 'Praktek Lapang Manajemen Informatika ke Diskominfo Jatim dan RADNET Surabaya', 'Praktek Lapang Manajemen Informatika ke Diskominfo Jatim dan RADNET Surabaya\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Delectus culpa dolore neque aliquid! Reiciendis quas aperiam perferendis delectus magnam natus officiis, eius id ullam numquam optio saepe inventore corporis ipsam consequuntur, similique magni, eos esse nobis eum ratione a placeat? \r\n\r\nQuasi consequatur illo accusantium dolor eaque, exercitationem magnam distinctio! Doloremque ratione quidem minima eos totam doloribus recusandae excepturi vero debitis.', 'praktek_lapang.jpg'),
(12, 'Pengenalan Kampus D4 Teknik Informatika Kelas Internasional di Management and Science University Malaysia', 'Pengenalan Kampus D4 Teknik Informatika Kelas Internasional di Management and Science University Malaysia\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Eum voluptas sunt maiores iure! Optio perspiciatis, dolores perferendis deleniti ipsam, nam culpa labore ea velit adipisci, necessitatibus error officiis aliquid voluptate.', 'ospek_inter.jpg'),
(13, 'Praktek Lapang Manajemen Informatika', 'Praktek Lapang Manajemen Informatika\r\n\r\nPraktek Lapang Manajemen Informatika\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Eum voluptas sunt maiores iure! Optio perspiciatis, dolores perferendis deleniti ipsam, nam culpa labore ea velit adipisci, necessitatibus error officiis aliquid voluptate.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Magni corrupti aperiam tempora earum, repudiandae dolorum qui ipsam rem veritatis nulla eveniet. Perferendis accusamus consequuntur ipsa ducimus amet corporis, explicabo doloribus earum laboriosam consectetur nulla. Harum.\r\n', 'praktek_lapang2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `laboratorium`
--

CREATE TABLE `laboratorium` (
  `kode_lab` varchar(5) NOT NULL,
  `nama_laboratorium` varchar(100) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laboratorium`
--

INSERT INTO `laboratorium` (`kode_lab`, `nama_laboratorium`, `keterangan`) VALUES
('L001', 'Rekayasa Perangkat Lunak', 'Laboratorium Rekayasa Perangkat Lunak yang kemudian lebih populer disebut sebagai Lab RPL resmi beroperasi sejak Tanggal/ Bulan/ Tahun. Lab RPL pernah digunakan untuk pelatihan ABC, DEF dan GHI yang merupakan kerjasama Fakultas/ Prodi X Universitas Muhammadiyah Jember dan Industri seperti (Oracle Academy Indonesia) atau yang lain, pelatihan tersebut diikuti (Sejumlah) peserta yang terdiri dari dosen-dosen beberapa perguruan tinggi di wilayah Jawa Timur.\n\nLaboratorium ini digunakan untuk kegiatan praktikum Mahasiswa Fakultas Teknik baik dari program studi Manajemen Informatika (D3), dan Teknik Informatika (D4). Secara khusus Lab RPL diperuntukan untuk menunjang kegiatan di bidang pemrograman dan perancangan perangkat lunak. Kapasitas Lab RPL sebanyak () komputer untuk mahasiswa dan 1 komputer untuk dosen.\n\n'),
('L002', 'Multimedia', 'Laboratorium'),
('L003', 'Pemrograman', 'Laboratorium'),
('L004', 'Pengolahan Citra Digital', 'Laboratorium'),
('L005', 'Jaringan', 'Laboratorium');

-- --------------------------------------------------------

--
-- Table structure for table `level_detail`
--

CREATE TABLE `level_detail` (
  `id_level` tinyint(4) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `level_detail`
--

INSERT INTO `level_detail` (`id_level`, `level`) VALUES
(1, 'admin'),
(2, 'operator');

-- --------------------------------------------------------

--
-- Table structure for table `mata_kuliah`
--

CREATE TABLE `mata_kuliah` (
  `kode_mk` varchar(5) NOT NULL,
  `nama_mk` varchar(100) DEFAULT NULL,
  `sks` int(11) DEFAULT NULL,
  `kode_lab` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mata_kuliah`
--

INSERT INTO `mata_kuliah` (`kode_mk`, `nama_mk`, `sks`, `kode_lab`) VALUES
('MK01', 'Basis Data 1', 3, 'L001'),
('MK02', 'Basis Data 2', 3, 'L001'),
('MK03', 'Dasar-Dasar Pemrograman', 4, 'L001'),
('MK04', 'Pemrograman Berorientasi Objek', 4, 'L001'),
('MK05', 'Pemrograman Web', 4, 'L001'),
('MK06', 'Struktur Data', 3, 'L001'),
('MK07', 'Jaringan Komputer', 3, 'L005');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id` int(5) NOT NULL,
  `nidn` int(9) DEFAULT NULL,
  `namapt` varchar(100) DEFAULT NULL,
  `prodi` varchar(50) DEFAULT NULL,
  `tahun_lulus` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`id`, `nidn`, `namapt`, `prodi`, `tahun_lulus`) VALUES
(1, 30037702, 'Universitas Muhammadiyah Jember [S1]', 'Teknik Informatika', 2012),
(2, 30037702, 'Institut Teknologi Sepuluh Nopember [S2]', 'Teknik Informatika', 2019),
(3, 30037701, 'Institut Teknologi Sepuluh Nopember [S2]\r\n', 'Sistem Informasi', 2015);

-- --------------------------------------------------------

--
-- Table structure for table `pengabdian`
--

CREATE TABLE `pengabdian` (
  `id` int(5) NOT NULL,
  `nidn` int(10) DEFAULT NULL,
  `tahun` int(4) DEFAULT NULL,
  `judul` varchar(200) DEFAULT NULL,
  `dana` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengabdian`
--

INSERT INTO `pengabdian` (`id`, `nidn`, `tahun`, `judul`, `dana`) VALUES
(1, 30037702, 2021, 'Perancangan Simulasi Pembangkit Listrik Tenaga Air menggunakan metode XYZ', 'DIKTI'),
(2, 30037702, 2021, 'Pemurnian air sungai menggunakan metode ABC', 'DIKTI'),
(3, 30037701, 2020, 'Pemantauan data pelanggaran jaringan listrik di desa XYX menggunakan Drone', 'DIKTI');

-- --------------------------------------------------------

--
-- Table structure for table `publikasi`
--

CREATE TABLE `publikasi` (
  `id` int(5) NOT NULL,
  `nidn` int(10) DEFAULT NULL,
  `tahun` int(4) DEFAULT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `dana` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publikasi`
--

INSERT INTO `publikasi` (`id`, `nidn`, `tahun`, `judul`, `dana`) VALUES
(1, 30037702, 2018, 'Pembobotan Kata berdasarkan Kluster untuk Peringkasan Otomatis Multi Dokumen', 'DIKTI'),
(2, 30037702, 2019, 'Oversampling Imbalance Data : Case Study on Functional and Non Functional Requirement', 'EECCIS'),
(3, 30037702, 2019, 'Modified Alpha++ Algorithm for Discovering the Hybrid of Non-Free Choice and Invisible Task of Busin', 'INASS'),
(4, 30037702, 2019, 'Evaluasi Kombinasi Hipernim dan Sinonim untuk Klasifikasi Kebutuhan Non-Functional berbasis ISO/IEC ', 'JTIIK'),
(5, 30037702, 2019, 'Klasifikasi Kebutuhan Non-Fungsional menggunakan FSKNN berbasis ISO/IEC 25010', 'JUTI'),
(6, 30037701, 2021, 'Teknik Klasisikasi Data Dosen menggunakan metode SVM', 'DIKTI');

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE `user_detail` (
  `id` int(11) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_fullname` varchar(100) NOT NULL,
  `level` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`id`, `user_email`, `user_password`, `user_fullname`, `level`) VALUES
(1, 'admin@admin.com', '123', 'Administrator', 1),
(2, 'staff@staff.com', '202cb962ac59075b964b07152d234b70', 'Riki (Operator)', 1),
(3, 'user@user.com', '123', 'Budi Utomo (Operator)', 2),
(4, 'user2@user.com', '123', 'Alvin Pradana Antonys', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nidn`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laboratorium`
--
ALTER TABLE `laboratorium`
  ADD PRIMARY KEY (`kode_lab`);

--
-- Indexes for table `level_detail`
--
ALTER TABLE `level_detail`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD PRIMARY KEY (`kode_mk`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nidn` (`nidn`);

--
-- Indexes for table `pengabdian`
--
ALTER TABLE `pengabdian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nidn` (`nidn`);

--
-- Indexes for table `publikasi`
--
ALTER TABLE `publikasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nidn` (`nidn`);

--
-- Indexes for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `level` (`level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `level_detail`
--
ALTER TABLE `level_detail`
  MODIFY `id_level` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_detail`
--
ALTER TABLE `user_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD CONSTRAINT `pendidikan_ibfk_1` FOREIGN KEY (`nidn`) REFERENCES `dosen` (`nidn`);

--
-- Constraints for table `pengabdian`
--
ALTER TABLE `pengabdian`
  ADD CONSTRAINT `pengabdian_ibfk_1` FOREIGN KEY (`nidn`) REFERENCES `dosen` (`nidn`);

--
-- Constraints for table `publikasi`
--
ALTER TABLE `publikasi`
  ADD CONSTRAINT `publikasi_ibfk_1` FOREIGN KEY (`nidn`) REFERENCES `dosen` (`nidn`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
