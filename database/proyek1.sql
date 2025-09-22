-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2024 at 02:48 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projek1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(2) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(8) NOT NULL,
  `role` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'naura', 'naura@gmail.com', '1234', 'Admin Sekolah', '2024-11-22 20:11:04'),
(2, 'ananda', 'ananda@gmail.com', '1234', 'Admin Koperasi', '2024-11-28 22:45:50'),
(3, 'kevin', 'kevin@gmail.com', '1234', 'Admin Koperasi', '2024-11-28 22:46:22');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `no_barang` int(3) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `stok` int(5) NOT NULL,
  `harga` double NOT NULL,
  `id_admin` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`no_barang`, `gambar`, `nama_barang`, `stok`, `harga`, `id_admin`) VALUES
(7, '67488886ae6fb.jpg', 'Pensil', 12, 4000, 1),
(9, '6762658894751.jpg', 'Seragam Pramuka', 10, 125000, 1),
(10, '67653c8b366a7.jpeg', 'Seragam Putih Biru', 25, 100000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(2) NOT NULL,
  `nip` int(18) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(8) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `nip`, `nama`, `email`, `password`, `created_at`) VALUES
(8, 2308005, 'naura', 'naura@gmail.com', '$2y$10$U', '2024-11-29 22:12:06'),
(9, 2308006, 'nanda', 'ananda@gmail.com', '$2y$10$g', '2024-11-29 22:15:00'),
(10, 2308007, 'kevin', 'kevin@gmail.com', '$2y$10$W', '2024-11-29 22:15:22'),
(11, 123456, 'uswa', 'uswa@gmail.com', '$2y$10$U', '2024-12-01 15:11:18'),
(12, 12345, 'puspa', 'puspa@gmail.com', '$2y$10$S', '2024-12-03 13:43:20'),
(13, 2305020, 'Naur', 'naur@gmail.com', '1234', '2024-12-18 11:56:12');

-- --------------------------------------------------------

--
-- Table structure for table `murid`
--

CREATE TABLE `murid` (
  `id_murid` int(2) NOT NULL,
  `nisn` int(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(8) NOT NULL,
  `ttl` date NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `murid`
--

INSERT INTO `murid` (`id_murid`, `nisn`, `nama`, `email`, `password`, `ttl`, `created_at`) VALUES
(6, 123456, 'alesia', 'alesia@gmail.com', '$2y$10$q', '2024-12-02', '2024-12-02 09:04:21'),
(7, 123456, 'puspa', 'puspa@gmail.com', '$2y$10$h', '2024-12-03', '2024-12-03 13:53:42'),
(8, 2305020, 'Naura Azzahra Budiyono', 'naura@gmail.com', '1234', '2024-12-20', '2024-12-20 17:17:11');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `order_id` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `barang` varchar(255) NOT NULL,
  `total_bayar` float NOT NULL,
  `tanggal_pesan` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('Belum bayar','Sudah bayar','Gagal Bayar','Menunggu Pembayaran') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `order_id`, `nama`, `email`, `no_hp`, `barang`, `total_bayar`, `tanggal_pesan`, `status`) VALUES
(12, 'ORD_676695', 'Naur', 'naur@gmail.com', '2324252', 'Pensil (x1)', 4000, '2024-12-21 17:17:26', 'Sudah bayar'),
(13, 'ORD_676696', 'Naur', 'naur@gmail.com', '2324252', 'Seragam Pramuka (x1)', 125000, '2024-12-21 17:21:34', 'Sudah bayar'),
(14, 'ORD_67669d', 'Naura Azzahra Budiyono', 'naura@gmail.com', '089668056377', 'Pensil (x5)', 20000, '2024-12-21 17:50:52', 'Sudah bayar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`no_barang`),
  ADD KEY `id_adminkoperasi` (`id_admin`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `murid`
--
ALTER TABLE `murid`
  ADD PRIMARY KEY (`id_murid`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `no_barang` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `murid`
--
ALTER TABLE `murid`
  MODIFY `id_murid` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
