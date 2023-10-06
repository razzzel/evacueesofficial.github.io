-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2023 at 01:07 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inet_evacuation_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `brgy_info`
--

CREATE TABLE `brgy_info` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brgy_info`
--

INSERT INTO `brgy_info` (`id`, `name`) VALUES
(40, 'sdfas'),
(41, 'asdfs'),
(42, 'sdfas');

-- --------------------------------------------------------

--
-- Table structure for table `calamity_info`
--

CREATE TABLE `calamity_info` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `evacuee_center_info`
--

CREATE TABLE `evacuee_center_info` (
  `id` int(255) NOT NULL,
  `name` varchar(80) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `evacuee_center_info`
--

INSERT INTO `evacuee_center_info` (`id`, `name`, `address`, `contact`) VALUES
(75, 'dfas', 'asdfa', '34232'),
(77, 'dfasasdfas', '24sdaf', '4532');

-- --------------------------------------------------------

--
-- Table structure for table `evacuee_information`
--

CREATE TABLE `evacuee_information` (
  `id` int(255) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `middlename` varchar(30) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `age` int(3) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `address` varchar(30) NOT NULL,
  `brgy_name` varchar(30) NOT NULL,
  `head_of_family` varchar(15) NOT NULL,
  `center_id` varchar(55) NOT NULL,
  `member` int(11) NOT NULL,
  `children` int(11) NOT NULL,
  `senior` int(11) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `evacuee_information`
--

INSERT INTO `evacuee_information` (`id`, `firstname`, `lastname`, `middlename`, `contact`, `age`, `gender`, `address`, `brgy_name`, `head_of_family`, `center_id`, `member`, `children`, `senior`, `created_at`) VALUES
(7, 'sd', 'fas', '3', '1', 23, '12', '3', '312', '123', '1', 0, 0, 0, '2023-06-21'),
(8, '23', '42', '4', '234', 23, '423', '4', '42', '234', '2', 0, 0, 0, '2023-06-21'),
(10, '2343', '234', '2', '42', 324, 'sdf', 'as', 'asdf', 'dfsa', '0', 0, 0, 0, '2023-06-21'),
(18, 'asd', 'as', 'da', '4234', 342, 'sdfas', 'asdf', 'asdfas', 'sdf', '0', 0, 0, 0, '2023-07-16'),
(19, 'asdf', 'asf', 'asdfas', '453', 45345, '234', '12312', '1341', '43523', 'asdfas', 7, 0, 0, '2023-07-16');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `contact` varchar(55) NOT NULL,
  `latitude` varchar(55) NOT NULL,
  `longitude` varchar(55) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_data`
--

CREATE TABLE `tb_data` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `latitude` varchar(55) NOT NULL,
  `longitude` varchar(55) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_data`
--

INSERT INTO `tb_data` (`id`, `name`, `email`, `latitude`, `longitude`, `date`) VALUES
(1, 'asdfas', '4353@asda', '15.727248721161207', '120.93150235708454', '2023-08-20 00:00:00'),
(2, 'gfsdfg', 'asdA@asda', '15.727248721161207', '120.93150235708454', '2023-08-20 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `userloc`
--

CREATE TABLE `userloc` (
  `latitude` varchar(55) NOT NULL,
  `longitude` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(255) NOT NULL,
  `userEmail` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT current_timestamp(),
  `logout` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `userEmail`, `loginTime`, `logout`, `status`) VALUES
(47, 'admin', '2023-08-19 13:28:13', NULL, 1),
(48, 'admin', '2023-08-19 13:29:06', NULL, 1),
(49, 'admin', '2023-08-19 13:30:00', '19-08-2023 09:30:07 PM', 1),
(50, 'admin', '2023-08-19 13:30:11', '19-08-2023 09:30:35 PM', 1),
(51, 'admin', '2023-08-19 13:30:38', '19-08-2023 09:31:35 PM', 1),
(52, 'russel', '2023-08-19 13:31:39', '19-08-2023 09:43:47 PM', 1),
(53, 'russel', '2023-08-19 13:44:25', NULL, 1),
(54, 'russel', '2023-08-24 00:11:44', NULL, 1),
(55, 'russel', '2023-08-25 14:39:35', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `code` varchar(5) NOT NULL,
  `username` varchar(30) NOT NULL,
  `contactno` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `email_verified` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(50) NOT NULL DEFAULT '',
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `code`, `username`, `contactno`, `email`, `email_verified`, `password`, `user_type`, `date`) VALUES
(68, '', 'russel', 978567544, 'wawaraziml@gmail.com', NULL, '$2y$10$ruFN7pjYAvF2KsIAzt5uoezSkYqxyyyC5Zs9r/pgrP28FfxFh1pbm', 'User', '2023-05-04'),
(69, '', 'admin', 978567544, 'zedtamio50@gmail.com', NULL, '255d488c63698468d6f8aa79d27ce0e4', '', '2023-05-04');

-- --------------------------------------------------------

--
-- Table structure for table `verify`
--

CREATE TABLE `verify` (
  `id` int(255) NOT NULL,
  `code` int(6) NOT NULL,
  `email` varchar(100) NOT NULL,
  `expiration_time` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brgy_info`
--
ALTER TABLE `brgy_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calamity_info`
--
ALTER TABLE `calamity_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evacuee_center_info`
--
ALTER TABLE `evacuee_center_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evacuee_information`
--
ALTER TABLE `evacuee_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_data`
--
ALTER TABLE `tb_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `username` (`username`),
  ADD KEY `date` (`date`),
  ADD KEY `code` (`code`);

--
-- Indexes for table `verify`
--
ALTER TABLE `verify`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brgy_info`
--
ALTER TABLE `brgy_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `calamity_info`
--
ALTER TABLE `calamity_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `evacuee_center_info`
--
ALTER TABLE `evacuee_center_info`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `evacuee_information`
--
ALTER TABLE `evacuee_information`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_data`
--
ALTER TABLE `tb_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `verify`
--
ALTER TABLE `verify`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
