-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2021 at 04:27 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `nama` varchar(30) NOT NULL,
  `jafung` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `scholarid` varchar(10) NOT NULL,
  `scopusid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nidn`, `nama`, `jafung`, `alamat`, `no_telp`, `scholarid`, `scopusid`) VALUES
(30037701, 'BBBBB BBBBB, S.T., M.Kom.', 'LEKTOR', 'JL. Adi Podai No. 136 Besuki Situbondo Jawa Timur', '087654456543', '-', '-'),
(30037702, 'LUKMAN HAKIMM, S.Kom., M.Kom.', 'LEKTOR KEPALA', ' JL. Adi Podai No. 136 Besuki Situbondo Jawa Timur', '-', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` int(11) NOT NULL,
  `nama_keg` text NOT NULL,
  `desk` text NOT NULL,
  `img` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `nama_keg`, `desk`, `img`) VALUES
(9, 'Workshop Pelatihan Dosen Fakultas Teknik', 'Bekerja dengan suasana hati yang lebih asik dan mempelajari hal baru setiap harinya.', 'img/workingspace.jpg'),
(10, 'Kegiatan Pengenalan Kampus Mahasiswa Jurusan Teknologi Informasi', 'Setelah rangkaian kegiatan Pengenalan Kehidupan Kampus bagi Mahasiswa Baru (PKKMB) dan Bela Negara tahun 2017 oleh Politeknik Negeri Jember, pada tanggal 30 Agustus 2017 di penghujung bulan ini Jurusan Teknologi Informasi mendapatkan kesempatan bertemu langsung ke mahasiswa baru.', 'img/ospek.jpg'),
(11, 'Praktek Lapang Manajemen Informatika ke Diskominfo Jatim dan RADNET Surabaya', 'Praktek Lapang Manajemen Informatika ke Diskominfo Jatim dan RADNET Surabaya', 'img/praktek_lapang.jpg'),
(12, 'Pengenalan Kampus D4 Teknik Informatika Kelas Internasional di Management and Science University Malaysia', 'Pengenalan Kampus D4 Teknik Informatika Kelas Internasional di Management and Science University Malaysia', 'img/ospek_inter.jpg'),
(13, 'Praktek Lapang Manajemen Informatika', 'Praktek Lapang Manajemen Informatika', 'img/praktek_lapang2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `nidn` int(10) NOT NULL,
  `namapt` varchar(225) NOT NULL,
  `prodi` varchar(225) NOT NULL,
  `tahun_lulus` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`nidn`, `namapt`, `prodi`, `tahun_lulus`) VALUES
(30037702, 'Universitas Muhammadiyah Jember', 'Teknik Informatika', 2012),
(30037702, 'Institut Teknologi Sepuluh Nopember', 'Teknik Informatika', 2019),
(30037702, 'test database', 'test', 2021);

-- --------------------------------------------------------

--
-- Table structure for table `pengabdian`
--

CREATE TABLE `pengabdian` (
  `nidn` int(10) NOT NULL,
  `tahun` int(4) NOT NULL,
  `judul` varchar(225) NOT NULL,
  `dana` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengabdian`
--

INSERT INTO `pengabdian` (`nidn`, `tahun`, `judul`, `dana`) VALUES
(30037702, 2021, 'Perancangan Simulasi Pembangkit Listrik Tenaga Air menggunakan metode XYZ', 'DIKTI'),
(30037702, 2021, 'Testing database', 'test');

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
(5, 30037702, 2019, 'Klasifikasi Kebutuhan Non-Fungsional menggunakan FSKNN berbasis ISO/IEC 25010', 'JUTI');

-- --------------------------------------------------------

--
-- Table structure for table `publikasi3`
--

CREATE TABLE `publikasi3` (
  `nidn` int(10) NOT NULL,
  `tahun` int(4) NOT NULL,
  `judul` varchar(225) NOT NULL,
  `dana` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `publikasi3`
--

INSERT INTO `publikasi3` (`nidn`, `tahun`, `judul`, `dana`) VALUES
(30037702, 2018, 'Pembobotan Kata berdasarkan Kluster untuk Peringkasan Otomatis Multi Dokumen”. Jurnal Linguistik Komputasional (JLK), Vol 1, No 2', 'DIKTI'),
(30037702, 2018, 'Modified Alpha++ Algorithm for Discovering the Hybrid of Non-Free Choice and Invisible Task of Business Processes. International Journal of Intelligent Engineering and Systems, Vol 12, Issue 3', 'DIKTI'),
(30037702, 2019, 'Evaluasi Kombinasi Hipernim dan Sinonim untuk Klasifikasi Kebutuhan Non-Functional berbasis ISO/IEC 25010. Jurnal Teknologi Informasi dan Ilmu Komputer (JTIIK), Vol 6, No 5', 'DIKTI'),
(30037702, 2019, 'Klasifikasi Kebutuhan Non-Fungsional menggunakan FSKNN berbasis ISO/IEC 25010. Jurnal Ilmiah Teknologi Informasi (JUTI)', 'DIKTI');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nidn`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD KEY `nidn` (`nidn`);

--
-- Indexes for table `pengabdian`
--
ALTER TABLE `pengabdian`
  ADD KEY `nidn` (`nidn`);

--
-- Indexes for table `publikasi`
--
ALTER TABLE `publikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publikasi3`
--
ALTER TABLE `publikasi3`
  ADD KEY `nidn` (`nidn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD CONSTRAINT `pendidikan_ibfk_1` FOREIGN KEY (`nidn`) REFERENCES `dosen` (`nidn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengabdian`
--
ALTER TABLE `pengabdian`
  ADD CONSTRAINT `pengabdian_ibfk_1` FOREIGN KEY (`nidn`) REFERENCES `dosen` (`nidn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `publikasi3`
--
ALTER TABLE `publikasi3`
  ADD CONSTRAINT `publikasi3_ibfk_1` FOREIGN KEY (`nidn`) REFERENCES `dosen` (`nidn`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
