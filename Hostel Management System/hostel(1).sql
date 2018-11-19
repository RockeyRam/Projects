-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2018 at 06:23 AM
-- Server version: 5.6.37
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hostel`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admin`
--

CREATE TABLE IF NOT EXISTS `Admin` (
  `Email` varchar(20) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Admin`
--

INSERT INTO `Admin` (`Email`, `Name`, `Password`) VALUES
('jayasri@gmail.com', 'Jayasri', 'admin'),
('santhiya@gmail.com', 'Santhiya', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `Employee`
--

CREATE TABLE IF NOT EXISTS `Employee` (
  `Empid` int(11) NOT NULL,
  `EmpName` varchar(20) NOT NULL,
  `Gender` varchar(20) NOT NULL,
  `ContactNumber` bigint(20) NOT NULL,
  `Address` varchar(20) NOT NULL,
  `Occupation` varchar(11) NOT NULL,
  `Salary` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Employee`
--

INSERT INTO `Employee` (`Empid`, `EmpName`, `Gender`, `ContactNumber`, `Address`, `Occupation`, `Salary`) VALUES
(1, 'Arun', 'male', 9978766890, 'Coimbatore', 'Cleaner', 20000),
(3, 'Varun', 'Male', 9978766892, 'Coimbatore', 'Cleaner', 20000),
(4, 'Jeeva', '', 90325465767, 'cbe', 'Cleaner', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `Notification`
--

CREATE TABLE IF NOT EXISTS `Notification` (
  `Name` varchar(20) NOT NULL,
  `Dateofmsg` varchar(20) NOT NULL,
  `Message` text NOT NULL,
  `RegNo` varchar(11) NOT NULL,
  `Email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Notification`
--

INSERT INTO `Notification` (`Name`, `Dateofmsg`, `Message`, `RegNo`, `Email`) VALUES
('Revathi', '29.03.2018 Thursday ', 'Hello Sir I want to change my room', '3', 'revathi@gmail.com'),
('Revathi', '29.03.2018 Thursday ', 'I quit from the Hostel\r\n', '3', 'revathi@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `Room`
--

CREATE TABLE IF NOT EXISTS `Room` (
  `RoomNo` varchar(5) NOT NULL,
  `FeesPayment` bigint(10) NOT NULL,
  `FoodStatus` varchar(10) NOT NULL,
  `StayFrom` date NOT NULL,
  `Duration` varchar(10) NOT NULL,
  `RegNo` varchar(11) NOT NULL,
  `Email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Room`
--

INSERT INTO `Room` (`RoomNo`, `FeesPayment`, `FoodStatus`, `StayFrom`, `Duration`, `RegNo`, `Email`) VALUES
('A1', 15000, 'Available', '0000-00-00', '1 Year', '001', 'sandhya@gmail.com'),
('A2', 12000, 'Avail', '2018-01-24', '1 Year', '1', 'arun@gmail.com'),
('A1', 12000, 'Avail', '2017-11-03', '1 Year', '2', 'ram@gmail.com'),
('A1', 15000, 'Avail', '2018-01-06', '1 Year', '3', 'revathi@gmail.com'),
('A1', 13000, 'Avail', '2018-01-20', '1 Year', '4', 'devaki@gmail.com'),
('A1', 14000, 'Avail', '2018-02-17', '1 Year', '5', 'suji@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `RegNo` varchar(12) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Course` varchar(20) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `ContactNo` bigint(10) NOT NULL,
  `ParentName` varchar(30) NOT NULL,
  `ParentContactNo` bigint(10) NOT NULL,
  `Address` text NOT NULL,
  `City` varchar(20) NOT NULL,
  `State` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`RegNo`, `Name`, `Email`, `Password`, `Course`, `Gender`, `ContactNo`, `ParentName`, `ParentContactNo`, `Address`, `City`, `State`) VALUES
('001', 'sandhya', 'sandhya@gmail.com', 'sandhya', 'B.Sc Computer Scienc', 'Female', 9790386927, 'rangasamy', 8870545990, 'Coimbatore', 'coimbatore', 'tamilnadu'),
('3', 'Revathi', 'revathi@gmail.com', 'revathi', 'B.sc Maths', 'Male', 9978085412, 'Kumar', 8878967867, 'Coimbatore', 'Coimbatore', 'Tamilnadu'),
('4', 'Devaki', 'devaki@gmail.com', 'devaki', 'B.Sc Computer Scienc', 'Female', 9987980807, 'Devaraj', 9988876879, 'Coimbatore', 'Coimbatore', 'Tamilnadu'),
('5', 'Suji ', 'suji@gmail.com', 'suji', 'B.Sc Computer Scienc', 'Female', 9998977682, 'Sundhar', 7899066572, 'Coimbatore', 'Coimbatore', 'Tamilnadu');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `RegNo` varchar(12) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`RegNo`, `Email`, `Password`) VALUES
('001', 'sandhya@gmail.com', 'sandhya'),
('1', 'arun@gmail.com', 'Arun'),
('2', 'ram@gmail.com', 'ram'),
('3', 'revathi@gmail.com', 'revathi'),
('4', 'devaki@gmail.com', 'devaki'),
('5', 'suji@gmail.com', 'suji');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `Employee`
--
ALTER TABLE `Employee`
  ADD PRIMARY KEY (`Empid`),
  ADD UNIQUE KEY `ContactNumber` (`ContactNumber`);

--
-- Indexes for table `Room`
--
ALTER TABLE `Room`
  ADD PRIMARY KEY (`RegNo`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `RegNo` (`RegNo`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`RegNo`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `RegNo` (`RegNo`),
  ADD UNIQUE KEY `ContactNo` (`ContactNo`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`RegNo`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `RegNo` (`RegNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Employee`
--
ALTER TABLE `Employee`
  MODIFY `Empid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
