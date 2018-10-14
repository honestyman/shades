-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2018 at 12:32 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbase_shades`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) NOT NULL,
  `admin_user` varchar(32) NOT NULL,
  `admin_pass` varchar(32) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `admin_user`, `admin_pass`, `date_created`) VALUES
(1, 'shdsadmin', '5f4dcc3b5aa765d61d8327deb882cf99', '2017-11-07'),
(2, 'rhan', '8da161307278ed1faca7f7650b453191', '2017-11-07'),
(3, 'daniel', '8da161307278ed1faca7f7650b453191', '2017-11-07'),
(4, 'carl', '8da161307278ed1faca7f7650b453191', '2017-11-07'),
(5, 'shaun', '8da161307278ed1faca7f7650b453191', '2017-11-07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_content`
--

CREATE TABLE `tbl_content` (
  `id` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` mediumtext NOT NULL,
  `changed_by` varchar(32) NOT NULL,
  `date_changed` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_content`
--

INSERT INTO `tbl_content` (`id`, `title`, `content`, `changed_by`, `date_changed`) VALUES
(1, 'Game Description', 'Shades is a mini number and color game. Players would have to challenge their focusing skills and memory capacity in order to play this game.', 'Rhan', '2017-11-07'),
(2, 'Game Tagline', 'A casual memory game for everyone', 'Rhan', '2017-11-07'),
(3, 'Button Copy', 'play', 'Rhan', '2017-11-07'),
(4, 'Page Footer', 'Copyright 2017 - The Shades Team - All Rights Reserved', 'Rhan', '2017-11-07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_howto`
--

CREATE TABLE `tbl_howto` (
  `id` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` mediumtext NOT NULL,
  `changed_by` varchar(32) NOT NULL,
  `date_changed` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_howto`
--

INSERT INTO `tbl_howto` (`id`, `title`, `content`, `changed_by`, `date_changed`) VALUES
(1, 'Step 1', 'In the grid, notice that there are four different shades of blue. Sequence them in your mind from lightest to darkest.', 'carl', '2017-11-07'),
(2, 'Step 2', 'Memorize the smallest number in each shade, from lightest to darkest. Like so:', 'carl', '2017-11-07'),
(3, 'Step 3', 'Note that if you have misclicked boxes that are not in the proper sequence, you\'ll get a wrong answer. You can still complete the level by finding the remaining values in the sequence.', 'carl', '2017-11-07'),
(4, 'Step 4', 'You have three lives. Memorize and complete the sequence then proceed to the next level! Goodluck and have fun!', 'carl', '2017-11-07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_players`
--

CREATE TABLE `tbl_players` (
  `id` int(10) NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nickname` varchar(32) NOT NULL,
  `date_reg` date NOT NULL,
  `date_last_played` date NOT NULL,
  `best_level` int(10) NOT NULL,
  `best_score` mediumint(9) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_players`
--

INSERT INTO `tbl_players` (`id`, `email`, `password`, `nickname`, `date_reg`, `date_last_played`, `best_level`, `best_score`, `status`) VALUES
(7, 'letsplayshades@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Administrator', '2017-11-09', '2017-11-09', 6, 72, 'active'),
(8, 'test1@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Test 1', '2017-11-09', '2017-11-09', 5, 36, 'active'),
(9, 'rodrigoduts@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Test 2', '2017-11-09', '2017-11-10', 7, 105, 'active'),
(10, 'test3@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Test 3', '2017-11-09', '2017-11-09', 3, 12, 'banned'),
(11, 'noobie@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Im noob', '2017-11-09', '2017-11-09', 5, 43, 'banned'),
(12, 'sample@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Test', '2017-11-09', '2017-11-09', 8, 110, 'active'),
(13, 'hello@email.com', '6a204bd89f3c8348afd5c77c717a097a', 'Hello World', '2017-11-10', '2017-11-10', 2, 4, 'active'),
(14, 'tryinactive@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Player8', '0000-00-00', '0000-00-00', 0, 0, 'inactive');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_content`
--
ALTER TABLE `tbl_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_howto`
--
ALTER TABLE `tbl_howto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_players`
--
ALTER TABLE `tbl_players`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_content`
--
ALTER TABLE `tbl_content`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_howto`
--
ALTER TABLE `tbl_howto`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_players`
--
ALTER TABLE `tbl_players`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
