-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2017 at 05:57 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `permission` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `fullname` text NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` text NOT NULL,
  `scores` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `fullname`, `username`, `password`, `email`, `gender`, `scores`) VALUES
(1, 'Nwadike Chikezie', 'chykrinks', 'triumphant', 'chykrinks@gmail.com', 'Male', 54);

-- --------------------------------------------------------

--
-- Table structure for table `students_scores`
--

CREATE TABLE `students_scores` (
  `id` int(100) NOT NULL,
  `scores` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students_scores`
--

INSERT INTO `students_scores` (`id`, `scores`) VALUES
(1, 66),
(2, 84),
(3, 45),
(4, 94),
(5, 55),
(6, 54),
(7, 39),
(8, 47),
(9, 62),
(10, 50),
(11, 76),
(12, 31),
(13, 3),
(14, 49),
(15, 43),
(16, 75),
(17, 90),
(18, 99),
(19, 72),
(20, 79),
(21, 97),
(22, 74),
(23, 41),
(24, 51),
(25, 80),
(26, 16),
(27, 60),
(28, 100),
(29, 59),
(30, 57),
(31, 91),
(32, 4),
(33, 98),
(34, 89),
(35, 81),
(36, 5),
(37, 2),
(38, 33),
(39, 26),
(40, 93),
(41, 22),
(42, 67),
(43, 95),
(44, 53),
(45, 86),
(46, 19),
(47, 9),
(48, 6),
(49, 46),
(50, 18),
(51, 25),
(52, 28),
(53, 77),
(54, 15),
(55, 58),
(56, 92),
(57, 11),
(58, 27),
(59, 38),
(60, 30),
(61, 35),
(62, 44),
(63, 52),
(64, 87),
(65, 34),
(66, 78),
(67, 71),
(68, 63),
(69, 12),
(70, 65),
(71, 29),
(72, 7),
(73, 14),
(74, 83),
(75, 10),
(76, 8),
(77, 56),
(78, 17),
(79, 96),
(80, 40),
(81, 36),
(82, 73),
(83, 82),
(84, 24),
(85, 42),
(86, 69),
(87, 37),
(88, 1),
(89, 48),
(90, 20),
(91, 21),
(92, 64),
(93, 68),
(94, 88),
(95, 32),
(96, 85),
(97, 70),
(98, 23),
(99, 13),
(100, 61);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` text NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL,
  `salt` varchar(32) NOT NULL,
  `groupes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users_session`
--

CREATE TABLE `users_session` (
  `id` int(11) NOT NULL,
  `user_id` text NOT NULL,
  `hash` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students_scores`
--
ALTER TABLE `students_scores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_session`
--
ALTER TABLE `users_session`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `students_scores`
--
ALTER TABLE `students_scores`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users_session`
--
ALTER TABLE `users_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
