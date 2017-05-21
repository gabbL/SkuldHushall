-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 12 apr 2017 kl 11:54
-- Serverversion: 5.6.25
-- PHP-version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `skuld`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `ar`
--

CREATE TABLE IF NOT EXISTS `ar` (
  `ar` int(11) NOT NULL,
  `skuldkvot` int(11) NOT NULL,
  `totalskuld` int(11) NOT NULL,
  `bolaneskuld` int(11) NOT NULL,
  `antalar` int(11) NOT NULL,
  `dispinkomst` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `ar`
--

INSERT INTO `ar` (`ar`, `skuldkvot`, `totalskuld`, `bolaneskuld`, `antalar`, `dispinkomst`) VALUES
(2011, 323, 1054000, 1021000, 79, 30835),
(2012, 325, 1100000, 1066000, 83, 31750),
(2013, 331, 1142000, 1109000, 84, 32413),
(2014, 333, 1192000, 1161000, 83, 33396),
(2015, 338, 1271000, 1236000, 82, 34725),
(2016, 343, 1353000, 1319000, 78, 36419);

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `ar`
--
ALTER TABLE `ar`
  ADD PRIMARY KEY (`ar`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
