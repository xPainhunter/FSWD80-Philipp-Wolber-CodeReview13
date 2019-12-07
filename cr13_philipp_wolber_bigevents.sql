-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 07. Dez 2019 um 16:07
-- Server-Version: 10.4.8-MariaDB
-- PHP-Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `cr13_philipp_wolber_bigevents`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Thing`
--

CREATE TABLE `Thing` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `startDate` datetime NOT NULL,
  `description` varchar(255) NOT NULL,
  `img` varchar(50) NOT NULL,
  `capacity` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tel` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `link` varchar(255) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `Thing`
--

INSERT INTO `Thing` (`id`, `name`, `startDate`, `description`, `img`, `capacity`, `email`, `tel`, `address`, `link`, `type`) VALUES
(1, 'Red Bull Symphonic', '2021-02-01 20:00:00', 'This is the event of the year. Drum & Bass meets classic. With Camo and Crooked and Christian Kolonovits & Orchester.', 'camo.jpg', 1865, 'wien@showfactory.at', '01 242002', 'Lothringerstraße 20, 1030 Vienna', 'https://www.redbull.com/at-de/events/symphonic', 'Music');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `Thing`
--
ALTER TABLE `Thing`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `Thing`
--
ALTER TABLE `Thing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
