-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2021 at 05:49 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cheaf`
--

-- --------------------------------------------------------

--
-- Table structure for table `student_results`
--

CREATE TABLE `student_results` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `test_mark` float DEFAULT NULL,
  `project_mark` float DEFAULT NULL,
  `menu_mark` float DEFAULT NULL,
  `average` float DEFAULT NULL,
  `competent` int(11) DEFAULT 0,
  `added_by` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_results`
--

INSERT INTO `student_results` (`id`, `student_id`, `class_id`, `section_id`, `session_id`, `subject_id`, `test_mark`, `project_mark`, `menu_mark`, `average`, `competent`, `added_by`, `date`) VALUES
(1, 142, 8, 1, 15, 6, 0, 0, NULL, 0, 0, 1, '2021-12-22 03:01:54'),
(2, 143, 8, 1, 15, 6, 0, 0, NULL, 0, 0, 1, '2021-12-22 03:01:54'),
(3, 144, 8, 1, 15, 6, 0, 0, NULL, 0, 0, 1, '2021-12-22 03:01:54'),
(4, 255, 8, 2, 15, 6, 0, 0, NULL, 0, 0, 1, '2021-12-22 03:01:54'),
(5, 256, 8, 2, 15, 6, 0, 0, NULL, 0, 0, 1, '2021-12-22 03:01:54'),
(6, 142, 8, 1, 15, 8, 0, 0, NULL, 0, 0, 1, '2021-12-22 03:11:12'),
(7, 143, 8, 1, 15, 8, 0, 0, NULL, 0, 0, 1, '2021-12-22 03:11:12'),
(8, 144, 8, 1, 15, 8, 0, 0, NULL, 0, 0, 1, '2021-12-22 03:11:12'),
(9, 142, 8, 1, 15, 2, 1, 1, NULL, 1, 0, 1, '2021-12-22 03:20:31'),
(10, 143, 8, 1, 15, 2, 0, 0, NULL, 0, 0, 1, '2021-12-22 03:13:45'),
(11, 144, 8, 1, 15, 2, 0, 0, NULL, 0, 0, 1, '2021-12-22 03:13:46'),
(12, 433, 14, 1, 15, 2, 1, 1, NULL, 1, 0, 1, '2021-12-22 03:14:56'),
(13, 434, 14, 1, 15, 2, 0, 0, NULL, 0, 0, 1, '2021-12-22 03:14:56'),
(14, 435, 14, 1, 15, 2, 0, 0, NULL, 0, 0, 1, '2021-12-22 03:14:56'),
(15, 436, 14, 1, 15, 2, 0, 0, NULL, 0, 0, 1, '2021-12-22 03:14:56'),
(16, 437, 14, 1, 15, 2, 0, 0, NULL, 0, 0, 1, '2021-12-22 03:14:56'),
(17, 438, 14, 1, 15, 2, 0, 0, NULL, 0, 0, 1, '2021-12-22 03:14:56'),
(18, 439, 14, 1, 15, 2, 0, 0, NULL, 0, 0, 1, '2021-12-22 03:14:56'),
(19, 142, 8, 1, 15, 1, 1, 1, NULL, 1, 0, 1, '2021-12-22 03:21:20'),
(20, 143, 8, 1, 15, 1, 0, 0, NULL, 0, 0, 1, '2021-12-22 03:20:59'),
(21, 144, 8, 1, 15, 1, 0, 0, NULL, 0, 0, 1, '2021-12-22 03:20:59'),
(22, 142, 8, 1, 15, 3, 10, 10, NULL, 10, 1, 1, '2021-12-22 03:46:24'),
(23, 143, 8, 1, 15, 3, 7, 5, NULL, 6, 0, 1, '2021-12-22 03:46:24'),
(24, 144, 8, 1, 15, 3, 55, 45, NULL, 50, 0, 1, '2021-12-22 03:46:24'),
(25, 142, 8, 1, 15, 179, NULL, NULL, 10, 10, 1, 1, '2021-12-22 03:56:16'),
(26, 143, 8, 1, 15, 179, NULL, NULL, 55, 55, NULL, 1, '2021-12-22 03:56:16'),
(27, 144, 8, 1, 15, 179, NULL, NULL, 0, 0, NULL, 1, '2021-12-22 03:56:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student_results`
--
ALTER TABLE `student_results`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student_results`
--
ALTER TABLE `student_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
