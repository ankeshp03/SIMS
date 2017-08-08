-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2017 at 10:40 AM
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
  `year` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `subject_code` varchar(10) NOT NULL,
  `total_days` int(11) NOT NULL,
  `days_attended` int(11) NOT NULL,
  `percentage` double NOT NULL,
  `institute_department` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`usn`, `year`, `semester`, `subject_code`, `total_days`, `days_attended`, `percentage`, `institute_department`) VALUES
('1AY13IS004', 4, 8, '10CS082', 50, 45, 90, 9),
('1AY13IS004', 4, 8, '10IS081', 50, 40, 80, 9),
('1AY13IS004', 4, 8, '10IS835', 50, 35, 70, 9),
('1AY13IS004', 4, 8, '10IS841', 50, 45, 90, 9),
('1AY13IS006', 4, 8, '10CS082', 50, 45, 90, 9),
('1AY13IS006', 4, 8, '10IS081', 50, 40, 80, 9),
('1AY13IS006', 4, 8, '10IS835', 50, 20, 40, 9),
('1AY13IS006', 4, 8, '10IS841', 50, 30, 60, 9),
('1AY13IS017', 4, 8, '10CS082', 50, 45, 90, 9),
('1AY13IS017', 4, 8, '10IS081', 50, 50, 100, 9),
('1AY13IS017', 4, 8, '10IS835', 50, 50, 100, 9),
('1AY13IS017', 4, 8, '10IS841', 50, 45, 90, 9);

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
  `password` varchar(255) NOT NULL,
  `level` tinyint(4) NOT NULL DEFAULT '5',
  `institute_department` int(11) NOT NULL DEFAULT '5'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`employee_code`, `faculty_name`, `qualification`, `designation`, `dob`, `doj`, `mobile_no`, `email_id`, `permanent_address`, `current_address`, `password`, `level`, `institute_department`) VALUES
('AIT001', 'C K Marigowda', 'M. Tech.', 'Assistant Professor', '1979-05-20', '2004-05-20', 9901065561, 'marigowda@acharya.ac.in', 'bangalore, karnataka', 'bangalore, karnataka', 'f9a935ac948288101156103362edf49c474ca2d647827138fd276d0b3af62f14', 2, 9),
('AIT123', 'head proctor', 'M tech', ' Assistant Professor Grade I', '1975-06-30', '2008-06-30', 9902770967, 'headp@acharya.ac.in', 'bangalore, karnataka', 'bangalore, karnataka', '95d62c17cc560f8dedeb01f46a25d31947054b09071b9151d8e3435c05798b14', 3, 9),
('AIT12345', 'admin', 'M Tech', 'admin', '1977-10-26', '2004-05-20', 9876543210, 'admin@acharya.ac.in', 'Bangalore, Karnataka', 'Bangalore, Karnataka', '240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9', 1, 9),
('AIT456', 'Yatheesh', ' M.Tech', ' Assistant Professor Grade III', '1988-01-16', '2012-01-16', 8147118832, 'yatheesh@acharya.ac.in', 'bangalore, karnataka', 'bangalore, karnataka', '1933f44b44316bc9182978c77626d443ac7b10591afdf4885743f3c7c714b1a5', 5, 9),
('AIT789', 'Kala Venugopal', 'M tech', ' Assistant Professor Grade I', '1981-05-31', '2006-05-31', 9611123465, 'kalavenugopal@acharya.ac.in', 'bangalore, karnataka', 'bangalore, karnataka', '5bbb78b66549eafc44b3ab7b13e31f533f8942f195aa7809b50206afa8496996', 4, 9);

-- --------------------------------------------------------

--
-- Table structure for table `forgotpasswordusers`
--

