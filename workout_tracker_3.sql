-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2022 at 09:25 PM
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
-- Table structure for table `workout_tracker`
--

CREATE TABLE `workout_tracker` (
  `user_id` int(11) NOT NULL,
  `workout_id` int(11) NOT NULL,
  `workout_date` datetime NOT NULL DEFAULT current_timestamp(),
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `workout_tracker`
--

INSERT INTO `workout_tracker` (`user_id`, `workout_id`, `workout_date`, `amount`) VALUES
(1, 1, '2022-03-10 20:47:45', 20),
(4, 1, '2022-04-28 11:53:06', 20),
(2, 2, '2022-03-10 20:51:24', 50),
(2, 3, '2022-04-28 11:35:06', 100),
(3, 3, '2022-03-10 20:51:24', 40),
(4, 4, '2022-03-10 20:51:24', 200),
(5, 5, '2022-03-10 20:51:24', 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `workout_tracker`
--
ALTER TABLE `workout_tracker`
  ADD KEY `workout_Tracker_User_Id` (`user_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `workout_tracker`
--
ALTER TABLE `workout_tracker`
  ADD CONSTRAINT `workout_Tracker_User_Id` FOREIGN KEY (`user_id`) REFERENCES `workout_users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
