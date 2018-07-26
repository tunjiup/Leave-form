#
# TABLE STRUCTURE FOR: lvf_activity_logs
#

DROP TABLE IF EXISTS `lvf_activity_logs`;

CREATE TABLE `lvf_activity_logs` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `userid` int(15) DEFAULT NULL,
  `ipaddress` varchar(50) CHARACTER SET utf8 NOT NULL,
  `module` varchar(50) CHARACTER SET utf8 NOT NULL,
  `action` varchar(50) CHARACTER SET utf8 NOT NULL,
  `object_id` int(15) DEFAULT NULL,
  `object_ids` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

INSERT INTO `lvf_activity_logs` (`id`, `userid`, `ipaddress`, `module`, `action`, `object_id`, `object_ids`, `created_at`) VALUES (1, 1, '::1', 'Mydatabase', 'Backup Entire Database', 0, '0', '2018-07-25 14:42:38');
INSERT INTO `lvf_activity_logs` (`id`, `userid`, `ipaddress`, `module`, `action`, `object_id`, `object_ids`, `created_at`) VALUES (2, 1, '::1', 'Mydatabase', 'Backup Entire Database', 0, '0', '2018-07-25 14:44:09');
INSERT INTO `lvf_activity_logs` (`id`, `userid`, `ipaddress`, `module`, `action`, `object_id`, `object_ids`, `created_at`) VALUES (3, 1, '::1', 'Mydatabase', 'Backup Entire Database', 0, '0', '2018-07-25 14:45:22');
INSERT INTO `lvf_activity_logs` (`id`, `userid`, `ipaddress`, `module`, `action`, `object_id`, `object_ids`, `created_at`) VALUES (4, 1, '::1', 'Mydatabase', 'Backup Table lvf_activity_logs', 0, '0', '2018-07-25 14:45:47');
INSERT INTO `lvf_activity_logs` (`id`, `userid`, `ipaddress`, `module`, `action`, `object_id`, `object_ids`, `created_at`) VALUES (5, 1, '::1', 'Mydatabase', 'Backup Table lvf_activity_logs', 0, '0', '2018-07-25 14:46:46');
INSERT INTO `lvf_activity_logs` (`id`, `userid`, `ipaddress`, `module`, `action`, `object_id`, `object_ids`, `created_at`) VALUES (6, 1, '::1', 'Mydatabase', 'Backup Table lvf_comments', 0, '0', '2018-07-25 14:46:49');
INSERT INTO `lvf_activity_logs` (`id`, `userid`, `ipaddress`, `module`, `action`, `object_id`, `object_ids`, `created_at`) VALUES (7, 1, '::1', 'Mydatabase', 'Backup Table lvf_employee', 0, '0', '2018-07-25 14:46:53');
INSERT INTO `lvf_activity_logs` (`id`, `userid`, `ipaddress`, `module`, `action`, `object_id`, `object_ids`, `created_at`) VALUES (8, 1, '::1', 'Mydatabase', 'Backup Table Data lvf_activity_logs', 0, '0', '2018-07-25 14:47:31');
INSERT INTO `lvf_activity_logs` (`id`, `userid`, `ipaddress`, `module`, `action`, `object_id`, `object_ids`, `created_at`) VALUES (9, 1, '::1', 'Mydatabase', 'Backup Table Data lvf_comments', 0, '0', '2018-07-25 14:47:33');
INSERT INTO `lvf_activity_logs` (`id`, `userid`, `ipaddress`, `module`, `action`, `object_id`, `object_ids`, `created_at`) VALUES (10, 1, '::1', 'Mydatabase', 'Backup Table Data lvf_employee', 0, '0', '2018-07-25 14:47:34');
INSERT INTO `lvf_activity_logs` (`id`, `userid`, `ipaddress`, `module`, `action`, `object_id`, `object_ids`, `created_at`) VALUES (11, 1, '::1', 'Mydatabase', 'Backup Table Data lvf_holidays', 0, '0', '2018-07-25 14:47:36');
INSERT INTO `lvf_activity_logs` (`id`, `userid`, `ipaddress`, `module`, `action`, `object_id`, `object_ids`, `created_at`) VALUES (12, 1, '::1', 'Mydatabase', 'Backup Table Data lvf_leavebalance', 0, '0', '2018-07-25 14:47:38');
INSERT INTO `lvf_activity_logs` (`id`, `userid`, `ipaddress`, `module`, `action`, `object_id`, `object_ids`, `created_at`) VALUES (13, 1, '::1', 'Mydatabase', 'Backup Table Data lvf_leavehistory', 0, '0', '2018-07-25 14:47:40');
INSERT INTO `lvf_activity_logs` (`id`, `userid`, `ipaddress`, `module`, `action`, `object_id`, `object_ids`, `created_at`) VALUES (14, 1, '::1', 'Mydatabase', 'Backup Table Data lvf_login_history', 0, '0', '2018-07-25 14:47:42');
INSERT INTO `lvf_activity_logs` (`id`, `userid`, `ipaddress`, `module`, `action`, `object_id`, `object_ids`, `created_at`) VALUES (15, 1, '::1', 'Mydatabase', 'Backup Table Data lvf_movedate', 0, '0', '2018-07-25 14:47:44');
INSERT INTO `lvf_activity_logs` (`id`, `userid`, `ipaddress`, `module`, `action`, `object_id`, `object_ids`, `created_at`) VALUES (16, 1, '::1', 'Mydatabase', 'Backup Table Data lvf_role', 0, '0', '2018-07-25 14:47:44');
INSERT INTO `lvf_activity_logs` (`id`, `userid`, `ipaddress`, `module`, `action`, `object_id`, `object_ids`, `created_at`) VALUES (17, 1, '::1', 'Mydatabase', 'Backup Table Data lvf_tracker', 0, '0', '2018-07-25 14:47:46');
INSERT INTO `lvf_activity_logs` (`id`, `userid`, `ipaddress`, `module`, `action`, `object_id`, `object_ids`, `created_at`) VALUES (18, 1, '::1', 'Mydatabase', 'Backup Table Data lvf_users', 0, '0', '2018-07-25 14:47:47');
INSERT INTO `lvf_activity_logs` (`id`, `userid`, `ipaddress`, `module`, `action`, `object_id`, `object_ids`, `created_at`) VALUES (19, 1, '::1', 'Mydatabase', 'Backup Entire Database', 0, '0', '2018-07-25 14:47:57');


