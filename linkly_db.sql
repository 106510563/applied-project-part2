-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2026 at 03:53 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `linkly_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `eoi`
--

CREATE TABLE `eoi` (
  `eoi_id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) NOT NULL,
  `pref_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `suburb` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `postcode` int(4) NOT NULL,
  `job_title` varchar(50) NOT NULL,
  `job_ref` varchar(5) NOT NULL,
  `mobile_number` int(15) NOT NULL,
  `home_number` int(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `skills` varchar(30) NOT NULL,
  `otherskills` varchar(500) NOT NULL,
  `exp` varchar(500) NOT NULL,
  `status` enum('New','Current','Final') NOT NULL DEFAULT 'New'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `ref` varchar(5) DEFAULT NULL,
  `salary` varchar(10) NOT NULL,
  `casual` tinyint(1) NOT NULL,
  `parttime` tinyint(1) NOT NULL,
  `fulltime` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Table structure for table `manage` (meant for manage.php)
--

CREATE TABLE `manage` (
  `manager_id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci

--
-- Data for `manage`
--

INSERT INTO `manage` (`manager_id`, `username`, `email`, `password`) VALUES 
(420, 'admin', 'admin@suot.com', 'admin');

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `name`, `ref`, `salary`, `casual`, `parttime`, `fulltime`) VALUES
(1, 'E-Commerce Customer Service Officer', 'ECCSO', '50,000', 1, 1, 0),
(2, 'E-Commerce Coordinator', 'ECC01', '175,000', 0, 0, 1);



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
