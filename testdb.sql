-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2023 at 04:22 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `is_admin` int(1) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `username` varchar(150) NOT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `last_name` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `is_admin`, `first_name`, `email`, `username`, `mobile`, `last_name`, `password`, `created_at`) VALUES
(6, 0, 'John', 'johnny@yahoo.com', '', '67775554322', 'Doe', 'test', '2023-03-19 03:05:49.124006'),
(7, 0, 'Lana', 'myemail@yahoo.com', '', '434343434', 'lang', '', '2023-03-19 03:06:12.634024'),
(8, 1, 'Philip', 'fajr42@yahoo.com', 'fajr42', '343434343434', 'Ante', '12345', '2023-03-19 01:39:51.539059'),
(9, 0, 'Clark', 'superman@gmail.com', 'sup123', '1234567888', 'Kent', '123', '2023-03-19 02:55:43.103477'),
(12, 0, 'hernan', 'hsa@gmail.com', 'hsa42', '232323232', 'andrade', '1234', '2023-03-19 01:00:48.409821'),
(14, 0, 'Some', 'some@gmail.com', 'someuser123', NULL, 'Sommee', '12345', '2023-03-19 01:07:08.513793'),
(15, 0, 'Bong', 'bong@gmail.com', 'bong123', NULL, 'Andrade', 'iloveu', '2023-03-19 01:18:44.456415'),
(16, 1, 'Love', 'mylove@gmail.com', 'mylove123', '9744554222', 'Ofmylife', 'love', '2023-03-19 01:37:52.547171'),
(17, 0, 'Diablo', 'diablo@yahoo.com', 'diablo42', '666666', 'Augustus', '666', '2023-03-19 01:29:15.867745'),
(18, 1, 'Shinok', 'shinok@gmail.com', 'shinok42', NULL, 'Dex', '123', '2023-03-19 02:45:24.740535'),
(19, 0, 'Jen', 'jen@gmail.com', 'user1', NULL, 'Dy', '1234', '2023-03-19 03:07:32.005363'),
(20, 0, 'Jenny', 'jen1@gmail.com', 'user2', NULL, 'Doe', '123', '2023-03-19 03:08:24.276360'),
(21, 1, 'Bobo', 'vr123@yahoo.com', 'bobovr', '45454545', 'Vr', '1234', '2023-03-19 03:14:02.007098'),
(22, 1, 'Vr', 'vradmin@yahoo.com', 'vr1', '34343434', 'games', '1234', '2023-03-19 03:13:55.696760'),
(23, 0, 'Phil', 'phil@yahoo.com', '', '232323', 'Doe', '', '2023-03-19 03:13:47.121925');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
