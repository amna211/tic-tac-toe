-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 25, 2024 at 05:39 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tictactoe`
--

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

DROP TABLE IF EXISTS `games`;
CREATE TABLE IF NOT EXISTS `games` (
  `id` int NOT NULL AUTO_INCREMENT,
  `board` json NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `game_history`
--

DROP TABLE IF EXISTS `game_history`;
CREATE TABLE IF NOT EXISTS `game_history` (
  `id` int NOT NULL AUTO_INCREMENT,
  `winner` char(1) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `game_history`
--

INSERT INTO `game_history` (`id`, `winner`, `date`) VALUES
(55, 'D', '2024-07-25 17:22:24'),
(54, 'X', '2024-07-25 17:22:04'),
(53, 'X', '2024-07-25 17:21:54'),
(52, 'O', '2024-07-25 17:03:48'),
(51, 'X', '2024-07-25 17:03:38'),
(50, 'D', '2024-07-25 17:03:25'),
(49, 'X', '2024-07-25 17:02:41'),
(48, 'X', '2024-07-25 16:27:21'),
(47, 'X', '2024-07-25 16:26:31'),
(46, 'X', '2024-07-25 16:26:30'),
(45, 'X', '2024-07-25 16:26:26'),
(44, 'O', '2024-07-25 16:24:09'),
(43, 'X', '2024-07-25 16:23:54'),
(42, 'X', '2024-07-25 16:23:50'),
(41, 'X', '2024-07-25 16:20:08'),
(40, 'X', '2024-07-25 16:19:35'),
(39, 'X', '2024-07-25 16:19:31'),
(38, 'X', '2024-07-25 16:19:19'),
(37, 'X', '2024-07-25 16:18:48'),
(36, 'X', '2024-07-25 16:08:56'),
(35, 'X', '2024-07-25 15:27:34'),
(34, 'O', '2024-07-25 14:49:57'),
(33, 'X', '2024-07-25 14:47:18');

-- --------------------------------------------------------

--
-- Table structure for table `win_counts`
--

DROP TABLE IF EXISTS `win_counts`;
CREATE TABLE IF NOT EXISTS `win_counts` (
  `player` char(1) NOT NULL,
  `count` int NOT NULL,
  PRIMARY KEY (`player`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `win_counts`
--

INSERT INTO `win_counts` (`player`, `count`) VALUES
('O', 3),
('X', 17);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
