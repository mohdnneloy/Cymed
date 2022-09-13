-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2022 at 05:40 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cymed`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` bigint(20) NOT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(15) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` varchar(7) DEFAULT NULL,
  `contact_no` varchar(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `supervisor` bigint(20) DEFAULT NULL,
  `join_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `first_name`, `last_name`, `date_of_birth`, `gender`, `contact_no`, `email`, `password`, `supervisor`, `join_date`) VALUES
(100000000001, 'John', 'Bryan', '1995-11-08', 'Male', '01625563988', 'john.bryan@gmail.com', 'cb6f3b8fa1aa7248aee240f594448a39', NULL, '2022-08-18');

-- --------------------------------------------------------

--
-- Table structure for table `adminvkeys`
--

CREATE TABLE `adminvkeys` (
  `kid` int(11) NOT NULL,
  `admin_verification_key` varchar(7) NOT NULL,
  `key_generated_date` date NOT NULL,
  `generated_by_admin_aid` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `apid` int(11) NOT NULL,
  `serial_no` int(11) NOT NULL,
  `pid` bigint(20) NOT NULL,
  `did` bigint(20) NOT NULL,
  `ap_date` date NOT NULL,
  `ap_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `appointment_save`
--

CREATE TABLE `appointment_save` (
  `apid` int(11) NOT NULL,
  `serial_no` int(11) NOT NULL,
  `pid` bigint(20) NOT NULL,
  `did` bigint(20) NOT NULL,
  `ap_date` date NOT NULL,
  `ap_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `did` bigint(11) NOT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(15) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` varchar(7) DEFAULT NULL,
  `contact_no` varchar(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `designation` varchar(50) DEFAULT NULL,
  `qualification` varchar(50) DEFAULT NULL,
  `university` varchar(50) DEFAULT NULL,
  `experience_years` int(11) DEFAULT NULL,
  `sunday` tinyint(11) DEFAULT 0,
  `monday` tinyint(4) DEFAULT 0,
  `tuesday` tinyint(4) DEFAULT 0,
  `wednesday` tinyint(4) NOT NULL DEFAULT 0,
  `thursday` tinyint(4) NOT NULL DEFAULT 0,
  `friday` tinyint(4) NOT NULL DEFAULT 0,
  `saturday` tinyint(4) NOT NULL DEFAULT 0,
  `start_time` time DEFAULT NULL,
  `finish_time` time DEFAULT NULL,
  `admin_creator_aid` bigint(11) DEFAULT NULL,
  `join_date` date DEFAULT NULL,
  `doctor_initial` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `pid` bigint(11) NOT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(15) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` varchar(7) DEFAULT NULL,
  `contact_no` varchar(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `join_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `prid` int(11) NOT NULL,
  `apid` int(11) NOT NULL,
  `pid` bigint(20) NOT NULL,
  `did` bigint(20) NOT NULL,
  `symptoms` text NOT NULL,
  `pos` text NOT NULL,
  `tests` text NOT NULL,
  `medicines` text NOT NULL,
  `prescription_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`),
  ADD KEY `supervisor_constraint` (`supervisor`);

--
-- Indexes for table `adminvkeys`
--
ALTER TABLE `adminvkeys`
  ADD PRIMARY KEY (`kid`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`apid`),
  ADD KEY `pid` (`pid`),
  ADD KEY `did` (`did`);

--
-- Indexes for table `appointment_save`
--
ALTER TABLE `appointment_save`
  ADD PRIMARY KEY (`apid`),
  ADD KEY `pid` (`pid`),
  ADD KEY `did` (`did`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`did`),
  ADD UNIQUE KEY `doctor_initial` (`doctor_initial`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`prid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `apid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `appointment_save`
--
ALTER TABLE `appointment_save`
  MODIFY `apid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `prid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `supervisor_constraint` FOREIGN KEY (`supervisor`) REFERENCES `admin` (`aid`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `patient` (`pid`) ON UPDATE CASCADE,
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`did`) REFERENCES `doctor` (`did`) ON UPDATE CASCADE;

--
-- Constraints for table `appointment_save`
--
ALTER TABLE `appointment_save`
  ADD CONSTRAINT `appointment_save_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `patient` (`pid`) ON UPDATE CASCADE,
  ADD CONSTRAINT `appointment_save_ibfk_2` FOREIGN KEY (`did`) REFERENCES `doctor` (`did`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
