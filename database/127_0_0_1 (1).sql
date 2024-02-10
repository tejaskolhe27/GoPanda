-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 25, 2021 at 03:27 AM
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
-- Database: `fos_db`
--
CREATE DATABASE IF NOT EXISTS `fos_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `fos_db`;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(100) NOT NULL,
  `product_price` varchar(50) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL,
  `total_price` varchar(100) NOT NULL,
  `product_code` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `pmode` varchar(50) NOT NULL,
  `products` varchar(255) NOT NULL,
  `amount_paid` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(200) NOT NULL,
  `product_price` varchar(40) NOT NULL,
  `product_qty` varchar(10) NOT NULL DEFAULT '1',
  `product_image` varchar(200) NOT NULL,
  `product_code` varchar(30) NOT NULL,
  `cat_id` int(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_price`, `product_qty`, `product_image`, `product_code`, `cat_id`) VALUES
(1, 'CHICKEN(1/2KG)', '100', '1', 'chicken.jpg', '1', 4),
(2, 'Bhindi (500G)', '25', '1', 'bhindi.jpg', '2', 2),
(4, 'Brinjal', '60', '1', 'brinjal.jpg', '3', 2),
(5, 'Apple', '80', '1', 'apple.jpg', '4', 2),
(6, 'Banana(12)', '40', '1', 'banana.jpg', '5', 2),
(7, 'Brooke Bond Red Label', '80', '1', 'brookebond.jpg', '6', 1),
(8, 'Bhendi Masala', '90', '1', 'bhendimasala.jpg', '7', 3),
(9, 'Chilli', '20', '1', 'chilli.jpg', '8', 2),
(10, 'Daawat Traditional ', '150', '1', 'daawat_traditional.jpg', '9', 1),
(12, 'Goat Meat 500g', '275', '1', 'gaotmeat.jpg', '10', 4),
(13, 'Kiwi (3)', '75', '1', 'kiwi.jpg', '11', 2),
(14, 'Dhaniya 250g', '100', '1', 'kothimbir.jpg', '12', 2),
(15, 'Maggie Cheese Pasta', '45', '1', 'maggie_c_m_p.jpg', '13', 1),
(16, 'Mango 1kg (kesar)', '80', '1', 'mango.jpg', '14', 2),
(17, 'Panner Tikka', '150', '1', 'pannertikka.jpg', '15', 3),
(18, 'Paplet ', '100', '1', 'paplet.jpg', '16', 4),
(19, 'Pedigree Dry Food 5kg', '540', '1', 'pedigreedry.jpg', '17', 5),
(20, 'Chicken Drum Sticks 500g', '120', '1', 'chickendrumsticks.jpg', '18', 4),
(21, 'Chicken Gizzard 500g', '130', '1', 'chickengizzard.jpg', '19', 4),
(22, 'Chiken Whole Leg', '100', '1', 'chickenleg.jpg', '20', 4),
(23, 'Chicken Boneless', '90', '1', 'boneless.jpg', '21', 4),
(24, 'Goat Boneless 250 g ', '140', '1', 'goatboneless.jpg', '22', 4),
(25, 'Salmon fish whole', '250', '1', 'salmon.jpg', '23', 4),
(26, 'Crab 1kg', '200', '1', 'creab.jpg', '24', 4),
(27, 'Lobster whole', '180', '1', 'lobster.jpg', '25', 4),
(28, 'Veg Manchurian', '120', '1', 'manchurian.jpg', '26', 3),
(29, 'Chicken Biryani', '300', '1', 'chickendumbiryani.jpg', '27', 3),
(30, 'Panner Chili', '180', '1', 'pannerchilli.jpg', '28', 3),
(31, 'Mariegold  marielite', '45', '1', 'mariegold.jpg', '29', 1),
(32, 'Wheat Bread', '25', '1', 'wheatbread.jpg', '30', 1),
(33, 'Brown Bread', '30', '1', 'brownbread.jpg', '31', 1),
(34, 'Milk Bread', '25', '1', 'milkbread.jpg', '32', 1),
(35, 'Indiagate Basmati rice 1kg', '90', '1', 'indiagate.jpg', '33', 1),
(36, 'HMT Kolam', '60', '1', 'hmtkolam.jpg', '34', 1),
(37, 'wheat 1kg', '50', '1', 'wheat.jpg', '35', 1),
(38, 'Sabudana', '60', '1', 'sabudana.jpg', '36', 1),
(39, 'Jowar', '55', '1', 'jowar.jpg', '37', 1),
(40, 'Amul Butter Garlic', '55', '1', 'amulbutter.jpg', '38', 1),
(41, 'Maggie Hot and Sweet ketchup', '150', '1', 'maggiehs.jpg', '39', 1),
(42, 'Cadbury Dairy milk', '50', '1', 'cadbury.jpg', '40', 1),
(43, 'Raw Papapya', '60', '1', 'pawpapaya.jpg', '41', 2),
(44, 'Papaya', '60', '1', 'papaya.jpg', '42', 2),
(45, 'Pomogranade 1kg', '80', '1', 'pomogranade.jpg', '43', 2),
(46, 'Guava 1 kg', '60', '1', 'guava.jpg', '44', 2),
(47, 'Groundnut beans', '80', '1', 'groundnut.jpg', '45', 2),
(48, 'Cucumber 1kg', '40', '1', 'cucumber.jpg', '46', 2),
(49, 'Yellow Capsicum', '35', '1', 'yellowcapsicum.jpg', '47', 2),
(50, 'Green Capsicum', '35', '1', 'greencapsicum.jpg', '48', 2),
(51, 'Potato 1kg', '45', '1', 'potato.jpg', '49', 2),
(52, 'Panner Butter Masala', '180', '1', 'pannerbuttermasala.jpg', '50', 3),
(53, 'Fries', '85', '1', 'fries.jpg', '51', 3),
(54, 'Dodka 1 kg', '30', '1', 'dodka.jpg', '52', 2),
(55, 'Optimum Micro Pellet', '60', '1', 'optimum.jpg', '53', 5),
(56, 'Fish Food Diet', '100', '1', 'fishfood.jpg', '54', 5),
(57, 'Drool Absolute ', '450', '1', 'drool.jpg', '55', 5),
(58, 'Drool Calcium Tablet', '550', '1', 'calcium.jpg', '56', 5),
(59, 'Petcare Syrup for Dog', '750', '1', 'petcaresyrup.jpg', '57', 5),
(60, 'Pedigree Dental Care sticks', '1320', '1', 'dentastix.jpg', '58', 5),
(61, 'Puran Poli (2)', '50', '1', 'puranpoli.jpg', 'puran12', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `uid` varchar(100) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(300) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `u_type` varchar(5) NOT NULL,
  `res_image` varchar(1000) DEFAULT NULL,
  `res_lati` varchar(20) DEFAULT NULL,
  `res_longi` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`uid`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `uid`, `pwd`, `email`, `address`, `contact`, `u_type`, `res_image`, `res_lati`, `res_longi`) VALUES
(21, 'Tejas', 'tejas@123', 'tejas123', 'NULL', 'NULL', 'NULL', 'adm', NULL, NULL, NULL),
(24, 'TEJAS KOLHE', 'tejas@27', 'tejas123', 'NULL', 'NULL', 'NULL', 'usr', 'tejas.jpg', NULL, NULL),
(25, 'RUSHIKESH BANDIWADEKAR', 'rushi@45', 'rushi123', 'NULL', 'NULL', 'NULL', 'usr', NULL, NULL, NULL),
(26, 'Sanika Pharande', 'sanika@54', 'sanika123', 'NULL', 'NULL', 'NULL', 'usr', NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
