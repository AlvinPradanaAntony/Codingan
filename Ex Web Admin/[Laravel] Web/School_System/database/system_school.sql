-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2019 at 02:13 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `system_school`
--

-- --------------------------------------------------------

--
-- Table structure for table `dashboard_admin`
--

CREATE TABLE `dashboard_admin` (
  `id` int(6) NOT NULL,
  `username` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dashboard_admin`
--

INSERT INTO `dashboard_admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `tble_class_a`
--

CREATE TABLE `tble_class_a` (
  `id` int(6) NOT NULL,
  `Student_Name` varchar(50) NOT NULL,
  `Sex` varchar(5) NOT NULL,
  `Grand` varchar(10) NOT NULL,
  `Khmer` varchar(50) NOT NULL,
  `Mathematics` varchar(50) NOT NULL,
  `Physics` varchar(50) NOT NULL,
  `Chemistry` varchar(50) NOT NULL,
  `Biology` varchar(50) NOT NULL,
  `English` varchar(120) NOT NULL,
  `C_Program` varchar(150) NOT NULL,
  `C++_Program` varchar(150) NOT NULL,
  `Total_Score` varchar(150) NOT NULL,
  `Average` varchar(250) NOT NULL,
  `Grade` varchar(20) NOT NULL,
  `Date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tble_class_a`
--

INSERT INTO `tble_class_a` (`id`, `Student_Name`, `Sex`, `Grand`, `Khmer`, `Mathematics`, `Physics`, `Chemistry`, `Biology`, `English`, `C_Program`, `C++_Program`, `Total_Score`, `Average`, `Grade`, `Date`) VALUES
(36, 'Souy Soeng', 'Male', 'Class A', '85', '85', '85', '85', '85', '85', '85', '85', '680', '85', 'A', '2019-08-19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dashboard_admin`
--
ALTER TABLE `dashboard_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tble_class_a`
--
ALTER TABLE `tble_class_a`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dashboard_admin`
--
ALTER TABLE `dashboard_admin`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tble_class_a`
--
ALTER TABLE `tble_class_a`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
