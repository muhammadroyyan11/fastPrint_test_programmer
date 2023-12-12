-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2023 at 07:37 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fastprint`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(62, 'L QUEENLY'),
(63, 'L MTH AKSESORIS (IM)'),
(64, 'L MTH TABUNG (LK)'),
(65, 'SP MTH SPAREPART (LK)'),
(66, 'CI MTH TINTA LAIN (IM)'),
(67, 'L MTH AKSESORIS (LK)'),
(68, 'S MTH STEMPEL (IM)');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(200) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga`, `kategori_id`, `status_id`) VALUES
(1, 'ALCOHOL GEL POLISH CLEANSER GP-CLN01', '12500', 62, 1),
(2, 'ALUMUNIUM FOIL ALL IN ONE BULAT 23mm IM', '1000', 63, 1),
(3, 'ALUMUNIUM FOIL ALL IN ONE BULAT 30mm IM', '1000', 63, 1),
(4, 'ALUMUNIUM FOIL ALL IN ONE SHEET 250mm IM', '12500', 63, 2),
(5, 'ALUMUNIUM FOIL HDPE/PE BULAT 23mm IM', '12500', 63, 1),
(6, 'ALUMUNIUM FOIL HDPE/PE BULAT 30mm IM', '1000', 63, 1),
(7, 'ALUMUNIUM FOIL HDPE/PE SHEET 250mm IM', '13000', 63, 2),
(8, 'ALUMUNIUM FOIL PET SHEET 250mm IM', '1000', 63, 2),
(9, 'ARM PENDEK MODEL U', '13000', 63, 1),
(10, 'ARM SUPPORT KECIL', '13000', 64, 2),
(11, 'ARM SUPPORT KOTAK PUTIH', '13000', 63, 2),
(12, 'ARM SUPPORT PENDEK POLOS', '13000', 64, 1),
(13, 'ARM SUPPORT S IM', '1000', 63, 2),
(14, 'ARM SUPPORT T (IMPORT)', '13000', 63, 1),
(15, 'ARM SUPPORT T - MODEL 1 ( LOKAL )', '10000', 64, 1),
(16, 'BLACK LASER TONER FP-T3 (100gr)', '13000', 63, 2),
(17, 'BODY PRINTER CANON IP2770', '500', 65, 1),
(18, 'BODY PRINTER T13X', '15000', 65, 1),
(19, 'BOTOL 1000ML BLUE KHUSUS UNTUK EPSON R1800/R800 - 4180 IM (T054920)', '10000', 66, 1),
(20, 'BOTOL 1000ML CYAN KHUSUS UNTUK EPSON R1800/R800/R1900/R2000 - 4120 IM (T054220)', '10000', 66, 2),
(21, 'BOTOL 1000ML GLOSS OPTIMIZER KHUSUS UNTUK EPSON R1800/R800/R1900/R2000/IX7000/MG6170 - 4100 IM (T054020)', '1500', 66, 1),
(22, 'BOTOL 1000ML L.LIGHT BLACK KHUSUS UNTUK EPSON 2400 - 0599 IM', '1500', 66, 2),
(23, 'BOTOL 1000ML LIGHT BLACK KHUSUS UNTUK EPSON 2400 - 0597 IM', '1500', 66, 2),
(24, 'BOTOL 1000ML MAGENTA KHUSUS UNTUK EPSON R1800/R800/R1900/R2000 - 4140 IM (T054320)', '1000', 66, 1),
(25, 'BOTOL 1000ML MATTE BLACK KHUSUS UNTUK EPSON R1800/R800/R1900/R2000 - 3503 IM (T054820)', '1500', 66, 2),
(26, 'BOTOL 1000ML ORANGE KHUSUS UNTUK EPSON R1900/R2000 IM - 4190 (T087920)', '1500', 66, 1),
(27, 'BOTOL 1000ML RED KHUSUS UNTUK EPSON R1800/R800/R1900/R2000 - 4170 IM (T054720)', '1000', 66, 2),
(28, 'BOTOL 1000ML YELLOW KHUSUS UNTUK EPSON R1800/R800/R1900/R2000 - 4160 IM (T054420)', '1500', 66, 2),
(29, 'BOTOL KOTAK 100ML LK', '1000', 67, 1),
(30, 'BOTOL 10ML IM', '1000', 68, 2);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `nama_status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id_status`, `nama_status`) VALUES
(1, 'bisa dijual'),
(2, 'tidak bisa dijual');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `role` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL,
  `foto` text NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_lengkap`, `username`, `email`, `no_telp`, `role`, `password`, `updated_at`, `foto`, `is_active`) VALUES
(1, 'Muhammad Royyan Zamzami', 'tesprogrammer121223C14', 'admin@admin.com', '085649888272', 1, '74ea65815a86c7b680b9a990c96229ba', '2023-12-12 13:37:09', 'd5f22535b639d55be7d099a7315e1f7f.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
