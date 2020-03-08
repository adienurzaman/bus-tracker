-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 08, 2020 at 06:50 PM
-- Server version: 10.1.44-MariaDB-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `senr3879_bus-tracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sensor`
--

CREATE TABLE `tbl_sensor` (
  `id_log` int(11) NOT NULL,
  `id_sensor` int(11) NOT NULL,
  `latitude` varchar(60) NOT NULL,
  `longitude` varchar(60) NOT NULL,
  `ket_waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_sensor`
--

INSERT INTO `tbl_sensor` (`id_log`, `id_sensor`, `latitude`, `longitude`, `ket_waktu`) VALUES
(1, 1, '-6.832130', '108.215478', '2020-02-15 07:11:03'),
(2, 2, 'lat', 'long', '2020-02-19 07:54:57'),
(3, 1, 'lat', 'long', '2020-02-19 07:56:08'),
(4, 2, 'lat', 'long', '2020-02-19 07:56:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_sensor`
--
ALTER TABLE `tbl_sensor`
  ADD PRIMARY KEY (`id_log`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_sensor`
--
ALTER TABLE `tbl_sensor`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
