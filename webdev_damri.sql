-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 02, 2021 at 09:43 AM
-- Server version: 5.7.32-0ubuntu0.18.04.1
-- PHP Version: 7.2.34-9+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webdev_damri`
--

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_tiket`
--

CREATE TABLE `penjualan_tiket` (
  `id` int(11) NOT NULL,
  `asal` char(100) NOT NULL,
  `tujuan` char(150) NOT NULL,
  `tglJadwal` date NOT NULL,
  `harga` int(11) NOT NULL,
  `seat` char(10) NOT NULL,
  `jamKeberangkatan` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan_tiket`
--

INSERT INTO `penjualan_tiket` (`id`, `asal`, `tujuan`, `tglJadwal`, `harga`, `seat`, `jamKeberangkatan`) VALUES
(1, 'Sumatera Selatan', 'Riau', '2021-11-01', 45000, 'B1', '19:00:00'),
(2, 'Nusa Tenggara Timur', 'Jambi', '2021-11-02', 79000, 'C1', '19:00:00'),
(4, 'Jawa Timur', 'Jambi', '2021-11-03', 345000, 'B11', '08:31:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` char(17) NOT NULL,
  `email` char(100) NOT NULL,
  `password` char(32) NOT NULL,
  `role` enum('Operator','Admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `email`, `password`, `role`) VALUES
('admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Admin'),
('operator', 'operator@gmail.com', '4b583376b2767b923c3e1da60d10de59', 'Operator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `penjualan_tiket`
--
ALTER TABLE `penjualan_tiket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `penjualan_tiket`
--
ALTER TABLE `penjualan_tiket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
