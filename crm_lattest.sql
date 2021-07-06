-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2021 at 01:16 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `display_name` varchar(100) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`, `display_name`, `date_of_birth`, `email`, `avatar`) VALUES
(1, 'admin', 'admin', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `chatid` int(11) NOT NULL,
  `sender_userid` int(11) NOT NULL,
  `reciever_userid` int(11) NOT NULL,
  `message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL,
  `admin_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`chatid`, `sender_userid`, `reciever_userid`, `message`, `timestamp`, `status`, `admin_id`) VALUES
(104, 0, 11, 'asdasdasd', '2021-06-05 19:10:01', 1, NULL),
(105, 0, 11, 'asdasd', '2021-06-05 19:10:08', 1, NULL),
(106, 0, 11, 'tttttttt', '2021-06-05 19:11:07', 1, NULL),
(107, 0, 11, 'frfrrgfe5yt6y343443', '2021-06-05 19:12:06', 1, NULL),
(108, 0, 11, 'fyhje5gegef5', '2021-06-05 19:13:04', 1, NULL),
(109, 0, 11, 'ffffff', '2021-06-05 19:17:07', 1, NULL),
(110, 0, 11, 'gggggg', '2021-06-05 19:19:03', 1, NULL),
(111, 0, 11, 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', '2021-06-05 19:19:18', 1, NULL),
(112, 0, 11, 'cfbndgt', '2021-06-05 19:23:41', 1, NULL),
(113, 0, 11, '1111111111111111111111111', '2021-06-05 19:28:30', 1, NULL),
(114, 11, 0, 'bgfthnndfth', '2021-06-05 19:42:13', 1, NULL),
(115, 0, 11, 'bdrgsrwrsg', '2021-06-05 19:42:22', 1, NULL),
(116, 0, 11, 'frfrrgfe5yt6y343443asdasd', '2021-06-16 16:45:39', 1, 0),
(117, 0, 11, '123123123', '2021-06-16 16:46:32', 1, 0),
(118, 0, 11, '123123123', '2021-06-16 16:46:51', 1, 1),
(119, 11, 0, 'dfdfdfassd ', '2021-06-16 16:48:18', 1, NULL),
(120, 11, 0, 'sdsdsdxc b xc ', '2021-06-16 16:48:43', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chat_login_details`
--

CREATE TABLE `chat_login_details` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `last_activity` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_typing` enum('no','yes') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chat_login_details`
--

