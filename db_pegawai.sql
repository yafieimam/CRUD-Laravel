-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2019 at 01:24 PM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pegawai`
--

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(10) NOT NULL,
  `nama_pegawai` varchar(200) NOT NULL,
  `email_pegawai` varchar(200) NOT NULL,
  `alamat_pegawai` text NOT NULL,
  `no_telp_pegawai` varchar(15) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `email_pegawai`, `alamat_pegawai`, `no_telp_pegawai`, `created_at`, `updated_at`) VALUES
(9, 'Among Joko Marpaung M.Kom.', 'amongjoko@gmail.com', 'Ds. Supomo No. 588, Bau-Bau 70894, SumBar', '089722283738', NULL, NULL),
(8, 'Agnes Hana Winarsih M.Kom.', 'agneshana@gmail.com', 'Ki. Padang No. 190, Pontianak 81244, DIY', '081999733674', NULL, NULL),
(7, 'Kasim Budiman', 'kasimbudiman@gmail.com', 'Jln. Banal No. 219, Tangerang 22457, Papua', '081777728392', NULL, NULL),
(6, 'Satya Manullang', 'satyamanullang@gmail.com', 'Dk. Sugiyopranoto No. 954, Langsa 77615, BaBel', '081787783922', NULL, NULL),
(5, 'Nabila Uyainah', 'nabilauyainah@gmail.com', 'Ki. Badak No. 351, Padangsidempuan 25170, Aceh', '081776256632', NULL, NULL),
(4, 'Jamal Uwais', 'jamaluwais@gmail.com', 'Ki. Basket No. 63, Ambon 39363, KalUt', '08122453781', NULL, NULL),
(3, 'Aurora Ilsa Nasyiah', 'aurorailsa@gmail.com', 'Ki. Cikapayang No. 993, Malang 73331, NTT', '081637482654', NULL, NULL),
(2, 'Siti Palastri', 'sitipalastri@gmail.com', 'Dk. Daan No. 591, Payakumbuh 30914, SulTra', '081726392837', NULL, NULL),
(1, 'Raisa Suci Hartati', 'raisasuci@gmail.com', 'Kpg. Dago No. 489, Sorong 62954, KalTeng', '081817628456', NULL, NULL),
(10, 'Baktianto Kusumo S.E.', 'baktianto@gmail.com', 'Kpg. Casablanca No. 773, Balikpapan 84946, Jambi', '085736666381', NULL, NULL),
(12, 'Yafie Imam Achmad', 'imamachmad18@gmail.com', 'Bratang Satu G/35 Wonokromo RT 11 RW 06 Ngagelrejo, Wonokromo, Surabaya 60245', '081252578019', '2019-11-10 06:15:50', '2019-11-10 06:20:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
