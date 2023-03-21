-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 12, 2020 at 10:12 AM
-- Server version: 5.7.21
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bubinod`
--

-- --------------------------------------------------------

--
-- Table structure for table `admintbl`
--

DROP TABLE IF EXISTS `admintbl`;
CREATE TABLE IF NOT EXISTS `admintbl` (
  `adm_id` int(11) NOT NULL AUTO_INCREMENT,
  `adm_username` varchar(250) NOT NULL,
  `adm_password` varchar(250) NOT NULL,
  `adm_fullname` varchar(250) NOT NULL,
  `adm_img` varchar(250) NOT NULL,
  `adm_status` varchar(250) NOT NULL DEFAULT '1',
  PRIMARY KEY (`adm_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admintbl`
--

INSERT INTO `admintbl` (`adm_id`, `adm_username`, `adm_password`, `adm_fullname`, `adm_img`, `adm_status`) VALUES
(1, 'admin', 'admin', 'Bubinod Kidz Palace', '1504660167.jpg,', '1');

-- --------------------------------------------------------

--
-- Table structure for table `adverts`
--

DROP TABLE IF EXISTS `adverts`;
CREATE TABLE IF NOT EXISTS `adverts` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `advert_name` varchar(300) NOT NULL,
  `advert_image` varchar(300) NOT NULL,
  `a_time` varchar(300) NOT NULL,
  `a_status` varchar(300) NOT NULL DEFAULT '0',
  PRIMARY KEY (`a_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adverts`
--

INSERT INTO `adverts` (`a_id`, `advert_name`, `advert_image`, `a_time`, `a_status`) VALUES
(1, 'Aroma Banner', '1594120762.png,', '2020-07-07 11:18:35', '1'),
(2, 'Testing Banner 11', '1594120818.png,', '2020-07-07 11:19:26', '1'),
(3, 'EJ Banner 23', '1594120838.png,', '2020-07-07 11:20:22', '1');

-- --------------------------------------------------------

--
-- Table structure for table `bottomadstbl`
--

DROP TABLE IF EXISTS `bottomadstbl`;
CREATE TABLE IF NOT EXISTS `bottomadstbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) NOT NULL,
  `image` varchar(300) NOT NULL,
  `time` varchar(300) NOT NULL,
  `status` varchar(300) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bottomadstbl`
--

INSERT INTO `bottomadstbl` (`id`, `name`, `image`, `time`, `status`) VALUES
(1, 'Deal offer Ads', '1604520024.jpg,', '1604519958', '1');

-- --------------------------------------------------------

--
-- Table structure for table `bubinodsales`
--

DROP TABLE IF EXISTS `bubinodsales`;
CREATE TABLE IF NOT EXISTS `bubinodsales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(300) NOT NULL,
  `lastname` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `phone` varchar(300) NOT NULL,
  `gender` varchar(300) NOT NULL,
  `category` varchar(300) NOT NULL,
  `address` varchar(300) NOT NULL,
  `city` varchar(300) NOT NULL,
  `bustop` varchar(300) NOT NULL,
  `state` varchar(300) NOT NULL,
  `country` varchar(300) NOT NULL,
  `description` varchar(3000) NOT NULL,
  `time` varchar(300) NOT NULL,
  `status` varchar(300) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bubinodsales`
--

INSERT INTO `bubinodsales` (`id`, `firstname`, `lastname`, `email`, `phone`, `gender`, `category`, `address`, `city`, `bustop`, `state`, `country`, `description`, `time`, `status`) VALUES
(1, 'Blessing', 'Doe', 'blessingotuada@gmail.com', '09062333754', 'Female', 'Clothe and Shoe', '345 Lexis Avenue Crystal lake', 'Lekki', 'Crescent Junction', 'Lagos', 'Nigeria', 'Get back to me as soon as possible', '2020-11-05 22:21:52', '0');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `model` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `quantity` varchar(250) NOT NULL,
  `unit_price` varchar(250) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `catadstbl`
--

DROP TABLE IF EXISTS `catadstbl`;
CREATE TABLE IF NOT EXISTS `catadstbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(300) NOT NULL,
  `name` varchar(300) NOT NULL,
  `image` varchar(300) NOT NULL,
  `time` varchar(300) NOT NULL,
  `status` varchar(300) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catadstbl`
--

INSERT INTO `catadstbl` (`id`, `category`, `name`, `image`, `time`, `status`) VALUES
(1, 'topselling', 'Top Selling Ads', '1604497164.jpg,', '2020-11-04 13:39:25', '1'),
(2, 'sponsored', 'Sponsored Ads 1', '1604497198.jpg,', '2020-11-04 13:39:59', '1'),
(3, 'dealoffer', 'Deal offer Ads', '1604497233.jpg,', '2020-11-04 13:40:34', '1');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(250) NOT NULL,
  `cat_image` varchar(300) DEFAULT NULL,
  `cat_slug` varchar(250) NOT NULL,
  `cat_status` varchar(250) NOT NULL DEFAULT '1',
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_image`, `cat_slug`, `cat_status`) VALUES
(1, 'Clothings', '1603982381.jpg,', 'clothings', '1'),
(2, 'Footwares', '1603982231.jpg,', 'footwares', '1'),
(3, 'Bags', NULL, 'bags', '1'),
(4, 'Baby Items', NULL, 'babyitems', '1'),
(5, 'Gift Items', NULL, 'gidtitems', '1'),
(6, 'Others', '1603983144.jpg,', 'others', '1'),
(7, 'Electronics', '1603982231.jpg,', 'electronics', '1'),
(8, 'Technology', '1603982381.jpg,', 'technology', '1');

