-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2025 at 03:46 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sport_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(5) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `hp_pelanggan` varchar(15) NOT NULL,
  `gender_pelanggan` varchar(15) NOT NULL,
  `alamat_pelanggan` varchar(250) NOT NULL,
  `foto_pelanggan` varchar(25) NOT NULL,
  `last_update_pelanggan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `hp_pelanggan`, `gender_pelanggan`, `alamat_pelanggan`, `foto_pelanggan`, `last_update_pelanggan`) VALUES
('CS001', 'Ahmad Maulana', '081510002525', 'Laki-laki', 'Jakarta Utara', '', '2025-01-11 08:23:26'),
('CS002', 'Aulia Paramitha', '088850402000', 'Perempuan', 'Jakarta Utara', '', '2025-01-11 08:23:26'),
('CS003', 'Azizah Munawaroh', '085215152030', 'Perempuan', 'Jakarta Pusat', '', '2025-01-11 08:23:26'),
('CS004', 'Fazha Kamila', '085720003030', 'Perempuan', 'Jakarta Timur', '', '2025-01-11 08:23:26'),
('CS005', 'Muhammad Aufan', '085730305666', 'Laki-laki', 'Bekasi', '', '2025-01-30 12:52:06');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` varchar(5) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `merk_produk` varchar(50) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `stok_produk` int(11) NOT NULL,
  `gambar_produk` varchar(50) NOT NULL,
  `last_update_produk` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `merk_produk`, `harga_produk`, `stok_produk`, `gambar_produk`, `last_update_produk`) VALUES
('PR001', 'Yonex Power Cushion 50 Badminton Shoes', 'Yonex', 1150000, 6, 'img_PR001.webp', '2025-01-30 12:31:39'),
('PR002', 'Victor P9200II Unisex Badminton Shoes', 'Victor', 1700000, 8, 'img_PR002.webp', '2024-12-14 04:29:29'),
('PR003', 'Yonex Power Cushion 65 X3 Unisex Badminton Shoes', 'Yonex', 1400000, 12, 'img_PR003.webp', '2024-12-14 04:34:30'),
('PR004', 'Li-Ning Wind Lite 900 Badminton Racket', 'Li-Ning', 1250000, 4, 'img_PR004.webp', '2024-12-14 04:34:30'),
('PR005', 'Yonex Astrox 01 Clear Badminton Racket', 'Yonex', 1000000, 8, 'img_PR005.webp', '2025-01-30 12:32:02'),
('PR006', 'abc', 'b', 1000000, 6, '', '2025-01-30 13:05:20');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `id_tdetail` int(11) NOT NULL,
  `id_theader` varchar(5) NOT NULL,
  `id_produk` varchar(5) NOT NULL,
  `quantity` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `tax` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`id_tdetail`, `id_theader`, `id_produk`, `quantity`, `discount`, `tax`) VALUES
(1, 'TR001', 'PR001', 2, 0, 1000),
(2, 'TR001', 'PR002', 1, 2000, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_header`
--

CREATE TABLE `transaksi_header` (
  `id_theader` varchar(5) NOT NULL,
  `id_pelanggan` varchar(5) NOT NULL,
  `trans_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi_header`
--

INSERT INTO `transaksi_header` (`id_theader`, `id_pelanggan`, `trans_date`) VALUES
('TR001', 'CS001', '2025-02-06 06:35:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`id_tdetail`);

--
-- Indexes for table `transaksi_header`
--
ALTER TABLE `transaksi_header`
  ADD PRIMARY KEY (`id_theader`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  MODIFY `id_tdetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
