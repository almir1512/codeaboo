-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2023 at 06:49 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `volconn`
--

-- --------------------------------------------------------

--
-- Table structure for table `interested_users`
--

CREATE TABLE `interested_users` (
  `Event_id` int(11) NOT NULL,
  `user_ids` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `org_event_post`
--

CREATE TABLE `org_event_post` (
  `Id` int(11) NOT NULL,
  `Event_name` varchar(255) NOT NULL,
  `Event_location` varchar(255) NOT NULL,
  `Event_date` varchar(255) NOT NULL,
  `Event_organizer_id` int(11) NOT NULL,
  `Event_description` varchar(255) NOT NULL,
  `Volunteers_required` int(11) NOT NULL,
  `Volunteers_ready` int(11) NOT NULL,
  `Event_image` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `org_login`
--

CREATE TABLE `org_login` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Location` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Phone_no` int(10) NOT NULL,
  `Website` varchar(255) NOT NULL,
  `Logo` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `volunteer_login`
--

CREATE TABLE `volunteer_login` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Last_name` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `org_event_post`
--
ALTER TABLE `org_event_post`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `org_login`
--
ALTER TABLE `org_login`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `volunteer_login`
--
ALTER TABLE `volunteer_login`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `org_event_post`
--
ALTER TABLE `org_event_post`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `org_login`
--
ALTER TABLE `org_login`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `volunteer_login`
--
ALTER TABLE `volunteer_login`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
