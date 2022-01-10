-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql-server
-- Generation Time: Nov 07, 2021 at 03:27 AM
-- Server version: 8.0.1-dmr
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

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

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` varchar(255) NOT NULL,
  `roomId` varchar(255) DEFAULT NULL,
  `position` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` varchar(255) NOT NULL,
  `dateJoin` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Table structure for table `taskreport`
--

CREATE TABLE `taskreport` (
  `id` varchar(255) NOT NULL,
  `reportDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `message` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `username` (`username`);

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
  ADD CONSTRAINT `fk_officeroom_roomid_id` FOREIGN KEY (`roomId`) REFERENCES `officeroom` (`id`);

ALTER TABLE `member`
  ADD CONSTRAINT `fk_account_id_username` FOREIGN KEY (`id`) REFERENCES `account` (`username`);

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
