SET GLOBAL time_zone = "Asia/Ho_Chi_Minh";
SET time_zone = "+07:00";
SET @@session.time_zone = "+07:00";

CREATE DATABASE IF NOT EXISTS `enterprise` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `enterprise`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `accounts`
--

CREATE TABLE `accounts` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `account_type` int(11) DEFAULT '2',
  `active` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `accounts`
--

INSERT INTO `accounts` (`user_id`, `username`, `password`, `account_type`, `active`) VALUES
(1, 'nguyendaihiep', '$2y$10$oOR7JskrwzgfwsW6CCabLucvp2leYsOyUMH7qpcg6wSWOY7etgxrm', 0, 1),
(2, 'trangiahuy', '$2y$10$a/R1Zkp2US/TQyxSHUOm1e5Rtt61x7UkNsfWTgs9YdnF2UWnMVgDq', 2, 1),
(3, 'hongocthanh', '$2y$10$VKcBMD1jCWG1Pgnrt/JkxuRcoMFCJ79uK6EV3o017K/jgJgUVpnai', 1, 1),
(6, 'leducson', '$2y$10$vQo662aTR0pXvd5Iwl9CNuztTZdhlmigCi1N1hd.11XfZncvTlYbm', 1, 1),
(7, 'nguyenhaidang', '$2y$10$Eaee9HDoi.uCZgxXiWpbUuIpxtauYscVZrs.Crwpptgn7aUCOGlJ6', 2, 0),
(9, 'trankhanhduy', '$2y$10$uKnOeEO/RpMaFjnXeULqguUv/VKGD4kaX9DdkyJqfpKMlsEUUCAGe', 2, 0),
(11, 'luuthuyky', '$2y$10$CfgZ1Bw.xfN/mU4i3RcfTesz4CE87PYA5W/YkRcdZ8j4DS/wmBy..', 1, 0),
(12, 'nguyenphuan', '$2y$10$SzI4bNR2A4M2BDpgyn7Ub.Pq69E/13n.iCuFONl1BQ3VDzwAxEJgS', 2, 0),
(19, 'leminhthanh', '$2y$10$MX3WcvVXEtTOIK3yhJ6zgeleiEqgwH7WWploV3zx0kwWLzd07jVda', NULL, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `available_vacation_day`
--

CREATE TABLE `available_vacation_day` (
  `username` varchar(255) NOT NULL,
  `remain_day` int(11) DEFAULT '12'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `available_vacation_day`
--

INSERT INTO `available_vacation_day` (`username`, `remain_day`) VALUES
('hongocthanh', 12),
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
-- Cấu trúc bảng cho bảng `offices`
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
-- Đang đổ dữ liệu cho bảng `offices`
--

INSERT INTO `offices` (`office_id`, `code`, `name`, `room_number`, `phone`, `date_begin`, `description`) VALUES
(4, 'TTC', 'Phong Tai Chinh', 'R001', '0916805970', '2021-12-17 00:00:00', 'Phong Tai Chinh'),
(5, 'PTT', 'Phong Thong Tin', 'R002', '0813171201', '2021-05-21 00:00:00', 'Phong Thong Tin'),
(6, 'PKT', 'Phong Ke Toan', 'R003', '0832506771', '2021-05-03 00:00:00', 'Phong Thong Tin'),
(7, 'PCN', 'Phong Cong Nghe', 'Room 1', '0916805970', NULL, 'dsd');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Profiles`
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
-- Đang đổ dữ liệu cho bảng `Profiles`
--

INSERT INTO `Profiles` (`user_id`, `username`, `fname`, `lname`, `birthdate`, `date_begin`, `gmail`, `phone_number`, `salary`, `position`, `address`, `avatar`, `office_code`) VALUES
(1, 'nguyendaihiep', 'Hiep', 'Nguyen Dai', '2001-01-01 00:00:00', '2021-01-01 00:00:00', 'ndhiep@gmail.com', '210-200-6896', 1000, 0, 'Viet Nam', 'nguyendaihiep.png', NULL),
(2, 'trangiahuy', 'Huy', 'Tran Gia', '2001-01-01 00:00:00', '2021-01-01 00:00:00', 'tghuy@gmail.com', '210-201-2851', 1001, 2, 'Viet Nam', 'default.webp', 'TTC'),
(3, 'hongocthanh', 'Thanh', 'Ho Ngoc', '2001-01-01 00:00:00', '2021-01-01 00:00:00', 'hnthanh@gmail.com', '210-202-4810', 1000, 1, 'Viet Nam', 'hongocthanh.jpg', 'TTC'),
(6, 'leducson', 'Son', 'Le Duc', '2001-01-01 00:00:00', '2021-01-01 00:00:00', 'ldson@gmail.com', '0916805970', 1000, 1, 'Viet Nam', 'leducson.jpg', 'PTT'),
(7, 'nguyenhaidang', 'Dang', 'Nguyen Hai', '2001-01-01 00:00:00', '2021-01-01 00:00:00', 'nhdang@gmail.com', '210-206-3317', 1000, 2, 'Viet Nam', 'default.webp', 'PTT'),
(9, 'trankhanhduy', 'Duy', 'Tran Khanh', '2001-01-01 00:00:00', '2021-01-01 00:00:00', 'tkduy@gmail.com', '210-208-7210', 1000, 2, 'Viet Nam', 'default.webp', 'PTT'),
(11, 'luuthuyky', 'Ky', 'Luu Thuy', '2001-01-01 00:00:00', '2021-01-01 00:00:00', 'ltky@gmail.com', '210-212-4269', 1000, 1, 'Viet Nam', 'default.webp', 'PKT'),
(12, 'nguyenphuan', 'An', 'Nguyen Phu', '2001-01-01 00:00:00', '2021-01-01 00:00:00', 'npan@gmail.com', '210-213-6575', 1000, 2, 'Viet Nam', 'default.webp', 'PKT'),
(16, 'leminhthanh', 'Le Minh', 'Thanh', NULL, NULL, NULL, NULL, NULL, 1, NULL, 'default.webp', 'PCN');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `task`
--

CREATE TABLE `task` (
  `task_id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `rate` int(11) DEFAULT NULL,
  `date_begin` datetime DEFAULT CURRENT_TIMESTAMP,
  `assign_date` datetime DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `message` text,
  `is_confirm` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `task`
--

INSERT INTO `task` (`task_id`, `username`, `title`, `deadline`, `status`, `rate`, `date_begin`, `assign_date`, `file`, `message`, `is_confirm`) VALUES
(1, 'trangiahuy', 'Code Database', '2022-01-09', 0, NULL, '2021-01-01 00:00:00', NULL, 'file20210101.zip', 'Lam di dung noi nhieu', b'0'),
(2, 'nguyenhaidang', 'Code Frontend', '2022-01-09', 0, NULL, '2021-01-01 00:00:00', NULL, 'file20210101(1).zip', 'Lam nhanh len', b'0'),
(3, 'nguyenphuan', 'Code Backend', '2022-01-09', 0, NULL, '2021-01-01 00:00:00', NULL, 'file20210101(2).zip', 'Lam le len di', b'0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `task_feedback`
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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vacation`
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
-- Đang đổ dữ liệu cho bảng `vacation`
--

INSERT INTO `vacation` (`vacation_id`, `username`, `start_date`, `number_day_off`, `reason`, `file`, `feedback`, `status`, `seen`) VALUES
(1, 'hongocthanh', '2022-01-09 00:00:00', 3, 'hjhdjs', 'abc.docx', 'Lý do không chính đáng', 3, 0),
(2, 'trangiahuy', '2022-01-05 06:37:18', 5, 'abc', 'abc.docx', 'Lý do không chính đáng', 3, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`user_id`,`username`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Chỉ mục cho bảng `available_vacation_day`
--
ALTER TABLE `available_vacation_day`
  ADD PRIMARY KEY (`username`);

--
-- Chỉ mục cho bảng `offices`
--
ALTER TABLE `offices`
  ADD PRIMARY KEY (`office_id`,`code`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Chỉ mục cho bảng `Profiles`
--
ALTER TABLE `Profiles`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `fk_officecode_offices_profiles` (`office_code`);

--
-- Chỉ mục cho bảng `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`task_id`),
  ADD KEY `fk_username_profiles_task` (`username`);

--
-- Chỉ mục cho bảng `task_feedback`
--
ALTER TABLE `task_feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `fk_taskId_Task_TaskFeedback` (`task_id`),
  ADD KEY `fk_senderUser_profiles_TaskFeedback` (`sender_user`),
  ADD KEY `fk_receiverUser_profiles_TaskFeedback` (`receiver_user`);

--
-- Chỉ mục cho bảng `vacation`
--
ALTER TABLE `vacation`
  ADD PRIMARY KEY (`vacation_id`),
  ADD KEY `fk_username_profiles_vacation` (`username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `accounts`
--
ALTER TABLE `accounts`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `offices`
--
ALTER TABLE `offices`
  MODIFY `office_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `Profiles`
--
ALTER TABLE `Profiles`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `task`
--
ALTER TABLE `task`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `task_feedback`
--
ALTER TABLE `task_feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `vacation`
--
ALTER TABLE `vacation`
  MODIFY `vacation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `available_vacation_day`
--
ALTER TABLE `available_vacation_day`
  ADD CONSTRAINT `fk_username_profiles_available_vacation_day` FOREIGN KEY (`username`) REFERENCES `profiles` (`username`);

--
-- Các ràng buộc cho bảng `Profiles`
--
ALTER TABLE `Profiles`
  ADD CONSTRAINT `fk_officecode_offices_profiles` FOREIGN KEY (`office_code`) REFERENCES `offices` (`code`),
  ADD CONSTRAINT `fk_username_accounts_profiles` FOREIGN KEY (`username`) REFERENCES `accounts` (`username`);

--
-- Các ràng buộc cho bảng `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `fk_username_profiles_task` FOREIGN KEY (`username`) REFERENCES `profiles` (`username`);

--
-- Các ràng buộc cho bảng `task_feedback`
--
ALTER TABLE `task_feedback`
  ADD CONSTRAINT `fk_receiverUser_profiles_TaskFeedback` FOREIGN KEY (`receiver_user`) REFERENCES `profiles` (`username`),
  ADD CONSTRAINT `fk_senderUser_profiles_TaskFeedback` FOREIGN KEY (`sender_user`) REFERENCES `profiles` (`username`),
  ADD CONSTRAINT `fk_taskId_Task_TaskFeedback` FOREIGN KEY (`task_id`) REFERENCES `task` (`task_id`);

--
-- Các ràng buộc cho bảng `vacation`
--
ALTER TABLE `vacation`
  ADD CONSTRAINT `fk_username_profiles_vacation` FOREIGN KEY (`username`) REFERENCES `profiles` (`username`);
COMMIT;