#
# TABLE STRUCTURE FOR: lvf_comments
#

DROP TABLE IF EXISTS `lvf_comments`;

CREATE TABLE `lvf_comments` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `userid` int(15) NOT NULL,
  `message` text CHARACTER SET utf8 NOT NULL,
  `status` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Stored all feedback of users';

#
# TABLE STRUCTURE FOR: lvf_employee
#

DROP TABLE IF EXISTS `lvf_employee`;

CREATE TABLE `lvf_employee` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `active` int(2) NOT NULL DEFAULT '0',
  `dob` date DEFAULT NULL,
  `position` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `manager` varchar(100) NOT NULL,
  `departmenthead` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 COMMENT='Stored all employees';

INSERT INTO `lvf_employee` (`id`, `name`, `active`, `dob`, `position`, `department`, `manager`, `departmenthead`, `created_at`) VALUES (1, 'Mark Anthony Naluz', 1, '1993-10-11', 'Web Developer', 'MSW - Webdev', 'Christian Realubit', 'Reynato Roallos Jr.', '2018-05-21 16:04:11');
INSERT INTO `lvf_employee` (`id`, `name`, `active`, `dob`, `position`, `department`, `manager`, `departmenthead`, `created_at`) VALUES (2, 'Aliza Joy Solomon', 1, '1996-05-31', 'Web Designer', 'MSW - Webdev', 'Christian Realubit', 'Reynato Roallos Jr.', '2018-05-21 16:04:11');
INSERT INTO `lvf_employee` (`id`, `name`, `active`, `dob`, `position`, `department`, `manager`, `departmenthead`, `created_at`) VALUES (3, 'Kristallynn Tolentino', 1, '1993-06-23', 'Web Developer', 'MSW - Webdev', 'Christian Realubit', 'Reynato Roallos Jr.', '2018-05-21 16:04:11');
INSERT INTO `lvf_employee` (`id`, `name`, `active`, `dob`, `position`, `department`, `manager`, `departmenthead`, `created_at`) VALUES (4, 'Resty Jay Alejo', 1, '1993-05-06', 'Jr. Web Developer', 'MSW - Webdev', 'Christian Realubit', 'Reynato Roallos Jr.', '2018-05-21 16:04:11');
INSERT INTO `lvf_employee` (`id`, `name`, `active`, `dob`, `position`, `department`, `manager`, `departmenthead`, `created_at`) VALUES (5, 'Jai-Ann Sotto', 1, '1991-07-12', 'System Analyst', 'MSW - Webdev', 'Mary grace eden Basuel', 'Reynato Roallos Jr.', '2018-05-21 16:04:11');
INSERT INTO `lvf_employee` (`id`, `name`, `active`, `dob`, `position`, `department`, `manager`, `departmenthead`, `created_at`) VALUES (6, 'Mary grace eden basuel', 1, '1986-09-18', 'Project manager', 'MSW - Webdev', 'Reynato Roallos Jr.', 'Jeff Mann', '2018-05-21 16:04:11');
INSERT INTO `lvf_employee` (`id`, `name`, `active`, `dob`, `position`, `department`, `manager`, `departmenthead`, `created_at`) VALUES (7, 'Christian Realubit', 1, '1984-07-06', 'Dev manager', 'MSW - Webdev', 'Reynato Roallos Jr.', 'Jeff Mann', '2018-05-21 16:04:11');
INSERT INTO `lvf_employee` (`id`, `name`, `active`, `dob`, `position`, `department`, `manager`, `departmenthead`, `created_at`) VALUES (8, 'Sherwin Macalintal', 1, '1986-09-11', 'Web Developer', 'MSW - Webdev', 'Christian Realubit', 'Reynato Roallos Jr.', '2018-05-21 16:04:11');
INSERT INTO `lvf_employee` (`id`, `name`, `active`, `dob`, `position`, `department`, `manager`, `departmenthead`, `created_at`) VALUES (9, 'John Paul Quidilla', 1, '1994-11-08', 'QA Analyst', 'MSW - Webdev', 'Mary grace eden basuel', 'Reynato Roallos Jr.', '2018-05-21 16:04:11');
INSERT INTO `lvf_employee` (`id`, `name`, `active`, `dob`, `position`, `department`, `manager`, `departmenthead`, `created_at`) VALUES (14, 'Mark John Flores', 1, '1993-10-11', '2', 'MSW - Webdev', 'Christian Realubit', 'Reynato Roallos Jr.', '2018-07-20 17:49:09');


#
# TABLE STRUCTURE FOR: lvf_holidays
#

DROP TABLE IF EXISTS `lvf_holidays`;

CREATE TABLE `lvf_holidays` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `date` date NOT NULL,
  `observed` date NOT NULL,
  `public` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1 COMMENT='Holiday til 2022';

