-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql208.infinityfree.com
-- Generation Time: Dec 06, 2024 at 08:06 AM
-- Server version: 10.6.19-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_37517235_skcinventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `Equipment`
--

CREATE TABLE `Equipment` (
  `Equipment_id` int(11) NOT NULL,
  `Equipment_name` char(1) NOT NULL,
  `Equipment_type_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Equipment_Type`
--

CREATE TABLE `Equipment_Type` (
  `Equipment_type_id` int(11) NOT NULL,
  `Type_name` char(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `Equipment_Type`
--

INSERT INTO `Equipment_Type` (`Equipment_type_id`, `Type_name`) VALUES
(1, 'Arnis');

-- --------------------------------------------------------

--
-- Table structure for table `Logs`
--

CREATE TABLE `Logs` (
  `Logs_id` int(11) NOT NULL,
  `status` char(1) NOT NULL,
  `quantity` int(11) NOT NULL,
  `Equipment_id` int(11) DEFAULT NULL,
  `Student_id` char(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Stock`
--

CREATE TABLE `Stock` (
  `id` int(11) NOT NULL,
  `Stocks` int(11) NOT NULL,
  `Borrow` int(11) NOT NULL,
  `Damaged` int(11) NOT NULL,
  `Total_quantity` int(11) NOT NULL,
  `Equipment_id` int(11) DEFAULT NULL,
  `Logs_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblaccount`
--

CREATE TABLE `tblaccount` (
  `Student_id` char(128) NOT NULL,
  `Lastname` char(128) NOT NULL,
  `Firstname` char(128) NOT NULL,
  `Address` varchar(128) NOT NULL,
  `Fullname` char(128) NOT NULL,
  `Pass` char(128) NOT NULL,
  `Email_Address` varchar(128) NOT NULL,
  `Mobile_Number` bigint(24) NOT NULL,
  `Usertype` char(128) NOT NULL DEFAULT 'Student'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblaccount`
--

INSERT INTO `tblaccount` (`Student_id`, `Lastname`, `Firstname`, `Address`, `Fullname`, `Pass`, `Email_Address`, `Mobile_Number`, `Usertype`) VALUES
('21-10000', 'Green', 'Fred', 'N/A', 'Fred Green', '!#Adviser01', 'fredgreen@gmail.com', 9423769354, 'Adviser'),
('21-10001', 'Andres', 'Falco', 'N/A', 'Falco Andres', '!#Members01', 'Andresfalco@gmail.com', 9245837261, 'Members'),
('21-10002', 'Fernando', 'Grace', 'N/A', 'Grace Fernando', '!#Student01', 'gracefernando@gmail.com', 9248491721, 'Student'),
('21-10003', 'Gracela', 'John Mark', 'Zone 5, Bulan Sorsogon', 'John Mark Gracela', '!#Officer01', 'johnmarkgracela@gmail.com', 9234874362, 'Officers'),
('21-10685', 'Madrona', 'Harvey', 'Zone 8, Bulan Sorsogon', 'Harvey Madrona', '!#Default01', 'harvella20@gmail.com', 9248237412, 'Athlete'),
('21-10999', 'Gelbert', 'Gojit', 'Aquino, Bulan Sorsogon', 'Gelbert Gojit', '!#Admin01', 'gojitgelbert@sorsu.edu.ph', 9123456789, 'Admin'),
('21-11111', 'unknown', 'anonymous', 'N/A', 'anonymous unknown', '!#Admin01', 'n/a@gmail.com', 639, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Equipment`
--
ALTER TABLE `Equipment`
  ADD PRIMARY KEY (`Equipment_id`),
  ADD KEY `Equipment_type_id` (`Equipment_type_id`);

--
-- Indexes for table `Equipment_Type`
--
ALTER TABLE `Equipment_Type`
  ADD PRIMARY KEY (`Equipment_type_id`);

--
-- Indexes for table `Logs`
--
ALTER TABLE `Logs`
  ADD PRIMARY KEY (`Logs_id`),
  ADD KEY `Equipment_id` (`Equipment_id`),
  ADD KEY `Student_id` (`Student_id`);

--
-- Indexes for table `Stock`
--
ALTER TABLE `Stock`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Equipment_id` (`Equipment_id`),
  ADD KEY `Logs_id` (`Logs_id`);

--
-- Indexes for table `tblaccount`
--
ALTER TABLE `tblaccount`
  ADD PRIMARY KEY (`Student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Equipment_Type`
--
ALTER TABLE `Equipment_Type`
  MODIFY `Equipment_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
