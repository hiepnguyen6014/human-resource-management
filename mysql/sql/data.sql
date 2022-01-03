SET GLOBAL time_zone = "Asia/Ho_Chi_Minh";
SET time_zone = "+07:00";
SET @@session.time_zone = "+07:00";

CREATE DATABASE IF NOT EXISTS `enterprise` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `enterprise`;

CREATE TABLE `accounts` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `account_type` int(11) DEFAULT NULL,
  `active` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `accounts`
--

INSERT INTO `accounts` (`user_id`, `username`, `password`, `account_type`, `active`) VALUES
(1, 'nguyendaihiep', 'nguyendaihiep', 1, 0),
(2, 'trangiahuy', 'trangiahuy', 2, 0),
(3, 'hongocthanh', 'hongocthanh', 2, 0),
(4, 'vovanduong', 'vovanduong', 2, 0),
(5, 'phamanhduy', 'phamanhduy', 2, 0),
(6, 'leducson', 'leducson', 1, 0),
(7, 'nguyenhaidang', 'nguyenhaidang', 2, 0),
(8, 'daogiahiep', 'daogiahiep', 2, 0),
(9, 'trankhanhduy', 'trankhanhduy', 2, 0),
(10, 'vonhatduy', 'vonhatduy', 2, 0),
(11, 'luuthuyky', 'luuthuyky', 1, 0),
(12, 'nguyenphuan', 'nguyenphuan', 2, 0),
(13, 'lamvanbao', 'lamvanbao', 2, 0),
(14, 'nguyenhuuhieu', 'nguyenhuuhieu', 2, 0),
(15, 'nguyenkimhue', 'nguyenkimhue', 2, 0),
(16, 'admin', '$2y$10$EM4RIU9n2JGhddsmFB.k3OGFElIeI0y9L8HGIWU7/jzsydaOIB/2i', 0, 1),
(17, 'employee', '$2y$10$kUFd2RfhixzDphW8ve3WWOIpAFNb3wCEfEM08XNZPiBtS.uwF4zYS', 2, 1),
(18, 'manager', '$2y$10$8p1NEpwBgE7Udyw9IVGYC.a0dYvtFa4mkNpfLcWupMokjFyBIg7YW', 1, 1);

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
('daogiahiep', 12),
('hongocthanh', 12),
('lamvanbao', 12),
('leducson', 12),
('luuthuyky', 12),
('nguyendaihiep', 12),
('nguyenhaidang', 12),
('nguyenhuuhieu', 12),
('nguyenkimhue', 12),
('nguyenphuan', 12),
('phamanhduy', 12),
('trangiahuy', 12),
('trankhanhduy', 12),
('vonhatduy', 12),
('vovanduong', 12);

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
  `date_begin` date DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `offices`
--

