-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2022 at 08:59 PM
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'user1Account', '$2y$10$Bv00hwQYssmI6djOE5Q4Xusoki1klvMfI1g0ko6j77Dzbi3z7bl7W', '2022-04-28 10:12:34'),
(2, 'user2Account', '$2y$10$QZXKlX..qKq9/KD5NvezIOcBPFdg26LRYwAHkaRiUJ0/66dQiHgum', '2022-04-28 10:13:41'),
(3, 'user3Account', '$2y$10$9U8esa/T4cNyIX26Gfi8zOw.PpbJmC9SRdy3T9LmX.R8LWh3hWKVS', '2022-04-28 10:14:51'),
(4, 'user4Account', '$2y$10$wGTUIAlcXcHraI64JAqpN.EkSoJ0Nl5xxtac6JDnSKy8AcCCRwfe.', '2022-04-28 10:15:33'),
(5, 'user5Account', '$2y$10$N1k3gzbCGe6SSGhhYY0ZwOk59Z9Supcz5DgCSsvwRkIuZk8mw7D7m', '2022-04-28 10:16:11'),
(6, 'user6Account', '$2y$10$j1lDDQr0D.EXFIL/qS9sDOgl7VQgaVykTOOWThxesKr/YgniG6epW', '2022-04-28 13:32:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
