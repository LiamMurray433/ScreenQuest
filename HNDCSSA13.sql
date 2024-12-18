-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 18, 2024 at 01:54 PM
-- Server version: 5.5.29
-- PHP Version: 5.3.10-1ubuntu3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `HNDCSSA13`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `booking_content`
--

CREATE TABLE IF NOT EXISTS `booking_content` (
  `content_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `booking_id` int(10) unsigned NOT NULL,
  `movie_id` int(10) unsigned NOT NULL,
  `quantity` int(10) unsigned NOT NULL DEFAULT '1',
  `price` decimal(4,2) NOT NULL,
  PRIMARY KEY (`content_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `booking_content`
--

INSERT INTO `booking_content` (`content_id`, `booking_id`, `movie_id`, `quantity`, `price`) VALUES
(1, 1, 3, 2, 10.99),
(2, 1, 6, 2, 13.99),
(3, 2, 4, 1, 12.99),
(4, 3, 4, 1, 12.99),
(5, 4, 7, 1, 8.99),
(6, 5, 7, 1, 8.99),
(7, 6, 3, 1, 10.99),
(8, 7, 6, 1, 13.99),
(9, 8, 3, 1, 10.99),
(10, 9, 6, 1, 13.99),
(11, 10, 3, 1, 10.99),
(12, 11, 6, 1, 13.99),
(13, 12, 3, 1, 10.99),
(14, 13, 4, 1, 12.99),
(15, 14, 7, 2, 8.99),
(16, 15, 4, 2, 12.99),
(17, 16, 6, 12, 13.99),
(18, 17, 6, 1, 13.99),
(19, 18, 7, 1, 8.99),
(20, 19, 8, 2, 12.99),
(21, 20, 3, 1, 10.99),
(22, 21, 1, 2, 4.99),
(23, 22, 4, 1, 12.99),
(24, 23, 4, 1, 12.99),
(25, 24, 7, 1, 8.99),
(26, 25, 9, 1, 4.99),
(27, 26, 8, 1, 12.99),
(28, 27, 6, 1, 13.99);

-- --------------------------------------------------------

--
-- Table structure for table `coming_soon`
--

CREATE TABLE IF NOT EXISTS `coming_soon` (
  `soon_id` int(30) NOT NULL AUTO_INCREMENT,
  `movie_title` varchar(40) NOT NULL,
  `age_rating` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL,
  `img` varchar(30) NOT NULL,
  PRIMARY KEY (`soon_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `coming_soon`
--

INSERT INTO `coming_soon` (`soon_id`, `movie_title`, `age_rating`, `date`, `img`) VALUES
(1, 'Capain America: Brave New World', 'TBC', '14 February 2025', 'img\\captain.jpg'),
(2, 'Disney''s: Snow White', 'U', '21 March 2025', 'img\\snowwhite.jpg'),
(3, 'Mufasa', 'PG', '20 December 2024', 'img\\mufasa.jpg'),
(4, '2073', '15', '1 January 2025', 'img\\2073.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `movie_booking`
--

CREATE TABLE IF NOT EXISTS `movie_booking` (
  `booking_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id` int(10) unsigned NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `booking_date` datetime NOT NULL,
  PRIMARY KEY (`booking_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `movie_booking`
--

INSERT INTO `movie_booking` (`booking_id`, `id`, `total`, `booking_date`) VALUES
(1, 2, 49.96, '2024-11-29 14:50:01'),
(2, 2, 12.99, '2024-11-29 14:55:05'),
(3, 2, 12.99, '2024-11-29 14:57:41'),
(4, 2, 8.99, '2024-11-29 14:59:10'),
(5, 2, 8.99, '2024-11-29 15:02:07'),
(6, 2, 10.99, '2024-11-29 15:02:50'),
(7, 2, 13.99, '2024-11-29 15:05:32'),
(8, 5, 10.99, '2024-11-30 17:23:46'),
(9, 2, 13.99, '2024-12-04 17:52:29'),
(10, 2, 10.99, '2024-12-05 13:04:40'),
(11, 6, 13.99, '2024-12-11 13:04:15'),
(12, 9, 10.99, '2024-12-11 13:13:51'),
(13, 9, 12.99, '2024-12-11 13:15:10'),
(14, 9, 17.98, '2024-12-11 13:20:31'),
(15, 9, 25.98, '2024-12-12 14:00:22'),
(16, 9, 167.88, '2024-12-12 15:16:49'),
(17, 10, 13.99, '2024-12-12 18:07:31'),
(18, 10, 8.99, '2024-12-12 18:09:31'),
(19, 11, 25.98, '2024-12-13 11:44:11'),
(20, 9, 10.99, '2024-12-17 14:12:39'),
(21, 9, 9.98, '2024-12-18 11:57:19'),
(22, 9, 12.99, '2024-12-18 12:00:22'),
(23, 9, 12.99, '2024-12-18 12:02:39'),
(24, 9, 8.99, '2024-12-18 12:03:27'),
(25, 9, 4.99, '2024-12-18 12:04:01'),
(26, 9, 12.99, '2024-12-18 12:05:26'),
(27, 9, 13.99, '2024-12-18 13:44:54');

-- --------------------------------------------------------

--
-- Table structure for table `movie_listings`
--

CREATE TABLE IF NOT EXISTS `movie_listings` (
  `movie_id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `movie_title` varchar(30) NOT NULL,
  `genre` varchar(30) NOT NULL,
  `age_rating` varchar(30) NOT NULL,
  `show1` varchar(6) NOT NULL,
  `show2` varchar(6) NOT NULL,
  `show3` varchar(6) NOT NULL,
  `theatre` varchar(20) NOT NULL,
  `further_info` varchar(500) NOT NULL,
  `d` varchar(30) NOT NULL,
  `img` varchar(30) NOT NULL,
  `preview` varchar(300) NOT NULL,
  `mov_price` decimal(4,2) NOT NULL,
  PRIMARY KEY (`movie_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `movie_listings`
--

INSERT INTO `movie_listings` (`movie_id`, `movie_title`, `genre`, `age_rating`, `show1`, `show2`, `show3`, `theatre`, `further_info`, `d`, `img`, `preview`, `mov_price`) VALUES
(1, 'Dune 2', 'Sci-Fi', '12A', '1800', '1900', '2100', '1', 'Dune 2', '1 March 2024', 'img\\dune2.jpg', 'https://www.youtube.com/embed/Way9Dexny3w?si=9IvD3we9_tLsrRMu', 4.99),
(3, 'Gladiator II', 'Action', '15', '1200', '1800', '2030', '2', 'Gladiator II', '15 November 2024', 'img\\gladiator.jpg', 'https://www.youtube.com/embed/4rgYUipGJNo?si=BWjideO75J8QT5hW', 10.99),
(4, 'Sonic The Hedgehog 3', 'Action/Adventure', 'PG', '1600', '1800', '2000', '2', 'Blue hedgehog', '21st December 2024', 'img\\sonic_3.jpg', 'https://www.youtube.com/embed/1-1AqB9hOCw?si=q3gqu7vvhAqU_GjV" title="YouTube video player', 12.99),
(6, 'Heretic', 'Horror', '18', '1600', '1800', '2000', '2', '', '01 November 2024', 'img\\heretic.jpg', 'https://www.youtube.com/embed/O9i2vmFhSSY?si=lxPAM7hGOZ0zOyXy" title="YouTube video player', 13.99),
(7, 'Wild Robot', 'Animation', 'U', '1100', '1300', '1530', '1', 'Robot be wildn', '18 October 2024', 'img\\wild_robot.jpg', 'https://www.youtube.com/embed/67vbA5ZJdKQ?si=INvYQhMd8_gexKYo" title="YouTube video player', 8.99),
(8, 'Wicked', 'Musical', 'PG', '1000', '1400', '1915', '3', 'Wicked', '22 November 2024', 'img\\wicked.jpg', 'https://www.youtube.com/embed/6COmYeLsz4c?si=m28Oj-tW2k6RKRrJ', 12.99),
(9, 'Star Wars: Rogue one', 'Sci-Fi', '12A', '1600', '1830', '2200', '4', 'Star Wars', '13 December 2016', 'img\\rogue.jpg', 'https://www.youtube.com/embed/frdj1zb9sMY?si=AW7zZLk85AI3k1hl', 4.99);

-- --------------------------------------------------------

--
-- Table structure for table `new_users`
--

CREATE TABLE IF NOT EXISTS `new_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `new_users`
--

INSERT INTO `new_users` (`id`, `username`, `email`, `password`, `created_at`, `first_name`, `last_name`) VALUES
(9, 'Liam', 'liam@email.com', '1629f7f449aa4036f251461926750893349dd6e2b68c3bcf15ea1d2b3ad076aa', '2024-12-11 13:13:09', 'Liam', 'Murray'),
(11, 'MiaW', 'mia@email.com', 'd167828c1ed392ec2b5009d22fdcd0fd9cf4de70928b3feb161e64c6b36bb4c5', '2024-12-13 11:43:26', 'Mia', 'Wardell'),
(12, 'RyanA', 'ryananderson@email.com', 'af4508e61487fc9f98fa0b404948509124d3488659f8fe56dcb3e6d6461d5e16', '2024-12-13 12:33:29', 'Ryan', 'Anderson');

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE IF NOT EXISTS `payment_details` (
  `card_id` int(20) NOT NULL AUTO_INCREMENT,
  `id` int(20) NOT NULL,
  `name_on_card` text NOT NULL,
  `card_number` varchar(20) NOT NULL,
  `csv` varchar(5) NOT NULL,
  `expiry_date` date NOT NULL,
  PRIMARY KEY (`card_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `payment_details`
--

INSERT INTO `payment_details` (`card_id`, `id`, `name_on_card`, `card_number`, `csv`, `expiry_date`) VALUES
(8, 9, 'Liam Brian Murray', '9999 9999 9999 9999', '999', '2025-08-29');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `item_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `item_name` varchar(20) NOT NULL,
  `item_desc` varchar(200) NOT NULL,
  `item_img` varchar(20) NOT NULL,
  `item_price` decimal(4,2) NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`item_id`, `item_name`, `item_desc`, `item_img`, `item_price`) VALUES
(4, 'Astro Bot', 'PS5 Version', 'images\\AB-img.jpg', 69.99),
(5, 'Helldivers 2', 'PS5', 'images/HD2-img.jpg', 39.99),
(6, 'Street Fighter 6', 'PS5', 'images\\SF6-img.jpg', 39.99);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
