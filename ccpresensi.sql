-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2020 at 04:52 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ccpresensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `pass_adm` varchar(20) NOT NULL,
  `nama_adm` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `pass_adm`, `nama_adm`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `NIP` varchar(13) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jabatan` varchar(50) DEFAULT 'Karyawan',
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`NIP`, `nama`, `jabatan`, `alamat`) VALUES
('1810817110017', 'Noval Aprianda', 'Karyawan', 'Jl. A. Yani'),
('1810817120010', 'Adita Lia Damaiyanti', 'Karyawan', 'Jl. Veteran'),
('1810817120012', 'Siti Mahmudah', 'Karyawan', 'Jl. Gatot Subroto'),
('1810817210012', 'M. Basri', 'Karyawan', 'Jl. Gambut'),
('1810817220015', 'Faridah', 'Karyawan', 'Jl. Pramuka'),
('1810817310008', 'Muhammad Zildhan Reynaldi', 'Karyawan', 'Jl. Sutoyo S.');

-- --------------------------------------------------------

--
-- Table structure for table `presensi`
--

CREATE TABLE `presensi` (
  `id_absen` int(11) NOT NULL,
  `NIP` varchar(13) NOT NULL,
  `tanggal` date NOT NULL,
  `time_in` time NOT NULL,
  `keterangan` varchar(20) NOT NULL DEFAULT 'Tidak hadir'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `presensi`
--

INSERT INTO `presensi` (`id_absen`, `NIP`, `tanggal`, `time_in`, `keterangan`) VALUES
(1, '1810817220015', '2020-12-09', '01:01:43', 'Hadir'),
(2, '1810817110017', '2020-12-09', '22:25:28', 'Hadir'),
(3, '1810817310008', '2020-12-09', '00:00:00', 'Hadir'),
(4, '1810817210012', '2020-12-09', '22:45:00', 'Hadir'),
(5, '1810817120010', '2020-12-09', '16:08:45', 'Hadir'),
(6, '1810817310008', '2020-12-09', '23:12:00', 'Hadir'),
(7, '1810817120012', '2020-12-09', '23:12:22', 'Hadir'),
(8, '1810817210012', '2020-12-09', '23:16:10', 'Terlambat'),
(9, '1810817110017', '2020-12-09', '23:30:47', 'Terlambat'),
(10, '1810817220015', '2020-12-09', '23:37:53', 'Terlambat'),
(12, '1810817110017', '2020-12-09', '23:39:00', 'Terlambat'),
(13, '1810817210012', '2020-12-09', '23:44:45', 'Terlambat'),
(14, '1810817110017', '2020-12-09', '23:45:21', 'Terlambat');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`NIP`);

--
-- Indexes for table `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`id_absen`),
  ADD KEY `NIP_FK` (`NIP`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `presensi`
--
ALTER TABLE `presensi`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `presensi`
--
ALTER TABLE `presensi`
  ADD CONSTRAINT `NIP_FK` FOREIGN KEY (`NIP`) REFERENCES `karyawan` (`NIP`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
