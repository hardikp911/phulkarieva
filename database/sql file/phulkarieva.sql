-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2023 at 08:23 PM
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
-- Database: `phulkarieva`
--

-- --------------------------------------------------------

--
-- Table structure for table `cartdata`
--

CREATE TABLE `cartdata` (
  `cart_id` int(225) NOT NULL,
  `user_id` int(225) NOT NULL,
  `product_id` int(225) NOT NULL,
  `product_size` varchar(225) NOT NULL,
  `product_quantity` int(225) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cartdata`
--

INSERT INTO `cartdata` (`cart_id`, `user_id`, `product_id`, `product_size`, `product_quantity`) VALUES
(23, 25, 14, '32', 2),
(21, 8, 13, 'xl', 2),
(22, 25, 13, 'xl', 2);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(255) NOT NULL,
  `catname` varchar(225) NOT NULL,
  `imgpath` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `catname`, `imgpath`) VALUES
(15, 'shirt', './assets/uploads/wallpapersden.com_monkey-luffy_1920x1080.jpg'),
(16, 'tshirt', './assets/uploads/wallpapersden.com_monkey-luffy_1920x1080.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(225) NOT NULL,
  `fullname` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `roll` varchar(225) NOT NULL,
  `phone_number` bigint(255) DEFAULT NULL,
  `user_address` varchar(225) DEFAULT NULL,
  `user_address2` varchar(225) DEFAULT NULL,
  `user_city` varchar(225) DEFAULT NULL,
  `city_zipcode` bigint(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `fullname`, `email`, `password`, `roll`, `phone_number`, `user_address`, `user_address2`, `user_city`, `city_zipcode`) VALUES
(20, 'Yash goyal', 'yash@123.com', '$2y$10$dxgUpl3fhSnkdulbkMMN4.Vi5hZd2JTD1EWuZoJSOjKHosPHou4F2', 'admin', NULL, NULL, NULL, NULL, NULL),
(21, 'admin', 'admin1@google.com', '$2y$10$v5lV/.C96UccuMwkcpXMWeZA3OsMgim0PNVp.PAc34NOWrr/RRRp.', 'admin', 65555555557, 'acc fd c', ' asdf ds', 'Napasar', 1234),
(22, 'admin', 'admin@google.com', '$2y$10$CC7A5XelArJtHggvySkopebhE3UvHOC8vQtlXAOwm8I9Af4G5LtvS', 'user', 98375973966, 'pawan puri bikanercc', 'near relienc fresh , sanjaypark', 'Deshnok', 3340011),
(23, 'day', 'anandrambkn@gmail.com', '$2y$10$JKq6Limsf.FGUZKGJoIkG.VNiV8Z4hpek9z2I7jZq1096C5oPPpoa', 'user', 9413737698, 'goyal', 'dadadadadaddad', 'Deshnok', 334003),
(24, 'Yash Goyal', 'yashgoyal36@gmail.com', '$2y$10$N82IpoCXCqdZ4u/mcci2wOd2c7Etp4pw2Gxc1tMeS/VvK/YXImEEW', 'user', 95714, '2-E-308', 'Jnv colony, Bikaner, Rajasthan', 'Deshnok', 334003),
(25, 'hardik parmar', 'hardik23259@gmail.com', '$2y$10$Fba5diHW/0lhetj5IEmcDO77p7g3UFm6fYTf0cKMxeaV4qGcK6gCy', 'user', 9116763067, '1-b-13 pawan puri bikaner', 'left busari colony. kothrud depo.', 'Nagaur', 334001);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(225) NOT NULL,
  `user_id` int(225) NOT NULL,
  `user_email` varchar(225) NOT NULL,
  `invoice_id` int(225) NOT NULL,
  `cart_data` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `user_email`, `invoice_id`, `cart_data`) VALUES
(3, 21, 'admin1@google.com', 782, 'a:2:{i:0;a:8:{s:10:\"product_id\";s:2:\"14\";s:12:\"product_size\";s:2:\"32\";s:16:\"product_Quantity\";s:1:\"2\";s:18:\"product_image_path\";s:77:\"../admin/assets/uploads/products/wallpapersden.com_monkey-luffy_1920x1080.jpg\";s:12:\"product_name\";s:16:\"hardik parmar as\";s:13:\"product_color\";s:4:\"blue\";s:12:\"product_rate\";s:3:\"123\";s:9:\"delivered\";s:9:\"Delivered\";}i:1;a:8:{s:10:\"product_id\";s:2:\"13\";s:12:\"product_size\";s:2:\"xl\";s:16:\"product_Quantity\";s:1:\"2\";s:18:\"product_image_path\";s:41:\"../admin/assets/uploads/products/edit.jpg\";s:12:\"product_name\";s:13:\"hardik parmar\";s:13:\"product_color\";s:4:\"blue\";s:12:\"product_rate\";s:3:\"123\";s:9:\"delivered\";s:9:\"Delivered\";}}');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(225) NOT NULL,
  `product_name` varchar(225) NOT NULL,
  `product_brand` varchar(255) NOT NULL,
  `category_id` int(225) NOT NULL,
  `size_option` varchar(225) NOT NULL,
  `product_size` varchar(225) NOT NULL,
  `product_rate` int(225) NOT NULL,
  `product_color` varchar(225) DEFAULT NULL,
  `product_description` varchar(5000) NOT NULL,
  `product_Specification` varchar(2556) NOT NULL,
  `product_image_path` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_brand`, `category_id`, `size_option`, `product_size`, `product_rate`, `product_color`, `product_description`, `product_Specification`, `product_image_path`) VALUES
(13, 'hardik parmar', 'hardik', 16, 'roman', 'xl,b', 123, 'blue', 'asc a s ca', 'c dbddfg \r\n dfg\r\ndfg dfg \r\n dfg', './assets/uploads/products/edit.jpg'),
(14, 'hardik parmar as', 'asd qc3w', 15, 'digit', '32,43,32,54,65,76,9854,32,12,32', 123, 'blue', 'asd asd sa dc', ' asdfsdf sad fsdca', './assets/uploads/products/wallpapersden.com_monkey-luffy_1920x1080.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cartdata`
--
ALTER TABLE `cartdata`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cartdata`
--
ALTER TABLE `cartdata`
  MODIFY `cart_id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
