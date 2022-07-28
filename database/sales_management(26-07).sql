-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3310
-- Generation Time: Jul 26, 2022 at 05:37 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sales_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

CREATE TABLE `batches` (
  `batchId` int(11) NOT NULL,
  `courseId` int(11) NOT NULL,
  `batchName` varchar(500) NOT NULL,
  `batchStartDate` varchar(255) NOT NULL,
  `batchEndDate` varchar(255) NOT NULL,
  `batchStatus` enum('1','0') NOT NULL DEFAULT '0',
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batches`
--

INSERT INTO `batches` (`batchId`, `courseId`, `batchName`, `batchStartDate`, `batchEndDate`, `batchStatus`, `createdDate`, `updatedDate`) VALUES
(2, 7, 'Batch3', '07/05/2022', '07/25/2022', '1', '2022-07-03 11:59:31', '2022-07-03 11:48:07'),
(3, 6, 'Batch2', '06/30/2022', '07/09/2022', '1', '2022-06-30 18:44:28', '2022-06-24 20:55:33'),
(4, 2, 'batch1', '07/01/2022', '07/11/2022', '1', '2022-06-30 18:44:17', '2022-06-24 20:57:05');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `courseId` int(11) NOT NULL,
  `courseName` varchar(500) NOT NULL,
  `coursePrice` varchar(500) NOT NULL,
  `courseStatus` enum('0','1') NOT NULL DEFAULT '0',
  `createdDate` datetime NOT NULL,
  `updatedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`courseId`, `courseName`, `coursePrice`, `courseStatus`, `createdDate`, `updatedDate`) VALUES
(1, 'course1', '85000', '1', '2022-06-23 00:00:00', '2022-07-01 00:13:20'),
(2, 'course2', '75000', '1', '2022-06-23 00:00:00', '2022-07-01 00:12:59'),
(6, 'course4', '50000', '1', '2022-06-23 23:10:24', '2022-07-01 00:12:49'),
(7, 'course3', '25000', '1', '2022-06-23 23:27:26', '2022-07-01 00:12:38');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `roleId` int(11) NOT NULL,
  `roleName` varchar(100) NOT NULL,
  `roleStatus` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`roleId`, `roleName`, `roleStatus`) VALUES
(1, 'Admin', '1'),
(2, 'Sales Representative', '1'),
(3, 'Finance', '1'),
(4, 'Team Leader', '1');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `saleId` int(11) NOT NULL,
  `batchId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `studentId` int(11) NOT NULL,
  `price` varchar(500) NOT NULL,
  `courseIncentivePer` varchar(500) NOT NULL,
  `courseIncentive` varchar(500) NOT NULL,
  `courseIncentivePerTeam` varchar(500) NOT NULL,
  `courseIncentiveTeam` varchar(500) NOT NULL,
  `coursePriceCommited` varchar(500) NOT NULL,
  `courseDiscount` int(4) NOT NULL,
  `couesePriceGiven` varchar(500) NOT NULL,
  `coursePriceRemain` varchar(500) NOT NULL,
  `transactionDate` varchar(500) NOT NULL,
  `nextCommitedDate` varchar(500) NOT NULL,
  `screenShot` varchar(500) NOT NULL,
  `details` text NOT NULL,
  `saleStatus` enum('0','1') NOT NULL DEFAULT '0',
  `createdDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`saleId`, `batchId`, `userId`, `studentId`, `price`, `courseIncentivePer`, `courseIncentive`, `courseIncentivePerTeam`, `courseIncentiveTeam`, `coursePriceCommited`, `courseDiscount`, `couesePriceGiven`, `coursePriceRemain`, `transactionDate`, `nextCommitedDate`, `screenShot`, `details`, `saleStatus`, `createdDate`, `updatedDate`) VALUES
