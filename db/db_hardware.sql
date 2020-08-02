-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 26, 2019 at 04:07 AM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_books`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_brand`
--

CREATE TABLE `tb_brand` (
  `brand_id` varchar(3) NOT NULL,
  `brand_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_brand`
--

INSERT INTO `tb_brand` (`brand_id`, `brand_name`) VALUES
('101', 'Logitech'),
('102', 'OKER');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail`
--

CREATE TABLE `tb_detail` (
  `detail_id` int(11) NOT NULL,
  `history_id` int(11) NOT NULL,
  `hardware_id` int(11) NOT NULL,
  `status_lend` int(11) NOT NULL,
  `fine` int(11) NOT NULL,
  `lent_date_strat` datetime NOT NULL,
  `lend_date_end` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_detail`
--

INSERT INTO `tb_detail` (`detail_id`, `history_id`, `hardware_id`, `status_lend`, `fine`, `lent_date_strat`, `lend_date_end`) VALUES
(20, 13, 4, 1, 0, '2019-03-25 12:05:23', '2019-04-24 00:00:00'),
(21, 21, 2, 1, 0, '2019-03-25 12:49:46', '2019-04-24 00:00:00'),
(22, 22, 2, 1, 0, '2019-03-25 12:53:05', '2019-04-24 00:00:00'),
(23, 23, 2, 1, 0, '2019-03-25 14:32:46', '2019-04-24 00:00:00'),
(24, 24, 2, 1, 0, '2019-03-26 00:07:57', '2019-04-25 00:00:00'),
(25, 25, 2, 1, 0, '2019-03-26 00:25:07', '2019-04-25 00:00:00'),
(26, 26, 2, 1, 0, '2019-03-26 00:25:52', '2019-04-25 00:00:00'),
(27, 27, 2, 1, 0, '2019-03-26 00:32:36', '2019-04-25 00:00:00'),
(28, 28, 1, 0, 0, '2019-03-26 03:35:08', '2019-04-25 00:00:00'),
(29, 28, 2, 0, 0, '2019-03-26 03:35:08', '2019-04-25 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_hardware`
--

CREATE TABLE `tb_hardware` (
  `hardware_id` int(11) NOT NULL,
  `hardware_name` varchar(255) NOT NULL,
  `hardware_detail` varchar(255) NOT NULL,
  `book_user` text NOT NULL,
  `type_id` varchar(3) NOT NULL,
  `brand_id` varchar(3) NOT NULL,
  `book_techer` varchar(255) NOT NULL,
  `book_year` int(11) NOT NULL,
  `book_date` datetime NOT NULL,
  `hardware_status` varchar(20) NOT NULL,
  `book_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_hardware`
--

INSERT INTO `tb_hardware` (`hardware_id`, `hardware_name`, `hardware_detail`, `book_user`, `type_id`, `brand_id`, `book_techer`, `book_year`, `book_date`, `hardware_status`, `book_code`) VALUES
(1, 'LG0001', '', '', 'A01', '101', '', 2560, '2017-10-20 00:00:00', 'ถูกยืม', ''),
(2, 'LG0002', '', '', 'A01', '101', '', 2560, '2017-10-20 00:00:00', 'ถูกยืม', ''),
(4, 'LG0003', '', 'ซาปูเราะห์  สาแม\r\nอัสมีน มะมิง', 'A01', '101', 'อาดัม  ทองดี', 2560, '2017-10-24 00:00:00', 'ปกติ', 'A0001');

-- --------------------------------------------------------

--
-- Table structure for table `tb_history`
--

CREATE TABLE `tb_history` (
  `history_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `history_date` datetime NOT NULL,
  `history_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_history`
--

INSERT INTO `tb_history` (`history_id`, `user_id`, `history_date`, `history_status`) VALUES
(18, 24, '2019-03-25 19:33:59', 0),
(19, 24, '2019-03-25 19:40:22', 0),
(20, 24, '2019-03-25 12:47:50', 0),
(21, 24, '2019-03-25 12:49:45', 0),
(22, 24, '2019-03-25 12:53:05', 0),
(23, 24, '2019-03-25 14:32:46', 0),
(24, 24, '2019-03-26 00:07:57', 0),
(25, 24, '2019-03-26 00:25:07', 0),
(26, 24, '2019-03-26 00:25:52', 0),
(27, 24, '2019-03-26 00:32:36', 0),
(28, 25, '2019-03-26 03:35:08', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_type`
--

CREATE TABLE `tb_type` (
  `type_id` varchar(3) NOT NULL,
  `type_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_type`
--

INSERT INTO `tb_type` (`type_id`, `type_name`) VALUES
('A01', 'Mouse'),
('A02', 'Keyboard'),
('A03', 'Projector');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(11) NOT NULL,
  `student_id` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `student_id`, `password`, `name`, `lastname`, `status`) VALUES
(1, 'admin', 'admin', 'admin', '', 1),
(2, '406059001', '1234', 'มารีแย ', 'จินตารา', 0),
(23, '405459009', '1234', 'ซันซู', 'สะมะแอ', 0),
(24, '60310581', '056761701', 'user', 'user', 0),
(25, '1', '1', '1', '1', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_brand`
--
ALTER TABLE `tb_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `tb_detail`
--
ALTER TABLE `tb_detail`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indexes for table `tb_hardware`
--
ALTER TABLE `tb_hardware`
  ADD PRIMARY KEY (`hardware_id`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Indexes for table `tb_history`
--
ALTER TABLE `tb_history`
  ADD PRIMARY KEY (`history_id`);

--
-- Indexes for table `tb_type`
--
ALTER TABLE `tb_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_detail`
--
ALTER TABLE `tb_detail`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `tb_hardware`
--
ALTER TABLE `tb_hardware`
  MODIFY `hardware_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_history`
--
ALTER TABLE `tb_history`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