INSERT INTO `lvf_holidays` (`id`, `name`, `date`, `observed`, `public`) VALUES (1, 'Araw ng Kabayanihan ni Ninoy Aquino', '2018-08-21', '2018-08-21', 0);
INSERT INTO `lvf_holidays` (`id`, `name`, `date`, `observed`, `public`) VALUES (2, 'Eidul Adha / Araw ng kurban', '2018-08-21', '2018-08-21', 1);
INSERT INTO `lvf_holidays` (`id`, `name`, `date`, `observed`, `public`) VALUES (3, 'Araw ng mga Bayani', '2018-08-27', '2018-08-27', 1);
INSERT INTO `lvf_holidays` (`id`, `name`, `date`, `observed`, `public`) VALUES (4, 'Undás; Todos los Santos; Araw ng mga Santo ', '2018-11-01', '2018-11-01', 0);
INSERT INTO `lvf_holidays` (`id`, `name`, `date`, `observed`, `public`) VALUES (5, 'Araw ng mga Pata', '2018-11-02', '2018-11-02', 0);
INSERT INTO `lvf_holidays` (`id`, `name`, `date`, `observed`, `public`) VALUES (6, 'Araw ng Kapanganakan ni Bonifacio', '2018-11-30', '2018-11-30', 1);
INSERT INTO `lvf_holidays` (`id`, `name`, `date`, `observed`, `public`) VALUES (7, 'Araw ng Pasko', '2018-12-25', '2018-12-25', 1);
INSERT INTO `lvf_holidays` (`id`, `name`, `date`, `observed`, `public`) VALUES (8, 'Paggunita sa Kamatayan ni Dr. Jose Rizal', '2018-12-30', '2018-12-30', 1);
INSERT INTO `lvf_holidays` (`id`, `name`, `date`, `observed`, `public`) VALUES (9, 'Araw ng Bagong Taon', '2019-01-01', '2019-01-01', 1);
INSERT INTO `lvf_holidays` (`id`, `name`, `date`, `observed`, `public`) VALUES (10, 'Bagong Taon ng mga Tsino ', '2019-02-05', '2019-02-05', 0);
INSERT INTO `lvf_holidays` (`id`, `name`, `date`, `observed`, `public`) VALUES (11, 'Araw ng Kagitingan', '2019-04-09', '2019-04-09', 1);
INSERT INTO `lvf_holidays` (`id`, `name`, `date`, `observed`, `public`) VALUES (12, 'Huwebes Santo', '2019-04-18', '2019-04-18', 1);
INSERT INTO `lvf_holidays` (`id`, `name`, `date`, `observed`, `public`) VALUES (13, 'Biyernes Santo', '2019-04-19', '2019-04-19', 1);
INSERT INTO `lvf_holidays` (`id`, `name`, `date`, `observed`, `public`) VALUES (14, 'Sábado de Gloria; Sabado ng Gloria', '2019-04-20', '2019-04-20', 0);
INSERT INTO `lvf_holidays` (`id`, `name`, `date`, `observed`, `public`) VALUES (15, 'Araw ng mga Manggagawa', '2019-05-01', '2019-05-01', 1);
INSERT INTO `lvf_holidays` (`id`, `name`, `date`, `observed`, `public`) VALUES (16, 'Araw ng Kalayaan', '2019-06-12', '2019-06-12', 1);
INSERT INTO `lvf_holidays` (`id`, `name`, `date`, `observed`, `public`) VALUES (17, 'Araw ng Kabayanihan ni Ninoy Aquino', '2019-08-21', '2019-08-21', 0);
INSERT INTO `lvf_holidays` (`id`, `name`, `date`, `observed`, `public`) VALUES (18, 'Araw ng mga Bayani', '2019-08-26', '2019-08-26', 1);
INSERT INTO `lvf_holidays` (`id`, `name`, `date`, `observed`, `public`) VALUES (19, 'Undás; Todos los Santos; Araw ng mga Santo ', '2019-11-01', '2019-11-01', 0);
INSERT INTO `lvf_holidays` (`id`, `name`, `date`, `observed`, `public`) VALUES (20, 'Araw ng mga Pata', '2019-11-02', '2019-11-02', 0);
INSERT INTO `lvf_holidays` (`id`, `name`, `date`, `observed`, `public`) VALUES (21, 'Araw ng Kapanganakan ni Bonifacio', '2019-11-30', '2019-11-30', 1);
INSERT INTO `lvf_holidays` (`id`, `name`, `date`, `observed`, `public`) VALUES (22, 'Araw ng Pasko', '2019-12-25', '2019-12-25', 1);
INSERT INTO `lvf_holidays` (`id`, `name`, `date`, `observed`, `public`) VALUES (23, 'Paggunita sa Kamatayan ni Dr. Jose Rizal', '2019-12-30', '2019-12-30', 1);
INSERT INTO `lvf_holidays` (`id`, `name`, `date`, `observed`, `public`) VALUES (24, 'Araw ng Bagong Taon', '2020-01-01', '2020-01-01', 1);
INSERT INTO `lvf_holidays` (`id`, `name`, `date`, `observed`, `public`) VALUES (25, 'Bagong Taon ng mga Tsino ', '2020-01-25', '2020-01-25', 0);
INSERT INTO `lvf_holidays` (`id`, `name`, `date`, `observed`, `public`) VALUES (26, 'Araw ng Kagitingan', '2020-04-09', '2020-04-09', 1);
INSERT INTO `lvf_holidays` (`id`, `name`, `date`, `observed`, `public`) VALUES (27, 'Huwebes Santo', '2020-04-09', '2020-04-09', 1);
INSERT INTO `lvf_holidays` (`id`, `name`, `date`, `observed`, `public`) VALUES (28, 'Biyernes Santo', '2020-04-10', '2020-04-10', 1);
INSERT INTO `lvf_holidays` (`id`, `name`, `date`, `observed`, `public`) VALUES (29, 'Sábado de Gloria; Sabado ng Gloria', '2020-04-11', '2020-04-11', 0);
INSERT INTO `lvf_holidays` (`id`, `name`, `date`, `observed`, `public`) VALUES (30, 'Araw ng mga Manggagawa', '2020-05-01', '2020-05-01', 1);
INSERT INTO `lvf_holidays` (`id`, `name`, `date`, `observed`, `public`) VALUES (31, 'Araw ng Kalayaan', '2020-06-12', '2020-06-12', 1);
INSERT INTO `lvf_holidays` (`id`, `name`, `date`, `observed`, `public`) VALUES (32, 'Araw ng Kabayanihan ni Ninoy Aquino', '2020-08-21', '2020-08-21', 0);
INSERT INTO `lvf_holidays` (`id`, `name`, `date`, `observed`, `public`) VALUES (33, 'Araw ng mga Bayani', '2020-08-31', '2020-08-31', 1);
INSERT INTO `lvf_holidays` (`id`, `name`, `date`, `observed`, `public`) VALUES (34, 'Undás; Todos los Santos; Araw ng mga Santo ', '2020-11-01', '2020-11-01', 0);
INSERT INTO `lvf_holidays` (`id`, `name`, `date`, `observed`, `public`) VALUES (35, 'Araw ng mga Pata', '2020-11-02', '2020-11-02', 0);
INSERT INTO `lvf_holidays` (`id`, `name`, `date`, `observed`, `public`) VALUES (36, 'Araw ng Kapanganakan ni Bonifacio', '2020-11-30', '2020-11-30', 1);
INSERT INTO `lvf_holidays` (`id`, `name`, `date`, `observed`, `public`) VALUES (37, 'Araw ng Pasko', '2020-12-25', '2020-12-25', 1);
INSERT INTO `lvf_holidays` (`id`, `name`, `date`, `observed`, `public`) VALUES (38, 'Paggunita sa Kamatayan ni Dr. Jose Rizal', '2020-12-30', '2020-12-30', 1);
INSERT INTO `lvf_holidays` (`id`, `name`, `date`, `observed`, `public`) VALUES (39, 'Araw ng Bagong Taon', '2021-01-01', '2021-01-01', 1);
INSERT INTO `lvf_holidays` (`id`, `name`, `date`, `observed`, `public`) VALUES (40, 'Bagong Taon ng mga Tsino ', '2021-02-12', '2021-02-12', 0);
INSERT INTO `lvf_holidays` (`id`, `name`, `date`, `observed`, `public`) VALUES (41, 'Huwebes Santo', '2021-04-01', '2021-04-01', 1);
INSERT INTO `lvf_holidays` (`id`, `name`, `date`, `observed`, `public`) VALUES (42, 'Biyernes Santo', '2021-04-02', '2021-04-02', 1);
INSERT INTO `lvf_holidays` (`id`, `name`, `date`, `observed`, `public`) VALUES (43, 'Sábado de Gloria; Sabado ng Gloria', '2021-04-03', '2021-04-03', 0);
INSERT INTO `lvf_holidays` (`id`, `name`, `date`, `observed`, `public`) VALUES (44, 'Araw ng Kagitingan', '2021-04-09', '2021-04-09', 1);
INSERT INTO `lvf_holidays` (`id`, `name`, `date`, `observed`, `public`) VALUES (45, 'Araw ng mga Manggagawa', '2021-05-01', '2021-05-01', 1);
INSERT INTO `lvf_holidays` (`id`, `name`, `date`, `observed`, `public`) VALUES (46, 'Araw ng Kalayaan', '2021-06-12', '2021-06-12', 1);
INSERT INTO `lvf_holidays` (`id`, `name`, `date`, `observed`, `public`) VALUES (47, 'Araw ng Kabayanihan ni Ninoy Aquino', '2021-08-21', '2021-08-21', 0);
INSERT INTO `lvf_holidays` (`id`, `name`, `date`, `observed`, `public`) VALUES (48, 'Araw ng mga Bayani', '2021-08-30', '2021-08-30', 1);
INSERT INTO `lvf_holidays` (`id`, `name`, `date`, `observed`, `public`) VALUES (49, 'Undás; Todos los Santos; Araw ng mga Santo ', '2021-11-01', '2021-11-01', 0);
INSERT INTO `lvf_holidays` (`id`, `name`, `date`, `observed`, `public`) VALUES (50, 'Araw ng mga Pata', '2021-11-02', '2021-11-02', 0);
INSERT INTO `lvf_holidays` (`id`, `name`, `date`, `observed`, `public`) VALUES (51, 'Araw ng Kapanganakan ni Bonifacio', '2021-11-30', '2021-11-30', 1);
INSERT INTO `lvf_holidays` (`id`, `name`, `date`, `observed`, `public`) VALUES (52, 'Araw ng Pasko', '2021-12-25', '2021-12-25', 1);
INSERT INTO `lvf_holidays` (`id`, `name`, `date`, `observed`, `public`) VALUES (53, 'Paggunita sa Kamatayan ni Dr. Jose Rizal', '2021-12-30', '2021-12-30', 1);
INSERT INTO `lvf_holidays` (`id`, `name`, `date`, `observed`, `public`) VALUES (54, 'Araw ng Bagong Taon', '2022-01-01', '2022-01-01', 1);
INSERT INTO `lvf_holidays` (`id`, `name`, `date`, `observed`, `public`) VALUES (55, 'Bagong Taon ng mga Tsino ', '2022-02-01', '2022-02-01', 0);
INSERT INTO `lvf_holidays` (`id`, `name`, `date`, `observed`, `public`) VALUES (56, 'Araw ng Kagitingan', '2022-04-09', '2022-04-09', 1);
INSERT INTO `lvf_holidays` (`id`, `name`, `date`, `observed`, `public`) VALUES (57, 'Huwebes Santo', '2022-04-14', '2022-04-14', 1);
INSERT INTO `lvf_holidays` (`id`, `name`, `date`, `observed`, `public`) VALUES (58, 'Biyernes Santo', '2022-04-15', '2022-04-15', 1);
INSERT INTO `lvf_holidays` (`id`, `name`, `date`, `observed`, `public`) VALUES (59, 'Sábado de Gloria; Sabado ng Gloria', '2022-04-16', '2022-04-16', 0);
INSERT INTO `lvf_holidays` (`id`, `name`, `date`, `observed`, `public`) VALUES (60, 'Araw ng mga Manggagawa', '2022-05-01', '2022-05-01', 1);
INSERT INTO `lvf_holidays` (`id`, `name`, `date`, `observed`, `public`) VALUES (61, 'Araw ng Kalayaan', '2022-06-12', '2022-06-12', 1);
INSERT INTO `lvf_holidays` (`id`, `name`, `date`, `observed`, `public`) VALUES (62, 'Araw ng Kabayanihan ni Ninoy Aquino', '2022-08-21', '2022-08-21', 0);
INSERT INTO `lvf_holidays` (`id`, `name`, `date`, `observed`, `public`) VALUES (63, 'Araw ng mga Bayani', '2022-08-29', '2022-08-29', 1);
INSERT INTO `lvf_holidays` (`id`, `name`, `date`, `observed`, `public`) VALUES (64, 'Undás; Todos los Santos; Araw ng mga Santo ', '2022-11-01', '2022-11-01', 0);
INSERT INTO `lvf_holidays` (`id`, `name`, `date`, `observed`, `public`) VALUES (65, 'Araw ng mga Pata', '2022-11-02', '2022-11-02', 0);
INSERT INTO `lvf_holidays` (`id`, `name`, `date`, `observed`, `public`) VALUES (66, 'Araw ng Kapanganakan ni Bonifacio', '2022-11-30', '2022-11-30', 1);
INSERT INTO `lvf_holidays` (`id`, `name`, `date`, `observed`, `public`) VALUES (67, 'Araw ng Pasko', '2022-12-25', '2022-12-25', 1);
INSERT INTO `lvf_holidays` (`id`, `name`, `date`, `observed`, `public`) VALUES (68, 'Paggunita sa Kamatayan ni Dr. Jose Rizal', '2022-12-30', '2022-12-30', 1);


