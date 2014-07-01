-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 01. Jul 2014 um 11:50
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
CREATE DATABASE `Assetone` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `Assetone`;

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

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Komponente`
--

CREATE TABLE IF NOT EXISTS `Komponente` (
  `K_ID` int(10) NOT NULL AUTO_INCREMENT,
  `K_Art` int(10) NOT NULL,
  `K_Name` varchar(24) NOT NULL,
  `L_ID` int(10) NOT NULL,
  `R_ID` int(10) NOT NULL,
  `K_Einkaufsdatum` date NOT NULL,
  `K_Hersteller` varchar(24) NOT NULL,
  `K_Gewaehrleistung` date NOT NULL,
  PRIMARY KEY (`K_ID`),
  KEY `fk_k_Lid` (`L_ID`),
  KEY `fk_k_Rid` (`R_ID`),
  KEY `fk_k_Kart` (`K_Art`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- RELATIONEN DER TABELLE `Komponente`:
--   `K_Art`
--       `Komponentenarten` -> `K_Art_ID`
--   `L_ID`
--       `Lieferant` -> `L_ID`
--   `R_ID`
--       `Raum` -> `R_ID`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Komponente_Komponentenattribute`
--

CREATE TABLE IF NOT EXISTS `Komponente_Komponentenattribute` (
  `K_K_Attr_ID` int(10) NOT NULL AUTO_INCREMENT,
  `K_ID` int(10) NOT NULL,
  `K_Attr_ID` int(10) NOT NULL,
  `Wert` varchar(24) NOT NULL,
  PRIMARY KEY (`K_K_Attr_ID`),
  KEY `fk_kka_kid` (`K_ID`),
  KEY `fk_kka_kaid` (`K_Attr_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- RELATIONEN DER TABELLE `Komponente_Komponentenattribute`:
--   `K_Attr_ID`
--       `Komponentenattribute` -> `K_Attr_ID`
--   `K_ID`
--       `Komponente` -> `K_ID`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `KomponentenArt_Attribut`
--

CREATE TABLE IF NOT EXISTS `KomponentenArt_Attribut` (
  `K_Art_Attr_ID` int(10) NOT NULL AUTO_INCREMENT,
  `K_Attr_ID` int(10) NOT NULL,
  `K_Art_ID` int(10) NOT NULL,
  PRIMARY KEY (`K_Art_Attr_ID`),
  KEY `fk_kaa_katid` (`K_Attr_ID`),
  KEY `fk_kaa_karid` (`K_Art_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- RELATIONEN DER TABELLE `KomponentenArt_Attribut`:
--   `K_Art_ID`
--       `Komponentenarten` -> `K_Art_ID`
--   `K_Attr_ID`
--       `Komponentenattribute` -> `K_Attr_ID`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `KomponentenAttribute_ZulaessigeWerte`
--

CREATE TABLE IF NOT EXISTS `KomponentenAttribute_ZulaessigeWerte` (
  `K_Attr_ZW_ID` int(10) NOT NULL AUTO_INCREMENT,
  `K_Attr_ID` int(10) NOT NULL,
  `K_ZW_ID` int(10) NOT NULL,
  PRIMARY KEY (`K_Attr_ZW_ID`),
  KEY `fk_kazw_katid` (`K_Attr_ID`),
  KEY `fk_kazw_kzwid` (`K_ZW_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- RELATIONEN DER TABELLE `KomponentenAttribute_ZulaessigeWerte`:
--   `K_ZW_ID`
--       `ZulaessigeWerte` -> `K_ZW_ID`
--   `K_Attr_ID`
--       `Komponentenattribute` -> `K_Attr_ID`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Komponentenarten`
--

CREATE TABLE IF NOT EXISTS `Komponentenarten` (
  `K_Art_ID` int(10) NOT NULL,
  `K_Art_Bezeichnung` varchar(24) NOT NULL,
  PRIMARY KEY (`K_Art_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Komponentenattribute`
--

CREATE TABLE IF NOT EXISTS `Komponentenattribute` (
  `K_Attr_ID` int(10) NOT NULL,
  `K_Attr_Bezeichnung` varchar(24) NOT NULL,
  PRIMARY KEY (`K_Attr_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Komponentennotizen`
--

CREATE TABLE IF NOT EXISTS `Komponentennotizen` (
  `K_ID` int(10) NOT NULL,
  `KN_Wert` varchar(128) NOT NULL,
  PRIMARY KEY (`K_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONEN DER TABELLE `Komponentennotizen`:
--   `K_ID`
--       `Komponente` -> `K_ID`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Lieferant`
--

CREATE TABLE IF NOT EXISTS `Lieferant` (
  `L_ID` int(10) NOT NULL,
  `L_Name` varchar(24) NOT NULL,
  PRIMARY KEY (`L_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Raum`
--

CREATE TABLE IF NOT EXISTS `Raum` (
  `R_ID` int(10) NOT NULL,
  `R_Bezeichnung` varchar(24) NOT NULL,
  PRIMARY KEY (`R_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Raumnotizen`
--

CREATE TABLE IF NOT EXISTS `Raumnotizen` (
  `R_ID` int(10) NOT NULL,
  `RN_Wert` varchar(128) NOT NULL,
  PRIMARY KEY (`R_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONEN DER TABELLE `Raumnotizen`:
--   `R_ID`
--       `Raum` -> `R_ID`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Subkomponenten`
--

CREATE TABLE IF NOT EXISTS `Subkomponenten` (
  `SK_ID` int(10) NOT NULL,
  `Sub_Nr` int(10) NOT NULL,
  `Root_Nr` int(10) NOT NULL,
  `V_ID` int(10) NOT NULL,
  `V_Datum` date NOT NULL,
  PRIMARY KEY (`SK_ID`),
  KEY `fk_sk_Subnr` (`Sub_Nr`),
  KEY `fk_sk_Rootnr` (`Root_Nr`),
  KEY `fk_sk_Vid` (`V_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONEN DER TABELLE `Subkomponenten`:
--   `V_ID`
--       `Vorgangsarten` -> `V_ID`
--   `Root_Nr`
--       `Komponente` -> `K_ID`
--   `Sub_Nr`
--       `Komponente` -> `K_ID`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Vorgangsarten`
--

CREATE TABLE IF NOT EXISTS `Vorgangsarten` (
  `V_ID` int(10) NOT NULL,
  `V_Bezeichnung` varchar(24) NOT NULL,
  PRIMARY KEY (`V_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ZulaessigeWerte`
--

CREATE TABLE IF NOT EXISTS `ZulaessigeWerte` (
  `K_ZW_ID` int(10) NOT NULL,
  `K_ZW_Wert` varchar(24) NOT NULL,
  PRIMARY KEY (`K_ZW_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `Benutzer`
--
ALTER TABLE `Benutzer`
  ADD CONSTRAINT `fk_b_bgid` FOREIGN KEY (`Bg_ID`) REFERENCES `Benutzergruppen` (`Bg_ID`);

--
-- Constraints der Tabelle `Komponente`
--
ALTER TABLE `Komponente`
  ADD CONSTRAINT `fk_k_Kart` FOREIGN KEY (`K_Art`) REFERENCES `Komponentenarten` (`K_Art_ID`),
  ADD CONSTRAINT `fk_k_Lid` FOREIGN KEY (`L_ID`) REFERENCES `Lieferant` (`L_ID`),
  ADD CONSTRAINT `fk_k_Rid` FOREIGN KEY (`R_ID`) REFERENCES `Raum` (`R_ID`);

--
-- Constraints der Tabelle `Komponente_Komponentenattribute`
--
ALTER TABLE `Komponente_Komponentenattribute`
  ADD CONSTRAINT `fk_kka_kaid` FOREIGN KEY (`K_Attr_ID`) REFERENCES `Komponentenattribute` (`K_Attr_ID`),
  ADD CONSTRAINT `fk_kka_kid` FOREIGN KEY (`K_ID`) REFERENCES `Komponente` (`K_ID`);

--
-- Constraints der Tabelle `KomponentenArt_Attribut`
--
ALTER TABLE `KomponentenArt_Attribut`
  ADD CONSTRAINT `fk_kaa_karid` FOREIGN KEY (`K_Art_ID`) REFERENCES `Komponentenarten` (`K_Art_ID`),
  ADD CONSTRAINT `fk_kaa_katid` FOREIGN KEY (`K_Attr_ID`) REFERENCES `Komponentenattribute` (`K_Attr_ID`);

--
-- Constraints der Tabelle `KomponentenAttribute_ZulaessigeWerte`
--
ALTER TABLE `KomponentenAttribute_ZulaessigeWerte`
  ADD CONSTRAINT `fk_kazw_kzwid` FOREIGN KEY (`K_ZW_ID`) REFERENCES `ZulaessigeWerte` (`K_ZW_ID`),
  ADD CONSTRAINT `fk_kazw_katid` FOREIGN KEY (`K_Attr_ID`) REFERENCES `Komponentenattribute` (`K_Attr_ID`);

--
-- Constraints der Tabelle `Komponentennotizen`
--
ALTER TABLE `Komponentennotizen`
  ADD CONSTRAINT `fk_kn_Kid` FOREIGN KEY (`K_ID`) REFERENCES `Komponente` (`K_ID`);

--
-- Constraints der Tabelle `Raumnotizen`
--
ALTER TABLE `Raumnotizen`
  ADD CONSTRAINT `fk_rn_Kid` FOREIGN KEY (`R_ID`) REFERENCES `Raum` (`R_ID`);

--
-- Constraints der Tabelle `Subkomponenten`
--
ALTER TABLE `Subkomponenten`
  ADD CONSTRAINT `fk_sk_Vid` FOREIGN KEY (`V_ID`) REFERENCES `Vorgangsarten` (`V_ID`),
  ADD CONSTRAINT `fk_sk_Rootnr` FOREIGN KEY (`Root_Nr`) REFERENCES `Komponente` (`K_ID`),
  ADD CONSTRAINT `fk_sk_Subnr` FOREIGN KEY (`Sub_Nr`) REFERENCES `Komponente` (`K_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
