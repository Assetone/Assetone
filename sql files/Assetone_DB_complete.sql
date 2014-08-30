-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 30. Aug 2014 um 12:59
-- Server Version: 5.5.37
-- PHP-Version: 5.4.4-14+deb7u11

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `assetone`
--

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
  `B_Username` varchar(255) NOT NULL,
  `B_Passwort` varchar(255) NOT NULL,
  PRIMARY KEY (`B_ID`),
  KEY `fk_b_bgid` (`Bg_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=57 ;

--
-- Daten für Tabelle `Benutzer`
--

INSERT INTO `Benutzer` (`B_ID`, `B_Vorname`, `B_Nachname`, `B_email`, `Bg_ID`, `B_LastLogin`, `B_Resethash`, `B_Username`, `B_Passwort`) VALUES
(0, 'Markus', 'Bader', 'mbader@b3-fuerth.de', 1, '2019-01-03 08:35:43', '', 'mbader', '9688d2129ddc6e936836d8269622aa93'),
(1, 'Udo', 'Lohwasser', 'ulohwasser@b3-fuerth.de', 3, '2014-01-03 08:35:43', '', 'ulohwasser', '9688d2129ddc6e936836d8269622aa93'),
(2, 'Uwe-Jens', 'Lämmerzahl', 'jlaemmerzahl@b3-fuerth.de', 3, '2019-01-03 08:35:43', '', 'jlaemmerzahl', '9688d2129ddc6e936836d8269622aa93'),
(3, 'Michael', 'Addala', 'maddala@b3-fuerth.de', 3, '2019-01-03 08:35:43', '', 'maddala', '9688d2129ddc6e936836d8269622aa93'),
(4, 'Stefan', 'Baron', 'sbaron@b3-fuerth.de', 3, '2019-01-03 08:35:43', '', 'sbaron', '9688d2129ddc6e936836d8269622aa93'),
(5, 'Reinhard', 'Döhnel', 'rdoehnel@b3-fuerth.de', 3, '2019-01-03 08:35:43', '', 'rdoehnel', '9688d2129ddc6e936836d8269622aa93'),
(6, 'Udo', 'Egermeier', 'uegermeier@b3-fuerth.de', 3, '2019-01-03 08:35:43', '', 'uegermeier', '9688d2129ddc6e936836d8269622aa93'),
(7, 'Michael', 'Feike', 'mfeike@b3-fuerth.de', 3, '2019-01-03 08:35:43', '', 'mfeike', '9688d2129ddc6e936836d8269622aa93'),
(8, 'Renatus', 'Fischer', 'rfischer@b3-fuerth.de', 3, '2019-01-03 08:35:43', '', 'rfischer', '9688d2129ddc6e936836d8269622aa93'),
(9, 'Roland', 'Förstner', 'rfoerstner@b3-fuerth.de', 3, '2019-01-03 08:35:43', '', 'rfoerstner', '9688d2129ddc6e936836d8269622aa93'),
(10, 'Wolfgang', 'Gaull', 'wgaull@b3-fuerth.de', 3, '2019-01-03 08:35:43', '', 'wgaull', '9688d2129ddc6e936836d8269622aa93'),
(11, 'Michael', 'Graf', 'mgraf@b3-fuerth.de', 3, '2019-01-03 08:35:43', '', 'mgraf', '9688d2129ddc6e936836d8269622aa93'),
(12, 'Pia', 'Grüber', 'pgrueber@b3-fuerth.de', 3, '2019-01-03 08:35:43', '', 'pgrueber', '9688d2129ddc6e936836d8269622aa93'),
(13, 'Jürgen', 'Herbst', 'jherbst@b3-fuerth.de', 3, '2019-01-03 08:35:43', '', 'jherbst', '9688d2129ddc6e936836d8269622aa93'),
(14, 'Bernd', 'Hetzel', 'bhetzel@b3-fuerth.de', 3, '2019-01-03 08:35:43', '', 'bhetzel', '9688d2129ddc6e936836d8269622aa93'),
(15, 'Jörg', 'Hofmann', 'jhofmann@b3-fuerth.de', 3, '2019-01-03 08:35:43', '', 'jhofmann', '9688d2129ddc6e936836d8269622aa93'),
(16, 'Hermann', 'Kanzler', 'hkanzler@b3-fuerth.de', 3, '2019-01-03 08:35:43', '', 'hkanzler', '9688d2129ddc6e936836d8269622aa93'),
(17, 'Julia', 'von Keitz', 'jvonkeitz@b3-fuerth.de', 3, '2019-01-03 08:35:43', '', 'jvonkeitz', '9688d2129ddc6e936836d8269622aa93'),
(18, 'Christoph', 'Kilgenstein', 'ckilgenstein@b3-fuerth.de', 3, '2019-01-03 08:35:43', '', 'ckilgenstein', '9688d2129ddc6e936836d8269622aa93'),
(19, 'Fabian', 'Mueller', 'fabianmueller@softwerk.de', 2, '2019-01-03 08:35:43', '', 'fabianmueller', '9688d2129ddc6e936836d8269622aa93'),
(20, 'Nicole', 'Schmittner', 'nicoleschmittner@softwerk.de', 2, '2019-01-03 08:35:43', '', 'nicoleschmittner', '9688d2129ddc6e936836d8269622aa93'),
(21, 'Georg', 'Schmidt', 'georg.schmidt@softwerk.de', 2, '2019-01-03 08:35:43', '', 'georgschmidt', '9688d2129ddc6e936836d8269622aa93'),
(31, 'Holger', 'Längner', 'hlaengner@b3-fuerth.de', 3, '2019-01-03 08:35:43', '', 'hlaengner', '9688d2129ddc6e936836d8269622aa93'),
(32, 'Susanne', 'Leutsch', 'sleutsch@b3-fuerth.de', 3, '2019-01-03 08:35:43', '', 'sleutsch', '9688d2129ddc6e936836d8269622aa93'),
(33, 'Werner', 'Liegl', 'wliegl@b3-fuerth.de', 3, '2019-01-03 08:35:43', '', 'wliegl', '9688d2129ddc6e936836d8269622aa93'),
(34, 'Richard', 'Morgott', 'rmorgott@b3-fuerth.de', 3, '2019-01-03 08:35:43', '', 'rmorgott', '9688d2129ddc6e936836d8269622aa93'),
(35, 'Hermann', 'Riegler', 'hriegler@b3-fuerth.de', 3, '2019-01-03 08:35:43', '', 'hriegler', '9688d2129ddc6e936836d8269622aa93'),
(36, 'Ulrike', 'Ringelhann', 'uringelhann@b3-fuerth.de', 3, '2019-01-03 08:35:43', '', 'uringelhann', '9688d2129ddc6e936836d8269622aa93'),
(37, 'Stefan', 'Rödel', 'sroedel@b3-fuerth.de', 3, '2019-01-03 08:35:43', '', 'sroedel', '9688d2129ddc6e936836d8269622aa93'),
(38, 'Rudolf', 'Römert', 'rroemert@b3-fuerth.de', 3, '2019-01-03 08:35:43', '', 'rroemert', '9688d2129ddc6e936836d8269622aa93'),
(39, 'Gerhard', 'Rosenmüller', 'grosenmüller@b3-fuerth.de', 3, '2019-01-03 08:35:43', '', 'grosenmüller', '9688d2129ddc6e936836d8269622aa93'),
(40, 'Markus', 'Schelz', 'mschelz@b3-fuerth.de', 3, '2019-01-03 08:35:43', '', 'mschelz', '9688d2129ddc6e936836d8269622aa93'),
(41, 'Manfred', 'Schießl', 'mschießl@b3-fuerth.de', 3, '2019-01-03 08:35:43', '', 'mschießl', '9688d2129ddc6e936836d8269622aa93'),
(42, 'Peter', 'Schmid', 'pschmid@b3-fuerth.de', 3, '2019-01-03 08:35:43', '', 'pschmid', '9688d2129ddc6e936836d8269622aa93'),
(43, 'Joachim', 'Schneider', 'jschneider@b3-fuerth.de', 3, '2019-01-03 08:35:43', '', 'jschneider', '9688d2129ddc6e936836d8269622aa93'),
(44, 'Gerold', 'Scholz', 'gscholz@b3-fuerth.de', 3, '2019-01-03 08:35:43', '', 'gscholz', '9688d2129ddc6e936836d8269622aa93'),
(45, 'Anton', 'Schweiger', 'aschweiger@b3-fuerth.de', 3, '2019-01-03 08:35:43', '', 'aschweiger', '9688d2129ddc6e936836d8269622aa93'),
(46, 'Anne', 'Strobl', 'astrobl@b3-fuerth.de', 3, '2019-01-03 08:35:43', '', 'astrobl', '9688d2129ddc6e936836d8269622aa93'),
(47, 'Stephan', 'Thurn', 'sthurn@b3-fuerth.de', 3, '2019-01-03 08:35:43', '', 'sthurn', '9688d2129ddc6e936836d8269622aa93'),
(48, 'Eckhard', 'Weigt', 'eweigt@b3-fuerth.de', 3, '2019-01-03 08:35:43', '', 'eweigt', '9688d2129ddc6e936836d8269622aa93'),
(49, 'Reinhard', 'Werthan', 'rwerthan@b3-fuerth.de', 3, '2019-01-03 08:35:43', '', 'rwerthan', '9688d2129ddc6e936836d8269622aa93'),
(50, 'Karl Heinz', 'Wild', 'kwild@b3-fuerth.de', 3, '2019-01-03 08:35:43', '', 'kwild', '9688d2129ddc6e936836d8269622aa93'),
(51, 'Arwed', 'Winter', 'awinter@b3-fuerth.de', 3, '2019-01-03 08:35:43', '', 'awinter', '9688d2129ddc6e936836d8269622aa93'),
(52, 'Roland', 'Zimmermann', 'rzimmermann@b3-fuerth.de', 3, '2019-01-03 08:35:43', '', 'rzimmermann', '9688d2129ddc6e936836d8269622aa93'),
(53, 'Matthias', 'Zimpel', 'mzimpel@b3-fuerth.de', 3, '2019-01-03 08:35:43', '', 'mzimpel', '9688d2129ddc6e936836d8269622aa93'),
(54, 'Ingrid', 'Gerbing', 'igerbing@b3-fuerth.de', 4, '2019-01-03 08:35:43', '', 'igerbing', '9688d2129ddc6e936836d8269622aa93'),
(55, 'Sabine', 'Wimmer', 'swimmer@b3-fuerth.de', 4, '2019-01-03 08:35:43', '', 'swimmer', '9688d2129ddc6e936836d8269622aa93'),
(56, 'Tanja', 'Scholl', 'tscholl@b3-fuerth.de', 4, '2019-01-03 08:35:43', '', 'tscholl', '9688d2129ddc6e936836d8269622aa93');

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
(2, 'Auszubildender', 2, 1, 1, 1, 1, 2, 1),
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=165 ;

--
-- Daten für Tabelle `Komponente`
--

INSERT INTO `Komponente` (`K_ID`, `K_Art`, `K_Name`, `L_ID`, `R_ID`, `K_Einkaufsdatum`, `K_Hersteller`, `K_Gewaehrleistung`) VALUES
(1, 11, 'VT590', 3, 12, '2019-01-03 04:01:41', 'NEC', '2010-03-27 00:00:00'),
(2, 2, 'HL-2150N', 3, 12, '2019-01-03 01:00:00', 'Brother', '2005-07-03 00:00:00'),
(3, 3, 'HX191D', 2, 12, '2019-01-03 00:54:41', 'Hanns-G', '2005-07-07 00:00:00'),
(4, 3, 'HX191D', 2, 12, '2019-01-03 00:54:41', 'Hanns-G', '2005-07-07 00:00:00'),
(5, 3, 'HX191D', 2, 12, '2019-01-03 00:54:41', 'Hanns-G', '2005-07-07 00:00:00'),
(6, 3, 'HX191D', 2, 12, '2019-01-03 00:54:41', 'Hanns-G', '2005-07-07 00:00:00'),
(7, 3, 'HX191D', 2, 12, '2019-01-03 00:54:41', 'Hanns-G', '2005-07-07 00:00:00'),
(8, 3, 'HX191D', 2, 12, '2019-01-03 00:54:41', 'Hanns-G', '2005-07-07 00:00:00'),
(9, 3, 'HX191D', 2, 12, '2019-01-03 00:54:41', 'Hanns-G', '2005-07-07 00:00:00'),
(10, 3, 'HX191D', 2, 12, '2019-01-03 00:54:41', 'Hanns-G', '2005-07-07 00:00:00'),
(11, 3, 'HX191D', 2, 12, '2019-01-03 00:54:41', 'Hanns-G', '2005-07-07 00:00:00'),
(12, 3, 'HX191D', 2, 12, '2019-01-03 00:53:17', 'Hanns-G', '2005-07-07 00:00:00'),
(13, 3, 'HX191D', 2, 12, '2019-01-03 00:54:41', 'Hanns-G', '2005-07-07 00:00:00'),
(14, 3, 'HX191D', 2, 12, '2019-01-03 00:54:41', 'Hanns-G', '2005-07-07 00:00:00'),
(15, 3, 'HX191D', 2, 12, '2019-01-03 00:54:41', 'Hanns-G', '2005-07-07 00:00:00'),
(16, 3, 'HX191D', 2, 12, '2019-01-03 00:54:41', 'Hanns-G', '2005-07-07 00:00:00'),
(17, 3, 'HX191D', 3, 12, '2019-01-03 00:59:16', 'Hanns-G', '2005-07-07 00:00:00'),
(18, 1, 'GA-G31M-ES2L', 3, 12, '2019-01-03 01:00:00', 'gigabyte', '2016-07-03 00:00:00'),
(19, 1, 'GA-G31M-ES2L', 3, 12, '2019-01-03 01:54:45', 'gigabyte', '2016-07-03 00:00:00'),
(20, 1, 'GA-G31M-ES2L', 3, 12, '2019-01-03 01:54:45', 'gigabyte', '2016-07-03 00:00:00'),
(21, 1, 'GA-G31M-ES2L', 3, 12, '2019-01-03 01:54:45', 'gigabyte', '2016-07-03 00:00:00'),
(22, 1, 'GA-G31M-ES2L', 3, 12, '2019-01-03 01:54:45', 'gigabyte', '2016-07-03 00:00:00'),
(23, 1, 'GA-G31M-ES2L', 3, 12, '2019-01-03 01:54:45', 'gigabyte', '2016-07-03 00:00:00'),
(24, 1, 'GA-G31M-ES2L', 3, 12, '2019-01-03 01:54:45', 'gigabyte', '2016-07-03 00:00:00'),
(25, 1, 'GA-G31M-ES2L', 3, 12, '2019-01-03 01:54:45', 'gigabyte', '2016-07-03 00:00:00'),
(26, 1, 'GA-G31M-ES2L', 3, 12, '2019-01-03 01:54:45', 'gigabyte', '2016-07-03 00:00:00'),
(27, 1, 'GA-G31M-ES2L', 3, 12, '2019-01-03 01:54:45', 'gigabyte', '2016-07-03 00:00:00'),
(28, 1, 'GA-G31M-ES2L', 3, 12, '2019-01-03 01:54:45', 'gigabyte', '2016-07-03 00:00:00'),
(29, 1, 'GA-G31M-ES2L', 3, 12, '2019-01-03 01:54:45', 'gigabyte', '2016-07-03 00:00:00'),
(30, 1, 'GA-G31M-ES2L', 3, 12, '2019-01-03 01:54:45', 'gigabyte', '2016-07-03 00:00:00'),
(31, 1, 'GA-G31M-ES2L', 3, 12, '2019-01-03 01:54:45', 'gigabyte', '2016-07-03 00:00:00'),
(32, 1, 'GA-G31M-ES2L', 3, 12, '2019-01-03 01:54:45', 'gigabyte', '2016-07-03 00:00:00'),
(33, 4, 'Core 2 Duo E7400', 3, 12, '2019-01-03 01:00:00', 'Intel', '2016-07-03 00:00:00'),
(34, 4, 'Core 2 Duo E7400', 3, 12, '2019-01-03 01:00:00', 'Intel', '2016-07-03 00:00:00'),
(35, 4, 'Core 2 Duo E7400', 3, 12, '2019-01-03 01:00:00', 'Intel', '2016-07-03 00:00:00'),
(36, 4, 'Core 2 Duo E7400', 3, 12, '2019-01-03 01:00:00', 'Intel', '2016-07-03 00:00:00'),
(37, 4, 'Core 2 Duo E7400', 3, 12, '2019-01-03 01:00:00', 'Intel', '2016-07-03 00:00:00'),
(38, 4, 'Core 2 Duo E7400', 3, 12, '2019-01-03 01:00:00', 'Intel', '2016-07-03 00:00:00'),
(39, 4, 'Core 2 Duo E7400', 3, 12, '2019-01-03 01:00:00', 'Intel', '2016-07-03 00:00:00'),
(40, 4, 'Core 2 Duo E7400', 3, 12, '2019-01-03 01:00:00', 'Intel', '2016-07-03 00:00:00'),
(41, 4, 'Core 2 Duo E7400', 3, 12, '2019-01-03 01:00:00', 'Intel', '2016-07-03 00:00:00'),
(42, 4, 'Core 2 Duo E7400', 3, 12, '2019-01-03 01:00:00', 'Intel', '2016-07-03 00:00:00'),
(43, 4, 'Core 2 Duo E7400', 3, 12, '2019-01-03 01:00:00', 'Intel', '2016-07-03 00:00:00'),
(44, 4, 'Core 2 Duo E7400', 3, 12, '2019-01-03 01:00:00', 'Intel', '2016-07-03 00:00:00'),
(45, 4, 'Core 2 Duo E7400', 3, 12, '2019-01-03 01:00:00', 'Intel', '2016-07-03 00:00:00'),
(46, 4, 'Core 2 Duo E7400', 3, 12, '2019-01-03 01:00:00', 'Intel', '2016-07-03 00:00:00'),
(47, 4, 'Core 2 Duo E7400', 3, 12, '2019-01-03 01:00:00', 'Intel', '2016-07-03 00:00:00'),
(48, 5, 'GMA 3100', 3, 2, '2019-01-03 01:00:00', 'Intel', '2016-07-03 00:00:00'),
(49, 5, 'GMA 3100', 3, 2, '2019-01-03 01:00:00', 'Intel', '2016-07-03 00:00:00'),
(50, 5, 'GMA 3100', 3, 2, '2019-01-03 01:00:00', 'Intel', '2016-07-03 00:00:00'),
(51, 5, 'GMA 3100', 3, 2, '2019-01-03 01:00:00', 'Intel', '2016-07-03 00:00:00'),
(52, 5, 'GMA 3100', 3, 2, '2019-01-03 01:00:00', 'Intel', '2016-07-03 00:00:00'),
(53, 5, 'GMA 3100', 3, 2, '2019-01-03 01:00:00', 'Intel', '2016-07-03 00:00:00'),
(54, 5, 'GMA 3100', 3, 2, '2019-01-03 01:00:00', 'Intel', '2016-07-03 00:00:00'),
(55, 5, 'GMA 3100', 3, 2, '2019-01-03 01:00:00', 'Intel', '2016-07-03 00:00:00'),
(56, 5, 'GMA 3100', 3, 2, '2019-01-03 01:00:00', 'Intel', '2016-07-03 00:00:00'),
(57, 5, 'GMA 3100', 3, 2, '2019-01-03 01:00:00', 'Intel', '2016-07-03 00:00:00'),
(58, 5, 'GMA 3100', 3, 2, '2019-01-03 01:00:00', 'Intel', '2016-07-03 00:00:00'),
(59, 5, 'GMA 3100', 3, 2, '2019-01-03 01:00:00', 'Intel', '2016-07-03 00:00:00'),
(60, 5, 'GMA 3100', 3, 2, '2019-01-03 01:00:00', 'Intel', '2016-07-03 00:00:00'),
(61, 5, 'GMA 3100', 3, 2, '2019-01-03 01:00:00', 'Intel', '2016-07-03 00:00:00'),
(62, 5, 'GMA 3100', 3, 2, '2019-01-03 01:00:00', 'Intel', '2016-07-03 00:00:00'),
(63, 6, 'M2Y2G64TU8HD5B-3C', 3, 12, '2019-01-03 01:00:00', 'elixir', '2016-07-03 00:00:00'),
(64, 6, 'M2Y2G64TU8HD5B-3C', 3, 12, '2019-01-03 01:00:00', 'elixir', '2016-07-03 00:00:00'),
(65, 6, 'M2Y2G64TU8HD5B-3C', 3, 12, '2019-01-03 01:00:00', 'elixir', '2016-07-03 00:00:00'),
(66, 6, 'M2Y2G64TU8HD5B-3C', 3, 12, '2019-01-03 01:00:00', 'elixir', '2016-07-03 00:00:00'),
(67, 6, 'M2Y2G64TU8HD5B-3C', 3, 12, '2019-01-03 01:00:00', 'elixir', '2016-07-03 00:00:00'),
(68, 6, 'M2Y2G64TU8HD5B-3C', 3, 12, '2019-01-03 01:00:00', 'elixir', '2016-07-03 00:00:00'),
(69, 6, 'M2Y2G64TU8HD5B-3C', 3, 12, '2019-01-03 01:00:00', 'elixir', '2016-07-03 00:00:00'),
(70, 6, 'M2Y2G64TU8HD5B-3C', 3, 12, '2019-01-03 01:00:00', 'elixir', '2016-07-03 00:00:00'),
(71, 6, 'M2Y2G64TU8HD5B-3C', 3, 12, '2019-01-03 01:00:00', 'elixir', '2016-07-03 00:00:00'),
(72, 6, 'M2Y2G64TU8HD5B-3C', 3, 12, '2019-01-03 01:00:00', 'elixir', '2016-07-03 00:00:00'),
(73, 6, 'M2Y2G64TU8HD5B-3C', 3, 12, '2019-01-03 01:00:00', 'elixir', '2016-07-03 00:00:00'),
(74, 6, 'M2Y2G64TU8HD5B-3C', 3, 12, '2019-01-03 01:00:00', 'elixir', '2016-07-03 00:00:00'),
(75, 6, 'M2Y2G64TU8HD5B-3C', 3, 12, '2019-01-03 01:00:00', 'elixir', '2016-07-03 00:00:00'),
(76, 6, 'M2Y2G64TU8HD5B-3C', 3, 12, '2019-01-03 01:00:00', 'elixir', '2016-07-03 00:00:00'),
(77, 6, 'M2Y2G64TU8HD5B-3C', 3, 12, '2019-01-03 01:00:00', 'elixir', '2016-07-03 00:00:00'),
(78, 6, 'M2Y2G64TU8HD5B-3C', 3, 12, '2019-01-03 01:00:00', 'elixir', '2016-07-03 00:00:00'),
(79, 6, 'M2Y2G64TU8HD5B-3C', 3, 12, '2019-01-03 01:00:00', 'elixir', '2016-07-03 00:00:00'),
(80, 6, 'M2Y2G64TU8HD5B-3C', 3, 12, '2019-01-03 01:00:00', 'elixir', '2016-07-03 00:00:00'),
(81, 6, 'M2Y2G64TU8HD5B-3C', 3, 12, '2019-01-03 01:00:00', 'elixir', '2016-07-03 00:00:00'),
(82, 6, 'M2Y2G64TU8HD5B-3C', 3, 12, '2019-01-03 01:00:00', 'elixir', '2016-07-03 00:00:00'),
(83, 6, 'M2Y2G64TU8HD5B-3C', 3, 12, '2019-01-03 01:00:00', 'elixir', '2016-07-03 00:00:00'),
(84, 6, 'M2Y2G64TU8HD5B-3C', 3, 12, '2019-01-03 01:00:00', 'elixir', '2016-07-03 00:00:00'),
(85, 6, 'M2Y2G64TU8HD5B-3C', 3, 12, '2019-01-03 01:00:00', 'elixir', '2016-07-03 00:00:00'),
(86, 6, 'M2Y2G64TU8HD5B-3C', 3, 12, '2019-01-03 01:00:00', 'elixir', '2016-07-03 00:00:00'),
(87, 6, 'M2Y2G64TU8HD5B-3C', 3, 12, '2019-01-03 01:00:00', 'elixir', '2016-07-03 00:00:00'),
(88, 6, 'M2Y2G64TU8HD5B-3C', 3, 12, '2019-01-03 01:00:00', 'elixir', '2016-07-03 00:00:00'),
(89, 6, 'M2Y2G64TU8HD5B-3C', 3, 12, '2019-01-03 01:00:00', 'elixir', '2016-07-03 00:00:00'),
(90, 6, 'M2Y2G64TU8HD5B-3C', 3, 12, '2019-01-03 01:00:00', 'elixir', '2016-07-03 00:00:00'),
(91, 6, 'M2Y2G64TU8HD5B-3C', 3, 12, '2019-01-03 01:00:00', 'elixir', '2016-07-03 00:00:00'),
(92, 6, 'M2Y2G64TU8HD5B-3C', 3, 12, '2019-01-03 01:00:00', 'elixir', '2016-07-03 00:00:00'),
(94, 7, 'Komplettpc Konf. 1', 2, 12, '2014-07-03 00:00:00', '', '0000-00-00 00:00:00'),
(95, 7, 'Komplettpc Konf. 1', 2, 12, '2014-07-03 00:00:00', '', '0000-00-00 00:00:00'),
(96, 7, 'Komplettpc Konf. 1', 2, 12, '2014-07-03 00:00:00', '', '0000-00-00 00:00:00'),
(97, 7, 'Komplettpc Konf. 1', 2, 12, '2014-07-03 00:00:00', '', '0000-00-00 00:00:00'),
(98, 7, 'Komplettpc Konf. 1', 2, 12, '2014-07-03 00:00:00', '', '0000-00-00 00:00:00'),
(99, 8, 'LC6350', 1, 12, '2019-01-03 01:46:55', 'LC Power', '2016-07-03 00:00:00'),
(100, 9, 'FD-235HF', 1, 12, '2019-01-03 01:46:55', 'Teac', '2016-07-03 00:00:00'),
(101, 8, 'LC6350', 1, 12, '2019-01-03 01:47:54', 'LC Power', '2016-07-03 00:00:00'),
(102, 9, 'FD-235HF', 1, 12, '2019-01-03 01:47:54', 'Teac', '2016-07-03 00:00:00'),
(103, 8, 'LC6350', 1, 12, '2019-01-03 01:47:54', 'LC Power', '2016-07-03 00:00:00'),
(104, 9, 'FD-235HF', 1, 12, '2019-01-03 01:47:54', 'Teac', '2016-07-03 00:00:00'),
(105, 8, 'LC6350', 1, 12, '2019-01-03 01:47:54', 'LC Power', '2016-07-03 00:00:00'),
(106, 9, 'FD-235HF', 1, 12, '2019-01-03 01:47:54', 'Teac', '2016-07-03 00:00:00'),
(107, 8, 'LC6350', 1, 12, '2019-01-03 01:47:54', 'LC Power', '2016-07-03 00:00:00'),
(108, 9, 'FD-235HF', 1, 12, '2019-01-03 01:47:54', 'Teac', '2016-07-03 00:00:00'),
(109, 8, 'LC6350', 1, 12, '2019-01-03 01:47:54', 'LC Power', '2016-07-03 00:00:00'),
(110, 9, 'FD-235HF', 1, 12, '2019-01-03 01:47:54', 'Teac', '2016-07-03 00:00:00'),
(111, 8, 'LC6350', 1, 12, '2019-01-03 01:47:54', 'LC Power', '2016-07-03 00:00:00'),
(112, 9, 'FD-235HF', 1, 12, '2019-01-03 01:47:54', 'Teac', '2016-07-03 00:00:00'),
(113, 8, 'LC6350', 1, 12, '2019-01-03 01:47:54', 'LC Power', '2016-07-03 00:00:00'),
(114, 9, 'FD-235HF', 1, 12, '2019-01-03 01:47:54', 'Teac', '2016-07-03 00:00:00'),
(115, 8, 'LC6350', 1, 12, '2019-01-03 01:47:54', 'LC Power', '2016-07-03 00:00:00'),
(116, 9, 'FD-235HF', 1, 12, '2019-01-03 01:47:54', 'Teac', '2016-07-03 00:00:00'),
(117, 8, 'LC6350', 1, 12, '2019-01-03 01:47:54', 'LC Power', '2016-07-03 00:00:00'),
(118, 9, 'FD-235HF', 1, 12, '2019-01-03 01:47:54', 'Teac', '2016-07-03 00:00:00'),
(119, 8, 'LC6350', 1, 12, '2019-01-03 01:47:54', 'LC Power', '2016-07-03 00:00:00'),
(120, 9, 'FD-235HF', 1, 12, '2019-01-03 01:47:54', 'Teac', '2016-07-03 00:00:00'),
(121, 8, 'LC6350', 1, 12, '2019-01-03 01:47:54', 'LC Power', '2016-07-03 00:00:00'),
(122, 9, 'FD-235HF', 1, 12, '2019-01-03 01:47:54', 'Teac', '2016-07-03 00:00:00'),
(123, 8, 'LC6350', 1, 12, '2019-01-03 01:47:54', 'LC Power', '2016-07-03 00:00:00'),
(124, 9, 'FD-235HF', 1, 12, '2019-01-03 01:47:54', 'Teac', '2016-07-03 00:00:00'),
(125, 8, 'LC6350', 1, 12, '2019-01-03 01:47:54', 'LC Power', '2016-07-03 00:00:00'),
(126, 9, 'FD-235HF', 1, 12, '2019-01-03 01:47:54', 'Teac', '2016-07-03 00:00:00'),
(127, 8, 'LC6350', 1, 12, '2019-01-03 01:47:54', 'LC Power', '2016-07-03 00:00:00'),
(128, 9, 'FD-235HF', 1, 12, '2019-01-03 01:47:54', 'Teac', '2016-07-03 00:00:00'),
(155, 7, 'iMac', 3, 12, '2003-07-20 14:00:00', 'Apple', '2028-01-20 16:00:00'),
(161, 8, 'LC634', 4, 1, '2014-07-03 20:00:00', 'Acetone', '2015-10-08 20:00:00'),
(162, 3, 'jksfkjnbsdkjnfds', 3, 1, '2014-07-17 20:00:00', 'dsdfsd', '2014-07-01 20:00:00'),
(163, 1, '', 1, 0, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(164, 4, 'Testomp', 2, 2, '2014-07-01 20:00:00', 'Test', '2014-12-26 20:00:00');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Komponentenarten`
--

CREATE TABLE IF NOT EXISTS `Komponentenarten` (
  `K_Art_ID` int(10) NOT NULL AUTO_INCREMENT,
  `K_Art_Bezeichnung` varchar(24) NOT NULL,
  PRIMARY KEY (`K_Art_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Daten für Tabelle `Komponentenarten`
--

INSERT INTO `Komponentenarten` (`K_Art_ID`, `K_Art_Bezeichnung`) VALUES
(1, 'Mainboard'),
(2, 'Drucker'),
(3, 'Monitor'),
(4, 'CPU'),
(5, 'Grafikkarte'),
(6, 'Arbeitsspeicher'),
(7, 'PC'),
(8, 'Netzteil'),
(9, 'Diskettenlaufwerk'),
(10, 'CD/DVD-Kombilaufwerk'),
(11, 'Beamer'),
(27, '');

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

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Komponentennotizen`
--

CREATE TABLE IF NOT EXISTS `Komponentennotizen` (
  `K_ID` int(10) NOT NULL,
  `KN_Wert` varchar(128) NOT NULL,
  PRIMARY KEY (`K_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Lieferant`
--

CREATE TABLE IF NOT EXISTS `Lieferant` (
  `L_ID` int(10) NOT NULL AUTO_INCREMENT,
  `L_Name` varchar(255) NOT NULL,
  `L_Strasse_Nr` varchar(255) NOT NULL,
  `L_Plz` varchar(10) NOT NULL,
  `L_Ort` varchar(255) NOT NULL,
  `L_Telefon` varchar(255) DEFAULT NULL,
  `L_Fax` varchar(255) DEFAULT NULL,
  `L_Mail` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`L_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Daten für Tabelle `Lieferant`
--

INSERT INTO `Lieferant` (`L_ID`, `L_Name`, `L_Strasse_Nr`, `L_Plz`, `L_Ort`, `L_Telefon`, `L_Fax`, `L_Mail`) VALUES
(1, 'Computacenter AG & Co. oHG', 'Lina-Ammon-Straße 30', '90471', 'Nürnberg', '0911944540', '091194454130', 'communications.germany@computacenter.com'),
(2, 'TestFirma', 'Faunweg+1', '91207', 'Lauf', '091235573', '091235532', 'fkirschner@live.de'),
(3, 'Bechtle GmbH IT-Systemhaus Nürnberg', 'Fürther Straße 244c', '90429', 'Nürnberg', '0911580750', '0911580754444', 'nuernberg@bechtle.com'),
(4, 'Assetone', 'Faunweg+1', '91207', 'Lauf', '091235573', '091235532', 'fkirschner@live.de');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Raum`
--

CREATE TABLE IF NOT EXISTS `Raum` (
  `R_ID` int(10) NOT NULL AUTO_INCREMENT,
  `R_Bezeichnung` varchar(24) NOT NULL,
  PRIMARY KEY (`R_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Daten für Tabelle `Raum`
--

INSERT INTO `Raum` (`R_ID`, `R_Bezeichnung`) VALUES
(0, 'Neubeschaffungen'),
(1, 'Bestellungen'),
(2, 'Lager'),
(3, 'Ausmusterung'),
(11, '001'),
(12, '002');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Raumnotizen`
--

CREATE TABLE IF NOT EXISTS `Raumnotizen` (
  `R_ID` int(10) NOT NULL,
  `RN_Wert` varchar(128) NOT NULL,
  PRIMARY KEY (`R_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Daten für Tabelle `Subkomponenten`
--

INSERT INTO `Subkomponenten` (`SK_ID`, `Sub_Nr`, `Root_Nr`, `V_ID`, `V_Datum`) VALUES
(0, 3, 2, 1, '2019-01-02 21:33:21');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Vorgangsarten`
--

CREATE TABLE IF NOT EXISTS `Vorgangsarten` (
  `V_ID` int(10) NOT NULL,
  `V_Bezeichnung` varchar(24) NOT NULL,
  PRIMARY KEY (`V_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `Vorgangsarten`
--

INSERT INTO `Vorgangsarten` (`V_ID`, `V_Bezeichnung`) VALUES
(0, 'Eingebaut'),
(1, 'Eingebaut');

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
-- Constraints der Tabelle `Komponente_Komponentenattribute`
--
ALTER TABLE `Komponente_Komponentenattribute`
  ADD CONSTRAINT `fk_kka_kaid` FOREIGN KEY (`K_Attr_ID`) REFERENCES `Komponentenattribute` (`K_Attr_ID`),
  ADD CONSTRAINT `fk_kka_kid` FOREIGN KEY (`K_ID`) REFERENCES `Komponente` (`K_ID`);

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
