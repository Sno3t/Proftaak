-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2020 at 07:38 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--
CREATE DATABASE IF NOT EXISTS `login` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `login`;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `ID` int(11) NOT NULL,
  `Admin` tinyint(1) NOT NULL,
  `Username` varchar(128) NOT NULL,
  `Password` varchar(500) NOT NULL,
  `Email` varchar(128) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`ID`, `Admin`, `Username`, `Password`, `Email`) VALUES
(1, 1, 'username', 'wachtwoord', ''),
(3, 0, 'Snout', '123', 'snoet2@gmail.com'),
(11, 0, 'Snot', '$2y$10$G2aHLhDTE3znBJ5PsAgeAemina79G4B0.WJL68ifqf8tLi6q4UvZe', 'snoet5@gmail.com'),
(10, 0, '1234', '$2y$10$LJyUUzDBhS22qwfNOOKrrec.muUYbX147HhSH2LzWHdXw0UIWOOya', '123'),
(13, 1, 'Tycho', '$2y$10$.FXHWIyHvmG/6iJw9Zfa3OjJIaSd6uf/tZsNuR0txV.nNckOT1q/6', 'snoet4@gmail.com'),
(14, 0, 'Snoet', '$2y$10$ibwaYQi.v94UkXA82GuTbuOmBMQZfZbIX/2vyPeeS7pepoW9dvkh.', 'ww=123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
