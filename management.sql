-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2015 at 04:06 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `management`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `categoryname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `activate` tinyint(1) NOT NULL,
  `time_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `time_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categoryname`, `activate`, `time_created`, `time_updated`) VALUES
(1, 'Khoa hoc', 0, '2015-08-03 09:20:45', '2015-08-03 09:41:33'),
(2, 'Giao duc', 1, '2015-08-03 09:32:45', '2015-08-03 09:32:51'),
(3, 'Van hoc', 1, '2015-08-03 09:33:02', '2015-08-03 09:33:02'),
(4, 'Truyen tranh', 0, '2015-08-03 09:33:11', '2015-08-03 09:33:11'),
(5, 'Ngon ngu', 1, '2015-08-03 09:33:26', '2015-08-03 09:33:26'),
(7, 'Xa hoi', 1, '2015-08-03 09:40:59', '2015-08-03 09:40:59'),
(8, 'Van hoa', 0, '2015-08-03 09:41:11', '2015-08-03 09:41:11'),
(10, 'Triet hoc', 0, '2015-08-03 10:20:17', '2015-08-03 10:20:17');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `productname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(10) NOT NULL,
  `description` mediumblob NOT NULL,
  `category_id` int(6) NOT NULL,
  `activate` tinyint(1) NOT NULL,
  `time_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `time_updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `productname` (`productname`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=24 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `productname`, `price`, `description`, `category_id`, `activate`, `time_created`, `time_updated`, `image`) VALUES
(13, 'Toan', 1234, 0x667361666173667364666473, 0, 1, '2015-08-03 07:21:04', '2015-08-03 08:46:28', 'Toan'),
(18, 'Tieng Viet', 1212, 0x34323334323334, 0, 0, '2015-08-03 08:37:39', '2015-08-03 08:46:49', 'Tieng Viet'),
(19, 'Vat Ly', 24234, 0x617366646673617366736166, 0, 0, '2015-08-03 08:43:22', '2015-08-03 08:47:09', 'Vat Ly'),
(20, 'Hoa Hoc', 4645, 0x71717171717171717171717171717171717171717171717171717171717171717171717171717171717171717171717171717171, 0, 1, '2015-08-03 08:43:44', '2015-08-03 08:47:16', 'Hoa Hoc'),
(22, 'Lich Su', 3534, 0x666764676466676664676667666467666467666464646464646464646464646464646464646464646464646464646464646464646464646464646464646464646464646464646464646464646464646464646464646464646464646464, 0, 0, '2015-08-03 08:44:44', '2015-08-03 08:47:35', 'Lich Su'),
(23, 'Dia Ly', 4534, 0x6666666666666666666666666666666666666666666666666666666666666666666666666666666666666666666666666666666666666666666666666666666666666666666666666666666666, 0, 1, '2015-08-03 08:45:10', '2015-08-03 08:47:44', 'Dia Ly');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `activate` tinyint(1) NOT NULL,
  `time_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `time_updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=268 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `activate`, `time_created`, `time_updated`, `image`) VALUES
(252, 'Hoang Thao', 'thaoxau@gmail.com', '1222', 1, '2015-07-31 03:43:52', '2015-08-03 09:45:34', 'Hoang Thao'),
(253, 'Boo Uet', 'chuquynhtrang.dhcn@gmail.com', '1234', 1, '2015-07-31 03:45:22', '2015-07-31 04:17:20', 'Boo Uet'),
(254, 'Mai Hoa', 'maihoa@gmail.com', '1234', 0, '2015-07-31 03:45:46', '2015-08-03 03:58:06', 'Mai Hoa'),
(255, 'Nguyen Hong', 'nguyenhong@gmail.com', '1234', 0, '2015-07-31 04:12:13', '2015-08-03 03:58:12', 'Nguyen Hong'),
(259, 'Quang Huy', 'quochuy@gmail.com', '1234', 1, '2015-07-31 04:15:01', '2015-08-03 07:55:54', 'Quang Huy'),
(267, 'BB', 'sfdsf', 'fsdfsdf', 0, '2015-08-03 08:02:59', '2015-08-03 08:13:02', 'BB');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
