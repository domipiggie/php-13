-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 21, 2024 at 09:50 AM
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
-- Database: `php_teszt`
--

-- --------------------------------------------------------

--
-- Table structure for table `osztaly`
--

CREATE TABLE `osztaly` (
  `id` int(11) NOT NULL,
  `nev` tinytext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sor` tinyint(3) UNSIGNED NOT NULL,
  `oszlop` tinyint(3) UNSIGNED NOT NULL,
  `username` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `isAdmin` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `osztaly`
--

INSERT INTO `osztaly` (`id`, `nev`, `sor`, `oszlop`, `username`, `password`, `isAdmin`) VALUES
(1, ' - ', 0, 0, NULL, NULL, NULL),
(2, 'Tanári asztal', 0, 1, NULL, NULL, NULL),
(3, 'Gulyás Zsolt Máté', 0, 2, NULL, NULL, NULL),
(4, 'Lénárt Áron', 0, 3, NULL, NULL, NULL),
(5, '-', 0, 4, NULL, NULL, NULL),
(6, 'Mészáros Marcell Zsolt', 1, 0, NULL, NULL, NULL),
(7, 'Básti Domonkos', 1, 1, 'legjobbuser', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 1),
(8, 'Keindl Bercel', 1, 2, NULL, NULL, NULL),
(9, 'Kiss Balázs', 1, 3, NULL, NULL, NULL),
(10, '-', 1, 4, NULL, NULL, NULL),
(11, 'Csik Melinda', 2, 0, NULL, NULL, NULL),
(12, 'Karakas Olivér Roland', 2, 1, NULL, NULL, NULL),
(13, 'Ábrahám Dávid János', 2, 2, NULL, NULL, NULL),
(14, 'Détári Leon', 2, 3, NULL, NULL, NULL),
(15, 'Togyeriska Viktor', 2, 4, NULL, NULL, NULL),
(16, ' - ', 3, 0, NULL, NULL, NULL),
(17, ' - ', 3, 1, NULL, NULL, NULL),
(18, 'Giczi Attila István', 3, 2, NULL, NULL, NULL),
(19, 'Preil Ákos Levente', 3, 3, NULL, NULL, NULL),
(20, 'Sivinger Miklós Martin', 3, 4, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `osztaly`
--
ALTER TABLE `osztaly`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `osztaly`
--
ALTER TABLE `osztaly`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
