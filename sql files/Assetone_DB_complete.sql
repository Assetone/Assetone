-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 02. Jul 2014 um 08:38
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
  `B_ID` int(10) NOT NULL AUTO_INCREMENT,
  `B_Vorname` varchar(255) NOT NULL,
  `B_Nachname` varchar(255) NOT NULL,
  `B_email` varchar(254) NOT NULL,
  `Bg_ID` int(10) NOT NULL,
  `B_LastLogin` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `B_Resethash` varchar(40) NOT NULL,
  PRIMARY KEY (`B_ID`),
  KEY `fk_b_bgid` (`Bg_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- RELATIONEN DER TABELLE `Benutzer`:
--   `Bg_ID`
--       `Benutzergruppen` -> `Bg_ID`
--

--
-- Daten für Tabelle `Benutzer`
--

INSERT INTO `Benutzer` (`B_ID`, `B_Vorname`, `B_Nachname`, `B_email`, `Bg_ID`, `B_LastLogin`, `B_Resethash`) VALUES
(0, 'Markus', 'Bader', 'mbader@b3-fuerth.de', 1, '2014-07-04 00:00:00', ''),
(1, 'Udo', 'Lohwasser', 'ulohwasser@b3-fuerth.de', 3, '2014-06-18 00:00:00', ''),
(4, 'Uwe-Jens', 'Lämmerzahl', 'jlaemmerzahl@b3-fuerth.d', 3, '2014-07-02 08:27:31', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Benutzergruppen`
--

CREATE TABLE IF NOT EXISTS `Benutzergruppen` (
  `Bg_ID` int(10) NOT NULL AUTO_INCREMENT,
  `Bg_Bezeichnung` varchar(24) NOT NULL,
  `Zugriff_Benutzerverwaltung` tinyint(1) NOT NULL,
  `Zugriff_Neubeschaffung` tinyint(1) NOT NULL,
  `Zugriff_Stammdatenverwaltung` tinyint(1) NOT NULL,
  `Zugriff_Ausmusterung` tinyint(1) NOT NULL,
  `Zugriff_Wartung` tinyint(1) NOT NULL,
  `Zugriff_Bestellung` tinyint(1) NOT NULL,
  `Zugriff_Reporting` tinyint(1) NOT NULL,
  PRIMARY KEY (`Bg_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Daten für Tabelle `Benutzergruppen`
--

INSERT INTO `Benutzergruppen` (`Bg_ID`, `Bg_Bezeichnung`, `Zugriff_Benutzerverwaltung`, `Zugriff_Neubeschaffung`, `Zugriff_Stammdatenverwaltung`, `Zugriff_Ausmusterung`, `Zugriff_Wartung`, `Zugriff_Bestellung`, `Zugriff_Reporting`) VALUES
(1, 'Systembetreuer', 1, 1, 1, 1, 1, 1, 1),
(2, 'Azubis', 2, 1, 1, 1, 1, 2, 1),
(3, 'Lehrer', 2, 2, 2, 2, 2, 2, 1),
(4, 'Verwaltung', 2, 2, 2, 2, 2, 2, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Bestellung`
--

CREATE TABLE IF NOT EXISTS `Bestellung` (
  `K_ID` int(10) NOT NULL,
  `Bst_Nr` int(10) NOT NULL,
  `Bst_PostenNr` int(10) NOT NULL,
  PRIMARY KEY (`K_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONEN DER TABELLE `Bestellung`:
--   `K_ID`
--       `Komponente` -> `K_ID`
--

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
  `K_Einkaufsdatum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `K_Hersteller` varchar(24) NOT NULL,
  `K_Gewaehrleistung` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`K_ID`),
  KEY `fk_k_Lid` (`L_ID`),
  KEY `fk_k_Rid` (`R_ID`),
  KEY `fk_k_Kart` (`K_Art`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- RELATIONEN DER TABELLE `Komponente`:
--   `K_Art`
--       `Komponentenarten` -> `K_Art_ID`
--   `L_ID`
--       `Lieferant` -> `L_ID`
--   `R_ID`
--       `Raum` -> `R_ID`
--

--
-- Daten für Tabelle `Komponente`
--

INSERT INTO `Komponente` (`K_ID`, `K_Art`, `K_Name`, `L_ID`, `R_ID`, `K_Einkaufsdatum`, `K_Hersteller`, `K_Gewaehrleistung`) VALUES
(1, 0, 'VT590', 0, 2, '2008-03-27 00:00:00', 'NEC', '2010-03-27 00:00:00'),
(2, 2, 'HL-2150N', 0, 2, '2003-07-03 00:00:00', 'Brother', '2005-07-03 00:00:00'),
(3, 3, 'HX191D', 1, 2, '2003-07-07 00:00:00', 'Hanns-G', '2005-07-07 00:00:00'),
(4, 3, 'HX191D', 1, 2, '2003-07-07 00:00:00', 'Hanns-G', '2005-07-07 00:00:00'),
(5, 3, 'HX191D', 1, 2, '2003-07-07 00:00:00', 'Hanns-G', '2005-07-07 00:00:00'),
(6, 3, 'HX191D', 1, 2, '2003-07-07 00:00:00', 'Hanns-G', '2005-07-07 00:00:00'),
(7, 3, 'HX191D', 1, 2, '2003-07-07 00:00:00', 'Hanns-G', '2005-07-07 00:00:00'),
(8, 3, 'HX191D', 1, 2, '2003-07-07 00:00:00', 'Hanns-G', '2005-07-07 00:00:00'),
(9, 3, 'HX191D', 1, 2, '2003-07-07 00:00:00', 'Hanns-G', '2005-07-07 00:00:00'),
(10, 3, 'HX191D', 1, 2, '2003-07-07 00:00:00', 'Hanns-G', '2005-07-07 00:00:00'),
(11, 3, 'HX191D', 1, 2, '2003-07-07 00:00:00', 'Hanns-G', '2005-07-07 00:00:00'),
(12, 3, 'HX191D', 1, 2, '2003-07-07 00:00:00', 'Hanns-G', '2005-07-07 00:00:00'),
(13, 3, 'HX191D', 1, 2, '2003-07-07 00:00:00', 'Hanns-G', '2005-07-07 00:00:00'),
(14, 3, 'HX191D', 1, 2, '2003-07-07 00:00:00', 'Hanns-G', '2005-07-07 00:00:00'),
(15, 3, 'HX191D', 1, 2, '2003-07-07 00:00:00', 'Hanns-G', '2005-07-07 00:00:00'),
(16, 3, 'HX191D', 1, 2, '2003-07-07 00:00:00', 'Hanns-G', '2005-07-07 00:00:00'),
(17, 3, 'HX191D', 1, 2, '2003-07-07 00:00:00', 'Hanns-G', '2005-07-07 00:00:00');

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
--   `K_Attr_ID`
--       `Komponentenattribute` -> `K_Attr_ID`
--   `K_ZW_ID`
--       `ZulaessigeWerte` -> `K_ZW_ID`
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

--
-- Daten für Tabelle `Komponentenarten`
--

INSERT INTO `Komponentenarten` (`K_Art_ID`, `K_Art_Bezeichnung`) VALUES
(0, 'Beamer'),
(2, 'Drucker'),
(3, 'Monitor');

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
  `L_Name` varchar(255) NOT NULL,
  PRIMARY KEY (`L_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `Lieferant`
--

INSERT INTO `Lieferant` (`L_ID`, `L_Name`) VALUES
(0, 'Bechtle'),
(1, 'Computacenter');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Raum`
--

CREATE TABLE IF NOT EXISTS `Raum` (
  `R_ID` int(10) NOT NULL AUTO_INCREMENT,
  `R_Bezeichnung` varchar(24) NOT NULL,
  PRIMARY KEY (`R_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Daten für Tabelle `Raum`
--

INSERT INTO `Raum` (`R_ID`, `R_Bezeichnung`) VALUES
(2, '002');

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
  `V_Datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`SK_ID`),
  KEY `fk_sk_Subnr` (`Sub_Nr`),
  KEY `fk_sk_Rootnr` (`Root_Nr`),
  KEY `fk_sk_Vid` (`V_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONEN DER TABELLE `Subkomponenten`:
--   `Root_Nr`
--       `Komponente` -> `K_ID`
--   `Sub_Nr`
--       `Komponente` -> `K_ID`
--   `V_ID`
--       `Vorgangsarten` -> `V_ID`
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
-- Constraints der Tabelle `Bestellung`
--
ALTER TABLE `Bestellung`
  ADD CONSTRAINT `fk_bst_Kid` FOREIGN KEY (`K_ID`) REFERENCES `Komponente` (`K_ID`);

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
  ADD CONSTRAINT `fk_kazw_katid` FOREIGN KEY (`K_Attr_ID`) REFERENCES `Komponentenattribute` (`K_Attr_ID`),
  ADD CONSTRAINT `fk_kazw_kzwid` FOREIGN KEY (`K_ZW_ID`) REFERENCES `ZulaessigeWerte` (`K_ZW_ID`);

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
  ADD CONSTRAINT `fk_sk_Rootnr` FOREIGN KEY (`Root_Nr`) REFERENCES `Komponente` (`K_ID`),
  ADD CONSTRAINT `fk_sk_Subnr` FOREIGN KEY (`Sub_Nr`) REFERENCES `Komponente` (`K_ID`),
  ADD CONSTRAINT `fk_sk_Vid` FOREIGN KEY (`V_ID`) REFERENCES `Vorgangsarten` (`V_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
