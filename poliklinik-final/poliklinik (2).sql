-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2023 at 04:21 PM
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
-- Table structure for table `detail_periksa`
--

CREATE TABLE `detail_periksa` (
  `id` int(10) NOT NULL,
  `id_periksa` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_periksa`
--

INSERT INTO `detail_periksa` (`id`, `id_periksa`, `id_obat`) VALUES
(1, 11, 1),
(2, 12, 2),
(3, 12, 5),
(4, 13, 1),
(5, 13, 6),
(6, 13, 8),
(8, 14, 4);

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
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id` int(11) NOT NULL,
  `nama_obat` varbinary(50) NOT NULL,
  `kemasan` varchar(35) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id`, `nama_obat`, `kemasan`, `harga`) VALUES
(1, 0x41435420284172746573756e617465207461626c6574203530206d67202b20416d6f6469617175696e6520616e6879647269, '2 blister @ 12 tablet / kotak', 44000),
(2, 0x41435420284172746573756e617465207461626c6574203530206d67202b20416d6f6469617175696e6520616e6879647269, '3 blister @ 8 tablet / kotak', 44000),
(3, 0x416c62656e6461736f6c2073757370656e736920323030206d672f35206d6c, 'Ktk 10 btl @ 10 ml', 6000),
(4, 0x416c62656e64617a6f6c207461626c65742f207461626c6574206b756e79616820343030206d67, 'ktk 5 x 6 tablet', 16000),
(5, 0x416c6f707572696e6f6c207461626c657420313030206d67, 'ktk 10 x 10 tablet', 16000),
(6, 0x416c6f707572696e6f6c207461626c657420333030206d67, 'ktk 10 x 10 tablet', 33000),
(7, 0x416c7072617a6f6c616d207461626c657420302c3235206d67, 'ktk 10 x 10 tablet', 64000),
(8, 0x416c7072617a6f6c616d207461626c657420302c35206d67, 'ktk 10 x 10 tablet', 77000),
(9, 0x416c7072617a6f6c616d207461626c65742031206d67, 'ktk 10 x 10 tablet', 118000),
(11, 0x416d62726f786f6c207369727570203135206d672f6d6c, 'btl 60 ml', 5000);

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
(12, 2, 1, '2023-12-27 15:51:00', 'Panas, menggigil, batuk, pilek', ''),
(13, 3, 4, '2023-12-27 20:39:00', 'Gusi bengkak', ''),
(14, 1, 6, '2023-12-23 20:50:00', 'Sakit tenggorokan, pusing, batuk, panas', '');

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
(13, 'Haechan', '018e16f03e2a5f8f638e4ad2c476949f'),
(14, 'Jaehyun', '92f4615ba18c3ad94b2248da4945a112'),
(15, 'poli1', '14ae9ec6ec9484e88175b702ee1dbdfc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_periksa`
--
ALTER TABLE `detail_periksa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_periksa` (`id_periksa`,`id_obat`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_dokter` (`id_dokter`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_periksa`
--
ALTER TABLE `detail_periksa`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `periksa`
--
ALTER TABLE `periksa`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
