-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2016 at 07:19 PM
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
  `attempt_id` int(11) NOT NULL
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
(3, 'Newest concept', ''),
(4, 'new', '');

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
(1, 58),
(1, 59),
(1, 60),
(1, 63),
(1, 65),
(2, 58),
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
  `level_id` int(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exercise`
--

INSERT INTO `exercise` (`exercise_id`, `author_id`, `title`, `description`, `level_id`, `deleted`) VALUES
(58, 1, 'TESTING 3', 'TESTING 3			TEST							', 4, 1),
(59, 1, 'Newest Exerciser', 'Newer										', 1, 0),
(60, 1, 'Newest Exercise', 'New', 1, 0),
(61, 1, 'Newest Exercise', 'New', 1, 0),
(62, 1, 'Newest Exercise', 'New', 1, 0),
(63, 1, 'Newest Exercise', 'New', 1, 0),
(65, 1, 'TEST LATEST', 'TEST', 1, 0),
(66, 1, 'While Loop CSHARP', 'TEST', 1, 0),
(67, 1, 'Loop dat stuff', 'THIS IS CONTENT', 4, 0),
(71, 1, 'Declaring a variable', 'PHP', 1, 0),
(73, 1, '', '', 0, 0),
(74, 1, '', '', 0, 0),
(75, 1, '', '', 0, 0),
(76, 1, '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `file_ID` int(11) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `file_location` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`file_ID`, `file_name`, `file_location`) VALUES
(1, 'Kinne_Matt_Resume.pdf', ''),
(2, 'sponge.png', ''),
(3, 'yoshi.png', '');

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
(71, 1, 3),
(66, 4, 3),
(66, 8, 2);

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `language_id` int(11) NOT NULL,
  `language_name` varchar(25) NOT NULL,
  `call_language` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`language_id`, `language_name`, `call_language`) VALUES
(1, 'php', 'editor.session.setMode("ace/mode/php");'),
(2, 'xml', 'editor.session.setMode("ace/mode/xml");'),
(3, 'java', 'editor.session.setMode("ace/mode/java");'),
(4, 'csharp', 'editor.session.setMode("ace/mode/csharp");'),
(5, 'javascript', 'editor.session.setMode("ace/mode/javascript");'),
(6, 'css', 'editor.session.setMode("ace/mode/css");'),
(7, 'html', 'editor.session.setMode("ace/mode/html");'),
(8, 'python', 'editor.session.setMode("ace/mode/python");');

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
  `exercise_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `support_package`
--

INSERT INTO `support_package` (`exercise_id`, `language_id`, `content`, `deleted`) VALUES
(5, 5, 'sdfsdfsdfsdfs', 0),
(56, 0, 'TEST\r\n\r\n', 0),
(57, 0, '\r\nDER', 0),
(58, 1, '\r\n\r\n\r\n\r\n<?php\r\n    $money = "money";\r\n?>\r\n', 1),
(58, 6, '\r\n\r\n\r\n\r\n<?php\r\n    $money = "money";\r\n?>\r\n', 1),
(58, 8, '\r\n\r\n\r\n\r\n<?php\r\n    $money = "money";\r\n?>\r\n', 1),
(59, 3, '\r\n\r\n\r\nTEST\r\n', 0),
(60, 3, '\r\n', 0),
(61, 3, '\r\n', 0),
(62, 3, '\r\n', 0),
(63, 3, '\r\n', 0),
(65, 1, '\r\nVAR', 0),
(66, 4, '\r\nW', 0),
(67, 5, '', 0),
(67, 8, 'STUFF\r\n', 0),
(71, 1, '<?php\r\n    $money = "money";\r\n?>\r\n', 0),
(71, 3, '', 0),
(73, 0, '', 0),
(74, 0, '', 0),
(75, 0, '', 0),
(76, 0, '', 0);

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
  ADD PRIMARY KEY (`exercise_id`,`language_id`),
  ADD KEY `language_id` (`language_id`);

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
  MODIFY `concept_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `exercise`
--
ALTER TABLE `exercise`
  MODIFY `exercise_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
