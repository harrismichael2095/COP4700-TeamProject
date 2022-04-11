-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 11, 2022 at 01:23 AM
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
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `user_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`admin_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `apart`
--

DROP TABLE IF EXISTS `apart`;
CREATE TABLE IF NOT EXISTS `apart` (
  `user_id` int(11) NOT NULL,
  `RSO_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `RSO_id` (`RSO_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `rating` int(11) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`comment_id`),
  KEY `user_id` (`user_id`),
  KEY `event_id` (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(50) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `catagory` char(50) DEFAULT NULL,
  `description` char(50) DEFAULT NULL,
  `email` char(50) DEFAULT NULL,
  `phone` char(50) DEFAULT NULL,
  `date_time` datetime DEFAULT NULL,
  `location` char(50) DEFAULT NULL,
  PRIMARY KEY (`event_id`),
  UNIQUE KEY `location` (`location`),
  UNIQUE KEY `date_time` (`date_time`),
  KEY `admin_id` (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

DROP TABLE IF EXISTS `location`;
CREATE TABLE IF NOT EXISTS `location` (
  `name` char(50) NOT NULL,
  `address` char(50) NOT NULL,
  `longitude` float NOT NULL,
  `latitude` float NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `private_event`
--

DROP TABLE IF EXISTS `private_event`;
CREATE TABLE IF NOT EXISTS `private_event` (
  `events_id` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `super_admin_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`events_id`),
  KEY `admin_id` (`admin_id`),
  KEY `super_admin_id` (`super_admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `public_event`
--

DROP TABLE IF EXISTS `public_event`;
CREATE TABLE IF NOT EXISTS `public_event` (
  `event_id` int(11) NOT NULL,
  `RSO_id` int(11) NOT NULL,
  PRIMARY KEY (`event_id`),
  KEY `RSO_id` (`RSO_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rso`
--

DROP TABLE IF EXISTS `rso`;
CREATE TABLE IF NOT EXISTS `rso` (
  `RSO_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `name` char(50) DEFAULT NULL,
  PRIMARY KEY (`RSO_id`),
  KEY `admin_id` (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rso_event`
--

DROP TABLE IF EXISTS `rso_event`;
CREATE TABLE IF NOT EXISTS `rso_event` (
  `event_id` int(11) NOT NULL,
  `RSO_id` int(11) NOT NULL,
  PRIMARY KEY (`event_id`),
  KEY `RSO_id` (`RSO_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `super_admin`
--

DROP TABLE IF EXISTS `super_admin`;
CREATE TABLE IF NOT EXISTS `super_admin` (
  `user_id` int(11) NOT NULL,
  `super_admin_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`super_admin_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `university_profile`
--

DROP TABLE IF EXISTS `university_profile`;
CREATE TABLE IF NOT EXISTS `university_profile` (
  `university_id` int(11) NOT NULL AUTO_INCREMENT,
  `super_admin_id` int(11) NOT NULL,
  `num_of_students` int(11) DEFAULT NULL,
  `description` text,
  `name` varchar(50) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`university_id`),
  KEY `super_admin_id` (`super_admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL DEFAULT '',
  `school` varchar(50) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email`, `school`, `username`, `password`) VALUES
(1, 'abc@ucf.edu', 'ucf.edu', 'mat', 'pas'),
(2, '2@mat.com', 'mat.com', 'matt', 'att'),
(3, 'test@test.com', 'test.com', 'wwww', 'rr'),
(4, 'w@error.com', 'error.com', 'wwwww', 'www'),
(5, 'www@er.com', 'er.com', 'matthew', 'w');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `apart`
--
ALTER TABLE `apart`
  ADD CONSTRAINT `RSO_id` FOREIGN KEY (`RSO_id`) REFERENCES `rso` (`RSO_id`),
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`);

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`),
  ADD CONSTRAINT `location` FOREIGN KEY (`location`) REFERENCES `location` (`name`);

--
-- Constraints for table `private_event`
--
ALTER TABLE `private_event`
  ADD CONSTRAINT `private_event_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`),
  ADD CONSTRAINT `private_event_ibfk_2` FOREIGN KEY (`super_admin_id`) REFERENCES `super_admin` (`super_admin_id`),
  ADD CONSTRAINT `private_event_ibfk_3` FOREIGN KEY (`events_id`) REFERENCES `event` (`event_id`);

--
-- Constraints for table `public_event`
--
ALTER TABLE `public_event`
  ADD CONSTRAINT `public_event_ibfk_1` FOREIGN KEY (`RSO_id`) REFERENCES `rso` (`RSO_id`),
  ADD CONSTRAINT `public_event_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`);

--
-- Constraints for table `rso`
--
ALTER TABLE `rso`
  ADD CONSTRAINT `rso_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`);

--
-- Constraints for table `rso_event`
--
ALTER TABLE `rso_event`
  ADD CONSTRAINT `rso_event_ibfk_1` FOREIGN KEY (`RSO_id`) REFERENCES `rso` (`RSO_id`),
  ADD CONSTRAINT `rso_event_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`);

--
-- Constraints for table `super_admin`
--
ALTER TABLE `super_admin`
  ADD CONSTRAINT `super_admin_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `university_profile`
--
ALTER TABLE `university_profile`
  ADD CONSTRAINT `super_admin_id` FOREIGN KEY (`super_admin_id`) REFERENCES `super_admin` (`super_admin_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
