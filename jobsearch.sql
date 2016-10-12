-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2014 at 03:35 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jobsearch`
--
CREATE DATABASE IF NOT EXISTS `jobsearch` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `jobsearch`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `UserName` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`UserName`, `Password`) VALUES
('Admin', 'jobsearch');

-- --------------------------------------------------------

--
-- Table structure for table `authetication`
--

CREATE TABLE IF NOT EXISTS `authetication` (
  `UserName` varchar(30) NOT NULL DEFAULT '',
  `Password` varchar(30) NOT NULL,
  PRIMARY KEY (`UserName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authetication`
--

INSERT INTO `authetication` (`UserName`, `Password`) VALUES
('13mcmc01', 'qqq'),
('13mcmc05', 'abcde'),
('13mcmc27', '123'),
('13mcmc72', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `Email` varchar(50) DEFAULT NULL,
  `Address` varchar(50) DEFAULT NULL,
  `Phone` int(11) DEFAULT NULL,
  `RollNo` varchar(10) DEFAULT NULL,
  KEY `RollNo` (`RollNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`Email`, `Address`, `Phone`, `RollNo`) VALUES
('raj@gmail.com', 'Uoh Mh f', 2147483647, '13mcmc05'),
('ali.ahmad@gmail.com', 'uoh tagore', 2345678, '13mcmc01'),
('nilotpal@gmail.com', 'uoh mh f', 833456789, '13mcmc27'),
('zzz@yahoo.com', 'UOH J', 2147483647, '13mcmc72');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE IF NOT EXISTS `job` (
  `JobId` varchar(10) NOT NULL DEFAULT '',
  `CompanyName` varchar(20) NOT NULL,
  `JobTitle` varchar(30) NOT NULL,
  `Location` varchar(30) NOT NULL,
  `Criteria` varchar(50) NOT NULL,
  `Timing` varchar(20) NOT NULL,
  PRIMARY KEY (`JobId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`JobId`, `CompanyName`, `JobTitle`, `Location`, `Criteria`, `Timing`) VALUES
('JB101', 'Google', 'Developer', 'Hyderabad', 'MCA', '10:00am - 05:30pm'),
('JB102', 'Microsoft', 'Software Analyst', 'Chennai', 'MCA,MTech', '10:00am - 06:30pm'),
('JB103', 'Oracle', 'Database Administrator', 'Hyderabad', 'MCA', '10:00am - 06:30pm');

-- --------------------------------------------------------

--
-- Table structure for table `qualifications`
--

CREATE TABLE IF NOT EXISTS `qualifications` (
  `HighSc` varchar(30) NOT NULL,
  `BoardSc` varchar(10) NOT NULL,
  `ScMarks` int(11) NOT NULL,
  `ScPerc` varchar(5) NOT NULL,
  `Graduation` varchar(10) NOT NULL,
  `GradUniv` varchar(30) NOT NULL,
  `GradMarks` int(11) NOT NULL,
  `GradPerc` varchar(5) NOT NULL,
  `PG` varchar(10) NOT NULL,
  `PGUniv` varchar(30) NOT NULL,
  `PGMarks` int(11) NOT NULL,
  `CGPA` varchar(5) NOT NULL,
  `RegNo` varchar(10) DEFAULT NULL,
  KEY `RegNo` (`RegNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qualifications`
--

INSERT INTO `qualifications` (`HighSc`, `BoardSc`, `ScMarks`, `ScPerc`, `Graduation`, `GradUniv`, `GradMarks`, `GradPerc`, `PG`, `PGUniv`, `PGMarks`, `CGPA`, `RegNo`) VALUES
('Tagore Int', 'CBSE', 678, '87', 'ANDC', 'DU', 778, '89', 'UOH', 'UOH', 756, '9\r\n  ', '13mcmc27'),
('DAV', 'CBSE', 400, '80', 'OU', 'OU', 340, '75', 'UOH', 'UOH', 560, '8.3\r\n', '13mcmc01'),
('DPS', 'CBSE', 450, '90', 'DU', 'DU', 356, '71', 'UOH', 'UOH', 390, '8\r\n  ', '13mcmc05'),
('Al-manara', 'Al-manara', 567, '67', 'OU', 'OU', 675, '72', 'UOH', 'UOH', 654, '8\r\n  ', '13mcmc72');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `RollNo` varchar(10) NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `MiddleName` varchar(20) DEFAULT NULL,
  `LastName` varchar(20) NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `DOB` date NOT NULL,
  PRIMARY KEY (`RollNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`RollNo`, `FirstName`, `MiddleName`, `LastName`, `Gender`, `DOB`) VALUES
('13mcmc01', 'Ali', 'Ahmed', 'Omer', 'male', '1992-04-02'),
('13mcmc05', 'Raj', 'R', 'Raushan', 'male', '1990-12-05'),
('13mcmc27', 'Nilotpal', 'N', 'Neil', 'male', '1970-07-03'),
('13mcmc72', 'Osman', 'Mohamed', 'Ibrahim', 'male', '1990-04-02');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_ibfk_1` FOREIGN KEY (`RollNo`) REFERENCES `student` (`RollNo`) ON DELETE CASCADE;

--
-- Constraints for table `qualifications`
--
ALTER TABLE `qualifications`
  ADD CONSTRAINT `qualifications_ibfk_1` FOREIGN KEY (`RegNo`) REFERENCES `student` (`RollNo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
