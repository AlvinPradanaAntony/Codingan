-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2021 at 03:26 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `praktikum_lab1`
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
  `kode_lab` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nidn`, `nama`, `jafung`, `alamat`, `no_telp`, `scholarid`, `scopusid`, `kode_lab`) VALUES
(30037701, 'Hamsus Sholihin, S.T., M.Kom.', 'LEKTOR', 'JL. Adi Podai No. 136 Besuki Situbondo Jawa Timur', '087654456543', '-', '-', 'L001'),
(30037702, 'Lukman Hakim, S.Kom., M.Kom.', 'LEKTOR KEPALA', ' JL. Adi Podai No. 136 Besuki Situbondo Jawa Timur', '-', '-', '-', 'L001'),
(30037703, 'Dr. Faridatur Riskiyah, S.Kom., M.Kom.', 'LEKTOR', 'JL. Adi Podai No. 136 Besuki Situbondo Jawa Timur', '-', '-', '-', 'L002'),
(30037704, 'Joko', 'LEKTOR', 'JL. Adi Podai No. 136 Besuki Situbondo Jawa Timur', '-', '-', '-', 'L003');

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
  `tanggal` date NOT NULL,
  `nama_keg` text NOT NULL,
  `desk` text NOT NULL,
  `img` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `tanggal`, `nama_keg`, `desk`, `img`) VALUES
(11, '2021-11-01', 'Praktek Lapang Manajemen Informatika ke Diskominfo Jatim dan RADNET Surabaya', 'Praktek Lapang Manajemen Informatika ke Diskominfo Jatim dan RADNET probolinggo', 'praktek-lapang-manajemen-informatika-ke-diskominfo-jatim-dan-radnet-surabaya.jpg'),
(13, '2021-03-09', 'Praktek Lapang Manajemen Informatika', 'Praktek Lapang Manajemen Informatika', 'praktek-lapang-manajemen-informatika.jpg'),
(14, '2021-11-13', 'Kegiatan Ini adalah kegiatan ke 5', 'Bismillah kita akan mengadakan acara yang sangat besar untuk merayakan hari pahlawan ini ', 'kegiatan-ini-adalah-kegiatan-ke-5.jpg'),
(16, '2021-11-14', 'coba', 'coba', 'workingspace.jpg');

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
  `nidn` int(9) DEFAULT NULL,
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
  `nidn` int(9) DEFAULT NULL,
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
  `nama` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`id`, `nama`, `email`, `password`, `role`) VALUES
(1, 'Ade', 'ade', 'ade', 1);

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
-- Indexes for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD PRIMARY KEY (`kode_mk`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengabdian`
--
ALTER TABLE `pengabdian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publikasi`
--
ALTER TABLE `publikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_detail`
--
ALTER TABLE `user_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
