-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2024 at 11:53 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_dbtest`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `title_prefix` enum('นาย','นาง','นางสาว') NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `birthdate` date NOT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `total_income` decimal(10,2) DEFAULT 0.00,
  `total_expense` decimal(10,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `title_prefix`, `first_name`, `last_name`, `birthdate`, `profile_image`, `updated_at`, `total_income`, `total_expense`) VALUES
(8, 'นาง', 'นามี', 'สีแดง', '2002-02-01', '458165610_1449980389043178_3609390265516148039_n.jpg', '2024-09-20 08:24:06', 0.00, 0.00),
(10, 'นาง', 'ดำ', 'สีดำ', '2014-06-05', '20240604_100545.jpg', '2024-09-20 09:11:42', 0.00, 0.00),
(11, 'นางสาว', 'ลา', 'พา', '2014-04-19', '419667751_741694437842437_5517050004960721902_n.png', '2024-09-20 09:13:37', 0.00, 0.00),
(13, 'นาง', 'ม่วง', 'สีม่วง', '2011-04-20', '406448839_932355021784018_477073781118254043_n.jpg', '2024-09-20 08:40:57', 0.00, 0.00),
(14, 'นาง', 'คราม', 'สคราม', '2009-07-20', '419917942_247828138339946_9029184421099148244_n.jpg', '2024-09-20 08:41:27', 0.00, 0.00),
(15, 'นาย', 'น้ำเงิน', 'สีน้ำเงิน', '2024-09-21', 'b13.jpg', '2024-09-20 08:41:49', 0.00, 0.00),
(16, 'นาง', 'เขียว', 'สีเขียว', '2007-02-20', '457166033_1238895717255744_640198057042242304_n.jpg', '2024-09-20 08:42:14', 0.00, 0.00),
(17, 'นางสาว', 'เหลือง', 'สีเหลือง', '2008-08-21', 'profilepic.jpg', '2024-09-20 08:42:53', 0.00, 0.00),
(18, 'นาย', 'แสด', 'สีแสด', '2002-10-20', '458165610_1449980389043178_3609390265516148039_n.jpg', '2024-09-20 08:43:22', 0.00, 0.00),
(19, 'นางสาว', 'คำมี', 'น้ำใจ', '2024-09-20', '978167.png', '2024-09-20 08:44:24', 0.00, 0.00),
(20, 'นาง', 'สอบ', 'สีสอบ', '2013-06-05', 'meeting.jpg', '2024-09-20 08:44:45', 0.00, 0.00),
(21, 'นาง', 'a', 'aa', '2024-07-11', 'Portfolio.png', '2024-09-20 08:53:02', 0.00, 0.00),
(22, 'นางสาว', 'b', 'bb', '2024-09-01', '239305.jpg', '2024-09-20 08:53:26', 0.00, 0.00),
(23, 'นางสาว', 'c', 'cc', '2024-09-02', '239306.jpg', '2024-09-20 08:53:39', 0.00, 0.00),
(24, 'นาย', 'd', 'dd', '2024-09-03', '419917942_247828138339946_9029184421099148244_n.jpg', '2024-09-20 08:53:59', 0.00, 0.00),
(25, 'นาย', 'e', 'ee', '2024-09-04', '419773282_692247463085317_1950717640217803633_n.png', '2024-09-20 08:54:08', 0.00, 0.00),
(26, 'นาง', 'f', 'ff', '2024-09-05', '406448839_932355021784018_477073781118254043_n.jpg', '2024-09-20 08:54:48', 0.00, 0.00),
(27, 'นาย', 'g', 'gg', '2024-09-08', '419773282_692247463085317_1950717640217803633_n.png', '2024-09-20 08:55:00', 0.00, 0.00),
(28, 'นาย', 'w', 'ww', '2024-09-09', '419667751_741694437842437_5517050004960721902_n.png', '2024-09-20 08:55:09', 0.00, 0.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
