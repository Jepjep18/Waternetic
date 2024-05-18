-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2024 at 10:51 AM
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
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `folder_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `customer_id`, `name_of_materials`, `number_of_orders`, `size`, `brand`, `status`) VALUES
(55, 1, 'teflon', '1', '1/2', 'GI', 0),
(56, 1, 'nipple', '2', 'small', 'GI', 0),
(57, 62, 'gi', '2', '1/2', 'na', 1),
(58, 62, 'gi', '2', '1/2', 'na', 1),
(64, 63, 'tefflon', '1', '1/2', 'GI', 0),
(65, 63, 'test', '11', '2', 'GI', 0),
(66, 100, 'GATE VALVE', '1', '1/2', 'GI', 0),
(67, 100, 'CHECK VALVE', '1', '1/2', 'GI', 0),
(68, 100, 'ELBOW', '2', '1/2', 'GI', 0),
(69, 100, 'NIPPLE', '2', '1/2', 'GI', 0),
(70, 100, 'NIPPLE 3 INCHES', '1', '1/2', 'GI', 0),
(71, 100, 'COUPLING PLASTIC', '1', '1/2', 'N/A', 0),
(72, 100, 'SMALL TAPELON', '2', '', 'N/A', 0),
(76, 1, 'Tape', '1', '2', 'GI', 0),
(77, 62, 'new', '1', '1', 'GI', 1);

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
(12, 'user', 'user', 'user', 'installation', '2', '11', '2', '5000.00', '2024-02-05 12:20:04'),
(77, 'Mary Jean', 'Balili', 'Arnado', 'water_bill', '2', '11', '2', '406.30', '2024-03-13 05:51:11'),
(123, 'user', 'user', 'user', 'installation', '2', '11', '2', '1111.00', '2024-02-07 05:04:44'),
(1234, 'Mary Jean', 'Balili', 'Arnado', 'installation', '2', '11', '2', '1000.00', '2024-03-24 11:11:00');

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
(1, 1, 'water_bill', 'user', 'user', 'user', '2', '11', '2', '6000.00', '2024-02-20 05:54:10', 0, NULL, NULL),
(4, 1, 'installation', 'user', 'user', 'user', '2', '11', '2', '1000.00', '2024-02-21 00:36:31', 0, NULL, NULL),
(5, 1, 'transaction_fee', 'user', 'user', 'user', '2', '11', '2', '1000.00', '2024-02-22 02:03:06', 0, NULL, NULL),
(6, 57, 'water_bill', 'zzzz', 'zzzz', 'zzzz', '3', '1', '3', '1000.00', '2024-02-22 02:32:58', 0, NULL, NULL),
(7, 1, 'installation', 'user', 'user', 'user', '2', '11', '2', '1000.00', '2024-02-23 06:18:19', 0, NULL, NULL),
(10, 62, 'water_bill', 'Mary Jean', 'Balili', 'Arnado', '2', '11', '2', '1120.00', '2024-03-08 00:47:11', 0, NULL, NULL),
(11, 62, 'water_bill', 'Mary Jean', 'Balili', 'Arnado', '2', '11', '2', '1128.00', '2024-03-08 05:57:41', 0, NULL, NULL),
(12, 62, 'water_bill', 'Mary Jean', 'Balili', 'Arnado', '2', '11', '2', '1128.00', '2024-03-08 06:00:55', 0, NULL, NULL),
(13, 62, 'water_bill', 'Mary Jean', 'Balili', 'Arnado', '2', '11', '2', '1128.00', '2024-03-08 06:12:58', 0, NULL, NULL),
(14, 63, '', 'larnec', 'can', 'canillo', '2', '10', '2', '217.00', '2024-03-12 01:30:02', 0, 'GCash', NULL),
(15, 63, '', 'larnec', 'can', 'canillo', '2', '10', '2', '217.00', '2024-03-12 01:37:59', 0, 'GCash', ''),
(16, 63, 'water_bill', 'larnec', 'can', 'canillo', '2', '10', '2', '217.00', '2024-03-12 01:38:52', 0, 'GCash', ''),
(17, 63, 'water_bill', 'larnec', 'can', 'canillo', '2', '10', '2', '217.00', '2024-03-12 01:45:24', 0, 'GCash', 'upload/Screenshot 2024-02-27 160709.png'),
(18, 63, 'water_bill', 'larnec', 'can', 'canillo', '2', '10', '2', '217.00', '2024-03-12 01:52:34', 0, 'GCash', 'upload/Screenshot 2024-02-27 084026.png'),
(19, 62, 'water_bill', 'Mary Jean', 'Balili', 'Arnado', '2', '11', '2', '1128.00', '2024-03-12 05:25:26', 0, 'PayMaya', 'upload/Screenshot 2024-02-29 150036.png'),
(20, 62, 'water_bill', 'Mary Jean', 'Balili', 'Arnado', '2', '11', '2', '1128.00', '2024-03-12 05:25:59', 0, 'PayMaya', 'upload/Screenshot 2024-02-29 150036.png'),
(21, 62, 'water_bill', 'Mary Jean', 'Balili', 'Arnado', '2', '11', '2', '406.30', '2024-03-13 01:50:12', 1, 'GCash', 'upload/image-removebg-preview.png'),
(22, 62, 'water_bill', 'Mary Jean', 'Balili', 'Arnado', '2', '11', '2', '1128.00', '2024-03-13 07:29:40', 0, 'GCash', 'upload/gcash logo.png'),
(23, 62, '', 'Mary Jean', 'Balili', 'Arnado', '2', '11', '2', '12344.00', '2024-03-13 07:31:47', 0, 'GCash', 'upload/428304660_3119531941516848_1219879730996329932_n-removebg-preview.png'),
(24, 62, 'installation', 'Mary Jean', 'Balili', 'Arnado', '2', '11', '2', '1234.00', '2024-03-13 07:32:07', 0, 'PayMaya', 'upload/428304660_3119531941516848_1219879730996329932_n-removebg-preview.png'),
(25, 62, 'water_bill', 'Mary Jean', 'Balili', 'Arnado', '2', '11', '2', '1128.00', '2024-03-18 05:35:02', 0, 'GCash', 'upload/430900628_1299293347625044_3060712844270264991_n.png'),
(26, 62, 'installation', 'Mary Jean', 'Balili', 'Arnado', '2', '11', '2', '1000.00', '2024-03-21 05:18:36', 0, 'GCash', 'upload/430900628_1299293347625044_3060712844270264991_n.png'),
(27, 63, 'installation', 'larnec', 'can', 'canillo', '2', '10', '2', '2000.00', '2024-03-22 01:42:39', 0, 'GCash', 'upload/430900628_1299293347625044_3060712844270264991_n.png'),
(28, 100, 'installation', 'James', 'Jecemeco', 'Tabilog', '9', '19', '2', '1000.00', '2024-03-22 06:16:10', 0, 'GCash', 'upload/430900628_1299293347625044_3060712844270264991_n.png'),
(30, 62, 'installation', 'Mary Jean', 'Balili', 'Arnado', '2', '11', '2', '1000.00', '2024-03-24 11:07:05', 1, 'GCash', 'upload/dfd proposed updated.jpg');

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
(9, 'user', 'user', 'user', '2', '11', '2', 'asdasdasd', '2024-02-20 00:32:21', 0);

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
  `firstname` varchar(50) DEFAULT NULL,
  `middlename` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `block` varchar(10) DEFAULT NULL,
  `lot` varchar(10) DEFAULT NULL,
  `phase` varchar(10) DEFAULT NULL,
  `present_reading` decimal(10,2) DEFAULT NULL,
  `previous_reading` decimal(10,2) DEFAULT NULL,
  `present_reading_date` date DEFAULT NULL,
  `previous_reading_date` date DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `actual_consumption` decimal(10,2) DEFAULT NULL,
  `total_amount_due` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `statement_of_account`
--

INSERT INTO `statement_of_account` (`id`, `firstname`, `middlename`, `lastname`, `block`, `lot`, `phase`, `present_reading`, `previous_reading`, `present_reading_date`, `previous_reading_date`, `delivery_date`, `actual_consumption`, `total_amount_due`) VALUES
(4, 'user', 'user', 'user', '2', '11', '2', '3300.00', '3250.00', '2024-02-20', '2024-02-20', '0000-00-00', '50.00', '1520.00'),
(5, 'user', 'user', 'user', '2', '11', '2', '3300.00', '3250.00', '2024-02-20', '2024-02-20', '0000-00-00', '50.00', '1520.00'),
(6, 'user', 'user', 'user', '2', '11', '2', '3300.00', '3250.00', '2024-02-20', '2024-02-20', '0000-00-00', '50.00', '1520.00'),
(7, 'user', 'user', 'user', '2', '11', '2', '3300.00', '3250.00', '2024-02-20', '2024-02-20', '0000-00-00', '50.00', '1520.00'),
(8, 'user', 'user', 'user', '2', '11', '2', '3300.00', '3250.00', '2024-02-20', '2024-02-20', '0000-00-00', '50.00', '1520.00'),
(9, 'user', 'user', 'user', '2', '11', '2', '3300.00', '3250.00', '2024-02-20', '2024-02-20', '0000-00-00', '50.00', '1520.00'),
(10, 'user', 'user', 'user', '2', '11', '2', '3300.00', '3250.00', '2024-02-20', '2024-02-20', '0000-00-00', '50.00', '1520.00'),
(11, 'user', 'user', 'user', '2', '11', '2', '3300.00', '3250.00', '2024-02-20', '2024-02-20', '0000-00-00', '50.00', '1520.00'),
(12, 'user', 'user', 'user', '2', '11', '2', '3300.00', '3250.00', '2024-02-20', '2024-02-20', '0000-00-00', '50.00', '1520.00'),
(13, 'user', 'user', 'user', '2', '11', '2', '0.00', '0.00', '2024-02-20', '2024-02-20', '0000-00-00', '0.00', '0.00'),
(14, 'user', 'user', 'user', '2', '11', '2', '3300.00', '3250.00', '2024-02-21', '2024-02-21', '0000-00-00', '50.00', '1520.00'),
(15, 'user', 'user', 'user', '2', '11', '2', '3300.00', '3250.00', '2024-02-28', '2024-02-28', '0000-00-00', '50.00', '1520.00');

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
(60, 'qwerty', 'qwerty', 'qwerty', 3, 2, 1, 'qwerty', '$2y$10$k6WG.ZjZ.WJllM9l7xiK6OCUI7alpZeJ/TTKMuyWpLSQ3ecME3CgG', 'qwerty@gmail.com', 9228227890, 'toril', 8000, 'User', '91746-screenshot-2024-03-06-081406.png', 1),
(61, 'asdfgh', 'asdfgh', 'asdfgh', 3, 3, 3, 'asdfgh', '$2y$10$5ecYZClz2jEF/qOu.Hjn6O/gUoHabbp/K5jXOonF7RfGhOJnYxjKq', 'asdfgh@gmail.com', 922987654, 'Toril', 8000, 'User', '40168-screenshot-2024-02-29-145115.png', 0),
(62, 'Mary Jean', 'Balili', 'Arnado', 2, 11, 2, 'user', '$2y$10$5xBsMYcaYB06fIc1ftQa1un1mplFJ3E5YksnxiLLczRc/XwK8vlUG', 'user@gmail.com', 9294521701, 'Don Lorenzo', 8000, 'User', '16450-screenshot-2023-10-16-133417.png', 1),
(63, 'larnec', 'can', 'canillo', 2, 10, 2, 'larc', '$2y$10$lpy98W3jRaNKrWtxcbX5yOWpa8orvhhlkoLppx.IUtsKpSF28nP7S', 'larc@gmail.com', 9227755421, 'Don lorenzo', 8000, 'User', '37289-screenshot-2024-02-27-160709.png', 1),
(99, 'Don', 'Lorenzo', 'Homes', 99, 99, 99, 'Owner', 'Owner', 'owner@gmail.com', 99998877, 'dlh', 8000, 'Owner', '25134-243509515_1039914600139542_23318379698411900', 1),
(100, 'James', 'Jecemeco', 'Tabilog', 9, 19, 2, 'james', '$2y$10$/C8L3LznnqFp3Fcgc2ggq.S2rc2qH0xOhgdIt2ewAjUgVCRvxlA/2', 'james@gmail.com', 9887766554, 'Lubogan', 9000, 'User', '88075-dfd-proposed-system.jpg', 1);

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
(7, 62, 2380, '2024-02-08', 2420, '2024-04-25', 20, 'uploads/', '2024-04-25 13:19:47');

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
(9, 62, 2380, 2400, 20, '478.00', 'unpaid', '2024-03-24 11:30:11', '2024-02-08', '2024-03-24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `folder_id` (`folder_id`);

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
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `or_details`
--
ALTER TABLE `or_details`
  MODIFY `or_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1235;

--
-- AUTO_INCREMENT for table `payment_services`
--
ALTER TABLE `payment_services`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `report_issue`
--
ALTER TABLE `report_issue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `required_materials`
--
ALTER TABLE `required_materials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `statement_of_account`
--
ALTER TABLE `statement_of_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `updated_materials`
--
ALTER TABLE `updated_materials`
  MODIFY `mat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `water_application`
--
ALTER TABLE `water_application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `water_consumption`
--
ALTER TABLE `water_consumption`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `water_consumptionn`
--
ALTER TABLE `water_consumptionn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

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
-- Constraints for table `water_consumption`
--
ALTER TABLE `water_consumption`
  ADD CONSTRAINT `water_consumption_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
