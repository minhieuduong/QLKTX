-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2023 at 10:14 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `room_form`
--

CREATE TABLE `room_form` (
  `room_number` int(100) NOT NULL,
  `room_type` varchar(255) NOT NULL,
  `room_capacity` varchar(255) NOT NULL,
  `room_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_form`
--

INSERT INTO `room_form` (`room_number`, `room_type`, `room_capacity`, `room_description`) VALUES
(1, '4', '4', '0'),
(2, '6 Giường', '6', 'Phòng dành cho 6 người ở');

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user',
  `phonenumber` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`id`, `name`, `email`, `password`, `user_type`, `phonenumber`) VALUES
(2, 'Minh Hieu Duong', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 'admin', '1134'),
(3, 'postgresTsdadsa', 'test2@gmail.com', '62dedc423b3e75bc0b3a663ede0eb471', 'admin', '222'),
(7, 'postgres', 'test@gmail.com', '62dedc423b3e75bc0b3a663ede0eb471', 'user', '09882313331'),
(10, '11', '09@gmail.com', '202cb962ac59075b964b07152d234b70', 'user', '0988231231'),
(13, 'postgres', 'trungkutedog2@gmail.com', '6512bd43d9caa6e02c990b0a82652dca', 'user', '114'),
(14, 'Lan Nguyen', 'test111@gmail.com', '202cb962ac59075b964b07152d234b70', 'user', '255');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `room_form`
--
ALTER TABLE `room_form`
  ADD PRIMARY KEY (`room_number`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `room_form`
--
ALTER TABLE `room_form`
  MODIFY `room_number` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
