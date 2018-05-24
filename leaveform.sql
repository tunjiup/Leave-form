-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2018 at 11:57 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leaveform`
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lvf_leavebalance`
--

INSERT INTO `lvf_leavebalance` (`id`, `employee_id`, `vacationleave`, `sickleave`, `birthleave`, `created_at`) VALUES
(1, 1, '9.38/13.88', '10/10', '1', '2018-05-15 02:44:28'),
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
  `processedby` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lvf_leavehistory`
--

INSERT INTO `lvf_leavehistory` (`id`, `employee_id`, `title`, `types`, `reason`, `start`, `end`, `processedby`, `created_at`) VALUES
(1, 1, 'Leave', 'whole Day', 'Personal', '2018-05-23', '2018-05-23', 'admin', '2018-05-22 12:27:33'),
(2, 2, 'Leave', 'Whole Day', 'Personal', '2018-05-23', '2018-05-23', 'admin', '2018-05-23 12:41:36');

-- --------------------------------------------------------

--
-- Table structure for table `lvf_sessions`
--

CREATE TABLE `lvf_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lvf_sessions`
--

INSERT INTO `lvf_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('bbjbj6k3viatgs75n5mcih0s2l6jm8c7', '::1', 1527054626, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532373035343632363b),
('lj1obhdgg08crpsl374kb1tjpc05snn0', '::1', 1527055255, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532373035353235353b),
('em7dateibeqb2m1qet13kkbs2hss5khn', '::1', 1527055585, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532373035353538353b),
('5ajhccin5d8dn8pgjpg3rij52jcqd5le', '::1', 1527055899, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532373035353839393b),
('ckjn5mli6vfq1r4tr4vdsmmao45m9nic', '::1', 1527058518, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532373035383531383b),
('5mg0nh3dggjqt2h1smg308s6693f2djc', '::1', 1527059090, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532373035393039303b),
('biu8klfi4ki2l08vb52m47m8tarqh8sb', '::1', 1527059090, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532373035393039303b),
('gg540k7d670u3eoaic2qtka3allvepqf', '::1', 1527067284, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532373036373238333b),
('sm40gqp8rjre1bolba2iqeteb0jpol04', '::1', 1527127482, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532373132373438313b);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lvf_users`
--

INSERT INTO `lvf_users` (`userid`, `employee_id`, `username`, `password`, `fullname`, `address`, `email`, `cp_no`, `gender`, `role`, `activation_key`, `activate`, `resetpasskey`, `resetdate`, `active`, `lastactivity`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 1, 'mnaluz', '', NULL, NULL, 'MarkAnthony.Naluz@megasportsworld.com', NULL, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(2, 2, 'alizajoy', NULL, NULL, NULL, 'alizajoy.solomon@megasportsworld.com', NULL, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(3, 3, 'kristal', NULL, NULL, NULL, 'Kristallynn.Tolentino@megasportsworld.com', NULL, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(4, 4, 'resty', NULL, NULL, NULL, 'RestyJay.Alejo@megasportsworld.com', NULL, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(5, 5, 'jai28', NULL, NULL, NULL, 'Jai-Ann.Sotto@megasportsworld.com', NULL, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(6, 6, 'mgrace', NULL, NULL, NULL, 'MaryGraceEden.Basuel@megasportsworld.com', NULL, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(7, 7, 'xtian', NULL, NULL, NULL, 'Christian.Realubit@megasportsworld.com', NULL, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(8, 8, 'sherwin', NULL, NULL, NULL, 'SherwinNino.Macalintal@megasportsworld.com', NULL, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(9, 9, 'jpaul', NULL, NULL, NULL, 'JohnPaul.Quidilla@megasportsworld.com', NULL, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL);

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