CREATE TABLE `forgotpasswordusers` (
  `email` varchar(100) NOT NULL,
  `hashKey` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forgotpasswordusers`
--

INSERT INTO `forgotpasswordusers` (`email`, `hashKey`) VALUES
('ankesh.beis.13@acharya.ac.in', 'b81e366bec2ebbe42a4f3eae2fc8e982');

-- --------------------------------------------------------

--
-- Table structure for table `institute_department`
--

CREATE TABLE `institute_department` (
  `id` int(11) NOT NULL,
  `institution` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `institute_department`
--

INSERT INTO `institute_department` (`id`, `institution`, `department`) VALUES
(1, 'Acharya Institute of Technology', 'Aeronautical  Engineering'),
(2, 'Acharya Institute of Technology', 'Automobile  Engineering'),
(3, 'Acharya Institute of Technology', 'Bio Technology  Engineering'),
(4, 'Acharya Institute of Technology', 'Civil  Engineering'),
(5, 'Acharya Institute of Technology', 'Computer Science & Engineering'),
(6, 'Acharya Institute of Technology', 'Construction Technology & Mngt'),
(7, 'Acharya Institute of Technology', 'Electrical & Electronics  Engineering'),
(8, 'Acharya Institute of Technology', 'Electronics & Communication Engineering'),
(9, 'Acharya Institute of Technology', 'Information Science & Engineering'),
(10, 'Acharya Institute of Technology', 'Manufacturing Science &  Engg'),
(11, 'Acharya Institute of Technology', 'Mechanical  Engineering'),
(12, 'Acharya Institute of Technology', 'Mechatronics  Engineering'),
(13, 'Acharya Institute of Technology', 'Mining  Engineering'),
(14, 'Acharya Institute of Technology', 'Science & Humanities'),
(15, 'Acharya Polytechnic', 'Aeronautical Engineering'),
(16, 'Acharya Polytechnic', 'Apparel Design & Fabrication Technology'),
(17, 'Acharya Polytechnic', 'Architecture Engineering'),
(18, 'Acharya Polytechnic', 'Automobile Engineering'),
(19, 'Acharya Polytechnic', 'Civil Engineering'),
(20, 'Acharya Polytechnic', 'Commercial Practice'),
(21, 'Acharya Polytechnic', 'Computer Science Engineering'),
(22, 'Acharya Polytechnic', 'Electrical & Electronics Engineering'),
(23, 'Acharya Polytechnic', 'Electronics & Communication Engineering'),
(24, 'Acharya Polytechnic', 'Mechanical Engineering'),
(25, 'Acharya Polytechnic', 'Mechatronics Engineering'),
(26, 'Acharya Polytechnic', 'Mining Engineering'),
(27, 'Acharya Institute of Graduate Studies', 'BBA - Bachelor of Business Administration'),
(28, 'Acharya Institute of Graduate Studies', 'BCA - Bachelor of Computer Application'),
(29, 'Acharya Institute of Graduate Studies', 'B.Com - Bachelor of Commerce'),
(30, 'Acharya Institute of Graduate Studies', 'B.Sc - Fashion & Apparel Design'),
(31, 'Acharya Institute of Graduate Studies', 'BSW - Bachelor of Social Work'),
(32, 'Acharya Institute of Graduate Studies', 'BA - Bachelor of Arts - Journalism / Marketing / Psychology / Economics / English'),
(33, 'Acharya Institute of Graduate Studies', 'B.Sc - Bachelor of Science - Electronics / Physics / Chemistry / Maths'),
(34, 'Acharya Institute of Graduate Studies', 'MCA - Master of Computer Applications'),
(35, 'Acharya Institute of Graduate Studies', 'M.Com (IB) - M.Com-International Business'),
(36, 'Acharya Institute of Graduate Studies', 'M.Com (FA) - M.Com - Financial Analysis'),
(37, 'Acharya Institute of Graduate Studies', 'M.Com - Master of Commerce'),
(38, 'Acharya Institute of Graduate Studies', 'M.Sc - Master of Science - Physics'),
(39, 'Acharya Institute of Graduate Studies', 'M.Sc - Master of Science - Chemistry'),
(40, 'Acharya Institute of Graduate Studies', 'M.Sc - Master of Science - Mathematics'),
(41, 'Acharya Institute of Graduate Studies', 'M.Sc - Master of Science - Psychology'),
(42, 'Acharya Institute of Graduate Studies', 'M.Sc - Fashion & Apparel Design'),
(43, 'Acharya Institute of Graduate Studies', 'M.Sc - Master of Science - Electronic Media'),
(44, 'Acharya Institute of Graduate Studies', 'M.A - Master of Arts - English'),
(45, 'Acharya Institute of Graduate Studies', 'M.A - Master of Arts - Economics'),
(46, 'Acharya Institute of Graduate Studies', 'M.A - Master of Arts - Journalism & Mass Communication'),
(47, 'Acharya Institute of Graduate Studies', 'MSW - Master of Social Work'),
(48, 'Acharya & BM Reddy College of Pharmacy', 'D. Pharm-Diploma in Pharmacy'),
(49, 'Acharya & BM Reddy College of Pharmacy', 'B. Pharm-Bachelor of Pharmacy'),
(50, 'Acharya & BM Reddy College of Pharmacy', 'Pharm D-Doctor of Pharmacy'),
(51, 'Acharya & BM Reddy College of Pharmacy', 'Pharm D-Post Baccalaureate Pharm D'),
(52, 'Acharya & BM Reddy College of Pharmacy', 'M.Pharm-Industrial Pharmacy'),
(53, 'Acharya & BM Reddy College of Pharmacy', 'M.Pharm-Pharmacology'),
(54, 'Acharya & BM Reddy College of Pharmacy', 'M.Pharm-Pharmaceutics'),
(55, 'Acharya & BM Reddy College of Pharmacy', 'M.Pharm-Pharmaceutical Chemistry'),
(56, 'Acharya & BM Reddy College of Pharmacy', 'M.Pharm-Quality Assurance'),
(57, 'Acharya & BM Reddy College of Pharmacy', 'M.Pharm-Pharmaceutical Analysis'),
(58, 'Acharya & BM Reddy College of Pharmacy', 'M.Pharm-Pharmacognosy'),
(59, 'Acharya & BM Reddy College of Pharmacy', 'M.Pharm-Drug Regulatory Affairs'),
(60, 'Acharya\'s NRV School of Architecture', 'Bachelor of Architecture'),
(61, 'Acharya School of Management', 'Post Graduate Diploma in Management (PGDM)'),
(62, 'Acharya School of Management', 'Master of Business Administration'),
(63, 'Smt. Nagarathnamma School of Nursing', 'General Nursing & Midwifery'),
(64, 'Smt. Nagarathnamma College of Nursing', '>Basic B.Sc Nursing'),
(65, 'Smt. Nagarathnamma College of Nursing', 'M.Sc Nursing'),
(66, 'Smt. Nagarathnamma College of Nursing', 'Post Basic B.Sc Nursing'),
(67, 'Acharya College of Education', 'Diploma in Education - D.Ed'),
(68, 'Acharya College of Education', 'Bachelor of Education - B.Ed'),
(69, 'Acharya Pre-University College', 'Science - Physics, Chemistry, Mathematics and Biology'),
(70, 'Acharya Pre-University College', 'Science - Physics, Chemistry, Mathematics and Computer Science'),
(71, 'Acharya Pre-University College', 'Science - Physics, Chemistry, Mathematics and Electronics'),
(72, 'Acharya Pre-University College', 'Commerce-Computer Sc, Economics, Business Studies and Accountancy'),
(73, 'Acharya School of Design', 'Painting'),
(74, 'Acharya School of Design', 'Graphic Design'),
(75, 'Acharya School of Design', 'Animation & Multimedia Design'),
(76, 'Acharya School of Design', 'Interior & Spatial Design'),
(77, 'Acharya School of Design', 'Product Design'),
(78, 'Acharya Institute of English & Foreign Languages', 'Basic Certificate Program in English'),
(79, 'Acharya Institute of English & Foreign Languages', 'Diploma Program in English'),
(80, 'Acharya Institute of English & Foreign Languages', 'Advanced Certificate Program in English'),
(81, 'Acharya Institute of English & Foreign Languages', 'French'),
(82, 'Acharya Institute of English & Foreign Languages', 'German'),
(83, 'Acharya School of Law', 'BA, LLB'),
(84, 'Acharya School of Law', 'BBA, LLB'),
(85, 'Acharya School of Law', 'LLB');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `usn` varchar(20) NOT NULL,
  `subject_code` varchar(10) NOT NULL,
  `year` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `internal` tinyint(2) NOT NULL,
  `marks` int(2) NOT NULL,
  `institute_department` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`usn`, `subject_code`, `year`, `semester`, `internal`, `marks`, `institute_department`) VALUES
('1AY13IS004', '10CS082', 4, 8, 1, 21, 9),
('1AY13IS004', '10CS082', 4, 8, 2, 22, 9),
('1AY13IS004', '10CS082', 4, 8, 3, 23, 9),
('1AY13IS004', '10IS081', 4, 8, 1, 20, 9),
('1AY13IS004', '10IS081', 4, 8, 2, 21, 9),
('1AY13IS004', '10IS081', 4, 8, 3, 22, 9),
('1AY13IS004', '10IS835', 4, 8, 1, 22, 9),
('1AY13IS004', '10IS835', 4, 8, 2, 23, 9),
('1AY13IS004', '10IS835', 4, 8, 3, 24, 9),
('1AY13IS004', '10IS841', 4, 8, 1, 23, 9),
('1AY13IS004', '10IS841', 4, 8, 2, 24, 9),
('1AY13IS004', '10IS841', 4, 8, 3, 25, 9),
('1AY13IS006', '10CS082', 4, 8, 1, 25, 9),
('1AY13IS006', '10CS082', 4, 8, 2, 25, 9),
('1AY13IS006', '10CS082', 4, 8, 3, 16, 9),
('1AY13IS006', '10IS081', 4, 8, 1, 22, 9),
('1AY13IS006', '10IS081', 4, 8, 2, 20, 9),
('1AY13IS006', '10IS081', 4, 8, 3, 25, 9),
('1AY13IS006', '10IS835', 4, 8, 1, 15, 9),
('1AY13IS006', '10IS835', 4, 8, 2, 15, 9),
('1AY13IS006', '10IS835', 4, 8, 3, 20, 9),
('1AY13IS006', '10IS841', 4, 8, 1, 20, 9),
('1AY13IS006', '10IS841', 4, 8, 2, 21, 9),
('1AY13IS006', '10IS841', 4, 8, 3, 20, 9),
('1AY13IS017', '10CS082', 4, 8, 1, 21, 9),
('1AY13IS017', '10CS082', 4, 8, 2, 25, 9),
('1AY13IS017', '10CS082', 4, 8, 3, 16, 9),
('1AY13IS017', '10IS081', 4, 8, 1, 21, 9),
('1AY13IS017', '10IS081', 4, 8, 2, 21, 9),
('1AY13IS017', '10IS081', 4, 8, 3, 20, 9),
('1AY13IS017', '10IS835', 4, 8, 1, 23, 9),
('1AY13IS017', '10IS835', 4, 8, 2, 23, 9),
('1AY13IS017', '10IS835', 4, 8, 3, 22, 9),
('1AY13IS017', '10IS841', 4, 8, 1, 25, 9),
('1AY13IS017', '10IS841', 4, 8, 2, 25, 9),
('1AY13IS017', '10IS841', 4, 8, 3, 25, 9);

-- --------------------------------------------------------

--
-- Table structure for table `proctor`
--

CREATE TABLE `proctor` (
  `eid` varchar(15) NOT NULL,
  `usn` varchar(20) NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proctor`
--

INSERT INTO `proctor` (`eid`, `usn`, `year`) VALUES
('AIT789', '1AY13IS004', 4),
('AIT789', '1AY13IS006', 4);

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
  `year` int(11) NOT NULL,
  `permanent_address` varchar(255) NOT NULL,
  `correspondence_address` varchar(255) NOT NULL,
  `student_email_id` varchar(100) NOT NULL,
  `student_password` varchar(255) NOT NULL,
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

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_name`, `auid`, `usn`, `institute_department`, `date_of_admission`, `gender`, `nationality`, `date_of_birth`, `year`, `permanent_address`, `correspondence_address`, `student_email_id`, `student_password`, `student_mobile`, `category`, `nri_or_foreign_national`, `parent_guardian`, `parent_name`, `parent_occupation`, `parent_designation`, `parent_office_address`, `parent_email`, `parent_mobile`, `parent_pan_no`, `student_local_address`, `student_local_mobile`, `tenth_board`, `twelve_board`, `tenth_school`, `twelve_school`, `tenth_max_marks`, `twelve_max_marks`, `tenth_marks`, `twelve_marks`, `tenth_percentage`, `twelve_percentage`, `entrance_exam`, `entrance_state`, `entrance_year`, `entrance_score`, `pg_exam_name`, `pg_university`, `pg_passing_year`, `pg_subject1`, `pg_subject2`, `pg_subject3`, `pg_subject4`, `pg_subject5`, `pg_subject6`, `pg_marks_year1`, `pg_marks_year2`, `pg_marks_year3`, `pg_marks_year4`, `puc`, `sslc`, `tc`, `conduct_certificate`, `migration_certificate`, `entrance_scorecard`, `category_certificate`, `nri_or_foreign_certificate`, `total_amt`, `receipt_no`, `fees_paid_date`) VALUES
('Abhishek Kumar', 'AIT13BEIS004', '1AY13IS004', 9, '2013-07-30', 'male', 'Indian', '1994-05-01', 4, ' c/o saryug singh, birla colony, phulwarisharif , Patna, Bihar - 801505', 'house no. 46, opp. acharya college, 3rd cross, soldevanhalli, bangalore - 560090', 'abhishekkumar.beis.13@acharya.ac.in', '78a463d8187b791cfe00ac6f4d26d27e6c3fe59f1ffac8817ddca25d9512efab', 9733887102, 0, 0, 'Father', 'Ram Vinay Kumar', 'Defense', 'Dont Know', 'mobile', '', 8553916185, '', 'house no. 46, opp. acharya college, 3rd cross, soldevanhalli, bangalore - 560090', 9733887102, 'CBSE', 'CBSE', 'some school', 'some school', 500, 500, 428, 347, 85.6, 69.4, 'COMEDK', 'Karnataka', 2013, 70, '', '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 198272, '12345', '2013-07-30'),
('sayantan', 'AIT13BEIS001', '1AY13IS005', 9, '2017-07-09', 'male', 'indian', '2017-07-04', 1, 'asdfasdj', 'asdfasdj', 'sayantan.beis.13@acharya.ac.in', '5aea1d0c3fd919917d8bc743724d1123fa221441d751509ccebd4d45994ad165', 2314569874, 0, 0, 'Father', 'safjalsdk', 'sdfas', 'safsa', 'safasdf', '', 4567895467, '', 'sdafa', 4567895345, '77', '77', '77', '77', 77, 77, 77, 77, 100, 100, 'sfasd', 'sdfas', 2017, 123, '', '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 0, 'sdfa153', '2017-07-03'),
('Afreen Khanum', 'AIT13BEIS006', '1AY13IS006', 9, '2013-07-31', 'female', 'Indian', '1995-03-11', 4, 'No 39,9th cross MK Nagar Yeshwanthpur Bangalore-560022', 'No 39,9th cross MK Nagar Yeshwanthpur Bangalore-560022', 'afreen.beis.13@acharya.ac.in', 'f3749f98f1da3ec8bd3e270fd77c3b00ac3df36911e250e59b10b8a51379f93e', 7829393621, 0, 0, 'Father', 'Zuber Khan', 'some', 'some', 'some', '', 9900228319, '', 'No 39,9th cross MK Nagar Yeshwanthpur Bangalore-560022', 7829393621, '', '', '', '', 0, 0, 0, 0, 0, 0, 'CET', 'Karnataka', 2013, 0, '', '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 0, '', '0000-00-00'),
('Ankesh Paramanik', 'AIT13BEIS100', '1AY13IS017', 9, '2013-07-31', 'male', 'Indian', '1995-01-25', 4, 'House No. 332, First Floor, Tilak Khand, Giri Nagar, Kalkaji, New F', 'Room No. - 23, OM PG, Acharya Institutes, Soldevanahalli, Hesserghatta road', 'ankesh.beis.13@acharya.ac.in', 'c1c9501c5cf0abc1614f1be849c6b847bf8d118be1a0aff878d4d22663e2fd88', 7204787961, 0, 0, 'Father', 'A K Paramanik', 'Service', 'GM', 'Nehru Place, New Delhi - 110019', 'adhirparamanik@gmail.com', 9899858750, '', 'Room No. - 23, OM PG, Acharya Institutes, Soldevanahalli, Hesserghatta road', 7204787961, 'ICSE', 'CBSE', 'Ramakrishna Mission English School', 'KPS', 900, 500, 721, 378, 80.1, 75.6, '', 'Karnataka', 2013, 70, '', '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 198272, '45678', '2013-07-31'),
('Kajol Singh', 'AIT13BEIS052', '1AY13IS052', 9, '2013-07-30', 'female', 'indian', '1995-09-21', 4, 'Bangalore', 'Bangalore', 'kajol.beis.13@acharya.ac.in', '92699388e510036290fa70080a93782db95d1ad646b369c9bccf5c09f17e46d2', 8792648734, 0, 0, 'Father', 'Sanjay Prasad Singh', 'Air Force', 'some', 'bangalore', '', 9876543210, '', 'bangalore', 8792648734, 'CBSE', 'CBSE', 'Some', 'some', 500, 500, 450, 400, 90, 80, 'CET', 'karnataka', 2013, 70, '', '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 60000, '198765', '2013-07-30');

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
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_code`, `scheme`, `subject_name`, `institute_department`) VALUES
('10CS082', 2010, 'SYSTEM MODELING AND SIMULATION', 9),
('10IS081', 2010, 'SOFTWARE ARCHITECTURES', 9),
('10IS835', 2010, 'INFORMATION AND NETWORK SECURITY', 9),
('10IS841', 2010, 'AD-HOC NETWORKS', 9);

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
-- Indexes for table `forgotpasswordusers`
--
ALTER TABLE `forgotpasswordusers`
  ADD KEY `email` (`email`);

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
