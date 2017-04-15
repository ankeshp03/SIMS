-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2017 at 02:55 PM
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

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`usn`, `subject_code`, `total_days`, `days_attended`, `percentage`, `institute_department`) VALUES
('1ay11me101', '10CS82', 50, 30, 60, 9),
('1ay11me101', '10EC81', 50, 25, 50, 9),
('1ay11me101', '10EC82', 50, 45, 90, 9),
('1ay11me101', '10IS81', 50, 40, 80, 9),
('1AY13IS017', '10CS82', 50, 30, 60, 9),
('1AY13IS017', '10EC81', 50, 25, 50, 9),
('1AY13IS017', '10EC82', 50, 45, 90, 9),
('1AY13IS017', '10IS81', 50, 40, 80, 9);

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

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`employee_code`, `faculty_name`, `qualification`, `designation`, `dob`, `doj`, `mobile_no`, `email_id`, `permanent_address`, `current_address`, `password`, `level`, `institute_department`) VALUES
('', '', '', '', '0000-00-00', '2017-04-13', 0, '', '', '', '', 5, 80),
('1ay13is017', 'ankesh paramanik', 'btech', 'lecturer', '0000-00-00', '0000-00-00', 7204787961, 'ankesh@acharya.ac.in', '', '', 'asdf', 1, 9),
('AIT12344', 'ANKESH PARAMANIK', 'ajlasa', 'adfjlkj;', '0000-00-00', '2017-04-13', 7204787961, 'ank.beis.13@acharya.ac.in', 'Room No. - 23, OM PG, Acharya Institutes, Soldevanahalli, Hesserghatta road', 'Room No. - 23, OM PG, Acharya Institutes, Soldevanahalli, Hesserghatta road', '', 5, 80),
('AIT12345', '', '', '', '0000-00-00', '2017-04-12', 0, '', '', '', '', 0, 68),
('AIT43216', '', '', '', '0000-00-00', '2017-04-12', 0, '', '', '', '', 5, 68);

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
(5, 'Acharya Institute of Technology', 'Computer Science &  Engineering'),
(6, 'Acharya Institute of Technology', 'Construction Technology & Mngt'),
(7, 'Acharya Institute of Technology', 'Electrical & Electronics  Engineering'),
(8, 'Acharya Institute of Technology', 'Electronics & Communication Engineering'),
(9, 'Acharya Institute of Technology', 'Information Science &  Engineering'),
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
  `internal` tinyint(2) NOT NULL,
  `marks` int(2) NOT NULL,
  `institute_department` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`usn`, `subject_code`, `internal`, `marks`, `institute_department`) VALUES
