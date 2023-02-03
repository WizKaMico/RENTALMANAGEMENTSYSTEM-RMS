-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2023 at 06:16 PM
-- Server version: 10.1.38-MariaDB
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
-- Database: `rms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user_id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `gender` varchar(250) NOT NULL,
  `birthday` date NOT NULL,
  `phone` varchar(250) NOT NULL,
  `code` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `date_created` date NOT NULL,
  `date_verified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_id`, `username`, `password`, `email`, `fullname`, `gender`, `birthday`, `phone`, `code`, `status`, `date_created`, `date_verified`) VALUES
(1, 'rtatat2@gmail.com', 'sadako', 'rtatat2@gmail.com', 'Sasha', 'Female', '2022-05-05', '0916651389', '', 'VERIFIED', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `admin_verification_attemp_email`
--

CREATE TABLE `admin_verification_attemp_email` (
  `id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `code` varchar(250) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `admin_verification_attemp_sms`
--

CREATE TABLE `admin_verification_attemp_sms` (
  `id` int(11) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `code` varchar(250) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `attachment`
--

CREATE TABLE `attachment` (
  `id` int(11) NOT NULL,
  `user_id` int(50) NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attachment`
--

INSERT INTO `attachment` (`id`, `user_id`, `photo`) VALUES
(1, 1, 'upload/1666224768.png'),
(2, 2, 'upload/1666225588.png'),
(3, 13, 'upload/1666225811.png'),
(5, 17, 'upload/1670036652.png'),
(6, 18, 'upload/1670038726.png');

-- --------------------------------------------------------

--
-- Table structure for table `biller`
--

CREATE TABLE `biller` (
  `id` int(11) NOT NULL,
  `house_code` varchar(250) NOT NULL,
  `date_created` date NOT NULL,
  `bill` varchar(250) NOT NULL,
  `pay` int(250) NOT NULL,
  `month_cycle` date NOT NULL,
  `user_id` int(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `biller`
--

INSERT INTO `biller` (`id`, `house_code`, `date_created`, `bill`, `pay`, `month_cycle`, `user_id`, `status`, `photo`) VALUES
(1, 'RMS-7437', '2022-04-12', 'Maynilad', 300, '2022-04-13', 1, 'ACCEPT', 'upload/1649757319.png'),
(2, 'RMS-7437', '2022-04-12', 'Meralco', 4000, '2022-04-13', 1, 'FOR PAYMENT', 'upload/1649757410.png'),
(3, 'RMS-7437', '2022-04-12', 'Rental', 2500, '2022-04-13', 1, 'FOR PAYMENT', 'upload/1649757859.png'),
(4, 'RMS-7437', '2022-04-12', 'Maynilad', 1200, '2022-05-13', 1, 'FOR PAYMENT', 'upload/1649770505.png'),
(5, 'RMS-9686', '2022-04-12', 'Maynilad', 5000, '2022-04-25', 3, 'FOR PAYMENT', 'upload/1649771204.png'),
(6, 'RMS-7894', '2022-05-05', 'Rental', 5500, '2022-06-05', 4, 'FOR PAYMENT', 'upload/1651756123.png'),
(7, 'RMS-7894', '2022-05-05', 'Maynilad', 5500, '2022-05-05', 4, 'ACCEPT', 'upload/1651756311.png'),
(8, 'RMS-7437', '2022-06-07', 'Rental', 3000, '2022-06-11', 6, 'FOR PAYMENT', 'upload/1654604389.jpg'),
(9, 'RMS-7437', '2022-06-07', 'Rental', 5000, '2022-06-11', 13, 'ACCEPT', 'upload/1654609073.jpg'),
(10, 'RMS-7437', '2022-06-07', 'Maynilad', 2222, '2022-06-10', 13, 'FOR PAYMENT', 'upload/1654609378.jpg'),
(11, 'RMS-9686', '2022-06-11', 'Rental', 2500, '2022-06-11', 1, 'ACCEPT', 'upload/1654945576.png'),
(12, 'RMS-7437', '2022-10-15', 'Rental', 1500, '2022-10-15', 13, 'FOR PAYMENT', 'upload/1665843223.jpg'),
(13, 'RMS-9686', '2022-12-03', 'Rental', 5000, '2022-12-05', 1, 'ACCEPT', 'upload/1670029111.png'),
(14, 'RMS-9686', '2022-12-03', 'Meralco', 10000, '2022-12-15', 1, 'ACCEPT', 'upload/1670037696.png'),
(15, 'RMS-9623', '2022-12-03', 'Maynilad', 14000, '2022-12-14', 18, 'ACCEPT', 'upload/1670038847.png'),
(16, 'RMS-9623', '2022-12-03', 'Maynilad', 250, '2022-12-03', 18, 'ACCEPT', 'upload/1670075298.png'),
(17, 'RMS-9623', '2022-12-03', 'Maynilad', 25000, '2022-12-10', 18, 'ACCEPT', 'upload/1670075606.png');

-- --------------------------------------------------------

--
-- Table structure for table `house`
--

CREATE TABLE `house` (
  `id` int(11) NOT NULL,
  `house_code` varchar(250) NOT NULL,
  `house_name` varchar(250) NOT NULL,
  `province` varchar(250) NOT NULL,
  `city` varchar(250) NOT NULL,
  `monthly_rent` int(250) NOT NULL,
  `date_created` date NOT NULL,
  `status` varchar(250) NOT NULL,
  `created_by` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `house`
--

INSERT INTO `house` (`id`, `house_code`, `house_name`, `province`, `city`, `monthly_rent`, `date_created`, `status`, `created_by`) VALUES
(1, 'RMS-7437', 'HOUSE 02', 'Bulacan', 'Malolos', 2500, '2022-04-12', 'Occupied', 'tricore012@gmail.com'),
(2, ' RMS-7435', 'HOUSE 02', 'Bulacan', 'Malolos', 2599, '2022-04-12', 'Occupied', 'tricore012@gmail.com'),
(3, 'RMS-9686', 'HOUSE 03', 'Bulacan', 'Malolos', 3500, '2022-04-12', 'Occupied', 'tricore012@gmail.com'),
(4, 'RMS-7894', 'HOUSE 04', 'Bulacan', 'Malolos', 5500, '2022-04-12', 'Occupied', 'tricore012@gmail.com'),
(5, 'RMS-9906', 'ROOM 05', 'Bulacan', 'Malolos', 3500, '2022-04-12', 'Occupied', 'tricore012@gmail.com'),
(6, 'RMS-9623', 'MALOLOS BUILDING - ROOM 1', 'Bulacan', 'Malolos', 3500, '2022-05-05', 'Occupied', 'tricore012@gmail.com'),
(7, 'RMS-8083', 'MALOLOS BUILDING - ROOM 2 ', 'Bulacan', 'Malolos', 4500, '2022-05-05', 'Un-Occupied', 'tricore012@gmail.com'),
(8, 'RMS-7475', 'BOCAUE BUILDING - ROOM 1 ', 'Bulacan', 'Malolos', 3500, '2022-05-05', 'Un-Occupied', 'tricore012@gmail.com'),
(9, 'RMS-6813', 'House ', 'Bulacan', 'Malolos', 2500, '2022-05-13', 'Un-Occupied', 'tricore012@gmail.com'),
(10, 'RMS-7134', 'Bulacan Latest', 'Bulacan', 'Paombong', 3500, '2022-05-13', 'Un-Occupied', 'tricore012@gmail.com'),
(11, 'RMS-7241', 'MALOLOS BUILDING ROOM-4', 'Bulacan', 'Malolos', 5000, '2022-06-07', 'Un-Occupied', 'rtatat2@gmail.com'),
(12, 'RMS-8293', 'MALOLOS BUILDING ROOM-5', 'Bulacan', 'Malolos', 5000, '2022-06-07', 'Un-Occupied', 'rtatat2@gmail.com'),
(13, 'RMS-7157', '10 U206', 'Agusan del Sur', 'Bunawan', 500, '2022-11-05', 'Occupied', 'rtatat2@gmail.com'),
(14, 'RMS-9668', 'TESTING HENRIE', 'Antique', 'Belison', 200, '2022-11-05', 'Un-Occupied', 'rtatat2@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `logout_view`
--

CREATE TABLE `logout_view` (
  `id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logout_view`
--

INSERT INTO `logout_view` (`id`, `email`, `date`) VALUES
(1, 'rtatat2@gmail.com', '2022-10-20'),
(2, 'rtatat2@gmail.com', '2022-10-20'),
(3, 'rtatat2@gmail.com', '2022-10-20'),
(4, 'rtatat2@gmail.com', '2022-10-20'),
(5, 'rtatat2@gmail.com', '2022-10-22'),
(6, 'rtatat2@gmail.com', '2022-12-03'),
(7, 'rtatat2@gmail.com', '2022-12-03'),
(8, 'tricore012@gmail.com', '2022-12-03'),
(9, 'rtatat2@gmail.com', '2022-12-03'),
(10, 'tricore012@gmail.com', '2022-12-03');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `item_number` varchar(255) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `payment_amount` double(10,2) NOT NULL,
  `payment_currency` varchar(255) NOT NULL,
  `txn_id` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pay_cash`
--

CREATE TABLE `pay_cash` (
  `id` int(11) NOT NULL,
  `house_code` varchar(250) NOT NULL,
  `date_created` date NOT NULL,
  `payment` varchar(250) NOT NULL,
  `user_id` int(250) NOT NULL,
  `pay_id` int(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pay_cash`
--

INSERT INTO `pay_cash` (`id`, `house_code`, `date_created`, `payment`, `user_id`, `pay_id`, `status`, `photo`) VALUES
(1, 'RMS-7437', '2022-04-12', 'CASH', 1, 1, 'ACCEPT', 'upload/1649764043.png'),
(2, 'RMS-7437', '2022-04-12', 'CASH', 1, 2, 'PENDING', 'upload/1649770103.png'),
(3, 'RMS-7894', '2022-05-05', 'CASH', 4, 7, 'ACCEPT', 'upload/1651756549.png'),
(4, 'RMS-7437', '2022-06-07', 'CASH', 13, 9, 'ACCEPT', 'upload/1654609144.jpg'),
(5, 'RMS-9686', '2022-06-11', 'CASH', 1, 11, 'ACCEPT', 'upload/1654946090.png'),
(6, 'RMS-7437', '2022-10-14', 'CASH', 13, 10, 'PENDING', 'upload/1665759713.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rules`
--

CREATE TABLE `rules` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `type` varchar(100) NOT NULL,
  `decription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rules`
--

INSERT INTO `rules` (`id`, `title`, `type`, `decription`) VALUES
(1, 'GUIDELINE', 'Guideline', '                    THIS IS A GUIDLINE                                               \r\n                                                               '),
(2, 'RULES', 'Rule', '                                                                   \r\n                THIS IS THE RULE AWESOME                                               ');

-- --------------------------------------------------------

--
-- Table structure for table `security_attemp_email`
--

CREATE TABLE `security_attemp_email` (
  `id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `code` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `security_attemp_email`
--

INSERT INTO `security_attemp_email` (`id`, `email`, `code`, `status`, `date_created`) VALUES
(18, 'tricore012@gmail.com', '9834', 'USED', '2022-05-05'),
(19, 'angelsasha10@gmail.com', '9295', 'USED', '2022-05-05'),
(20, 'angelsasha10@gmail.com', '7737', 'USED', '2022-05-05'),
(22, 'angelsasha10@gmail.com', '8223', 'USED', '2022-05-05'),
(23, 'gonzales.nadineclaire.p.5260@gmail.com', '7144', 'USED', '2022-05-05'),
(39, 'rtatat2@gmail.com', '8219', 'USED', '2022-06-07'),
(40, 'henrierino.victoria@gmail.com', '9487', 'USED', '2022-06-07'),
(41, 'rtatat2@gmail.com', '8899', 'USED', '2022-06-07'),
(42, 'rtatat2@gmail.com', '9793', 'USED', '2022-06-07'),
(43, 'rtatat2@gmail.com', '6854', 'USED', '2022-06-07'),
(44, 'rtatat2@gmail.com', '8418', 'USED', '2022-06-07'),
(45, 'rtatat2@gmail.com', '9792', 'USED', '2022-06-07'),
(46, 'rtatat2@gmail.com', '7341', 'USED', '2022-06-07'),
(47, 'rtatat2@gmail.com', '7539', 'USED', '2022-06-07'),
(48, 'rtatat2@gmail.com', '8689', 'USED', '2022-06-07'),
(49, 'rtatat2@gmail.com', '8266', 'USED', '2022-06-07'),
(50, 'rtatat2@gmail.com', '7113', 'USED', '2022-06-07'),
(51, 'rtatat2@gmail.com', '8903', 'USED', '2022-06-07'),
(52, 'henrierino.victoria@gmail.com', '7687', 'USED', '2022-06-07'),
(53, 'rtatat2@gmail.com', '8509', 'USED', '2022-06-07'),
(54, 'rtatat2@gmail.com', '8388', 'USED', '2022-06-11'),
(55, 'rtatat2@gmail.com', '7337', 'USED', '2022-06-11'),
(56, 'rtatat2@gmail.com', '8628', 'USED', '2022-06-11'),
(57, 'rtatat2@gmail.com', '9025', 'USED', '2022-06-11'),
(58, 'rtatat2@gmail.com', '6895', 'USED', '2022-06-11'),
(59, 'rtatat2@gmail.com', '9612', 'USED', '2022-10-13'),
(60, 'rtatat2@gmail.com', '9534', 'USED', '2022-10-13'),
(61, 'henrierino.victoria@gmail.com', '7761', 'USED', '2022-10-13'),
(62, 'rtatat2@gmail.com', '9968', 'USED', '2022-10-14'),
(63, 'henrierino.victoria@gmail.com', '8963', 'USED', '2022-10-14'),
(64, 'henrierino.victoria@gmail.com', '7507', 'USED', '2022-10-14'),
(65, 'henrierino.victoria@gmail.com', '7755', 'USED', '2022-10-14'),
(66, 'henrierino.victoria@gmail.com', '9678', 'USED', '2022-10-15'),
(67, 'rtatat2@gmail.com', '9497', 'USED', '2022-10-15'),
(68, 'henrierino.victoria@gmail.com', '7965', 'USED', '2022-10-17'),
(69, 'henrierino.victoria@gmail.com', '9872', 'USED', '2022-10-17'),
(70, 'henrierino.victoria@gmail.com', '8659', 'USED', '2022-10-17'),
(71, 'rtatat2@gmail.com', '7645', 'USED', '2022-10-17'),
(72, 'henrierino.victoria@gmail.com', '7578', 'USED', '2022-10-17'),
(73, 'henrierino.victoria@gmail.com', '8430', 'USED', '2022-10-17'),
(74, 'rtatat2@gmail.com', '6847', 'USED', '2022-10-17'),
(75, 'rtatat2@gmail.com', '7445', 'USED', '2022-10-19'),
(76, 'rtatat2@gmail.com', '8972', 'USED', '2022-10-19'),
(77, 'rtatat2@gmail.com', '7882', 'USED', '2022-10-19'),
(78, 'rtatat2@gmail.com', '8542', 'USED', '2022-10-20'),
(79, 'rtatat2@gmail.com', '6851', 'USED', '2022-10-20'),
(80, 'rtatat2@gmail.com', '9862', 'USED', '2022-10-20'),
(81, 'rtatat2@gmail.com', '7328', 'USED', '2022-10-20'),
(82, 'rtatat2@gmail.com', '8107', 'USED', '2022-10-20'),
(83, 'rtatat2@gmail.com', '9994', 'USED', '2022-10-20'),
(84, 'rtatat2@gmail.com', '7694', 'USED', '2022-10-20'),
(85, 'rtatat2@gmail.com', '9863', 'USED', '2022-10-20'),
(86, 'rtatat2@gmail.com', '7302', 'USED', '2022-10-20'),
(87, 'rtatat2@gmail.com', '9621', 'USED', '2022-10-20'),
(88, 'rtatat2@gmail.com', '6805', 'USED', '2022-10-20'),
(89, 'rtatat2@gmail.com', '9712', 'USED', '2022-10-20'),
(90, 'rtatat2@gmail.com', '9792', 'USED', '2022-10-20'),
(91, 'rtatat2@gmail.com', '8495', 'USED', '2022-10-20'),
(92, 'rtatat2@gmail.com', '6776', 'USED', '2022-10-21'),
(93, 'rtatat2@gmail.com', '6877', 'USED', '2022-11-17'),
(94, 'rtatat2@gmail.com', '6868', 'USED', '2022-12-03'),
(95, 'rtatat2@gmail.com', '8330', 'USED', '2022-12-03'),
(96, 'rtatat2@gmail.com', '8575', 'USED', '2022-12-03'),
(97, 'rtatat2@gmail.com', '8025', 'USED', '2022-12-03'),
(98, 'rtatat2@gmail.com', '9254', 'USED', '2022-12-03'),
(99, 'tricore012@gmail.com', '7936', 'USED', '2022-12-03'),
(100, 'rtatat2@gmail.com', '7655', 'USED', '2022-12-03'),
(101, 'rtatat2@gmail.com', '9636', 'USED', '2022-12-03'),
(102, 'rtatat2@gmail.com', '8302', 'USED', '2022-12-03'),
(103, 'tricore012@gmail.com', '9751', 'USED', '2022-12-03'),
(104, 'rtatat2@gmail.com', '9643', 'USED', '2022-12-03'),
(105, 'rtatat2@gmail.com', '9575', 'USED', '2022-12-03'),
(106, 'tricore012@gmail.com', '7206', 'USED', '2022-12-03'),
(107, 'rtatat2@gmail.com', '8268', 'USED', '2022-12-03'),
(108, 'tricore012@gmail.com', '7308', 'USED', '2022-12-03');

-- --------------------------------------------------------

--
-- Table structure for table `security_attemp_sms`
--

CREATE TABLE `security_attemp_sms` (
  `id` int(11) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `code` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `assigned_to` varchar(250) NOT NULL,
  `previously_assigned_to` varchar(250) NOT NULL,
  `gender` varchar(250) NOT NULL,
  `birthday` date NOT NULL,
  `phone` varchar(250) NOT NULL,
  `code` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `date_created` date NOT NULL,
  `date_verified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `fullname`, `assigned_to`, `previously_assigned_to`, `gender`, `birthday`, `phone`, `code`, `status`, `date_created`, `date_verified`) VALUES
(1, 'rtatat2@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'rtatat2@gmail.com', 'Henrie Victoria', 'RMS-9686', '', 'Male', '2009-09-09', '09667102736', '9707', 'VERIFIED', '2022-04-12', '2022-04-12'),
(2, 'angelsasha10@gmail.com', 'admin', 'angelsasha10@gmail.com', 'Angel Sasha', 'RMS-7894', '', 'Female', '2000-05-06', '09355676421', '7903', 'VERIFIED', '2022-05-05', '2022-05-05'),
(13, 'henrierino.victoria@gmail.com', 'sadako', 'henrierino.victoria@gmail.com', 'Henrie Victoria', 'RMS-7437', '', 'Male', '2001-09-09', '09667102746', '7128', 'ARCHIVE', '2022-06-07', '2022-06-07'),
(15, 'henrierino.victoria.b@bulsu.edu.ph', 'sadako', 'henrierino.victoria.b@bulsu.edu.ph', 'ri', ' RMS-7435', '', 'Male', '0000-00-00', '', '7902', 'ARCHIVE', '2022-10-14', '0000-00-00'),
(17, 'hellodevcore@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'hellodevcore@gmail.com', 'Gerald Mico Mico devcore', 'RMS-9906', '', 'Male', '1995-10-02', '09166513189', '6924', 'VERIFIED', '2022-12-03', '2022-12-03'),
(18, 'tricore012@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'tricore012@gmail.com', 'Gerald Mico Mico devcore', 'RMS-9623', '', 'Male', '1995-10-03', '09166513189', '8930', 'VERIFIED', '2022-12-03', '2022-12-03');

-- --------------------------------------------------------

--
-- Table structure for table `user_login_fail`
--

CREATE TABLE `user_login_fail` (
  `id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `date_login` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login_fail`
--

INSERT INTO `user_login_fail` (`id`, `email`, `date_login`) VALUES
(1, 'rtatat2@gmail.com', '2022-10-20'),
(2, 'rtatat2@gmail.com', '2022-10-20'),
(3, 'rtatat2@gmail.com', '2022-10-20'),
(4, 'angelsasha10@gmail.com', '2022-12-03'),
(5, 'angelsasha10@gmail.com', '2022-12-03');

-- --------------------------------------------------------

--
-- Table structure for table `verification_attemp_email`
--

CREATE TABLE `verification_attemp_email` (
  `id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `code` varchar(250) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `verification_attemp_email`
--

INSERT INTO `verification_attemp_email` (`id`, `email`, `code`, `date_created`) VALUES
(1, 'tricore012@gmail.com', '8202', '2022-04-12'),
(2, 'wedotaph@gmail.com', '7812', '2022-04-12'),
(3, 'rtatat2@gmail.com', '9707', '2022-04-12'),
(4, 'angelsasha10@gmail.com', '7903', '2022-05-05'),
(5, 'henrierino.victoria@gmail.com', '7015', '2022-06-07'),
(6, 'henrierino.victoria@gmail.com', '7128', '2022-06-07'),
(7, 'henrierino.victoria.b@bulsu.edu.ph', '7902', '2022-10-14'),
(8, 'tricore012@gmail.com', '6924', '2022-12-03'),
(9, 'tricore012@gmail.com', '6924', '2022-12-03'),
(10, 'tricore012@gmail.com', '8930', '2022-12-03');

-- --------------------------------------------------------

--
-- Table structure for table `verification_attemp_sms`
--

CREATE TABLE `verification_attemp_sms` (
  `id` int(11) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `code` varchar(250) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `viewers`
--

CREATE TABLE `viewers` (
  `id` int(11) NOT NULL,
  `ip` varchar(250) NOT NULL,
  `rip` varchar(250) NOT NULL,
  `city` varchar(250) NOT NULL,
  `region` varchar(250) NOT NULL,
  `org` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `viewers`
--

INSERT INTO `viewers` (`id`, `ip`, `rip`, `city`, `region`, `org`, `email`, `date_created`) VALUES
(1, '112.200.107.30', '14.6879,120.9951', 'Quezon City', 'Metro Manila', 'AS9299 Philippine Long Distance Telephone Company', 'tricore012@gmail.com', '2022-04-12'),
(2, '112.200.107.30', '14.6879,120.9951', 'Quezon City', 'Metro Manila', 'AS9299 Philippine Long Distance Telephone Company', 'tricore012@gmail.com', '2022-04-12'),
(3, '112.200.107.30', '14.6879,120.9951', 'Quezon City', 'Metro Manila', 'AS9299 Philippine Long Distance Telephone Company', 'tricore012@gmail.com', '2022-04-12'),
(4, '112.200.107.30', '14.6879,120.9951', 'Quezon City', 'Metro Manila', 'AS9299 Philippine Long Distance Telephone Company', 'tricore012@gmail.com', '2022-04-12'),
(5, '112.200.107.30', '14.6879,120.9951', 'Quezon City', 'Metro Manila', 'AS9299 Philippine Long Distance Telephone Company', 'tricore012@gmail.com', '2022-04-12'),
(6, '112.200.107.30', '14.6879,120.9951', 'Quezon City', 'Metro Manila', 'AS9299 Philippine Long Distance Telephone Company', 'tricore012@gmail.com', '2022-04-12'),
(7, '112.200.107.30', '14.6879,120.9951', 'Quezon City', 'Metro Manila', 'AS9299 Philippine Long Distance Telephone Company', 'wedotaph@gmail.com', '2022-04-12'),
(8, '152.32.100.101', '14.6909,121.0959', 'Quezon City', 'Metro Manila', 'AS17639 Converge ICT Solutions Inc.', 'tricore012@gmail.com', '2022-04-12'),
(9, '152.32.100.101', '14.6909,121.0959', 'Quezon City', 'Metro Manila', 'AS17639 Converge ICT Solutions Inc.', 'tricore012@gmail.com', '2022-04-12'),
(10, '152.32.100.101', '14.6909,121.0959', 'Quezon City', 'Metro Manila', 'AS17639 Converge ICT Solutions Inc.', 'tricore012@gmail.com', '2022-04-12'),
(11, '152.32.100.101', '14.6909,121.0959', 'Quezon City', 'Metro Manila', 'AS17639 Converge ICT Solutions Inc.', 'rtatat2@gmail.com', '2022-04-12'),
(12, '152.32.100.101', '14.6909,121.0959', 'Quezon City', 'Metro Manila', 'AS17639 Converge ICT Solutions Inc.', 'tricore012@gmail.com', '2022-04-12'),
(13, '152.32.100.101', '14.6644,121.0469', 'Quezon City', 'Metro Manila', 'AS17639 Converge ICT Solutions Inc.', 'tricore012@gmail.com', '2022-04-29'),
(14, '152.32.100.101', '14.7004,121.0810', 'Quezon City', 'Metro Manila', 'AS17639 Converge ICT Solutions Inc.', 'tricore012@gmail.com', '2022-05-05'),
(15, '152.32.100.101', '14.7004,121.0810', 'Quezon City', 'Metro Manila', 'AS17639 Converge ICT Solutions Inc.', 'tricore012@gmail.com', '2022-05-05'),
(16, '152.32.100.101', '14.7004,121.0810', 'Quezon City', 'Metro Manila', 'AS17639 Converge ICT Solutions Inc.', 'angelsasha10@gmail.com', '2022-05-05'),
(17, '152.32.100.101', '14.7004,121.0810', 'Quezon City', 'Metro Manila', 'AS17639 Converge ICT Solutions Inc.', 'tricore012@gmail.com', '2022-05-05'),
(18, '152.32.100.101', '14.7004,121.0810', 'Quezon City', 'Metro Manila', 'AS17639 Converge ICT Solutions Inc.', 'angelsasha10@gmail.com', '2022-05-05'),
(19, '152.32.100.101', '14.7004,121.0810', 'Quezon City', 'Metro Manila', 'AS17639 Converge ICT Solutions Inc.', 'gonzales.nadineclaire.p.5260@gmail.com', '2022-05-05'),
(20, '152.32.100.101', '14.6909,121.0959', 'Quezon City', 'Metro Manila', 'AS17639 Converge ICT Solutions Inc.', 'tricore012@gmail.com', '2022-05-13'),
(21, '152.32.100.101', '14.6909,121.0959', 'Quezon City', 'Metro Manila', 'AS17639 Converge ICT Solutions Inc.', 'tricore012@gmail.com', '2022-05-13'),
(22, '152.32.100.101', '14.6909,121.0959', 'Quezon City', 'Metro Manila', 'AS17639 Converge ICT Solutions Inc.', 'tricore012@gmail.com', '2022-05-13'),
(23, '152.32.100.101', '14.6909,121.0959', 'Quezon City', 'Metro Manila', 'AS17639 Converge ICT Solutions Inc.', 'tricore012@gmail.com', '2022-05-13'),
(24, '152.32.100.101', '14.6909,121.0959', 'Quezon City', 'Metro Manila', 'AS17639 Converge ICT Solutions Inc.', 'tricore012@gmail.com', '2022-05-13'),
(25, '152.32.100.101', '14.6909,121.0959', 'Quezon City', 'Metro Manila', 'AS17639 Converge ICT Solutions Inc.', 'tricore012@gmail.com', '2022-05-13'),
(26, '110.54.156.148', '14.8139,121.0453', 'San Jose del Monte', 'Central Luzon', 'AS4775 Globe Telecoms', 'rtatat2@gmail.com', '2022-06-07'),
(27, '110.54.156.148', '14.8361,120.9784', 'Guyong', 'Central Luzon', 'AS4775 Globe Telecoms', 'rtatat2@gmail.com', '2022-06-07'),
(28, '110.54.156.148', '14.8139,121.0453', 'San Jose del Monte', 'Central Luzon', 'AS4775 Globe Telecoms', 'rtatat2@gmail.com', '2022-06-07'),
(29, '110.54.156.148', '14.8361,120.9784', 'Guyong', 'Central Luzon', 'AS4775 Globe Telecoms', 'rtatat2@gmail.com', '2022-06-07'),
(30, '110.54.156.148', '14.8361,120.9784', 'Guyong', 'Central Luzon', 'AS4775 Globe Telecoms', 'henrierino.victoria@gmail.com', '2022-06-07'),
(31, '110.54.156.148', '14.8361,120.9784', 'Guyong', 'Central Luzon', 'AS4775 Globe Telecoms', 'rtatat2@gmail.com', '2022-06-07'),
(32, '110.54.156.148', '14.8361,120.9784', 'Guyong', 'Central Luzon', 'AS4775 Globe Telecoms', 'rtatat2@gmail.com', '2022-06-07'),
(33, '110.54.156.148', '14.8139,121.0453', 'San Jose del Monte', 'Central Luzon', 'AS4775 Globe Telecoms', 'rtatat2@gmail.com', '2022-06-07'),
(34, '110.54.156.148', '14.8361,120.9784', 'Guyong', 'Central Luzon', 'AS4775 Globe Telecoms', 'rtatat2@gmail.com', '2022-06-07'),
(35, '110.54.156.148', '14.8361,120.9784', 'Guyong', 'Central Luzon', 'AS4775 Globe Telecoms', 'rtatat2@gmail.com', '2022-06-07'),
(36, '110.54.156.148', '14.8361,120.9784', 'Guyong', 'Central Luzon', 'AS4775 Globe Telecoms', 'rtatat2@gmail.com', '2022-06-07'),
(37, '110.54.156.148', '14.8361,120.9784', 'Guyong', 'Central Luzon', 'AS4775 Globe Telecoms', 'rtatat2@gmail.com', '2022-06-07'),
(38, '110.54.156.148', '14.8139,121.0453', 'San Jose del Monte', 'Central Luzon', 'AS4775 Globe Telecoms', 'rtatat2@gmail.com', '2022-06-07'),
(39, '110.54.156.148', '14.8361,120.9784', 'Guyong', 'Central Luzon', 'AS4775 Globe Telecoms', 'rtatat2@gmail.com', '2022-06-07'),
(40, '110.54.156.148', '14.8361,120.9784', 'Guyong', 'Central Luzon', 'AS4775 Globe Telecoms', 'henrierino.victoria@gmail.com', '2022-06-07'),
(41, '110.54.156.148', '14.8361,120.9784', 'Guyong', 'Central Luzon', 'AS4775 Globe Telecoms', 'rtatat2@gmail.com', '2022-06-07'),
(42, '112.198.95.37', '14.6488,121.0509', 'Quezon City', 'Metro Manila', 'AS4775 Globe Telecoms', 'rtatat2@gmail.com', '2022-06-11'),
(43, '112.198.95.37', '14.6488,121.0509', 'Quezon City', 'Metro Manila', 'AS4775 Globe Telecoms', 'rtatat2@gmail.com', '2022-06-11'),
(44, '112.198.95.37', '14.6488,121.0509', 'Quezon City', 'Metro Manila', 'AS4775 Globe Telecoms', 'rtatat2@gmail.com', '2022-06-11'),
(45, '112.198.95.37', '14.6488,121.0509', 'Quezon City', 'Metro Manila', 'AS4775 Globe Telecoms', 'rtatat2@gmail.com', '2022-06-11'),
(46, '110.54.156.151', '15.1622,120.5675', 'Santol', 'Central Luzon', 'AS4775 Globe Telecoms', 'rtatat2@gmail.com', '2022-10-13'),
(47, '110.54.156.151', '15.1622,120.5675', 'Santol', 'Central Luzon', 'AS4775 Globe Telecoms', 'rtatat2@gmail.com', '2022-10-13'),
(48, '110.54.156.151', '15.1622,120.5675', 'Santol', 'Central Luzon', 'AS4775 Globe Telecoms', 'henrierino.victoria@gmail.com', '2022-10-13'),
(49, '112.198.95.112', '14.6617,120.9564', 'Manila', 'Metro Manila', 'AS4775 Globe Telecoms', 'rtatat2@gmail.com', '2022-10-14'),
(50, '112.198.95.112', '14.6617,120.9564', 'Manila', 'Metro Manila', 'AS4775 Globe Telecoms', 'henrierino.victoria@gmail.com', '2022-10-14'),
(51, '112.198.95.112', '14.6617,120.9564', 'Manila', 'Metro Manila', 'AS4775 Globe Telecoms', 'henrierino.victoria@gmail.com', '2022-10-14'),
(52, '112.198.95.112', '14.6617,120.9564', 'Manila', 'Metro Manila', 'AS4775 Globe Telecoms', 'henrierino.victoria@gmail.com', '2022-10-14'),
(53, '112.198.127.248', '14.5503,121.0327', 'Makati City', 'Metro Manila', 'AS4775 Globe Telecoms', 'henrierino.victoria@gmail.com', '2022-10-15'),
(54, '112.198.127.248', '14.5503,121.0327', 'Makati City', 'Metro Manila', 'AS4775 Globe Telecoms', 'rtatat2@gmail.com', '2022-10-15'),
(55, '', '', '', '', '', 'henrierino.victoria@gmail.com', '2022-10-17'),
(56, '', '', '', '', '', 'henrierino.victoria@gmail.com', '2022-10-17'),
(57, '', '', '', '', '', 'henrierino.victoria@gmail.com', '2022-10-17'),
(58, '', '', '', '', '', 'henrierino.victoria@gmail.com', '2022-10-17'),
(59, '', '', '', '', '', 'henrierino.victoria@gmail.com', '2022-10-17'),
(60, '', '', '', '', '', 'henrierino.victoria@gmail.com', '2022-10-17'),
(61, '', '', '', '', '', 'henrierino.victoria@gmail.com', '2022-10-17'),
(62, '112.198.127.146', '14.5503,121.0327', 'Makati City', 'Metro Manila', 'AS4775 Globe Telecoms', 'rtatat2@gmail.com', '2022-10-17'),
(63, '112.198.127.146', '14.5503,121.0327', 'Makati City', 'Metro Manila', 'AS4775 Globe Telecoms', 'henrierino.victoria@gmail.com', '2022-10-17'),
(64, '112.198.127.146', '14.5503,121.0327', 'Makati City', 'Metro Manila', 'AS4775 Globe Telecoms', 'henrierino.victoria@gmail.com', '2022-10-17'),
(74, '158.62.38.100', '14.6970,121.0570', 'Quezon City', 'Metro Manila', 'AS132199 Globe Telecom Inc.', 'rtatat2@gmail.com', '2022-10-20'),
(75, '158.62.38.100', '14.6970,121.0570', 'Quezon City', 'Metro Manila', 'AS132199 Globe Telecom Inc.', 'rtatat2@gmail.com', '2022-10-20'),
(76, '158.62.38.100', '14.6970,121.0570', 'Quezon City', 'Metro Manila', 'AS132199 Globe Telecom Inc.', 'rtatat2@gmail.com', '2022-10-20'),
(77, '158.62.38.100', '14.6970,121.0570', 'Quezon City', 'Metro Manila', 'AS132199 Globe Telecom Inc.', 'rtatat2@gmail.com', '2022-10-20'),
(78, '158.62.38.100', '14.6970,121.0570', 'Quezon City', 'Metro Manila', 'AS132199 Globe Telecom Inc.', 'rtatat2@gmail.com', '2022-10-20'),
(79, '158.62.38.100', '14.6970,121.0570', 'Quezon City', 'Metro Manila', 'AS132199 Globe Telecom Inc.', 'rtatat2@gmail.com', '2022-10-20'),
(80, '158.62.38.100', '14.6970,121.0570', 'Quezon City', 'Metro Manila', 'AS132199 Globe Telecom Inc.', 'rtatat2@gmail.com', '2022-10-20'),
(81, '158.62.38.100', '14.6970,121.0570', 'Quezon City', 'Metro Manila', 'AS132199 Globe Telecom Inc.', 'rtatat2@gmail.com', '2022-10-20'),
(82, '158.62.38.100', '14.6970,121.0570', 'Quezon City', 'Metro Manila', 'AS132199 Globe Telecom Inc.', 'rtatat2@gmail.com', '2022-10-20'),
(83, '158.62.38.100', '14.6970,121.0570', 'Quezon City', 'Metro Manila', 'AS132199 Globe Telecom Inc.', 'rtatat2@gmail.com', '2022-10-20'),
(84, '158.62.38.100', '14.6970,121.0570', 'Quezon City', 'Metro Manila', 'AS132199 Globe Telecom Inc.', 'rtatat2@gmail.com', '2022-10-20'),
(85, '158.62.38.100', '14.6970,121.0570', 'Quezon City', 'Metro Manila', 'AS132199 Globe Telecom Inc.', 'rtatat2@gmail.com', '2022-10-20'),
(86, '158.62.38.100', '14.6970,121.0570', 'Quezon City', 'Metro Manila', 'AS132199 Globe Telecom Inc.', 'rtatat2@gmail.com', '2022-10-20'),
(87, '158.62.38.100', '14.6970,121.0570', 'Quezon City', 'Metro Manila', 'AS132199 Globe Telecom Inc.', 'rtatat2@gmail.com', '2022-10-22'),
(88, '158.62.41.179', '14.6442,121.1212', 'Quezon City', 'Metro Manila', 'AS132199 Globe Telecom Inc.', 'rtatat2@gmail.com', '2022-11-05'),
(89, '158.62.41.179', '14.6466,121.0509', 'Quezon City', 'Metro Manila', 'AS132199 Globe Telecom Inc.', 'rtatat2@gmail.com', '2022-11-18'),
(90, '158.62.35.235', '14.6736,121.0229', 'Quezon City', 'Metro Manila', 'AS132199 Globe Telecom Inc.', 'rtatat2@gmail.com', '2022-12-03'),
(91, '158.62.35.235', '14.6736,121.0229', 'Quezon City', 'Metro Manila', 'AS132199 Globe Telecom Inc.', 'rtatat2@gmail.com', '2022-12-03'),
(92, '158.62.35.235', '14.6736,121.0229', 'Quezon City', 'Metro Manila', 'AS132199 Globe Telecom Inc.', 'rtatat2@gmail.com', '2022-12-03'),
(93, '158.62.35.235', '14.6736,121.0229', 'Quezon City', 'Metro Manila', 'AS132199 Globe Telecom Inc.', 'rtatat2@gmail.com', '2022-12-03'),
(94, '158.62.35.235', '14.6736,121.0229', 'Quezon City', 'Metro Manila', 'AS132199 Globe Telecom Inc.', 'rtatat2@gmail.com', '2022-12-03'),
(95, '158.62.35.235', '14.6736,121.0229', 'Quezon City', 'Metro Manila', 'AS132199 Globe Telecom Inc.', 'tricore012@gmail.com', '2022-12-03'),
(96, '158.62.35.235', '14.6736,121.0229', 'Quezon City', 'Metro Manila', 'AS132199 Globe Telecom Inc.', 'rtatat2@gmail.com', '2022-12-03'),
(97, '158.62.35.235', '14.6736,121.0229', 'Quezon City', 'Metro Manila', 'AS132199 Globe Telecom Inc.', 'rtatat2@gmail.com', '2022-12-03'),
(98, '158.62.35.235', '14.6736,121.0229', 'Quezon City', 'Metro Manila', 'AS132199 Globe Telecom Inc.', 'rtatat2@gmail.com', '2022-12-03'),
(99, '158.62.35.235', '14.6736,121.0229', 'Quezon City', 'Metro Manila', 'AS132199 Globe Telecom Inc.', 'tricore012@gmail.com', '2022-12-03'),
(100, '158.62.35.235', '14.6736,121.0229', 'Quezon City', 'Metro Manila', 'AS132199 Globe Telecom Inc.', 'rtatat2@gmail.com', '2022-12-03'),
(101, '158.62.35.235', '14.6736,121.0229', 'Quezon City', 'Metro Manila', 'AS132199 Globe Telecom Inc.', 'rtatat2@gmail.com', '2022-12-03'),
(102, '158.62.35.235', '14.6736,121.0229', 'Quezon City', 'Metro Manila', 'AS132199 Globe Telecom Inc.', 'tricore012@gmail.com', '2022-12-03'),
(103, '158.62.35.235', '14.6736,121.0229', 'Quezon City', 'Metro Manila', 'AS132199 Globe Telecom Inc.', 'rtatat2@gmail.com', '2022-12-03'),
(104, '158.62.35.235', '14.6736,121.0229', 'Quezon City', 'Metro Manila', 'AS132199 Globe Telecom Inc.', 'tricore012@gmail.com', '2022-12-03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `admin_verification_attemp_email`
--
ALTER TABLE `admin_verification_attemp_email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_verification_attemp_sms`
--
ALTER TABLE `admin_verification_attemp_sms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attachment`
--
ALTER TABLE `attachment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `biller`
--
ALTER TABLE `biller`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `house`
--
ALTER TABLE `house`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logout_view`
--
ALTER TABLE `logout_view`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pay_cash`
--
ALTER TABLE `pay_cash`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rules`
--
ALTER TABLE `rules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `security_attemp_email`
--
ALTER TABLE `security_attemp_email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `security_attemp_sms`
--
ALTER TABLE `security_attemp_sms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_login_fail`
--
ALTER TABLE `user_login_fail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verification_attemp_email`
--
ALTER TABLE `verification_attemp_email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verification_attemp_sms`
--
ALTER TABLE `verification_attemp_sms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `viewers`
--
ALTER TABLE `viewers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_verification_attemp_email`
--
ALTER TABLE `admin_verification_attemp_email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_verification_attemp_sms`
--
ALTER TABLE `admin_verification_attemp_sms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attachment`
--
ALTER TABLE `attachment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `biller`
--
ALTER TABLE `biller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `house`
--
ALTER TABLE `house`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `logout_view`
--
ALTER TABLE `logout_view`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pay_cash`
--
ALTER TABLE `pay_cash`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rules`
--
ALTER TABLE `rules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `security_attemp_email`
--
ALTER TABLE `security_attemp_email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `security_attemp_sms`
--
ALTER TABLE `security_attemp_sms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_login_fail`
--
ALTER TABLE `user_login_fail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `verification_attemp_email`
--
ALTER TABLE `verification_attemp_email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `verification_attemp_sms`
--
ALTER TABLE `verification_attemp_sms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `viewers`
--
ALTER TABLE `viewers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
