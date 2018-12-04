-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2018 at 06:02 AM
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
-- Database: `fishery`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `user_id` int(11) NOT NULL,
  `user_flag` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`user_id`, `user_flag`, `name`, `phone`, `address`, `email`) VALUES
(200, 'person', 'Ryan', 1234, '34 jashimuddin', 'ryanM'),
(201, 'company', 'Takeout', 123, 'green street', 'takeout');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `emp_name` varchar(30) DEFAULT NULL,
  `emp_id` int(11) NOT NULL,
  `address` varchar(30) DEFAULT NULL,
  `position` varchar(30) DEFAULT NULL,
  `salary` int(11) DEFAULT NULL,
  `hire_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`emp_name`, `emp_id`, `address`, `position`, `salary`, `hire_date`) VALUES
('amy', 100, 'houston', 'manager', 30000, '1988-12-12'),
('Jesus', 101, 'kolkata', 'technician', 5000, '1979-11-05');

-- --------------------------------------------------------

--
-- Table structure for table `fisheries`
--

CREATE TABLE `fisheries` (
  `F_Id` int(11) NOT NULL,
  `location` varchar(30) DEFAULT NULL,
  `species` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  `weight` int(11) NOT NULL,
  `fish_price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `mgr_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fisheries`
--

INSERT INTO `fisheries` (`F_Id`, `location`, `species`, `type`, `weight`, `fish_price`, `stock`, `mgr_id`) VALUES
(1000, 'dhaka', 'salmon', 'saltwater', 700, 2000, 30, 101);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_date` date DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL,
  `order_completed` tinyint(1) DEFAULT NULL,
  `fishery_id` int(11) NOT NULL,
  `use_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_date`, `total_price`, `order_completed`, `fishery_id`, `use_id`) VALUES
(400, '2018-11-29', 2000, 1, 1000, 200);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `rating` int(11) DEFAULT NULL,
  `u_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`rating`, `u_id`) VALUES
(10, 200);

-- --------------------------------------------------------

--
-- Table structure for table `ships`
--

CREATE TABLE `ships` (
  `ship_id` int(11) NOT NULL,
  `ship_name` varchar(30) DEFAULT NULL,
  `no_of_crews` int(11) DEFAULT NULL,
  `make` varchar(30) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `fish_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ships`
--

INSERT INTO `ships` (`ship_id`, `ship_name`, `no_of_crews`, `make`, `size`, `fish_id`) VALUES
(2000, 'titan', 100, 'september 2015', 2400, 1000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `fisheries`
--
ALTER TABLE `fisheries`
  ADD PRIMARY KEY (`F_Id`),
  ADD KEY `fk_mgr_id` (`mgr_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk_fishery_id` (`fishery_id`),
  ADD KEY `fk_use_id` (`use_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD KEY `fk_u_id` (`u_id`);

--
-- Indexes for table `ships`
--
ALTER TABLE `ships`
  ADD PRIMARY KEY (`ship_id`),
  ADD KEY `fk_fish_id` (`fish_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fisheries`
--
ALTER TABLE `fisheries`
  ADD CONSTRAINT `fk_mgr_id` FOREIGN KEY (`mgr_id`) REFERENCES `employees` (`emp_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_fishery_id` FOREIGN KEY (`fishery_id`) REFERENCES `fisheries` (`F_Id`),
  ADD CONSTRAINT `fk_use_id` FOREIGN KEY (`use_id`) REFERENCES `customer` (`user_id`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `fk_u_id` FOREIGN KEY (`u_id`) REFERENCES `customer` (`user_id`);

--
-- Constraints for table `ships`
--
ALTER TABLE `ships`
  ADD CONSTRAINT `fk_fish_id` FOREIGN KEY (`fish_id`) REFERENCES `fisheries` (`F_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
