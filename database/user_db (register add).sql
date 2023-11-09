-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2023 at 08:49 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `room_price` varchar(255) NOT NULL,
  `room_number` varchar(255) NOT NULL,
  `room_capacity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `user_id`, `room_id`, `full_name`, `student_id`, `phone`, `email`, `room_price`, `room_number`, `room_capacity`) VALUES
(2, 7, 1, 'Dương Minh Hiếu', '20010861', '0866904533', 'admin@gmail.com', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `room_form`
--

CREATE TABLE `room_form` (
  `room_id` int(100) NOT NULL,
  `room_type` varchar(255) NOT NULL,
  `room_capacity` varchar(255) NOT NULL,
  `room_description` varchar(255) NOT NULL,
  `room_price` varchar(255) NOT NULL,
  `room_number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_form`
--

INSERT INTO `room_form` (`room_id`, `room_type`, `room_capacity`, `room_description`, `room_price`, `room_number`) VALUES
(1, '4 Giường ngủ', '4', 'Phòng có sức chứa 4 người', '600.000đ', 'P04'),
(2, '6 Giường', '6', 'Phòng dành cho 6 người ở', '500.000đ', 'P06'),
(3, '16 Giường', '16', 'Phòng có sức chứa 16 người', '350.000đ', 'P16'),
(4, '8 Giường', '8', 'Phòng có sức chứa 8 người', '450.000đ', 'P08');

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
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_form`
--
ALTER TABLE `room_form`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `room_form`
--
ALTER TABLE `room_form`
  MODIFY `room_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
