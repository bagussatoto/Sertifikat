-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2021 at 04:45 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sertifikat`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id_admin` int(10) unsigned NOT NULL,
  `username` varchar(35) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `level` int(11) DEFAULT '25',
  `profilename` varchar(30) DEFAULT NULL,
  `gender` enum('l','p') DEFAULT 'l',
  `profileimg` varchar(100) DEFAULT NULL,
  `wa` varchar(15) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `profileaddress` varchar(300) DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `sts_aktif` tinyint(4) DEFAULT '1' COMMENT '1=aktif 2=blokir',
  `last_login` datetime DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=129 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `level`, `profilename`, `gender`, `profileimg`, `wa`, `email`, `profileaddress`, `ip`, `sts_aktif`, `last_login`) VALUES
(128, 'admin', '1b3231655cebb7a1f783eddf27d254ca', 18, 'Administrator', 'l', '11203014.png', '0123 4567 8912', 'ec@gmail.com', 'Indonesia', NULL, 1, '2021-07-14 08:47:15');

-- --------------------------------------------------------

--
-- Table structure for table `data_nilainonteknik`
--

CREATE TABLE IF NOT EXISTS `data_nilainonteknik` (
`id` int(10) unsigned NOT NULL,
  `ids` varchar(10) DEFAULT NULL,
  `nilai_disiplin` varchar(20) DEFAULT NULL,
  `kat_disiplin` varchar(5) DEFAULT NULL,
  `nilai_kerjasama` varchar(20) DEFAULT NULL,
  `kat_kerjasama` varchar(5) DEFAULT NULL,
  `nilai_inisiatif` varchar(20) DEFAULT NULL,
  `kat_inisiatif` varchar(5) DEFAULT NULL,
  `nilai_kerajinan` varchar(20) DEFAULT NULL,
  `kat_kerajinan` varchar(5) DEFAULT NULL,
  `nilai_tanggungjawab` varchar(20) DEFAULT NULL,
  `kat_tanggungjawab` varchar(5) DEFAULT NULL,
  `nilai_sikap` varchar(20) DEFAULT NULL,
  `kat_sikap` varchar(5) DEFAULT NULL,
  `_ctime` datetime DEFAULT CURRENT_TIMESTAMP,
  `_cid` int(5) DEFAULT NULL,
  `_utime` datetime DEFAULT NULL,
  `_uid` int(5) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_nilainonteknik`
--

INSERT INTO `data_nilainonteknik` (`id`, `ids`, `nilai_disiplin`, `kat_disiplin`, `nilai_kerjasama`, `kat_kerjasama`, `nilai_inisiatif`, `kat_inisiatif`, `nilai_kerajinan`, `kat_kerajinan`, `nilai_tanggungjawab`, `kat_tanggungjawab`, `nilai_sikap`, `kat_sikap`, `_ctime`, `_cid`, `_utime`, `_uid`) VALUES
(2, '194', '87', 'B', '90', 'B', '90', 'B', '90', 'B', '90', 'B', '90', 'B', '2020-03-10 11:25:27', 14, NULL, NULL),
(3, '86', '78', 'C', '90', 'B', '90', 'B', '90', 'B', '90', 'B', '90', 'B', '2020-03-10 12:45:50', 14, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `data_nilaiteknik`
--

CREATE TABLE IF NOT EXISTS `data_nilaiteknik` (
`id` int(10) unsigned NOT NULL,
  `ids` varchar(10) DEFAULT NULL,
  `angka` varchar(100) DEFAULT NULL,
  `kategori` varchar(80) DEFAULT NULL,
  `kode_aspek` varchar(10) DEFAULT NULL,
  `_ctime` datetime DEFAULT CURRENT_TIMESTAMP,
  `_cid` int(5) DEFAULT NULL,
  `_utime` datetime DEFAULT NULL,
  `_uid` int(5) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_nilaiteknik`
--

INSERT INTO `data_nilaiteknik` (`id`, `ids`, `angka`, `kategori`, `kode_aspek`, `_ctime`, `_cid`, `_utime`, `_uid`) VALUES
(4, '194', '90', 'B', '1', '2020-03-10 11:25:27', 14, NULL, NULL),
(5, '194', '80', 'C', '2', '2020-03-10 11:25:27', 14, NULL, NULL),
(6, '194', '90', 'B', '3', '2020-03-10 11:25:27', 14, NULL, NULL),
(7, '86', '80', 'C', '1', '2020-03-10 12:45:50', 14, NULL, NULL),
(8, '86', '90', 'B', '2', '2020-03-10 12:45:50', 14, NULL, NULL),
(9, '86', '90', 'B', '3', '2020-03-10 12:45:50', 14, NULL, NULL),
(10, '86', '90', 'B', '4', '2020-03-10 12:45:50', 14, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `data_sertifikat`
--

CREATE TABLE IF NOT EXISTS `data_sertifikat` (
`id` int(10) unsigned NOT NULL,
  `nis` varchar(16) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(80) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `kelas` varchar(20) DEFAULT NULL,
  `program_keahlian` varchar(80) DEFAULT NULL,
  `kompetensi_keahlian` varchar(80) DEFAULT NULL,
  `sekolah_asal` varchar(100) DEFAULT NULL,
  `nama_dudi` text,
  `alamat_dudi` text,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `lama_pkl` varchar(10) DEFAULT NULL,
  `jml_nilaiteknik` varchar(10) DEFAULT NULL,
  `jml_katteknik` varchar(10) DEFAULT NULL,
  `rt_nilaiteknik` varchar(10) DEFAULT NULL,
  `rt_katteknik` varchar(10) DEFAULT NULL,
  `jml_nilainonteknik` varchar(10) DEFAULT NULL,
  `jml_katnonteknik` varchar(10) DEFAULT NULL,
  `rt_nilainonteknik` varchar(10) DEFAULT NULL,
  `rt_katnonteknik` varchar(10) DEFAULT NULL,
  `_ctime` datetime DEFAULT CURRENT_TIMESTAMP,
  `_cid` int(5) DEFAULT NULL,
  `_utime` datetime DEFAULT NULL,
  `_uid` int(5) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=196 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_sertifikat`
--

INSERT INTO `data_sertifikat` (`id`, `nis`, `nama`, `tempat_lahir`, `tanggal_lahir`, `kelas`, `program_keahlian`, `kompetensi_keahlian`, `sekolah_asal`, `nama_dudi`, `alamat_dudi`, `tanggal_mulai`, `tanggal_selesai`, `lama_pkl`, `jml_nilaiteknik`, `jml_katteknik`, `rt_nilaiteknik`, `rt_katteknik`, `jml_nilainonteknik`, `jml_katnonteknik`, `rt_nilainonteknik`, `rt_katnonteknik`, `_ctime`, `_cid`, `_utime`, `_uid`) VALUES
(195, '0123456789', 'LILATUL JIMA''', 'TAHTAL BATH', '2001-01-01', '5', '1', '3', 'QOLBUKI', 'DARUN NIKMAH', 'JL. FUADUL MAHMUBAH', '2020-04-30', '2020-08-31', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-28 09:17:00', 14, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `main_konfig`
--

CREATE TABLE IF NOT EXISTS `main_konfig` (
  `id_konfig` int(10) unsigned NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `value` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `main_konfig`
--

INSERT INTO `main_konfig` (`id_konfig`, `nama`, `value`) VALUES
(1, 'Loggo', 'logo_admin.png'),
(2, 'Favicon', 'favicon.x-icon'),
(3, 'Project Date', '11/03/2020'),
(4, 'Client Name', 'SMKS Untung Surapati Pasuruan'),
(5, 'Product By', 'Digital Jessie'),
(6, 'Aplication Name', 'E-CERTIFICATE'),
(8, 'Copyright', 'Copyright © awpship.'),
(7, 'Record log', '1000'),
(9, 'Version', '1.0.0'),
(10, 'Power', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `main_level`
--

CREATE TABLE IF NOT EXISTS `main_level` (
`id_level` int(10) unsigned NOT NULL,
  `levelname` varchar(25) NOT NULL,
  `direct` text,
  `ket` text,
  `control` text,
  `_ctime` datetime DEFAULT NULL,
  `_cid` int(11) DEFAULT NULL,
  `_utime` datetime DEFAULT NULL,
  `_uid` int(11) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `main_level`
--

INSERT INTO `main_level` (`id_level`, `levelname`, `direct`, `ket`, `control`, `_ctime`, `_cid`, `_utime`, `_uid`) VALUES
(1, 'super', 'super', 'kelola keseluruhan', NULL, NULL, NULL, '2019-12-13 10:52:12', 2),
(18, 'admin', 'data_sertifikat', 'admin', NULL, NULL, NULL, '2019-12-09 11:14:23', 2);

-- --------------------------------------------------------

--
-- Table structure for table `main_log`
--

CREATE TABLE IF NOT EXISTS `main_log` (
`id_log` bigint(20) unsigned NOT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `nama_user` varchar(56) DEFAULT NULL,
  `table_updated` varchar(25) DEFAULT NULL,
  `aksi` text NOT NULL,
  `tgl` datetime DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=128 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `main_log`
--

INSERT INTO `main_log` (`id_log`, `id_admin`, `nama_user`, `table_updated`, `aksi`, `tgl`) VALUES
(25, 14, 'ADMINSTRATOR', 'Login', 'Login', '2019-12-09 10:59:52'),
(3, 14, 'ADMINSTRATOR', 'Login', 'Login', '2019-12-04 10:18:17'),
(4, 14, 'ADMINSTRATOR', 'Login', 'Login', '2019-12-04 10:19:29'),
(56, 14, 'ZAI.WEB.ID', 'Login', 'Login', '2019-12-13 11:33:20'),
(6, 14, 'ADMINSTRATOR', 'Login', 'Login', '2019-12-04 11:15:36'),
(7, 14, 'ADMINSTRATOR', 'Login', 'Login', '2019-12-04 11:17:23'),
(8, 14, 'ADMINSTRATOR', 'Login', 'Login', '2019-12-04 11:18:57'),
(27, 14, 'ADMINSTRATOR', 'Login', 'Login', '2019-12-09 11:14:55'),
(11, 2, 'ROBOT SUPER', 'Login', 'Login', '2019-12-04 14:54:25'),
(12, 2, 'ROBOT SUPER', 'Login', 'Login', '2019-12-05 08:18:05'),
(13, 2, 'ROBOT SUPER', 'Login', 'Login', '2019-12-06 14:03:08'),
(14, 2, 'ROBOT SUPER', 'Login', 'Login', '2019-12-06 14:11:57'),
(15, 2, 'ROBOT SUPER', 'Login', 'Login', '2019-12-06 16:44:13'),
(16, 2, 'ROBOT SUPER', 'Login', 'Login', '2019-12-06 16:49:19'),
(17, 2, 'ROBOT SUPER', 'Login', 'Login', '2019-12-06 16:55:00'),
(18, 2, 'ROBOT SUPER', 'Login', 'Login', '2019-12-06 20:04:06'),
(19, 2, 'ROBOT SUPER', 'Login', 'Login', '2019-12-06 20:43:02'),
(20, 2, 'ROBOT SUPER', 'Login', 'Login', '2019-12-07 05:54:22'),
(21, 2, 'ROBOT SUPER', 'Login', 'Login', '2019-12-07 19:57:08'),
(22, 2, 'ROBOT SUPER', 'Login', 'Login', '2019-12-09 09:28:27'),
(23, 2, 'ROBOT SUPER', 'Login', 'Login', '2019-12-09 09:31:06'),
(26, 2, 'ROBOT SUPER', 'Login', 'Login', '2019-12-09 11:00:12'),
(28, 2, 'ROBOT SUPER', 'Login', 'Login', '2019-12-09 11:49:11'),
(29, 14, 'ADMINSTRATOR', 'Login', 'Login', '2019-12-09 11:50:50'),
(30, 2, 'ROBOT SUPER', 'Login', 'Login', '2019-12-09 13:44:59'),
(31, 14, 'ADMINSTRATOR', 'Login', 'Login', '2019-12-09 13:45:28'),
(32, 2, 'ROBOT SUPER', 'Login', 'Login', '2019-12-09 14:04:43'),
(33, 14, 'ADMINSTRATOR', 'Login', 'Login', '2019-12-09 14:05:28'),
(34, 14, 'ADMINSTRATOR', 'Login', 'Login', '2019-12-10 08:28:31'),
(35, 2, 'ROBOT SUPER', 'Login', 'Login', '2019-12-10 13:04:11'),
(36, 14, 'ADMINSTRATOR', 'Login', 'Login', '2019-12-10 13:05:08'),
(37, 14, 'ADMINSTRATOR', 'Login', 'Login', '2019-12-10 16:47:25'),
(38, 14, 'ADMINSTRATOR', 'Login', 'Login', '2019-12-10 20:12:22'),
(39, 14, 'ADMINSTRATOR', 'Login', 'Login', '2019-12-11 14:24:00'),
(40, 14, 'ADMINSTRATOR', 'Login', 'Login', '2019-12-12 06:45:15'),
(41, 14, 'ADMINSTRATOR', 'Login', 'Login', '2019-12-12 09:48:16'),
(42, 14, 'ADMINSTRATOR', 'Login', 'Login', '2019-12-12 11:52:06'),
(43, 14, 'ADMINSTRATOR', 'Login', 'Login', '2019-12-12 12:11:28'),
(44, 2, 'ROBOT SUPER', 'Login', 'Login', '2019-12-12 12:18:47'),
(45, 2, 'ROBOT SUPER', 'Login', 'Login', '2019-12-12 12:19:28'),
(46, 14, 'ADMINSTRATOR', 'Login', 'Login', '2019-12-12 12:19:43'),
(47, 14, 'ADMINSTRATOR', 'Login', 'Login', '2019-12-12 14:21:22'),
(48, 14, 'ADMINSTRATOR', 'Login', 'Login', '2019-12-13 09:41:35'),
(49, 2, 'ROBOT SUPER', 'Login', 'Login', '2019-12-13 10:50:14'),
(50, 2, 'ROBOT SUPER', 'Login', 'Login', '2019-12-13 10:54:42'),
(51, 2, 'ROBOT SUPER', 'Login', 'Login', '2019-12-13 10:56:03'),
(52, 2, 'ROBOT SUPER', 'Login', 'Login', '2019-12-13 10:56:57'),
(53, 2, 'ROBOT SUPER', 'Login', 'Login', '2019-12-13 10:59:05'),
(54, 2, 'ROBOT SUPER', 'Login', 'Login', '2019-12-13 11:00:26'),
(55, 2, 'ROBOT SUPER', 'Login', 'Login', '2019-12-13 11:31:54'),
(57, 14, 'ZAI.WEB.ID', 'Login', 'Login', '2019-12-13 11:33:29'),
(58, 14, 'ZAI.WEB.ID', 'Login', 'Login', '2019-12-13 16:09:56'),
(59, 14, 'ZAI.WEB.ID', 'Login', 'Login', '2019-12-14 08:55:17'),
(60, 2, 'ROBOT SUPER', 'Login', 'Login', '2019-12-15 18:18:50'),
(61, 2, 'ROBOT SUPER', 'Login', 'Login', '2019-12-15 18:30:23'),
(62, 14, 'ZAI.WEB.ID', 'Login', 'Login', '2019-12-15 18:34:06'),
(63, 2, 'ROBOT SUPER', 'Login', 'Login', '2019-12-15 18:48:22'),
(64, 14, 'ZAI.WEB.ID', 'Login', 'Login', '2019-12-15 18:58:54'),
(65, 14, 'ZAI.WEB.ID', 'Login', 'Login', '2019-12-16 11:16:16'),
(66, 14, 'ZAI.WEB.ID', 'Login', 'Login', '2019-12-16 14:43:50'),
(67, 14, 'ZAI.WEB.ID', 'Login', 'Login', '2019-12-16 20:04:52'),
(68, 14, 'ZAI.WEB.ID', 'Login', 'Login', '2019-12-17 13:03:26'),
(69, 14, 'ZAI.WEB.ID', 'Login', 'Login', '2019-12-18 13:41:21'),
(70, 14, 'ZAI.WEB.ID', 'Login', 'Login', '2019-12-23 05:08:45'),
(71, 14, 'ZAI.WEB.ID', 'Login', 'Login', '2019-12-23 16:46:45'),
(72, 14, 'ZAI.WEB.ID', 'Login', 'Login', '2019-12-23 19:41:18'),
(73, 14, 'ZAI.WEB.ID', 'Login', 'Login', '2019-12-23 19:41:30'),
(74, 14, 'ZAI.WEB.ID', 'Login', 'Login', '2019-12-23 19:41:35'),
(75, 14, 'ZAI.WEB.ID', 'Login', 'Login', '2019-12-24 11:01:35'),
(76, 14, 'ZAI.WEB.ID', 'Login', 'Login', '2019-12-26 21:15:10'),
(77, 14, 'ZAI.WEB.ID', 'Login', 'Login', '2019-12-28 12:32:52'),
(78, 2, 'ROBOT SUPER', 'Login', 'Login', '2020-01-01 06:41:53'),
(79, 2, 'ROBOT SUPER', 'Login', 'Login', '2020-01-02 08:56:18'),
(80, 14, 'ZAI.WEB.ID', 'Login', 'Login', '2020-02-08 12:53:25'),
(81, 2, 'ROBOT SUPER', 'Login', 'Login', '2020-03-03 11:35:14'),
(82, 14, 'ZAI.WEB.ID', 'Login', 'Login', '2020-03-06 08:20:03'),
(83, 14, 'ZAI.WEB.ID', 'Login', 'Login', '2020-03-06 13:50:11'),
(84, 2, 'ROBOT SUPER', 'Login', 'Login', '2020-03-06 14:19:52'),
(85, 2, 'ROBOT SUPER', 'Login', 'Login', '2020-03-06 14:27:23'),
(86, 14, 'ZAI.WEB.ID', 'Login', 'Login', '2020-03-06 14:32:47'),
(87, 14, 'ZAI.WEB.ID', 'Login', 'Login', '2020-03-06 17:08:58'),
(88, 14, 'ZAI.WEB.ID', 'Login', 'Login', '2020-03-06 17:14:28'),
(89, 14, 'ZAI.WEB.ID', 'Login', 'Login', '2020-03-06 20:02:13'),
(90, 14, 'ZAI.WEB.ID', 'Login', 'Login', '2020-03-07 06:22:27'),
(91, 14, 'ZAI.WEB.ID', 'Login', 'Login', '2020-03-07 09:10:12'),
(92, 14, 'ZAI.WEB.ID', 'Login', 'Login', '2020-03-07 20:54:15'),
(93, 14, 'ZAI.WEB.ID', 'Login', 'Login', '2020-03-08 05:46:27'),
(94, 14, 'ZAI.WEB.ID', 'Login', 'Login', '2020-03-08 09:29:43'),
(95, 14, 'ZAI.WEB.ID', 'Login', 'Login', '2020-03-08 16:57:01'),
(96, 14, 'ZAI.WEB.ID', 'Login', 'Login', '2020-03-08 19:42:22'),
(97, 14, 'ZAI.WEB.ID', 'Login', 'Login', '2020-03-09 06:21:20'),
(98, 14, 'ZAI.WEB.ID', 'Login', 'Login', '2020-03-09 06:35:42'),
(99, 14, 'ZAI.WEB.ID', 'Login', 'Login', '2020-03-09 07:11:40'),
(100, 14, 'ZAI.WEB.ID', 'Login', 'Login', '2020-03-09 10:35:44'),
(101, 14, 'ZAI.WEB.ID', 'Login', 'Login', '2020-03-09 13:41:29'),
(102, 14, 'ZAI.WEB.ID', 'Login', 'Login', '2020-03-09 18:47:36'),
(103, 14, 'ZAI.WEB.ID', 'Login', 'Login', '2020-03-10 05:58:19'),
(104, 14, 'ZAI.WEB.ID', 'Login', 'Login', '2020-03-10 10:38:57'),
(105, 14, 'ZAI.WEB.ID', 'Login', 'Login', '2020-03-10 10:55:29'),
(106, 14, 'ZAI.WEB.ID', 'Login', 'Login', '2020-03-10 11:17:23'),
(107, 14, 'ZAI.WEB.ID', 'Login', 'Login', '2020-03-10 11:43:13'),
(108, 14, 'ZAI.WEB.ID', 'Login', 'Login', '2020-03-10 12:01:12'),
(109, 14, 'ZAI.WEB.ID', 'Login', 'Login', '2020-03-10 12:21:30'),
(110, 14, 'ZAI.WEB.ID', 'Login', 'Login', '2020-03-10 12:44:16'),
(111, 14, 'ZAI.WEB.ID', 'Login', 'Login', '2020-03-10 13:58:06'),
(112, 14, 'ZAI.WEB.ID', 'Login', 'Login', '2020-03-10 14:03:00'),
(113, 14, 'ZAI.WEB.ID', 'Login', 'Login', '2020-03-10 14:38:18'),
(114, 14, 'Operator', 'Login', 'Login', '2020-03-10 14:46:21'),
(115, 14, 'Operator', 'Login', 'Login', '2020-03-10 15:09:00'),
(116, 14, 'Operator', 'Login', 'Login', '2020-03-10 15:26:03'),
(117, 14, 'Operator', 'Login', 'Login', '2020-03-10 15:53:00'),
(118, 14, 'Operator', 'Login', 'Login', '2020-03-10 18:52:42'),
(119, 14, 'Operator', 'Login', 'Login', '2020-03-11 07:06:25'),
(120, 14, 'Operator', 'Login', 'Login', '2020-03-11 16:02:39'),
(121, 14, 'Operator', 'Login', 'Login', '2020-03-11 16:20:29'),
(122, 14, 'Operator', 'Login', 'Login', '2020-03-11 16:28:23'),
(123, 14, 'Operator', 'Login', 'Login', '2020-03-11 17:13:35'),
(124, 14, 'Operator', 'Login', 'Login', '2020-06-28 09:49:11'),
(125, 2, 'ROBOT SUPER', 'Login', 'Login', '2021-07-14 08:39:41'),
(126, 128, 'Administrator', 'Login', 'Login', '2021-07-14 08:40:16'),
(127, 128, 'Administrator', 'Login', 'Login', '2021-07-14 08:47:15');

-- --------------------------------------------------------

--
-- Table structure for table `main_menu`
--

CREATE TABLE IF NOT EXISTS `main_menu` (
`id_menu` int(10) unsigned NOT NULL,
  `nama` varchar(25) DEFAULT NULL,
  `level` enum('1','2') DEFAULT NULL,
  `id_main` int(11) DEFAULT '0',
  `dropdown` varchar(10) DEFAULT NULL,
  `icon` varchar(25) DEFAULT NULL,
  `hak_akses` int(11) DEFAULT NULL,
  `link` varchar(50) DEFAULT NULL,
  `_ctime` datetime DEFAULT NULL,
  `_cid` int(10) DEFAULT NULL,
  `_utime` datetime DEFAULT NULL,
  `_uid` int(10) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `main_menu`
--

INSERT INTO `main_menu` (`id_menu`, `nama`, `level`, `id_main`, `dropdown`, `icon`, `hak_akses`, `link`, `_ctime`, `_cid`, `_utime`, `_uid`) VALUES
(1, 'Dashboard', '1', 0, 'no', 'fas fa-tachometer-alt', 1, 'super/dashboard', '2019-12-06 17:08:21', 2, NULL, NULL),
(2, 'User Group', '1', 0, 'no', 'fas fa-star', 1, 'super/manajemen', '2019-12-06 17:08:54', 2, '2019-12-07 11:38:46', 2),
(3, 'Data user', '1', 0, 'no', 'fas fa-users', 1, 'super/data_user', '2019-12-06 17:27:07', 2, '2019-12-07 20:39:29', 2),
(4, 'Data Log', '1', 0, 'no', 'fas fa-key', 1, 'super/data_log', '2019-12-07 11:30:13', 2, '2019-12-07 21:01:23', 2),
(5, 'Config App', '1', 0, 'no', 'fas fa-cog', 1, 'super/config_app', '2019-12-07 11:31:27', 2, '2019-12-07 11:33:48', 2),
(6, 'Dashboard', '1', 0, 'no', 'fas fa-tachometer-alt', 18, 'dashboard', '2019-12-09 10:15:09', 2, NULL, NULL),
(7, 'Data Sertifikat', '1', 0, 'no', 'fas fa-table', 18, 'data_sertifikat', '2019-12-09 10:40:10', 2, '2019-12-09 10:43:57', 2),
(8, 'Edit Template', '1', 0, 'no', 'fas fa-image', 18, 'data_template', '2019-12-09 10:42:18', 2, '2019-12-12 12:19:14', 2);

-- --------------------------------------------------------

--
-- Table structure for table `temp_element`
--

CREATE TABLE IF NOT EXISTS `temp_element` (
`id_element` int(11) NOT NULL,
  `name_element` varchar(50) DEFAULT NULL,
  `element` text,
  `el_1` varchar(80) DEFAULT NULL,
  `el_2` varchar(50) DEFAULT NULL,
  `el_3` varchar(50) DEFAULT NULL,
  `el_4` varchar(50) DEFAULT NULL,
  `el_5` varchar(100) DEFAULT NULL,
  `el_6` varchar(50) DEFAULT NULL,
  `el_7` varchar(50) DEFAULT NULL,
  `el_8` varchar(50) DEFAULT NULL,
  `el_9` varchar(50) DEFAULT NULL,
  `el_10` text,
  `el_11` varchar(50) DEFAULT NULL,
  `el_12` varchar(80) DEFAULT NULL,
  `el_13` varchar(80) DEFAULT NULL,
  `el_14` varchar(50) DEFAULT NULL,
  `_cid` int(10) DEFAULT NULL,
  `_ctime` datetime DEFAULT NULL,
  `_uid` int(10) DEFAULT NULL,
  `_utime` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp_element`
--

INSERT INTO `temp_element` (`id_element`, `name_element`, `element`, `el_1`, `el_2`, `el_3`, `el_4`, `el_5`, `el_6`, `el_7`, `el_8`, `el_9`, `el_10`, `el_11`, `el_12`, `el_13`, `el_14`, `_cid`, `_ctime`, `_uid`, `_utime`) VALUES
(1, 'Element Satu', '	 \r\n#divid{margin-top: 0px;margin-left: 0px;height:793px;width:1122px;}\r\n.logo img{position:absolute; margin-top:90px; margin-left:470px;}\r\n.logo_img{width:200px;height:90px;}\r\n.nomor{position:absolute;text-align:right;margin-top:80px;margin-right:90px;}\r\n	.tanggal{position:absolute;text-align:left;font-size:30px;margin-top:580px;margin-left:280px;font-family:;}\r\n	.ttd{position:absolute;text-align:left;font-size:30px;margin-top:580px;margin-left:670px;font-family:;}\r\n	.nama_dudi{position:absolute;text-align:center;font-size:24px;margin-top:63px;padding-bottom:8px;font-weight:bold;}\r\n	.alamat_dudi{text-align:center;font-size:18px;margin-top:-32px;padding-bottom:8px;}\r\n	.s1{position:absolute;text-align:center;font-size:63px;margin-top:128px;padding-bottom:2px;font-weight:bold;font-family:monotypecorsiva;}\r\n	.s2{text-align:center;font-size:19px;margin-top:-50px;}	\r\n	.s3{text-align:center;font-size:17px;margin-top:0px;}\r\n	.nama{text-align:center;font-size:35px;margin-top:-2px;font-weight:bold;font-family:;text-decoration: underline; }\r\n	#tema{margin: auto;\r\n  width: 68%;\r\n     }\r\n	.namatema{text-align:center;font-size:17px;margin-top:18px;line-height: 1.4;}\r\n	.foto{position:absolute;border: 2px solid #000000; width:112px;height:150px;margin-top:575px;margin-left:592px;text-align:center;}\r\n	.s11{text-align:left;font-size:17px;margin-top:33px;margin-left:725px;}	\r\n	.s12{text-align:left;font-size:17px;margin-top:-12px;margin-left:725px;}	\r\n	.s13{text-align:left;font-size:17px;margin-top:58px;margin-left:725px;}	\r\n\r\n	#tabel1{\r\n		margin-top:-10px;\r\n  border: 0px solid black;\r\n  margin: auto; \r\n  padding:0;\r\n  width: 90%;\r\n}\r\n@media all {\r\n .page-break  { display: none; }\r\n}\r\n\r\n@media print {\r\n .page-break  { display: block; page-break-before: always; }\r\n}\r\n\r\n.s14{text-align:center;font-weight:bold;font-size:19px;margin-top:70px;}\r\n\r\n#tabel2{\r\n  margin-top:0px;\r\n  border: 0px solid black;\r\n  margin: 0; \r\n  padding:0;\r\n  width: 100%;\r\n  margin-left:98px;\r\n}	\r\n#colom2{\r\n  margin-top:0px;\r\n  border: 0px solid black;\r\n  width: 100%;\r\n  margin-left:98px;\r\n}\r\n.tborder_1{ margin-top:20px;margin-left:0px;border-collapse: collapse; word-wrap:break-word; word-break: break-all;table-layout: fixed;width: 1000px;font-size:15px;}\r\n.tborder_1  th{background-color: #f4f4f4;word-wrap:break-word;word-break: break-all;border: 1px solid #000;font-size:16px;padding-left:5px;padding-right:3px;padding-top:2px;padding-bottom:2px;}\r\n.tborder_1  td{word-wrap:break-word;word-break: break-all;border: 1px solid #000;font-size:15px;padding-left:8px;padding-right:8px;padding-top:2px;padding-bottom:2px;}\r\n\r\n.tborder_2{ margin-top:20px;margin-left:10px;border-collapse: collapse; word-wrap:break-word; word-break: break-all;table-layout: fixed;width: 1000px;font-size:15px;}\r\n.tborder_2  th{background-color: #f4f4f4;word-wrap:break-word;word-break: break-all;border: 1px solid #000;font-size:16px;padding-left:5px;padding-right:3px;padding-top:2px;padding-bottom:2px;}\r\n.tborder_2  td{word-wrap:break-word;word-break: break-all;border: 1px solid #000;font-size:15px;padding-left:8px;padding-right:8px;padding-top:2px;padding-bottom:2px;}\r\n\r\n.tborder_3{ margin-top:20px;margin-left:0px;border-collapse: collapse; word-wrap:break-word; word-break: break-all;table-layout: fixed;width: 1000px;font-size:15px;}\r\n.tborder_3  th{background-color: #f4f4f4;word-wrap:break-word;word-break: break-all;border: 1px solid #000;font-size:16px;padding-left:5px;padding-right:3px;padding-top:2px;padding-bottom:2px;}\r\n.tborder_3  td{word-wrap:break-word;word-break: break-all;border: 1px solid #000;font-size:15px;padding-left:8px;padding-right:8px;padding-top:2px;padding-bottom:2px;}\r\n\r\n.tborder2 td,.tborder2  th{word-wrap:break-word;word-break: break-all;border-bottom: 1px solid #000;font-size:9px;padding-left:3px;padding-right:3px}\r\n', 'SERTIFIKAT', 'PRAKTIK KERJA LAPANGAN', 'Diberikan Kepada', 'Tempat, Tanggal Lahir', 'Nomor Induk Siswa', 'Kelas', 'Program Keahlian', 'Kompetensi Keahlian', 'Sekolah Asal', 'Telah Melaksanakan Praktik Kerja Lapangan (PKL)', 'Nusantara Bumi, 06 Maret 2020', 'Pimpinan HRD Cinta', '_________________', 'Nama', NULL, NULL, 14, '2020-06-28 09:20:49');

-- --------------------------------------------------------

--
-- Table structure for table `temp_sertifikat`
--

CREATE TABLE IF NOT EXISTS `temp_sertifikat` (
`id_temp` int(5) NOT NULL,
  `id_element` int(11) DEFAULT NULL,
  `nama_temp` varchar(80) DEFAULT NULL,
  `img_temp` text,
  `img_back` text,
  `default_temp` enum('not','yes') DEFAULT 'not',
  `_cid` int(11) DEFAULT NULL,
  `_ctime` datetime DEFAULT NULL,
  `_uid` int(11) DEFAULT NULL,
  `_utime` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp_sertifikat`
--

INSERT INTO `temp_sertifikat` (`id_temp`, `id_element`, `nama_temp`, `img_temp`, `img_back`, `default_temp`, `_cid`, `_ctime`, `_uid`, `_utime`) VALUES
(10, 1, 'Template Satu', 'F08433410.png', 'B08433410.png', 'not', 14, '2019-12-12 14:08:51', 128, '2021-07-14 08:43:34'),
(13, 1, 'Template Dua', 'F21052913.png', 'B21052913.png', 'yes', 14, '2020-03-08 21:04:47', 14, '2020-03-08 21:05:29');

-- --------------------------------------------------------

--
-- Table structure for table `tm_aspek`
--

CREATE TABLE IF NOT EXISTS `tm_aspek` (
`id` int(11) NOT NULL,
  `kode` varchar(5) DEFAULT NULL,
  `aspek` varchar(100) DEFAULT NULL,
  `kode_kk` int(5) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_aspek`
--

INSERT INTO `tm_aspek` (`id`, `kode`, `aspek`, `kode_kk`) VALUES
(1, '1', 'Menggunakan Mesin Bubut', 1),
(2, '2', 'Menggunakan Mesin Frais', 1),
(3, '3', 'Menggunakan Mesin Skrap', 1),
(4, '4', 'Menggunakan Mesin Bor', 1),
(5, '5', 'Menggunakan Mesin Las', 1),
(6, '1', 'Merakit PC', 2),
(7, '2', 'Trouble Shooting', 2),
(8, '3', 'Instalasi S.O dan Aplikasi', 2),
(9, '4', 'Konfigurasi Jaringan', 2),
(10, '5', 'Trouble Shooting Jaringan', 2),
(11, '1', 'Memasang Instalasi Penerangan Listrik', 3),
(12, '2', 'Memasang Instalasi Tenaga Listrik', 3),
(13, '3', 'Membaca Alat ukur Listrik', 3),
(14, '4', 'Melakukan Perbaikan dan Perawatan Motor Listrik', 3),
(15, '1', 'Perbaikan Mesin (ENGINE)', 4),
(16, '2', 'Perbaikan Chasis', 4),
(17, '3', 'Perbaikan Kelistrikan', 4),
(18, '1', 'Perbaikan Mesin (ENGINE)', 5),
(19, '2', 'Perbaikan Chasis', 5),
(20, '3', 'Perbaikan Kelistrikan', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tm_kelas`
--

CREATE TABLE IF NOT EXISTS `tm_kelas` (
`id` int(10) unsigned NOT NULL,
  `kode` varchar(5) DEFAULT NULL,
  `kelas` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_kelas`
--

INSERT INTO `tm_kelas` (`id`, `kode`, `kelas`) VALUES
(1, '1', 'XI TITL'),
(2, '2', 'XI TPM-1'),
(3, '3', 'XI TPM-2'),
(4, '4', 'XI TKRO'),
(5, '5', 'XI TKJ'),
(6, '6', 'XI TBSM-1'),
(7, '7', 'XI TBSM-2');

-- --------------------------------------------------------

--
-- Table structure for table `tm_kompetensi_keahlian`
--

CREATE TABLE IF NOT EXISTS `tm_kompetensi_keahlian` (
`id` int(10) unsigned NOT NULL,
  `kode` varchar(5) DEFAULT NULL,
  `kompetensi_keahlian` varchar(100) DEFAULT NULL,
  `kd_pk` varchar(5) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_kompetensi_keahlian`
--

INSERT INTO `tm_kompetensi_keahlian` (`id`, `kode`, `kompetensi_keahlian`, `kd_pk`) VALUES
(1, '1', 'Teknik Pemesinan', '2'),
(2, '2', 'Teknik Komputer dan Jaringan', '4'),
(3, '3', 'Teknik Instalasi Tenaga Listrik', '1'),
(4, '4', 'Teknik Kendaraan Ringan', '3'),
(5, '5', 'Teknik dan Bisnis Sepeda Motor', '3');

-- --------------------------------------------------------

--
-- Table structure for table `tm_program_keahlian`
--

CREATE TABLE IF NOT EXISTS `tm_program_keahlian` (
`id` int(10) unsigned NOT NULL,
  `kode` varchar(5) DEFAULT NULL,
  `program_keahlian` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_program_keahlian`
--

INSERT INTO `tm_program_keahlian` (`id`, `kode`, `program_keahlian`) VALUES
(1, '1', 'Teknik Ketenagalistrikan'),
(2, '2', 'Teknik Mesin'),
(3, '3', 'Teknik Otomotif'),
(4, '4', 'Teknik Komputer dan Informatika');

-- --------------------------------------------------------

--
-- Table structure for table `tr_sebagai`
--

CREATE TABLE IF NOT EXISTS `tr_sebagai` (
`id_sebagai` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_sebagai`
--

INSERT INTO `tr_sebagai` (`id_sebagai`, `nama`) VALUES
(1, 'Peserta'),
(2, 'Panitia');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `data_nilainonteknik`
--
ALTER TABLE `data_nilainonteknik`
 ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`);

--
-- Indexes for table `data_nilaiteknik`
--
ALTER TABLE `data_nilaiteknik`
 ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`);

--
-- Indexes for table `data_sertifikat`
--
ALTER TABLE `data_sertifikat`
 ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`);

--
-- Indexes for table `main_level`
--
ALTER TABLE `main_level`
 ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `main_log`
--
ALTER TABLE `main_log`
 ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `main_menu`
--
ALTER TABLE `main_menu`
 ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `temp_element`
--
ALTER TABLE `temp_element`
 ADD PRIMARY KEY (`id_element`);

--
-- Indexes for table `temp_sertifikat`
--
ALTER TABLE `temp_sertifikat`
 ADD PRIMARY KEY (`id_temp`);

--
-- Indexes for table `tm_aspek`
--
ALTER TABLE `tm_aspek`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tm_kelas`
--
ALTER TABLE `tm_kelas`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tm_kompetensi_keahlian`
--
ALTER TABLE `tm_kompetensi_keahlian`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tm_program_keahlian`
--
ALTER TABLE `tm_program_keahlian`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tr_sebagai`
--
ALTER TABLE `tr_sebagai`
 ADD PRIMARY KEY (`id_sebagai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id_admin` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=129;
--
-- AUTO_INCREMENT for table `data_nilainonteknik`
--
ALTER TABLE `data_nilainonteknik`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `data_nilaiteknik`
--
ALTER TABLE `data_nilaiteknik`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `data_sertifikat`
--
ALTER TABLE `data_sertifikat`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=196;
--
-- AUTO_INCREMENT for table `main_level`
--
ALTER TABLE `main_level`
MODIFY `id_level` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `main_log`
--
ALTER TABLE `main_log`
MODIFY `id_log` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=128;
--
-- AUTO_INCREMENT for table `main_menu`
--
ALTER TABLE `main_menu`
MODIFY `id_menu` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `temp_element`
--
ALTER TABLE `temp_element`
MODIFY `id_element` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `temp_sertifikat`
--
ALTER TABLE `temp_sertifikat`
MODIFY `id_temp` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tm_aspek`
--
ALTER TABLE `tm_aspek`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `tm_kelas`
--
ALTER TABLE `tm_kelas`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tm_kompetensi_keahlian`
--
ALTER TABLE `tm_kompetensi_keahlian`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tm_program_keahlian`
--
ALTER TABLE `tm_program_keahlian`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tr_sebagai`
--
ALTER TABLE `tr_sebagai`
MODIFY `id_sebagai` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
