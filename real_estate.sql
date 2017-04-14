-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 14 Avril 2017 à 16:12
-- Version du serveur :  10.1.16-MariaDB
-- Version de PHP :  7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `real_estate`
--

-- --------------------------------------------------------

--
-- Structure de la table `estate`
--

CREATE TABLE `estate` (
  `id_estate` int(10) UNSIGNED NOT NULL,
  `poster_id` int(10) NOT NULL,
  `city_id` int(10) NOT NULL,
  `district_id` int(10) NOT NULL,
  `area_id` int(10) NOT NULL,
  `direction_id` int(10) NOT NULL,
  `news_cate_id` int(2) NOT NULL,
  `real_estate_type` int(11) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `title` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `acreage` float(10,0) NOT NULL,
  `price` float(10,0) NOT NULL,
  `location` varchar(255) NOT NULL,
  `garage` int(10) DEFAULT NULL,
  `kitchen` int(10) DEFAULT NULL,
  `bedroom` int(10) DEFAULT NULL,
  `livingroom` int(10) DEFAULT NULL,
  `bargain` int(2) NOT NULL,
  `view` int(11) NOT NULL,
  `description` text NOT NULL,
  `posting_date` datetime NOT NULL,
  `expiration_time` datetime NOT NULL,
  `modify_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `estate`
--

INSERT INTO `estate` (`id_estate`, `poster_id`, `city_id`, `district_id`, `area_id`, `direction_id`, `news_cate_id`, `real_estate_type`, `slug`, `status`, `title`, `image`, `acreage`, `price`, `location`, `garage`, `kitchen`, `bedroom`, `livingroom`, `bargain`, `view`, `description`, `posting_date`, `expiration_time`, `modify_date`) VALUES
(54, 4, 12, 30, 54, 6, 1, 16, 'DÀU-TU-SINH-LÒI---TÀI-SẢN-TRỌN-DÒI---COCOBAY', 2, 'ĐẦU TƯ SINH LỜI - TÀI SẢN TRỌN ĐỜI - COCOBAY', '2f0f28c8-c76f-4d96-b051-e02506181526.jpg', 5345, 1000000, 'Coco Bay Đà Nẵng', 2, 6, 8, 7, 2, 13, '<p>Chỉ thanh toán 1 lần duy nhất từ 790 triệu,sở hữu ngay Wellness Condotel Coco Ocean-Spa Resort 4 sao với mức hỗ trợ vay vốn lên tới 60% trong vòng 15 năm từ ngân hàng SHB Cam kết hoàn vốn trong 8 năm với lợi nhuận tối thiểu 12%/năm, chia sẻ 80% lợi nhuận với chủ sở hữu từ năm thứ 9 Lãi suất ưu đãi 0% đến khi bàn giao Cam kết Sổ đỏ vĩnh viễn 15 đêm nghỉ miễn phí hàng năm tại Cocobay Đà Nẵng Bốc thăm trúng thưởng nhiều quà tặng giá trị:1 Oto Honda City, 1 SH Vietnam , 2 Vespa , 3 Honda Lead và 7 Chiếc iPhones 7. HOT HOT HOT ! Từ nay đến 01/04/2017 khi khách hàng đặt mua 01 căn hộ Condotel sẽ được tặng chuyến đi du lịch Thái Lan 3 ngày 2 đêm Phụ trách bán hàng: 090 562 1984 (Mrs. Phương) Phụ trách bán hàng: 090 562 1984 (Mrs. Phương)</p>', '2017-03-21 16:33:46', '2017-03-21 00:00:00', '2017-04-01 02:40:43'),
(55, 4, 12, 24, 22, 7, 2, 16, 'BAN-GAP-2-DAY-NHA-TRO-TAI-Ha-Noi-18-PHONG-THU-NHAP-19TR-THANG', 2, 'BÁN GẤP 2 DÃY NHÀ TRỌ TẠI Hà Nội 18 PHÒNG, THU NHẬP 19TR/THÁNG', '2.jpg', 534534, 534534, 'KDT BAC Hồ Tùng Mậu - Từ Liêm -Hà Nội', 6, 3, 5, 6, 1, 20, '4234324234323442342342432', '2017-03-22 15:56:57', '2017-04-01 00:00:00', '0000-00-00 00:00:00'),
(56, 4, 12, 24, 22, 7, 1, 16, 'BAN-DAY-NHA-TRO', 2, 'BÁN GẤP 2 DÃY NHÀ TRỌ TẠI Hà Nội 18 PHÒNG, THU NHẬP 19TR/THÁNG', '11.jpg', 534534, 554534, 'KDT BAC Hồ Tùng Mậu - Từ Liêm -Hà Nội', 6, 3, 5, 6, 1, 20, '+Diện tích 200m2 ngang 10m dài 20m +2 dãy = 10 phòng +Diễn tích mỗi phòng trọ 4x3=12m2 và có gác đúc +Nhà trọ đã có sổ hồng, bao sang tên nhanh gọn +Nhà trọ cho thuê 3 năm rồi, công nhân trọ kín, an ninh ở đây tốt, dễ quản lý +Mỗi phòng trọ cho thuê 1Triệu/tháng. 10 phòng 10 triệu tháng = Tổng thu nhập 1 tháng 10 triệu đồng/ tháng. +Cách khu nhà trọ 3km có lô đất diện tích 100m2 nằm ngay mặt tiền đường, gần khu công nghiệp tân phú trung nơi công nhân ra vào cổng rất đông, Phù hợp kinh doanh quán nhậu, hay xây nhà trọ,đầu tư với giá 3,4 triệu/m2, đường nhựa 12m\r\n\r\n\r\nChuyên viên tư vấn, Mua bán nhà đất tại Hóc Môn. Hỗ Trợ nhiệt tình 24/24h', '2017-03-22 15:56:57', '2017-04-01 00:00:00', '0000-00-00 00:00:00'),
(57, 4, 12, 26, 37, 6, 1, 15, 'BAN-GAP-10-DAY-NHA-TRO-TAI-HA-NOI-18-PHONG-THU-NHAP-19TRTHANG', 2, 'BÁN GẤP 10 DÃY NHÀ TRỌ TẠI HÀ NỌI 18 PHÒNG, THU NHẬP 19TR/THÁNG', '2f0f28c8-c76f-4d96-b051-e025061815261.jpg', 5345, 544534, 'KDT BAC Hồ Tùng Mậu - Từ Liêm -Hà Nội', 3, 6, 3, 1, 2, 7, '423423423432', '2017-03-24 16:50:46', '2017-04-03 00:00:00', '0000-00-00 00:00:00'),
(58, 4, 15, 57, 61, 7, 1, 17, 'BAN-GAP-LIEN-KE-16-AN-HUNG-VI-TRI-CUC-DEP', 2, 'BÁN GẤP LIỀN KỀ 16 AN HƯNG VỊ TRÍ CỰC ĐẸP', 'f5eb1e20-dafe-440c-879c-b22aa911051c_bthumb.jpg', 90, 10000000000, 'BÁN GẤP LIỀN KỀ 16 AN HƯNG VỊ TRÍ CỰC ĐẸP - Hồ Chí Minh', 3, 4, 3, 6, 2, 5, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2017-03-25 15:31:08', '2017-04-04 00:00:00', '0000-00-00 00:00:00'),
(59, 4, 17, 66, 65, 8, 2, 5, 'BAN-GAP-2-DAY-NHA-TRO-TAI-Da-Nang-18-PHONG-THU-NHAP-19TRTHANG', 2, 'BÁN GẤP 2 DÃY NHÀ TRỌ TẠI Đà Nẵng 18 PHÒNG, THU NHẬP 19TR/THÁNG', 'ff1e9955-8593-4b86-a437-5f30ca7f93ce_bthumb1.jpg', 100, 200000000, 'KDT BAC Văn phú - Hà Đông -Hà Nội', 5, 6, 6, 9, 1, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2017-03-28 05:52:40', '2017-04-07 00:00:00', '0000-00-00 00:00:00'),
(60, 4, 15, 62, 63, 5, 2, 11, 'BAN-GAP-2-DAY-NHA-TRO-THU-NHAP-100TRTHANG', 2, 'BÁN GẤP 2 DÃY NHÀ TRỌ THU NHẬP 100TR/THÁNG', 'ff1e9955-8593-4b86-a437-5f30ca7f93ce_bthumb2.jpg', 300, 56000556, 'KDT BAC Văn phú - Hà Đông -Hà Nội', 4, 8, 5, 6, 2, 3, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2017-03-28 06:14:14', '2017-04-07 00:00:00', '0000-00-00 00:00:00'),
(61, 4, 12, 25, 27, 10, 2, 7, 'BAN-GAP-2-DAY-NHA-TRO-TAI-HCM-18-PHONG-THU-NHAP-19TRTHANG', 2, 'BÁN GẤP 2 DÃY NHÀ TRỌ TẠI HCM 18 PHÒNG, THU NHẬP 19TR/THÁNG', 'f5eb1e20-dafe-440c-879c-b22aa911051c_bthumb2.jpg', 42, 8875654, 'KDT BAC Hồ Tùng Mậu - Từ Liêm -Hà Nội', 4, 2, 6, 5, 1, 11, '<p><strong>Lorem ipsum dolor sit amet,</strong></p>\r\n\r\n<p>consectetur adipisicing elit, <em>sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, </em>quis nostrud <s><em>exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</em></s></p>\r\n\r\n<blockquote>\r\n<ul>\r\n <li>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</li>\r\n <li>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</li>\r\n</ul>\r\n</blockquote>', '2017-03-28 16:00:17', '2017-04-07 00:00:00', '0000-00-00 00:00:00'),
(62, 4, 12, 29, 42, 6, 2, 13, 'BAN-GAP-2-DAY-NHA-TRO-TAI-HCM-18-PHONG-THU-NHAP-19TRTHANG', 2, 'BÁN GẤP 2 DÃY NHÀ TRỌ TẠI HCM 18 PHÒNG, THU NHẬP 19TR/THÁNG', 'ff1e9955-8593-4b86-a437-5f30ca7f93ce_bthumb3.jpg', 123, 132312, 'KDT BAC Văn phú - Hà Đông -Hà Nội', 2, 7, 6, 7, 2, 3, '<p><img alt="" src="/ckfinder/userfiles/images/d79ccee7-dfc6-40d3-bd33-000a2276563c_bthumb.jpg"></p>', '2017-03-28 17:28:14', '2017-04-07 00:00:00', '0000-00-00 00:00:00'),
(63, 5, 15, 59, 60, 10, 2, 15, 'TOI-CAN-BAN-CAN-HO-CT4-DT130M-THIET-KE-3-PHONG-NGU', 2, 'TÔI CẦN BÁN CĂN HỘ CT4 DT130M THIẾT KẾ 3 PHÒNG NGỦ', 'd79ccee7-dfc6-40d3-bd33-000a2276563c_bthumb.jpg', 900, 656845632, 'Khu đô thị Dương Nội', 6, 6, 1, 8, 2, 5, '<p><img alt="" src="/ckfinder/userfiles/files/ff1e9955-8593-4b86-a437-5f30ca7f93ce_bthumb.jpg"></p>\r\n\r\n<p><img alt="" src="/ckfinder/userfiles/files/f5eb1e20-dafe-440c-879c-b22aa911051c_bthumb.jpg"></p>', '2017-03-29 14:34:21', '2017-03-29 00:00:00', '2017-03-30 15:05:24'),
(64, 5, 12, 30, 54, 7, 2, 17, 'BAN-GAP-2-DAY-NHA-TRO-TAI-HCM-18-PHONG-THU-NHAP-19TRTHANG', 1, 'BÁN GẤP 2 DÃY NHÀ TRỌ TẠI HCM 18 PHÒNG, THU NHẬP 19TR/THÁNG', '115c5347-e44b-4d4f-9f53-b49767fe8ef2_bthumb4.jpg', 80, 3455432, 'KDT BAC Văn phú - Hà Đông -Hà Nội', 3, 2, 5, 5, 1, 0, '<p><img alt="" src="/ckfinder/userfiles/files/d79ccee7-dfc6-40d3-bd33-000a2276563c_bthumb.jpg"></p>\r\n\r\n<p> </p>\r\n\r\n<p><img alt="" src="/ckfinder/userfiles/files/ff1e9955-8593-4b86-a437-5f30ca7f93ce_bthumb.jpg"></p>', '2017-04-01 01:54:03', '2017-04-11 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `real_estate_id` int(11) NOT NULL COMMENT 'FOREIGN KEY (estateId) REFERENCES estate(id)',
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `gallery`
--

INSERT INTO `gallery` (`id`, `real_estate_id`, `name`) VALUES
(35, 52, '956d6da3-f536-4569-83d2-f72f68d217ed_bthumb.jpg'),
(36, 52, 'd9937d07-c8a1-4008-b1fa-16fa14368f41_bthumb.jpg'),
(37, 53, '7a101d08-6d2f-41c0-94c2-513a82007ecd_bthumb.jpg'),
(38, 53, '115c5347-e44b-4d4f-9f53-b49767fe8ef2_bthumb.jpg'),
(39, 54, 'd79ccee7-dfc6-40d3-bd33-000a2276563c_bthumb5.jpg'),
(40, 54, 'd9937d07-c8a1-4008-b1fa-16fa14368f41_bthumb1.jpg'),
(41, 55, 'd9937d07-c8a1-4008-b1fa-16fa14368f41_bthumb2.jpg'),
(42, 55, 'ff1e9955-8593-4b86-a437-5f30ca7f93ce_bthumb1.jpg'),
(43, 56, 'd9937d07-c8a1-4008-b1fa-16fa14368f41_bthumb2.jpg'),
(44, 56, 'ff1e9955-8593-4b86-a437-5f30ca7f93ce_bthumb1.jpg'),
(45, 57, '7a101d08-6d2f-41c0-94c2-513a82007ecd_bthumb9.jpg'),
(46, 57, '7a101d08-6d2f-41c0-94c2-513a82007ecd_bthumb9.jpg'),
(47, 58, 'ff1e9955-8593-4b86-a437-5f30ca7f93ce_bthumb8.jpg'),
(48, 58, 'ff1e9955-8593-4b86-a437-5f30ca7f93ce_bthumb8.jpg'),
(49, 59, 'a0d25fd8-385f-4f10-b45e-55034996c971_bthumb1.jpg'),
(50, 59, 'f4171a45-413a-4575-aac6-75fa59e959c1_bthumb.jpg'),
(51, 60, 'd9937d07-c8a1-4008-b1fa-16fa14368f41_bthumb1.jpg'),
(52, 60, 'a0d25fd8-385f-4f10-b45e-55034996c971_bthumb2.jpg'),
(53, 61, 'd9937d07-c8a1-4008-b1fa-16fa14368f41_bthumb2.jpg'),
(54, 61, '2f0f28c8-c76f-4d96-b051-e025061815262.jpg'),
(55, 62, '7a101d08-6d2f-41c0-94c2-513a82007ecd_bthumb1.jpg'),
(56, 62, 'no_iamge.jpg'),
(57, 63, 'de6a21f7-53ec-42e6-89f3-4ddcb5ea1a14_bthumb6.jpg'),
(58, 63, '2f0f28c8-c76f-4d96-b051-e025061815268.jpg'),
(59, 64, 'f4171a45-413a-4575-aac6-75fa59e959c1_bthumb1.jpg'),
(60, 64, 'ff1e9955-8593-4b86-a437-5f30ca7f93ce_bthumb9.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `member`
--

CREATE TABLE `member` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `authen_key` varchar(255) NOT NULL,
  `is_active` int(1) NOT NULL,
  `nick_fb` varchar(255) DEFAULT NULL,
  `nick_skype` varchar(255) DEFAULT NULL,
  `member_type` int(2) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `member`
--

INSERT INTO `member` (`id`, `username`, `email`, `phone`, `password`, `full_name`, `avatar`, `address`, `authen_key`, `is_active`, `nick_fb`, `nick_skype`, `member_type`, `create_date`, `update_date`) VALUES
(4, 'member1', 'vanlong121996@gmail.com', '0969651118', 'c51cd8e64b0aeb778364765013df9ebe', 'member1', '3-114.jpg', '2124234', 'U4hdG71uKjY3rZGCJaJSYlBKD6h3cyExdoM7DKBognc', 1, '4234', '4234', 0, '2017-03-13 11:00:20', '0000-00-00 00:00:00'),
(5, 'user1234', 'longcaovien5@gmail.com', '0969651118', 'c51cd8e64b0aeb778364765013df9ebe', 'Long', '956d6da3-f536-4569-83d2-f72f68d217ed_bthumb1.jpg', 'Hà Nội', 'm0SMHsqm3xy8UrGcwM-mywufXXWicGBksFyIYs4CSVs', 1, 'longvan.facebook.com', 'longvan', 0, '2017-03-29 14:19:39', '0000-00-00 00:00:00'),
(6, 'user2346', 'longvan1296@gmail.com', '0969651118', 'c51cd8e64b0aeb778364765013df9ebe', 'User2', 'd9937d07-c8a1-4008-b1fa-16fa14368f41_bthumb.jpg', 'Hà Nội', 'CCyim3L6x0fpoipnhYvwUGajYJrC4bX7wCFc5eqFvRA', 0, 'longvan.facebook.com', '4234', 0, '2017-04-01 01:23:17', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `member_feedback`
--

CREATE TABLE `member_feedback` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `note` text,
  `created_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `member_feedback`
--

INSERT INTO `member_feedback` (`id`, `member_id`, `name`, `email`, `title`, `content`, `note`, `created_date`) VALUES
(3, 0, 'test report', 'report@gmail.com', 'Agent ID : 111, name: Kate McCaffrey', 'test', '', '2015-12-12 08:56:09'),
(7, 0, 'ngon', 'email@gmail.com', 'Agent ID : 128, name: Phạm Đan Trường', 'Fgbhh', NULL, '2016-01-09 07:57:08'),
(9, 0, 'aka', 'akalololala@gmail.com', 'Agent ID : 141, name: John Pham', 'This person has bomb', NULL, '2016-01-13 02:33:32'),
(10, 0, 'name', 'email', 'Agent ID : 162, name: Full Name edit', 'check', NULL, '2016-03-23 08:43:26'),
(14, 0, 'tramg test', 'abc', 'Agent ID : 83, name: Akshay Surpuriya', 'abc', NULL, '2016-07-23 02:37:28'),
(15, 0, 'gabriel', 'gabriel.salameh@gmail.com', 'Agent ID : 187, name: gabriel salameh', 'cursing', NULL, '2016-09-13 23:26:39'),
(16, 0, 'james', 'gabriel.salameh@gmail.com', 'hi', 'bye', NULL, '2016-09-14 23:20:04'),
(17, 0, 'karthik', 'karthikcplus@gmail.com', 'testing', 'testing', NULL, '2016-10-04 16:02:22'),
(18, 0, 'Harry', 'hicom.harry@gmail.com', 'Rate app', 'good', NULL, '2016-12-07 07:15:59'),
(19, 0, 'James', 'hicom.james@gmail.com', 'rate app', 'good', NULL, '2016-12-09 16:40:48'),
(20, 0, 'ha', 'habn@gmail.com', '"Agent ID : "210, Name: Hicom James', 'hahaha', NULL, '2017-02-13 04:21:18');

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `news_type_id` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `status` int(2) NOT NULL,
  `author` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `posting_date` datetime NOT NULL,
  `modify_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `news`
--

INSERT INTO `news` (`id`, `news_type_id`, `title`, `image`, `description`, `status`, `author`, `url`, `posting_date`, `modify_date`) VALUES
(1, 0, 'It''s great time to invest in Hoa Lac Hi-tech Park .', '1412997899Hoa-Lac-Hightech-Park-Center.jpg', 'Experiences from many countries throughout the world showed that development of hi-tech park is an important measure to further promote the process of national economic development, namely Sillicon Valley hi-tech park, Hsinchu Science park, Kulim Hi-tech ', 0, NULL, 'http://vnre.reic.vn/2012/09/its-great-time-to-invest-in-hoa-lac-hi.html', '2015-07-06 16:24:16', NULL),
(2, 0, 'Tennyson Point house tops national house sales', '14489604632.jpg', 'A TENNYSON Point property has taken pole position in the top 10 residential real estate sales nationally over the past week.\nThe six-bedroom deep-waterfront home at 141a Tennyson Rd sold at auction on Saturday for $5.905 million, eclipsing $4 million sal', 0, NULL, 'http://www.news.com.au/finance/real-estate/selling/tennyson-point-house-tops-national-house-sales/news-story/41d72acda51fd6bc2a616a557a81d387', '2015-12-01 09:01:03', NULL),
(3, 0, 'Home values have started to fall as the period of extraordinary price growth in southern states cools', '144896026743.jpg', 'HOME values have started to fall in Sydney and Melbourne as the period of extraordinary price growth in the southern states begins to cool.\nThe two powerhouse markets weren’t the only ones to experience a drop in property values with the latest CoreLog', 0, NULL, 'http://www.news.com.au/finance/real-estate/home-values-have-started-to-fall-as-the-period-of-extraordinary-price-growth-in-southern-states-cools/news-story/972ee7a60d9b6f9be35704574ef2bf71', '2015-12-01 08:57:47', NULL),
(4, 0, 'House prices fall across country, industry report shows', '14489603328.jpg', 'Heading into summer last year, many Australian capital cities were blindly surfing a wave of rising house prices and the end didn’t seem anywhere in sight.\nNow the two culprits behind Australia’s booming price growth, Sydney and Melbourne, have passe', 0, NULL, 'http://www.news.com.au/finance/real-estate/buying/house-prices-fall-across-country-industry-report-shows/news-story/98891113f0a276bca11e79325f8c6469', '2015-12-01 08:58:52', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `news_category`
--

CREATE TABLE `news_category` (
  `id_cate` int(11) NOT NULL,
  `name_category` varchar(255) DEFAULT NULL,
  `status_cate` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `news_category`
--

INSERT INTO `news_category` (`id_cate`, `name_category`, `status_cate`) VALUES
(4, 'Biệt thự, Đất biệt thự', 1),
(5, 'Căn hộ chung cư', 1),
(6, 'Nhà Liền kề, Đất dự án', 1),
(7, 'ShopHouse', 1),
(8, 'Condotel', 1),
(9, 'Đất dịch vụ, đền bù', 1),
(10, 'Đất thổ cư, đất nền', 1),
(11, 'Đất trang trại', 1),
(12, 'Mặt bằng, Nhà Xưởng', 1),
(13, 'Nhà cấp 4, Tập thể', 1),
(14, 'Nhà mặt phố', 1),
(15, 'Nhà trong ngõ dưới 3m', 1),
(16, 'Nhà trong ngõ trên 3m', 1),
(17, 'Phòng trọ, nhà trọ', 1),
(18, 'Cửa hàng, Kiot', 1),
(19, 'Văn phòng', 1),
(20, 'Khách sạn, Nhà hàng', 1);

-- --------------------------------------------------------

--
-- Structure de la table `object_area`
--

CREATE TABLE `object_area` (
  `id` int(11) NOT NULL,
  `name_area` varchar(255) DEFAULT NULL,
  `id_district` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `object_area`
--

INSERT INTO `object_area` (`id`, `name_area`, `id_district`) VALUES
(19, 'Đào Duy Tùng', 24),
(20, 'Đường Bắc Thăng Long', 24),
(21, 'Đường Cao Lỗ', 24),
(22, 'Đường Cổ Loa', 24),
(23, 'Ga Đông Anh', 24),
(24, 'Chung cư Đặng Xá', 25),
(25, 'Dự án 31Ha Trâu Quỳ', 25),
(26, 'Đặng Kiêu Kỵ', 25),
(27, 'Đặng Phúc Thông', 25),
(28, 'Đặng Xá', 25),
(29, 'Đặng Ỷ Lan', 25),
(30, 'Đường Đa Tốn', 25),
(31, 'Đường Đình Xuyên', 25),
(32, 'Đường Kiên Thành', 25),
(33, 'Đường Ninh Hiệp', 25),
(34, 'Đường Thiên Đức', 25),
(35, 'Đường Yên Thường', 25),
(36, 'Hà Huy Tập', 25),
(37, 'Đường Bắc Thăng Long Nội Bài', 26),
(38, 'Quốc Lộ 23i', 26),
(39, 'Tỉnh Lộ 301', 26),
(40, 'Căn hộ SunShine Minh Khai', 29),
(41, 'Căn hộ Udic Riverside', 29),
(42, 'Chung cư Vân Hồ 3', 29),
(43, 'Khu 310 Minh Khai', 29),
(44, 'Times City Park Hill', 29),
(45, 'Chung cư Times City', 29),
(46, 'Biệt Thự Imperia Garden', 39),
(47, 'Căn hộ Artemis Số 3 Lê Trọng Tấn', 39),
(48, 'Căn hộ Imperia Garden', 39),
(49, 'Chung cư Packexim', 38),
(50, 'Chung cư D. Le Roi Soleil Quảng An', 38),
(51, 'Chung cư FLC Twin Towers', 32),
(52, 'Chung cư Yên Hòa Condominium', 32),
(53, 'Chung cư 31 Láng Hạ', 30),
(54, 'Hà Nội Aqua Central', 30),
(55, 'Thị trấn Kim Bài', 49),
(56, 'Xã Cao Viên', 49),
(57, 'Xã Biên Giang', 49),
(58, 'HPC Landmark Tower', 53),
(59, 'Avalon Saigon Apartments', 59),
(60, 'Căn hộ Madision', 59),
(61, 'Căn Hộ Saigon Mê Linh Tower', 57),
(62, 'Căn hộ SaiLing Tower', 63),
(63, 'Căn hộ Times Square Bến Thành', 62),
(64, 'Central Garden', 60),
(65, 'Azura Tower', 66),
(66, 'Căn hộ À La Carte', 68),
(67, 'Căn hộ Alphanam Luxury', 39),
(68, 'Căn hộ Fusion Suites', 70),
(69, 'Căn hộ Nest Home 1', 70);

-- --------------------------------------------------------

--
-- Structure de la table `object_bank`
--

CREATE TABLE `object_bank` (
  `id` int(11) NOT NULL,
  `name_bank` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `object_bank`
--

INSERT INTO `object_bank` (`id`, `name_bank`) VALUES
(11, 'Ngân Hàng VietTinBank 123'),
(12, 'Ngân Hàng VietTinBank 312312'),
(13, 'Ngân Hàng VietTinBank 3434'),
(14, 'Ngân hàng Á châu'),
(15, 'Ngân hàng Hà Nội'),
(17, 'Ngân hàng Sydney'),
(18, 'ABC');

-- --------------------------------------------------------

--
-- Structure de la table `object_city`
--

CREATE TABLE `object_city` (
  `id` int(11) NOT NULL,
  `name_city` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `object_city`
--

INSERT INTO `object_city` (`id`, `name_city`) VALUES
(12, 'Hà Nội'),
(15, 'Hồ Chí Minh'),
(16, 'Quảng Ninh'),
(17, 'Đà Nẵng'),
(19, 'Huế'),
(20, 'Bình Dương'),
(21, 'Hải Phòng'),
(22, 'An Giang'),
(23, 'Bắc Cạn'),
(24, 'Bắc Giang'),
(25, 'Bạc Liêu'),
(26, 'Bắc Ninh'),
(27, 'Bến Tre'),
(28, 'Bình Định'),
(29, 'Bình Thuận'),
(30, 'Bình Phước'),
(31, 'BR - Vũng Tàu'),
(32, 'Cà Mau'),
(33, 'Cần Thơ'),
(34, 'Cao Bằng'),
(35, 'Đắk Lắk'),
(36, 'Đồng Nai'),
(37, 'Đồng Tháp'),
(38, 'Gia Lai'),
(39, 'Hà Giang'),
(40, 'Hà Nam'),
(41, 'Hà Tĩnh'),
(42, 'Hải Dương'),
(43, 'Hòa Bình'),
(44, 'Khánh Hòa'),
(45, 'Hưng Yên'),
(46, 'Kiên Giang'),
(47, 'Kontum'),
(48, 'Lai Châu'),
(49, 'Lâm Đồng'),
(50, 'Lạng Sơn'),
(51, 'Lào Cai'),
(52, 'Long An'),
(53, 'Nam Định'),
(54, 'Nghệ An'),
(55, 'Ninh Bình'),
(56, 'Ninh Thuận'),
(57, 'Phú Thọ'),
(58, 'Phú Yên'),
(59, 'Quảng Bình'),
(60, 'Quảng Nam'),
(61, 'Quảng Ngãi'),
(62, 'Quảng Trị'),
(63, 'Sóc Trăng'),
(64, 'Sơn La'),
(65, 'Tây Ninh'),
(66, 'Thái Bình'),
(67, 'Thái Nguyên'),
(68, 'Thanh Hóa'),
(69, 'Tiền Giang'),
(70, 'Trà Vinh'),
(71, 'Tuyên Quang'),
(72, 'Vĩnh Long'),
(73, 'Vĩnh Phúc'),
(74, 'Yên Bái'),
(75, 'Việt Nam');

-- --------------------------------------------------------

--
-- Structure de la table `object_direction`
--

CREATE TABLE `object_direction` (
  `id` int(11) NOT NULL,
  `name_direction` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `object_direction`
--

INSERT INTO `object_direction` (`id`, `name_direction`) VALUES
(3, 'Tây'),
(4, 'Bắc'),
(5, 'Tây Bắc'),
(6, 'Đông Nam'),
(7, 'Tây Nam'),
(8, 'Đông Bắc'),
(10, 'Nam'),
(11, 'Tây Tây Bắc'),
(12, 'Đông');

-- --------------------------------------------------------

--
-- Structure de la table `object_district`
--

CREATE TABLE `object_district` (
  `id` int(11) NOT NULL,
  `name_district` varchar(255) DEFAULT NULL,
  `id_city` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `object_district`
--

INSERT INTO `object_district` (`id`, `name_district`, `id_city`) VALUES
(23, 'Tất cả', 75),
(24, 'Huyện Đông Anh', 12),
(25, 'Huyện Gia Lâm', 12),
(26, 'Huyện Mê Linh', 12),
(27, 'Huyện Sóc Sơn', 12),
(28, 'Huyện Thanh Trì', 12),
(29, 'Q.Hai Bà Trưng', 12),
(30, 'Quận Ba Đình', 12),
(31, 'Quận Bắc Từ Liêm', 12),
(32, 'Quận Cầu Giấy', 12),
(33, 'Quận Đống Đa', 12),
(34, 'Quận Hoàn Kiếm', 12),
(35, 'Quận Hoàng Mai', 12),
(36, 'Quận Long Biên', 12),
(37, 'Quận Nam Từ Liêm', 12),
(38, 'Quận Tây Hồ', 12),
(39, 'Quận Thanh Xuân', 12),
(40, 'Q.Nam Thăng Long', 12),
(41, 'H.Đan Phượng', 12),
(42, 'Huyện Ba Vì', 12),
(43, 'Huyện Chương Mỹ', 12),
(44, 'Huyện Hoài Đức', 12),
(45, 'Huyện Mỹ Đức', 12),
(46, 'Huyện Phú Xuyên', 12),
(47, 'Huyện Phúc Thọ', 12),
(48, 'Huyện Quốc Oai', 12),
(49, 'Huyện Thanh Oai', 12),
(50, 'Huyện Thạch Thất', 12),
(51, 'Huyện Thường Tín', 12),
(52, 'Huyện Ứng Hòa', 12),
(53, 'Quận Hà Đông', 12),
(54, 'TP. Sơn Tây', 12),
(55, 'Bình chánh', 15),
(56, 'Bình tân', 15),
(57, 'Bình thạnh', 15),
(58, 'Cần giờ', 15),
(59, 'Quận 1', 15),
(60, 'Quận 10', 15),
(61, 'Quận 11', 15),
(62, 'Quận 12', 15),
(63, 'Quận 2', 15),
(64, 'Tân bình', 15),
(65, 'Huyện Đảo Hoàng Sa', 17),
(66, 'Huyện Hòa Vang', 17),
(67, 'Quận Cẩm Lệ', 17),
(68, 'Quận Dương Kinh', 17),
(69, 'Quận Hải Châu', 17),
(70, 'Quận Liên Chiểu', 17),
(71, 'Quận Ngũ Hành Sơn', 17),
(72, 'Quận Sơn Trà', 17),
(73, 'Quận Thanh Khê', 17);

-- --------------------------------------------------------

--
-- Structure de la table `object_project`
--

CREATE TABLE `object_project` (
  `id` int(10) UNSIGNED NOT NULL,
  `member_id` int(10) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `project_type` int(2) NOT NULL,
  `invister` varchar(255) NOT NULL,
  `designer` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `construction` varchar(255) DEFAULT NULL,
  `acreage` int(11) DEFAULT NULL,
  `start_date` date NOT NULL,
  `total_investment` int(10) NOT NULL,
  `floor_number` int(10) DEFAULT NULL,
  `apartments_number` int(10) DEFAULT NULL,
  `Scale` int(10) DEFAULT NULL,
  `complete_date` datetime NOT NULL,
  `status` int(2) NOT NULL,
  `description` text NOT NULL,
  `posting_date` datetime NOT NULL,
  `modify_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(20) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `birthday` date NOT NULL,
  `created_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `username`, `phone`, `email`, `password`, `avatar`, `role`, `status`, `birthday`, `created_date`, `modify_date`) VALUES
(1, 'admin', '0969651118', 'vanlong121996@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '3-1.jpg', -2, 1, '1996-11-06', '2017-03-06 00:00:00', '2017-03-12 13:11:45'),
(2, 'admin123', '0969651118', 'vanlong121996@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '12-cau-noi-101.jpg', 2, 1, '1990-03-18', '2017-03-06 11:08:20', '2017-03-09 14:00:36'),
(3, 'long123', '0969651118', 'abc@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '3-1.jpg', 1, 1, '2017-03-22', '2017-03-06 18:11:23', '0000-00-00 00:00:00'),
(4, 'admin456', '0969651118', 'vanlong121996@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '171859072_ca-nuoc-ngot8.jpg', 2, 1, '1909-03-17', '2017-03-09 08:56:52', '2017-03-09 14:01:53');

-- --------------------------------------------------------

--
-- Structure de la table `web_contact`
--

CREATE TABLE `web_contact` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `sent_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `web_introduce`
--

CREATE TABLE `web_introduce` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `status` int(11) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `posting_date` datetime NOT NULL,
  `modify_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `web_introduce`
--

INSERT INTO `web_introduce` (`id`, `title`, `description`, `status`, `author`, `posting_date`, `modify_date`) VALUES
(9, 'sad', 'ád', 0, 'Long', '2017-03-10 03:03:00', '0000-00-00 00:00:00'),
(10, 'sad', 'ád', 1, 'Long', '0000-00-00 00:00:00', '2017-03-10 03:18:12'),
(11, 'sad', '<br>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\n<br>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\n<br>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, 'Long', '0000-00-00 00:00:00', '2017-03-10 03:18:34'),
(12, '&lt;h2&gt;B&agrave;i giới thiệu 1&lt;h2&gt;', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. \r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. \r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&lt;br&gt;', 1, 'Long', '2017-03-10 03:19:50', '0000-00-00 00:00:00');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `estate`
--
ALTER TABLE `estate`
  ADD PRIMARY KEY (`id_estate`);

--
-- Index pour la table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `member_feedback`
--
ALTER TABLE `member_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `news_category`
--
ALTER TABLE `news_category`
  ADD PRIMARY KEY (`id_cate`);

--
-- Index pour la table `object_area`
--
ALTER TABLE `object_area`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `object_bank`
--
ALTER TABLE `object_bank`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `object_city`
--
ALTER TABLE `object_city`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `object_direction`
--
ALTER TABLE `object_direction`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `object_district`
--
ALTER TABLE `object_district`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `object_project`
--
ALTER TABLE `object_project`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `web_contact`
--
ALTER TABLE `web_contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `web_introduce`
--
ALTER TABLE `web_introduce`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `estate`
--
ALTER TABLE `estate`
  MODIFY `id_estate` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT pour la table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT pour la table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `member_feedback`
--
ALTER TABLE `member_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT pour la table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `news_category`
--
ALTER TABLE `news_category`
  MODIFY `id_cate` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT pour la table `object_area`
--
ALTER TABLE `object_area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT pour la table `object_bank`
--
ALTER TABLE `object_bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT pour la table `object_city`
--
ALTER TABLE `object_city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT pour la table `object_direction`
--
ALTER TABLE `object_direction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `object_district`
--
ALTER TABLE `object_district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT pour la table `object_project`
--
ALTER TABLE `object_project`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `web_introduce`
--
ALTER TABLE `web_introduce`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
