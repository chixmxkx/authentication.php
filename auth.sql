-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2021 at 08:33 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auth`
--

-- --------------------------------------------------------

--
-- Table structure for table `dashcourse`
--

CREATE TABLE `dashcourse` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `track` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dashcourse`
--

INSERT INTO `dashcourse` (`id`, `user_id`, `track`, `course`) VALUES
(5, 13, 'Frontend', 'JavaScript'),
(51, 0, 'Design', 'UI/UX'),
(52, 0, 'Frontend', 'Nodejs'),
(53, 0, 'Backend', 'PHP'),
(56, 12, 'Backend', 'JavaScript'),
(57, 12, 'Design', 'UI/UX'),
(58, 12, 'Frontend', 'Nodejs'),
(59, 16, 'Backend', 'PHP');

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `id` int(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`id`, `full_name`, `email_address`, `password`) VALUES
(12, 'Sade Adu', 'sadeadu@ymail.com', '9ac0ede933a3147397006d3cc7a20b939b16d15f'),
(13, 'Jojo Siwa', 'jojosiwa@ymail.com', '9748ead4cf01653522f3480bc7404346ecc7cb7c'),
(14, 'Jane Abasi', 'abasiama@ymail.com', '440dd93da3b48004d0eca58fce30a90a73137d03'),
(15, 'Chiamaka Essonna', 'beautifulessonna@gmail.com', '6184d6847d594ec75c4c07514d4bb490d5e166df'),
(16, 'Bolu Tife', 'bolutife@ymail.com', 'e35e4be38945989ae60bb2c89a6705776f271647'),
(17, 'Chiamaka Essonna', 'blank@ymail.com', '6184d6847d594ec75c4c07514d4bb490d5e166df');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dashcourse`
--
ALTER TABLE `dashcourse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dashcourse`
--
ALTER TABLE `dashcourse`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