-- --------------------------------------------------------

--
-- Table structure for table `custorders`
--

DROP TABLE IF EXISTS `custorders`;
CREATE TABLE IF NOT EXISTS `custorders` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `pr_owner` varchar(300) NOT NULL,
  `customer_id` varchar(300) NOT NULL,
  `invoiceID` varchar(300) NOT NULL,
  `agentID` varchar(300) DEFAULT NULL,
  `firstname` varchar(300) NOT NULL,
  `lastname` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `phone` varchar(300) NOT NULL,
  `gender` varchar(300) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `bustop` varchar(1000) NOT NULL,
  `country` varchar(300) NOT NULL,
  `state` varchar(300) NOT NULL,
  `city` varchar(300) NOT NULL,
  `c_comment` varchar(3000) DEFAULT NULL,
  `total_price` varchar(300) NOT NULL,
  `prod_total` varchar(300) NOT NULL,
  `paym` varchar(300) NOT NULL,
  `created` varchar(300) NOT NULL,
  `modified` varchar(300) NOT NULL,
  `bankpayref` varchar(300) DEFAULT '0',
  `onlinepayref` varchar(300) DEFAULT '0',
  `status` varchar(300) NOT NULL DEFAULT '0',
  PRIMARY KEY (`c_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `custorders`
--

INSERT INTO `custorders` (`c_id`, `pr_owner`, `customer_id`, `invoiceID`, `agentID`, `firstname`, `lastname`, `email`, `phone`, `gender`, `address`, `bustop`, `country`, `state`, `city`, `c_comment`, `total_price`, `prod_total`, `paym`, `created`, `modified`, `bankpayref`, `onlinepayref`, `status`) VALUES
(1, 'Bubinod', '1', '626037', NULL, 'Blessing', 'Otuada', 'blessingotuada@gmail.com', '08062333782', 'Male', '64 Crescent Avenue Benin', 'Fountain Hill Junctions', 'Nigeria', 'Edo ', 'Benin City', 'Keeping it good', '12945', '10900', 'bank', '2020-11-03 19:57:59', '2020-11-03', '0', NULL, '10'),
(2, 'Bubinod', '1', '819609', NULL, 'Blessing', 'Otuada', 'blessingotuada@gmail.com', '08062333782', 'Male', '64 Crescent Avenue Benin', 'Fountain Hill Junctions', 'Nigeria', 'Edo ', 'Benin City', 'I need quick and efficient delivery', '2760', '1200', 'creditcard', '2020-11-03 20:36:28', '2020-11-03', '0', NULL, '0'),
(3, 'Bubinod', '1', '848393', NULL, 'Blessing', 'Otuada', 'blessingotuada@gmail.com', '08062333782', 'Male', '64 Crescent Avenue Benin', 'Fountain Hill Junctions', 'Nigeria', 'Edo ', 'Benin City', 'hello p', '2760', '1200', 'bank', '2020-11-03 20:40:42', '2020-11-03', '0', NULL, '15'),
(4, 'Bubinod', '1', '664899', NULL, 'Blessing', 'Otuada', 'blessingotuada@gmail.com', '08062333782', 'Male', '64 Crescent Avenue Benin', 'Fountain Hill Junctions', 'Nigeria', 'Edo ', 'Benin City', 'Thank you', '4020', '2400', 'bank', '2020-11-10 12:15:02', '2020-11-10', '0', NULL, '10');

-- --------------------------------------------------------

--
-- Table structure for table `ewallet`
--

DROP TABLE IF EXISTS `ewallet`;
CREATE TABLE IF NOT EXISTS `ewallet` (
  `wal_id` int(11) NOT NULL AUTO_INCREMENT,
  `eballance` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`wal_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ewallet`
--

INSERT INTO `ewallet` (`wal_id`, `eballance`, `username`, `user_id`) VALUES
(1, 100, 'blessingotuada@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `externaltbl`
--

DROP TABLE IF EXISTS `externaltbl`;
CREATE TABLE IF NOT EXISTS `externaltbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) NOT NULL,
  `image` varchar(300) NOT NULL,
  `url` varchar(300) NOT NULL,
  `time` varchar(300) NOT NULL,
  `status` varchar(300) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `externaltbl`
