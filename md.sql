-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 04, 2021 at 07:16 AM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `md`
--

-- --------------------------------------------------------

--
-- Table structure for table `cursuri`
--

DROP TABLE IF EXISTS `cursuri`;
CREATE TABLE IF NOT EXISTS `cursuri` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `titlu` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `m1` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `m2` varchar(50) NOT NULL,
  `m3` varchar(50) NOT NULL,
  `m4` varchar(50) NOT NULL,
  `m5` varchar(50) NOT NULL,
  `m6` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `m7` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cursuri`
--

INSERT INTO `cursuri` (`ID`, `titlu`, `m1`, `m2`, `m3`, `m4`, `m5`, `m6`, `m7`) VALUES
(1, 'Workshop-uri practice', 'Design editorial', 'Limbaje Web', 'Editare foto', 'Editare audio-video', 'Animatie si efecte vizuale', 'Design grafic si de interfete', 'Colectarea datelor'),
(2, 'Productie multimedia', 'Redactare in media digitala', 'Scriere creativa', 'Jurnalism TV', 'Jurnalism Radio', 'Fotojurnalism', 'Videojurnalism', 'Ilustratie muzicala'),
(7, 'Comunicare in media digitala', 'Genuri si formate in media digitala', 'Media si cultura populara', 'Platforme digitale', 'Teoria noilor media', 'PR online', 'Media alternativa', NULL),
(8, 'Gandire critica', 'Introducere in studii media', 'Comunicare vizuala', 'Legislatie media', 'Metode de cercetare in media', 'Tehnici de comunicare in media', 'Etica si dentologie', 'Analiza media'),
(9, 'Inovatie si proiecte', 'Sisteme de management de continut', 'Comunciare pe dispozitive mobile', 'Multimedia', 'Comunicare online', 'Antreprenoriat in media digitala', 'Naratiuni interactive si transmedia', NULL),
(10, 'Media si societate ', 'Introducere in stiintele sociale', 'istoria tehnologiilor media', 'Psihologia media', 'Comunicare publicitara', 'Filmologie', 'Tehnica discursului public', 'Jurnalism specializat');

-- --------------------------------------------------------

--
-- Table structure for table `meserii`
--

DROP TABLE IF EXISTS `meserii`;
CREATE TABLE IF NOT EXISTS `meserii` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `titlu` varchar(20) NOT NULL,
  `domeniu` varchar(50) NOT NULL,
  `descriere` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `meserii`
--

INSERT INTO `meserii` (`ID`, `titlu`, `domeniu`, `descriere`) VALUES
(1, 'Comunicare', 'Social Media Management', 'Creeaza, administreaza si monitorizeaza conturi si presenta se social media(Facebook, Twitter, Instagram) pentru firme, institutii si proiecte sau campanii de comunicare, utilizand continut original si strategii comunicationale specifice.'),
(2, 'Productie', 'Editare multimedia', 'Creeaza continut foto, audio-video si interactiv, aplicand cunostinte de planificare a productiei, visual storytelling, inregistrare si editare pentru a produce clipuri video, reportaje multimedia, naratiuni interactive pentru Web.'),
(3, 'Design', 'Design Web si de experienta a utilizatorului', 'Creeaza grafica, interfete si site-uri Web statice si dinamice utilizand cunostinte de HTML, CSS, Photoshop, InDesign, Muse si de instalare, configurare si administrare a unor sisteme de management de continut Web (WCMS).'),
(4, 'Analiza', 'Internet research si analiza datelor digitale', 'Extrage date de pe Web (folosind tehnici de Web Scraping si interogari API) si din baze de date cu acces liber, le prelucreaza si le analizeaza, creand rapoarte și vizualizari de date (infografice interactive) pentru public sau clienti.'),
(5, 'Antreprenoriat', 'Modele de afaceri online', 'Initiaza afaceri in mediul online în special sub forma unor site-uri axate pe continut, comunitati virtuale sau servicii sau a unor aplicatii pentru dispozitive mobile, aplicand modele de planuri de afaceri specifice mediului online.'),
(6, 'Publicare', 'Management de continut Web', 'Prelucreaza si organizeaza continuturi multimedia digitale (text, foto, audio, video), planifica si administreaza publicarea pe site-uri Web utilizand sisteme de management de continut Web - Wordpress, Joomla, Drupal, Concrete5 etc.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'miriam', '$2y$10$HhDLorrJmnd3kTT3ilbpOumUUPcM10cIq5xmCTkblwk6Xn0Zcm0L.', '2021-12-03 13:56:22'),
(4, 'filip', '$2y$10$RgfRsaazlgkEuQ/E5khoZeg1tSqKY/BnQDHA8HYT50h7X.gc6WKKi', '2021-12-03 17:50:34'),
(5, 'denisa', '$2y$10$sjT8UhFt0fbBT7H54i8TpeoniD.C8ZQ.cJ6zbJFdrnv4EZrtAvGSS', '2021-12-03 17:51:50'),
(6, 'Test', '$2y$10$kekOTaqOmKJ/7f69mgm9fu.d9XqbnrdIvhz7lwnWeszZEkZuLLgsq', '2021-12-03 19:37:43'),
(7, 'Test1', '$2y$10$hVYCj9f2C9MxilK0XIXjS.fTKTYGCbzQsmZxDDSHYex5vAeGMb6R2', '2021-12-03 22:36:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
