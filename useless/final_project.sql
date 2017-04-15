-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2017 at 03:36 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final_project`
--

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
('ankesh.beis.13@acharya.ac.in', '5b8515c9b0a5ddf332daaef4a5db3468');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `dob` date NOT NULL,
  `doa` date NOT NULL,
  `studentCountryCode` varchar(60) NOT NULL,
  `studentPhone` varchar(20) NOT NULL,
  `parentCountryCode` varchar(60) NOT NULL,
  `parentPhone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `quota` varchar(10) NOT NULL,
  `permanentAddress` varchar(255) NOT NULL,
  `currentAddress` varchar(255) NOT NULL,
  `level` int(1) NOT NULL DEFAULT '6'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`fname`, `mname`, `lname`, `gender`, `dob`, `doa`, `studentCountryCode`, `studentPhone`, `parentCountryCode`, `parentPhone`, `email`, `quota`, `permanentAddress`, `currentAddress`, `level`) VALUES
('ANKESH', '', 'PARAMANIK', 'male', '1995-09-25', '2013-08-12', '91', '07204787961', '91', '7204787961', 'ankesh.beis.13@acharya.ac.in', 'COMEDK', 'Room No. - 23, OM PG, Acharya Institutes, Soldevanahalli, Hesserghatta road', 'Room No. - 23, OM PG, Acharya Institutes, Soldevanahalli, Hesserghatta road', 6),
('ANKESH', '', 'PARAMANIK', 'male', '2017-03-02', '2017-03-02', '91', '07204787961', '91', '7204787961', 'kanhaiya.beec.13@acharya.ac.in', 'CET', 'S/O BIRENDRA PRASAD SINGH, WARD NO. - 06, SUKHASAN, MADHEPURA, S.B.TOLI', 'S/O BIRENDRA PRASAD SINGH, WARD NO. - 06, SUKHASAN, MADHEPURA, S.B.TOLI', 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `password`) VALUES
('ankesh.beis.13@acharya.ac.in', 'password');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `forgotpasswordusers`
--
ALTER TABLE `forgotpasswordusers`
  ADD KEY `email` (`email`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
