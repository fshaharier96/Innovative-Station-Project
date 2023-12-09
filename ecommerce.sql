-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2023 at 11:26 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `first_name`, `last_name`, `email`, `password`) VALUES
(1, 'surid', 'hasan', 'suridhassan9@gmail.com', '555555'),
(2, 'farhan', 'akter', 'farhan@gmail.com', '69f7f7a7f8bca9970fa6f9c0b8dad06901d3ef23fd599d3213aa5eee5621c3e3'),
(3, 'Jamil', 'Hassan', 'Jamil@gmail.com', 'NTU1NTU1');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_details` text NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_thumbnail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_details`, `product_price`, `product_thumbnail`) VALUES
(1, 'Long Sleeve Shirt', 'this shirt is  made of cotton)', '500 Tk', '/uploads/thumbnail-6574d57eceb61-'),
(2, 'Long Sleeve Shirt', 'this shirt is  made of cotton)', '500 Tk', '/uploads/thumbnail-6574d5936f6a9-'),
(3, 'Long Sleeve designed shirt', 'this shirt is  made of cotton)', '500 Tk', '/uploads/thumbnail'),
(4, 'Polo T-shirt', 'This T-shirt has attractive design)', '700 Tk', '/uploads/thumbnail-David.jpg'),
(7, 'Long Cardigen', 'We have four different size of  this cardigen', '1000 Tk', '/uploads/thumbnail-6574d83bbab32-cardigen1.jpg'),
(8, 'Long Cardigen', 'Beautiful Cardigen', '1000 Tk', '/uploads/thumbnail-cardigen1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `product_id` int(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`product_id`, `image`) VALUES
(1, ''),
(1, ''),
(6, '/uploads/product-6573d3d6799e2-Shahnaz.jpeg,/uploads/product-6573d3d679cb7-Shamim.jpg'),
(7, '/uploads/product-6574d83bc5c22-cardigen2.jpg'),
(8, '/uploads/product-6574d9d916d55-cardigen2.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
