-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2022 at 08:36 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', 'admin1234');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `cart_name` varchar(255) NOT NULL,
  `cart_price` float NOT NULL,
  `cart_photo` varchar(255) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `cart_name`, `cart_price`, `cart_photo`, `user_id`) VALUES
(90, 'Samsung Note 6', 90000, 'images/6.png', 10),
(91, 'Honor KIWIW L21', 50000, 'images/14.png', 10);

-- --------------------------------------------------------

--
-- Table structure for table `order_reciever`
--

CREATE TABLE `order_reciever` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` int(12) NOT NULL,
  `address` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_photo` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `short_desc` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `product_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_photo`, `product_name`, `short_desc`, `description`, `product_price`) VALUES
(15, 'images/1 (1).png', 'Samsung', 'try rtyrt rtyrty  rty', 'korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem korem ', 500000),
(16, 'images/6.png', 'Samsung Note 6', 'Lorem Ipsum Dolar Smit ', 'Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit ', 90000),
(17, 'images/10.png', 'Samsung Note 5', 'Lorem Ipsum Dolar Smit ', 'Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit ', 40000),
(18, 'images/12.png', 'I phone X', 'Lorem Ipsum Dolar Smit ', 'Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit ', 120000),
(19, 'images/14.png', 'Honor KIWIW L21', 'Lorem Ipsum Dolar Smit ', 'Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit ', 50000),
(20, 'images/10.png', 'I Phone 6', 'Lorem Ipsum Dolar Smit ', 'Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit ', 89999),
(21, 'images/1 (1).png', 'Samsung Pro', 'Lorem Ipsum Dolar Smit ', 'Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit Lorem Ipsum Dolar Smit ', 49999);

-- --------------------------------------------------------

--
-- Table structure for table `sign_up`
--

CREATE TABLE `sign_up` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sign_up`
--

INSERT INTO `sign_up` (`id`, `username`, `email`, `password`, `mobile`) VALUES
(9, 'abdullah', 'a@gmail.com', 'admin123', '03204470756'),
(10, 'Abdullah', 'abd@gmail.com', 'asad', '01234567');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `order_reciever`
--
ALTER TABLE `order_reciever`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sign_up`
--
ALTER TABLE `sign_up`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `order_reciever`
--
ALTER TABLE `order_reciever`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `sign_up`
--
ALTER TABLE `sign_up`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
