-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 23, 2019 at 01:39 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.40

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
-- Table structure for table `absen_leader`
--

CREATE TABLE `absen_leader` (
  `id` int(11) NOT NULL,
  `id_indirectlabor` int(11) NOT NULL,
  `item` varchar(250) NOT NULL,
  `qty` int(11) NOT NULL,
  `jam` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `absen_pegawai`
--

CREATE TABLE `absen_pegawai` (
  `id` int(11) NOT NULL,
  `id_directlabor` int(11) NOT NULL,
  `item` varchar(200) NOT NULL,
  `qty_mp` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
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
(6, '58860', 3.1746),
(7, '58880', 2.9967),
(9, '58A30', 3.0555),
(10, '58820', 3.2858),
(11, '58A20', 2.915),
(14, '58890', 3.1325);

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
-- Dumping data for table `build_assy`
--

INSERT INTO `build_assy` (`id`, `id_outputcontrol`, `id_pdo`, `id_assy`, `actual`, `time`) VALUES
(46, 22, 1, 7, 3, '2019-06-22 20:26:48');

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
(1, 1, 56, 56, 8, 2, 56, 448, 112, 560);

-- --------------------------------------------------------

--
-- Table structure for table `indirect_activity`
--

CREATE TABLE `indirect_activity` (
  `id` int(11) NOT NULL,
  `id_directlabor` int(11) NOT NULL,
  `item` varchar(250) NOT NULL,
  `qty_mp` int(11) NOT NULL,
  `jam` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 1, 3, 2, 8, 2, 2, 16, 4, 20);

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

-- --------------------------------------------------------

--
-- Table structure for table `jenis_regulasi`
--

CREATE TABLE `jenis_regulasi` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lost_time`
--

CREATE TABLE `lost_time` (
  `id` int(11) NOT NULL,
  `id_pdo` int(11) NOT NULL,
  `id_error` int(11) NOT NULL,
  `id_jenisloss` int(11) NOT NULL,
  `keterangan` varchar(250) NOT NULL,
  `durasi` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `main_pdo`
--

CREATE TABLE `main_pdo` (
  `id` int(11) NOT NULL,
  `id_shift` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `cv` varchar(50) NOT NULL,
  `tanggal` datetime NOT NULL,
  `mh_out` int(11) DEFAULT NULL,
  `mh_in_dl` int(11) DEFAULT NULL,
  `mh_in_idl` int(11) DEFAULT NULL,
  `direct_eff` int(11) DEFAULT NULL,
  `total_productiv` int(11) DEFAULT NULL,
  `jam_kerja` int(11) DEFAULT NULL,
  `line_speed` int(11) DEFAULT NULL,
  `loss_output` int(11) DEFAULT NULL,
  `p_loss_time` int(11) DEFAULT NULL,
  `jam_effective` int(11) DEFAULT NULL,
  `dpm_fa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `main_pdo`
--

INSERT INTO `main_pdo` (`id`, `id_shift`, `id_users`, `cv`, `tanggal`, `mh_out`, `mh_in_dl`, `mh_in_idl`, `direct_eff`, `total_productiv`, `jam_kerja`, `line_speed`, `loss_output`, `p_loss_time`, `jam_effective`, `dpm_fa`) VALUES
(1, 1, 1, '12A', '2019-06-21 14:05:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
(22, 1, 36, 7, 1, '2019-06-22 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `quality_control`
--

CREATE TABLE `quality_control` (
  `id` int(11) NOT NULL,
  `id_pdo` int(11) NOT NULL,
  `id_jenisdeffect` int(11) NOT NULL,
  `keterangan` varchar(250) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `regulasi`
--

CREATE TABLE `regulasi` (
  `id` int(11) NOT NULL,
  `id_directlabor` int(11) NOT NULL,
  `id_jenisreg` int(11) NOT NULL,
  `posisi` varchar(250) NOT NULL,
  `qty` int(11) NOT NULL,
  `jam` int(11) NOT NULL
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
(1, 'A (Pagi)'),
(2, 'B (Malam)');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `level`) VALUES
(1, 'a1', 'ana', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen_leader`
--
ALTER TABLE `absen_leader`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idindirectlabor` (`id_indirectlabor`);

--
-- Indexes for table `absen_pegawai`
--
ALTER TABLE `absen_pegawai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_absenpeg_directlabor` (`id_directlabor`);

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
-- Indexes for table `indirect_activity`
--
ALTER TABLE `indirect_activity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_indirectactivity_directlabor` (`id_directlabor`);

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
-- Indexes for table `lost_time`
--
ALTER TABLE `lost_time`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idjenisloss_tbljenislosstime` (`id_jenisloss`),
  ADD KEY `fk_idpdo_mainpdo` (`id_pdo`),
  ADD KEY `fk_idjeniserror_tbljeniserror` (`id_error`);

--
-- Indexes for table `main_pdo`
--
ALTER TABLE `main_pdo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_shift_tbl_shift` (`id_shift`),
  ADD KEY `fk_users` (`id_users`);

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
  ADD KEY `fk_idpdo` (`id_pdo`);

--
-- Indexes for table `regulasi`
--
ALTER TABLE `regulasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_regulasijenis_jenis` (`id_jenisreg`),
  ADD KEY `fk_iddirectlabor_labor` (`id_directlabor`);

--
-- Indexes for table `shift`
--
ALTER TABLE `shift`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `build_assy`
--
ALTER TABLE `build_assy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `direct_labor`
--
ALTER TABLE `direct_labor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `indirect_activity`
--
ALTER TABLE `indirect_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `indirect_labor`
--
ALTER TABLE `indirect_labor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_regulasi`
--
ALTER TABLE `jenis_regulasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lost_time`
--
ALTER TABLE `lost_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `main_pdo`
--
ALTER TABLE `main_pdo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `output_control`
--
ALTER TABLE `output_control`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `quality_control`
--
ALTER TABLE `quality_control`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absen_leader`
--
ALTER TABLE `absen_leader`
  ADD CONSTRAINT `fk_idindirectlabor` FOREIGN KEY (`id_indirectlabor`) REFERENCES `indirect_labor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `absen_pegawai`
--
ALTER TABLE `absen_pegawai`
  ADD CONSTRAINT `fk_absenpeg_directlabor` FOREIGN KEY (`id_directlabor`) REFERENCES `direct_labor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `indirect_activity`
--
ALTER TABLE `indirect_activity`
  ADD CONSTRAINT `fk_indirectactivity_directlabor` FOREIGN KEY (`id_directlabor`) REFERENCES `direct_labor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `indirect_labor`
--
ALTER TABLE `indirect_labor`
  ADD CONSTRAINT `fk_pdo_indirect` FOREIGN KEY (`id_pdo`) REFERENCES `main_pdo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lost_time`
--
ALTER TABLE `lost_time`
  ADD CONSTRAINT `fk_idjeniserror_tbljeniserror` FOREIGN KEY (`id_error`) REFERENCES `jenis_error` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_idjenisloss_tbljenislosstime` FOREIGN KEY (`id_jenisloss`) REFERENCES `jenis_losttime` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_idpdo_mainpdo` FOREIGN KEY (`id_pdo`) REFERENCES `main_pdo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `main_pdo`
--
ALTER TABLE `main_pdo`
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
  ADD CONSTRAINT `fk_jenisdeffect` FOREIGN KEY (`id_jenisdeffect`) REFERENCES `jenis_deffect` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `regulasi`
--
ALTER TABLE `regulasi`
  ADD CONSTRAINT `fk_iddirectlabor_labor` FOREIGN KEY (`id_directlabor`) REFERENCES `direct_labor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_regulasijenis_jenis` FOREIGN KEY (`id_jenisreg`) REFERENCES `jenis_regulasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
