-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2015 at 07:01 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `amsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `aircrafts`
--

CREATE TABLE IF NOT EXISTS `aircrafts` (
`id` int(10) unsigned NOT NULL,
  `typeid` int(11) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci COMMENT='table of planes owned by the airline';

--
-- Dumping data for table `aircrafts`
--

INSERT INTO `aircrafts` (`id`, `typeid`) VALUES
(1, 1),
(2, 1),
(3, 3),
(4, 3),
(5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE IF NOT EXISTS `bookings` (
`id` int(10) unsigned NOT NULL,
  `flightid` int(10) unsigned NOT NULL,
  `userid` int(10) unsigned NOT NULL,
  `amount` int(10) unsigned NOT NULL,
  `class` enum('first','business','economy','') COLLATE utf16_unicode_ci NOT NULL,
  `quantity` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci COMMENT='booking details';

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `flightid`, `userid`, `amount`, `class`, `quantity`) VALUES
(14, 1, 1, 5000, 'first', 1),
(16, 1, 1, 50000, 'first', 10),
(17, 1, 1, 5000, 'first', 1),
(18, 3, 1, 500, 'economy', 1),
(19, 3, 1, 500, 'economy', 1),
(20, 1, 1, 5000, 'first', 1);

-- --------------------------------------------------------

--
-- Table structure for table `flights`
--

CREATE TABLE IF NOT EXISTS `flights` (
`id` int(10) unsigned NOT NULL,
  `aircraftid` int(11) unsigned NOT NULL,
  `startcity` varchar(30) COLLATE utf16_unicode_ci NOT NULL,
  `endcity` varchar(30) COLLATE utf16_unicode_ci NOT NULL,
  `starttime` datetime NOT NULL,
  `endtime` datetime NOT NULL,
  `firstavl` int(11) NOT NULL DEFAULT '0',
  `bizavl` int(11) NOT NULL DEFAULT '0',
  `econavl` int(11) NOT NULL DEFAULT '0',
  `firstfare` int(11) NOT NULL,
  `bizfare` int(11) NOT NULL,
  `econfare` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci COMMENT='table of flights operating';

--
-- Dumping data for table `flights`
--

INSERT INTO `flights` (`id`, `aircraftid`, `startcity`, `endcity`, `starttime`, `endtime`, `firstavl`, `bizavl`, `econavl`, `firstfare`, `bizfare`, `econfare`) VALUES
(1, 1, 'Mumbai', 'Kolkata', '2015-04-11 06:20:00', '2015-04-11 09:00:00', 1, 0, 0, 5000, 0, 0),
(2, 1, 'Kolkata', 'Delhi', '2015-04-11 12:00:00', '2015-04-11 15:00:00', 0, 0, 2, 6000, 0, 0),
(3, 3, 'Mumbai', 'Kolkata', '2015-04-11 00:00:00', '2015-04-11 00:00:00', 0, 0, 0, 400, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE IF NOT EXISTS `seats` (
  `seatno` int(11) NOT NULL,
  `flightid` int(11) NOT NULL,
  `class` enum('first','business','economy','') COLLATE utf16_unicode_ci NOT NULL,
  `isbooked` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE IF NOT EXISTS `types` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(30) COLLATE utf16_unicode_ci NOT NULL,
  `firstcap` int(11) NOT NULL,
  `bizcap` int(11) NOT NULL,
  `econcap` int(11) NOT NULL,
  `rateperkm` int(11) NOT NULL,
  `fixedcost` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci COMMENT='aircraft types';

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `firstcap`, `bizcap`, `econcap`, `rateperkm`, `fixedcost`) VALUES
(1, 'Boeing 747', 20, 50, 200, 3, 1000),
(3, 'Airbus A320', 5, 10, 100, 2, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `email` varchar(30) COLLATE utf16_unicode_ci NOT NULL,
  `password` varchar(30) COLLATE utf16_unicode_ci NOT NULL,
  `first_name` varchar(30) COLLATE utf16_unicode_ci NOT NULL,
  `last_name` varchar(30) COLLATE utf16_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf16_unicode_ci NOT NULL,
  `address` varchar(30) COLLATE utf16_unicode_ci NOT NULL,
  `isadmin` int(11) NOT NULL DEFAULT '0',
  `balance` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci COMMENT='users data';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `first_name`, `last_name`, `phone`, `address`, `isadmin`, `balance`) VALUES
(1, 'div@ams.com', 'div', 'divyansh', 'gupta', '546546', 'sfasdad', 1, -27000),
(2, 'riya@ams.com', 'riya', 'riya', 'bubna', '654654654', 'sfdfs', 1, 5000),
(3, 'roy@ams.com', 'roy', 'mayank', 'roy', '6546', '65465', 0, 0),
(4, 'sri@ams.com', 'sri', 'srinidhi', 'moodle', '654', '65465', 0, 0),
(5, 'sayan@ams.com', 'sdfds', 'Sayan', 'Mukh', '65465', 'D403', 0, 0),
(6, 'waghe@ams.com', 'waghe', 'waghe', 'shubh', '6546', '6546', 0, 0),
(7, 'shubhamwaghe@gmail.com', 'waghe', 'Shubham', 'Waghe', '9874563123', 'qplkjhgfdsazxcvbnm', 0, 0),
(8, 'sdf@sdf', 'sdf', 'sdf', 'sdf', 'sdf', 'sdf', 0, 4000),
(9, 'nitesh@ams.com', 'nitesh', 'Nitesh', 'Sekhar', '654654', '6515', 0, 5000),
(10, 'ad@lkjh', 'io', 'sdf', 'sdfsdf', 'lkj``', 'sdfsdf', 0, 0),
(11, '', '', '', '', '', '', 0, 7000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aircrafts`
--
ALTER TABLE `aircrafts`
 ADD PRIMARY KEY (`id`), ADD KEY `typeid` (`typeid`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
 ADD PRIMARY KEY (`id`), ADD KEY `flightid` (`flightid`), ADD KEY `userid` (`userid`);

--
-- Indexes for table `flights`
--
ALTER TABLE `flights`
 ADD PRIMARY KEY (`id`), ADD KEY `aircraftid` (`aircraftid`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aircrafts`
--
ALTER TABLE `aircrafts`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `flights`
--
ALTER TABLE `flights`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `aircrafts`
--
ALTER TABLE `aircrafts`
ADD CONSTRAINT `aircrafts_ibfk_1` FOREIGN KEY (`typeid`) REFERENCES `types` (`id`);

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`flightid`) REFERENCES `flights` (`id`),
ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);

--
-- Constraints for table `flights`
--
ALTER TABLE `flights`
ADD CONSTRAINT `flights_ibfk_1` FOREIGN KEY (`aircraftid`) REFERENCES `aircrafts` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