#
# TABLE STRUCTURE FOR: lvf_hooks
#

DROP TABLE IF EXISTS `lvf_hooks`;

CREATE TABLE `lvf_hooks` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(50) CHARACTER SET utf8 COLLATE utf8_estonian_ci NOT NULL,
  `page` varchar(255) CHARACTER SET utf8 NOT NULL,
  `user_agent` varchar(255) CHARACTER SET utf8 NOT NULL,
  `request_method` varchar(50) CHARACTER SET utf8 NOT NULL,
  `request_params` varchar(255) CHARACTER SET utf8 NOT NULL,
  `uri_string` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

INSERT INTO `lvf_hooks` (`id`, `ip_address`, `page`, `user_agent`, `request_method`, `request_params`, `uri_string`, `created_at`) VALUES (1, '::1', 'http://localhost:8080/leave-form/feedback-count', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'POST', 'a:0:{}', 'feedback-count', '2018-07-25 03:55:01');
INSERT INTO `lvf_hooks` (`id`, `ip_address`, `page`, `user_agent`, `request_method`, `request_params`, `uri_string`, `created_at`) VALUES (2, '::1', 'http://localhost:8080/leave-form/feedback-count', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'POST', 'a:0:{}', 'feedback-count', '2018-07-25 03:55:06');
INSERT INTO `lvf_hooks` (`id`, `ip_address`, `page`, `user_agent`, `request_method`, `request_params`, `uri_string`, `created_at`) VALUES (3, '::1', 'http://localhost:8080/leave-form/', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'GET', 'a:0:{}', '', '2018-07-25 03:55:13');
INSERT INTO `lvf_hooks` (`id`, `ip_address`, `page`, `user_agent`, `request_method`, `request_params`, `uri_string`, `created_at`) VALUES (4, '::1', 'http://localhost:8080/leave-form/feedback-count', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'POST', 'a:0:{}', 'feedback-count', '2018-07-25 03:55:14');
INSERT INTO `lvf_hooks` (`id`, `ip_address`, `page`, `user_agent`, `request_method`, `request_params`, `uri_string`, `created_at`) VALUES (5, '::1', 'http://localhost:8080/leave-form/events', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'GET', 'a:0:{}', 'events', '2018-07-25 03:55:15');
INSERT INTO `lvf_hooks` (`id`, `ip_address`, `page`, `user_agent`, `request_method`, `request_params`, `uri_string`, `created_at`) VALUES (6, '::1', 'http://localhost:8080/leave-form/feedback-count', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'POST', 'a:0:{}', 'feedback-count', '2018-07-25 03:55:23');
INSERT INTO `lvf_hooks` (`id`, `ip_address`, `page`, `user_agent`, `request_method`, `request_params`, `uri_string`, `created_at`) VALUES (7, '::1', 'http://localhost:8080/leave-form/events', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'GET', 'a:0:{}', 'events', '2018-07-25 03:55:24');
INSERT INTO `lvf_hooks` (`id`, `ip_address`, `page`, `user_agent`, `request_method`, `request_params`, `uri_string`, `created_at`) VALUES (8, '::1', 'http://localhost:8080/leave-form/leave-form', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'GET', 'a:0:{}', 'leave-form', '2018-07-25 03:55:29');
INSERT INTO `lvf_hooks` (`id`, `ip_address`, `page`, `user_agent`, `request_method`, `request_params`, `uri_string`, `created_at`) VALUES (9, '::1', 'http://localhost:8080/leave-form/feedback-count', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'POST', 'a:0:{}', 'feedback-count', '2018-07-25 03:55:29');
INSERT INTO `lvf_hooks` (`id`, `ip_address`, `page`, `user_agent`, `request_method`, `request_params`, `uri_string`, `created_at`) VALUES (10, '::1', 'http://localhost:8080/leave-form/feedback-count', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'POST', 'a:0:{}', 'feedback-count', '2018-07-25 03:55:35');
INSERT INTO `lvf_hooks` (`id`, `ip_address`, `page`, `user_agent`, `request_method`, `request_params`, `uri_string`, `created_at`) VALUES (11, '::1', 'http://localhost:8080/leave-form/feedback-count', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'POST', 'a:0:{}', 'feedback-count', '2018-07-25 03:55:53');
INSERT INTO `lvf_hooks` (`id`, `ip_address`, `page`, `user_agent`, `request_method`, `request_params`, `uri_string`, `created_at`) VALUES (12, '::1', 'http://localhost:8080/leave-form/events', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'GET', 'a:0:{}', 'events', '2018-07-25 03:55:54');
INSERT INTO `lvf_hooks` (`id`, `ip_address`, `page`, `user_agent`, `request_method`, `request_params`, `uri_string`, `created_at`) VALUES (13, '::1', 'http://localhost:8080/leave-form/database/backup', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'POST', 'a:0:{}', 'database/backup', '2018-07-25 03:56:03');


