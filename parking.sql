/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50719
Source Host           : localhost:3306
Source Database       : parking

Target Server Type    : MYSQL
Target Server Version : 50719
File Encoding         : 65001

Date: 2018-11-03 19:43:57
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
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `finished_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`appointment_id`),
  KEY `FK_car` (`car_id`),
  KEY `FK_place` (`place_id`),
  CONSTRAINT `FK_car` FOREIGN KEY (`car_id`) REFERENCES `cars` (`car_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_place` FOREIGN KEY (`place_id`) REFERENCES `places` (`place_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of appointments
-- ----------------------------
INSERT INTO `appointments` VALUES ('1', '1', '1', '2018-11-03 19:42:06', null);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cars
-- ----------------------------
INSERT INTO `cars` VALUES ('1', 'BG-4345-XYZ', '1');

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
  `admin` set('1','0') NOT NULL DEFAULT '0',
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of clients
-- ----------------------------
INSERT INTO `clients` VALUES ('1', '', 'Toma', 'Joksimovic', '063-334-774', 'toma.joksimovic@gmail.com', '0906fabb6dba5f470b1d4b164c1ccb446dc34835', '1');
INSERT INTO `clients` VALUES ('2', 'individual', 'Toma', 'Joksimovic', '065-444-4444', 'toma.joksimovic.16@singimail.rs', '96097cf9f0b217d3a40cccdf99bdcb66cc3d5527', '0');
INSERT INTO `clients` VALUES ('3', 'business', 'Marko', 'Milic', '064-343-8787', 'marko.milic.16@singimail.rs', 'fa3857be654c221036046ba96db813e18fcae333', '0');
INSERT INTO `clients` VALUES ('4', 'business', 'Aleksa', 'Stojkovic', '062-333-000', 'aleksa.stojkovic@gmail.rs', '235f87d4289596316676058867f865574e93cf24', '0');

