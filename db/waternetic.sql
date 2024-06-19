-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2024 at 07:27 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `waternetic`
--

-- --------------------------------------------------------

--
-- Table structure for table `calculator_history`
--

CREATE TABLE `calculator_history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `previous_reading` float DEFAULT NULL,
  `present_reading` float DEFAULT NULL,
  `previous_reading_date` date DEFAULT NULL,
  `present_reading_date` date DEFAULT NULL,
  `total_water_consumption` float DEFAULT NULL,
  `calculation_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `calculator_history`
--

INSERT INTO `calculator_history` (`id`, `user_id`, `previous_reading`, `present_reading`, `previous_reading_date`, `present_reading_date`, `total_water_consumption`, `calculation_date`) VALUES
(1, NULL, 2380, 2400, '2024-02-08', '2024-05-22', 20, '2024-05-22 13:20:32'),
(2, NULL, 2380, 2420, '2024-02-08', '2024-05-22', 40, '2024-05-22 13:56:38'),
(3, 62, 2380, 2420, '2024-02-08', '2024-05-22', 40, '2024-05-22 13:58:09'),
(4, 62, 2380, 2650, '2024-02-08', '2024-05-22', 270, '2024-05-22 14:03:35'),
(5, 62, 2380, 6000, '2024-02-08', '2024-05-22', 3620, '2024-05-22 14:24:03'),
(6, 101, 0, 20, '2024-04-22', '2024-05-22', 20, '2024-05-22 17:40:48'),
(7, 62, 2380, 2440, '2024-02-08', '2024-06-18', 60, '2024-06-18 14:22:59');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `folder_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `financial_reports`
--

CREATE TABLE `financial_reports` (
  `id` int(6) UNSIGNED NOT NULL,
  `bill_type` varchar(50) NOT NULL,
  `file_data` longblob NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `upload_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `financial_reports`
--