--

INSERT INTO `externaltbl` (`id`, `name`, `image`, `url`, `time`, `status`) VALUES
(1, 'Promotiona Review', '1604502231.jpg,', 'https://ippconline.org/V2/index.php?r=site/login', '2020-11-04 15:03:52', '1'),
(2, 'Promotiona Review Product', '1604502364.jpg,', 'https://www.bslonline360.com', '2020-11-04 15:06:05', '1');

-- --------------------------------------------------------

--
-- Table structure for table `loginhistory`
--

DROP TABLE IF EXISTS `loginhistory`;
CREATE TABLE IF NOT EXISTS `loginhistory` (
  `l_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(300) NOT NULL,
  `country` varchar(300) NOT NULL,
  `city` varchar(300) NOT NULL,
  `region` varchar(300) NOT NULL,
  `ipaddress` varchar(300) NOT NULL,
  `countrycode` varchar(300) NOT NULL,
  `latitude` varchar(300) NOT NULL,
  `longitude` varchar(300) NOT NULL,
  `timezone` varchar(300) NOT NULL,
  `l_status` varchar(300) NOT NULL DEFAULT '1',
  PRIMARY KEY (`l_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loginhistory`
--

INSERT INTO `loginhistory` (`l_id`, `email`, `country`, `city`, `region`, `ipaddress`, `countrycode`, `latitude`, `longitude`, `timezone`, `l_status`) VALUES
(1, 'blessingotuada@gmail.com', '-', '-', '-', '127.0.0.1', '-', '0', '0', '-', '1'),
(2, 'blessingotuada@gmail.com', '-', '-', '-', '127.0.0.1', '-', '0', '0', '-', '1'),
(3, 'blessingotuada@gmail.com', '', '', '', 'IP_V4_OR_IPV6_ADDRESS', '', '0', '0', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `memberstbl`
--

DROP TABLE IF EXISTS `memberstbl`;
CREATE TABLE IF NOT EXISTS `memberstbl` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `memcode` varchar(300) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `temp_pass` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `gender` varchar(250) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `city` varchar(250) DEFAULT NULL,
  `state` varchar(250) DEFAULT NULL,
  `bustop` varchar(250) DEFAULT NULL,
  `country` varchar(250) DEFAULT NULL,
  `sec_qst` varchar(300) DEFAULT NULL,
  `sec_ans` varchar(300) DEFAULT NULL,
  `payment_mtd` varchar(250) DEFAULT NULL,
  `last_update` varchar(250) DEFAULT NULL,
  `newsletter` varchar(300) DEFAULT NULL,
  `time` varchar(250) NOT NULL,
  `status` varchar(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `memberstbl`
--

INSERT INTO `memberstbl` (`user_id`, `memcode`, `firstname`, `lastname`, `email`, `password`, `temp_pass`, `phone`, `gender`, `address`, `city`, `state`, `bustop`, `country`, `sec_qst`, `sec_ans`, `payment_mtd`, `last_update`, `newsletter`, `time`, `status`) VALUES
(1, 'b634be636047851', 'Blessing', 'Otuada', 'blessingotuada@gmail.com', 'ae2b1fca515949e5d54fb22b8ed95575', 'testing', '08062333782', 'Male', '64 Crescent Avenue Benin', 'Benin City', 'Edo ', 'Fountain Hill Junctions', 'Nigeria', 'WhatÂ isÂ yourÂ motherÂ maidenÂ name?', 'Alice', NULL, NULL, '', '2020-11-01 22:23:32', '1');

-- --------------------------------------------------------

--
-- Table structure for table `models`
--

DROP TABLE IF EXISTS `models`;
CREATE TABLE IF NOT EXISTS `models` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` int(11) NOT NULL,
  `model` varchar(250) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `models`
--

INSERT INTO `models` (`id`, `category`, `model`, `status`) VALUES
(1, 1, 'smartphones', 1),
(2, 1, 'iosphones', 1),
(3, 1, 'androidphones', 1),
(4, 2, 'tablets_accessories', 1);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

DROP TABLE IF EXISTS `newsletter`;
CREATE TABLE IF NOT EXISTS `newsletter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(300) NOT NULL,
  `status` varchar(300) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`, `status`) VALUES
