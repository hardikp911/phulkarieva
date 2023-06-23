-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2023 at 10:17 PM
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
(20, 8, 13, 'b', 2);

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
  `phone_number` int(255) DEFAULT NULL,
  `user_address` varchar(225) DEFAULT NULL,
  `user_city` varchar(225) DEFAULT NULL,
  `city_zipcode` int(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `fullname`, `email`, `password`, `roll`, `phone_number`, `user_address`, `user_city`, `city_zipcode`) VALUES
(7, 'hardik', 'hardik3259@gmail.com', '$2y$10$Wvu/ndqAdNAeguW8fbmnFe95YCi1VaKH1tYmUsfYaqQKvkJmz30um', 'admin', NULL, NULL, NULL, NULL),
(8, 'hardik parmar', 'hardik23259@gmail.com', '$2y$10$vS.6IPYpxWLw7XNDudD4OeM9pI/ELGcoVK/m8d/NAk.0ohpb/grQu', 'user', NULL, NULL, NULL, NULL),
(9, 'asdasd', 'hardik223259@gmail.com', '$2y$10$Wvz7CVDiz8JNnXfHwjx0DOplVjTLNovObz11CXAifCrVdo5xA42my', 'user', NULL, NULL, NULL, NULL),
(10, 'asdasd', 'hardik23259@gmadil.com', '$2y$10$YT0Pu3r43i//722IhbvJMeEzi5jP8fX52FcmXLQkzPfcqtqis.BTi', 'user', NULL, NULL, NULL, NULL),
(11, 'asdasd', 'hardik23259@gmadil.com', '$2y$10$vCq7uJLJK8Hy0X/K.GWjH.xZ9JiQl.eThG4rZVqHqeD1F5CQDHBby', 'user', NULL, NULL, NULL, NULL),
(12, 'as', 'hardik23259@gmail.com', '$2y$10$i7rIGzca0m02RkawgeGlquHN5nr5GHG1YEYTK06U43Hh84UiL2sr.', 'user', NULL, NULL, NULL, NULL),
(13, 'g', 'hardik23259@gmail.com', '$2y$10$5eiV9.UN.lpfO7fEUg9as.Ioe6wV/.hKTU0A9pjDi0bDiMpcw.jnm', 'user', NULL, NULL, NULL, NULL),
(14, 'ghj', 'hardik23259@gmail.com', '$2y$10$nh1FBGTY4lEwPyFmTuh5gui2sGaPUx81HUsozf85iUEid/TfzA7B.', 'user', NULL, NULL, NULL, NULL),
(15, 'sd', 'hardik23259@gmail.com', '$2y$10$.RqX..Rpxc/yBr7tpoCVHeE9fBoPLpyfbEP7Rfkg2XNtCNp05gJk2', 'user', NULL, NULL, NULL, NULL),
(16, 'fd', 'hardik23259@gmail.com', '$2y$10$Ptretx6loH4fPP/21U3HauuugifeCGB7J87p0snwyHHWXg6Mo17vy', 'user', NULL, NULL, NULL, NULL),
(17, 'fd', 'hardik23259@gmail.com', '$2y$10$zS1hUpngw7UUumwOWPBoC.tzijPbZaTZS1g4NCOiaoJ0Ivwtd0Ati', 'user', NULL, NULL, NULL, NULL),
(18, 'asd', 'hardik23259@gmail.com', '$2y$10$PsHM53gpr/sQtSNxaAU1Rugfvb9ruMbG2z4UYzcVD2uXvqReCP3cS', 'user', NULL, NULL, NULL, NULL),
(19, 'aS', 'hardik23259@gmail.com', '$2y$10$kGHliJmsjn.dEyuxmI/BG.p8.NjDdEeHfQA2z4CzwPREliMvtJFQO', 'user', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(255) NOT NULL,
  `user_id` int(225) NOT NULL,
  `cart_id` int(225) DEFAULT NULL,
  `product_id` int(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
(14, 'hardik parmar as', 'asd qc3w', 15, 'digit', '32,43,54,32,12,32', 123, 'blue', 'asd asd sa dc', ' asdfsdf sad fsdca', './assets/uploads/products/wallpapersden.com_monkey-luffy_1920x1080.jpg');

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
  ADD PRIMARY KEY (`order_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `cart_id` (`cart_id`);

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
  MODIFY `cart_id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