INSERT INTO `financial_reports` (`id`, `bill_type`, `file_data`, `file_name`, `upload_date`) VALUES
(4, 'water_bill', 0x255044462d312e330a332030206f626a0a3c3c2f54797065202f506167650a2f506172656e742031203020520a2f5265736f75726365732032203020520a2f436f6e74656e74732034203020523e3e0a656e646f626a0a342030206f626a0a3c3c2f46696c746572202f466c6174654465636f6465202f4c656e677468203637303e3e0a73747265616d0a789c85d64d6f1a311006e07b7e858fad54a69eb1bdb6f79648cd216aa5a8e55eadc256a15d2002aaaaffbee663ebf132862bef6b7b79b017937abad3e0bcfa73f730571f1f51a106add5fc87fa343f7ce410b451ce46f08d9a2fd4bbc7e576b757eb6ed5bf57f39fe716da06a2e3b52fcbc562e8a73d720421f0dee7ee7236633d3491b71e86cdcb2fd6b0a4817c31cf66cff38080c53acfafdd8eafe19c8358acf1b5ef86effbe5aadfedbbd51bab363e80b6bc7abfdafc5eff5f8f0298f4dd9b4460948f1a8257336702b8a0b6bdfa769c233d2f2a4708168f530cdd76ddbf704217c111afbc746b4e671dd830c997c3b0e170e9d7f2867788a35802b43c45cd45d21323d606bbe0a7a9263bd36686a4746c4d681def7b4488c5e312fab4b3b8ebd1c44603bab96ac22aa24999cb26ac2398b05432a90c3e9bf0b430b1ae257b69c2fb1593c682a7eb26b9229b1479c5247724939c8a26f2e0d184a58589a3d64826ac3f35711a6c54d63460fce9ddd26dffaaa7bef8dae89ac38967ad876e580ecb42c640205eb9dfaebb8504932b124c4e11051879f008c3d20c83a6a5b4591a0ea323902e174b6f1a4946a78fe9a64c6e556572a52a932b924c4e451979f028c3d2a98c8b820c5f4c96313e42136ec9b0564d86556a32ac22c8b05492a90c3ecbf0749431c7c3a45b145ebaac6f75da3e024c7a66636ec2e456152657aa30b922c1e4548491078f302ccd30984e527af9eacb2d532c56d93244877bc12d99dcaacae44a55265724999c8a32f2e05186a5a34c381c26e35a4d820c5f6c2a936e36da298a161a7bacecd31d69f29744f64ae170edb3e64ae10cc20a58805888544bcf1eb5f4e4c1d293879b519ad1b4165b8c974788f5ad9f72a4ffef4325b1d0896cbed97783fad60dfdae55cfaf6fcd079daeb0f9dcfd031ce3900a0a656e6473747265616d0a656e646f626a0a312030206f626a0a3c3c2f54797065202f50616765730a2f4b696473205b3320302052205d0a2f436f756e7420310a2f4d65646961426f78205b302030203834312e3839203539352e32385d0a3e3e0a656e646f626a0a352030206f626a0a3c3c2f46696c746572202f466c6174654465636f6465202f4c656e677468203336343e3e0a73747265616d0a789c5d52cb6e833010bcf3153ea687084c1a82258444499038f4a1d27e008125452a061972e0efbbbb76d2aa4858e3b16776566b3f2f8fa5ee17e1bf99b1a960115daf5b03f378350d88335c7aedc950b47db3b81dafcd504f9e8fe26a9d17184add8d5e92f8ef78362f66159bac1dcff0e0f9afa605d3eb8bd87ce615eeabeb347dc3007a118197a6a2850e7d9eebe9a51e40f82cdb962d9ef7cbba45cdef8d8f750211f25eda2ccdd8c23cd50d985a5fc04b8220154951a41ee8f6df596415e7eeefd543814b805fea257184383ee0120621114a2256211332266247c4a325722248a2ac44ee90c85c7d32454c316e05a5ba0568be6a83e5029665e413bb2219612a1248ac8bd8d53a11dedb6411e198ee843963c5fc8e5bc8581b317eb2bc229c33bf67cf13e3c391f23b4fe295f53c725fec292def3c2561e7493995f3a4b695f3a49caab03876dd73b7340e7a30f73937576370c4fcaa78b634d55ec3fde14de3442afa7f007f0db6a90a656e6473747265616d0a656e646f626a0a362030206f626a0a3c3c2f54797065202f466f6e740a2f42617365466f6e74202f48656c7665746963612d426f6c640a2f53756274797065202f54797065310a2f456e636f64696e67202f57696e416e7369456e636f64696e670a2f546f556e69636f64652035203020520a3e3e0a656e646f626a0a322030206f626a0a3c3c0a2f50726f63536574205b2f504446202f54657874202f496d61676542202f496d61676543202f496d616765495d0a2f466f6e74203c3c0a2f46312036203020520a3e3e0a2f584f626a656374203c3c0a3e3e0a3e3e0a656e646f626a0a372030206f626a0a3c3c0a2f50726f647563657220284650444620312e3836290a2f4372656174696f6e446174652028443a32303234303532323138333231312b303227303027290a3e3e0a656e646f626a0a382030206f626a0a3c3c0a2f54797065202f436174616c6f670a2f50616765732031203020520a3e3e0a656e646f626a0a787265660a3020390a303030303030303030302036353533352066200a30303030303030383237203030303030206e200a30303030303031343636203030303030206e200a30303030303030303039203030303030206e200a30303030303030303837203030303030206e200a30303030303030393134203030303030206e200a30303030303031333438203030303030206e200a30303030303031353730203030303030206e200a30303030303031363533203030303030206e200a747261696c65720a3c3c0a2f53697a6520390a2f526f6f742038203020520a2f496e666f2037203020520a3e3e0a7374617274787265660a313730320a2525454f460a, 'waterbill report.pdf', '2024-05-22 16:40:15'),
(6, 'transaction_fee', 0x255044462d312e330a332030206f626a0a3c3c2f54797065202f506167650a2f506172656e742031203020520a2f5265736f75726365732032203020520a2f436f6e74656e74732034203020523e3e0a656e646f626a0a342030206f626a0a3c3c2f46696c746572202f466c6174654465636f6465202f4c656e677468203330343e3e0a73747265616d0a789c7592c14ec3300c86ef7b0a1fe130133b4993f4b649ec308134b1de51448b5648dba92d42bc3d6543e00e718d3ffb8fbf8461bb50681dbc2fd605dc6c0848a152503cc36df175640995066b02ba0c8a12ae36753f8cd0c6a6ba86e2e59b229361b012bbafcb3255971c5b46ef257717ff4ed3c6611624b54eddd3ab200c2b64379bd38db2ee096996b33bc44166586b31cc321eaa981ec7baa9863136478166cea332125d35dd5bfb93c71ef5b47b3629d0e08242ef6069b547eba1af607f8a5368a634263474f613fb0fd856b195166d76baf52fb58ea94eb51468347a96c8aa6f63d9497bd393392d1196660c23195925925aa66b13fdd76cbdbbac2a364b6597ac8028d73a375af08e08c36c21669ebe974414a3663041a33acb2dba3126d8c7540d39ec0ec779cb27a0f8a1980a656e6473747265616d0a656e646f626a0a312030206f626a0a3c3c2f54797065202f50616765730a2f4b696473205b3320302052205d0a2f436f756e7420310a2f4d65646961426f78205b302030203834312e3839203539352e32385d0a3e3e0a656e646f626a0a352030206f626a0a3c3c2f46696c746572202f466c6174654465636f6465202f4c656e677468203336343e3e0a73747265616d0a789c5d52cb6e833010bcf3153ea687084c1a82258444499038f4a1d27e008125452a061972e0efbbbb76d2aa4858e3b16776566b3f2f8fa5ee17e1bf99b1a960115daf5b03f378350d88335c7aedc950b47db3b81dafcd504f9e8fe26a9d17184add8d5e92f8ef78362f66159bac1dcff0e0f9afa605d3eb8bd87ce615eeabeb347dc3007a118197a6a2850e7d9eebe9a51e40f82cdb962d9ef7cbba45cdef8d8f750211f25eda2ccdd8c23cd50d985a5fc04b8220154951a41ee8f6df596415e7eeefd543814b805fea257184383ee0120621114a2256211332266247c4a325722248a2ac44ee90c85c7d32454c316e05a5ba0568be6a83e5029665e413bb2219612a1248ac8bd8d53a11dedb6411e198ee843963c5fc8e5bc8581b317eb2bc229c33bf67cf13e3c391f23b4fe295f53c725fec292def3c2561e7493995f3a4b695f3a49caab03876dd73b7340e7a30f73937576370c4fcaa78b634d55ec3fde14de3442afa7f007f0db6a90a656e6473747265616d0a656e646f626a0a362030206f626a0a3c3c2f54797065202f466f6e740a2f42617365466f6e74202f48656c7665746963612d426f6c640a2f53756274797065202f54797065310a2f456e636f64696e67202f57696e416e7369456e636f64696e670a2f546f556e69636f64652035203020520a3e3e0a656e646f626a0a322030206f626a0a3c3c0a2f50726f63536574205b2f504446202f54657874202f496d61676542202f496d61676543202f496d616765495d0a2f466f6e74203c3c0a2f46312036203020520a3e3e0a2f584f626a656374203c3c0a3e3e0a3e3e0a656e646f626a0a372030206f626a0a3c3c0a2f50726f647563657220284650444620312e3836290a2f4372656174696f6e446174652028443a32303234303532323138303331372b303227303027290a3e3e0a656e646f626a0a382030206f626a0a3c3c0a2f54797065202f436174616c6f670a2f50616765732031203020520a3e3e0a656e646f626a0a787265660a3020390a303030303030303030302036353533352066200a30303030303030343631203030303030206e200a30303030303031313030203030303030206e200a30303030303030303039203030303030206e200a30303030303030303837203030303030206e200a30303030303030353438203030303030206e200a30303030303030393832203030303030206e200a30303030303031323034203030303030206e200a30303030303031323837203030303030206e200a747261696c65720a3c3c0a2f53697a6520390a2f526f6f742038203020520a2f496e666f2037203020520a3e3e0a7374617274787265660a313333360a2525454f460a, 'transaction report.pdf', '2024-05-22 16:40:51'),
(7, 'installation', 0x255044462d312e330a332030206f626a0a3c3c2f54797065202f506167650a2f506172656e742031203020520a2f5265736f75726365732032203020520a2f436f6e74656e74732034203020523e3e0a656e646f626a0a342030206f626a0a3c3c2f46696c746572202f466c6174654465636f6465202f4c656e677468203834323e3e0a73747265616d0a789c85d75d6fd3301406e0fbfd0a5f82448d7dfc9dbb4d6217134813eb3d0a6d6085b49dda22c4bfc7e992f9b83da7957ab5f7b59d3c8bf301e2e1464917c4df9bbbb9f878af8556522931ff213ecd873f392d9511ce2619bc982fc5bbfbd56e7f109b76ddbd17f35f634b5b2f93c3b52fabe5b2ef4e7be040c6887b9fdbf3d98c0dd227dcbaebb78bdfa861414908d53cdb03cea396ba5ae7f1b9dde3359c7332556b7ceddafedb61b5eef68776fd82aa3e44a92caedeaeb77f366feb4194269fbbcf044684a4640c62e64c942e8a5d279e8ecb2969f36aa0a5d5af3eedee9f78e8da0d5674fe78d4a575d7f6ab7e8501ad911170e576b769975bac97ff65c1e00a60190b525b9c6a8d59f2616bcd0d76319ca60aec4c999936f9e81b038d0aa81f5492a0aac5c0d87c7de1398f323619a9fc3519d4e26450859341154206a5940c337894c1e92803794b9946c7c6f87319bc9852aa96f1f91acf537a2b031c2b7dbbdb748b8a254907b8b2a8d8c03a69e349beea7b0aa5742894926a45a0d0832714944e2820546a2c34261128b87f8a92cfd8e433325e9a70ac3ce47bc7beba1599e156841bdda25b778bedc9c5e22c2ecddbefab7efb9380299d44c094542702a6c4140c4a0b8cb68df64dc53cc1a0c5ce615ef791caf72ab8ba8f4a8bdd47a5c2eea352a12e999292fb881e3cc9a0f428e366794a8026ff2c25831663644c48d2c76b32a8c5c9a00a27832a840c4a291966f02883d35ac6368eb8f7e2c538997cd0c65c95292d56a654589952a1644a4acad083271994d632a1319a90418b713200c34bc23599d262654a859529154aa6a4a40c3d789241692d131b650919b4182303c94a6fafc9a01627832a9c0caa103228a56498c1a30c4e47997cfe5a0f7760473caff1629c4c7e0f84abd70c6ab132a5c2ca940a25535252861e3cc9a0b49231f9170919b4d8f99b8c97ca09306178320f95437ec93e798f017ba1307c375873a130819482ae40ac4cc0a59307938e1e257df318666c7420f7109e8df3c84daf2e79b085c9832d4c1ea54079d0e9e4c1a4a347494f3c52de3c84079a8df1d0f9a30d2e5d1f7c61f4e00ba3072a101e4c3a7a70e9ab074a6b0fd0f9d17cee81673bf78851da7c3cf9acd2eb77d37c7b687bf1d4f6ddbe118fcf2fda7ea8bfa4fe032b1a87f20a656e6473747265616d0a656e646f626a0a312030206f626a0a3c3c2f54797065202f50616765730a2f4b696473205b3320302052205d0a2f436f756e7420310a2f4d65646961426f78205b302030203834312e3839203539352e32385d0a3e3e0a656e646f626a0a352030206f626a0a3c3c2f46696c746572202f466c6174654465636f6465202f4c656e677468203336343e3e0a73747265616d0a789c5d52cb6e833010bcf3153ea687084c1a82258444499038f4a1d27e008125452a061972e0efbbbb76d2aa4858e3b16776566b3f2f8fa5ee17e1bf99b1a960115daf5b03f378350d88335c7aedc950b47db3b81dafcd504f9e8fe26a9d17184add8d5e92f8ef78362f66159bac1dcff0e0f9afa605d3eb8bd87ce615eeabeb347dc3007a118197a6a2850e7d9eebe9a51e40f82cdb962d9ef7cbba45cdef8d8f750211f25eda2ccdd8c23cd50d985a5fc04b8220154951a41ee8f6df596415e7eeefd543814b805fea257184383ee0120621114a2256211332266247c4a325722248a2ac44ee90c85c7d32454c316e05a5ba0568be6a83e5029665e413bb2219612a1248ac8bd8d53a11dedb6411e198ee843963c5fc8e5bc8581b317eb2bc229c33bf67cf13e3c391f23b4fe295f53c725fec292def3c2561e7493995f3a4b695f3a49caab03876dd73b7340e7a30f73937576370c4fcaa78b634d55ec3fde14de3442afa7f007f0db6a90a656e6473747265616d0a656e646f626a0a362030206f626a0a3c3c2f54797065202f466f6e740a2f42617365466f6e74202f48656c7665746963612d426f6c640a2f53756274797065202f54797065310a2f456e636f64696e67202f57696e416e7369456e636f64696e670a2f546f556e69636f64652035203020520a3e3e0a656e646f626a0a322030206f626a0a3c3c0a2f50726f63536574205b2f504446202f54657874202f496d61676542202f496d61676543202f496d616765495d0a2f466f6e74203c3c0a2f46312036203020520a3e3e0a2f584f626a656374203c3c0a3e3e0a3e3e0a656e646f626a0a372030206f626a0a3c3c0a2f50726f647563657220284650444620312e3836290a2f4372656174696f6e446174652028443a32303234303532323138333535302b303227303027290a3e3e0a656e646f626a0a382030206f626a0a3c3c0a2f54797065202f436174616c6f670a2f50616765732031203020520a3e3e0a656e646f626a0a787265660a3020390a303030303030303030302036353533352066200a30303030303030393939203030303030206e200a30303030303031363338203030303030206e200a30303030303030303039203030303030206e200a30303030303030303837203030303030206e200a30303030303031303836203030303030206e200a30303030303031353230203030303030206e200a30303030303031373432203030303030206e200a30303030303031383235203030303030206e200a747261696c65720a3c3c0a2f53697a6520390a2f526f6f742038203020520a2f496e666f2037203020520a3e3e0a7374617274787265660a313837340a2525454f460a, 'installation.pdf', '2024-05-22 16:41:16');