('1ay11me101', '10CS82', 1, 25, 8),
('1ay11me101', '10CS82', 2, 25, 8),
('1ay11me101', '10CS82', 3, 24, 8),
('1ay11me101', '10CS82', 4, 23, 8),
('1AY13IS017', '10CS82', 1, 24, 9),
('1AY13IS017', '10CS82', 2, 25, 9),
('1AY13IS017', '10CS82', 3, 23, 9),
('1AY13IS017', '10IS81', 1, 25, 9),
('1AY13IS017', '10IS81', 2, 24, 9),
('1AY13IS017', '10IS81', 3, 23, 9);

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

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_name`, `auid`, `usn`, `institute_department`, `date_of_admission`, `gender`, `nationality`, `date_of_birth`, `permanent_address`, `correspondence_address`, `student_email_id`, `student_password`, `student_mobile`, `category`, `nri_or_foreign_national`, `parent_guardian`, `parent_name`, `parent_occupation`, `parent_designation`, `parent_office_address`, `parent_email`, `parent_mobile`, `parent_pan_no`, `student_local_address`, `student_local_mobile`, `tenth_board`, `twelve_board`, `tenth_school`, `twelve_school`, `tenth_max_marks`, `twelve_max_marks`, `tenth_marks`, `twelve_marks`, `tenth_percentage`, `twelve_percentage`, `entrance_exam`, `entrance_state`, `entrance_year`, `entrance_score`, `pg_exam_name`, `pg_university`, `pg_passing_year`, `pg_subject1`, `pg_subject2`, `pg_subject3`, `pg_subject4`, `pg_subject5`, `pg_subject6`, `pg_marks_year1`, `pg_marks_year2`, `pg_marks_year3`, `pg_marks_year4`, `puc`, `sslc`, `tc`, `conduct_certificate`, `migration_certificate`, `entrance_scorecard`, `category_certificate`, `nri_or_foreign_certificate`, `total_amt`, `receipt_no`, `fees_paid_date`) VALUES
('adfd', 'AIT13BEIS103', '1ay11me101', 49, '2017-04-11', 'male', '', '0000-00-00', '', '', 'me.becs.13@acharya.ac.in', '1ay11me101', 0, 1, 1, '', '', '', '', '', '', 0, '', '', 0, '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', 0, 0, '', '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00'),
('abjes', 'AIT13BEDB123', '1AY12EC243', 49, '2017-04-11', 'male', '', '0000-00-00', 'PROPERTY NO. - 699, GALI NO. - 7, GOVINDPURI, KALKAJI, NEW DELHI', 'PROPERTY NO. - 699, GALI NO. - 7, GOVINDPURI, KALKAJI, NEW DELHI', 'sus.becs.12@acharya.ac.in', '1AY12EC243', 7204787961, 0, 0, '', '', '', '', '', '', 0, '', '', 0, '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', 0, 0, '', '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00'),
('', 'QWER345', '1AY12IJ873', 68, '2017-04-11', 'male', '', '0000-00-00', '', '', 'ankefawej.beis.13@acharya.ac.in', '1AY12IJ873', 0, 1, 2, '', '', '', '', '', '', 0, '', '', 0, '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', 0, 0, '', '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00'),
('ajfdkl', 'AIT13BEIS112', '1AY13CS100', 5, '2017-04-11', 'female', 'indian', '2017-04-01', 'jfdlajdls', 'jfdlajdls', 'ankes.beis.13@acharya.ac.in', '1AY13CS100', 7204787961, 0, 0, '', '', '', '', '', '', 0, '', '', 0, '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', 0, 0, '', '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00'),
('', 'AIT13BECS100', '1AY13IS001', 80, '2017-04-13', 'male', '', '0000-00-00', '', '', 'ankeshh.beis.13@acharya.ac.in', '1AY13IS001', 0, 1, 1, '', '', '', '', '', '', 0, '', '', 0, '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', 0, 0, '', '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00'),
('', 'AIT13BECS103', '1AY13IS003', 75, '2017-04-13', 'male', '', '0000-00-00', '', '', 'ank.besi.13@acharya.ac.in', '1AY13IS003', 0, 1, 1, '', '', '', '', '', '', 0, '', '', 0, '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', 0, 0, '', '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00'),
('ANKESH PARAMANIK', 'AIT13BEIS101', '1AY13IS006', 9, '2017-04-11', 'male', 'indian', '1995-09-02', 'Room No. - 23, OM PG, Acharya Institutes, Soldevanahalli, Hesserghatta road', 'Room No. - 23, OM PG, Acharya Institutes, Soldevanahalli, Hesserghatta road', 'kanhaiya.beec.13@acharya.ac.in', '1AY13IS006', 7204787961, 0, 0, '', '', '', '', '', '', 0, '', '', 0, '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', 0, 0, '', '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00'),
('', '', '1AY13IS010', 80, '2017-04-13', 'male', '', '0000-00-00', '', '', '@acharya.ac.in', '1AY13IS010', 0, 1, 1, '', '', '', '', '', '', 0, '', '', 0, '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', 0, 0, '', '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00'),
('ANKESH PARAMANIK', 'AIT13BEIS100', '1AY13IS017', 9, '2017-04-11', 'male', 'indian', '1995-09-25', 'Room No. - 23, OM PG, Acharya Institutes, Soldevanahalli, Hesserghatta road', 'Room No. - 23, OM PG, Acharya Institutes, Soldevanahalli, Hesserghatta road', 'ankesh.beis.13@acharya.ac.in', '1AY13IS017', 7204787961, 0, 0, '', '', '', '', '', '', 0, '', '', 0, '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', 0, 0, '', '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00'),
('BIRENDRA PRASAD SINGH REKHA DEVI', 'AIT12BEDJ123', '1AY14WE432', 68, '2017-04-11', 'male', '', '0000-00-00', 'S/O BIRENDRA PRASAD SINGH, WARD NO. - 06, SUKHASAN, MADHEPURA, S.B.TOLI', '', 'kanha.beec.13@acharya.ac.in', '1AY14WE432', 0, 0, 0, '', '', '', '', '', '', 0, '', '', 0, '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', 0, 0, '', '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00'),
('', 'AAIR38JSHS93', '1AY15ER432', 68, '2017-04-11', 'male', '', '0000-00-00', '', '', 'anh.beis.13@acharya.ac.in', '1AY15ER432', 0, 2, 1, '', '', '', '', '', '', 0, '', '', 0, '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', 0, 0, '', '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 0, '', '0000-00-00'),
('jk', 'LJHFSHAS', '1AY16RE432', 68, '2017-04-11', 'male', '', '0000-00-00', 'S/O BIRENDRA PRASAD SINGH, WARD NO. - 06, SUKHASAN, MADHEPURA, S.B.TOLI', '', 'anhya.beec.13@acharya.ac.in', '1AY16RE432', 0, 2, 1, '', '', '', '', '', '', 0, '', '', 0, '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', 0, 0, '', '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 0, 0, 0, '', '0000-00-00'),
('ADHIR KUMAR PARAMANIK MAHAMAYA PARAMANIK', 'AIT38HEW', '1AY21SF321', 80, '2017-04-11', 'male', '', '0000-00-00', 'PROPERTY NO. - 699, GALI NO. - 7, GOVINDPURI, KALKAJI, NEW DELHI', '', 'keh.beis.13@acharya.ac.in', '1AY21SF321', 0, 1, 1, '', '', '', '', '', '', 0, '', '', 0, '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', 0, 0, '', '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, '', '0000-00-00'),
('ADHIR KUMAR PARAMANIK MAHAMAYA PARAMANIK', 'AIT38HE', '1AY21SF322', 80, '2017-04-11', 'male', '', '0000-00-00', 'PROPERTY NO. - 699, GALI NO. - 7, GOVINDPURI, KALKAJI, NEW DELHI', '', 'kesh.beis.13@acharya.ac.in', '1AY21SF322', 0, 1, 1, '', '', '', '', '', '', 0, '', '', 0, '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', 0, 0, '', '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, '', '0000-00-00'),
('ADHIR KUMAR PARAMANIK MAHAMAYA PARAMANIK', 'AIT38HEWWE', '1AY21SF334', 80, '2017-04-11', 'male', '', '0000-00-00', 'PROPERTY NO. - 699, GALI NO. - 7, GOVINDPURI, KALKAJI, NEW DELHI', '', 'kh.beis.13@acharya.ac.in', '1AY21SF334', 0, 1, 1, '', '', '', '', '', '', 0, '', '', 0, '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', 0, 0, '', '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, '', '0000-00-00'),
('', '1234WR', '1AY34DE345', 68, '2017-04-11', 'male', 'Indian', '0000-00-00', 'PROPERTY NO. - 699, GALI NO. - 7, GOVINDPURI, KALKAJI, NEW DELHI', '', 'ankeshrwerw.beis.13@acharya.ac.in', '1AY34DE345', 0, 1, 1, '', '', '', '', '', '', 0, '', '', 0, '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', 0, 0, '', '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00'),
('ADHIR KUMAR PARAMANIK MAHAMAYA PARAMANIK', 'SFASF', '1AY43WE342', 68, '2017-04-11', 'male', '', '0000-00-00', 'PROPERTY NO. - 699, GALI NO. - 7, GOVINDPURI, KALKAJI, NEW DELHI', '', 'ankeslkjljsh.beis.13@acharya.ac.in', '1AY43WE342', 0, 1, 1, '', '', '', '', '', '', 0, '', '', 0, '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', 0, 0, '', '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00'),
('ADHIR KUMAR PARAMANIK MAHAMAYA PARAMANIK', 'IUU2842', '1AY98HU788', 68, '2017-04-11', 'male', '', '0000-00-00', 'PROPERTY NO. - 699, GALI NO. - 7, GOVINDPURI, KALKAJI, NEW DELHI', '', 'ankslkfjlsh.beis.13@acharya.ac.in', '1AY98HU788', 0, 2, 1, '', '', '', '', '', '', 0, '', '', 0, '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', 0, 0, '', '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00');

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

--
-- Dumping data for table `student2`
--

INSERT INTO `student2` (`student_name`, `auid`, `usn`, `institute_department`, `date_of_admission`, `gender`, `nationality`, `date_of_birth`, `permanent_address`, `correspondence_address`, `student_email_id`, `student_password`, `student_mobile`, `category`, `nri_or_foreign_national`, `parent_guardian`, `parent_name`, `parent_occupation`, `parent_designation`, `parent_office_address`, `parent_email`, `parent_mobile`, `parent_pan_no`, `student_local_address`, `student_local_mobile`, `tenth_board`, `twelve_board`, `tenth_school`, `twelve_school`, `tenth_max_marks`, `twelve_max_marks`, `tenth_marks`, `twelve_marks`, `tenth_percentage`, `twelve_percentage`, `entrance_exam`, `entrance_state`, `entrance_year`, `entrance_score`, `pg_exam_name`, `pg_university`, `pg_passing_year`, `pg_subject1`, `pg_subject2`, `pg_subject3`, `pg_subject4`, `pg_subject5`, `pg_subject6`, `pg_marks_year1`, `pg_marks_year2`, `pg_marks_year3`, `pg_marks_year4`, `puc`, `sslc`, `tc`, `conduct_certificate`, `migration_certificate`, `entrance_scorecard`, `category_certificate`, `nri_or_foreign_certificate`, `total_amt`, `receipt_no`, `fees_paid_date`) VALUES
('', 'ait13beis100', '', 0, '0000-00-00', '', '', '0000-00-00', '', '', '', '', 0, 0, 0, '', '', '', '', '', '', 0, '', '', 0, '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', 0, 0, '', '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00'),
('', 'ait13beis100', '', 0, '0000-00-00', '', '', '0000-00-00', '', '', '', '', 0, 0, 0, '', '', '', '', '', '', 0, '', '', 0, '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', 0, 0, '', '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00'),
('', '', '1AY13IS017', 49, '2017-04-11', 'male', '', '0000-00-00', '', '', '', '1AY13IS017', 0, 1, 1, '', '', '', '', '', '', 0, '', '', 0, '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', 0, 0, '', '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00'),
('', '', '1AY13IS017', 68, '2017-04-11', 'male', '', '0000-00-00', '', '', '', '1AY13IS017', 0, 1, 1, '', '', '', '', '', '', 0, '', '', 0, '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', 0, 0, '', '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00'),
('', '', '1AY13IS006', 68, '2017-04-11', 'male', '', '0000-00-00', '', '', '', '1AY13IS006', 0, 1, 1, '', '', '', '', '', '', 0, '', '', 0, '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', 0, 0, '', '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00'),
('', '', '1AY13IS017', 9, '2017-04-11', 'male', '', '0000-00-00', '', '', '', '1AY13IS017', 0, 1, 1, '', '', '', '', '', '', 0, '', '', 0, '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', 0, 0, '', '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00'),
('', '', '1ay13is006', 4, '2017-04-11', 'male', '', '0000-00-00', '', '', '', '1ay13is006', 0, 1, 1, '', '', '', '', '', '', 0, '', '', 0, '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', 0, 0, '', '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00'),
('', '', '1ay13is017', 68, '2017-04-11', 'male', '', '0000-00-00', '', '', '', '1ay13is017', 0, 1, 1, '', '', '', '', '', '', 0, '', '', 0, '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', 0, 0, '', '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 0, '', '0000-00-00'),
('', '', '1AY13IS017', 79, '2017-04-11', 'male', '', '0000-00-00', '', '', '', '1AY13IS017', 0, 1, 1, '', '', '', '', '', '', 0, '', '', 0, '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', 0, 0, '', '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, '', '0000-00-00'),
('', '', '1ay13is006', 68, '2017-04-11', 'male', '', '0000-00-00', '', '', '', '1ay13is006', 0, 1, 1, '', '', '', '', '', '', 0, '', '', 0, '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', 0, 0, '', '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00'),
('', '', '1ay11me101', 68, '2017-04-11', 'male', '', '0000-00-00', '', '', '', '1ay11me101', 0, 1, 1, '', '', '', '', '', '', 0, '', '', 0, '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', 0, 0, '', '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00'),
('', '', '1ay13is006', 68, '2017-04-11', 'male', '', '0000-00-00', '', '', '', '1ay13is006', 0, 1, 1, '', '', '', '', '', '', 0, '', '', 0, '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', 0, 0, '', '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00'),
('', '', '1ay13is006', 67, '2017-04-11', 'male', '', '0000-00-00', '', '', '', '1ay13is006', 0, 1, 1, '', '', '', '', '', '', 0, '', '', 0, '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', 0, 0, '', '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00'),
('', '', '1ay13is006', 68, '2017-04-11', 'male', '', '0000-00-00', '', '', '', '1ay13is006', 0, 1, 1, '', '', '', '', '', '', 0, '', '', 0, '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', 0, 0, '', '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00'),
('', '', '1AY13IS017', 68, '2017-04-11', 'male', '', '0000-00-00', '', '', '', '1AY13IS017', 0, 1, 1, '', '', '', '', '', '', 0, '', '', 0, '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', 0, 0, '', '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00'),
('', '', '1ay13is006', 28, '2017-04-11', 'male', '', '0000-00-00', '', '', '', '1ay13is006', 0, 1, 1, '', '', '', '', '', '', 0, '', '', 0, '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', 0, 0, '', '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00'),
('', '', '1AY13IS017', 81, '2017-04-11', 'male', '', '0000-00-00', '', '', '', '1AY13IS017', 0, 1, 1, '', '', '', '', '', '', 0, '', '', 0, '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', 0, 0, '', '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00'),
('', '', '1AY13IS017', 68, '2017-04-11', 'male', '', '0000-00-00', '', '', '', '1AY13IS017', 0, 1, 1, '', '', '', '', '', '', 0, '', '', 0, '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', 0, 0, '', '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00'),
('', '', '1ay13is006', 62, '2017-04-11', 'male', '', '0000-00-00', '', '', '', '1ay13is006', 0, 1, 1, '', '', '', '', '', '', 0, '', '', 0, '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', 0, 0, '', '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00'),
('', '', '1ay13is017', 80, '2017-04-11', 'male', '', '0000-00-00', '', '', '', '1ay13is017', 0, 1, 1, '', '', '', '', '', '', 0, '', '', 0, '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', 0, 0, '', '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00'),
('', '', '1AY13IS017', 28, '2017-04-11', 'male', '', '0000-00-00', '', '', '', '1AY13IS017', 0, 1, 1, '', '', '', '', '', '', 0, '', '', 0, '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', 0, 0, '', '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00'),
('', '', '1AY12IS123', 79, '2017-04-11', 'male', '', '0000-00-00', '', '', '', '1AY12IS123', 0, 1, 1, '', '', '', '', '', '', 0, '', '', 0, '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', 0, 0, '', '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00'),
('', '', '1AY13IS017', 9, '2017-04-12', 'male', '', '0000-00-00', '', '', '', '1AY13IS017', 0, 1, 1, '', '', '', '', '', '', 0, '', '', 0, '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', 0, 0, '', '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00'),
('', '', '1ay13is017', 79, '2017-04-12', 'male', '', '0000-00-00', '', '', '', '1ay13is017', 0, 1, 1, '', '', '', '', '', '', 0, '', '', 0, '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', 0, 0, '', '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00'),
('ANKESH PARAMANIK', 'AIT13BEIS100', '1AY13IS017', 9, '2017-04-12', 'male', 'indian', '2017-04-07', 'Room No. - 23, OM PG, Acharya Institutes, Soldevanahalli, Hesserghatta road', 'Room No. - 23, OM PG, Acharya Institutes, Soldevanahalli, Hesserghatta road', 'ankesh.beis.13@acharya.ac.in', '1AY13IS017', 7204787961, 2, 1, 'Father', 'a k paramanik', 'service', 'gm', 'Room No. - 23, OM PG, Acharya Institutes, Soldevanahalli, Hesserghatta road', 'ank.paramanik@gmail.com', 234455654, '', 'Room No. - 23, OM PG, Acharya Institutes, Soldevanahalli, Hesserghatta road', 7204787961, 'fsdj', 'dhfksfhk', 'dkjfhask', 'dfhshk', 900, 500, 721, 378, 80.11111111111111, 75.6, 'COMEDK', 'Karnataka', 2013, 67, '', '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 198272, '12345', '2013-07-31'),
('', '', '1AY13IS017', 2, '2017-04-12', 'male', '', '0000-00-00', '', '', '', '1AY13IS017', 0, 1, 1, '', '', '', '', '', '', 0, '', '', 0, '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', 0, 0, '', '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00'),
('', '', '1AY13IS017', 80, '2017-04-13', 'male', '', '0000-00-00', '', '', '@acharya.ac.in', '1AY13IS017', 0, 1, 1, '', '', '', '', '', '', 0, '', '', 0, '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', 0, 0, '', '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00'),
('', '', '1AY11ME101', 71, '2017-04-13', 'male', '', '0000-00-00', '', '', '@acharya.ac.in', '1AY11ME101', 0, 1, 1, '', '', '', '', '', '', 0, '', '', 0, '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', 0, 0, '', '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00'),
('', '', '1AY13IS006', 80, '2017-04-13', 'male', '', '0000-00-00', '', '', '@acharya.ac.in', '1AY13IS006', 0, 1, 1, '', '', '', '', '', '', 0, '', '', 0, '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', 0, 0, '', '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00'),
('', '', '1AY11ME101', 62, '2017-04-13', 'male', '', '0000-00-00', '', '', '@acharya.ac.in', '1AY11ME101', 0, 1, 1, '', '', '', '', '', '', 0, '', '', 0, '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', 0, 0, '', '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00'),
('', 'AIT13BEIS100', '1AY11ME101', 61, '2017-04-13', 'male', '', '0000-00-00', '', '', '@acharya.ac.in', '1AY11ME101', 0, 1, 1, '', '', '', '', '', '', 0, '', '', 0, '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', 0, 0, '', '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00'),
('', '', '1AY13IS017', 68, '2017-04-13', 'male', '', '0000-00-00', '', '', '@acharya.ac.in', '1AY13IS017', 0, 1, 1, '', '', '', '', '', '', 0, '', '', 0, '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', 0, 0, '', '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00'),
('', '', '1AY11ME101', 80, '2017-04-13', 'male', '', '0000-00-00', '', '', 'ankesh.becs.13@acharya.ac.in', '1AY11ME101', 0, 1, 1, '', '', '', '', '', '', 0, '', '', 0, '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', 0, 0, '', '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00'),
('', '', '1AY13IS017', 80, '2017-04-13', 'male', '', '0000-00-00', '', '', '@acharya.ac.in', '1AY13IS017', 0, 1, 1, '', '', '', '', '', '', 0, '', '', 0, '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', 0, 0, '', '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00'),
('', '', '1AY11ME101', 28, '2017-04-13', 'male', '', '0000-00-00', '', '', '@acharya.ac.in', '1AY11ME101', 0, 1, 1, '', '', '', '', '', '', 0, '', '', 0, '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', 0, 0, '', '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00'),
('', '', '1AY13IS007', 80, '2017-04-13', 'male', '', '0000-00-00', '', '', '@acharya.ac.in', '1AY13IS007', 0, 1, 1, '', '', '', '', '', '', 0, '', '', 0, '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', 0, 0, '', '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00'),
('asfg', '', '1AY11ME108', 67, '2017-04-13', 'male', '', '0000-00-00', '', '', '@acharya.ac.in', '1AY11ME108', 0, 1, 1, '', '', '', '', '', '', 0, '', '', 0, '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', 0, 0, '', '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00');

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
('10CS82', 2010, 'SYSTEM MODELING AND SIMULATION', 9),
('10EC81', 2010, 'WIRELESS COMMUNICATION', 8),
('10EC82', 2010, 'DIGITAL SWITCHING SYSTEMS', 8),
('10IS81', 2010, 'SOFTWARE ARCHITECTURES', 9),
('14MBA MM407', 2010, 'SALES MANAGEMENT', 62);

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
