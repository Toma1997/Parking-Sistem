/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50719
Source Host           : localhost:3306
Source Database       : parking

Target Server Type    : MYSQL
Target Server Version : 50719
File Encoding         : 65001

Date: 2018-10-29 12:24:00
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for clients
-- ----------------------------
DROP TABLE IF EXISTS `clients`;
CREATE TABLE `clients` (
  `client_id` int(10) NOT NULL AUTO_INCREMENT,
  `client_type` set('business','individual') DEFAULT '',
  `forename` varchar(50) DEFAULT NULL,
  `surname` varchar(60) DEFAULT NULL,
  `telephone` varchar(20) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of clients
-- ----------------------------

-- ----------------------------
-- Table structure for cars
-- ----------------------------
DROP TABLE IF EXISTS `cars`;
CREATE TABLE `cars` (
  `car_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `registration` varchar(25) NOT NULL,
  `client_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`car_id`,`registration`),
  KEY `FK_client` (`client_id`),
  KEY `car_id` (`car_id`),
  CONSTRAINT `FK_client` FOREIGN KEY (`client_id`) REFERENCES `clients` (`client_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cars
-- ----------------------------

-- ----------------------------
-- Table structure for places
-- ----------------------------
DROP TABLE IF EXISTS `places`;
CREATE TABLE `places` (
  `place_id` smallint(4) NOT NULL,
  `sector` varchar(4) DEFAULT NULL,
  `place` varchar(5) DEFAULT NULL,
  `floor` smallint(2) DEFAULT NULL,
  PRIMARY KEY (`place_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  CONSTRAINT `FK_car` FOREIGN KEY (`car_id`) REFERENCES `cars` (`car_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_place` FOREIGN KEY (`place_id`) REFERENCES `places` (`place_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of appointments
-- ----------------------------

-- ----------------------------
-- Records of places
-- ----------------------------
INSERT INTO `places` VALUES ('1', 'A1', '01', '0');
INSERT INTO `places` VALUES ('2', 'A1', '02', '0');
INSERT INTO `places` VALUES ('3', 'A1', '03', '0');
INSERT INTO `places` VALUES ('4', 'A1', '04', '0');
INSERT INTO `places` VALUES ('5', 'A1', '05', '0');
INSERT INTO `places` VALUES ('6', 'A1', '06', '0');
INSERT INTO `places` VALUES ('7', 'A1', '07', '0');
INSERT INTO `places` VALUES ('8', 'A1', '08', '0');
INSERT INTO `places` VALUES ('9', 'A1', '09', '0');
INSERT INTO `places` VALUES ('10', 'A1', '10', '0');
INSERT INTO `places` VALUES ('11', 'A1', '11', '0');
INSERT INTO `places` VALUES ('12', 'A1', '12', '0');
INSERT INTO `places` VALUES ('13', 'A1', '13', '0');
INSERT INTO `places` VALUES ('14', 'A1', '14', '0');
INSERT INTO `places` VALUES ('15', 'A1', '15', '0');
INSERT INTO `places` VALUES ('16', 'A2', '01', '0');
INSERT INTO `places` VALUES ('17', 'A2', '02', '0');
INSERT INTO `places` VALUES ('18', 'A2', '03', '0');
INSERT INTO `places` VALUES ('19', 'A2', '04', '0');
INSERT INTO `places` VALUES ('20', 'A2', '05', '0');
INSERT INTO `places` VALUES ('21', 'A2', '06', '0');
INSERT INTO `places` VALUES ('22', 'A2', '07', '0');
INSERT INTO `places` VALUES ('23', 'A2', '08', '0');
INSERT INTO `places` VALUES ('24', 'A2', '09', '0');
INSERT INTO `places` VALUES ('25', 'A2', '10', '0');
INSERT INTO `places` VALUES ('26', 'A2', '11', '0');
INSERT INTO `places` VALUES ('27', 'A2', '12', '0');
INSERT INTO `places` VALUES ('28', 'A2', '13', '0');
INSERT INTO `places` VALUES ('29', 'A2', '14', '0');
INSERT INTO `places` VALUES ('30', 'A2', '15', '0');
