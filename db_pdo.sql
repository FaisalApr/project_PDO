-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2019 at 10:24 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `absen_leader`
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
-- Table structure for table `absen_pegawai`
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
-- Table structure for table `assembly`
--

CREATE TABLE `assembly` (
  `id` int(11) NOT NULL,
  `kode_assy` varchar(50) NOT NULL,
  `umh` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assembly`
--

INSERT INTO `assembly` (`id`, `kode_assy`, `umh`) VALUES
(1162, '58A21', 2.8864),
(1163, '58A21', 2.8864),
(1164, '58A50', 3.5583),
(1165, '58A21', 2.8864),
(1166, '58A50', 3.5583),
(1167, '58A31', 3.0263),
(1168, '58A21', 2.8864),
(1169, '58A50', 3.5583),
(1170, '58A31', 3.0263),
(1171, '50U11', 4.4135),
(1172, '58A21', 2.8864),
(1173, '58A50', 3.5583),
(1174, '58A31', 3.0263),
(1175, '50U11', 4.4135),
(1176, '50T71', 4.2702),
(1177, '58A21', 2.8864),
(1178, '58A50', 3.5583),
(1179, '58A31', 3.0263),
(1180, '50U11', 4.4135),
(1181, '50T71', 4.2702),
(1182, '50V52', 4.7273),
(1183, '58A21', 2.8864),
(1184, '58A50', 3.5583),
(1185, '58A31', 3.0263),
(1186, '50U11', 4.4135),
(1187, '50T71', 4.2702),
(1188, '50V52', 4.7273),
(1189, '58720', 3.2476),
(1190, '58A21', 2.8864),
(1191, '58A50', 3.5583),
(1192, '58A31', 3.0263),
(1193, '50U11', 4.4135),
(1194, '50T71', 4.2702),
(1195, '50V52', 4.7273),
(1196, '58720', 3.2476),
(1197, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `build_assy`
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
-- Triggers `build_assy`
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
-- Table structure for table `direct_labor`
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
-- Dumping data for table `direct_labor`
--

INSERT INTO `direct_labor` (`id`, `id_pdo`, `std_dl`, `reg_dl`, `jam_reg`, `jam_ot`, `dl_ot`, `mh_reg`, `mh_ot`, `total`) VALUES
(39, 120, 30, 30, 8, 0, 0, 240, 0, 240),
(40, 121, 25, 25, 8, 0, 0, 200, 0, 200),
(41, 122, 30, 30, 8, 0, 0, 240, 0, 240),
(42, 123, 40, 40, 8, 0, 0, 320, 0, 320);

-- --------------------------------------------------------

--
-- Table structure for table `history_pdo`
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
-- Table structure for table `indirect_activity`
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
-- Dumping data for table `indirect_activity`
--

INSERT INTO `indirect_activity` (`id`, `id_pdo`, `item`, `qty_mp`, `menit`, `total`) VALUES
(66, 120, '5S + Yoidon', 30, 2, 1),
(67, 120, 'Home Position', 30, 2, 1),
(68, 121, '5S + Yoidon', 25, 2, 0.833333),
(69, 121, 'Home Position', 25, 2, 0.833333),
(70, 122, '5S + Yoidon', 30, 1, 0.5),
(71, 122, 'Home Position', 30, 1, 0.5),
(72, 123, '5S + Yoidon', 40, 2, 1.33333),
(73, 123, 'Home Position', 40, 2, 1.33333);

-- --------------------------------------------------------

--
-- Table structure for table `indirect_labor`
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
-- Dumping data for table `indirect_labor`
--

INSERT INTO `indirect_labor` (`id`, `id_pdo`, `std_idl`, `reg_idl`, `jam_reg`, `jam_ot`, `dl_ot`, `mh_reg`, `mh_ot`, `total`) VALUES
(39, 120, 2, 2, 8, 0, 0, 16, 0, 16),
(40, 121, 4, 4, 8, 0, 0, 32, 0, 32),
(41, 122, 3, 3, 8, 0, 0, 0, 0, 0),
(42, 123, 3, 3, 8, 0, 0, 24, 0, 24);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_deffect`
--

CREATE TABLE `jenis_deffect` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `keterangan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_deffect`
--

INSERT INTO `jenis_deffect` (`id`, `code`, `keterangan`) VALUES
(3, 'CROSS CCT', 'CROSS CIRCUIT'),
(7, 'MISS PARTS', 'MISSING PARTS'),
(8, 'DMG PARTS', 'DAMAGED PARTS'),
(9, 'OTHERS ', 'LAIN-LAIN');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_error`
--

CREATE TABLE `jenis_error` (
  `id` int(11) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `keterangan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_error`
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
-- Table structure for table `jenis_losttime`
--

CREATE TABLE `jenis_losttime` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_losttime`
--

INSERT INTO `jenis_losttime` (`id`, `keterangan`) VALUES
(1, 'Losstime'),
(2, 'Exclude');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_regulasi`
--

CREATE TABLE `jenis_regulasi` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_regulasi`
--

INSERT INTO `jenis_regulasi` (`id`, `keterangan`) VALUES
(1, 'IN'),
(2, 'OUT');

-- --------------------------------------------------------

--
-- Table structure for table `line`
--

CREATE TABLE `line` (
  `id` int(11) NOT NULL,
  `id_sisi` int(11) NOT NULL,
  `nama_line` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `line`
--

INSERT INTO `line` (`id`, `id_sisi`, `nama_line`) VALUES
(9, 1, '1A'),
(10, 2, '11A'),
(11, 1, '1B'),
(12, 1, '1C'),
(13, 1, '1D'),
(14, 1, '1E'),
(15, 1, '1F'),
(16, 1, '1G'),
(17, 1, '1H'),
(18, 1, '1I'),
(19, 1, '1J'),
(20, 2, '12B'),
(21, 2, '12C'),
(22, 2, '12D'),
(23, 2, '12E'),
(24, 2, '12F'),
(25, 2, '12G'),
(26, 2, '12H'),
(27, 2, '12I');

-- --------------------------------------------------------

--
-- Table structure for table `line_manager`
--

CREATE TABLE `line_manager` (
  `id` int(11) NOT NULL,
  `id_line` int(11) NOT NULL,
  `id_assy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lost_time`
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
-- Dumping data for table `lost_time`
--

INSERT INTO `lost_time` (`id`, `id_pdo`, `id_error`, `id_oc`, `id_jenisloss`, `keterangan`, `durasi`) VALUES
(23, 120, 2, 170, 1, 'asd', 1.7),
(24, 122, 2, 175, 1, 'rt', 0),
(25, 122, 5, 176, 1, 'k', 1.75),
(26, 122, 2, 177, 1, 'zero', 0);

-- --------------------------------------------------------

--
-- Table structure for table `main_pdo`
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
-- Dumping data for table `main_pdo`
--

INSERT INTO `main_pdo` (`id`, `id_shift`, `id_users`, `id_line`, `tanggal`, `mh_out`, `mh_in_dl`, `mh_in_idl`, `direct_eff`, `total_productiv`, `jam_kerja`, `line_speed`, `loss_output`, `p_loss_time`, `jam_effective`, `dpm_fa`, `status`, `signature`, `waktu`) VALUES
(120, 1, 8, 9, '2019-07-08 09:53:36', 211.92249941825867, 238, 16, 89.043066982462, 83.434054889078, 8, 100, 0, 0.3571428571128451, 7.9333, 13888.888, 1, NULL, NULL),
(121, 1, 8, 9, '2019-07-09 08:03:57', 174.60299372673035, 198.33333337306976, 32, 88.035122869789, 75.80448351517, 8, 110, 0, 0, 7.9333, 0, 1, NULL, NULL),
(122, 1, 8, 9, '2019-07-10 08:54:56', 287.5685932636261, 239, 0, 120.32158713959, 120.32158713959, 8, 105, 0, 0.36610878659556034, 7.9667, 10526.315, 1, NULL, NULL),
(123, 1, 8, 9, '2019-07-11 09:53:21', NULL, NULL, NULL, 0, NULL, 8, 105, NULL, NULL, NULL, NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `output_control`
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
-- Dumping data for table `output_control`
--

INSERT INTO `output_control` (`id`, `id_pdo`, `plan`, `actual`, `jam_ke`, `time`) VALUES
(167, 120, 25, 26, 1, '2019-07-08 09:55:21'),
(168, 120, 15, 20, 2, '2019-07-08 09:57:02'),
(169, 120, 10, 10, 3, '2019-07-08 09:58:08'),
(170, 120, 12, 11, 4, '2019-07-08 10:00:49'),
(171, 120, 6, 5, 5, '2019-07-08 10:06:57'),
(172, 121, 20, 20, 1, '2019-07-09 08:04:15'),
(173, 121, 20, 20, 2, '2019-07-09 08:04:36'),
(174, 121, 15, 15, 3, '2019-07-09 13:51:49'),
(175, 122, 50, 56, 1, '2019-07-10 11:06:33'),
(176, 122, 25, 24, 2, '2019-07-10 11:18:41'),
(177, 122, 15, 15, 3, '2019-07-10 11:21:29'),
(178, 123, 55, 0, 1, '2019-07-11 11:44:24');

-- --------------------------------------------------------

--
-- Table structure for table `quality_control`
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
-- Dumping data for table `quality_control`
--

INSERT INTO `quality_control` (`id`, `id_pdo`, `id_oc`, `id_jenisdeffect`, `keterangan`, `total`) VALUES
(9, 120, 167, 7, 'miss', 1),
(10, 122, 176, 8, 'ff', 1);

-- --------------------------------------------------------

--
-- Table structure for table `regulasi`
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
-- Table structure for table `shift`
--

CREATE TABLE `shift` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shift`
--

INSERT INTO `shift` (`id`, `keterangan`) VALUES
(1, 'A'),
(2, 'B');

-- --------------------------------------------------------

--
-- Table structure for table `sisi`
--

CREATE TABLE `sisi` (
  `id` int(11) NOT NULL,
  `nama` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sisi`
--

INSERT INTO `sisi` (`id`, `nama`) VALUES
(1, 'Selatan'),
(2, 'Utara');

-- --------------------------------------------------------

--
-- Table structure for table `spv_manager`
--

CREATE TABLE `spv_manager` (
  `id` int(11) NOT NULL,
  `id_supervisor` int(11) NOT NULL,
  `id_sisi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spv_manager`
--

INSERT INTO `spv_manager` (`id`, `id_supervisor`, `id_sisi`) VALUES
(18, 14, 2),
(20, 10, 1),
(21, 13, 2);

-- --------------------------------------------------------

--
-- Table structure for table `supervisor`
--

CREATE TABLE `supervisor` (
  `id` int(11) NOT NULL,
  `nik` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `passcode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supervisor`
--

INSERT INTO `supervisor` (`id`, `nik`, `nama`, `passcode`) VALUES
(10, 1641720001, 'Rasyidi', 1234567),
(13, 123456, 'daada', 123456),
(14, 1234, 'ddd', 1234);

-- --------------------------------------------------------

--
-- Table structure for table `target`
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
-- Dumping data for table `target`
--

INSERT INTO `target` (`id`, `id_line`, `mh_out`, `mh_in`, `efisiensi`, `plan_assy`, `periode`) VALUES
(8, 9, 300, 400, 100, 0, '2019-07-08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `level`, `id_shift`, `id_line`, `active`) VALUES
(8, 'user1', 'user1', 3, 1, 9, 1),
(9, 'user2', 'user2', 3, 1, 24, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen_leader`
--
ALTER TABLE `absen_leader`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idindirectlabor` (`id_pdo`);

--
-- Indexes for table `absen_pegawai`
--
ALTER TABLE `absen_pegawai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_absenpeg_directlabor` (`id_pdo`);

--
-- Indexes for table `assembly`
--
ALTER TABLE `assembly`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `build_assy`
--
ALTER TABLE `build_assy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idassy_tblassembly` (`id_assy`),
  ADD KEY `fk_idoc_tblOc` (`id_outputcontrol`),
  ADD KEY `fk_pdo_tblPDO` (`id_pdo`);

--
-- Indexes for table `direct_labor`
--
ALTER TABLE `direct_labor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pdo` (`id_pdo`);

--
-- Indexes for table `history_pdo`
--
ALTER TABLE `history_pdo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pdoid` (`id_pdo`);

--
-- Indexes for table `indirect_activity`
--
ALTER TABLE `indirect_activity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_indirectactivity_directlabor` (`id_pdo`);

--
-- Indexes for table `indirect_labor`
--
ALTER TABLE `indirect_labor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pdo_indirect` (`id_pdo`);

--
-- Indexes for table `jenis_deffect`
--
ALTER TABLE `jenis_deffect`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_error`
--
ALTER TABLE `jenis_error`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_losttime`
--
ALTER TABLE `jenis_losttime`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_regulasi`
--
ALTER TABLE `jenis_regulasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `line`
--
ALTER TABLE `line`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sisi` (`id_sisi`);

--
-- Indexes for table `line_manager`
--
ALTER TABLE `line_manager`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_line` (`id_line`),
  ADD KEY `id_assy` (`id_assy`);

--
-- Indexes for table `lost_time`
--
ALTER TABLE `lost_time`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idjenisloss_tbljenislosstime` (`id_jenisloss`),
  ADD KEY `fk_idpdo_mainpdo` (`id_pdo`),
  ADD KEY `fk_idjeniserror_tbljeniserror` (`id_error`),
  ADD KEY `id_oc` (`id_oc`);

--
-- Indexes for table `main_pdo`
--
ALTER TABLE `main_pdo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_shift_tbl_shift` (`id_shift`),
  ADD KEY `fk_users` (`id_users`),
  ADD KEY `fk_line` (`id_line`);

--
-- Indexes for table `output_control`
--
ALTER TABLE `output_control`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idpdo_tblmainpdo` (`id_pdo`);

--
-- Indexes for table `quality_control`
--
ALTER TABLE `quality_control`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_jenisdeffect` (`id_jenisdeffect`),
  ADD KEY `fk_idpdo` (`id_pdo`),
  ADD KEY `fk_oc_outputcontrol` (`id_oc`);

--
-- Indexes for table `regulasi`
--
ALTER TABLE `regulasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_regulasijenis_jenis` (`id_jenisreg`),
  ADD KEY `fk_iddirectlabor_labor` (`id_pdo`),
  ADD KEY `id_oc` (`id_oc`);

--
-- Indexes for table `shift`
--
ALTER TABLE `shift`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sisi`
--
ALTER TABLE `sisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spv_manager`
--
ALTER TABLE `spv_manager`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_supervisor` (`id_supervisor`),
  ADD KEY `id_line` (`id_sisi`);

--
-- Indexes for table `supervisor`
--
ALTER TABLE `supervisor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `target`
--
ALTER TABLE `target`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_line_tbl_line` (`id_line`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_shift_tblshift` (`id_shift`),
  ADD KEY `fk_line_tblline` (`id_line`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen_leader`
--
ALTER TABLE `absen_leader`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `absen_pegawai`
--
ALTER TABLE `absen_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `assembly`
--
ALTER TABLE `assembly`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1198;
--
-- AUTO_INCREMENT for table `build_assy`
--
ALTER TABLE `build_assy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;
--
-- AUTO_INCREMENT for table `direct_labor`
--
ALTER TABLE `direct_labor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `history_pdo`
--
ALTER TABLE `history_pdo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `indirect_activity`
--
ALTER TABLE `indirect_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `indirect_labor`
--
ALTER TABLE `indirect_labor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `jenis_deffect`
--
ALTER TABLE `jenis_deffect`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `jenis_error`
--
ALTER TABLE `jenis_error`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `jenis_losttime`
--
ALTER TABLE `jenis_losttime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jenis_regulasi`
--
ALTER TABLE `jenis_regulasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `line`
--
ALTER TABLE `line`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `line_manager`
--
ALTER TABLE `line_manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=327;
--
-- AUTO_INCREMENT for table `lost_time`
--
ALTER TABLE `lost_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `main_pdo`
--
ALTER TABLE `main_pdo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;
--
-- AUTO_INCREMENT for table `output_control`
--
ALTER TABLE `output_control`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;
--
-- AUTO_INCREMENT for table `quality_control`
--
ALTER TABLE `quality_control`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `regulasi`
--
ALTER TABLE `regulasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shift`
--
ALTER TABLE `shift`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sisi`
--
ALTER TABLE `sisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `spv_manager`
--
ALTER TABLE `spv_manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `supervisor`
--
ALTER TABLE `supervisor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `target`
--
ALTER TABLE `target`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `absen_leader`
--
ALTER TABLE `absen_leader`
  ADD CONSTRAINT `fk_idindirectlabor` FOREIGN KEY (`id_pdo`) REFERENCES `main_pdo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `absen_pegawai`
--
ALTER TABLE `absen_pegawai`
  ADD CONSTRAINT `fk_absenpeg_directlabor` FOREIGN KEY (`id_pdo`) REFERENCES `main_pdo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `build_assy`
--
ALTER TABLE `build_assy`
  ADD CONSTRAINT `fk_idassy_tblassembly` FOREIGN KEY (`id_assy`) REFERENCES `assembly` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_idoc_tblOc` FOREIGN KEY (`id_outputcontrol`) REFERENCES `output_control` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pdo_tblPDO` FOREIGN KEY (`id_pdo`) REFERENCES `main_pdo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `direct_labor`
--
ALTER TABLE `direct_labor`
  ADD CONSTRAINT `fk_pdo` FOREIGN KEY (`id_pdo`) REFERENCES `main_pdo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `history_pdo`
--
ALTER TABLE `history_pdo`
  ADD CONSTRAINT `fk_pdoid` FOREIGN KEY (`id_pdo`) REFERENCES `main_pdo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `indirect_activity`
--
ALTER TABLE `indirect_activity`
  ADD CONSTRAINT `fk_indirectactivity_directlabor` FOREIGN KEY (`id_pdo`) REFERENCES `main_pdo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `indirect_labor`
--
ALTER TABLE `indirect_labor`
  ADD CONSTRAINT `fk_pdo_indirect` FOREIGN KEY (`id_pdo`) REFERENCES `main_pdo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `line`
--
ALTER TABLE `line`
  ADD CONSTRAINT `fk_id_sisi` FOREIGN KEY (`id_sisi`) REFERENCES `sisi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `line_manager`
--
ALTER TABLE `line_manager`
  ADD CONSTRAINT `fk_id_assy` FOREIGN KEY (`id_assy`) REFERENCES `assembly` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_line` FOREIGN KEY (`id_line`) REFERENCES `line` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lost_time`
--
ALTER TABLE `lost_time`
  ADD CONSTRAINT `fk_idjeniserror_tbljeniserror` FOREIGN KEY (`id_error`) REFERENCES `jenis_error` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_idjenisloss_tbljenislosstime` FOREIGN KEY (`id_jenisloss`) REFERENCES `jenis_losttime` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_idoc_tvloutputcontrol` FOREIGN KEY (`id_oc`) REFERENCES `output_control` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_idpdo_mainpdo` FOREIGN KEY (`id_pdo`) REFERENCES `main_pdo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `main_pdo`
--
ALTER TABLE `main_pdo`
  ADD CONSTRAINT `fk_line` FOREIGN KEY (`id_line`) REFERENCES `line` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_shift_tbl_shift` FOREIGN KEY (`id_shift`) REFERENCES `shift` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_users` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `output_control`
--
ALTER TABLE `output_control`
  ADD CONSTRAINT `fk_idpdo_tblmainpdo` FOREIGN KEY (`id_pdo`) REFERENCES `main_pdo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quality_control`
--
ALTER TABLE `quality_control`
  ADD CONSTRAINT `fk_idpdo` FOREIGN KEY (`id_pdo`) REFERENCES `main_pdo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_jenisdeffect` FOREIGN KEY (`id_jenisdeffect`) REFERENCES `jenis_deffect` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_oc_outputcontrol` FOREIGN KEY (`id_oc`) REFERENCES `output_control` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `regulasi`
--
ALTER TABLE `regulasi`
  ADD CONSTRAINT `fk_iddirectlabor_labor` FOREIGN KEY (`id_pdo`) REFERENCES `main_pdo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_oc_outputcontrol_` FOREIGN KEY (`id_oc`) REFERENCES `output_control` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_regulasijenis_jenis` FOREIGN KEY (`id_jenisreg`) REFERENCES `jenis_regulasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `spv_manager`
--
ALTER TABLE `spv_manager`
  ADD CONSTRAINT `fk_id_sisi_spv` FOREIGN KEY (`id_sisi`) REFERENCES `sisi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_supervisor` FOREIGN KEY (`id_supervisor`) REFERENCES `supervisor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `target`
--
ALTER TABLE `target`
  ADD CONSTRAINT `fk_line_tbl_line` FOREIGN KEY (`id_line`) REFERENCES `line` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_line_tblline` FOREIGN KEY (`id_line`) REFERENCES `line` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_shift_tblshift` FOREIGN KEY (`id_shift`) REFERENCES `shift` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
