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
  `desc` varchar(300) NOT NULL,
  `salary` varchar(10) NOT NULL,
  `pref` varchar(300) NOT NULL,
  `ess` varchar(300) NOT NULL,
  `hours` varchar(15) NOT NULL
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
-- Data for `manage` account for access to manage.php
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`) VALUES 
(1, 'admin', 'admin@suot.com', 'admin');

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `name`, `ref`, `desc`, `salary`, `pref`, `ess`, `hours`) VALUES
(1, 'E-Commerce Customer Service Officer', 'ECCSO', 'As the E-Commerce Customer Service Officer, you will be the face of our company, the people who will assist our clients through any problem they may have. This job is meant for the charismatic and the proactive.', '$50,000', 'An approachable and helpful personality. A proactive and quick thinker. Someone with a "always ready to help" mindset. Customer service is highly preferable.', 'Answering phone calls from clients. Referring clients to resources or other members of staff for assistance when necessary. Assisting clients in finding solutions to their problems, whether that be on call or in person.', 'Part-Time 16'),
(2, 'E-Commerce Coordinator', 'ECC01', 'You will head an integral part of operations here at Linkly, whether that be montioring and maintainance of the site, tracking product sales, or assisting in marketing our various products that will bring humanity to the future.', '$175,000', 'A mature, calm team player. A can-do attitude with a business-first mindset. A proactive and eager work-ethic who is ready to lead their team into the future. Managerial experience is highly preferable.', 'Keeping track of all operations related to position. Ensuring performance and quotas are met by the team. Setting an example for the team though leadership, work ethic, and teamwork.', 'Full-Time 36');


-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `member_id` int(11) NOT NULL,
  `member_name` varchar(30) NOT NULL,
  `student_id` varchar(13) NOT NULL,
  `dream_job` varchar(50) NOT NULL,
  `quote` varchar(200) NOT NULL,
  `snack` varchar(50) NOT NULL,
  `hometown` varchar(50) NOT NULL,
  `contributions` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`member_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

INSERT INTO `about` 
(`member_id`, `member_name`, `student_id`, `dream_job`, `quote`, `snack`, `hometown`, `contributions`) 
VALUES (NULL, 'Ciara Smith', '106510563', 'Prime Minister', '\"Krigets högsta konst är att kuva fienden utan att strida\"\r\n(The supreme art of war is to subdue the enemy without fighting.)', 'Cookies', 'Yarrawonga', 'apply.php, process_eoi.php, search.php. eoi, about, jobs tables, tasks 1,3,4,5,7'), 
(NULL, 'Kai Dicker', '106503741', 'Astronaut', '\"Όταν πας σπίτι, μπορείς να πεις στη μητέρα σου ότι γνώρισες έναν πραγματικό στρατιώτη.\"\r\n(When you go home, you can tell your mother you met a real soldier.)', 'Monster Energy', 'Melbourne', 'index.php, jobs.php, login.php, manage.php, logout.php, task 6, users table'), 
(NULL, 'Paul Harrington', '106578516', 'Game Developer', '\"一滴水會返一波泉\"\r\n(A drop of water can create a spring.)', 'Chocolate', 'Changhua City, Taiwan', 'about.php, signup.php, settings.php, task 2')



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
