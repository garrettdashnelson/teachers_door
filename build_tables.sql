-- phpMyAdmin SQL Dump
-- version 4.0.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 18, 2013 at 09:40 AM
-- Server version: 5.1.70-cll
-- PHP Version: 5.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


-- --------------------------------------------------------

--
-- Table structure for table `office_hours`
--

DROP TABLE IF EXISTS `office_hours`;
CREATE TABLE IF NOT EXISTS `office_hours` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `hour` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `office_hours`
--

INSERT INTO `office_hours` (`id`, `hour`, `name`) VALUES
(1, 'Monday 9:00-9:30', 'FREE'),
(3, 'Tuesday 10:00-10:30', 'FREE'),
(2, 'Monday 9:30-10:30', 'FREE');

-- --------------------------------------------------------

--
-- Table structure for table `office_hours_meta`
--

DROP TABLE IF EXISTS `office_hours_meta`;
CREATE TABLE IF NOT EXISTS `office_hours_meta` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `variable` varchar(24) DEFAULT NULL,
  `value` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `office_hours_meta`
--

INSERT INTO `office_hours_meta` (`id`, `variable`, `value`) VALUES
(1, 'last_update', '2013-10-18 09:21:33');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
         