-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 19, 2024 at 07:02 PM
-- Server version: 10.6.18-MariaDB-cll-lve
-- PHP Version: 8.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tsql_electro`
--

-- --------------------------------------------------------

--
-- Table structure for table `bulkinsert`
--

CREATE TABLE `bulkinsert` (
  `id` int(11) NOT NULL,
  `year` varchar(100) DEFAULT NULL,
  `stock` varchar(100) DEFAULT NULL,
  `bills` varchar(255) DEFAULT NULL,
  `bond` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `draws`
--

CREATE TABLE `draws` (
  `id` int(11) NOT NULL,
  `drawdate` date NOT NULL,
  `serialnumber` varchar(100) NOT NULL,
  `position` varchar(10) NOT NULL,
  `prize` varchar(100) NOT NULL,
  `redeemstatus` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prizeredeem`
--

CREATE TABLE `prizeredeem` (
  `id` int(11) NOT NULL,
  `prizeid` int(11) NOT NULL,
  `serialnumber` varchar(20) NOT NULL,
  `actiondate` date NOT NULL,
  `actiontime` time NOT NULL,
  `actionby` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `raffleentry`
--

CREATE TABLE `raffleentry` (
  `dateEntry` date NOT NULL,
  `timeEntry` time NOT NULL,
  `msisdn` varchar(20) NOT NULL,
  `serialnumber` varchar(50) NOT NULL,
  `id` int(11) NOT NULL,
  `ghanacard` varchar(20) NOT NULL,
  `region` varchar(20) DEFAULT NULL,
  `winStatus` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `rolename` varchar(100) NOT NULL,
  `rolestatus` char(1) NOT NULL,
  `createdby` varchar(100) DEFAULT NULL,
  `createdon` varchar(100) DEFAULT NULL,
  `lastupdatedon` varchar(100) DEFAULT NULL,
  `serialnumber` char(1) DEFAULT NULL,
  `reports` char(1) DEFAULT NULL,
  `draws` char(1) DEFAULT NULL,
  `user_management` char(1) DEFAULT NULL,
  `show_room_management` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `serialnumber`
--

CREATE TABLE `serialnumber` (
  `id` int(11) NOT NULL,
  `serialnumber` varchar(100) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `prize` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `serialnumber1`
--

CREATE TABLE `serialnumber1` (
  `id` int(11) NOT NULL,
  `serialnumber` varchar(255) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `prize` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` int(11) NOT NULL,
  `state` varchar(100) NOT NULL,
  `msisdn` varchar(20) NOT NULL,
  `serialnumber` varchar(20) NOT NULL,
  `ghanacard` varchar(20) NOT NULL,
  `sessionID` varchar(20) NOT NULL,
  `sessionDate` date NOT NULL,
  `sessionTime` time NOT NULL,
  `region` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `useraccounts`
--

CREATE TABLE `useraccounts` (
  `id` int(11) NOT NULL,
  `useremail` varchar(100) NOT NULL,
  `logintoken` varchar(200) DEFAULT NULL,
  `phonenumber` varchar(10) NOT NULL,
  `roleid` varchar(50) NOT NULL,
  `accountstatus` varchar(1) NOT NULL,
  `createdby` varchar(100) DEFAULT NULL,
  `createdon` varchar(50) NOT NULL,
  `lastupdatedby` varchar(100) DEFAULT NULL,
  `sex` enum('male','female') NOT NULL,
  `lastupdatedon` varchar(50) NOT NULL,
  `lastseenon` varchar(50) NOT NULL,
  `outletid` int(11) NOT NULL,
  `fname` varchar(25) DEFAULT NULL,
  `lname` varchar(60) DEFAULT NULL,
  `expirydate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bulkinsert`
--
ALTER TABLE `bulkinsert`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `raffleentry`
--
ALTER TABLE `raffleentry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `serialnumber`
--
ALTER TABLE `serialnumber`
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `serialIndex` (`id`,`serialnumber`);

--
-- Indexes for table `serialnumber1`
--
ALTER TABLE `serialnumber1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `useraccounts`
--
ALTER TABLE `useraccounts`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bulkinsert`
--
ALTER TABLE `bulkinsert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `raffleentry`
--
ALTER TABLE `raffleentry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `serialnumber`
--
ALTER TABLE `serialnumber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `serialnumber1`
--
ALTER TABLE `serialnumber1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `useraccounts`
--
ALTER TABLE `useraccounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
