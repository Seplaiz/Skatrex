-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2023 at 01:26 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skatrex`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(128) NOT NULL,
  `category_description` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_description`) VALUES
(1, 'Calçado', 'Calçados para estilo'),
(2, 'Acessórios', 'Acessórios para estilo');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `shipping_address` varchar(256) NOT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prod_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `prod_name` varchar(128) NOT NULL,
  `prod_price` float NOT NULL,
  `img` varchar(255) NOT NULL,
  `stock` int(64) NOT NULL,
  `create_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `category_id`, `prod_name`, `prod_price`, `img`, `stock`, `create_date`) VALUES
(1, 1, 'DC SHOES MANUAL LE ELASTIC LACE SHOES KIDS', 49.99, 'DcShoesManualPreto.JPG', 5, '2023-01-07'),
(2, 1, 'DC SHOES CRISIS 2 SKATE SHOES', 79.99, 'DcShoesCrisisPreto.JPG', 10, '2023-01-07'),
(3, 1, 'DC SHOES PURE KIDS', 49.99, 'DcShoesPure.JPG', 10, '2023-01-07'),
(4, 1, 'VANS BERLE PRO', 94.99, 'VansBerleProPreto.JPG', 5, '2023-01-07'),
(5, 1, 'CARIUMA THE BERRICS', 119.99, 'CariumaTheBerrics.JPG', 10, '2023-01-07'),
(6, 2, 'VANS BY CLASSIC PATCH HAT', 19.99, 'VansClassicHat.JPG', 7, '2023-01-07'),
(7, 2, 'VISSLA DAGGER HAT', 34.99, 'VisslaDaggerHat.JPG', 2, '2023-01-07'),
(8, 2, 'DC UPROAR GOLFER CLIPBACK HAT', 29.99, 'DcUproarGolferHat.JPG', 6, '2023-01-07'),
(9, 2, 'CARHARTT PLAINS BUCKET HAT', 49.99, 'CarharttBucketHat.JPG', 2, '2023-01-07'),
(10, 2, 'CARHARTT JAKE SHOULDER POUCH BAG', 39.99, 'CarharttJakePouchBag.JPG', 8, '2023-01-07'),
(11, 2, 'MERGE4 PINK CAMO', 14.99, 'Merger4PinkCamo.JPG', 13, '2023-01-07'),
(12, 2, 'MERGE4 HAVEN TALL BLUE', 14.99, 'Merge4HavenTallBlue.JPG', 8, '2023-01-07'),
(13, 2, 'MERGE4 CHECK YELLOW / BLACK', 14.99, 'Merge4CheckYellowBlack.JPG', 4, '2023-01-07');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `first_name` varchar(64) NOT NULL,
  `last_name` varchar(64) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `UserOrder` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_orderid` (`order_id`),
  ADD KEY `order_details_prodid` (`prod_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_categories_categoryid` (`category_id`),
  ADD KEY `product_categories_prodid` (`prod_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `Emails` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `UserOrder` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_orderid` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_details_prodid` FOREIGN KEY (`prod_id`) REFERENCES `product` (`prod_id`);

--
-- Constraints for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD CONSTRAINT `product_categories_categoryid` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`),
  ADD CONSTRAINT `product_categories_prodid` FOREIGN KEY (`prod_id`) REFERENCES `product` (`prod_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
