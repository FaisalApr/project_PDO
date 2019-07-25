-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2019 at 06:51 AM
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

--
-- Dumping data for table `absen_leader`
--

INSERT INTO `absen_leader` (`id`, `id_pdo`, `item`, `qty`, `jam`, `total`) VALUES
(1, 24, 'pwr', 2, 2, 4);

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

--
-- Dumping data for table `absen_pegawai`
--

INSERT INTO `absen_pegawai` (`id`, `id_pdo`, `item`, `qty`, `jam`, `total`) VALUES
(1, 24, 'qw', 2, 1, 2),
(2, 26, 'ty', 2, 3, 6),
(3, 26, 'ds', 2, 2, 4),
(4, 26, 'tr', 2, 3, 6);

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
(43, 31, 20, 1199, 12, '2019-07-18 21:11:12'),
(44, 32, 20, 1199, 7, '2019-07-18 21:12:53'),
(45, 33, 20, 1199, 6, '2019-07-18 23:14:19'),
(46, 34, 20, 1199, 8, '2019-07-18 23:16:39'),
(47, 35, 20, 1199, 19, '2019-07-18 23:17:05'),
(48, 36, 20, 1199, 19, '2019-07-18 23:17:36'),
(49, 37, 20, 1199, 19, '2019-07-18 23:18:09'),
(50, 38, 20, 1199, 28, '2019-07-18 23:18:46'),
(51, 38, 20, 1200, 22, '2019-07-18 23:19:01'),
(52, 39, 21, 1289, 3, '2019-07-19 08:11:50'),
(53, 39, 21, 1322, 11, '2019-07-19 08:12:22'),
(54, 40, 22, 1322, 5, '2019-07-19 08:12:27'),
(55, 39, 21, 1334, 11, '2019-07-19 08:12:40'),
(56, 40, 22, 1467, 17, '2019-07-19 08:12:51'),
(57, 41, 21, 1289, 1, '2019-07-19 08:14:13'),
(58, 41, 21, 1334, 4, '2019-07-19 08:14:21'),
(59, 41, 21, 1385, 3, '2019-07-19 08:14:59'),
(60, 41, 21, 1468, 16, '2019-07-19 08:15:59'),
(61, 42, 22, 1467, 2, '2019-07-19 08:25:35'),
(62, 42, 22, 1469, 8, '2019-07-19 08:25:58'),
(63, 43, 21, 1470, 4, '2019-07-19 08:28:48'),
(64, 44, 22, 1469, 12, '2019-07-19 08:29:03'),
(65, 43, 21, 1292, 6, '2019-07-19 08:29:04'),
(66, 43, 21, 1301, 1, '2019-07-19 08:29:19'),
(67, 44, 22, 1470, 15, '2019-07-19 08:29:22'),
(68, 45, 22, 1470, 5, '2019-07-19 08:30:16'),
(69, 45, 22, 1292, 2, '2019-07-19 08:30:48'),
(70, 46, 21, 1468, 3, '2019-07-19 08:31:44'),
(71, 45, 22, 1301, 0, '2019-07-19 08:31:59'),
(72, 45, 22, 1301, 9, '2019-07-19 08:32:00'),
(73, 46, 21, 1301, 25, '2019-07-19 08:32:05'),
(74, 45, 22, 1323, 9, '2019-07-19 08:32:20'),
(75, 47, 21, 1289, 25, '2019-07-19 08:37:24'),
(76, 48, 21, 1289, 27, '2019-07-19 08:38:03'),
(77, 49, 21, 1289, 27, '2019-07-19 08:39:16'),
(78, 50, 21, 1289, 26, '2019-07-19 08:40:48'),
(79, 51, 22, 1323, 11, '2019-07-19 08:41:40'),
(80, 51, 22, 1476, 12, '2019-07-19 08:42:19'),
(81, 52, 22, 1232, 6, '2019-07-19 08:44:04'),
(82, 53, 22, 1231, 26, '2019-07-19 08:44:53'),
(83, 54, 23, 1230, 20, '2019-07-19 08:45:30'),
(84, 55, 22, 1231, 2, '2019-07-19 08:45:39'),
(85, 56, 23, 1230, 18, '2019-07-19 08:46:02'),
(86, 52, 22, 1231, 20, '2019-07-19 08:48:37'),
(87, 57, 23, 1230, 19, '2019-07-19 08:48:48'),
(88, 58, 23, 1230, 17, '2019-07-19 08:50:51'),
(89, 59, 23, 1230, 16, '2019-07-19 08:52:56'),
(90, 60, 23, 1230, 19, '2019-07-19 08:53:51'),
(91, 61, 24, 1230, 25, '2019-07-19 08:53:53'),
(92, 63, 23, 1230, 20, '2019-07-19 08:54:28'),
(93, 62, 24, 1231, 7, '2019-07-19 08:54:32'),
(94, 62, 24, 1230, 20, '2019-07-19 08:54:35'),
(95, 64, 23, 1230, 21, '2019-07-19 08:55:01'),
(96, 65, 24, 1231, 15, '2019-07-19 08:55:16'),
(97, 65, 24, 1233, 9, '2019-07-19 08:55:29'),
(98, 66, 25, 1231, 20, '2019-07-19 08:56:52'),
(99, 67, 24, 1233, 26, '2019-07-19 08:58:12'),
(100, 68, 24, 1233, 26, '2019-07-19 09:51:49'),
(101, 69, 24, 1235, 20, '2019-07-19 09:52:43'),
(102, 70, 24, 1235, 10, '2019-07-19 09:53:27'),
(103, 70, 24, 1234, 5, '2019-07-19 09:53:40'),
(104, 71, 24, 1234, 10, '2019-07-19 09:54:33'),
(105, 72, 26, 1231, 27, '2019-07-22 07:48:42'),
(106, 73, 26, 1230, 25, '2019-07-22 08:22:26'),
(107, 74, 26, 1232, 2, '2019-07-22 08:24:18'),
(108, 74, 26, 1230, 10, '2019-07-22 08:24:21'),
(109, 74, 26, 1236, 10, '2019-07-22 08:24:40'),
(110, 75, 26, 1236, 15, '2019-07-22 08:30:15'),
(111, 75, 26, 1234, 6, '2019-07-22 08:30:37'),
(112, 75, 26, 1238, 0, '2019-07-22 08:31:56'),
(113, 76, 26, 1238, 6, '2019-07-22 08:32:53'),
(114, 76, 26, 1237, 7, '2019-07-22 08:33:15'),
(115, 76, 26, 1239, 11, '2019-07-22 08:33:41'),
(116, 77, 26, 1237, 20, '2019-07-22 08:36:03'),
(117, 78, 26, 1239, 16, '2019-07-22 09:22:03'),
(118, 78, 26, 1241, 5, '2019-07-22 09:22:09'),
(119, 79, 26, 1231, 4, '2019-07-22 09:23:19'),
(120, 79, 26, 1230, 4, '2019-07-22 09:23:30'),
(121, 79, 26, 1232, 4, '2019-07-22 09:23:39'),
(122, 79, 26, 1234, 4, '2019-07-22 09:23:46'),
(123, 79, 26, 1239, 4, '2019-07-22 09:23:53');

