-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 21, 2015 at 11:49 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `blood_donor`
--

INSERT INTO `blood_donor` (`id`, `name`, `blood_group`, `mobile`, `secondary_mobile`, `division`, `district`, `state`, `date_of_birth`, `weight`, `last_donation`, `donor_img`) VALUES
(1, 'Ismail', 'a_positive', '222', '654', '', 'dhaka', 'dhaka', '1900-01-01', 22, '2010-01-01', 'no-image.gif'),
(2, 'Sabbir', 'a_positive', '33', '33', '', 'sylhet', 'dhaka', '1916-04-14', 77, '2010-11-20', 'no-image.gif'),
(3, 'Rubel', 'b_positive', '01840121483', '01911120583', '', 'dhaka', 'dhaka', '1987-03-19', 66, '2015-01-01', '3.jpg'),
(4, 'Mr Rabbi', 'a_positive', '123456', '123456789', '', 'dhaka', 'dhaka', '1900-01-01', 66, '2010-01-01', '4.jpg'),
(5, 'Shakil', 'a_positive', '123456', '123456789', 'Dhaka', 'Munshiganj', 'Muladi', '1907-01-16', 20, '2010-12-21', 'no-image.gif'),
(6, 'Rubel', 'b_positive', '147', '258', 'Dhaka', 'Mymensingh', 'Amtali', '1909-01-16', 11, '2010-11-19', 'no-image.gif'),
(7, 'Amin', 'b_positive', '666', '8888', 'Barisal', 'Jhalokati', 'Kathalia', '2010-01-18', 11, '2010-11-21', 'no-image.gif');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `blood_seeker`
--

INSERT INTO `blood_seeker` (`id`, `name`, `mobile`, `donor_num`, `donate_blood`, `division`, `district`, `state`, `verification_code`) VALUES
(1, 'Ranu Hasan', '01860312853', '123', 'no', 'Dhaka', 'Tangail', 'Narail-S Upazilla', '360301');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
