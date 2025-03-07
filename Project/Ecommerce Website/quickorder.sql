-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2025 at 05:01 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quickorder`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `refer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`id`, `name`, `phone`, `email`, `username`, `password`, `refer`) VALUES
(1, 'Malay', '9876543210', 'malay@gmail.com', 'admin', '1234', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`) VALUES
(1, 'Tata'),
(2, 'Amul'),
(3, 'Pepsi'),
(4, 'Brooke Band'),
(5, 'Nescafe'),
(12, 'Thums Up'),
(13, 'Mountain Dew'),
(14, 'Kellogg'),
(15, 'Britannia');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Tea'),
(3, 'Coffee'),
(4, 'Drinks'),
(6, 'Milk'),
(7, 'Food'),
(30, 'Flakes & Cereals'),
(32, 'Bread');

-- --------------------------------------------------------

--
-- Table structure for table `deleted_accounts`
--

CREATE TABLE `deleted_accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `deleted_at` datetime NOT NULL,
  `reason` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deleted_accounts`
--

INSERT INTO `deleted_accounts` (`id`, `username`, `email`, `deleted_at`, `reason`) VALUES
(3, 'user3', 'sandeep@gmail.com', '0000-00-00 00:00:00', 'no reason\r\n'),
(4, 'user3', 'sandeep@gmail.com', '2024-06-08 08:13:36', 'no reason\r\n'),
(5, 'user3', 'sandeep@gmail.com', '2024-06-08 08:16:49', 'no reason\r\n'),
(6, 'd1', 'sandeep@gmail.com', '2024-06-08 08:18:15', 'testing deletes feature '),
(7, 't123', 'bijay@gmail.com', '2024-06-08 08:33:15', 'its my choice'),
(8, 'test', 'malay@gmail.com', '2025-03-06 04:47:52', ''),
(10, 'malay', 'malay@gmail.com', '2025-03-06 05:25:16', 'Message');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `invoice_number` varchar(50) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `invoice_number`, `product_id`, `quantity`, `date`) VALUES
(13, '1339274718', 1, 10, '2024-05-12 14:23:37'),
(14, '1339274718', 2, 1, '2024-05-12 14:23:37'),
(15, '1339274718', 6, 1, '2024-05-12 14:23:37'),
(16, '1339274718', 8, 1, '2024-05-12 14:23:37'),
(17, '1648856675', 1, 1, '2024-05-12 14:24:05'),
(18, '1648856675', 2, 1, '2024-05-12 14:24:05'),
(19, '1648856675', 3, 1, '2024-05-12 14:24:05'),
(20, '1648856675', 6, 1, '2024-05-12 14:24:05'),
(21, '673492875', 1, 1, '2024-05-12 14:27:39'),
(22, '673492875', 7, 1, '2024-05-12 14:27:39'),
(23, '673492875', 8, 1, '2024-05-12 14:27:39'),
(24, '366728027', 2, 1, '2024-05-12 14:28:19'),
(25, '366728027', 6, 1, '2024-05-12 14:28:19'),
(26, '1148597705', 6, 9, '2024-05-12 14:29:57'),
(27, '830389851', 6, 1, '2024-05-12 14:36:44'),
(28, '29742985', 6, 3, '2024-05-12 14:38:39'),
(29, '1341725404', 3, 3, '2024-05-15 14:06:21'),
(30, '6693108096', 2, 4, '2024-05-15 14:11:03'),
(31, '6693108096', 3, 3, '2024-05-15 14:11:03'),
(32, '6656938291', 3, 3, '2024-05-15 14:13:15'),
(33, '6415792279', 1, 3, '2024-05-15 14:21:33'),
(34, '6415792279', 3, 10, '2024-05-15 14:21:33'),
(35, '6415792279', 6, 3, '2024-05-15 14:21:34'),
(36, '6415792279', 7, 9, '2024-05-15 14:21:34'),
(37, '3557895787', 3, 3, '2024-05-19 09:19:51'),
(38, '5005242779', 5, 1, '2024-05-19 09:21:01'),
(39, '5074066612', 1, 1, '2024-05-19 09:22:42'),
(40, '5074066612', 2, 1, '2024-05-19 09:22:42'),
(41, '5074066612', 3, 1, '2024-05-19 09:22:42'),
(42, '5074066612', 4, 1, '2024-05-19 09:22:42'),
(43, '5074066612', 5, 1, '2024-05-19 09:22:42'),
(44, '5074066612', 6, 1, '2024-05-19 09:22:42'),
(45, '5074066612', 7, 1, '2024-05-19 09:22:42'),
(46, '5074066612', 8, 1, '2024-05-19 09:22:42'),
(47, '6757172522', 1, 3, '2024-05-19 09:33:55'),
(48, '6757172522', 3, 4, '2024-05-19 09:33:55'),
(49, '6757172522', 4, 4, '2024-05-19 09:33:55'),
(50, '6757172522', 6, 4, '2024-05-19 09:33:55'),
(51, '7109477656', 2, 1, '2024-05-20 14:06:28'),
(52, '8016884758', 7, 1, '2024-05-20 14:07:47'),
(53, '3212421746', 7, 1, '2024-05-20 14:07:49'),
(54, '1496513673', 7, 1, '2024-05-20 14:08:00'),
(55, '6845704277', 4, 1, '2024-05-28 07:42:02'),
(56, '8448516573', 2, 1, '2024-05-30 05:01:41'),
(57, '5304381005', 1, 1, '2024-05-30 05:02:27'),
(58, '9610461696', 1, 1, '2024-05-30 05:27:40'),
(59, '7514748286', 3, 1, '2024-05-30 05:28:25'),
(60, '4726350492', 3, 1, '2024-05-30 05:37:22'),
(61, '4726350492', 4, 1, '2024-05-30 05:37:22'),
(62, '7440850653', 8, 1, '2024-05-30 06:16:55'),
(63, '7226390517', 7, 1, '2024-05-30 06:18:56'),
(64, '2804273126', 3, 1, '2024-05-30 06:22:10'),
(65, '6595639201', 7, 5, '2024-05-30 06:25:15'),
(66, '1464776195', 8, 1, '2024-05-30 06:47:38'),
(67, '6992601800', 8, 1, '2024-05-30 07:02:10'),
(68, '2883223936', 8, 1, '2024-05-30 07:07:43'),
(69, '9142964732', 8, 1, '2024-05-30 07:08:41'),
(70, '7228729445', 7, 1, '2024-05-30 07:21:12'),
(71, '4885695044', 7, 1, '2024-05-30 07:23:59'),
(72, '4367458455', 8, 1, '2024-05-30 07:35:10'),
(73, '9279709666', 8, 1, '2024-05-30 07:35:14'),
(74, '2977039910', 8, 1, '2024-05-30 07:35:20'),
(75, '3957931674', 8, 1, '2024-05-30 07:35:28'),
(76, '9215664074', 8, 1, '2024-05-30 07:35:45'),
(77, '8654122444', 8, 1, '2024-05-30 07:35:47'),
(78, '4807951397', 8, 1, '2024-05-30 07:37:39'),
(79, '6702727015', 8, 1, '2024-05-30 07:37:42'),
(80, '5470533490', 8, 1, '2024-05-30 07:38:02'),
(81, '6354907040', 8, 1, '2024-05-30 07:39:09'),
(82, '3710660553', 8, 1, '2024-05-30 07:39:13'),
(83, '5141109099', 8, 1, '2024-05-30 07:39:51'),
(84, '6300179671', 8, 1, '2024-05-30 07:40:19'),
(85, '2289037990', 8, 1, '2024-05-30 07:41:39'),
(86, '9574660151', 7, 1, '2024-05-30 07:43:27'),
(87, '4927751405', 7, 1, '2024-05-30 07:43:30'),
(88, '9293871833', 7, 1, '2024-05-30 07:44:06'),
(89, '2367544677', 7, 1, '2024-05-30 07:47:58'),
(90, '1225498480', 7, 1, '2024-05-30 07:48:14'),
(91, '8616723156', 3, 1, '2024-05-30 07:50:44'),
(92, '9353131472', 1, 1, '2024-05-30 07:51:30'),
(93, '9353131472', 2, 1, '2024-05-30 07:51:30'),
(94, '5602200437', 1, 1, '2024-05-30 07:58:11'),
(95, '5359504700', 1, 1, '2024-05-30 08:27:34'),
(96, '6577947901', 8, 1, '2024-05-30 08:28:15'),
(97, '3004296141', 4, 2, '2024-06-13 18:50:03'),
(98, '1101591309', 3, 1, '2024-07-18 14:14:35'),
(99, '5946697115', 7, 1, '2024-07-18 14:15:00'),
(100, '8177284661', 8, 1, '2024-07-20 08:18:18'),
(101, '8598384133', 8, 1, '2024-07-20 18:16:37'),
(102, '8757436736', 7, 1, '2024-07-27 09:12:34'),
(103, '7982696666', 4, 2, '2024-07-28 04:57:04'),
(104, '7982696666', 7, 3, '2024-07-28 04:57:04'),
(105, '7982696666', 10, 3, '2024-07-28 04:57:04'),
(106, '7153441396', 3, 1, '2024-07-28 17:25:34'),
(107, '7153441396', 10, 1, '2024-07-28 17:25:34'),
(108, '8219214706', 3, 1, '2024-07-28 17:27:10'),
(109, '8219214706', 10, 1, '2024-07-28 17:27:10'),
(110, '4539397160', 3, 1, '2024-10-15 17:53:29'),
(111, '3667561549', 1, 1, '2025-01-07 19:27:42'),
(112, '3667561549', 2, 1, '2025-01-07 19:27:42'),
(113, '3667561549', 3, 1, '2025-01-07 19:27:42'),
(114, '3667561549', 4, 1, '2025-01-07 19:27:42'),
(115, '3667561549', 5, 1, '2025-01-07 19:27:42'),
(116, '3667561549', 6, 1, '2025-01-07 19:27:42'),
(117, '3667561549', 9, 1, '2025-01-07 19:27:42'),
(118, '3667561549', 10, 1, '2025-01-07 19:27:42'),
(119, '3667561549', 11, 1, '2025-01-07 19:27:42'),
(120, '3667561549', 12, 1, '2025-01-07 19:27:42'),
(121, '7028608668', 1, 1, '2025-01-07 19:28:18'),
(122, '7028608668', 2, 1, '2025-01-07 19:28:18'),
(123, '7028608668', 3, 1, '2025-01-07 19:28:18'),
(124, '7028608668', 4, 1, '2025-01-07 19:28:19'),
(125, '7028608668', 5, 1, '2025-01-07 19:28:19'),
(126, '7028608668', 6, 1, '2025-01-07 19:28:19'),
(127, '7028608668', 9, 1, '2025-01-07 19:28:19'),
(128, '7028608668', 10, 1, '2025-01-07 19:28:19'),
(129, '7028608668', 11, 1, '2025-01-07 19:28:19'),
(130, '7028608668', 12, 1, '2025-01-07 19:28:19'),
(131, '4972604640', 1, 50, '2025-01-07 19:32:36'),
(132, '4972604640', 2, 100, '2025-01-07 19:32:36'),
(133, '4972604640', 3, 300, '2025-01-07 19:32:36'),
(134, '4972604640', 9, 250, '2025-01-07 19:32:36'),
(135, '4972604640', 10, 50, '2025-01-07 19:32:36'),
(136, '4972604640', 11, 100, '2025-01-07 19:32:36'),
(137, '7558664442', 1, 2, '2025-02-20 10:38:25'),
(138, '4851074598', 3, 1, '2025-02-22 08:44:07'),
(139, '4851074598', 4, 1, '2025-02-22 08:44:07'),
(140, '8172650455', 3, 2, '2025-03-06 15:45:53'),
(141, '8172650455', 4, 3, '2025-03-06 15:45:53'),
(142, '8554739745', 3, 1, '2025-03-06 15:49:32'),
(143, '4695320876', 3, 2, '2025-03-06 16:22:11'),
(144, '4695320876', 13, 4, '2025-03-06 16:22:11');

-- --------------------------------------------------------

--
-- Table structure for table `order_address`
--

CREATE TABLE `order_address` (
  `order_id` int(11) NOT NULL,
  `invoice_number` varchar(50) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `country` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `pincode` varchar(50) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_address`
--

INSERT INTO `order_address` (`order_id`, `invoice_number`, `firstName`, `lastName`, `username`, `email`, `phone`, `address`, `country`, `state`, `pincode`, `payment_method`, `date`) VALUES
(1, '1339274718', 'Malay', 'Mridha', 'admin', 'malay@gmail.com', '09876543210', 'Kolkata, India', 'INDIA', 'DELHI', '894108', 'offline', '2024-05-12 14:23:37'),
(2, '1648856675', 'Malay', 'Mridha', 'admin', 'malay@gmail.com', '09876543210', 'Kolkata, India', 'INDIA', 'DELHI', '894108', 'offline', '2024-05-12 14:24:05'),
(3, '673492875', 'Malay', 'Mridha', 'admin', 'malay@gmail.com', '09876543210', 'Kolkata, India', 'INDIA', 'DELHI', '894108', 'offline', '2024-05-12 14:27:39'),
(4, '366728027', 'Malay', 'Mridha', 'admin', 'malay@gmail.com', '123456789', 'Kolkata, India', 'INDIA', 'DELHI', '894108', 'online', '2024-05-12 14:28:19'),
(5, '1148597705', 'Malay', 'Mridha', 'admin', 'malay@gmail.com', '09876543210', 'Kolkata, India', 'INDIA', 'DELHI', '894108', 'online', '2024-05-12 14:29:57'),
(6, '830389851', 'Malay', 'Mridha', 'admin', 'malay@gmail.com', '09876543210', 'Kolkata, India', 'INDIA', 'DELHI', '894108', 'online', '2024-05-12 14:36:44'),
(7, '29742985', 'Malay', 'Mridha', 'admin', 'malay@gmail.com', '09876543210', 'Kolkata, India', 'INDIA', 'DELHI', '894108', 'online', '2024-05-12 14:38:38'),
(8, '1341725404', 'Malay', 'Mridha', 'admin', 'malay123@gmail.com', '09876543210', 'Kolkata, India', 'INDIA', 'DELHI', '894108', 'online', '2024-05-15 14:06:21'),
(9, '6693108096', 'Malay', 'Mridha', 'admin', 'malay123@gmail.com', '09876543210', 'Kolkata, India', 'INDIA', 'DELHI', '894108', 'online', '2024-05-15 14:11:02'),
(10, '6656938291', 'Malay', 'Mridha', 'admin', 'malay123@gmail.com', '09876543210', 'Kolkata, India', 'INDIA', 'DELHI', '894108', 'offline', '2024-05-15 14:13:15'),
(11, '6415792279', 'Malay', 'Mridha', 'admin', 'malay123@gmail.com', '09876543210', 'Kolkata, India', 'INDIA', 'DELHI', '894108', 'offline', '2024-05-15 14:21:33'),
(12, '3557895787', 'Long', 'Book', 'mayor123', 'mayor@gamil.com', '0875421326', 'Address1', 'INDIA', 'ANDAMAN & NICOBAR', '256650', 'offline', '2024-05-19 09:19:51'),
(13, '5005242779', 'Long', 'Book', 'mayor123', 'mayor@gamil.com', '0875421326', 'Address1', 'INDIA', 'ANDAMAN & NICOBAR', '', 'offline', '2024-05-19 09:21:01'),
(14, '5074066612', 'Mayor', 'Clark', 'mayor123', 'mayor@gamil.com', '0875421326', 'Address1', 'INDIA', 'ANDAMAN & NICOBAR', '165116', 'online', '2024-05-19 09:22:42'),
(15, '6757172522', 'Rajesh', 'Kumar', 'r123', 'sandeep@gmail.com', '9865321400', '102 Raj Bhavan, Bangalore', 'INDIA', 'KARNATAKA', '701523', 'offline', '2024-05-19 09:33:55'),
(16, '7109477656', 'Rajesh', 'Kumar', 'r123', 'sandeep@gmail.com', '9865321400', '102 Raj Bhavan, Bangalore', 'INDIA', 'KARNATAKA', '701523', 'online', '2024-05-20 14:06:28'),
(17, '8016884758', 'Rajesh', 'Kumar', 'r123', 'sandeep@gmail.com', '9865321400', '102 Raj Bhavan, Bangalore', 'INDIA', 'KARNATAKA', '701523', 'offline', '2024-05-20 14:07:47'),
(18, '3212421746', 'Rajesh', 'Kumar', 'r123', 'sandeep@gmail.com', '9865321400', '102 Raj Bhavan, Bangalore', 'INDIA', 'KARNATAKA', '701523', 'offline', '2024-05-20 14:07:49'),
(19, '1496513673', 'Rajesh', 'Kumar', 'r123', 'sandeep@gmail.com', '9865321400', '102 Raj Bhavan, Bangalore', 'INDIA', 'KARNATAKA', '701523', 'offline', '2024-05-20 14:08:00'),
(20, '6845704277', 'Malay', 'Mridha', 'admin', 'malay123@gmail.com', '09876543210', 'Kolkata, India', 'INDIA', 'DELHI', '894108', 'online', '2024-05-28 07:42:02'),
(21, '8448516573', 'Malay', 'Mridha', 'admin', 'malay123@gmail.com', '09876543210', 'Kolkata, India', 'INDIA', 'DELHI', '894108', 'offline', '2024-05-30 05:01:41'),
(22, '5304381005', 'Malay', 'Mridha', 'admin', 'malay123@gmail.com', '09876543210', 'Kolkata, India', 'INDIA', 'DELHI', '894108', 'online', '2024-05-30 05:02:27'),
(23, '9610461696', '', '', 'user3', 'sandeep@gmail.com', '123132123', '45 Lotus Lane, New Delhi', 'INDIA', 'ANDAMAN & NICOBAR', '', 'online', '2024-05-30 05:27:40'),
(24, '7514748286', '', '', 'user3', 'sandeep@gmail.com', '123132123', '45 Lotus Lane, New Delhi', 'INDIA', 'ANDAMAN & NICOBAR', '', 'online', '2024-05-30 05:28:25'),
(25, '4726350492', '', '', 'user3', 'sandeep@gmail.com', '123132123', '45 Lotus Lane, New Delhi', 'INDIA', 'ANDAMAN & NICOBAR', '', 'online', '2024-05-30 05:37:22'),
(26, '7440850653', 'Sandeep', 'Mishra', 'user3', 'sandeep@gmail.com', '123132123', '34 Sunflower Colony, Hyderabad', 'INDIA', 'ANDAMAN & NICOBAR', '', 'online', '2024-05-30 06:16:55'),
(27, '7226390517', 'Sandeep', 'Mishra', 'user3', 'sandeep@gmail.com', '123132123', '34 Sunflower Colony, Hyderabad', 'INDIA', 'ANDAMAN & NICOBAR', '', 'online', '2024-05-30 06:18:56'),
(28, '2804273126', 'Rajesh', 'Kumar', 'user3', 'sandeep@gmail.com', '123132123', '102 Raj Bhavan, Bangalore', 'INDIA', 'KARNATAKA', '701523', 'online', '2024-05-30 06:22:10'),
(29, '6595639201', 'Malay', 'Mridha', 'admin', 'malay123@gmail.com', '09876543210', 'Kolkata, India', 'INDIA', 'DELHI', '894108', 'online', '2024-05-30 06:25:15'),
(30, '1464776195', 'Malay', 'Mridha', 'admin', 'malay123@gmail.com', '09876543210', 'Kolkata, India', 'INDIA', 'DELHI', '894108', 'online', '2024-05-30 06:47:38'),
(31, '6992601800', 'Malay', 'Mridha', 'admin', 'malay123@gmail.com', '09876543210', 'Kolkata, India', 'INDIA', 'DELHI', '894108', 'online', '2024-05-30 07:02:10'),
(32, '2883223936', 'Malay', 'Mridha', 'admin', 'malay123@gmail.com', '09876543210', 'Kolkata, India', 'INDIA', 'DELHI', '894108', 'online', '2024-05-30 07:07:43'),
(33, '9142964732', 'Malay', 'Mridha', 'admin', 'malay123@gmail.com', '09876543210', 'Kolkata, India', 'INDIA', 'DELHI', '894108', 'online', '2024-05-30 07:08:41'),
(34, '7228729445', 'Malay', 'Mridha', 'admin', 'malay123@gmail.com', '09876543210', 'Kolkata, India', 'INDIA', 'DELHI', '894108', 'online', '2024-05-30 07:21:12'),
(35, '4885695044', 'Malay', 'Mridha', 'admin', 'malay123@gmail.com', '09876543210', 'Kolkata, India', 'INDIA', 'DELHI', '894108', 'online', '2024-05-30 07:23:59'),
(36, '4367458455', 'Malay', 'Mridha', 'admin', 'malay123@gmail.com', '09876543210', 'Kolkata, India', 'INDIA', 'DELHI', '894108', '', '2024-05-30 07:35:10'),
(37, '9279709666', 'Malay', 'Mridha', 'admin', 'malay123@gmail.com', '09876543210', 'Kolkata, India', 'INDIA', 'DELHI', '894108', '', '2024-05-30 07:35:14'),
(38, '2977039910', 'Malay', 'Mridha', 'admin', 'malay123@gmail.com', '09876543210', 'Kolkata, India', 'INDIA', 'DELHI', '894108', '', '2024-05-30 07:35:20'),
(39, '3957931674', 'Malay', 'Mridha', 'admin', 'malay123@gmail.com', '09876543210', 'Kolkata, India', 'INDIA', 'DELHI', '894108', '', '2024-05-30 07:35:28'),
(40, '9215664074', 'Malay', 'Mridha', 'admin', 'malay123@gmail.com', '09876543210', 'Kolkata, India', 'INDIA', 'DELHI', '894108', '', '2024-05-30 07:35:45'),
(41, '8654122444', 'Malay', 'Mridha', 'admin', 'malay123@gmail.com', '09876543210', 'Kolkata, India', 'INDIA', 'DELHI', '894108', '', '2024-05-30 07:35:47'),
(42, '4807951397', 'Malay', 'Mridha', 'admin', 'malay123@gmail.com', '09876543210', 'Kolkata, India', 'INDIA', 'DELHI', '894108', '', '2024-05-30 07:37:39'),
(43, '6702727015', 'Malay', 'Mridha', 'admin', 'malay123@gmail.com', '09876543210', 'Kolkata, India', 'INDIA', 'DELHI', '894108', '', '2024-05-30 07:37:42'),
(44, '5470533490', 'Malay', 'Mridha', 'admin', 'malay123@gmail.com', '09876543210', 'Kolkata, India', 'INDIA', 'DELHI', '894108', '', '2024-05-30 07:38:02'),
(45, '6354907040', 'Malay', 'Mridha', 'admin', 'malay123@gmail.com', '09876543210', 'Kolkata, India', 'INDIA', 'DELHI', '894108', '', '2024-05-30 07:39:09'),
(46, '3710660553', 'Malay', 'Mridha', 'admin', 'malay123@gmail.com', '09876543210', 'Kolkata, India', 'INDIA', 'DELHI', '894108', '', '2024-05-30 07:39:13'),
(47, '5141109099', 'Malay', 'Mridha', 'admin', 'malay123@gmail.com', '09876543210', 'Kolkata, India', 'INDIA', 'DELHI', '894108', '', '2024-05-30 07:39:51'),
(48, '6300179671', 'Malay', 'Mridha', 'admin', 'malay123@gmail.com', '09876543210', 'Kolkata, India', 'INDIA', 'DELHI', '894108', '', '2024-05-30 07:40:19'),
(49, '2289037990', 'Malay', 'Mridha', 'admin', 'malay123@gmail.com', '09876543210', 'Kolkata, India', 'INDIA', 'DELHI', '894108', 'offline', '2024-05-30 07:41:39'),
(50, '9574660151', 'Malay', 'Mridha', 'admin', 'malay123@gmail.com', '09876543210', 'Kolkata, India', 'INDIA', 'DELHI', '894108', 'Cash On Delivery', '2024-05-30 07:43:27'),
(51, '4927751405', 'Malay', 'Mridha', 'admin', 'malay123@gmail.com', '09876543210', 'Kolkata, India', 'INDIA', 'DELHI', '894108', 'Cash On Delivery', '2024-05-30 07:43:30'),
(52, '9293871833', 'Malay', 'Mridha', 'admin', 'malay123@gmail.com', '09876543210', 'Kolkata, India', 'INDIA', 'DELHI', '894108', 'Cash On Delivery', '2024-05-30 07:44:06'),
(53, '2367544677', 'Malay', 'Mridha', 'admin', 'malay123@gmail.com', '09876543210', 'Kolkata, India', 'INDIA', 'DELHI', '894108', 'online', '2024-05-30 07:47:58'),
(54, '1225498480', 'Malay', 'Mridha', 'admin', 'malay123@gmail.com', '09876543210', 'Kolkata, India', 'INDIA', 'DELHI', '894108', 'offline', '2024-05-30 07:48:14'),
(55, '8616723156', 'Malay', 'Mridha', 'admin', 'malay123@gmail.com', '09876543210', 'Kolkata, India', 'INDIA', 'DELHI', '894108', 'offline', '2024-05-30 07:50:44'),
(56, '9353131472', 'Malay', 'Mridha', 'admin', 'malay123@gmail.com', '09876543210', 'Kolkata, India', 'INDIA', 'DELHI', '894108', 'offline', '2024-05-30 07:51:30'),
(57, '5602200437', 'Malay', 'Mridha', 'admin', 'malay123@gmail.com', '09876543210', 'Kolkata, India', 'INDIA', 'DELHI', '894108', 'offline', '2024-05-30 07:58:11'),
(58, '5359504700', 'Malay', 'Mridha', 'admin', 'malay123@gmail.com', '09876543210', 'Kolkata, India', 'INDIA', 'DELHI', '894108', 'offline', '2024-05-30 08:27:34'),
(59, '6577947901', 'Malay', 'Mridha', 'admin', 'malay123@gmail.com', '09876543210', 'Kolkata, India', 'INDIA', 'DELHI', '894108', 'online', '2024-05-30 08:28:15'),
(60, '3004296141', 'Malay', 'Mridha', 'admin', 'malay123@gmail.com', '09876543210', 'Kolkata, India', 'INDIA', 'DELHI', '894108', 'online', '2024-06-13 18:50:03'),
(61, '1101591309', 'Malay', 'Mridha', 'admin', 'malay123@gmail.com', '09876543210', 'Kolkata, India', 'INDIA', 'DELHI', '894108', 'offline', '2024-07-18 14:14:35'),
(62, '5946697115', 'Malay', 'Mridha', 'admin', 'malay123@gmail.com', '09876543210', 'Kolkata, India', 'INDIA', 'DELHI', '894108', 'online', '2024-07-18 14:15:00'),
(63, '8177284661', 'Malay', 'Mridha', 'admin', 'malay123@gmail.com', '09876543210', 'Kolkata, India', 'INDIA', 'DELHI', '894108', 'offline', '2024-07-20 08:18:18'),
(64, '8598384133', 'Malay', 'Mridha', 'admin', 'malay123@gmail.com', '09876543210', 'Kolkata, India', 'INDIA', 'DELHI', '894108', 'offline', '2024-07-20 18:16:36'),
(65, '8757436736', 'Malay', 'Mridha', 'admin', 'malay123@gmail.com', '09876543210', 'Kolkata, India', 'INDIA', 'DELHI', '894108', 'online', '2024-07-27 09:12:34'),
(66, '7982696666', 'Malay', 'Mridha', 'admin', 'malay123@gmail.com', '09876543210', 'Kolkata, India', 'INDIA', 'DELHI', '894108', 'offline', '2024-07-28 04:57:04'),
(67, '7153441396', 'Malay', 'Mridha', 'malay123', 'malay@gmail.com', '9876543210', 'Kolkata, India', 'INDIA', 'WEST BENGAL', '', 'online', '2024-07-28 17:25:34'),
(68, '8219214706', 'Malay', 'Mridha', 'malay123', 'malay@gmail.com', '9876543210', 'Kolkata, India', 'INDIA', 'WEST BENGAL', '', 'online', '2024-07-28 17:27:10'),
(69, '4539397160', 'Malay', 'Mridha', 'admin', 'malay123@gmail.com', '09876543210', 'Kolkata, India', 'INDIA', 'WEST BENGAL', '894108', 'online', '2024-10-15 17:53:29'),
(70, '3667561549', 'Malay', 'Mridha', 'admin', 'malay123@gmail.com', '09876543210', 'Kolkata, India', 'INDIA', 'WEST BENGAL', '700015', 'online', '2025-01-07 19:27:42'),
(71, '7028608668', 'Malay', 'Mridha', 'admin', 'malay123@gmail.com', '09876543210', 'Kolkata, India', 'INDIA', 'WEST BENGAL', '700015', 'offline', '2025-01-07 19:28:18'),
(72, '4972604640', 'Malay', 'Mridha', 'admin', 'malay123@gmail.com', '997231231', 'Mumbai, India', 'INDIA', 'MAHARASHTRA', '900015', 'offline', '2025-01-07 19:32:36'),
(73, '7558664442', 'Malay', 'Mridha', 'admin', 'malay123@gmail.com', '09876543210', 'Kolkata, India', 'INDIA', 'WEST BENGAL', '700015', 'online', '2025-02-20 10:38:25'),
(74, '4851074598', 'Malay', 'Mridha', 'admin', 'malay123@gmail.com', '09876543210', 'Kolkata, India', 'INDIA', 'WEST BENGAL', '700015', 'offline', '2025-02-22 08:44:07'),
(75, '8172650455', 'Malay', 'Mridha', 'test', 'malay@gmail.com', '09876543210', 'Kolkata, India', 'INDIA', 'ANDAMAN & NICOBAR', '700159', 'offline', '2025-03-06 15:45:53'),
(76, '8554739745', 'Malay', 'Mridha', 'admin', 'malay123@gmail.com', '09876543210', 'Kolkata, India', 'INDIA', 'WEST BENGAL', '700015', 'online', '2025-03-06 15:49:32'),
(77, '4695320876', 'Malay', 'Mridha', 'malay', 'malay@gmail.com', '9876543210', 'Kolkata, India', 'INDIA', 'WEST BENGAL', '700000', 'online', '2025-03-06 16:22:11');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `invoice_number` varchar(50) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_id` varchar(50) DEFAULT NULL,
  `payment_status` varchar(50) DEFAULT NULL,
  `add_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `username`, `name`, `email`, `invoice_number`, `amount`, `payment_id`, `payment_status`, `add_on`) VALUES
