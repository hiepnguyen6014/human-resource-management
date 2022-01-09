SET GLOBAL time_zone = "Asia/Ho_Chi_Minh";
SET time_zone = "+07:00";
SET @@session.time_zone = "+07:00";

CREATE DATABASE IF NOT EXISTS `enterprise` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `enterprise`;

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `account_type` int(11) DEFAULT '2',
  `active` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`user_id`, `username`, `password`, `account_type`, `active`) VALUES
(1, 'nguyendaihiep', '$2y$10$oOR7JskrwzgfwsW6CCabLucvp2leYsOyUMH7qpcg6wSWOY7etgxrm', 0, 1),
(2, 'trangiahuy', '$2y$10$a/R1Zkp2US/TQyxSHUOm1e5Rtt61x7UkNsfWTgs9YdnF2UWnMVgDq', 2, 1),
(3, 'hongocthanh', '$2y$10$NA72Csnuu9uY8vagX.BPGejhGrRD24aUxaj428V6ONWmF1uDkMi.C', 1, 1),
(6, 'leducson', '$2y$10$vQo662aTR0pXvd5Iwl9CNuztTZdhlmigCi1N1hd.11XfZncvTlYbm', 1, 1),
(7, 'nguyenhaidang', '$2y$10$Eaee9HDoi.uCZgxXiWpbUuIpxtauYscVZrs.Crwpptgn7aUCOGlJ6', 2, 0),
(9, 'trankhanhduy', '$2y$10$uKnOeEO/RpMaFjnXeULqguUv/VKGD4kaX9DdkyJqfpKMlsEUUCAGe', 2, 0),
(11, 'luuthuyky', '$2y$10$CfgZ1Bw.xfN/mU4i3RcfTesz4CE87PYA5W/YkRcdZ8j4DS/wmBy..', 1, 0),
(12, 'nguyenphuan', '$2y$10$SzI4bNR2A4M2BDpgyn7Ub.Pq69E/13n.iCuFONl1BQ3VDzwAxEJgS', 2, 0),
(19, 'leminhthanh', '$2y$10$MX3WcvVXEtTOIK3yhJ6zgeleiEqgwH7WWploV3zx0kwWLzd07jVda', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `available_vacation_day`
--

CREATE TABLE `available_vacation_day` (
  `username` varchar(255) NOT NULL,
  `remain_day` int(11) DEFAULT '12'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `available_vacation_day`
--

INSERT INTO `available_vacation_day` (`username`, `remain_day`) VALUES
('leducson', 12),
('leminhthanh', 12),
('luuthuyky', 12),
('nguyendaihiep', 12),
('nguyenhaidang', 12),
('nguyenphuan', 12),
('trangiahuy', 12),
('trankhanhduy', 12);

-- --------------------------------------------------------

--
-- Table structure for table `offices`
--

CREATE TABLE `offices` (
  `office_id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `room_number` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `date_begin` datetime DEFAULT CURRENT_TIMESTAMP,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offices`
--

INSERT INTO `offices` (`office_id`, `code`, `name`, `room_number`, `phone`, `date_begin`, `description`) VALUES
(4, 'TTC', 'Phong Tai Chinh', 'R001', '0916805970', '2021-12-17 00:00:00', 'Phong Tai Chinh'),
(5, 'PTT', 'Phong Thong Tin', 'R002', '0813171201', '2021-05-21 00:00:00', 'Phong Thong Tin'),
(6, 'PKT', 'Phong Ke Toan', 'R003', '0832506771', '2021-05-03 00:00:00', 'Phong Thong Tin'),
(7, 'PCN', 'Phong Cong Nghe', 'Room 1', '0916805970', NULL, 'dsd');

-- --------------------------------------------------------

--
-- Table structure for table `Profiles`
--

CREATE TABLE `Profiles` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `birthdate` datetime DEFAULT CURRENT_TIMESTAMP,
  `date_begin` datetime DEFAULT CURRENT_TIMESTAMP,
  `gmail` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `salary` int(11) DEFAULT NULL,
  `position` int(11) DEFAULT '2',
  `address` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT 'default.webp',
  `office_code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Profiles`
--

INSERT INTO `Profiles` (`user_id`, `username`, `fname`, `lname`, `birthdate`, `date_begin`, `gmail`, `phone_number`, `salary`, `position`, `address`, `avatar`, `office_code`) VALUES
(1, 'nguyendaihiep', 'Hiep', 'Nguyen Dai', '2001-01-01 00:00:00', '2021-01-01 00:00:00', 'ndhiep@gmail.com', '210-200-6896', 1000, 0, 'Viet Nam', 'default.webp', NULL),
(2, 'trangiahuy', 'Huy', 'Tran Gia', '2001-01-01 00:00:00', '2021-01-01 00:00:00', 'tghuy@gmail.com', '210-201-2851', 1001, 2, 'Viet Nam', 'default.webp', 'TTC'),
(3, 'hongocthanh', 'Thanh', 'Ho Ngoc', '2001-01-01 00:00:00', '2021-01-01 00:00:00', 'hnthanh@gmail.com', '210-202-4810', 1000, 1, 'Viet Nam', 'default.webp', 'TTC'),
(6, 'leducson', 'Son', 'Le Duc', '2001-01-01 00:00:00', '2021-01-01 00:00:00', 'ldson@gmail.com', '0916805970', 1000, 1, 'Viet Nam', 'leducson.jpg', 'PTT'),
(7, 'nguyenhaidang', 'Dang', 'Nguyen Hai', '2001-01-01 00:00:00', '2021-01-01 00:00:00', 'nhdang@gmail.com', '210-206-3317', 1000, 2, 'Viet Nam', 'default.webp', 'PTT'),
(9, 'trankhanhduy', 'Duy', 'Tran Khanh', '2001-01-01 00:00:00', '2021-01-01 00:00:00', 'tkduy@gmail.com', '210-208-7210', 1000, 2, 'Viet Nam', 'default.webp', 'PTT'),
(11, 'luuthuyky', 'Ky', 'Luu Thuy', '2001-01-01 00:00:00', '2021-01-01 00:00:00', 'ltky@gmail.com', '210-212-4269', 1000, 1, 'Viet Nam', 'default.webp', 'PKT'),
(12, 'nguyenphuan', 'An', 'Nguyen Phu', '2001-01-01 00:00:00', '2021-01-01 00:00:00', 'npan@gmail.com', '210-213-6575', 1000, 2, 'Viet Nam', 'default.webp', 'PKT'),
(16, 'leminhthanh', 'Le Minh', 'Thanh', NULL, NULL, NULL, NULL, NULL, 1, NULL, 'default.webp', 'PCN');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `task_id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `deadline` datetime DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `date_begin` datetime DEFAULT CURRENT_TIMESTAMP,
  `assign_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`task_id`, `username`, `title`, `deadline`, `status`, `date_begin`, `assign_date`) VALUES
(5, 'trangiahuy', '234234', '2022-01-14 00:29:00', 7, '2022-01-06 17:29:49', '2022-01-08 06:24:54'),
(7, 'trangiahuy', '12312312', '2022-01-13 09:23:00', 7, '2022-01-08 02:24:11', '2022-01-08 06:24:05'),
(8, 'trangiahuy', '12312312', '2022-01-24 09:23:00', 7, '2022-01-08 02:24:37', '2022-01-08 04:00:05'),
(9, 'trangiahuy', '123123', '2022-01-20 15:22:00', 3, '2022-01-08 02:25:29', '2022-01-08 06:32:07'),
(10, 'trangiahuy', 'Moiws', '1970-01-01 00:00:00', 4, '2022-01-08 02:26:28', '2022-01-08 06:34:48'),
(11, 'trangiahuy', 'Test 1', '2022-01-19 15:24:00', 2, '2022-01-08 06:37:59', '2022-01-08 06:38:09'),
(12, 'trangiahuy', '123423123', '2022-01-27 14:52:00', 4, '2022-01-08 07:52:49', '2022-01-08 08:33:36'),
(13, 'trangiahuy', 'test lvie', '2022-01-28 14:53:00', 5, '2022-01-08 07:53:25', '2022-01-08 08:33:27'),
(14, 'trangiahuy', '123123123', '2022-02-04 15:25:00', 5, '2022-01-08 07:54:09', '2022-01-08 08:25:35');

-- --------------------------------------------------------

--
-- Table structure for table `task_feedback`
--

CREATE TABLE `task_feedback` (
  `feedback_id` int(11) NOT NULL,
  `task_id` int(11) DEFAULT NULL,
  `message` text,
  `time` datetime DEFAULT CURRENT_TIMESTAMP,
  `file` varchar(255) DEFAULT NULL,
  `sender_user` varchar(255) DEFAULT NULL,
  `receiver_user` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task_feedback`
--

INSERT INTO `task_feedback` (`feedback_id`, `task_id`, `message`, `time`, `file`, `sender_user`, `receiver_user`) VALUES
(6, 9, '12312312', '2022-01-08 02:25:29', 'php0vvn7E.rar', 'hongocthanh', 'trangiahuy'),
(7, 10, '123123', '2022-01-08 02:26:28', 'phpsQbPWx.zip', 'hongocthanh', 'trangiahuy'),
(8, 9, '123123', '2022-01-08 05:52:56', 'phpn0ZrIU.doc', NULL, NULL),
(9, 9, 'qweqweqw', '2022-01-08 05:54:23', 'phpHinpdL.sql', NULL, NULL),
(10, 9, '12312312312313', '2022-01-08 05:56:18', 'phpj4hzIC.rar', NULL, NULL),
(11, 9, 'eq23e123123', '2022-01-08 06:14:32', 'phpDGk2fJ.zip', NULL, NULL),
(12, 9, '13123123', '2022-01-08 06:18:04', 'phpJUPczR.rar', NULL, NULL),
(13, 9, '123123123', '2022-01-08 06:18:35', 'phpn9tYKF.docx', NULL, NULL),
(14, 10, '123123123', '2022-01-08 06:19:50', 'php5sowaJ.sql', NULL, NULL),
(18, 9, '132123123123', '2022-01-08 06:32:16', 'php7iO4mz.rar,phpVExz1A.doc,phpYbgeuz.pdf', NULL, NULL),
(19, 10, 'sasdasdasdsadasdasd', '2022-01-08 06:34:54', 'phpAmsb6x.pdf', NULL, NULL),
(20, 11, '123123', '2022-01-08 06:37:59', 'phpJwcUZA.zip,phpJfFRXw.zip,phpBbO48A.zip,phpUz4aYx.rar,php9wLiIx.doc,phpgzHiwy.pdf,phpMGOctA.jpg,phpVHYXPA.png', 'hongocthanh', 'trangiahuy'),
(21, 11, 'cc', '2022-01-08 06:38:15', 'phpFbWPmG.png', NULL, NULL),
(22, 12, '123123123', '2022-01-08 07:52:49', 'php7gzojR.jpg', 'hongocthanh', 'trangiahuy'),
(23, 13, '12312323', '2022-01-08 07:53:25', 'phpgLjNph.rar', 'hongocthanh', 'trangiahuy'),
(24, 14, '123123123', '2022-01-08 07:54:09', 'phpQwMMjV.rar', 'hongocthanh', 'trangiahuy'),
(25, 11, '                                ', '2022-01-08 08:09:32', 'phpAkz0oH.png', NULL, NULL),
(26, 11, '123123123', '2022-01-08 08:10:36', 'phpk9sPYD.png', NULL, NULL),
(27, 10, '                                234234234', '2022-01-08 08:11:02', 'php7zLEyV.pdf', NULL, NULL),
(28, 10, '                                234234234', '2022-01-08 08:12:10', 'phpENEwZ7.pdf', NULL, NULL),
(29, 9, '                                ', '2022-01-08 08:12:43', 'phpvbUxhv.docx', NULL, NULL),
(30, 9, '                                23123', '2022-01-08 08:13:07', 'phpALN209.docx', NULL, NULL),
(31, 10, '12312321', '2022-01-08 08:13:41', 'php3CPGFC.jpg', NULL, NULL),
(32, 10, '                                123123123', '2022-01-08 08:13:58', 'phpWsJG5e.drawio', NULL, NULL),
(33, 11, '12312312', '2022-01-08 08:14:38', 'phpcXREB4.pdf', NULL, NULL),
(34, 11, '<script>alert(\'a\');</script>', '2022-01-08 08:15:17', 'phpgoCK4E.docx', NULL, NULL),
(35, 9, '123123123', '2022-01-08 08:15:54', 'phpD0qFV8.pdf', NULL, NULL),
(36, 9, '                                <script>alert(\'a\');</script>', '2022-01-08 08:16:23', 'phpnrdQm6.drawio', NULL, NULL),
(37, 11, '123123', '2022-01-08 08:16:42', 'phpucxxbN.pdf', NULL, NULL),
(38, 10, '<script>alert(\'a\');</script>', '2022-01-08 08:16:51', 'phpiw06QU.doc', NULL, NULL),
(39, 9, 'asdasdasd', '2022-01-08 08:17:00', 'phpynwGt5.jpg', NULL, NULL),
(40, 11, '                                123123123', '2022-01-08 08:17:57', 'phphLtFxM.rar', NULL, NULL),
(41, 10, '                                <script>alert(\'a\');</script>', '2022-01-08 08:18:14', 'php9x6RYZ.docx', NULL, NULL),
(42, 9, '                                mmmmm', '2022-01-08 08:19:27', 'phpYVcnpb.png', NULL, NULL),
(43, 11, '`12`12`12', '2022-01-08 08:23:50', 'phppzfP0Z.jpg', NULL, NULL),
(44, 11, '                                123123123', '2022-01-08 08:24:03', 'phpwoqAjb.png', NULL, NULL),
(45, 11, '123123123123', '2022-01-08 08:24:38', 'phpPkvh9x.jpg', NULL, NULL),
(46, 11, '                                123123123', '2022-01-08 08:24:53', 'phpLTnGIE.rar', NULL, NULL),
(47, 14, '123123123', '2022-01-08 08:25:41', 'phpZyTlOy.pdf', NULL, NULL),
(48, 14, '                                123123123', '2022-01-08 08:25:54', 'phpmwbdjY.png', NULL, NULL),
(49, 13, '13123123123', '2022-01-08 08:33:32', 'phpMTByxb.doc', NULL, NULL),
(50, 12, '123123123', '2022-01-08 08:33:41', 'phpzTFnjK.sql', NULL, NULL),
(51, 11, '123123', '2022-01-08 09:55:39', 'php4Zq5kZ.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vacation`
--

CREATE TABLE `vacation` (
  `vacation_id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `start_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `number_day_off` int(11) DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `feedback` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `seen` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vacation`
--

INSERT INTO `vacation` (`vacation_id`, `username`, `start_date`, `number_day_off`, `reason`, `file`, `feedback`, `status`, `seen`) VALUES
(1, 'hongocthanh', '2022-01-09 00:00:00', 3, 'hjhdjs', 'abc.docx', 'LÃ½ do khÃ´ng chÃ­nh Ä‘Ã¡ng', 3, 0),
(2, 'trangiahuy', '2022-01-05 06:37:18', 5, 'abc', 'abc.docx', 'LÃ½ do khÃ´ng chÃ­nh Ä‘Ã¡ng', 3, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`user_id`,`username`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `available_vacation_day`
--
ALTER TABLE `available_vacation_day`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `offices`
--
ALTER TABLE `offices`
  ADD PRIMARY KEY (`office_id`,`code`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `Profiles`
--
ALTER TABLE `Profiles`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `fk_officecode_offices_profiles` (`office_code`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`task_id`),
  ADD KEY `fk_username_profiles_task` (`username`);

--
-- Indexes for table `task_feedback`
--
ALTER TABLE `task_feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `fk_taskId_Task_TaskFeedback` (`task_id`),
  ADD KEY `fk_senderUser_profiles_TaskFeedback` (`sender_user`),
  ADD KEY `fk_receiverUser_profiles_TaskFeedback` (`receiver_user`);

--
-- Indexes for table `vacation`
--
ALTER TABLE `vacation`
  ADD PRIMARY KEY (`vacation_id`),
  ADD KEY `fk_username_profiles_vacation` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `offices`
--
ALTER TABLE `offices`
  MODIFY `office_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `Profiles`
--
ALTER TABLE `Profiles`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `task_feedback`
--
ALTER TABLE `task_feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `vacation`
--
ALTER TABLE `vacation`
  MODIFY `vacation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `available_vacation_day`
--
ALTER TABLE `available_vacation_day`
  ADD CONSTRAINT `fk_username_profiles_available_vacation_day` FOREIGN KEY (`username`) REFERENCES `profiles` (`username`);

--
-- Constraints for table `Profiles`
--
ALTER TABLE `Profiles`
  ADD CONSTRAINT `fk_officecode_offices_profiles` FOREIGN KEY (`office_code`) REFERENCES `offices` (`code`),
  ADD CONSTRAINT `fk_username_accounts_profiles` FOREIGN KEY (`username`) REFERENCES `accounts` (`username`);

--
-- Constraints for table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `fk_username_profiles_task` FOREIGN KEY (`username`) REFERENCES `profiles` (`username`);

--
-- Constraints for table `task_feedback`
--
ALTER TABLE `task_feedback`
  ADD CONSTRAINT `fk_receiverUser_profiles_TaskFeedback` FOREIGN KEY (`receiver_user`) REFERENCES `profiles` (`username`),
  ADD CONSTRAINT `fk_senderUser_profiles_TaskFeedback` FOREIGN KEY (`sender_user`) REFERENCES `profiles` (`username`),
  ADD CONSTRAINT `fk_taskId_Task_TaskFeedback` FOREIGN KEY (`task_id`) REFERENCES `task` (`task_id`);

--
-- Constraints for table `vacation`
--
ALTER TABLE `vacation`
  ADD CONSTRAINT `fk_username_profiles_vacation` FOREIGN KEY (`username`) REFERENCES `profiles` (`username`);
COMMIT;