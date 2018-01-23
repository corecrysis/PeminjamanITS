-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2017 at 09:12 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lumino`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_data_pinjam`
--

CREATE TABLE `t_data_pinjam` (
  `p_id_pinjam` int(10) UNSIGNED NOT NULL,
  `p_unit` varchar(254) NOT NULL,
  `p_m_pinjam` datetime NOT NULL,
  `p_m_kembali` datetime NOT NULL,
  `p_barang` varchar(100) NOT NULL,
  `p_golongan` varchar(50) NOT NULL,
  `p_tujuan` text NOT NULL,
  `p_harga` varchar(100) DEFAULT '0',
  `p_cp` varchar(100) NOT NULL,
  `p_verif` enum('0','1','2') NOT NULL DEFAULT '0',
  `p_validasi` enum('0','1','2') NOT NULL DEFAULT '0',
  `p_timest` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_fasilitas`
--

CREATE TABLE `t_fasilitas` (
  `t_id_fasilitas` int(5) UNSIGNED NOT NULL,
  `m_nama_barang` varchar(100) NOT NULL,
  `f_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_fasilitas`
--

INSERT INTO `t_fasilitas` (`t_id_fasilitas`, `m_nama_barang`, `f_timestamp`) VALUES
(1, 'Lapangan Basket', '2017-02-21 10:37:55'),
(3, 'Lapangan Pertamina', '2017-02-26 12:57:02'),
(4, 'Taman Alumni', '2017-03-09 10:08:22');

-- --------------------------------------------------------

--
-- Table structure for table `t_mobil`
--

CREATE TABLE `t_mobil` (
  `m_id_mobil` int(5) UNSIGNED NOT NULL,
  `m_nama_barang` varchar(100) NOT NULL,
  `m_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_mobil`
--

INSERT INTO `t_mobil` (`m_id_mobil`, `m_nama_barang`, `m_timestamp`) VALUES
(1, 'Suzuki Ertiga L 1234 ABCD', '2017-03-11 17:05:05'),
(2, 'Honda Mobilio L9876 SFS', '2017-02-26 12:59:41'),
(3, 'Bus 1', '2017-03-09 04:49:00');

-- --------------------------------------------------------

--
-- Table structure for table `t_ruang`
--

CREATE TABLE `t_ruang` (
  `t_id_ruang` int(5) UNSIGNED NOT NULL,
  `m_nama_barang` varchar(100) NOT NULL,
  `r_timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_ruang`
--

INSERT INTO `t_ruang` (`t_id_ruang`, `m_nama_barang`, `r_timestamp`) VALUES
(2, 'Teater B', '2017-02-20 18:26:45'),
(3, 'Teater C', '2017-02-20 18:26:54'),
(5, 'Teater A', '2017-03-07 20:32:42'),
(7, 'Teater D', '2017-03-09 10:05:02'),
(8, 'Teater E', '2017-03-15 06:21:22');

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `m_id_user` int(2) UNSIGNED NOT NULL,
  `m_user_name` varchar(100) NOT NULL,
  `m_pass` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`m_id_user`, `m_user_name`, `m_pass`) VALUES
(1, 'admin_pinjam_its', 'c5770d3f6d969746b2a80b338d3c3239'),
(2, 'monitor_pinjam_its', '258240da554be3888b3559ffc7c7666b'),
(3, 'super_admin', '4c1094360c84fe6ac9a8c52924dee39c');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_data_pinjam`
--
ALTER TABLE `t_data_pinjam`
  ADD PRIMARY KEY (`p_id_pinjam`);

--
-- Indexes for table `t_fasilitas`
--
ALTER TABLE `t_fasilitas`
  ADD PRIMARY KEY (`t_id_fasilitas`);

--
-- Indexes for table `t_mobil`
--
ALTER TABLE `t_mobil`
  ADD PRIMARY KEY (`m_id_mobil`);

--
-- Indexes for table `t_ruang`
--
ALTER TABLE `t_ruang`
  ADD PRIMARY KEY (`t_id_ruang`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`m_id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_data_pinjam`
--
ALTER TABLE `t_data_pinjam`
  MODIFY `p_id_pinjam` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_fasilitas`
--
ALTER TABLE `t_fasilitas`
  MODIFY `t_id_fasilitas` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `t_mobil`
--
ALTER TABLE `t_mobil`
  MODIFY `m_id_mobil` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `t_ruang`
--
ALTER TABLE `t_ruang`
  MODIFY `t_id_ruang` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `m_id_user` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
