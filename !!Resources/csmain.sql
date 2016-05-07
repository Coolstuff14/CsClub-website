-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2016 at 12:19 AM
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
(24, '2016-05-06 00:08:23', 14, 'Finish Admin Page', 'Finish for final presentation', '6 Things Left', 'Jake', 'In Progress', 'Normal'),
(25, '2016-05-06 00:08:43', 14, 'Test2', 'fsaeg', 'gasgg', 'Test', 'New', 'Urgent'),
(26, '2016-05-06 00:08:56', 14, 'Test3', 'fewsf', 'efgWEA', 'Jake', 'In Progress', 'Normal'),
(27, '2016-05-06 00:09:13', 14, 'Test4', 'fewafg', 'gergaewrgag', 'All', 'New', 'Urgent'),
(28, '2016-05-06 00:10:45', 14, 'Done one', '', '', 'All', 'Complete', 'Normal');

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
  `pic` varchar(200) NOT NULL DEFAULT 'img/default-profile.png',
  `active` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`memberID`, `fName`, `lName`, `email`, `phone`, `username`, `password`, `eboard`, `role`, `oneCard`, `joinDate`, `pic`, `active`) VALUES
(14, 'Jake', 'Lee', 'Jake@jakelee.info', '', 'coolstuff14', 'password', '1', 'Treassure', '', '2016-03-08 07:13:32', 'img/profiles/profile-14.jpg', 1),
(52, 'Test', 'Person', 'email@email.com', NULL, 'TestPerson4', 'password', '1', 'President', NULL, '2016-05-05 01:13:55', 'img/default-profile.png', 1),
(53, 'Test', 'Person', 'email@email.com', NULL, 'TestPerson5', 'password1', '0', '', NULL, '2016-05-05 01:13:55', 'img/default-profile.png', 1),
(54, 'Test', 'Person', 'email@email.com', NULL, 'TestPerson6', 'password', '0', '', NULL, '2016-05-05 01:13:55', 'img/default-profile.png', 0);

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

--
-- Dumping data for table `newsfeed`
--

INSERT INTO `newsfeed` (`postID`, `postAuthor`, `postBody`, `postTime`) VALUES
(104, 'Jake', '&lt;h1 style=&quot;text-align: center; &quot;&gt;&lt;span style=&quot;background-color: rgb(255, 255, 0);&quot;&gt;&lt;b&gt;THE BEST BLOG EVER&lt;/b&gt;&lt;/span&gt;&lt;/h1&gt;&lt;h1 style=&quot;text-align: center; &quot;&gt;&lt;img src=&quot;http://vignette4.wikia.nocookie.net/disneycreate/images/5/53/Not_bad.jpeg/revision/latest?cb=20131018195503&quot; style=&quot;width: 558px;&quot;&gt;&lt;span style=&quot;background-color: rgb(255, 255, 0);&quot;&gt;&lt;b&gt;&lt;br&gt;&lt;/b&gt;&lt;/span&gt;&lt;/h1&gt;', '2016-05-06 19:02:17');

-- --------------------------------------------------------

--
-- Table structure for table `notify`
--

