-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 09, 2015 at 12:07 PM
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
  `district` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `donor_union` varchar(255) NOT NULL,
  `word` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `weight` int(11) NOT NULL,
  `last_donation` date NOT NULL,
  `donor_img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `blood_donor`
--

INSERT INTO `blood_donor` (`id`, `name`, `blood_group`, `mobile`, `secondary_mobile`, `district`, `state`, `donor_union`, `word`, `date_of_birth`, `weight`, `last_donation`, `donor_img`) VALUES
(1, 'Ismail', 'a_positive', '222', '654', 'dhaka', 'dhaka', 'dhaka', '6', '1900-01-01', 22, '2010-01-01', 'no-image.gif'),
(2, 'Sabbir', 'a_positive', '33', '33', 'sylhet', 'dhaka', 'dhaka', '3', '1916-04-14', 77, '2010-11-20', 'no-image.gif'),
(3, 'Rubel', 'b_positive', '01840121483', '01911120583', 'dhaka', 'dhaka', 'dhaka', '2', '1987-03-19', 66, '2015-01-01', '3.png'),
(4, 'Mr Rabbi', 'a_positive', '123456', '123456789', 'dhaka', 'dhaka', 'dhaka', '3', '1900-01-01', 66, '2010-01-01', '4.jpg');

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
  `district` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `seeker_union` varchar(255) NOT NULL,
  `word` int(11) NOT NULL,
  `verification_code` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `blood_seeker`
--

INSERT INTO `blood_seeker` (`id`, `name`, `mobile`, `donor_num`, `donate_blood`, `district`, `state`, `seeker_union`, `word`, `verification_code`) VALUES
(1, 'Babu', '0184', '456', 'yes', 'dhaka', 'dhaka', 'dhaka', 3, '736987'),
(2, 'Babu', '0184', '456', 'yes', 'dhaka', 'dhaka', 'dhaka', 3, '683516'),
(3, 'ewe', '0184', '456', 'no', 'sylhet', 'rongpur', 'sylhet', 3, '483521'),
(4, 'ewe', '5', '456', 'yes', 'dhaka', 'dhaka', 'dhaka', 6, '689795'),
(5, 'Sakil', '2', '3', 'yes', 'dhaka', 'sylhet', 'dhaka', 3, '625754'),
(6, 'd', '0184', '3', 'yes', 'sylhet', 'dhaka', 'dhaka', 3, '287487'),
(7, 'Babu', '36933', '3', 'no', 'sylhet', 'sylhet', 'dhaka', 3, '933402'),
(8, 'ewe', '343', '33', 'yes', 'dhaka', 'dhaka', 'dhaka', 3, '905009'),
(9, '333', '666', '44', 'no', 'dhaka', 'sylhet', 'dhaka', 3, '949423'),
(10, 'new', '2', '3', 'yes', 'dhaka', 'sylhet', 'dhaka', 3, '453515'),
(11, 'new', '2', '3', 'yes', 'dhaka', 'sylhet', 'dhaka', 3, '428375'),
(12, 'sof', '5', '5', 'yes', 'sylhet', 'dhaka', 'sylhet', 3, '504073'),
(13, 'kof', '6', '6', 'no', 'sylhet', 'sylhet', 'sylhet', 3, '565575'),
(14, 'dd', '343', '3', 'no', 'sylhet', 'dhaka', 'dhaka', 3, '515514'),
(15, 'Rubel', '66', '33', 'yes', 'dhaka', 'dhaka', 'dhaka', 2, '322600'),
(16, 'Robi', '321', '123', 'yes', 'dhaka', 'dhaka', 'dhaka', 3, '113429');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
