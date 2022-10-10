-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2021 at 05:51 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_arsip`
--

-- --------------------------------------------------------

--
-- Table structure for table `arsip`
--

CREATE TABLE `arsip` (
  `id_arsip` int(11) NOT NULL,
  `nama_arsip` varchar(255) DEFAULT NULL,
  `no_arsip` varchar(255) NOT NULL,
  `tgl_surat` date NOT NULL,
  `isi_ringkasan` text NOT NULL,
  `pengelola` varchar(100) NOT NULL,
  `petugas` varchar(50) DEFAULT NULL,
  `kategori_arsip` varchar(225) NOT NULL,
  `no` int(1) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `arsip`
--

INSERT INTO `arsip` (`id_arsip`, `nama_arsip`, `no_arsip`, `tgl_surat`, `isi_ringkasan`, `pengelola`, `petugas`, `kategori_arsip`, `no`, `gambar`) VALUES
(29, 'arsip', '123', '2021-01-23', 'werwer', '3', '2', 'KD01', 0, 'walpaper_giyu.jpg'),
(30, 'arif', '333', '2021-02-14', 'coba', '5', '2', 'KD01', 0, 'walpaper_giyu1.jpg'),
(31, 'arsip sofyan', '99', '2021-03-23', 'arsip tanggal sekian', '27', '4', 'KD02', 0, 'walpaper_giyu2.jpg'),
(32, 'kaka', '1919', '2021-04-02', 'coba', '3', '2', 'KD02', 0, 'walpaper_giyu3.jpg'),
(33, 'dadikan', '222', '2021-05-09', 'aaaaa', '3', '2', 'KD02', 0, 'walpaper_giyu4.jpg'),
(36, 'pdf pdf', '89', '2021-06-02', 'pdf coba', '3', '2', 'KD03', 0, '3056-6210-1-SM.pdf'),
(37, 'ini coba jpg', '654', '2021-07-06', 'coba', '27', '4', 'KD01', 0, 'walpaper_giyu6.jpg'),
(38, 'ini coba pdf', '228', '2021-08-08', 'ee', '27', '4', 'KD03', 0, 'image_442.pdf'),
(39, 'png woy', '19191', '2021-09-26', 'aaaaa', '27', '4', 'KD05', 0, 'gambar.png'),
(40, 'png woy', '19191', '2021-10-26', 'aaaaa', '27', '4', 'KD05', 0, 'gambar.png'),
(41, 'asdsad', '3423', '2021-03-04', 'asdaasdasdasda', '3', '2', 'KD02', 0, 'giyuu.png'),
(42, 'jykkyyu', '6786', '2021-03-12', 'ghjghjtyjty', '3', '2', 'KD04', 0, 'giyuu_-_Copy_(2).png'),
(43, 'hgjghjghjghjghjghjgh', '565', '2021-03-13', 'fghfgjdfjd', '3', '2', 'KD01', 0, 'giyuu_-_Copy.png');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `kode_kategori` char(4) NOT NULL,
  `nama_kategori` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `kode_kategori`, `nama_kategori`) VALUES
(3, 'KD01', 'pengajuan anggaran dana'),
(6, 'KD02', 'Surat ADD'),
(7, 'KD03', 'Surat keputusan'),
(8, 'KD04', 'Surat Perijinan'),
(9, 'KD05', 'pengumuman'),
(11, 'KD06', 'surat lain-lain'),
(12, 'KD07', 'surat keluar');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id` int(11) NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `level` varchar(100) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `username`, `password`, `nama`, `jabatan`, `foto`, `level`, `id_petugas`, `status`) VALUES
(1, '196901211990011001', '21232f297a57a5a743894a0e4a801fc3', 'Mubarak Ahmad', 'camat', 'coba.png', 'camat', 0, 1),
(2, '198708052010011009', '202cb962ac59075b964b07152d234b70', 'Kusuma Mahardikaaa', 'Kasubag Umum & Kepegawaian', 'coba3.png', 'petugas', 0, 1),
(3, '197406032010011003', '202cb962ac59075b964b07152d234b70', 'Rudi Hartono', 'Staff Bagian Umum & Kepegawaian ', 'coba11.png', 'user', 2, 1),
(4, '11223344556677', '202cb962ac59075b964b07152d234b70', 'Tiwi Amalia', 'Kasubag Keuangan', NULL, 'petugas', 0, 1),
(5, '12345', '202cb962ac59075b964b07152d234b70', 'arif', 'Staff Umum', NULL, 'user', 2, 1),
(27, 'sofyan', '6f4922f45568161a8cdf4ad2299f6d23', 'sofyan', 'staff umum', NULL, 'petugas', 0, 1),
(28, 'aku', '202cb962ac59075b964b07152d234b70', 'aku', 'Kasubag Keuangan', NULL, 'petugas', 0, 1),
(29, '9999', '202cb962ac59075b964b07152d234b70', 'utha', 'staff umum', NULL, 'user', 27, 1),
(30, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'administrtor', 'admin', NULL, 'admin', 0, 1),
(31, '34422323232', '827ccb0eea8a706c4c34a16891f84e7b', 'asdas', 'cobainkuy', NULL, 'user', 30, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arsip`
--
ALTER TABLE `arsip`
  ADD PRIMARY KEY (`id_arsip`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arsip`
--
ALTER TABLE `arsip`
  MODIFY `id_arsip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
