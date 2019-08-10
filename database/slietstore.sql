-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2018 at 06:53 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `slietstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(10) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_email`, `admin_pass`) VALUES
(1, 'sliet584@gmail.com', 'ajay@1999');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'Dell'),
(2, 'HP'),
(3, 'SONY'),
(7, 'S CHNAD'),
(8, 'MI'),
(9, 'APPLE'),
(10, 'SAMSUNG'),
(11, 'LG'),
(12, 'intex'),
(13, 'CASIO');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` int(255) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(2, 'Camera'),
(3, 'LAPTOPS'),
(4, 'HOME'),
(7, 'MOBILES'),
(11, 'BOOKS'),
(13, 'Electronics');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_pass` varchar(100) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` varchar(100) NOT NULL,
  `customer_address` varchar(1000) NOT NULL,
  `customer_pin` int(50) NOT NULL,
  `customer_ip` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_pin`, `customer_ip`) VALUES
(2, 'ashish', 'ak123tiger2gmail.com', '1234567qw', 'India', 'ludhiana', '8556033412', 'bh-06', 148106, 0),
(3, 'AJAY KUMAR', 'sliet584@gmail.com', 'ajay', 'India', 'sangrur', '09097403818', 'sliet longowal', 148106, 0),
(4, 'avinash', 'ajaykumarsliet584@gmail.com', 'avinash', 'India', 'sangrur', '9525415014', 'sliet longowal', 148106, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customers_orders`
--

CREATE TABLE `customers_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `total_products` int(100) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers_orders`
--

INSERT INTO `customers_orders` (`order_id`, `customer_id`, `due_amount`, `invoice_no`, `total_products`, `order_date`, `order_status`) VALUES
(27, 3, 550, 604063570, 1, '2018-03-15 10:56:05', 'cancel_order'),
(28, 3, 2000, 355413270, 1, '2018-03-15 11:25:17', 'cancel_order'),
(29, 3, 360, 1442662243, 1, '2018-03-15 11:25:22', 'cancel_order'),
(30, 3, 500, 855313278, 1, '2018-03-15 11:36:56', 'processing'),
(31, 3, 550, 662542899, 1, '2018-03-15 13:52:04', 'processing'),
(32, 3, 895, 1068823393, 2, '2018-03-15 13:52:57', 'processing');

-- --------------------------------------------------------

--
-- Table structure for table `pending_orders`
--

CREATE TABLE `pending_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `qty` int(100) NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pending_orders`
--

INSERT INTO `pending_orders` (`order_id`, `customer_id`, `invoice_no`, `product_id`, `qty`, `order_status`) VALUES
(22, 3, 855313278, 15, 1, 'processing'),
(23, 3, 662542899, 12, 1, 'processing'),
(24, 3, 1068823393, 21, 1, 'processing');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `brand_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `product_title` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_price` varchar(10) NOT NULL,
  `product_desc` varchar(1000) NOT NULL,
  `product_keywords` varchar(100) NOT NULL,
  `product_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `cat_id`, `brand_id`, `date`, `product_title`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_desc`, `product_keywords`, `product_status`) VALUES
(12, 2, 3, '2018-03-17 05:34:02', 'CAMERA', 'download (5).jpg', '', '', '5550', '<p>httyjjg</p>', 'camera', 'on'),
(14, 4, 10, '2018-03-17 05:34:53', 'refrigetor', '20-small_800x.gif', '', '', '6000', ' this is a good products', 'samsung friged', 'on'),
(15, 2, 10, '2018-03-17 05:35:32', 'CCTV', 'samsung-wired-security-cameras-sep-1003rw-64_1000.jpg', '', '', '2000', ' nice camera', 'samsung cctv', 'on'),
(17, 9, 10, '2018-03-03 18:40:05', 'washing machine', 'samsung-quick-wash-product-photos-1.jpg', '', '', '2000', ' uyfouf', 'samsung washing  ', 'on'),
(18, 2, 11, '2018-03-17 05:41:49', 'CAMERA', 'images (3).jpg', '', '', '6000', ' this is a lg camera', '', 'on'),
(20, 7, 8, '2018-03-14 07:42:43', 'power bank', 'images (1).jpg', 'download.jpg', 'download (7).jpg', '10000/-', ' qwdqwd', '', 'on'),
(21, 2, 3, '2018-03-18 05:44:39', 'CAMERA', 'download (5).jpg', '', '', '3450', ' qef', 'est', 'on'),
(22, 11, 7, '2018-03-14 07:45:53', 'books', 'download (6).jpg', 'images (6).jpg', 'images (7).jpg', '345', 'Q AD', '', 'on');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customers_orders`
--
ALTER TABLE `customers_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `pending_orders`
--
ALTER TABLE `pending_orders`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customers_orders`
--
ALTER TABLE `customers_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `pending_orders`
--
ALTER TABLE `pending_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
