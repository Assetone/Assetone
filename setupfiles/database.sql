-- Database

CREATE DATABASE IF NOT EXISTS `assetone` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `assetone`;

CREATE TABLE IF NOT EXISTS `componentrelations` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `cIDbasis` int(11) NOT NULL,
  `cIDbuiltin` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `cIDbuiltin` (`cIDbuiltin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `components` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `ctID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `componenttypes` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;