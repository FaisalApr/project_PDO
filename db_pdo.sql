-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 05 Jul 2019 pada 03.57
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pdo`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absen_leader`
--

CREATE TABLE `absen_leader` (
  `id` int(11) NOT NULL,
  `id_pdo` int(11) NOT NULL,
  `item` varchar(250) NOT NULL,
  `qty` int(11) NOT NULL,
  `jam` double NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `absen_pegawai`
--

CREATE TABLE `absen_pegawai` (
  `id` int(11) NOT NULL,
  `id_pdo` int(11) NOT NULL,
  `item` varchar(200) NOT NULL,
  `qty` int(11) NOT NULL,
  `jam` double NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `assembly`
--

CREATE TABLE `assembly` (
  `id` int(11) NOT NULL,
  `kode_assy` varchar(50) NOT NULL,
  `umh` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `assembly`
--

INSERT INTO `assembly` (`id`, `kode_assy`, `umh`) VALUES
(6, '58860', 3.1746),
(7, '58880', 2.9967),
(9, '58A30', 3.0555),
(11, '58A20', 2.915),
(14, '58890', 3.1325),
(15, 'asd', 123);

-- --------------------------------------------------------

--
-- Struktur dari tabel `build_assy`
--

CREATE TABLE `build_assy` (
  `id` int(11) NOT NULL,
  `id_outputcontrol` int(11) NOT NULL,
  `id_pdo` int(11) NOT NULL,
  `id_assy` int(11) NOT NULL,
  `actual` int(11) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `build_assy`
--

INSERT INTO `build_assy` (`id`, `id_outputcontrol`, `id_pdo`, `id_assy`, `actual`, `time`) VALUES
(140, 81, 107, 6, 21, '2019-07-05 10:19:17'),
(141, 82, 107, 6, 21, '2019-07-05 10:21:02'),
(142, 83, 107, 11, 20, '2019-07-05 10:21:28'),
(143, 84, 107, 14, 14, '2019-07-05 10:21:54'),
(144, 85, 107, 14, 15, '2019-07-05 10:22:15'),
(145, 86, 107, 14, 21, '2019-07-05 10:22:37'),
(146, 87, 107, 14, 15, '2019-07-05 10:22:54'),
(147, 88, 107, 9, 14, '2019-07-05 10:23:14'),
(148, 89, 107, 9, 6, '2019-07-05 10:24:03'),
(149, 90, 108, 6, 13, '2019-07-01 12:49:30'),
(150, 91, 108, 6, 16, '2019-07-01 12:50:02'),
(151, 92, 108, 7, 14, '2019-07-01 12:51:16'),
(152, 93, 108, 7, 22, '2019-07-01 12:51:34'),
(153, 94, 108, 7, 19, '2019-07-01 12:51:51'),
(154, 95, 108, 11, 15, '2019-07-01 12:52:19'),
(155, 96, 108, 11, 16, '2019-07-01 12:53:26'),
(156, 97, 108, 11, 14, '2019-07-01 12:53:49'),
(157, 98, 109, 7, 14, '2019-07-02 12:58:33'),
(158, 99, 109, 7, 15, '2019-07-02 12:58:51'),
(159, 100, 109, 7, 18, '2019-07-02 12:59:58'),
(160, 101, 109, 14, 21, '2019-07-02 13:01:02'),
(161, 102, 109, 14, 23, '2019-07-02 13:01:53'),
(162, 103, 109, 9, 20, '2019-07-02 13:03:01'),
(163, 103, 109, 7, 0, '2019-07-02 13:07:26'),
(164, 104, 109, 9, 16, '2019-07-02 13:12:07'),
(165, 105, 109, 9, 12, '2019-07-02 13:13:01'),
(166, 106, 109, 6, 17, '2019-07-02 13:14:19'),
(167, 107, 109, 6, 14, '2019-07-02 13:15:13'),
(168, 108, 110, 6, 13, '2019-07-03 13:58:37'),
(169, 109, 110, 6, 14, '2019-07-03 13:58:50'),
(170, 110, 110, 6, 13, '2019-07-03 13:59:02'),
(171, 111, 110, 6, 15, '2019-07-03 13:59:15'),
(172, 112, 110, 6, 13, '2019-07-03 13:59:28'),
(173, 113, 110, 6, 16, '2019-07-03 13:59:44'),
(174, 114, 110, 6, 16, '2019-07-03 13:59:59'),
(175, 115, 110, 14, 24, '2019-07-03 14:00:15'),
(176, 116, 111, 7, 15, '2019-07-04 14:04:21'),
(177, 117, 111, 7, 16, '2019-07-04 14:04:29'),
(178, 118, 111, 7, 14, '2019-07-04 14:04:38'),
(179, 119, 111, 7, 16, '2019-07-04 14:04:49'),
(180, 120, 111, 7, 19, '2019-07-04 14:05:23'),
(181, 121, 111, 7, 20, '2019-07-04 14:05:35'),
(182, 122, 111, 7, 16, '2019-07-04 14:05:46'),
(183, 123, 111, 7, 19, '2019-07-04 14:06:00'),
(184, 124, 112, 7, 23, '2019-07-04 15:49:37'),
(185, 125, 112, 7, 13, '2019-07-04 15:49:48'),
(186, 126, 112, 7, 18, '2019-07-04 15:50:33'),
(187, 127, 112, 7, 16, '2019-07-04 15:50:47'),
(188, 128, 112, 7, 14, '2019-07-04 15:51:06'),
(189, 129, 112, 7, 15, '2019-07-04 15:51:23'),
(190, 130, 112, 7, 17, '2019-07-04 15:51:40'),
(191, 131, 112, 7, 21, '2019-07-04 15:51:56'),
(192, 132, 113, 7, 20, '2019-07-05 15:57:53'),
(193, 133, 113, 7, 20, '2019-07-05 15:58:03'),
(194, 134, 113, 7, 20, '2019-07-05 15:58:14'),
(195, 135, 113, 7, 20, '2019-07-05 15:58:24'),
(196, 136, 113, 7, 20, '2019-07-05 15:58:36'),
(197, 137, 113, 7, 15, '2019-07-05 16:01:04'),
(198, 138, 113, 7, 16, '2019-07-05 16:04:25'),
(199, 139, 113, 7, 10, '2019-07-05 16:04:53'),
(200, 140, 114, 7, 17, '2019-07-06 06:13:33'),
(201, 141, 115, 7, 18, '2019-07-03 16:18:52'),
(202, 142, 115, 7, 18, '2019-07-03 16:19:02'),
(203, 143, 115, 7, 18, '2019-07-03 16:19:14'),
(204, 144, 115, 7, 18, '2019-07-03 16:19:25'),
(205, 145, 115, 7, 18, '2019-07-03 16:19:37'),
(206, 146, 115, 7, 18, '2019-07-03 16:19:48'),
(207, 147, 115, 7, 18, '2019-07-03 16:20:00'),
(208, 148, 115, 7, 18, '2019-07-03 16:20:14'),
(209, 149, 116, 7, 16, '2019-07-02 16:22:31'),
(210, 150, 116, 7, 16, '2019-07-02 16:22:41'),
(211, 151, 116, 7, 16, '2019-07-02 16:22:51'),
(212, 152, 116, 7, 16, '2019-07-02 16:23:01'),
(213, 153, 116, 7, 16, '2019-07-02 16:23:13'),
(214, 154, 116, 7, 18, '2019-07-02 16:23:26'),
(215, 155, 116, 7, 17, '2019-07-02 16:23:38'),
(216, 156, 116, 7, 19, '2019-07-02 16:23:49'),
(217, 157, 117, 7, 17, '2019-07-01 16:26:11'),
(218, 158, 117, 7, 17, '2019-07-01 16:26:22'),
(219, 159, 117, 7, 18, '2019-07-01 16:26:33'),
(220, 160, 117, 7, 18, '2019-07-01 16:26:46'),
(221, 161, 117, 7, 18, '2019-07-01 16:26:56'),
(222, 162, 117, 7, 18, '2019-07-01 16:27:10'),
(223, 163, 117, 7, 18, '2019-07-01 16:27:23'),
(224, 164, 117, 7, 10, '2019-07-01 16:27:33');

--
-- Trigger `build_assy`
--
DELIMITER $$
CREATE TRIGGER `updt_act` AFTER UPDATE ON `build_assy` FOR EACH ROW BEGIN
	UPDATE output_control SET actual=(SELECT sum(actual) FROM build_assy WHERE id_outputcontrol=NEW.id_outputcontrol)
    WHERE id=NEW.id_outputcontrol;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `direct_labor`
--

CREATE TABLE `direct_labor` (
  `id` int(11) NOT NULL,
  `id_pdo` int(11) NOT NULL,
  `std_dl` int(11) NOT NULL,
  `reg_dl` int(11) NOT NULL,
  `jam_reg` int(11) NOT NULL,
  `jam_ot` int(11) NOT NULL,
  `dl_ot` int(11) NOT NULL,
  `mh_reg` int(11) NOT NULL,
  `mh_ot` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `direct_labor`
--

INSERT INTO `direct_labor` (`id`, `id_pdo`, `std_dl`, `reg_dl`, `jam_reg`, `jam_ot`, `dl_ot`, `mh_reg`, `mh_ot`, `total`) VALUES
(26, 107, 57, 57, 8, 1, 57, 456, 57, 513),
(27, 108, 57, 55, 8, 0, 0, 440, 0, 440),
(28, 109, 57, 57, 8, 2, 57, 456, 114, 570),
(29, 110, 57, 56, 8, 0, 0, 448, 0, 448),
(30, 111, 56, 56, 8, 0, 0, 448, 0, 448),
(31, 112, 56, 56, 8, 0, 0, 448, 0, 448),
(32, 113, 56, 56, 8, 0, 0, 448, 0, 448),
(33, 114, 56, 56, 8, 0, 0, 448, 0, 448),
(34, 115, 57, 57, 8, 0, 0, 456, 0, 456),
(35, 116, 56, 56, 8, 0, 0, 448, 0, 448),
(36, 117, 58, 58, 8, 0, 0, 464, 0, 464),
(37, 118, 57, 57, 8, 0, 0, 456, 0, 456);

-- --------------------------------------------------------

--
-- Struktur dari tabel `history_pdo`
--

CREATE TABLE `history_pdo` (
  `id` int(11) NOT NULL,
  `data_old` text NOT NULL,
  `data_new` text NOT NULL,
  `waktu` datetime NOT NULL,
  `signature` varchar(255) NOT NULL,
  `id_spv` int(11) NOT NULL,
  `id_pdo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `indirect_activity`
--

CREATE TABLE `indirect_activity` (
  `id` int(11) NOT NULL,
  `id_pdo` int(11) NOT NULL,
  `item` varchar(250) NOT NULL,
  `qty_mp` int(11) NOT NULL,
  `menit` int(11) NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `indirect_activity`
--

INSERT INTO `indirect_activity` (`id`, `id_pdo`, `item`, `qty_mp`, `menit`, `total`) VALUES
(39, 107, '5S + Yoidon', 57, 4, 3.8),
(40, 107, 'Home Position', 57, 4, 3.8),
(41, 107, 'Senam Pagi', 57, 10, 9.5),
(42, 108, '5S + Yoidon', 55, 6, 5.5),
(43, 108, 'Home Position', 55, 2, 1.83333),
(44, 109, '5S + Yoidon', 57, 4, 3.8),
(45, 109, 'Home Position', 57, 4, 3.8),
(46, 110, '5S + Yoidon', 56, 4, 3.73333),
(47, 110, 'Home Position', 56, 3, 2.8),
(48, 111, '5S + Yoidon', 56, 2, 1.86667),
(49, 111, 'Home Position', 56, 4, 3.73333),
(50, 112, '5S + Yoidon', 56, 3, 2.8),
(51, 112, 'Home Position', 56, 2, 1.86667),
(52, 113, '5S + Yoidon', 56, 3, 2.8),
(53, 113, 'Home Position', 56, 3, 2.8),
(54, 114, '5S + Yoidon', 56, 4, 3.73333),
(55, 114, 'Home Position', 56, 2, 1.86667),
(56, 115, '5S + Yoidon', 57, 4, 3.8),
(57, 115, 'Home Position', 57, 3, 2.85),
(58, 116, '5S + Yoidon', 56, 3, 2.8),
(59, 116, 'Home Position', 56, 5, 4.66667),
(60, 117, '5S + Yoidon', 58, 10, 9.66667),
(61, 117, 'Home Position', 58, 4, 3.86667),
(62, 118, '5S + Yoidon', 57, 2, 1.9),
(63, 118, 'Home Position', 57, 2, 1.9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `indirect_labor`
--

CREATE TABLE `indirect_labor` (
  `id` int(11) NOT NULL,
  `id_pdo` int(11) NOT NULL,
  `std_idl` int(11) NOT NULL,
  `reg_idl` int(11) NOT NULL,
  `jam_reg` int(11) NOT NULL,
  `jam_ot` int(11) NOT NULL,
  `dl_ot` int(11) NOT NULL,
  `mh_reg` int(11) NOT NULL,
  `mh_ot` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `indirect_labor`
--

INSERT INTO `indirect_labor` (`id`, `id_pdo`, `std_idl`, `reg_idl`, `jam_reg`, `jam_ot`, `dl_ot`, `mh_reg`, `mh_ot`, `total`) VALUES
(26, 107, 2, 2, 8, 1, 2, 16, 2, 18),
(27, 108, 3, 2, 8, 0, 2, 16, 0, 16),
(28, 109, 2, 2, 8, 2, 2, 16, 4, 20),
(29, 110, 2, 2, 8, 0, 0, 16, 0, 16),
(30, 111, 2, 2, 8, 2, 2, 16, 4, 20),
(31, 112, 2, 2, 8, 2, 2, 16, 4, 20),
(32, 113, 2, 2, 8, 0, 0, 16, 0, 16),
(33, 114, 2, 2, 8, 0, 0, 16, 0, 16),
(34, 115, 3, 3, 8, 0, 0, 24, 0, 24),
(35, 116, 3, 3, 8, 0, 0, 24, 0, 24),
(36, 117, 3, 3, 8, 0, 0, 24, 0, 24),
(37, 118, 3, 3, 8, 0, 0, 24, 0, 24);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_deffect`
--

CREATE TABLE `jenis_deffect` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `keterangan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_deffect`
--

INSERT INTO `jenis_deffect` (`id`, `code`, `keterangan`) VALUES
(3, 'CROSS CCT', 'CROSS CIRCUIT'),
(7, 'MISS PARTS', 'MISSING PARTS'),
(8, 'DMG PARTS', 'DAMAGED PARTS'),
(9, 'OTHERS ', 'LAIN-LAIN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_error`
--

CREATE TABLE `jenis_error` (
  `id` int(11) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `keterangan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_error`
--

INSERT INTO `jenis_error` (`id`, `kode`, `keterangan`) VALUES
(2, '1A', '4M (MANPOWER BARU)'),
(3, '1B', '4M (PENGGANTI MP ABSEN)'),
(4, '1C', 'BELUM CUTTING / OP RUMP UP (<3 BULAN)'),
(5, '1D', 'BELUM CUTTING  / OP RUMP UP (>3 BULAN)'),
(6, '1E', 'PROSES PENGERJAAN KANBAN TIDAK FIFO'),
(7, '1F', 'BELUM PROSES MANUAL TWIST'),
(8, '1G', 'BELUM PROSES MANUAL SHIELD'),
(9, '1H', 'BELUM PROSES MANUAL BONDER'),
(10, '1I', 'BELUM PROSES MANUAL RAYCAM'),
(11, '1J', 'BELUM PROSES MANUAL JOINT'),
(12, '1K', 'BELUM PROSES MANUAL CRIMPING');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_losttime`
--

CREATE TABLE `jenis_losttime` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_losttime`
--

INSERT INTO `jenis_losttime` (`id`, `keterangan`) VALUES
(1, 'Losstime'),
(2, 'Exclude');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_regulasi`
--

CREATE TABLE `jenis_regulasi` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_regulasi`
--

INSERT INTO `jenis_regulasi` (`id`, `keterangan`) VALUES
(1, 'IN'),
(2, 'OUT');

-- --------------------------------------------------------

--
-- Struktur dari tabel `line`
--

CREATE TABLE `line` (
  `id` int(11) NOT NULL,
  `id_supervisor` int(11) NOT NULL,
  `nama_line` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `line`
--

INSERT INTO `line` (`id`, `id_supervisor`, `nama_line`) VALUES
(5, 1, '12A'),
(6, 1, '12B'),
(7, 2, '1A'),
(8, 2, '1B');

-- --------------------------------------------------------

--
-- Struktur dari tabel `line_manager`
--

CREATE TABLE `line_manager` (
  `id` int(11) NOT NULL,
  `id_line` int(11) NOT NULL,
  `id_assy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lost_time`
--

CREATE TABLE `lost_time` (
  `id` int(11) NOT NULL,
  `id_pdo` int(11) NOT NULL,
  `id_error` int(11) NOT NULL,
  `id_oc` int(11) NOT NULL,
  `id_jenisloss` int(11) NOT NULL,
  `keterangan` varchar(250) NOT NULL,
  `durasi` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lost_time`
--

INSERT INTO `lost_time` (`id`, `id_pdo`, `id_error`, `id_oc`, `id_jenisloss`, `keterangan`, `durasi`) VALUES
(17, 107, 7, 81, 1, 'aajjjk MTE', 1.8),
(18, 108, 3, 91, 1, 'POPm', 3.5),
(19, 109, 3, 99, 1, 'MOVEe', 1.8),
(20, 109, 8, 100, 1, 'Klokkk', 1.8),
(21, 117, 10, 164, 1, 'POOKNN', 5.9),
(22, 117, 3, 164, 1, 'hhjbb', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `main_pdo`
--

CREATE TABLE `main_pdo` (
  `id` int(11) NOT NULL,
  `id_shift` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_line` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `mh_out` double DEFAULT NULL,
  `mh_in_dl` double DEFAULT NULL,
  `mh_in_idl` double DEFAULT NULL,
  `direct_eff` double DEFAULT NULL,
  `total_productiv` double DEFAULT NULL,
  `jam_kerja` int(11) DEFAULT NULL,
  `line_speed` int(11) DEFAULT NULL,
  `loss_output` double DEFAULT NULL,
  `p_loss_time` double DEFAULT NULL,
  `jam_effective` double DEFAULT NULL,
  `dpm_fa` double DEFAULT NULL,
  `status` int(11) NOT NULL,
  `signature` varchar(255) DEFAULT NULL,
  `waktu` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `main_pdo`
--

INSERT INTO `main_pdo` (`id`, `id_shift`, `id_users`, `id_line`, `tanggal`, `mh_out`, `mh_in_dl`, `mh_in_idl`, `direct_eff`, `total_productiv`, `jam_kerja`, `line_speed`, `loss_output`, `p_loss_time`, `jam_effective`, `dpm_fa`, `status`, `signature`, `waktu`) VALUES
(107, 1, 6, 8, '2019-07-05 10:17:50', 456.35569071769714, 495.90000009536743, 18, 92.025749270001, 88.802430557114, 9, 108, 0, 0.3448275862068966, 8.7, 0, 1, 'image-signature/20190705-111026_img.png', '2019-07-05 11:10:26'),
(108, 1, 6, 8, '2019-07-01 12:49:13', 388.05689764022827, 432.66666662693024, 16, 89.689575734022, 86.491136183045, 8, 104, 0, 0.741525423697393, 7.8667, 0, 1, 'image-signature/20190701-125557_img.png', '2019-07-01 12:55:57'),
(109, 1, 6, 8, '2019-07-02 12:58:22', 523.7514972686768, 562.4000000953674, 20, 93.127933353461, 89.929858719594, 10, 106, 4, 0.6081081080875639, 9.8667, 0, 1, 'image-signature/20190702-131754_img.png', '2019-07-02 13:17:54'),
(110, 1, 6, 8, '2019-07-03 13:19:16', 392.6399869918823, 441.4666666984558, 16, 88.939894359017, 85.829201464135, 8, 104, 0, 0, 7.8833, 0, 1, 'image-signature/20190703-140037_img.png', '2019-07-03 14:00:37'),
(111, 1, 6, 8, '2019-07-04 14:04:02', 404.55450654029846, 442.39999997615814, 20, 91.445412875701, 87.490161453538, 8, 104, 0, 0, 7.9, 0, 0, NULL, NULL),
(112, 2, 7, 8, '2019-07-04 15:49:23', 410.5479066371918, 443.33333337306976, 20, 92.604790962495, 88.607461856543, 8, 105, 0, 0, 7.9167, 0, 1, 'image-signature/20190704-155353_img.png', '2019-07-04 15:53:53'),
(113, 2, 7, 8, '2019-07-05 15:57:41', 422.5347068309784, 442.40000009536743, 16, 95.509653422218, 92.175983146395, 8, 108, 4, 0, 7.9, 0, 0, NULL, NULL),
(114, 1, 6, 8, '2019-07-06 06:13:19', 50.94390082359314, 442.39999997615814, 16, 11.515348288051, 11.113416410611, 8, 104, 0, 0, 7.9, 117647.058, 0, NULL, NULL),
(115, 2, 7, 8, '2019-07-03 16:18:34', 431.52480697631836, 449.35000014305115, 24, 96.033116020684, 91.164002713828, 8, 104, 0, 0, 7.8833, 0, 1, 'image-signature/20190703-162101_img.png', '2019-07-03 16:21:01'),
(116, 2, 7, 8, '2019-07-02 16:22:20', 401.5578064918518, 440.53333353996277, 24, 91.152649735965, 86.443270589818, 8, 104, 0, 0, 7.8667, 0, 1, 'image-signature/20190702-162448_img.png', '2019-07-02 16:24:48'),
(117, 2, 7, 8, '2019-07-01 16:25:58', 401.5578064918518, 450.46666646003723, 24, 89.14262394762, 84.633512716045, 8, 104, 1, 2.553648068559929, 7.7667, 22388.059, 1, 'image-signature/20190701-163051_img.png', '2019-07-01 16:30:51'),
(118, 1, 6, 8, '2019-07-07 06:02:12', NULL, NULL, NULL, 0, NULL, 8, 104, NULL, NULL, NULL, NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `output_control`
--

CREATE TABLE `output_control` (
  `id` int(11) NOT NULL,
  `id_pdo` int(11) NOT NULL,
  `plan` int(11) NOT NULL,
  `actual` int(11) NOT NULL,
  `jam_ke` int(11) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `output_control`
--

INSERT INTO `output_control` (`id`, `id_pdo`, `plan`, `actual`, `jam_ke`, `time`) VALUES
(81, 107, 22, 21, 1, '2019-07-05 10:18:06'),
(82, 107, 20, 21, 2, '2019-07-05 10:21:00'),
(83, 107, 15, 20, 3, '2019-07-05 10:21:18'),
(84, 107, 14, 14, 4, '2019-07-05 10:21:49'),
(85, 107, 14, 15, 5, '2019-07-05 10:22:12'),
(86, 107, 21, 21, 6, '2019-07-05 10:22:33'),
(87, 107, 13, 15, 7, '2019-07-05 10:22:52'),
(88, 107, 14, 14, 8, '2019-07-05 10:23:10'),
(89, 107, 5, 6, 9, '2019-07-05 10:23:42'),
(90, 108, 12, 13, 1, '2019-07-01 12:49:25'),
(91, 108, 18, 16, 2, '2019-07-01 12:49:58'),
(92, 108, 13, 14, 3, '2019-07-01 12:51:11'),
(93, 108, 21, 22, 4, '2019-07-01 12:51:30'),
(94, 108, 18, 19, 5, '2019-07-01 12:51:47'),
(95, 108, 14, 15, 6, '2019-07-01 12:52:14'),
(96, 108, 16, 16, 7, '2019-07-01 12:53:22'),
(97, 108, 14, 14, 8, '2019-07-01 12:53:44'),
(98, 109, 14, 14, 1, '2019-07-02 12:58:28'),
(99, 109, 16, 15, 2, '2019-07-02 12:58:48'),
(100, 109, 19, 18, 3, '2019-07-02 12:59:53'),
(101, 109, 20, 21, 4, '2019-07-02 13:00:57'),
(102, 109, 23, 23, 5, '2019-07-02 13:01:49'),
(103, 109, 26, 20, 6, '2019-07-02 13:02:56'),
(104, 109, 15, 16, 7, '2019-07-02 13:11:32'),
(105, 109, 12, 12, 8, '2019-07-02 13:12:50'),
(106, 109, 16, 17, 9, '2019-07-02 13:14:08'),
(107, 109, 13, 14, 10, '2019-07-02 13:15:08'),
(108, 110, 13, 13, 1, '2019-07-03 13:58:30'),
(109, 110, 14, 14, 2, '2019-07-03 13:58:48'),
(110, 110, 12, 13, 3, '2019-07-03 13:59:00'),
(111, 110, 14, 15, 4, '2019-07-03 13:59:13'),
(112, 110, 12, 13, 5, '2019-07-03 13:59:26'),
(113, 110, 14, 16, 6, '2019-07-03 13:59:41'),
(114, 110, 15, 16, 7, '2019-07-03 13:59:57'),
(115, 110, 16, 24, 8, '2019-07-03 14:00:11'),
(116, 111, 12, 15, 1, '2019-07-04 14:04:16'),
(117, 111, 12, 16, 2, '2019-07-04 14:04:27'),
(118, 111, 12, 14, 3, '2019-07-04 14:04:36'),
(119, 111, 12, 16, 4, '2019-07-04 14:04:46'),
(120, 111, 15, 19, 5, '2019-07-04 14:05:21'),
(121, 111, 15, 20, 6, '2019-07-04 14:05:33'),
(122, 111, 15, 16, 7, '2019-07-04 14:05:43'),
(123, 111, 15, 19, 8, '2019-07-04 14:05:58'),
(124, 112, 22, 23, 1, '2019-07-04 15:49:33'),
(125, 112, 12, 13, 2, '2019-07-04 15:49:45'),
(126, 112, 18, 18, 3, '2019-07-04 15:50:30'),
(127, 112, 16, 16, 4, '2019-07-04 15:50:45'),
(128, 112, 13, 14, 5, '2019-07-04 15:51:03'),
(129, 112, 14, 15, 6, '2019-07-04 15:51:20'),
(130, 112, 16, 17, 7, '2019-07-04 15:51:35'),
(131, 112, 19, 21, 8, '2019-07-04 15:51:53'),
(132, 113, 20, 20, 1, '2019-07-05 15:57:49'),
(133, 113, 20, 20, 2, '2019-07-05 15:58:01'),
(134, 113, 20, 20, 3, '2019-07-05 15:58:12'),
(135, 113, 20, 20, 4, '2019-07-05 15:58:22'),
(136, 113, 20, 20, 5, '2019-07-05 15:58:33'),
(137, 113, 15, 15, 6, '2019-07-05 16:01:02'),
(138, 113, 15, 16, 7, '2019-07-05 16:04:02'),
(139, 113, 10, 10, 8, '2019-07-05 16:04:38'),
(140, 114, 17, 17, 1, '2019-07-06 06:13:29'),
(141, 115, 18, 18, 1, '2019-07-03 16:18:49'),
(142, 115, 18, 18, 2, '2019-07-03 16:19:00'),
(143, 115, 18, 18, 3, '2019-07-03 16:19:12'),
(144, 115, 18, 18, 4, '2019-07-03 16:19:23'),
(145, 115, 18, 18, 5, '2019-07-03 16:19:34'),
(146, 115, 18, 18, 6, '2019-07-03 16:19:46'),
(147, 115, 18, 18, 7, '2019-07-03 16:19:57'),
(148, 115, 18, 18, 8, '2019-07-03 16:20:10'),
(149, 116, 16, 16, 1, '2019-07-02 16:22:27'),
(150, 116, 16, 16, 2, '2019-07-02 16:22:38'),
(151, 116, 16, 16, 3, '2019-07-02 16:22:49'),
(152, 116, 16, 16, 4, '2019-07-02 16:22:59'),
(153, 116, 16, 16, 5, '2019-07-02 16:23:11'),
(154, 116, 16, 18, 6, '2019-07-02 16:23:22'),
(155, 116, 16, 17, 7, '2019-07-02 16:23:35'),
(156, 116, 16, 19, 8, '2019-07-02 16:23:47'),
(157, 117, 17, 17, 1, '2019-07-01 16:26:07'),
(158, 117, 17, 17, 2, '2019-07-01 16:26:19'),
(159, 117, 17, 18, 3, '2019-07-01 16:26:31'),
(160, 117, 17, 18, 4, '2019-07-01 16:26:44'),
(161, 117, 17, 18, 5, '2019-07-01 16:26:53'),
(162, 117, 16, 18, 6, '2019-07-01 16:27:08'),
(163, 117, 17, 18, 7, '2019-07-01 16:27:21'),
(164, 117, 17, 10, 8, '2019-07-01 16:27:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `quality_control`
--

CREATE TABLE `quality_control` (
  `id` int(11) NOT NULL,
  `id_pdo` int(11) NOT NULL,
  `id_oc` int(11) NOT NULL,
  `id_jenisdeffect` int(11) NOT NULL,
  `keterangan` varchar(250) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `quality_control`
--

INSERT INTO `quality_control` (`id`, `id_pdo`, `id_oc`, `id_jenisdeffect`, `keterangan`, `total`) VALUES
(5, 117, 164, 3, 'yuuu', 1),
(6, 114, 140, 8, 'aaa Crosss', 1),
(7, 114, 140, 7, 'misss par', 1),
(8, 114, 140, 8, 'rusak', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `regulasi`
--

CREATE TABLE `regulasi` (
  `id` int(11) NOT NULL,
  `id_pdo` int(11) NOT NULL,
  `id_jenisreg` int(11) NOT NULL,
  `id_oc` int(11) NOT NULL,
  `posisi` varchar(250) NOT NULL,
  `qty` int(11) NOT NULL,
  `jam` double NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `shift`
--

CREATE TABLE `shift` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `shift`
--

INSERT INTO `shift` (`id`, `keterangan`) VALUES
(1, 'A'),
(2, 'B');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supervisor`
--

CREATE TABLE `supervisor` (
  `id` int(11) NOT NULL,
  `nik` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `passcode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `supervisor`
--

INSERT INTO `supervisor` (`id`, `nik`, `nama`, `passcode`) VALUES
(1, 900001, 'Rasyidi', 123456),
(2, 900002, 'Rasyida', 654321);

-- --------------------------------------------------------

--
-- Struktur dari tabel `target`
--

CREATE TABLE `target` (
  `id` int(11) NOT NULL,
  `id_line` int(11) NOT NULL,
  `mh_out` double NOT NULL,
  `mh_in` double NOT NULL,
  `efisiensi` double NOT NULL,
  `plan_assy` double NOT NULL,
  `periode` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `target`
--

INSERT INTO `target` (`id`, `id_line`, `mh_out`, `mh_in`, `efisiensi`, `plan_assy`, `periode`) VALUES
(7, 8, 480, 540, 99, 244, '2019-07-05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `level` int(11) NOT NULL,
  `id_shift` int(11) NOT NULL,
  `id_line` int(11) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `level`, `id_shift`, `id_line`, `active`) VALUES
(5, 'user1', 'user1', 2, 2, 5, 1),
(6, 'a1', 'a', 1, 1, 8, 1),
(7, 'a2', 'a', 2, 2, 8, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absen_leader`
--
ALTER TABLE `absen_leader`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idindirectlabor` (`id_pdo`);

--
-- Indeks untuk tabel `absen_pegawai`
--
ALTER TABLE `absen_pegawai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_absenpeg_directlabor` (`id_pdo`);

--
-- Indeks untuk tabel `assembly`
--
ALTER TABLE `assembly`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `build_assy`
--
ALTER TABLE `build_assy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idassy_tblassembly` (`id_assy`),
  ADD KEY `fk_idoc_tblOc` (`id_outputcontrol`),
  ADD KEY `fk_pdo_tblPDO` (`id_pdo`);

--
-- Indeks untuk tabel `direct_labor`
--
ALTER TABLE `direct_labor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pdo` (`id_pdo`);

--
-- Indeks untuk tabel `history_pdo`
--
ALTER TABLE `history_pdo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pdoid` (`id_pdo`);

--
-- Indeks untuk tabel `indirect_activity`
--
ALTER TABLE `indirect_activity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_indirectactivity_directlabor` (`id_pdo`);

--
-- Indeks untuk tabel `indirect_labor`
--
ALTER TABLE `indirect_labor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pdo_indirect` (`id_pdo`);

--
-- Indeks untuk tabel `jenis_deffect`
--
ALTER TABLE `jenis_deffect`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis_error`
--
ALTER TABLE `jenis_error`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis_losttime`
--
ALTER TABLE `jenis_losttime`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis_regulasi`
--
ALTER TABLE `jenis_regulasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `line`
--
ALTER TABLE `line`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_supervisor` (`id_supervisor`);

--
-- Indeks untuk tabel `line_manager`
--
ALTER TABLE `line_manager`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_line` (`id_line`),
  ADD KEY `id_assy` (`id_assy`);

--
-- Indeks untuk tabel `lost_time`
--
ALTER TABLE `lost_time`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idjenisloss_tbljenislosstime` (`id_jenisloss`),
  ADD KEY `fk_idpdo_mainpdo` (`id_pdo`),
  ADD KEY `fk_idjeniserror_tbljeniserror` (`id_error`),
  ADD KEY `id_oc` (`id_oc`);

--
-- Indeks untuk tabel `main_pdo`
--
ALTER TABLE `main_pdo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_shift_tbl_shift` (`id_shift`),
  ADD KEY `fk_users` (`id_users`),
  ADD KEY `fk_line` (`id_line`);

--
-- Indeks untuk tabel `output_control`
--
ALTER TABLE `output_control`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idpdo_tblmainpdo` (`id_pdo`);

--
-- Indeks untuk tabel `quality_control`
--
ALTER TABLE `quality_control`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_jenisdeffect` (`id_jenisdeffect`),
  ADD KEY `fk_idpdo` (`id_pdo`),
  ADD KEY `fk_oc_outputcontrol` (`id_oc`);

--
-- Indeks untuk tabel `regulasi`
--
ALTER TABLE `regulasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_regulasijenis_jenis` (`id_jenisreg`),
  ADD KEY `fk_iddirectlabor_labor` (`id_pdo`),
  ADD KEY `id_oc` (`id_oc`);

--
-- Indeks untuk tabel `shift`
--
ALTER TABLE `shift`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `supervisor`
--
ALTER TABLE `supervisor`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `target`
--
ALTER TABLE `target`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_line_tbl_line` (`id_line`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_shift_tblshift` (`id_shift`),
  ADD KEY `fk_line_tblline` (`id_line`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absen_leader`
--
ALTER TABLE `absen_leader`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `absen_pegawai`
--
ALTER TABLE `absen_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `assembly`
--
ALTER TABLE `assembly`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `build_assy`
--
ALTER TABLE `build_assy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;

--
-- AUTO_INCREMENT untuk tabel `direct_labor`
--
ALTER TABLE `direct_labor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `history_pdo`
--
ALTER TABLE `history_pdo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `indirect_activity`
--
ALTER TABLE `indirect_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT untuk tabel `indirect_labor`
--
ALTER TABLE `indirect_labor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `jenis_deffect`
--
ALTER TABLE `jenis_deffect`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `jenis_error`
--
ALTER TABLE `jenis_error`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `jenis_losttime`
--
ALTER TABLE `jenis_losttime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `jenis_regulasi`
--
ALTER TABLE `jenis_regulasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `line`
--
ALTER TABLE `line`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `line_manager`
--
ALTER TABLE `line_manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `lost_time`
--
ALTER TABLE `lost_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `main_pdo`
--
ALTER TABLE `main_pdo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT untuk tabel `output_control`
--
ALTER TABLE `output_control`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT untuk tabel `quality_control`
--
ALTER TABLE `quality_control`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `regulasi`
--
ALTER TABLE `regulasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `shift`
--
ALTER TABLE `shift`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `supervisor`
--
ALTER TABLE `supervisor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `target`
--
ALTER TABLE `target`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `absen_leader`
--
ALTER TABLE `absen_leader`
  ADD CONSTRAINT `fk_idindirectlabor` FOREIGN KEY (`id_pdo`) REFERENCES `main_pdo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `absen_pegawai`
--
ALTER TABLE `absen_pegawai`
  ADD CONSTRAINT `fk_absenpeg_directlabor` FOREIGN KEY (`id_pdo`) REFERENCES `main_pdo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `build_assy`
--
ALTER TABLE `build_assy`
  ADD CONSTRAINT `fk_idassy_tblassembly` FOREIGN KEY (`id_assy`) REFERENCES `assembly` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_idoc_tblOc` FOREIGN KEY (`id_outputcontrol`) REFERENCES `output_control` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pdo_tblPDO` FOREIGN KEY (`id_pdo`) REFERENCES `main_pdo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `direct_labor`
--
ALTER TABLE `direct_labor`
  ADD CONSTRAINT `fk_pdo` FOREIGN KEY (`id_pdo`) REFERENCES `main_pdo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `history_pdo`
--
ALTER TABLE `history_pdo`
  ADD CONSTRAINT `fk_pdoid` FOREIGN KEY (`id_pdo`) REFERENCES `main_pdo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `indirect_activity`
--
ALTER TABLE `indirect_activity`
  ADD CONSTRAINT `fk_indirectactivity_directlabor` FOREIGN KEY (`id_pdo`) REFERENCES `main_pdo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `indirect_labor`
--
ALTER TABLE `indirect_labor`
  ADD CONSTRAINT `fk_pdo_indirect` FOREIGN KEY (`id_pdo`) REFERENCES `main_pdo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `line`
--
ALTER TABLE `line`
  ADD CONSTRAINT `fk_id_spv` FOREIGN KEY (`id_supervisor`) REFERENCES `supervisor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `line_manager`
--
ALTER TABLE `line_manager`
  ADD CONSTRAINT `fk_id_assy` FOREIGN KEY (`id_assy`) REFERENCES `assembly` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_line` FOREIGN KEY (`id_line`) REFERENCES `line` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `lost_time`
--
ALTER TABLE `lost_time`
  ADD CONSTRAINT `fk_idjeniserror_tbljeniserror` FOREIGN KEY (`id_error`) REFERENCES `jenis_error` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_idjenisloss_tbljenislosstime` FOREIGN KEY (`id_jenisloss`) REFERENCES `jenis_losttime` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_idoc_tvloutputcontrol` FOREIGN KEY (`id_oc`) REFERENCES `output_control` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_idpdo_mainpdo` FOREIGN KEY (`id_pdo`) REFERENCES `main_pdo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `main_pdo`
--
ALTER TABLE `main_pdo`
  ADD CONSTRAINT `fk_line` FOREIGN KEY (`id_line`) REFERENCES `line` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_shift_tbl_shift` FOREIGN KEY (`id_shift`) REFERENCES `shift` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_users` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `output_control`
--
ALTER TABLE `output_control`
  ADD CONSTRAINT `fk_idpdo_tblmainpdo` FOREIGN KEY (`id_pdo`) REFERENCES `main_pdo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `quality_control`
--
ALTER TABLE `quality_control`
  ADD CONSTRAINT `fk_idpdo` FOREIGN KEY (`id_pdo`) REFERENCES `main_pdo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_jenisdeffect` FOREIGN KEY (`id_jenisdeffect`) REFERENCES `jenis_deffect` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_oc_outputcontrol` FOREIGN KEY (`id_oc`) REFERENCES `output_control` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `regulasi`
--
ALTER TABLE `regulasi`
  ADD CONSTRAINT `fk_iddirectlabor_labor` FOREIGN KEY (`id_pdo`) REFERENCES `main_pdo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_oc_outputcontrol_` FOREIGN KEY (`id_oc`) REFERENCES `output_control` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_regulasijenis_jenis` FOREIGN KEY (`id_jenisreg`) REFERENCES `jenis_regulasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `target`
--
ALTER TABLE `target`
  ADD CONSTRAINT `fk_line_tbl_line` FOREIGN KEY (`id_line`) REFERENCES `line` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_line_tblline` FOREIGN KEY (`id_line`) REFERENCES `line` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_shift_tblshift` FOREIGN KEY (`id_shift`) REFERENCES `shift` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
