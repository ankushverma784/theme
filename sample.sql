-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2020 at 03:32 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sample`
--

-- --------------------------------------------------------

--
-- Table structure for table `addproduct`
--

CREATE TABLE `addproduct` (
  `id` int(11) NOT NULL,
  `title` char(20) NOT NULL,
  `description` char(30) NOT NULL,
  `price` int(10) NOT NULL,
  `city` char(10) NOT NULL,
  `image` char(20) NOT NULL,
  `no_of_days` int(10) NOT NULL,
  `no_of_booking` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addproduct`
--

INSERT INTO `addproduct` (`id`, `title`, `description`, `price`, `city`, `image`, `no_of_days`, `no_of_booking`) VALUES
(72, 'sadfdsf', 'sadfdsa', 0, '86', 'about.jpg', 0, 0),
(73, 'sdfg', 'fdsafdsafdsaf', 200, '66', 'bg_4.jpg', 0, 0),
(74, 'abg', 'sdaf', 500, '79', 'image_7.jpg', 2, 0),
(75, 'dsaflkdsaj;flas', 'fdsafdsffdsa', 200, '83', 'bg_5.jpg', 25, 0),
(78, 'dsfsdfdsf', 'xcvxcvxcvxcv', 0, '66', 'about.jpg', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE `enquiry` (
  `id` int(11) NOT NULL,
  `name` char(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `no_of_people` int(10) NOT NULL,
  `status` enum('pending','confirm','reject','') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enquiry`
--

INSERT INTO `enquiry` (`id`, `name`, `email`, `date_from`, `date_to`, `no_of_people`, `status`) VALUES
(0, 'abc', 'abc@gmail.com', '0000-00-00', '0000-00-00', 2, ''),
(1, 'test', 'test@gmail.com', '2020-10-03', '2020-10-10', 5, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(5) NOT NULL,
  `name` char(20) NOT NULL,
  `email` char(30) NOT NULL,
  `password` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name`, `email`, `password`) VALUES
(1, 'test', 'test@gmail.com', '12345'),
(1, 'test', 'test@gmail.com', '12345'),
(0, 'fdsfdsfdsf', 'admin@admin.com', '12345'),
(0, 'test1', 'test1@gmail.com', 'test1'),
(0, 'abc', 'abc@gmail.com', 'abc');

-- --------------------------------------------------------

--
-- Table structure for table `place`
--

CREATE TABLE `place` (
  `id` int(10) NOT NULL,
  `city` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `place`
--

INSERT INTO `place` (`id`, `city`) VALUES
(86, 'fdsfsdfdsfsd'),
(83, 'gdfgfdgfdg'),
(85, 'green'),
(76, 'gsfdgfdgfds'),
(87, 'testcity1'),
(82, 'xyz');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addproduct`
--
ALTER TABLE `addproduct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `city` (`city`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addproduct`
--
ALTER TABLE `addproduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `place`
--
ALTER TABLE `place`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