INSERT INTO `offices` (`office_id`, `code`, `name`, `room_number`, `phone`, `date_begin`, `description`) VALUES
(4, 'TTC', 'Phong Tai Chinh', 'R001', '0916805970', '2021-12-17', 'Phong Tai Chinh'),
(5, 'PTT', 'Phong Thong Tin', 'R002', '0813171201', '2021-05-21', 'Phong Thong Tin'),
(6, 'PKT', 'Phong Ke Toan', 'R003', '0832506771', '2021-05-03', 'Phong Thong Tin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `profiles`
--

CREATE TABLE `profiles` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `date_begin` date DEFAULT NULL,
  `gmail` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `salary` int(11) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `office_code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `profiles`
--

INSERT INTO `profiles` (`user_id`, `username`, `fname`, `lname`, `birthdate`, `date_begin`, `gmail`, `phone_number`, `salary`, `position`, `address`, `avatar`, `office_code`) VALUES
(1, 'nguyendaihiep', 'Hiep', 'Nguyen Dai', '2001-01-01', '2021-01-01', 'ndhiep@gmail.com', '210-200-6896', 1000, 1, 'Viet Nam', 'pro1.png', 'TTC'),
(2, 'trangiahuy', 'Huy', 'Tran Gia', '2001-01-01', '2021-01-01', 'tghuy@gmail.com', '210-201-2851', 1000, 2, 'Viet Nam', 'pro2.png', 'TTC'),
(3, 'hongocthanh', 'Thanh', 'Ho Ngoc', '2001-01-01', '2021-01-01', 'hnthanh@gmail.com', '210-202-4810', 1000, 2, 'Viet Nam', 'pro3.png', 'TTC'),
(4, 'vovanduong', 'Duong', 'Vo Van', '2001-01-01', '2021-01-01', 'vvduong@gmail.com', '210-203-4398', 1000, 2, 'Viet Nam', 'pro4.png', 'TTC'),
(5, 'phamanhduy', 'Duy', 'Pham Anh', '2001-01-01', '2021-01-01', 'paduy@gmail.com', '210-204-9531', 1000, 2, 'Viet Nam', 'pro5.png', 'TTC'),
(6, 'leducson', 'Son', 'Le Duc', '2001-01-01', '2021-01-01', 'ldson@gmail.com', '210-205-4368', 1000, 1, 'Viet Nam', 'pro6.png', 'PTT'),
(7, 'nguyenhaidang', 'Dang', 'Nguyen Hai', '2001-01-01', '2021-01-01', 'nhdang@gmail.com', '210-206-3317', 1000, 2, 'Viet Nam', 'pro7.png', 'PTT'),
(8, 'daogiahiep', 'Hiep', 'Dao Gia', '2001-01-01', '2021-01-01', 'dghiep@gmail.com', '210-207-7934', 1000, 2, 'Viet Nam', 'pro8.png', 'PTT'),
(9, 'trankhanhduy', 'Duy', 'Tran Khanh', '2001-01-01', '2021-01-01', 'tkduy@gmail.com', '210-208-7210', 1000, 2, 'Viet Nam', 'pro9.png', 'PTT'),
(10, 'vonhatduy', 'Duy', 'Vo Nhat', '2001-01-01', '2021-01-01', 'vnduy@gmail.com', '210-209-1616', 1000, 2, 'Viet Nam', 'pro10.png', 'PTT'),
(11, 'luuthuyky', 'Ky', 'Luu Thuy', '2001-01-01', '2021-01-01', 'ltky@gmail.com', '210-212-4269', 1000, 1, 'Viet Nam', 'pro11.png', 'PKT'),
(12, 'nguyenphuan', 'An', 'Nguyen Phu', '2001-01-01', '2021-01-01', 'npan@gmail.com', '210-213-6575', 1000, 2, 'Viet Nam', 'pro12.png', 'PKT'),
(13, 'lamvanbao', 'Bao', 'Lam Van', '2001-01-01', '2021-01-01', 'lvbao@gmail.com', '210-214-1166', 1000, 2, 'Viet Nam', 'pro13.png', 'PKT'),
(14, 'nguyenhuuhieu', 'Hieu', 'Nguyen Huu', '2001-01-01', '2021-01-01', 'nhhieu@gmail.com', '210-215-5348', 1000, 2, 'Viet Nam', 'pro14.png', 'PKT'),
(15, 'nguyenkimhue', 'Hue', 'Nguyen Kim', '2001-01-01', '2021-01-01', 'nkhue@gmail.com', '210-216-6664', 1000, 2, 'Viet Nam', 'pro15.png', 'PKT');

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
  `date_begin` date DEFAULT NULL,
  `assign_date` date DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `message` text,
  `is_confirm` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `task`
--

INSERT INTO `task` (`task_id`, `username`, `title`, `deadline`, `status`, `rate`, `date_begin`, `assign_date`, `file`, `message`, `is_confirm`) VALUES
(1, 'trangiahuy', 'Code Database', '2022-01-09', 0, NULL, '2021-01-01', NULL, 'file20210101.zip', 'Lam di dung noi nhieu', b'0'),
(2, 'nguyenhaidang', 'Code Frontend', '2022-01-09', 0, NULL, '2021-01-01', NULL, 'file20210101(1).zip', 'Lam nhanh len', b'0'),
(3, 'nguyenphuan', 'Code Backend', '2022-01-09', 0, NULL, '2021-01-01', NULL, 'file20210101(2).zip', 'Lam le len di', b'0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `task_feedback`
--

CREATE TABLE `task_feedback` (
  `feedback_id` int(11) NOT NULL,
  `task_id` int(11) DEFAULT NULL,
  `message` text,
  `time` datetime DEFAULT NULL,
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
  `start_date` date DEFAULT NULL,
  `number_day_off` int(11) DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `feedback` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Chỉ mục cho bảng `profiles`
--
ALTER TABLE `profiles`
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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `offices`
--
ALTER TABLE `offices`
  MODIFY `office_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `profiles`
--
ALTER TABLE `profiles`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
  MODIFY `vacation_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `available_vacation_day`
--
ALTER TABLE `available_vacation_day`
  ADD CONSTRAINT `fk_username_profiles_available_vacation_day` FOREIGN KEY (`username`) REFERENCES `profiles` (`username`);

--
-- Các ràng buộc cho bảng `profiles`
--
ALTER TABLE `profiles`
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

