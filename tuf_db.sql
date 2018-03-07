-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2017 at 05:16 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tuf db`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustomerID` int(11) NOT NULL,
  `fName` varchar(50) NOT NULL,
  `mInitial` varchar(1) NOT NULL,
  `lName` varchar(50) NOT NULL,
  `residence` varchar(200) NOT NULL,
  `Birthdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerID`, `fName`, `mInitial`, `lName`, `residence`, `Birthdate`) VALUES
(1, 'Erik', 'M', 'Burgess', 'Cebu City', '1980-09-12'),
(2, 'Floyd', 'B', 'Miles', 'Talamban City', '1998-10-12'),
(3, 'Josh', 'D', 'Summers', 'Cebu City', '1970-12-12'),
(4, 'Jaime', 'E', 'Perez', 'Cebu City', '1970-09-12'),
(5, 'Caroll', 'M', 'Gordon', 'Mandaue City', '1987-12-02'),
(6, 'John', 'M', 'Morales', 'Cebu City', '1999-11-12'),
(7, 'Erik', 'F', 'Hansen', 'Cebu City', '1990-12-15'),
(8, 'Johnn', 'H', 'Burge', 'Talamban,Cebu City', '1990-01-13'),
(9, 'Peter', 'B', 'Piper', 'Cebu City', '1978-02-12'),
(10, 'Erik', 'H', 'Uy', 'Talamban,Cebu City', '1997-03-24'),
(11, 'Lyle', 'C', 'Rivera', 'Cebu City', '1997-04-23'),
(12, 'Josh', 'N', 'Morales', 'Mandaue City', '1990-04-22'),
(13, 'Eric', 'U', 'Burgess', 'Cebu City', '1999-05-15'),
(14, 'Gordon', 'R', 'Santi', 'Mandaue City', '1998-05-13'),
(15, 'John', 'H', 'Lava', 'Cebu City', '1987-03-14'),
(16, 'France', 'J', 'Edioma', 'Cebu City', '1996-02-11'),
(17, 'Michael', 'M', 'Caine', 'Cebu City', '1994-02-12'),
(18, 'Joshua', 'B', 'Romero', 'Cebu City', '1989-12-21'),
(19, 'Ethan', 'R', 'Rivera', 'Cebu City', '1983-09-13'),
(20, 'Toby', 'C', 'Park', 'Mandaue City', '1997-12-23');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `deliveryID` int(11) NOT NULL,
  `prodID` int(11) NOT NULL,
  `supplierID` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`deliveryID`, `prodID`, `supplierID`, `date`) VALUES
