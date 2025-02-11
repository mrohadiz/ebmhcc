-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2025 at 08:02 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pemeriksaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_daftar`
--

CREATE TABLE `tb_daftar` (
  `id_daftar` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `usia` int(3) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan','','') NOT NULL,
  `tgl_pemeriksaan` date NOT NULL,
  `alamat` text NOT NULL,
  `asam_urat` int(11) NOT NULL,
  `gula_darah` int(11) NOT NULL,
  `kolesterol` int(11) NOT NULL,
  `status` enum('terdaftar','sudah periksa','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_daftar`
--

INSERT INTO `tb_daftar` (`id_daftar`, `nama`, `usia`, `jenis_kelamin`, `tgl_pemeriksaan`, `alamat`, `asam_urat`, `gula_darah`, `kolesterol`, `status`) VALUES
(1, 'Ganies', 29, 'Perempuan', '2025-01-23', 'Pare', 0, 0, 0, 'sudah periksa'),
(2, 'Fifilia', 30, 'Perempuan', '2025-01-24', 'Plemahan', 0, 0, 0, 'sudah periksa'),
(3, 'Tika', 20, 'Perempuan', '2025-02-05', 'Pare', 0, 0, 0, 'sudah periksa'),
(4, 'fifilia', 30, 'Laki-laki', '2025-02-06', 'kediri talun', 0, 0, 0, 'sudah periksa'),
(5, 'ferentina zam zam', 31, 'Perempuan', '2025-02-07', 'pare', 0, 0, 0, 'sudah periksa'),
(6, 'Sri', 59, 'Perempuan', '2025-02-10', 'tawang', 0, 0, 0, 'sudah periksa'),
(7, 'Ibu Cinta', 65, 'Perempuan', '2025-02-10', 'sumberbendo', 0, 0, 0, 'sudah periksa'),
(8, 'Lia', 32, 'Perempuan', '2025-02-10', 'Sumber Bendo', 0, 0, 0, 'sudah periksa'),
(9, 'ika', 30, 'Perempuan', '2025-02-10', 'tawang', 0, 0, 0, 'sudah periksa'),
(10, 'Yu Binti', 30, 'Perempuan', '2025-02-11', 'Badas', 0, 1, 1, 'terdaftar'),
(11, 'Linda', 32, 'Perempuan', '2025-02-11', 'Gurah', 1, 1, 0, 'terdaftar'),
(12, 'Ani', 32, 'Perempuan', '2025-02-11', 'Pagu', 1, 1, 0, 'terdaftar'),
(13, 'Nilna', 30, 'Perempuan', '2025-02-11', 'Pare', 1, 1, 0, 'terdaftar'),
(14, 'Fitri', 30, 'Perempuan', '2025-02-11', 'Pare', 1, 1, 0, 'terdaftar'),
(15, 'ata', 20, 'Laki-laki', '2025-02-11', 'Pare', 1, 1, 1, 'terdaftar'),
(16, 'ata', 20, 'Laki-laki', '2025-02-11', 'pare', 1, 1, 0, 'terdaftar'),
(17, 'Dina', 24, 'Perempuan', '2025-02-11', 'Pare', 1, 0, 0, 'terdaftar'),
(18, 'fifilia ferentina zam zam', 32, 'Perempuan', '2025-02-11', 'sekoto', 1, 1, 0, 'sudah periksa'),
(19, 'laura', 45, 'Perempuan', '2025-02-11', 'sekoto', 1, 1, 1, 'sudah periksa');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemeriksaan`
--

CREATE TABLE `tb_pemeriksaan` (
  `id_pemeriksaan` int(11) NOT NULL,
  `id_daftar` int(11) NOT NULL,
  `tekanan_darah` varchar(10) NOT NULL,
  `asam_urat` varchar(10) NOT NULL,
  `gula_darah` varchar(10) NOT NULL,
  `kolesterol` varchar(10) NOT NULL,
  `hemoglobin` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pemeriksaan`
--

INSERT INTO `tb_pemeriksaan` (`id_pemeriksaan`, `id_daftar`, `tekanan_darah`, `asam_urat`, `gula_darah`, `kolesterol`, `hemoglobin`) VALUES
(1, 1, '2', '4', '5', '6', '7'),
(2, 2, '120/8', '6,5', '135', '180', '12'),
(3, 3, '', '3', '3', '180', '12'),
(4, 4, '120', '7', '160', '79', '20'),
(5, 5, '120', '120', '120', '120', '120'),
(6, 6, '120/80', '7', '10', '0', '0'),
(7, 7, '120/100', '9', '130', '0', '0'),
(8, 8, '120/80', '7', '120', '0', '12'),
(9, 9, '120/80', '10', '120', '0', '0'),
(10, 18, '120/80', '5', '120', '4', '4'),
(11, 19, '120/20', '4', '70', '40', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_daftar`
--
ALTER TABLE `tb_daftar`
  ADD PRIMARY KEY (`id_daftar`);

--
-- Indexes for table `tb_pemeriksaan`
--
ALTER TABLE `tb_pemeriksaan`
  ADD PRIMARY KEY (`id_pemeriksaan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_daftar`
--
ALTER TABLE `tb_daftar`
  MODIFY `id_daftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_pemeriksaan`
--
ALTER TABLE `tb_pemeriksaan`
  MODIFY `id_pemeriksaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
