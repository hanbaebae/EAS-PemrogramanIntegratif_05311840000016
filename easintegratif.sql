-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2020 at 07:43 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_sumbangan`
--

CREATE TABLE `jenis_sumbangan` (
  `id` int(50) NOT NULL,
  `barang` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Table structure for table `penyumbang`
--

CREATE TABLE `penyumbang` (
  `id` int(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sumbangan`
--

CREATE TABLE `sumbangan` (
  `s_id` int(50) NOT NULL,
  `p_id` int(50) DEFAULT NULL,
  `j_id` int(50) DEFAULT NULL,
  `jumlah` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_sumbangan`
--
ALTER TABLE `jenis_sumbangan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `barang` (`barang`);

--
-- Indexes for table `penyumbang`
--
ALTER TABLE `penyumbang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `sumbangan`
--
ALTER TABLE `sumbangan`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `p_id` (`p_id`),
  ADD KEY `j_id` (`j_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_sumbangan`
--
ALTER TABLE `jenis_sumbangan`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `penyumbang`
--
ALTER TABLE `penyumbang`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `sumbangan`
--
ALTER TABLE `sumbangan`
  MODIFY `s_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sumbangan`
--
ALTER TABLE `sumbangan`
  ADD CONSTRAINT `sumbangan_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `penyumbang` (`id`),
  ADD CONSTRAINT `sumbangan_ibfk_2` FOREIGN KEY (`j_id`) REFERENCES `jenis_sumbangan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
