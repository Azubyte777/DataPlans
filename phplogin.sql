-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2022 at 04:37 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phplogin`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `password`, `email`, `phone`, `first_name`, `last_name`, `pid`) VALUES
(1, 'test', '$2y$10$SfhYIDtn.iOuCW7zfoFLuuZHX6lja4lF4XA4JqNmpiH/.P3zB8JCa', 'test@test.com', NULL, NULL, NULL, 1),
(2, 'Azu', '$2y$10$UiKAqSQ2B63LBM33PCpdJOOu88zQBbuo8rRGGM56KtELB/xVJo/v.', 'enwonwubrian@gmail.com', NULL, NULL, NULL, NULL),
(4, 'testing', '$2y$10$ynuCdXSxzVm9y2MgNw/QJOBpbQrrFVidl/BnukUXt1tBUqeSbr9wq', 'testing@testing.com', NULL, NULL, NULL, 3),
(8, 'greyghost406', '$2y$10$c3k4/VOYShqzDHeawYNaje7zojZ0x.5zfZI0HI.PuLWUwKyTrObii', 'greyghost406@gmail.com', '6602344220', 'Brian', 'Enwonwu', 2);

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `pid` int(11) NOT NULL,
  `cost` decimal(4,2) NOT NULL,
  `plan_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `no_of_minutes` int(11) NOT NULL,
  `no_of_texts` int(11) NOT NULL,
  `amount_of_data` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`pid`, `cost`, `plan_name`, `no_of_minutes`, `no_of_texts`, `amount_of_data`) VALUES
(1, '4.99', 'Small', 100, 100, 3),
(2, '14.99', 'Medium', 500, 500, 10),
(3, '24.99', 'Big', 1500, 1500, 30);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`pid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
