-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 01. Jul 2014 um 11:44
-- Server Version: 5.5.37
-- PHP-Version: 5.4.4-14+deb7u11

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `Assetone`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Benutzer`
--

CREATE TABLE IF NOT EXISTS `Benutzer` (
  `B_ID` int(10) NOT NULL,
  `B_Vorname` varchar(24) NOT NULL,
  `B_Nachname` varchar(24) NOT NULL,
  `B_email` varchar(24) NOT NULL,
  `Bg_ID` int(10) NOT NULL,
  `B_LastLogin` date NOT NULL,
  `B_Resethash` varchar(192) NOT NULL,
  PRIMARY KEY (`B_ID`),
  KEY `fk_b_bgid` (`Bg_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONEN DER TABELLE `Benutzer`:
--   `Bg_ID`
--       `Benutzergruppen` -> `Bg_ID`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Benutzergruppen`
--

CREATE TABLE IF NOT EXISTS `Benutzergruppen` (
  `Bg_ID` int(10) NOT NULL AUTO_INCREMENT,
  `Bg_Bezeichnung` varchar(24) NOT NULL,
  `Zugriff_Benutzerverwaltung` enum('true','false') NOT NULL,
  `Zugriff_Neubeschaffung` enum('true','false') NOT NULL,
  `Zugriff_Stammdatenverwaltung` enum('true','false') NOT NULL,
  `Zugriff_Ausmusterung` enum('true','false') NOT NULL,
  `Zugriff_Wartung` enum('true','false') NOT NULL,
  `Zugriff_Bestellung` enum('true','false') NOT NULL,
  `Zugriff_Reporting` enum('true','false') NOT NULL,
  PRIMARY KEY (`Bg_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `Benutzer`
--
ALTER TABLE `Benutzer`
  ADD CONSTRAINT `fk_b_bgid` FOREIGN KEY (`Bg_ID`) REFERENCES `Benutzergruppen` (`Bg_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
