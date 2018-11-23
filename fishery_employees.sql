-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2018 at 10:43 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fishery management system`
--

-- --------------------------------------------------------

--
-- Table structure for table `fishery_employees`
--

CREATE TABLE `fishery_employees` (
  `Employee_ID` int(11) NOT NULL,
  `Given_Name` varchar(15) DEFAULT NULL,
  `Family_Name` varchar(15) NOT NULL,
  `Salary` int(11) DEFAULT NULL,
  `Date_Hired` date DEFAULT NULL,
  `Works_at` varchar(20) NOT NULL,
  `Position` varchar(15) NOT NULL,
  `Address` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fishery_employees`
--
ALTER TABLE `fishery_employees`
  ADD PRIMARY KEY (`Employee_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
