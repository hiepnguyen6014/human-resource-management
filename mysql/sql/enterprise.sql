SET GLOBAL time_zone = "Asia/Ho_Chi_Minh";
SET time_zone = "+07:00";
SET @@session.time_zone = "+07:00";

CREATE DATABASE IF NOT EXISTS `enterprise` DEFAULT CHARACTER SET utf8 COLLATE utf8_vietnamese_ci;
USE `enterprise`;

CREATE TABLE `accounts` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `account_type` int(11) DEFAULT '2',
  `active` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8_vietnamese_ci;


INSERT INTO `accounts` (`user_id`, `username`, `password`, `account_type`, `active`) VALUES
(21, 'mvmanh', '$2y$10$ePtD1XzTUoui1wrqcRhFLe2M2Rqe4VxVUIUJLc29oSi6HV0lagP2e', 0, 1),
(22, 'tranhoanglong', '$2y$10$7c4SbPuzd/meCwruzXotFui0wzu3AKP/S2GBZ0/ufsWPeP8J9bo0.', 2, 1),
(23, 'nguyenducmanh', '$2y$10$U5TeGXlQynP1KPQAAF.fbOdimDVbJFRfQBl8uscbst9YBu5SPuHb6', 1, 1),
(24, 'dinhvanminh', '$2y$10$asgAHJt6YxZx3TdB0jg1NugBr4XDlZ.74.hd.sSH.3L4I9bbI9Yjm', 2, 1),
(25, 'hongocthanh', '$2y$10$wuAVzUVu/fM4Kcx5iWM3WubuSYiVpcckhFu3uuHnXDXConL3IDegS', 2, 1),
(27, 'dangthuthao', '$2y$10$cVoTkh0TtSZsWj19U7foQ.fWP6apvHZpGiH4Mtr/tz24jg.otdwHi', 2, 1),
(28, 'nguyenduyphuong', '$2y$10$Nr3E5Ki63lrT0fgV3n9T8u0as2QvwLA4W8YMs2.qvzaSMYlnQokei', 2, 1),
(29, 'nguyenvanduc', '$2y$10$pvP8qiS2GBH04P6NQPLJLegUyCwkg20E2M9c9xTAAL.m03BpxsMsi', 2, 1),
(30, 'nguyenduyhoai', '$2y$10$jg3iMb1sstxTXys5ldphN.1vB5sX1LDLWW.j0/BIQvB1zJdwwcjcG', 1, 1),
(31, 'vuhong', '$2y$10$lq3YnwWTwP.nmAXrDurxe.lmC9Pq9VdcYpQd67BIyhg8gKz0jP3GO', 2, 1),
(32, 'luonghoaithuong', '$2y$10$MYcD0n0Af85Fb.gIuFp8luLaxkj1Wk7RE173vlD3xel/MeuzlkSGi', 2, 1),
(33, 'nguyenduc', '$2y$10$/SqUM6cPkDuggRFHzLcgwO39r7WV1oMSP.2n9iPTMMs6VZJICiRNu', 2, 1),
(34, 'nguyenanhminh', '$2y$10$kIVGVFJOj6rH9DMdTrKsweCbqxN2A.lwaSMiG8k0390/zA7aG.8se', 2, 1),
(35, 'ngocdiemquynh', '$2y$10$okc5zrXALm4.e6j4parfde5vlFgbEV3Tfm9pGn/tEAfE27z9w4nOa', 2, 1),
(36, 'manhan', '$2y$10$Ni8avuV31WuoJ4uUp0tisuTD/ZjuCz2WPQ13WXjOSxqW1AmRCBI2m', 2, 1),
(37, 'minhlengoc', '$2y$10$c0xtgeHrGT2hqvyibXQI9uub563FbrxASZdl40SaXJIg5rbQzTYaS', 2, 0),
(38, 'ledinhdinh', '$2y$10$xfkHp.MV4/zE7qw8SkVRruZkIeGcXmMY9vP1crQhLLYBfWAJGC7A.', 1, 0),
(39, 'longduc', '$2y$10$DXqUALSO03lAysucNPXZVe6uGqO93T80lCNwQK0PnfwJzWLSYMhyS', 2, 1),
(40, 'nguyenminhha', '$2y$10$q4Q3YbqMIh6S/RQLlJbJGu5B3NqLoHsio4Iy5L9uaC.ZzBX.EMCaa', 2, 0),
(41, 'thuongbui', '$2y$10$GPdySclHE6YWvoB6O00nh.fbFqBZ/bWjfoXfSDzwVg92yg30MGhGm', 2, 1),
(42, 'ductran', '$2y$10$ZILKDGueJW2og/nkOdNrYesCgFtqu/kD6SvKmZS3gjj1iw6CLjL3S', 2, 0),
(43, 'lebaovy', '$2y$10$AJDEutm82/h6xnkWPzNAau9o56YzMAgNQu2cCqV3v7./YoOwnsxZm', 1, 0),
(44, 'truongnguyen', '$2y$10$82OYxS5oyDkTlh4nw0JzfuuHolc40YY4T4yRdgYWW88f8RpIbjmW6', 1, 1),
(45, 'phanhieubang', '$2y$10$BwibNFDA3LVTf/uKjfpSxO0ERtIjN.wqgzfMaE1LNO8kMXHPpGPDG', 2, 0),
(46, 'longhung', '$2y$10$o9sLmbN52zlt0BYuDFtaE.Ia5Rn38493mSvOI6.HZVlrWaEPK.nZm', 2, 0),
(47, 'nguyenminhtriet', '$2y$10$Ck8RVLeMHrLu1rZj6da99O/El72v8HHPncDE.jQ3dopakcpONrzkq', 2, 0),
(48, 'ananvu', '$2y$10$9AXsXM9J19y7KFhxYphGUOp7broo8ZZA5wjzTqcXPU0f.NB9xojLC', 2, 0),
(49, 'tranhung', '$2y$10$FEQEnFS1xUs/qnam.WwlIu3DZM6Pj3vxAs297gTYuh6Q/R1UWNARS', 2, 0),
(50, 'minhvu', '$2y$10$5CXETNCxSCbE7ZbdK8hHJeXy7VdBFBlXOa7rgf5aa2hFRdNl3V8I6', 2, 0),
(51, 'nguyenquangtien', '$2y$10$NYeO9xOzDLacZvUEhiOpg.mCBozxkQtnCcIiEnF46tQmNoERfu7Da', 1, 1),
(52, 'kimho', '$2y$10$m9/v1zvVLz495odcEE0PLe3nTiLHeBvNpafC/93LOfz4kIQxj3GXK', 2, 0),
(53, 'hungtran', '$2y$10$yhMk6mG8kIG/Qj6JgXRVeenwBcHN5gQ0PCe2Zr.djNvhhPIeG9HTm', 2, 1),
(54, 'nguyenkhanhngan', '$2y$10$IjYPF5DeEarZlds3fx3H3Ozxvo2EqRDPleLp/9yHQLoJXgyQ1NVe6', 1, 0),
(55, 'vunguyen', '$2y$10$dRGHXOzC8wjaEk2vs5VWbe2aKfmLop1.IfwWos23/fUH/mmWSRiBu', 1, 1),
(56, 'halinhchi', '$2y$10$9gqCac5sALDU286zwSA.GuJcPs51d78kY3EC9QJp5CLA0ynbYnOny', 1, 0),
(57, 'dinhphucan', '$2y$10$zTrR55bLPgm5VtXJ3.sn/eI3eGW5oPHhcRMqvxZ1RuTqvhl9RcF7O', 1, 0),
(58, 'phankhanhchau', '$2y$10$qR6U2KjKH67b1rE6k64ECufF7ro6DqH2/ZK.HfPWhb9rOWs4O1sDq', 2, 0),
(59, 'doankimngan', '$2y$10$9ntYjdE.o8WQh4F4ZtE2MeVZhy/LMo6qpG6Bj8RNfx1Id9idvRRr6', 2, 0),
(60, 'letuyetnhung', '$2y$10$ve52eai4WXK.tCYKr566CeH26jj5tpNsB5X/YKX7F.mLJKz6jxmv6', 2, 0),
(61, 'hoandiep', '$2y$10$kjyj6axSIMvYJjdk.gMhk.zNThmvhdZ6ZTwNyrEYCJKgcS.gyAU.i', 2, 0),
(62, 'dinhcatanh', '$2y$10$h7fH6kguZS4HI9d7rgkAHeAbq8I89KaLsrE62I74VO.ZnX8ziwXCW', 2, 0),
(63, 'mocamanh', '$2y$10$bs18hQghEWWbs73exr2yKuaALOemeWBfa7rqyaoRoq2T5wM/X7E66', 2, 0),
(64, 'leanhnhien', '$2y$10$5KL1F1tvbo4kvKokl.Ub8OY3vLiOTYYlYfu9O9r/vykZrDjeWncQ.', 2, 0),
(65, 'chithienbinh', '$2y$10$64WEBAcBLzF0fqFD7G0fE.H2EhRvvYnXJxwygR7Q.5WA15Xs6OZBe', 2, 0),
(66, 'daohienchau', '$2y$10$lhOQfvmW4JaWa6LKNrhAoOnx0iJ2pyrq1EHQec5Mk7MqvY9F3scmG', 2, 0),
(67, 'dienanhdiep', '$2y$10$3nRYKsPowaMGyHb9xxZTS.RWIjf../PJnURqUDM6S4c../d8xY4Y6', 2, 0),
(68, 'daogiangngoc', '$2y$10$wbXP6y/16qtvX1Sc6dQX..saiS2cdwxM8c9cSKvp.ebogJ3hfgUJ2', 2, 0),
(69, 'lyquynhchau', '$2y$10$qABUHd8gvsZKe88aU1ZMvutCYf.vBYs./eD183cwTz18Lj1jppAp6', 2, 0),
(70, 'caohongbich', '$2y$10$al3DdBiGArKnpxQfbzaD8.okx9eNF4WgBQpLW6xIP8faU9pamn70S', 2, 0),
(71, 'vanmanh', '$2y$10$sPtFcRNqKFqv5Rt3miuc8.UugGsCtafuONB9sjWaHmZ2jprWv7BQe', 1, 1),
(72, 'nguyenthien', '$2y$10$u2kwqa1ezzFtrWedWnWbUu3s7HF709q2tzrcNc3tEaTqt1moyU/3i', 2, 1),
(73, 'manhmai', '$2y$10$SlaKXBs35Aul5.8T2vQmDO4oRTfPoYSqoAC1q8bsTo1kUomWuGzVK', 2, 1),
(74, 'bachmai', '$2y$10$DhpUB1Q11k0Mn8zb/Mb2MuJ/3QFY60pikL7p51rfg5F9vn8Kf.68W', 2, 1);


