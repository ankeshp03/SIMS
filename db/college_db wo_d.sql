-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2017 at 02:54 PM
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
  `usn` varchar(20) NOT NULL,
  `subject_code` varchar(10) NOT NULL,
  `total_days` int(11) NOT NULL,
  `days_attended` int(11) NOT NULL,
  `percentage` double NOT NULL,
  `institute_department` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `employee_code` varchar(15) NOT NULL,
  `faculty_name` varchar(50) NOT NULL,
  `qualification` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `doj` date NOT NULL,
  `mobile_no` bigint(20) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `permanent_address` varchar(255) NOT NULL,
  `current_address` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` tinyint(4) NOT NULL DEFAULT '5',
  `institute_department` int(11) NOT NULL DEFAULT '5'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `institute_department`
--

CREATE TABLE `institute_department` (
  `id` int(11) NOT NULL,
  `institution` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `usn` varchar(20) NOT NULL,
  `subject_code` varchar(10) NOT NULL,
  `internal` tinyint(2) NOT NULL,
  `marks` int(2) NOT NULL,
  `institute_department` int(11) NOT NULL
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
  `student_name` varchar(50) NOT NULL,
  `auid` varchar(20) NOT NULL,
  `usn` varchar(20) NOT NULL,
  `institute_department` int(11) NOT NULL,
  `date_of_admission` date NOT NULL,
  `gender` varchar(6) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `date_of_birth` date NOT NULL,
  `permanent_address` varchar(255) NOT NULL,
  `correspondence_address` varchar(255) NOT NULL,
  `student_email_id` varchar(100) NOT NULL,
  `student_password` varchar(20) NOT NULL,
  `student_mobile` bigint(20) NOT NULL,
  `category` tinyint(1) NOT NULL,
  `nri_or_foreign_national` tinyint(1) NOT NULL,
  `parent_guardian` varchar(10) NOT NULL,
  `parent_name` varchar(50) NOT NULL,
  `parent_occupation` varchar(50) NOT NULL,
  `parent_designation` varchar(50) NOT NULL,
  `parent_office_address` varchar(255) NOT NULL,
  `parent_email` varchar(100) NOT NULL,
  `parent_mobile` bigint(20) NOT NULL,
  `parent_pan_no` varchar(20) NOT NULL,
  `student_local_address` varchar(255) NOT NULL,
  `student_local_mobile` bigint(20) NOT NULL,
  `tenth_board` varchar(50) NOT NULL,
  `twelve_board` varchar(50) NOT NULL,
  `tenth_school` varchar(50) NOT NULL,
  `twelve_school` varchar(50) NOT NULL,
  `tenth_max_marks` int(11) NOT NULL,
  `twelve_max_marks` int(11) NOT NULL,
  `tenth_marks` int(11) NOT NULL,
  `twelve_marks` int(11) NOT NULL,
  `tenth_percentage` double NOT NULL,
  `twelve_percentage` double NOT NULL,
  `entrance_exam` varchar(255) NOT NULL,
  `entrance_state` varchar(50) NOT NULL,
  `entrance_year` int(11) NOT NULL,
  `entrance_score` int(11) NOT NULL,
  `pg_exam_name` varchar(50) NOT NULL,
  `pg_university` varchar(50) NOT NULL,
  `pg_passing_year` int(11) NOT NULL,
  `pg_subject1` varchar(50) NOT NULL,
  `pg_subject2` varchar(50) NOT NULL,
  `pg_subject3` varchar(50) NOT NULL,
  `pg_subject4` varchar(50) NOT NULL,
  `pg_subject5` varchar(50) NOT NULL,
  `pg_subject6` varchar(50) NOT NULL,
  `pg_marks_year1` int(11) NOT NULL,
  `pg_marks_year2` int(11) NOT NULL,
  `pg_marks_year3` int(4) NOT NULL,
  `pg_marks_year4` int(11) NOT NULL,
  `puc` tinyint(1) NOT NULL DEFAULT '0',
  `sslc` tinyint(1) NOT NULL DEFAULT '0',
  `tc` tinyint(1) NOT NULL DEFAULT '0',
  `conduct_certificate` tinyint(1) NOT NULL DEFAULT '0',
  `migration_certificate` tinyint(1) NOT NULL DEFAULT '0',
  `entrance_scorecard` tinyint(1) NOT NULL DEFAULT '0',
  `category_certificate` tinyint(1) NOT NULL DEFAULT '0',
  `nri_or_foreign_certificate` tinyint(1) NOT NULL DEFAULT '0',
  `total_amt` double NOT NULL,
  `receipt_no` varchar(50) NOT NULL,
  `fees_paid_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student2`
--

CREATE TABLE `student2` (
  `student_name` varchar(50) NOT NULL,
  `auid` varchar(20) NOT NULL,
  `usn` varchar(20) NOT NULL,
  `institute_department` int(11) NOT NULL,
  `date_of_admission` date NOT NULL,
  `gender` varchar(6) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `date_of_birth` date NOT NULL,
  `permanent_address` varchar(255) NOT NULL,
  `correspondence_address` varchar(255) NOT NULL,
  `student_email_id` varchar(100) NOT NULL,
  `student_password` varchar(20) NOT NULL,
  `student_mobile` bigint(20) NOT NULL,
  `category` tinyint(1) NOT NULL,
  `nri_or_foreign_national` tinyint(1) NOT NULL,
  `parent_guardian` varchar(10) NOT NULL,
  `parent_name` varchar(50) NOT NULL,
  `parent_occupation` varchar(50) NOT NULL,
  `parent_designation` varchar(50) NOT NULL,
  `parent_office_address` varchar(255) NOT NULL,
  `parent_email` varchar(100) NOT NULL,
  `parent_mobile` bigint(20) NOT NULL,
  `parent_pan_no` varchar(20) NOT NULL,
  `student_local_address` varchar(255) NOT NULL,
  `student_local_mobile` bigint(20) NOT NULL,
  `tenth_board` varchar(50) NOT NULL,
  `twelve_board` varchar(50) NOT NULL,
  `tenth_school` varchar(50) NOT NULL,
  `twelve_school` varchar(50) NOT NULL,
  `tenth_max_marks` int(11) NOT NULL,
  `twelve_max_marks` int(11) NOT NULL,
  `tenth_marks` int(11) NOT NULL,
  `twelve_marks` int(11) NOT NULL,
  `tenth_percentage` double NOT NULL,
  `twelve_percentage` double NOT NULL,
  `entrance_exam` varchar(255) NOT NULL,
  `entrance_state` varchar(50) NOT NULL,
  `entrance_year` int(11) NOT NULL,
  `entrance_score` int(11) NOT NULL,
  `pg_exam_name` varchar(50) NOT NULL,
  `pg_university` varchar(50) NOT NULL,
  `pg_passing_year` int(11) NOT NULL,
  `pg_subject1` varchar(50) NOT NULL,
  `pg_subject2` varchar(50) NOT NULL,
  `pg_subject3` varchar(50) NOT NULL,
  `pg_subject4` varchar(50) NOT NULL,
  `pg_subject5` varchar(50) NOT NULL,
  `pg_subject6` varchar(50) NOT NULL,
  `pg_marks_year1` int(11) NOT NULL,
  `pg_marks_year2` int(11) NOT NULL,
  `pg_marks_year3` int(4) NOT NULL,
  `pg_marks_year4` int(11) NOT NULL,
  `puc` tinyint(1) NOT NULL DEFAULT '0',
  `sslc` tinyint(1) NOT NULL DEFAULT '0',
  `tc` tinyint(1) NOT NULL DEFAULT '0',
  `conduct_certificate` tinyint(1) NOT NULL DEFAULT '0',
  `migration_certificate` tinyint(1) NOT NULL DEFAULT '0',
  `entrance_scorecard` tinyint(1) NOT NULL DEFAULT '0',
  `category_certificate` tinyint(1) NOT NULL DEFAULT '0',
  `nri_or_foreign_certificate` tinyint(1) NOT NULL DEFAULT '0',
  `total_amt` double NOT NULL,
  `receipt_no` varchar(50) NOT NULL,
  `fees_paid_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_code` varchar(20) NOT NULL,
  `scheme` int(4) NOT NULL,
  `subject_name` varchar(50) NOT NULL,
  `institute_department` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`usn`,`subject_code`),
  ADD KEY `usn` (`usn`),
  ADD KEY `subject_code` (`subject_code`),
  ADD KEY `institute_department` (`institute_department`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`employee_code`),
  ADD KEY `institute_department` (`institute_department`);

--
-- Indexes for table `institute_department`
--
ALTER TABLE `institute_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`usn`,`subject_code`,`internal`),
  ADD KEY `usn` (`usn`),
  ADD KEY `subject_code` (`subject_code`),
  ADD KEY `institute_department` (`institute_department`);

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
  ADD UNIQUE KEY `student_email_id` (`student_email_id`),
  ADD UNIQUE KEY `auid` (`auid`),
  ADD KEY `institute_department` (`institute_department`);