--
-- Triggers `build_assy`
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
-- Table structure for table `carline`
--

CREATE TABLE `carline` (
  `id` int(11) NOT NULL,
  `id_district` int(11) NOT NULL,
  `nama_carline` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carline`
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
(18, 1, 'MIRAI'),
(19, 1, 'HINO'),
(20, 1, 'ALPHARD'),
(21, 1, 'HIACE '),
(22, 1, 'COROLLA');

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
(17, 20, 60, 59, 8, 0, 0, 472, 0, 472),
(18, 21, 59, 59, 8, 0, 0, 472, 0, 472),
(19, 22, 59, 59, 8, 0, 0, 472, 0, 472),
(20, 23, 57, 57, 8, 0, 0, 456, 0, 456),
(21, 24, 59, 59, 8, 0, 0, 472, 0, 472),
(22, 25, 57, 57, 8, 0, 0, 456, 0, 456),
(23, 26, 59, 59, 8, 0, 0, 472, 0, 472);

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `id` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `alamat` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `nama`, `alamat`) VALUES
(1, 'SAI T', NULL),
(2, 'SAI B', NULL);

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
  `menit` double NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `indirect_activity`
--

INSERT INTO `indirect_activity` (`id`, `id_pdo`, `item`, `qty_mp`, `menit`, `total`) VALUES
(36, 20, '5S + Yoidon', 59, 5, 4.91667),
(37, 20, 'Home Position', 59, 4, 3.93333),
(38, 20, 'Brefing', 59, 15, 14.75),
(39, 21, '5S + Yoidon', 59, 7, 6.88333),
(40, 21, 'Home Position', 59, 3, 2.95),
(41, 22, '5S + Yoidon', 59, 8, 7.86667),
(42, 22, 'Home Position', 59, 5, 4.91667),
(43, 23, '5S + Yoidon', 57, 9, 8.55),
(44, 23, 'Home Position', 57, 3, 2.85),
(45, 24, '5S + Yoidon', 59, 2, 1.96667),
(46, 24, 'Home Position', 59, 2, 1.96667),
(47, 25, '5S + Yoidon', 57, 5, 4.75),
(48, 25, 'Home Position', 57, 3, 2.85),
(49, 26, '5S + Yoidon', 59, 2, 1.96667),
(50, 26, 'Home Position', 59, 2, 1.96667),
(51, 26, 'asd', 59, 4, 3.93333);

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
(17, 20, 2, 2, 8, 0, 0, 16, 0, 16),
(18, 21, 12, 15, 8, 0, 0, 120, 0, 120),
(19, 22, 13, 16, 8, 0, 0, 128, 0, 128),
(20, 23, 12, 14, 8, 0, 0, 112, 0, 112),
(21, 24, 13, 16, 8, 0, 0, 128, 0, 128),
(22, 25, 12, 12, 8, 0, 0, 96, 0, 96),
(23, 26, 13, 14, 8, 0, 0, 112, 0, 112);

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
(12, '1K', 'BELUM PROSES MANUAL CRIMPING'),
(13, '0', 'Zero Downtime'),
(14, '3AA', 'TERMINAL JUMPER INSTALASI BENT'),
(15, '2T', 'TPO'),
(16, '3T', 'SENSOR RUSAK'),
(17, '1Z', 'OTHER PRE ASSY DOWN TIME'),
(18, '3V', 'PIN EC FIXTURE KOTOR/BERKARAT'),
(19, '3Z', 'PROGRAM C/B ERROR'),
(20, '3W', 'PIN EC FIXTURE MACET'),
(21, '3AC', 'YC MASTER ERROR'),
(22, '1L', 'BELUM PROSES MANUAL MANTAP'),
(23, '1M', 'BELUM PROSES MANUAL FERRITE'),
(24, '1N', 'KANBAN HILANG'),
(25, '1O', 'MISSING MARKING TERMINAL'),
(26, '1P', 'SALAH BONDER'),
(27, '1Q', 'SALAH WIRE'),
(28, '1R', 'SALAH CUTTING LENGTH'),
(29, '1S', 'SALAH KANBAN'),
(30, '1T', 'SALAH TERMINAL'),
(31, '1U', 'TUNGGU SUPPLY TUBE DARI CUTTING TUBE'),
(32, '1V', 'KAPASITAS RUANG'),
(33, '1W', 'INSPEKSI KETETER'),
(34, '1X', 'CSU PRE ASSY KETETER'),
(35, '1Y', 'SALAH SUPPLY CIRCUIT'),
(36, '2A', 'SUB ASSY KETETER'),
(37, '2B', 'TAPING KETETER'),
(38, '2C', 'SETTING KETETER'),
(39, '2D', 'CSU KETETER'),
(40, '2E', 'MSP KETETER'),
(42, '2F', 'OFFLINE KETETER'),
(43, '2G', 'SP KETETER'),
(44, '2H', 'TPO KETETER'),
(45, '2I', 'EC KETETER'),
(46, '2J', 'DIM KETETER'),
(47, '2K', 'VIS KETETER'),
(48, '2L', 'GROMET KETETER'),
(49, '2M', 'CROSS CCT / WRONG CAVITY'),
(50, '2N', 'DAMAGE INSULATION'),
(51, '2O', 'DAMAGE CONNECTOR / PROTECTOR'),
(52, '2P', 'DAMAGE SEAL RUBBER'),
(53, '2Q', 'DAMAGE CLIP'),
(54, '2R', 'MISSING PART'),
(55, '2S', 'TERMINAL BENT'),
(56, '2U', 'CCT TEGANG'),
(57, '2V', 'CCT MEMBELIT'),
(58, '2W', 'NAMEPLATE RUSAK'),
(59, '2X', 'WRONG DIMENSI'),
(60, '2Y', 'WRONG METHODE'),
(61, '2Z', 'WRONG ORIENTASI'),
(62, '2AA', 'SILICON BOCOR / GANTI CAIRAN SILIKON'),
(63, '2AB', 'BALANCING JOB'),
(64, '2AC', 'TRAINING 4M TRANSISI'),
(65, '2AD', 'DELAY SUB ASSY AIRBAG'),
(66, '2AE', 'SIAGE KETETER'),
(67, '2AF', 'MISSING INSERT'),
(68, '2AG', 'TUNGGU VERIFIKASI TOOLING OLEH LEADER'),
(69, '2AH', 'DELAY SUB ASSY BT'),
(70, '2AI', 'OTHER FINAL ASSY DOWNTIME'),
(71, '3A', 'CCT JUMPER INSTALASI PUTUS'),
(72, '3B', 'CONNECTOR INSTALASI PROBLEM'),
(73, '3C', 'PROBLEM KARAKURI SUB'),
(74, '3D', 'LAMPU LED NAVIGASI PROBLEM'),
(75, '3E', 'MATTING PART PROBLEM'),
(76, '3F', 'PROBLEM KARAKURI W/H'),
(77, '3G', 'LAMPU STATION PROBLEM'),
(78, '3H', 'M/C EXPANDER GROMET PROBLEM'),
(79, '3I', 'PERBAIKAN FORK / MATTING PART JIG BOARD'),
(80, '3J', 'TORQUE PROBLEM (KARAKURI MSU PROBLEM)'),
(81, '3K', 'ANDON PROBLEM'),
(82, '3L', 'ROLLER KERETA PROBLEM'),
(83, '3M', 'DUDUKAN SENSOR KENDOR'),
(84, '3N', 'GIGI KERETA TERSANGKUT'),
(85, '3O', 'PENGUNGKIT LOCK KERETA TERSANGKUT'),
(86, '3P', 'LOCK KERETA TIDAK MEMBUKA'),
(87, '3Q', 'RANTAI CONVEYOR KENDOR/PUTUS'),
(88, '3R', 'OVERLOAD MOTOR'),
(89, '3S', 'RODA KERETA RUSAK'),
(90, '3U', 'INSTALLASI CONVEYOR PROBLEM'),
(91, '3X', 'PIN EC FIXTURE MUNDUR'),
(92, '3Y', 'PIN EC FIXTURE PATAH'),
(93, '3AB', 'TERMINAL JUMPER INSTALASI KOTOR'),
(94, '3AD', 'CPU PROBLEM'),
(95, '3AE', 'I/O PROBLEM'),
(96, '3AF', 'INSTALASI FOTO FUSE PROBLEM'),
(97, '3AG', 'BOX FUSE PROBLEM'),
(98, '3AH', 'SWITCH FOTO FUSE PROBLEM'),
(99, '3AI', 'PROGRAM MESIN FOTO FUSE PROBLEM'),
(100, '3AJ', 'PENAMBAHAN LIBRARY'),
(101, '3AK', 'LAMPU BARCODE PROBLEM'),
(102, '3AL', 'MESIN ARM CHECK TROUBLE'),
(103, '3AM', 'MESIN WG-30 TROUBLE'),
(104, '3AN', 'PERBAIKAN CHECKER FIXTURE'),
(105, '3AO', 'STAMP PROBLEM'),
(106, '3AP', 'TUNGGU TEKNISI DATANG'),
(107, '3AQ', 'PROBLREM KARAKURI MSU'),
(108, '3AR', 'CORNER CONVEYOR PROBLEM'),
(109, '3AS', 'STOPPER KERETA CORNER PROBLEM'),
(110, '3AT', 'OTHER FAE DOWNTIME'),
(111, '4A', 'CRIMPING STANDARD PROBLEM'),
(112, '4B', 'INSTALL M/C PRE ASSY'),
(113, '4C', 'M/C AC PROBLEM'),
(114, '4D', 'M/C BONDER PROBLEM'),
(115, '4E', 'M/C CUTTING KODERA PROBLEM'),
(116, '4F', 'M/C JOINT TAPING PROBLEM'),
(117, '4G', 'M/C KODERA CASTING PROBLEM'),
(118, '4H', 'M/C KOMAX PROBLEM'),
(119, '4I', 'M/C KOMPRESOR ANGIN BOCOR'),
(120, '4J', 'M/C PRESS FIT PROBLEM'),
(121, '4K', 'M/C RAYCHEM PROBLEM'),
(122, '4L', 'M/C STRIPING PROBLEM'),
(123, '4M', 'M/C TWIST PROBLEM'),
(124, '4N', 'M/C YCM PROBLEM'),
(125, '4O', 'PERUBAHAN CRIMPING STANDART'),
(126, '4P', 'TUNGGU MTC DATANG'),
(127, '4Q', 'OTHER PAE DOWNTIME'),
(128, '5A', 'PERBAIKAN LAMPU'),
(129, '5B', 'PANEL LAMPU MATI'),
(130, '5C', 'KATERING TERLAMBAT'),
(131, '5D', 'ATAP BOCOR'),
(132, '5E', 'OTHER GA DOWNTIME'),
(133, '6A', 'ADJUSMENT CL TEGANG'),
(134, '6B', 'CCT KEPANJANGAN'),
(135, '6C', 'DRAWING PROBLEM'),
(136, '6D', 'TUNGGU DRAWING'),
(137, '7A', 'DESIGN CHANGE PROBLEM'),
(138, '7B', 'SALAH SETTING CIK'),
(139, '7C', 'ABNORMAL LOADING'),
(140, '7D', 'DELAY SUPPLY LABEL'),
(141, '7E', 'SALAH SUPPLY LABEL'),
(142, '7F', 'TUNGGU SETTING CIK'),
(143, '7G', 'TUNGGU HEIKINKA'),
(144, '7H', 'TERLAMBAT MENURUNKAN LIST BONDER'),
(145, '7I', 'SALAH INPUT PKO'),
(146, '7J', 'SALAH ORDER COMPONENT PACKING'),
(147, '7K', 'TUNGGU NAME PLATE'),
(148, '7L', 'OTHER PPC DOWNTIME'),
(149, '8B', 'TUNGGU TUTUP BOX PACKING'),
(150, '8C', 'TUNGGU SEGITIGA PACKING'),
(151, '8D', 'TUNGGU PACKER'),
(152, '8E', 'TUNGGU POLYTAINER'),
(153, '8F', 'SALAH STO COMPONENT PACKING'),
(154, '8G', 'OTHER EXIM DOWNTIME'),
(155, '9A', 'PART TERCAMPUR'),
(156, '9B', 'SALAH SUPPLY DARI W/H'),
(157, '9C', 'TUNGGU MATERIAL DARI W/H'),
(158, '9D', 'TUNGGU TERMINAL'),
(159, '9E', 'TUNGGU TUBE/COT/VO DARI WAREHOUSE'),
(160, '9F', 'TUNGGU WIRE'),
(161, '9G', 'OTHER W/H DOWNTIME'),
(162, '10A', 'SHORTAGE MATERIAL'),
(163, '11A', 'TUNGGU VERIFIKASI'),
(164, '11B', 'TUNGGU SAMPAI BUZZER'),
(165, '11C', 'DOUBLE CHECK PROBLEM'),
(166, '11D', 'MATERIAL PROBLEM QA RECEIVING'),
(167, '11E', 'OTHER QA-QC PROBLEM'),
(168, '12A', 'KANBAN PROBLEM'),
(169, '12B', 'KANBAN PROBLEM'),
(170, '12C', 'SALAH MATRIK BONDER'),
(171, '12D', 'MACHINE LOADING BELUM RELEASE'),
(172, '12E', 'MACHINE LOADING PROBLEM'),
(173, '12F', 'PROBLEM PREPARATION PRE-ASSY'),
(174, '12G', 'OVERLOAD MACHINE LOADING'),
(175, '12H', 'DELAY RELEASE CIK'),
(176, '12I', 'OTHER NYS PROBLEM'),
(177, '13A', 'KANBAN BELUM RELEASE'),
(178, '13B', 'KANBAN PROBLEM'),
(179, '13C', 'SALAH MATRIK'),
(180, '13D', 'PROBLEM SWCT'),
(181, '13E', 'SALAH DRAWING SAKIHAME'),
(182, '13F', 'OTHER PP PROBLEM'),
(183, '14A', 'DELAY KEDATANGAN COMPONENT PACKING '),
(184, '14B', 'SALAH KEDATANGAN COMPONENT PACKING'),
(185, '14C', 'SALAH ORDER COMPONENT PACKING');

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
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id` int(11) NOT NULL,
  `jabatan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `jabatan`) VALUES
(1, 'Admin'),
(2, 'Line Leader'),
(3, 'Group Leader Inspect'),
(4, 'Group Leader Assy');

-- --------------------------------------------------------

--
-- Table structure for table `line`
--

CREATE TABLE `line` (
  `id` int(11) NOT NULL,
  `nama_line` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `line`
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
(74, '27B'),
(75, ''),
(76, ''),
(77, ''),
(78, ''),
(79, '');

-- --------------------------------------------------------

--
-- Table structure for table `line_manager`
--

CREATE TABLE `line_manager` (
  `id` int(11) NOT NULL,
  `id_list_carline` int(11) NOT NULL,
  `id_assy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `line_manager`
--

INSERT INTO `line_manager` (`id`, `id_list_carline`, `id_assy`) VALUES
(19, 29, 1198),
(20, 59, 1199),
(21, 59, 1200),
(22, 38, 1230),
(23, 38, 1231),
(24, 38, 1232),
(25, 38, 1233),
(26, 38, 1234),
(27, 38, 1235),
(28, 38, 1236),
(29, 38, 1237),
(30, 38, 1238),
(31, 38, 1239),
(32, 38, 1240),
(33, 38, 1241),
(34, 38, 1242),
(35, 38, 1243),
(36, 38, 1244),
(37, 38, 1245),
(38, 38, 1246),
(39, 38, 1247),
(40, 38, 1248),
(41, 38, 1249),
(42, 38, 1250),
(43, 38, 1251),
(44, 38, 1252),
(45, 38, 1253),
(46, 38, 1254),
(47, 38, 1255),
(48, 38, 1256),
(49, 38, 1257),
(50, 38, 1258),
(51, 38, 1259),
(52, 38, 1260),
(53, 38, 1261),
(54, 38, 1262),
(55, 38, 1263),
(56, 38, 1264),
(57, 38, 1265),
(58, 38, 1266),
(59, 38, 1267),
(60, 38, 1268),
(61, 38, 1269),
(62, 38, 1270),
(63, 38, 1271),
(64, 38, 1272),
(65, 38, 1273),
(66, 38, 1274),
(67, 38, 1275),
(68, 38, 1276),
(69, 38, 1277),
(70, 38, 1278),
(71, 38, 1279),
(72, 38, 1280),
(73, 38, 1281),
(74, 38, 1282),
(75, 38, 1283),
(76, 38, 1284),
(77, 38, 1285),
(78, 38, 1286),
(79, 38, 1287),
(80, 38, 1288),
(81, 38, 1289),
(82, 38, 1290),
(83, 38, 1291),
(84, 38, 1292),
(85, 38, 1293),
(86, 38, 1294),
(87, 38, 1295),
(88, 38, 1296),
(89, 38, 1297),
(90, 38, 1298),
(91, 38, 1299),
(92, 38, 1300),
(93, 38, 1301),
(94, 38, 1302),
(95, 38, 1303),
(96, 38, 1304),
(97, 38, 1305),
(98, 38, 1306),
(99, 38, 1307),
(100, 38, 1308),
(101, 38, 1309),
(102, 38, 1310),
(103, 38, 1311),
(104, 38, 1312),
(105, 38, 1313),
(106, 38, 1314),
(107, 38, 1315),
(108, 38, 1316),
(109, 38, 1317),
(110, 38, 1318),
(111, 38, 1319),
(112, 38, 1320),
(113, 38, 1321),
(114, 38, 1322),
(115, 38, 1323),
(116, 38, 1324),
(117, 38, 1325),
(118, 38, 1326),
(119, 38, 1327),
(120, 38, 1328),
(121, 38, 1329),
(122, 38, 1330),
(123, 38, 1331),
(124, 38, 1332),
(125, 38, 1333),
(126, 38, 1334),
(127, 38, 1335),
(128, 38, 1336),
(129, 38, 1337),
(130, 38, 1338),
(131, 38, 1339),
(132, 38, 1340),
(133, 38, 1341),
(134, 38, 1342),
(135, 38, 1343),
(136, 38, 1344),
(137, 38, 1345),
(138, 38, 1346),
(139, 38, 1347),
(140, 38, 1348),
(141, 38, 1349),
(142, 38, 1350),
(143, 38, 1351),
(144, 38, 1352),
(145, 38, 1353),
(146, 38, 1354),
(147, 38, 1355),
(148, 38, 1356),
(149, 38, 1357),
(150, 38, 1358),
(151, 38, 1359),
(152, 38, 1360),
(153, 38, 1361),
(154, 38, 1362),
(155, 38, 1363),
(156, 38, 1364),
(157, 38, 1365),
(158, 38, 1366),
(159, 38, 1367),
(160, 38, 1368),
(161, 38, 1369),
(162, 38, 1370),
(163, 38, 1371),
(164, 38, 1372),
(165, 38, 1373),
(166, 38, 1374),
(167, 38, 1375),
(168, 38, 1376),
(169, 38, 1377),
(170, 38, 1378),
(171, 38, 1379),
(172, 38, 1380),
(173, 38, 1381),
(174, 38, 1382),
(175, 38, 1383),
(176, 38, 1384),
(177, 38, 1385),
(178, 38, 1386),
(179, 38, 1387),
(180, 38, 1388),
(181, 38, 1389),
(182, 38, 1390),
(183, 38, 1391),
(184, 38, 1392),
(185, 38, 1393),
(186, 38, 1394),
(187, 38, 1395),
(188, 38, 1396),
(189, 38, 1397),
(190, 38, 1398),
(191, 38, 1399),
(192, 38, 1400),
(193, 38, 1401),
(194, 38, 1402),
(195, 38, 1403),
(196, 38, 1404),
(197, 38, 1405),
(198, 38, 1406),
(199, 38, 1407),
(200, 38, 1408),
(201, 38, 1409),
(202, 38, 1410),
(203, 38, 1411),
(204, 38, 1412),
(205, 38, 1413),
(206, 38, 1414),
(207, 38, 1415),
(208, 38, 1416),
(209, 38, 1417),
(210, 38, 1418),
(211, 38, 1419),
(212, 38, 1420),
(213, 38, 1421),
(214, 38, 1422),
(215, 38, 1423),
(216, 38, 1424),
(217, 38, 1425),
(218, 38, 1426),
(219, 38, 1427),
(220, 38, 1428),
(221, 38, 1429),
(222, 38, 1430),
(223, 38, 1431),
(224, 38, 1432),
(225, 38, 1433),
(226, 38, 1434),
(227, 38, 1435),
(228, 38, 1436),
(229, 38, 1437),
(230, 38, 1438),
(231, 38, 1439),
(232, 38, 1440),
(233, 38, 1441),
(234, 38, 1442),
(235, 38, 1443),
(236, 38, 1444),
(237, 38, 1445),
(238, 38, 1446),
(239, 38, 1447),
(240, 38, 1448),
(241, 38, 1449),
(242, 38, 1450),
(243, 38, 1451),
(244, 38, 1452),
(245, 38, 1453),
(246, 38, 1454),
(247, 38, 1455),
(248, 38, 1456),
(249, 38, 1457),
(250, 38, 1458),
(251, 38, 1459),
(252, 38, 1460),
(253, 38, 1461),
(254, 38, 1462),
(255, 38, 1463),
(256, 38, 1464),
(257, 38, 1465),
(258, 38, 1466),
(259, 38, 1467),
(260, 38, 1468),
(261, 38, 1469),
(262, 38, 1470),
(263, 38, 1471),
(264, 38, 1472),
(265, 38, 1473),
(266, 38, 1474),
(267, 38, 1475),
(268, 38, 1476),
(269, 38, 1477);

-- --------------------------------------------------------

--
-- Table structure for table `list_carline`
--

CREATE TABLE `list_carline` (
  `id` int(11) NOT NULL,
  `id_carline` int(11) NOT NULL,
  `id_line` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `list_carline`
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
(31, 20, 13, 31, 1, 'Zero Downtime', 0),
(32, 20, 2, 32, 1, 'Aha', 1.8),
(33, 20, 13, 33, 1, 'Zero Downtime', 0),
(34, 20, 13, 34, 1, 'Zero Downtime', 0),
(35, 20, 13, 35, 1, 'Zero Downtime', 0),
(36, 20, 13, 36, 1, 'Zero Downtime', 0),
(37, 20, 13, 37, 1, 'Zero Downtime', 0),
(38, 20, 13, 38, 1, 'Zero Downtime', 0),
(39, 21, 13, 39, 1, 'Zero Downtime', 0),
(40, 21, 2, 41, 1, 'J.245(L) Proses TB', 2.2),
(41, 22, 14, 40, 1, 'Open u.22 prog 1138', 5.4),
(43, 21, 16, 41, 1, 'CV Trouble', 4.54),
(44, 22, 14, 42, 1, 'Ganti c/f u.22', 37),
(45, 22, 13, 44, 1, 'Zero Downtime', 0),
(46, 21, 17, 43, 1, 'T.111A(W)(R) ', 3.5),
(47, 21, 18, 43, 1, 'ec. ope u. 617/u.24 (B)', 1.1),
(48, 22, 21, 45, 1, 'Delay T.111A', 6.1),
(49, 21, 13, 46, 1, 'Zero Downtime', 0),
(50, 21, 13, 47, 1, 'Zero Downtime', 0),
(51, 21, 13, 48, 1, 'Zero Downtime', 0),
(52, 21, 13, 49, 1, 'Zero Downtime', 0),
(53, 21, 13, 50, 1, 'Zero Downtime', 0),
(54, 22, 3, 51, 1, 'baru', 4.5),
(55, 22, 13, 52, 1, 'Zero Downtime', 0),
(56, 22, 13, 53, 1, 'Zero Downtime', 0),
(57, 23, 13, 54, 1, 'Zero Downtime', 0),
(59, 22, 13, 55, 1, 'Zero Downtime', 0),
(60, 23, 13, 56, 1, 'Zero Downtime', 0),
(61, 23, 13, 57, 1, 'Zero Downtime', 0),
(62, 23, 13, 58, 1, 'Zero Downtime', 0),
(63, 23, 13, 59, 1, 'Zero Downtime', 0),
(64, 23, 13, 60, 1, 'Zero Downtime', 0),
(65, 24, 13, 61, 1, 'Zero Downtime', 0),
(66, 23, 13, 63, 1, 'Zero Downtime', 0),
(67, 24, 13, 62, 1, 'Zero Downtime', 0),
(68, 23, 13, 64, 1, 'Zero Downtime', 0),
(69, 24, 12, 65, 1, 'Delay T.111A', 2.15),
(70, 25, 13, 66, 1, 'Zero Downtime', 0),
(71, 24, 13, 67, 1, 'Zero Downtime', 0),
(72, 24, 13, 68, 1, 'Zero Downtime', 0),
(73, 24, 13, 69, 1, 'Zero Downtime', 0),
(74, 24, 13, 70, 1, 'Zero Downtime', 0),
(75, 24, 13, 71, 1, 'Zero Downtime', 0),
(76, 24, 12, 71, 1, 'lll', 9),
(77, 26, 13, 72, 1, 'Zero Downtime', 0),
(78, 26, 13, 73, 1, 'Zero Downtime', 0),
(79, 26, 13, 74, 1, 'Zero Downtime', 0),
(80, 26, 13, 75, 1, 'Zero Downtime', 0),
(81, 26, 13, 76, 1, 'Zero Downtime', 0),
(82, 26, 13, 77, 1, 'Zero Downtime', 0),
(83, 26, 13, 78, 1, 'Zero Downtime', 0);

-- --------------------------------------------------------

--
-- Table structure for table `main_pdo`
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
-- Dumping data for table `main_pdo`
--

INSERT INTO `main_pdo` (`id`, `id_shift`, `id_listcarline`, `id_users`, `tanggal`, `mh_out`, `mh_in_dl`, `mh_in_idl`, `direct_eff`, `total_productiv`, `jam_kerja`, `line_speed`, `loss_output`, `p_loss_time`, `jam_effective`, `dpm_fa`, `status`, `signature`, `waktu`) VALUES
(20, 1, 59, 32, '2019-07-18 00:00:00', 300.06719493865967, 448.40000009536743, 16, 66.919534985468, 64.613952385237, 8, 110, 0, 0.39473684210526316, 7.6, 0, 1, 'image-signature/20190719-052543_20_123456.png', '2019-07-19 05:25:43'),
(21, 2, 38, 32, '2019-07-10 00:00:00', 543.6631870269775, 462.1666667461395, 120, 117.63357813202, 93.386175829275, 8, 137, 18, 2.4127659574468088, 7.833333333333333, 0, 1, 'image-signature/20190719-084430_21_123456.png', '2019-07-19 08:44:30'),
(22, 1, 38, 33, '2019-07-10 00:00:00', 441.98476004600525, 459.2166666984558, 128, 96.247543283579, 75.267747853787, 8, 129, 18, 11.349036402569594, 7.783333333333333, 0, 1, 'image-signature/20190719-085213_22_123456.png', '2019-07-19 08:52:13'),
(23, 2, 38, 32, '2019-07-11 00:00:00', 421.6995120048523, 444.59999990463257, 112, 94.849193003893, 75.763476837425, 8, 107, 0, 0, 7.8, 0, 1, 'image-signature/20190719-085537_23_123456.png', '2019-07-19 08:55:37'),
(24, 1, 38, 32, '2019-07-13 00:00:00', 498.0105240345001, 466.0666666030884, 124, 106.8539244963, 84.399026791576, 8, 130, 0, 2.342436974789916, 7.933333333333334, 0, 1, 'image-signature/20190719-103513_24_123456.png', '2019-07-19 10:35:13'),
(25, 2, 38, 32, '2019-07-15 00:00:00', 56.498799324035645, 448.40000009536743, 96, 12.600089052636, 10.378177684449, 8, 110, 0, 0, 7.866666666666666, 50000, 0, NULL, NULL),
(26, 1, 38, 33, '2019-07-22 00:00:00', 498.9999146461487, 454.13333320617676, 112, 109.87960542848, 88.141765442456, 8, 130, 0, 0, 7.866666666666666, 0, 0, NULL, NULL);

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
(31, 20, 12, 12, 1, '2019-07-18 21:08:37'),
(32, 20, 8, 7, 2, '2019-07-18 21:12:50'),
(33, 20, 5, 6, 3, '2019-07-18 23:14:14'),
(34, 20, 7, 8, 4, '2019-07-18 23:16:37'),
(35, 20, 15, 19, 5, '2019-07-18 23:17:03'),
(36, 20, 18, 19, 6, '2019-07-18 23:17:33'),
(37, 20, 19, 19, 7, '2019-07-18 23:18:06'),
(38, 20, 21, 50, 8, '2019-07-18 23:18:43'),
(39, 21, 25, 25, 1, '2019-07-19 08:11:03'),
(40, 22, 25, 22, 1, '2019-07-19 08:12:15'),
(41, 21, 27, 24, 2, '2019-07-19 08:14:06'),
(42, 22, 27, 10, 2, '2019-07-19 08:25:28'),
(43, 21, 27, 11, 3, '2019-07-19 08:27:43'),
(44, 22, 27, 27, 3, '2019-07-19 08:28:55'),
(45, 22, 28, 25, 4, '2019-07-19 08:30:04'),
(46, 21, 27, 28, 4, '2019-07-19 08:31:26'),
(47, 21, 25, 25, 5, '2019-07-19 08:37:14'),
(48, 21, 27, 27, 6, '2019-07-19 08:37:55'),
(49, 21, 27, 27, 7, '2019-07-19 08:39:12'),
(50, 21, 26, 26, 8, '2019-07-19 08:40:06'),
(51, 22, 25, 23, 5, '2019-07-19 08:41:27'),
(52, 22, 20, 26, 6, '2019-07-19 08:43:55'),
(53, 22, 25, 26, 7, '2019-07-19 08:44:46'),
(54, 23, 20, 20, 1, '2019-07-19 08:45:25'),
(55, 22, 2, 2, 8, '2019-07-19 08:45:34'),
(56, 23, 18, 18, 2, '2019-07-19 08:45:58'),
(57, 23, 19, 19, 3, '2019-07-19 08:46:32'),
(58, 23, 16, 17, 4, '2019-07-19 08:50:42'),
(59, 23, 15, 16, 5, '2019-07-19 08:52:51'),
(60, 23, 19, 19, 6, '2019-07-19 08:53:46'),
(61, 24, 25, 25, 1, '2019-07-19 08:53:47'),
(62, 24, 27, 27, 2, '2019-07-19 08:54:22'),
(63, 23, 20, 20, 7, '2019-07-19 08:54:24'),
(64, 23, 20, 21, 8, '2019-07-19 08:54:57'),
(65, 24, 25, 24, 3, '2019-07-19 08:55:11'),
(66, 25, 20, 20, 1, '2019-07-19 08:56:47'),
(67, 24, 26, 26, 4, '2019-07-19 08:58:06'),
(68, 24, 25, 26, 5, '2019-07-19 09:45:45'),
(69, 24, 20, 20, 6, '2019-07-19 09:52:36'),
(70, 24, 15, 15, 7, '2019-07-19 09:53:23'),
(71, 24, 10, 10, 8, '2019-07-19 09:54:26'),
(72, 26, 27, 27, 1, '2019-07-22 07:48:36'),
(73, 26, 25, 25, 2, '2019-07-22 08:22:19'),
(74, 26, 22, 22, 3, '2019-07-22 08:24:10'),
(75, 26, 21, 21, 4, '2019-07-22 08:30:11'),
(76, 26, 24, 24, 5, '2019-07-22 08:32:46'),
(77, 26, 20, 20, 6, '2019-07-22 08:35:57'),
(78, 26, 21, 21, 7, '2019-07-22 09:21:58'),
(79, 26, 20, 20, 8, '2019-07-22 09:23:14');

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
(1, 25, 66, 3, 'Rusak', 1),
(3, 26, 79, 9, '', 0);

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

--
-- Dumping data for table `regulasi`
--

INSERT INTO `regulasi` (`id`, `id_pdo`, `id_jenisreg`, `id_oc`, `posisi`, `qty`, `jam`, `total`) VALUES
(1, 24, 1, 71, 'tmp', 2, 3, 6),
(2, 24, 2, 71, 'pid', 3, 4, 12),
(3, 26, 1, 72, 'er', 3, 4, 12),
(4, 26, 2, 72, 're', 2, 3, 6);

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
-- Table structure for table `spv_manager`
--

CREATE TABLE `spv_manager` (
  `id` int(11) NOT NULL,
  `id_supervisor` int(11) NOT NULL,
  `id_list_carline` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spv_manager`
--

INSERT INTO `spv_manager` (`id`, `id_supervisor`, `id_list_carline`) VALUES
(9, 10, 50),
(10, 10, 51),
(11, 10, 52),
(13, 10, 27),
(14, 13, 59),
(15, 13, 38);

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
(10, 1641720001, 'Rasyidi', 123456),
(13, 123456, 'Purnama', 123456);

-- --------------------------------------------------------

--
-- Table structure for table `target`
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
-- Dumping data for table `target`
--

INSERT INTO `target` (`id`, `id_list_carline`, `mh_out`, `mh_in`, `efisiensi`, `plan_assy`, `balance_awal`, `balance_akhir`, `periode`) VALUES
(13, 38, 300, 300, 100, 300, 0, 0, '2019-07-01'),
(14, 38, 300, 300, 100, 300, 0, 0, '2019-07-02'),
(15, 38, 300, 300, 100, 300, 0, 0, '2019-07-03'),
(16, 38, 300, 300, 100, 300, 0, 0, '2019-07-04'),
(17, 38, 300, 300, 100, 300, 0, 0, '2019-07-05'),
(18, 38, 300, 300, 100, 300, 0, 0, '2019-07-06'),
(19, 38, 300, 300, 100, 300, 0, 0, '2019-07-07'),
(20, 38, 300, 300, 100, 300, 0, 0, '2019-07-08'),
(21, 38, 300, 300, 100, 300, 0, 0, '2019-07-09'),
(22, 38, 300, 300, 100, 300, 0, 0, '2019-07-10'),
(23, 38, 300, 300, 100, 300, 0, 0, '2019-07-11'),
(24, 38, 300, 300, 100, 300, 0, 0, '2019-07-12'),
(25, 38, 300, 300, 100, 300, 0, 0, '2019-07-13'),
(26, 38, 300, 300, 100, 300, 0, 0, '2019-07-14'),
(27, 38, 300, 300, 100, 300, 0, 0, '2019-07-15'),
(28, 38, 300, 300, 100, 300, 0, 0, '2019-07-16'),
(29, 38, 300, 300, 100, 300, 0, 0, '2019-07-17'),
(30, 38, 300, 300, 100, 300, 0, 0, '2019-07-18'),
(31, 38, 300, 300, 100, 300, 0, 0, '2019-07-19'),
(32, 38, 300, 300, 100, 300, 0, 0, '2019-07-20'),
(33, 38, 300, 300, 100, 300, 0, 0, '2019-07-21'),
(34, 38, 300, 300, 100, 300, 0, 0, '2019-07-22'),
(35, 38, 300, 300, 100, 300, 0, 0, '2019-07-23'),
(36, 38, 300, 300, 100, 300, 0, 0, '2019-07-24'),
(37, 38, 300, 300, 100, 300, 0, 0, '2019-07-25'),
(38, 38, 300, 300, 100, 300, 0, 0, '2019-07-26'),
(39, 38, 300, 300, 100, 300, 0, 0, '2019-07-27'),
(40, 38, 300, 300, 100, 300, 0, 0, '2019-07-28'),
(41, 38, 300, 300, 100, 300, 0, 0, '2019-07-29'),
(42, 38, 300, 300, 100, 300, 0, 0, '2019-07-30'),
(43, 38, 300, 300, 100, 300, 0, 0, '2019-07-31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `nik`, `username`, `password`, `level`, `id_shift`, `id_district`, `active`) VALUES
(26, 'Andika Kangen', '212324', 'andk1', 'a', 2, 2, 1, 0),
(27, 'angga putra', '445638', 'a3', 'a', 3, 2, 1, 0),
(32, 'ana Admin', '124124', 'ana', 'a', 1, 1, 1, 1),
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
(85, 'SA''IDAH', '7980', 'Say_04', 'Say@1234', 3, 1, 1, 1),
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
(122, 'YAYAK', '9578', 'yayak', '123456', 4, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_has_line`
--

CREATE TABLE `user_has_line` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_listcarline` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_has_line`
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
(167, 59, 49),
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
(263, 72, 49),
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
(336, 71, 49),
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
(387, 46, 49),
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
(476, 122, 36);

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
-- Indexes for table `carline`
--
ALTER TABLE `carline`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_district` (`id_district`);

--
-- Indexes for table `direct_labor`
--
ALTER TABLE `direct_labor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pdo` (`id_pdo`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `line`
--
ALTER TABLE `line`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `line_manager`
--
ALTER TABLE `line_manager`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_assy` (`id_assy`),
  ADD KEY `id_list_carline` (`id_list_carline`);

--
-- Indexes for table `list_carline`
--
ALTER TABLE `list_carline`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idcarline` (`id_carline`),
  ADD KEY `fk_idline` (`id_line`);

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
  ADD KEY `fk_listcarline` (`id_listcarline`);

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
-- Indexes for table `spv_manager`
--
ALTER TABLE `spv_manager`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_supervisor` (`id_supervisor`),
  ADD KEY `fk_list_carline` (`id_list_carline`);

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
  ADD KEY `fk_liscarline_targett` (`id_list_carline`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_shift_tblshift` (`id_shift`),
  ADD KEY `fk_level` (`level`),
  ADD KEY `id_district` (`id_district`);

--
-- Indexes for table `user_has_line`
--
ALTER TABLE `user_has_line`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user` (`id_user`),
  ADD KEY `fk_carline_users` (`id_listcarline`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen_leader`
--
ALTER TABLE `absen_leader`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `absen_pegawai`
--
ALTER TABLE `absen_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `assembly`
--
ALTER TABLE `assembly`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1478;
--
-- AUTO_INCREMENT for table `build_assy`
--
ALTER TABLE `build_assy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;
--
-- AUTO_INCREMENT for table `carline`
--
ALTER TABLE `carline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `direct_labor`
--
ALTER TABLE `direct_labor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `history_pdo`
--
ALTER TABLE `history_pdo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `indirect_activity`
--
ALTER TABLE `indirect_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `indirect_labor`
--
ALTER TABLE `indirect_labor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `jenis_deffect`
--
ALTER TABLE `jenis_deffect`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `jenis_error`
--
ALTER TABLE `jenis_error`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;
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
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `line`
--
ALTER TABLE `line`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT for table `line_manager`
--
ALTER TABLE `line_manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=270;
--
-- AUTO_INCREMENT for table `list_carline`
--
ALTER TABLE `list_carline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT for table `lost_time`
--
ALTER TABLE `lost_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT for table `main_pdo`
--
ALTER TABLE `main_pdo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `output_control`
--
ALTER TABLE `output_control`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT for table `quality_control`
--
ALTER TABLE `quality_control`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `regulasi`
--
ALTER TABLE `regulasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `shift`
--
ALTER TABLE `shift`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `spv_manager`
--
ALTER TABLE `spv_manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `supervisor`
--
ALTER TABLE `supervisor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `target`
--
ALTER TABLE `target`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;
--
-- AUTO_INCREMENT for table `user_has_line`
--
ALTER TABLE `user_has_line`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=477;
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
-- Constraints for table `carline`
--
ALTER TABLE `carline`
  ADD CONSTRAINT `fk_district` FOREIGN KEY (`id_district`) REFERENCES `district` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `line_manager`
--
ALTER TABLE `line_manager`
  ADD CONSTRAINT `fk_id_assy` FOREIGN KEY (`id_assy`) REFERENCES `assembly` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_listcarline_assymgr` FOREIGN KEY (`id_list_carline`) REFERENCES `list_carline` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `list_carline`
--
ALTER TABLE `list_carline`
  ADD CONSTRAINT `fk_idcarline` FOREIGN KEY (`id_carline`) REFERENCES `carline` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_idline` FOREIGN KEY (`id_line`) REFERENCES `line` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `fk_listcarline` FOREIGN KEY (`id_listcarline`) REFERENCES `list_carline` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
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
  ADD CONSTRAINT `fk_id_supervisor` FOREIGN KEY (`id_supervisor`) REFERENCES `supervisor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_list_carline` FOREIGN KEY (`id_list_carline`) REFERENCES `list_carline` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `target`
--
ALTER TABLE `target`
  ADD CONSTRAINT `fk_liscarline_targett` FOREIGN KEY (`id_list_carline`) REFERENCES `list_carline` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_dis` FOREIGN KEY (`id_district`) REFERENCES `district` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_level` FOREIGN KEY (`level`) REFERENCES `level` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_shift_tblshift` FOREIGN KEY (`id_shift`) REFERENCES `shift` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_has_line`
--
ALTER TABLE `user_has_line`
  ADD CONSTRAINT `fk_carline_users` FOREIGN KEY (`id_listcarline`) REFERENCES `list_carline` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
