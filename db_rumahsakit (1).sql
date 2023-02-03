-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2023 at 05:23 PM
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
-- Database: `db_rumahsakit`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `kd_dokter` varchar(16) NOT NULL,
  `nama_dokter` varchar(200) NOT NULL,
  `alamat_dokter` varchar(200) NOT NULL,
  `spesialisasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`kd_dokter`, `nama_dokter`, `alamat_dokter`, `spesialisasi`) VALUES
('D001', 'Dr. Adik', 'Jagasatru', 'Penyakit Dalam'),
('D002', 'Dr. Lukman', 'Cirtim  ', 'Dokter Umum'),
('D003', 'Dr. Adi', 'Sumber  ', 'Dokter Anak'),
('D004', 'Dr. Nana', ' Cikarang ', 'Dokter Umum'),
('D005', 'Dr. Masduki', ' Jember ', 'THT'),
('D006', 'Dr. Annisa', ' Sunyaragi ', 'Dokter Kandungan'),
('D007', 'Dr. Hadi Suproyadi', ' Mundu ', 'Radiologi'),
('D008', 'Dr. Grealdine ', ' Majasem ', 'Dokter Gigi'),
('D009', 'Dr. Faisal Rahman', ' Megu  ', 'Dokter Mata'),
('D010', 'Dr. Bobi Sunandar', ' Kuningan ', 'Dokter Bedah');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `kd_pasien` varchar(16) NOT NULL,
  `nama_pasien` varchar(150) NOT NULL,
  `alamat_pasien` varchar(200) NOT NULL,
  `jk` varchar(16) NOT NULL,
  `tgl_datang` date NOT NULL,
  `keluhan` varchar(200) NOT NULL,
  `kd_dokter` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`kd_pasien`, `nama_pasien`, `alamat_pasien`, `jk`, `tgl_datang`, `keluhan`, `kd_dokter`) VALUES
('P001', 'Lucky', '      Mundu', 'Laki-laki', '2023-02-02', 'Sakit Kepala      ', 'D002'),
('P002', 'Habi', '       Bandengan', 'Laki-laki', '2023-02-16', 'Dada Sesak  ', 'D001'),
('P003', 'Nining', '    Bandengan', 'Perempuan', '2023-02-14', ' Batuk   ', 'D003'),
('P004', 'Lucky', ' Mundu', 'Laki-laki', '2023-02-16', ' Sakit Telinga', 'D005');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `kd_pembayaran` varchar(16) NOT NULL,
  `kd_petugas` varchar(16) NOT NULL,
  `kd_pasien` varchar(16) NOT NULL,
  `jmlh_harga` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`kd_pembayaran`, `kd_petugas`, `kd_pasien`, `jmlh_harga`) VALUES
('I001', 'E003', 'P001', 170000),
('I002', 'E004', 'P003', 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `kd_petugas` varchar(16) NOT NULL,
  `nama_petugas` varchar(50) NOT NULL,
  `alamat_petugas` varchar(200) NOT NULL,
  `jam_jaga` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`kd_petugas`, `nama_petugas`, `alamat_petugas`, `jam_jaga`) VALUES
('E001', 'Abdul', 'Kanci', '18:00'),
('E002', 'Rey', 'Setu', '08:00'),
('E003', 'Hendra', ' Lemah Abang', '12:00'),
('E004', 'Jainal', ' Weru', '23:00'),
('E005', 'Maharani', ' Jamblang', '23:00');

-- --------------------------------------------------------

--
-- Table structure for table `rawat_inap`
--

CREATE TABLE `rawat_inap` (
  `kd_rawatinap` varchar(16) NOT NULL,
  `kd_ruang` varchar(16) NOT NULL,
  `kd_pasien` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rawat_inap`
--

INSERT INTO `rawat_inap` (`kd_rawatinap`, `kd_ruang`, `kd_pasien`) VALUES
('RI001', 'R003', 'P001'),
('RI002', 'R002', 'P002'),
('RI003', 'R002', 'P001');

-- --------------------------------------------------------

--
-- Table structure for table `ruang`
--

CREATE TABLE `ruang` (
  `kd_ruang` varchar(16) NOT NULL,
  `nama_ruang` varchar(20) NOT NULL,
  `nama_gedung` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ruang`
--

INSERT INTO `ruang` (`kd_ruang`, `nama_ruang`, `nama_gedung`) VALUES
('R001', 'Mawar', 'HJ Djuanda'),
('R002', 'Melati', 'KH Masduki'),
('R003', 'Anggrek', 'Zainal Mustofa'),
('R004', 'Kamboja', 'Machdor'),
('R005', 'Tulip', 'Zainal Mustofa');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `iduser` int(20) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(200) NOT NULL,
  `rolename` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`iduser`, `username`, `password`, `rolename`) VALUES
(1, 'admin', '8cb2237d0679ca88db6464eac60da96345513964', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`kd_dokter`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`kd_pasien`),
  ADD KEY `FK_pasien_dokter` (`kd_dokter`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`kd_pembayaran`),
  ADD KEY `FK_pembayaran_petugas` (`kd_petugas`),
  ADD KEY `FK_pembayaran_pasien` (`kd_pasien`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`kd_petugas`);

--
-- Indexes for table `rawat_inap`
--
ALTER TABLE `rawat_inap`
  ADD PRIMARY KEY (`kd_rawatinap`),
  ADD KEY `FK_rawat_inap_ruang` (`kd_ruang`),
  ADD KEY `FK_rawat_inap_pasien` (`kd_pasien`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`kd_ruang`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `iduser` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pasien`
--
ALTER TABLE `pasien`
  ADD CONSTRAINT `FK_pasien_dokter` FOREIGN KEY (`kd_dokter`) REFERENCES `dokter` (`kd_dokter`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `FK_pembayaran_pasien` FOREIGN KEY (`kd_pasien`) REFERENCES `pasien` (`kd_pasien`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_pembayaran_petugas` FOREIGN KEY (`kd_petugas`) REFERENCES `petugas` (`kd_petugas`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `rawat_inap`
--
ALTER TABLE `rawat_inap`
  ADD CONSTRAINT `FK_rawat_inap_pasien` FOREIGN KEY (`kd_pasien`) REFERENCES `pasien` (`kd_pasien`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_rawat_inap_ruang` FOREIGN KEY (`kd_ruang`) REFERENCES `ruang` (`kd_ruang`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
