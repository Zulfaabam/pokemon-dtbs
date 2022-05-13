-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2022 at 05:55 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `poke_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `breeding`
--

CREATE TABLE `breeding` (
  `egg_groups_id` int(4) NOT NULL,
  `egg_groups` varchar(100) NOT NULL,
  `egg_cycles` int(2) NOT NULL,
  `is_delete` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `breeding`
--

INSERT INTO `breeding` (`egg_groups_id`, `egg_groups`, `egg_cycles`, `is_delete`) VALUES
(1002, 'water 1', 20, b'1'),
(1005, 'field', 15, b'0'),
(1007, 'grass', 20, b'0'),
(1014, 'dragon', 20, b'0');

-- --------------------------------------------------------

--
-- Table structure for table `pokemon`
--

CREATE TABLE `pokemon` (
  `pokemon_id` int(3) NOT NULL,
  `pokemon_name` varchar(100) NOT NULL,
  `pokemon_species` varchar(100) NOT NULL,
  `type_id` int(1) NOT NULL,
  `egg_groups_id` int(4) NOT NULL,
  `is_delete` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pokemon`
--

INSERT INTO `pokemon` (`pokemon_id`, `pokemon_name`, `pokemon_species`, `type_id`, `egg_groups_id`, `is_delete`) VALUES
(1, 'bulba', 'seed', 1, 1007, b'0'),
(2, 'ivysaur', 'seed', 1, 1007, b'0'),
(3, 'venusaur', 'seed', 1, 1007, b'0'),
(4, 'charmander', 'lizard', 2, 1014, b'0'),
(5, 'charmeleon', 'lizard', 2, 1014, b'0'),
(6, 'charizard', 'lizard', 2, 1014, b'0'),
(7, 'squirtle', 'tiny turtle', 3, 1002, b'0'),
(161, 'sentret', 'scout', 4, 1005, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `type_id` int(1) NOT NULL,
  `type_name` varchar(100) NOT NULL,
  `type_strength` varchar(100) NOT NULL,
  `type_weakness` varchar(100) NOT NULL,
  `is_delete` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`type_id`, `type_name`, `type_strength`, `type_weakness`, `is_delete`) VALUES
(1, 'grass', 'water', 'fire', b'0'),
(2, 'fire', 'grass', 'water', b'0'),
(3, 'water', 'fire', 'grass', b'0'),
(4, 'normal', '-', 'fighting', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `created_at`) VALUES
(1, 'abam', '$2y$10$ww2fEGgzEpAWPXkD480I3ucV0iq3qD5xtv726RE6/Q.0SCW0sqS0W', '2021-11-22 11:19:09'),
(2, 'zabam', '$2y$10$SPrtZKgJ2mohtgYDJLHCP.P/o1HAmwP5mz3jWWxE7pOrT1hnEePmm', '2021-11-23 05:12:33'),
(3, 'admin', '$2y$10$ZX6hLLVtyHD5EH5nU.iq6uYEqiC2DEx55tDYqkYG72OKYGxrFMskW', '2021-11-23 05:15:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `breeding`
--
ALTER TABLE `breeding`
  ADD PRIMARY KEY (`egg_groups_id`);

--
-- Indexes for table `pokemon`
--
ALTER TABLE `pokemon`
  ADD PRIMARY KEY (`pokemon_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pokemon`
--
ALTER TABLE `pokemon`
  MODIFY `pokemon_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
