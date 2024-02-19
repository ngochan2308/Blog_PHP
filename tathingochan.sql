-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2023 at 06:58 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tathingochan`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_description` varchar(100) NOT NULL,
  `category_date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`category_id`, `category_name`, `category_description`, `category_date_created`) VALUES
(1, 'Du lịch Việt Nam', 'Quảng cáo về du lịch trong nước', '2023-05-22 17:27:05'),
(2, 'Trang phục truyền thống', 'Những mẫu trang phục truyền thống của Việt Nam', '2023-05-21 22:45:39'),
(3, 'Ẩm thực Việt Nam', 'Giới thiệu về nền ẩm thực đặc sắc của Việt Nam', '2023-05-21 22:16:26');

-- --------------------------------------------------------

--
-- Table structure for table `blog_comment`
--

CREATE TABLE `blog_comment` (
  `n_blog_comment_id` int(11) NOT NULL,
  `n_blog_comment_parent_id` int(11) NOT NULL,
  `n_blog_post_id` int(11) NOT NULL,
  `v_comment_author` varchar(50) NOT NULL,
  `v_comment_author_email` varchar(100) NOT NULL,
  `v_comment` varchar(500) NOT NULL,
  `d_date_created` date NOT NULL,
  `d_time_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_contact`
--

CREATE TABLE `blog_contact` (
  `contact_id` int(11) NOT NULL,
  `contact_name` varchar(50) NOT NULL,
  `contact_email` varchar(100) NOT NULL,
  `contact_phone` varchar(50) NOT NULL,
  `contact_message` text NOT NULL,
  `contact_date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog_contact`
--

INSERT INTO `blog_contact` (`contact_id`, `contact_name`, `contact_email`, `contact_phone`, `contact_message`, `contact_date_created`) VALUES
(29, 'Ta Thi Ngoc Han', '21662007@kthcm.edu.vn', '0934348580', 'Phong cảnh Hà Giang đẹp ', '2023-05-20'),
(30, 'van vu', 'vu@gmail.com', '0365376195', 'ỵyu', '2023-05-21'),
(31, 'han han', 'ngochan20010823@gmail.com', '0934348580', 'gfg', '2023-05-21'),
(32, 'han han', 'ngochan20010823@gmail.com', '0934348580', 'uihuihiu', '2023-05-21'),
(34, 'van vu', 'vu@gmail.com', '0365376195', 'uihiuh', '2023-05-21');

-- --------------------------------------------------------

--
-- Table structure for table `blog_human`
--

CREATE TABLE `blog_human` (
  `human_id` int(10) NOT NULL,
  `human_fullname` varchar(100) NOT NULL,
  `human_phone` varchar(10) NOT NULL,
  `human_email` varchar(100) NOT NULL,
  `human_image` varchar(10) NOT NULL,
  `human_message` varchar(100) NOT NULL,
  `human_date_updated` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog_human`
--

INSERT INTO `blog_human` (`human_id`, `human_fullname`, `human_phone`, `human_email`, `human_image`, `human_message`, `human_date_updated`) VALUES
(1, 'Ta Thi Ngoc Han ', '0934348580', 'ngochan20010823@gmail.com', '', 'Develop a php self website ', '2023-05-22');

-- --------------------------------------------------------

--
-- Table structure for table `blog_post`
--

