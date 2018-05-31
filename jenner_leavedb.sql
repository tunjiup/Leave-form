-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 31, 2018 at 02:32 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jenner_leavedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `lvf_employee`
--

CREATE TABLE `lvf_employee` (
  `id` int(15) NOT NULL,
  `name` varchar(100) NOT NULL,
  `dob` date DEFAULT NULL,
  `position` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `manager` varchar(100) NOT NULL,
  `departmenthead` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lvf_employee`
--

INSERT INTO `lvf_employee` (`id`, `name`, `dob`, `position`, `department`, `manager`, `departmenthead`, `created_at`) VALUES
(1, 'Mark Anthony Naluz', '1993-10-11', 'Web Developer', 'MSW - Webdev', 'Christian Realubit', 'Reynato Roallos Jr.', '2018-05-21 16:04:11'),
(2, 'Aliza Joy Solomon', '1996-05-31', 'Web Designer', 'MSW - Webdev', 'Christian Realubit', 'Reynato Roallos Jr.', '2018-05-21 16:04:11'),
(3, 'Kristallynn Tolentino', '1993-06-23', 'Web Designer', 'MSW - Webdev', 'Christian Realubit', 'Reynato Roallos Jr.', '2018-05-21 16:04:11'),
(4, 'Resty Jay Alejo', '1993-05-06', 'Jr. Web Developer', 'MSW - Webdev', 'Christian Realubit', 'Reynato Roallos Jr.', '2018-05-21 16:04:11'),
(5, 'Jai-Ann Sotto', '1991-07-12', 'System Analyst', 'MSW - Webdev', 'Mary grace eden Basuel', 'Reynato Roallos Jr.', '2018-05-21 16:04:11'),
(6, 'Mary grace eden basuel', '1986-09-18', 'Project manager', 'MSW - Webdev', 'Reynato Roallos Jr.', 'Jeff Mann', '2018-05-21 16:04:11'),
(7, 'Christian Realubit', '1984-07-06', 'Dev manager', 'MSW - Webdev', 'Reynato Roallos Jr.', 'Jeff Mann', '2018-05-21 16:04:11'),
(8, 'Sherwin Macalintal', '1986-09-11', 'Web Developer', 'MSW - Webdev', 'Christian Realubit', 'Reynato Roallos Jr.', '2018-05-21 16:04:11'),
(9, 'John Paul Quidilla', '1994-11-08', 'QA Analyst', 'MSW - Webdev', 'Mary grace eden basuel', 'Reynato Roallos Jr.', '2018-05-21 16:04:11');

-- --------------------------------------------------------

--
-- Table structure for table `lvf_leavebalance`
--

CREATE TABLE `lvf_leavebalance` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `vacationleave` varchar(50) DEFAULT NULL,
  `sickleave` varchar(50) DEFAULT NULL,
  `birthleave` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lvf_leavebalance`
--

INSERT INTO `lvf_leavebalance` (`id`, `employee_id`, `vacationleave`, `sickleave`, `birthleave`, `created_at`) VALUES
(1, 1, '6.38/13.88', '10/10', '1', '2018-05-15 02:44:28'),
(2, 4, '0', '0', '1', '2018-05-21 16:04:11'),
(3, 3, '11.43/11.43', '10/10', '1', '2018-05-21 16:04:11'),
(4, 2, '10.96/4.96', '10/10', '1', '2018-05-21 16:04:11'),
(5, 5, '6/15', '5.5/10', '1', '2018-05-21 16:04:11'),
(6, 6, '10/15', '9/10', '1', '2018-05-21 16:04:11'),
(7, 7, '7/15', '9.5/10', '1', '2018-05-21 16:04:11'),
(8, 8, '4.5/15', '10/10', '1', '2018-05-22 16:25:13'),
(9, 9, '12.43/14.43', '8/10', '1', '2018-05-21 16:04:11');

-- --------------------------------------------------------

--
-- Table structure for table `lvf_leavehistory`
--

CREATE TABLE `lvf_leavehistory` (
  `id` int(11) NOT NULL,
  `employee_id` int(15) DEFAULT NULL,
  `title` text NOT NULL,
  `types` varchar(100) DEFAULT NULL,
  `reason` text,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `days` varchar(11) NOT NULL,
  `processedby` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lvf_leavehistory`
--

INSERT INTO `lvf_leavehistory` (`id`, `employee_id`, `title`, `types`, `reason`, `start`, `end`, `days`, `processedby`, `created_at`) VALUES
(1, 1, 'Vacation Leave', 'LWP', 'Personal', '2018-06-01', '2018-06-01', '1', 'mnaluz', '2018-05-30 15:55:45'),
(2, 1, 'Vacation Leave', 'LWP', 'Personal', '2018-06-04', '2018-06-05', '2', 'mnaluz', '2018-05-30 16:07:14');

-- --------------------------------------------------------

--
-- Table structure for table `lvf_sessions`
--

CREATE TABLE `lvf_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lvf_sessions`
--

INSERT INTO `lvf_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('3v22os1i58uf8g53vrlp4i40dun7559j', '202.151.35.180', 1527746934, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532373734363932353b7573657269647c733a313a2231223b6b65797c4e3b656d7069647c733a313a2231223b756e616d657c733a363a226d6e616c757a223b656d61696c7c733a33373a224d61726b416e74686f6e792e4e616c757a406d65676173706f727473776f726c642e636f6d223b66756c6c6e616d657c733a31383a224d61726b20416e74686f6e79204e616c757a223b6c6f676765645f696e7c623a313b),
('a87a3od1tm75qurm0eilr4f3d9o4hh4o', '202.151.35.180', 1527746357, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532373734363237323b7573657269647c733a313a2231223b6b65797c4e3b656d7069647c733a313a2231223b756e616d657c733a363a226d6e616c757a223b656d61696c7c733a33373a224d61726b416e74686f6e792e4e616c757a406d65676173706f727473776f726c642e636f6d223b66756c6c6e616d657c733a31383a224d61726b20416e74686f6e79204e616c757a223b6c6f676765645f696e7c623a313b),
('a47pm24h0i6l2sglf8231vc8n1dka1tb', '202.151.35.180', 1527744754, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532373734343734383b7573657269647c733a313a2231223b6b65797c4e3b656d7069647c733a313a2231223b756e616d657c733a363a226d6e616c757a223b656d61696c7c733a33373a224d61726b416e74686f6e792e4e616c757a406d65676173706f727473776f726c642e636f6d223b66756c6c6e616d657c733a31383a224d61726b20416e74686f6e79204e616c757a223b6c6f676765645f696e7c623a313b),
('7q1fin9aphos8qkl7jqqjc557c51qr5v', '202.151.35.180', 1527743328, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532373734333131303b7573657269647c733a313a2236223b6b65797c4e3b656d7069647c733a313a2236223b756e616d657c733a363a226d6772616365223b656d61696c7c733a34303a224d61727947726163654564656e2e42617375656c406d65676173706f727473776f726c642e636f6d223b66756c6c6e616d657c4e3b6c6f676765645f696e7c623a313b),
('pjv10asu8rtl4uc4e89vdj6govip27ha', '202.151.35.180', 1527732836, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532373733323730373b),
('5qmlovgqrth2cp32fa8kggqkphhbb3lk', '202.151.35.180', 1527732881, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532373733323835333b7573657269647c733a313a2231223b6b65797c4e3b656d7069647c733a313a2231223b756e616d657c733a363a226d6e616c757a223b656d61696c7c733a33373a224d61726b416e74686f6e792e4e616c757a406d65676173706f727473776f726c642e636f6d223b66756c6c6e616d657c733a31383a224d61726b20416e74686f6e79204e616c757a223b6c6f676765645f696e7c623a313b),
('5e74mtvjdrgjdglr3v1no10tkgfgeccf', '202.151.35.180', 1527738668, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532373733383636373b7573657269647c733a313a2231223b6b65797c4e3b656d7069647c733a313a2231223b756e616d657c733a363a226d6e616c757a223b656d61696c7c733a33373a224d61726b416e74686f6e792e4e616c757a406d65676173706f727473776f726c642e636f6d223b66756c6c6e616d657c733a31383a224d61726b20416e74686f6e79204e616c757a223b6c6f676765645f696e7c623a313b),
('o2e7smu766faiu5tkna5km4va143qbns', '202.151.35.180', 1527740194, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532373733393935373b7573657269647c733a313a2231223b6b65797c4e3b656d7069647c733a313a2231223b756e616d657c733a363a226d6e616c757a223b656d61696c7c733a33373a224d61726b416e74686f6e792e4e616c757a406d65676173706f727473776f726c642e636f6d223b66756c6c6e616d657c733a31383a224d61726b20416e74686f6e79204e616c757a223b6c6f676765645f696e7c623a313b);

-- --------------------------------------------------------

--
-- Table structure for table `lvf_users`
--

CREATE TABLE `lvf_users` (
  `userid` int(11) NOT NULL,
  `employee_id` int(15) DEFAULT NULL,
  `username` varchar(50) CHARACTER SET utf8 NOT NULL,
  `password` text CHARACTER SET utf8,
  `fullname` varchar(255) CHARACTER SET ucs2 DEFAULT NULL,
  `address` text CHARACTER SET utf8,
  `email` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `cp_no` varchar(13) DEFAULT NULL,
  `gender` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `role` int(2) NOT NULL DEFAULT '0',
  `activation_key` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `activate` int(2) NOT NULL DEFAULT '0',
  `resetpasskey` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `resetdate` datetime DEFAULT NULL,
  `active` int(2) NOT NULL DEFAULT '0',
  `lastactivity` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `updated_by` varchar(50) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lvf_users`
--

INSERT INTO `lvf_users` (`userid`, `employee_id`, `username`, `password`, `fullname`, `address`, `email`, `cp_no`, `gender`, `role`, `activation_key`, `activate`, `resetpasskey`, `resetdate`, `active`, `lastactivity`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 1, 'mnaluz', '$2y$10$AL3EOOYcBel2.s6BphWnsO8C8M0YrY//KFpiXDorEXi1oCcUpGsCa', 'Mark Anthony Naluz', 'Barangka Itaas, Mandaluyong City', 'MarkAnthony.Naluz@megasportsworld.com', '9063171476', 'male', 0, NULL, 1, NULL, '2018-05-30 14:34:07', 0, NULL, NULL, NULL, NULL, NULL),
(2, 2, 'alizajoy', '$2y$10$VCKjM5vhqFxb4gVByg6Nme9j5H5qCyMsjTO7LvEAFxbPXO0vPBPVS', NULL, NULL, 'alizajoy.solomon@megasportsworld.com', NULL, NULL, 0, NULL, 1, NULL, '2018-05-30 16:26:21', 0, NULL, NULL, NULL, NULL, NULL),
(3, 3, 'kristal', NULL, NULL, NULL, 'Kristallynn.Tolentino@megasportsworld.com', NULL, NULL, 0, NULL, 1, '1b6EWCAGtdRiFBoSqT34KzNrpHQxf9DksmJa2g8cMOjXnh75Pw', NULL, 0, NULL, NULL, NULL, NULL, NULL),
(4, 4, 'resty', NULL, NULL, NULL, 'RestyJay.Alejo@megasportsworld.com', NULL, NULL, 0, NULL, 1, 'Gx4pskTNWbSoh8KRm65ctOgIXEraQAqZed29FnjfHLuJ7DUB1z', NULL, 0, NULL, NULL, NULL, NULL, NULL),
(5, 5, 'jai28', '$2y$10$yBlMeCcOHJotVRvl25bFbeToNSPliQBRBMOlT3Uad2EzBSptYuRtK', NULL, NULL, 'Jai-Ann.Sotto@megasportsworld.com', NULL, NULL, 0, NULL, 1, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(6, 6, 'mgrace', '$2y$10$AL3EOOYcBel2.s6BphWnsO8C8M0YrY//KFpiXDorEXi1oCcUpGsCa', 'Mary Grace Eden Basuel', 'Quezon City', 'MaryGraceEden.Basuel@megasportsworld.com', '09178061829', 'female', 0, NULL, 1, NULL, '2018-05-31 13:06:04', 0, NULL, NULL, NULL, NULL, NULL),
(7, 7, 'xtian', NULL, NULL, NULL, 'Christian.Realubit@megasportsworld.com', NULL, NULL, 0, NULL, 1, 'rWOvHoi4yaUM7qF8PT3BsIDxYpnXNcAtZwuEb9QhjdCK1VkGLJ', NULL, 0, NULL, NULL, NULL, NULL, NULL),
(8, 8, 'sherwin', '$2y$10$yBlMeCcOHJotVRvl25bFbeToNSPliQBRBMOlT3Uad2EzBSptYuRtK', NULL, NULL, 'SherwinNino.Macalintal@megasportsworld.com', NULL, NULL, 0, NULL, 1, NULL, '2018-05-30 16:41:29', 0, NULL, NULL, NULL, NULL, NULL),
(9, 9, 'jpaul', NULL, NULL, NULL, 'JohnPaul.Quidilla@megasportsworld.com', NULL, NULL, 0, NULL, 1, 'LO01WDtM9kbvAN7irqCJheG8uaPESpgZI2cXHwzTR4V3fFoKyd', NULL, 0, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lvf_employee`
--
ALTER TABLE `lvf_employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lvf_leavebalance`
--
ALTER TABLE `lvf_leavebalance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lvf_leavehistory`
--
ALTER TABLE `lvf_leavehistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lvf_sessions`
--
ALTER TABLE `lvf_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `lvf_users`
--
ALTER TABLE `lvf_users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lvf_employee`
--
ALTER TABLE `lvf_employee`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `lvf_leavebalance`
--
ALTER TABLE `lvf_leavebalance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `lvf_leavehistory`
--
ALTER TABLE `lvf_leavehistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lvf_users`
--
ALTER TABLE `lvf_users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