#
# TABLE STRUCTURE FOR: lvf_leavebalance
#

DROP TABLE IF EXISTS `lvf_leavebalance`;

CREATE TABLE `lvf_leavebalance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) DEFAULT NULL,
  `vacationleave` varchar(50) DEFAULT NULL,
  `sickleave` varchar(50) DEFAULT NULL,
  `birthleave` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 COMMENT='Stored all leave balance';

INSERT INTO `lvf_leavebalance` (`id`, `employee_id`, `vacationleave`, `sickleave`, `birthleave`, `created_at`, `updated_at`) VALUES (1, 1, '13.88/13.88', '10/10', '1', '2018-05-15 02:44:28', '2017-05-15 00:00:00');
INSERT INTO `lvf_leavebalance` (`id`, `employee_id`, `vacationleave`, `sickleave`, `birthleave`, `created_at`, `updated_at`) VALUES (2, 4, '9.96/14.96', '10/10', '1', '2018-05-21 16:04:11', '2018-05-15 02:44:28');
INSERT INTO `lvf_leavebalance` (`id`, `employee_id`, `vacationleave`, `sickleave`, `birthleave`, `created_at`, `updated_at`) VALUES (3, 3, '5.93/11.43', '10/10', '0', '2018-05-21 16:04:11', '2018-05-15 02:44:28');
INSERT INTO `lvf_leavebalance` (`id`, `employee_id`, `vacationleave`, `sickleave`, `birthleave`, `created_at`, `updated_at`) VALUES (4, 2, '2.96/11', '10/10', '1', '2018-05-21 16:04:11', '2018-05-15 02:44:28');
INSERT INTO `lvf_leavebalance` (`id`, `employee_id`, `vacationleave`, `sickleave`, `birthleave`, `created_at`, `updated_at`) VALUES (5, 5, '6/15', '3.5/10', '0', '2018-05-21 16:04:11', '2018-05-15 02:44:28');
INSERT INTO `lvf_leavebalance` (`id`, `employee_id`, `vacationleave`, `sickleave`, `birthleave`, `created_at`, `updated_at`) VALUES (6, 6, '8/15', '9/10', '1', '2018-05-21 16:04:11', '2018-05-15 02:44:28');
INSERT INTO `lvf_leavebalance` (`id`, `employee_id`, `vacationleave`, `sickleave`, `birthleave`, `created_at`, `updated_at`) VALUES (7, 7, '3/15', '6.5/10', '1', '2018-05-21 16:04:11', '2018-05-15 02:44:28');
INSERT INTO `lvf_leavebalance` (`id`, `employee_id`, `vacationleave`, `sickleave`, `birthleave`, `created_at`, `updated_at`) VALUES (8, 8, '1/15', '10/10', '1', '2018-05-22 16:25:13', '2018-05-15 02:44:28');
INSERT INTO `lvf_leavebalance` (`id`, `employee_id`, `vacationleave`, `sickleave`, `birthleave`, `created_at`, `updated_at`) VALUES (9, 9, '11.43/14.43', '7/10', '1', '2018-05-21 16:04:11', '2018-05-15 02:44:28');
INSERT INTO `lvf_leavebalance` (`id`, `employee_id`, `vacationleave`, `sickleave`, `birthleave`, `created_at`, `updated_at`) VALUES (10, 10, '0/0', '0/0', '1', '2018-07-20 17:38:27', NULL);
INSERT INTO `lvf_leavebalance` (`id`, `employee_id`, `vacationleave`, `sickleave`, `birthleave`, `created_at`, `updated_at`) VALUES (11, 11, '0/0', '0/0', '1', '2018-07-20 17:44:48', NULL);
INSERT INTO `lvf_leavebalance` (`id`, `employee_id`, `vacationleave`, `sickleave`, `birthleave`, `created_at`, `updated_at`) VALUES (12, 12, '0/0', '0/0', '1', '2018-07-20 17:45:52', NULL);
INSERT INTO `lvf_leavebalance` (`id`, `employee_id`, `vacationleave`, `sickleave`, `birthleave`, `created_at`, `updated_at`) VALUES (13, 13, '0/0', '0/0', '1', '2018-07-20 17:47:02', NULL);
INSERT INTO `lvf_leavebalance` (`id`, `employee_id`, `vacationleave`, `sickleave`, `birthleave`, `created_at`, `updated_at`) VALUES (14, 14, '13.88/13.88', '10/10', '1', '2018-07-20 17:49:09', NULL);


#
# TABLE STRUCTURE FOR: lvf_leavehistory
#

DROP TABLE IF EXISTS `lvf_leavehistory`;

CREATE TABLE `lvf_leavehistory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='Stored leave request, serves as history';