(7, 4, 6, 2, '75000', '', '', '', '', '70000', 5000, '5000', '65000', '06/29/2022', '07/05/2022', '1.png', 'hello everyone', '1', '2022-06-26 21:28:28', '2022-07-05 07:45:53'),
(8, 4, 3, 3, '75000', '', '', '', '', '70000', 5000, '10000', '60000', '06/27/2022', '07/20/2022', 'pronology.png', 'adsfsdgfjh6666', '1', '2022-06-27 19:37:00', '2022-07-05 07:45:26'),
(9, 4, 3, 4, '75000', '', '', '', '', '70000', 5000, '20000', '50000', '06/16/2022', '07/08/2022', 'Main8.png', 'this is information', '1', '2022-06-30 07:24:36', '2022-07-05 07:45:15'),
(10, 4, 3, 5, '75000', '', '', '', '', '70000', 5000, '9500', '60500', '06/28/2022', '07/05/2022', '9.jpg', '', '1', '2022-07-01 00:20:32', '2022-07-05 07:45:01'),
(11, 4, 3, 6, '75000', '', '', '', '', '70000', 5000, '7500', '62500', '06/28/2022', '07/03/2022', '11.png', 'dsfsd', '1', '2022-07-01 00:22:03', '2022-07-05 07:44:46'),
(12, 3, 5, 7, '50000', '', '', '', '', '45000', 5000, '7500', '37500', '06/28/2022', '07/27/2022', '12.png', 'ff', '1', '2022-07-01 00:22:47', '2022-07-05 07:44:38'),
(13, 3, 5, 8, '50000', '', '', '', '', '45000', 5000, '9500', '35500', '06/08/2022', '07/06/2022', 'pronology1.png', '', '1', '2022-07-01 00:23:31', '2022-07-05 07:44:30'),
(14, 3, 5, 9, '50000', '', '', '', '', '45000', 5000, '7500', '37500', '06/26/2022', '07/02/2022', 'pronology2.png', 'fg', '1', '2022-07-01 00:24:13', '2022-07-05 07:44:12'),
(15, 3, 5, 12, '50000', '', '', '', '', '45000', 5000, '20000', '25000', '06/28/2022', '07/07/2022', '13.png', 'gf', '1', '2022-07-01 00:24:56', '2022-07-01 02:17:42'),
(16, 3, 5, 10, '50000', '', '', '', '', '45000', 5000, '7500', '37500', '06/27/2022', '07/06/2022', '14.png', 'dfg', '1', '2022-07-01 00:25:37', '2022-07-05 07:44:05'),
(17, 2, 6, 13, '25000', '', '', '', '', '20000', 5000, '7500', '12500', '06/27/2022', '07/02/2022', '15.png', '', '1', '2022-07-01 00:26:17', '2022-07-05 07:43:54'),
(18, 2, 6, 9, '25000', '', '', '', '', '20000', 5000, '7500', '12500', '06/26/2022', '07/02/2022', '3-768x432.jpg', '', '1', '2022-07-01 00:26:49', '2022-07-05 07:43:35'),
(19, 2, 6, 8, '25000', '', '', '', '', '20000', 0, '9500', '10500', '06/27/2022', '07/02/2022', '3-768x4322.jpg', '', '1', '2022-07-01 00:27:28', '2022-07-05 07:43:27'),
(20, 2, 6, 13, '25000', '', '', '', '', '20000', 5000, '7500', '12500', '06/28/2022', '07/02/2022', '3-768x4323.jpg', 'efw', '1', '2022-07-01 00:28:05', '2022-07-06 23:41:20'),
(21, 2, 6, 2, '25000', '', '', '', '', '20000', 5000, '5000', '15000', '06/26/2022', '07/02/2022', '3-768x4325.jpg', 'g', '1', '2022-07-01 00:28:51', '2022-07-05 07:42:27'),
(22, 4, 3, 9, '75000', '', '', '', '', '75000', 0, '20000', '55000', '07/06/2022', '07/29/2022', '92.jpg', 'any thing', '1', '2022-07-06 11:26:51', '2022-07-06 11:26:51'),
(24, 3, 10, 5, '50000', '0.03', '300', '0.07', '700.0000000000001', '45000', 5000, '10000', '35000', '07/05/2022', '07/30/2022', '3-768x4328.jpg', 'hello everyone', '1', '2022-07-26 07:57:50', '2022-07-26 07:57:50');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `studentId` int(11) NOT NULL,
  `studentEnrolled` enum('Webinar','Referral','Sale Representative') NOT NULL,
  `studentName` varchar(500) NOT NULL,
  `studentEmail` varchar(500) NOT NULL,
  `studentMobile` varchar(500) NOT NULL,
  `studentDetails` longtext NOT NULL,
  `studentStatus` enum('0','1') NOT NULL DEFAULT '0',
  `createdDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`studentId`, `studentEnrolled`, `studentName`, `studentEmail`, `studentMobile`, `studentDetails`, `studentStatus`, `createdDate`, `updatedDate`) VALUES
(2, 'Webinar', 'Manjiri', 'm@gmail.com', '1234567890', 'Hello everyone', '1', '0000-00-00 00:00:00', '2022-06-26 01:58:46'),
(3, 'Webinar', 'suchita', 's@gmail.com', '1234567890', 'dgdfhgfh', '1', '2022-06-30 23:15:56', '2022-06-30 23:15:56'),
(4, 'Webinar', 'mahesh', 'mg@gmail.com', '1234567890', 'xzczxc', '1', '2022-06-30 23:16:20', '2022-06-30 23:16:20'),
(5, 'Sale Representative', 'akshay', 'a@gmail.com', '1234567890', 'sxsxs', '1', '2022-06-30 23:16:57', '2022-06-30 23:16:57'),
(6, 'Sale Representative', 'vinita', 'v@gmail.com', '1234567890', '', '1', '2022-06-30 23:17:16', '2022-06-30 23:17:16'),
(7, 'Sale Representative', 'sumit', 'sm@gmail.com', '1234567890', '', '1', '2022-06-30 23:17:46', '2022-06-30 23:17:46'),
(8, 'Sale Representative', 'sujata', 'sj@gmail.com', '1234567890', '', '1', '2022-06-30 23:18:14', '2022-06-30 23:18:14'),
(9, 'Sale Representative', 'sagar', 'sg@gmail.com', '1234567890', '', '1', '2022-06-30 23:18:39', '2022-06-30 23:18:39'),
(10, 'Sale Representative', 'sushma', 'h@gmail.com', '1234567890', '', '1', '2022-06-30 23:19:08', '2022-06-30 23:19:08'),
(11, 'Sale Representative', 'mahima', 'mh@gmail.com', '1234567890', '', '1', '2022-06-30 23:19:44', '2022-06-30 23:19:44'),
(12, 'Sale Representative', 'rajesh', 'raj@gmail.com', '1234567890', '', '1', '2022-06-30 23:20:13', '2022-06-30 23:20:13'),
(13, 'Sale Representative', 'suresh', 'sr@gmail.com', '1234567890', '', '1', '2022-06-30 23:37:25', '2022-06-30 23:37:25'),
(14, 'Referral', 'manish', 'mn@gmail.com', '5645765768', '', '1', '0000-00-00 00:00:00', '2022-06-30 23:52:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `roleId` int(11) NOT NULL,
  `userName` varchar(500) NOT NULL,
  `userMobile` varchar(500) NOT NULL,
  `userEmail` varchar(500) NOT NULL,
  `userPassword` varchar(500) NOT NULL,
  `roleType` enum('Individual Contributor','Team Leader') NOT NULL DEFAULT 'Individual Contributor',
  `incecntivePer` varchar(500) NOT NULL,
  `checked` enum('0','1') NOT NULL,
  `teamLeadName` varchar(500) NOT NULL,
  `teamLeadPer` varchar(500) NOT NULL,
  `userStatus` enum('1','0') NOT NULL DEFAULT '0',
  `createdDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `roleId`, `userName`, `userMobile`, `userEmail`, `userPassword`, `roleType`, `incecntivePer`, `checked`, `teamLeadName`, `teamLeadPer`, `userStatus`, `createdDate`, `updatedDate`) VALUES