(1, 31, 1, '2017-04-03'),
(2, 32, 1, '2017-04-03'),
(3, 30, 2, '2017-10-01'),
(4, 33, 2, '2017-10-03'),
(5, 34, 3, '2017-06-05'),
(6, 38, 3, '2017-05-20'),
(7, 31, 1, '2017-02-02'),
(8, 32, 1, '2017-04-20'),
(9, 32, 1, '2017-07-26'),
(10, 31, 1, '2017-06-12'),
(11, 30, 2, '2017-06-12'),
(12, 33, 2, '2017-10-02'),
(13, 33, 2, '2017-10-01'),
(14, 34, 3, '2017-09-12'),
(15, 38, 3, '2017-09-10'),
(16, 38, 3, '2017-08-24'),
(17, 34, 3, '2017-08-22'),
(18, 30, 2, '2017-08-01'),
(19, 34, 3, '2017-09-12'),
(20, 38, 3, '2017-07-04'),
(21, 25, 4, '2017-04-18'),
(22, 23, 4, '2017-01-24'),
(23, 24, 4, '2017-01-10'),
(24, 22, 4, '2017-06-23'),
(25, 25, 4, '2017-05-23'),
(26, 24, 4, '2017-09-18'),
(27, 25, 4, '2017-10-01'),
(28, 27, 6, '2017-06-12'),
(29, 22, 4, '2017-07-11'),
(30, 27, 6, '2017-06-20'),
(31, 24, 4, '2017-06-19'),
(32, 23, 4, '2017-03-06'),
(33, 23, 4, '2017-10-01'),
(34, 35, 15, '2017-09-18'),
(35, 36, 15, '2017-07-10'),
(36, 36, 15, '2017-07-17'),
(37, 28, 1, '2017-07-07'),
(38, 25, 4, '2017-08-07'),
(39, 25, 4, '2017-08-14'),
(40, 24, 4, '2017-08-08'),
(41, 35, 15, '2017-10-01'),
(42, 39, 11, '2017-10-03'),
(43, 39, 11, '2017-06-28'),
(44, 40, 11, '2017-06-12'),
(45, 39, 11, '2017-06-21'),
(46, 40, 11, '2017-07-20'),
(47, 39, 11, '2017-08-02');

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
  `Gender` enum('M','F') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employeeID`, `fName`, `MInitial`, `lName`, `Residence`, `Birthdate`, `Gender`) VALUES
(1, 'Bryl', 'K', 'Lim', '134 pulangbato talamban cebu city', '1995-10-04', 'M'),
(2, 'Ethan', 'R', 'Uy', 'opao mandaue cebu', '1995-08-09', 'M'),
(3, 'Barack', 'O', 'Omaba', '213 andres abellana,guadalupe, cebu city', '1993-06-07', 'M'),
(4, 'Tiberius', 'G', 'Omapoy', 'andres abellana extention,guadalupe,cebu city', '1992-10-10', 'M'),
(5, 'Andrew', 'G', 'Edioma', 'Tipolo road, balamban, cebu city', '1990-01-01', 'M'),
(6, 'Nico', 'S', 'Barro', 'gullas road,balamban, cebu city', '1998-06-20', 'M'),
(7, 'Tristan', 'O', 'Catane', '2134 extension,escario,cebu city', '1989-08-30', 'M'),
(8, 'Michael', 'O', 'Cabusas', 'Venezuela road,Talamban,cebu city', '1998-12-12', 'M'),
(9, 'Alyssa', 'M', 'Margison', 'Sunny hills,talamban,cebu city', '1991-10-02', 'F'),
(10, 'Kara', 'S', 'Regudo', 'Maria Luisa,Banilad,Cecbu City', '1990-11-11', 'F'),
(11, 'Ezra', 'Z', 'Ra', 'busay,lahug,cebu city', '1989-01-23', 'F'),
(12, 'Joji', 'R', 'Shiotsuki', 'Pacific village,pajac,lapu-lapu city', '1996-02-09', 'M'),
(13, 'Yehoo', 'H', 'Lee', 'sto.nino village,talamban,cebu city', '1990-10-20', 'M'),
(14, 'Justin', 'M', 'Nigo', 'brgy.san jose, talamban, cebu city', '1991-08-08', 'M'),
(15, 'Peter', 'L', 'Lim', 'nichols park,guadalupe,cebu city', '1976-08-22', 'M'),
(16, 'Rodrigo', 'R', 'Obosen', 'Deca homes 1, lapu-lapu city', '1950-12-25', 'M'),
(17, 'Emilio', 'J', 'Jacinto', 'brgy.san juan,balamban,cebu city', '1948-10-27', 'M'),
(18, 'Andres', 'D', 'Bonifacio', 'nivel hills road,carcar city', '1999-11-02', 'M'),
(19, 'Mia', 'A', 'Aninon', '2139, andres abellana ext. guadalupe,cebu city', '1991-01-01', 'F'),
(20, 'Karlo', 'G', 'Jarina', '6th street guadalajara,guadalupe,cebu city', '1985-10-30', 'M');

-- --------------------------------------------------------

--
-- Table structure for table `employeetype`
--

CREATE TABLE `employeetype` (
  `typeID` int(11) NOT NULL,
  `employeeID` int(11) NOT NULL,
  `employeeType` enum('Barber','Cashier','SalesPerson','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employeetype`
--

