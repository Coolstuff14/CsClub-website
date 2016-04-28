-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2016 at 04:09 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csmain`
--
CREATE DATABASE IF NOT EXISTS `csmain` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `csmain`;

-- --------------------------------------------------------

--
-- Table structure for table `downloads`
--

CREATE TABLE `downloads` (
  `linkID` int(4) NOT NULL,
  `title` varchar(100) NOT NULL,
  `url` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `jobID` int(4) NOT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `submitBy` int(4) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `progress` varchar(1000) NOT NULL,
  `memberName` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `urgency` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`jobID`, `dateCreated`, `submitBy`, `title`, `description`, `progress`, `memberName`, `status`, `urgency`) VALUES
(9, '2015-12-16 05:00:00', 14, 'Create 2016 Budget', 'We need a budget due by the end of January                   \r\n                ', 'Only a few ideas                  \r\n                ', 'Joshua', 'In Progress', 'Urgent'),
(10, '2016-04-26 06:10:01', 14, 'test', 'test', 'test', 'All', 'New', 'Normal'),
(11, '2016-04-26 06:10:40', 14, 'Finish Website', 'Finish club website', 'Just Begun', 'All', 'New', 'Urgent'),
(12, '2016-04-27 01:50:14', 14, 'test2', 'nothing', 'nothing', 'All', 'New', 'Normal'),
(13, '2016-04-28 13:55:04', 14, 'new task', 'do stuff', 'nothing', 'Jake', 'In Progress', 'Urgent');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `memberID` int(4) NOT NULL,
  `fName` varchar(20) NOT NULL,
  `lName` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `eboard` varchar(1) DEFAULT '0',
  `role` varchar(200) DEFAULT '',
  `oneCard` varchar(25) DEFAULT NULL,
  `joinDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pic` varchar(200) NOT NULL DEFAULT 'img/default-profile.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`memberID`, `fName`, `lName`, `email`, `phone`, `username`, `password`, `eboard`, `role`, `oneCard`, `joinDate`, `pic`) VALUES
(14, 'Jake', 'Lee', 'Jake@jakelee.info', '', 'coolstuff14', 'password', '1', 'Treassure', '', '2016-03-08 07:13:32', 'img/profiles/profile-14.jpg'),
(42, 'Test', 'Person', 'email@email.com', '', 'TestPerson5', 'testpassword', '0', '', NULL, '2016-04-19 04:51:40', 'img/default-profile.png'),
(43, 'Test', 'Person', 'email@email.com', '', 'TestPerson6', 'password', '0', '', NULL, '2016-04-19 04:51:40', 'img/default-profile.png'),
(44, 'Test', 'Person', 'email@email.com', '', 'TestPerson7', 'password', '0', '', NULL, '2016-04-19 04:51:40', 'img/default-profile.png'),
(45, 'Test', 'Person', 'email@email.com', '', 'TestPerson8', 'password', '0', '', NULL, '2016-04-19 04:51:40', 'img/default-profile.png'),
(46, 'Test', 'Person', 'email@email.com', '', 'TestPerson9', 'password', '0', '', NULL, '2016-04-19 04:51:40', 'img/default-profile.png');

-- --------------------------------------------------------

--
-- Table structure for table `newsfeed`
--

CREATE TABLE `newsfeed` (
  `postID` int(4) NOT NULL,
  `postAuthor` varchar(30) NOT NULL,
  `postBody` longtext NOT NULL,
  `postTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `setting` varchar(200) NOT NULL,
  `value1` varchar(200) DEFAULT NULL,
  `value2` varchar(200) DEFAULT NULL,
  `value3` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`setting`, `value1`, `value2`, `value3`) VALUES
('current-theme', '', '', NULL),
('default-theme', 'skin-purple', '../img/dark_embroidery.png', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `signin`
--

CREATE TABLE `signin` (
  `signID` int(6) NOT NULL,
  `memberID` int(4) NOT NULL,
  `timeIn` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP
) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `downloads`
--
ALTER TABLE `downloads`
  ADD PRIMARY KEY (`linkID`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`jobID`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`memberID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `newsfeed`
--
ALTER TABLE `newsfeed`
  ADD PRIMARY KEY (`postID`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`setting`),
  ADD UNIQUE KEY `setting` (`setting`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `downloads`
--
ALTER TABLE `downloads`
  MODIFY `linkID` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `jobID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `memberID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `newsfeed`
--
ALTER TABLE `newsfeed`
  MODIFY `postID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `signin`
--
ALTER TABLE `signin`
  MODIFY `signID` int(6) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
