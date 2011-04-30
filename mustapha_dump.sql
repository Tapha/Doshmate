-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 30, 2011 at 09:17 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mustapha`
--

-- --------------------------------------------------------

--
-- Table structure for table `bids`
--

CREATE TABLE IF NOT EXISTS `bids` (
  `bid_id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `bid_time` datetime NOT NULL,
  `current_bid` float(11,2) NOT NULL,
  PRIMARY KEY (`bid_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `bids`
--

INSERT INTO `bids` (`bid_id`, `users_id`, `product_id`, `bid_time`, `current_bid`) VALUES
(1, 3, 1, '2011-04-30 21:01:51', 50.01),
(2, 3, 1, '2011-04-30 21:03:07', 50.02),
(3, 3, 1, '2011-04-30 21:05:51', 50.03),
(4, 3, 1, '2011-04-30 21:07:57', 50.04),
(5, 3, 1, '2011-04-30 21:09:12', 50.05),
(6, 3, 1, '2011-04-30 21:09:37', 50.06),
(7, 3, 1, '2011-04-30 21:09:39', 50.07),
(8, 3, 1, '2011-04-30 21:09:42', 50.08),
(9, 3, 1, '2011-04-30 21:12:01', 50.09),
(10, 3, 1, '2011-04-30 21:13:54', 50.10),
(11, 3, 1, '2011-04-30 21:13:56', 50.11),
(12, 3, 1, '2011-04-30 21:13:58', 50.12),
(13, 3, 1, '2011-04-30 21:14:00', 50.13),
(14, 3, 1, '2011-04-30 21:14:44', 50.14);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) NOT NULL,
  `product_img` varchar(255) NOT NULL,
  `rrp` varchar(255) NOT NULL,
  `selling_price` float(11,2) NOT NULL,
  `winning_user` varchar(255) NOT NULL,
  `winning_user_id` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `ends_at` datetime NOT NULL,
  `updated_at` varchar(255) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_img`, `rrp`, `selling_price`, `winning_user`, `winning_user_id`, `created_at`, `ends_at`, `updated_at`) VALUES
(1, 'Apple iPod Touch 8 GB', 'images/apple-ipod-touch.jpg', '189.99', 50.00, 'Tapha', 1, '0000-00-00', '2011-05-01 00:54:15', '2011-4-30 14:59:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `users_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`users_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'tapha', 'tapha@live.co.uk', '14c7c25da65206df0da6f8209775fc08', '0000-00-00'),
(2, 'njegos', '', 'd41d8cd98f00b204e9800998ecf8427e', '0000-00-00'),
(3, 'njegos', 'vukadinsu@gmail.com', 'af15d5fdacd5fdfea300e88a8e253e82', '0000-00-00');
