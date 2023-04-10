-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2023 at 05:41 AM
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
-- Database: `ecommerce_marketplace`
--

-- --------------------------------------------------------

--
-- Table structure for table `product_all`
--

CREATE TABLE `product_all` (
  `product_id` varchar(25) NOT NULL,
  `product_image` varchar(250) NOT NULL,
  `product_type` varchar(50) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` varchar(15) NOT NULL,
  `product_quantity` varchar(1000) NOT NULL,
  `product_description` varchar(2000) NOT NULL,
  `product_tag` varchar(500) NOT NULL,
  `added_date` date NOT NULL,
  `added_time` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `product_type_id` varchar(10) NOT NULL,
  `product_type_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`product_type_id`, `product_type_name`) VALUES
('GNGT-sNDKm', 'Electronics'),
('GNGT-blcrU', 'Clothing'),
('GNGT-Fj6xe', 'Gadget and Accessories');

-- --------------------------------------------------------

--
-- Table structure for table `user_all`
--

CREATE TABLE `user_all` (
  `user_id` varchar(25) NOT NULL,
  `user_type` varchar(25) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_mobile` varchar(15) DEFAULT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_businessname` varchar(100) DEFAULT NULL,
  `user_businesslink` varchar(1000) DEFAULT NULL,
  `joining_date` date NOT NULL,
  `joining_time` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_all`
--

INSERT INTO `user_all` (`user_id`, `user_type`, `user_name`, `user_email`, `user_mobile`, `user_password`, `user_businessname`, `user_businesslink`, `joining_date`, `joining_time`) VALUES
('EA-0630618989613', 'Admin', 'Power User', 'pu@gmail.com', NULL, 'Im@Power123', NULL, NULL, '2023-04-06', '07:06:05.000000'),
('EC-8498196795477', 'Customer', 'Syed Golam Abid', 'sg.abid.13@gmail.com', NULL, 'Im@Abid123', NULL, NULL, '2023-04-09', '09:02:26.000000'),
('EM-2590961194921', 'Merchant', 'S.G. Abid', 'sg.abid@hotmail.com', NULL, 'Im@Abid123', 'Mech Tech', 'https://www.google.com/', '2023-04-10', '01:08:01.000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product_all`
--
ALTER TABLE `product_all`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_all`
--
ALTER TABLE `user_all`
  ADD PRIMARY KEY (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