INSERT INTO `employeetype` (`typeID`, `employeeID`, `employeeType`) VALUES
(1, 1, 'Barber'),
(2, 2, 'Cashier'),
(3, 3, 'Barber'),
(4, 4, 'Barber'),
(5, 5, 'SalesPerson'),
(6, 6, 'Cashier'),
(7, 7, 'Barber'),
(8, 8, 'Cashier'),
(9, 9, 'Barber'),
(10, 10, 'Barber'),
(11, 11, 'Barber'),
(12, 12, 'Cashier'),
(13, 13, 'SalesPerson'),
(14, 14, 'Barber'),
(15, 15, 'Barber'),
(16, 16, 'Cashier'),
(17, 17, 'SalesPerson'),
(18, 18, 'Barber'),
(19, 19, 'Barber'),
(20, 20, 'Cashier');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prodID` int(11) NOT NULL,
  `productName` varchar(50) NOT NULL,
  `productType` enum('apparel','shoes','hairProducts','') NOT NULL,
  `ProductPrice` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prodID`, `productName`, `productType`, `ProductPrice`) VALUES
(21, 'tuf pomade', 'hairProducts', 400),
(22, ' dragon pomade', 'hairProducts', 450),
(23, 'max gel', 'hairProducts', 120),
(24, 'beeswax pomade', 'hairProducts', 500),
(25, 'cospray', 'hairProducts', 875),
(26, 'tuf pomade', 'hairProducts', 400),
(27, 'suavecito', 'hairProducts', 600),
(28, 'yeezy', 'shoes', 4090),
(29, 'rhipstop cap', 'apparel', 450),
(30, 'nike flyknits', 'shoes', 7600),
(31, 'adidas primeknit', 'shoes', 3095.95),
(32, 'adidas alphabounce', 'shoes', 13000),
(33, 'jordan 1', 'shoes', 4050),
(34, 'underarmour flex', 'apparel', 9000),
(35, 'anti social social club', 'apparel', 7500),
(36, 'supreme', 'apparel', 1300),
(37, 'tuf shampoo', 'hairProducts', 300),
(38, 'underarmour curry 4', 'shoes', 9800),
(39, 'tuf hoodie', 'apparel', 476.25),
(40, 'tuf pomade', 'hairProducts', 400);

-- --------------------------------------------------------

--
-- Table structure for table `producttransaction`
--