(1, 'blessingotuada@gmail.com', '1'),
(2, 'johndoe@gmail.com', '1');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `o_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` varchar(300) NOT NULL,
  `total_price` varchar(300) NOT NULL,
  `created` varchar(300) NOT NULL,
  `modified` varchar(300) NOT NULL,
  `status` varchar(300) NOT NULL,
  PRIMARY KEY (`o_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `ord_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoiceID` varchar(300) NOT NULL,
  `agentID` varchar(300) DEFAULT NULL,
  `product_id` varchar(300) NOT NULL,
  `p_name` varchar(300) NOT NULL,
  `category` varchar(300) NOT NULL,
  `pr_owner` varchar(300) NOT NULL,
  `price` varchar(300) NOT NULL,
  `quantity` varchar(300) NOT NULL,
  `total_price` varchar(300) DEFAULT NULL,
  `created` varchar(300) DEFAULT NULL,
  `order_time` varchar(300) NOT NULL,
  `payout` varchar(300) DEFAULT '0',
  `status` varchar(300) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ord_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`ord_id`, `invoiceID`, `agentID`, `product_id`, `p_name`, `category`, `pr_owner`, `price`, `quantity`, `total_price`, `created`, `order_time`, `payout`, `status`) VALUES
(1, '626037', NULL, '4', 'Fancy Finery Alisa Sleeve', '2', 'Bubinod', '8500', '1', '12945', '2020-11-03', '2020-11-03 19:57:59', '0', '10'),
(2, '626037', NULL, '2', 'Big Finery Alisa Sleeve', '1', 'Bubinod', '1200', '2', '12945', '2020-11-03', '2020-11-03 19:57:59', '0', '10'),
(3, '819609', NULL, '2', 'Big Finery Alisa Sleeve', '1', 'Bubinod', '1200', '1', '2760', '2020-11-03', '2020-11-03 20:36:28', '0', '0'),
(4, '848393', NULL, '2', 'Big Finery Alisa Sleeve', '1', 'Bubinod', '1200', '1', '2760', '2020-11-03', '2020-11-03 20:40:42', '0', '15'),
(5, '664899', NULL, '2', 'Big Finery Alisa Sleeve', '1', 'Bubinod', '1200', '2', '4020', '2020-11-10', '2020-11-10 12:15:02', '0', '10');

-- --------------------------------------------------------

--
-- Table structure for table `payreciept`
--

DROP TABLE IF EXISTS `payreciept`;
CREATE TABLE IF NOT EXISTS `payreciept` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ordID` varchar(300) NOT NULL,
  `paym` varchar(300) NOT NULL,
  `userID` varchar(300) NOT NULL,
  `image` varchar(300) NOT NULL,
  `time` varchar(300) NOT NULL,
  `status` varchar(300) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payreciept`
--

INSERT INTO `payreciept` (`id`, `ordID`, `paym`, `userID`, `image`, `time`, `status`) VALUES
(1, '#848393', 'Bank', '1', '1604684976.jpg,', '2020-11-06 17:49:37', '0');

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

DROP TABLE IF EXISTS `plans`;
CREATE TABLE IF NOT EXISTS `plans` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `planname` varchar(100) NOT NULL,
  `planamt` varchar(100) NOT NULL,
  `planpayout` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `planname`, `planamt`, `planpayout`) VALUES
(1, 'Basic', '50000', 40);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pr_category` varchar(300) NOT NULL,
  `productcode` varchar(300) DEFAULT NULL,
  `new_price` varchar(250) NOT NULL,
  `old_price` varchar(250) DEFAULT NULL,
  `name` varchar(250) NOT NULL,
  `description` varchar(8000) NOT NULL,
  `pr_img` varchar(250) NOT NULL,
  `colors` varchar(250) DEFAULT NULL,
  `pr_owner` varchar(300) DEFAULT NULL,
  `stock_status` varchar(250) NOT NULL DEFAULT '1',
  `last_update` varchar(250) DEFAULT NULL,
  `topselling` varchar(300) DEFAULT NULL,
  `sponsored` varchar(300) DEFAULT NULL,
  `dealoffer` varchar(300) DEFAULT NULL,
  `time` varchar(250) DEFAULT NULL,
  `status` varchar(300) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `pr_category`, `productcode`, `new_price`, `old_price`, `name`, `description`, `pr_img`, `colors`, `pr_owner`, `stock_status`, `last_update`, `topselling`, `sponsored`, `dealoffer`, `time`, `status`) VALUES