-- --------------------------------------------------------

--
-- Table structure for table `folders`
--

CREATE TABLE `folders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `folders`
--

INSERT INTO `folders` (`id`, `name`) VALUES
(1, 'water bill'),
(2, 'water bill'),
(3, 'transaction'),
(4, 'transaction'),
(5, 'transaction'),
(6, ''),
(7, 'water bill'),
(8, 'water bill'),
(9, 'water bill'),
(10, ''),
(11, 'wews');

-- --------------------------------------------------------

--
-- Table structure for table `installed_clients`
--

CREATE TABLE `installed_clients` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `block` varchar(255) DEFAULT NULL,
  `lot` varchar(255) DEFAULT NULL,
  `phase` varchar(255) DEFAULT NULL,
  `name_of_materials` varchar(255) DEFAULT NULL,
  `number_of_orders` int(11) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `installed` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `installed_clients`
--

INSERT INTO `installed_clients` (`id`, `customer_id`, `firstname`, `middlename`, `lastname`, `block`, `lot`, `phase`, `name_of_materials`, `number_of_orders`, `size`, `brand`, `installed`) VALUES
(1, 1, 'user', 'user', 'user', '2', '11', '2', NULL, NULL, NULL, NULL, 0),
(2, 1, 'user', 'user', 'user', '2', '11', '2', '11', 11, '11', '11', 11),
(3, 1, 'user', 'user', 'user', '2', '11', '2', '11', 11, '11', '11', 11),
(5, 1, 'user', 'user', 'user', '2', '11', '2', '11', 11, '11', '11', 11),
(6, 1, 'user', 'user', 'user', '2', '11', '2', '11', 11, '11', '11', 11),
(7, 62, 'Mary Jean', 'Balili', 'Arnado', '2', '11', '2', '11', 11, '11', '11', 11),
(8, 62, 'Mary Jean', 'Balili', 'Arnado', '2', '11', '2', '11', 11, '11', '11', 11),
(9, 62, 'Mary Jean', 'Balili', 'Arnado', '2', '11', '2', '', 0, '', '', 0),
(10, 62, 'Mary Jean', 'Balili', 'Arnado', '2', '11', '2', '', 0, '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` int(255) NOT NULL,
  `customer_id` int(255) NOT NULL,
  `name_of_materials` varchar(50) NOT NULL,
  `number_of_orders` varchar(50) NOT NULL,
  `size` varchar(50) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `done` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `customer_id`, `name_of_materials`, `number_of_orders`, `size`, `brand`, `status`, `done`) VALUES