(1, 'admin', 'Admin', 'admin@gmail.com', '4885695044', 27, 'pay_OGcbIZlqe5ekhc', 'complete', '2024-05-30 09:24:00'),
(2, 'admin', 'Admin', 'admin@gmail.com', '2367544677', 27, NULL, 'pending', '2024-05-30 09:47:58'),
(3, 'admin', 'Admin', 'admin@gmail.com', '2367544677', 27, NULL, 'pending', '2024-05-30 09:48:04'),
(4, 'admin', 'Admin', 'admin@gmail.com', '6577947901', 25, 'pay_OGdgymAV7Q0fWe', 'complete', '2024-05-30 10:28:16'),
(5, 'admin', 'Admin', 'admin@gmail.com', '3004296141', 400, 'pay_OMLljL4cPEsV78', 'complete', '2024-06-13 08:50:04'),
(6, 'admin', 'Admin', 'admin@gmail.com', '5946697115', 27, 'pay_Oa7mS4qFW345vy', 'complete', '2024-07-18 04:15:01'),
(7, 'admin', 'Admin', 'admin@gmail.com', '8757436736', 27, 'pay_OdbQo4WkdC9BQw', 'complete', '2024-07-27 11:12:34'),
(8, 'malay123', 'Malay Mridha', 'malay@gmail.com', '7153441396', 90, NULL, 'pending', '2024-07-28 07:25:35'),
(9, 'malay123', 'Malay Mridha', 'malay@gmail.com', '7153441396', 90, NULL, 'pending', '2024-07-28 07:26:43'),
(10, 'malay123', 'Malay Mridha', 'malay@gmail.com', '8219214706', 90, 'pay_Oe8ONVKejwNkLU', 'complete', '2024-07-28 07:27:11'),
(11, 'admin', 'Admin', 'admin@gmail.com', '4539397160', 50, 'pay_P9P3DoVA1fuEFD', 'complete', '2024-10-15 07:53:29'),
(12, 'admin', 'Admin', 'admin@gmail.com', '3667561549', 2535, NULL, 'pending', '2025-01-07 08:27:43'),
(13, 'admin', 'Admin', 'admin@gmail.com', '3667561549', 2535, NULL, 'pending', '2025-01-07 08:27:56'),
(14, 'admin', 'Admin', 'admin@gmail.com', '7558664442', 496, 'pay_Pxw0Z2vqPm0dVp', 'complete', '2025-02-20 11:38:26'),
(15, 'admin', 'Admin', 'admin@gmail.com', '8554739745', 50, 'pay_Q3Yn3pgiXJONFF', 'complete', '2025-03-06 04:49:33'),
(16, 'malay', 'Malay Mridha', 'malay@gmail.com', '4695320876', 309, 'pay_Q3ZLLr2WC29clv', 'complete', '2025-03-06 05:22:12');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `weight` varchar(20) NOT NULL,
  `offer` int(11) DEFAULT 0,
  `category` varchar(50) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `url` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `price`, `weight`, `offer`, `category`, `brand`, `url`, `date`, `status`) VALUES