-- ----------------------------
-- Table structure for places
-- ----------------------------
DROP TABLE IF EXISTS `places`;
CREATE TABLE `places` (
  `place_id` smallint(4) NOT NULL AUTO_INCREMENT,
  `sector` varchar(4) DEFAULT NULL,
  `place` varchar(5) DEFAULT NULL,
  `floor` smallint(2) DEFAULT NULL,
  `occupied` set('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`place_id`)
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of places
-- ----------------------------
INSERT INTO `places` VALUES ('1', 'A1', '3', '0', '0');
INSERT INTO `places` VALUES ('2', 'A1', '4', '0', '0');
INSERT INTO `places` VALUES ('3', 'A1', '5', '0', '0');
INSERT INTO `places` VALUES ('4', 'A1', '6', '0', '0');
INSERT INTO `places` VALUES ('5', 'A1', '7', '0', '0');
INSERT INTO `places` VALUES ('6', 'A1', '8', '0', '0');
INSERT INTO `places` VALUES ('7', 'A1', '9', '0', '0');
INSERT INTO `places` VALUES ('8', 'A1', '10', '0', '0');
INSERT INTO `places` VALUES ('9', 'A1', '11', '0', '0');
INSERT INTO `places` VALUES ('10', 'A2', '12', '0', '1');
INSERT INTO `places` VALUES ('11', 'A3', '1', '0', '0');
INSERT INTO `places` VALUES ('12', 'A3', '2', '0', '0');
INSERT INTO `places` VALUES ('13', 'A3', '3', '0', '0');
INSERT INTO `places` VALUES ('14', 'A3', '4', '0', '0');
INSERT INTO `places` VALUES ('15', 'A3', '5', '0', '0');
INSERT INTO `places` VALUES ('16', 'A3', '6', '0', '0');
INSERT INTO `places` VALUES ('17', 'A3', '7', '0', '0');
INSERT INTO `places` VALUES ('18', 'A3', '8', '0', '0');
INSERT INTO `places` VALUES ('19', 'A3', '9', '0', '0');
INSERT INTO `places` VALUES ('20', 'A3', '10', '0', '0');
INSERT INTO `places` VALUES ('21', 'A3', '11', '0', '0');
INSERT INTO `places` VALUES ('22', 'A3', '12', '0', '0');
INSERT INTO `places` VALUES ('23', 'A4', '1', '0', '0');
INSERT INTO `places` VALUES ('24', 'A4', '2', '0', '0');
INSERT INTO `places` VALUES ('25', 'A4', '3', '0', '0');
INSERT INTO `places` VALUES ('26', 'A4', '4', '0', '0');
INSERT INTO `places` VALUES ('27', 'A4', '5', '0', '0');
INSERT INTO `places` VALUES ('28', 'A4', '6', '0', '0');
INSERT INTO `places` VALUES ('29', 'A4', '7', '0', '0');
INSERT INTO `places` VALUES ('30', 'A4', '8', '0', '0');
INSERT INTO `places` VALUES ('31', 'A4', '9', '0', '0');
INSERT INTO `places` VALUES ('32', 'A4', '10', '0', '0');
INSERT INTO `places` VALUES ('33', 'A4', '11', '0', '0');
INSERT INTO `places` VALUES ('34', 'A4', '12', '0', '0');
INSERT INTO `places` VALUES ('35', 'A5', '1', '0', '0');
INSERT INTO `places` VALUES ('36', 'A5', '12', '0', '0');
INSERT INTO `places` VALUES ('37', 'A6', '1', '0', '0');
INSERT INTO `places` VALUES ('38', 'A6', '2', '0', '0');
INSERT INTO `places` VALUES ('39', 'A6', '3', '0', '0');
INSERT INTO `places` VALUES ('40', 'A6', '4', '0', '0');
INSERT INTO `places` VALUES ('41', 'A6', '5', '0', '0');
INSERT INTO `places` VALUES ('42', 'A6', '6', '0', '0');
INSERT INTO `places` VALUES ('43', 'A6', '7', '0', '0');
INSERT INTO `places` VALUES ('44', 'A6', '8', '0', '0');
INSERT INTO `places` VALUES ('45', 'A6', '9', '0', '0');
INSERT INTO `places` VALUES ('46', 'A6', '10', '0', '0');
INSERT INTO `places` VALUES ('47', 'A6', '11', '0', '0');
INSERT INTO `places` VALUES ('48', 'A6', '12', '0', '0');
INSERT INTO `places` VALUES ('49', 'A7', '1', '0', '0');
INSERT INTO `places` VALUES ('50', 'A7', '2', '0', '0');
INSERT INTO `places` VALUES ('51', 'A7', '3', '0', '0');
INSERT INTO `places` VALUES ('52', 'A7', '4', '0', '0');
INSERT INTO `places` VALUES ('53', 'A7', '5', '0', '0');
INSERT INTO `places` VALUES ('54', 'A7', '6', '0', '0');
INSERT INTO `places` VALUES ('55', 'A7', '7', '0', '0');
INSERT INTO `places` VALUES ('56', 'A7', '8', '0', '0');
INSERT INTO `places` VALUES ('57', 'A7', '9', '0', '0');
INSERT INTO `places` VALUES ('58', 'A7', '10', '0', '0');
INSERT INTO `places` VALUES ('59', 'A7', '11', '0', '0');
INSERT INTO `places` VALUES ('60', 'A7', '12', '0', '0');
INSERT INTO `places` VALUES ('61', 'A8', '1', '0', '0');
INSERT INTO `places` VALUES ('62', 'A8', '12', '0', '0');
INSERT INTO `places` VALUES ('63', 'A9', '1', '0', '0');
INSERT INTO `places` VALUES ('64', 'A9', '2', '0', '0');
INSERT INTO `places` VALUES ('65', 'A9', '3', '0', '0');
INSERT INTO `places` VALUES ('66', 'A9', '4', '0', '0');
INSERT INTO `places` VALUES ('67', 'A9', '5', '0', '0');
INSERT INTO `places` VALUES ('68', 'A9', '6', '0', '0');
INSERT INTO `places` VALUES ('69', 'A9', '7', '0', '0');
INSERT INTO `places` VALUES ('70', 'A9', '8', '0', '0');
INSERT INTO `places` VALUES ('71', 'A9', '9', '0', '0');
INSERT INTO `places` VALUES ('72', 'A9', '10', '0', '0');
INSERT INTO `places` VALUES ('73', 'A9', '11', '0', '0');
INSERT INTO `places` VALUES ('74', 'A9', '12', '0', '0');
INSERT INTO `places` VALUES ('75', 'A10', '1', '0', '0');
INSERT INTO `places` VALUES ('76', 'A10', '2', '0', '0');
INSERT INTO `places` VALUES ('77', 'A10', '3', '0', '0');
INSERT INTO `places` VALUES ('78', 'A10', '4', '0', '0');
INSERT INTO `places` VALUES ('79', 'A10', '5', '0', '0');
INSERT INTO `places` VALUES ('80', 'A10', '6', '0', '0');
INSERT INTO `places` VALUES ('81', 'A10', '7', '0', '0');
INSERT INTO `places` VALUES ('82', 'A10', '8', '0', '0');
INSERT INTO `places` VALUES ('83', 'A10', '9', '0', '0');
INSERT INTO `places` VALUES ('84', 'A10', '10', '0', '0');
INSERT INTO `places` VALUES ('85', 'A10', '11', '0', '0');
INSERT INTO `places` VALUES ('86', 'A10', '12', '0', '0');
INSERT INTO `places` VALUES ('87', 'A11', '1', '0', '0');
INSERT INTO `places` VALUES ('88', 'A11', '12', '0', '0');
INSERT INTO `places` VALUES ('89', 'A12', '2', '0', '0');
INSERT INTO `places` VALUES ('90', 'A12', '3', '0', '0');
INSERT INTO `places` VALUES ('91', 'A12', '4', '0', '0');
INSERT INTO `places` VALUES ('92', 'A12', '5', '0', '0');
INSERT INTO `places` VALUES ('93', 'A12', '6', '0', '0');
INSERT INTO `places` VALUES ('94', 'A12', '7', '0', '0');
INSERT INTO `places` VALUES ('95', 'A12', '8', '0', '0');
INSERT INTO `places` VALUES ('96', 'A12', '9', '0', '0');
INSERT INTO `places` VALUES ('97', 'A12', '10', '0', '0');
INSERT INTO `places` VALUES ('98', 'A12', '11', '0', '0');
