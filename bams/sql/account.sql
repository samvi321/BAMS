-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2021 at 03:05 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bams`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `accountNo` varchar(100) NOT NULL,
  `accountType` varchar(100) DEFAULT NULL,
  `ifsc` varchar(100) DEFAULT NULL,
  `accountPin` int(100) DEFAULT NULL,
  `accountBalance` varchar(100) DEFAULT NULL,
  `accountStatus` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`accountNo`, `accountType`, `ifsc`, `accountPin`, `accountBalance`, `accountStatus`) VALUES
('223547486425', 'current', 'sgjf355477sggf', 5452, '320', 'active'),
('2353676534653', 'saving', 'dgsg348632hdgs', 3445, '290', 'active'),
('34346456577868', 'saving', 'fgkd345745kdfn', 3121, '930', 'active'),
('873829273846', 'saving', 'fdfg453634dhke', 4848, '100', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`accountNo`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`accountNo`) REFERENCES `user` (`accountNo`),
  ADD CONSTRAINT `account_ibfk_2` FOREIGN KEY (`accountNo`) REFERENCES `user` (`accountNo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
