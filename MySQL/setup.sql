SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "-05:00";

-- Miscellaneous settings
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

-- -----------------------------------------------------------------
-- DATABASE: `cee_users`
-- -----------------------------------------------------------------

-- Create database if it doesn't exist
CREATE DATABASE IF NOT EXISTS `cee_users`;
-- Use database so further changes occur in `cee_users`
USE `cee_users`;

-- Hold basic information on all users
-- Table structure for table `all_users`
CREATE TABLE IF NOT EXISTS `all_users` (
  `id` int(9) unsigned NOT NULL,
  `username` text NOT NULL,
  `category` text NOT NULL,
  `admin_priv` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
-- Set `id` as a unique key
ALTER TABLE `all_users` ADD UNIQUE KEY `id` (`id`);

-- Add specific information for students
-- Table structure for table `students`
CREATE TABLE IF NOT EXISTS `students` (
  `id` int(9) NOT NULL,
  `classification` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `major` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
-- Set `id` as a unique key
ALTER TABLE `students` ADD UNIQUE KEY `id` (`id`);

-- Add specific information for faculty
-- Table structure for table `faculty`
-- One day, we may add a `courses` or `schedule` column
CREATE TABLE IF NOT EXISTS `faculty` (
  `id` int(9) NOT NULL,
  `department` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
-- Set `id` as a unique key
ALTER TABLE `faculty` ADD UNIQUE KEY `id` (`id`);

-- Add specific information for staff
-- Table structure for table `staff`
CREATE TABLE IF NOT EXISTS `staff` (
  `id` int(9) NOT NULL,
  `department` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
-- Set `id` as a unique key
ALTER TABLE `staff` ADD UNIQUE KEY `id` (`id`);

-- Add specific information for admin users
-- Table structure for table `admin_users`
CREATE TABLE IF NOT EXISTS `admin_users` (
  `id` int(9) NOT NULL,
  `password` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL;
  `privilege` int(4) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
-- Set `id` as a unique key
ALTER TABLE `admin_users` ADD UNIQUE KEY `id` (`id`);


-- -----------------------------------------------------------------
-- DATABASE: `cee_groups`
-- -----------------------------------------------------------------

-- Create database if it doesn't exist
CREATE DATABASE IF NOT EXISTS `cee_groups`;
-- Use database so further changes occur in `cee_groups`
USE `cee_groups`;

-- Add information for all groups
-- Table structure for table `all_groups`
CREATE TABLE IF NOT EXISTS `all_groups` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title_short` text NOT NULL,
  `title_long` text NOT NULL,
  `category` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
ALTER TABLE `all_groups` ADD UNIQUE KEY `id` (`id`);

-- Add information for labs
-- Table structure for table `labs`
CREATE TABLE IF NOT EXISTS `labs` (
  `id` int unsigned NOT NULL,
  `location` text NOT NULL,
  `department` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
ALTER TABLE `labs` ADD UNIQUE KEY `id` (`id`);

-- Add information for student_orgs
-- Table structure for table `student_orgs`
CREATE TABLE IF NOT EXISTS `student_orgs` (
  `id` int unsigned NOT NULL,
  `email` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
ALTER TABLE `student_orgs` ADD UNIQUE KEY `id` (`id`);


-- -----------------------------------------------------------------
-- OTHER DATABASES
-- -----------------------------------------------------------------
CREATE DATABASE IF NOT EXISTS `cee_timesheets`;
CREATE DATABASE IF NOT EXISTS `cee_inventory`;
CREATE DATABASE IF NOT EXISTS `cee_layouts`;

-- Miscellaneous settings
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
