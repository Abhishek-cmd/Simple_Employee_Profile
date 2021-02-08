-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2021 at 03:57 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employee_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee_details`
--

CREATE TABLE `employee_details` (
  `id` int(11) NOT NULL,
  `emp_name` varchar(255) NOT NULL,
  `dept_name` varchar(255) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_details`
--

INSERT INTO `employee_details` (`id`, `emp_name`, `dept_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Abhi Dalvi', 'Chemistry Dept', '1', '2021-01-31 12:05:04', NULL),
(2, 'Abhi Dalvi', 'IT Dept', '0', '2021-01-31 11:58:51', '2021-01-31 12:07:33'),
(3, 'Ramakant', 'Physics Dept', '1', '2021-02-01 01:02:57', '2021-02-01 01:03:12');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uploaded_on` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=Active, 0=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `file_name`, `uploaded_on`, `status`) VALUES
(1, 'download.jpg', '2021-02-02 13:00:28', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `image` text NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `mobile`, `password`, `image`, `status`, `created_on`, `updated_on`) VALUES
(1, 'Abhishek', 'abhi@gmail.com', '8149167341', '70af3e51f54d608ade91daae70b1e3a2', 'abhi_RRB2.png', '1', '0000-00-00 00:00:00', '2021-02-08 15:45:56'),
(2, 'Omkar', 'omkar@gmail.com', '8149167341', '81dc9bdb52d04dc20036dbd8313ed055', 'abhi_RRB1.png', '1', '0000-00-00 00:00:00', '2021-02-08 14:30:44'),
(3, 'sahil', 'sahil@gmail.com', '9260549793', '1006f0ae5a7ece19828a67ac62288e05', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Rupesh', 'rupesh@gmail.com', '9260549793', '59d35c0fea312771a132d8d5ac630b54', 'abhi_RRB3.png', '1', '2021-02-08 15:46:55', '0000-00-00 00:00:00'),
(5, 'ramakant', 'ramesh@gmail.com', '9260549793', '098f6bcd4621d373cade4e832627b4f6', 'abhi_RRB.jpg', '1', '2021-02-08 15:51:54', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee_details`
--
ALTER TABLE `employee_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee_details`
--
ALTER TABLE `employee_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
