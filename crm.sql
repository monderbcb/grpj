-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 23 مايو 2021 الساعة 16:34
-- إصدار الخادم: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crm`
--
CREATE DATABASE IF NOT EXISTS `crm` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `crm`;

-- --------------------------------------------------------

--
-- بنية الجدول `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- بنية الجدول `prequest`
--

DROP TABLE IF EXISTS `prequest`;
CREATE TABLE `prequest` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contactno` varchar(11) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `others` varchar(255) DEFAULT NULL,
  `query` longtext DEFAULT NULL,
  `posting_date` date DEFAULT NULL,
  `remark` longtext DEFAULT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `prequest`
--

INSERT INTO `prequest` (`id`, `name`, `email`, `contactno`, `company`, `others`, `query`, `posting_date`, `remark`, `status`) VALUES
(12, 'ased', 'info@alwasata.ly', 'sdds', 'as', '0', 'asas', '2021-04-12', '', 2),
(13, 'منذر علي الغراري', 'info@alwasata.ly', 'ever', 'every', '0', 'sASAS', '2021-04-12', NULL, 2),
(14, 'محمد محمد', 'info@alwasata.ly', 'ever', 'every', '1', 'لالالالالالالا', '2021-04-12', 'noooooooo', 2),
(15, 'منذر علي الغراري', 'info@alwasata.ly', 'ever', 'every', '0', 'sASAS', '2021-04-12', NULL, 2),
(16, 'منذر علي الغراري', 'info@alwasata.ly', 'ever', 'every', '0', 'gfn', '2021-04-12', NULL, 2),
(17, 'منذر علي الغراري', 'info@alwasata.ly', 'ever', 'every', '0', 'gfn', '2021-04-12', NULL, 2),
(18, 'منذر علي الغراري', 'info@alwasata.ly', 'ever', 'every', '0', 'swss', '2021-04-12', NULL, 2),
(19, 'منذر علي الغراري', 'info@alwasata.ly', 'ever', 'every', '0', 'swss', '2021-04-12', NULL, 2),
(20, 'منذر علي الغراري', 'info@alwasata.ly', 'ever', 'every', '0', 'sdd', '2021-04-12', NULL, 2),
(21, 'منذر علي الغراري', 'abc@gmail.com', 'ever', 'every', '0', 'ddd', '2021-04-12', NULL, 2),
(22, 'منذر علي الغراري', 'info@alwasata.ly', 'ever', 'every', '0', 'sss', '2021-04-12', NULL, 2),
(23, 'منذر علي الغراري', 'info@alwasata.ly', 'ever', 'every', '0', 'sss', '2021-04-12', NULL, 2),
(24, 'منذر علي الغراري', 'info@alwasata.ly', 'ever', 'every', '0', 'sss', '2021-04-12', NULL, 2),
(25, 'منذر علي الغراري', 'info@alwasata.ly', 'ever', 'every', '0', 'dfff', '2021-04-12', NULL, 2),
(26, 'منذر علي الغراري', 'info@alwasata.ly', 'ever', 'every', '0', 'dfff', '2021-04-13', NULL, 2),
(27, 'منذر علي الغراري', 'info@alwasata.ly', 'ever', 'every', '0', 'dfff', '2021-04-13', NULL, 2),
(28, 'علاء', 'alaalden@gmail.com', '122', '124', '1', '123123', '2021-05-23', 'aa', 2);

-- --------------------------------------------------------

--
-- بنية الجدول `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `service`
--

INSERT INTO `service` (`id`, `name`, `status`, `notes`) VALUES
(12, 'تجريب', 1, 'تتتتتتتت'),
(13, 'test2', 1, 'row2'),
(14, 'jjjj', 1, 'tesssss3\r\n');

-- --------------------------------------------------------

--
-- بنية الجدول `service_prequest`
--

