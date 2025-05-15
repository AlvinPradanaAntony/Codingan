-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2022 at 08:53 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dmc45v33`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_training`
--

CREATE TABLE `data_training` (
  `id` int(11) NOT NULL,
  `PROPOSAL` varchar(40) NOT NULL,
  `MKD` varchar(40) NOT NULL,
  `MKI` varchar(40) NOT NULL,
  `MKP` varchar(40) NOT NULL,
  `KEPUTUSAN` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `data_training`
--

INSERT INTO `data_training` (`id`, `PROPOSAL`, `MKD`, `MKI`, `MKP`, `KEPUTUSAN`) VALUES
(1, 'Baik', 'Kurang', 'Sedang', 'Sedang', 'Diterima'),
(2, 'Kurang', 'Baik', 'Kurang', 'Baik', 'Ditolak'),
(3, 'Baik', 'Sedang', 'Baik', 'Kurang', 'Diterima'),
(4, 'Baik', 'Kurang', 'Kurang', 'Baik', 'Diterima'),
(5, 'Baik', 'Baik', 'Kurang', 'Kurang', 'Diterima'),
(6, 'Sedang', 'Sedang', 'Sedang', 'Kurang', 'Ditolak'),
(7, 'Sedang', 'Baik', 'Kurang', 'Baik', 'Revisi'),
(8, 'Kurang', 'Kurang', 'Baik', 'Sedang', 'Ditolak'),
(9, 'Baik', 'Kurang', 'Baik', 'Kurang', 'Diterima'),
(10, 'Sedang', 'Baik', 'Baik', 'Baik', 'Diterima'),
(11, 'Sedang', 'Kurang', 'Baik', 'Sedang', 'Revisi'),
(12, 'Sedang', 'Baik', 'Sedang', 'Kurang', 'Revisi'),
(13, 'Kurang', 'Baik', 'Baik', 'Kurang', 'Ditolak'),
(14, 'Sedang', 'Baik', 'Kurang', 'Kurang', 'Ditolak'),
(15, 'Baik', 'Kurang', 'Kurang', 'Kurang', 'Diterima'),
(16, 'Kurang', 'Kurang', 'Kurang', 'Kurang', 'Ditolak'),
(17, 'Kurang', 'Baik', 'Kurang', 'Kurang', 'Ditolak'),
(18, 'Baik', 'Kurang', 'Kurang', 'Baik', 'Diterima'),
(19, 'Baik', 'Baik', 'Kurang', 'Kurang', 'Diterima'),
(20, 'Baik', 'Kurang', 'Kurang', 'Kurang', 'Diterima'),
(21, 'Kurang', 'Baik', 'Baik', 'Kurang', 'Ditolak'),
(22, 'Kurang', 'Baik', 'Kurang', 'Baik', 'Ditolak'),
(23, 'Sedang', 'Baik', 'Baik', 'Baik', 'Diterima'),
(24, 'Sedang', 'Sedang', 'Baik', 'Baik', 'Revisi'),
(25, 'Baik', 'Baik', 'Kurang', 'Kurang', 'Diterima'),
(26, 'Baik', 'Kurang', 'Kurang', 'Kurang', 'Diterima'),
(27, 'Sedang', 'Baik', 'Kurang', 'Kurang', 'Ditolak'),
(28, 'Sedang', 'Baik', 'Baik', 'Baik', 'Diterima'),
(29, 'Sedang', 'Kurang', 'Baik', 'Baik', 'Revisi'),
(30, 'Baik', 'Baik', 'Baik', 'Baik', 'Diterima');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_training`
--
ALTER TABLE `data_training`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_training`
--
ALTER TABLE `data_training`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
