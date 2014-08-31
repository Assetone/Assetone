-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 31. Aug 2014 um 13:08
-- Server Version: 5.6.20
-- PHP-Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `assetone`
--
CREATE DATABASE IF NOT EXISTS `assetone` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `assetone`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `benutzer`
--

CREATE TABLE IF NOT EXISTS `benutzer` (
`B_ID` int(10) NOT NULL,
  `B_Vorname` varchar(255) NOT NULL,
  `B_Nachname` varchar(255) NOT NULL,
  `B_email` varchar(254) NOT NULL,
  `Bg_ID` int(10) NOT NULL,
  `B_LastLogin` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `B_Resethash` varchar(40) NOT NULL,
  `B_Username` varchar(255) NOT NULL,
  `B_Passwort` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `benutzergruppen`
--

CREATE TABLE IF NOT EXISTS `benutzergruppen` (
`Bg_ID` int(10) NOT NULL,
  `Bg_Bezeichnung` varchar(24) NOT NULL,
  `Zugriff_Benutzerverwaltung` tinyint(1) NOT NULL,
  `Zugriff_Neubeschaffung` tinyint(1) NOT NULL,
  `Zugriff_Stammdatenverwaltung` tinyint(1) NOT NULL,
  `Zugriff_Ausmusterung` tinyint(1) NOT NULL,
  `Zugriff_Wartung` tinyint(1) NOT NULL,
  `Zugriff_Bestellung` tinyint(1) NOT NULL,
  `Zugriff_Reporting` tinyint(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bestellung`
--

CREATE TABLE IF NOT EXISTS `bestellung` (
  `K_ID` int(10) NOT NULL,
  `Bst_Nr` int(10) NOT NULL,
  `Bst_PostenNr` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `komponente`
--

CREATE TABLE IF NOT EXISTS `komponente` (
`K_ID` int(10) NOT NULL,
  `K_Art` int(10) NOT NULL,
  `K_Name` varchar(24) NOT NULL,
  `L_ID` int(10) NOT NULL,
  `R_ID` int(10) NOT NULL,
  `K_Einkaufsdatum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `K_Hersteller` varchar(24) NOT NULL,
  `K_Gewaehrleistung` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2027 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `komponente_komponentenattribute`
--

CREATE TABLE IF NOT EXISTS `komponente_komponentenattribute` (
`K_K_Attr_ID` int(10) NOT NULL,
  `K_ID` int(10) NOT NULL,
  `K_Attr_ID` int(10) NOT NULL,
  `Wert` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `komponentenart_attribut`
--

CREATE TABLE IF NOT EXISTS `komponentenart_attribut` (
`K_Art_Attr_ID` int(10) NOT NULL,
  `K_Attr_ID` int(10) NOT NULL,
  `K_Art_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `komponentenarten`
--

CREATE TABLE IF NOT EXISTS `komponentenarten` (
`K_Art_ID` int(10) NOT NULL,
  `K_Art_Bezeichnung` varchar(24) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `komponentenattribute`
--

CREATE TABLE IF NOT EXISTS `komponentenattribute` (
  `K_Attr_ID` int(10) NOT NULL,
  `K_Attr_Bezeichnung` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `komponentenattribute_zulaessigewerte`
--

CREATE TABLE IF NOT EXISTS `komponentenattribute_zulaessigewerte` (
`K_Attr_ZW_ID` int(10) NOT NULL,
  `K_Attr_ID` int(10) NOT NULL,
  `K_ZW_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `komponentennotizen`
--

CREATE TABLE IF NOT EXISTS `komponentennotizen` (
  `K_ID` int(10) NOT NULL,
  `KN_Wert` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `lieferant`
--

CREATE TABLE IF NOT EXISTS `lieferant` (
`L_ID` int(10) NOT NULL,
  `L_Name` varchar(255) NOT NULL,
  `L_Strasse_Nr` varchar(255) NOT NULL,
  `L_Plz` varchar(10) NOT NULL,
  `L_Ort` varchar(255) NOT NULL,
  `L_Telefon` varchar(255) DEFAULT NULL,
  `L_Fax` varchar(255) DEFAULT NULL,
  `L_Mail` varchar(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `raum`
--

CREATE TABLE IF NOT EXISTS `raum` (
`R_ID` int(10) NOT NULL,
  `R_Bezeichnung` varchar(24) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `raumnotizen`
--

CREATE TABLE IF NOT EXISTS `raumnotizen` (
  `R_ID` int(10) NOT NULL,
  `RN_Wert` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `subkomponenten`
--

CREATE TABLE IF NOT EXISTS `subkomponenten` (
  `SK_ID` int(10) NOT NULL,
  `Sub_Nr` int(10) NOT NULL,
  `Root_Nr` int(10) NOT NULL,
  `V_ID` int(10) NOT NULL,
  `V_Datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `vorgangsarten`
--

CREATE TABLE IF NOT EXISTS `vorgangsarten` (
  `V_ID` int(10) NOT NULL,
  `V_Bezeichnung` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `zulaessigewerte`
--

CREATE TABLE IF NOT EXISTS `zulaessigewerte` (
  `K_ZW_ID` int(10) NOT NULL,
  `K_ZW_Wert` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `benutzer`
--
ALTER TABLE `benutzer`
 ADD PRIMARY KEY (`B_ID`), ADD KEY `fk_b_bgid` (`Bg_ID`);

--
-- Indexes for table `benutzergruppen`
--
ALTER TABLE `benutzergruppen`
 ADD PRIMARY KEY (`Bg_ID`);

--
-- Indexes for table `bestellung`
--
ALTER TABLE `bestellung`
 ADD PRIMARY KEY (`K_ID`);

--
-- Indexes for table `komponente`
--
ALTER TABLE `komponente`
 ADD PRIMARY KEY (`K_ID`), ADD KEY `fk_k_Lid` (`L_ID`), ADD KEY `fk_k_Rid` (`R_ID`), ADD KEY `fk_k_Kart` (`K_Art`);

--
-- Indexes for table `komponente_komponentenattribute`
--
ALTER TABLE `komponente_komponentenattribute`
 ADD PRIMARY KEY (`K_K_Attr_ID`), ADD KEY `fk_kka_kid` (`K_ID`), ADD KEY `fk_kka_kaid` (`K_Attr_ID`);

--
-- Indexes for table `komponentenart_attribut`
--
ALTER TABLE `komponentenart_attribut`
 ADD PRIMARY KEY (`K_Art_Attr_ID`), ADD KEY `fk_kaa_katid` (`K_Attr_ID`), ADD KEY `fk_kaa_karid` (`K_Art_ID`);

--
-- Indexes for table `komponentenarten`
--
ALTER TABLE `komponentenarten`
 ADD PRIMARY KEY (`K_Art_ID`);

--
-- Indexes for table `komponentenattribute`
--
ALTER TABLE `komponentenattribute`
 ADD PRIMARY KEY (`K_Attr_ID`);

--
-- Indexes for table `komponentenattribute_zulaessigewerte`
--
ALTER TABLE `komponentenattribute_zulaessigewerte`
 ADD PRIMARY KEY (`K_Attr_ZW_ID`), ADD KEY `fk_kazw_katid` (`K_Attr_ID`), ADD KEY `fk_kazw_kzwid` (`K_ZW_ID`);

--
-- Indexes for table `komponentennotizen`
--
ALTER TABLE `komponentennotizen`
 ADD PRIMARY KEY (`K_ID`);

--
-- Indexes for table `lieferant`
--
ALTER TABLE `lieferant`
 ADD PRIMARY KEY (`L_ID`);

--
-- Indexes for table `raum`
--
ALTER TABLE `raum`
 ADD PRIMARY KEY (`R_ID`);

--
-- Indexes for table `raumnotizen`
--
ALTER TABLE `raumnotizen`
 ADD PRIMARY KEY (`R_ID`);

--
-- Indexes for table `subkomponenten`
--
ALTER TABLE `subkomponenten`
 ADD PRIMARY KEY (`SK_ID`), ADD KEY `fk_sk_Subnr` (`Sub_Nr`), ADD KEY `fk_sk_Rootnr` (`Root_Nr`), ADD KEY `fk_sk_Vid` (`V_ID`);

--
-- Indexes for table `vorgangsarten`
--
ALTER TABLE `vorgangsarten`
 ADD PRIMARY KEY (`V_ID`);

--
-- Indexes for table `zulaessigewerte`
--
ALTER TABLE `zulaessigewerte`
 ADD PRIMARY KEY (`K_ZW_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `benutzer`
--
ALTER TABLE `benutzer`
MODIFY `B_ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `benutzergruppen`
--
ALTER TABLE `benutzergruppen`
MODIFY `Bg_ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `komponente`
--
ALTER TABLE `komponente`
MODIFY `K_ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2027;
--
-- AUTO_INCREMENT for table `komponente_komponentenattribute`
--
ALTER TABLE `komponente_komponentenattribute`
MODIFY `K_K_Attr_ID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `komponentenart_attribut`
--
ALTER TABLE `komponentenart_attribut`
MODIFY `K_Art_Attr_ID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `komponentenarten`
--
ALTER TABLE `komponentenarten`
MODIFY `K_Art_ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `komponentenattribute_zulaessigewerte`
--
ALTER TABLE `komponentenattribute_zulaessigewerte`
MODIFY `K_Attr_ZW_ID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lieferant`
--
ALTER TABLE `lieferant`
MODIFY `L_ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `raum`
--
ALTER TABLE `raum`
MODIFY `R_ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `benutzer`
--
ALTER TABLE `benutzer`
ADD CONSTRAINT `fk_b_bgid` FOREIGN KEY (`Bg_ID`) REFERENCES `benutzergruppen` (`Bg_ID`);

--
-- Constraints der Tabelle `bestellung`
--
ALTER TABLE `bestellung`
ADD CONSTRAINT `fk_bst_Kid` FOREIGN KEY (`K_ID`) REFERENCES `komponente` (`K_ID`);

--
-- Constraints der Tabelle `komponente`
--
ALTER TABLE `komponente`
ADD CONSTRAINT `fk_k_Kart` FOREIGN KEY (`K_Art`) REFERENCES `komponentenarten` (`K_Art_ID`),
ADD CONSTRAINT `fk_k_Lid` FOREIGN KEY (`L_ID`) REFERENCES `lieferant` (`L_ID`),
ADD CONSTRAINT `fk_k_Rid` FOREIGN KEY (`R_ID`) REFERENCES `raum` (`R_ID`);

--
-- Constraints der Tabelle `komponente_komponentenattribute`
--
ALTER TABLE `komponente_komponentenattribute`
ADD CONSTRAINT `fk_kka_kaid` FOREIGN KEY (`K_Attr_ID`) REFERENCES `komponentenattribute` (`K_Attr_ID`),
ADD CONSTRAINT `fk_kka_kid` FOREIGN KEY (`K_ID`) REFERENCES `komponente` (`K_ID`);

--
-- Constraints der Tabelle `komponentenart_attribut`
--
ALTER TABLE `komponentenart_attribut`
ADD CONSTRAINT `fk_kaa_karid` FOREIGN KEY (`K_Art_ID`) REFERENCES `komponentenarten` (`K_Art_ID`),
ADD CONSTRAINT `fk_kaa_katid` FOREIGN KEY (`K_Attr_ID`) REFERENCES `komponentenattribute` (`K_Attr_ID`);

--
-- Constraints der Tabelle `komponentenattribute_zulaessigewerte`
--
ALTER TABLE `komponentenattribute_zulaessigewerte`
ADD CONSTRAINT `fk_kazw_katid` FOREIGN KEY (`K_Attr_ID`) REFERENCES `komponentenattribute` (`K_Attr_ID`),
ADD CONSTRAINT `fk_kazw_kzwid` FOREIGN KEY (`K_ZW_ID`) REFERENCES `zulaessigewerte` (`K_ZW_ID`);

--
-- Constraints der Tabelle `komponentennotizen`
--
ALTER TABLE `komponentennotizen`
ADD CONSTRAINT `fk_kn_Kid` FOREIGN KEY (`K_ID`) REFERENCES `komponente` (`K_ID`);

--
-- Constraints der Tabelle `raumnotizen`
--
ALTER TABLE `raumnotizen`
ADD CONSTRAINT `fk_rn_Kid` FOREIGN KEY (`R_ID`) REFERENCES `raum` (`R_ID`);

--
-- Constraints der Tabelle `subkomponenten`
--
ALTER TABLE `subkomponenten`
ADD CONSTRAINT `fk_sk_Rootnr` FOREIGN KEY (`Root_Nr`) REFERENCES `komponente` (`K_ID`),
ADD CONSTRAINT `fk_sk_Subnr` FOREIGN KEY (`Sub_Nr`) REFERENCES `komponente` (`K_ID`),
ADD CONSTRAINT `fk_sk_Vid` FOREIGN KEY (`V_ID`) REFERENCES `vorgangsarten` (`V_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
