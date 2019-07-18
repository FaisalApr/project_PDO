-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 19 Jul 2019 pada 01.00
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
(1477, 'KN7G', 2.89915);

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
(43, 31, 20, 1199, 12, '2019-07-18 21:11:12'),
(44, 32, 20, 1199, 7, '2019-07-18 21:12:53'),
(45, 33, 20, 1199, 6, '2019-07-18 23:14:19'),
(46, 34, 20, 1199, 8, '2019-07-18 23:16:39'),
(47, 35, 20, 1199, 19, '2019-07-18 23:17:05'),
(48, 36, 20, 1199, 19, '2019-07-18 23:17:36'),
(49, 37, 20, 1199, 19, '2019-07-18 23:18:09'),
(50, 38, 20, 1199, 28, '2019-07-18 23:18:46'),
(51, 38, 20, 1200, 22, '2019-07-18 23:19:01');

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
  `nama_carline` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `carline`
--

INSERT INTO `carline` (`id`, `id_district`, `nama_carline`) VALUES
(4, 2, 'SZK'),
(5, 2, 'DAIHATSU'),
(6, 2, 'FLAT FREE'),
(7, 2, 'MTB OUTLANDER'),
(8, 2, 'MTB TK-TS'),
(9, 2, 'PRIUS'),
(10, 1, 'CHR'),
(11, 1, 'PRADO'),
(12, 1, 'PORTE'),
(13, 1, 'DEMIO'),
(14, 1, 'MAZDA'),
(15, 1, 'ACE'),
(16, 1, 'LC'),
(17, 1, 'ESTIMA'),
(18, 1, 'CROWN'),
(19, 1, 'HINO'),
(20, 1, 'ALPHARD'),
(21, 1, 'HIACE '),
(22, 1, 'COROLLA');

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
(17, 20, 60, 59, 8, 0, 0, 472, 0, 472);

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
  `menit` int(11) NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `indirect_activity`
--

INSERT INTO `indirect_activity` (`id`, `id_pdo`, `item`, `qty_mp`, `menit`, `total`) VALUES
(36, 20, '5S + Yoidon', 59, 5, 4.91667),
(37, 20, 'Home Position', 59, 4, 3.93333),
(38, 20, 'Brefing', 59, 15, 14.75);

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
(17, 20, 2, 2, 8, 0, 0, 16, 0, 16);

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
(12, '1K', 'BELUM PROSES MANUAL CRIMPING'),
(13, '0', 'Zero Downtime');

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
(21, 59, 1200);

-- --------------------------------------------------------

--
-- Struktur dari tabel `list_carline`
--

