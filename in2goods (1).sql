-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 03, 2022 at 02:55 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `in2goods`
--

-- --------------------------------------------------------

--
-- Table structure for table `car_category`
--

DROP TABLE IF EXISTS `car_category`;
CREATE TABLE IF NOT EXISTS `car_category` (
  `car_id` int(100) NOT NULL AUTO_INCREMENT,
  `car_details` varchar(100) NOT NULL,
  `car_type` varchar(10) NOT NULL,
  `company_id` int(10) NOT NULL,
  PRIMARY KEY (`car_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car_category`
--

INSERT INTO `car_category` (`car_id`, `car_details`, `car_type`, `company_id`) VALUES
(9, 'i20', 'Hatchback', 5),
(15, 'wagoner', 'sedan', 1),
(30, 'innova', 'suv', 2),
(31, 'Etios liva', 'Hatchback', 2),
(33, 'city', 'crossover', 4),
(34, 'Alto', 'Hatchback', 1),
(35, 'Harrier', 'suv', 3),
(36, 'innova', 'suv', 1),
(37, 'i20', 'hyundai', 1);

-- --------------------------------------------------------

--
-- Table structure for table `car_company`
--

DROP TABLE IF EXISTS `car_company`;
CREATE TABLE IF NOT EXISTS `car_company` (
  `company_id` int(100) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(100) NOT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car_company`
--

INSERT INTO `car_company` (`company_id`, `company_name`) VALUES
(1, 'Maruti Suzuki '),
(2, 'Toyota'),
(3, 'Tata  '),
(4, 'Honda '),
(5, 'Hyundai'),
(6, 'Mini');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_items`
--

DROP TABLE IF EXISTS `tbl_items`;
CREATE TABLE IF NOT EXISTS `tbl_items` (
  `items_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `ad_title` varchar(100) NOT NULL,
  `items_name` varchar(110) NOT NULL,
  `company_id` int(11) NOT NULL,
  `ad_type` varchar(200) NOT NULL,
  `negotible` varchar(5) NOT NULL,
  `contact_name` varchar(20) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `contact_email` varchar(200) NOT NULL,
  `contact_address` varchar(50) NOT NULL,
  `items_img` varchar(500) NOT NULL,
  `items_category` varchar(110) NOT NULL,
  `items_price` int(11) NOT NULL,
  `km` varchar(100) NOT NULL,
  `insurance_type` varchar(100) NOT NULL,
  `Registration` varchar(100) NOT NULL,
  `Fuel_type` varchar(100) NOT NULL,
  `Ownership` int(20) NOT NULL,
  `items_desc` varchar(500) NOT NULL,
  `items_status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`items_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_items`
--

INSERT INTO `tbl_items` (`items_id`, `user_id`, `ad_title`, `items_name`, `company_id`, `ad_type`, `negotible`, `contact_name`, `contact_number`, `contact_email`, `contact_address`, `items_img`, `items_category`, `items_price`, `km`, `insurance_type`, `Registration`, `Fuel_type`, `Ownership`, `items_desc`, `items_status`) VALUES
(8, 129, '2011 innova for sale', 'innova', 2, '0', '1', 'Albin P Thomas', '9846173680', 'albin@gmail.com', 'padinjareparambil.', 'assets/images/1638999394.png', 'suv', 100000, '', '', '', '', 0, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', 1),
(9, 129, 'Hector for sale', 'Hector', 3, '0', '1', 'Albin P Thomas', '9846173680', 'abcd@gmail.com', 'padinjareparambil.', 'assets/images/1638999556.jpg', 'suv', 500000, '', '', '', '', 0, 'good condition vehicle ', 1),
(11, 129, 'i20', 'i20', 5, '0', '1', 'Albin P Thomas', '9846173680', 'abcd@gmail.com', 'padinjareparambil.', 'assets/images/1639021787.jpg', 'Hatchback', 1200000, '', '', '', '', 0, 'good vehiclee\r\nshowroom serviced\r\nwell maintained\r\n', 1),
(14, 129, 'good condition car for sale', 'mini', 6, 'personal', '1', 'Albin P Thomas', '9846173680', 'albin@gmail.com', 'padinjareparambil.', 'assets/images/1639718607.jpeg', 'cooper', 100000, '', '', '', '', 0, 'good vehiclee\r\nshowroom serviced\r\nwell maintained\r\n', 1),
(15, 132, 'good vehicle for sale', 'manaza', 3, 'personal', '1', 'soorya', '9846173680', 'soorya@gmail.com', 'soorya bhavan', 'assets/images/1639729330.jpeg', 'suv', 500000, '', '', '', '', 0, 'good vehicle\r\ncompany service\r\ngood tyres\r\nshowroom condition', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_save`
--

DROP TABLE IF EXISTS `tbl_save`;
CREATE TABLE IF NOT EXISTS `tbl_save` (
  `save_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(20) NOT NULL,
  `items_id` int(20) NOT NULL,
  PRIMARY KEY (`save_id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_save`
--

INSERT INTO `tbl_save` (`save_id`, `user_id`, `items_id`) VALUES
(19, 131, 14),
(15, 129, 12),
(34, 191, 9),
(22, 134, 9),
(23, 134, 8),
(24, 134, 14);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_status` int(1) NOT NULL DEFAULT '1',
  `name` varchar(10) NOT NULL,
  `user_created_at` varchar(10) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=193 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `username`, `password`, `user_status`, `name`, `user_created_at`) VALUES
(116, 'abcdef@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', 0, 'abbcdds aj', '11-11-21'),
(120, 'rubinsiby@mca.ajce.in', 'a35e723cc29d1ec9a23566cfffe77b12', 0, 'rubin siby', '12-11-21'),
(121, 'frankmathewsthomas@gmail.com', '25d55ad283aa400af464c76d713c07ad', 0, 'frank thom', '12-11-21'),
(122, 'ligin@gmail.com', '383b7d44a65cf9f0e8a474427f01eeba', 1, 'ligin abra', '22-11-21'),
(123, 'frank@gmail.com', '25d55ad283aa400af464c76d713c07ad', 1, 'frank thom', '22-11-21'),
(126, 'vivek@gmail.com', '25f9e794323b453885f5181f1b624d0b', 1, 'Vivek Kuma', '24-11-21'),
(127, 'albinp@gmail.com', 'a4235fdb51eba44a64db4c2ff2765c8b', 0, 'albin thom', '24-11-21'),
(128, 'ebin@gmail.com', '0e7517141fb53f21ee439b355b5a1d0a', 1, 'Ebin Johns', '07-12-21'),
(129, 'albin@gmail.com', 'e495a909893e9f1d90198016848fc344', 1, 'albin thom', '08-12-21'),
(130, 'akshai@gmail.com', 'd10fcbde30390ad2cf8a53243639bcad', 1, 'akshai bij', '09-12-21'),
(131, 'ak@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 'Akhil Siby', '15-12-21'),
(132, 'soorya@gmail.com', 'd91a96c788cddf037b5934efff6c3fc3', 1, 'soorya p', '17-12-21'),
(133, 'kevin@gmail.com', 'a588f61c13a948386072c24916554b58', 1, 'kevin liza', '17-12-21'),
(134, 'abc@gmail.com', '97ac82a5b825239e782d0339e2d7b910', 1, 'abc abc', '17-12-21'),
(191, 'admin@gmail.com', 'e495a909893e9f1d90198016848fc344', 2, 'admin t', '05-04-22'),
(192, 'mrudul@gmail.in', 'e8be9ef4840be0bd6b1ce18ac2900108', 0, 'Mrudul A', '06-04-22');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
