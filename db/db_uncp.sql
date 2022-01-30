-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2022 at 05:29 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_uncp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$bxPsL7DNeGHv7aioGPaeUebtniS5QhzC5Sd73TCqwuBsZja2hal3.');

-- --------------------------------------------------------

--
-- Table structure for table `data_login`
--

CREATE TABLE `data_login` (
  `nim` int(10) NOT NULL,
  `password` varchar(6) NOT NULL,
  `last_login` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_alumni`
--

CREATE TABLE `tbl_alumni` (
  `nim` varchar(10) NOT NULL,
  `tgl_lulus` date NOT NULL,
  `foto` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mahasiswa`
--

CREATE TABLE `tbl_mahasiswa` (
  `nim` varchar(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama` varchar(255) NOT NULL,
  `nama_ayah` varchar(255) NOT NULL,
  `nama_ibu` varchar(255) NOT NULL,
  `pekerjaan_ayah` varchar(255) NOT NULL,
  `pekerjaan_ibu` varchar(255) DEFAULT NULL,
  `pekerjaan_mhs` varchar(255) DEFAULT NULL,
  `alamat_ayah` varchar(255) NOT NULL,
  `alamat_ibu` varchar(255) DEFAULT NULL,
  `prov_mhs` varchar(255) DEFAULT NULL,
  `kab_mhs` varchar(255) NOT NULL,
  `kec_mhs` varchar(255) NOT NULL,
  `kel_mhs` varchar(255) NOT NULL,
  `alamat_mhs` text NOT NULL,
  `kontak_ayah` varchar(100) DEFAULT NULL,
  `kontak_ibu` varchar(100) DEFAULT NULL,
  `kontak_mhs` varchar(100) DEFAULT NULL,
  `email` text NOT NULL,
  `pendidikan` varchar(255) NOT NULL,
  `prodi` varchar(255) NOT NULL,
  `tahun_masuk` date NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tema`
--

CREATE TABLE `tbl_tema` (
  `nim` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kontak_mhs` varchar(100) NOT NULL,
  `status_mhs` varchar(100) NOT NULL,
  `konsentrasi` varchar(200) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `dospem1` varchar(255) NOT NULL,
  `dospem2` varchar(255) NOT NULL,
  `ttd` varchar(255) NOT NULL,
  `masalah` text NOT NULL,
  `solusi` text NOT NULL,
  `software` text NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yudisium`
--

CREATE TABLE `tbl_yudisium` (
  `nim` varchar(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tgl_yudisium` date NOT NULL,
  `tgl_ujian_proposal` date NOT NULL,
  `judul_skripsi` text NOT NULL,
  `penguji_1` varchar(255) NOT NULL,
  `penguji_2` varchar(255) NOT NULL,
  `penguji_3` varchar(255) NOT NULL,
  `penguji_4` varchar(255) NOT NULL,
  `tgl_ujian_skripsi` date NOT NULL,
  `nilai` varchar(5) NOT NULL,
  `lama_studi` varchar(255) NOT NULL,
  `total_sks` int(5) NOT NULL,
  `ipk` varchar(10) NOT NULL,
  `predikat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_alumni`
--
ALTER TABLE `tbl_alumni`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `tbl_tema`
--
ALTER TABLE `tbl_tema`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `tbl_yudisium`
--
ALTER TABLE `tbl_yudisium`
  ADD PRIMARY KEY (`nim`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
