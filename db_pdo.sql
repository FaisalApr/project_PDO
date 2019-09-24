-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 24 Sep 2019 pada 09.59
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
(1198, '58A20', 3.11),
(1199, '58880', 2.007),
(1200, '58860', 2.8746),
(1201, '58A30', 3.0555),
(1202, '58820', 3.2858),
(1203, '58890', 3.1325),
(1204, '58830', 3.414),
(1205, '58850', 3.2224),
(1206, '58870', 3.3157),
(1207, '58840', 3.092),
(1208, '58A41', 2.8066),
(1209, '58A50', 3.5583),
(1210, '58650', 2.8826),
(1211, '58821', 3.25942),
(1212, '58831', 3.39195),
(1213, '58841', 3.06271),
(1214, '58851', 3.1924),
(1215, '58861', 3.15101),
(1216, '58871', 3.29218),
(1217, '58881', 2.96747),
(1218, '58891', 3.1025),
(1219, '58A42', 2.79061),
(1220, '58A01', 3.53332),
(1221, '58781', 3.1457),
(1222, '58801', 3.04426),
(1223, '58811', 3.20426),
(1224, '58A21', 2.8864),
(1225, '58A31', 3.0263),
(1226, '50U11', 4.4135),
(1227, '50T71', 4.2702),
(1228, '50V52', 4.7273),
(1229, '58720', 3.2476),
(1230, 'K218', 2.81133),
(1231, 'K219', 2.82494),
(1232, 'K220', 2.83087),
(1233, 'K221', 2.83015),
(1234, 'K222', 3.02899),
(1235, 'K223', 3.0426),
(1236, 'K224', 3.04853),
(1237, 'K226', 2.55783),
(1238, 'K227', 2.57144),
(1239, 'K250', 2.57738),
(1240, 'K251', 2.57665),
(1241, 'K252', 2.78154),
(1242, 'K253', 2.79515),
(1243, 'K254', 2.80109),
(1244, 'K256', 2.63197),
(1245, 'K257', 2.64558),
(1246, 'K258', 2.65152),
(1247, 'K259', 2.65079),
(1248, 'K260', 2.85568),
(1249, 'K261', 2.86929),
(1250, 'K262', 2.73719),
(1251, 'K263', 2.7508),
(1252, 'K264', 2.75673),
(1253, 'K265', 2.75601),
(1254, 'K266', 2.95485),
(1255, 'K267', 2.96846),
(1256, 'K268', 2.9744),
(1257, 'K269', 2.87523),
(1258, 'K281', 2.75466),
(1259, 'K282', 2.76827),
(1260, 'K283', 2.7742),
(1261, 'K285', 2.97232),
(1262, 'K286', 2.98594),
(1263, 'K287', 2.99187),
(1264, 'K288', 2.99114),
(1265, 'K289', 2.8288),
(1266, 'K290', 2.84241),
(1267, 'K291', 2.84835),
(1268, 'K293', 3.04646),
(1269, 'K294', 3.06007),
(1270, 'K295', 3.06601),
(1271, 'K296', 3.06528),
(1272, 'K297', 2.5753),
(1273, 'K298', 2.58891),
(1274, 'K299', 2.59485),
(1275, 'K301', 2.79901),
(1276, 'K302', 2.81262),
(1277, 'K303', 2.81856),
(1278, 'K304', 2.81783),
(1279, 'K305', 2.64945),
(1280, 'K306', 2.66306),
(1281, 'K307', 2.66899),
(1282, 'K309', 2.87316),
(1283, 'K310', 2.88677),
(1284, 'K311', 2.89188),
(1285, 'K312', 2.89198),
(1286, 'K313', 2.7701),
(1287, 'K315', 3.00219),
(1288, 'K317', 2.77438),
(1289, 'K318', 2.802),
(1290, 'K319', 2.74757),
(1291, 'K320', 2.82171),
(1292, 'K328', 2.75691),
(1293, 'K329', 2.78452),
(1294, 'K330', 2.83105),
(1295, 'K331', 2.64577),
(1296, 'K332', 2.58058),
(1297, 'K333', 2.6082),
(1298, 'K334', 2.72596),
(1299, 'K335', 2.66076),
(1300, 'K336', 2.68838),
(1301, 'K344', 3.01966),
(1302, 'K345', 3.00523),
(1303, 'K346', 2.85866),
(1304, 'K347', 2.84423),
(1305, 'K351', 2.84852),
(1306, 'K352', 2.87614),
(1307, 'K355', 3.0938),
(1308, 'K356', 3.07937),
(1309, 'K358', 2.76504),
(1310, 'K359', 2.98271),
(1311, 'K360', 3.04347),
(1312, 'K362', 2.83918),
(1313, 'K363', 3.05684),
(1314, 'K364', 3.11761),
(1315, 'K365', 2.67339),
(1316, 'K368', 2.66324),
(1317, 'K369', 2.69086),
(1318, 'K371', 2.91457),
(1319, 'K372', 2.97533),
(1320, 'K373', 2.59377),
(1321, 'K377', 2.59805),
(1322, 'K378', 2.62567),
(1323, 'K381', 2.84938),
(1324, 'K382', 2.83495),
(1325, 'K383', 2.91015),
(1326, 'K384', 2.75357),
(1327, 'K387', 2.74343),
(1328, 'K388', 2.77104),
(1329, 'K390', 2.98871),
(1330, 'K391', 3.0495),
(1331, 'K392', 2.67395),
(1332, 'K396', 2.67824),
(1333, 'K397', 2.70586),
(1334, 'K400', 2.92352),
(1335, 'K401', 2.90909),
(1336, 'K402', 2.98429),
(1337, 'K407', 2.70346),
(1338, 'K409', 2.92717),
(1339, 'K410', 2.98793),
(1340, 'K413', 2.98383),
(1341, 'K415', 2.78364),
(1342, 'K417', 3.00131),
(1343, 'K418', 3.06207),
(1344, 'KD4L', 3.2664),
(1345, 'KG3M', 2.65873),
(1346, 'KG3N', 2.59494),
(1347, 'KG3P', 2.66553),
(1348, 'KG3W', 2.5298),
(1349, 'KG4A', 2.60852),
(1350, 'KG4G', 2.86024),
(1351, 'KG4H', 2.91382),
(1352, 'KG6R', 2.35609),
(1353, 'KG7B', 2.45682),
(1354, 'KG7E', 2.73407),
(1355, 'KG7G', 2.76066),
(1356, 'KJ1F', 2.43496),
(1357, 'KJ1H', 2.5418),
(1358, 'KJ1P', 2.80165),
(1359, 'KJ4L', 2.55856),
(1360, 'KJ4M', 2.63519),
(1361, 'KJ4P', 2.49477),
(1362, 'KJ4R', 2.56536),
(1363, 'KJ4S', 2.72802),
(1364, 'KJ4V', 2.52136),
(1365, 'KJ5B', 2.8252),
(1366, 'KJ7P', 2.8397),
(1367, 'KJ7T', 2.84324),
(1368, 'KJ7V', 2.91384),
(1369, 'KJ8G', 2.86325),
(1370, 'KJ8L', 2.93739),
(1371, 'KK0C', 2.9457),
(1372, 'KK0F', 3.00949),
(1373, 'KK0G', 2.81361),
(1374, 'KK0L', 3.12847),
(1375, 'KK0M', 2.88775),
(1376, 'KK0S', 3.20261),
(1377, 'KK2P', 3.01089),
(1378, 'KK2W', 3.07468),
(1379, 'KK3A', 2.94259),
(1380, 'KK3E', 3.25745),
(1381, 'KK3K', 3.33158),
(1382, 'KK3R', 3.19365),
(1383, 'KK4A', 3.26779),
(1384, 'KK8W', 2.65893),
(1385, 'KK9A', 3.02486),
(1386, 'KK9C', 3.15143),
(1387, 'KK9E', 3.11448),
(1388, 'KK9F', 2.85467),
(1389, 'KK9H', 2.98124),
(1390, 'KL4G', 2.69464),
(1391, 'KL4H', 2.71896),
(1392, 'KL4J', 2.63084),
(1393, 'KL4N', 2.8774),
(1394, 'KL4P', 2.904),
(1395, 'KL4R', 3.19226),
(1396, 'KL4V', 2.95154),
(1397, 'KL5B', 2.70675),
(1398, 'KL5C', 2.77735),
(1399, 'KL5D', 3.03113),
(1400, 'KL5F', 3.10218),
(1401, 'KL5G', 2.93199),
(1402, 'KL7H', 2.50928),
(1403, 'KL7J', 2.8131),
(1404, 'KM8E', 2.93395),
(1405, 'KM8G', 3.00455),
(1406, 'KM8M', 3.06974),
(1407, 'KM8N', 3.1263),
(1408, 'KM8P', 2.86877),
(1409, 'KM8S', 2.93936),
(1410, 'KM9B', 3.00455),
(1411, 'KM9D', 3.11672),
(1412, 'KM9F', 3.18836),
(1413, 'KM9L', 3.25355),
(1414, 'KM9N', 3.05152),
(1415, '=LEFT(A299,4)', 0),
(1416, '=LEFT(A300,4)', 0),
(1417, '=LEFT(A301,4)', 0),
(1418, '=LEFT(A302,4)', 0),
(1419, '=LEFT(A303,4)', 0),
(1420, '=LEFT(A304,4)', 0),
(1421, '=LEFT(A305,4)', 0),
(1422, '=LEFT(A306,4)', 0),
(1423, '=LEFT(A307,4)', 0),
(1424, '=LEFT(A308,4)', 0),
(1425, '=LEFT(A309,4)', 0),
(1426, '=LEFT(A310,4)', 0),
(1427, '=LEFT(A311,4)', 0),
(1428, '=LEFT(A312,4)', 0),
(1429, '=LEFT(A313,4)', 0),
(1430, '=LEFT(A314,4)', 0),
(1431, '=LEFT(A315,4)', 0),
(1432, '=LEFT(A316,4)', 0),
(1433, '=LEFT(A317,4)', 0),
(1434, '=LEFT(A318,4)', 0),
(1435, 'KN7L', 2.75254),
(1436, 'KN7R', 2.9702),
(1437, 'KN7S', 3.01594),
(1438, 'KN8A', 2.58692),
(1439, 'KN8B', 2.65751),
(1440, 'KN8D', 2.94974),
(1441, 'KN8H', 3.02079),
(1442, 'KN8J', 3.06757),
(1443, 'KN8N', 2.97329),
(1444, 'KN8T', 3.04434),
(1445, 'KN9C', 2.38247),
(1446, 'KP0R', 2.8031),
(1447, 'KP1D', 2.87415),
(1448, 'KP1E', 2.91988),
(1449, 'KR6F', 2.68867),
(1450, 'KR6G', 2.71629),
(1451, 'KR6H', 2.62348),
(1452, 'KR6K', 2.87144),
(1453, 'KR6L', 2.89905),
(1454, 'KR6M', 2.80625),
(1455, 'KR6P', 2.94557),
(1456, 'KR6R', 2.88038),
(1457, 'KR8S', 2.59972),
(1458, 'KM9R', 3.12317),
(1459, 'KN0A', 3.18836),
(1460, 'KN0D', 3.26144),
(1461, 'KN0J', 3.32663),
(1462, 'KN0K', 3.37138),
(1463, 'KN0M', 3.19626),
(1464, 'KN0T', 3.2625),
(1465, 'KN1K', 2.98791),
(1466, 'KN4L', 2.65352),
(1467, 'KN4M', 2.58833),
(1468, 'KN4N', 2.69947),
(1469, 'KN4P', 2.77006),
(1470, 'KN4R', 2.52322),
(1471, 'KN4S', 2.59382),
(1472, 'KN6B', 3.3062),
(1473, 'KN6H', 2.8756),
(1474, 'KN6V', 2.51885),
(1475, 'KN6W', 2.55268),
(1476, 'KN7A', 2.62932),
(1477, 'KN7G', 2.89915),
(1478, '4423_0', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `balance_produksi`
--

CREATE TABLE `balance_produksi` (
  `id` int(11) NOT NULL,
  `id_listcarline` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `balance_produksi`
--

INSERT INTO `balance_produksi` (`id`, `id_listcarline`, `balance`, `tanggal`) VALUES
(2, 38, 4, '2019-07-10'),
(3, 28, 8, '2019-07-25');

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
-- Trigger `build_assy`
--
DELIMITER $$
CREATE TRIGGER `updt_act` AFTER UPDATE ON `build_assy` FOR EACH ROW BEGIN
	UPDATE output_control SET actual=(SELECT sum(actual) FROM build_assy WHERE id_outputcontrol=NEW.id_outputcontrol)
    WHERE id=NEW.id_outputcontrol;
    
    UPDATE main_pdo SET STATUS=0
    WHERE id=NEW.id_pdo;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `carline`
--

CREATE TABLE `carline` (
  `id` int(11) NOT NULL,
  `id_district` int(11) NOT NULL,
  `nama_carline` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `carline`
--

INSERT INTO `carline` (`id`, `id_district`, `nama_carline`, `status`) VALUES
(4, 2, 'SZK', 1),
(5, 2, 'DAIHATSU', 1),
(6, 2, 'FLAT FREE', 1),
(7, 2, 'MTB OUTLANDER', 1),
(8, 2, 'MTB TK-TS', 1),
(9, 2, 'PRIUS', 1),
(10, 1, 'CHR', 1),
(11, 1, 'PRADO', 1),
(12, 1, 'PORTE', 1),
(13, 1, 'DEMIO', 1),
(14, 1, 'MAZDA', 1),
(15, 1, 'ACE', 1),
(16, 1, 'LC', 1),
(17, 1, 'ESTIMA', 1),
(18, 1, 'MIRAI', 1),
(19, 1, 'HINO', 1),
(20, 1, 'ALPHARD', 1),
(21, 1, 'HIACE ', 1),
(22, 1, 'COROLLA', 1),
(26, 1, 'aaaakuu', 0),
(27, 1, 'Akuuuddjdjssdsd', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `departement`
--

CREATE TABLE `departement` (
  `id` int(11) NOT NULL,
  `code_depart` varchar(10) NOT NULL,
  `departement` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `departement`
--

INSERT INTO `departement` (`id`, `code_depart`, `departement`) VALUES
(1, 'PA', ''),
(2, 'FA', ''),
(3, 'FAE', ''),
(4, 'PAE', ''),
(5, 'GA-GS', ''),
(6, 'DE', ''),
(7, 'PPC', ''),
(8, 'EXIM', ''),
(9, 'W/H', ''),
(10, 'IC', ''),
(11, 'QA-QC', ''),
(12, 'NYS', ''),
(13, 'PP', ''),
(14, 'PUCHASING', '');

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `district`
--

CREATE TABLE `district` (
  `id` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `alamat` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `district`
--

INSERT INTO `district` (`id`, `nama`, `alamat`) VALUES
(1, 'SAI T', NULL),
(2, 'SAI B', NULL);

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
  `menit` double NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `keterangan` varchar(250) NOT NULL,
  `kodepasi` varchar(220) NOT NULL,
  `responsible` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_error`
--

INSERT INTO `jenis_error` (`id`, `kode`, `keterangan`, `kodepasi`, `responsible`) VALUES
(2, '1A', '4M (MANPOWER BARU)', 'PREPARATION TIME', 'PA'),
(3, '1B', '4M (PENGGANTI MP ABSEN)', 'PREPARATION TIME', 'PA'),
(4, '1C', 'BELUM CUTTING', 'DELAY IN WORK', 'PA'),
(5, '1D', 'BELUM PROSES MANUAL', 'DELAY IN WORK', 'PA'),
(6, '1E', 'KANBAN HILANG ', 'DELAY IN WORK', 'PA'),
(7, '1F', 'MISSING MARKING TERMINAL', 'DEFECT OCCURENCE', 'PA'),
(8, '1G', 'SALAH BONDER', 'DEFECT OCCURENCE', 'PA'),
(9, '1H', 'SALAH WIRE', 'DEFECT OCCURENCE', 'PA'),
(10, '1I', 'SALAH CUTTING LENGTH', 'DEFECT OCCURENCE', 'PA'),
(11, '1J', 'SALAH KANBAN', 'DEFECT OCCURENCE', 'PA'),
(12, '1K', 'SALAH TERMINAL', 'DEFECT OCCURENCE', 'PA'),
(13, '0', 'Zero Downtime', '-', '-'),
(14, '3AA', 'TERMINAL JUMPER INSTALASI BENT', 'MACHINE STOPPAGE', 'FAE'),
(15, '2T', 'TPO', 'DEFECT OCCURENCE', 'FA'),
(16, '3T', 'SENSOR RUSAK', 'MACHINE STOPPAGE', 'FAE'),
(17, '1Z', 'OTHER PRE ASSY DOWN TIME', '0', '0'),
(18, '3V', 'PIN EC FIXTURE KOTOR/BERKARAT', 'MACHINE STOPPAGE', 'FAE'),
(19, '3Z', 'PROGRAM C/B ERROR', 'MACHINE STOPPAGE', 'FAE'),
(20, '3W', 'PIN EC FIXTURE MACET', 'MACHINE STOPPAGE', 'FAE'),
(21, '3AC', 'YC MASTER ERROR', 'MACHINE STOPPAGE', 'FAE'),
(22, '1L', 'TUNGGU SUPPLY TUBE DARI CUTTING TUBE', 'DELAY IN WORK', 'PA'),
(23, '1M', 'OTHER PRE ASSY DOWN TIME', 'DELAY IN WORK', 'PA'),
(24, '1N', 'KANBAN HILANG', '0', '0'),
(25, '1O', 'MISSING MARKING TERMINAL', '0', '0'),
(26, '1P', 'SALAH BONDER', '0', '0'),
(27, '1Q', 'SALAH WIRE', '0', '0'),
(28, '1R', 'SALAH CUTTING LENGTH', '0', '0'),
(29, '1S', 'SALAH KANBAN', '0', '0'),
(30, '1T', 'SALAH TERMINAL', '0', '0'),
(31, '1U', 'TUNGGU SUPPLY TUBE DARI CUTTING TUBE', '0', '0'),
(32, '1V', 'KAPASITAS RUANG', '0', '0'),
(33, '1W', 'INSPEKSI KETETER', '0', '0'),
(34, '1X', 'CSU PRE ASSY KETETER', '0', '0'),
(35, '1Y', 'SALAH SUPPLY CIRCUIT', '0', '0'),
(36, '2A', 'SUB ASSY KETETER', 'DELAY IN WORK', 'FA'),
(37, '2B', 'TAPING KETETER', 'DELAY IN WORK', 'FA'),
(38, '2C', 'SETTING KETETER', 'DELAY IN WORK', 'FA'),
(39, '2D', 'CSU KETETER', 'DELAY IN WORK', 'FA'),
(40, '2E', 'MSP KETETER', 'DELAY IN WORK', 'FA'),
(42, '2F', 'OFFLINE KETETER', 'DELAY IN WORK', 'FA'),
(43, '2G', 'SP KETETER', 'DELAY IN WORK', 'FA'),
(44, '2H', 'TPO KETETER', 'DELAY IN WORK', 'FA'),
(45, '2I', 'EC KETETER', 'DELAY IN WORK', 'FA'),
(46, '2J', 'DIM KETETER', 'DELAY IN WORK', 'FA'),
(47, '2K', 'VIS KETETER', 'DELAY IN WORK', 'FA'),
(48, '2L', 'GROMET KETETER', 'DELAY IN WORK', 'FA'),
(49, '2M', 'CROSS CCT/ WRONG CAVITY', 'DEFECT OCCURENCE', 'FA'),
(50, '2N', 'DAMAGE INSULATION', 'DEFECT OCCURENCE', 'FA'),
(51, '2O', 'DAMAGE CONNECTOR/PROTECTOR', 'DEFECT OCCURENCE', 'FA'),
(52, '2P', 'DAMAGE SEAL RUBBER', 'DEFECT OCCURENCE', 'FA'),
(53, '2Q', 'DAMAGE CLIP', 'DEFECT OCCURENCE', 'FA'),
(54, '2R', 'MISSING PART ', 'DEFECT OCCURENCE', 'FA'),
(55, '2S', 'TERMINAL BENT', 'DEFECT OCCURENCE', 'FA'),
(56, '2U', 'CCT TEGANG', 'DEFECT OCCURENCE', 'FA'),
(57, '2V', 'CCT MEMBELIT', 'DEFECT OCCURENCE', 'FA'),
(58, '2W', 'NAMEPLATE RUSAK', 'DEFECT OCCURENCE', 'FA'),
(59, '2X', 'WRONG DIMENSI', 'DEFECT OCCURENCE', 'FA'),
(60, '2Y', 'WRONG METHODE', 'DEFECT OCCURENCE', 'FA'),
(61, '2Z', 'WRONG ORIENTASI', 'DEFECT OCCURENCE', 'FA'),
(62, '2AA', 'SILICON BOCOR / GANTI CAIRAN SILIKON', 'MACHINE STOPPAGE', 'FA'),
(63, '2AB', 'BALANCING JOB', 'PREPARATION TIME', 'FA'),
(64, '2AC', 'TRAINING 4M TRANSISI ', 'PREPARATION TIME', 'FA'),
(65, '2AD', 'DELAY SUB ASSY AIRBAG', 'DELAY IN WORK', 'FA'),
(66, '2AE', 'SIAGE KETETER', 'DELAY IN WORK', 'FA'),
(67, '2AF', 'MISSING INSERT', 'DELAY IN WORK', 'FA'),
(68, '2AG', 'TUNGGU VERIFIKASI TOOLING OLEH LEADER', 'DELAY IN WORK', 'FA'),
(69, '2AH', 'OTHER FINAL ASSY DOWNTIME', 'DELAY IN WORK', 'FA'),
(70, '2AI', 'OTHER FINAL ASSY DOWNTIME', '0', '0'),
(71, '3A', 'CCT JUMPER INSTALASI PUTUS', 'MACHINE STOPPAGE', 'FAE'),
(72, '3B', 'CONNECTOR INSTALASI PROBLEM', 'MACHINE STOPPAGE', 'FAE'),
(73, '3C', 'PROBLEM KARAKURI SUB', 'MACHINE STOPPAGE', 'FAE'),
(74, '3D', 'LAMPU LED NAVIGASI PROBLEM', 'MACHINE STOPPAGE', 'FAE'),
(75, '3E', 'MATTING PART PROBLEM', 'MACHINE STOPPAGE', 'FAE'),
(76, '3F', 'PROBLEM KARAKURI W/H', 'MACHINE STOPPAGE', 'FAE'),
(77, '3G', 'LAMPU STATION PROBLEM', 'MACHINE STOPPAGE', 'FAE'),
(78, '3H', 'M/C EXPANDER GROMET PROBLEM ', 'MACHINE STOPPAGE', 'FAE'),
(79, '3I', 'PERBAIKAN FORK / MATTING PART JIG BOARD', 'MACHINE STOPPAGE', 'FAE'),
(80, '3J', 'TORQUE PROBLEM(KARAKURI MSU PROBLEM)', 'MACHINE STOPPAGE', 'FAE'),
(81, '3K', 'ANDON PROBLEM', 'MACHINE STOPPAGE', 'FAE'),
(82, '3L', 'ROLLER KERETA PROBLEM ', 'MACHINE STOPPAGE', 'FAE'),
(83, '3M', 'DUDUKAN SENSOR KENDOR', 'MACHINE STOPPAGE', 'FAE'),
(84, '3N', 'GIGI KERETA TERSANGKUT', 'MACHINE STOPPAGE', 'FAE'),
(85, '3O', 'PENGUNGKIT LOCK KERETA TERSANGKUT', 'MACHINE STOPPAGE', 'FAE'),
(86, '3P', 'LOCK KERETA TIDAK MEMBUKA', 'MACHINE STOPPAGE', 'FAE'),
(87, '3Q', 'RANTAI CONVEYOR KENDOR / PUTUS', 'MACHINE STOPPAGE', 'FAE'),
(88, '3R', 'OVERLOAD MOTOR', 'MACHINE STOPPAGE', 'FAE'),
(89, '3S', 'RODA KERETA RUSAK', 'MACHINE STOPPAGE', 'FAE'),
(90, '3U', 'INSTALLASI CONVEYOR PROBLEM', 'MACHINE STOPPAGE', 'FAE'),
(91, '3X', 'PIN EC FIXTURE MUNDUR', 'MACHINE STOPPAGE', 'FAE'),
(92, '3Y', 'PIN EC FIXTURE PATAH', 'MACHINE STOPPAGE', 'FAE'),
(93, '3AB', 'TERMINAL JUMPER INSTALASI KOTOR', 'MACHINE STOPPAGE', 'FAE'),
(94, '3AD', 'CPU PROBLEM', 'MACHINE STOPPAGE', 'FAE'),
(95, '3AE', 'I/O PROBLEM', 'MACHINE STOPPAGE', 'FAE'),
(96, '3AF', 'INSTALLASI FOTO FUSE PROBLEM', 'MACHINE STOPPAGE', 'FAE'),
(97, '3AG', 'BOX FUSE PROBLEM', 'MACHINE STOPPAGE', 'FAE'),
(98, '3AH', 'SWITCH FOTO FUSE PROBLEM', 'MACHINE STOPPAGE', 'FAE'),
(99, '3AI', 'PROGRAM MESIN FOTO FUSE PROBLEM', 'MACHINE STOPPAGE', 'FAE'),
(100, '3AJ', 'PENAMBAHAN LIBRARY', 'MACHINE STOPPAGE', 'FAE'),
(101, '3AK', 'LAMPU BARCODE PROBLEM', 'MACHINE STOPPAGE', 'FAE'),
(102, '3AL', 'MESIN ARM CHECK TROUBLE', 'MACHINE STOPPAGE', 'FAE'),
(103, '3AM', 'MESIN WG-30 TROUBLE', 'MACHINE STOPPAGE', 'FAE'),
(104, '3AN', 'PERBAIKAN CHECKER FIXTURE', 'MACHINE STOPPAGE', 'FAE'),
(105, '3AO', 'STAMP PROBLEM', 'MACHINE STOPPAGE', 'FAE'),
(106, '3AP', 'TUNGGU TEKNISI DATANG', 'DELAY IN WORK', 'FAE'),
(107, '3AQ', 'PROBLEM KARAKURI MSU', 'MACHINE STOPPAGE', 'FAE'),
(108, '3AR', 'CORNER CONVEYOR PROBLEM', 'MACHINE STOPPAGE', 'FAE'),
(109, '3AS', 'STOPPER KERETA CORNER PROBLEM', 'MACHINE STOPPAGE', 'FAE'),
(110, '3AT', 'OTHER FAE DOWNTIME', 'DELAY IN WORK', 'FAE'),
(111, '4A', 'CRIMPING STANDARD PROBLEM', 'MACHINE STOPPAGE', 'PAE'),
(112, '4B', 'INSTAL M/C PRE ASSY', 'MACHINE STOPPAGE', 'PAE'),
(113, '4C', 'M/C AC PROBLEM', 'MACHINE STOPPAGE', 'PAE'),
(114, '4D', 'M/C BONDER PROBLEM', 'MACHINE STOPPAGE', 'PAE'),
(115, '4E', 'M/C CUTTING KODERA PROBLEM', 'MACHINE STOPPAGE', 'PAE'),
(116, '4F', 'M/C JOINT TAPING PROBLEM', 'MACHINE STOPPAGE', 'PAE'),
(117, '4G', 'M/C KODERA CASTING PROBLEM', 'MACHINE STOPPAGE', 'PAE'),
(118, '4H', 'M/C KOMAX PROBLEM', 'MACHINE STOPPAGE', 'PAE'),
(119, '4I', 'M/C KOMPRESOR ANGIN BOCOR', 'MACHINE STOPPAGE', 'PAE'),
(120, '4J', 'M/C PRESS FIT PROBLEM', 'MACHINE STOPPAGE', 'PAE'),
(121, '4K', 'M/C RAYCHEM PROBLEM', 'MACHINE STOPPAGE', 'PAE'),
(122, '4L', 'M/C STRIPING PROBLEM', 'MACHINE STOPPAGE', 'PAE'),
(123, '4M', 'M/C TWIST PROBLEM', 'MACHINE STOPPAGE', 'PAE'),
(124, '4N', 'M/C YCM PROBLEM', 'MACHINE STOPPAGE', 'PAE'),
(125, '4O', 'PERUBAHAN CRIMPING STANDARD', 'MACHINE STOPPAGE', 'PAE'),
(126, '4P', 'TUNGGU MTC DATANG', 'DELAY IN WORK', 'PAE'),
(127, '4Q', 'OTHER PAE DOWN TIME', 'DELAY IN WORK', 'PAE'),
(128, '5A', 'PERBAIKAN LAMPU', 'MACHINE STOPPAGE', 'GA-GS'),
(129, '5B', 'PANEL LAMPU MATI', 'MACHINE STOPPAGE', 'GA-GS'),
(130, '5C', 'KATERING TERLAMBAT', 'DELAY IN WORK', 'GA-GS'),
(131, '5D', 'ATAP BOCOR', 'MACHINE STOPPAGE', 'GA-GS'),
(132, '5E', 'OTHER GA DOWN TIME', 'DELAY IN WORK', 'GA-GS'),
(133, '6A', 'ADJUSTMENT CL TEGANG', 'DEFECT OCCURENCE', 'DE'),
(134, '6B', 'CCT KEPANJANGAN', 'DEFECT OCCURENCE', 'DE'),
(135, '6C', 'DRAWING PROBLEM', 'DEFECT OCCURENCE', 'DE'),
(136, '6D', 'TUNGGU DRAWING', 'DELAY IN WORK', 'DE'),
(137, '7A', 'DESIGN CHANGE PROBLEM', 'DELAY IN WORK', 'PPC'),
(138, '7B', 'SALAH SETTING CIK', 'MISSING ORDER', 'PPC'),
(139, '7C', 'ABNORMAL LOADING', 'MISSING ORDER', 'PPC'),
(140, '7D', 'DELAY SUPPLY LABEL', 'MISSING ORDER', 'PPC'),
(141, '7E', 'SALAH SUPPLY LABEL', 'MISSING ORDER', 'PPC'),
(142, '7F', 'TUNGGU SETTING CIK', 'MISSING ORDER', 'PPC'),
(143, '7G', 'TUNGGU HEIKINKA', 'MISSING ORDER', 'PPC'),
(144, '7H', 'TERLAMBAT MENURUNKAN LIST BONDER', 'MISSING ORDER', 'PPC'),
(145, '7I', 'SALAH INPUT PKO', 'MISSING ORDER', 'PPC'),
(146, '7J', 'SALAH ORDER COMPONENT PACKING', 'MISSING ORDER', 'PPC'),
(147, '7K', 'OTHER PPC DOWN TIME', 'MISSING ORDER', 'PPC'),
(148, '7L', 'OTHER PPC DOWNTIME', '0', '0'),
(149, '8B', 'TUNGGU TUTUP BOX PACKING', 'WAITING MATERIAL', 'EXIM'),
(150, '8C', 'TUNGGU SEGI TIGA PACKING', 'WAITING MATERIAL', 'EXIM'),
(151, '8D', 'TUNGGU PACKER', 'WAITING MATERIAL', 'EXIM'),
(152, '8E', 'TUNGGU POLYTAINER', 'WAITING MATERIAL', 'EXIM'),
(153, '8F', 'SALAH STO COMPONENT PACKING', 'WAITING MATERIAL', 'EXIM'),
(154, '8G', 'OTHER EXIM DOWN TIME', 'WAITING MATERIAL', 'EXIM'),
(155, '9A', 'PART TERCAMPUR', 'WAITING MATERIAL', 'W/H'),
(156, '9B', 'SALAH SUPPLY DARI W/H', 'WAITING MATERIAL', 'W/H'),
(157, '9C', 'TUNGGU MATERIAL DARI W/H', 'WAITING MATERIAL', 'W/H'),
(158, '9D', 'TUNGGU NAME PLATE', 'WAITING MATERIAL', 'W/H'),
(159, '9E', 'TUNGGU TERMINAL', 'WAITING MATERIAL', 'W/H'),
(160, '9F', 'TUNGGU TUBE/COT/VO DARI WAREHOUSE', 'WAITING MATERIAL', 'W/H'),
(161, '9G', 'TUNGGU WIRE', 'WAITING MATERIAL', 'W/H'),
(162, '10A', 'SHORTAGE MATERIAL', 'WAITING MATERIAL', 'IC'),
(163, '11A', 'TUNGGU VERIFIKASI ', 'DELAY IN WORK', 'QA-QC'),
(164, '11B', 'TUNGGU SAMPLE BUZZER', 'DELAY IN WORK', 'QA-QC'),
(165, '11C', 'DOUBLE CHECK PROBLEM', 'MACHINE STOPPAGE', 'QA-QC'),
(166, '11D', 'MATERIAL PROBLEM QA RECEIVING', 'WAITING MATERIAL', 'QA-QC'),
(167, '11E', 'OTHER QA-QC PROBLEM', 'DELAY IN WORK', 'QA-QC'),
(168, '12A', 'KANBAN BELUM RELEASE', 'MISSING ORDER', 'NYS'),
(169, '12B', 'KANBAN PROBLEM', 'MISSING ORDER', 'NYS'),
(170, '12C', 'SALAH MATRIK BONDER', 'MISSING ORDER', 'NYS'),
(171, '12D', 'MACHINE LOADING BELUM RELEASE', 'MISSING ORDER', 'NYS'),
(172, '12E', 'MACHINE LOADING PROBLEM', 'MISSING ORDER', 'NYS'),
(173, '12F', 'PROBLEM PREPARATION PRE-ASSY', 'MISSING ORDER', 'NYS'),
(174, '12G', 'OVERLOAD MACHINE LOADING', 'MISSING ORDER', 'NYS'),
(175, '12H', 'DELAY RELEASE CIK', 'MISSING ORDER', 'NYS'),
(176, '12I', 'OTHER NYS PROBLEM', 'MISSING ORDER', 'NYS'),
(177, '13A', 'KANBAN BELUM RELEASE', 'MISSING ORDER', 'PP'),
(178, '13B', 'KANBAN PROBLEM', 'MISSING ORDER', 'PP'),
(179, '13C', 'SALAH MATRIK', 'MISSING ORDER', 'PP'),
(180, '13D', 'PROBLEM SWCT', 'MISSING ORDER', 'PP'),
(181, '13E', 'SALAH DRAWING SAKIHAME', 'MISSING ORDER', 'PP'),
(182, '13F', 'OTHER PP PROBLEM', 'MISSING ORDER', 'PP'),
(183, '14A', 'DELAY KEDATANGAN COMPONENT PACKING', 'DELAY IN WORK', 'PUCHASING'),
(184, '14B', 'SALAH KEDATANGAN COMPONENT PACKING', 'MISSING ORDER', 'PUCHASING'),
(185, '14C', 'SALAH ORDER COMPONENT PACKING', 'MISSING ORDER', 'PUCHASING'),
(186, '8A', 'TUNGGU LAYER PACKING', 'WAITING MATERIAL', 'EXIM'),
(187, '9H', 'OTHER W/H DOWN TIME', 'WAITING MATERIAL', 'W/H');

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
-- Struktur dari tabel `jenis_pasi`
--

CREATE TABLE `jenis_pasi` (
  `id` int(11) NOT NULL,
  `Kodepasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_pasi`
--

INSERT INTO `jenis_pasi` (`id`, `Kodepasi`) VALUES
(3, 'DEFECT OCCURENCE'),
(2, 'DELAY IN WORK'),
(7, 'MACHINE STOPPAGE'),
(10, 'MISSING ORDER'),
(1, 'PREPARATION TIME'),
(11, 'WAITING MATERIAL');

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
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id` int(11) NOT NULL,
  `jabatan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id`, `jabatan`) VALUES
(1, 'Admin'),
(2, 'Line Leader'),
(3, 'Group Leader Inspect'),
(4, 'Group Leader Assy');

-- --------------------------------------------------------

--
-- Struktur dari tabel `line`
--

CREATE TABLE `line` (
  `id` int(11) NOT NULL,
  `nama_line` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `line`
--

INSERT INTO `line` (`id`, `nama_line`) VALUES
(29, '7B'),
(30, '8A'),
(31, '7A'),
(32, '3B'),
(33, '6B'),
(34, '5C'),
(35, '5A'),
(36, '4B'),
(37, '3C'),
(38, '15C'),
(39, '12B'),
(40, '13B'),
(41, '14A'),
(42, '15A'),
(43, '16A'),
(44, '01C'),
(45, '02A'),
(46, '2A (140)'),
(47, '2A (185)'),
(48, '2A (223)'),
(49, '13A'),
(50, 'JP-4'),
(51, '2C'),
(52, '3C-SBS'),
(53, '4A'),
(54, '5B'),
(55, '6C'),
(56, '7C'),
(57, '9A'),
(58, 'JP-2'),
(59, '14B'),
(60, '10A'),
(61, '10C'),
(62, 'JP3'),
(63, '11C'),
(64, '13C'),
(65, '17C'),
(66, '18B'),
(67, '19A'),
(68, '19C'),
(69, '20B'),
(70, '23B'),
(71, '24B'),
(72, '25B'),
(73, '26B'),
(74, '27B');

-- --------------------------------------------------------

--
-- Struktur dari tabel `line_manager`
--

CREATE TABLE `line_manager` (
  `id` int(11) NOT NULL,
  `id_list_carline` int(11) NOT NULL,
  `id_assy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `line_manager`
--

INSERT INTO `line_manager` (`id`, `id_list_carline`, `id_assy`) VALUES
(19, 29, 1198),
(20, 59, 1199),
(21, 59, 1200),
(270, 28, 1198),
(271, 28, 1199),
(272, 28, 1200),
(273, 28, 1201),
(274, 28, 1478),
(275, 27, 1200),
(276, 27, 1202),
(277, 46, 1201),
(278, 42, 1199),
(279, 38, 1199),
(280, 38, 1200),
(281, 38, 1201);

-- --------------------------------------------------------

--
-- Struktur dari tabel `list_carline`
--

CREATE TABLE `list_carline` (
  `id` int(11) NOT NULL,
  `id_carline` int(11) NOT NULL,
  `id_line` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `list_carline`
--

INSERT INTO `list_carline` (`id`, `id_carline`, `id_line`, `status`) VALUES
(12, 4, 29, 1),
(13, 5, 30, 1),
(14, 5, 31, 1),
(15, 5, 32, 1),
(16, 6, 33, 1),
(17, 6, 34, 1),
(18, 6, 35, 1),
(19, 7, 36, 1),
(20, 7, 37, 1),
(21, 8, 38, 1),
(22, 9, 39, 1),
(23, 9, 40, 1),
(24, 9, 41, 1),
(25, 9, 42, 1),
(26, 9, 43, 1),
(27, 10, 44, 1),
(28, 10, 45, 1),
(29, 11, 46, 1),
(30, 11, 47, 1),
(31, 11, 48, 1),
(32, 11, 49, 1),
(33, 11, 50, 1),
(34, 12, 51, 1),
(35, 13, 52, 1),
(36, 13, 32, 1),
(37, 13, 53, 1),
(38, 14, 36, 1),
(39, 14, 54, 1),
(40, 14, 34, 1),
(41, 14, 55, 1),
(42, 15, 35, 1),
(43, 16, 56, 1),
(44, 16, 57, 1),
(45, 17, 58, 1),
(46, 17, 59, 1),
(47, 18, 60, 1),
(48, 18, 61, 1),
(50, 20, 63, 1),
(51, 20, 39, 1),
(52, 20, 64, 1),
(54, 21, 42, 1),
(55, 21, 38, 1),
(56, 21, 65, 1),
(57, 21, 66, 1),
(58, 21, 67, 1),
(59, 22, 68, 1),
(60, 22, 69, 1),
(61, 22, 70, 1),
(62, 22, 71, 1),
(63, 22, 72, 1),
(64, 22, 73, 1),
(65, 22, 74, 1),
(69, 26, 30, 1),
(70, 27, 32, 1),
(71, 27, 33, 1);

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `main_pdo`
--

CREATE TABLE `main_pdo` (
  `id` int(11) NOT NULL,
  `id_shift` int(11) NOT NULL,
  `id_listcarline` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
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
  `waktu` datetime DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Struktur dari tabel `spv_manager`
--

CREATE TABLE `spv_manager` (
  `id` int(11) NOT NULL,
  `id_supervisor` int(11) NOT NULL,
  `id_list_carline` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `spv_manager`
--

INSERT INTO `spv_manager` (`id`, `id_supervisor`, `id_list_carline`) VALUES
(9, 10, 50),
(10, 10, 51),
(11, 10, 52),
(13, 10, 27),
(14, 13, 59),
(15, 13, 38),
(16, 13, 28);

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
(10, 1641720001, 'Rasyidi', 123456),
(13, 123456, 'Purnama', 123456);

-- --------------------------------------------------------

--
-- Struktur dari tabel `target`
--

CREATE TABLE `target` (
  `id` int(11) NOT NULL,
  `id_list_carline` int(11) NOT NULL,
  `mh_out` double NOT NULL,
  `mh_in` double NOT NULL,
  `efisiensi` double NOT NULL,
  `plan_assy` double NOT NULL,
  `periode` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `target`
--

INSERT INTO `target` (`id`, `id_list_carline`, `mh_out`, `mh_in`, `efisiensi`, `plan_assy`, `periode`) VALUES
(13, 38, 300, 480, 93, 120, '2019-07-01'),
(14, 38, 300, 480, 93, 120, '2019-07-02'),
(15, 38, 300, 480, 93, 120, '2019-07-03'),
(16, 38, 300, 480, 93, 120, '2019-07-04'),
(17, 38, 300, 480, 93, 120, '2019-07-05'),
(18, 38, 300, 480, 93, 120, '2019-07-06'),
(19, 38, 300, 480, 93, 120, '2019-07-07'),
(20, 38, 300, 480, 93, 120, '2019-07-08'),
(21, 38, 300, 480, 93, 120, '2019-07-09'),
(22, 38, 300, 480, 93, 120, '2019-07-10'),
(23, 38, 300, 480, 93, 120, '2019-07-11'),
(24, 38, 300, 480, 93, 120, '2019-07-12'),
(25, 38, 300, 480, 93, 120, '2019-07-13'),
(26, 38, 300, 480, 93, 120, '2019-07-14'),
(27, 38, 300, 480, 93, 120, '2019-07-15'),
(28, 38, 300, 480, 93, 120, '2019-07-16'),
(29, 38, 300, 480, 93, 120, '2019-07-17'),
(30, 38, 300, 480, 100, 120, '2019-07-18'),
(31, 38, 300, 480, 100, 120, '2019-07-19'),
(32, 38, 300, 480, 100, 120, '2019-07-20'),
(33, 38, 300, 480, 100, 120, '2019-07-21'),
(34, 38, 300, 480, 100, 120, '2019-07-22'),
(35, 38, 300, 480, 100, 120, '2019-07-23'),
(36, 38, 300, 480, 100, 120, '2019-07-24'),
(37, 38, 300, 480, 100, 120, '2019-07-25'),
(38, 38, 300, 480, 100, 120, '2019-07-26'),
(39, 38, 300, 480, 100, 120, '2019-07-27'),
(40, 38, 300, 480, 100, 120, '2019-07-28'),
(41, 38, 300, 480, 100, 120, '2019-07-29'),
(42, 38, 300, 480, 100, 120, '2019-07-30'),
(43, 38, 300, 480, 100, 120, '2019-07-31'),
(44, 59, 320, 480, 93, 120, '2019-07-01'),
(45, 59, 320, 480, 93, 120, '2019-07-02'),
(46, 59, 320, 480, 93, 120, '2019-07-03'),
(47, 59, 320, 480, 93, 120, '2019-07-04'),
(48, 59, 320, 480, 93, 120, '2019-07-05'),
(49, 59, 320, 480, 93, 120, '2019-07-06'),
(50, 59, 320, 480, 93, 120, '2019-07-07'),
(51, 59, 320, 480, 93, 120, '2019-07-08'),
(52, 59, 320, 480, 93, 120, '2019-07-09'),
(53, 59, 320, 480, 93, 120, '2019-07-10'),
(54, 59, 320, 480, 93, 120, '2019-07-11'),
(55, 59, 320, 480, 93, 120, '2019-07-12'),
(56, 59, 320, 480, 93, 120, '2019-07-13'),
(57, 59, 320, 480, 93, 120, '2019-07-14'),
(58, 59, 320, 480, 93, 120, '2019-07-15'),
(59, 59, 320, 480, 93, 120, '2019-07-16'),
(60, 59, 320, 480, 93, 120, '2019-07-17'),
(61, 59, 320, 480, 95, 120, '2019-07-18'),
(62, 59, 320, 480, 95, 120, '2019-07-19'),
(63, 59, 320, 480, 95, 120, '2019-07-20'),
(64, 59, 320, 480, 95, 120, '2019-07-21'),
(65, 59, 320, 480, 95, 120, '2019-07-22'),
(66, 59, 320, 480, 95, 120, '2019-07-23'),
(67, 59, 320, 480, 95, 120, '2019-07-24'),
(68, 59, 320, 480, 95, 120, '2019-07-25'),
(69, 59, 320, 480, 95, 120, '2019-07-26'),
(70, 59, 320, 480, 95, 120, '2019-07-27'),
(71, 59, 320, 480, 95, 120, '2019-07-28'),
(72, 59, 320, 480, 95, 120, '2019-07-29'),
(73, 59, 320, 480, 95, 120, '2019-07-30'),
(74, 59, 320, 480, 95, 120, '2019-07-31'),
(75, 28, 100, 100, 93, 120, '2019-07-01'),
(76, 28, 100, 100, 93, 120, '2019-07-02'),
(77, 28, 100, 100, 93, 120, '2019-07-03'),
(78, 28, 100, 100, 93, 120, '2019-07-04'),
(79, 28, 100, 100, 93, 120, '2019-07-05'),
(80, 28, 100, 100, 93, 120, '2019-07-06'),
(81, 28, 100, 100, 93, 120, '2019-07-07'),
(82, 28, 100, 100, 93, 120, '2019-07-08'),
(83, 28, 100, 100, 93, 120, '2019-07-09'),
(84, 28, 100, 100, 93, 120, '2019-07-10'),
(85, 28, 100, 100, 93, 120, '2019-07-11'),
(86, 28, 100, 100, 93, 120, '2019-07-12'),
(87, 28, 100, 100, 93, 120, '2019-07-13'),
(88, 28, 100, 100, 93, 120, '2019-07-14'),
(89, 28, 100, 100, 93, 120, '2019-07-15'),
(90, 28, 100, 100, 93, 120, '2019-07-16'),
(91, 28, 100, 100, 93, 120, '2019-07-17'),
(92, 28, 100, 100, 95, 120, '2019-07-18'),
(93, 28, 100, 100, 95, 120, '2019-07-19'),
(94, 28, 100, 100, 95, 120, '2019-07-20'),
(95, 28, 100, 100, 95, 120, '2019-07-21'),
(96, 28, 100, 100, 95, 120, '2019-07-22'),
(97, 28, 100, 100, 95, 120, '2019-07-23'),
(98, 28, 100, 100, 95, 120, '2019-07-24'),
(99, 28, 100, 100, 95, 120, '2019-07-25'),
(100, 28, 100, 100, 95, 120, '2019-07-26'),
(101, 28, 100, 100, 95, 120, '2019-07-27'),
(102, 28, 100, 100, 95, 120, '2019-07-28'),
(103, 28, 100, 100, 95, 120, '2019-07-29'),
(104, 28, 100, 100, 95, 120, '2019-07-30'),
(105, 28, 100, 100, 95, 120, '2019-07-31'),
(106, 27, 200, 200, 93, 120, '2019-07-01'),
(107, 27, 200, 200, 93, 120, '2019-07-02'),
(108, 27, 200, 200, 93, 120, '2019-07-03'),
(109, 27, 200, 200, 93, 120, '2019-07-04'),
(110, 27, 200, 200, 93, 120, '2019-07-05'),
(111, 27, 200, 200, 93, 120, '2019-07-06'),
(112, 27, 200, 200, 93, 120, '2019-07-07'),
(113, 27, 200, 200, 93, 120, '2019-07-08'),
(114, 27, 200, 200, 93, 120, '2019-07-09'),
(115, 27, 200, 200, 93, 120, '2019-07-10'),
(116, 27, 200, 200, 93, 120, '2019-07-11'),
(117, 27, 200, 200, 93, 120, '2019-07-12'),
(118, 27, 200, 200, 93, 120, '2019-07-13'),
(119, 27, 200, 200, 93, 120, '2019-07-14'),
(120, 27, 200, 200, 93, 120, '2019-07-15'),
(121, 27, 200, 200, 95, 120, '2019-07-16'),
(122, 27, 200, 200, 95, 120, '2019-07-17'),
(123, 27, 200, 200, 95, 120, '2019-07-18'),
(124, 27, 200, 200, 95, 120, '2019-07-19'),
(125, 27, 200, 200, 95, 120, '2019-07-20'),
(126, 27, 200, 200, 95, 120, '2019-07-21'),
(127, 27, 200, 200, 95, 120, '2019-07-22'),
(128, 27, 200, 200, 95, 120, '2019-07-23'),
(129, 27, 200, 200, 95, 120, '2019-07-24'),
(130, 27, 200, 200, 95, 120, '2019-07-25'),
(131, 27, 200, 200, 95, 120, '2019-07-26'),
(132, 27, 200, 200, 95, 120, '2019-07-27'),
(133, 27, 200, 200, 95, 120, '2019-07-28'),
(134, 27, 200, 200, 95, 120, '2019-07-29'),
(135, 27, 200, 200, 95, 120, '2019-07-30'),
(136, 27, 200, 200, 95, 120, '2019-07-31'),
(137, 28, 450, 430, 99, 400, '2019-08-01'),
(138, 28, 450, 640, 99, 400, '2019-08-02'),
(139, 28, 450, 640, 99, 400, '2019-08-03'),
(140, 28, 450, 640, 99, 400, '2019-08-04'),
(141, 28, 450, 640, 99, 400, '2019-08-05'),
(142, 28, 450, 640, 99, 400, '2019-08-06'),
(143, 28, 450, 640, 99, 400, '2019-08-07'),
(144, 28, 450, 640, 99, 400, '2019-08-08'),
(145, 28, 450, 640, 99, 400, '2019-08-09'),
(146, 28, 450, 640, 99, 400, '2019-08-10'),
(147, 28, 450, 640, 99, 400, '2019-08-11'),
(148, 28, 450, 640, 99, 400, '2019-08-12'),
(149, 28, 450, 640, 99, 400, '2019-08-13'),
(150, 28, 450, 640, 99, 400, '2019-08-14'),
(151, 28, 450, 640, 99, 400, '2019-08-15'),
(152, 28, 450, 640, 99, 400, '2019-08-16'),
(153, 28, 450, 640, 99, 400, '2019-08-17'),
(154, 28, 450, 640, 99, 400, '2019-08-18'),
(155, 28, 450, 640, 99, 400, '2019-08-19'),
(156, 28, 450, 640, 99, 400, '2019-08-20'),
(157, 28, 450, 640, 99, 400, '2019-08-21'),
(158, 28, 450, 640, 99, 400, '2019-08-22'),
(159, 28, 450, 640, 99, 400, '2019-08-23'),
(160, 28, 450, 640, 99, 400, '2019-08-24'),
(161, 28, 450, 640, 99, 400, '2019-08-25'),
(162, 28, 450, 640, 99, 400, '2019-08-26'),
(163, 28, 450, 640, 99, 400, '2019-08-27'),
(164, 28, 450, 640, 99, 400, '2019-08-28'),
(165, 28, 450, 640, 99, 400, '2019-08-29'),
(166, 28, 450, 640, 99, 400, '2019-08-30'),
(167, 28, 450, 640, 99, 400, '2019-08-31'),
(168, 12, 280, 330, 93, 300, '2019-09-01'),
(169, 12, 280, 330, 93, 300, '2019-09-02'),
(170, 12, 280, 330, 93, 300, '2019-09-03'),
(171, 12, 280, 330, 93, 300, '2019-09-04'),
(172, 12, 280, 330, 93, 300, '2019-09-05'),
(173, 12, 280, 330, 93, 300, '2019-09-06'),
(174, 12, 280, 330, 93, 300, '2019-09-07'),
(175, 12, 280, 330, 93, 300, '2019-09-08'),
(176, 12, 280, 330, 93, 300, '2019-09-09'),
(177, 12, 280, 330, 93, 300, '2019-09-10'),
(178, 12, 280, 330, 93, 300, '2019-09-11'),
(179, 12, 280, 330, 93, 300, '2019-09-12'),
(180, 12, 280, 330, 93, 300, '2019-09-13'),
(181, 12, 280, 330, 93, 300, '2019-09-14'),
(182, 12, 280, 330, 93, 300, '2019-09-15'),
(183, 12, 280, 330, 93, 300, '2019-09-16'),
(184, 12, 280, 330, 93, 300, '2019-09-17'),
(185, 12, 280, 330, 93, 300, '2019-09-18'),
(186, 12, 280, 330, 93, 300, '2019-09-19'),
(187, 12, 280, 330, 93, 300, '2019-09-20'),
(188, 12, 280, 330, 93, 300, '2019-09-21'),
(189, 12, 280, 330, 93, 300, '2019-09-22'),
(190, 12, 280, 330, 93, 300, '2019-09-23'),
(191, 12, 280, 330, 93, 300, '2019-09-24'),
(192, 12, 280, 330, 93, 300, '2019-09-25'),
(193, 12, 280, 330, 93, 300, '2019-09-26'),
(194, 12, 280, 330, 95, 300, '2019-09-27'),
(195, 12, 280, 330, 95, 300, '2019-09-28'),
(196, 12, 280, 330, 95, 300, '2019-09-29'),
(197, 12, 280, 330, 95, 300, '2019-09-30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `level` int(11) NOT NULL,
  `id_shift` int(11) NOT NULL,
  `id_district` int(11) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `nik`, `username`, `password`, `level`, `id_shift`, `id_district`, `active`) VALUES
(1, 'rra', '1212', 'rasy', 'rasy', 1, 1, 1, 1),
(32, 'ana Admin', '124124', 'ana', 'a', 1, 1, 2, 1),
(33, 'Wildan', '808080', 'wildan', 'a', 4, 1, 1, 1),
(34, 'EKA', '8196', 'Eka8196', '180492', 4, 2, 1, 1),
(35, 'DINI', '9249', 'Dewi9249', '9249', 3, 2, 1, 1),
(36, 'FARIDA', '865', 'Farida', 'Farida865', 2, 2, 1, 1),
(37, 'DIAH', '399', 'Dio3012', '399', 4, 2, 1, 1),
(38, 'DANING', '9689', 'Arinta03', '968907', 4, 2, 1, 1),
(39, 'RIZKY', '8065', 'Rizky29', '806512', 4, 1, 1, 1),
(40, ' MISTIO', '4647', 'MISCHA', '14154647', 3, 2, 1, 1),
(41, 'ITA D', '370', 'Itadewe', '370@02', 2, 2, 1, 1),
(42, 'ENOK', '2319', 'Enok2319', '160485', 4, 2, 1, 1),
(43, 'TUTIK', '789', 'Twi789', '81083', 3, 2, 1, 1),
(44, 'ARIS', '1241', 'Aris185', '100482', 4, 2, 1, 1),
(45, 'LISA', '1322', 'Liza04', '404019', 3, 2, 1, 1),
(46, 'IKA YUNITA', '1949', 'sasava', '353835', 2, 2, 1, 1),
(48, 'HANIM', '18319', 'Hanimmu', '170495', 4, 2, 1, 1),
(49, 'IIN DARWATI', '76', 'Iindewe', '110380', 2, 2, 1, 1),
(50, 'SITI SOLIKAH', '7182', 'Shol7182', 'Kirana01', 4, 2, 1, 1),
(52, 'SUYANTI', '7255', 'Yan7255', 'Kawi123', 4, 2, 1, 1),
(53, 'NENY', '2225', 'neny2225', 'Mareteo', 3, 2, 1, 1),
(54, 'SITI KHOTIJAH', '767', 'MAKNYAK NYAK82', 'NYAK82', 2, 2, 1, 1),
(55, 'DEASI', '558', 'Deasi123', 'FIORENZA', 2, 2, 1, 1),
(56, 'NANIK', '8461', 'NANIK0512', 'NANIK46', 4, 2, 1, 1),
(57, 'SITI PUJIATI', '609', 'STP609', 'ALPH4RD', 4, 2, 1, 1),
(58, 'ROSITA', '1736', 'Rosi1736', 'Rose07', 3, 2, 1, 1),
(59, 'ANIK WINARTI', '303', 'ANIK303', '9212629', 2, 2, 1, 1),
(60, 'MAIWATI', '1442', 'Maiwa@', 'Tirta99', 2, 2, 1, 1),
(61, 'RIRIS A', '7396', 'RIRIS46', '115106', 4, 2, 1, 1),
(62, 'YATINI', '546', 'Bosyat', '546', 4, 2, 1, 1),
(63, 'IPINASARI', '8348', 'Nanohana', 'Yu@nzA', 4, 2, 1, 1),
(64, 'DEVI', '6844', 'Shakuyaku', '33_5_44', 4, 2, 1, 1),
(65, 'FITRI/KEPRET', '9364', 'Haiiik_', 'K_3P12_ET', 3, 2, 1, 1),
(66, 'OKTA', '263', 'Olan06', 'Oktaolan', 2, 2, 1, 1),
(67, 'Fevri', '153', 'FEVRIN', '220282', 3, 2, 1, 1),
(68, 'WAHYU', '2269', 'WAHYU.H', '226923', 2, 2, 1, 1),
(69, 'ENI', '5960', 'ENY6950', '11190', 4, 2, 1, 1),
(70, 'ANITA', '7945', '4N1T4W', '7945', 4, 2, 1, 1),
(71, 'RINI N', '235', 'Rini235', '170382', 2, 2, 1, 1),
(72, 'HARI K', '1564', 'Hary4310', '431D1564', 2, 2, 1, 1),
(73, 'RESTU URIFA', '9385', 'Retzhiu@U', 'Alfa1510', 4, 2, 1, 1),
(74, 'FERA B', '24', 'RAYNELLE', 'TioVA1', 3, 2, 1, 1),
(75, 'PURWATI', '475', 'NAWWAF', 'Pweed475', 2, 2, 1, 1),
(76, 'ANI', '2511', 'Ani2511', '130686', 4, 2, 1, 1),
(77, 'YUNITA', '4426', 'Ynt4426', '901288', 4, 2, 1, 1),
(78, 'LENI TRI U', '19834', 'LENI13', '225511', 3, 2, 1, 1),
(79, 'NURHAYATI', '148', 'NUR148', '11282', 2, 2, 1, 1),
(80, 'LENA', '847', 'Lena.A', 'Lena@123', 2, 1, 1, 1),
(81, 'ERLITA', '1685', 'Erlita', '@Verlita', 2, 1, 1, 1),
(82, 'TRI ', '2545', 'Treekk', 'Trek@123', 3, 1, 1, 1),
(83, 'IKA ', '7329', 'Ika@_A', 'Ika@1234', 4, 1, 1, 1),
(84, 'LELI', '9370', 'Leli.A', 'Leli@123', 4, 1, 1, 1),
(85, 'SA\'IDAH', '7980', 'Say_04', 'Say@1234', 3, 1, 1, 1),
(86, 'VIRO', '3883', 'Viro15', 'Viro1506', 4, 1, 1, 1),
(87, 'RINDI', '8769', 'Rindi@', 'Rindi123', 4, 1, 1, 1),
(88, 'MAMIK', '28', 'Mamiks', 'mams1234', 3, 1, 1, 1),
(89, 'ENDAH', '1306', 'Endah.C', 'atiya03', 3, 1, 1, 1),
(90, 'LILIS', '2213', 'Lilis.m', 'Mbe_Li5', 2, 1, 1, 1),
(91, 'AINUN', '9563', 'AINUN.M', 'Ain_UN', 4, 1, 1, 1),
(92, 'FENY', '1688', 'pepenk', 'pepenk1688', 3, 1, 1, 1),
(93, 'ISNANIK SUSI DEWI', '1141', 'Dewo', 'Dewow.2545', 4, 1, 1, 1),
(94, 'NIA ', '1677', 'DWI.K', 'DWI.K123', 2, 1, 1, 1),
(95, 'LILIK K', '3927', 'Lilik.K', 'Lilik.K123', 3, 1, 1, 1),
(96, 'YENI', '11532', 'Yeni.P', 'yeni.p123', 4, 1, 1, 1),
(97, 'INDAH', '7011', 'Indah.25B', 'Indah123', 4, 1, 1, 1),
(98, 'Iismin', '835', 'Ismin.25B', 'Ismin123', 3, 1, 1, 1),
(99, 'YUNI', '2278', 'Yuni.25B', 'Yuni123', 2, 1, 1, 1),
(100, 'NENVY', '7678', 'Nenvy.27B', 'Nenvy123', 4, 1, 1, 1),
(101, 'ERNA', '2624', 'Ern@.Wid', '123456', 4, 1, 1, 1),
(102, 'MASFUFAH', '226', 'MASFUFAH', '123456', 3, 1, 1, 1),
(103, 'WAHYU', '241', 'wahyu241', '123456', 2, 1, 1, 1),
(104, 'CATUR', '65', 'CATUR.S', '123456', 2, 1, 1, 1),
(105, 'MALASARI', '13200', 'Malasari', '123456', 4, 1, 1, 1),
(106, 'Utari', '8043', 'Utari.AN', '123456', 3, 1, 1, 1),
(107, 'CICIT', '1425', 'cicit', '123456', 3, 1, 1, 1),
(108, 'YAYUK', '2275', 'yayuk12', '123456', 4, 1, 1, 1),
(109, 'YULI', '7628', 'yulipus', '123456', 4, 1, 1, 1),
(110, 'MURYANTI', '6683', 'MURYA', '123456', 3, 1, 1, 1),
(111, 'NINIK', '1150', 'NKO123', '123456', 2, 1, 1, 1),
(112, 'NIA ', '3626', '140487', '123456', 4, 1, 1, 1),
(113, 'DESTI', '8142', 'DESTYnona', '123456', 4, 1, 1, 1),
(114, 'MAVIROTIN', '6604', 'mavi24', '123456', 4, 1, 1, 1),
(115, 'LALA', '9270', 'LalaBEE', '123456', 4, 1, 1, 1),
(116, 'SUSI', '102', 'susi.102', '123456', 2, 1, 1, 1),
(117, 'ANISA', '11878', 'Upinipin', '123456', 4, 1, 1, 1),
(118, 'KHOIROTIN', '14908', 'Ipinupin', '123456', 4, 1, 1, 1),
(119, 'RIRIN', '12927', 'BengBeng', '123456', 4, 1, 1, 1),
(120, 'JUNARTI', '3469', 'junarti', 'jun_3d', 4, 1, 1, 1),
(121, 'NINIK', '7579', 'Ninik.S', 'Markongg', 4, 1, 1, 1),
(122, 'YAYAK', '9578', 'yayak', '123456', 4, 1, 1, 1),
(123, 'coba11', '121212121', 'co1', '1234', 4, 1, 1, 0),
(124, 'coba11', '123', 'co2', '123s', 4, 1, 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_has_line`
--

CREATE TABLE `user_has_line` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_listcarline` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_has_line`
--

INSERT INTO `user_has_line` (`id`, `id_user`, `id_listcarline`) VALUES
(1, 33, 38),
(2, 34, 27),
(3, 35, 27),
(4, 35, 28),
(5, 35, 36),
(6, 36, 27),
(7, 36, 28),
(8, 36, 36),
(9, 36, 37),
(10, 37, 28),
(11, 38, 36),
(13, 40, 37),
(14, 40, 38),
(15, 40, 39),
(16, 41, 54),
(17, 41, 55),
(18, 41, 56),
(19, 41, 57),
(20, 41, 58),
(21, 42, 55),
(22, 43, 52),
(23, 43, 55),
(24, 44, 57),
(25, 45, 56),
(26, 45, 57),
(27, 45, 58),
(106, 48, 58),
(107, 49, 59),
(108, 49, 60),
(109, 50, 59),
(111, 52, 60),
(112, 53, 59),
(113, 53, 60),
(114, 54, 50),
(115, 54, 51),
(116, 54, 52),
(137, 56, 52),
(138, 57, 50),
(139, 58, 50),
(140, 58, 51),
(141, 59, 42),
(142, 59, 50),
(143, 59, 51),
(144, 59, 52),
(146, 59, 27),
(147, 59, 28),
(148, 59, 59),
(149, 59, 60),
(150, 59, 61),
(151, 59, 62),
(152, 59, 63),
(153, 59, 64),
(154, 59, 65),
(155, 59, 47),
(156, 59, 48),
(157, 59, 35),
(158, 59, 36),
(159, 59, 37),
(160, 59, 45),
(161, 59, 46),
(162, 59, 54),
(163, 59, 55),
(164, 59, 56),
(165, 59, 57),
(166, 59, 58),
(168, 59, 43),
(169, 59, 44),
(170, 59, 38),
(171, 59, 39),
(172, 59, 40),
(173, 59, 41),
(174, 59, 34),
(175, 59, 29),
(176, 59, 30),
(177, 59, 31),
(178, 59, 32),
(179, 59, 33),
(180, 60, 38),
(181, 60, 39),
(182, 61, 38),
(183, 62, 39),
(184, 63, 41),
(185, 64, 59),
(186, 65, 40),
(187, 65, 41),
(188, 66, 40),
(189, 66, 41),
(190, 67, 47),
(191, 67, 48),
(192, 67, 45),
(193, 68, 47),
(194, 68, 48),
(195, 68, 45),
(196, 69, 47),
(197, 70, 45),
(237, 72, 42),
(238, 72, 50),
(239, 72, 51),
(240, 72, 52),
(242, 72, 27),
(243, 72, 28),
(244, 72, 59),
(245, 72, 60),
(246, 72, 61),
(247, 72, 62),
(248, 72, 63),
(249, 72, 64),
(250, 72, 65),
(251, 72, 47),
(252, 72, 48),
(253, 72, 35),
(254, 72, 36),
(255, 72, 37),
(256, 72, 45),
(257, 72, 46),
(258, 72, 54),
(259, 72, 55),
(260, 72, 56),
(261, 72, 57),
(262, 72, 58),
(264, 72, 43),
(265, 72, 44),
(266, 72, 38),
(267, 72, 39),
(268, 72, 40),
(269, 72, 41),
(270, 72, 34),
(271, 72, 29),
(272, 72, 30),
(273, 72, 31),
(274, 72, 32),
(275, 72, 33),
(276, 73, 61),
(277, 74, 61),
(278, 74, 63),
(279, 75, 61),
(280, 75, 63),
(281, 76, 63),
(282, 77, 65),
(283, 78, 65),
(284, 79, 65),
(327, 71, 42),
(328, 71, 27),
(329, 71, 28),
(330, 71, 47),
(331, 71, 48),
(332, 71, 35),
(333, 71, 36),
(334, 71, 37),
(335, 71, 45),
(337, 71, 43),
(338, 71, 44),
(339, 71, 38),
(340, 71, 39),
(341, 71, 40),
(342, 71, 41),
(343, 71, 34),
(344, 71, 29),
(345, 71, 30),
(346, 71, 31),
(347, 71, 33),
(348, 55, 50),
(349, 55, 51),
(350, 55, 52),
(351, 55, 59),
(352, 55, 60),
(353, 55, 46),
(354, 55, 54),
(355, 55, 55),
(356, 55, 56),
(357, 55, 57),
(358, 55, 58),
(359, 55, 32),
(361, 46, 42),
(362, 46, 50),
(363, 46, 51),
(364, 46, 52),
(366, 46, 27),
(367, 46, 28),
(368, 46, 59),
(369, 46, 60),
(370, 46, 61),
(371, 46, 62),
(372, 46, 63),
(373, 46, 64),
(374, 46, 65),
(375, 46, 47),
(376, 46, 48),
(377, 46, 35),
(378, 46, 36),
(379, 46, 37),
(380, 46, 45),
(381, 46, 46),
(382, 46, 54),
(383, 46, 55),
(384, 46, 56),
(385, 46, 57),
(386, 46, 58),
(388, 46, 43),
(389, 46, 44),
(390, 46, 38),
(391, 46, 39),
(392, 46, 40),
(393, 46, 41),
(394, 46, 34),
(395, 46, 29),
(396, 46, 30),
(397, 46, 31),
(398, 46, 32),
(399, 46, 33),
(400, 80, 46),
(401, 80, 55),
(402, 81, 50),
(403, 81, 51),
(404, 81, 52),
(405, 82, 46),
(406, 82, 55),
(407, 83, 55),
(408, 84, 46),
(409, 85, 50),
(410, 86, 51),
(411, 87, 52),
(412, 87, 32),
(414, 88, 57),
(415, 88, 58),
(416, 89, 59),
(417, 89, 60),
(418, 90, 59),
(419, 90, 60),
(420, 90, 62),
(421, 91, 62),
(422, 92, 61),
(423, 92, 62),
(424, 93, 62),
(425, 94, 57),
(426, 94, 58),
(427, 95, 27),
(428, 95, 28),
(429, 95, 36),
(430, 96, 60),
(431, 97, 63),
(432, 98, 63),
(433, 98, 65),
(434, 99, 61),
(435, 99, 63),
(436, 99, 65),
(437, 100, 65),
(438, 101, 39),
(439, 102, 50),
(440, 102, 51),
(441, 102, 52),
(442, 102, 32),
(443, 103, 36),
(444, 103, 37),
(445, 103, 38),
(446, 104, 39),
(447, 104, 40),
(448, 104, 41),
(449, 105, 27),
(450, 106, 40),
(451, 106, 41),
(454, 107, 37),
(455, 107, 38),
(456, 107, 39),
(457, 108, 47),
(458, 109, 47),
(459, 110, 43),
(460, 110, 47),
(461, 111, 43),
(462, 111, 47),
(463, 112, 43),
(464, 113, 40),
(465, 114, 38),
(466, 115, 38),
(467, 116, 27),
(468, 116, 28),
(470, 39, 37),
(471, 117, 41),
(472, 118, 41),
(473, 119, 28),
(474, 120, 59),
(475, 121, 59),
(476, 122, 36),
(477, 123, 50),
(478, 124, 50);

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
-- Indeks untuk tabel `balance_produksi`
--
ALTER TABLE `balance_produksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_lstcrli_tbllstcrline` (`id_listcarline`);

--
-- Indeks untuk tabel `build_assy`
--
ALTER TABLE `build_assy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idassy_tblassembly` (`id_assy`),
  ADD KEY `fk_idoc_tblOc` (`id_outputcontrol`),
  ADD KEY `fk_pdo_tblPDO` (`id_pdo`);

--
-- Indeks untuk tabel `carline`
--
ALTER TABLE `carline`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_district` (`id_district`);

--
-- Indeks untuk tabel `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `direct_labor`
--
ALTER TABLE `direct_labor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pdo` (`id_pdo`);

--
-- Indeks untuk tabel `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`);

--
-- Indeks untuk tabel `jenis_losttime`
--
ALTER TABLE `jenis_losttime`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis_pasi`
--
ALTER TABLE `jenis_pasi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Kodepasi` (`Kodepasi`);

--
-- Indeks untuk tabel `jenis_regulasi`
--
ALTER TABLE `jenis_regulasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `line`
--
ALTER TABLE `line`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `line_manager`
--
ALTER TABLE `line_manager`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_assy` (`id_assy`),
  ADD KEY `id_list_carline` (`id_list_carline`);

--
-- Indeks untuk tabel `list_carline`
--
ALTER TABLE `list_carline`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idcarline` (`id_carline`),
  ADD KEY `fk_idline` (`id_line`);

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
  ADD KEY `fk_listcarline` (`id_listcarline`);

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
-- Indeks untuk tabel `spv_manager`
--
ALTER TABLE `spv_manager`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_supervisor` (`id_supervisor`),
  ADD KEY `fk_list_carline` (`id_list_carline`);

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
  ADD KEY `fk_liscarline_targett` (`id_list_carline`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_shift_tblshift` (`id_shift`),
  ADD KEY `fk_level` (`level`),
  ADD KEY `id_district` (`id_district`);

--
-- Indeks untuk tabel `user_has_line`
--
ALTER TABLE `user_has_line`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user` (`id_user`),
  ADD KEY `fk_carline_users` (`id_listcarline`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absen_leader`
--
ALTER TABLE `absen_leader`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `absen_pegawai`
--
ALTER TABLE `absen_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `assembly`
--
ALTER TABLE `assembly`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1479;

--
-- AUTO_INCREMENT untuk tabel `balance_produksi`
--
ALTER TABLE `balance_produksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `build_assy`
--
ALTER TABLE `build_assy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- AUTO_INCREMENT untuk tabel `carline`
--
ALTER TABLE `carline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `departement`
--
ALTER TABLE `departement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `direct_labor`
--
ALTER TABLE `direct_labor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `district`
--
ALTER TABLE `district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `history_pdo`
--
ALTER TABLE `history_pdo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `indirect_activity`
--
ALTER TABLE `indirect_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT untuk tabel `jenis_losttime`
--
ALTER TABLE `jenis_losttime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `jenis_pasi`
--
ALTER TABLE `jenis_pasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `jenis_regulasi`
--
ALTER TABLE `jenis_regulasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `line`
--
ALTER TABLE `line`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT untuk tabel `line_manager`
--
ALTER TABLE `line_manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=282;

--
-- AUTO_INCREMENT untuk tabel `list_carline`
--
ALTER TABLE `list_carline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT untuk tabel `lost_time`
--
ALTER TABLE `lost_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT untuk tabel `main_pdo`
--
ALTER TABLE `main_pdo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `output_control`
--
ALTER TABLE `output_control`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT untuk tabel `quality_control`
--
ALTER TABLE `quality_control`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `regulasi`
--
ALTER TABLE `regulasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `shift`
--
ALTER TABLE `shift`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `spv_manager`
--
ALTER TABLE `spv_manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `supervisor`
--
ALTER TABLE `supervisor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `target`
--
ALTER TABLE `target`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT untuk tabel `user_has_line`
--
ALTER TABLE `user_has_line`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=479;

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
-- Ketidakleluasaan untuk tabel `balance_produksi`
--
ALTER TABLE `balance_produksi`
  ADD CONSTRAINT `fk_lstcrli_tbllstcrline` FOREIGN KEY (`id_listcarline`) REFERENCES `list_carline` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `build_assy`
--
ALTER TABLE `build_assy`
  ADD CONSTRAINT `fk_idassy_tblassembly` FOREIGN KEY (`id_assy`) REFERENCES `assembly` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_idoc_tblOc` FOREIGN KEY (`id_outputcontrol`) REFERENCES `output_control` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pdo_tblPDO` FOREIGN KEY (`id_pdo`) REFERENCES `main_pdo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `carline`
--
ALTER TABLE `carline`
  ADD CONSTRAINT `fk_district` FOREIGN KEY (`id_district`) REFERENCES `district` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Ketidakleluasaan untuk tabel `line_manager`
--
ALTER TABLE `line_manager`
  ADD CONSTRAINT `fk_id_assy` FOREIGN KEY (`id_assy`) REFERENCES `assembly` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_listcarline_assymgr` FOREIGN KEY (`id_list_carline`) REFERENCES `list_carline` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `list_carline`
--
ALTER TABLE `list_carline`
  ADD CONSTRAINT `fk_idcarline` FOREIGN KEY (`id_carline`) REFERENCES `carline` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_idline` FOREIGN KEY (`id_line`) REFERENCES `line` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `fk_listcarline` FOREIGN KEY (`id_listcarline`) REFERENCES `list_carline` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
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
-- Ketidakleluasaan untuk tabel `spv_manager`
--
ALTER TABLE `spv_manager`
  ADD CONSTRAINT `fk_id_supervisor` FOREIGN KEY (`id_supervisor`) REFERENCES `supervisor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_list_carline` FOREIGN KEY (`id_list_carline`) REFERENCES `list_carline` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `target`
--
ALTER TABLE `target`
  ADD CONSTRAINT `fk_liscarline_targett` FOREIGN KEY (`id_list_carline`) REFERENCES `list_carline` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_dis` FOREIGN KEY (`id_district`) REFERENCES `district` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_level` FOREIGN KEY (`level`) REFERENCES `level` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_shift_tblshift` FOREIGN KEY (`id_shift`) REFERENCES `shift` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_has_line`
--
ALTER TABLE `user_has_line`
  ADD CONSTRAINT `fk_carline_users` FOREIGN KEY (`id_listcarline`) REFERENCES `list_carline` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