CREATE TABLE `notify` (
  `notifyID` int(4) NOT NULL,
  `notifyCont` varchar(100) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notify`
--

INSERT INTO `notify` (`notifyID`, `notifyCont`, `time`) VALUES
(266, '&lt;i class=&quot;fa fa-thumb-tack text-green&quot;&gt;&lt;/i&gt;Task Finish Admin Page created by J', '2016-05-06 00:08:23'),
(267, '&lt;i class=&quot;fa fa-thumb-tack text-green&quot;&gt;&lt;/i&gt;Task Test2 created by Jake', '2016-05-06 00:08:43'),
(268, '&lt;i class=&quot;fa fa-thumb-tack text-green&quot;&gt;&lt;/i&gt;Task Test3 created by Jake', '2016-05-06 00:08:56'),
(269, '&lt;i class=&quot;fa fa-thumb-tack text-green&quot;&gt;&lt;/i&gt;Task Test4 created by Jake', '2016-05-06 00:09:13'),
(270, '&lt;i class=&quot;fa fa-thumb-tack text-green&quot;&gt;&lt;/i&gt;Task Done one created by Jake', '2016-05-06 00:10:45'),
(271, '&lt;i class=&quot;fa fa-pencil-square-o text-yellow&quot;&gt;&lt;/i&gt;Task Finish Admin Page update', '2016-05-06 00:10:56'),
(272, '&lt;i class=&quot;fa fa-pencil-square-o text-yellow&quot;&gt;&lt;/i&gt;Task Finish Admin Page update', '2016-05-06 00:11:19'),
(273, '&lt;i class=&quot;fa fa-newspaper-o text-aqua&quot;&gt;&lt;/i&gt;New post in newsfeed by Jake', '2016-05-06 00:35:25'),
(274, '&lt;i class=&quot;fa fa-trash text-red&quot;&gt;&lt;/i&gt;Newsfeed post deleted by Jake', '2016-05-06 00:35:31'),
(275, '&lt;i class=&quot;fa fa-user text-green&quot;&gt;&lt;/i&gt;Jake reactivated user account Test', '2016-05-06 00:47:17'),
(276, '&lt;i class=&quot;fa fa-link text-blue&quot;&gt;&lt;/i&gt;New resource added by Jake', '2016-05-06 02:06:20'),
(277, '&lt;i class=&quot;fa fa-link text-blue&quot;&gt;&lt;/i&gt;New resource added by Jake', '2016-05-06 02:41:45'),
(278, '&lt;i class=&quot;fa fa-link text-blue&quot;&gt;&lt;/i&gt;New resource added by Jake', '2016-05-06 02:44:29'),
(279, '&lt;i class=&quot;fa fa-link text-blue&quot;&gt;&lt;/i&gt;New resource added by Jake', '2016-05-06 02:45:44'),
(280, '&lt;i class=&quot;fa fa-link text-blue&quot;&gt;&lt;/i&gt;New resource added by Jake', '2016-05-06 02:47:43'),
(281, '&lt;i class=&quot;fa fa-link text-blue&quot;&gt;&lt;/i&gt;New resource added by Jake', '2016-05-06 02:48:19'),
(282, '&lt;i class=&quot;fa fa-link text-blue&quot;&gt;&lt;/i&gt;New resource added by Jake', '2016-05-06 02:50:45'),
(283, '&lt;i class=&quot;fa fa-link text-blue&quot;&gt;&lt;/i&gt;New resource added by Jake', '2016-05-06 02:52:18'),
(284, '&lt;i class=&quot;fa fa-link text-blue&quot;&gt;&lt;/i&gt;New resource added by Jake', '2016-05-06 02:53:14'),
(285, '&lt;i class=&quot;fa fa-link text-blue&quot;&gt;&lt;/i&gt;New resource added by Jake', '2016-05-06 03:07:26'),
(286, '&lt;i class=&quot;fa fa-link text-blue&quot;&gt;&lt;/i&gt;New resource added by Jake', '2016-05-06 03:08:48'),
(287, '&lt;i class=&quot;fa fa-link text-blue&quot;&gt;&lt;/i&gt;New resource added by Jake', '2016-05-06 03:19:00'),
(288, '&lt;i class=&quot;fa fa-link text-blue&quot;&gt;&lt;/i&gt;New resource added by Jake', '2016-05-06 03:20:30'),
(289, '&lt;i class=&quot;fa fa-link text-blue&quot;&gt;&lt;/i&gt;New resource added by Jake', '2016-05-06 03:22:15'),
(290, '&lt;i class=&quot;fa fa-trash text-red&quot;&gt;&lt;/i&gt;Resource deleted by Jake', '2016-05-06 03:37:00'),
(291, '&lt;i class=&quot;fa fa-trash text-red&quot;&gt;&lt;/i&gt;Resource deleted by Jake', '2016-05-06 03:37:04'),
(292, '&lt;i class=&quot;fa fa-trash text-red&quot;&gt;&lt;/i&gt;Resource deleted by Jake', '2016-05-06 03:37:07'),
(293, '&lt;i class=&quot;fa fa-trash text-red&quot;&gt;&lt;/i&gt;Resource deleted by Jake', '2016-05-06 03:37:09'),
(294, '&lt;i class=&quot;fa fa-trash text-red&quot;&gt;&lt;/i&gt;Resource deleted by Jake', '2016-05-06 03:37:11'),
(295, '&lt;i class=&quot;fa fa-trash text-red&quot;&gt;&lt;/i&gt;Resource deleted by Jake', '2016-05-06 03:37:13'),
(296, '&lt;i class=&quot;fa fa-trash text-red&quot;&gt;&lt;/i&gt;Resource deleted by Jake', '2016-05-06 03:37:15'),
(297, '&lt;i class=&quot;fa fa-trash text-red&quot;&gt;&lt;/i&gt;Resource deleted by Jake', '2016-05-06 03:37:16'),
(298, '&lt;i class=&quot;fa fa-trash text-red&quot;&gt;&lt;/i&gt;Resource deleted by Jake', '2016-05-06 03:37:22'),
(299, '&lt;i class=&quot;fa fa-trash text-red&quot;&gt;&lt;/i&gt;Resource deleted by Jake', '2016-05-06 03:37:23'),
(300, '&lt;i class=&quot;fa fa-trash text-red&quot;&gt;&lt;/i&gt;Resource deleted by Jake', '2016-05-06 03:37:24'),
(301, '&lt;i class=&quot;fa fa-trash text-red&quot;&gt;&lt;/i&gt;Resource deleted by Jake', '2016-05-06 03:37:25'),
(302, '&lt;i class=&quot;fa fa-pencil-square-o text-yellow&quot;&gt;&lt;/i&gt;Task Finish Admin Page update', '2016-05-06 18:53:34'),
(303, '&lt;i class=&quot;fa fa-pencil-square-o text-yellow&quot;&gt;&lt;/i&gt;Task Finish Admin Page update', '2016-05-06 18:54:08'),
(304, '&lt;i class=&quot;fa fa-times text-red&quot;&gt;&lt;/i&gt;Jake deactivated user account Test', '2016-05-06 18:55:11'),
(305, '&lt;i class=&quot;fa fa-user text-green&quot;&gt;&lt;/i&gt;Jake reactivated user account Test', '2016-05-06 18:56:20'),
(306, '&lt;i class=&quot;fa fa-pencil-square-o text-green&quot;&gt;&lt;/i&gt;Jake added Test to eboard ', '2016-05-06 18:56:35'),
(307, '&lt;i class=&quot;fa fa-times text-red&quot;&gt;&lt;/i&gt;Jake removed Test from eboard ', '2016-05-06 18:57:31'),
(308, '&lt;i class=&quot;fa fa-link text-blue&quot;&gt;&lt;/i&gt;New resource added by Jake', '2016-05-06 18:58:47'),
(309, '&lt;i class=&quot;fa fa-trash text-red&quot;&gt;&lt;/i&gt;Resource deleted by Jake', '2016-05-06 18:59:22'),
(310, '&lt;i class=&quot;fa fa-newspaper-o text-aqua&quot;&gt;&lt;/i&gt;New post in newsfeed by Jake', '2016-05-06 19:02:17'),
(311, '&lt;i class=&quot;fa fa-times text-red&quot;&gt;&lt;/i&gt;Jake removed Test from eboard ', '2016-05-06 19:04:43'),
(312, '&lt;i class=&quot;fa fa-pencil-square-o text-green&quot;&gt;&lt;/i&gt;Jake added Test to eboard ', '2016-05-06 19:05:00'),
(313, '&lt;i class=&quot;fa fa-times text-red&quot;&gt;&lt;/i&gt;Jake deactivated user account Test', '2016-05-06 19:05:06'),
(314, '&lt;i class=&quot;fa fa-user text-green&quot;&gt;&lt;/i&gt;Jake reactivated user account Test', '2016-05-06 19:05:40');

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `resourceID` int(4) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `url` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`resourceID`, `title`, `description`, `url`) VALUES
(1, 'Google Search', 'The best search engine in existance', 'https://www.google.com/'),
(2, 'Hackaday', 'An awesome hacking website', 'http://hackaday.com/'),
(3, 'My Resume', 'OMG so goooooood', 'uploads/resources/resume.pdf');

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
-- Indexes for table `notify`
--
ALTER TABLE `notify`
  ADD PRIMARY KEY (`notifyID`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`resourceID`);

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
  MODIFY `jobID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `memberID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `newsfeed`
--
ALTER TABLE `newsfeed`
  MODIFY `postID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
--
-- AUTO_INCREMENT for table `notify`
--
ALTER TABLE `notify`
  MODIFY `notifyID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=315;
--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `resourceID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
