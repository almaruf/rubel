-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 24, 2015 at 10:24 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blood_donation`
--
CREATE DATABASE IF NOT EXISTS `blood_donation` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `blood_donation`;

-- --------------------------------------------------------

--
-- Table structure for table `blood_donor`
--

CREATE TABLE IF NOT EXISTS `blood_donor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `blood_group` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `secondary_mobile` varchar(255) NOT NULL,
  `division` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `weight` int(11) NOT NULL,
  `last_donation` date NOT NULL,
  `donor_img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `blood_donor`
--

INSERT INTO `blood_donor` (`id`, `name`, `blood_group`, `mobile`, `secondary_mobile`, `division`, `district`, `state`, `date_of_birth`, `weight`, `last_donation`, `donor_img`) VALUES
(1, 'Amin', 'a_positive', '123456', '123456789', 'Dhaka', 'Dhaka', 'Keraniganj', '1900-01-01', 55, '2010-01-01', 'no-image.gif'),
(2, 'Sakil Ahmed', 'b_positive', '654', '321', 'Dhaka', 'Dhaka', 'Keraniganj', '1900-01-01', 65, '2010-01-01', 'no-image.gif'),
(3, 'Mr Again', 'ab_positive', '654', '456', 'Dhaka', 'Faridpur', 'Sadarpur', '1900-01-01', 65, '2010-01-01', '3.jpg'),
(4, 'Soib', 'b_positive', '666', '999', 'Dhaka', 'Munshiganj', 'Sreenagar', '1900-01-01', 99, '2010-01-01', 'no-image.gif');

-- --------------------------------------------------------

--
-- Table structure for table `blood_seeker`
--

CREATE TABLE IF NOT EXISTS `blood_seeker` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `donor_num` varchar(255) NOT NULL,
  `donate_blood` varchar(255) NOT NULL,
  `division` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `verification_code` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `blood_seeker`
--

INSERT INTO `blood_seeker` (`id`, `name`, `mobile`, `donor_num`, `donate_blood`, `division`, `district`, `state`, `verification_code`) VALUES
(1, 'Akash', '147', '258', 'no', 'Dhaka', 'Dhaka', 'Keraniganj', '696269'),
(2, 'Sakil', '654', '321', 'yes', 'Barisal', 'Jhalokati', 'Jhalokati Sadar', '314317'),
(3, 'Test', '654', '654', 'no', 'Dhaka', 'Tangail', 'Dhanbari', '517602'),
(4, 'Again', '654', '456', 'yes', 'Dhaka', 'Faridpur', 'Sadarpur', '748270');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
