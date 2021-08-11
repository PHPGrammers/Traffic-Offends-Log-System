-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2021 at 09:47 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `traffic`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `staff_id` varchar(100) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `middlename` varchar(50) DEFAULT NULL,
  `department` varchar(50) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `time_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `time_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `staff_id`, `firstname`, `lastname`, `middlename`, `department`, `password`, `time_created`, `time_updated`) VALUES
(1, 'admin123@gmail.com', 'kwaku', 'php', NULL, NULL, 'Admin@123', '2021-06-30 18:41:17', '2021-07-07 17:28:34'),
(3, 'ama@email.com', 'ama', 'ghana', NULL, NULL, 'ddd', '2021-07-06 16:22:34', '2021-07-07 17:28:44'),
(4, 'kwaku7@mail.com', 'kofi', 'damn', NULL, NULL, '12345678', '2021-07-06 19:29:23', '2021-07-07 17:28:51'),
(5, 'ana@ghana.com', 'aja', 'adam', NULL, NULL, '9999', '2021-07-07 17:09:21', '2021-07-07 17:28:59'),
(6, 'kwame@email.com', 'php', 'ram', NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e', '2021-07-07 17:11:53', '2021-07-07 17:29:05'),
(7, '1234', 'kwaku', 'ama', '', NULL, '81dc9bdb52d04dc20036dbd8313ed055', '2021-07-07 17:42:24', '2021-07-07 17:42:24'),
(8, '58475', 'Yakubu', 'Eliasu', '', NULL, '202cb962ac59075b964b07152d234b70', '2021-07-07 17:43:03', '2021-07-07 17:43:03'),
(9, '123456', 'ama', 'adama', '', NULL, '827ccb0eea8a706c4c34a16891f84e7b', '2021-07-07 18:26:03', '2021-07-07 18:26:03'),
(10, '12345', 'Kwame', 'Aboagye', '', NULL, '827ccb0eea8a706c4c34a16891f84e7b', '2021-07-20 17:21:35', '2021-07-20 18:33:09'),
(11, '123444', 'John', 'Ma', '', 'Police', '202cb962ac59075b964b07152d234b70', '2021-07-20 18:02:40', '2021-07-20 18:02:40'),
(12, '0101010', 'Kofi', 'Mantse', '', 'MTTU', '81dc9bdb52d04dc20036dbd8313ed055', '2021-07-20 18:03:45', '2021-07-20 18:03:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`staff_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
