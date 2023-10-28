-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 18, 2023 at 04:59 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id20323457_courier123`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

DROP TABLE IF EXISTS `branch`;
CREATE TABLE IF NOT EXISTS `branch` (
  `Bid` char(5) NOT NULL,
  `Bname` varchar(15) NOT NULL,
  `Bcno` varchar(10) NOT NULL,
  `Bcity` varchar(10) NOT NULL,
  `Bemail` varchar(30) NOT NULL,
  `Badd` varchar(20) NOT NULL,
  PRIMARY KEY (`Bid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`Bid`, `Bname`, `Bcno`, `Bcity`, `Bemail`, `Badd`) VALUES
('B001', 'Nadiad', '9856985632', 'Nadiad', 'nadiadcourierguy@gmail.com', 'Nadiad'),
('B002', 'vvn', '3698521475', 'VVN', 'vvncourierguy@gmail.com', 'vvn');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `Eid` char(5) NOT NULL,
  `Ename` varchar(15) NOT NULL,
  `Password` varchar(8) NOT NULL,
  `Ecno` varchar(10) NOT NULL,
  `Eemail` varchar(50) NOT NULL,
  `Eadd` varchar(20) NOT NULL,
  `Post` varchar(10) NOT NULL,
  `Bid` char(5) NOT NULL,
  PRIMARY KEY (`Eid`),
  UNIQUE KEY `Ename` (`Ename`),
  KEY `Bid` (`Bid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Eid`, `Ename`, `Password`, `Ecno`, `Eemail`, `Eadd`, `Post`, `Bid`) VALUES
('E001', 'Admin', 'admin111', '7894561258', 'albertruffin639@gmail.com', 'Nadiad', 'Admin', 'B001'),
('E002', 'Rishi', 'rishi11', '7456985361', 'boosterhealth49@gmail.com', 'vvn', 'Manager', 'B001'),
('E003', 'rohan', 'rohan11', '5764253', 'rohan@gmail.com', 'nadiad', 'manager', 'B001');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

DROP TABLE IF EXISTS `package`;
CREATE TABLE IF NOT EXISTS `package` (
  `Pid` char(5) NOT NULL,
  `Description` varchar(15) NOT NULL,
  `Weight` varchar(5) NOT NULL,
  `Price` varchar(5) NOT NULL,
  `Date` date NOT NULL,
  `Status` varchar(25) NOT NULL,
  `Sid` char(5) NOT NULL,
  `Rid` char(5) NOT NULL,
  `Bid` char(5) NOT NULL,
  PRIMARY KEY (`Pid`),
  KEY `Sid` (`Sid`,`Rid`,`Bid`),
  KEY `bbid` (`Bid`),
  KEY `rid` (`Rid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`Pid`, `Description`, `Weight`, `Price`, `Date`, `Status`, `Sid`, `Rid`, `Bid`) VALUES
('P001', 'books', '2', '1000', '2023-04-15', 'In-Transit', 'S001', 'R001', 'B001'),
('P002', 'leptop', '1', '2000', '2023-05-04', 'Delivered', 'S001', 'R001', 'B001'),
('P003', 'leptop', '4', '2000', '2023-05-13', 'Shipped', 'S0002', 'R001', 'B001'),
('P004', 'Mobile', '2', '1000', '2023-05-05', 'Item accepted by Courier', 'S001', 'R001', 'B001');

-- --------------------------------------------------------

--
-- Table structure for table `receiver`
--

DROP TABLE IF EXISTS `receiver`;
CREATE TABLE IF NOT EXISTS `receiver` (
  `Rid` char(5) NOT NULL,
  `Rname` varchar(15) NOT NULL,
  `Rcno` varchar(10) NOT NULL,
  `Rcity` varchar(10) NOT NULL,
  `Remail` varchar(30) NOT NULL,
  `Radd` varchar(20) NOT NULL,
  `Rpin` varchar(6) NOT NULL,
  PRIMARY KEY (`Rid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receiver`
--

INSERT INTO `receiver` (`Rid`, `Rname`, `Rcno`, `Rcity`, `Remail`, `Radd`, `Rpin`) VALUES
('R001', 'rishi', '6325987451', 'vvn', 'rishi@gmail.com', 'vvn', '388451');

-- --------------------------------------------------------

--
-- Table structure for table `sender`
--

DROP TABLE IF EXISTS `sender`;
CREATE TABLE IF NOT EXISTS `sender` (
  `Sid` char(5) NOT NULL,
  `Sname` varchar(15) NOT NULL,
  `Password` varchar(8) NOT NULL,
  `Scno` varchar(10) NOT NULL,
  `Scity` varchar(10) NOT NULL,
  `Semail` varchar(30) NOT NULL,
  `Sadd` varchar(20) NOT NULL,
  `Spin` varchar(6) NOT NULL,
  PRIMARY KEY (`Sid`),
  UNIQUE KEY `Sname` (`Sname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sender`
--

INSERT INTO `sender` (`Sid`, `Sname`, `Password`, `Scno`, `Scity`, `Semail`, `Sadd`, `Spin`) VALUES
('S0002', 'Rohan', 'rohan11', '9797979797', 'Nadiad', 'Rohan@email.com', 'Nadiad', '387002'),
('S001', 'Parv', 'parv11', '9797979797', 'Nadiad', 'rohitrohan4@gmail.com', 'Nadiad', '387002');

-- --------------------------------------------------------

--
-- Table structure for table `tracking`
--

DROP TABLE IF EXISTS `tracking`;
CREATE TABLE IF NOT EXISTS `tracking` (
  `Bid` char(5) NOT NULL,
  `Pid` char(10) NOT NULL,
  `Date_time` datetime NOT NULL,
  `Status` varchar(25) NOT NULL,
  PRIMARY KEY (`Bid`,`Pid`),
  KEY `Bid` (`Bid`,`Pid`),
  KEY `pid` (`Pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tracking`
--

INSERT INTO `tracking` (`Bid`, `Pid`, `Date_time`, `Status`) VALUES
('B001', 'P002', '2023-05-04 01:14:40', 'Item accepted by Courier'),
('B001', 'P003', '2023-05-13 11:25:31', 'Item accepted by Courier'),
('B001', 'P004', '2023-05-14 12:26:05', 'Item accepted by Courier');

-- --------------------------------------------------------

--
-- Table structure for table `weight`
--

DROP TABLE IF EXISTS `weight`;
CREATE TABLE IF NOT EXISTS `weight` (
  `Wid` char(5) NOT NULL,
  `W_from` varchar(10) NOT NULL,
  `W_to` varchar(10) NOT NULL,
  `Price` varchar(10) NOT NULL,
  PRIMARY KEY (`Wid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `weight`
--

INSERT INTO `weight` (`Wid`, `W_from`, `W_to`, `Price`) VALUES
('W001', '1', '3', '1000'),
('W002', '3', '6', '2000'),
('W003', '6', '8', '3000');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `bid` FOREIGN KEY (`Bid`) REFERENCES `branch` (`Bid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `package`
--
ALTER TABLE `package`
  ADD CONSTRAINT `bbid` FOREIGN KEY (`Bid`) REFERENCES `branch` (`Bid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rid` FOREIGN KEY (`Rid`) REFERENCES `receiver` (`Rid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sid` FOREIGN KEY (`Sid`) REFERENCES `sender` (`Sid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tracking`
--
ALTER TABLE `tracking`
  ADD CONSTRAINT `biid` FOREIGN KEY (`Bid`) REFERENCES `branch` (`Bid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pid` FOREIGN KEY (`Pid`) REFERENCES `package` (`Pid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
