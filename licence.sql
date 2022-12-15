-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2022 at 10:29 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `licence`
--

-- --------------------------------------------------------

--
-- Table structure for table `licence_group`
--

CREATE TABLE `licence_group` (
  `id` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `licence_group`
--

INSERT INTO `licence_group` (`id`, `title`) VALUES
(5, 'FIRE LICENCE CERTIFICATE'),
(8, 'ADVERTISING SIGNAGE LICENCE'),
(9, 'SINGLE BUSINESS PERMIT'),
(10, 'FOOD HANDLERS CERTIFICATE'),
(11, 'FOOD HYGIENE CERTIFICATE'),
(12, 'REAL ESTATE CERTIFICATE OF REGISTRATION');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `login_pwd` varchar(300) DEFAULT NULL,
  `idno` int(11) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `rank` varchar(100) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `first_name`, `last_name`, `email`, `login_pwd`, `idno`, `phone`, `rank`) VALUES
(4, 'Robert', 'Robert', 'admin@gmail.com', '$2y$10$6Ucr7abMniu/A/Wq2EWT0eS9kOoxxA6ISKINflIYLyzvHDM.EPK/C', 37964324, '0799628293', 'admin'),
(9, 'Alaska', 'Jemutai', 'alaskachemutai@gmail.com', '$2y$10$IsaeqMJu.N2dOhY40ngzR.yRl9SHCg6QtE9uYLt6x1hKGJUZvN.MG', 35788711, '0742756643', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `sub_groups`
--

CREATE TABLE `sub_groups` (
  `id` int(11) NOT NULL,
  `gid` int(11) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_groups`
--

INSERT INTO `sub_groups` (`id`, `gid`, `title`, `description`) VALUES
(8, 5, 'One year renewal', '\r\nYou are able to renew your Business Fire License after one year, pay using mobile money of your choice and print your license. In the event of an issue call, 254 742 756 643 or 254 728 529 234\r\n\r\n'),
(12, 8, 'One Year Advertising License', 'You are able to renew your Business Advertising License after one year, pay using mobile money of your choice and print your license. In the event of an issue call, +254 742 756 643 or +254 728 529 234'),
(13, 9, 'One Year Single Business Permit', 'You are able to renew your Single Business Permit License after one year, pay using mobile money Services of your choice and print your license. In the event of an issue call, +254 742 756 643 or +254 728 529 234'),
(14, 10, 'Six Months  Food Handlers Certificate', 'You are able to renew your  Food Handlers Business License after six months, pay using mobile money of your choice and print your license. In the event of an issue call, +254 742 756 643 or +254 728 529 234'),
(19, 11, 'Three Years Renewal Food Hygiene Business License', 'You are able to renew your  Food Hygiene Business License after three years, pay using mobile money of your choice and print your license. In the event of an issue call, +254 742 756 643 or +254 728 529 234'),
(23, 12, 'One Year Real Estate Business Certificate of Registration', 'You are able to renew your Real Estate Business License after one year, pay using mobile money of your choice and print your license. In the event of an issue call, +254 742 756 643 or +254 728 529 234');

-- --------------------------------------------------------

--
-- Table structure for table `user_licence`
--

CREATE TABLE `user_licence` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `gid` int(11) DEFAULT NULL,
  `sid` int(11) DEFAULT NULL,
  `ref_no` varchar(100) NOT NULL,
  `date_added` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_licence`
--

INSERT INTO `user_licence` (`id`, `uid`, `gid`, `sid`, `ref_no`, `date_added`) VALUES
(8, 9, 5, 8, 'RN1-VBJBRHG', '2022-05-05'),
(9, 9, 5, 8, 'RN1-YFXKAUS', '2022-05-05'),
(10, 9, 5, 8, 'RN1-XQSHKXF', '2022-05-05'),
(11, 9, 8, 12, 'RN1-UZOGDAO', '2022-05-05'),
(12, 9, 5, 8, 'RN1-GVFNYOP', '2022-05-05'),
(13, 9, 5, 8, 'RN1-LZXGDJQ', '2022-05-05'),
(14, 9, 12, 23, 'RN1-GSAGZTH', '2022-05-05'),
(15, 9, 12, 23, 'RN1-GVKYVOQ', '2022-05-05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `licence_group`
--
ALTER TABLE `licence_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_groups`
--
ALTER TABLE `sub_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gid` (`gid`);

--
-- Indexes for table `user_licence`
--
ALTER TABLE `user_licence`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`),
  ADD KEY `gid` (`gid`),
  ADD KEY `sid` (`sid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `licence_group`
--
ALTER TABLE `licence_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sub_groups`
--
ALTER TABLE `sub_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user_licence`
--
ALTER TABLE `user_licence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sub_groups`
--
ALTER TABLE `sub_groups`
  ADD CONSTRAINT `sub_groups_ibfk_1` FOREIGN KEY (`gid`) REFERENCES `licence_group` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_licence`
--
ALTER TABLE `user_licence`
  ADD CONSTRAINT `user_licence_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `login` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_licence_ibfk_2` FOREIGN KEY (`gid`) REFERENCES `licence_group` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_licence_ibfk_3` FOREIGN KEY (`sid`) REFERENCES `sub_groups` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
