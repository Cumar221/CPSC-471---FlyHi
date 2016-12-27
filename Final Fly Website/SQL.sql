-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 16, 2016 at 02:41 AM
-- Server version: 5.6.33
-- PHP Version: 7.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `FlyHi`
--
CREATE DATABASE IF NOT EXISTS `FlyHi` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `FlyHi`;

-- --------------------------------------------------------

--
-- Table structure for table `Airplane`
--

CREATE TABLE `Airplane` (
  `AirplaneID` int(11) NOT NULL,
  `AirplanePosition` varchar(11) NOT NULL,
  `Baggage` varchar(11) NOT NULL,
  `NextFlight` varchar(11) NOT NULL,
  `Fuel` int(11) NOT NULL,
  `AirplaneType` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Airplane`
--

INSERT INTO `Airplane` (`AirplaneID`, `AirplanePosition`, `Baggage`, `NextFlight`, `Fuel`, `AirplaneType`) VALUES
(1, '1', '1', '1', 2, '1'),
(100, 'Calgary', '10050', 'Edmonton', 50010, 'Boeing');

-- --------------------------------------------------------

--
-- Table structure for table `Airport`
--

CREATE TABLE `Airport` (
  `ACODE` int(11) NOT NULL,
  `ANAME` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL,
  `Country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Airport`
--

INSERT INTO `Airport` (`ACODE`, `ANAME`, `City`, `Country`) VALUES
(100, 'Calgary Intl Airport', 'calgary', 'canada');

-- --------------------------------------------------------

--
-- Table structure for table `Buys`
--

CREATE TABLE `Buys` (
  `OrderNo` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `TicketNumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Buys`
--

INSERT INTO `Buys` (`OrderNo`, `ID`, `TicketNumber`) VALUES
(1, 2, 1),
(2, 2, 2),
(3, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `Customer`
--

CREATE TABLE `Customer` (
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Customer`
--

INSERT INTO `Customer` (`ID`) VALUES
(2),
(3),
(4);

-- --------------------------------------------------------

--
-- Table structure for table `CustomerService`
--

CREATE TABLE `CustomerService` (
  `SSN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Employee`
--

CREATE TABLE `Employee` (
  `SSN` int(11) NOT NULL,
  `Location` varchar(11) NOT NULL,
  `Tenure` int(11) NOT NULL,
  `HoursSinceRest` int(11) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Employee`
--

INSERT INTO `Employee` (`SSN`, `Location`, `Tenure`, `HoursSinceRest`, `ID`) VALUES
(667667667, 'Calgary', 0, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `Fixes`
--

CREATE TABLE `Fixes` (
  `ID` int(11) NOT NULL,
  `SSN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Person`
--

CREATE TABLE `Person` (
  `FirstName` varchar(11) NOT NULL,
  `LastName` varchar(11) NOT NULL,
  `IsMinor` tinyint(1) NOT NULL,
  `Location` varchar(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `Username` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Person`
--

INSERT INTO `Person` (`FirstName`, `LastName`, `IsMinor`, `Location`, `ID`, `Username`) VALUES
('Hilmi', 'Abou-Saleh', 0, 'Calgary', 1, ''),
('Tom', 'Frank', 0, 'Edmonton', 2, NULL),
('Tom', 'Hanks', 1, 'Cali', 3, NULL),
('Animesh', 'Gupta', 1, 'yt', 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Problem`
--

CREATE TABLE `Problem` (
  `PTIME` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `PTYPE` int(11) NOT NULL,
  `PDescription` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Problem`
--

INSERT INTO `Problem` (`PTIME`, `ID`, `PTYPE`, `PDescription`) VALUES
(2147483647, 2, 0, ''),
(0, 3, 11, '');

-- --------------------------------------------------------

--
-- Table structure for table `Repair`
--

CREATE TABLE `Repair` (
  `AirplaneID` int(11) NOT NULL,
  `ServiceNumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Service`
--

CREATE TABLE `Service` (
  `WorkPreformed` varchar(11) NOT NULL,
  `ServiceNumber` int(11) NOT NULL,
  `GoodUntil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Tech`
--

CREATE TABLE `Tech` (
  `SSN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Ticket`
--

CREATE TABLE `Ticket` (
  `TicketNumber` int(11) NOT NULL,
  `Seat` int(11) NOT NULL,
  `FlightNumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Ticket`
--

INSERT INTO `Ticket` (`TicketNumber`, `Seat`, `FlightNumber`) VALUES
(1, 10, 100),
(2, 31, 41),
(3, 32, 11);

-- --------------------------------------------------------

--
-- Table structure for table `Works_At`
--

CREATE TABLE `Works_At` (
  `SSN` int(11) NOT NULL,
  `ACODE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Works_on`
--

CREATE TABLE `Works_on` (
  `ServiceNumber` int(11) NOT NULL,
  `SSN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Airplane`
--
ALTER TABLE `Airplane`
  ADD PRIMARY KEY (`AirplaneID`);

--
-- Indexes for table `Airport`
--
ALTER TABLE `Airport`
  ADD PRIMARY KEY (`ACODE`);

--
-- Indexes for table `Buys`
--
ALTER TABLE `Buys`
  ADD PRIMARY KEY (`OrderNo`),
  ADD KEY `buys_ibfk_1` (`ID`),
  ADD KEY `buys_ibfk_2` (`TicketNumber`);

--
-- Indexes for table `Customer`
--
ALTER TABLE `Customer`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `CustomerService`
--
ALTER TABLE `CustomerService`
  ADD PRIMARY KEY (`SSN`);

--
-- Indexes for table `Employee`
--
ALTER TABLE `Employee`
  ADD PRIMARY KEY (`SSN`),
  ADD KEY `employee_ibfk_1` (`ID`);

--
-- Indexes for table `Fixes`
--
ALTER TABLE `Fixes`
  ADD KEY `fixes_ibfk_1` (`ID`),
  ADD KEY `fixes_ibfk_2` (`SSN`);

--
-- Indexes for table `Person`
--
ALTER TABLE `Person`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- Indexes for table `Problem`
--
ALTER TABLE `Problem`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Repair`
--
ALTER TABLE `Repair`
  ADD KEY `repair_ibfk_1` (`AirplaneID`),
  ADD KEY `repair_ibfk_2` (`ServiceNumber`);

--
-- Indexes for table `Service`
--
ALTER TABLE `Service`
  ADD PRIMARY KEY (`ServiceNumber`);

--
-- Indexes for table `Tech`
--
ALTER TABLE `Tech`
  ADD PRIMARY KEY (`SSN`);

--
-- Indexes for table `Ticket`
--
ALTER TABLE `Ticket`
  ADD PRIMARY KEY (`TicketNumber`);

--
-- Indexes for table `Works_At`
--
ALTER TABLE `Works_At`
  ADD KEY `works_at_ibfk_1` (`SSN`),
  ADD KEY `works_at_ibfk_2` (`ACODE`);

--
-- Indexes for table `Works_on`
--
ALTER TABLE `Works_on`
  ADD KEY `works_on_ibfk_1` (`ServiceNumber`),
  ADD KEY `works_on_ibfk_2` (`SSN`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Buys`
--
ALTER TABLE `Buys`
  ADD CONSTRAINT `buys_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `Customer` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `buys_ibfk_2` FOREIGN KEY (`TicketNumber`) REFERENCES `Ticket` (`TicketNumber`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Customer`
--
ALTER TABLE `Customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `Person` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `CustomerService`
--
ALTER TABLE `CustomerService`
  ADD CONSTRAINT `customerservice_ibfk_1` FOREIGN KEY (`SSN`) REFERENCES `Employee` (`SSN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Employee`
--
ALTER TABLE `Employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `Person` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Fixes`
--
ALTER TABLE `Fixes`
  ADD CONSTRAINT `fixes_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `Problem` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fixes_ibfk_2` FOREIGN KEY (`SSN`) REFERENCES `CustomerService` (`SSN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Repair`
--
ALTER TABLE `Repair`
  ADD CONSTRAINT `repair_ibfk_1` FOREIGN KEY (`AirplaneID`) REFERENCES `Airplane` (`AirplaneID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `repair_ibfk_2` FOREIGN KEY (`ServiceNumber`) REFERENCES `Service` (`ServiceNumber`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Tech`
--
ALTER TABLE `Tech`
  ADD CONSTRAINT `tech_ibfk_1` FOREIGN KEY (`SSN`) REFERENCES `Employee` (`SSN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Works_At`
--
ALTER TABLE `Works_At`
  ADD CONSTRAINT `works_at_ibfk_1` FOREIGN KEY (`SSN`) REFERENCES `Employee` (`SSN`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `works_at_ibfk_2` FOREIGN KEY (`ACODE`) REFERENCES `Airport` (`ACODE`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Works_on`
--
ALTER TABLE `Works_on`
  ADD CONSTRAINT `works_on_ibfk_1` FOREIGN KEY (`ServiceNumber`) REFERENCES `Service` (`ServiceNumber`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `works_on_ibfk_2` FOREIGN KEY (`SSN`) REFERENCES `Tech` (`SSN`) ON DELETE CASCADE ON UPDATE CASCADE;
