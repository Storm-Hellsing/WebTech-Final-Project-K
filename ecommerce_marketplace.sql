-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2023 at 11:32 AM
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
-- Table structure for table `cart_mgmt`
--

CREATE TABLE `cart_mgmt` (
  `cart_id` varchar(25) NOT NULL,
  `user_id` varchar(25) NOT NULL,
  `product_id` varchar(25) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` varchar(15) NOT NULL,
  `product_quantity` varchar(1000) NOT NULL,
  `product_description` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_all`
--

CREATE TABLE `product_all` (
  `product_id` varchar(25) NOT NULL,
  `merchant_id` varchar(25) NOT NULL,
  `product_type` varchar(50) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` varchar(15) NOT NULL,
  `product_quantity` varchar(1000) NOT NULL,
  `product_description` varchar(2000) NOT NULL,
  `added_date` date NOT NULL,
  `added_time` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_all`
--

INSERT INTO `product_all` (`product_id`, `merchant_id`, `product_type`, `product_name`, `product_price`, `product_quantity`, `product_description`, `added_date`, `added_time`) VALUES
('GNGP-cvQeUHIr', 'EM-3253162642104', 'Electronics', 'Green Led Light', '5', '1000', 'N/A', '2023-04-29', '02:05:59.000000'),
('GNGP-KhAQw8Qr', 'EM-3253162642104', 'Electronics', 'Arduino Mega 2560', '2000', '100', 'It is a Microcontroller.', '2023-04-29', '02:00:44.000000');

-- --------------------------------------------------------

--
-- Table structure for table `product_image_all`
--

CREATE TABLE `product_image_all` (
  `img_id` varchar(25) NOT NULL,
  `product_id` varchar(25) NOT NULL,
  `product_img_1` varchar(2000) DEFAULT NULL,
  `product_img_2` varchar(2000) DEFAULT NULL,
  `product_img_3` varchar(2000) DEFAULT NULL,
  `product_img_4` varchar(2000) DEFAULT NULL,
  `product_img_5` varchar(2000) DEFAULT NULL,
  `add_date` date NOT NULL,
  `add_time` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_image_all`
--

INSERT INTO `product_image_all` (`img_id`, `product_id`, `product_img_1`, `product_img_2`, `product_img_3`, `product_img_4`, `product_img_5`, `add_date`, `add_time`) VALUES
('GIMG-kwjd2gme', 'GNGP-KhAQw8Qr', 'Arduino-Mega-Board-Layout.jpg', 'image.jpg', 'Not Provided', 'Not Provided', 'Not Provided', '2023-04-29', '02:00:44.000000'),
('GIMG-v6NSoeOI', 'GNGP-cvQeUHIr', '1558007_0df99712-62ee-4f62-93c7-9db86eb1ae94_836_836.jpg', 'Not Provided', 'Not Provided', 'Not Provided', 'Not Provided', '2023-04-29', '02:05:59.000000');

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `product_type_id` varchar(25) NOT NULL,
  `product_type_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`product_type_id`, `product_type_name`) VALUES
('fsdfasdfasdf', 'Electronics');

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
('EA-0630618989613', 'Admin', 'Power User', 'pu@gmail.com', NULL, 'Im@Power123456', NULL, NULL, '2023-04-06', '07:06:05.000000'),
('EA-7115381114460', 'Admin', 'Storm Hellsing', 'storm.hellsing@hotmail.com', NULL, 'Im@Abid123', NULL, NULL, '2023-04-11', '22:18:47.000000'),
('EC-8498196795477', 'Customer', 'Syed Golam Abid', 'sg.abid@hotmail.com', NULL, 'Im@Abid123', NULL, NULL, '2023-04-09', '09:02:26.000000'),
('EM-0254833045989', 'Merchant', 'Hellsing', 'amuk@gmail.com', NULL, 'Im@Abid123', 'Hell Tech', 'https://www.youtube.com/', '2023-04-22', '22:08:58.000000'),
('EM-3253162642104', 'Merchant', 'Mech', 'mech@gmail.com', NULL, 'Im@Awsm123', 'Mech Tech', 'https://www.youtube.com/', '2023-04-22', '22:27:53.000000');

-- --------------------------------------------------------

--
-- Table structure for table `user_image_all`
--

CREATE TABLE `user_image_all` (
  `image_id` varchar(25) NOT NULL,
  `user_id` varchar(25) NOT NULL,
  `img_name` varchar(500) NOT NULL,
  `add_date` date NOT NULL,
  `add_time` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_image_all`
--

INSERT INTO `user_image_all` (`image_id`, `user_id`, `img_name`, `add_date`, `add_time`) VALUES
('GIMG-sv3OPArb', 'EC-8498196795477', 'IMG_20210325_140426_702.jpg', '2023-05-03', '11:51:23.000000');

-- --------------------------------------------------------

--
-- Table structure for table `wish_list_all`
--

CREATE TABLE `wish_list_all` (
  `wish_list_id` varchar(25) NOT NULL,
  `user_id` varchar(25) NOT NULL,
  `product_id` varchar(25) NOT NULL,
  `merchant_name` varchar(500) NOT NULL,
  `product_name` varchar(500) NOT NULL,
  `product_price` varchar(50) NOT NULL,
  `product_description` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wish_list_all`
--

INSERT INTO `wish_list_all` (`wish_list_id`, `user_id`, `product_id`, `merchant_name`, `product_name`, `product_price`, `product_description`) VALUES
('GNGW-JXvJUl6a', 'EC-8498196795477', 'GNGP-KhAQw8Qr', 'Mech', 'Arduino Mega 2560', '2000', 'It is a Microcontroller.'),
('GNGW-n8C3AeWP', 'EC-8498196795477', 'GNGP-cvQeUHIr', 'Mech', 'Green Led Light', '5', 'N/A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_mgmt`
--
ALTER TABLE `cart_mgmt`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `foreign_key_cart_product_id` (`product_id`),
  ADD KEY `foreign_key_cart_user_id` (`user_id`);

--
-- Indexes for table `product_all`
--
ALTER TABLE `product_all`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `foreign_key_with_user_all` (`merchant_id`);

--
-- Indexes for table `product_image_all`
--
ALTER TABLE `product_image_all`
  ADD PRIMARY KEY (`img_id`),
  ADD KEY `foreign_key_with_product_all` (`product_id`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`product_type_id`);

--
-- Indexes for table `user_all`
--
ALTER TABLE `user_all`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_image_all`
--
ALTER TABLE `user_image_all`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `foreign_key_user_id` (`user_id`);

--
-- Indexes for table `wish_list_all`
--
ALTER TABLE `wish_list_all`
  ADD PRIMARY KEY (`wish_list_id`),
  ADD KEY `foreign_key_user_id_at_wish_list` (`user_id`),
  ADD KEY `foreign_key_product_id_at_wish_list` (`product_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_mgmt`
--
ALTER TABLE `cart_mgmt`
  ADD CONSTRAINT `foreign_key_cart_product_id` FOREIGN KEY (`product_id`) REFERENCES `product_all` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `foreign_key_cart_user_id` FOREIGN KEY (`user_id`) REFERENCES `user_all` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_all`
--
ALTER TABLE `product_all`
  ADD CONSTRAINT `foreign_key_with_user_all` FOREIGN KEY (`merchant_id`) REFERENCES `user_all` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_image_all`
--
ALTER TABLE `product_image_all`
  ADD CONSTRAINT `foreign_key_with_product_all` FOREIGN KEY (`product_id`) REFERENCES `product_all` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_image_all`
--
ALTER TABLE `user_image_all`
  ADD CONSTRAINT `foreign_key_user_id` FOREIGN KEY (`user_id`) REFERENCES `user_all` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wish_list_all`
--
ALTER TABLE `wish_list_all`
  ADD CONSTRAINT `foreign_key_product_id_at_wish_list` FOREIGN KEY (`product_id`) REFERENCES `product_all` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `foreign_key_user_id_at_wish_list` FOREIGN KEY (`user_id`) REFERENCES `user_all` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
