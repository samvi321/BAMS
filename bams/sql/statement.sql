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
-- Table structure for table `statement`
--

CREATE TABLE `statement` (
  `id` int(100) NOT NULL,
  `accountNo` varchar(100) NOT NULL,
  `transactionDate` date NOT NULL,
  `referenceNo` varchar(100) NOT NULL,
  `transactiondes` varchar(100) NOT NULL,
  `debit` varchar(100) DEFAULT NULL,
  `credit` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `statement`
--

INSERT INTO `statement` (`id`, `accountNo`, `transactionDate`, `referenceNo`, `transactiondes`, `debit`, `credit`, `status`) VALUES
(1, '34346456577868', '2021-11-30', '16383118496398', 'Prize Money', '0', '200', 'success'),
(2, '34346456577868', '2021-11-30', '16383120412861', 'Work Payment.', '50', '', 'success'),
(3, '34346456577868', '2021-11-30', '16383120746411', 'Work Payment.', '50', '', 'success'),
(4, '34346456577868', '2021-11-30', '16383123191178', 'Pay check', '0', '1000', 'success'),
(5, '34346456577868', '2021-11-30', '16383124434818', 'work', '10', '', 'success'),
(6, '34346456577868', '2021-11-30', '16383126063364', 'work', '10', '', 'success'),
(7, '34346456577868', '2021-11-30', '1638312764925', 'work', '10', '', 'success'),
(8, '34346456577868', '2021-11-30', '16383127919670', 'work', '10', '', 'success'),
(9, '34346456577868', '2021-11-30', '16383128339589', 'work', '10', '', 'success'),
(10, '223547486425', '2021-12-01', '16383134568788', 'pay check', '0', '20', 'success'),
(11, '34346456577868', '2021-12-01', '16383665945302', 'cheque', '10', '', 'success'),
(12, '34346456577868', '2021-12-01', '16383669242361', 'cheque', '10', '', 'success'),
(13, '2353676534653', '2021-12-01', '16383669242361', 'cheque', '', '10', 'success');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `statement`
--
ALTER TABLE `statement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `accountNo` (`accountNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `statement`
--
ALTER TABLE `statement`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `statement`
--
ALTER TABLE `statement`
  ADD CONSTRAINT `statement_ibfk_1` FOREIGN KEY (`accountNo`) REFERENCES `account` (`accountNo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