(1, '1', '2020-10-29 20:57:38', '3500', '4000', 'Fancy Finery Alisa Sleeve', 'hello', '1604060891.jpg,1604060892.jpg,1604060893.jpg,1604060894.jpg,', 'Red, Blue, White, Black, Grey', 'Bubinod', '1', NULL, '1', NULL, NULL, '2020-10-29 20:57:38', '1'),
(2, '1', '2020-10-29 21:02:28', '1200', '2000', 'Big Finery Alisa Sleeve', 'The 30-inch Apple Cinema HD Display delivers an amazing 2560 x 1600 pixel resolution. Designed specifically for the creative professional, this display provides more space for easier access to all the tools and palettes needed to edit, format and composite your work. Combine this display with a Mac Pro, MacBook Pro, or PowerMac G5 and there\'s no limit to what you can achieve.\r\n\r\nThe Cinema HD features an active-matrix liquid crystal display that produces flicker-free images that deliver twice the brightness, twice the sharpness and twice the contrast ratio of a typical CRT display. Unlike other flat panels, it\'s designed with a pure digital interface to deliver distortion-free images that never need adjusting. With over 4 million digital pixels, the display is uniquely suited for scientific and technical applications such as visualizing molecular structures or analyzing geological data.\r\n<br/>\r\nOffering accurate, brilliant color performance, the Cinema HD delivers up to 16.7 million colors across a wide gamut allowing you to see subtle nuances between colors from soft pastels to rich jewel tones. A wide viewing angle ensures uniform color from edge to edge. Apple\'s ColorSync technology allows you to create custom profiles to maintain consistent color onscreen and in print. The result: You can confidently use this display in all your color-critical applications. ', '1604005344.jpg,1604005345.jpg,1604005346.jpg,1604005347.jpg,', 'Red, Blue, White, Black, Grey', 'Bubinod', '0', NULL, '1', NULL, NULL, '2020-10-29 21:02:28', '1'),
(3, '1', 'ede0a0c1f7', '8500', '10000', 'Great Fancy Finery Alisa Sleeve', 'The 30-inch Apple Cinema HD Display delivers an amazing 2560 x 1600 pixel resolution. Designed specifically for the creative professional, this display provides more space for easier access to all the tools and palettes needed to edit, format and composite your work. Combine this display with a Mac Pro, MacBook Pro, or PowerMac G5 and there\'s no limit to what you can achieve.\r\n<br/>\r\nThe Cinema HD features an active-matrix liquid crystal display that produces flicker-free images that deliver twice the brightness, twice the sharpness and twice the contrast ratio of a typical CRT display. Unlike other flat panels, it\'s designed with a pure digital interface to deliver distortion-free images that never need adjusting. With over 4 million digital pixels, the display is uniquely suited for scientific and technical applications such as visualizing molecular structures or analyzing geological data.\r\n<br/>\r\nOffering accurate, brilliant color performance, the Cinema HD delivers up to 16.7 million colors across a wide gamut allowing you to see subtle nuances between colors from soft pastels to rich jewel tones. A wide viewing angle ensures uniform color from edge to edge. Apple\'s ColorSync technology allows you to create custom profiles to maintain consistent color onscreen and in print. The result: You can confidently use this display in all your color-critical applications. ', '1604005799.jpg,1604005800.jpg,1604005801.jpg,1604005802.jpg,', 'Red, Blue, White, Black, Grey', 'Bubinod', '1', NULL, NULL, '1', NULL, '2020-10-29 21:10:03', '1'),
(4, '2', '0a13feb962', '8500', '4000', 'Fancy Finery Alisa Sleeve', 'The 30-inch Apple Cinema HD Display delivers an amazing 2560 x 1600 pixel resolution. Designed specifically for the creative professional, this display provides more space for easier access to all the tools and palettes needed to edit, format and composite your work. Combine this display with a Mac Pro, MacBook Pro, or PowerMac G5 and there\'s no limit to what you can achieve.\r\n\r\nThe Cinema HD features an active-matrix liquid crystal display that produces flicker-free images that deliver twice the brightness, twice the sharpness and twice the contrast ratio of a typical CRT display. Unlike other flat panels, it\'s designed with a pure digital interface to deliver distortion-free images that never need adjusting. With over 4 million digital pixels, the display is uniquely suited for scientific and technical applications such as visualizing molecular structures or analyzing geological data.\r\n\r\nOffering accurate, brilliant color performance, the Cinema HD delivers up to 16.7 million colors across a wide gamut allowing you to see subtle nuances between colors from soft pastels to rich jewel tones. A wide viewing angle ensures uniform color from edge to edge. Apple\'s ColorSync technology allows you to create custom profiles to maintain consistent color onscreen and in print. The result: You can confidently use this display in all your color-critical applications. ', '1604060769.jpg,1604060770.jpg,1604060771.jpg,1604060772.jpg,', 'Red, Blue, White, Black, Grey', 'Bubinod', '1', NULL, NULL, '1', NULL, '2020-10-30 12:26:13', '1'),
(5, '2', 'e7605204d8', '53000', '54000', 'HD Television 34inch', 'The 30-inch Apple Cinema HD Display delivers an amazing 2560 x 1600 pixel resolution. Designed specifically for the creative professional, this display provides more space for easier access to all the tools and palettes needed to edit, format and composite your work. Combine this display with a Mac Pro, MacBook Pro, or PowerMac G5 and there\'s no limit to what you can achieve.\r\n\r\nThe Cinema HD features an active-matrix liquid crystal display that produces flicker-free images that deliver twice the brightness, twice the sharpness and twice the contrast ratio of a typical CRT display. Unlike other flat panels, it\'s designed with a pure digital interface to deliver distortion-free images that never need adjusting. With over 4 million digital pixels, the display is uniquely suited for scientific and technical applications such as visualizing molecular structures or analyzing geological data.\r\n\r\n', '1604060891.jpg,1604060892.jpg,1604060893.jpg,1604060894.jpg,', 'Red, Blue, White, Black, Grey', 'Bubinod', '1', NULL, NULL, NULL, '1', '2020-10-30 12:28:15', '1'),
(6, '2', '4bc7212b57', '11000', '12300', 'House stool Furniture', 'The 30-inch Apple Cinema HD Display delivers an amazing 2560 x 1600 pixel resolution. Designed specifically for the creative professional, this display provides more space for easier access to all the tools and palettes needed to edit, format and composite your work. Combine this display with a Mac Pro, MacBook Pro, or PowerMac G5 and there\'s no limit to what you can achieve.\r\n\r\nThe Cinema HD features an active-matrix liquid crystal display that produces flicker-free images that deliver twice the brightness, twice the sharpness and twice the contrast ratio of a typical CRT display. Unlike other flat panels, it\'s designed with a pure digital interface to deliver distortion-free images that never need adjusting. With over 4 million digital pixels, the display is uniquely suited for scientific and technical applications such as visualizing molecular structures or analyzing geological data.\r\n\r\nOffering accurate, brilliant color performance, the Cinema HD delivers up to 16.7 million colors across a wide gamut allowing you to see subtle nuances between colors from soft pastels to rich jewel tones. A wide viewing angle ensures uniform color from edge to edge. Apple\'s ColorSync technology allows you to create custom profiles to maintain consistent color onscreen and in print. The result: You can confidently use this display in all your color-critical applications. ', '1604060992.jpg,1604060993.jpg,1604060994.jpg,1604060995.jpg,', 'Red, Blue, White, Black, Grey', 'Bubinod', '1', NULL, NULL, NULL, '1', '2020-10-30 12:29:56', '1');