(2, 1, 'admin', '1234567890', 'admin@gmail.com\r\n', 'YWRtaW4=', 'Individual Contributor', '', '0', '', '', '1', '2022-06-20 20:50:29', '2022-06-30 07:52:22'),
(3, 2, 'Girish', '1234567890', 'staff@gmail.com', 'c3RhZmZAMTIz', 'Individual Contributor', '', '0', '', '', '1', '2022-06-20 20:50:29', '2022-06-30 07:52:15'),
(4, 3, 'Manjiri', '123456789', 'stud@gmail.com', 'c3R1ZGVudEAxMjM=', 'Individual Contributor', '', '0', '', '', '1', '2022-06-20 20:51:42', '2022-06-30 07:51:57'),
(5, 2, 'Pranita', '1234567890', 'p@gmail.com', 'cHJhbml0YUAxMjM=', 'Individual Contributor', '', '0', '', '', '1', '2022-06-26 00:46:57', '2022-06-30 07:51:18'),
(6, 2, 'manisha', '1234569871', 'm@gmail.com', 'bWFuaXNoYUAxMjM=', 'Individual Contributor', '', '0', '', '', '1', '2022-06-26 00:48:36', '2022-06-30 07:51:01'),
(8, 4, 'Sushma', '1234567890', 'sh@gmail.com', 'c3VzaG1hQDEyMw==', 'Individual Contributor', '', '0', '', '', '1', '2022-07-07 16:05:08', '2022-07-07 16:05:09'),
(9, 2, 'manjiri', '123456789', 'm@gmail.com', 'TUBuamlyaTEyMw==', 'Individual Contributor', '', '0', '', '', '1', '2022-07-25 14:21:28', '2022-07-25 14:21:28'),
(10, 2, 'Diksha', '7894561230', 'diksha@gmail.com', 'ZGlrc2hhMTIz', 'Individual Contributor', '0.03', '1', 'Sushma', '0.07', '1', '2022-07-26 06:50:28', '2022-07-26 06:50:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batches`
--
ALTER TABLE `batches`
  ADD PRIMARY KEY (`batchId`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`courseId`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`roleId`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`saleId`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`studentId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `batches`
--
ALTER TABLE `batches`
  MODIFY `batchId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `courseId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `roleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `saleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `studentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
