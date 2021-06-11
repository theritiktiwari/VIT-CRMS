-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 11, 2021 at 07:27 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crms`
--
CREATE DATABASE IF NOT EXISTS `crms` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `crms`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `sno` int(5) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`sno`, `username`, `password`, `time`) VALUES
(1, 'admin', '$2y$10$t/RmDJ.5g.DLYW5UwelwneTqibJR3Gur3MoIHFbGjmySmaclMNYDa', '2021-05-15 16:30:15');

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `assignment_id` int(20) NOT NULL,
  `assignment_data` varchar(255) NOT NULL,
  `assignment_name` varchar(255) NOT NULL,
  `assignment_course_name` varchar(255) NOT NULL,
  `assignment_faculty_name` varchar(255) NOT NULL,
  `assignment_download` int(255) NOT NULL DEFAULT 0,
  `assignment_user_id` int(20) NOT NULL,
  `assignment_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`assignment_id`, `assignment_data`, `assignment_name`, `assignment_course_name`, `assignment_faculty_name`, `assignment_download`, `assignment_user_id`, `assignment_time`) VALUES
(1, '15-05-2021-07-57-54_Assignment.zip', 'Assignment.zip', 'Problem Solving and Programming', 'Anusha K', 2, 2, '2021-05-15 17:57:54'),
(2, '15-05-2021-08-23-44_ENG1902 - Assignment.zip', 'ENG1902 - Assignment.zip', 'English', 'Patchainayagi', 0, 2, '2021-05-15 18:23:44'),
(3, '21-05-2021-05-11-35_PL : SQL.pdf', 'PL : SQL.pdf', 'DBMS', 'Vishwanathan V', 5, 1, '2021-05-21 15:11:35');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(20) NOT NULL,
  `book_data` varchar(255) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `book_course_name` varchar(255) NOT NULL,
  `book_faculty_name` varchar(255) NOT NULL,
  `book_download` int(255) NOT NULL DEFAULT 0,
  `book_user_id` int(20) NOT NULL,
  `book_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `book_data`, `book_name`, `book_course_name`, `book_faculty_name`, `book_download`, `book_user_id`, `book_time`) VALUES
(1, '15-05-2021-05-18-51_Boolean Algebra.pdf', 'Boolean Algebra.pdf', 'Digital Logic Design', 'Meera PS', 3, 1, '2021-05-15 15:18:51'),
(2, '15-05-2021-05-24-36_Digital Design With an Introduction to the Verilog HDL.pdf', 'Digital Design With an Introduction to the Verilog HDL.pdf', 'Digital Logic Design', 'Subbulekshmi D', 1, 2, '2021-05-15 15:24:36'),
(3, '15-05-2021-05-41-14_Fundamentals of Logic Design.pdf', 'Fundamentals of Logic Design.pdf', 'Digital Logic Design', 'Arul R', 2, 2, '2021-05-15 15:41:14'),
(4, '15-05-2021-05-46-19_Digital Logic & Computer Design.pdf', 'Digital Logic & Computer Design.pdf', 'Digital Logic Design', 'Deepa T', 4, 1, '2021-05-15 15:46:19'),
(5, '15-05-2021-06-22-54_EVS Kaushik and Kaushik.pdf', 'EVS Kaushik and Kaushik.pdf', 'EVS', 'Milind Shrinivas Dangate', 1, 2, '2021-05-15 16:22:54'),
(6, '15-05-2021-07-59-30_ALexander Sadiku.pdf', 'ALexander Sadiku.pdf', 'EEE1001', 'Arul R', 2, 2, '2021-05-15 17:59:30');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE `enquiry` (
  `user_id` int(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enquiry`
--

INSERT INTO `enquiry` (`user_id`, `username`, `email`, `message`, `time`) VALUES
(1, 'User', 'user@crms.com', 'What is the purpose of this website ?', '2021-05-15 16:12:50'),
(2, 'Tester', 'tester@crms.com', 'How to Search the File ?', '2021-05-15 16:20:09');

-- --------------------------------------------------------

--
-- Table structure for table `lab_record`
--

