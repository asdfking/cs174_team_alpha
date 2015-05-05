-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2015 at 10:16 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cs174_hw1`
--

-- --------------------------------------------------------

--
-- Table structure for table `accident`
--

CREATE TABLE IF NOT EXISTS `accident` (
  `accidentID` int(7) NOT NULL,
  `Description` varchar(100) NOT NULL,
  `ID` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accident`
--

INSERT INTO `accident` (`accidentID`, `Description`, `ID`) VALUES
(8472954, 'Backed up into a fire hydrant', 1234456),
(6491536, 'T-Bone at the intersection', 1234457);

-- --------------------------------------------------------

--
-- Table structure for table `dmv`
--

CREATE TABLE IF NOT EXISTS `dmv` (
  `Make` varchar(16) NOT NULL,
  `Model` varchar(16) NOT NULL,
  `Color` varchar(16) NOT NULL,
  `Year` int(4) NOT NULL,
  `ID` int(7) NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dmv`
--

INSERT INTO `dmv` (`Make`, `Model`, `Color`, `Year`, `ID`, `image`) VALUES
('Nissan', 'Rogue', 'Purple', 2012, 1234456, '<img src="http://www.wallpapercarhd.com/wp-content/uploads/2014/05/nissan-car-review-31.jpg" height="200">'),
('Toyota', 'Prius', 'Black', 2008, 1234457, '<image src="http://www.moibibiki.com/images/toyota-prius-black-4.jpg" height="200">'),
('Honda', 'Civic', 'Brown', 1997, 5895371, '<image src="http://images.thecarconnection.com/med/1997-honda-civic-ex_100026723_m.jpg" height="200">'),
('Lexus', 'IS250', 'White', 2010, 7394184, '<image src="http://upload.wikimedia.org/wikipedia/commons/a/a7/2010-2011_Lexus_IS_250_(GSE20R_MY11)_Prestige_sedan_(2011-04-22)_01.jpg" height="200">'),
('Ferrari', 'Enzo', 'blue', 2015, 7777777, '<image src="http://www.autoguide.com/auto-news/gallery/gallery.php/d/328242-4/peter_simon_ferrari_enzo_1.jpg" height="200">'),
('BMW', '328i', 'Grey', 1997, 8294638, '<image src="http://images.gtcarlot.com/pictures/51538506.jpg" height="200">'),
('Ferrari', 'Enzo', 'red', 2014, 8888888, '<image src="http://media.caranddriver.com/images/13q2/514656/2014-ferrari-f70-artists-rendering-photo-514659-s-1280x782.jpg" height="200">'),
('Acura', 'RDX', 'Pink', 2014, 9581432, '<image src="http://media.dealerfire.com/websites/1011/content/2014-Acura-RDX-A_original.jpg" height="200">');

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE IF NOT EXISTS `owner` (
  `ID` int(7) NOT NULL,
  `Name` varchar(16) NOT NULL,
  `Age` int(3) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Phone` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`ID`, `Name`, `Age`, `Address`, `Phone`) VALUES
(1234456, 'Gabe Newell', 69, '1234 Valve Ave, San Jose, CA 95123', '408-668-8888'),
(1234457, 'Daniel Maikelele', 25, '354 Santana ave, Cupertino CA 95287', '510-374-1952'),
(5895371, 'Bob Sagat', 50, '123 Fake Street, CA', '408-123-4567'),
(7394184, 'Justin Beiber', 20, '431 Beverly Hills, CA', '253-874-4672'),
(8294638, 'Test Testerson', 44, '5633 Rodeo Dr., CA', '111-867-5309'),
(8888888, 'Mr. Rich', 29, 'Beverly Hills street 31', '847364758419'),
(9581432, 'John Smith', 80, '321 Blossom Ave., CA', '654-876-2341'),
(7777777, 'James Bond', 70, '512 Bond Ave., CA', '007-007-0070');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accident`
--
ALTER TABLE `accident`
 ADD PRIMARY KEY (`ID`,`accidentID`);

--
-- Indexes for table `dmv`
--
ALTER TABLE `dmv`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
 ADD PRIMARY KEY (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