(55, 1, 'teflon', '1', '1/2', 'GI', 0, 0),
(56, 1, 'nipple', '2', 'small', 'GI', 0, 0),
(57, 62, 'gi', '2', '1/2', 'na', 1, 0),
(58, 62, 'gi', '2', '1/2', 'na', 1, 0),
(64, 63, 'tefflon', '1', '1/2', 'GI', 0, 0),
(65, 63, 'test', '11', '2', 'GI', 0, 0),
(66, 100, 'GATE VALVE', '1', '1/2', 'GI', 0, 0),
(67, 100, 'CHECK VALVE', '1', '1/2', 'GI', 0, 0),
(68, 100, 'ELBOW', '2', '1/2', 'GI', 0, 0),
(69, 100, 'NIPPLE', '2', '1/2', 'GI', 0, 0),
(70, 100, 'NIPPLE 3 INCHES', '1', '1/2', 'GI', 0, 0),
(71, 100, 'COUPLING PLASTIC', '1', '1/2', 'N/A', 0, 0),
(72, 100, 'SMALL TAPELON', '2', '', 'N/A', 0, 0),
(76, 1, 'Tape', '1', '2', 'GI', 0, 0),
(77, 62, 'new', '1', '1', 'GI', 1, 0),
(79, 101, 'Tape', '1', '2', 'GI', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bill_type` varchar(50) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `bill_type`, `message`, `created_at`) VALUES
(4, 33, 'installation', 'Payment of ₱ 1000.00 has been received for OR Number: 5785.', '2024-05-22 10:50:54'),
(5, 43, 'installation', 'Payment of ₱ 1000.00 has been received for OR Number: 8876.', '2024-05-22 15:22:28'),
(6, 17, 'water_bill', 'Payment of ₱ ₱217.00 has been received for OR Number: .', '2024-06-17 13:47:39'),
(7, 18, 'water_bill', 'Payment of ₱ ₱217.00 has been received for OR Number: 52.', '2024-06-17 14:14:22'),
(8, 20, 'water_bill', 'Payment of ₱ ₱1,128.00 has been received for OR Number: 53.', '2024-06-17 14:14:43'),
(9, 22, 'water_bill', 'Payment of ₱ ₱1,128.00 has been received for OR Number: 55.', '2024-06-17 14:35:13'),
(10, 24, 'installation', 'Payment of ₱ ₱1,234.00 has been received for OR Number: 56.', '2024-06-17 14:35:49'),
(11, 25, 'water_bill', 'Payment of ₱ 1128.00 has been received for OR Number: 57.', '2024-06-17 14:36:14');

-- --------------------------------------------------------

--
-- Table structure for table `or_details`
--

CREATE TABLE `or_details` (
  `or_number` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) NOT NULL,
  `bill_type` varchar(255) NOT NULL,
  `block` varchar(50) NOT NULL,
  `lot` varchar(50) NOT NULL,
  `phase` varchar(50) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `or_details`
--

INSERT INTO `or_details` (`or_number`, `name`, `middle_name`, `last_name`, `bill_type`, `block`, `lot`, `phase`, `amount`, `timestamp`) VALUES
(1, 'larnec', 'can', 'canillo', 'water_bill', '2', '10', '2', '0.00', '2024-06-17 13:47:39'),
(52, 'larnec', 'can', 'canillo', 'water_bill', '2', '10', '2', '0.00', '2024-06-17 14:14:22'),
(53, 'Mary Jean', 'Balili', 'Arnado', 'water_bill', '2', '11', '2', '0.00', '2024-06-17 14:14:43'),
(55, 'Mary Jean', 'Balili', 'Arnado', 'water_bill', '2', '11', '2', '0.00', '2024-06-17 14:35:13'),
(56, 'Mary Jean', 'Balili', 'Arnado', 'installation', '2', '11', '2', '0.00', '2024-06-17 14:35:49'),
(57, 'Mary Jean', 'Balili', 'Arnado', 'water_bill', '2', '11', '2', '1128.00', '2024-06-17 14:36:14');

-- --------------------------------------------------------

--
-- Table structure for table `payment_services`
--

CREATE TABLE `payment_services` (
  `id` int(11) UNSIGNED NOT NULL,
  `customer_id` int(255) NOT NULL,
  `bill_type` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `block` varchar(255) NOT NULL,
  `lot` varchar(255) NOT NULL,
  `phase` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `real_timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL DEFAULT 0,
  `mode_of_payment` varchar(50) DEFAULT NULL,
  `uploaded_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_services`
--

INSERT INTO `payment_services` (`id`, `customer_id`, `bill_type`, `firstname`, `middlename`, `lastname`, `block`, `lot`, `phase`, `amount`, `real_timestamp`, `status`, `mode_of_payment`, `uploaded_image`) VALUES
(16, 63, 'water_bill', 'larnec', 'can', 'canillo', '2', '10', '2', '217.00', '2024-03-12 01:38:52', 1, 'GCash', ''),
(17, 63, 'water_bill', 'larnec', 'can', 'canillo', '2', '10', '2', '217.00', '2024-03-12 01:45:24', 1, 'GCash', 'upload/Screenshot 2024-02-27 160709.png'),
(18, 63, 'water_bill', 'larnec', 'can', 'canillo', '2', '10', '2', '217.00', '2024-03-12 01:52:34', 1, 'GCash', 'upload/Screenshot 2024-02-27 084026.png'),
(19, 62, 'water_bill', 'Mary Jean', 'Balili', 'Arnado', '2', '11', '2', '1128.00', '2024-03-12 05:25:26', 1, 'PayMaya', 'upload/Screenshot 2024-02-29 150036.png'),
(20, 62, 'water_bill', 'Mary Jean', 'Balili', 'Arnado', '2', '11', '2', '1128.00', '2024-03-12 05:25:59', 1, 'PayMaya', 'upload/Screenshot 2024-02-29 150036.png'),
(21, 62, 'water_bill', 'Mary Jean', 'Balili', 'Arnado', '2', '11', '2', '406.30', '2024-03-13 01:50:12', 1, 'GCash', 'upload/image-removebg-preview.png'),
(22, 62, 'water_bill', 'Mary Jean', 'Balili', 'Arnado', '2', '11', '2', '1128.00', '2024-03-13 07:29:40', 1, 'GCash', 'upload/gcash logo.png'),
(24, 62, 'installation', 'Mary Jean', 'Balili', 'Arnado', '2', '11', '2', '1234.00', '2024-03-13 07:32:07', 1, 'PayMaya', 'upload/428304660_3119531941516848_1219879730996329932_n-removebg-preview.png'),
(25, 62, 'water_bill', 'Mary Jean', 'Balili', 'Arnado', '2', '11', '2', '1128.00', '2024-03-18 05:35:02', 1, 'GCash', 'upload/430900628_1299293347625044_3060712844270264991_n.png'),
(26, 62, 'installation', 'Mary Jean', 'Balili', 'Arnado', '2', '11', '2', '1000.00', '2024-03-21 05:18:36', 0, 'GCash', 'upload/430900628_1299293347625044_3060712844270264991_n.png'),
(27, 63, 'installation', 'larnec', 'can', 'canillo', '2', '10', '2', '2000.00', '2024-03-22 01:42:39', 0, 'GCash', 'upload/430900628_1299293347625044_3060712844270264991_n.png'),
(28, 100, 'installation', 'James', 'Jecemeco', 'Tabilog', '9', '19', '2', '1000.00', '2024-03-22 06:16:10', 1, 'GCash', 'upload/430900628_1299293347625044_3060712844270264991_n.png'),
(31, 62, 'installation', 'Mary Jean', 'Balili', 'Arnado', '2', '11', '2', '1000.00', '2024-05-14 14:22:40', 0, 'GCash', 'upload/ARNADZ.jpg'),
(32, 62, 'installation', 'Mary Jean', 'Balili', 'Arnado', '2', '11', '2', '1000.00', '2024-05-14 14:24:57', 0, 'GCash', 'upload/ARNADZ.jpg'),
(33, 62, 'installation', 'Mary Jean', 'Balili', 'Arnado', '2', '11', '2', '1000.00', '2024-05-14 14:27:31', 1, 'GCash', 'upload/ARNADZ.jpg'),
(34, 62, 'installation', 'Mary Jean', 'Balili', 'Arnado', '2', '11', '2', '1000.00', '2024-05-14 14:28:04', 1, 'GCash', 'upload/ARNADZ.jpg'),
(38, 62, 'installation', 'Mary Jean', 'Balili', 'Arnado', '2', '11', '2', '1000.00', '2024-05-20 03:16:56', 1, 'GCash', 'upload/370625601_1166627218057186_8798402658022481174_n.jpg'),
(39, 62, 'installation', 'Mary Jean', 'Balili', 'Arnado', '2', '11', '2', '1000.00', '2024-05-20 03:31:38', 1, 'GCash', 'upload/d5d46338-a6d0-41c4-8aa4-91f9596a58b3.jpg'),
(40, 62, 'transaction_fee', 'Mary Jean', 'Balili', 'Arnado', '2', '11', '2', '222.00', '2024-05-20 03:33:43', 1, 'GCash', 'upload/436352349_1156175978910979_8405326755931069910_n.jpg'),
(41, 101, 'installation', 'test', 'test', 'test', '1', '1', '1', '1000.00', '2024-05-22 15:17:04', 0, 'GCash', 'upload/download (1).jpg'),
(42, 101, 'installation', 'test', 'test', 'test', '1', '1', '1', '1000.00', '2024-05-22 15:19:16', 0, 'GCash', 'upload/download (1).jpg'),
(43, 101, 'installation', 'test', 'test', 'test', '1', '1', '1', '1000.00', '2024-05-22 15:21:24', 1, 'GCash', 'upload/download (1).jpg'),
(44, 101, 'water_bill', 'test', 'test', 'test', '1', '1', '1', '478.00', '2024-05-22 15:41:19', 0, 'GCash', 'upload/download (1).jpg'),
(45, 62, 'water_bill', 'Mary Jean', 'Balili', 'Arnado', '2', '11', '2', '1128.00', '2024-05-28 05:08:36', 0, 'GCash', 'upload/it girl.jpg'),
(46, 62, 'water_bill', 'Mary Jean', 'Balili', 'Arnado', '2', '11', '2', '1128.00', '2024-05-28 05:14:25', 0, 'GCash', 'upload/Tulips ♥.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `report_issue`
--

CREATE TABLE `report_issue` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `middleName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `block` varchar(50) NOT NULL,
  `lot` varchar(50) NOT NULL,
  `phase` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `report_issue`
--

INSERT INTO `report_issue` (`id`, `name`, `middleName`, `lastName`, `block`, `lot`, `phase`, `message`, `created_at`, `status`) VALUES
(1, 'user', 'user', 'user', '2', '11', '2', 'hello', '2024-02-16 01:34:32', 1),
(2, 'user', 'user', 'user', '2', '11', '2', 'asdasdsd', '2024-02-19 05:13:44', 1),
(3, 'user', 'user', 'user', '2', '11', '2', 'i have water leaking please come immediately ', '2024-02-19 05:20:28', 1),
(4, 'user', 'user', 'user', '2', '11', '2', 'please naay leaking saamoa please ko adto dre', '2024-02-20 00:23:42', 1),
(5, 'user', 'user', 'user', '2', '11', '2', 'asdasdasd', '2024-02-20 00:27:51', 1),
(6, 'user', 'user', 'user', '2', '11', '2', 'asdasd', '2024-02-20 00:28:01', 1),
(7, 'user', 'user', 'user', '2', '11', '2', 'asdasdasd', '2024-02-20 00:29:49', 0),
(8, 'user', 'user', 'user', '2', '11', '2', 'asdasdasdasdasdasd', '2024-02-20 00:31:28', 0),
(9, 'user', 'user', 'user', '2', '11', '2', 'asdasdasd', '2024-02-20 00:32:21', 0),
(10, 'Mary Jean', 'Balili', 'Arnado', '2', '11', '2', 'awaers', '2024-05-14 14:39:19', 1),
(11, 'Mary Jean', 'Balili', 'Arnado', '2', '11', '2', 'zzzz', '2024-05-14 14:41:22', 1),
(12, 'test', 'test', 'test', '1', '1', '1', 'water leak', '2024-05-22 15:42:19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `required_materials`
--

CREATE TABLE `required_materials` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `name_of_materials` varchar(255) DEFAULT NULL,
  `number_of_orders` int(11) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `required_materials`
--

INSERT INTO `required_materials` (`id`, `customer_id`, `name_of_materials`, `number_of_orders`, `size`, `brand`) VALUES
(1, 1, NULL, NULL, NULL, NULL),
(2, 1, NULL, NULL, NULL, NULL),
(3, 1, 'CHECK VALVE', 2, '22', 'GI');

-- --------------------------------------------------------

--
-- Table structure for table `statement_of_account`
--

CREATE TABLE `statement_of_account` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `present_reading` float NOT NULL,
  `previous_reading` float NOT NULL,
  `consumption` float NOT NULL,
  `rate` float NOT NULL,
  `total_due` float NOT NULL,
  `statement_date` date NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `statement_of_account`
--

INSERT INTO `statement_of_account` (`id`, `user_id`, `present_reading`, `previous_reading`, `consumption`, `rate`, `total_due`, `statement_date`, `status`) VALUES
(1, 1, 5020, 5000, 20, 23.9, 478, '2024-05-28', '0'),
(2, 62, 2420, 2380, 40, 28.2, 1128, '2024-05-28', '0'),
(3, 62, 2420, 2380, 40, 28.2, 1128, '2024-05-28', '0');

-- --------------------------------------------------------

--
-- Table structure for table `updated_materials`
--

CREATE TABLE `updated_materials` (
  `mat_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `name_of_materials` varchar(255) DEFAULT NULL,
  `number_of_orders` int(11) DEFAULT NULL,
  `size` varchar(50) DEFAULT NULL,
  `brand` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `block` int(50) NOT NULL,
  `lot` int(50) NOT NULL,
  `phase` int(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(500) NOT NULL,
  `emailadd` varchar(50) NOT NULL,
  `phonenum` bigint(12) NOT NULL,
  `address` varchar(50) NOT NULL,
  `postalcode` int(50) NOT NULL,
  `usertype` varchar(50) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `middlename`, `lastname`, `block`, `lot`, `phase`, `username`, `password`, `emailadd`, `phonenum`, `address`, `postalcode`, `usertype`, `photo`, `status`) VALUES
(1, 'user', 'user', 'user', 2, 77, 2, 'user1', 'user1', 'user@gmail.com', 9481470492, 'Gomez st.', 8000, 'User', '25134-243509515_1039914600139542_23318379698411900', 1),
(4, 'Jefferson', 'Balili', 'Arnado', 77, 77, 77, 'admin', 'admin', 'admin@gmail.com', 999999999, 'Toril Davao City', 8025, 'Admin', '56862-jepjep.jpg', 1),
(18, 'Kobe', 'Joe', 'Poria', 99, 99, 99, 'cashier', 'cashier', 'kobe@gmail.com', 9999999999, 'Toril Davao City', 8025, 'Manager', '56862-jepjep.jpg', 1),
(55, 'Jacob', 'Bali', 'Lorenzo', 77, 77, 77, 'reader', 'reader', 'reader@gmail.com', 9228226655, 'Toril Davao City', 8025, 'Reader', '56862-jepjep.jpg', 1),
(62, 'Mary Jean', 'Balili', 'Arnado', 2, 11, 2, 'user', '$2y$10$5xBsMYcaYB06fIc1ftQa1un1mplFJ3E5YksnxiLLczRc/XwK8vlUG', 'user@gmail.com', 9294521701, 'Don Lorenzo', 8000, 'User', '16450-screenshot-2023-10-16-133417.png', 1),
(63, 'larnec', 'can', 'canillo', 2, 10, 2, 'larc', '$2y$10$lpy98W3jRaNKrWtxcbX5yOWpa8orvhhlkoLppx.IUtsKpSF28nP7S', 'larc@gmail.com', 9227755421, 'Don lorenzo', 8000, 'User', '37289-screenshot-2024-02-27-160709.png', 1),
(99, 'Don', 'Lorenzo', 'Homes', 99, 99, 99, 'Owner', 'Owner', 'owner@gmail.com', 99998877, 'dlh', 8000, 'Owner', '25134-243509515_1039914600139542_23318379698411900', 1),
(100, 'James', 'Jecemeco', 'Tabilog', 9, 19, 2, 'james', '$2y$10$/C8L3LznnqFp3Fcgc2ggq.S2rc2qH0xOhgdIt2ewAjUgVCRvxlA/2', 'james@gmail.com', 9887766554, 'Lubogan', 9000, 'User', '88075-dfd-proposed-system.jpg', 1),
(101, 'test', 'test', 'test', 1, 1, 1, 'test', '$2y$10$0RfTFvczfLj7s/kORnBU6OnVc7LUCOeZqtRbNkYHOgYZwLmAbbWwe', 'test@gmail.com', 9228227654, 'Toril', 8000, 'User', '12098-download-(1).jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `water_application`
--

CREATE TABLE `water_application` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `block` varchar(10) NOT NULL,
  `lot` varchar(10) NOT NULL,
  `phase` varchar(10) NOT NULL,
  `file_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `water_application`
--

INSERT INTO `water_application` (`id`, `first_name`, `middle_name`, `last_name`, `block`, `lot`, `phase`, `file_path`) VALUES
(1, 'Jefferson', 'Balili', 'arnado', '2', '11', '2', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `water_consumption`
--

CREATE TABLE `water_consumption` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `previous_reading` int(11) DEFAULT NULL,
  `previous_reading_date` date DEFAULT NULL,
  `present_reading` int(11) DEFAULT NULL,
  `present_reading_date` date DEFAULT NULL,
  `total_consumption` int(11) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `water_consumption`
--

INSERT INTO `water_consumption` (`id`, `user_id`, `previous_reading`, `previous_reading_date`, `present_reading`, `present_reading_date`, `total_consumption`, `file_path`, `created_at`) VALUES
(1, 1, 5000, '2024-02-05', 5020, '2024-03-05', 20, 'uploads/Purple Organic Women\'s Day Timeline Infographic.jpg', '2024-03-05 02:32:44'),
(2, 1, 5000, '2024-02-05', 5020, '2024-03-05', 20, 'uploads/Purple Organic Women\'s Day Timeline Infographic.jpg', '2024-03-05 02:34:29'),
(3, 1, 5000, '2024-02-05', 5020, '2024-03-05', 20, 'uploads/Purple Organic Women\'s Day Timeline Infographic.jpg', '2024-03-05 02:34:43'),
(4, 62, 2380, '2024-02-08', 2420, '2024-03-08', 40, 'uploads/Screenshot 2024-02-27 160709.png', '2024-03-08 00:46:50'),
(5, 63, 10, '2024-02-12', 20, '2024-03-12', 10, 'uploads/Screenshot 2024-02-27 084026.png', '2024-03-12 00:10:15'),
(6, 62, 2380, '2024-02-08', 2420, '2024-04-21', 0, 'uploads/', '2024-04-21 10:55:26'),
(7, 62, 2380, '2024-02-08', 2420, '2024-04-25', 20, 'uploads/', '2024-04-25 13:19:47'),
(8, 62, 2380, '2024-02-08', 2400, '2024-05-20', 20, 'uploads/Green Yellow How To Make Noodle Instruction Infographic (14 x 48 in).png', '2024-05-20 05:17:06'),
(9, 62, 2380, '2024-02-08', 2650, '2024-05-22', 270, 'uploads/download (1).jpg', '2024-05-22 12:05:15'),
(10, 101, 0, '2024-04-22', 20, '2024-05-22', 20, 'uploads/download (1).jpg', '2024-05-22 15:40:58');

-- --------------------------------------------------------

--
-- Table structure for table `water_consumptionn`
--

CREATE TABLE `water_consumptionn` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `previous_reading` int(11) NOT NULL,
  `current_reading` int(11) NOT NULL,
  `total_consumption` int(11) NOT NULL,
  `total_due` decimal(10,2) NOT NULL,
  `payment_status` varchar(20) DEFAULT 'unpaid',
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `previous_reading_date` date DEFAULT NULL,
  `current_reading_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `water_consumptionn`
--

INSERT INTO `water_consumptionn` (`id`, `user_id`, `previous_reading`, `current_reading`, `total_consumption`, `total_due`, `payment_status`, `submission_date`, `previous_reading_date`, `current_reading_date`) VALUES
(4, 1, 5000, 5020, 20, '478.00', 'unpaid', '2024-03-05 01:39:10', '2024-02-05', '2024-03-05'),
(5, 62, 2380, 2420, 40, '1128.00', 'unpaid', '2024-03-08 00:46:07', '2024-02-08', '2024-03-08'),
(6, 63, 10, 20, 10, '217.00', 'unpaid', '2024-03-12 00:08:34', '2024-02-12', '2024-03-12'),
(7, 62, 203, 220, 17, '406.30', 'unpaid', '2024-03-13 01:45:10', '2024-03-13', '2024-04-13'),
(8, 63, 10, 20, 10, '217.00', 'unpaid', '2024-03-13 05:48:20', '2024-02-12', '2024-03-13'),
(9, 62, 2380, 2400, 20, '478.00', 'unpaid', '2024-03-24 11:30:11', '2024-02-08', '2024-03-24'),
(10, 101, 0, 20, 20, '478.00', 'unpaid', '2024-05-22 15:39:36', '2024-04-22', '2024-05-22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calculator_history`
--
ALTER TABLE `calculator_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `folder_id` (`folder_id`);

--
-- Indexes for table `financial_reports`
--
ALTER TABLE `financial_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `folders`
--
ALTER TABLE `folders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `installed_clients`
--
ALTER TABLE `installed_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `or_details`
--
ALTER TABLE `or_details`
  ADD PRIMARY KEY (`or_number`);

--
-- Indexes for table `payment_services`
--
ALTER TABLE `payment_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report_issue`
--
ALTER TABLE `report_issue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `required_materials`
--
ALTER TABLE `required_materials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `statement_of_account`
--
ALTER TABLE `statement_of_account`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `updated_materials`
--
ALTER TABLE `updated_materials`
  ADD PRIMARY KEY (`mat_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `water_application`
--
ALTER TABLE `water_application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `water_consumption`
--
ALTER TABLE `water_consumption`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `water_consumptionn`
--
ALTER TABLE `water_consumptionn`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calculator_history`
--
ALTER TABLE `calculator_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `financial_reports`
--
ALTER TABLE `financial_reports`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `folders`
--
ALTER TABLE `folders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `installed_clients`
--
ALTER TABLE `installed_clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `or_details`
--
ALTER TABLE `or_details`
  MODIFY `or_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `payment_services`
--
ALTER TABLE `payment_services`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `report_issue`
--
ALTER TABLE `report_issue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `required_materials`
--
ALTER TABLE `required_materials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `statement_of_account`
--
ALTER TABLE `statement_of_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `updated_materials`
--
ALTER TABLE `updated_materials`
  MODIFY `mat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `water_application`
--
ALTER TABLE `water_application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `water_consumption`
--
ALTER TABLE `water_consumption`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `water_consumptionn`
--
ALTER TABLE `water_consumptionn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `calculator_history`
--
ALTER TABLE `calculator_history`
  ADD CONSTRAINT `calculator_history_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_ibfk_1` FOREIGN KEY (`folder_id`) REFERENCES `folders` (`id`);

--
-- Constraints for table `required_materials`
--
ALTER TABLE `required_materials`
  ADD CONSTRAINT `required_materials_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `statement_of_account`
--
ALTER TABLE `statement_of_account`
  ADD CONSTRAINT `statement_of_account_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `water_consumption`
--
ALTER TABLE `water_consumption`
  ADD CONSTRAINT `water_consumption_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
