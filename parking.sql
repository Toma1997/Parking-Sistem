/*
Navicat MySQL Data Transfer

Source Server         : toma
Source Server Version : 50557
Source Host           : localhost:3306
Source Database       : parking

Target Server Type    : MYSQL
Target Server Version : 50557
File Encoding         : 65001

Date: 2018-10-18 11:41:07
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for korisnici
-- ----------------------------
DROP TABLE IF EXISTS `korisnici`;
CREATE TABLE `korisnici` (
  `korisnikID` int(10) NOT NULL AUTO_INCREMENT,
  `ime` varchar(50) DEFAULT NULL,
  `prezime` varchar(60) DEFAULT NULL,
  `brojTelefona` varchar(20) NOT NULL,
  `email` varchar(60) NOT NULL,
  `brojBankovnogRacuna` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`korisnikID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of korisnici
-- ----------------------------

-- ----------------------------
-- Table structure for parking_mesta
-- ----------------------------
DROP TABLE IF EXISTS `parking_mesta`;
CREATE TABLE `parking_mesta` (
  `mestoID` smallint(4) NOT NULL,
  `sektor` varchar(1) DEFAULT NULL,
  `mesto` varchar(5) DEFAULT NULL,
  `sprat` smallint(2) DEFAULT NULL,
  PRIMARY KEY (`mestoID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of parking_mesta
-- ----------------------------

-- ----------------------------
-- Table structure for termini
-- ----------------------------
DROP TABLE IF EXISTS `termini`;
CREATE TABLE `termini` (
  `terminID` bigint(20) NOT NULL AUTO_INCREMENT,
  `voziloID` bigint(20) NOT NULL,
  `mestoID` smallint(4) NOT NULL,
  `pocetak` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `kraj` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`terminID`),
  KEY `FK_vozilo` (`voziloID`),
  KEY `FK_mesto` (`mestoID`),
  CONSTRAINT `FK_mesto` FOREIGN KEY (`mestoID`) REFERENCES `parking_mesta` (`mestoID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_vozilo` FOREIGN KEY (`voziloID`) REFERENCES `vozila` (`voziloID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of termini
-- ----------------------------

-- ----------------------------
-- Table structure for vozila
-- ----------------------------
DROP TABLE IF EXISTS `vozila`;
CREATE TABLE `vozila` (
  `voziloID` bigint(20) NOT NULL AUTO_INCREMENT,
  `registracija` varchar(25) NOT NULL,
  `korisnikID` int(10) DEFAULT NULL,
  `tip` varchar(255) DEFAULT NULL,
  `marka` varchar(20) DEFAULT NULL,
  `model` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`voziloID`,`registracija`),
  KEY `FK_korisnik` (`korisnikID`),
  KEY `voziloID` (`voziloID`),
  CONSTRAINT `FK_korisnik` FOREIGN KEY (`korisnikID`) REFERENCES `korisnici` (`korisnikID`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of vozila
-- ----------------------------
