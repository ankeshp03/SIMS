-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2017 at 06:29 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `college_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `usn` varchar(20) NOT NULL,
  `subject_code` varchar(10) NOT NULL,
  `percentage` float NOT NULL,
  `institute` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `employee_code` varchar(15) NOT NULL,
  `faculty_first_name` varchar(50) NOT NULL,
  `faculty_middle_name` varchar(50) NOT NULL,
  `faculty_last_name` varchar(50) NOT NULL,
  `qualification` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `college` varchar(50) NOT NULL,
  `mobile_no` varchar(50) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` tinyint(4) NOT NULL,
  `institute` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `id` int(11) NOT NULL,
  `usn` varchar(20) NOT NULL,
  `subject_code` varchar(10) NOT NULL,
  `internal` tinyint(2) NOT NULL,
  `marks` int(2) NOT NULL,
  `institute` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `proctor`
--

CREATE TABLE `proctor` (
  `id` int(11) NOT NULL,
  `eid` varchar(15) NOT NULL,
  `usn` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `application_for` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `year` smallint(5) NOT NULL,
  `entrance_exam` varchar(50) NOT NULL,
  `entrance_test_no` varchar(50) NOT NULL,
  `rank` varchar(50) NOT NULL,
  `order_no` varchar(50) NOT NULL,
  `order_date` date NOT NULL,
  `student_first_name` varchar(50) NOT NULL,
  `student_middle_name` varchar(50) NOT NULL,
  `student_last_name` varchar(50) NOT NULL,
  `usn` varchar(20) NOT NULL,
  `auid` varchar(20) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `date_of_birth` date NOT NULL,
  `category_reserved` varchar(50) NOT NULL,
  `category_alloted` varchar(50) NOT NULL,
  `religion` varchar(50) NOT NULL,
  `caste` varchar(50) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `visa_no` varchar(50) NOT NULL,
  `visa_expiry_date` date NOT NULL,
  `passport_no` varchar(50) NOT NULL,
  `passport_expiry_date` date NOT NULL,
  `embassy_perm_letter` varchar(50) NOT NULL,
  `father_name` varchar(100) NOT NULL,
  `mother_name` varchar(100) NOT NULL,
  `guardian_name` varchar(100) NOT NULL,
  `parent_occupation` varchar(50) NOT NULL,
  `annual_income` int(20) NOT NULL,
  `permanent_address` varchar(255) NOT NULL,
  `correspondance_address` varchar(255) NOT NULL,
  `city` int(50) NOT NULL,
  `state` int(50) NOT NULL,
  `pincode` int(20) NOT NULL,
  `email_id` int(100) NOT NULL,
  `telephone_no` int(15) NOT NULL,
  `student_mobile_no` int(15) NOT NULL,
  `parent_mobile_no` int(15) NOT NULL,
  `exam_passed_name` varchar(255) NOT NULL,
  `institute_name` varchar(255) NOT NULL,
  `passing_month` int(2) NOT NULL,
  `passing_year` int(4) NOT NULL,
  `admitted_to` varchar(50) NOT NULL,
  `date_of_admission` date NOT NULL,
  `tenth_marks` int(3) NOT NULL,
  `tenth_percentage` float NOT NULL,
  `twelve_marks` int(3) NOT NULL,
  `twelve_percentage` float NOT NULL,
  `twelve_physics_marks` int(3) NOT NULL,
  `twelve_chemistry_marks` int(3) NOT NULL,
  `twelve_maths_marks` int(3) NOT NULL,
  `sslc` tinyint(1) NOT NULL,
  `puc` tinyint(1) NOT NULL,
  `degree` tinyint(1) NOT NULL,
  `pdc` tinyint(1) NOT NULL,
  `migration_certificate` tinyint(1) NOT NULL,
  `caste_income` tinyint(1) NOT NULL,
  `transfer_certificate` tinyint(1) NOT NULL,
  `study_certificate` tinyint(1) NOT NULL,
  `income_certificate` tinyint(1) NOT NULL,
  `rural` tinyint(1) NOT NULL,
  `kannada` tinyint(1) NOT NULL,
  `total_amt` int(20) NOT NULL,
  `receipt_no` varchar(50) NOT NULL,
  `fees_paid_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_code` varchar(10) NOT NULL,
  `scheme` int(4) NOT NULL,
  `subject_name` varchar(50) NOT NULL,
  `institute` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usn` (`usn`),
  ADD KEY `subject_code` (`subject_code`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`employee_code`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usn` (`usn`),
  ADD KEY `subject_code` (`subject_code`);

--
-- Indexes for table `proctor`
--
ALTER TABLE `proctor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `eid` (`eid`),
  ADD KEY `usn` (`usn`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`usn`),
  ADD UNIQUE KEY `email_id` (`email_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `proctor`
--
ALTER TABLE `proctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_s_code_subject_s_code_fk` FOREIGN KEY (`subject_code`) REFERENCES `subject` (`subject_code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `attendance_usn_student_usn_fk` FOREIGN KEY (`usn`) REFERENCES `student` (`usn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `marks`
--
ALTER TABLE `marks`
  ADD CONSTRAINT `marks_s_code_subject_s_code_fk` FOREIGN KEY (`subject_code`) REFERENCES `subject` (`subject_code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `marks_usn_student_usn_fk` FOREIGN KEY (`usn`) REFERENCES `student` (`usn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `proctor`
--
ALTER TABLE `proctor`
  ADD CONSTRAINT `proctor_eid_faculty_eid_fk` FOREIGN KEY (`eid`) REFERENCES `faculty` (`employee_code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `proctor_usn_student_usn_fk` FOREIGN KEY (`usn`) REFERENCES `student` (`usn`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
