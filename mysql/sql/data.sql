-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql-server
-- Generation Time: Nov 07, 2021 at 06:59 AM
-- Server version: 8.0.1-dmr
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
CREATE DATABASE IF NOT EXISTS `enterprise` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `enterprise`;
--
-- Database: `enterprise`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`username`, `password`, `type`) VALUES
('admin', 'admin', 1),
('employee', 'employee', 3),
('manager', 'manager', 2);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` varchar(255) NOT NULL,
  `roomId` varchar(255) DEFAULT NULL,
  `position` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `roomId`, `position`) VALUES
('admin', 'r1', 1),
('employee', 'r2', 3),
('manager', 'r2', 2);

-- --------------------------------------------------------

--
-- Table structure for table `officeroom`
--

CREATE TABLE `officeroom` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `isCaptain` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `officeroom`
--

INSERT INTO `officeroom` (`id`, `name`, `description`, `isCaptain`) VALUES
('r1', 'Room CEO', 'this is office room of CEO', 1),
('r2', 'Room IT', 'this is office room of developer', 1),
('r3', 'Room Accounting', 'this is office room of accountant', 1);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` varchar(255) NOT NULL,
  `dateJoin` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `dateJoin`) VALUES
('admin', '2021-11-07 11:56:47'),
('employee', '2021-11-07 11:56:47'),
('manager', '2021-11-07 11:56:47');

-- --------------------------------------------------------

--
-- Table structure for table `profiledetail`
--

CREATE TABLE `profiledetail` (
  `id` varchar(255) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `birthday` datetime DEFAULT NULL,
  `idNumber` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profiledetail`
--

INSERT INTO `profiledetail` (`id`, `fullname`, `birthday`, `idNumber`, `country`, `address`, `gender`, `email`, `phone`, `img`) VALUES
('admin', 'Nguyen Dai Hiep', '2021-11-10 12:16:57', '01012001', 'Viet Nam', NULL, 1, 'nguyendaihiep@gmail.com', '0810121201', 'avt1.jpg'),
('employee', 'Ho Ngoc Thanh', '2001-11-15 12:17:45', '17122001', 'Viet Nam', NULL, 1, 'hongocthanh@gmail.com', '0813171201', 'avt3.jpg'),
('manager', 'Tran Gia Huy', '2001-11-23 12:18:01', '01022001', 'Viet Nam', NULL, 1, 'trangiahuy@gmail.com', '0810121202', 'avt2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `startDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `endDate` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `rate` int(11) DEFAULT NULL,
  `memberId` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `title`, `description`, `startDate`, `endDate`, `status`, `score`, `rate`, `memberId`, `file`) VALUES
('t1', 'CEO Work', 'this is work of ceo', '2021-11-07 12:11:24', '2021-02-01 00:00:00', 2, NULL, NULL, 'admin', 'task1.php'),
('t2', 'Manager Work', 'this is work of manager', '2021-11-07 12:11:24', '2021-02-02 00:00:00', 2, NULL, NULL, 'manager', 'task2.php'),
('t3', 'Employee Work', 'this is work of employee', '2021-11-07 12:11:24', '2021-11-17 12:11:42', 1, NULL, NULL, 'employee', 'task3.php');

-- --------------------------------------------------------

--
-- Table structure for table `taskreport`
--

CREATE TABLE `taskreport` (
  `id` varchar(255) NOT NULL,
  `reportDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `message` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `taskreport`
--

INSERT INTO `taskreport` (`id`, `reportDate`, `message`) VALUES
('t1', '2021-11-07 12:13:33', 'nhu qq'),
('t2', '2021-11-07 12:13:33', 'chua ok lam'),
('t3', '2021-11-07 12:13:33', 'very good');

-- --------------------------------------------------------

--
-- Table structure for table `vacation`
--

CREATE TABLE `vacation` (
  `id` varchar(255) NOT NULL,
  `startDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `endDate` datetime DEFAULT NULL,
  `memberId` varchar(255) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `reason` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vacation`
--

INSERT INTO `vacation` (`id`, `startDate`, `endDate`, `memberId`, `level`, `reason`) VALUES
('v1', '2021-11-07 12:16:36', '2021-12-17 00:00:00', 'admin', 0, 'bi cam lanh'),
('v2', '2021-11-07 12:16:36', '2021-12-19 00:00:00', 'manager', 1, 'bi met moi'),
('v3', '2021-11-07 12:16:36', '2021-12-25 00:00:00', 'employee', 2, 'bi chan lam');


CREATE TABLE `vacationdetail` (
  `vacationId` varchar(255) NOT NULL,
  `reply` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `vacationdetail` (`vacationId`, `reply`) VALUES
('v2', 'okee nghi di'),
('v3', 'okee');

--
-- Dumping data for table `vacation`
--

INSERT INTO `vacation` (`id`, `startDate`, `endDate`, `memberId`, `level`, `reason`) VALUES
('v1', '2021-11-07 12:16:36', '2021-12-17 00:00:00', 'admin', 0, 'bi cam lanh'),
('v2', '2021-11-07 12:16:36', '2021-12-19 00:00:00', 'manager', 1, 'bi met moi'),
('v3', '2021-11-07 12:16:36', '2021-12-25 00:00:00', 'employee', 2, 'bi chan lam');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_officeroom_roomid_id` (`roomId`);

--
-- Indexes for table `officeroom`
--
ALTER TABLE `officeroom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiledetail`
--
ALTER TABLE `profiledetail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_member_id_task_memberId` (`memberId`);

--
-- Indexes for table `taskreport`
--
ALTER TABLE `taskreport`
  ADD PRIMARY KEY (`id`,`reportDate`);

--
-- Indexes for table `vacation`
--
ALTER TABLE `vacation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_member_id_memberId` (`memberId`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `fk_account_id_username` FOREIGN KEY (`id`) REFERENCES `account` (`username`),
  ADD CONSTRAINT `fk_officeroom_roomid_id` FOREIGN KEY (`roomId`) REFERENCES `officeroom` (`id`);

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `fk_member_id_id` FOREIGN KEY (`id`) REFERENCES `member` (`id`);

--
-- Constraints for table `profiledetail`
--
ALTER TABLE `profiledetail`
  ADD CONSTRAINT `fk_profile_id_id` FOREIGN KEY (`id`) REFERENCES `profile` (`id`);

--
-- Constraints for table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `fk_member_id_task_memberId` FOREIGN KEY (`memberId`) REFERENCES `member` (`id`);

--
-- Constraints for table `taskreport`
--
ALTER TABLE `taskreport`
  ADD CONSTRAINT `fk_task_id_id` FOREIGN KEY (`id`) REFERENCES `task` (`id`);

--
-- Constraints for table `vacation`
--
ALTER TABLE `vacation`
  ADD CONSTRAINT `fk_member_id_memberId` FOREIGN KEY (`memberId`) REFERENCES `member` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
