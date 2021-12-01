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
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userFirstname` varchar(100) NOT NULL,
  `userLastname` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `zipCode` int(100) NOT NULL,
  `accountNo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userFirstname`, `userLastname`, `password`, `email`, `phone`, `dob`, `gender`, `address`, `city`, `state`, `zipCode`, `accountNo`) VALUES
('Ella', 'Lopez', 'ec5e1e94c042dda33822701a45eb5e30', 'ella@gmail.com', '4567654432', '1990-03-01', 'female', '42 backery street', 'Los Angeles', 'California', 565756, '223547486425'),
('Linda', 'Martin', 'eaf450085c15c3b880c66d0b78f2c041', 'linda@gmail.com', '9845676765', '1999-03-04', 'female', '86, Downtown', 'Chicago', 'Illinois', 456575, '2353676534653'),
('Daniel', 'Espinoza', '9180b4da3f0c7e80975fad685f7f134e', 'daniel@gmail.com', '3454987867', '1993-02-03', 'male', '36 lane, park street', 'Houston', 'Texas', 556545, '34346456577868'),
('Perry', 'Smith', '590b659f79aad9e9c48852cbb73c41c1', 'perry@gmail.com', '9433738387', '1982-07-22', 'male', '36 lane, park street', 'Houston', 'Texas', 556545, '873829273846');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`accountNo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
