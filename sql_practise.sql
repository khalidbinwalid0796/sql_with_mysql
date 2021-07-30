-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2021 at 09:38 AM
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
-- Database: `sql_practise`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `d_id` int(11) NOT NULL,
  `d_name` varchar(255) NOT NULL,
  `d_location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`d_id`, `d_name`, `d_location`) VALUES
(1, 'cse', 'dhaka'),
(2, 'eee', 'dhaka'),
(3, 'te', 'jessore'),
(4, 'mc', 'khulna');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `salary` bigint(20) NOT NULL,
  `dept` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `d_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `age`, `salary`, `dept`, `gender`, `d_id`) VALUES
(1, 'sakib', 35, 35000, 'all-rounder', 'male', 1),
(2, 'tamim', 34, 30, 'batsman', 'male', 2),
(3, 'Runa', 25, 25000, 'all-rounder', 'female', 3),
(4, 'salma', 25, 20000, 'batsman', 'female', 4),
(5, 'samim', 25, 22000, 'batsman', 'male', 1),
(6, 'taijul', 25, 20000, 'bowling', 'male', 2);

-- --------------------------------------------------------

--
-- Table structure for table `employeedetail`
--

CREATE TABLE `employeedetail` (
  `EmployeeID` int(11) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `Salary` bigint(20) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `Gender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employeedetail`
--

INSERT INTO `employeedetail` (`EmployeeID`, `FirstName`, `Salary`, `Department`, `Gender`) VALUES
(1, 'sakib', 60000, 'it', 'male');

-- --------------------------------------------------------

--
-- Stand-in structure for view `female_employee`
-- (See below for the actual view)
--
CREATE TABLE `female_employee` (
`name` varchar(255)
,`salary` bigint(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `persons`
--

CREATE TABLE `persons` (
  `PersonID` int(11) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `City` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `persons`
--

INSERT INTO `persons` (`PersonID`, `LastName`, `FirstName`, `Address`, `City`) VALUES
(1, 'iqbal', 'tamim', 'chitta', 'chittagong');

-- --------------------------------------------------------

--
-- Table structure for table `projectdetail`
--

CREATE TABLE `projectdetail` (
  `ProjectDetailID` int(11) NOT NULL,
  `EmployeeDetailID` int(11) NOT NULL,
  `ProjectName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure for view `female_employee`
--
DROP TABLE IF EXISTS `female_employee`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `female_employee`  AS SELECT `employee`.`name` AS `name`, `employee`.`salary` AS `salary` FROM `employee` WHERE `employee`.`gender` = 'female' ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employeedetail`
--
ALTER TABLE `employeedetail`
  ADD PRIMARY KEY (`EmployeeID`);

--
-- Indexes for table `projectdetail`
--
ALTER TABLE `projectdetail`
  ADD PRIMARY KEY (`ProjectDetailID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employeedetail`
--
ALTER TABLE `employeedetail`
  MODIFY `EmployeeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `projectdetail`
--
ALTER TABLE `projectdetail`
  MODIFY `ProjectDetailID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
