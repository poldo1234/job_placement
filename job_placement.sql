-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2022 at 12:44 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job_placement`
--

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` int(11) NOT NULL,
  `branch_name` varchar(100) NOT NULL,
  `branch_desc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `branch_name`, `branch_desc`) VALUES
(1, 'CEIT', 'College of Engineering and Information Technology'),
(2, 'CAS', 'College of Arts and Science'),
(4, 'CED', 'College of Education'),
(5, 'CCJ', 'College of Criminal Justice'),
(6, 'CVMBS', 'College of Veterinary and Biomedical Science'),
(7, 'CSPEAR', 'College of Sports, Physical Education and Recreation'),
(8, 'CON', 'College of Nursing'),
(9, 'CEMDS', 'College of Economic Management and Development Studies'),
(10, 'CAFENR', 'College of Agriculture Food, Environment and Natural Resources'),
(11, 'CvSU BACOOR', 'Cavite State University - Bacoor City Campus'),
(12, 'CvSU Carmona ', 'Cavite State University - Carmona Campus'),
(13, 'CvSU Cavite City', 'Cavite State University - Cavite City Campus'),
(14, 'CvSU General Trias', 'Cavite State University - General Trias City Campus'),
(15, 'CvSU Imus', 'Cavite State University - Imus City Campus'),
(16, 'CvSU Maragondon', 'Cavite State University - Maragondon Campus'),
(17, 'CvSU Naic ', 'Cavite State University - Naic Campus'),
(18, 'CvSU Rosario', 'Cavite State University - Rosario Campus'),
(19, 'CvSU Silang', 'Cavite State University - Silang Campus'),
(20, 'CvSU Tanza', 'Cavite State University - Tanza Campus'),
(21, 'CvSU Trece Martires', 'Cavite State University - Trece Martires City Campus');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `branch_id`, `course_name`, `course_desc`) VALUES
(12, 4, 'BSED', 'BS Education');

-- --------------------------------------------------------

--
-- Table structure for table `percentages`
--

CREATE TABLE `percentages` (
  `id` int(11) NOT NULL,
  `q1_percentage` decimal(10,2) NOT NULL,
  `q2_percentage` decimal(10,2) NOT NULL,
  `q3_percentage` decimal(10,2) NOT NULL,
  `q4_percentage` decimal(10,2) NOT NULL,
  `total_percentage` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `quarters`
--

CREATE TABLE `quarters` (
  `id` int(11) NOT NULL,
  `quarter_name` varchar(100) NOT NULL,
  `quarter_desc` varchar(100) NOT NULL,
  `quarter_range` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quarters`
--

INSERT INTO `quarters` (`id`, `quarter_name`, `quarter_desc`, `quarter_range`) VALUES
(1, 'Q1', '1st Quarter', 'January - March'),
(2, 'Q2', '2nd Quarter', 'April - June'),
(3, 'Q3', '3rd Quarter', 'July - September'),
(4, 'Q4', '4th Quarter', 'October - December');

-- --------------------------------------------------------

--
-- Table structure for table `quarter_records`
--

CREATE TABLE `quarter_records` (
  `id` int(11) NOT NULL,
  `branch_id` int(100) NOT NULL,
  `quarter_id` varchar(100) NOT NULL,
  `year` year(4) NOT NULL,
  `no_of_graduate` int(100) NOT NULL,
  `no_of_employed` int(100) NOT NULL,
  `no_of_unemployed` int(100) NOT NULL,
  `no_of_untracked` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quarter_records`
--

INSERT INTO `quarter_records` (`id`, `branch_id`, `quarter_id`, `year`, `no_of_graduate`, `no_of_employed`, `no_of_unemployed`, `no_of_untracked`) VALUES
(1, 1, '1', 2022, 50, 25, 15, 10),
(2, 1, '1', 2022, 10, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`) VALUES
(1, 'Administrator'),
(2, 'Coordinator');

-- --------------------------------------------------------

--
-- Table structure for table `total_records`
--

CREATE TABLE `total_records` (
  `id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  `total_graduates` int(11) NOT NULL,
  `total_employed` int(11) NOT NULL,
  `total_unemployed` int(11) NOT NULL,
  `total_untracked` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `branch_id`, `role_id`, `email`, `phone_number`, `password`) VALUES
(1, 'Admin', 'Admin lastname', 19, 1, 'admin@admin.com', '1', 'password'),
(11, 'Leopoldo', 'Oril III', 4, 1, 'no-reply@jobplacement.com', '09123456789', 'password');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `percentages`
--
ALTER TABLE `percentages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quarters`
--
ALTER TABLE `quarters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quarter_records`
--
ALTER TABLE `quarter_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `total_records`
--
ALTER TABLE `total_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `percentages`
--
ALTER TABLE `percentages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quarters`
--
ALTER TABLE `quarters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `quarter_records`
--
ALTER TABLE `quarter_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `total_records`
--
ALTER TABLE `total_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
