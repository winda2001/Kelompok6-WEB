-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2021 at 02:27 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tokobaju`
--

-- --------------------------------------------------------

--
-- Table structure for table `konten`
--

CREATE TABLE `konten` (
  `id_konten` int(25) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_telp` varchar(20) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_name`, `username`, `password`, `admin_telp`, `admin_email`, `admin_address`) VALUES
(1, 'Syifara', 'admin', '21232f297a57a5a743894a0e4a801fc3', '082313374864', 'syifaradhetra@gmail.com', 'jl.Taman Bunga Merak No.48 Malang');

-- --------------------------------------------------------

--
-- Table structure for table `tb_category`
--

CREATE TABLE `tb_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_category`
--

INSERT INTO `tb_category` (`category_id`, `category_name`) VALUES
(1, 'Kemeja'),
(2, 'Kaos'),
(5, 'Dres'),
(6, 'Celana'),
(7, 'Baju Tidur');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `produk_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `id_size` int(25) DEFAULT NULL,
  `produk_name` varchar(100) NOT NULL,
  `produk_price` int(11) NOT NULL,
  `produk_deskripsi` text NOT NULL,
  `produk_image` varchar(100) NOT NULL,
  `produk_status` tinyint(1) NOT NULL,
  `data_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`produk_id`, `category_id`, `id_size`, `produk_name`, `produk_price`, `produk_deskripsi`, `produk_image`, `produk_status`, `data_created`) VALUES
(8, 1, 1, 'kemeja lebaran', 55000, '<p>biru polos bersaku</p>\r\n', 'produk1619992938.png', 1, '2021-05-02 22:02:18'),
(9, 2, 0, 'kaos oblong ', 40000, '<p>hitam motif</p>\r\n', 'produk1619995668.jpg', 1, '2021-05-02 22:03:28'),
(10, 7, 0, 'Daster', 35000, '<p>Bahan adem</p>\r\n', 'produk1619996993.jpg', 1, '2021-05-02 23:09:53'),
(11, 6, 0, 'Celana Pendek', 45000, '<p>Celana saku warna Hitam</p>\r\n', 'produk1620017602.jpg', 1, '2021-05-02 23:11:05'),
(12, 5, 0, 'Dress motif bunga', 70000, '<p>Bahan tebal dan nyaman dipakai</p>\r\n', 'produk1621425146.jpg', 0, '2021-05-03 04:51:42');

-- --------------------------------------------------------

--
-- Table structure for table `ukuran_produk`
--

CREATE TABLE `ukuran_produk` (
  `id_size` int(25) NOT NULL,
  `size` varchar(25) NOT NULL,
  `panjang` int(100) NOT NULL,
  `lebar` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ukuran_produk`
--

INSERT INTO `ukuran_produk` (`id_size`, `size`, `panjang`, `lebar`) VALUES
(1, 's', 50, 22);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `konten`
--
ALTER TABLE `konten`
  ADD PRIMARY KEY (`id_konten`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`produk_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `id_size` (`id_size`);

--
-- Indexes for table `ukuran_produk`
--
ALTER TABLE `ukuran_produk`
  ADD PRIMARY KEY (`id_size`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `konten`
--
ALTER TABLE `konten`
  MODIFY `id_konten` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `produk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `ukuran_produk`
--
ALTER TABLE `ukuran_produk`
  MODIFY `id_size` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD CONSTRAINT `tb_produk_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `tb_category` (`category_id`);

--
-- Constraints for table `ukuran_produk`
--
ALTER TABLE `ukuran_produk`
  ADD CONSTRAINT `ukuran_produk_ibfk_1` FOREIGN KEY (`id_size`) REFERENCES `tb_produk` (`id_size`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