-- --------------------------------------------------------

--
-- Table structure for table `recadstbl`
--

DROP TABLE IF EXISTS `recadstbl`;
CREATE TABLE IF NOT EXISTS `recadstbl` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `r_adsname` varchar(300) NOT NULL,
  `r_adsimage` varchar(300) NOT NULL,
  `r_time` varchar(300) NOT NULL,
  `r_status` varchar(300) NOT NULL DEFAULT '1',
  PRIMARY KEY (`r_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recadstbl`
--

INSERT INTO `recadstbl` (`r_id`, `r_adsname`, `r_adsimage`, `r_time`, `r_status`) VALUES
(1, 'Promotion 1', '1604489995.jpg,', '2020-11-04 11:39:57', '1'),
(2, 'Promotion 2', '1604490031.jpg,', '2020-11-04 11:40:32', '1'),
(3, 'Promotion 3', '1604490053.jpg,', '2020-11-04 11:40:54', '1'),
(4, 'Promotion 4', '1604490099.jpg,', '2020-11-04 11:41:40', '1');

-- --------------------------------------------------------

--
-- Table structure for table `returnorder`
--

DROP TABLE IF EXISTS `returnorder`;
CREATE TABLE IF NOT EXISTS `returnorder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(300) NOT NULL,
  `lastname` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `phone` varchar(300) NOT NULL,
  `ordno` varchar(300) NOT NULL,
  `date_ordered` varchar(300) NOT NULL,
  `prname` varchar(300) NOT NULL,
  `prcode` varchar(300) NOT NULL,
  `quantity` varchar(300) NOT NULL,
  `return_reason` varchar(300) NOT NULL,
  `opened` varchar(300) NOT NULL,
  `description` varchar(3000) NOT NULL,
  `time` varchar(300) NOT NULL,
  `status` varchar(300) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `returnorder`
--

INSERT INTO `returnorder` (`id`, `firstname`, `lastname`, `email`, `phone`, `ordno`, `date_ordered`, `prname`, `prcode`, `quantity`, `return_reason`, `opened`, `description`, `time`, `status`) VALUES
(1, 'Blessing', 'Otuada', 'blessingotuada@gmail.com', '09086788788', '7689090', '2020-11-03', 'Children 34 classic shoe', '2wr39440', '1', 'WrongItem', 'No', 'Please review complain', '2020-11-05 23:14:32', '0');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

DROP TABLE IF EXISTS `setting`;
CREATE TABLE IF NOT EXISTS `setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sitepath` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `deliveryfee` varchar(200) NOT NULL,
  `percentage` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `sitepath`, `phone`, `email`, `deliveryfee`, `percentage`) VALUES
(1, 'localhost:', '08062333782', 'support@winamall.com.ng', '1500', 10);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

DROP TABLE IF EXISTS `slider`;
CREATE TABLE IF NOT EXISTS `slider` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `slider_image` varchar(300) NOT NULL,
  `s_title` varchar(300) NOT NULL,
  `s_time` varchar(300) NOT NULL,
  `s_status` varchar(300) NOT NULL DEFAULT '1',
  PRIMARY KEY (`s_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`s_id`, `slider_image`, `s_title`, `s_time`, `s_status`) VALUES