CREATE TABLE `blog_post` (
  `blog_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `blog_name` varchar(100) NOT NULL,
  `blog_summary` text NOT NULL,
  `blog_content` text NOT NULL,
  `blog_main_image` varchar(100) NOT NULL,
  `blog_alt_image` varchar(100) NOT NULL,
  `blog_place` int(1) NOT NULL COMMENT '0-Inactive|1-Active|2-Deleted',
  `blog_status` int(1) NOT NULL COMMENT '0-Inactive|1-Active|2-Deleted',
  `blog_date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog_post`
--

INSERT INTO `blog_post` (`blog_id`, `category_id`, `blog_name`, `blog_summary`, `blog_content`, `blog_main_image`, `blog_alt_image`, `blog_place`, `blog_status`, `blog_date_created`) VALUES
(50, 1, 'Du lịch Hà Giang', 'Phong cảnh Hà Giang hùng vĩ với cảnh đẹp của cột cờ Lũng Cú và sông Nho Quế', 'Phong cảnh Hà Giang', 'hagiang_04.jpg', 'alt_hagiang_04.jpg', 0, 0, '2023-05-21 22:33:01'),
(51, 1, 'Du lịch An Giang', 'Du lịch An Giang với cảnh đẹp An Giang mùa nước nổi và khu du lịch rừng tràm Trà Sư ', 'Phong cảnh An Giang', 'angiang_01.jpg', 'alt_angiang_01.jpg', 0, 0, '2023-05-23 18:25:00'),
(52, 1, 'Du lịch Đà Lạt', 'Đà Lạt với những cảnh đẹp thơ mộng đặc biệt là hồ Tuyền Lâm và núi Langbiang', 'Phong cảnh Đà Lạt', 'dalat_01.jpg', 'alt_dalat_01.jpg', 0, 1, '2023-05-21 22:32:11'),
(53, 2, 'Trang phục áo dài', 'Áo dài là trang phục truyền thống của Việt Nam mà bất cứ khách du lịch nào ghé đến Việt Nam cũng muốn thử', 'Áo dài Việt Nam', 'thoitrang_01.jpg', 'alt_thoitrang_01.jpg', 0, 1, '2023-05-21 22:47:37'),
(54, 2, 'Trang phục áo bà ba', 'Áo bà ba là trang phục truyền thống của Việt Nam nói chung và miền tây nam bộ nói riêng', 'Áo bà ba Việt Nam', 'thoitrang_02.jpg', 'alt_thoitrang_02.jpeg', 0, 1, '2023-05-21 22:49:07'),
(55, 2, 'Trang phục áo tứ thân', 'Áo tứ thân là trang phục truyền thống của miền Bắc Việt Nam, là niềm tự hào của dân tộc', 'Áo tứ thân Việt Nam', 'thoitrang_03.jpg', 'alt_thoitrang_03.jpg', 0, 1, '2023-05-21 22:52:14'),
(56, 3, 'Ẩm thực đặc sản miền Bắc', 'Trong những món ăn đặc sản miền Bắc không thể nhắc đến bánh chưng Làng Đầm, Hà Nam', 'Bánh chưng đặc sản miền Bắc', 'amthuc_01.jpg', 'alt_amthuc_01.jpg', 0, 1, '2023-05-21 22:58:22'),
(57, 3, 'Ẩm thực đặc sản miền Trung', 'Nhắc đến những món đặc sản miền Trung không thể không nhắc đến món cao lầu ở Hội An và món mì quảng', 'Miền Trung và những món đặc sản', 'amthuc_02.jpg', 'alt_amthuc_02.jpg', 0, 0, '2023-05-21 23:04:02'),
(58, 3, 'Ẩm thực đặc sản miền Nam', 'Những món ăn đặc sản của miền Nam phải kể đến món bánh canh Trảng Bàng ở Tây Ninh và món bánh xèo', 'Những món ăn đặc sản của miền Nam', 'amthuc_03.jpg', 'alt_amthuc_03.jpg', 0, 1, '2023-05-21 23:10:25');

-- --------------------------------------------------------

--
-- Table structure for table `blog_subscriber`
--

CREATE TABLE `blog_subscriber` (
  `sub_id` int(11) NOT NULL,
  `sub_email` varchar(50) NOT NULL,
  `sub_date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog_subscriber`
--

INSERT INTO `blog_subscriber` (`sub_id`, `sub_email`, `sub_date_created`) VALUES
(1, 'han123@gmail.com', '2023-04-27 19:37:51'),
(2, 'ngochan20010823@gmail.comm', '2023-04-27 19:43:09');

-- --------------------------------------------------------

--
-- Table structure for table `blog_tags`
--

CREATE TABLE `blog_tags` (
  `n_tag_id` int(11) NOT NULL,
  `n_blog_post_id` int(11) NOT NULL,
  `v_tag` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_user`
--

CREATE TABLE `blog_user` (
  `user_id` int(11) NOT NULL,
  `user_fullname` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_phone` varchar(10) NOT NULL,
  `user_image` varchar(100) NOT NULL,
  `user_infor` varchar(100) NOT NULL,
  `user_date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog_user`
--

INSERT INTO `blog_user` (`user_id`, `user_fullname`, `user_password`, `user_email`, `user_phone`, `user_image`, `user_infor`, `user_date_created`) VALUES
(5, 'Ta Thi Ngoc Han', '25d55ad283aa400af464c76d713c07ad', 'ngochan20010823@gmail.com', '0934348580', 'blog_main01.jpg', 'Bai kiem tra cuoi ky mon lap trinh web', '2023-05-24 21:58:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `blog_comment`
--
ALTER TABLE `blog_comment`
  ADD PRIMARY KEY (`n_blog_comment_id`);

--
-- Indexes for table `blog_contact`
--
ALTER TABLE `blog_contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `blog_human`
--
ALTER TABLE `blog_human`
  ADD PRIMARY KEY (`human_id`);

--
-- Indexes for table `blog_post`
--
ALTER TABLE `blog_post`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `blog_subscriber`
--
ALTER TABLE `blog_subscriber`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `blog_tags`
--
ALTER TABLE `blog_tags`
  ADD PRIMARY KEY (`n_tag_id`);

--
-- Indexes for table `blog_user`
--
ALTER TABLE `blog_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `blog_comment`
--
ALTER TABLE `blog_comment`
  MODIFY `n_blog_comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_contact`
--
ALTER TABLE `blog_contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `blog_human`
--
ALTER TABLE `blog_human`
  MODIFY `human_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog_post`
--
ALTER TABLE `blog_post`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `blog_subscriber`
--
ALTER TABLE `blog_subscriber`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `blog_tags`
--
ALTER TABLE `blog_tags`
  MODIFY `n_tag_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_user`
--
ALTER TABLE `blog_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
