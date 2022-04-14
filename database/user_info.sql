-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 13, 2022 at 07:08 AM
-- Server version: 8.0.27
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_info`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `hobbies` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `image` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `gender`, `hobbies`, `password`, `image`, `created_at`, `updated_at`) VALUES
(5, 'Ravat', 'Kamleshbhai', 'ravat@gmail.com', 'Male', 'sports,music,reading', '6fced7af76c46ab8d13f52b1ba2d46bc', 'user-06.jpg', '2022-04-13 06:23:12', '2022-04-13 07:08:04'),
(2, 'Ravat', 'Kamleshbhai', 'ravatjit777@gmail.com', 'Male', 'something', '9253c9d5742a0f7823d20c27aa5fce83', '', '2022-04-13 05:56:07', NULL),
(3, 'Ravat', 'K.', 'ravatjit777@gmail.com', 'Male', 'sports,music,reading', '9253c9d5742a0f7823d20c27aa5fce83', '', '2022-04-13 06:06:04', NULL),
(4, 'Ravat', 'Kamleshbhai', 'admin@gmail.com', 'Male', 'reading', 'e287a8cff2752cf1bf8173c58df273c6', '', '2022-04-13 06:13:34', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
