-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2020 at 07:37 PM
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
-- Database: `cijfers`
--
CREATE DATABASE IF NOT EXISTS `cijfers` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cijfers`;

-- --------------------------------------------------------

--
-- Table structure for table `engels`
--

CREATE TABLE `engels` (
  `ID` int(11) NOT NULL,
  `Cijfer` int(11) DEFAULT NULL,
  `Datum` date NOT NULL,
  `toetsNaam` varchar(250) NOT NULL,
  `Studenten_ID` int(11) NOT NULL,
  `Leraren_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `engels`
--

INSERT INTO `engels` (`ID`, `Cijfer`, `Datum`, `toetsNaam`, `Studenten_ID`, `Leraren_ID`) VALUES
(1, 8, '2020-10-02', '', 1, 2),
(2, 7, '2020-10-22', '', 1, 1),
(4, 4, '2001-01-01', '1', 1, 1),
(5, 1, '2001-01-01', '1', 1, 1),
(6, 1, '2001-01-01', 'Engels', 1, 1),
(11, 1, '2001-01-01', 'En', 1, 1),
(12, 6, '2020-10-21', 'AA', 2, 1),
(13, 1, '0000-00-00', '11', 1, 1),
(14, NULL, '2020-10-14', 'Nieuwe toets', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `leraren`
--

CREATE TABLE `leraren` (
  `ID` int(11) NOT NULL,
  `Naam` varchar(64) NOT NULL,
  `Vak` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leraren`
--

INSERT INTO `leraren` (`ID`, `Naam`, `Vak`) VALUES
(1, 'Marnix', 'Webtech'),
(2, 'Peter', 'Nederlands');

-- --------------------------------------------------------

--
-- Table structure for table `nederlands`
--

CREATE TABLE `nederlands` (
  `ID` int(11) NOT NULL,
  `Cijfer` int(11) NOT NULL,
  `Datum` date NOT NULL,
  `toetsNaam` varchar(250) NOT NULL,
  `Studenten_ID` int(11) NOT NULL,
  `Leraren_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nederlands`
--

INSERT INTO `nederlands` (`ID`, `Cijfer`, `Datum`, `toetsNaam`, `Studenten_ID`, `Leraren_ID`) VALUES
(1, 6, '2020-10-13', '', 1, 1),
(2, 8, '2020-10-22', '', 2, 1),
(3, 1, '0000-00-00', '1', 2, 1),
(4, 1, '0000-00-00', '1', 2, 1),
(5, 1, '0000-00-00', '1', 1, 1),
(6, 1, '0000-00-00', '11', 1, 1),
(7, 1, '0000-00-00', '1', 2, 1),
(8, 2, '0000-00-00', '2', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `overzicht`
--

CREATE TABLE `overzicht` (
  `ID` int(11) NOT NULL,
  `IdStudent` int(11) NOT NULL,
  `Engels_ID` int(11) NOT NULL,
  `Nederlands_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `overzicht`
--

INSERT INTO `overzicht` (`ID`, `IdStudent`, `Engels_ID`, `Nederlands_ID`) VALUES
(1, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `studenten`
--

CREATE TABLE `studenten` (
  `ID` int(11) NOT NULL,
  `Naam` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studenten`
--

INSERT INTO `studenten` (`ID`, `Naam`) VALUES
(1, 'Bas'),
(2, 'Ray'),
(3, 'Jop');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `engels`
--
ALTER TABLE `engels`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Leraren_ID` (`Leraren_ID`),
  ADD KEY `Studenten_ID` (`Studenten_ID`);

--
-- Indexes for table `leraren`
--
ALTER TABLE `leraren`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `nederlands`
--
ALTER TABLE `nederlands`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Leraren_ID` (`Leraren_ID`),
  ADD KEY `Studenten_ID` (`Studenten_ID`);

--
-- Indexes for table `overzicht`
--
ALTER TABLE `overzicht`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Engels_ID` (`Engels_ID`),
  ADD KEY `Nederlands_ID` (`Nederlands_ID`),
  ADD KEY `IdStudent` (`IdStudent`);

--
-- Indexes for table `studenten`
--
ALTER TABLE `studenten`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `engels`
--
ALTER TABLE `engels`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `leraren`
--
ALTER TABLE `leraren`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nederlands`
--
ALTER TABLE `nederlands`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `overzicht`
--
ALTER TABLE `overzicht`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `studenten`
--
ALTER TABLE `studenten`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `engels`
--
ALTER TABLE `engels`
  ADD CONSTRAINT `engels_ibfk_1` FOREIGN KEY (`Leraren_ID`) REFERENCES `leraren` (`ID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `engels_ibfk_2` FOREIGN KEY (`Studenten_ID`) REFERENCES `studenten` (`ID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `nederlands`
--
ALTER TABLE `nederlands`
  ADD CONSTRAINT `nederlands_ibfk_1` FOREIGN KEY (`Leraren_ID`) REFERENCES `leraren` (`ID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `nederlands_ibfk_2` FOREIGN KEY (`Studenten_ID`) REFERENCES `studenten` (`ID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `overzicht`
--
ALTER TABLE `overzicht`
  ADD CONSTRAINT `overzicht_ibfk_1` FOREIGN KEY (`Engels_ID`) REFERENCES `engels` (`ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `overzicht_ibfk_2` FOREIGN KEY (`Nederlands_ID`) REFERENCES `nederlands` (`ID`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
