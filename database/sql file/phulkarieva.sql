-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2023 at 09:12 PM
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
(11, 'tshirt', './assets/uploads/edit.jpg'),
(12, 'shorts', './assets/uploads/signature.jpg'),
(13, 'shirt', './assets/uploads/abc.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(225) NOT NULL,
  `fullname` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `roll` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `fullname`, `email`, `password`, `roll`) VALUES
(7, 'hardik', 'hardik3259@gmail.com', '$2y$10$Wvu/ndqAdNAeguW8fbmnFe95YCi1VaKH1tYmUsfYaqQKvkJmz30um', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(225) NOT NULL,
  `product_name` varchar(225) NOT NULL,
  `category_id` int(225) NOT NULL,
  `size_option` varchar(225) NOT NULL,
  `product_size` varchar(225) NOT NULL,
  `product_rate` int(225) NOT NULL,
  `product_color` varchar(225) DEFAULT NULL,
  `product_description` varchar(5000) NOT NULL,
  `product_image_path` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `category_id`, `size_option`, `product_size`, `product_rate`, `product_color`, `product_description`, `product_image_path`) VALUES
(2, 'khaki', 12, 'roman', 'XL,C', 123, 'blue,black', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Aliquam sem fringilla ut morbi tincidunt augue interdum velit euismod. Feugiat in ante metus dictum. Eu consequat ac felis donec et odio pellentesque diam volutpat. Tincidunt dui ut ornare lectus', './assets/uploads/products/wallpapersden.com_monkey-luffy_1920x1080.jpg'),
(3, 'jharduijk a-PAD ', 11, 'digit', '123123', 123123, 'blue', 'ZXC ASZD CZxc qw edfcazxsCVEWQ EW FSA DCWE FAS DC WEF SAD CASD FWQE FDW CDSDC3 DSC SCD', './assets/uploads/products/edit.jpg');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