CREATE TABLE `available_vacation_day` (
  `username` varchar(255) NOT NULL,
  `remain_day` int(11) DEFAULT '12'
) ENGINE=InnoDB DEFAULT CHARSET=utf8_vietnamese_ci;


INSERT INTO `available_vacation_day` (`username`, `remain_day`) VALUES
('ananvu', 12),
('bachmai', 6),
('caohongbich', 12),
('chithienbinh', 12),
('dangthuthao', 12),
('daogiangngoc', 12),
('daohienchau', 12),
('dienanhdiep', 12),
('dinhcatanh', 12),
('dinhphucan', 12),
('dinhvanminh', 12),
('doankimngan', 12),
('ductran', 12),
('halinhchi', 12),
('hoandiep', 12),
('hongocthanh', 12),
('hungtran', 7),
('kimho', 12),
('leanhnhien', 12),
('lebaovy', 12),
('ledinhdinh', 12),
('letuyetnhung', 12),
('longduc', 12),
('longhung', 12),
('luonghoaithuong', 12),
('lyquynhchau', 12),
('manhan', 12),
('manhmai', 5),
('minhlengoc', 12),
('minhvu', 12),
('mocamanh', 12),
('ngocdiemquynh', 12),
('nguyenanhminh', 12),
('nguyenduc', 12),
('nguyenducmanh', 6),
('nguyenduyhoai', 8),
('nguyenduyphuong', 12),
('nguyenkhanhngan', 12),
('nguyenminhha', 12),
('nguyenminhtriet', 12),
('nguyenquangtien', 12),
('nguyenthien', 12),
('nguyenvanduc', 12),
('phanhieubang', 12),
('phankhanhchau', 12),
('thuongbui', 12),
('tranhoanglong', 12),
('tranhung', 12),
('truongnguyen', 12),
('vanmanh', 12),
('vuhong', 12),
('vunguyen', 7);

