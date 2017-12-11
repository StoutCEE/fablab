SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "-05:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- DATABASE: 
--

CREATE DATABASE IF NOT EXISTS `cardswipe`;
USE `cardswipe`;

--
-- Table structure for table `fryk214_checkin`
-- This is the CEE Lab
--

CREATE TABLE IF NOT EXISTS `fryk214_checkin` (
  `checkin` datetime NOT NULL,
  `id` int(9) unsigned NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `fryk101_checkin` (
  `checkin` datetime NOT NULL,
  `checkout` datetime NOT NULL,
  `id` int(9) unsigned NOT NULL,
  `machine` int(5) unsigned NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
