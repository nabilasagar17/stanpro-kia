-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 09, 2023 at 03:27 AM
-- Server version: 5.7.31
-- PHP Version: 7.1.33

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sp_detail_mapel`
--

INSERT INTO `sp_detail_mapel` (`id`, `id_mapel`, `id_tentor`, `created_at`, `created_by`, `status`) VALUES
(1, 1, 4, '2023-01-05 04:35:16', 'admin@gmail.com', 1);

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sp_jadwal`
--

INSERT INTO `sp_jadwal` (`id`, `kode_ruang`, `id_detail_mapel`, `id_tentor`, `kuota_kelas`, `kuota_tersedia`, `kuota_terisi`, `created_at`, `created_by`, `updated_at`, `updated_by`, `jadwal_mulai`, `jadwal_selesai`) VALUES
(1, '1', 1, NULL, 1, NULL, NULL, '2023-01-08 06:44:19', 'admin@gmail.com', NULL, NULL, '2022-11-28 14:44:00', '2022-11-28 16:44:00');

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sp_mata_pelajaran`
--

INSERT INTO `sp_mata_pelajaran` (`id`, `nama_mapel`, `lama_belajar`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(1, 'TIU', NULL, '2023-01-02 14:07:29', 'admin@gmail.com', NULL, NULL, 1);

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sp_nilai_utbk`
--

DROP TABLE IF EXISTS `sp_nilai_utbk`;
CREATE TABLE IF NOT EXISTS `sp_nilai_utbk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_siswa` int(11) DEFAULT NULL,
  `benar_tps` int(11) DEFAULT NULL,
  `persen_tps` decimal(10,0) DEFAULT NULL,
  `ket_tps` tinyint(1) DEFAULT NULL,
  `benar_tbi` int(11) DEFAULT NULL,
  `persen_tbi` decimal(10,0) DEFAULT NULL,
  `ket_tbi` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sp_program`
--

DROP TABLE IF EXISTS `sp_program`;
CREATE TABLE IF NOT EXISTS `sp_program` (
  `kode` char(5) NOT NULL,
  `nama_program` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `keterangan` varchar(150) DEFAULT NULL,
  `harga` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`kode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sp_program`
--

INSERT INTO `sp_program` (`kode`, `nama_program`, `created_at`, `created_by`, `status`, `keterangan`, `harga`) VALUES
('eko01', 'Kelas Ekonomi', '2022-12-31 12:05:43', 'System', 1, 'Program Bimbel Kelas 12 SMA', '6000000'),
('bis01', 'Kelas Bisnis', '2022-12-31 12:05:43', 'System', 1, NULL, '9000000'),
('exe01', 'Kelas Executive', '2022-12-31 12:08:42', 'System', 1, NULL, '12000000'),
('gar01', 'Kelas Garansi', '2022-12-31 12:10:30', 'System', 1, NULL, '25000000'),
('bim01', 'Program Bimbel 2 Tahun Kelas 11 SMA', '2022-12-31 12:10:30', NULL, 1, 'Target 2024 Lulus', '22000000');

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sp_ruangan`
--

