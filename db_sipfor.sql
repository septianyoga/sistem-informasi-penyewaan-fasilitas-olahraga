-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2023 at 02:37 PM
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
  `status` enum('Tervalidasi','Belum Tervalidasi','Non Aktif') NOT NULL,
  `thumnail` varchar(255) DEFAULT NULL,
  `viewer` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id_fasilitas`, `nama_fasilitas`, `keterangan`, `id_kategori`, `harga`, `hargaper`, `id_owner`, `status`, `thumnail`, `viewer`) VALUES
(1, 'Lapangan Futsal', 'Lapangan satu satunya di kabupaten subang tenggara yang tidak ada di kota kota lain. segera sewa sekarang', 1, '20000', 'Jam', 19, 'Tervalidasi', '1685174884_40f044d82937d0f14026.jpeg', 1),
(2, 'Lapangan Futsal', 'Satu satunya lapangan yang ada di bumi ini tidak ada lagi lapangan yang dapat di sewakan selain lapangan ini', 1, '150000', 'Jam', 20, 'Tervalidasi', '1685181797_852344c3b45164a12071.png', 2),
(3, 'Lapangan badminton', 'Lapangan badminton di kabupaten subang\r\nDapat di sewakan oleh siapa saja\r\nInclude  : \r\n- Toilet\r\n- Parkiran luas\r\n- Kamar mandi', 2, '300000', 'Hari', 20, 'Tervalidasi', '1685673596_9867451f6c3cee29cdca.jpg', 1),
(4, 'Lapangan Futsal', 'tes', 2, '100000', 'Hari', 23, 'Non Aktif', '1686273235_f59aba0f3aa109d6f203.png', 1),
(5, 'Lapangan Basket', 'Lapangan basket satu satunya di subang', 3, '200001', 'Jam', 19, 'Tervalidasi', '1686716360_ea466b1b48bc9bb0f857.png', 5);

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
(79, 4, '1686273235_f59aba0f3aa109d6f203.png'),
(80, 5, '1686716360_ea466b1b48bc9bb0f857.png'),
(81, 5, '1686716360_7612515ed24a444b2912.png'),
(82, 5, '1686716360_4e17077ffb2faf9932a5.png');

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
(2, 'Badminton'),
(3, 'Basket'),
(4, 'Voly'),
(5, 'GYM'),
(6, 'Tenis');

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
(19, 1, '0899737341212', 'jl cibogo kabupaten subang tenggara', '-6.569290, 107.769059', 'BANK BCA', '123123456', '09283498924', 'Verified'),
(20, 3, '0349394734', 'Jl subang kabupaten cibogo kecamatan jawa tambun selatan kabupaten bekasi, sebelah rumah hejo belakang pt alfamart lurus belok kiri.', '-6.550621, 107.764749', 'BANK MANDIRI', '321123456', '078342349', 'Verified'),
(22, 2, '0897873483832', 'Jl subang kabupaten cibogo kecamatan jawa tambun selatan kabupaten bekasi, sebelah bengkel', '-6.556261, 107.761521', 'BANK BRI', '1234567890', '0897873483832', 'Verified'),
(23, 14, '123457887', 'jl subang kabupaten subang provinsi subang', '-6.5757018,107.7668872', '', '', '', 'Verified');

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
  `foto` varchar(255) DEFAULT NULL,
  `status_aktif` enum('Aktif','Non Aktif') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penyewa`
--

