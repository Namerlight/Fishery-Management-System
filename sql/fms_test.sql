-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2018 at 10:13 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fms_test`
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
  `email` varchar(30) NOT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`user_id`, `user_flag`, `name`, `phone`, `address`, `email`, `password`) VALUES
(137, 'Enterprise', 'Takeout', 1230678876, 'House 13, Road 13', 'TakeoutBD@gmail.com', '4bf8a68489d2040c21cb090e1bd7f624'),
(246, 'Enterprise', 'Tokyo Express', 2147483647, '54B, BNN', 'TokyoE@tmail.com', 'f5f785e63dbdd109c2462a2775820020'),
(263, 'Individual', 'Robin', 2147483647, '12 Gotham Rd', 'Rob1N@rmail.com', '02f89c0d1de9718e3d47dad24bd51f31'),
(295, 'Individual', 'Nathan', 2147483647, '15/B Brooklyn', 'NathanFill@gmail.com', '7c9ad0fb17963670161b48416966dc8e'),
(347, 'Individual', 'Wayne', 2147483647, '12 Lake Drive', 'Wayne431@ymail.com', '3e52587c8425d15c44496cda06295728'),
(372, 'Enterprise', 'Manhattan Fish Market', 2147483647, 'House 9, 45 KA', 'MFM@mmail.com', 'a74e56d764bd37ddeec7136a3826b48d'),
(374, 'Enterprise', 'admin', 0, '', '', 'a4d3b161ce1309df1c4e25df28694b7b'),
(519, 'Individual', 'Chris', 2147483647, '11th Street', 'Chris12@gmail.com', '8555fd0a608e57e7d479b6d5b454284c'),
(532, 'Enterprise', 'Fish & Co', 2147483647, 'Block B, House 99/A', 'FandC@fmail.com', '67358b56b04d1905e8775640b9704318'),
(583, 'Individual', 'Bruce', 2147483647, 'Gotham Heights', 'Bruce@bmail.com', '8ff39acd849b74071bae6c7be1226c8d'),
(776, 'Individual', 'Ryan', 1777123234, '34 Jashimuddin Ave.', 'RyanM@gmail.com', '1adbb3178591fd5bb0c248518f39bf6d');

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
('Amy', 100, 'Houston', 'CEO', 80000, '1988-12-12'),
('Jesus', 101, 'Kolkata', 'Manager', 35000, '1979-11-05'),
('Will', 201, 'Los Angeles', 'Manager', 60000, '2000-01-05'),
('Steve', 204, 'Singapore', 'Delivery Manager', 20000, '2005-09-02'),
('Lisa', 401, 'Jakarta', 'Secretary', 15500, '1999-04-11'),
('Lee', 402, 'Glasgow', 'Ship Manager', 18000, '2015-06-20');

-- --------------------------------------------------------

--
-- Table structure for table `fisheries`
--

CREATE TABLE `fisheries` (
  `F_Id` int(11) NOT NULL,
  `location` varchar(30) DEFAULT NULL,
  `mgr_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fisheries`
--

INSERT INTO `fisheries` (`F_Id`, `location`, `mgr_id`) VALUES
(1000, 'Dhaka', 101),
(1002, 'Dhaka', 101),
(1030, 'Chittagong', 101),
(1035, 'Khulna', 201),
(1042, 'Barisal', 201);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `Species` varchar(50) DEFAULT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `Avg_weight` int(11) DEFAULT NULL,
  `Price_per_kg` int(11) DEFAULT NULL,
  `Stock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`Species`, `Type`, `Avg_weight`, `Price_per_kg`, `Stock`) VALUES
('Tuna', 'Freshwater', 600, 400, 50),
('Carp', 'Freshwater', 300, 520, 75),
('Hilsha', 'Saltwater', 800, 750, 85),
('Salmon', 'Freshwater', 300, 860, 30),
('Pomfret', 'Saltwater', 450, 1200, 45),
('Ruhi', 'Freshwater', 700, 320, 60),
('Prawn', 'Freshwater', 600, 800, 30),
('Catfish', 'Saltwater', 300, 410, 60),
('Pangash', 'Saltwater', 700, 640, 75),
('Lobster', 'Freshwater', 400, 1500, 30),
('Trout', 'Freshwater', 150, 200, 110),
('Shrimp', 'Freshwater', 120, 1100, 85);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `fish_species` text NOT NULL,
  `order_date` date DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL,
  `order_completed` tinyint(1) DEFAULT NULL,
  `fishery_id` int(11) NOT NULL,
  `use_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `fish_species`, `order_date`, `total_price`, `order_completed`, `fishery_id`, `use_id`) VALUES
(300, '', '2018-04-23', 3000, 1, 1000, 347),
(302, '', '2018-04-23', 3000, 1, 1030, 519),
(303, '', '2018-04-23', 3000, 1, 1035, 532),
(304, '', '2018-04-23', 3000, 1, 1042, 532),
(400, '', '2018-11-29', 2000, 1, 1002, 347);

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
(8, 776);

-- --------------------------------------------------------

--
-- Table structure for table `ships`
--

CREATE TABLE `ships` (
  `ship_id` int(11) NOT NULL,
  `ship_name` varchar(30) DEFAULT NULL,
  `no_of_crews` int(11) DEFAULT NULL,
  `year_obtained` year(4) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `fish_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ships`
--

INSERT INTO `ships` (`ship_id`, `ship_name`, `no_of_crews`, `year_obtained`, `size`, `fish_id`) VALUES
(2000, 'Titan', 100, 1999, 240, 1000),
(2001, 'Heavy', 200, 1998, 220, 1000),
(2002, 'Express', 130, 1999, 190, 1002),
(2003, 'Jupiter', 125, 2002, 200, 1030),
(2004, 'Mass', 110, 2003, 180, 1035),
(2005, 'Daily', 105, 2005, 205, 1042);

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
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD UNIQUE KEY `Species` (`Species`);

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
  ADD UNIQUE KEY `u_id` (`u_id`),
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