INSERT INTO `sp_ruangan` (`id`, `kode_ruang`, `nama_ruang`, `lokasi`, `created_at`, `created_by`, `kuota`, `status`) VALUES
(1, 'A', 'Ruang A', NULL, '2023-01-02 21:24:43', 'System', 14, 1),
(2, 'B', 'Ruang B', NULL, '2023-01-02 21:24:43', 'System', 14, 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sp_siswa`
--

INSERT INTO `sp_siswa` (`id`, `email`, `nama`, `alamat`, `telp`, `pendidikan_terakhir`, `kode_program`, `status`, `status_siswa`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'dimas@gmail.com', 'Dimas', 'jln.sutra', '081265558989', 'SMA', 'exe01', 1, 0, '2023-01-04 02:08:22', 'admin@gmail.com', NULL, NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sp_tentor`
--

INSERT INTO `sp_tentor` (`id`, `email`, `nama`, `alamat`, `telp`, `pendidikan_terakhir`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(5, NULL, NULL, NULL, NULL, NULL, '2023-01-08 05:25:32', 'admin@gmail.com', NULL, NULL, 1),
(4, 'audrey@gmail.com', 'AUDREY FAUSTINA', 'jln.pendidikan', '081265558989', 'S1', '2023-01-04 01:53:02', 'admin@gmail.com', NULL, NULL, 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `nama`, `password`, `role`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(1, 'admin@gmail.com', 'System', '$2a$12$ISJnHG4igRIj6Zr.Un/DW.k9E.q.K2S88HAp7P9alK2lpmV7Sxwky', 'admin', '2022-12-27 15:47:04', 'System', NULL, NULL, 1),
(2, 'siswa@gmail.com', 'Siswa', '$2a$12$Y6L46Z.js.sBF10.QrCnduGP8eifi152vGG3ssaUZsRIZcFF.4nSm', 'siswa', '2022-12-31 07:50:12', 'System', NULL, NULL, 1),
(3, 'tentor@gmail.com', 'Tentor', '$2a$12$Y6L46Z.js.sBF10.QrCnduGP8eifi152vGG3ssaUZsRIZcFF.4nSm', 'tentor', '2022-12-31 07:50:12', 'System', NULL, NULL, 1),
(7, 'dimas@gmail.com', 'Dimas', '$2y$10$XLTgF.px5cfbvckMkZhx1ec7Sz4OgfgE93VGTn93Oc1MOvpz9yE8e', 'siswa', '2023-01-04 02:08:23', 'admin@gmail.com', NULL, NULL, 1),
(6, 'audrey@gmail.com', 'AUDREY FAUSTINA', '$2y$10$Yn62FRVdBadkFWRavRP56./BLUT6hNvtbHZcs3VzznHPpeqXig4/6', 'tentor', '2023-01-04 01:53:02', 'admin@gmail.com', NULL, NULL, 1),
(8, NULL, NULL, '$2y$10$3f4dRyWLvwM6jsI/Z4XmluAn9kGBab5jFTiYSFEadLFpAW5wU.HHK', 'tentor', '2023-01-08 05:25:32', 'admin@gmail.com', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_detail_mapel`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `view_detail_mapel`;
CREATE TABLE IF NOT EXISTS `view_detail_mapel` (
`nama_mapel` varchar(150)
,`id` int(11)
,`id_mapel` int(11)
,`id_tentor` int(11)
,`nama_tentor` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_jadwal_mapel`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `view_jadwal_mapel`;
CREATE TABLE IF NOT EXISTS `view_jadwal_mapel` (
`id` int(11)
,`nama_tentor` varchar(100)
,`nama_mapel` varchar(150)
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
-- Structure for view `view_detail_mapel`
--
DROP TABLE IF EXISTS `view_detail_mapel`;

DROP VIEW IF EXISTS `view_detail_mapel`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_detail_mapel`  AS  select `sp_mata_pelajaran`.`nama_mapel` AS `nama_mapel`,`sp_mata_pelajaran`.`id` AS `id`,`sp_detail_mapel`.`id_mapel` AS `id_mapel`,`sp_detail_mapel`.`id_tentor` AS `id_tentor`,`sp_tentor`.`nama` AS `nama_tentor` from ((`sp_detail_mapel` join `sp_mata_pelajaran` on((`sp_detail_mapel`.`id_mapel` = `sp_mata_pelajaran`.`id`))) join `sp_tentor` on((`sp_detail_mapel`.`id_tentor` = `sp_tentor`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_jadwal_mapel`
--
DROP TABLE IF EXISTS `view_jadwal_mapel`;

DROP VIEW IF EXISTS `view_jadwal_mapel`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_jadwal_mapel`  AS  select `sp_jadwal`.`id` AS `id`,`view_detail_mapel`.`nama_tentor` AS `nama_tentor`,`view_detail_mapel`.`nama_mapel` AS `nama_mapel`,`sp_jadwal`.`kode_ruang` AS `kode_ruang`,`sp_ruangan`.`nama_ruang` AS `nama_ruang`,`sp_jadwal`.`kuota_kelas` AS `kuota_kelas`,`sp_jadwal`.`id_detail_mapel` AS `id_detail_mapel`,`sp_jadwal`.`created_at` AS `created_at`,`sp_jadwal`.`created_by` AS `created_by`,`sp_jadwal`.`jadwal_mulai` AS `jadwal_mulai`,`sp_jadwal`.`jadwal_selesai` AS `jadwal_selesai`,`sp_jadwal`.`updated_at` AS `updated_at`,`sp_jadwal`.`updated_by` AS `updated_by` from ((`sp_jadwal` join `view_detail_mapel` on((`view_detail_mapel`.`id` = `sp_jadwal`.`id_detail_mapel`))) join `sp_ruangan` on((`sp_ruangan`.`id` = `sp_jadwal`.`kode_ruang`))) ;

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