INSERT INTO `chat_login_details` (`id`, `userid`, `last_activity`, `is_typing`) VALUES
(14, 11, '2021-06-05 19:09:48', 'no'),
(15, 11, '2021-06-05 19:09:48', 'no'),
(16, 0, '2021-06-05 19:09:56', 'yes'),
(17, 11, '2021-06-05 19:11:55', 'no'),
(18, 11, '2021-06-16 14:44:37', 'no'),
(19, 0, '2021-06-16 15:33:10', 'no'),
(20, 0, '2021-06-16 16:45:31', 'no'),
(21, 0, '2021-06-16 16:46:47', 'no'),
(22, 11, '2021-06-16 16:48:07', 'no'),
(23, 11, '2021-06-16 19:27:42', 'no'),
(24, 0, '2021-06-16 19:31:45', 'no'),
(25, 0, '2021-06-16 19:33:03', 'no'),
(26, 0, '2021-06-16 19:33:06', 'no'),
(27, 0, '2021-06-16 19:34:21', 'no'),
(28, 0, '2021-06-16 19:34:51', 'no'),
(29, 0, '2021-06-16 19:35:13', 'no'),
(30, 0, '2021-06-16 19:35:56', 'no'),
(31, 0, '2021-06-16 19:38:34', 'no'),
(32, 0, '2021-06-16 19:45:07', 'no'),
(33, 11, '2021-06-17 13:30:46', 'no'),
(34, 11, '2021-07-03 10:45:50', 'no'),
(35, 0, '2021-07-03 11:33:58', 'no'),
(36, 11, '2021-07-05 17:40:09', 'no'),
(37, 11, '2021-07-05 18:42:37', 'no'),
(38, 11, '2021-07-05 19:28:05', 'no'),
(39, 0, '2021-07-06 10:30:43', 'no'),
(40, 0, '2021-07-06 10:33:04', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `prequest`
--

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
-- Dumping data for table `prequest`
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
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(3) UNSIGNED DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `name`, `status`, `notes`) VALUES
(12, 'تجريب', 1, 'تتتتتتتت'),
(13, 'test2', 1, 'row2'),
(14, 'jjjj', 1, 'tesssss3\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `service_prequest`
--

CREATE TABLE `service_prequest` (
  `request_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `time_of_link` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_prequest`
--

INSERT INTO `service_prequest` (`request_id`, `service_id`, `time_of_link`) VALUES
(1, 2, '2021-07-05 18:00:10'),
(24, 13, '2021-07-05 18:00:10'),
(25, 13, '2021-07-05 18:00:10'),
(25, 14, '2021-07-05 18:00:10'),
(26, 13, '2021-07-05 18:00:10'),
(26, 14, '2021-07-05 18:00:10'),
(27, 13, '2021-07-05 18:00:10'),
(27, 14, '2021-07-05 18:00:10'),
(28, 14, '2021-07-05 18:00:10');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

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
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `ticket_id`, `email_id`, `subject`, `task_type`, `prioprity`, `ticket`, `attachment`, `status`, `admin_remark`, `posting_date`, `admin_remark_date`) VALUES
(7, 'TID3071', 'testuser@gmail.com', 'testing', 'billing', 'important', 'hiiiiiiiiiiiiii', '', 'Closed', 'This is done.', '2015-02-18', '2021-07-03 11:15:32'),
(8, 'TID3072', 'testuser@gmail.com', 'testing', 'billing', 'important', 'hiiiiiiiiiiiiii', '', 'Closed', 'aasdfgdfgvhfgvb jgjfhfh', '2015-02-18', '2021-07-03 11:15:27'),
(9, '2', 'testuser@gmail.com', 'Test', 'ot1', 'important', 'sample text for testing. sample text for testing.sample text for testing.sample text for testing.sample text for testing.sample text for testing.sample text for testing.sample text for testing.sample text for testing.sample text for testing.sample text for testing.sample text for testing.sample text for testing.sample text for testing.sample text for testing.', '', 'Open', 'vsdfga', '2019-07-11', '2021-06-16 14:46:04'),
(11, '4', 'abc@gmail.com', 'Test Ticket', 'ot1', 'important', 'This is sample text for testing.', '', 'Open', 'Your query is solved now.', '2019-08-10', '0000-00-00 00:00:00'),
(12, '8', 'testuser@gmail.com', 'aasefsdf', 'تجريب', 'urgent(functional problem)', 'سيبسيب', '', 'Open', '', '2021-06-16', NULL),
(15, '11', 'testuser@gmail.com', 'dsdffsd', 'test2', 'important', 'zxxczxc', '', 'Open', '', '2021-06-16', NULL),
(16, '12', 'testuser@gmail.com', 'asdasd', 'test2', 'urgent(functional problem)', 'asdasd', '', 'Open', '', '2021-06-16', NULL),
(17, '13', 'testuser@gmail.com', 'test file', 'تجريب', 'important', 's', '', 'Open', '', '2021-06-16', NULL),
(18, '14', 'testuser@gmail.com', 'qwe', 'test2', 'urgent(functional problem)', 'qwe', '77073865_107387567391864_3784807859355648000_n.jpg', 'Closed', 'asdasd', '2021-06-16', '2021-06-16 15:39:26'),
(19, '15', 'testuser@gmail.com', 'asdasd', 'تجريب', 'important', 'asdasdasd', '', 'Open', '', '2021-06-17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `alt_email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `user_image` varchar(255) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `status` tinyint(3) DEFAULT 1,
  `posting_date` timestamp NULL DEFAULT current_timestamp(),
  `current_session` int(11) DEFAULT NULL,
  `username` varchar(256) DEFAULT NULL,
  `avatar` varchar(256) DEFAULT NULL,
  `online` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `alt_email`, `password`, `mobile`, `gender`, `date_of_birth`, `user_image`, `address`, `status`, `posting_date`, `current_session`, `username`, `avatar`, `online`) VALUES
(0, 'monder', 'demo@gmail.com', 'test@gmail.com', 'Test@12345', '1234567890', 'm', '2021-07-01', '', 'Tripoli', 1, '2021-05-20 18:30:00', 11, NULL, NULL, 1),
(3, 'mohammed', 'anuj.lpu1@gmail.com', 'moahmmed@gmail.com', '123456', '0920000187', 'Male', NULL, NULL, 'طرابلس', 0, '2015-01-01 18:30:00', NULL, NULL, NULL, NULL),
(7, 'سليم', 'rahul@gmail.com', '', '123456', '0910000187', 'Male', NULL, '', 'يسسييس', 0, '2015-02-03 18:30:00', NULL, NULL, NULL, NULL),
(11, 'user', 'testuser@gmail.com', 'ak@gmail.com', 'user', '1234567890', 'm', NULL, NULL, 'New LIBYA', 0, '2019-08-06 18:09:15', NULL, NULL, NULL, 1),
(15, 'sdf', 'sdf', NULL, 'sdf', '+218920000010', 'm', NULL, NULL, NULL, -1, '2021-07-03 13:00:50', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usercheck`
--

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
-- Dumping data for table `usercheck`
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
(112, '2021/04/08', '11:27:26pm', 9, 'Anuj', 'demo@gmail.com', 0x3132372e302e302e31, 0x31342d46452d42352d43312d46422d35, '', ''),
(113, '2021/06/03', '08:22:29pm', 11, 'Test user', 'testuser@gmail.com', 0x3132372e302e302e31, 0x31342d46452d42352d43312d46422d35, '', ''),
(114, '2021/06/03', '08:37:17pm', 11, 'Test user', 'testuser@gmail.com', 0x3132372e302e302e31, 0x31342d46452d42352d43312d46422d35, '', ''),
(115, '2021/06/03', '08:38:17pm', 11, 'Test user', 'testuser@gmail.com', 0x3132372e302e302e31, 0x31342d46452d42352d43312d46422d35, '', ''),
(116, '2021/06/05', '08:12:17pm', 11, 'user', 'user', 0x3a3a31, 0x30302d31352d35442d39392d31452d33, '', ''),
(117, '2021/06/05', '08:26:38pm', 11, 'user', 'user', 0x3a3a31, 0x30302d31352d35442d39392d31452d33, '', ''),
(118, '2021/06/05', '08:28:43pm', 11, 'user', 'user', 0x3a3a31, 0x30302d31352d35442d39392d31452d33, '', ''),
(119, '2021/06/05', '08:36:26pm', 11, 'user', 'user', 0x3a3a31, 0x30302d31352d35442d39392d31452d33, '', ''),
(120, '2021/06/05', '09:10:28pm', 11, 'user', 'user', 0x3a3a31, 0x30302d31352d35442d39392d31452d33, '', ''),
(121, '2021/06/05', '09:20:40pm', 11, 'user', 'user', 0x3a3a31, 0x30302d31352d35442d39392d31452d33, '', ''),
(122, '2021/06/05', '09:54:57pm', 11, 'user', 'user', 0x3a3a31, 0x30302d31352d35442d39392d31452d33, '', ''),
(123, '2021/06/05', '09:58:05pm', 11, 'user', 'user', 0x3a3a31, 0x30302d31352d35442d39392d31452d33, '', ''),
(124, '2021/06/05', '09:59:27pm', 11, 'user', 'user', 0x3a3a31, 0x30302d31352d35442d39392d31452d33, '', ''),
(125, '2021/06/05', '09:59:55pm', 11, 'user', 'user', 0x3a3a31, 0x30302d31352d35442d39392d31452d33, '', ''),
(126, '2021/06/05', '10:49:11pm', 11, 'user', 'user', 0x3a3a31, 0x30302d31352d35442d39392d31452d33, '', ''),
(127, '2021/06/05', '10:54:09pm', 11, 'user', 'user', 0x3a3a31, 0x30302d31352d35442d39392d31452d33, '', ''),
(128, '2021/06/05', '11:09:44pm', 11, 'user', 'user', 0x3a3a31, 0x30302d31352d35442d39392d31452d33, '', ''),
(129, '2021/06/05', '12:01:36am', 11, 'user', 'testuser@gmail.com', 0x3a3a31, 0x30302d31352d35442d39392d31452d33, '', ''),
(130, '2021/06/05', '12:16:45am', 11, 'user', 'testuser@gmail.com', 0x3a3a31, 0x30302d31352d35442d39392d31452d33, '', ''),
(131, '2021/06/05', '12:30:02am', 11, 'user', 'testuser@gmail.com', 0x3a3a31, 0x30302d31352d35442d39392d31452d33, '', ''),
(132, '2021/06/05', '12:38:11am', 11, 'user', 'testuser@gmail.com', 0x3a3a31, 0x30302d31352d35442d39392d31452d33, '', ''),
(133, '2021/06/05', '12:39:48am', 11, 'user', 'testuser@gmail.com', 0x3a3a31, 0x30302d31352d35442d39392d31452d33, '', ''),
(134, '2021/06/05', '12:39:48am', 11, 'user', 'testuser@gmail.com', 0x3a3a31, 0x30302d31352d35442d39392d31452d33, '', ''),
(135, '2021/06/05', '12:41:55am', 11, 'user', 'testuser@gmail.com', 0x3a3a31, 0x30302d31352d35442d39392d31452d33, '', ''),
(136, '2021/06/16', '08:14:37pm', 11, 'user', 'testuser@gmail.com', 0x3a3a31, 0x30302d31352d35442d43312d43372d41, '', ''),
(137, '2021/06/16', '10:18:08pm', 11, 'user', 'testuser@gmail.com', 0x3a3a31, 0x30302d31352d35442d43312d43372d41, '', ''),
(139, '2021/06/16', '12:57:42am', 11, 'user', 'testuser@gmail.com', 0x3a3a31, 0x30302d31352d35442d43312d43372d41, '', ''),
(140, '2021/06/16', '01:13:43am', 0, 'not authorised', 'not authorised', 0x3a3a31, 0x30302d31352d35442d43312d43372d41, '', ''),
(141, '2021/06/16', '01:14:16am', 0, 'not authorised', 'not authorised', 0x3a3a31, 0x30302d31352d35442d43312d43372d41, '', ''),
(142, '2021/06/16', '01:14:40am', 0, 'not authorised', 'not authorised', 0x3a3a31, 0x30302d31352d35442d43312d43372d41, '', ''),
(143, '2021/06/17', '07:00:46pm', 11, 'user', 'testuser@gmail.com', 0x3a3a31, 0x30302d31352d35442d43312d43372d41, '', ''),
(144, '2021/07/03', '04:15:50pm', 11, 'user', 'testuser@gmail.com', 0x3a3a31, 0x46302d39322d31432d44452d38332d43, '', ''),
(145, '2021/07/05', '11:10:09pm', 11, 'user', 'testuser@gmail.com', 0x3a3a31, 0x46302d39322d31432d44452d38332d43, '', ''),
(146, '2021/07/05', '12:12:38am', 11, 'user', 'testuser@gmail.com', 0x3a3a31, 0x46302d39322d31432d44452d38332d43, '', ''),
(147, '2021/07/05', '12:58:05am', 11, 'user', 'testuser@gmail.com', 0x3a3a31, 0x46302d39322d31432d44452d38332d43, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chatid`);

--
-- Indexes for table `chat_login_details`
--
ALTER TABLE `chat_login_details`
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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `chatid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `chat_login_details`
--
ALTER TABLE `chat_login_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `usercheck`
--
ALTER TABLE `usercheck`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

DELIMITER $$
--
-- Events
--
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
