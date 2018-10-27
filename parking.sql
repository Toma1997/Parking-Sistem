/*
Navicat MySQL Data Transfer

Source Server         : toma
Source Server Version : 50557
Source Host           : localhost:3306
Source Database       : parking

Target Server Type    : MYSQL
Target Server Version : 50557
File Encoding         : 65001

Date: 2018-10-26 23:58:38
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for appointments
-- ----------------------------
DROP TABLE IF EXISTS `appointments`;
CREATE TABLE `appointments` (
  `appointment_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `car_id` bigint(20) NOT NULL,
  `place_id` smallint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `finished_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`appointment_id`),
  KEY `FK_car` (`car_id`),
  KEY `FK_place` (`place_id`),
  CONSTRAINT `FK_place` FOREIGN KEY (`place_id`) REFERENCES `places` (`place_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_car` FOREIGN KEY (`car_id`) REFERENCES `cars` (`car_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of appointments
-- ----------------------------

-- ----------------------------
-- Table structure for cars
-- ----------------------------
DROP TABLE IF EXISTS `cars`;
CREATE TABLE `cars` (
  `car_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `registration` varchar(25) NOT NULL,
  `client_id` int(10) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `brand` varchar(20) DEFAULT NULL,
  `model` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`car_id`,`registration`),
  KEY `FK_korisnik` (`client_id`),
  KEY `car_id` (`car_id`),
  CONSTRAINT `FK_korisnik` FOREIGN KEY (`client_id`) REFERENCES `clients` (`client_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cars
-- ----------------------------

-- ----------------------------
-- Table structure for clients
-- ----------------------------
DROP TABLE IF EXISTS `clients`;
CREATE TABLE `clients` (
  `client_id` int(10) NOT NULL AUTO_INCREMENT,
  `forname` varchar(50) DEFAULT NULL,
  `surname` varchar(60) DEFAULT NULL,
  `telephone` varchar(20) NOT NULL,
  `email` varchar(60) NOT NULL,
  `bank_account` varchar(60) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of clients
-- ----------------------------

-- ----------------------------
-- Table structure for places
-- ----------------------------
DROP TABLE IF EXISTS `places`;
CREATE TABLE `places` (
  `place_id` smallint(4) NOT NULL,
  `sector` varchar(1) DEFAULT NULL,
  `place` varchar(5) DEFAULT NULL,
  `floor` smallint(2) DEFAULT NULL,
  PRIMARY KEY (`place_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of places
-- ----------------------------
