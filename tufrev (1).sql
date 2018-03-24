-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2018 at 06:13 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tufrev`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `branchID` int(11) NOT NULL,
  `address` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branchID`, `address`) VALUES
(1, 'Talamban'),
(2, 'Capitol Escario'),
(3, 'Mabolo'),
(4, 'Ayala'),
(9, 'Escario');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustomerID` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fName` varchar(50) NOT NULL,
  `mInitial` varchar(1) NOT NULL,
  `lName` varchar(50) NOT NULL,
  `residence` varchar(200) NOT NULL,
  `Birthdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerID`, `email`, `password`, `fName`, `mInitial`, `lName`, `residence`, `Birthdate`) VALUES
(48, 'miko@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 'Miko', 'A', 'Aninon', '', '2018-03-06'),
(49, 'Admin@tuf.com', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'A', 'Admin', '', '2018-03-21'),
(50, 'ethan@uy.com', '7a56cb86e74d2afaacd7524253072fe3', 'ethan', 'e', 'e', '', '1998-05-10');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employeeID` int(11) NOT NULL,
  `fName` varchar(50) NOT NULL,
  `MInitial` varchar(1) NOT NULL,
  `lName` varchar(50) NOT NULL,
  `Residence` varchar(200) NOT NULL,
  `Birthdate` date NOT NULL,
  `Gender` enum('M','F') NOT NULL,
  `employeetype` enum('Barber','Cashier','Salesperson') NOT NULL,
  `branchID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employeeID`, `fName`, `MInitial`, `lName`, `Residence`, `Birthdate`, `Gender`, `employeetype`, `branchID`) VALUES
(3, 'Ethan', 'R', 'Uy', 'Bacolod', '1995-08-07', 'M', 'Barber', 1),
(5, 'Victor', 'O', 'Oladipo', 'Indiana', '1989-07-07', 'M', 'Barber', 2),
(11, 'Justin', 'A', 'Manigo', 'Mandaue', '1995-08-09', 'M', 'Cashier', 2),
(26, 'Willow', 'T', 'Hoods', 'Cabancalan', '1988-01-01', 'M', 'Barber', 3),
(29, 'Michael', 'C', 'Cabusas', 'Venezuela', '1979-01-01', 'M', 'Barber', 2);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prodID` int(11) NOT NULL,
  `productName` varchar(50) NOT NULL,
  `productType` enum('apparel','shoes','hairProducts','') NOT NULL,
  `ProductPrice` float NOT NULL,
  `Quantity` int(5) NOT NULL DEFAULT '25'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prodID`, `productName`, `productType`, `ProductPrice`, `Quantity`) VALUES
(26, 'TUF Pomade Phantom ', 'hairProducts', 350, 25),
(27, 'Suavecito', 'hairProducts', 600, 25),
(28, 'Adidas Yeezy Boost 350', 'shoes', 30000, 25),
(29, 'Rhipstop cap', 'apparel', 450, 25),
(30, 'Nike Flyknit Racer', 'shoes', 7600, 25),
(31, 'Adidas EQT  Support ADV', 'shoes', 7500, 25),
(32, 'Adidas Alphabounce', 'shoes', 13000, 25),
(33, 'Jordan 1', 'shoes', 4050, 25),
(35, 'Anti Social Social Club Hoodie', 'apparel', 7500, 25),
(37, 'TUF shampoo', 'hairProducts', 300, 25),
(38, 'Underarmour curry 4', 'shoes', 9800, 25),
(39, 'TUF hoodie', 'apparel', 500, 25);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `scheduleid` int(11) NOT NULL,
  `employeeid` int(11) NOT NULL,
  `date` date NOT NULL,
  `timestart` time NOT NULL,
  `timeend` time NOT NULL,
  `CustomerID` int(11) NOT NULL,
  `BranchID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`scheduleid`, `employeeid`, `date`, `timestart`, `timeend`, `CustomerID`, `BranchID`) VALUES
