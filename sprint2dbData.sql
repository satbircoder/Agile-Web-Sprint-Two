-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2023 at 12:44 PM
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
  `artistBirth` int(11) NOT NULL,
  `artistDeath` int(11) NOT NULL,
  `artistCentury` int(11) NOT NULL,
  `artistNationality` text NOT NULL,
  `imageArtist` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `artisttable` (`idArtist`, `artistName`, `artistBirth`, `artistDeath`, `artistCentury`, `artistNationality`, `imageArtist`) VALUES
(1, 'August Renoir', 1841, 1919, 20, 'French', LOAD_FILE('C:\\Temp\\png_500_wide\\renoir.png')),
(2, 'Michelangelo', 1475, 1564, 16, 'Italian', LOAD_FILE('C:\\Temp\\png_500_wide\\michelangelo.png')),
(3, 'Vincent Van Gogh', 1853, 1890, 19, 'Dutch', LOAD_FILE('C:\\Temp\\png_500_wide\\vangogh.png')),
(4, 'Claude Monet', 1840, 1926, 20, 'French', LOAD_FILE('C:\\Temp\\png_500_wide\\monet.png')),
(5, 'Rembrandt', 1606, 1699, 17, 'Dutch', LOAD_FILE('C:\\Temp\\png_500_wide\\rembrandt.png')),
(6, 'Pablo Picasso', 1881, 1973, 20, 'Spanish', LOAD_FILE('C:\\Temp\\png_500_wide\\picasso.png')),
(7, 'Jan Vermeer', 1632, 1675, 17, 'Dutch', LOAD_FILE('C:\\Temp\\png_500_wide\\vermeer.png')),
(8, 'Salvador Dali', 1904, 1989, 20, 'Spanish', LOAD_FILE('C:\\Temp\\png_500_wide\\dali.png')),
(9, 'Paul Cezanne', 1839, 1906, 20, 'French', LOAD_FILE('C:\\Temp\\png_500_wide\\cezanne.png')),
(10, 'Leanardo da Vinci', 1452, 1519, 16, 'Italian', LOAD_FILE('C:\\Temp\\png_500_wide\\davinci.png')),
(11, 'Raphael', 1483, 1520, 16, 'Italian', LOAD_FILE('C:\\Temp\\png_500_wide\\raphael.png'));

CREATE TABLE `paintingstable` (
  `idPaintings` int(11) NOT NULL,
  `title` text NOT NULL,
  `finished` int(11) NOT NULL,
  `media` text NOT NULL,
  `artistFK` int(11) NOT NULL,
  `style` text NOT NULL,
  `imagePaintings` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `paintingstable` (`idPaintings`, `title`, `finished`, `media`, `artistFK`, `style`, `imagePaintings`) VALUES
(1, 'Bal du moulin de la Galette', 1876, 'Oil', 1, 'Impressionism', ''),
(2, 'Doni Tondo (Doni Madonna)', 1507, 'Oil', 2, 'Mannerism', ''),
(3, 'Vase with Twelve Sunflowers ', 1888, 'Oil', 3, 'Still-life', ''),
(4, 'Mona Lisa', 1503, 'Oil', 10, 'Portrait', ''),
(5, 'The Potato Eaters', 1885, 'Oil', 3, 'Realism', ''),
(6, 'Sunrise', 1972, 'Oil', 4, 'Impressionism', ''),
(7, 'Weaver', 1884, 'Oil', 3, 'Realism', ''),
(8, 'Nature morte au compotier', 1914, 'Oil', 6, 'Cubism', ''),
(9, 'Houses Of Parliament', 1889, 'Oil', 4, 'Impressionism', ''),
(10, 'Cafe Terrace at Night', 1888, 'Oil', 3, 'Impressionism', ''),
(11, 'At the Lapin Agile', 1905, 'Oil', 6, 'Impressionism', ''),
(12, 'The Persistence of Memory', 1931, 'Oil', 8, 'Surrealism', ''),
(13, 'The Hallucinogenic Toreador', 1970, 'Oil', 8, 'Surrealism', ''),
(14, 'Jaz de Bouffan', 1877, 'Oil', 9, 'Impressionism', ''),
(15, 'Vitruvian Man', 1490, 'Pen-ink', 10, 'Realism', ''),
(16, 'The Kingfisher', 1886, 'Pen-ink', 3, 'Realism', '');

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
  MODIFY `idArtist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `paintingstable`
--
ALTER TABLE `paintingstable`
  ADD CONSTRAINT `FK_artistName` FOREIGN KEY (`artistFK`) REFERENCES `artisttable` (`idArtist`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
