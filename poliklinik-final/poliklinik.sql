-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2023 at 04:20 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `poliklinik`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id` int(10) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `no_hp` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id`, `nama`, `alamat`, `no_hp`) VALUES
(1, 'dr. Agus Susilo', 'Kali Banteng', '081234564213'),
(2, 'dr. Hermoyo', 'Meteseh', '081234567127'),
(3, 'dr. Asti', 'Pudak Payung', '089812363174'),
(4, 'drg. Herlisa', 'Sampokong', '081234567891'),
(5, 'dr. Bambang', 'Pedurungan', '08174837958'),
(6, 'dr. Ayu Tingting', 'Depok', '08174623679');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id` int(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id`, `nama`, `alamat`, `no_hp`) VALUES
(1, 'Astuti', 'Sampangan', '081234567891'),
(2, 'Berto', 'Genuk', '0812358903'),
(3, 'Enji', 'Bekasi Utara', '08963471621');

-- --------------------------------------------------------

--
-- Table structure for table `periksa`
--

CREATE TABLE `periksa` (
  `id` int(10) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `tgl_periksa` datetime NOT NULL,
  `catatan` text NOT NULL,
  `obat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `periksa`
--

INSERT INTO `periksa` (`id`, `id_pasien`, `id_dokter`, `tgl_periksa`, `catatan`, `obat`) VALUES
(3, 1, 1, '2023-10-12 18:00:00', 'Demam, pusing, menggigil', 'Antangin'),
(4, 2, 2, '2023-10-17 18:00:00', 'Mual, panas, batuk', 'Vitamin D'),
(5, 1, 2, '2023-11-04 00:24:00', 'Sakit tenggorokan, pusing, batuk, panas', 'Paracetamol'),
(6, 3, 6, '2023-11-07 09:22:00', 'Mual, pusing, pilek', 'Ultraflu');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'Aya', 'c271cce9a6a040dd02957293421548cd'),
(2, 'Ayu', '2728476ab86a3dd2cf704ce4157ed79b'),
(3, 'Ayu', '2728476ab86a3dd2cf704ce4157ed79b'),
(4, 'Mark', 'd2f0e963198965722fd22e9ab414efbc'),
(5, 'Taeyong', 'bbaa59ba46f2c9bc54911905fecef52c'),
(6, 'Renjun', '$2y$10$q422B2gHdHuAw5N8x6/LGuQhkCqsK8CggVHnKZj5CpQ3z7xaSiq7u'),
(7, 'Chenle', 'fa0239642bd1c3eeef4b055624a81065'),
(8, 'Karina', 'd540f6ec39cc713902a749f22d5aae51'),
(9, 'Giselle', '7f4a066071fd3c153f52ea07a71005e9'),
(10, 'Ningning', '$2y$10$VXezMxM/XIUHwBzWRAPg9.zTyjYJLeL2KBA2j7her1ASYBJMKQCF6'),
(11, 'Winter', '27c8267388843545ec6d9a812aada0ef'),
(12, 'Jaemin', '50246fc44a1f399bd8b1598d835427f2'),
(13, 'Haechan', '018e16f03e2a5f8f638e4ad2c476949f');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `periksa`
--
ALTER TABLE `periksa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `periksa`
--
ALTER TABLE `periksa`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
