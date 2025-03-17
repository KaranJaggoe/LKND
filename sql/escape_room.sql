-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 17 mrt 2025 om 15:45
-- Serverversie: 10.4.32-MariaDB
-- PHP-versie: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `escape_room`
--
CREATE DATABASE IF NOT EXISTS `escape_room` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `escape_room`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `puzzels`
--

CREATE TABLE `puzzels` (
  `id` int(11) NOT NULL,
  `vraag` text NOT NULL,
  `oplossing` varchar(255) NOT NULL,
  `hint` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `puzzels`
--

INSERT INTO `puzzels` (`id`, `vraag`, `oplossing`, `hint`) VALUES
(1, 'Wat is de naam van de opleiding die zich richt op het ontwikkelen van software en applicaties?', 'HBO-ICT', 'Dit is een brede opleiding die veel onderwerpen bestrijkt.'),
(2, 'Welke opleiding aan de Haagse Hogeschool richt zich op de beveiliging van netwerken en systemen?', 'Cyber Security', 'Deze opleiding is cruciaal in een wereld vol cyberaanvallen.'),
(3, 'Bij welke opleiding leer je de managementaspecten van media en entertainment?', 'Media and Entertainment Management', 'Denk aan de commerciële kant van media.'),
(4, 'Wat is de naam van de opleiding die zich richt op de hardware- en software-architectuur van computersystemen?', 'Technische Informatica', 'Hier leer je hoe computers werken.'),
(5, 'Welke opleiding combineert bedrijfsleven met IT-management?', 'Business IT & Management', 'Deze opleiding is populair bij bedrijven die IT willen gebruiken voor hun bedrijf.'),
(6, 'Bij welke opleiding staat het analyseren van data centraal?', 'Data Science', 'Dit heeft te maken met Big Data en statistiek.'),
(7, 'Welke opleiding focust zich op het ontwikkelingsproces van software?', 'Software Engineering', 'Hier leer je programmeren en software testen.'),
(8, 'Welke opleiding houdt zich bezig met machine learning en slimme algoritmes?', 'Artificial Intelligence', 'Hier leer je computers om zelfstandig beslissingen te nemen.'),
(9, 'Wat is de naam van de opleiding die zich richt op het ontwikkelen van software en applicaties?', 'HBO-ICT', 'Dit is een brede opleiding die veel onderwerpen bestrijkt.'),
(10, 'Welke opleiding aan de Haagse Hogeschool richt zich op de beveiliging van netwerken en systemen?', 'Cyber Security', 'Deze opleiding is cruciaal in een wereld vol cyberaanvallen.'),
(11, 'Bij welke opleiding leer je de managementaspecten van media en entertainment?', 'Media and Entertainment Management', 'Denk aan de commerciële kant van media.'),
(12, 'Wat is de naam van de opleiding die zich richt op de hardware- en software-architectuur van computersystemen?', 'Technische Informatica', 'Hier leer je hoe computers werken.'),
(13, 'Welke opleiding combineert bedrijfsleven met IT-management?', 'Business IT & Management', 'Deze opleiding is populair bij bedrijven die IT willen gebruiken voor hun bedrijf.'),
(14, 'Bij welke opleiding staat het analyseren van data centraal?', 'Data Science', 'Dit heeft te maken met Big Data en statistiek.'),
(15, 'Welke opleiding focust zich op het ontwikkelingsproces van software?', 'Software Engineering', 'Hier leer je programmeren en software testen.'),
(16, 'Welke opleiding houdt zich bezig met machine learning en slimme algoritmes?', 'Artificial Intelligence', 'Hier leer je computers om zelfstandig beslissingen te nemen.');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `puzzels`
--
ALTER TABLE `puzzels`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `puzzels`
--
ALTER TABLE `puzzels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
