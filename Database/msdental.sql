-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2022 at 06:46 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `msdental`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `A_ID` int(11) NOT NULL,
  `TimeSlot` time NOT NULL,
  `Date` date NOT NULL,
  `S_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `D_Id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Speciality` varchar(50) NOT NULL,
  `Hours` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `Address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `P_Id` int(11) NOT NULL,
  `R_Id` int(11) NOT NULL,
  `D_Id` int(11) NOT NULL,
  `Problem` varchar(100) NOT NULL,
  `A_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `R_Id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `Address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `revenue`
--

CREATE TABLE `revenue` (
  `R_ID` int(11) NOT NULL,
  `A_ID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `S_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `S_ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Fees` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`A_ID`),
  ADD KEY `fk_s_id` (`S_ID`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`D_Id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`P_Id`),
  ADD KEY `fk_r_id` (`R_Id`),
  ADD KEY `fk_d_id` (`D_Id`),
  ADD KEY `f_a_id` (`A_ID`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`R_Id`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `revenue`
--
ALTER TABLE `revenue`
  ADD PRIMARY KEY (`R_ID`),
  ADD KEY `fk_s1_id` (`S_ID`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`S_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `fk_s_id` FOREIGN KEY (`S_ID`) REFERENCES `services` (`S_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `f_a_id` FOREIGN KEY (`A_ID`) REFERENCES `appointment` (`A_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_d_id` FOREIGN KEY (`D_Id`) REFERENCES `doctor` (`D_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_r_id` FOREIGN KEY (`R_Id`) REFERENCES `registration` (`R_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `revenue`
--
ALTER TABLE `revenue`
  ADD CONSTRAINT `fk_s1_id` FOREIGN KEY (`S_ID`) REFERENCES `services` (`S_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
