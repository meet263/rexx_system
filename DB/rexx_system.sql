-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 11, 2021 at 10:03 AM
-- Server version: 8.0.22-0ubuntu0.20.04.3
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rexx_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int NOT NULL,
  `participation_id` int NOT NULL,
  `employee_name` varchar(255) NOT NULL,
  `employee_mail` varchar(255) NOT NULL,
  `event_id` int NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `participation_fee` double NOT NULL,
  `event_date` date NOT NULL,
  `version` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `participation_id`, `employee_name`, `employee_mail`, `event_id`, `event_name`, `participation_fee`, `event_date`, `version`) VALUES
(1, 1, 'Reto Fanzen', 'reto.fanzen@no-reply.rexx-systems.com', 1, 'PHP 7 crash course', 0, '2019-09-04', NULL),
(2, 2, 'Reto Fanzen', 'reto.fanzen@no-reply.rexx-systems.com', 2, 'International PHP Conference', 1485.99, '2019-10-21', NULL),
(3, 3, 'Leandro Bußmann', 'leandro.bussmann@no-reply.rexx-systems.com', 2, 'International PHP Conference', 657.5, '2019-10-21', NULL),
(4, 4, 'Hans Schäfer', 'hans.schaefer@no-reply.rexx-systems.com', 1, 'PHP 7 crash course', 0, '2019-09-04', NULL),
(5, 5, 'Mia Wyss', 'mia.wyss@no-reply.rexx-systems.com', 1, 'PHP 7 crash course', 0, '2019-09-04', NULL),
(6, 6, 'Mia Wyss', 'mia.wyss@no-reply.rexx-systems.com', 2, 'International PHP Conference', 657.5, '2019-10-21', '1.1.3'),
(7, 7, 'Reto Fanzen', 'reto.fanzen@no-reply.rexx-systems.com', 3, 'code.talks', 474.81, '2019-10-24', NULL),
(8, 8, 'Hans Schäfer', 'hans.schaefer@no-reply.rexx-systems.com', 3, 'code.talks', 534.31, '2019-10-24', '1.1.3'),
(9, 1, 'Reto Fanzen', 'reto.fanzen@no-reply.rexx-systems.com', 1, 'PHP 7 crash course', 0, '2019-09-04', NULL),
(10, 2, 'Reto Fanzen', 'reto.fanzen@no-reply.rexx-systems.com', 2, 'International PHP Conference', 1485.99, '2019-10-21', NULL),
(11, 3, 'Leandro Bußmann', 'leandro.bussmann@no-reply.rexx-systems.com', 2, 'International PHP Conference', 657.5, '2019-10-21', NULL),
(12, 4, 'Hans Schäfer', 'hans.schaefer@no-reply.rexx-systems.com', 1, 'PHP 7 crash course', 0, '2019-09-04', NULL),
(13, 5, 'Mia Wyss', 'mia.wyss@no-reply.rexx-systems.com', 1, 'PHP 7 crash course', 0, '2019-09-04', NULL),
(14, 6, 'Mia Wyss', 'mia.wyss@no-reply.rexx-systems.com', 2, 'International PHP Conference', 657.5, '2019-10-21', '1.1.3'),
(15, 7, 'Reto Fanzen', 'reto.fanzen@no-reply.rexx-systems.com', 3, 'code.talks', 474.81, '2019-10-24', NULL),
(16, 8, 'Hans Schäfer', 'hans.schaefer@no-reply.rexx-systems.com', 3, 'code.talks', 534.31, '2019-10-24', '1.1.3'),
(17, 1, 'Reto Fanzen', 'reto.fanzen@no-reply.rexx-systems.com', 1, 'PHP 7 crash course', 0, '2019-09-04', NULL),
(18, 2, 'Reto Fanzen', 'reto.fanzen@no-reply.rexx-systems.com', 2, 'International PHP Conference', 1485.99, '2019-10-21', NULL),
(19, 3, 'Leandro Bußmann', 'leandro.bussmann@no-reply.rexx-systems.com', 2, 'International PHP Conference', 657.5, '2019-10-21', NULL),
(20, 4, 'Hans Schäfer', 'hans.schaefer@no-reply.rexx-systems.com', 1, 'PHP 7 crash course', 0, '2019-09-04', NULL),
(21, 5, 'Mia Wyss', 'mia.wyss@no-reply.rexx-systems.com', 1, 'PHP 7 crash course', 0, '2019-09-04', NULL),
(22, 6, 'Mia Wyss', 'mia.wyss@no-reply.rexx-systems.com', 2, 'International PHP Conference', 657.5, '2019-10-21', '1.1.3'),
(23, 7, 'Reto Fanzen', 'reto.fanzen@no-reply.rexx-systems.com', 3, 'code.talks', 474.81, '2019-10-24', NULL),
(24, 8, 'Hans Schäfer', 'hans.schaefer@no-reply.rexx-systems.com', 3, 'code.talks', 534.31, '2019-10-24', '1.1.3'),
(25, 1, 'Reto Fanzen', 'reto.fanzen@no-reply.rexx-systems.com', 1, 'PHP 7 crash course', 0, '2019-09-04', NULL),
(26, 2, 'Reto Fanzen', 'reto.fanzen@no-reply.rexx-systems.com', 2, 'International PHP Conference', 1485.99, '2019-10-21', NULL),
(27, 3, 'Leandro Bußmann', 'leandro.bussmann@no-reply.rexx-systems.com', 2, 'International PHP Conference', 657.5, '2019-10-21', NULL),
(28, 4, 'Hans Schäfer', 'hans.schaefer@no-reply.rexx-systems.com', 1, 'PHP 7 crash course', 0, '2019-09-04', NULL),
(29, 5, 'Mia Wyss', 'mia.wyss@no-reply.rexx-systems.com', 1, 'PHP 7 crash course', 0, '2019-09-04', NULL),
(30, 6, 'Mia Wyss', 'mia.wyss@no-reply.rexx-systems.com', 2, 'International PHP Conference', 657.5, '2019-10-21', '1.1.3'),
(31, 7, 'Reto Fanzen', 'reto.fanzen@no-reply.rexx-systems.com', 3, 'code.talks', 474.81, '2019-10-24', NULL),
(32, 8, 'Hans Schäfer', 'hans.schaefer@no-reply.rexx-systems.com', 3, 'code.talks', 534.31, '2019-10-24', '1.1.3'),
(33, 1, 'Reto Fanzen', 'reto.fanzen@no-reply.rexx-systems.com', 1, 'PHP 7 crash course', 0, '2019-09-04', NULL),
(34, 2, 'Reto Fanzen', 'reto.fanzen@no-reply.rexx-systems.com', 2, 'International PHP Conference', 1485.99, '2019-10-21', NULL),
(35, 3, 'Leandro Bußmann', 'leandro.bussmann@no-reply.rexx-systems.com', 2, 'International PHP Conference', 657.5, '2019-10-21', NULL),
(36, 4, 'Hans Schäfer', 'hans.schaefer@no-reply.rexx-systems.com', 1, 'PHP 7 crash course', 0, '2019-09-04', NULL),
(37, 5, 'Mia Wyss', 'mia.wyss@no-reply.rexx-systems.com', 1, 'PHP 7 crash course', 0, '2019-09-04', NULL),
(38, 6, 'Mia Wyss', 'mia.wyss@no-reply.rexx-systems.com', 2, 'International PHP Conference', 657.5, '2019-10-21', '1.1.3'),
(39, 7, 'Reto Fanzen', 'reto.fanzen@no-reply.rexx-systems.com', 3, 'code.talks', 474.81, '2019-10-24', NULL),
(40, 8, 'Hans Schäfer', 'hans.schaefer@no-reply.rexx-systems.com', 3, 'code.talks', 534.31, '2019-10-24', '1.1.3'),
(41, 1, 'Reto Fanzen', 'reto.fanzen@no-reply.rexx-systems.com', 1, 'PHP 7 crash course', 0, '2019-09-04', NULL),
(42, 2, 'Reto Fanzen', 'reto.fanzen@no-reply.rexx-systems.com', 2, 'International PHP Conference', 1485.99, '2019-10-21', NULL),
(43, 3, 'Leandro Bußmann', 'leandro.bussmann@no-reply.rexx-systems.com', 2, 'International PHP Conference', 657.5, '2019-10-21', NULL),
(44, 4, 'Hans Schäfer', 'hans.schaefer@no-reply.rexx-systems.com', 1, 'PHP 7 crash course', 0, '2019-09-04', NULL),
(45, 5, 'Mia Wyss', 'mia.wyss@no-reply.rexx-systems.com', 1, 'PHP 7 crash course', 0, '2019-09-04', NULL),
(46, 6, 'Mia Wyss', 'mia.wyss@no-reply.rexx-systems.com', 2, 'International PHP Conference', 657.5, '2019-10-21', '1.1.3'),
(47, 7, 'Reto Fanzen', 'reto.fanzen@no-reply.rexx-systems.com', 3, 'code.talks', 474.81, '2019-10-24', NULL),
(48, 8, 'Hans Schäfer', 'hans.schaefer@no-reply.rexx-systems.com', 3, 'code.talks', 534.31, '2019-10-24', '1.1.3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
