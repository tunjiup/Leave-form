-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 03, 2018 at 03:22 AM
-- Server version: 10.1.34-MariaDB
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
-- Table structure for table `lvf_comments`
--

CREATE TABLE `lvf_comments` (
  `id` int(15) NOT NULL,
  `userid` int(15) NOT NULL,
  `message` text CHARACTER SET utf8 NOT NULL,
  `status` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Stored all feedback of users';

--
-- Dumping data for table `lvf_comments`
--

INSERT INTO `lvf_comments` (`id`, `userid`, `message`, `status`, `created_at`) VALUES
(1, 1, 'mark sfjkasf', 'seen', '2018-06-27 12:45:03'),
(2, 1, 'sfasf asfasfas', 'seen', '2018-06-27 12:45:07');

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Stored all employees';

--
-- Dumping data for table `lvf_employee`
--

INSERT INTO `lvf_employee` (`id`, `name`, `dob`, `position`, `department`, `manager`, `departmenthead`, `created_at`) VALUES
(1, 'Mark Anthony Naluz', '1993-10-11', 'Web Developer', 'MSW - Webdev', 'Christian Realubit', 'Reynato Roallos Jr.', '2018-05-21 16:04:11'),
(2, 'Aliza Joy Solomon', '1996-05-31', 'Web Designer', 'MSW - Webdev', 'Christian Realubit', 'Reynato Roallos Jr.', '2018-05-21 16:04:11'),
(3, 'Kristallynn Tolentino', '1993-06-23', 'Web Developer', 'MSW - Webdev', 'Christian Realubit', 'Reynato Roallos Jr.', '2018-05-21 16:04:11'),
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Stored all leave balance';

--
-- Dumping data for table `lvf_leavebalance`
--

INSERT INTO `lvf_leavebalance` (`id`, `employee_id`, `vacationleave`, `sickleave`, `birthleave`, `created_at`) VALUES
(1, 1, '4.38/13.88', '10/10', '1', '2018-05-15 02:44:28'),
(2, 4, '0', '0', '1', '2018-05-21 16:04:11'),
(3, 3, '7.93/11.43', '10/10', '0', '2018-05-21 16:04:11'),
(4, 2, '5/11', '10/10', '1', '2018-05-21 16:04:11'),
(5, 5, '6/15', '5.5/10', '0', '2018-05-21 16:04:11'),
(6, 6, '10/15', '9/10', '1', '2018-05-21 16:04:11'),
(7, 7, '7/15', '9.5/10', '1', '2018-05-21 16:04:11'),
(8, 8, '4.5/15', '10/10', '1', '2018-05-22 16:25:13'),
(9, 9, '11.43/14.43', '10/10', '1', '2018-05-21 16:04:11');

-- --------------------------------------------------------

--
-- Table structure for table `lvf_leavehistory`
--

CREATE TABLE `lvf_leavehistory` (
  `id` int(11) NOT NULL,
  `employee_id` int(15) DEFAULT NULL COMMENT 'Store Employees ID',
  `code` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT 'use for tracking leave',
  `title` text CHARACTER SET utf8 NOT NULL COMMENT 'Types of Vacation',
  `types` varchar(100) CHARACTER SET utf8 DEFAULT NULL COMMENT 'With Pay / Without',
  `reason` text CHARACTER SET utf8 COMMENT 'Leave reasons',
  `reject_msg` text CHARACTER SET utf8 COMMENT 'Reason of rejecting',
  `start` date NOT NULL COMMENT 'Date leave start at',
  `end` date NOT NULL COMMENT 'Date leave end at',
  `days` varchar(11) CHARACTER SET utf8 NOT NULL COMMENT 'Leave count days',
  `classname` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT 'Leave status',
  `active` int(15) NOT NULL DEFAULT '0',
  `token` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'Leave token for email use',
  `processedby` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT 'Requestor',
  `created_at` datetime NOT NULL,
  `update_at` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Stored leave request, serves as history';

--
-- Dumping data for table `lvf_leavehistory`
--

INSERT INTO `lvf_leavehistory` (`id`, `employee_id`, `code`, `title`, `types`, `reason`, `reject_msg`, `start`, `end`, `days`, `classname`, `active`, `token`, `processedby`, `created_at`, `update_at`) VALUES
(1, 1, '804259', 'Vacation Leave', 'LWP', 'Personal', NULL, '2018-06-01', '2018-06-01', '1', 'Approved', 1, '', 'mnaluz', '2018-05-30 15:55:45', 2018),
(2, 1, '804359', 'Vacation Leave', 'LWP', 'Personal', NULL, '2018-06-04', '2018-06-05', '2', 'Approved', 1, '', 'mnaluz', '2018-05-30 16:07:14', NULL),
(3, 5, '814259', 'Birthday Leave', 'LWP', 'Yeheyyy! It\'s my birthday!!!!', NULL, '2018-07-12', '2018-07-12', '1', 'Approved', 1, '', 'jai28', '2018-06-06 11:59:49', NULL),
(4, 3, '704259', 'Birthday Leave', 'LWP', 'Birthday leave', NULL, '2018-06-22', '2018-06-22', '1', 'Approved', 1, '', 'kristal', '2018-06-06 12:02:58', NULL),
(5, 3, '815259', 'Vacation Leave', 'LWP', 'Personal', NULL, '2018-06-01', '2018-06-01', '1', 'Approved', 1, '', 'kristal', '2018-06-06 12:04:27', NULL),
(6, 3, '714259', 'Vacation Leave', 'LWP', 'Personal', NULL, '2018-06-11', '2018-06-11', '1', 'Approved', 1, '', 'kristal', '2018-06-06 12:06:11', NULL),
(9, 3, '874258', 'Vacation Leave', 'LWP', 'Personal', NULL, '2018-05-31', '2018-05-31', '0.5', 'Approved', 1, '', 'kristal', '2018-06-06 12:14:33', NULL),
(10, 3, '814257', 'Vacation Leave', 'LWP', 'Personal', NULL, '2018-05-28', '2018-05-28', '1', 'Approved', 1, '', 'kristal', '2018-06-06 12:15:26', NULL),
(17, 3, '549817', 'Emergency Leave', 'LWP', 'Family problem', NULL, '2018-06-20', '2018-06-20', '1', 'Pending', 1, 'PkLMtmUKAhjfIOSplYrBFT3deN2ZvD', 'kristal', '2018-06-21 08:48:26', NULL),
(20, 5, '260839', 'Sick Leave', 'LWP', 'body pain / flu', NULL, '2018-06-11', '2018-06-11', '1', 'Pending', 1, 'aHQqBjFExD8po9S0IzMhZcRKsdPibw', 'jai-ann', '2018-06-25 11:07:59', NULL),
(21, 1, '927864', 'Vacation Leave', 'LWP', 'Personal', NULL, '2018-06-30', '2018-06-30', '3', 'Pending', 1, 'jMIBxEnH4isaS870Pu9r6zUwkGhbXF', 'mnaluz', '2018-06-29 16:06:52', NULL),
(22, 1, '278016', 'Vacation Leave', 'LWP', 'Personal', NULL, '2018-07-02', '2018-07-02', '1', 'Pending', 1, 'w0yMJqxiHrUtj176Iza3mLhPDEsbnG', 'mnaluz', '2018-07-03 14:22:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lvf_login_history`
--

CREATE TABLE `lvf_login_history` (
  `id` int(15) NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 NOT NULL,
  `login_date` datetime NOT NULL,
  `logout_date` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Serves as history';

--
-- Dumping data for table `lvf_login_history`
--

INSERT INTO `lvf_login_history` (`id`, `username`, `login_date`, `logout_date`) VALUES
(1, 'aliza', '2018-06-29 10:38:32', '2018-06-29 10:53:36'),
(2, 'mnaluz', '2018-06-29 12:20:31', '2018-06-29 15:32:17'),
(3, 'mnaluz', '2018-06-29 15:25:30', '2018-06-29 15:32:17'),
(4, 'mnaluz', '2018-06-29 15:32:26', '2018-06-29 15:50:46'),
(5, 'mnaluz', '2018-06-29 16:03:34', '2018-06-29 16:52:10'),
(6, 'kristal', '2018-06-29 16:21:19', '2018-06-29 16:42:40'),
(7, 'resty', '2018-06-29 16:24:52', '2018-06-29 16:28:43'),
(8, 'resty', '2018-06-29 16:37:21', '2018-06-29 16:38:24'),
(9, 'kristal', '2018-06-29 16:54:10', '2018-06-29 17:00:53'),
(10, 'mnaluz', '2018-06-29 17:14:32', '2018-07-03 11:51:31'),
(11, 'kristal', '2018-06-29 17:16:32', NULL),
(12, 'resty', '2018-06-29 17:39:00', '2018-06-29 17:48:06'),
(13, 'mnaluz', '2018-07-03 11:32:33', '2018-07-03 11:51:31'),
(14, 'mnaluz', '2018-07-03 12:24:06', '2018-07-03 13:39:10'),
(15, 'mnaluz', '2018-07-03 14:06:12', '2018-07-03 14:10:47'),
(16, 'mnaluz', '2018-07-03 14:22:04', '2018-07-03 14:52:24');

-- --------------------------------------------------------

--
-- Table structure for table `lvf_movedate`
--

CREATE TABLE `lvf_movedate` (
  `id` int(15) NOT NULL,
  `leavecode` varchar(50) NOT NULL,
  `days` int(2) NOT NULL DEFAULT '0',
  `movefrom` date NOT NULL,
  `moveto` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Stored new request move date in leave';

--
-- Dumping data for table `lvf_movedate`
--

INSERT INTO `lvf_movedate` (`id`, `leavecode`, `days`, `movefrom`, `moveto`, `status`, `created_at`, `update_at`) VALUES
(1, '804259', 0, '2018-06-01', '2018-06-01', 'Approved', '2018-06-22 15:41:30', '2018-06-27 17:33:09');

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Users storage';

--
-- Dumping data for table `lvf_users`
--

INSERT INTO `lvf_users` (`userid`, `employee_id`, `username`, `password`, `fullname`, `address`, `email`, `cp_no`, `gender`, `role`, `activation_key`, `activate`, `resetpasskey`, `resetdate`, `active`, `lastactivity`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 1, 'mnaluz', '$2y$10$zaleWzW5mIjcOyxhVg0uzOBUSKOe2oXf7x9e2Hh4dnmmz9ilL6Cpi', 'Mark Anthony Naluz', 'Barangka Itaas, Mandaluyong City', 'MarkAnthony.Naluz@megasportsworld.com', '09063171476', 'male', 1, NULL, 1, NULL, '2018-06-28 17:24:42', 0, NULL, NULL, NULL, NULL, NULL),
(2, 2, 'aliza', '$2y$10$ZmpvaoucGgUKWWDS/Db.7.bhLooqjXTPso5opd5bn4j1iRAWl6Boq', 'Aliza Solomon', 'Pamplona Tres, Las Pinas City', 'alizajoy.solomon@megasportsworld.com', '+639175584786', 'female', 0, NULL, 1, NULL, '2018-06-06 10:52:41', 0, NULL, NULL, NULL, NULL, NULL),
(3, 3, 'kristal', '$2y$10$70iG3axLFGzsRckmApLQs.l7yQ8fkgjT1d3f4NX9bmNjUHUNTrl2C', 'Kristallynn Tolentino', 'QC', 'Kristallynn.Tolentino@megasportsworld.com', '+639565769881', 'female', 1, NULL, 1, NULL, '2018-06-29 16:20:30', 1, NULL, NULL, NULL, NULL, NULL),
(4, 4, 'resty', '$2y$10$RYE3Sp5629byweRZj19AAuIFnvsxhSyhtPwEGdT0c6w8HI/ZGZhvO', 'Resty Jay Alejo', 'Molino 4, Bacoor, Cavite', 'RestyJay.Alejo@megasportsworld.com', '+639061501183', 'male', 1, NULL, 1, NULL, '2018-06-29 16:23:51', 0, NULL, NULL, NULL, NULL, NULL),
(5, 5, 'jai-ann', '$2y$10$u6tnkfjhXLtOFwXvYOHsuOsdLDWnmp4NAtk/G5e.Zbb6shzTwcQ8y', 'Jai-Ann Sotto', '#24A S. marcelo St., Maysan, Valenzuela City', 'Jai-Ann.Sotto@megasportsworld.com', '+639178075413', 'female', 0, NULL, 1, NULL, '2018-06-25 11:01:42', 0, NULL, NULL, NULL, NULL, NULL),
(6, 6, 'mgrace', '$2y$10$AL3EOOYcBel2.s6BphWnsO8C8M0YrY//KFpiXDorEXi1oCcUpGsCa', 'Mary Grace Eden Basuel', 'Quezon City', 'MaryGraceEden.Basuel@megasportsworld.com', '09178061829', 'female', 0, NULL, 1, NULL, '2018-05-31 13:06:04', 0, NULL, NULL, NULL, NULL, NULL),
(7, 7, 'Cxian', '$2y$10$Dmd3c3FN0ZQQrpY44tLVhO6Y6BRegoe9mia/ovjhSXfZh15psLv1y', 'Christian Realubit', 'Makati City', 'christian.realubit@megasportsworld.com', '09178001624', 'male', 0, NULL, 1, 'O2ShTqPnYJNu95HebDoQ6pVMXgzrt0R1WZs43GyaiCKBvIwLcl', '2018-07-03 14:30:39', 0, NULL, NULL, NULL, NULL, NULL),
(8, 8, 'sherwin', '$2y$10$Wao.cqAcd0C58tNG.x2uR.3tQV/P8NChKtcO/5a9xHxQV3kHRGmTC', 'Sherwin Macalintal', 'Binan, Laguna', 'SherwinNino.Macalintal@megasportsworld.com', '+639175541122', 'male', 1, NULL, 1, NULL, '2018-05-30 16:41:29', 0, NULL, NULL, NULL, NULL, NULL),
(9, 9, 'quid', '$2y$10$5kk9mkITK068TDcycQrBmuT4isyeZpSYzxBVwM7lH7Ii6qTJQtER.', 'John Paul Quidilla', 'Edi sa puso mo &lt;3', 'JohnPaul.Quidilla@megasportsworld.com', '09173979547', 'male', 0, NULL, 1, NULL, '2018-06-25 11:04:38', 0, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lvf_comments`
--
ALTER TABLE `lvf_comments`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `lvf_login_history`
--
ALTER TABLE `lvf_login_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lvf_movedate`
--
ALTER TABLE `lvf_movedate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lvf_users`
--
ALTER TABLE `lvf_users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lvf_comments`
--
ALTER TABLE `lvf_comments`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `lvf_login_history`
--
ALTER TABLE `lvf_login_history`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `lvf_movedate`
--
ALTER TABLE `lvf_movedate`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lvf_users`
--
ALTER TABLE `lvf_users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
