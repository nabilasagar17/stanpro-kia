-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 08, 2023 at 12:13 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stanpro-kia`
--

-- --------------------------------------------------------

--
-- Table structure for table `sp_absensi_siswa`
--

DROP TABLE IF EXISTS `sp_absensi_siswa`;
CREATE TABLE IF NOT EXISTS `sp_absensi_siswa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_siswa` int(11) DEFAULT NULL,
  `id_jadwal` int(11) DEFAULT NULL,
  `keterangan` tinyint(4) DEFAULT NULL,
  `pembahasan_kelas` varchar(150) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sp_admin`
--

DROP TABLE IF EXISTS `sp_admin`;
CREATE TABLE IF NOT EXISTS `sp_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(120) DEFAULT NULL,
  `nama` varchar(150) DEFAULT NULL,
  `alamat` text,
  `created_at` date DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `telp` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sp_admin`
--

INSERT INTO `sp_admin` (`id`, `email`, `nama`, `alamat`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`, `telp`) VALUES
(1, 'nabila@gmail.com', 'Nabila Sari', NULL, '2023-01-29', 'admin@gmail.com', '2023-02-05', 'admin@gmail.com', 1, '0812456654');

-- --------------------------------------------------------

--
-- Table structure for table `sp_agenda`
--

DROP TABLE IF EXISTS `sp_agenda`;
CREATE TABLE IF NOT EXISTS `sp_agenda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_agenda` varchar(200) DEFAULT NULL,
  `jadwal_mulai` date DEFAULT NULL,
  `jadwal_selesai` date DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sp_agenda`
--

INSERT INTO `sp_agenda` (`id`, `nama_agenda`, `jadwal_mulai`, `jadwal_selesai`, `created_at`, `created_by`, `status`) VALUES
(1, 'Ujian 5', '2004-07-01', '2023-01-04', '2023-01-17 07:35:39', 'admin@gmail.com', 1),
(2, 'Ujian', '2023-01-04', '2023-01-04', '2023-01-17 07:35:54', 'admin@gmail.com', 1),
(3, 'Ujian', '2023-01-04', '2023-01-13', '2023-01-17 07:36:33', 'admin@gmail.com', 1),
(4, 'Ujian', '2023-01-02', '2023-01-13', '2023-01-17 07:36:49', 'admin@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sp_detail_mapel`
--

DROP TABLE IF EXISTS `sp_detail_mapel`;
CREATE TABLE IF NOT EXISTS `sp_detail_mapel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_mapel` int(11) DEFAULT NULL,
  `id_tentor` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sp_detail_mapel`
--

INSERT INTO `sp_detail_mapel` (`id`, `id_mapel`, `id_tentor`, `created_at`, `created_by`, `status`) VALUES
(14, 11, 4, '2023-02-08 18:30:42', 'admin@gmail.com', 1),
(13, 10, 4, '2023-02-08 06:20:41', 'admin@gmail.com', 1),
(12, 10, 6, '2023-02-08 06:20:34', 'admin@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sp_detail_program`
--

DROP TABLE IF EXISTS `sp_detail_program`;
CREATE TABLE IF NOT EXISTS `sp_detail_program` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_program` varchar(20) DEFAULT NULL,
  `nama_fasilitas` varchar(200) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `keterangan` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sp_jadwal`
--

DROP TABLE IF EXISTS `sp_jadwal`;
CREATE TABLE IF NOT EXISTS `sp_jadwal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_ruang` char(4) DEFAULT NULL,
  `id_detail_mapel` int(11) DEFAULT NULL,
  `id_tentor` int(11) DEFAULT NULL,
  `kuota_kelas` int(11) DEFAULT NULL,
  `kuota_tersedia` int(11) DEFAULT NULL,
  `kuota_terisi` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `jadwal_mulai` datetime DEFAULT NULL,
  `jadwal_selesai` datetime DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sp_jadwal`
--

INSERT INTO `sp_jadwal` (`id`, `kode_ruang`, `id_detail_mapel`, `id_tentor`, `kuota_kelas`, `kuota_tersedia`, `kuota_terisi`, `created_at`, `created_by`, `updated_at`, `updated_by`, `jadwal_mulai`, `jadwal_selesai`, `id_kelas`) VALUES
(7, '5', 13, NULL, 16, NULL, NULL, '2023-02-08 06:21:07', 'admin@gmail.com', NULL, NULL, '2022-11-28 13:20:00', '2022-11-28 13:21:00', 2),
(8, '5', 13, NULL, 1, NULL, NULL, '2023-02-08 06:34:47', 'admin@gmail.com', NULL, NULL, '2023-01-01 13:34:00', '2023-01-01 13:34:00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `sp_jadwal_siswa`
--

DROP TABLE IF EXISTS `sp_jadwal_siswa`;
CREATE TABLE IF NOT EXISTS `sp_jadwal_siswa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_jadwal` int(11) DEFAULT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `selesai` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sp_jadwal_siswa`
--

INSERT INTO `sp_jadwal_siswa` (`id`, `id_jadwal`, `id_siswa`, `created_at`, `created_by`, `updated_at`, `updated_by`, `selesai`) VALUES
(7, 7, 1, '2023-02-08 06:22:41', 'dimas@gmail.com', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sp_jadwal_ujian_skd`
--

DROP TABLE IF EXISTS `sp_jadwal_ujian_skd`;
CREATE TABLE IF NOT EXISTS `sp_jadwal_ujian_skd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_ujian` date DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sp_jadwal_ujian_skd`
--

INSERT INTO `sp_jadwal_ujian_skd` (`id`, `tgl_ujian`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(2, '2023-02-07', '2023-02-06', 'audrey@gmail.com', '2023-02-06', 'audrey@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `sp_jadwal_ujian_utbk`
--

DROP TABLE IF EXISTS `sp_jadwal_ujian_utbk`;
CREATE TABLE IF NOT EXISTS `sp_jadwal_ujian_utbk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_ujian` date DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sp_jadwal_ujian_utbk`
--

INSERT INTO `sp_jadwal_ujian_utbk` (`id`, `tgl_ujian`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(2, '2023-02-07', '2023-02-06', 'audrey@gmail.com', '2023-02-06', 'audrey@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `sp_kelas`
--

DROP TABLE IF EXISTS `sp_kelas`;
CREATE TABLE IF NOT EXISTS `sp_kelas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kelas` varchar(100) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sp_kelas`
--

INSERT INTO `sp_kelas` (`id`, `nama_kelas`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(2, 'Reguler (2H)14', '2023-02-05', 'admin@gmail.com', '2023-02-05', 'admin@gmail.com'),
(3, 'Reguler (2H)146', '2023-02-05', 'admin@gmail.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sp_mata_pelajaran`
--

DROP TABLE IF EXISTS `sp_mata_pelajaran`;
CREATE TABLE IF NOT EXISTS `sp_mata_pelajaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_mapel` varchar(150) DEFAULT NULL,
  `lama_belajar` decimal(10,0) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sp_mata_pelajaran`
--

INSERT INTO `sp_mata_pelajaran` (`id`, `nama_mapel`, `lama_belajar`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(10, 'B.Inggris', NULL, '2023-02-08 04:05:21', 'admin@gmail.com', NULL, NULL, 1),
(11, 'Matematika', NULL, '2023-02-08 18:30:31', 'admin@gmail.com', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sp_materi_mapel`
--

DROP TABLE IF EXISTS `sp_materi_mapel`;
CREATE TABLE IF NOT EXISTS `sp_materi_mapel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_mapel` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `file_path` varchar(200) DEFAULT NULL,
  `nama_materi` varchar(200) DEFAULT NULL,
  `keterangan` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sp_nilai_skd`
--

DROP TABLE IF EXISTS `sp_nilai_skd`;
CREATE TABLE IF NOT EXISTS `sp_nilai_skd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_siswa` int(11) DEFAULT NULL,
  `twk` decimal(10,0) DEFAULT NULL,
  `ket_twk` tinyint(1) DEFAULT NULL,
  `tiu` decimal(10,0) DEFAULT NULL,
  `ket_tiu` tinyint(1) DEFAULT NULL,
  `tkp` decimal(10,0) DEFAULT NULL,
  `ket_tkp` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `id_jadwal_skd` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sp_nilai_skd`
--

INSERT INTO `sp_nilai_skd` (`id`, `id_siswa`, `twk`, `ket_twk`, `tiu`, `ket_tiu`, `tkp`, `ket_tkp`, `created_at`, `created_by`, `updated_at`, `updated_by`, `id_jadwal_skd`) VALUES
(6, 1, '50', 0, '60', 0, '50', 0, '2023-02-08 01:14:57', 'audrey@gmail.com', NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sp_nilai_utbk`
--

DROP TABLE IF EXISTS `sp_nilai_utbk`;
CREATE TABLE IF NOT EXISTS `sp_nilai_utbk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_siswa` int(11) DEFAULT NULL,
  `benar_tps` int(11) DEFAULT NULL,
  `persen_tps` decimal(10,6) DEFAULT NULL,
  `ket_tps` tinyint(1) DEFAULT NULL,
  `benar_tbi` int(11) DEFAULT NULL,
  `persen_tbi` decimal(10,6) DEFAULT NULL,
  `ket_tbi` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `avg` decimal(10,6) DEFAULT NULL,
  `id_jadwal_utbk` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sp_nilai_utbk`
--

INSERT INTO `sp_nilai_utbk` (`id`, `id_siswa`, `benar_tps`, `persen_tps`, `ket_tps`, `benar_tbi`, `persen_tbi`, `ket_tbi`, `created_at`, `created_by`, `updated_at`, `updated_by`, `avg`, `id_jadwal_utbk`) VALUES
(7, 1, 50, '83.333333', 1, 60, '300.000000', 1, '2023-02-08 01:13:13', 'audrey@gmail.com', NULL, NULL, '191.666667', 1),
(6, 2, 40, '66.666667', 1, 50, '250.000000', 1, '2023-02-06 09:22:25', 'audrey@gmail.com', '2023-02-08 01:17:16', 'audrey@gmail.com', '158.333333', 2);

-- --------------------------------------------------------

--
-- Table structure for table `sp_preview_jadwal`
--

DROP TABLE IF EXISTS `sp_preview_jadwal`;
CREATE TABLE IF NOT EXISTS `sp_preview_jadwal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_jadwal_mapel` int(11) DEFAULT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sp_preview_jadwal`
--

INSERT INTO `sp_preview_jadwal` (`id`, `id_jadwal_mapel`, `id_siswa`, `created_at`, `created_by`) VALUES
(1, 1, 1, '2023-01-23', 'dimas@gmail.com'),
(2, 1, 1, '2023-01-23', 'dimas@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `sp_program`
--

DROP TABLE IF EXISTS `sp_program`;
CREATE TABLE IF NOT EXISTS `sp_program` (
  `kode` int(11) NOT NULL AUTO_INCREMENT,
  `nama_program` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `keterangan` varchar(150) DEFAULT NULL,
  `harga` decimal(10,0) DEFAULT NULL,
  `kuota_jadwal` int(11) DEFAULT NULL,
  PRIMARY KEY (`kode`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sp_program`
--

INSERT INTO `sp_program` (`kode`, `nama_program`, `created_at`, `created_by`, `status`, `keterangan`, `harga`, `kuota_jadwal`) VALUES
(1, 'Kelas Ekonomi', '2022-12-31 12:05:43', 'System', 1, 'Program Bimbel Kelas 12 SMA', '6000000', 60),
(3, 'Kelas Executive', '2022-12-31 12:08:42', 'System', 1, NULL, '12000000', 150),
(4, 'Kelas Garansi', '2022-12-31 12:10:30', 'System', 1, 'uda', '25000000', 200),
(5, 'Program Bimbel 2 Tahun Kelas 11 SMA', '2022-12-31 12:10:30', NULL, 2, NULL, '22000000', 300),
(6, 'fasjfskd', '2023-02-08 04:34:58', 'admin@gmail.com', 1, NULL, '34444', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sp_ruangan`
--

DROP TABLE IF EXISTS `sp_ruangan`;
CREATE TABLE IF NOT EXISTS `sp_ruangan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_ruang` char(4) DEFAULT NULL,
  `nama_ruang` varchar(100) DEFAULT NULL,
  `lokasi` varchar(150) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `kuota` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sp_ruangan`
--

INSERT INTO `sp_ruangan` (`id`, `kode_ruang`, `nama_ruang`, `lokasi`, `created_at`, `created_by`, `kuota`, `status`) VALUES
(5, NULL, 'jkwjfkjwd', NULL, '2023-02-08 06:10:07', 'admin@gmail.com', NULL, 1),
(2, 'B', 'Ruang BB', NULL, '2023-01-02 21:24:43', 'System', 14, 1),
(3, NULL, 'Ruang B24', NULL, '2023-01-09 13:24:10', 'admin@gmail.com', 3, 1),
(4, NULL, 'H2', NULL, '2023-02-06 14:10:43', 'admin@gmail.com', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sp_siswa`
--

DROP TABLE IF EXISTS `sp_siswa`;
CREATE TABLE IF NOT EXISTS `sp_siswa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(150) DEFAULT NULL,
  `telp` varchar(15) DEFAULT NULL,
  `pendidikan_terakhir` char(5) DEFAULT NULL,
  `kode_program` char(20) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `status_siswa` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sp_siswa`
--

INSERT INTO `sp_siswa` (`id`, `email`, `nama`, `alamat`, `telp`, `pendidikan_terakhir`, `kode_program`, `status`, `status_siswa`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'dimas@gmail.com', 'Dimas', 'jln.sutra', '081265558989', 'SMA', '1', 1, 0, '2023-01-04 02:08:22', 'admin@gmail.com', '2023-01-23 07:00:25', 'dimas@gmail.com'),
(2, 'rukiah@gmail.com', 'Rukiah Nasution', NULL, '081265524545', 'SMA', '1', 1, 0, '2023-01-23 10:57:03', 'admin@gmail.com', '2023-02-05 21:25:13', 'admin@gmail.com'),
(3, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-02-08 04:32:24', 'admin@gmail.com', NULL, NULL),
(4, 'jane@gmail.com', 'Jane', 'keterangan', '081265525666', 'S1', '4', 1, 0, '2023-02-08 09:51:48', 'admin@gmail.com', NULL, NULL),
(5, 'dea@gmail.com', 'dea', NULL, NULL, 'SMA', '6', 1, 0, '2023-02-08 10:02:13', 'admin@gmail.com', NULL, NULL),
(6, 'yani@gmail.com', 'Yani', NULL, NULL, 'SMA', '6', 1, 0, '2023-02-08 10:03:21', 'admin@gmail.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sp_tentor`
--

DROP TABLE IF EXISTS `sp_tentor`;
CREATE TABLE IF NOT EXISTS `sp_tentor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(150) DEFAULT NULL,
  `telp` varchar(15) DEFAULT NULL,
  `pendidikan_terakhir` char(5) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sp_tentor`
--

INSERT INTO `sp_tentor` (`id`, `email`, `nama`, `alamat`, `telp`, `pendidikan_terakhir`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(5, NULL, NULL, NULL, NULL, NULL, '2023-01-08 05:25:32', 'admin@gmail.com', NULL, NULL, 1),
(4, 'audrey@gmail.com', 'AUDREY FAUSTINA', 'jln.pendidikan', '081265558989', 'S1', '2023-01-04 01:53:02', 'admin@gmail.com', NULL, NULL, 1),
(6, 'angel@gmail.com', 'Angel', NULL, '081265558989', 'SMA', '2023-02-05 21:26:10', 'admin@gmail.com', '2023-02-05 21:33:46', 'admin@gmail.com', 1),
(7, 'vina@gmail.com', 'Vina', NULL, NULL, 'SMA', '2023-02-05 21:33:01', 'admin@gmail.com', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(200) DEFAULT NULL,
  `nama` varchar(150) DEFAULT NULL,
  `password` varchar(254) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(150) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(150) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `nama`, `password`, `role`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(1, 'admin@gmail.com', 'System', '$2y$10$ac1JnLTs.TNwGjp0C6A3S.gsRB2owtqtndmAzYvUAqvhc.umqUmCa', 'admin', '2022-12-27 15:47:04', 'System', '2023-02-05 21:46:51', 'admin@gmail.com', 1),
(2, 'siswa@gmail.com', 'Siswa', '$2a$12$Y6L46Z.js.sBF10.QrCnduGP8eifi152vGG3ssaUZsRIZcFF.4nSm', 'siswa', '2022-12-31 07:50:12', 'System', NULL, NULL, 1),
(3, 'tentor@gmail.com', 'Tentor', '$2a$12$Y6L46Z.js.sBF10.QrCnduGP8eifi152vGG3ssaUZsRIZcFF.4nSm', 'tentor', '2022-12-31 07:50:12', 'System', NULL, NULL, 1),
(7, 'dimas@gmail.com', 'Dimas', '$2y$10$XLTgF.px5cfbvckMkZhx1ec7Sz4OgfgE93VGTn93Oc1MOvpz9yE8e', 'siswa', '2023-01-04 02:08:23', 'admin@gmail.com', NULL, NULL, 1),
(6, 'audrey@gmail.com', 'AUDREY FAUSTINA', '$2y$10$Yn62FRVdBadkFWRavRP56./BLUT6hNvtbHZcs3VzznHPpeqXig4/6', 'tentor', '2023-01-04 01:53:02', 'admin@gmail.com', NULL, NULL, 1),
(8, NULL, NULL, '$2y$10$Jp0e7OAYvXpdZvUUNhja/eCmDTUfuTzMvKXRmaGM7ABkzyRDkwFZ.', 'tentor', '2023-01-08 05:25:32', 'admin@gmail.com', '2023-02-05 21:40:35', 'admin@gmail.com', 1),
(9, 'rukiah@gmail.com', 'Rukiah', '$2y$10$5ELqxo1BSN7s9.uEjtRsrO1IH6W9DlDqJNzlv8p9U2vKLyXLzod2e', 'siswa', '2023-01-23 10:57:03', 'admin@gmail.com', NULL, NULL, 1),
(10, 'nabila@gmail.com', 'Nabila', '$2y$10$UA7aDfS.T7JscUBUd9fn0ewUqqaIl21cgEblJvYnzw9XUWsJjAGuC', 'admin', '2023-01-29 05:21:15', 'admin@gmail.com', NULL, NULL, 1),
(11, 'angel@gmail.com', 'angel@gmail.com', '$2y$10$NU2VY/gGTAId17ZNA2ORvu17p6MsQQClkhrH51jspOnCWZmwz488i', 'tentor', '2023-02-05 21:26:10', 'admin@gmail.com', NULL, NULL, 1),
(12, 'vina@gmail.com', 'Vina', '$2y$10$eOllRRqeJ6rv53Fs7Ju/zu7GSCh9xF4bTxGZIQlDu6CRxJ1.Alw/6', 'tentor', '2023-02-05 21:33:01', 'admin@gmail.com', '2023-02-05 21:47:55', 'admin@gmail.com', 1),
(13, NULL, NULL, '$2y$10$V4IuImN8XWG/v9hAy0t0c.QFZt.0Z5qZ8Z6Kvw5ovHX9q8U0Ca2VC', 'siswa', '2023-02-08 04:32:24', 'admin@gmail.com', NULL, NULL, 1),
(14, 'jane@gmail.com', 'Jane', '$2y$10$mHsXOYQXAUuyfxmM.CmsVeJemhlDlgYIRI/vqhn.TRPHr4l/CJ20e', 'siswa', '2023-02-08 09:51:48', 'admin@gmail.com', NULL, NULL, 1),
(15, 'dea@gmail.com', 'dea', '$2y$10$KAXCGy7P9.JDnUUu4Uz1Dub8KREK1YHhHtnMwqJU3C1v4bUvhqciS', 'siswa', '2023-02-08 10:02:14', 'admin@gmail.com', NULL, NULL, 1),
(16, 'yani@gmail.com', 'Yani', '$2y$10$M5Tq8jfqyExutoxtuMuQ7.eLlbFb5vE.E0/aY1vOChQ2A4KjDkjyS', 'siswa', '2023-02-08 10:03:21', 'admin@gmail.com', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_absensi_siswa`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `view_absensi_siswa`;
CREATE TABLE IF NOT EXISTS `view_absensi_siswa` (
`id` int(11)
,`id_jadwal` int(11)
,`id_siswa` int(11)
,`keterangan` tinyint(4)
,`nama` varchar(100)
,`email` varchar(100)
,`nama_tentor` varchar(100)
,`nama_mapel` varchar(150)
,`nama_ruang` varchar(100)
,`created_at` datetime
,`created_by` varchar(100)
,`updated_at` datetime
,`updated_by` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_detail_mapel`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `view_detail_mapel`;
CREATE TABLE IF NOT EXISTS `view_detail_mapel` (
`nama_mapel` varchar(150)
,`id_mapel` int(11)
,`id` int(11)
,`id_tentor` int(11)
,`nama_tentor` varchar(100)
,`email_tentor` varchar(100)
,`created_at` datetime
,`created_by` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_jadwal_mapel`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `view_jadwal_mapel`;
CREATE TABLE IF NOT EXISTS `view_jadwal_mapel` (
`id` int(11)
,`id_tentor` int(11)
,`nama_tentor` varchar(100)
,`nama_mapel` varchar(150)
,`email_tentor` varchar(100)
,`kode_ruang` char(4)
,`nama_ruang` varchar(100)
,`kuota_kelas` int(11)
,`id_detail_mapel` int(11)
,`created_at` datetime
,`created_by` varchar(100)
,`jadwal_mulai` datetime
,`jadwal_selesai` datetime
,`updated_at` datetime
,`updated_by` varchar(100)
,`id_kelas` int(11)
,`nama_kelas` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_jadwal_mapel_siswa`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `view_jadwal_mapel_siswa`;
CREATE TABLE IF NOT EXISTS `view_jadwal_mapel_siswa` (
`id` int(11)
,`id_siswa` int(11)
,`nama` varchar(100)
,`email` varchar(100)
,`id_jadwal` int(11)
,`selesai` tinyint(1)
,`nama_tentor` varchar(100)
,`jadwal_mulai` datetime
,`jadwal_selesai` datetime
,`nama_mapel` varchar(150)
,`id_kelas` int(11)
,`nama_kelas` varchar(100)
,`nama_ruang` varchar(100)
,`kuota_kelas` int(11)
,`created_at` datetime
,`created_by` varchar(100)
,`updated_at` datetime
,`updated_by` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_nilai_skd`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `view_nilai_skd`;
CREATE TABLE IF NOT EXISTS `view_nilai_skd` (
`id` int(11)
,`id_siswa` int(11)
,`nama` varchar(100)
,`twk` decimal(10,0)
,`ket_twk` tinyint(1)
,`tiu` decimal(10,0)
,`ket_tiu` tinyint(1)
,`tkp` decimal(10,0)
,`ket_tkp` tinyint(1)
,`created_at` datetime
,`created_by` varchar(100)
,`updated_at` datetime
,`updated_by` varchar(100)
,`id_jadwal_skd` int(11)
,`tgl_ujian` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_nilai_utbk`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `view_nilai_utbk`;
CREATE TABLE IF NOT EXISTS `view_nilai_utbk` (
`id` int(11)
,`id_siswa` int(11)
,`nama` varchar(100)
,`benar_tps` int(11)
,`persen_tps` decimal(10,6)
,`ket_tps` tinyint(1)
,`benar_tbi` int(11)
,`persen_tbi` decimal(10,6)
,`ket_tbi` tinyint(1)
,`avg` decimal(10,6)
,`created_at` datetime
,`created_by` varchar(100)
,`updated_at` datetime
,`updated_by` varchar(100)
,`id_jadwal_utbk` int(11)
,`tgl_ujian` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_users`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `view_users`;
CREATE TABLE IF NOT EXISTS `view_users` (
`id` int(11)
,`email` varchar(200)
,`nama` varchar(150)
,`password` varchar(254)
,`role` varchar(20)
,`created_at` datetime
,`created_by` varchar(150)
,`updated_at` datetime
,`updated_by` varchar(150)
);

-- --------------------------------------------------------

--
-- Structure for view `view_absensi_siswa`
--
DROP TABLE IF EXISTS `view_absensi_siswa`;

DROP VIEW IF EXISTS `view_absensi_siswa`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_absensi_siswa`  AS  select `sp_absensi_siswa`.`id` AS `id`,`sp_absensi_siswa`.`id_jadwal` AS `id_jadwal`,`sp_absensi_siswa`.`id_siswa` AS `id_siswa`,`sp_absensi_siswa`.`keterangan` AS `keterangan`,`view_jadwal_mapel_siswa`.`nama` AS `nama`,`view_jadwal_mapel_siswa`.`email` AS `email`,`view_jadwal_mapel_siswa`.`nama_tentor` AS `nama_tentor`,`view_jadwal_mapel_siswa`.`nama_mapel` AS `nama_mapel`,`view_jadwal_mapel_siswa`.`nama_ruang` AS `nama_ruang`,`sp_absensi_siswa`.`created_at` AS `created_at`,`sp_absensi_siswa`.`created_by` AS `created_by`,`sp_absensi_siswa`.`updated_at` AS `updated_at`,`sp_absensi_siswa`.`updated_by` AS `updated_by` from (`sp_absensi_siswa` join `view_jadwal_mapel_siswa` on((`view_jadwal_mapel_siswa`.`id_jadwal` = `sp_absensi_siswa`.`id_jadwal`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_detail_mapel`
--
DROP TABLE IF EXISTS `view_detail_mapel`;

DROP VIEW IF EXISTS `view_detail_mapel`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_detail_mapel`  AS  select `sp_mata_pelajaran`.`nama_mapel` AS `nama_mapel`,`sp_mata_pelajaran`.`id` AS `id_mapel`,`sp_detail_mapel`.`id` AS `id`,`sp_detail_mapel`.`id_tentor` AS `id_tentor`,`sp_tentor`.`nama` AS `nama_tentor`,`sp_tentor`.`email` AS `email_tentor`,`sp_detail_mapel`.`created_at` AS `created_at`,`sp_detail_mapel`.`created_by` AS `created_by` from ((`sp_detail_mapel` join `sp_mata_pelajaran` on((`sp_detail_mapel`.`id_mapel` = `sp_mata_pelajaran`.`id`))) join `sp_tentor` on((`sp_detail_mapel`.`id_tentor` = `sp_tentor`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_jadwal_mapel`
--
DROP TABLE IF EXISTS `view_jadwal_mapel`;

DROP VIEW IF EXISTS `view_jadwal_mapel`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_jadwal_mapel`  AS  select `sp_jadwal`.`id` AS `id`,`view_detail_mapel`.`id_tentor` AS `id_tentor`,`view_detail_mapel`.`nama_tentor` AS `nama_tentor`,`view_detail_mapel`.`nama_mapel` AS `nama_mapel`,`view_detail_mapel`.`email_tentor` AS `email_tentor`,`sp_jadwal`.`kode_ruang` AS `kode_ruang`,`sp_ruangan`.`nama_ruang` AS `nama_ruang`,`sp_jadwal`.`kuota_kelas` AS `kuota_kelas`,`sp_jadwal`.`id_detail_mapel` AS `id_detail_mapel`,`sp_jadwal`.`created_at` AS `created_at`,`sp_jadwal`.`created_by` AS `created_by`,`sp_jadwal`.`jadwal_mulai` AS `jadwal_mulai`,`sp_jadwal`.`jadwal_selesai` AS `jadwal_selesai`,`sp_jadwal`.`updated_at` AS `updated_at`,`sp_jadwal`.`updated_by` AS `updated_by`,`sp_jadwal`.`id_kelas` AS `id_kelas`,`sp_kelas`.`nama_kelas` AS `nama_kelas` from (((`sp_jadwal` left join `view_detail_mapel` on((`view_detail_mapel`.`id` = `sp_jadwal`.`id_detail_mapel`))) left join `sp_ruangan` on((`sp_ruangan`.`id` = `sp_jadwal`.`kode_ruang`))) left join `sp_kelas` on((`sp_kelas`.`id` = `sp_jadwal`.`id_kelas`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_jadwal_mapel_siswa`
--
DROP TABLE IF EXISTS `view_jadwal_mapel_siswa`;

DROP VIEW IF EXISTS `view_jadwal_mapel_siswa`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_jadwal_mapel_siswa`  AS  select `sp_jadwal_siswa`.`id` AS `id`,`sp_jadwal_siswa`.`id_siswa` AS `id_siswa`,`sp_siswa`.`nama` AS `nama`,`sp_siswa`.`email` AS `email`,`sp_jadwal_siswa`.`id_jadwal` AS `id_jadwal`,`sp_jadwal_siswa`.`selesai` AS `selesai`,`view_jadwal_mapel`.`nama_tentor` AS `nama_tentor`,`view_jadwal_mapel`.`jadwal_mulai` AS `jadwal_mulai`,`view_jadwal_mapel`.`jadwal_selesai` AS `jadwal_selesai`,`view_jadwal_mapel`.`nama_mapel` AS `nama_mapel`,`view_jadwal_mapel`.`id_kelas` AS `id_kelas`,`view_jadwal_mapel`.`nama_kelas` AS `nama_kelas`,`view_jadwal_mapel`.`nama_ruang` AS `nama_ruang`,`view_jadwal_mapel`.`kuota_kelas` AS `kuota_kelas`,`sp_jadwal_siswa`.`created_at` AS `created_at`,`sp_jadwal_siswa`.`created_by` AS `created_by`,`sp_jadwal_siswa`.`updated_at` AS `updated_at`,`sp_jadwal_siswa`.`updated_by` AS `updated_by` from ((`sp_jadwal_siswa` join `sp_siswa` on((`sp_siswa`.`id` = `sp_jadwal_siswa`.`id_siswa`))) join `view_jadwal_mapel` on((`view_jadwal_mapel`.`id` = `sp_jadwal_siswa`.`id_jadwal`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_nilai_skd`
--
DROP TABLE IF EXISTS `view_nilai_skd`;

DROP VIEW IF EXISTS `view_nilai_skd`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_nilai_skd`  AS  select `sp_nilai_skd`.`id` AS `id`,`sp_nilai_skd`.`id_siswa` AS `id_siswa`,`sp_siswa`.`nama` AS `nama`,`sp_nilai_skd`.`twk` AS `twk`,`sp_nilai_skd`.`ket_twk` AS `ket_twk`,`sp_nilai_skd`.`tiu` AS `tiu`,`sp_nilai_skd`.`ket_tiu` AS `ket_tiu`,`sp_nilai_skd`.`tkp` AS `tkp`,`sp_nilai_skd`.`ket_tkp` AS `ket_tkp`,`sp_nilai_skd`.`created_at` AS `created_at`,`sp_nilai_skd`.`created_by` AS `created_by`,`sp_nilai_skd`.`updated_at` AS `updated_at`,`sp_nilai_skd`.`updated_by` AS `updated_by`,`sp_nilai_skd`.`id_jadwal_skd` AS `id_jadwal_skd`,`sp_jadwal_ujian_skd`.`tgl_ujian` AS `tgl_ujian` from ((`sp_nilai_skd` join `sp_siswa` on((`sp_siswa`.`id` = `sp_nilai_skd`.`id_siswa`))) join `sp_jadwal_ujian_skd` on((`sp_jadwal_ujian_skd`.`id` = `sp_nilai_skd`.`id_jadwal_skd`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_nilai_utbk`
--
DROP TABLE IF EXISTS `view_nilai_utbk`;

DROP VIEW IF EXISTS `view_nilai_utbk`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_nilai_utbk`  AS  select `sp_nilai_utbk`.`id` AS `id`,`sp_nilai_utbk`.`id_siswa` AS `id_siswa`,`sp_siswa`.`nama` AS `nama`,`sp_nilai_utbk`.`benar_tps` AS `benar_tps`,`sp_nilai_utbk`.`persen_tps` AS `persen_tps`,`sp_nilai_utbk`.`ket_tps` AS `ket_tps`,`sp_nilai_utbk`.`benar_tbi` AS `benar_tbi`,`sp_nilai_utbk`.`persen_tbi` AS `persen_tbi`,`sp_nilai_utbk`.`ket_tbi` AS `ket_tbi`,`sp_nilai_utbk`.`avg` AS `avg`,`sp_nilai_utbk`.`created_at` AS `created_at`,`sp_nilai_utbk`.`created_by` AS `created_by`,`sp_nilai_utbk`.`updated_at` AS `updated_at`,`sp_nilai_utbk`.`updated_by` AS `updated_by`,`sp_nilai_utbk`.`id_jadwal_utbk` AS `id_jadwal_utbk`,`sp_jadwal_ujian_utbk`.`tgl_ujian` AS `tgl_ujian` from ((`sp_nilai_utbk` join `sp_siswa` on((`sp_siswa`.`id` = `sp_nilai_utbk`.`id_siswa`))) join `sp_jadwal_ujian_utbk` on((`sp_jadwal_ujian_utbk`.`id` = `sp_nilai_utbk`.`id_jadwal_utbk`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_users`
--
DROP TABLE IF EXISTS `view_users`;

DROP VIEW IF EXISTS `view_users`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_users`  AS  select `users`.`id` AS `id`,`users`.`email` AS `email`,`users`.`nama` AS `nama`,`users`.`password` AS `password`,`users`.`role` AS `role`,`users`.`created_at` AS `created_at`,`users`.`created_by` AS `created_by`,`users`.`updated_at` AS `updated_at`,`users`.`updated_by` AS `updated_by` from `users` ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
