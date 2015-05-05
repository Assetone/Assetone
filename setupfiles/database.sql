SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";
CREATE DATABASE IF NOT EXISTS `assetone` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `assetone`;

CREATE TABLE IF NOT EXISTS `componentrelations` (
  `ID` int(11) NOT NULL,
  `cIDbasis` int(11) NOT NULL,
  `cIDbuiltin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `components` (
  `ID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `ctID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `componenttypes` (
  `ID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `componentrelations`
  ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `cIDbasis_builtin` (`cIDbasis`,`cIDbuiltin`), ADD KEY `cIDbuiltin` (`cIDbuiltin`);

ALTER TABLE `components`
  ADD PRIMARY KEY (`ID`), ADD KEY `ctID` (`ctID`);

ALTER TABLE `componenttypes`
  ADD PRIMARY KEY (`ID`);


ALTER TABLE `componentrelations`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `components`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `componenttypes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `componentrelations`
ADD CONSTRAINT `componentrelations_ibfk_2` FOREIGN KEY (`cIDbuiltin`) REFERENCES `components` (`ID`),
ADD CONSTRAINT `componentrelations_ibfk_1` FOREIGN KEY (`cIDbasis`) REFERENCES `components` (`ID`);

ALTER TABLE `components`
ADD CONSTRAINT `components_ibfk_1` FOREIGN KEY (`ctID`) REFERENCES `componenttypes` (`ID`);
COMMIT;
