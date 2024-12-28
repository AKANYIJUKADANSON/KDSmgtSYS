-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2024 at 08:08 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kdis`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(20) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `other_name` varchar(20) NOT NULL,
  `image` text NOT NULL,
  `class` varchar(20) NOT NULL,
  `club` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `class_teacher` varchar(11) NOT NULL DEFAULT 'Tr. Racheal',
  `english` int(20) NOT NULL DEFAULT 0,
  `ICT` int(20) NOT NULL DEFAULT 0,
  `mathematics` int(20) NOT NULL DEFAULT 0,
  `chemistry` int(20) NOT NULL DEFAULT 0,
  `history` int(20) NOT NULL DEFAULT 0,
  `biology` int(20) NOT NULL DEFAULT 0,
  `physics` int(20) NOT NULL DEFAULT 0,
  `gp` int(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `last_name`, `other_name`, `image`, `class`, `club`, `gender`, `class_teacher`, `english`, `ICT`, `mathematics`, `chemistry`, `history`, `biology`, `physics`, `gp`) VALUES
(2, 'Atwine', 'Elvis', '', 'elvis.png', 'year4', 'Chess', 'Male', 'Tr. Racheal', 90, 100, 92, 70, 85, 77, 60, 97),
(3, 'Amara', 'Nicole', '', 'amara.jpg', 'year4', 'MDD', 'Female', 'Tr. Racheal', 43, 44, 47, 49, 53, 53, 56, 60),
(4, 'Tusiime', 'Vanessa', '', 'vanessa.jpg', 'year4', 'Computer', 'Female', 'Tr. Racheal', 46, 46, 50, 52, 58, 56, 60, 66),
(5, 'Kasajja', 'Isaac', '', 'kasajja.jpg', 'year4', 'Soccer', 'Male', 'Tr. Racheal', 49, 48, 53, 55, 63, 59, 64, 72),
(6, 'Ahmed', 'Abdelgader', '', 'ahmed.jpg', 'year4', 'Soccer', 'Male', 'Tr. Racheal', 52, 50, 56, 58, 68, 62, 68, 78),
(7, 'Kidus', 'Michael', '', '', 'year4', 'Computer', 'Male', 'Tr. Racheal', 55, 52, 59, 61, 73, 65, 72, 84),
(8, 'Camilla', 'Agatha', '', '', 'year4', 'MDD', 'Female', 'Tr. Racheal', 58, 54, 62, 64, 78, 68, 76, 90),
(9, 'Amira', 'Lotudu', '', '', 'year4', 'Computer', 'Female', 'Tr. Racheal', 61, 56, 65, 67, 83, 71, 80, 96),
(10, 'Mukiiza', 'Ichan', '', '', 'year4', 'Soccer', 'Male', 'Tr. Racheal', 64, 58, 68, 70, 88, 74, 84, 62),
(11, 'Renee', 'Mohamed', '', '', 'year4', 'MDD', 'Female', 'Tr. Racheal', 67, 60, 71, 73, 93, 77, 88, 78),
(12, 'Patel', 'Parakha', '', '', 'year4', 'Chess', 'Male', 'Tr. Racheal', 70, 62, 74, 76, 98, 80, 92, 94);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