(1, 'TATA Gold Tea', 310, '500g', 20, 'Tea', 'Tata', '12345.jpg', '2025-03-06 15:52:32', 'not available'),
(2, 'Red Label Tea', 255, '500g', 10, 'Tea', 'Brooke Band', '32165.jpg', '2024-07-28 04:42:11', 'available'),
(3, 'Pepsi', 50, '1L', 0, 'Drinks', 'Pepsi', '54123.jpg', '2024-07-28 04:42:43', 'available'),
(4, 'Pepsi', 95, '2L', 0, 'Drinks', 'Pepsi', '87641.jpg', '2024-07-28 04:42:48', 'available'),
(5, 'Nescafe Classic', 375, '90g', 10, 'Coffee', 'Nescafe', '66842.jpg', '2024-07-28 04:44:19', 'available'),
(6, 'Nescafe Classic', 660, '200g', 25, 'Coffee', 'Nescafe', '98765.jpg', '2024-07-28 04:44:46', 'available'),
(7, 'Amul Milk', 27, '500ml', 0, 'Milk', 'Amul', '5ee4441d-9109-48fa-9343-f5ce82b905a6.jpg', '2024-04-23 07:02:11', 'available'),
(8, 'Lactose Free', 25, '250ml', 0, 'Milk', 'Amul', '600dd9ff-659c-4817-87e7-eec1dea72c63.jpg', '2024-04-23 07:07:29', 'available'),
(9, 'Thums Up Soft Drink', 95, '2L', 0, 'Drinks', 'Thums Up', '86069f3f-1a8a-4a90-8afb-cd35b1412865.jpg', '2024-07-28 04:48:39', 'available'),
(10, 'Mountain Dew Grip Soft Drink', 40, '750ml', 0, 'Coffee', 'Mountain Dew', 'e7520e7d-0592-43d1-8f3e-cd72ba242713.jpg', '2024-07-28 04:49:52', 'available'),
(11, 'Kellogg Chocos Moons & Stars', 750, '1.2kg', 0, 'Flakes & Cereals', 'Kellogg', '82ecb17e-491c-4fd0-b885-e081a3c2e18f.jpg', '2024-07-28 04:54:02', 'available'),
(12, 'Kellogg Corn Flakes Original', 195, '475g', 0, 'Flakes & Cereals', 'Kellogg', 'e5a49da5-0264-45ed-9e8d-0acd870eeba9.jpg', '2024-07-28 04:55:09', 'available'),
(13, 'Britannia Brown Bread', 55, '400g', 5, 'Bread', 'Britannia', '91137c7a-8c0d-4a0a-8e6c-7ed9516fec11.jpg', '2025-03-06 16:20:40', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `profile_details`
--

CREATE TABLE `profile_details` (
  `profile_id` int(11) NOT NULL,
  `firstName` varchar(50) DEFAULT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `pincode` varchar(50) DEFAULT NULL,
  `url` varchar(255) DEFAULT 'profile.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profile_details`
--

INSERT INTO `profile_details` (`profile_id`, `firstName`, `lastName`, `username`, `email`, `phone`, `address`, `country`, `state`, `pincode`, `url`) VALUES
(1, 'Malay', 'Mridha', 'admin', 'malay123@gmail.com', '09876543210', 'Kolkata, India', 'INDIA', 'WEST BENGAL', '700015', 'pic.jpeg'),
(2, '', '', 'mayor123', 'mayor@gamil.com', '0875421326', 'Address1', 'INDIA', 'ANDAMAN & NICOBAR', '844130', 'profile.png'),
(3, '', '', 's123', 'sandeep@gmail.com', '98653214', '34 Sunflower Colony, Hyderabad', 'INDIA', 'KERALA', '', 'profile.png'),
(4, 'Rajesh', 'Kumar', 'r123', 'sandeep@gmail.com', '9865321400', '102 Raj Bhavan, Bangalore', 'INDIA', 'HARYANA', '701523', 'image.jpeg'),
(5, NULL, NULL, 'user3', 'sandeep@gmail.com', '123132123', '45 Lotus Lane, New Delhi', NULL, NULL, NULL, 'profile.png'),
(6, NULL, NULL, 'd1', 'sandeep@gmail.com', '123132123', '54 Ganga Nagar, Jaipur, Rajasthan, India', NULL, NULL, NULL, 'profile.png'),
(7, NULL, NULL, 't123', 'bijay@gmail.com', '213123', '67 Gandhi Nagar, Mumbai', NULL, NULL, NULL, 'profile.png'),
(8, NULL, NULL, '', '', '', '', NULL, NULL, NULL, 'profile.png'),
(9, 'Malay', 'Mridha', 'malay123', 'malay@gmail.com', '9876543210', 'Kolkata, India', 'INDIA', 'WEST BENGAL', '', 'main-qimg-983d91cdfaa0ebb8b4d114bab3799932-lq.jfif'),
(10, 'Rajesh', 'Kumar', 'test', 'malay@gmail.com', '09876543210', 'Kolkata, India', 'INDIA', 'KARNATAKA', '654871', 'profile.png'),
(14, 'Malay', 'Mridha', 'malay', 'malay@gmail.com', '9876543210', 'Kolkata, India', 'INDIA', 'WEST BENGAL', '700000', 'profileTest.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `name`, `address`, `phone`, `email`, `username`, `password`) VALUES
(1, 'Malay Mridha', 'Kolkata, India', '9876543210', 'malay@gmail.com', 'malay123', '1234'),
(2, 'Admin', 'Kolkata, India', '9876540987', 'admin@gmail.com', 'admin', '1234'),
(3, 'Mayor Clark', 'Address1', '0875421326', 'mayor@gamil.com', 'mayor123', '1234'),
(4, 'Sandeep Mishra', '34 Sunflower Colony, Hyderabad', '98653214', 'sandeep@gmail.com', 's123', '123'),
(5, 'Rajesh Kumar', '102 Raj Bhavan, Bangalore', '9865321400', 'sandeep@gmail.com', 'r123', '123');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`) VALUES
(1, 'ANDHRA PRADESH'),
(2, 'ASSAM'),
(3, 'ARUNACHAL PRADESH'),
(4, 'BIHAR'),
(5, 'GUJRAT'),
(6, 'HARYANA'),
(7, 'HIMACHAL PRADESH'),
(8, 'JAMMU & KASHMIR'),
(9, 'KARNATAKA'),
(10, 'KERALA'),
(11, 'MADHYA PRADESH'),
(12, 'MAHARASHTRA'),
(13, 'MANIPUR'),
(14, 'MEGHALAYA'),
(15, 'MIZORAM'),
(16, 'NAGALAND'),
(17, 'ORISSA'),
(18, 'PUNJAB'),
(19, 'RAJASTHAN'),
(20, 'SIKKIM'),
(21, 'TAMIL NADU'),
(22, 'TRIPURA'),
(23, 'UTTAR PRADESH'),
(24, 'WEST BENGAL'),
(25, 'DELHI'),
(26, 'GOA'),
(27, 'PONDICHERY'),
(28, 'LAKSHDWEEP'),
(29, 'DAMAN & DIU'),
(30, 'DADRA & NAGAR'),
(31, 'CHANDIGARH'),
(32, 'ANDAMAN & NICOBAR'),
(33, 'UTTARANCHAL'),
(34, 'JHARKHAND'),
(35, 'CHATTISGARH');

-- --------------------------------------------------------

--
-- Table structure for table `user_invoice`
--

CREATE TABLE `user_invoice` (
  `invoice_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `invoice_number` varchar(50) NOT NULL,
  `amount` float NOT NULL,
  `total_items` int(11) NOT NULL,
  `order_status` varchar(50) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_invoice`
--

INSERT INTO `user_invoice` (`invoice_id`, `username`, `invoice_number`, `amount`, `total_items`, `order_status`, `payment_method`, `date`) VALUES
(3, 'admin', '1339274718', 3100, 4, 'Delivered', 'offline', '2024-05-12 14:23:37'),
(4, 'admin', '1648856675', 3100, 4, 'Delivered', 'offline', '2024-05-12 14:24:05'),
(5, 'admin', '673492875', 552, 3, 'Delivered', 'offline', '2024-05-12 14:27:39'),
(7, 'admin', '1148597705', 2250, 9, 'Delivered', 'online', '2024-05-12 14:29:57'),
(8, 'admin', '830389851', 188, 1, 'Delivered', 'online', '2024-05-12 14:36:44'),
(9, 'admin', '29742985', 562.5, 3, 'Pending', 'online', '2024-05-12 14:38:39'),
(10, 'admin', '1341725404', 300, 3, 'Pending', 'online', '2024-05-15 14:06:21'),
(11, 'admin', '6693108096', 1380, 7, 'Delivered', 'online', '2024-05-15 14:11:03'),
(12, 'admin', '6656938291', 300, 3, 'Pending', 'offline', '2024-05-15 14:13:15'),
(13, 'admin', '6415792279', 3005.5, 25, 'Pending', 'offline', '2024-05-15 14:21:34'),
(14, 'mayor123', '3557895787', 300, 3, 'Pending', 'offline', '2024-05-19 09:19:51'),
(15, 'mayor123', '5005242779', 450, 1, 'Pending', 'offline', '2024-05-19 09:21:01'),
(16, 'mayor123', '5074066612', 1659.5, 8, 'Pending', 'online', '2024-05-19 09:22:42'),
(17, 'r123', '6757172522', 3150, 15, 'Pending', 'offline', '2024-05-19 09:33:55'),
(18, 'r123', '7109477656', 270, 1, 'Pending', 'online', '2024-05-20 14:06:28'),
(19, 'r123', '8016884758', 27, 1, 'Pending', 'offline', '2024-05-20 14:07:47'),
(20, 'r123', '3212421746', 27, 1, 'Pending', 'offline', '2024-05-20 14:07:49'),
(21, 'r123', '1496513673', 27, 1, 'Pending', 'offline', '2024-05-20 14:08:00'),
(22, 'admin', '6845704277', 200, 1, 'Pending', 'online', '2024-05-28 07:42:02'),
(23, 'admin', '8448516573', 270, 1, 'Pending', 'offline', '2024-05-30 05:01:41'),
(24, 'admin', '5304381005', 400, 1, 'Pending', 'online', '2024-05-30 05:02:27'),
(25, 'user3', '9610461696', 400, 1, 'Pending', 'online', '2024-05-30 05:27:40'),
(26, 'user3', '7514748286', 100, 1, 'Pending', 'online', '2024-05-30 05:28:25'),
(27, 'user3', '4726350492', 300, 2, 'Pending', 'online', '2024-05-30 05:37:22'),
(28, 'user3', '7440850653', 25, 1, 'Pending', 'online', '2024-05-30 06:16:55'),
(29, 'user3', '7226390517', 27, 1, 'Pending', 'online', '2024-05-30 06:18:56'),
(30, 'user3', '2804273126', 100, 1, 'Pending', 'online', '2024-05-30 06:22:10'),
(31, 'admin', '6595639201', 135, 5, 'Pending', 'online', '2024-05-30 06:25:15'),
(32, 'admin', '1464776195', 25, 1, 'Pending', 'online', '2024-05-30 06:47:38'),
(33, 'admin', '6992601800', 25, 1, 'Pending', 'online', '2024-05-30 07:02:10'),
(34, 'admin', '2883223936', 25, 1, 'Pending', 'online', '2024-05-30 07:07:43'),
(35, 'admin', '9142964732', 25, 1, 'Pending', 'online', '2024-05-30 07:08:41'),
(36, 'admin', '7228729445', 27, 1, 'Pending', 'online', '2024-05-30 07:21:12'),
(37, 'admin', '4885695044', 27, 1, 'Pending', 'online', '2024-05-30 07:23:59'),
(38, 'admin', '4367458455', 25, 1, 'Pending', '', '2024-05-30 07:35:10'),
(39, 'admin', '9279709666', 25, 1, 'Pending', '', '2024-05-30 07:35:14'),
(40, 'admin', '2977039910', 25, 1, 'Pending', '', '2024-05-30 07:35:20'),
(41, 'admin', '3957931674', 25, 1, 'Pending', '', '2024-05-30 07:35:28'),
(42, 'admin', '9215664074', 25, 1, 'Pending', '', '2024-05-30 07:35:45'),
(43, 'admin', '8654122444', 25, 1, 'Pending', '', '2024-05-30 07:35:47'),
(44, 'admin', '4807951397', 25, 1, 'Pending', '', '2024-05-30 07:37:39'),
(45, 'admin', '6702727015', 25, 1, 'Pending', '', '2024-05-30 07:37:42'),
(46, 'admin', '5470533490', 25, 1, 'Pending', '', '2024-05-30 07:38:02'),
(47, 'admin', '6354907040', 25, 1, 'Pending', '', '2024-05-30 07:39:09'),
(48, 'admin', '3710660553', 25, 1, 'Pending', '', '2024-05-30 07:39:13'),
(49, 'admin', '5141109099', 25, 1, 'Pending', '', '2024-05-30 07:39:51'),
(50, 'admin', '6300179671', 25, 1, 'Pending', '', '2024-05-30 07:40:19'),
(51, 'admin', '2289037990', 25, 1, 'Pending', 'offline', '2024-05-30 07:41:39'),
(52, 'admin', '9574660151', 27, 1, 'Pending', 'Cash On Delivery', '2024-05-30 07:43:27'),
(53, 'admin', '4927751405', 27, 1, 'Pending', 'Cash On Delivery', '2024-05-30 07:43:30'),
(54, 'admin', '9293871833', 27, 1, 'Pending', 'Cash On Delivery', '2024-05-30 07:44:06'),
(55, 'admin', '2367544677', 27, 1, 'Pending', 'online', '2024-05-30 07:47:58'),
(56, 'admin', '1225498480', 27, 1, 'Pending', 'offline', '2024-05-30 07:48:14'),
(57, 'admin', '8616723156', 100, 1, 'Pending', 'offline', '2024-05-30 07:50:44'),
(58, 'admin', '9353131472', 670, 2, 'Delivered', 'offline', '2024-05-30 07:51:30'),
(59, 'admin', '5602200437', 400, 1, 'Delivered', 'offline', '2024-05-30 07:58:11'),
(60, 'admin', '5359504700', 400, 1, 'Delivered', 'offline', '2024-05-30 08:27:34'),
(61, 'admin', '6577947901', 25, 1, 'Delivered', 'online', '2024-05-30 08:28:15'),
(62, 'admin', '3004296141', 400, 2, 'Delivered', 'online', '2024-06-13 18:50:03'),
(63, 'admin', '1101591309', 100, 1, 'Pending', 'offline', '2024-07-18 14:14:35'),
(64, 'admin', '5946697115', 27, 1, 'Pending', 'online', '2024-07-18 14:15:00'),
(65, 'admin', '8177284661', 25, 1, 'Pending', 'offline', '2024-07-20 08:18:18'),
(66, 'admin', '8598384133', 25, 1, 'Pending', 'offline', '2024-07-20 18:16:37'),
(67, 'admin', '8757436736', 27, 1, 'Pending', 'online', '2024-07-27 09:12:34'),
(68, 'admin', '7982696666', 391, 8, 'Pending', 'offline', '2024-07-28 04:57:04'),
(69, 'malay123', '7153441396', 90, 2, 'Pending', 'online', '2024-07-28 17:25:34'),
(70, 'malay123', '8219214706', 90, 2, 'Pending', 'online', '2024-07-28 17:27:10'),
(71, 'admin', '4539397160', 50, 1, 'Pending', 'online', '2024-10-15 17:53:29'),
(72, 'admin', '3667561549', 2535, 10, 'Pending', 'online', '2025-01-07 19:27:42'),
(73, 'admin', '7028608668', 2535, 10, 'Pending', 'offline', '2025-01-07 19:28:19'),
(74, 'admin', '4972604640', 151100, 850, 'Delivered', 'offline', '2025-01-07 19:32:36'),
(75, 'admin', '7558664442', 496, 2, 'Pending', 'online', '2025-02-20 10:38:26'),
(76, 'admin', '4851074598', 145, 2, 'Pending', 'offline', '2025-02-22 08:44:07'),
(77, 'test', '8172650455', 385, 5, 'Pending', 'offline', '2025-03-06 15:45:53'),
(78, 'admin', '8554739745', 50, 1, 'Delivered', 'online', '2025-03-06 15:49:32'),
(79, 'malay', '4695320876', 309, 6, 'Delivered', 'online', '2025-03-06 16:22:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `deleted_accounts`
--
ALTER TABLE `deleted_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_address`
--
ALTER TABLE `order_address`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_details`
--
ALTER TABLE `profile_details`
  ADD PRIMARY KEY (`profile_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user_invoice`
--
ALTER TABLE `user_invoice`
  ADD PRIMARY KEY (`invoice_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `deleted_accounts`
--
ALTER TABLE `deleted_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `order_address`
--
ALTER TABLE `order_address`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `profile_details`
--
ALTER TABLE `profile_details`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_invoice`
--
ALTER TABLE `user_invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