CREATE TABLE `list_carline` (
  `id` int(11) NOT NULL,
  `id_carline` int(11) NOT NULL,
  `id_line` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `list_carline`
--

INSERT INTO `list_carline` (`id`, `id_carline`, `id_line`) VALUES
(12, 4, 29),
(13, 5, 30),
(14, 5, 31),
(15, 5, 32),
(16, 6, 33),
(17, 6, 34),
(18, 6, 35),
(19, 7, 36),
(20, 7, 37),
(21, 8, 38),
(22, 9, 39),
(23, 9, 40),
(24, 9, 41),
(25, 9, 42),
(26, 9, 43),
(27, 10, 44),
(28, 10, 45),
(29, 11, 46),
(30, 11, 47),
(31, 11, 48),
(32, 11, 49),
(33, 11, 50),
(34, 12, 51),
(35, 13, 52),
(36, 13, 32),
(37, 13, 53),
(38, 14, 36),
(39, 14, 54),
(40, 14, 34),
(41, 14, 55),
(42, 15, 35),
(43, 16, 56),
(44, 16, 57),
(45, 17, 58),
(46, 17, 59),
(47, 18, 60),
(48, 18, 61),
(49, 19, 62),
(50, 20, 63),
(51, 20, 39),
(52, 20, 64),
(53, 20, 61),
(54, 21, 42),
(55, 21, 38),
(56, 21, 65),
(57, 21, 66),
(58, 21, 67),
(59, 22, 68),
(60, 22, 69),
(61, 22, 70),
(62, 22, 71),
(63, 22, 72),
(64, 22, 73),
(65, 22, 74);

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
(31, 20, 13, 31, 1, 'Zero Downtime', 0),
(32, 20, 2, 32, 1, 'Aha', 1.8),
(33, 20, 13, 33, 1, 'Zero Downtime', 0),
(34, 20, 13, 34, 1, 'Zero Downtime', 0),
(35, 20, 13, 35, 1, 'Zero Downtime', 0),
(36, 20, 13, 36, 1, 'Zero Downtime', 0),
(37, 20, 13, 37, 1, 'Zero Downtime', 0),
(38, 20, 13, 38, 1, 'Zero Downtime', 0);

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
  `waktu` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `main_pdo`
--

INSERT INTO `main_pdo` (`id`, `id_shift`, `id_listcarline`, `id_users`, `tanggal`, `mh_out`, `mh_in_dl`, `mh_in_idl`, `direct_eff`, `total_productiv`, `jam_kerja`, `line_speed`, `loss_output`, `p_loss_time`, `jam_effective`, `dpm_fa`, `status`, `signature`, `waktu`) VALUES
(20, 1, 59, 32, '2019-07-18 00:00:00', 300.06719493865967, 448.40000009536743, 16, 66.919534985468, 64.613952385237, 8, 110, 0, 0.39473684210526316, 7.6, 0, 1, 'image-signature/20190719-052543_20_123456.png', '2019-07-19 05:25:43');

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
(31, 20, 12, 12, 1, '2019-07-18 21:08:37'),
(32, 20, 8, 7, 2, '2019-07-18 21:12:50'),
(33, 20, 5, 6, 3, '2019-07-18 23:14:14'),
(34, 20, 7, 8, 4, '2019-07-18 23:16:37'),
(35, 20, 15, 19, 5, '2019-07-18 23:17:03'),
(36, 20, 18, 19, 6, '2019-07-18 23:17:33'),
(37, 20, 19, 19, 7, '2019-07-18 23:18:06'),
(38, 20, 21, 50, 8, '2019-07-18 23:18:43');

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
(12, 10, 53),
(13, 10, 27),
(14, 13, 59);

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
(10, 1641720001, 'Rasyidi', 1234567),
(13, 123456, 'daada Purnama', 123456);

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
  `balance_awal` int(11) NOT NULL,
  `balance_akhir` int(11) NOT NULL,
  `periode` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `target`
--

INSERT INTO `target` (`id`, `id_list_carline`, `mh_out`, `mh_in`, `efisiensi`, `plan_assy`, `balance_awal`, `balance_akhir`, `periode`) VALUES
(11, 59, 230, 330, 100, 120, 10, 0, '2019-07-18');

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
(25, 'anjjj', '9999', 'as', 'as', 4, 1, 1, 1),
(26, 'Andika Kangen', '212324', 'andk1', 'a', 2, 2, 1, 1),
(27, 'angga putra', '445638', 'a3', 'a', 3, 2, 1, 1),
(30, 'koll', '56667', 'awerrd', '2234', 4, 1, 1, 1),
(31, 'nonono opoppoo', '344542', 'rryu43', '4432', 4, 1, 1, 1),
(32, 'ana Admin', '124124', 'ana', 'a', 1, 1, 1, 1);

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
-- Indeks untuk tabel `carline`
--
ALTER TABLE `carline`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_district` (`id_district`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1478;

--
-- AUTO_INCREMENT untuk tabel `build_assy`
--
ALTER TABLE `build_assy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT untuk tabel `carline`
--
ALTER TABLE `carline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `direct_labor`
--
ALTER TABLE `direct_labor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `indirect_labor`
--
ALTER TABLE `indirect_labor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `jenis_deffect`
--
ALTER TABLE `jenis_deffect`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `jenis_error`
--
ALTER TABLE `jenis_error`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `list_carline`
--
ALTER TABLE `list_carline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT untuk tabel `lost_time`
--
ALTER TABLE `lost_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `main_pdo`
--
ALTER TABLE `main_pdo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `output_control`
--
ALTER TABLE `output_control`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `quality_control`
--
ALTER TABLE `quality_control`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT untuk tabel `spv_manager`
--
ALTER TABLE `spv_manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `supervisor`
--
ALTER TABLE `supervisor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `target`
--
ALTER TABLE `target`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `user_has_line`
--
ALTER TABLE `user_has_line`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