INSERT INTO `lvf_leavehistory` (`id`, `employee_id`, `code`, `title`, `types`, `reason`, `reject_msg`, `start`, `end`, `days`, `classname`, `token`, `active`, `processedby`, `created_at`, `update_at`) VALUES (1, 1, '281703', 'Sick Leave', 'LWP', 'Personal', NULL, '2018-07-26 14:24:00', '2018-07-26 14:25:00', '1', 'Approved', 'A3DFV5fkRSHiBczvJ1Wgy2KeutdCoa', 1, 'mnaluz', '2018-07-24 14:24:55', NULL);


#
# TABLE STRUCTURE FOR: lvf_login_history
#

DROP TABLE IF EXISTS `lvf_login_history`;

CREATE TABLE `lvf_login_history` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(50) CHARACTER SET utf8 NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 NOT NULL,
  `login_date` datetime NOT NULL,
  `logout_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COMMENT='Serves as history';

INSERT INTO `lvf_login_history` (`id`, `ip_address`, `username`, `login_date`, `logout_date`) VALUES (1, '::1', 'mnaluz', '2018-07-25 14:21:32', '2018-07-25 15:50:22');
INSERT INTO `lvf_login_history` (`id`, `ip_address`, `username`, `login_date`, `logout_date`) VALUES (2, '::1', 'mnaluz', '2018-07-25 15:30:52', '2018-07-25 15:50:22');
INSERT INTO `lvf_login_history` (`id`, `ip_address`, `username`, `login_date`, `logout_date`) VALUES (3, '::1', 'mnaluz', '2018-07-25 15:50:31', NULL);


#
# TABLE STRUCTURE FOR: lvf_movedate
#

DROP TABLE IF EXISTS `lvf_movedate`;

CREATE TABLE `lvf_movedate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `leavecode` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT 'use for tracking leave',
  `title` text CHARACTER SET utf8 NOT NULL COMMENT 'Types of Vacation',
  `types` varchar(100) CHARACTER SET utf8 DEFAULT NULL COMMENT 'With Pay / Without',
  `reason` text CHARACTER SET utf8 COMMENT 'Leave reasons',
  `start` datetime NOT NULL COMMENT 'Date leave start at',
  `end` datetime NOT NULL COMMENT 'Date leave end at',
  `days` varchar(11) CHARACTER SET utf8 NOT NULL COMMENT 'Leave count days',
  `classname` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT 'Leave status',
  `created_at` datetime NOT NULL,
  `update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='Stored leave request, serves as history';

INSERT INTO `lvf_movedate` (`id`, `leavecode`, `title`, `types`, `reason`, `start`, `end`, `days`, `classname`, `created_at`, `update_at`) VALUES (1, '281703', 'Sick Leave Leave', 'LWP', 'Personal', '2018-07-27 14:24:00', '2018-07-27 14:25:00', '1', 'Pending', '2018-07-24 14:27:34', NULL);


#
# TABLE STRUCTURE FOR: lvf_role
#

DROP TABLE IF EXISTS `lvf_role`;

CREATE TABLE `lvf_role` (
  `roleid` int(15) NOT NULL AUTO_INCREMENT,
  `rolename` varchar(100) CHARACTER SET utf8 NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`roleid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COMMENT='Employee position';

