-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2022 at 09:02 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `authenticationdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `workout_users`
--

CREATE TABLE `workout_users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `gender` varchar(1) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `address` varchar(80) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `workout_users`
--

INSERT INTO `workout_users` (`user_id`, `email`, `gender`, `height`, `address`, `age`, `name`) VALUES
(1, 'user1@gmail.com', 'm', 70, '45 Maple St N Buffalo MN', 34, 'John Doe'),
(2, 'user2@gmail.com', 'f', 50, '1 Grove St W Annandale MN ', 24, 'Mary Jane Doe'),
(3, 'user3@gmail.com', 'm', 60, '5 Larson St E New York New York', 46, 'Bruce Wayne'),
(4, 'user4@gmail.com', 'f', 73, '6 Circle Dr S St. Paul MN', 78, 'Billy Jean'),
(5, 'user5@gmail.com', 'm', 61, '7 Tree St N Buffalo MN', 64, 'Bill Murray'),
(6, 'user6@gmail.com', 'f', 150, '68 Blue Street W', 34, 'Bob Newhart');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `workout_users`
--
ALTER TABLE `workout_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `workout_users`
--
ALTER TABLE `workout_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `workout_users`
--
ALTER TABLE `workout_users`
  ADD CONSTRAINT `workout_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