DROP TABLE IF EXISTS `service_prequest`;
CREATE TABLE `service_prequest` (
  `request_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `service_prequest`
--

INSERT INTO `service_prequest` (`request_id`, `service_id`) VALUES
(1, 2),
(24, 13),
(25, 13),
(25, 14),
(26, 13),
(26, 14),
(27, 13),
(27, 14),
(28, 14);

-- --------------------------------------------------------

--
-- بنية الجدول `ticket`
--

DROP TABLE IF EXISTS `ticket`;
CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `ticket_id` varchar(11) NOT NULL,
  `email_id` varchar(300) NOT NULL,
  `subject` varchar(300) NOT NULL,
  `task_type` varchar(300) NOT NULL,
  `prioprity` varchar(300) NOT NULL,
  `ticket` longtext NOT NULL,
  `attachment` varchar(300) NOT NULL,
  `status` varchar(300) NOT NULL,
  `admin_remark` longtext NOT NULL,
  `posting_date` date NOT NULL,
  `admin_remark_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `ticket`
--

INSERT INTO `ticket` (`id`, `ticket_id`, `email_id`, `subject`, `task_type`, `prioprity`, `ticket`, `attachment`, `status`, `admin_remark`, `posting_date`, `admin_remark_date`) VALUES
(7, 'TID3071', 'anuj.lpu1@gmail.com', 'testing', 'billing', 'important', 'hiiiiiiiiiiiiii', '', 'close', 'This is done.', '2015-02-18', '0000-00-00 00:00:00'),
(8, 'TID3072', 'anuj.lpu1@gmail.com', 'testing', 'billing', 'important', 'hiiiiiiiiiiiiii', '', 'close', 'aasdfgdfgvhfgvb jgjfhfh', '2015-02-18', '0000-00-00 00:00:00'),
(9, '2', 'anuj@gmail.com', 'Test', 'ot1', 'important', 'sample text for testing. sample text for testing.sample text for testing.sample text for testing.sample text for testing.sample text for testing.sample text for testing.sample text for testing.sample text for testing.sample text for testing.sample text for testing.sample text for testing.sample text for testing.sample text for testing.sample text for testing.', '', 'Open', 'vsdfga', '2019-07-11', '0000-00-00 00:00:00'),
(11, '4', 'abc@gmail.com', 'Test Ticket', 'ot1', 'important', 'This is sample text for testing.', '', 'Open', 'Your query is solved now.', '2019-08-10', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- بنية الجدول `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `alt_email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `user_image` varchar(255) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `posting_date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `alt_email`, `password`, `mobile`, `gender`, `user_image`, `address`, `status`, `posting_date`) VALUES
(3, 'Anuj kumar', 'anuj.lpu1@gmail.com', 'anujkumar301990@gmail.com', '123456', '8285703354', 'Female', NULL, 'Sec-5 Sahibabad Ghaziabad ', 0, '2015-01-01 18:30:00'),
(7, 'Rahul', 'rahul@gmail.com', '', '123456', '8285703355', 'm', '', '', 0, '2015-02-03 18:30:00'),
(9, 'Anuj', 'demo@gmail.com', 'test@gmail.com', 'Test@12345', '1234567890', 'm', '', 'New Delhi India', 0, '2019-07-10 18:30:00'),
(11, 'Test user', 'testuser@gmail.com', 'ak@gmail.com', 'Test@123', '1234567890', 'Male', NULL, 'New Delhi', NULL, '2019-08-06 18:09:15'),
(12, 'ABc', 'abc@gmail.com', 'jsadgj@gmail.com', 'Test@123', '1234567890', 'm', NULL, 'New Delhi India', NULL, '2019-08-10 11:24:31'),
(13, 'lihklohi', '.k,gbj,k', NULL, '', '', 'm', NULL, NULL, NULL, '2021-02-24 15:58:41'),
(14, '', '', NULL, '', '', 'm', NULL, NULL, NULL, '2021-02-24 15:58:51');

-- --------------------------------------------------------

--
-- بنية الجدول `usercheck`
--

DROP TABLE IF EXISTS `usercheck`;
CREATE TABLE `usercheck` (
  `id` int(11) NOT NULL,
  `logindate` varchar(255) DEFAULT '',
  `logintime` varchar(255) DEFAULT '',
  `user_id` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT '',
  `ip` varbinary(16) DEFAULT NULL,
  `mac` varbinary(16) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `usercheck`
--

INSERT INTO `usercheck` (`id`, `logindate`, `logintime`, `user_id`, `username`, `email`, `ip`, `mac`, `city`, `country`) VALUES
(91, '2015/04/28', '04:37:40pm', 3, 'Anuj kumar', 'anuj.lpu1@gmail.com', 0x3a3a31, 0x31452d38352d35362d43352d39312d45, '', ''),
(92, '2015/04/29', '02:57:12pm', 3, 'Anuj kumar', 'anuj.lpu1@gmail.com', 0x3132322e3136322e302e323431, '', 'Delhi', 'India'),
(93, '2015/04/30', '04:27:02pm', 3, 'Anuj kumar', 'anuj.lpu1@gmail.com', 0x3132322e3136322e3134322e3138, '', 'Delhi', 'India'),
(94, '2015/04/30', '05:23:55pm', 3, 'Anuj kumar', 'anuj.lpu1@gmail.com', 0x3132322e3136322e3134322e3138, '', 'Delhi', 'India'),
(95, '2015/05/18', '01:18:51pm', 3, 'Anuj kumar', 'anuj.lpu1@gmail.com', 0x3132322e3136322e382e313830, '', 'Delhi', 'India'),
(96, '2015/11/05', '09:30:36pm', 3, 'Anuj kumar', 'anuj.lpu1@gmail.com', 0x3a3a31, 0x33342d34422d35302d42372d45462d33, '', ''),
(97, '2015/11/13', '12:05:39am', 3, 'Anuj kumar', 'anuj.lpu1@gmail.com', 0x3a3a31, 0x42432d38352d35362d43352d39312d45, '', ''),
(98, '2015/12/14', '09:36:01pm', 3, 'Anuj kumar', 'anuj.lpu1@gmail.com', 0x3a3a31, 0x42432d38352d35362d43352d39312d45, '', ''),
(99, '2016/02/11', '09:47:08pm', 3, 'Anuj kumar', 'anuj.lpu1@gmail.com', 0x3a3a31, 0x42432d38352d35362d43352d39312d45, '', ''),
(100, '2016/04/07', '12:17:50am', 7, 'Rahul', 'rahul@gmail.com', 0x3a3a31, 0x42432d38352d35362d43352d39312d45, '', ''),
(101, '2016/04/20', '09:37:54am', 3, 'Anuj kumar', 'anuj.lpu1@gmail.com', 0x3a3a31, 0x42432d38352d35362d43352d39312d45, '', ''),
(102, '2016/04/25', '09:55:45pm', 3, 'Anuj kumar', 'anuj.lpu1@gmail.com', 0x3a3a31, 0x42432d38352d35362d43352d39312d45, '', ''),
(103, '2016/04/26', '08:19:12pm', 3, 'Anuj kumar', 'anuj.lpu1@gmail.com', 0x3a3a31, 0x42432d38352d35362d43352d39312d45, '', ''),
(104, '2016/04/26', '08:26:18pm', 3, 'Anuj kumar', 'anuj.lpu1@gmail.com', 0x3a3a31, 0x42432d38352d35362d43352d39312d45, '', ''),
(105, '2016/04/30', '11:59:25pm', 3, 'Anuj kumar', 'anuj.lpu1@gmail.com', 0x3a3a31, 0x42432d38352d35362d43352d39312d45, '', ''),
(106, '2016/04/30', '12:30:10am', 3, 'Anuj kumar', 'anuj.lpu1@gmail.com', 0x3a3a31, 0x42432d38352d35362d43352d39312d45, '', ''),
(107, '2019/07/11', '12:27:21pm', 9, 'Anuj', 'anuj@gmail.com', 0x3a3a31, 0x33432d35322d38322d35312d41352d42, '', ''),
(108, '2019/07/15', '12:12:00pm', 9, 'Anuj', 'anuj@gmail.com', 0x3a3a31, 0x33432d35322d38322d35312d41352d42, '', ''),
(109, '2019/08/06', '11:39:30pm', 11, 'Test user', 'testuser@gmail.com', 0x3a3a31, 0x31322d46342d38442d31322d39392d39, '', ''),
(110, '2019/08/10', '04:51:41pm', 11, 'Test user', 'testuser@gmail.com', 0x3a3a31, 0x31322d46342d38442d31322d39392d39, '', ''),
(111, '2019/08/10', '04:54:44pm', 12, 'ABc', 'abc@gmail.com', 0x3a3a31, 0x31322d46342d38442d31322d39392d39, '', ''),
(112, '2021/04/08', '11:27:26pm', 9, 'Anuj', 'demo@gmail.com', 0x3132372e302e302e31, 0x31342d46452d42352d43312d46422d35, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prequest`
--
ALTER TABLE `prequest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_prequest`
--
ALTER TABLE `service_prequest`
  ADD PRIMARY KEY (`request_id`,`service_id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usercheck`
--
ALTER TABLE `usercheck`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `prequest`
--
ALTER TABLE `prequest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `usercheck`
--
ALTER TABLE `usercheck`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

DELIMITER $$
--
-- أحداث
--
DROP EVENT IF EXISTS `change_prequest_stutes`$$
CREATE DEFINER=`root`@`localhost` EVENT `change_prequest_stutes` ON SCHEDULE EVERY 1 DAY STARTS '2021-04-14 00:51:18' ENDS '2025-04-30 00:51:18' ON COMPLETION PRESERVE ENABLE COMMENT 'sets states of missed prequests to un answered = 3' DO UPDATE prequest SET STATUS = 3 
WHERE id IN ( 
SELECT id FROM prequest WHERE 
posting_date  = NOW() - INTERVAL 7 DAY AND STATUS = 1 
)$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