-- --------------------------------------------------------

--
-- Table structure for table `offices`
--

CREATE TABLE `offices` (
  `office_id` int(11) NOT NULL,
  `code` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `room_number` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `date_begin` datetime DEFAULT CURRENT_TIMESTAMP,
  `description` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8_vietnamese_ci;

--
-- Dumping data for table `offices`
--

INSERT INTO `offices` (`office_id`, `code`, `name`, `room_number`, `phone`, `date_begin`, `description`) VALUES
(9, 'PĐT', 'Phòng Điện Toán', 'A1212', '0633860171', '2022-01-10 02:45:48', 'Bổ sung sau'),
(12, 'CTHSSV', 'Phòng Công tác Học sinh - Sinh viên', 'A123', '0633860172', '2022-01-10 02:47:39', 'Bổ sung sau'),
(13, 'PĐH', 'Phòng Đại học', 'R0037', '0633860173', '2022-01-10 02:48:11', 'Bổ sung sau'),
(14, 'A1235S', 'Phòng Khảo thí & Kiểm định Chất lượng', 'R002', '0832506772', '2022-01-10 02:48:57', 'Bổ sung sau'),
(15, 'PTC', 'Phòng Tài chính', 'R002A', '0868738092', '2022-01-10 02:49:27', 'Bổ sung sau'),
(17, 'PCĐ', 'Phòng Chấm Điểm', 'CĐ1212', '0868738096', '2022-01-10 12:33:28', 'Bổ sung sau');

-- --------------------------------------------------------

--
-- Table structure for table `Profiles`
--

CREATE TABLE `Profiles` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `fname` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `lname` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `date_begin` datetime DEFAULT CURRENT_TIMESTAMP,
  `gmail` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `salary` int(11) DEFAULT NULL,
  `position` int(11) DEFAULT '2',
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `avatar` varchar(255) DEFAULT 'default.webp',
  `office_code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8_vietnamese_ci;

--
-- Dumping data for table `Profiles`
--

INSERT INTO `Profiles` (`user_id`, `username`, `fname`, `lname`, `birthdate`, `date_begin`, `gmail`, `phone_number`, `salary`, `position`, `address`, `avatar`, `office_code`) VALUES
(19, 'mvmanh', 'Mạnh', 'Mai Văn', '1993-02-10', '2022-01-10 02:36:56', 'mvmanh@gmail.com', '0923456789', 3200, 0, '19 Nguyễn Hữu Thọ, P. Tân Phong, Quận 7, Hồ Chí Minh', 'mvmanh.jpg', NULL),
(20, 'tranhoanglong', 'Long', 'Trần Hoàng', '2022-01-12', '2022-01-10 02:50:04', NULL, NULL, NULL, 2, NULL, 'default.webp', 'PĐT'),
(21, 'nguyenducmanh', 'Mạnh', 'Nguyễn Đức', '2002-06-30', '2022-01-10 02:50:46', NULL, NULL, NULL, 1, NULL, 'nguyenducmanh.jpg', 'PĐT'),
(22, 'dinhvanminh', 'Minh', 'Đinh Văn', '1996-02-10', '2022-01-10 02:53:53', NULL, NULL, NULL, 2, NULL, 'default.webp', 'PĐT'),
(23, 'hongocthanh', 'Thanh', 'Hồ Ngọc', '2001-12-17', '2022-01-10 02:54:23', NULL, NULL, NULL, 2, NULL, 'default.webp', 'PTC'),
(25, 'dangthuthao', 'Thảo', 'Đặng Thu', '2001-05-12', '2022-01-10 02:56:27', NULL, NULL, NULL, 2, NULL, 'default.webp', 'PTC'),
(26, 'nguyenduyphuong', 'Phương', 'Nguyễn Duy', '2000-05-25', '2022-01-10 02:57:56', NULL, NULL, NULL, 2, NULL, 'default.webp', 'PTC'),
(27, 'nguyenvanduc', 'Đức', 'Nguyễn Văn', '2001-12-12', '2022-01-10 02:58:27', NULL, NULL, NULL, 2, NULL, 'default.webp', 'PĐT'),
(28, 'nguyenduyhoai', 'Hoài', 'Nguyễn Duy', '2000-05-12', '2022-01-10 02:58:47', NULL, NULL, NULL, 1, NULL, 'nguyenduyhoai.jpg', 'PTC'),
(29, 'vuhong', 'Hồng', 'Vũ', '2001-12-12', '2022-01-10 02:58:50', NULL, NULL, NULL, 2, NULL, 'default.webp', 'PĐT'),
(30, 'luonghoaithuong', 'Thương', 'Lương Hoài', '2001-03-25', '2022-01-10 02:59:51', NULL, NULL, NULL, 2, NULL, 'default.webp', 'PTC'),
(31, 'nguyenduc', 'Đức', 'Nguyên', '2001-12-12', '2022-01-10 03:00:34', NULL, NULL, NULL, 2, NULL, 'default.webp', 'PĐT'),
(32, 'nguyenanhminh', 'Minh', 'Nguyễn Anh', '2001-05-31', '2022-01-10 03:00:50', NULL, NULL, NULL, 2, NULL, 'default.webp', 'PĐT'),
(33, 'ngocdiemquynh', 'Quỳnh', 'Ngọc Diễm', '2001-02-05', '2022-01-10 03:02:12', NULL, NULL, NULL, 2, NULL, 'default.webp', 'PĐT'),
(34, 'manhan', 'An', 'Mạnh', '2001-12-12', '2022-01-10 03:02:50', NULL, NULL, NULL, 2, NULL, 'default.webp', 'PĐT'),
(35, 'minhlengoc', 'Ngọc', 'Minh Lê', '2000-05-21', '2022-01-10 03:04:02', NULL, NULL, NULL, 2, NULL, 'default.webp', 'PTC'),
(36, 'ledinhdinh', 'Dinh', 'Lê Đình', '2000-03-25', '2022-01-10 03:05:38', NULL, NULL, NULL, 2, NULL, 'default.webp', 'PTC'),
(37, 'longduc', 'Đức', 'Long', '2001-12-28', '2022-01-10 03:06:03', NULL, NULL, NULL, 2, NULL, 'default.webp', 'PĐT'),
(38, 'nguyenminhha', 'Hà', 'Nguyễn Minh', '2001-12-31', '2022-01-10 03:07:54', NULL, NULL, NULL, 2, NULL, 'default.webp', 'PTC'),
(39, 'thuongbui', 'Thương', 'Bùi', '2001-12-12', '2022-01-10 03:08:02', 'buithuong@gmail.com', '0916805970', NULL, 2, 'Ninh Thuận', 'thuongbui.jpg', 'CTHSSV'),
(40, 'ductran', 'Đức', 'Trần', '2001-01-11', '2022-01-10 03:08:16', NULL, NULL, NULL, 2, NULL, 'default.webp', 'CTHSSV'),
(41, 'lebaovy', 'Bảo Vy', 'Lê', '2000-02-25', '2022-01-10 03:08:59', NULL, NULL, NULL, 2, NULL, 'default.webp', 'PTC'),
(42, 'truongnguyen', 'Trường', 'Nguyễn', '2001-12-12', '2022-01-10 03:09:35', NULL, NULL, NULL, 1, NULL, 'truongnguyen.png', 'CTHSSV'),
(43, 'phanhieubang', 'Băng', 'Phan Hiểu', '2001-05-03', '2022-01-10 03:10:26', NULL, NULL, NULL, 2, NULL, 'default.webp', 'PTC'),
(44, 'longhung', 'Hùng', 'Long', '1992-12-12', '2022-01-10 03:10:35', NULL, NULL, NULL, 2, NULL, 'default.webp', 'CTHSSV'),
(45, 'nguyenminhtriet', 'Triết', 'Nguyễn Minh', '2001-07-26', '2022-01-10 03:11:10', NULL, NULL, 2311, 2, NULL, 'default.webp', 'A1235S'),
(46, 'ananvu', 'An', 'Vũ', '1995-01-12', '2022-01-10 03:11:28', NULL, NULL, NULL, 2, NULL, 'default.webp', 'CTHSSV'),
(47, 'tranhung', 'Hùng', 'Trần', '1994-02-01', '2022-01-10 03:12:25', NULL, NULL, NULL, 2, NULL, 'default.webp', 'CTHSSV'),
(48, 'minhvu', 'Minh', 'Vũ', '1998-03-01', '2022-01-10 03:12:44', NULL, NULL, NULL, 2, NULL, 'default.webp', 'CTHSSV'),
(49, 'nguyenquangtien', 'Tiến', 'Nguyễn Quang', '2001-06-03', '2022-01-10 03:13:00', NULL, NULL, NULL, 1, NULL, 'default.webp', 'A1235S'),
(50, 'kimho', 'Kim', 'Hồ', '1997-02-21', '2022-01-10 03:13:05', NULL, NULL, NULL, 2, NULL, 'default.webp', 'CTHSSV'),
(51, 'hungtran', 'Hưng', 'Trần', '1992-02-12', '2022-01-10 03:13:44', NULL, NULL, NULL, 2, NULL, 'hungtran.jpg', 'PĐH'),
(52, 'nguyenkhanhngan', 'Khánh Ngân', 'Nguyễn', '2001-02-26', '2022-01-10 03:13:48', NULL, NULL, NULL, 2, NULL, 'default.webp', 'A1235S'),
(53, 'vunguyen', 'Nguyên', 'Vũ', '1990-02-12', '2022-01-10 03:14:05', NULL, NULL, NULL, 1, NULL, 'default.webp', 'PĐH'),
(54, 'halinhchi', 'Linh Chi', 'Hà', '2000-03-05', '2022-01-10 03:14:14', NULL, NULL, NULL, 2, NULL, 'default.webp', 'A1235S'),
(55, 'dinhphucan', 'Phúc An', 'Đình', '2001-03-23', '2022-01-10 03:14:48', NULL, NULL, NULL, 2, NULL, 'default.webp', 'A1235S'),
(56, 'phankhanhchau', 'Khánh Châu', 'Phan', '2001-02-25', '2022-01-10 03:15:40', NULL, NULL, NULL, 2, NULL, 'default.webp', 'A1235S'),
(57, 'doankimngan', 'Kim Ngân', 'Đoàn', '2000-04-16', '2022-01-10 03:16:03', NULL, NULL, NULL, 2, NULL, 'default.webp', 'A1235S'),
(58, 'letuyetnhung', 'Tuyết Nhung', 'Lê', '2000-02-21', '2022-01-10 03:17:30', NULL, NULL, NULL, 2, NULL, 'default.webp', 'A1235S'),
(59, 'hoandiep', 'An Diệp', 'Hồ', '2000-05-06', '2022-01-10 03:17:55', NULL, NULL, NULL, 2, NULL, 'default.webp', 'A1235S'),
(60, 'dinhcatanh', 'Cát Anh', 'Đình', '2000-02-15', '2022-01-10 03:18:58', NULL, NULL, 1000, 2, NULL, 'default.webp', 'A1235S'),
(61, 'mocamanh', 'Cẩm Anh', 'Mơ', '2001-02-26', '2022-01-10 03:20:12', NULL, NULL, NULL, 2, NULL, 'default.webp', 'PĐH'),
(62, 'leanhnhien', 'An Nhiên', 'Lê', '2001-06-15', '2022-01-10 03:20:50', NULL, NULL, NULL, 2, NULL, 'default.webp', 'PĐH'),
(63, 'chithienbinh', 'Thiên Bình', 'Chí', '2000-05-14', '2022-01-10 03:21:17', NULL, NULL, NULL, 2, NULL, 'default.webp', 'PĐH'),
(64, 'daohienchau', 'Hiền Châu', 'Đào', '2001-02-25', '2022-01-10 03:21:38', NULL, NULL, NULL, 2, NULL, 'default.webp', 'PĐH'),
(65, 'dienanhdiep', 'Ánh Diệp', 'Diên', '2000-02-25', '2022-01-10 04:09:40', NULL, NULL, NULL, 2, NULL, 'default.webp', 'PĐH'),
(66, 'daogiangngoc', 'Giáng Ngọc', 'Đào', '2001-03-25', '2022-01-10 04:10:14', NULL, NULL, NULL, 2, NULL, 'default.webp', 'PĐH'),
(67, 'lyquynhchau', 'Quỳnh Châu', 'Lý', '2001-03-25', '2022-01-10 04:10:57', NULL, NULL, NULL, 2, NULL, 'default.webp', 'PĐH'),
(68, 'caohongbich', 'Hồng Bích', 'Cao', '2000-02-15', '2022-01-10 04:11:24', NULL, NULL, NULL, 2, NULL, 'default.webp', 'PĐH'),
(69, 'vanmanh', 'Mạnh', 'Văn', '2022-01-26', '2022-01-10 12:34:09', NULL, NULL, NULL, 1, NULL, 'vanmanh.png', 'PCĐ'),
(70, 'nguyenthien', 'Thiện', 'Nguyễn', '2000-03-25', '2022-01-10 12:34:14', NULL, NULL, NULL, 2, NULL, 'nguyenthien.jpg', 'PCĐ'),
(71, 'manhmai', 'Mạnh', 'Mai', '2001-01-25', '2022-01-10 12:34:32', NULL, NULL, NULL, 2, NULL, 'default.webp', 'PCĐ'),
(72, 'bachmai', 'Mai', 'Bạch', '2000-11-17', '2022-01-10 12:34:53', 'bachmai@gmail.com', '0913171201', NULL, 2, '55/15 Hùng Vương', 'default.webp', 'PCĐ');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `task_id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `deadline` datetime DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `date_begin` datetime DEFAULT CURRENT_TIMESTAMP,
  `assign_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8_vietnamese_ci;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`task_id`, `username`, `title`, `deadline`, `status`, `date_begin`, `assign_date`) VALUES
(20, 'bachmai', 'Thiết kế database', '2022-01-27 13:06:00', 1, '2022-01-10 13:00:48', '2022-01-10 13:03:27'),
(21, 'bachmai', 'Thiết kế giao diện thêm nhân viên', '2022-01-10 13:03:00', 3, '2022-01-10 13:01:48', '2022-01-10 13:03:01'),
(22, 'bachmai', 'Thiết kế giao diện người dùng', '2022-01-13 13:02:00', 4, '2022-01-10 13:02:37', '2022-01-10 13:04:06'),
(23, 'nguyenthien', 'Thanh toán hoá đơn', '2022-01-19 13:03:00', 0, '2022-01-10 13:03:38', NULL),
(24, 'manhmai', 'Hướng dẫn khách hàng sử dụng', '2022-01-18 13:04:00', 7, '2022-01-10 13:04:26', NULL),
(25, 'tranhoanglong', 'thiết kế giao diện', '2022-01-30 14:22:00', 1, '2022-01-10 13:25:39', '2022-01-10 13:51:34'),
(26, 'dinhvanminh', 'thiết kế database', '2022-01-12 13:26:00', 4, '2022-01-10 13:26:42', '2022-01-10 13:53:41'),
(27, 'nguyenvanduc', 'Code front-end', '2022-01-13 13:27:00', 5, '2022-01-10 13:27:08', '2022-01-10 13:54:45'),
(28, 'vuhong', 'Code back-end', '2022-01-26 14:15:00', 1, '2022-01-10 13:27:34', '2022-01-10 13:56:10'),
(29, 'nguyenduc', 'Testing', '2022-01-28 14:14:00', 1, '2022-01-10 13:27:53', '2022-01-10 13:57:08'),
(30, 'hongocthanh', 'Thiết kế chức năng đăng nhập', '2022-01-14 14:38:00', 5, '2022-01-10 13:28:17', '2022-01-10 13:48:58'),
(31, 'nguyenanhminh', 'Tạo hóa đơn', '2022-01-16 13:28:00', 4, '2022-01-10 13:28:44', '2022-01-10 13:58:23'),
(32, 'dangthuthao', 'Thống kê doanh thu tháng', '2022-02-05 13:26:00', 2, '2022-01-10 13:29:15', '2022-01-10 13:53:26'),
(33, 'nguyenduyphuong', 'Thông tin của khách hàng trong tháng', '2022-02-06 13:27:00', 1, '2022-01-10 13:30:26', '2022-01-10 13:56:24'),
(34, 'ngocdiemquynh', 'Thống kê nguồn thu', '2022-01-17 13:31:00', 4, '2022-01-10 13:31:51', '2022-01-10 14:01:38'),
(35, 'luonghoaithuong', 'Tìm hiểu thói quen tiêu dùng', '2022-03-12 13:28:00', 7, '2022-01-10 13:31:57', NULL),
(36, 'manhan', 'Thống kê sản phẩm đầu ra', '2022-01-18 13:32:00', 5, '2022-01-10 13:32:28', '2022-01-10 14:03:44'),
(37, 'luonghoaithuong', 'Tìm hiểu thói quen tiêu dùng', '2022-03-12 13:28:00', 1, '2022-01-10 13:32:38', '2022-01-10 13:57:55'),
(38, 'longduc', 'Thống kê doanh thu trong tháng', '2022-01-31 13:33:00', 5, '2022-01-10 13:33:30', '2022-01-10 14:05:49'),
(39, 'minhlengoc', 'Đánh giá độ hài lòng người tiêu dùng', '2022-02-06 13:30:00', 0, '2022-01-10 13:33:31', NULL),
(40, 'nguyenminhtriet', 'Khảo sát chất lượng sản phẩm tháng', '2022-02-06 13:32:00', 0, '2022-01-10 13:36:05', NULL),
(41, 'thuongbui', 'Cập nhật điểm học tập cho sinh viên', '2022-01-11 13:36:00', 1, '2022-01-10 13:36:39', '2022-01-10 14:45:51'),
(42, 'ductran', 'Cập nhật điểm rèn luyện cho sinh viên', '2022-01-12 13:37:00', 0, '2022-01-10 13:37:01', NULL),
(43, 'nguyenkhanhngan', 'Kiểm tra nội bộ phòng CTHSSV', '2022-02-05 13:33:00', 0, '2022-01-10 13:37:16', NULL),
(44, 'longhung', 'Cập nhật thời khóa biểu cho sinh viên', '2022-01-13 13:37:00', 0, '2022-01-10 13:37:38', NULL),
(45, 'ananvu', 'Cập nhật lịch thi cho sinh viên', '2022-01-14 13:37:00', 0, '2022-01-10 13:38:00', NULL),
(46, 'halinhchi', 'Nhập hàng ngoại địa', '2022-01-30 13:35:00', 0, '2022-01-10 13:38:59', NULL),
(47, 'tranhung', 'Thông báo lịch đăng ký KHHT HK II 2021-2022', '2022-01-17 13:39:00', 0, '2022-01-10 13:39:59', NULL),
(48, 'dinhphucan', 'Xuất khẩu hàng', '2022-03-05 13:36:00', 0, '2022-01-10 13:40:08', NULL),
(49, 'minhvu', 'Thông báo thời gian đóng học phí HK II 2021-2022', '2022-01-19 13:40:00', 0, '2022-01-10 13:40:46', NULL),
(50, 'hungtran', 'Thông báo thời gian đi học trực tiếp', '2022-01-12 13:42:00', 0, '2022-01-10 13:42:15', NULL),
(51, 'mocamanh', 'Thông báo sinh viên tham gia workshop', '2022-01-20 13:43:00', 0, '2022-01-10 13:43:12', NULL),
(52, 'leanhnhien', 'Thông báo giảm 5% học phí do Dịch', '2022-01-19 13:44:00', 0, '2022-01-10 13:44:18', NULL),
(53, 'chithienbinh', 'Thông báo tăng 10% học phí', '2022-01-23 13:44:00', 0, '2022-01-10 13:44:45', NULL),
(54, 'daohienchau', 'Tổ chức buổi sinh hoạt khoa', '2022-01-26 13:45:00', 0, '2022-01-10 13:45:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `task_feedback`
--

CREATE TABLE `task_feedback` (
  `feedback_id` int(11) NOT NULL,
  `task_id` int(11) DEFAULT NULL,
  `message` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci,
  `time` datetime DEFAULT CURRENT_TIMESTAMP,
  `file` varchar(255) DEFAULT NULL,
  `sender_user` varchar(255) DEFAULT NULL,
  `receiver_user` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8_vietnamese_ci;

--
-- Dumping data for table `task_feedback`
--

INSERT INTO `task_feedback` (`feedback_id`, `task_id`, `message`, `time`, `file`, `sender_user`, `receiver_user`) VALUES
(62, 20, 'Thiết kế database theo yêu cầu trong tập tin đính kèm', '2022-01-10 13:00:48', 'phpPmpfmT.png,phpJKrj7U.png,phpAxuZkV.png', 'vanmanh', 'bachmai'),
(63, 21, 'Thiết kế giao diện thêm nhân viên theo yêu cầu ở tệp tin đính kèm', '2022-01-10 13:01:48', 'phpnUqUxx.pdf', 'vanmanh', 'bachmai'),
(64, 22, 'Thiết kế theo yêu cầu trong file đính kèm', '2022-01-10 13:02:37', 'phpNdYer2.jpg,phpTJvzG0.png', 'vanmanh', 'bachmai'),
(65, 23, 'Yêu cầu khách hàng thanh toán khoản tiền còn lại theo yêu cầu file đính kèm', '2022-01-10 13:03:38', 'phpGqSdR2.png', 'vanmanh', 'nguyenthien'),
(66, 20, 'Anh xem thử demo của em, cảm ơn anh.', '2022-01-10 13:03:47', 'phpicZnsO.pdf', NULL, NULL),
(67, 22, 'Em đã hoàn thành, anh xem xét giúp em.', '2022-01-10 13:04:26', 'php6pmnOb.pdf', NULL, NULL),
(69, 20, 'Chưa đủ yều cầu, em xem file anh gửi thêm, anh gia hạn deadline cho em', '2022-01-10 13:06:56', 'phpE0v2C2.png', NULL, NULL),
(70, 21, 'Xin lỗi, em mới nộp, anh xem xét giúp em', '2022-01-10 13:07:51', 'phplux2I1.pdf', NULL, NULL),
(71, 25, 'avc', '2022-01-10 13:25:39', 'php6j8fuB.docx', 'nguyenducmanh', 'tranhoanglong'),
(72, 26, 'thiết kế database', '2022-01-10 13:26:42', 'php0nPGrw.docx', 'nguyenducmanh', 'dinhvanminh'),
(73, 27, 'Code front-end', '2022-01-10 13:27:08', 'phpYKsuJO.docx', 'nguyenducmanh', 'nguyenvanduc'),
(74, 28, 'Code back-end', '2022-01-10 13:27:34', 'phpVOtlF2.docx', 'nguyenducmanh', 'vuhong'),
(75, 29, 'Testing', '2022-01-10 13:27:53', 'php8K1fqD.docx', 'nguyenducmanh', 'nguyenduc'),
(76, 30, 'Thiết kế cho anh cái chức năng đăng nhập cho phần mềm trong tài liệu.', '2022-01-10 13:28:17', 'php0QxsS1.docx', 'nguyenduyhoai', 'hongocthanh'),
(77, 31, 'Tạo hóa đơn', '2022-01-10 13:28:44', 'phpEYv4rP.docx', 'nguyenducmanh', 'nguyenanhminh'),
(78, 32, 'Em thống kê giúp anh doanh thu của tháng này.', '2022-01-10 13:29:15', 'phpE0cS1S.png', 'nguyenduyhoai', 'dangthuthao'),
(79, 33, 'Em nộp cho anh bản danh sách khách hàng trong tháng vừa qua', '2022-01-10 13:30:26', 'phpfyyVO1.pdf', 'nguyenduyhoai', 'nguyenduyphuong'),
(80, 34, 'Thống kê nguồn thu', '2022-01-10 13:31:51', 'phpLCYqoJ.docx', 'nguyenducmanh', 'ngocdiemquynh'),
(82, 36, 'Thống kê sản phẩm đầu ra', '2022-01-10 13:32:28', 'phpA4ovBN.docx', 'nguyenducmanh', 'manhan'),
(83, 37, 'Em tìm hiểu thói quen của khách hàng rồi lập bảng thống kê cho anh.', '2022-01-10 13:32:38', 'php90bKkC.zip', 'nguyenduyhoai', 'luonghoaithuong'),
(84, 38, 'Thống kê doanh thu trong tháng', '2022-01-10 13:33:30', 'phpbjA0m4.docx', 'nguyenducmanh', 'longduc'),
(85, 39, 'Em đi khảo sát độ hài lòng của khách rồi lập bảng đánh giá cho anh', '2022-01-10 13:33:31', 'phpCs8lkx.png', 'nguyenduyhoai', 'minhlengoc'),
(86, 40, 'Đây là danh sách sản phẩm, em đi khảo sát rồi cho anh kết quả.', '2022-01-10 13:36:05', 'phpxmgF5C.pdf', 'nguyenquangtien', 'nguyenminhtriet'),
(87, 41, 'Cập nhật điểm học tập cho sinh viên', '2022-01-10 13:36:39', 'phpTh8RtZ.docx', 'truongnguyen', 'thuongbui'),
(88, 42, 'Cập nhật điểm rèn luyện cho sinh viên', '2022-01-10 13:37:01', 'phpBORUBu.docx', 'truongnguyen', 'ductran'),
(89, 43, 'Em đi khảo sát phòng CTTHSSV rồi cho anh kết quả ', '2022-01-10 13:37:16', 'phpMAzUie.docx', 'nguyenquangtien', 'nguyenkhanhngan'),
(90, 44, 'Cập nhật thời khóa biểu cho sinh viên', '2022-01-10 13:37:38', 'phpAEzblP.docx', 'truongnguyen', 'longhung'),
(91, 45, 'Cập nhật lịch thi cho sinh viên', '2022-01-10 13:38:01', 'phpAxoD6z.docx', 'truongnguyen', 'ananvu'),
(92, 46, 'Em đi đến sân bay Tân Sơn Nhất nhập lô hàng như trong tệp tin anh gửi rồi về báo cáo cho anh', '2022-01-10 13:38:59', 'phpZNx6CZ.pdf', 'nguyenquangtien', 'halinhchi'),
(93, 47, 'Thông báo lịch đăng ký KHHT HK II 2021-2022', '2022-01-10 13:39:59', 'phpq25gox.docx', 'truongnguyen', 'tranhung'),
(94, 48, 'Em đưa lô hàng có mã số như trong tài liệu ra Hà Nội để tiến hành giao dịch rồi báo cáo lại cho anh.', '2022-01-10 13:40:08', 'phpckDf4d.sql', 'nguyenquangtien', 'dinhphucan'),
(95, 49, 'Thông báo thời gian đóng học phí HK II 2021-2022', '2022-01-10 13:40:46', 'phpZy9fUS.docx', 'truongnguyen', 'minhvu'),
(96, 50, 'Thông báo thời gian đi học trực tiếp', '2022-01-10 13:42:15', 'phpRO06HO.docx', 'vunguyen', 'hungtran'),
(97, 51, 'Thông báo sinh viên tham gia workshop', '2022-01-10 13:43:12', 'phpnZA431.docx', 'vunguyen', 'mocamanh'),
(98, 52, 'Thông báo giảm 5% học phí do Dịch', '2022-01-10 13:44:18', 'phpKEjP32.docx', 'vunguyen', 'leanhnhien'),
(99, 53, 'Thông báo tăng 10% học phí', '2022-01-10 13:44:45', 'php59kkIB.docx', 'vunguyen', 'chithienbinh'),
(100, 54, 'Tổ chức buổi sinh hoạt khoa', '2022-01-10 13:45:17', 'phpx34cXw.docx', 'vunguyen', 'daohienchau'),
(101, 30, 'Em làm được demo như này', '2022-01-10 13:52:08', 'phpc6DPFX.pdf', NULL, NULL),
(102, 25, 'Đã làm xong rồi sếp', '2022-01-10 13:52:29', 'php2LjB4M.docx', NULL, NULL),
(103, 26, 'Em đã làm xong rồi ạ.', '2022-01-10 13:54:07', 'phpFK54Vf.docx', NULL, NULL),
(104, 32, 'Em đã làm xong, anh xét lại giúp em', '2022-01-10 13:54:22', 'php07BZzW.docx', NULL, NULL),
(105, 27, 'Em đã hoàn thành rồi sếp', '2022-01-10 13:55:06', 'phpUmoUOS.docx', NULL, NULL),
(106, 28, 'Đã làm xong rồi sếp', '2022-01-10 13:56:26', 'phpIlf7qu.docx', NULL, NULL),
(107, 29, 'Xong rồi thưa sếp', '2022-01-10 13:57:34', 'phpm4PIv2.docx', NULL, NULL),
(108, 31, 'Em vừa hoàn thành rồi ạ', '2022-01-10 13:58:54', 'phpgylEFe.docx', NULL, NULL),
(109, 34, 'Đã thống kê xong', '2022-01-10 14:01:59', 'phpWg0rB9.docx', NULL, NULL),
(110, 36, 'Đã thống kê hoàn tất', '2022-01-10 14:04:00', 'phpcyCuwO.docx', NULL, NULL),
(111, 38, 'Thống kê hoàn tất', '2022-01-10 14:06:36', 'phpoOHPLv.docx', NULL, NULL),
(112, 29, 'Chưa ổn, vẫn còn lỗi', '2022-01-10 14:14:41', 'php5oImar.docx', NULL, NULL),
(113, 28, 'Chưa được mượt, cải thiện lại tí nhé', '2022-01-10 14:16:07', 'phpvHdXy6.docx', NULL, NULL),
(114, 25, 'Giao diện chưa đẹp lắm', '2022-01-10 14:22:16', 'phpp2U87N.docx', NULL, NULL),
(115, 25, 'Giao diện chưa đẹp lắm', '2022-01-10 14:22:37', 'php9fZJ2q.docx', NULL, NULL),
(116, 30, 'Em làm khá ổn, cứ thế phát huy, anh sẽ gia hạn deadline cho em  ', '2022-01-10 14:38:51', 'php9DkOSq.pdf', NULL, NULL),
(117, 30, 'Em vừa hoàn thành xong, anh xem lại đã được chưa ạ?', '2022-01-10 14:40:07', 'phpKf0kGJ.pdf', NULL, NULL),
(118, 30, 'Trên cơ sở là ổn rồi nhưng mà anh thấy hình như em thiếu kết luận, em xem lại rồi bổ sung cho anh nha', '2022-01-10 14:41:32', 'phpbmdaSm.pdf', NULL, NULL),
(119, 30, 'Em bổ sung xong rồi ạ, anh xem lại đi ạ', '2022-01-10 14:42:20', 'phpjnkFlJ.pdf', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vacation`
--

CREATE TABLE `vacation` (
  `vacation_id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `start_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `number_day_off` int(11) DEFAULT NULL,
  `reason` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `feedback` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `seen` int(11) NOT NULL DEFAULT '1',
  `start_date_real` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8_vietnamese_ci;

--
-- Dumping data for table `vacation`
--

INSERT INTO `vacation` (`vacation_id`, `username`, `start_date`, `number_day_off`, `reason`, `file`, `feedback`, `status`, `seen`, `start_date_real`) VALUES
(12, 'vunguyen', '2022-01-10 12:32:04', 5, 'Xin nghỉ để cưới vợ', '61dbc4d48fa3b9.12673755.pdf', 'OK', 2, 0, '2022-01-22'),
(13, 'nguyenduyhoai', '2022-01-10 12:40:33', 6, 'Xin nghỉ để đi ăn du lịch', '61dbc6d1af1911.95692681.pdf', 'Lý do không chính đáng', 3, 0, '2022-02-13'),
(14, 'nguyenducmanh', '2022-01-10 12:41:35', 4, 'Xin phép nghỉ để đi khám bệnh.', '61dbc70fb7bd90.36150125.pdf', NULL, 0, 1, '2022-03-03'),
(15, 'truongnguyen', '2022-01-10 12:42:30', 6, 'Xin phép nghỉ để về quê có việc gấp.', '61dbc746c3d369.65714410.pdf', NULL, 0, 1, '2022-02-06'),
(16, 'nguyenquangtien', '2022-01-10 12:43:49', 7, 'Xin nghỉ để đi chơi xa.', '61dbc795815df3.00934946.pdf', NULL, 0, 1, '2022-02-05'),
(17, 'nguyenthien', '2022-01-10 12:48:06', 5, 'Xin nghỉ phép gấp.', '61dbc8969e1653.61269711.pdf', NULL, 0, 1, '2022-02-06'),
(18, 'manhmai', '2022-01-10 12:49:05', 7, 'Xin nghỉ để đi cưới chồng', '61dbc8d1ba8f58.66203467.pdf', 'OK', 2, 0, '2022-03-05'),
(19, 'vanmanh', '2022-01-10 12:49:28', 11, 'Về quê chăm mẹ', '61dbc8e8bf3cb6.18950796.png', NULL, 0, 0, '2022-01-09'),
(20, 'bachmai', '2022-01-10 12:49:53', 6, 'Lý do gấp không tiện nói', '61dbc9018143a9.91045643.docx', 'OK', 2, 0, '2022-03-12');

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
  ADD UNIQUE KEY `code` (`code`),
  ADD UNIQUE KEY `phone` (`phone`);

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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `offices`
--
ALTER TABLE `offices`
  MODIFY `office_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `Profiles`
--
ALTER TABLE `Profiles`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `task_feedback`
--
ALTER TABLE `task_feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `vacation`
--
ALTER TABLE `vacation`
  MODIFY `vacation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