INSERT INTO `penyewa` (`id_penyewa`, `nama_penyewa`, `username`, `password`, `email`, `role`, `foto`, `status_aktif`) VALUES
(1, 'Septian', 'septian', '123456', 'titikkoma219@gmail.com', 'Owner', NULL, 'Aktif'),
(2, 'Coba', 'coba', '123456', 'coba@gmail.com', 'Owner', NULL, 'Aktif'),
(3, 'Udin', 'udin', '123456', 'udin@gmail.com', 'Owner', NULL, 'Aktif'),
(4, 'Asep', 'asep', '123456', 'asep@gmail.com', 'Penyewa', NULL, 'Aktif'),
(5, 'ray', 'ray', '123456', 'septiannn123@gmail.com', 'Penyewa', NULL, 'Aktif'),
(7, 'intan', 'kartika', '123456', 'kd11281991@gmail.com', 'Penyewa', NULL, 'Aktif'),
(8, 'Andi', 'supri', '123456', 'supri@gmail.com', 'Penyewa', NULL, 'Aktif'),
(13, 'ma\'ruf', 'terserah', 'password', 'mugi.gia@gmail.com', 'Penyewa', NULL, 'Non Aktif'),
(14, 'apri', 'rian', '123456', 'septiannn123@gmail.com', 'Owner', NULL, 'Aktif'),
(15, 'contoh', 'contoh', '123456', 'septianyoga111@gmail.com', 'Penyewa', NULL, 'Non Aktif');

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
  `date_expired` timestamp NULL DEFAULT NULL,
  `alasan_tolak` varchar(255) DEFAULT NULL,
  `status_pesanan` enum('Belum Dibayar','Dibayar','Diapprov','Selesai','Ditolak') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_penyewa`, `id_fasilitas`, `tanggal`, `nominal`, `bukti_pembayaran`, `metode_pembayaran`, `date_expired`, `alasan_tolak`, `status_pesanan`) VALUES
(3, 1, 1, '2023-06-14 09:00:00', 20000, NULL, 'Non Tunai', '2023-06-13 21:18:04', NULL, 'Belum Dibayar'),
(4, 1, 3, '2023-06-15 00:00:00', 300000, '1686691337_dcafb40fc5fb9b149d89.png', 'Non Tunai', '2023-06-13 23:19:46', NULL, 'Diapprov'),
(5, 1, 2, '2023-06-14 10:00:00', 150000, '1686691579_4ebbb8de09d336740b08.png', 'Non Tunai', '2023-06-13 23:26:11', 'Bukti pembayaran tidak jelas dan tidak masuk ke rekening saya', 'Ditolak'),
(6, 1, 5, '2023-06-14 13:00:00', 200000, '1686718852_3bf4fc99e8ba4591a908.png', 'Non Tunai', '2023-06-14 07:00:40', NULL, 'Diapprov'),
(7, 1, 3, '2023-06-17 00:00:00', 300000, NULL, 'Non Tunai', '2023-06-14 09:00:30', NULL, 'Belum Dibayar'),
(8, 1, 3, '2023-06-14 00:00:00', 300000, '1686737972_636510b0e9c788e7fdcd.png', 'Non Tunai', '2023-06-14 12:19:25', NULL, 'Diapprov'),
(9, 1, 3, '2023-06-17 00:00:00', 300000, NULL, 'Non Tunai', '2023-06-14 11:04:54', NULL, 'Belum Dibayar'),
(13, 4, 3, '2023-06-16 00:00:00', 300000, '1686778110_2abf7a2259c4815e5786.png', 'Non Tunai', '2023-06-14 23:17:43', NULL, 'Dibayar'),
(15, 4, 2, '2023-06-15 16:00:00', 150000, '1686782225_c29142d97c54b3b576bd.png', 'Non Tunai', '2023-06-15 00:22:12', 'Screen shot apaan nih ga jelas, mau nipu ya', 'Ditolak'),
(16, 4, 3, '2023-06-18 00:00:00', 300000, NULL, 'Non Tunai', '2023-06-14 23:09:11', NULL, 'Belum Dibayar'),
(18, 1, 3, '2023-06-16 00:00:00', 300000, NULL, 'Tunai', '2023-06-15 06:47:54', NULL, 'Belum Dibayar');

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
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `id_owner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `penyewa`
--
ALTER TABLE `penyewa`
  MODIFY `id_penyewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
