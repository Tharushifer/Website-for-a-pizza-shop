-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 11, 2024 at 05:48 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `weareawesome`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

DROP TABLE IF EXISTS `cart_details`;
CREATE TABLE IF NOT EXISTS `cart_details` (
  `user_name` varchar(200) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `menu_id` int(40) NOT NULL,
  `menu_name` varchar(40) NOT NULL,
  `menu_price` decimal(10,0) NOT NULL,
  `menu_quantity` int(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_details`
--

INSERT INTO `cart_details` (`user_name`, `user_address`, `menu_id`, `menu_name`, `menu_price`, `menu_quantity`) VALUES
('Guest', 'N/A', 2, 'Modern Magic Pizza', '1950', 1),
('Guest', 'N/A', 1, 'Traditional Italian Pizza', '2150', 1),
('Guest', 'N/A', 2, 'Modern Magic Pizza', '1950', 1),
('Guest', 'N/A', 1, 'Traditional Italian Pizza', '2150', 1),
('Guest', 'N/A', 2, 'Modern Magic Pizza', '1950', 1),
('Guest', 'N/A', 4, 'BBQ Chicken Pizza', '2850', 1),
('Guest', 'N/A', 3, 'Veggie Pizza', '1650', 1),
('Guest', 'N/A', 1, 'Traditional Italian Pizza', '2150', 1),
('Guest', 'N/A', 2, 'Modern Magic Pizza', '1950', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `description`, `image`, `price`) VALUES
(1, 'Traditional Italian Pizza', 'tip.jpg', 2150),
(2, 'Modern Magic Pizza', 'mmp.jpg', 1950),
(3, 'Veggie Pizza', 'vp.jpg', 1650),
(4, 'BBQ Chicken Pizza', 'bbq.jpg', 2850);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `menu_id` int(200) NOT NULL,
  `user_id` int(200) NOT NULL,
  `order_date` date NOT NULL,
  `total_amount` int(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(22) NOT NULL AUTO_INCREMENT,
  `fname` varchar(40) NOT NULL,
  `lname` varchar(40) NOT NULL,
  `contactno` varchar(22) NOT NULL,
  `email` varchar(40) NOT NULL,
  `address` varchar(60) NOT NULL,
  `pword` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `contactno`, `email`, `address`, `pword`) VALUES
(1, 'tharushi', 'fernando', '0766981998', 'asdfnnm@gmail.com', 'asdfgdfgh', '12345'),
(2, 'minushi', 'perera', '0766981997', 'asdfnnm@gmail.com', 'sdfghjkl', 'abcd'),
(6, 'tharushi', 'fernando', '0766981998', 'asdfnnm@gmail.com', 'asdfgdfgh', '12345'),
(7, 'kasun', 'perera', '0766981996', 'kasun@gmail.com', 'asdnm vyn', '123456'),
(8, 'danush', 'peiris', '0766981995', 'danushp@gmail.com', 'ratnapura', 'D12345');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
