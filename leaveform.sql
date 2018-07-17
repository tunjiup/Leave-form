-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2018 at 06:15 AM
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
-- Table structure for table `lvf_comments`
--

CREATE TABLE `lvf_comments` (
  `id` int(15) NOT NULL,
  `userid` int(15) NOT NULL,
  `message` text CHARACTER SET utf8 NOT NULL,
  `status` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Stored all feedback of users';

--
-- Dumping data for table `lvf_comments`
--

INSERT INTO `lvf_comments` (`id`, `userid`, `message`, `status`, `created_at`) VALUES
(1, 2, 'Mark', 'hide', '2018-07-16 17:06:27'),
(2, 2, 'Mark', 'hide', '2018-07-16 17:14:43'),
(3, 2, 'Hey', 'seen', '2018-07-16 17:29:09'),
(4, 2, 'hey', 'seen', '2018-07-17 09:23:06'),
(5, 2, 'mark', 'seen', '2018-07-17 09:23:19'),
(6, 2, 'aliza to hoi', 'seen', '2018-07-17 09:23:35'),
(7, 2, 'She', 'seen', '2018-07-17 09:25:15'),
(8, 2, 'Mark yeah', 'seen', '2018-07-17 09:28:08'),
(9, 2, 'This is not a role one hahahaha', 'seen', '2018-07-17 12:03:14'),
(10, 2, 'Mark hahaha', 'seen', '2018-07-17 12:11:21'),
(11, 2, 'hey', 'seen', '2018-07-17 12:11:35'),
(12, 2, 'lsfas sfas', 'seen', '2018-07-17 12:14:27');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Stored all employees';

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
(9, 'John Paul Quidilla', '1994-11-08', 'QA Analyst', 'MSW - Webdev', 'Mary grace eden basuel', 'Reynato Roallos Jr.', '2018-05-21 16:04:11'),
(23, 'Mark anthony Naluz', '1995-08-16', 'Web Dev', 'MSW - Webdev', 'Christian Realubit', 'Reynato Roallos Jr.', '2018-07-16 17:57:08');

-- --------------------------------------------------------

--
-- Table structure for table `lvf_holidays`
--

CREATE TABLE `lvf_holidays` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `date` date NOT NULL,
  `observed` date NOT NULL,
  `public` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lvf_holidays`
--

INSERT INTO `lvf_holidays` (`id`, `name`, `date`, `observed`, `public`) VALUES
(1, 'Araw ng Kabayanihan ni Ninoy Aquino', '2018-08-21', '2018-08-21', 0),
(2, 'Eidul Adha / Araw ng kurban', '2018-08-21', '2018-08-21', 1),
(3, 'Araw ng mga Bayani', '2018-08-27', '2018-08-27', 1),
(4, 'Undás; Todos los Santos; Araw ng mga Santo ', '2018-11-01', '2018-11-01', 0),
(5, 'Araw ng mga Pata', '2018-11-02', '2018-11-02', 0),
(6, 'Araw ng Kapanganakan ni Bonifacio', '2018-11-30', '2018-11-30', 1),
(7, 'Araw ng Pasko', '2018-12-25', '2018-12-25', 1),
(8, 'Paggunita sa Kamatayan ni Dr. Jose Rizal', '2018-12-30', '2018-12-30', 1),
(9, 'Araw ng Bagong Taon', '2019-01-01', '2019-01-01', 1),
(10, 'Bagong Taon ng mga Tsino ', '2019-02-05', '2019-02-05', 0),
(11, 'Araw ng Kagitingan', '2019-04-09', '2019-04-09', 1),
(12, 'Huwebes Santo', '2019-04-18', '2019-04-18', 1),
(13, 'Biyernes Santo', '2019-04-19', '2019-04-19', 1),
(14, 'Sábado de Gloria; Sabado ng Gloria', '2019-04-20', '2019-04-20', 0),
(15, 'Araw ng mga Manggagawa', '2019-05-01', '2019-05-01', 1),
(16, 'Araw ng Kalayaan', '2019-06-12', '2019-06-12', 1),
(17, 'Araw ng Kabayanihan ni Ninoy Aquino', '2019-08-21', '2019-08-21', 0),
(18, 'Araw ng mga Bayani', '2019-08-26', '2019-08-26', 1),
(19, 'Undás; Todos los Santos; Araw ng mga Santo ', '2019-11-01', '2019-11-01', 0),
(20, 'Araw ng mga Pata', '2019-11-02', '2019-11-02', 0),
(21, 'Araw ng Kapanganakan ni Bonifacio', '2019-11-30', '2019-11-30', 1),
(22, 'Araw ng Pasko', '2019-12-25', '2019-12-25', 1),
(23, 'Paggunita sa Kamatayan ni Dr. Jose Rizal', '2019-12-30', '2019-12-30', 1),
(24, 'Araw ng Bagong Taon', '2020-01-01', '2020-01-01', 1),
(25, 'Bagong Taon ng mga Tsino ', '2020-01-25', '2020-01-25', 0),
(26, 'Araw ng Kagitingan', '2020-04-09', '2020-04-09', 1),
(27, 'Huwebes Santo', '2020-04-09', '2020-04-09', 1),
(28, 'Biyernes Santo', '2020-04-10', '2020-04-10', 1),
(29, 'Sábado de Gloria; Sabado ng Gloria', '2020-04-11', '2020-04-11', 0),
(30, 'Araw ng mga Manggagawa', '2020-05-01', '2020-05-01', 1),
(31, 'Araw ng Kalayaan', '2020-06-12', '2020-06-12', 1),
(32, 'Araw ng Kabayanihan ni Ninoy Aquino', '2020-08-21', '2020-08-21', 0),
(33, 'Araw ng mga Bayani', '2020-08-31', '2020-08-31', 1),
(34, 'Undás; Todos los Santos; Araw ng mga Santo ', '2020-11-01', '2020-11-01', 0),
(35, 'Araw ng mga Pata', '2020-11-02', '2020-11-02', 0),
(36, 'Araw ng Kapanganakan ni Bonifacio', '2020-11-30', '2020-11-30', 1),
(37, 'Araw ng Pasko', '2020-12-25', '2020-12-25', 1),
(38, 'Paggunita sa Kamatayan ni Dr. Jose Rizal', '2020-12-30', '2020-12-30', 1),
(39, 'Araw ng Bagong Taon', '2021-01-01', '2021-01-01', 1),
(40, 'Bagong Taon ng mga Tsino ', '2021-02-12', '2021-02-12', 0),
(41, 'Huwebes Santo', '2021-04-01', '2021-04-01', 1),
(42, 'Biyernes Santo', '2021-04-02', '2021-04-02', 1),
(43, 'Sábado de Gloria; Sabado ng Gloria', '2021-04-03', '2021-04-03', 0),
(44, 'Araw ng Kagitingan', '2021-04-09', '2021-04-09', 1),
(45, 'Araw ng mga Manggagawa', '2021-05-01', '2021-05-01', 1),
(46, 'Araw ng Kalayaan', '2021-06-12', '2021-06-12', 1),
(47, 'Araw ng Kabayanihan ni Ninoy Aquino', '2021-08-21', '2021-08-21', 0),
(48, 'Araw ng mga Bayani', '2021-08-30', '2021-08-30', 1),
(49, 'Undás; Todos los Santos; Araw ng mga Santo ', '2021-11-01', '2021-11-01', 0),
(50, 'Araw ng mga Pata', '2021-11-02', '2021-11-02', 0),
(51, 'Araw ng Kapanganakan ni Bonifacio', '2021-11-30', '2021-11-30', 1),
(52, 'Araw ng Pasko', '2021-12-25', '2021-12-25', 1),
(53, 'Paggunita sa Kamatayan ni Dr. Jose Rizal', '2021-12-30', '2021-12-30', 1),
(54, 'Araw ng Bagong Taon', '2022-01-01', '2022-01-01', 1),
(55, 'Bagong Taon ng mga Tsino ', '2022-02-01', '2022-02-01', 0),
(56, 'Araw ng Kagitingan', '2022-04-09', '2022-04-09', 1),
(57, 'Huwebes Santo', '2022-04-14', '2022-04-14', 1),
(58, 'Biyernes Santo', '2022-04-15', '2022-04-15', 1),
(59, 'Sábado de Gloria; Sabado ng Gloria', '2022-04-16', '2022-04-16', 0),
(60, 'Araw ng mga Manggagawa', '2022-05-01', '2022-05-01', 1),
(61, 'Araw ng Kalayaan', '2022-06-12', '2022-06-12', 1),
(62, 'Araw ng Kabayanihan ni Ninoy Aquino', '2022-08-21', '2022-08-21', 0),
(63, 'Araw ng mga Bayani', '2022-08-29', '2022-08-29', 1),
(64, 'Undás; Todos los Santos; Araw ng mga Santo ', '2022-11-01', '2022-11-01', 0),
(65, 'Araw ng mga Pata', '2022-11-02', '2022-11-02', 0),
(66, 'Araw ng Kapanganakan ni Bonifacio', '2022-11-30', '2022-11-30', 1),
(67, 'Araw ng Pasko', '2022-12-25', '2022-12-25', 1),
(68, 'Paggunita sa Kamatayan ni Dr. Jose Rizal', '2022-12-30', '2022-12-30', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Stored all leave balance';

--
-- Dumping data for table `lvf_leavebalance`
--

INSERT INTO `lvf_leavebalance` (`id`, `employee_id`, `vacationleave`, `sickleave`, `birthleave`, `created_at`) VALUES
(1, 1, '8.38/13.88', '9/10', '0', '2018-05-15 02:44:28'),
(2, 4, '0', '0', '1', '2018-05-21 16:04:11'),
(3, 3, '11.43/11.43', '10/10', '1', '2018-05-21 16:04:11'),
(4, 2, '9.96/14.96', '10/10', '1', '2018-05-21 16:04:11'),
(5, 5, '6/15', '5.5/10', '1', '2018-05-21 16:04:11'),
(6, 6, '10/15', '9/10', '1', '2018-05-21 16:04:11'),
(7, 7, '7/15', '9.5/10', '1', '2018-05-21 16:04:11'),
(8, 8, '4.5/15', '10/10', '1', '2018-05-22 16:25:13'),
(9, 9, '12.43/14.43', '8/10', '1', '2018-05-21 16:04:11'),
(10, 10, '0/0', '0/0', '1', '2018-06-28 16:28:46'),
(11, 11, '0/0', '0/0', '1', NULL),
(12, 12, '0/0', '0/0', '1', NULL),
(13, 13, '0/0', '0/0', '1', NULL),
(14, 14, '0/0', '0/0', '1', NULL),
(15, 15, '0/0', '0/0', '1', NULL),
(16, 16, '0/0', '0/0', '1', NULL),
(17, 17, '0/0', '0/0', '1', NULL),
(18, 18, '0/0', '0/0', '1', NULL),
(19, 19, '0/0', '0/0', '1', '2018-06-29 09:09:33'),
(20, 20, '0/0', '0/0', '1', '2018-07-16 16:38:26'),
(21, 21, '0/0', '0/0', '1', '2018-07-16 16:48:43'),
(22, 22, '0/0', '0/0', '1', '2018-07-16 16:50:03'),
(23, 23, '0/0', '0/0', '1', '2018-07-16 17:57:08');

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
  `start` datetime NOT NULL COMMENT 'Date leave start at',
  `end` datetime NOT NULL COMMENT 'Date leave end at',
  `days` varchar(11) CHARACTER SET utf8 NOT NULL COMMENT 'Leave count days',
  `classname` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT 'Leave status',
  `token` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'Leave token for email use',
  `active` int(5) NOT NULL DEFAULT '0' COMMENT 'Integer',
  `processedby` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT 'Requestor',
  `created_at` datetime NOT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Stored leave request, serves as history';

--
-- Dumping data for table `lvf_leavehistory`
--

INSERT INTO `lvf_leavehistory` (`id`, `employee_id`, `code`, `title`, `types`, `reason`, `reject_msg`, `start`, `end`, `days`, `classname`, `token`, `active`, `processedby`, `created_at`, `update_at`) VALUES
(1, 1, '167235', 'Sick Leave', 'LWP', 'Personal', NULL, '2018-07-06 04:09:00', '2018-07-06 04:10:00', '1', 'Approved', '', 0, 'mnaluz', '2018-07-05 16:09:34', '2018-07-05 17:11:29'),
(2, 1, '486709', 'Sick Leave', 'LWP', 'Personal', NULL, '2018-07-09 10:20:00', '2018-07-09 10:21:00', '1', 'Approved', 'lQHwpo0FUCygZJkjYNG38cKd5zuP1f', 1, 'mnaluz', '2018-07-06 10:20:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lvf_login_history`
--

CREATE TABLE `lvf_login_history` (
  `id` int(15) NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 NOT NULL,
  `login_date` datetime NOT NULL,
  `logout_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Serves as history';

--
-- Dumping data for table `lvf_login_history`
--

INSERT INTO `lvf_login_history` (`id`, `username`, `login_date`, `logout_date`) VALUES
(1, 'mnaluz', '2018-06-29 09:59:31', '2018-06-29 09:59:31'),
(2, 'mnaluz', '2018-06-29 10:01:10', '2018-06-29 10:24:42'),
(3, 'mnaluz', '2018-06-29 10:24:51', '2018-06-29 10:55:24'),
(4, 'mnaluz', '2018-06-29 10:56:41', '2018-06-29 12:33:47'),
(5, 'mnaluz', '2018-06-29 12:34:17', '2018-06-29 13:21:10'),
(6, 'mnaluz', '2018-06-29 14:29:14', '2018-06-29 15:34:09'),
(7, 'mnaluz', '2018-06-29 15:36:10', '2018-06-29 16:55:21'),
(8, 'mnaluz', '2018-06-29 17:01:34', '2018-06-29 17:29:14'),
(9, 'mnaluz', '2018-07-03 11:23:56', '2018-07-03 11:44:35'),
(10, 'mnaluz', '2018-07-03 12:13:17', '2018-07-03 13:17:45'),
(11, 'mnaluz', '2018-07-03 14:09:22', '2018-07-03 14:11:18'),
(12, 'mnaluz', '2018-07-03 14:11:28', '2018-07-03 14:29:00'),
(13, 'mnaluz', '2018-07-04 15:21:58', '2018-07-04 15:38:15'),
(14, 'mnaluz', '2018-07-05 09:06:00', '2018-07-05 09:48:13'),
(15, 'mnaluz', '2018-07-05 10:53:20', '2018-07-05 12:59:44'),
(16, 'mnaluz', '2018-07-05 14:27:39', '2018-07-05 15:47:56'),
(17, 'mnaluz', '2018-07-05 15:54:20', '2018-07-05 17:51:36'),
(18, 'mnaluz', '2018-07-06 10:06:56', '2018-07-06 10:55:40'),
(19, 'mnaluz', '2018-07-06 11:21:54', '2018-07-06 12:01:58'),
(20, 'mnaluz', '2018-07-09 12:17:18', '2018-07-09 12:57:50'),
(21, 'mnaluz', '2018-07-10 09:26:59', '2018-07-10 09:44:11'),
(22, 'mnaluz', '2018-07-10 10:27:00', '2018-07-10 10:28:20'),
(23, 'mnaluz', '2018-07-10 10:27:38', '2018-07-10 10:28:20'),
(24, 'mnaluz', '2018-07-11 14:54:39', '2018-07-11 15:30:10'),
(25, 'alizajoy', '2018-07-11 15:00:10', '2018-07-11 15:02:05'),
(26, 'alizajoy', '2018-07-11 15:01:02', '2018-07-11 15:02:05'),
(27, 'mnaluz', '2018-07-11 15:02:22', '2018-07-11 15:30:10'),
(28, 'alizajoy', '2018-07-11 15:05:06', '2018-07-11 16:47:57'),
(29, 'mnaluz', '2018-07-11 15:30:30', '2018-07-16 18:12:58'),
(30, 'alizajoy', '2018-07-11 15:30:52', '2018-07-11 16:47:57'),
(31, 'alizajoy', '2018-07-11 15:32:33', '2018-07-11 16:47:57'),
(32, 'mnaluz', '2018-07-11 15:37:53', '2018-07-16 18:12:58'),
(33, 'alizajoy', '2018-07-11 15:40:12', '2018-07-11 16:47:57'),
(34, 'mnaluz', '2018-07-11 15:45:12', '2018-07-16 18:12:58'),
(35, 'alizajoy', '2018-07-11 15:51:46', '2018-07-11 16:47:57'),
(36, 'mnaluz', '2018-07-11 15:53:29', '2018-07-16 18:12:58'),
(37, 'alizajoy', '2018-07-11 15:58:27', '2018-07-11 16:47:57'),
(38, 'alizajoy', '2018-07-11 16:04:26', '2018-07-11 16:47:57'),
(39, 'alizajoy', '2018-07-11 16:05:12', '2018-07-11 16:47:57'),
(40, 'alizajoy', '2018-07-11 16:29:12', '2018-07-11 16:47:57'),
(41, 'alizajoy', '2018-07-11 16:50:12', '2018-07-11 17:39:17'),
(42, 'mnaluz', '2018-07-11 17:13:42', '2018-07-16 18:12:58'),
(43, 'mnaluz', '2018-07-16 16:11:14', '2018-07-16 18:12:58'),
(44, 'alizajoy', '2018-07-16 17:01:57', '2018-07-16 17:49:05'),
(45, 'mnaluz', '2018-07-16 17:48:35', '2018-07-16 18:12:58'),
(46, 'mnaluz', '2018-07-17 09:01:45', '2018-07-17 09:43:55'),
(47, 'alizajoy', '2018-07-17 09:22:50', '2018-07-17 09:43:55'),
(48, 'mnaluz', '2018-07-17 12:00:01', NULL),
(49, 'alizajoy', '2018-07-17 12:01:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lvf_movedate`
--

CREATE TABLE `lvf_movedate` (
  `id` int(11) NOT NULL,
  `leavecode` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT 'use for tracking leave',
  `title` text CHARACTER SET utf8 NOT NULL COMMENT 'Types of Vacation',
  `types` varchar(100) CHARACTER SET utf8 DEFAULT NULL COMMENT 'With Pay / Without',
  `reason` text CHARACTER SET utf8 COMMENT 'Leave reasons',
  `start` datetime NOT NULL COMMENT 'Date leave start at',
  `end` datetime NOT NULL COMMENT 'Date leave end at',
  `days` varchar(11) CHARACTER SET utf8 NOT NULL COMMENT 'Leave count days',
  `classname` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT 'Leave status',
  `created_at` datetime NOT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Stored leave request, serves as history';

--
-- Dumping data for table `lvf_movedate`
--

INSERT INTO `lvf_movedate` (`id`, `leavecode`, `title`, `types`, `reason`, `start`, `end`, `days`, `classname`, `created_at`, `update_at`) VALUES
(1, '167235', 'Sick Leave', 'LWP', 'Personal', '2018-07-06 04:50:00', '2018-07-06 04:51:00', '1', 'Pending', '2018-07-05 16:09:34', '2018-07-05 16:50:14'),
(2, '486709', 'Vacation', 'LWP', 'Personal', '2018-07-09 10:20:00', '2018-07-09 10:21:00', '1', 'Approved', '2018-07-06 10:33:22', NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Users storage';

--
-- Dumping data for table `lvf_users`
--

INSERT INTO `lvf_users` (`userid`, `employee_id`, `username`, `password`, `fullname`, `address`, `email`, `cp_no`, `gender`, `role`, `activation_key`, `activate`, `resetpasskey`, `resetdate`, `active`, `lastactivity`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 1, 'mnaluz', '$2y$10$tMEat0EAjt46nwzMpcZsJONR3BlettqfgzO1AEp8W8V82sHjIfyqS', 'Mark Anthony Naluz', 'Barangka Itaas, Mandaluyong City', 'MarkAnthony.Naluz@megasportsworld.com', '09063171476', 'male', 1, NULL, 1, NULL, '2018-05-30 14:02:27', 1, NULL, NULL, NULL, NULL, NULL),
(2, 2, 'alizajoy', '$2y$10$1T4zwcjylkS7KhtgATskre7Has6W0YxUp2e4TZCAqt4HlcdNstJ7G', 'Aliza Joy Solomon', 'Parañaque', 'alizajoy.solomon@megasportsworld.com', '+639054648927', 'female', 0, NULL, 1, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(3, 3, 'kristal', NULL, NULL, NULL, 'Kristallynn.Tolentino@megasportsworld.com', NULL, NULL, 0, NULL, 1, '1b6EWCAGtdRiFBoSqT34KzNrpHQxf9DksmJa2g8cMOjXnh75Pw', NULL, 0, NULL, NULL, NULL, NULL, NULL),
(4, 4, 'resty', NULL, NULL, NULL, 'RestyJay.Alejo@megasportsworld.com', NULL, NULL, 0, NULL, 1, 'Gx4pskTNWbSoh8KRm65ctOgIXEraQAqZed29FnjfHLuJ7DUB1z', NULL, 0, NULL, NULL, NULL, NULL, NULL),
(5, 5, 'jai28', NULL, NULL, NULL, 'Jai-Ann.Sotto@megasportsworld.com', NULL, NULL, 0, NULL, 1, '3Rkclf8qErCgzIOda9DAQFsiWyGuXSb15eTjM6oLJvZxwt7UYn', NULL, 0, NULL, NULL, NULL, NULL, NULL),
(6, 6, 'mgrace', NULL, NULL, NULL, 'MaryGraceEden.Basuel@megasportsworld.com', NULL, NULL, 0, NULL, 1, 't6gFhu1GfsBEQ4WrcUaV9Ym0AZTNHniyq37MCbvKeJOPdDlRXz', NULL, 0, NULL, NULL, NULL, NULL, NULL),
(7, 7, 'xtian', NULL, NULL, NULL, 'Christian.Realubit@megasportsworld.com', NULL, NULL, 0, NULL, 1, 'rWOvHoi4yaUM7qF8PT3BsIDxYpnXNcAtZwuEb9QhjdCK1VkGLJ', NULL, 0, NULL, NULL, NULL, NULL, NULL),
(8, 8, 'sherwin', NULL, NULL, NULL, 'SherwinNino.Macalintal@megasportsworld.com', NULL, NULL, 0, NULL, 1, 'rFgBN9eMqAOWJPzGp65i7XxS48nLfZUEVQHvCot01IuY2lTham', NULL, 0, NULL, NULL, NULL, NULL, NULL),
(9, 9, 'jpaul', NULL, NULL, NULL, 'JohnPaul.Quidilla@megasportsworld.com', NULL, NULL, 0, NULL, 1, 'LO01WDtM9kbvAN7irqCJheG8uaPESpgZI2cXHwzTR4V3fFoKyd', NULL, 0, NULL, NULL, NULL, NULL, NULL),
(23, 23, 'realtime', NULL, NULL, NULL, 'admin@admin.com', NULL, 'male', 0, NULL, 1, NULL, NULL, 0, NULL, '2018-07-16 17:57:08', NULL, 'mnaluz', NULL);

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
-- Indexes for table `lvf_holidays`
--
ALTER TABLE `lvf_holidays`
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
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `lvf_employee`
--
ALTER TABLE `lvf_employee`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `lvf_holidays`
--
ALTER TABLE `lvf_holidays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `lvf_leavebalance`
--
ALTER TABLE `lvf_leavebalance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `lvf_leavehistory`
--
ALTER TABLE `lvf_leavehistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lvf_login_history`
--
ALTER TABLE `lvf_login_history`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `lvf_movedate`
--
ALTER TABLE `lvf_movedate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lvf_users`
--
ALTER TABLE `lvf_users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