CREATE TABLE `producttransaction` (
  `prodTransID` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `total` float NOT NULL,
  `customerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `producttransaction`
--

INSERT INTO `producttransaction` (`prodTransID`, `date`, `total`, `customerID`) VALUES
(1, '2017-10-10 00:00:00', 345.12, 1),
(2, '2017-12-21 00:00:00', 500.2, 2),
(3, '2017-02-02 00:00:00', 789.1, 3),
(4, '2017-05-05 00:00:00', 6577, 4),
(5, '2017-08-08 00:00:00', 300, 5),
(6, '2017-08-08 00:00:00', 400, 6),
(7, '2017-09-09 00:00:00', 1089.25, 7),
(8, '2017-06-18 00:00:00', 350.12, 8),
(9, '2017-12-12 00:00:00', 450, 9),
(10, '0000-00-00 00:00:00', 10233, 10),
(11, '0000-00-00 00:00:00', 900.12, 11),
(12, '2017-08-09 00:00:00', 6900, 12),
(13, '2017-10-12 00:00:00', 3500, 13),
(14, '2017-12-01 00:00:00', 10200.2, 14),
(15, '2017-05-05 00:00:00', 12300.4, 15),
(16, '2017-07-07 00:00:00', 3425.11, 16),
(17, '2017-02-02 00:00:00', 5600.2, 17),
(18, '2017-10-10 00:00:00', 900.24, 18),
(19, '0000-00-00 00:00:00', 5900.2, 19),
(20, '2017-10-10 00:00:00', 3560.78, 20);

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
  `serveRecID` int(11) NOT NULL,
  `employeeID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `servRecID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `servicetransaction`
--

INSERT INTO `servicetransaction` (`servTransID`, `date`, `total`, `serveRecID`, `employeeID`, `customerID`, `servRecID`) VALUES
(1, '2017-10-12', 455, 1, 1, 1, 1),
(2, '2017-09-04', 300, 2, 2, 2, 2),
(3, '2017-10-05', 500, 3, 3, 3, 3),
(4, '2017-10-12', 761, 4, 4, 4, 4),
(5, '2017-05-10', 120, 5, 5, 5, 5),
(6, '2017-06-14', 2000, 6, 6, 6, 6),
(7, '2017-05-18', 346, 7, 7, 7, 7),
(8, '2017-10-19', 678, 8, 8, 8, 8),
(9, '2017-04-20', 909, 9, 9, 9, 9),
(10, '2017-10-14', 1209, 10, 10, 10, 10),
(11, '2017-10-14', 790, 11, 11, 11, 11),
(12, '2017-05-17', 800, 12, 12, 12, 12),
(13, '2017-10-13', 450, 13, 13, 13, 13),
(14, '2017-01-05', 200, 14, 14, 14, 14),
(15, '2017-04-05', 701, 15, 15, 15, 15),
(16, '2017-10-20', 1678, 16, 16, 16, 16),
(17, '2017-05-05', 2387, 17, 17, 17, 17),
(18, '2017-06-21', 568, 18, 18, 18, 18),
(19, '2017-07-05', 807, 19, 19, 19, 19),
(20, '2017-07-14', 2302, 20, 20, 20, 20),
(21, '2017-06-08', 455, 1, 1, 1, 1),
(22, '2017-05-09', 301, 2, 2, 2, 2),
(23, '2017-06-07', 343, 3, 3, 3, 3),
(24, '2017-08-23', 577, 4, 4, 4, 4),
(25, '2017-10-11', 1209, 5, 5, 5, 5),
(26, '2017-10-11', 2500, 6, 6, 6, 6),
(27, '2017-06-15', 146, 7, 7, 7, 7),
(28, '2017-06-14', 901, 8, 8, 8, 8),
(29, '2017-10-12', 209, 9, 9, 9, 9),
(30, '2017-10-13', 121, 10, 10, 10, 10),
(31, '2017-10-11', 780, 11, 11, 11, 11),
(32, '2017-10-11', 803, 12, 12, 12, 12),
(33, '2017-08-08', 230, 13, 13, 13, 13),
(34, '2017-10-06', 140, 14, 14, 14, 14),
(35, '2017-10-02', 245, 15, 15, 15, 15),
(36, '2017-08-15', 164, 16, 16, 16, 16),
(37, '2017-10-03', 233, 17, 17, 17, 17),
(38, '2017-10-03', 533, 18, 18, 18, 18),
(39, '2017-08-17', 237, 19, 19, 19, 19),
(40, '2017-10-12', 2332, 20, 20, 20, 20);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplierID` int(11) NOT NULL,
  `companyName` varchar(50) NOT NULL,
  `Location` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplierID`, `companyName`, `Location`) VALUES
(1, 'Adidas', 'Taguig, Metro Manila'),
(2, 'Nike', 'Taguig, Metro Manila'),
(3, 'Under Armour', 'Taguig, Metro Manila'),
(4, 'Eight Wolves', 'Taguig, Metro Manila'),
(5, 'Blumaan', 'Taguig, Metro Manila'),
(6, 'Suavecito', 'Makati City'),
(7, 'Cavalier', 'Taguig, Metro Manila'),
(8, 'Hanz de Fuko', 'Quezon City'),
(9, 'CREW', 'Taguig, Metro Manila'),
(10, 'Pete & Pedro', 'Taguig, Metro Manila'),
(11, 'Rhistop', 'Cebu City'),
(12, 'Emporium', 'Cebu City'),
(13, 'Man Pomade', 'Bacolod City'),
(14, 'Bosley', 'Cebu City'),
(15, 'Supreme', 'Cebu City'),
(16, 'Fear of God', 'Bacolod City'),
(17, 'Nioxin', 'Quezon City'),
(18, 'Dove Men', 'Bonifacio Global City'),
(19, 'Nivea', 'Iligan, Lanao del Norte');

-- --------------------------------------------------------

--
-- Table structure for table `transactionitems`
--

CREATE TABLE `transactionitems` (
  `transitemID` int(11) NOT NULL,
  `prodID` int(11) NOT NULL,
  `transID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactionitems`
--

INSERT INTO `transactionitems` (`transitemID`, `prodID`, `transID`) VALUES
(1, 21, 1),
(2, 22, 2),
(3, 23, 3),
(4, 24, 4),
(5, 25, 5),
(6, 26, 6),
(7, 27, 7),
(8, 28, 8),
(9, 29, 9),
(10, 30, 10),
(11, 31, 11),
(12, 32, 12),
(13, 33, 13),
(14, 34, 14),
(15, 35, 15),
(16, 36, 16),
(17, 37, 17),
(18, 38, 18),
(19, 39, 19),
(20, 40, 20),
(21, 21, 1),
(22, 22, 2),
(23, 23, 3),
(24, 24, 4),
(25, 25, 5),
(26, 26, 6),
(27, 27, 7),
(28, 28, 8),
(29, 29, 9),
(30, 30, 10),
(31, 31, 11),
(32, 32, 12),
(33, 33, 13),
(34, 34, 14),
(35, 35, 15),
(36, 36, 16),
(37, 37, 17),
(38, 38, 18),
(39, 39, 19),
(40, 40, 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`deliveryID`),
  ADD KEY `fk_delivery_supplier` (`supplierID`),
  ADD KEY `fk_delivery_product` (`prodID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employeeID`);

--
-- Indexes for table `employeetype`
--
ALTER TABLE `employeetype`
  ADD PRIMARY KEY (`typeID`),
  ADD KEY `fk_employeeType_employee` (`employeeID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prodID`);

--
-- Indexes for table `producttransaction`
--
ALTER TABLE `producttransaction`
  ADD PRIMARY KEY (`prodTransID`),
  ADD KEY `fk_productTransaction_customer` (`customerID`);

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
  ADD KEY `fk_servicetransaction_serviceRecord` (`serveRecID`),
  ADD KEY `fk_servicetransaction_employee` (`employeeID`),
  ADD KEY `fk_servTrans_servRec` (`servRecID`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplierID`);

