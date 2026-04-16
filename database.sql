-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2026 at 04:16 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `active_orders`
--

CREATE TABLE `active_orders` (
  `id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `quantity` int(10) DEFAULT NULL,
  `days` int(10) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `due_on` datetime DEFAULT NULL,
  `status` enum('active','returned','overdue','cancelled') DEFAULT 'active',
  `title` varchar(255) DEFAULT NULL,
  `rented_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `tracking_id` int(6) DEFAULT NULL,
  `delivery_status` enum('warehouse','shipped','received') DEFAULT 'warehouse',
  `date_returned` timestamp NULL DEFAULT NULL,
  `approval_status` enum('pending','approved','rejected') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `active_orders`
--

INSERT INTO `active_orders` (`id`, `User_id`, `item_id`, `item_name`, `quantity`, `days`, `total`, `start_date`, `due_on`, `status`, `title`, `rented_date`, `tracking_id`, `delivery_status`, `date_returned`, `approval_status`) VALUES
(27, 7, 21, NULL, 3, 1, 60.00, NULL, '2026-03-25 00:00:00', 'returned', 'DIY Tools', '2026-03-22 12:56:52', NULL, 'shipped', NULL, 'pending'),
(28, 7, 14, NULL, 10, 1, 2000.00, NULL, '2026-04-01 00:00:00', 'returned', 'Iphone 16s', '2026-03-22 21:12:00', NULL, 'warehouse', NULL, 'pending'),
(29, 7, 15, NULL, 2, 1, 20.00, NULL, '2026-03-25 00:00:00', 'returned', 'Black SUV', '2026-03-23 14:45:59', NULL, 'warehouse', '2026-03-31 00:31:14', 'pending'),
(30, 7, 15, NULL, 2, 1, 20.00, NULL, '2026-03-25 00:00:00', 'returned', 'Black SUV', '2026-03-23 15:06:43', NULL, 'warehouse', '2026-03-31 00:31:18', 'pending'),
(31, 7, 18, NULL, 5, 1, 50.00, NULL, '2026-03-28 00:00:00', 'returned', 'Office Chair', '2026-03-23 15:17:01', NULL, 'warehouse', '2026-03-31 00:31:21', 'pending'),
(32, 9, 16, NULL, 5, 5, 375.00, NULL, '2026-03-28 00:00:00', 'returned', 'Drone', '2026-03-23 15:23:45', NULL, 'warehouse', NULL, 'pending'),
(33, 9, 18, NULL, 2, 2, 40.00, NULL, '2026-03-25 00:00:00', 'returned', 'Office Chair', '2026-03-23 15:52:05', NULL, 'warehouse', NULL, 'pending'),
(34, 9, 21, NULL, 2, 1, 40.00, NULL, '2026-03-25 00:00:00', 'returned', 'DIY Tools', '2026-03-23 16:36:18', NULL, 'warehouse', NULL, 'pending'),
(35, 9, 21, NULL, 2, 1, 40.00, NULL, '2026-03-25 00:00:00', 'returned', 'DIY Tools', '2026-03-23 16:39:31', NULL, 'warehouse', NULL, 'pending'),
(36, 9, 16, NULL, 2, 1, 30.00, NULL, '2026-03-25 00:00:00', 'returned', 'Drone', '2026-03-23 19:36:30', NULL, 'warehouse', NULL, 'pending'),
(37, 9, 18, NULL, 2, 2, 40.00, NULL, '2026-03-25 00:00:00', 'returned', 'Office Chair', '2026-03-23 19:40:21', 289454, 'warehouse', NULL, 'pending'),
(38, 9, 19, NULL, 5, 1, 100.00, NULL, '2026-03-28 00:00:00', 'returned', 'Drill', '2026-03-23 19:49:13', 482931, 'warehouse', NULL, 'pending'),
(39, 9, 16, NULL, 1, 1, 15.00, NULL, '2026-03-24 00:00:00', 'returned', 'Drone', '2026-03-23 21:03:33', 367455, 'warehouse', NULL, 'pending'),
(40, 9, 16, NULL, 1, 1, 15.00, NULL, '2026-03-24 00:00:00', 'returned', 'Drone', '2026-03-23 21:05:00', 218537, 'warehouse', NULL, 'pending'),
(41, 9, 16, NULL, 1, 1, 15.00, NULL, '2026-03-24 00:00:00', 'returned', 'Drone', '2026-03-23 21:05:29', 742205, 'warehouse', NULL, 'pending'),
(42, 9, 21, NULL, 1, 1, 20.00, NULL, '2026-03-24 00:00:00', 'returned', 'DIY Tools', '2026-03-23 21:05:53', 659337, 'warehouse', NULL, 'pending'),
(43, 9, 16, NULL, 1, 1, 15.00, NULL, '2026-03-24 00:00:00', 'returned', 'Drone', '2026-03-23 21:15:52', 760397, 'warehouse', NULL, 'pending'),
(44, 9, 16, NULL, 1, 1, 15.00, NULL, '2026-03-24 00:00:00', 'returned', 'Drone', '2026-03-23 21:16:38', 953803, 'shipped', NULL, 'pending'),
(45, 9, 22, NULL, 1, 1, 10.00, NULL, '2026-03-24 00:00:00', 'returned', 'Table Tennis Rackets', '2026-03-23 21:17:27', 218789, 'warehouse', NULL, 'pending'),
(46, 9, 21, NULL, 1, 1, 20.00, NULL, '2026-03-24 00:00:00', 'returned', 'DIY Tools', '2026-03-23 21:23:25', 741442, 'warehouse', NULL, 'pending'),
(47, 9, 20, NULL, 1, 1, 100.00, NULL, '2026-03-24 00:00:00', 'returned', 'Moving Truck', '2026-03-23 21:23:25', 997765, 'warehouse', NULL, 'pending'),
(48, 9, 15, NULL, 1, 1, 10.00, NULL, '2026-03-24 00:00:00', 'returned', 'Black SUV', '2026-03-23 21:36:02', 805296, 'warehouse', NULL, 'pending'),
(49, 9, 15, NULL, 1, 1, 10.00, NULL, '2026-03-24 00:00:00', 'returned', 'Black SUV', '2026-03-23 21:36:02', 640100, 'shipped', NULL, 'pending'),
(50, 9, 15, NULL, 1, 1, 10.00, NULL, '2026-03-25 00:00:00', 'returned', 'Black SUV', '2026-03-23 23:02:54', 827044, 'warehouse', NULL, 'pending'),
(51, 7, 21, NULL, 1, 1, 20.00, NULL, '2026-03-25 00:00:00', 'cancelled', 'DIY Tools', '2026-03-24 09:08:31', 594405, 'warehouse', '2026-03-31 12:05:56', 'pending'),
(52, 7, 15, NULL, 1, 1, 10.00, NULL, '2026-03-25 00:00:00', 'cancelled', 'Black SUV', '2026-03-24 09:08:31', 454477, 'warehouse', '2026-03-31 12:45:25', 'pending'),
(53, 7, 18, NULL, 1, 1, 10.00, NULL, '2026-03-25 00:00:00', 'returned', 'Office Chair', '2026-03-24 09:08:31', 464514, 'received', '2026-04-01 00:06:12', 'pending'),
(54, 7, 20, NULL, 1, 1, 100.00, NULL, '2026-03-25 00:00:00', 'active', 'Moving Truck', '2026-03-24 09:08:32', 859318, 'warehouse', NULL, 'pending'),
(55, 7, 22, NULL, 1, 1, 10.00, NULL, '2026-03-25 00:00:00', 'active', 'Table Tennis Rackets', '2026-03-24 09:09:09', 781752, 'warehouse', NULL, 'pending'),
(56, 7, 16, NULL, 1, 1, 15.00, NULL, '2026-03-25 00:00:00', 'active', 'Drone', '2026-03-24 09:09:09', 114388, 'warehouse', NULL, 'pending'),
(57, 7, 15, NULL, 1, 1, 10.00, NULL, '2026-03-25 00:00:00', 'active', 'Black SUV', '2026-03-24 09:09:09', 809787, 'shipped', NULL, 'pending'),
(58, 7, 15, NULL, 1, 2, 20.00, NULL, '2026-03-25 00:00:00', 'returned', 'Black SUV', '2026-03-24 09:16:24', 516388, 'received', '2026-03-25 23:02:37', 'pending'),
(59, 9, 16, NULL, 1, 1, 15.00, NULL, '2026-03-25 00:00:00', 'returned', 'Drone', '2026-03-24 16:27:52', 328906, 'warehouse', NULL, 'pending'),
(60, 7, 15, NULL, 1, 1, 10.00, NULL, '2026-03-25 00:00:00', 'returned', 'Black SUV', '2026-03-24 22:17:17', 261285, 'received', NULL, 'pending'),
(61, 7, 22, NULL, 2, 2, 40.00, NULL, '2026-03-27 00:00:00', 'returned', 'Table Tennis Rackets', '2026-03-25 12:06:41', 700302, 'received', '2026-03-25 13:17:15', 'rejected'),
(62, 7, 18, NULL, 2, 1, 20.00, NULL, '2026-03-27 00:00:00', 'returned', 'Office Chair', '2026-03-25 12:44:48', 564433, 'received', '2026-03-25 14:10:47', 'approved'),
(63, 7, 16, NULL, 2, 1, 30.00, NULL, '2026-03-27 00:00:00', 'returned', 'Drone', '2026-03-25 13:18:28', 679147, 'received', '2026-03-25 13:18:58', 'approved'),
(64, 10, 14, NULL, 2, 1, 400.00, NULL, '2026-03-27 00:00:00', 'returned', 'Iphone 16s', '2026-03-25 16:26:34', 882568, 'received', '2026-03-25 21:45:49', 'approved'),
(65, 10, 14, NULL, 1, 1, 200.00, NULL, '2026-03-26 00:00:00', 'active', 'Iphone 16s', '2026-03-25 22:29:59', 489127, 'warehouse', NULL, 'pending'),
(66, 10, 14, NULL, 1, 1, 200.00, NULL, '2026-03-26 00:00:00', 'active', 'Iphone 16s', '2026-03-25 22:33:09', 461612, 'received', NULL, 'pending'),
(67, 10, 14, NULL, 1, 1, 200.00, NULL, '2026-03-26 00:00:00', 'active', 'Iphone 16s', '2026-03-25 22:33:12', 194320, 'warehouse', NULL, 'pending'),
(68, 10, 14, NULL, 1, 1, 200.00, NULL, '2026-03-26 00:00:00', 'active', 'Iphone 16s', '2026-03-25 22:33:33', 304633, 'warehouse', NULL, 'pending'),
(69, 10, 14, NULL, 1, 1, 200.00, NULL, '2026-03-26 00:00:00', 'active', 'Iphone 16s', '2026-03-25 22:37:42', 194276, 'warehouse', NULL, 'pending'),
(70, 10, 14, NULL, 1, 1, 200.00, NULL, '2026-03-26 00:00:00', 'active', 'Iphone 16s', '2026-03-25 22:38:34', 484736, 'warehouse', NULL, 'pending'),
(71, 10, 16, NULL, 1, 1, 15.00, NULL, '2026-03-26 00:00:00', 'active', 'Drone', '2026-03-25 22:40:17', 506082, 'warehouse', NULL, 'pending'),
(72, 7, 22, NULL, 1, 1, 10.00, NULL, '2026-03-27 00:00:00', 'returned', 'Table Tennis Rackets', '2026-03-25 23:03:02', 462919, 'warehouse', '2026-03-25 23:28:59', 'pending'),
(73, 7, 19, NULL, 1, 1, 20.00, NULL, '2026-03-27 00:00:00', 'returned', 'Drill', '2026-03-25 23:12:29', 675055, 'warehouse', '2026-03-25 23:22:38', 'approved'),
(74, 7, 15, NULL, 1, 1, 10.00, NULL, '2026-03-27 00:00:00', 'returned', 'Black SUV', '2026-03-25 23:23:30', 438170, 'received', '2026-03-25 23:24:01', 'approved'),
(75, 11, 14, NULL, 1, 2, 400.00, NULL, '2026-03-28 00:00:00', 'returned', 'Iphone 16s', '2026-03-27 12:23:03', 294765, 'received', '2026-03-27 12:32:20', 'approved'),
(76, 11, 20, NULL, 1, 2, 200.00, NULL, '2026-03-28 00:00:00', 'returned', 'Moving Truck', '2026-03-27 13:35:23', 880230, 'received', '2026-03-27 13:39:49', 'rejected'),
(77, 7, 22, NULL, 1, 1, 10.00, NULL, '2026-03-29 00:00:00', 'returned', 'Table Tennis Rackets', '2026-03-28 22:07:49', 428670, 'received', '2026-03-29 02:00:11', 'pending'),
(78, 7, 15, NULL, 1, 1, 10.00, NULL, '2026-03-30 00:00:00', 'returned', 'Black SUV', '2026-03-29 01:29:02', 226666, 'received', '2026-03-29 02:00:13', 'pending'),
(79, 7, 15, NULL, 1, 1, 10.00, NULL, '2026-03-30 00:00:00', 'returned', 'Black SUV', '2026-03-29 01:30:24', 344104, 'warehouse', '2026-03-29 02:00:15', 'pending'),
(80, 0, 15, NULL, 1, 1, 10.00, NULL, '2026-03-30 00:00:00', 'active', 'Black SUV', '2026-03-29 02:01:58', 626273, 'warehouse', NULL, 'pending'),
(81, 12, 15, NULL, 1, 1, 10.00, NULL, '2026-03-30 00:00:00', 'returned', 'Black SUV', '2026-03-29 02:03:25', 319193, 'received', '2026-03-29 02:04:49', 'pending'),
(82, 12, 18, NULL, 1, 1, 10.00, NULL, '2026-03-30 00:00:00', 'returned', 'Office Chair', '2026-03-29 02:04:12', 489027, 'received', '2026-03-29 02:57:32', 'pending'),
(83, 12, 15, NULL, 1, 1, 10.00, NULL, '2026-03-30 00:00:00', 'returned', 'Black SUV', '2026-03-29 02:17:31', 856090, 'warehouse', '2026-03-29 02:37:04', 'pending'),
(84, 12, 15, NULL, 2, 1, 20.00, NULL, '2026-03-30 00:00:00', 'returned', 'Black SUV', '2026-03-29 02:58:07', 993594, 'warehouse', '2026-03-29 02:58:21', 'pending'),
(85, 12, 16, NULL, 1, 0, 15.00, NULL, '1970-01-01 00:00:00', 'returned', 'Drone', '2026-03-29 03:00:11', 107190, 'received', '2026-03-29 11:17:37', 'pending'),
(86, 12, 18, NULL, 1, 1, 10.00, NULL, '2026-03-30 00:00:00', 'returned', 'Office Chair', '2026-03-29 03:00:49', 310598, 'warehouse', '2026-03-29 10:31:17', 'pending'),
(87, 12, 14, NULL, 1, 4, 1220.00, NULL, '2026-04-04 00:00:00', 'returned', 'Iphone 16s', '2026-03-29 11:16:41', 284833, 'received', '2026-03-29 13:23:56', 'pending'),
(88, 12, 18, NULL, 1, 2, 40.00, NULL, '2026-04-01 00:00:00', 'returned', 'Office Chair', '2026-03-29 11:19:00', 406320, 'received', '2026-03-29 11:35:22', 'pending'),
(89, 12, 14, NULL, 1, 2, 400.00, NULL, '2026-03-31 00:00:00', 'returned', 'Iphone 16s', '2026-03-29 12:49:28', 544318, 'received', '2026-03-29 13:31:03', 'pending'),
(90, 12, 15, NULL, 1, 1, 10.00, NULL, '2026-03-30 00:00:00', 'returned', 'Black SUV', '2026-03-29 13:37:03', 297491, 'warehouse', '2026-03-29 13:37:44', 'pending'),
(91, 12, 14, NULL, 1, 2, 610.00, NULL, '2026-04-01 00:00:00', 'returned', 'Iphone 16s', '2026-03-29 13:37:22', 470353, 'warehouse', '2026-03-29 21:33:45', 'pending'),
(92, 12, 14, NULL, 1, 1, 200.00, NULL, '2026-03-30 00:00:00', 'returned', 'Iphone 16s', '2026-03-29 21:02:20', 804251, 'warehouse', '2026-03-31 00:05:02', 'pending'),
(93, 7, 20, NULL, 1, 1, 100.00, NULL, '2026-03-31 00:00:00', 'cancelled', 'Moving Truck', '2026-03-30 17:36:37', 820846, 'warehouse', '2026-03-31 12:06:19', 'pending'),
(94, 9, 15, NULL, 2, 1, 20.00, NULL, '2026-03-31 00:00:00', 'returned', 'Black SUV', '2026-03-30 20:59:41', 793238, 'warehouse', '2026-03-30 23:41:14', 'pending'),
(95, 12, 15, NULL, 2, 1, 20.00, NULL, '2026-04-01 00:00:00', 'returned', 'Black SUV', '2026-03-31 00:05:25', 123145, 'warehouse', '2026-03-31 00:13:56', 'pending'),
(96, 12, 16, NULL, 1, 1, 15.00, NULL, '2026-04-01 00:00:00', 'returned', 'Drone', '2026-03-31 00:13:13', 704661, 'warehouse', '2026-03-31 00:28:44', 'pending'),
(97, 12, 15, NULL, 1, 1, 10.00, NULL, '2026-04-01 00:00:00', 'returned', 'Black SUV', '2026-03-31 00:14:15', 569996, 'warehouse', '2026-03-31 00:29:42', 'pending'),
(98, 12, 15, NULL, 1, 1, 10.00, NULL, '2026-04-01 00:00:00', 'returned', 'Black SUV', '2026-03-31 00:29:12', 245131, 'warehouse', '2026-03-31 00:29:57', 'pending'),
(99, 12, 20, NULL, 2, 1, 200.00, NULL, '2026-04-01 00:00:00', 'returned', 'Moving Truck', '2026-03-31 00:32:09', 966303, 'warehouse', '2026-03-31 00:45:46', 'pending'),
(100, 12, 15, NULL, 1, 1, 10.00, NULL, '2026-04-01 00:00:00', 'active', 'Black SUV', '2026-03-31 00:41:55', 620113, 'shipped', NULL, 'pending'),
(101, 18, 15, NULL, 1, 1, 40.00, NULL, '2026-04-06 00:00:00', 'returned', 'Black SUV', '2026-04-03 18:21:55', 236918, 'received', '2026-04-03 18:23:38', 'approved'),
(102, 18, 15, NULL, 1, 2, 20.00, NULL, '2026-04-05 00:00:00', 'cancelled', 'Black SUV', '2026-04-03 18:24:51', 719000, 'received', '2026-04-03 18:26:06', 'pending'),
(103, 18, 16, NULL, 1, 2, 30.00, NULL, '2026-04-05 00:00:00', 'returned', 'Drone', '2026-04-03 18:26:52', 234297, 'warehouse', '2026-04-03 18:27:45', 'pending'),
(104, 18, 20, NULL, 1, 1, 100.00, NULL, '2026-04-04 00:00:00', 'active', 'Moving Truck', '2026-04-03 18:27:21', 783225, 'warehouse', NULL, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `item_id`, `item_name`, `image`, `price`, `quantity`, `created_at`, `title`) VALUES
(19, 7, 16, 'Drone', 'drone.JPG', 15.00, 1, '2026-03-23 09:42:26', NULL),
(28, 9, 16, 'Drone', 'drone.JPG', 15.00, 1, '2026-03-23 21:48:03', NULL),
(29, 9, 18, 'Office Chair', 'chair.JPG', 10.00, 1, '2026-03-23 21:48:12', NULL),
(30, 7, 16, 'Drone', 'drone.JPG', 15.00, 1, '2026-03-24 22:26:12', NULL),
(31, 1, 16, 'Drone', 'drone.JPG', 15.00, 1, '2026-03-27 12:26:06', NULL),
(32, 1, 18, 'Office Chair', 'chair.JPG', 10.00, 1, '2026-03-27 12:26:12', NULL),
(33, 11, 20, 'Moving Truck', 'lorry-standing-outdoors-near-warehouse.jpg', 100.00, 1, '2026-03-27 13:41:15', NULL),
(34, 7, 16, 'Drone', 'drone.JPG', 15.00, 1, '2026-03-29 01:53:55', NULL),
(35, 12, 18, 'Office Chair', 'chair.JPG', 10.00, 1, '2026-03-29 02:05:24', NULL),
(36, 9, 16, 'Drone', 'drone.JPG', 15.00, 1, '2026-03-30 23:34:27', NULL),
(37, 18, 18, 'Office Chair', 'chair.JPG', 10.00, 1, '2026-04-03 18:21:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` varchar(255) DEFAULT NULL,
  `is_read` enum('0','1') DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `message`, `is_read`, `created_at`) VALUES
(1, 10, 'Great News! Order  is placed succesfully', '0', '2026-03-25 22:38:34'),
(2, 10, 'Great News! Order is placed succesfully', '0', '2026-03-25 22:40:17'),
(3, 7, 'Great News! Order is placed succesfully', '0', '2026-03-25 23:03:02'),
(4, 7, 'Great News! Order is placed succesfully', '0', '2026-03-25 23:12:29'),
(5, 0, 'Thank You! You returned item!', '0', '2026-03-25 23:22:38'),
(6, 7, 'Great News! Order is placed succesfully', '0', '2026-03-25 23:23:30'),
(7, 0, 'Thank You! You returned item!', '0', '2026-03-25 23:24:01'),
(8, 7, 'Thank You! You returned item!', '0', '2026-03-25 23:28:59'),
(9, 11, 'Great News! Order is placed succesfully', '0', '2026-03-27 12:23:03'),
(10, 11, 'Thank You! You returned item!', '0', '2026-03-27 12:32:20'),
(11, 11, 'Great News! Order is placed succesfully', '0', '2026-03-27 13:35:23'),
(12, 11, 'Thank You! You returned item!', '0', '2026-03-27 13:39:49'),
(13, 7, 'Great News! Order is placed succesfully', '0', '2026-03-28 22:07:49'),
(14, 7, 'Great News! Order is placed succesfully', '0', '2026-03-29 01:29:02'),
(15, 7, 'Great News! Order is placed succesfully', '0', '2026-03-29 01:30:24'),
(16, 7, 'Thank You! You returned item!', '0', '2026-03-29 02:00:11'),
(17, 7, 'Thank You! You returned item!', '0', '2026-03-29 02:00:13'),
(18, 7, 'Thank You! You returned item!', '0', '2026-03-29 02:00:16'),
(19, 0, 'Great News! Order is placed succesfully', '0', '2026-03-29 02:01:58'),
(20, 12, 'Great News! Order is placed succesfully', '0', '2026-03-29 02:03:25'),
(21, 12, 'Great News! Order is placed succesfully', '0', '2026-03-29 02:04:12'),
(22, 12, 'Thank You! You returned item!', '0', '2026-03-29 02:04:49'),
(23, 12, 'Great News! Order is placed succesfully', '0', '2026-03-29 02:17:31'),
(24, 12, 'Thank You! You returned item!', '0', '2026-03-29 02:37:04'),
(25, 12, 'Thank You! You returned item!', '0', '2026-03-29 02:57:32'),
(26, 12, 'Great News! Order is placed succesfully', '0', '2026-03-29 02:58:07'),
(27, 12, 'Thank You! You returned item!', '0', '2026-03-29 02:58:21'),
(28, 12, 'Great News! Order is placed succesfully', '0', '2026-03-29 03:00:11'),
(29, 12, 'Great News! Order is placed succesfully', '0', '2026-03-29 03:00:49'),
(30, 12, 'Thank You! You returned item!', '0', '2026-03-29 10:31:17'),
(31, 12, 'Order has been succesfully extended', '0', '2026-03-29 11:14:44'),
(32, 12, 'Great News! Order is placed succesfully', '0', '2026-03-29 11:16:41'),
(33, 12, 'Order has been succesfully extended', '0', '2026-03-29 11:17:16'),
(34, 12, 'Thank You! You returned item!', '0', '2026-03-29 11:17:37'),
(35, 12, 'Great News! Order is placed succesfully', '0', '2026-03-29 11:19:00'),
(36, 12, 'Order has been succesfully extended', '0', '2026-03-29 11:19:28'),
(37, 12, 'Thank You! You returned item!', '0', '2026-03-29 11:35:22'),
(38, 12, 'Order has been succesfully extended', '0', '2026-03-29 12:32:04'),
(39, 12, 'Great News! Order is placed succesfully', '0', '2026-03-29 12:49:28'),
(40, 12, 'Thank You! You returned item!', '0', '2026-03-29 13:23:57'),
(41, 12, 'Thank You! You returned item!', '0', '2026-03-29 13:31:03'),
(42, 12, 'Great News! Order is placed succesfully', '0', '2026-03-29 13:37:03'),
(43, 12, 'Great News! Order is placed succesfully', '0', '2026-03-29 13:37:22'),
(44, 12, 'Thank You! You returned item!', '0', '2026-03-29 13:37:44'),
(45, 12, 'Order has been succesfully extended', '0', '2026-03-29 13:40:25'),
(46, 12, 'Great News! Order is placed succesfully', '0', '2026-03-29 21:02:20'),
(47, 12, 'Thank You! You returned item!', '0', '2026-03-29 21:33:45'),
(48, 9, 'Great News! Order is placed succesfully', '0', '2026-03-30 20:59:41'),
(49, 9, 'Thank You! You returned item!', '0', '2026-03-30 23:41:14'),
(50, 12, 'Thank You! You returned item!', '0', '2026-03-31 00:05:02'),
(51, 12, 'Great News! Order is placed succesfully', '0', '2026-03-31 00:05:25'),
(52, 12, 'Great News! Order is placed succesfully', '0', '2026-03-31 00:13:13'),
(53, 12, 'Thank You! You returned item!', '0', '2026-03-31 00:13:56'),
(54, 12, 'Great News! Order is placed succesfully', '0', '2026-03-31 00:14:15'),
(55, 12, 'Thank You! You returned item!', '0', '2026-03-31 00:28:45'),
(56, 12, 'Great News! Order is placed succesfully', '0', '2026-03-31 00:29:12'),
(57, 12, 'Thank You! You returned item!', '0', '2026-03-31 00:29:42'),
(58, 12, 'Thank You! You returned item!', '0', '2026-03-31 00:29:57'),
(59, 7, 'Thank You! You returned item!', '0', '2026-03-31 00:31:14'),
(60, 7, 'Thank You! You returned item!', '0', '2026-03-31 00:31:18'),
(61, 7, 'Thank You! You returned item!', '0', '2026-03-31 00:31:21'),
(62, 12, 'Great News! Order is placed succesfully', '0', '2026-03-31 00:32:09'),
(63, 12, 'Great News! Order is placed succesfully', '0', '2026-03-31 00:41:55'),
(64, 12, 'Thank You! You returned item!', '0', '2026-03-31 00:45:46'),
(65, 7, 'Your order has been cancelled', '0', '2026-03-31 12:05:56'),
(66, 7, 'Your order has been cancelled', '0', '2026-03-31 12:06:19'),
(67, 7, 'Your order has been cancelled', '0', '2026-03-31 12:45:25'),
(68, 7, 'Thank You! You returned item!', '0', '2026-04-01 00:06:12'),
(69, 18, 'Great News! Order is placed succesfully', '0', '2026-04-03 18:21:56'),
(70, 1, 'User placed an Order! Check it out', '0', '2026-04-03 18:21:56'),
(71, 2, 'User placed an Order! Check it out', '0', '2026-04-03 18:21:56'),
(72, 3, 'User placed an Order! Check it out', '0', '2026-04-03 18:21:56'),
(73, 4, 'User placed an Order! Check it out', '0', '2026-04-03 18:21:56'),
(74, 5, 'User placed an Order! Check it out', '0', '2026-04-03 18:21:56'),
(75, 13, 'User placed an Order! Check it out', '0', '2026-04-03 18:21:56'),
(76, 14, 'User placed an Order! Check it out', '0', '2026-04-03 18:21:56'),
(77, 16, 'User placed an Order! Check it out', '0', '2026-04-03 18:21:56'),
(78, 17, 'User placed an Order! Check it out', '0', '2026-04-03 18:21:56'),
(79, 18, 'Order has been succesfully extended', '0', '2026-04-03 18:23:24'),
(80, 18, 'Thank You! You returned item!', '0', '2026-04-03 18:23:38'),
(81, 18, 'Great News! Order is placed succesfully', '0', '2026-04-03 18:24:51'),
(82, 1, 'User placed an Order! Check it out', '0', '2026-04-03 18:24:51'),
(83, 2, 'User placed an Order! Check it out', '0', '2026-04-03 18:24:51'),
(84, 3, 'User placed an Order! Check it out', '0', '2026-04-03 18:24:51'),
(85, 4, 'User placed an Order! Check it out', '0', '2026-04-03 18:24:51'),
(86, 5, 'User placed an Order! Check it out', '0', '2026-04-03 18:24:51'),
(87, 13, 'User placed an Order! Check it out', '0', '2026-04-03 18:24:51'),
(88, 14, 'User placed an Order! Check it out', '0', '2026-04-03 18:24:51'),
(89, 16, 'User placed an Order! Check it out', '0', '2026-04-03 18:24:51'),
(90, 17, 'User placed an Order! Check it out', '0', '2026-04-03 18:24:51'),
(91, 18, 'Your order has been cancelled', '0', '2026-04-03 18:26:06'),
(92, 18, 'Great News! Order is placed succesfully', '0', '2026-04-03 18:26:52'),
(93, 1, 'User placed an Order! Check it out', '0', '2026-04-03 18:26:52'),
(94, 2, 'User placed an Order! Check it out', '0', '2026-04-03 18:26:52'),
(95, 3, 'User placed an Order! Check it out', '0', '2026-04-03 18:26:52'),
(96, 4, 'User placed an Order! Check it out', '0', '2026-04-03 18:26:52'),
(97, 5, 'User placed an Order! Check it out', '0', '2026-04-03 18:26:52'),
(98, 13, 'User placed an Order! Check it out', '0', '2026-04-03 18:26:52'),
(99, 14, 'User placed an Order! Check it out', '0', '2026-04-03 18:26:52'),
(100, 16, 'User placed an Order! Check it out', '0', '2026-04-03 18:26:52'),
(101, 17, 'User placed an Order! Check it out', '0', '2026-04-03 18:26:52'),
(102, 18, 'Great News! Order is placed succesfully', '0', '2026-04-03 18:27:21'),
(103, 1, 'User placed an Order! Check it out', '0', '2026-04-03 18:27:21'),
(104, 2, 'User placed an Order! Check it out', '0', '2026-04-03 18:27:21'),
(105, 3, 'User placed an Order! Check it out', '0', '2026-04-03 18:27:21'),
(106, 4, 'User placed an Order! Check it out', '0', '2026-04-03 18:27:21'),
(107, 5, 'User placed an Order! Check it out', '0', '2026-04-03 18:27:21'),
(108, 13, 'User placed an Order! Check it out', '0', '2026-04-03 18:27:21'),
(109, 14, 'User placed an Order! Check it out', '0', '2026-04-03 18:27:21'),
(110, 16, 'User placed an Order! Check it out', '0', '2026-04-03 18:27:21'),
(111, 17, 'User placed an Order! Check it out', '0', '2026-04-03 18:27:21'),
(112, 18, 'Thank You! You returned item!', '0', '2026-04-03 18:27:45');

-- --------------------------------------------------------

--
-- Table structure for table `rentals`
--

CREATE TABLE `rentals` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `specification` text DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `status` enum('available','unavailable','deleted') DEFAULT 'available',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `serial_no` varchar(200) DEFAULT NULL,
  `item_qty` int(10) DEFAULT NULL,
  `item_condition` enum('good','bad','new','poor','fair') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rentals`
--

INSERT INTO `rentals` (`id`, `title`, `description`, `specification`, `category`, `image`, `price`, `status`, `created_at`, `serial_no`, `item_qty`, `item_condition`) VALUES
(1, 'gergerhthth', 'trwegregerg', 'erergtt', 'Electronics', '', 5.00, 'deleted', '2026-03-08 01:34:00', NULL, 20, 'new'),
(2, 'Telephon', 'hdsdjsjkdv sndkjv', '3x3', 'Electronics', 'Screenshot (46).png', 5.00, 'deleted', '2026-03-08 02:04:35', NULL, NULL, NULL),
(3, 'Phones', 'hsjllkflkjjsfjfsjnvnvnfkdlfdkv', '4x4', 'Electronics', 'Screenshot (46).png', 10.00, 'deleted', '2026-03-08 10:50:37', NULL, NULL, NULL),
(4, 'Iphone 16', 'Iphone 16', '3x3', 'Electronics', 'Screenshot (46).png', 15.00, 'deleted', '2026-03-08 10:54:12', NULL, NULL, NULL),
(5, 'Iphone 11', 'Lorem Ipsum', '55 x 55', 'Electronics', 'Screenshot (47).png', 65.00, 'deleted', '2026-03-08 22:28:04', NULL, NULL, NULL),
(6, '', '', '', 'Category', '', 0.00, 'deleted', '2026-03-09 08:20:26', NULL, NULL, NULL),
(7, 'Goat', 'Fine Goat', '26 kg ', 'Construction', '', 200.00, 'deleted', '2026-03-09 21:14:38', NULL, NULL, NULL),
(8, 'fghfghjfgj', 'hjghjkghj', 'ghjghjg', 'Construction', '', 1.00, 'deleted', '2026-03-10 19:15:10', NULL, NULL, NULL),
(9, 'YTYTYJTYJ', 'JTYJTYJTYJ', 'TYJTYJTYJ', 'Construction', '', 3.50, 'deleted', '2026-03-10 19:41:11', NULL, 5, 'good'),
(10, 'Iphone 16', 'Iphone 16 pro MAX', 'Orange', 'Electronics', '', 165.00, 'deleted', '0000-00-00 00:00:00', NULL, 11, 'new'),
(11, 'Iphone2', 'dfbvfdb fgghhf', 'Iphone2', 'Office & Work', '', 156.00, 'deleted', '0000-00-00 00:00:00', NULL, 55, 'new'),
(12, 'chair', 'New Chair', '4 chairs', 'Office & Work', '', 5.00, 'deleted', '0000-00-00 00:00:00', NULL, 30, 'new'),
(13, 'iphone 17', '3 x3', '3x3', 'Electronics', 'IMG_6092.jpeg', 200.00, 'deleted', '0000-00-00 00:00:00', NULL, 12, 'new'),
(14, 'Iphone 16s', 'New Iphone 16s, colour: Blue', 'New Iphone 16s, colour: Blue', 'Electronics', 'Car.JPG', 200.00, 'deleted', '0000-00-00 00:00:00', NULL, 2, 'new'),
(15, 'Black SUV', 'New Black Car', 'Black Car', 'Automative & Transportation', 'Car.JPG', 10.00, 'available', '0000-00-00 00:00:00', NULL, 6, 'new'),
(16, 'Drone', 'White Drone', 'White Mechanical Drone- Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eu venenatis leo. Fusce in urna pellentesque, bibendum ante sed, tempus libero. Integer quis tincidunt augue. Praesent posuere massa justo, ut eleifend erat tincidunt tempus. Nam venenatis, mauris et sodales dignissim, lacus urna lobortis felis, non aliquam risus nulla at quam. Nulla auctor, nulla eu dictum dapibus, nisi mauris commodo mi, quis sollicitudin erat odio a urna. Vestibulum vel arcu vestibulum, sollicitudin mi a, scelerisque tortor. Vestibulum placerat sollicitudin turpis, eget consequat quam condimentum a. Morbi placerat magna gravida ligula placerat rutrum. Ut laoreet erat ullamcorper, commodo odio nec, molestie eros.\r\n\r\nNullam ornare convallis condimentum. Duis sit amet orci suscipit, convallis orci id, euismod erat. Cras iaculis, lorem vel volutpat finibus, nisl orci sagittis dolor, et mattis nisl orci non ligula. Maecenas nec metus finibus, auctor odio a, convallis sem. Nunc non nulla a justo dictum faucibus quis nec enim. Vestibulum hendrerit pretium leo at posuere. Vestibulum vehicula finibus nisl eu ornare. Praesent consectetur lectus sit amet tristique egestas. Nunc aliquam in enim non viverra. Praesent finibus id lacus id feugiat. Sed eu malesuada metus. Vestibulum aliquet enim nunc, eu pellentesque ligula interdum non. Donec a mauris lorem. In suscipit nisi ultricies dictum ultrices. Maecenas est elit, aliquet eu nisl et, auctor pharetra est.\r\n\r\nFusce maximus elit sit amet convallis interdum. Vestibulum aliquam libero ac imperdiet vulputate. In pellentesque mauris vel metus vestibulum cursus. Vestibulum a gravida lectus. Fusce faucibus velit et nunc congue vestibulum. Morbi euismod sapien eu lectus malesuada, eu dictum libero vulputate. Cras quis dictum mi, eu tincidunt neque. Nullam id nibh nisl. In vel erat aliquet, accumsan neque in, maximus est. Donec in libero blandit, fringilla purus nec, dictum erat. Sed aliquam sem at ante pretium aliquam. Vivamus pretium est orci, ut euismod ipsum semper ac. Vivamus placerat ultricies dignissim. Donec faucibus tellus ultricies posuere suscipit. Duis elementum vulputate luctus.', 'Electronics', 'drone.JPG', 15.00, 'available', '0000-00-00 00:00:00', NULL, 20, 'new'),
(17, '', '', '', 'Category', '', 0.00, 'deleted', '0000-00-00 00:00:00', NULL, 0, 'new'),
(18, 'Office Chair', 'White Office Chair', 'White Office Chair', 'Office & Work', 'chair.JPG', 10.00, 'available', '0000-00-00 00:00:00', NULL, 10, 'new'),
(19, 'Drill', 'Mechanical Drill', 'Yellow Mechanical Drill', 'Construction', 'drill.jpg', 20.00, 'available', '0000-00-00 00:00:00', NULL, 19, 'new'),
(20, 'Moving Truck', 'Truck for Moving and logistics', '6ft Moving truck', 'Automative & Transportation', 'lorry-standing-outdoors-near-warehouse.jpg', 100.00, 'available', '0000-00-00 00:00:00', NULL, 2, 'new'),
(21, 'DIY Tools', '8 DIY Tools', '8 DIY Tools', 'Tools & DIY', 'top-view-steel-hammer-with-other-construction-elements-tools.jpg', 20.00, 'available', '0000-00-00 00:00:00', NULL, 17, 'new'),
(22, 'Table Tennis Rackets', '2 Table Tennis Rackets', '2 Table Tennis Rackets', 'Sports & Recreation', 'arrangement-table-tennis-rackets.jpg', 10.00, 'available', '0000-00-00 00:00:00', NULL, 6, 'good'),
(23, 'table', 'table', 'table', 'Office & Work', '', 15.00, 'deleted', '0000-00-00 00:00:00', NULL, 20, 'good');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirm_password` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `postcode` varchar(20) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `confirm_password`, `role`, `address`, `city`, `postcode`, `phone_number`, `status`) VALUES
(1, 'eziafa', 'erwfr@gmail.com', 'Emmy', '', 'admin', NULL, NULL, NULL, NULL, 'inactive'),
(2, 'ezege', 'johndoe@gmail.com', 'Emmy', '', 'admin', NULL, NULL, NULL, NULL, 'active'),
(3, 'rex', 'rex@gmail.com', 'Emmy', '', 'admin', NULL, NULL, NULL, NULL, 'active'),
(4, 'Eziafa', 'eziafa@gmail.com', 'Emmy', '', 'admin', NULL, NULL, NULL, NULL, 'active'),
(5, 'remi', 'remi@gmail.com', 'Emmy', '', 'admin', 'Zone B, FAAN STAFF QUARTERS, BLOCK D23, FLAT 2, IKEJA', 'IKEJA', '100271', '08109389561', 'active'),
(6, 'Divine', 'diviner@gmail.com', 'Emmy', '', 'user', NULL, NULL, NULL, NULL, 'active'),
(7, 'Divine', 'Veracletus9@gmail.com', 'Divine77@', '', 'user', '68 Gillespie Crescent', 'Aberdeen, Aberdeen City', 'AB253AT', '07867055843', 'active'),
(8, 'Emmy', 'Emmy@gmail.com', 'Emmy', '', 'user', NULL, NULL, NULL, NULL, 'active'),
(9, 'Emmy', 'emmyisemmy@gmail.com', 'Emmy', '', 'user', '24 Shetland Walk', 'Aberdeen, Aberdeen City', 'AB16 6WD', '07867055843', 'active'),
(10, 'Ekene', 'Ekene@gmail.com', 'Emmy', '', 'user', NULL, NULL, NULL, NULL, 'active'),
(11, 'Imaculee', 'imaculee@gmail.com', 'Emmy', '', 'user', '24 Shetland Walk', 'Aberdeen, Aberdeen City', 'AB16 6WD', '07867055843', 'active'),
(12, 'Henry Danger', 'haggtej@gmail.com', '123456789', '', 'user', NULL, NULL, NULL, NULL, 'active'),
(13, 'EmmyisEmmy', 'emmy77@gmail.com', 'Emmy', '', 'admin', NULL, NULL, NULL, NULL, 'active'),
(14, 'Emmy77', 'Emmyis77@gmail.com', 'Emmy', '', 'admin', NULL, NULL, NULL, NULL, 'active'),
(15, 'Okolie', 'Eziboy77@gmail.com', '$2y$10$9NeQ86/PkZT7F4WaKQVVmeNSXClC4hbHx.EzvzcwYu9OPg/W3yODC', '', 'user', NULL, NULL, NULL, NULL, 'active'),
(16, 'Kaego', 'Kaego@gmail.com', 'Emmy', '', 'admin', NULL, NULL, NULL, NULL, 'active'),
(17, 'kboy', 'kboy@gmail.com', '$2y$10$femiOiC4xxCItaC7VEHnW.f5.BF4EYxKJQ/D2LcAg2Q51FODEUlcq', '', 'admin', NULL, NULL, NULL, NULL, 'active'),
(18, 'Emmy', 'eziafar@gmail.com', '$2y$10$2cXkcEPsQqOaXkeXKbnOdefPmD4mkEqTgJwOzo3FilvRVSBD4nGN.', '', 'user', '68 Gillespie Crescent', 'Aberdeen, Aberdeen City', 'AB253AT', '07867055843', 'active'),
(19, 'Eziafa', 'Eziafar1@gmail.com', '$2y$10$R/Gwb8olrCb1sK5lG9ypf.4EheRfQZUtqsM0o4EXJ81zGHOh12nrK', '', 'user', NULL, NULL, NULL, NULL, 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `active_orders`
--
ALTER TABLE `active_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rentals`
--
ALTER TABLE `rentals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `active_orders`
--
ALTER TABLE `active_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `rentals`
--
ALTER TABLE `rentals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
