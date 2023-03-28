-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2023 at 12:31 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sprint2db`
--

-- --------------------------------------------------------

--
-- Table structure for table `artisttable`
--

CREATE TABLE `artisttable` (
  `idArtist` int(11) NOT NULL,
  `artistName` text NOT NULL,
  `artistBirth` int NOT NULL,
  `artistDeath` int NOT NULL,
  `artistNationality` text NOT NULL,
  `imageArtist` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paintingstable`
--

CREATE TABLE `paintingstable` (
  `idPaintings` int(11) NOT NULL,
  `title` text NOT NULL,
  `finished` int NOT NULL,
  `media` text NOT NULL,
  `artistFK` int(11) NOT NULL,
  `style` text NOT NULL,
  `imagePaintings` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artisttable`
--
ALTER TABLE `artisttable`
  ADD PRIMARY KEY (`idArtist`);

--
-- Indexes for table `paintingstable`
--
ALTER TABLE `paintingstable`
  ADD KEY `FK_artistName` (`artistFK`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artisttable`
--
ALTER TABLE `artisttable`
  MODIFY `idArtist` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `paintingstable`
--
ALTER TABLE `paintingstable`
  ADD CONSTRAINT `FK_artistName` FOREIGN KEY (`artistFK`) REFERENCES `artisttable` (`idArtist`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