--
-- Indexes for table `transactionitems`
--
ALTER TABLE `transactionitems`
  ADD PRIMARY KEY (`transitemID`),
  ADD KEY `fk_transItems_product` (`prodID`),
  ADD KEY `fk_transItems_productTransaction` (`transID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `deliveryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employeeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `employeetype`
--
ALTER TABLE `employeetype`
  MODIFY `typeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prodID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT for table `producttransaction`
--
ALTER TABLE `producttransaction`
  MODIFY `prodTransID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
  MODIFY `servTransID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplierID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `transactionitems`
--
ALTER TABLE `transactionitems`
  MODIFY `transitemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `delivery`
--
ALTER TABLE `delivery`
  ADD CONSTRAINT `fk_delivery_product` FOREIGN KEY (`prodID`) REFERENCES `product` (`prodID`),
  ADD CONSTRAINT `fk_delivery_supplier` FOREIGN KEY (`supplierID`) REFERENCES `supplier` (`supplierID`);

--
-- Constraints for table `employeetype`
--
ALTER TABLE `employeetype`
  ADD CONSTRAINT `fk_employeeType_employee` FOREIGN KEY (`employeeID`) REFERENCES `employee` (`employeeID`);

--
-- Constraints for table `producttransaction`
--
ALTER TABLE `producttransaction`
  ADD CONSTRAINT `fk_productTransaction_customer` FOREIGN KEY (`customerID`) REFERENCES `customer` (`CustomerID`);

--
-- Constraints for table `servicetransaction`
--
ALTER TABLE `servicetransaction`
  ADD CONSTRAINT `fk_servTrans_servRec` FOREIGN KEY (`servRecID`) REFERENCES `servicerecord` (`ServRecID`),
  ADD CONSTRAINT `fk_servicetransaction_customer` FOREIGN KEY (`customerID`) REFERENCES `customer` (`CustomerID`),
  ADD CONSTRAINT `fk_servicetransaction_employee` FOREIGN KEY (`employeeID`) REFERENCES `employee` (`employeeID`);

--
-- Constraints for table `transactionitems`
--
ALTER TABLE `transactionitems`
  ADD CONSTRAINT `fk_transItems_product` FOREIGN KEY (`prodID`) REFERENCES `product` (`prodID`),
  ADD CONSTRAINT `fk_transItems_productTransaction` FOREIGN KEY (`transID`) REFERENCES `producttransaction` (`prodTransID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