(119, 3, '2017-03-21', '13:00:00', '14:00:00', 48, 1),
(120, 3, '2018-03-21', '15:00:00', '16:00:00', 48, 1),
(121, 3, '2018-03-21', '11:00:00', '12:00:00', 48, 1),
(122, 3, '2018-03-21', '16:00:00', '17:00:00', 48, 1),
(124, 5, '2018-03-21', '13:00:00', '14:00:00', 48, 2),
(125, 3, '2018-03-21', '14:00:00', '15:00:00', 50, 1),
(126, 3, '2019-01-01', '13:00:00', '14:00:00', 50, 1),
(127, 3, '2019-01-01', '14:00:00', '15:00:00', 50, 1),
(128, 3, '2019-01-01', '15:00:00', '16:00:00', 50, 1),
(129, 5, '2019-04-01', '13:00:00', '14:00:00', 50, 2),
(130, 3, '2019-01-01', '17:00:00', '18:00:00', 50, 9),
(131, 29, '2020-01-01', '13:00:00', '14:00:00', 50, 2),
(132, 26, '2018-04-01', '13:00:00', '14:00:00', 50, 3),
(133, 3, '2019-01-01', '18:00:00', '19:00:00', 50, 1);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `serviceID` int(11) NOT NULL,
  `serviceName` varchar(50) NOT NULL,
  `serviceType` enum('Haircut','Massage','Hair treatment','Shave','Grooming','Shoe care') NOT NULL,
  `ServicePrice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`serviceID`, `serviceName`, `serviceType`, `ServicePrice`) VALUES
(1, 'TUF Father and Son', 'Haircut', 400),
(2, 'TUF chair massage', 'Massage', 300),
(3, 'TUF regular shave', 'Shave', 250),
(4, 'TUF hairdye short', 'Hair treatment', 800),
(5, 'TUF hairdye medium', 'Hair treatment', 1200),
(6, 'TUF hairdye long', 'Hair treatment', 1500),
(7, 'TUF Full Beard Shave', 'Shave', 350),
(8, 'TUF Recovery', 'Haircut', 600),
(9, 'TUF Junior Plus', 'Haircut', 350),
(10, 'TUF Junior', 'Haircut', 200),
(11, 'TUF Ultimate Cut', 'Haircut', 400),
(12, 'TUF Essential Facial', 'Grooming', 200),
(13, 'TUF Hair and scalp treatment', 'Hair treatment', 400),
(14, 'TUF Eyebrow Shaping', 'Grooming', 200),
(15, 'TUF Shoe shine', 'Shoe care', 150),
(16, 'TUF Traditional Shoe shine', 'Shoe care', 170),
(17, 'TUF Moustache Trim', 'Shave', 140),
(18, 'TUF Natural Nail Grooming', 'Grooming', 120),
(19, 'TUF Highligts', 'Hair treatment', 600),
(20, 'TUF traditional shave', 'Shave', 300);

-- --------------------------------------------------------

--
-- Table structure for table `servicerecord`
--

CREATE TABLE `servicerecord` (
  `ServRecID` int(11) NOT NULL,
  `serviceID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `servicerecord`
--

INSERT INTO `servicerecord` (`ServRecID`, `serviceID`) VALUES
(1, 1),
(2, 1),
(4, 2),
(5, 2),
(20, 2),
(3, 3),
(7, 3),
(19, 3),
(6, 4),
(10, 4),
(9, 5),
(8, 6),
(15, 10),
(16, 11),
(17, 11),
(11, 12),
(18, 12),
(12, 15),
(13, 19),
(14, 20);

-- --------------------------------------------------------

--
-- Table structure for table `servicetransaction`
--

CREATE TABLE `servicetransaction` (
  `servTransID` int(11) NOT NULL,
  `date` date NOT NULL,
  `total` int(11) NOT NULL,
  `employeeID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `servRecID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branchID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employeeID`),
  ADD KEY `fk_employee_branch` (`branchID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prodID`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`scheduleid`),
  ADD KEY `fk_schedule_employee` (`employeeid`),
  ADD KEY `fk_schedule_customer` (`CustomerID`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`serviceID`);

--
-- Indexes for table `servicerecord`
--
ALTER TABLE `servicerecord`
  ADD PRIMARY KEY (`ServRecID`),
  ADD KEY `fk_serviceRecord_service` (`serviceID`);

--
-- Indexes for table `servicetransaction`
--
ALTER TABLE `servicetransaction`
  ADD PRIMARY KEY (`servTransID`),
  ADD KEY `fk_servicetransaction_customer` (`customerID`),
  ADD KEY `fk_servicetransaction_employee` (`employeeID`),
  ADD KEY `fk_servTrans_servRec` (`servRecID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `branchID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employeeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prodID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `scheduleid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;
--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `serviceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `servicerecord`
--
ALTER TABLE `servicerecord`
  MODIFY `ServRecID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `servicetransaction`
--
ALTER TABLE `servicetransaction`
  MODIFY `servTransID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `fk_employee_branch` FOREIGN KEY (`branchID`) REFERENCES `branch` (`branchID`);

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `fk_schedule_customer` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`),
  ADD CONSTRAINT `fk_schedule_employee` FOREIGN KEY (`employeeid`) REFERENCES `employee` (`employeeID`);

--
-- Constraints for table `servicerecord`
--
ALTER TABLE `servicerecord`
  ADD CONSTRAINT `fk_record_service` FOREIGN KEY (`serviceID`) REFERENCES `service` (`serviceID`);

--
-- Constraints for table `servicetransaction`
--
ALTER TABLE `servicetransaction`
  ADD CONSTRAINT `fk_servTrans_servRec` FOREIGN KEY (`servRecID`) REFERENCES `servicerecord` (`ServRecID`),
  ADD CONSTRAINT `fk_servicetransaction_customer` FOREIGN KEY (`customerID`) REFERENCES `customer` (`CustomerID`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_servicetransaction_employee` FOREIGN KEY (`employeeID`) REFERENCES `employee` (`employeeID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