CREATE TABLE `lab_record` (
  `lab_record_id` int(20) NOT NULL,
  `lab_record_data` varchar(255) NOT NULL,
  `lab_record_name` varchar(255) NOT NULL,
  `lab_record_course_name` varchar(255) NOT NULL,
  `lab_record_faculty_name` varchar(255) NOT NULL,
  `lab_record_download` int(255) NOT NULL DEFAULT 0,
  `lab_record_user_id` int(20) NOT NULL,
  `lab_record_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lab_record`
--

INSERT INTO `lab_record` (`lab_record_id`, `lab_record_data`, `lab_record_name`, `lab_record_course_name`, `lab_record_faculty_name`, `lab_record_download`, `lab_record_user_id`, `lab_record_time`) VALUES
(1, '15-05-2021-05-56-48_EEE1001 Manual.pdf', 'EEE1001 Manual.pdf', 'EEE1001', 'Lenin N C', 2, 1, '2021-05-15 15:56:48'),
(2, '15-05-2021-08-28-30_MATLAB Manual.zip', 'MATLAB Manual.zip', 'Maths', 'Vijay Kumar P', 5, 2, '2021-05-15 18:28:30'),
(3, '15-05-2021-08-40-46_Physics Manual.pdf', 'Physics Manual.pdf', 'Physics', 'Caroline Ponraj', 3, 2, '2021-05-15 18:40:46');

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE `note` (
  `note_id` int(20) NOT NULL,
  `note_data` varchar(255) NOT NULL,
  `note_name` varchar(255) NOT NULL,
  `note_course_name` varchar(255) NOT NULL,
  `note_faculty_name` varchar(255) NOT NULL,
  `note_download` int(255) NOT NULL DEFAULT 0,
  `note_user_id` int(20) NOT NULL,
  `note_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `note`
--

INSERT INTO `note` (`note_id`, `note_data`, `note_name`, `note_course_name`, `note_faculty_name`, `note_download`, `note_user_id`, `note_time`) VALUES
(1, '15-05-2021-08-17-14_Complete Notes.pdf', 'Complete Notes.pdf', 'EEE1001', 'Meera PS', 5, 2, '2021-05-15 18:17:14'),
(3, '15-05-2021-08-33-48_Module 1 - 2.zip', 'Module 1 - 2.zip', 'Physics', 'Caroline Ponraj', 3, 1, '2021-05-15 18:33:48'),
(4, '15-05-2021-08-34-04_Module 3 - 4.zip', 'Module 3 - 4.zip', 'Physics', 'Caroline Ponraj', 10, 1, '2021-05-15 18:34:04'),
(5, '15-05-2021-08-34-20_Module 5 - 6.zip', 'Module 5 - 6.zip', 'Physics', 'Caroline Ponraj', 2, 1, '2021-05-15 18:34:20'),
(6, '21-05-2021-05-13-56_Spanish Notes.pdf', 'Spanish Notes.pdf', 'Spanish', 'Savariah Xavier Y C', 20, 1, '2021-05-21 15:13:56');

-- --------------------------------------------------------

--
-- Table structure for table `practice_problem`
--

CREATE TABLE `practice_problem` (
  `practice_problem_id` int(20) NOT NULL,
  `practice_problem_data` varchar(255) NOT NULL,
  `practice_problem_name` varchar(255) NOT NULL,
  `practice_problem_course_name` varchar(255) NOT NULL,
  `practice_problem_faculty_name` varchar(255) NOT NULL,
  `practice_problem_download` int(255) NOT NULL DEFAULT 0,
  `practice_problem_user_id` int(20) NOT NULL,
  `practice_problem_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `practice_problem`
--

INSERT INTO `practice_problem` (`practice_problem_id`, `practice_problem_data`, `practice_problem_name`, `practice_problem_course_name`, `practice_problem_faculty_name`, `practice_problem_download`, `practice_problem_user_id`, `practice_problem_time`) VALUES
(1, '15-05-2021-05-52-51_CSE1001 - PP.zip', 'CSE1001 - PP.zip', 'Problem Solving and Programming', 'Anusha K', 25, 1, '2021-05-15 15:52:51'),
(2, '15-05-2021-08-28-49_MAT1011 - PP.pdf', 'MAT1011 - PP.pdf', 'Maths', 'Vijay Kumar P', 7, 2, '2021-05-15 18:28:49');

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `user_id` int(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_type` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`user_id`, `username`, `user_type`, `email`, `password`, `user_time`) VALUES
(1, 'Ritik Tiwari', 'student', 'ritik@crms.com', '$2y$10$2Cu.xVgD4Ka3YUlU9Q9ZnupJzC0pCB0UdYL2FG2RgmHUcNxufo6Du', '2021-04-25 12:00:00'),
(2, 'User', 'student', 'user@crms.com', '$2y$10$cFJPzoRmX75g8u68tZDN/e/1gUKR4hFtL/zLMWatf7BUEMTp5zsTG', '2021-05-15 14:29:27'),
(3, 'Tester', 'teacher', 'tester@crms.com', '$2y$10$5fDUVa4TF3MVje8B70c0Ued0Sh.lL2Qy9hOSuBNIvqFQrH544LHw6', '2021-05-15 14:38:19'),
(4, 'Moderator', 'teacher', 'moderator@crms.com', '$2y$10$rV4kl6.ASnoWUSOUeFav6.sZteIQZxSDecfLKVd8B7ke1MPxAEhkO', '2021-05-15 18:18:27'),
(5, 'Checker', 'teacher', 'checker@crms.com', '$2y$10$Vj3OGagYBKLulxwE36StFuvqxMooECZ5xKQ8cuYdDOAaUzfTrQOoS', '2021-05-15 18:18:59'),
(6, 'Dishant', 'student', 'dishant@crms.com', '$2y$10$WCEfkYLcygXBfgcwKSQZaePdP64SFrV0hxGlMT6B5TOb22nPvALF2', '2021-06-11 15:36:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`assignment_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `lab_record`
--
ALTER TABLE `lab_record`
  ADD PRIMARY KEY (`lab_record_id`);

--
-- Indexes for table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`note_id`);

--
-- Indexes for table `practice_problem`
--
ALTER TABLE `practice_problem`
  ADD PRIMARY KEY (`practice_problem_id`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `sno` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `assignment_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `enquiry`
--
ALTER TABLE `enquiry`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `lab_record`
--
ALTER TABLE `lab_record`
  MODIFY `lab_record_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
  MODIFY `note_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `practice_problem`
--
ALTER TABLE `practice_problem`
  MODIFY `practice_problem_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