INSERT INTO `lvf_role` (`roleid`, `rolename`, `description`) VALUES (1, 'super admin', NULL);
INSERT INTO `lvf_role` (`roleid`, `rolename`, `description`) VALUES (2, 'admin', NULL);
INSERT INTO `lvf_role` (`roleid`, `rolename`, `description`) VALUES (3, 'Dept. Head/COO', NULL);
INSERT INTO `lvf_role` (`roleid`, `rolename`, `description`) VALUES (4, 'Manager', NULL);


#
# TABLE STRUCTURE FOR: lvf_tracker
#

DROP TABLE IF EXISTS `lvf_tracker`;

CREATE TABLE `lvf_tracker` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(50) CHARACTER SET utf8 NOT NULL,
  `latitude` varchar(255) CHARACTER SET utf8 NOT NULL,
  `longitude` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COMMENT='Stored User''s location';

INSERT INTO `lvf_tracker` (`id`, `ip_address`, `latitude`, `longitude`, `created_at`) VALUES (1, '202.151.35.180', '14.5588224', '121.01632000000001', '2018-07-25 14:19:41');
INSERT INTO `lvf_tracker` (`id`, `ip_address`, `latitude`, `longitude`, `created_at`) VALUES (2, '202.151.35.180', '14.5588224', '121.01632000000001', '2018-07-25 15:30:23');
INSERT INTO `lvf_tracker` (`id`, `ip_address`, `latitude`, `longitude`, `created_at`) VALUES (3, '202.151.35.180', '14.5588224', '121.01632000000001', '2018-07-25 15:50:24');


#
# TABLE STRUCTURE FOR: lvf_users
#

DROP TABLE IF EXISTS `lvf_users`;

