-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2023 at 05:40 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sipfor`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(30) NOT NULL,
  `role` varchar(11) NOT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`, `email`, `role`, `foto`) VALUES
(1, 'Admin Sipfor', 'admin', 'admin123', 'admin@gmail.com', 'Admin', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id_fasilitas` int(11) NOT NULL,
  `nama_fasilitas` varchar(100) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `harga` varchar(11) NOT NULL,
  `hargaper` varchar(11) NOT NULL,
  `id_owner` int(11) NOT NULL,
  `status` varchar(30) NOT NULL,
  `thumnail` varchar(255) DEFAULT NULL,
  `viewer` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id_fasilitas`, `nama_fasilitas`, `keterangan`, `id_kategori`, `harga`, `hargaper`, `id_owner`, `status`, `thumnail`, `viewer`) VALUES
(1, 'Lapangan Futsal', 'Lapangan satu satunya di kabupaten subang tenggara yang tidak ada di kota kota lain. segera sewa sekarang', 1, '20000', 'Jam', 19, 'Tervalidasi', '1685174884_40f044d82937d0f14026.jpeg', 0),
(2, 'Lapangan Futsal', 'Satu satunya lapangan yang ada di bumi ini tidak ada lagi lapangan yang dapat di sewakan selain lapangan ini', 1, '150000', 'Jam', 20, 'Tervalidasi', '1685181797_852344c3b45164a12071.png', 0),
(3, 'Lapangan badminton', 'Lapangan badminton di kabupaten subang\r\nDapat di sewakan oleh siapa saja\r\nInclude  : \r\n- Toilet\r\n- Parkiran luas\r\n- Kamar mandi', 2, '300000', 'Hari', 20, 'Tervalidasi', '1685673596_9867451f6c3cee29cdca.jpg', 0),
(4, 'Lapangan Futsal', 'tes', 2, '100000', 'Hari', 23, 'Belum Tervalidasi', '1686273235_f59aba0f3aa109d6f203.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE `foto` (
  `id_foto` int(11) NOT NULL,
  `id_fasilitas` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foto`
--

INSERT INTO `foto` (`id_foto`, `id_fasilitas`, `foto`) VALUES
(68, 1, '1685174884_40f044d82937d0f14026.jpeg'),
(69, 1, '1685174884_135eefd3eed568a6df9e.jpg'),
(70, 1, '1685174884_4bff7928f411be9c5c96.jpeg'),
(71, 2, '1685181797_852344c3b45164a12071.png'),
(72, 2, '1685181797_252171c512d6708281d3.png'),
(73, 2, '1685181797_596435b0a4370619e284.png'),
(77, 3, '1685673596_9867451f6c3cee29cdca.jpg'),
(78, 3, '1685673596_feba1b9c555bed200e8d.jpg'),
(79, 4, '1686273235_f59aba0f3aa109d6f203.png');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Futsal'),
(2, 'Badminton');

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `id_owner` int(11) NOT NULL,
  `id_penyewa` int(11) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `jenis_rek` varchar(30) DEFAULT NULL,
  `no_rek` varchar(30) DEFAULT NULL,
  `no_dana_shopee` varchar(30) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`id_owner`, `id_penyewa`, `no_telp`, `alamat`, `lokasi`, `jenis_rek`, `no_rek`, `no_dana_shopee`, `status`) VALUES
(19, 1, '0899737341212', 'jl cibogo kabupaten subang tenggara', '0293849384', 'BANK BCA', '123123456', '09283498924', 'Verified'),
(20, 3, '0349394734', 'Jl subang kabupaten cibogo kecamatan jawa tambun selatan kabupaten bekasi, sebelah rumah hejo belakang pt alfamart lurus belok kiri.', '03943749347', 'BANK MANDIRI', '321123456', '078342349', 'Verified'),
(22, 2, '0897873483832', 'Jl subang kabupaten cibogo kecamatan jawa tambun selatan kabupaten bekasi, sebelah bengkel', '-939493493849', 'BANK BRI', '1234567890', '0897873483832', NULL),
(23, 14, '123457887', 'jl subang kabupaten subang provinsi subang', '123', '', '', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `penyewa`
--

CREATE TABLE `penyewa` (
  `id_penyewa` int(11) NOT NULL,
  `nama_penyewa` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(30) NOT NULL,
  `role` varchar(30) NOT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penyewa`
--

INSERT INTO `penyewa` (`id_penyewa`, `nama_penyewa`, `username`, `password`, `email`, `role`, `foto`) VALUES
(1, 'Septian', 'septian', '123456', 'titikkoma219@gmail.com', 'Owner', NULL),
(2, 'Coba', 'coba', '123456', 'coba@gmail.com', 'Owner', NULL),
(3, 'Udin', 'udin', '123456', 'udin@gmail.com', 'Owner', NULL),
(4, 'Asep', 'asep', '123456', 'asep@gmail.com', 'Penyewa', NULL),
(5, 'ray', 'ray', '123456', 'septiannn123@gmail.com', 'Penyewa', NULL),
(7, 'intan', 'kartika', '123456', 'kd11281991@gmail.com', 'Penyewa', NULL),
(8, 'Andi', 'supri', '123456', 'supri@gmail.com', 'Penyewa', NULL),
(13, 'ma\'ruf', 'terserah', 'password', 'mugi.gia@gmail.com', 'Penyewa', NULL),
(14, 'apri', 'rian', '123456', 'septiannn123@gmail.com', 'Owner', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_penyewa` int(11) NOT NULL,
  `id_fasilitas` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `nominal` int(11) NOT NULL,
  `bukti_pembayaran` varchar(255) DEFAULT NULL,
  `metode_pembayaran` varchar(255) DEFAULT NULL,
  `alasan_tolak` varchar(255) DEFAULT NULL,
  `status_pesanan` enum('Belum Dibayar','Dibayar','Diapprov','Selesai','Ditolak') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_penyewa`, `id_fasilitas`, `tanggal`, `nominal`, `bukti_pembayaran`, `metode_pembayaran`, `alasan_tolak`, `status_pesanan`) VALUES
(5, 5, 1, '2023-05-31 08:00:00', 150000, NULL, NULL, NULL, 'Belum Dibayar'),
(7, 3, 2, '2023-05-31 15:00:00', 200000, NULL, NULL, NULL, 'Belum Dibayar'),
(8, 1, 1, '2023-05-31 18:00:00', 20000, NULL, NULL, NULL, 'Belum Dibayar'),
(9, 1, 1, '2023-06-03 17:00:00', 20000, NULL, NULL, NULL, 'Belum Dibayar'),
(10, 1, 1, '2023-06-03 22:00:00', 20000, NULL, NULL, NULL, 'Belum Dibayar'),
(11, 13, 1, '2023-06-01 10:00:00', 20000, NULL, NULL, NULL, 'Belum Dibayar'),
(12, 13, 1, '2023-06-01 11:00:00', 20000, NULL, NULL, NULL, 'Belum Dibayar'),
(18, 1, 3, '2023-06-07 20:15:20', 300000, '1686241574_05d2b106f2ec81fc1dff.png', 'Non Tunai', NULL, 'Diapprov'),
(19, 1, 3, '2023-06-08 22:19:56', 300000, '1686066916_48094767d427395ffa2c.png', 'Non Tunai', NULL, 'Diapprov'),
(20, 1, 3, '2023-06-10 00:00:00', 300000, '1686218220_580ca988bc50406119ae.png', 'Non Tunai', NULL, 'Dibayar'),
(21, 1, 3, '2023-06-09 00:00:00', 300000, '1686241118_d93fdaa4d5e4d0e6ec7f.png', 'Non Tunai', NULL, 'Dibayar'),
(22, 1, 3, '2023-06-12 00:00:00', 300000, '1686241244_f4341f566baaba932d84.png', 'Non Tunai', NULL, 'Dibayar'),
(24, 1, 2, '2023-06-09 12:00:00', 150000, NULL, 'Non Tunai', NULL, 'Belum Dibayar'),
(25, 1, 3, '2023-06-11 00:00:00', 300000, '1686272528_ead31f9e65220dadbb90.png', 'Non Tunai', NULL, 'Dibayar'),
(26, 1, 3, '2023-06-13 00:00:00', 300000, NULL, 'Non Tunai', NULL, 'Belum Dibayar'),
(27, 1, 3, '2023-06-09 00:00:00', 300000, NULL, 'Non Tunai', NULL, 'Belum Dibayar'),
(28, 1, 3, '2023-07-01 00:00:00', 300000, '1686384814_b0ba3aa63751c68ce5ca.png', 'Non Tunai', NULL, 'Diapprov'),
(30, 1, 2, '2023-06-10 16:00:00', 150000, NULL, 'Non Tunai', NULL, 'Belum Dibayar'),
(31, 1, 2, '2023-06-10 17:00:00', 150000, '1686386664_53c32a2456fa7cd3a293.png', 'Non Tunai', 'Screenshot palsu tidak masuk rekening', 'Ditolak');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`),
  ADD KEY `id_owner` (`id_owner`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id_foto`),
  ADD KEY `id_fasilitas` (`id_fasilitas`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`id_owner`),
  ADD KEY `id_penyewa` (`id_penyewa`);

--
-- Indexes for table `penyewa`
--
ALTER TABLE `penyewa`
  ADD PRIMARY KEY (`id_penyewa`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_penyewa` (`id_penyewa`,`id_fasilitas`),
  ADD KEY `id_fasilitas` (`id_fasilitas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `id_owner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `penyewa`
--
ALTER TABLE `penyewa`
  MODIFY `id_penyewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD CONSTRAINT `fasilitas_ibfk_1` FOREIGN KEY (`id_owner`) REFERENCES `owner` (`id_owner`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fasilitas_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `foto_ibfk_1` FOREIGN KEY (`id_fasilitas`) REFERENCES `fasilitas` (`id_fasilitas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `owner`
--
ALTER TABLE `owner`
  ADD CONSTRAINT `owner_ibfk_1` FOREIGN KEY (`id_penyewa`) REFERENCES `penyewa` (`id_penyewa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`id_penyewa`) REFERENCES `penyewa` (`id_penyewa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pesanan_ibfk_2` FOREIGN KEY (`id_fasilitas`) REFERENCES `fasilitas` (`id_fasilitas`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;