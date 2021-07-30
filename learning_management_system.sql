-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2021 at 09:07 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `learning_management_system`
--
CREATE DATABASE IF NOT EXISTS `learning_management_system` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `learning_management_system`;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

DROP TABLE IF EXISTS `carts`;
CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `gross_price` float(10,2) NOT NULL,
  `discount` int(11) NOT NULL,
  `net_price` float(10,2) NOT NULL,
  `create_date` datetime NOT NULL,
  `invoice_no` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart_courses`
--

DROP TABLE IF EXISTS `cart_courses`;
CREATE TABLE `cart_courses` (
  `id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `gross_price` float(10,2) NOT NULL,
  `discount` int(11) NOT NULL DEFAULT 0,
  `net_price` float(10,2) NOT NULL,
  `create_date` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(11,2) NOT NULL DEFAULT 0.00,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `objective` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `total_video_time` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` float(10,2) DEFAULT NULL,
  `number_user_registered` int(11) DEFAULT NULL,
  `create_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL,
  `modify_by` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `status` int(1) NOT NULL DEFAULT 1,
  `is_active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `slug`, `description`, `price`, `image`, `objective`, `user_id`, `duration`, `total_video_time`, `rating`, `number_user_registered`, `create_date`, `modify_date`, `modify_by`, `is_deleted`, `status`, `is_active`) VALUES
(1, 'Sample PDF', 'sample-pdf', 'Lorem ipsum doller it summit. Lorem ipsum doller it summit.Lorem ipsum doller it summit.Lorem ipsum doller it summit.Lorem ipsum doller it summit.Lorem ipsum doller it summit.Lorem ipsum doller it summit.Lorem ipsum doller it summit.Lorem ipsum doller it summit.Lorem ipsum doller it summit.Lorem ipsum doller it summit.Lorem ipsum doller it summit.Lorem ipsum doller it summit.Lorem ipsum doller it summit.Lorem ipsum doller it summit.Lorem ipsum doller it summit.', 10.00, 'i-1.jpg', 'Sampel data test data  Sampel data test data Sampel data test data Sampel data test data Sampel data test data Sampel data test data Sampel data test data Sampel data test data Sampel data test data Sampel data test data Sampel data test data Sampel data test data Sampel data test data Sampel data test data Sampel data test data Sampel data test data Sampel data test data ', 3, 1, '', NULL, NULL, '2021-07-30 18:46:10', '0000-00-00 00:00:00', NULL, 0, 1, 1),
(2, 'Sample video', 'sample-video', 'Lorem ipsum doller it summit. Lorem ipsum doller it summit.Lorem ipsum doller it summit.Lorem ipsum doller it summit.Lorem ipsum doller it summit.Lorem ipsum doller it summit.Lorem ipsum doller it summit.Lorem ipsum doller it summit.Lorem ipsum doller it summit.', 15.00, 'p-1.jpg', 'Anmiation  Anmiation Anmiation Anmiation Anmiation Anmiation Anmiation Anmiation Anmiation Anmiation Anmiation Anmiation Anmiation Anmiation Anmiation Anmiation Anmiation ', 3, 1, '', NULL, NULL, '2021-07-30 18:51:21', '0000-00-00 00:00:00', NULL, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `course_contents`
--

DROP TABLE IF EXISTS `course_contents`;
CREATE TABLE `course_contents` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_type` int(1) NOT NULL,
  `content_url` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creted_date` datetime NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_contents`
--

INSERT INTO `course_contents` (`id`, `parent_id`, `course_id`, `name`, `content_type`, `content_url`, `description`, `creted_date`, `is_deleted`) VALUES
(1, 0, 1, 'Sample PDF', 1, 'file-sample_150kB.pdf', 'test', '0000-00-00 00:00:00', 0),
(2, 0, 2, 'Video', 2, 'sample.mp4', 'test sample', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

DROP TABLE IF EXISTS `invoices`;
CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `gross_price` float(10,2) NOT NULL,
  `discount` int(11) NOT NULL,
  `net_price` float NOT NULL,
  `create_date` datetime NOT NULL,
  `invoice_no` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `user_id`, `gross_price`, `discount`, `net_price`, `create_date`, `invoice_no`) VALUES
(1, 2, 0.00, 0, 0, '2021-07-30 16:32:53', NULL),
(2, 2, 6.00, 0, 6, '2021-07-30 17:48:10', NULL),
(3, 4, 15.00, 0, 15, '2021-07-30 18:53:39', NULL),
(4, 4, 10.00, 0, 10, '2021-07-30 18:59:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_courses`
--

DROP TABLE IF EXISTS `invoice_courses`;
CREATE TABLE `invoice_courses` (
  `id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `gross_price` float(10,2) NOT NULL,
  `discount` int(11) NOT NULL,
  `net_price` float(10,2) NOT NULL,
  `create_date` datetime NOT NULL,
  `invoice_no` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_courses`
--

INSERT INTO `invoice_courses` (`id`, `invoice_id`, `course_id`, `user_id`, `gross_price`, `discount`, `net_price`, `create_date`, `invoice_no`) VALUES
(1, 1, 2, 2, 0.00, 0, 0.00, '2021-07-30 16:32:53', NULL),
(2, 2, 2, 2, 6.00, 0, 6.00, '2021-07-30 17:48:10', NULL),
(3, 3, 2, 3, 15.00, 0, 15.00, '2021-07-30 18:53:39', NULL),
(4, 4, 1, 3, 10.00, 0, 10.00, '2021-07-30 18:59:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` int(1) NOT NULL,
  `registration_date` datetime NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user_image`, `email`, `phone_no`, `password`, `user_type`, `registration_date`, `is_deleted`) VALUES
(1, 'Admin', NULL, 'admin@admin.com', '0123456789', '$2y$10$8HcRobb4Uq0WI8veHrZhnuz8htMZPs4JUnpCgw02r8ElIPkKLrFaC', 1, '2021-07-24 08:04:11', 0),
(3, 'Author', NULL, 'author@author.com', '9856321457', '$2y$10$87TinCmyM68hthE56T46aO1kq9C1d1phUP8Dy0Y17xkuljIwnguja', 0, '2021-07-30 18:36:04', 0),
(4, 'Student', NULL, 'student@student.com', '9830512456', '$2y$10$FRc7D66F/SJlmPIpBn2nKuH49I9S1GUN7.GmbxQP.zFn1BXS7D/Nq', 0, '2021-07-30 18:38:14', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_courses`
--

DROP TABLE IF EXISTS `user_courses`;
CREATE TABLE `user_courses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_courses`
--
ALTER TABLE `cart_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_contents`
--
ALTER TABLE `course_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_courses`
--
ALTER TABLE `invoice_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_courses`
--
ALTER TABLE `user_courses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cart_courses`
--
ALTER TABLE `cart_courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course_contents`
--
ALTER TABLE `course_contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `invoice_courses`
--
ALTER TABLE `invoice_courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_courses`
--
ALTER TABLE `user_courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