CREATE TABLE `lvf_users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(15) DEFAULT NULL,
  `username` varchar(50) CHARACTER SET utf8 NOT NULL,
  `password` text CHARACTER SET utf8,
  `fullname` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `address` text CHARACTER SET utf8,
  `email` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `cp_no` varchar(13) CHARACTER SET utf8 DEFAULT NULL,
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
  `updated_by` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 COMMENT='Users storage';

INSERT INTO `lvf_users` (`userid`, `employee_id`, `username`, `password`, `fullname`, `address`, `email`, `cp_no`, `gender`, `role`, `activation_key`, `activate`, `resetpasskey`, `resetdate`, `active`, `lastactivity`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES (1, 1, 'mnaluz', '$2y$10$OKtfBOQhNEJTK99QbOYdlue94jRASkv2nWMHMXnAWrrTT6EhFoymu', 'Mark Anthony Naluz', 'Barangka Itaas, Mandaluyong City', 'MarkAnthony.Naluz@megasportsworld.com', '09063171476', 'male', 1, NULL, 1, NULL, '2018-07-06 13:59:46', 1, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `lvf_users` (`userid`, `employee_id`, `username`, `password`, `fullname`, `address`, `email`, `cp_no`, `gender`, `role`, `activation_key`, `activate`, `resetpasskey`, `resetdate`, `active`, `lastactivity`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES (2, 2, 'aliza', '$2y$10$oR5UM7FDArgNsH9WO/fkAuHC/QVGe1ZTv/jvjP2ogLKaGyD43TQHq', '\0A\0l\0i\0z\0a\0 \0S\0o\0l\0o\0m\0o\0n', 'Pamplona Tres, Las Pinas City', 'alizajoy.solomon@megasportsworld.com', '+639175584786', 'female', 0, NULL, 1, NULL, '2018-06-06 10:52:41', 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `lvf_users` (`userid`, `employee_id`, `username`, `password`, `fullname`, `address`, `email`, `cp_no`, `gender`, `role`, `activation_key`, `activate`, `resetpasskey`, `resetdate`, `active`, `lastactivity`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES (3, 3, 'kristal', '$2y$10$70iG3axLFGzsRckmApLQs.l7yQ8fkgjT1d3f4NX9bmNjUHUNTrl2C', '\0K\0r\0i\0s\0t\0a\0l\0l\0y\0n\0n\0 \0T\0o\0l\0e\0n\0t\0i\0n\0o', 'QC', 'Kristallynn.Tolentino@megasportsworld.com', '+639565769881', 'female', 2, NULL, 1, NULL, '2018-06-29 16:20:30', 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `lvf_users` (`userid`, `employee_id`, `username`, `password`, `fullname`, `address`, `email`, `cp_no`, `gender`, `role`, `activation_key`, `activate`, `resetpasskey`, `resetdate`, `active`, `lastactivity`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES (4, 4, 'resty', '$2y$10$RYE3Sp5629byweRZj19AAuIFnvsxhSyhtPwEGdT0c6w8HI/ZGZhvO', '\0R\0e\0s\0t\0y\0 \0J\0a\0y\0 \0A\0l\0e\0j\0o', 'Molino 4, Bacoor, Cavite', 'RestyJay.Alejo@megasportsworld.com', '+639061501183', 'male', 2, NULL, 1, NULL, '2018-06-29 16:23:51', 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `lvf_users` (`userid`, `employee_id`, `username`, `password`, `fullname`, `address`, `email`, `cp_no`, `gender`, `role`, `activation_key`, `activate`, `resetpasskey`, `resetdate`, `active`, `lastactivity`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES (5, 5, 'jai-ann', '$2y$10$u6tnkfjhXLtOFwXvYOHsuOsdLDWnmp4NAtk/G5e.Zbb6shzTwcQ8y', '\0J\0a\0i\0-\0A\0n\0n\0 \0S\0o\0t\0t\0o', '#24A S. marcelo St., Maysan, Valenzuela City', 'Jai-Ann.Sotto@megasportsworld.com', '+639178075413', 'female', 0, NULL, 1, NULL, '2018-06-25 11:01:42', 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `lvf_users` (`userid`, `employee_id`, `username`, `password`, `fullname`, `address`, `email`, `cp_no`, `gender`, `role`, `activation_key`, `activate`, `resetpasskey`, `resetdate`, `active`, `lastactivity`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES (6, 6, 'mgrace', '$2y$10$AL3EOOYcBel2.s6BphWnsO8C8M0YrY//KFpiXDorEXi1oCcUpGsCa', '\0M\0a\0r\0y\0 \0G\0r\0a\0c\0e\0 \0E\0d\0e\0n\0 \0B\0a\0s\0u\0e\0l', 'Quezon City', 'MaryGraceEden.Basuel@megasportsworld.com', '09178061829', 'female', 0, NULL, 1, NULL, '2018-05-31 13:06:04', 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `lvf_users` (`userid`, `employee_id`, `username`, `password`, `fullname`, `address`, `email`, `cp_no`, `gender`, `role`, `activation_key`, `activate`, `resetpasskey`, `resetdate`, `active`, `lastactivity`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES (7, 7, 'Cxian', '$2y$10$oR5UM7FDArgNsH9WO/fkAuHC/QVGe1ZTv/jvjP2ogLKaGyD43TQHq', '\0C\0h\0r\0i\0s\0t\0i\0a\0n\0 \0R\0e\0a\0l\0u\0b\0i\0t', 'Makati City', 'christian.realubit@megasportsworld.com', '09178001624', 'male', 4, NULL, 1, NULL, '2018-07-11 11:53:33', 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `lvf_users` (`userid`, `employee_id`, `username`, `password`, `fullname`, `address`, `email`, `cp_no`, `gender`, `role`, `activation_key`, `activate`, `resetpasskey`, `resetdate`, `active`, `lastactivity`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES (8, 8, 'sherwin', '$2y$10$Wao.cqAcd0C58tNG.x2uR.3tQV/P8NChKtcO/5a9xHxQV3kHRGmTC', '\0S\0h\0e\0r\0w\0i\0n\0 \0M\0a\0c\0a\0l\0i\0n\0t\0a\0l', 'Binan, Laguna', 'SherwinNino.Macalintal@megasportsworld.com', '+639175541122', 'male', 2, NULL, 1, NULL, '2018-05-30 16:41:29', 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `lvf_users` (`userid`, `employee_id`, `username`, `password`, `fullname`, `address`, `email`, `cp_no`, `gender`, `role`, `activation_key`, `activate`, `resetpasskey`, `resetdate`, `active`, `lastactivity`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES (9, 9, 'quid', '$2y$10$5kk9mkITK068TDcycQrBmuT4isyeZpSYzxBVwM7lH7Ii6qTJQtER.', '\0J\0o\0h\0n\0 \0P\0a\0u\0l\0 \0Q\0u\0i\0d\0i\0l\0l\0a', 'Edi sa puso mo &lt;3', 'JohnPaul.Quidilla@megasportsworld.com', '09173979547', 'male', 0, NULL, 1, NULL, '2018-06-25 11:04:38', 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `lvf_users` (`userid`, `employee_id`, `username`, `password`, `fullname`, `address`, `email`, `cp_no`, `gender`, `role`, `activation_key`, `activate`, `resetpasskey`, `resetdate`, `active`, `lastactivity`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES (14, 14, 'asfasf', NULL, NULL, NULL, 'forc100915@gmail.com', NULL, 'male', 0, NULL, 1, NULL, NULL, 0, NULL, '2018-07-20 17:49:09', NULL, 'mnaluz', NULL);