(1, '1604493896.jpg,', 'Slider 1', '1604493869', '1'),
(2, '1604493918.jpg,', 'Slider 2', '1604493905', '1'),
(3, '1604493940.jpg,', 'Slider 3', '1604493928', '1');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

DROP TABLE IF EXISTS `store`;
CREATE TABLE IF NOT EXISTS `store` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `warranty` varchar(250) NOT NULL,
  `delivery` varchar(250) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `testimony`
--

DROP TABLE IF EXISTS `testimony`;
CREATE TABLE IF NOT EXISTS `testimony` (
  `t_id` int(11) NOT NULL AUTO_INCREMENT,
  `userID` varchar(300) NOT NULL,
  `testimony` varchar(3000) NOT NULL,
  `time` varchar(300) NOT NULL,
  `status` varchar(300) NOT NULL DEFAULT '0',
  PRIMARY KEY (`t_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimony`
--

INSERT INTO `testimony` (`t_id`, `userID`, `testimony`, `time`, `status`) VALUES
(1, '1', 'Working with Bubinod is really amazing', '2020-11-03 00:04:50', '1'),
(2, '1', 'Delivery process is just seemingless', '2020-11-03 00:06:08', '1');

-- --------------------------------------------------------

--
-- Table structure for table `top_adstbl`
--

DROP TABLE IF EXISTS `top_adstbl`;
CREATE TABLE IF NOT EXISTS `top_adstbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ads_name` varchar(300) NOT NULL,
  `ads_image` varchar(300) NOT NULL,
  `time` varchar(300) NOT NULL,
  `status` varchar(300) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `top_adstbl`
--

INSERT INTO `top_adstbl` (`id`, `ads_name`, `ads_image`, `time`, `status`) VALUES
(1, 'Top Ads 1', '1605018825.jpg,1605018826.jpg,1605018827.jpg,1605018828.jpg,', '2020-11-10 14:33:49', '0'),
(2, 'Top Ads 2', '1605083247.jpg,1605083248.jpg,1605083249.jpg,1605083250.jpg,', '2020-11-11 08:27:31', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tracktbl`
--

DROP TABLE IF EXISTS `tracktbl`;
CREATE TABLE IF NOT EXISTS `tracktbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orderid` varchar(300) NOT NULL,
  `cur_loc` varchar(300) NOT NULL,
  `cur_date` varchar(300) NOT NULL,
  `time` varchar(300) NOT NULL,
  `description` varchar(3000) NOT NULL,
  `status` varchar(300) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tracktbl`
--

INSERT INTO `tracktbl` (`id`, `orderid`, `cur_loc`, `cur_date`, `time`, `description`, `status`) VALUES
(1, '626037', 'Lagos', '2020-11-09', '11:23', 'Order has been  Verified and Confirm for Shipment', '1'),
(2, '626037', 'Lagos', '2020-11-09', '12:56', 'Order Arrived at Sort Facility Lekki - Lagos', '1');

-- --------------------------------------------------------

--
-- Table structure for table `traffictracker`
--

DROP TABLE IF EXISTS `traffictracker`;
CREATE TABLE IF NOT EXISTS `traffictracker` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `identifyUser` varchar(300) NOT NULL,
  `medium` varchar(300) NOT NULL,
  `source` varchar(300) NOT NULL,
  `content` varchar(300) NOT NULL,
  `campaign` varchar(300) NOT NULL,
  `keyword` varchar(300) NOT NULL,
  `pageViewed` varchar(300) NOT NULL,
  `adwordsKeyword` varchar(300) NOT NULL,
  `adwordsMatchType` varchar(300) NOT NULL,
  `adwordsPosition` varchar(300) NOT NULL,
  `firstVisit` varchar(300) NOT NULL DEFAULT '0000-00-00 00:00:00',
  `previousVisit` varchar(300) NOT NULL DEFAULT '0000-00-00 00:00:00',
  `currentVisit` varchar(300) NOT NULL DEFAULT '0000-00-00 00:00:00',
  `timesVisited` varchar(300) NOT NULL,
  `pagesViewed` varchar(300) NOT NULL,
  `userIp` varchar(300) NOT NULL,
  `timestamp` varchar(300) NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tranx_activity`
--

DROP TABLE IF EXISTS `tranx_activity`;
CREATE TABLE IF NOT EXISTS `tranx_activity` (
  `tranx_id` int(11) NOT NULL AUTO_INCREMENT,
  `tranx_user` varchar(300) NOT NULL,
  `orderInvoice` varchar(300) NOT NULL,
  `tranx_type` varchar(300) NOT NULL,
  `tranx_amt` varchar(300) NOT NULL,
  `tranx_from` varchar(300) NOT NULL,
  `tranx_date` varchar(300) NOT NULL,
  `tranx_status` varchar(300) NOT NULL,
  PRIMARY KEY (`tranx_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tranx_activity`
--

INSERT INTO `tranx_activity` (`tranx_id`, `tranx_user`, `orderInvoice`, `tranx_type`, `tranx_amt`, `tranx_from`, `tranx_date`, `tranx_status`) VALUES
(1, 'johndoe@yahoo.com', 'WLT1593878045', 'Pay for Product #10', '1392.5', '2', '1593878045', '1');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_review`
--

DROP TABLE IF EXISTS `vendor_review`;
CREATE TABLE IF NOT EXISTS `vendor_review` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `vID` varchar(300) NOT NULL,
  `r_name` varchar(300) NOT NULL,
  `r_email` varchar(300) NOT NULL,
  `r_subject` varchar(1000) NOT NULL,
  `r_comment` varchar(300) NOT NULL,
  `r_time` varchar(300) DEFAULT NULL,
  `r_status` varchar(300) NOT NULL DEFAULT '1',
  PRIMARY KEY (`r_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor_review`
--

INSERT INTO `vendor_review` (`r_id`, `vID`, `r_name`, `r_email`, `r_subject`, `r_comment`, `r_time`, `r_status`) VALUES
(1, '4', 'Blessing Otuada', 'blessingjohn@gmail.com', 'Quality Food', 'The last food i order from your shop is totally not as good as you normally deliver to me which is inconsistent with your product', '2020-07-31 16:19:12', '1');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawal`
--

DROP TABLE IF EXISTS `withdrawal`;
CREATE TABLE IF NOT EXISTS `withdrawal` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `amtwithdrw` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  `status` int(11) DEFAULT '0',
  `date` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
