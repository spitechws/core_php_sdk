-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 24, 2023 at 04:33 AM
-- Server version: 8.0.31
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'ganesh', 'spsoni.se@gmail.com', '$2y$10$R3MdUhaJK3G/i54/YViQ6u6yYIsmzm4s0rw2hGAW.ldL9M8t91tXK', '2023-11-23 03:01:22'),
(11, 'Ramesh', 'spsoni.se1@gmail.com', '$2y$10$ilrlPkhXbnGYsPrTvZtmR.G.3sWj.KHTY.sM0NsFQ77GCj8Y9sqWS', '2023-11-23 17:49:14'),
(12, 'Sheetala Soni', 'spsoni.se1212@gmail.com', '$2y$10$jbDdqMQQg8u/AhQa9MYWsOyHKuQjSHbw0a4QUqHqmgAoSoiOYs.0K', '2023-11-23 17:50:46'),
(13, 'test', 'spsoni.se12121@gmail.com', '$2y$10$la7v0OjC6rziXHVdm6p3HeWogv0XJ41hHeuxXyMuT3A5FfbD0EQEi', '2023-11-23 17:52:38'),
(14, 'ewewewe', 'spsoni.se1212121@gmail.com', '$2y$10$Z7jU0EU6lr/6sue1GmJ0BOhzUm1O6I4WM9BGTLy59atitknZT3/jy', '2023-11-23 17:53:24'),
(15, 'sdsdsdsds', 'spsoni.se21212121@gmail.com', '$2y$10$fiU7J0SxEs.mZr10KazHX.GbLzHZY7MfdJx9L3N6G8thKilivjYHq', '2023-11-23 17:53:45');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
