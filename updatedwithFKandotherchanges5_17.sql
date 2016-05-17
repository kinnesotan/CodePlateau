-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2016 at 06:28 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codesite`
--

-- --------------------------------------------------------

--
-- Table structure for table `attempt`
--

CREATE TABLE `attempt` (
  `exercise_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `started` tinyint(1) NOT NULL DEFAULT '0',
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `attempt_id` int(11) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `concept`
--

CREATE TABLE `concept` (
  `concept_id` int(4) NOT NULL,
  `concept_name` varchar(50) NOT NULL,
  `concept_text` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `concept`
--

INSERT INTO `concept` (`concept_id`, `concept_name`, `concept_text`) VALUES
(1, 'Declaring a variable', 'A variable is very necessary when it comes to programming. It gets your program started.'),
(2, 'Making a while loop', 'LOOP D LOOP'),
(3, 'Newest concept', '');

-- --------------------------------------------------------

--
-- Table structure for table `concept_exercise`
--

CREATE TABLE `concept_exercise` (
  `concept_id` int(11) NOT NULL,
  `exercise_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `concept_exercise`
--

INSERT INTO `concept_exercise` (`concept_id`, `exercise_id`) VALUES
(1, 63),
(1, 65),
(2, 66),
(2, 67),
(3, 58),
(3, 66),
(3, 67),
(3, 71),
(66, 2),
(67, 3);

-- --------------------------------------------------------

--
-- Table structure for table `exercise`
--

CREATE TABLE `exercise` (
  `exercise_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` longtext NOT NULL,
  `level_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exercise`
--

INSERT INTO `exercise` (`exercise_id`, `author_id`, `title`, `description`, `level_id`) VALUES
(58, 1, 'TESTING 3', 'TESTING 3			TEST		', 4),
(59, 1, 'Newest Exercise', 'New', 1),
(60, 1, 'Newest Exercise', 'New', 1),
(61, 1, 'Newest Exercise', 'New', 1),
(62, 1, 'Newest Exercise', 'New', 1),
(63, 1, 'Newest Exercise', 'New', 1),
(65, 1, 'TEST LATEST', 'TEST', 1),
(66, 1, 'While Loop CSHARP', 'TEST', 1),
(67, 1, 'Loop dat stuff', 'THIS IS CONTENT', 4),
(71, 1, 'Declaring a variable', 'PHP', 1);

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `file_ID` int(11) NOT NULL,
  `file_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`file_ID`, `file_name`) VALUES
(1, 'Kinne_Matt_Resume.pdf'),
(2, 'sponge.png'),
(3, 'yoshi.png');

-- --------------------------------------------------------

--
-- Table structure for table `file_package`
--

CREATE TABLE `file_package` (
  `exercise_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file_package`
--

INSERT INTO `file_package` (`exercise_id`, `language_id`, `file_id`) VALUES
(71, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `language_id` int(11) NOT NULL,
  `language_name` varchar(25) NOT NULL,
  `editor_string` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`language_id`, `language_name`, `editor_string`) VALUES
(1, 'php', ''),
(2, 'xml', ''),
(3, 'java', ''),
(4, 'csharp', ''),
(5, 'javascript', ''),
(6, 'css', ''),
(7, 'html', ''),
(8, 'python', '');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `level_id` int(11) NOT NULL,
  `level_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`level_id`, `level_name`) VALUES
(1, 'Beginner'),
(2, 'Intermediate'),
(3, 'Advanced'),
(4, 'Professional');

-- --------------------------------------------------------

--
-- Table structure for table `support_package`
--

CREATE TABLE `support_package` (
  `package_jd` int(11) NOT NULL,
  `exercise_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(5) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(35) NOT NULL,
  `password` varchar(50) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `is_admin`) VALUES
(1, 'admin', 'admin@codeplateau.com', 'admin', 1),
(2, 'kinnesotan', 'mattkinne@gmail.com', '301f57a214dc11544aaa339dad10ffb3', 0),
(3, 'derp', 'derp@derp.com', '58fd9edd83341c29f1aebba81c31e257', 0),
(4, 'test', 'test@test.com', '098f6bcd4621d373cade4e832627b4f6', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attempt`
--
ALTER TABLE `attempt`
  ADD PRIMARY KEY (`attempt_id`),
  ADD KEY `attempt.index` (`exercise_id`,`language_id`,`user_id`);

--
-- Indexes for table `concept`
--
ALTER TABLE `concept`
  ADD PRIMARY KEY (`concept_id`);

--
-- Indexes for table `concept_exercise`
--
ALTER TABLE `concept_exercise`
  ADD PRIMARY KEY (`concept_id`,`exercise_id`),
  ADD KEY `exercise_id` (`exercise_id`);

--
-- Indexes for table `exercise`
--
ALTER TABLE `exercise`
  ADD PRIMARY KEY (`exercise_id`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`file_ID`);

--
-- Indexes for table `file_package`
--
ALTER TABLE `file_package`
  ADD PRIMARY KEY (`language_id`),
  ADD UNIQUE KEY `language_id` (`language_id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`language_id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `support_package`
--
ALTER TABLE `support_package`
  ADD PRIMARY KEY (`package_jd`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attempt`
--
ALTER TABLE `attempt`
  MODIFY `attempt_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `concept`
--
ALTER TABLE `concept`
  MODIFY `concept_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `exercise`
--
ALTER TABLE `exercise`
  MODIFY `exercise_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `file_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `language_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `support_package`
--
ALTER TABLE `support_package`
  MODIFY `package_jd` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
