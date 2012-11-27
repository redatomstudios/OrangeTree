-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2012 at 09:20 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `orangetree`
--
CREATE DATABASE `orangetree` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `orangetree`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(50) NOT NULL,
  `AccessCode` varchar(100) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Id`, `Username`, `AccessCode`) VALUES
(1, 'admin', '4fcab400858d58a02b48f097bfdbc411e838ee12');

-- --------------------------------------------------------

--
-- Table structure for table `generalsettings`
--

CREATE TABLE IF NOT EXISTS `generalsettings` (
  `Id` int(1) NOT NULL AUTO_INCREMENT,
  `HotelName` varchar(100) NOT NULL,
  `HotelAddress` text NOT NULL,
  `Logo` varchar(100) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `Title` varchar(500) NOT NULL,
  `Template` text NOT NULL,
  `SliderImages` varchar(500) NOT NULL,
  `PageContent` text NOT NULL,
  `MediaContent` text NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE IF NOT EXISTS `rooms` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Type` varchar(50) NOT NULL,
  `Prices` varchar(100) NOT NULL COMMENT 'Format: 0-4:155;5-6:100 => Sunday to Wednesday : 155 Euros',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`Id`, `Type`, `Prices`) VALUES
(1, 'Twin Rooms', '0-4:27.50;5:47.50;6:67.50'),
(2, 'Double Rooms', '0-4:42.50;5:67.50;6:95.00'),
(3, 'King Double', '0-4:77.50;5:105.00;6:155.00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
