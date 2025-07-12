-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2025 at 08:26 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forsmile`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokumentasi`
--

CREATE TABLE `dokumentasi` (
  `id_dokumentasi` int(11) NOT NULL,
  `file` varchar(100) NOT NULL DEFAULT '',
  `ket` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokumentasi`
--

INSERT INTO `dokumentasi` (`id_dokumentasi`, `file`, `ket`) VALUES
(1, '1747709090.png', 'tes keterangan'),
(2, '1747709237.jpg', ''),
(3, '1747709257.jpg', ''),
(4, '1747709269.jpeg', ''),
(6, '1751595049.png', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repellat aspernatur officia numquam excepturi earum itaque modi. Quos sunt expedita, consequuntur voluptatibus in iste totam dolorum libero delectus, labore quis voluptate.');

-- --------------------------------------------------------

--
-- Table structure for table `donasi`
--

CREATE TABLE `donasi` (
  `id_donasi` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `is_valid` int(11) DEFAULT NULL,
  `id_pengalokasian_dana` int(11) DEFAULT NULL,
  `tanggal_donasi` date DEFAULT NULL,
  `pesan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donasi`
--

INSERT INTO `donasi` (`id_donasi`, `id_user`, `jumlah`, `is_valid`, `id_pengalokasian_dana`, `tanggal_donasi`, `pesan`) VALUES
(1, 6, 25000, 1, 1, '2025-05-21', 'Semoga Di Permudah Segala Urusan Kehidupan'),
(2, 6, 35000, 1, 1, '2025-05-21', 'Semoga Di Permudah Segala Urusan Kehidupan'),
(3, 6, 15000, 1, 1, '2025-05-21', 'Semoga Di Permudah Segala Urusan Kehidupan'),
(11, 13, 12500, 1, 3, '2025-06-19', 'Semoga Di Permudah Segala Urusan Kehidupan'),
(12, 13, 11000, 0, 3, '2025-07-01', 'Semoga Di Permudah Segala Urusan Kehidupan'),
(13, 13, 11000, 0, 3, '2025-07-01', 'Semoga Di Permudah Segala Urusan Kehidupan'),
(14, 13, 11000, 0, 3, '2025-07-01', 'Semoga Di Permudah Segala Urusan Kehidupan'),
(15, 13, 11000, 0, 3, '2025-07-01', 'Semoga Di Permudah Segala Urusan Kehidupan');

-- --------------------------------------------------------

--
-- Table structure for table `donatur`
--

CREATE TABLE `donatur` (
  `id_donatur` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donatur`
--

INSERT INTO `donatur` (`id_donatur`, `id_user`, `nama_lengkap`, `alamat`, `email`) VALUES
(1, 6, 'Andi Lesmana', 'Jl Jenderal Sudirman No. 23', 'andilesmana@gmail.com'),
(2, 9, 'Risa Damayanti', 'Jl Jenderal Sudirman No. 23', 'risadamayanti@gmail.com'),
(5, 13, 'Ateng', 'Jl Jenderal Sudirman No. 23, Marabahan, Barito Kuala, Banjarbaru, Kalimantan Selatan', 'eexxeezy@gmail.com'),
(7, 15, 'Adrian', 'Jakarta Selatan', 'adrian@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `pengalokasian_dana`
--

CREATE TABLE `pengalokasian_dana` (
  `id_pengalokasian_dana` int(11) NOT NULL,
  `tujuan` varchar(255) DEFAULT NULL,
  `ket` text DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `terkumpul` int(11) DEFAULT 0,
  `disalurkan` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengalokasian_dana`
--

INSERT INTO `pengalokasian_dana` (`id_pengalokasian_dana`, `tujuan`, `ket`, `gambar`, `jumlah`, `terkumpul`, `disalurkan`) VALUES
(1, 'Berbagi Makanan', 'Berbagi makanan kepada fakir miskin yang membutuhkan', '1747702129.png', 5000000, 75000, 0),
(2, 'Santunan Anak Yatim/Piatu', 'Keterangan Santunan Anak Yatim/Piatu', '1747705947.PNG', 10000000, 0, 1000),
(3, 'Bazaar Gratis', 'Keterangan Bazaar Gratis Bazaar Gratis Bazaar Gratis Bazaar Gratis', '1747706008.PNG', 2000000, 12500, 0),
(4, 'Tes Edit', 'Keterangan Tes', '1747707733.PNG', 3200000, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan`
--

CREATE TABLE `pengaturan` (
  `id_pengaturan` int(11) NOT NULL,
  `key` varchar(50) DEFAULT NULL,
  `value` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengaturan`
--

INSERT INTO `pengaturan` (`id_pengaturan`, `key`, `value`) VALUES
(1, 'beranda', '1750524658.png'),
(2, 'tentang', '1750524769.jpg'),
(3, 'ket-tentang', 'For a smile adalah sebuah program yang mengajak kalian untuk berbagi kepada sesama. disini kita bisa edit'),
(4, 'visi', '<p>Menjadikan dunia disekitar kita menjadi lebih indah.</p><p>We have to love each other for a better world</p>'),
(5, 'misi', '<p>Menyelenggarakan kegiatan sosial berbasis kebahagian seperti santuanan, pembagian makanan, bantuan kemanusiaan.</p><p>Menjadi wadah kolaborasi bagi individu dan komunitas yang ingin berbagi kepada sesama.</p>'),
(6, 'moto', 'Satu Senyuman, Sejuta Harapan.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `token` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `role`, `token`) VALUES
(1, 'admin', '123', 'admin', NULL),
(6, 'andi', '123', 'donatur', NULL),
(9, 'risa', '123', 'donatur', NULL),
(13, 'ateng', '123', 'donatur', NULL),
(15, 'adrian', '123', 'donatur', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokumentasi`
--
ALTER TABLE `dokumentasi`
  ADD PRIMARY KEY (`id_dokumentasi`);

--
-- Indexes for table `donasi`
--
ALTER TABLE `donasi`
  ADD PRIMARY KEY (`id_donasi`);

--
-- Indexes for table `donatur`
--
ALTER TABLE `donatur`
  ADD PRIMARY KEY (`id_donatur`);

--
-- Indexes for table `pengalokasian_dana`
--
ALTER TABLE `pengalokasian_dana`
  ADD PRIMARY KEY (`id_pengalokasian_dana`);

--
-- Indexes for table `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`id_pengaturan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dokumentasi`
--
ALTER TABLE `dokumentasi`
  MODIFY `id_dokumentasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `donasi`
--
ALTER TABLE `donasi`
  MODIFY `id_donasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `donatur`
--
ALTER TABLE `donatur`
  MODIFY `id_donatur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pengalokasian_dana`
--
ALTER TABLE `pengalokasian_dana`
  MODIFY `id_pengalokasian_dana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pengaturan`
--
ALTER TABLE `pengaturan`
  MODIFY `id_pengaturan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