--
-- Indexes for table `student2`
--
ALTER TABLE `student2`
  ADD KEY `institute_department` (`institute_department`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_code`),
  ADD KEY `institute_department` (`institute_department`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `institute_department`
--
ALTER TABLE `institute_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
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
  ADD CONSTRAINT `attendance_institute_department_id_fk` FOREIGN KEY (`institute_department`) REFERENCES `institute_department` (`id`),
  ADD CONSTRAINT `attendance_s_code_subject_s_code_fk` FOREIGN KEY (`subject_code`) REFERENCES `subject` (`subject_code`),
  ADD CONSTRAINT `attendance_usn_student_usn_fk` FOREIGN KEY (`usn`) REFERENCES `student` (`usn`);

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `faculty_institute_department_id_fk` FOREIGN KEY (`institute_department`) REFERENCES `institute_department` (`id`);

--
-- Constraints for table `marks`
--
ALTER TABLE `marks`
  ADD CONSTRAINT `marks_institute_department_id_fk` FOREIGN KEY (`institute_department`) REFERENCES `institute_department` (`id`),
  ADD CONSTRAINT `marks_s_code_subject_s_code_fk` FOREIGN KEY (`subject_code`) REFERENCES `subject` (`subject_code`),
  ADD CONSTRAINT `marks_usn_student_usn_fk` FOREIGN KEY (`usn`) REFERENCES `student` (`usn`);

--
-- Constraints for table `proctor`
--
ALTER TABLE `proctor`
  ADD CONSTRAINT `proctor_eid_faculty_eid_fk` FOREIGN KEY (`eid`) REFERENCES `faculty` (`employee_code`),
  ADD CONSTRAINT `proctor_usn_student_usn_fk` FOREIGN KEY (`usn`) REFERENCES `student` (`usn`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_institute_department_id_fk` FOREIGN KEY (`institute_department`) REFERENCES `institute_department` (`id`);

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_institute_department_id_fk` FOREIGN KEY (`institute_department`) REFERENCES `institute_department` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
