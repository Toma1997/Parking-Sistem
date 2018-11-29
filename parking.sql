/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50719
Source Host           : localhost:3306
Source Database       : parking

Target Server Type    : MYSQL
Target Server Version : 50719
File Encoding         : 65001

Date: 2018-11-29 01:16:48
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
  `created_at` datetime DEFAULT NULL,
  `finished_at` datetime DEFAULT NULL,
  PRIMARY KEY (`appointment_id`),
  KEY `FK_car` (`car_id`),
  KEY `FK_place` (`place_id`),
  CONSTRAINT `FK_car` FOREIGN KEY (`car_id`) REFERENCES `cars` (`car_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_place` FOREIGN KEY (`place_id`) REFERENCES `places` (`place_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of appointments
-- ----------------------------
INSERT INTO `appointments` VALUES ('1', '2', '1', '2018-05-04 12:34:00', null);
INSERT INTO `appointments` VALUES ('2', '1', '14', '2018-11-20 12:34:00', null);
INSERT INTO `appointments` VALUES ('3', '3', '56', '2018-11-22 15:00:00', null);
INSERT INTO `appointments` VALUES ('4', '4', '81', '2018-11-25 18:30:00', null);
INSERT INTO `appointments` VALUES ('5', '1', '80', '2018-11-25 15:30:00', null);
INSERT INTO `appointments` VALUES ('6', '4', '77', '2018-11-24 10:00:00', null);
INSERT INTO `appointments` VALUES ('7', '1', '68', '2018-11-20 12:34:00', null);
INSERT INTO `appointments` VALUES ('8', '5', '28', '2018-11-30 22:00:00', null);
INSERT INTO `appointments` VALUES ('9', '5', '47', '2018-11-29 12:00:00', null);
INSERT INTO `appointments` VALUES ('10', '6', '23', '2018-11-30 11:00:00', null);
INSERT INTO `appointments` VALUES ('11', '6', '96', '2018-12-05 12:20:00', null);
INSERT INTO `appointments` VALUES ('12', '7', '50', '2018-12-20 12:00:00', null);

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cars
-- ----------------------------
INSERT INTO `cars` VALUES ('1', 'NS-234-AF', '3');
INSERT INTO `cars` VALUES ('2', 'BG-123-AB', '4');
INSERT INTO `cars` VALUES ('3', 'BG-123-AD', '4');
INSERT INTO `cars` VALUES ('4', 'BG-3345-EX', '5');
INSERT INTO `cars` VALUES ('5', 'BG-123-XX', '6');
INSERT INTO `cars` VALUES ('6', 'BG-002-AW', '6');
INSERT INTO `cars` VALUES ('7', 'BG-2145-EX', '6');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of clients
-- ----------------------------
INSERT INTO `clients` VALUES ('1', '', 'Toma', 'Joksimovic', '063-334-774', 'toma.joksimovic@gmail.com', '0906fabb6dba5f470b1d4b164c1ccb446dc34835', '1');
INSERT INTO `clients` VALUES ('2', '', 'Marko', 'Milic', '065-123-456', 'marko.milic@gmail.com', 'f4d042530647c37d17e5fb12cb820b1d70d2058c', '1');
INSERT INTO `clients` VALUES ('3', 'individual', 'Darko', 'Darkovic', '065-444-4456', 'darkee23@gmail.com', '961296cda2b003c41402ac203d18102af98c707b', '0');
INSERT INTO `clients` VALUES ('4', 'individual', 'Darko', 'Milic', '065-444-454', 'darkee68@gmail.com', '14ea6174964681cfbea5fe17eaea12d9f9336b52', '0');
INSERT INTO `clients` VALUES ('5', 'business', 'Nikola', 'Pekovic', '063-223-000', 'nikola.pekovic88@gmail.com', 'e38f74699e01e632134346e56b7b7a7f94169c88', '0');
INSERT INTO `clients` VALUES ('6', 'business', 'Aljosa', 'Markovic', '069-254-123', 'aljosa.markovic97@hotmail.com', '58eceed555ad4feced4ddb2db0198df5e094df4f', '0');

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
) ENGINE=InnoDB AUTO_INCREMENT=387 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of places
-- ----------------------------
INSERT INTO `places` VALUES ('1', 'A1', '5', '0', '1');
INSERT INTO `places` VALUES ('2', 'A1', '6', '0', '0');
INSERT INTO `places` VALUES ('3', 'A1', '7', '0', '0');
INSERT INTO `places` VALUES ('4', 'A1', '8', '0', '0');
INSERT INTO `places` VALUES ('5', 'A1', '9', '0', '0');
INSERT INTO `places` VALUES ('6', 'A1', '10', '0', '0');
INSERT INTO `places` VALUES ('7', 'A1', '11', '0', '0');
INSERT INTO `places` VALUES ('8', 'A2', '12', '0', '0');
INSERT INTO `places` VALUES ('9', 'A3', '1', '0', '0');
INSERT INTO `places` VALUES ('10', 'A3', '2', '0', '0');
INSERT INTO `places` VALUES ('11', 'A3', '3', '0', '0');
INSERT INTO `places` VALUES ('12', 'A3', '4', '0', '0');
INSERT INTO `places` VALUES ('13', 'A3', '5', '0', '0');
INSERT INTO `places` VALUES ('14', 'A3', '6', '0', '1');
INSERT INTO `places` VALUES ('15', 'A3', '7', '0', '0');
INSERT INTO `places` VALUES ('16', 'A3', '8', '0', '0');
INSERT INTO `places` VALUES ('17', 'A3', '9', '0', '0');
INSERT INTO `places` VALUES ('18', 'A3', '10', '0', '0');
INSERT INTO `places` VALUES ('19', 'A3', '11', '0', '0');
INSERT INTO `places` VALUES ('20', 'A3', '12', '0', '0');
INSERT INTO `places` VALUES ('21', 'A4', '1', '0', '0');
INSERT INTO `places` VALUES ('22', 'A4', '2', '0', '0');
INSERT INTO `places` VALUES ('23', 'A4', '3', '0', '1');
INSERT INTO `places` VALUES ('24', 'A4', '4', '0', '0');
INSERT INTO `places` VALUES ('25', 'A4', '5', '0', '0');
INSERT INTO `places` VALUES ('26', 'A4', '6', '0', '0');
INSERT INTO `places` VALUES ('27', 'A4', '7', '0', '0');
INSERT INTO `places` VALUES ('28', 'A4', '8', '0', '1');
INSERT INTO `places` VALUES ('29', 'A4', '9', '0', '0');
INSERT INTO `places` VALUES ('30', 'A4', '10', '0', '0');
INSERT INTO `places` VALUES ('31', 'A4', '11', '0', '0');
INSERT INTO `places` VALUES ('32', 'A4', '12', '0', '0');
INSERT INTO `places` VALUES ('33', 'A5', '1', '0', '0');
INSERT INTO `places` VALUES ('34', 'A5', '12', '0', '0');
INSERT INTO `places` VALUES ('35', 'A6', '1', '0', '0');
INSERT INTO `places` VALUES ('36', 'A6', '2', '0', '0');
INSERT INTO `places` VALUES ('37', 'A6', '3', '0', '0');
INSERT INTO `places` VALUES ('38', 'A6', '4', '0', '0');
INSERT INTO `places` VALUES ('39', 'A6', '5', '0', '0');
INSERT INTO `places` VALUES ('40', 'A6', '6', '0', '0');
INSERT INTO `places` VALUES ('41', 'A6', '7', '0', '0');
INSERT INTO `places` VALUES ('42', 'A6', '8', '0', '0');
INSERT INTO `places` VALUES ('43', 'A6', '9', '0', '0');
INSERT INTO `places` VALUES ('44', 'A6', '10', '0', '0');
INSERT INTO `places` VALUES ('45', 'A6', '11', '0', '0');
INSERT INTO `places` VALUES ('46', 'A6', '12', '0', '0');
INSERT INTO `places` VALUES ('47', 'A7', '1', '0', '1');
INSERT INTO `places` VALUES ('48', 'A7', '2', '0', '0');
INSERT INTO `places` VALUES ('49', 'A7', '3', '0', '0');
INSERT INTO `places` VALUES ('50', 'A7', '4', '0', '1');
INSERT INTO `places` VALUES ('51', 'A7', '5', '0', '0');
INSERT INTO `places` VALUES ('52', 'A7', '6', '0', '0');
INSERT INTO `places` VALUES ('53', 'A7', '7', '0', '0');
INSERT INTO `places` VALUES ('54', 'A7', '8', '0', '0');
INSERT INTO `places` VALUES ('55', 'A7', '9', '0', '0');
INSERT INTO `places` VALUES ('56', 'A7', '10', '0', '1');
INSERT INTO `places` VALUES ('57', 'A7', '11', '0', '0');
INSERT INTO `places` VALUES ('58', 'A7', '12', '0', '0');
INSERT INTO `places` VALUES ('59', 'A8', '1', '0', '0');
INSERT INTO `places` VALUES ('60', 'A8', '12', '0', '0');
INSERT INTO `places` VALUES ('61', 'A9', '1', '0', '0');
INSERT INTO `places` VALUES ('62', 'A9', '2', '0', '0');
INSERT INTO `places` VALUES ('63', 'A9', '3', '0', '0');
INSERT INTO `places` VALUES ('64', 'A9', '4', '0', '0');
INSERT INTO `places` VALUES ('65', 'A9', '5', '0', '0');
INSERT INTO `places` VALUES ('66', 'A9', '6', '0', '0');
INSERT INTO `places` VALUES ('67', 'A9', '7', '0', '0');
INSERT INTO `places` VALUES ('68', 'A9', '8', '0', '1');
INSERT INTO `places` VALUES ('69', 'A9', '9', '0', '0');
INSERT INTO `places` VALUES ('70', 'A9', '10', '0', '0');
INSERT INTO `places` VALUES ('71', 'A9', '11', '0', '0');
INSERT INTO `places` VALUES ('72', 'A9', '12', '0', '0');
INSERT INTO `places` VALUES ('73', 'A10', '1', '0', '0');
INSERT INTO `places` VALUES ('74', 'A10', '2', '0', '0');
INSERT INTO `places` VALUES ('75', 'A10', '3', '0', '0');
INSERT INTO `places` VALUES ('76', 'A10', '4', '0', '0');
INSERT INTO `places` VALUES ('77', 'A10', '5', '0', '1');
INSERT INTO `places` VALUES ('78', 'A10', '6', '0', '0');
INSERT INTO `places` VALUES ('79', 'A10', '7', '0', '0');
INSERT INTO `places` VALUES ('80', 'A10', '8', '0', '1');
INSERT INTO `places` VALUES ('81', 'A10', '9', '0', '1');
INSERT INTO `places` VALUES ('82', 'A10', '10', '0', '0');
INSERT INTO `places` VALUES ('83', 'A10', '11', '0', '0');
INSERT INTO `places` VALUES ('84', 'A10', '12', '0', '0');
INSERT INTO `places` VALUES ('85', 'A11', '1', '0', '0');
INSERT INTO `places` VALUES ('86', 'A11', '12', '0', '0');
INSERT INTO `places` VALUES ('87', 'A12', '2', '0', '0');
INSERT INTO `places` VALUES ('88', 'A12', '3', '0', '0');
INSERT INTO `places` VALUES ('89', 'A12', '4', '0', '0');
INSERT INTO `places` VALUES ('90', 'A12', '5', '0', '0');
INSERT INTO `places` VALUES ('91', 'A12', '6', '0', '0');
INSERT INTO `places` VALUES ('92', 'A12', '7', '0', '0');
INSERT INTO `places` VALUES ('93', 'A12', '8', '0', '0');
INSERT INTO `places` VALUES ('94', 'A12', '9', '0', '0');
INSERT INTO `places` VALUES ('95', 'A12', '10', '0', '0');
INSERT INTO `places` VALUES ('96', 'A12', '11', '0', '1');
INSERT INTO `places` VALUES ('97', 'B1', '5', '1', '0');
INSERT INTO `places` VALUES ('98', 'B1', '6', '1', '0');
INSERT INTO `places` VALUES ('99', 'B1', '7', '1', '0');
INSERT INTO `places` VALUES ('100', 'B1', '8', '1', '0');
INSERT INTO `places` VALUES ('101', 'B1', '9', '1', '0');
INSERT INTO `places` VALUES ('102', 'B1', '10', '1', '0');
INSERT INTO `places` VALUES ('103', 'B1', '11', '1', '0');
INSERT INTO `places` VALUES ('104', 'B2', '12', '1', '0');
INSERT INTO `places` VALUES ('105', 'B3', '1', '1', '0');
INSERT INTO `places` VALUES ('106', 'B3', '2', '1', '0');
INSERT INTO `places` VALUES ('107', 'B3', '3', '1', '0');
INSERT INTO `places` VALUES ('108', 'B3', '4', '1', '0');
INSERT INTO `places` VALUES ('109', 'B3', '5', '1', '0');
INSERT INTO `places` VALUES ('110', 'B3', '6', '1', '0');
INSERT INTO `places` VALUES ('111', 'B3', '7', '1', '0');
INSERT INTO `places` VALUES ('112', 'B3', '8', '1', '0');
INSERT INTO `places` VALUES ('113', 'B3', '9', '1', '0');
INSERT INTO `places` VALUES ('114', 'B3', '10', '1', '0');
INSERT INTO `places` VALUES ('115', 'B3', '11', '1', '0');
INSERT INTO `places` VALUES ('116', 'B3', '12', '1', '0');
INSERT INTO `places` VALUES ('117', 'B4', '1', '1', '0');
INSERT INTO `places` VALUES ('118', 'B4', '2', '1', '0');
INSERT INTO `places` VALUES ('119', 'B4', '3', '1', '0');
INSERT INTO `places` VALUES ('120', 'B4', '4', '1', '0');
INSERT INTO `places` VALUES ('121', 'B4', '5', '1', '0');
INSERT INTO `places` VALUES ('122', 'B4', '6', '1', '0');
INSERT INTO `places` VALUES ('123', 'B4', '7', '1', '0');
INSERT INTO `places` VALUES ('124', 'B4', '8', '1', '0');
INSERT INTO `places` VALUES ('125', 'B4', '9', '1', '0');
INSERT INTO `places` VALUES ('126', 'B4', '10', '1', '0');
INSERT INTO `places` VALUES ('127', 'B4', '11', '1', '0');
INSERT INTO `places` VALUES ('128', 'B4', '12', '1', '0');
INSERT INTO `places` VALUES ('129', 'B5', '1', '1', '0');
INSERT INTO `places` VALUES ('130', 'B5', '12', '1', '0');
INSERT INTO `places` VALUES ('131', 'B6', '1', '1', '0');
INSERT INTO `places` VALUES ('132', 'B6', '2', '1', '0');
INSERT INTO `places` VALUES ('133', 'B6', '3', '1', '0');
INSERT INTO `places` VALUES ('134', 'B6', '4', '1', '0');
INSERT INTO `places` VALUES ('135', 'B6', '5', '1', '0');
INSERT INTO `places` VALUES ('136', 'B6', '6', '1', '0');
INSERT INTO `places` VALUES ('137', 'B6', '7', '1', '0');
INSERT INTO `places` VALUES ('138', 'B6', '8', '1', '0');
INSERT INTO `places` VALUES ('139', 'B6', '9', '1', '0');
INSERT INTO `places` VALUES ('140', 'B6', '10', '1', '0');
INSERT INTO `places` VALUES ('141', 'B6', '11', '1', '0');
INSERT INTO `places` VALUES ('142', 'B6', '12', '1', '0');
INSERT INTO `places` VALUES ('143', 'B7', '1', '1', '0');
INSERT INTO `places` VALUES ('144', 'B7', '2', '1', '0');
INSERT INTO `places` VALUES ('145', 'B7', '3', '1', '0');
INSERT INTO `places` VALUES ('146', 'B7', '4', '1', '0');
INSERT INTO `places` VALUES ('147', 'B7', '5', '1', '0');
INSERT INTO `places` VALUES ('148', 'B7', '6', '1', '0');
INSERT INTO `places` VALUES ('149', 'B7', '7', '1', '0');
INSERT INTO `places` VALUES ('150', 'B7', '8', '1', '0');
INSERT INTO `places` VALUES ('151', 'B7', '9', '1', '0');
INSERT INTO `places` VALUES ('152', 'B7', '10', '1', '0');
INSERT INTO `places` VALUES ('153', 'B7', '11', '1', '0');
INSERT INTO `places` VALUES ('154', 'B7', '12', '1', '0');
INSERT INTO `places` VALUES ('155', 'B8', '1', '1', '0');
INSERT INTO `places` VALUES ('156', 'B8', '12', '1', '0');
INSERT INTO `places` VALUES ('157', 'B9', '1', '1', '0');
INSERT INTO `places` VALUES ('158', 'B9', '2', '1', '0');
INSERT INTO `places` VALUES ('159', 'B9', '3', '1', '0');
INSERT INTO `places` VALUES ('160', 'B9', '4', '1', '0');
INSERT INTO `places` VALUES ('161', 'B9', '5', '1', '0');
INSERT INTO `places` VALUES ('162', 'B9', '6', '1', '0');
INSERT INTO `places` VALUES ('163', 'B9', '7', '1', '0');
INSERT INTO `places` VALUES ('164', 'B9', '8', '1', '0');
INSERT INTO `places` VALUES ('165', 'B9', '9', '1', '0');
INSERT INTO `places` VALUES ('166', 'B9', '10', '1', '0');
INSERT INTO `places` VALUES ('167', 'B9', '11', '1', '0');
INSERT INTO `places` VALUES ('168', 'B9', '12', '1', '0');
INSERT INTO `places` VALUES ('169', 'B10', '1', '1', '0');
INSERT INTO `places` VALUES ('170', 'B10', '2', '1', '0');
INSERT INTO `places` VALUES ('171', 'B10', '3', '1', '0');
INSERT INTO `places` VALUES ('172', 'B10', '4', '1', '0');
INSERT INTO `places` VALUES ('173', 'B10', '5', '1', '0');
INSERT INTO `places` VALUES ('174', 'B10', '6', '1', '0');
INSERT INTO `places` VALUES ('175', 'B10', '7', '1', '0');
INSERT INTO `places` VALUES ('176', 'B10', '8', '1', '0');
INSERT INTO `places` VALUES ('177', 'B10', '9', '1', '0');
INSERT INTO `places` VALUES ('178', 'B10', '10', '1', '0');
INSERT INTO `places` VALUES ('179', 'B10', '11', '1', '0');
INSERT INTO `places` VALUES ('180', 'B10', '12', '1', '0');
INSERT INTO `places` VALUES ('181', 'B11', '1', '1', '0');
INSERT INTO `places` VALUES ('182', 'B11', '12', '1', '0');
INSERT INTO `places` VALUES ('183', 'B12', '2', '1', '0');
INSERT INTO `places` VALUES ('184', 'B12', '3', '1', '0');
INSERT INTO `places` VALUES ('185', 'B12', '4', '1', '0');
INSERT INTO `places` VALUES ('186', 'B12', '5', '1', '0');
INSERT INTO `places` VALUES ('187', 'B12', '6', '1', '0');
INSERT INTO `places` VALUES ('188', 'B12', '7', '1', '0');
INSERT INTO `places` VALUES ('189', 'B12', '8', '1', '0');
INSERT INTO `places` VALUES ('190', 'B12', '9', '1', '0');
INSERT INTO `places` VALUES ('191', 'B12', '10', '1', '0');
INSERT INTO `places` VALUES ('192', 'B12', '11', '1', '0');
INSERT INTO `places` VALUES ('193', 'C1', '5', '2', '0');
INSERT INTO `places` VALUES ('194', 'C1', '6', '2', '0');
INSERT INTO `places` VALUES ('195', 'C1', '7', '2', '0');
INSERT INTO `places` VALUES ('196', 'C1', '8', '2', '0');
INSERT INTO `places` VALUES ('197', 'C1', '9', '2', '0');
INSERT INTO `places` VALUES ('198', 'C1', '10', '2', '0');
INSERT INTO `places` VALUES ('199', 'C1', '11', '2', '0');
INSERT INTO `places` VALUES ('200', 'C2', '12', '2', '0');
INSERT INTO `places` VALUES ('201', 'C3', '1', '2', '0');
INSERT INTO `places` VALUES ('202', 'C3', '2', '2', '0');
INSERT INTO `places` VALUES ('203', 'C3', '3', '2', '0');
INSERT INTO `places` VALUES ('204', 'C3', '4', '2', '0');
INSERT INTO `places` VALUES ('205', 'C3', '5', '2', '0');
INSERT INTO `places` VALUES ('206', 'C3', '6', '2', '0');
INSERT INTO `places` VALUES ('207', 'C3', '7', '2', '0');
INSERT INTO `places` VALUES ('208', 'C3', '8', '2', '0');
INSERT INTO `places` VALUES ('209', 'C3', '9', '2', '0');
INSERT INTO `places` VALUES ('210', 'C3', '10', '2', '0');
INSERT INTO `places` VALUES ('211', 'C3', '11', '2', '0');
INSERT INTO `places` VALUES ('212', 'C3', '12', '2', '0');
INSERT INTO `places` VALUES ('213', 'C4', '1', '2', '0');
INSERT INTO `places` VALUES ('214', 'C4', '2', '2', '0');
INSERT INTO `places` VALUES ('215', 'C4', '3', '2', '0');
INSERT INTO `places` VALUES ('216', 'C4', '4', '2', '0');
INSERT INTO `places` VALUES ('217', 'C4', '5', '2', '0');
INSERT INTO `places` VALUES ('218', 'C4', '6', '2', '0');
INSERT INTO `places` VALUES ('219', 'C4', '7', '2', '0');
INSERT INTO `places` VALUES ('220', 'C4', '8', '2', '0');
INSERT INTO `places` VALUES ('221', 'C4', '9', '2', '0');
INSERT INTO `places` VALUES ('222', 'C4', '10', '2', '0');
INSERT INTO `places` VALUES ('223', 'C4', '11', '2', '0');
INSERT INTO `places` VALUES ('224', 'C4', '12', '2', '0');
INSERT INTO `places` VALUES ('225', 'C5', '1', '2', '0');
INSERT INTO `places` VALUES ('226', 'C5', '12', '2', '0');
INSERT INTO `places` VALUES ('227', 'C6', '1', '2', '0');
INSERT INTO `places` VALUES ('228', 'C6', '2', '2', '0');
INSERT INTO `places` VALUES ('229', 'C6', '3', '2', '0');
INSERT INTO `places` VALUES ('230', 'C6', '4', '2', '0');
INSERT INTO `places` VALUES ('231', 'C6', '5', '2', '0');
INSERT INTO `places` VALUES ('232', 'C6', '6', '2', '0');
INSERT INTO `places` VALUES ('233', 'C6', '7', '2', '0');
INSERT INTO `places` VALUES ('234', 'C6', '8', '2', '0');
INSERT INTO `places` VALUES ('235', 'C6', '9', '2', '0');
INSERT INTO `places` VALUES ('236', 'C6', '10', '2', '0');
INSERT INTO `places` VALUES ('237', 'C6', '11', '2', '0');
INSERT INTO `places` VALUES ('238', 'C6', '12', '2', '0');
INSERT INTO `places` VALUES ('239', 'C7', '1', '2', '0');
INSERT INTO `places` VALUES ('240', 'C7', '2', '2', '0');
INSERT INTO `places` VALUES ('241', 'C7', '3', '2', '0');
INSERT INTO `places` VALUES ('242', 'C7', '4', '2', '0');
INSERT INTO `places` VALUES ('243', 'C7', '5', '2', '0');
INSERT INTO `places` VALUES ('244', 'C7', '6', '2', '0');
INSERT INTO `places` VALUES ('245', 'C7', '7', '2', '0');
INSERT INTO `places` VALUES ('246', 'C7', '8', '2', '0');
INSERT INTO `places` VALUES ('247', 'C7', '9', '2', '0');
INSERT INTO `places` VALUES ('248', 'C7', '10', '2', '0');
INSERT INTO `places` VALUES ('249', 'C7', '11', '2', '0');
INSERT INTO `places` VALUES ('250', 'C7', '12', '2', '0');
INSERT INTO `places` VALUES ('251', 'C8', '1', '2', '0');
INSERT INTO `places` VALUES ('252', 'C8', '12', '2', '0');
INSERT INTO `places` VALUES ('253', 'C9', '1', '2', '0');
INSERT INTO `places` VALUES ('254', 'C9', '2', '2', '0');
INSERT INTO `places` VALUES ('255', 'C9', '3', '2', '0');
INSERT INTO `places` VALUES ('256', 'C9', '4', '2', '0');
INSERT INTO `places` VALUES ('257', 'C9', '5', '2', '0');
INSERT INTO `places` VALUES ('258', 'C9', '6', '2', '0');
INSERT INTO `places` VALUES ('259', 'C9', '7', '2', '0');
INSERT INTO `places` VALUES ('260', 'C9', '8', '2', '0');
INSERT INTO `places` VALUES ('261', 'C9', '9', '2', '0');
INSERT INTO `places` VALUES ('262', 'C9', '10', '2', '0');
INSERT INTO `places` VALUES ('263', 'C9', '11', '2', '0');
INSERT INTO `places` VALUES ('264', 'C9', '12', '2', '0');
INSERT INTO `places` VALUES ('265', 'C10', '1', '2', '0');
INSERT INTO `places` VALUES ('266', 'C10', '2', '2', '0');
INSERT INTO `places` VALUES ('267', 'C10', '3', '2', '0');
INSERT INTO `places` VALUES ('268', 'C10', '4', '2', '0');
INSERT INTO `places` VALUES ('269', 'C10', '5', '2', '0');
INSERT INTO `places` VALUES ('270', 'C10', '6', '2', '0');
INSERT INTO `places` VALUES ('271', 'C10', '7', '2', '0');
INSERT INTO `places` VALUES ('272', 'C10', '8', '2', '0');
INSERT INTO `places` VALUES ('273', 'C10', '9', '2', '0');
INSERT INTO `places` VALUES ('274', 'C10', '10', '2', '0');
INSERT INTO `places` VALUES ('275', 'C10', '11', '2', '0');
INSERT INTO `places` VALUES ('276', 'C10', '12', '2', '0');
INSERT INTO `places` VALUES ('277', 'C11', '1', '2', '0');
INSERT INTO `places` VALUES ('278', 'C11', '12', '2', '0');
INSERT INTO `places` VALUES ('279', 'C12', '2', '2', '0');
INSERT INTO `places` VALUES ('280', 'C12', '3', '2', '0');
INSERT INTO `places` VALUES ('281', 'C12', '4', '2', '0');
INSERT INTO `places` VALUES ('282', 'C12', '5', '2', '0');
INSERT INTO `places` VALUES ('283', 'C12', '6', '2', '0');
INSERT INTO `places` VALUES ('284', 'C12', '7', '2', '0');
INSERT INTO `places` VALUES ('285', 'C12', '8', '2', '0');
INSERT INTO `places` VALUES ('286', 'C12', '9', '2', '0');
INSERT INTO `places` VALUES ('287', 'C12', '10', '2', '0');
INSERT INTO `places` VALUES ('288', 'C12', '11', '2', '0');
INSERT INTO `places` VALUES ('289', 'D1', '3', '3', '0');
INSERT INTO `places` VALUES ('290', 'D1', '4', '3', '0');
INSERT INTO `places` VALUES ('291', 'D1', '5', '3', '0');
INSERT INTO `places` VALUES ('292', 'D1', '6', '3', '0');
INSERT INTO `places` VALUES ('293', 'D1', '7', '3', '0');
INSERT INTO `places` VALUES ('294', 'D1', '8', '3', '0');
INSERT INTO `places` VALUES ('295', 'D1', '9', '3', '0');
INSERT INTO `places` VALUES ('296', 'D1', '10', '3', '0');
INSERT INTO `places` VALUES ('297', 'D1', '11', '3', '0');
INSERT INTO `places` VALUES ('298', 'D2', '12', '3', '0');
INSERT INTO `places` VALUES ('299', 'D3', '1', '3', '0');
INSERT INTO `places` VALUES ('300', 'D3', '2', '3', '0');
INSERT INTO `places` VALUES ('301', 'D3', '3', '3', '0');
INSERT INTO `places` VALUES ('302', 'D3', '4', '3', '0');
INSERT INTO `places` VALUES ('303', 'D3', '5', '3', '0');
INSERT INTO `places` VALUES ('304', 'D3', '6', '3', '0');
INSERT INTO `places` VALUES ('305', 'D3', '7', '3', '0');
INSERT INTO `places` VALUES ('306', 'D3', '8', '3', '0');
INSERT INTO `places` VALUES ('307', 'D3', '9', '3', '0');
INSERT INTO `places` VALUES ('308', 'D3', '10', '3', '0');
INSERT INTO `places` VALUES ('309', 'D3', '11', '3', '0');
INSERT INTO `places` VALUES ('310', 'D3', '12', '3', '0');
INSERT INTO `places` VALUES ('311', 'D4', '1', '3', '0');
INSERT INTO `places` VALUES ('312', 'D4', '2', '3', '0');
INSERT INTO `places` VALUES ('313', 'D4', '3', '3', '0');
INSERT INTO `places` VALUES ('314', 'D4', '4', '3', '0');
INSERT INTO `places` VALUES ('315', 'D4', '5', '3', '0');
INSERT INTO `places` VALUES ('316', 'D4', '6', '3', '0');
INSERT INTO `places` VALUES ('317', 'D4', '7', '3', '0');
INSERT INTO `places` VALUES ('318', 'D4', '8', '3', '0');
INSERT INTO `places` VALUES ('319', 'D4', '9', '3', '0');
INSERT INTO `places` VALUES ('320', 'D4', '10', '3', '0');
INSERT INTO `places` VALUES ('321', 'D4', '11', '3', '0');
INSERT INTO `places` VALUES ('322', 'D4', '12', '3', '0');
INSERT INTO `places` VALUES ('323', 'D5', '1', '3', '0');
INSERT INTO `places` VALUES ('324', 'D5', '12', '3', '0');
INSERT INTO `places` VALUES ('325', 'D6', '1', '3', '0');
INSERT INTO `places` VALUES ('326', 'D6', '2', '3', '0');
INSERT INTO `places` VALUES ('327', 'D6', '3', '3', '0');
INSERT INTO `places` VALUES ('328', 'D6', '4', '3', '0');
INSERT INTO `places` VALUES ('329', 'D6', '5', '3', '0');
INSERT INTO `places` VALUES ('330', 'D6', '6', '3', '0');
INSERT INTO `places` VALUES ('331', 'D6', '7', '3', '0');
INSERT INTO `places` VALUES ('332', 'D6', '8', '3', '0');
INSERT INTO `places` VALUES ('333', 'D6', '9', '3', '0');
INSERT INTO `places` VALUES ('334', 'D6', '10', '3', '0');
INSERT INTO `places` VALUES ('335', 'D6', '11', '3', '0');
INSERT INTO `places` VALUES ('336', 'D6', '12', '3', '0');
INSERT INTO `places` VALUES ('337', 'D7', '1', '3', '0');
INSERT INTO `places` VALUES ('338', 'D7', '2', '3', '0');
INSERT INTO `places` VALUES ('339', 'D7', '3', '3', '0');
INSERT INTO `places` VALUES ('340', 'D7', '4', '3', '0');
INSERT INTO `places` VALUES ('341', 'D7', '5', '3', '0');
INSERT INTO `places` VALUES ('342', 'D7', '6', '3', '0');
INSERT INTO `places` VALUES ('343', 'D7', '7', '3', '0');
INSERT INTO `places` VALUES ('344', 'D7', '8', '3', '0');
INSERT INTO `places` VALUES ('345', 'D7', '9', '3', '0');
INSERT INTO `places` VALUES ('346', 'D7', '10', '3', '0');
INSERT INTO `places` VALUES ('347', 'D7', '11', '3', '0');
INSERT INTO `places` VALUES ('348', 'D7', '12', '3', '0');
INSERT INTO `places` VALUES ('349', 'D8', '1', '3', '0');
INSERT INTO `places` VALUES ('350', 'D8', '12', '3', '0');
INSERT INTO `places` VALUES ('351', 'D9', '1', '3', '0');
INSERT INTO `places` VALUES ('352', 'D9', '2', '3', '0');
INSERT INTO `places` VALUES ('353', 'D9', '3', '3', '0');
INSERT INTO `places` VALUES ('354', 'D9', '4', '3', '0');
INSERT INTO `places` VALUES ('355', 'D9', '5', '3', '0');
INSERT INTO `places` VALUES ('356', 'D9', '6', '3', '0');
INSERT INTO `places` VALUES ('357', 'D9', '7', '3', '0');
INSERT INTO `places` VALUES ('358', 'D9', '8', '3', '0');
INSERT INTO `places` VALUES ('359', 'D9', '9', '3', '0');
INSERT INTO `places` VALUES ('360', 'D9', '10', '3', '0');
INSERT INTO `places` VALUES ('361', 'D9', '11', '3', '0');
INSERT INTO `places` VALUES ('362', 'D9', '12', '3', '0');
INSERT INTO `places` VALUES ('363', 'D10', '1', '3', '0');
INSERT INTO `places` VALUES ('364', 'D10', '2', '3', '0');
INSERT INTO `places` VALUES ('365', 'D10', '3', '3', '0');
INSERT INTO `places` VALUES ('366', 'D10', '4', '3', '0');
INSERT INTO `places` VALUES ('367', 'D10', '5', '3', '0');
INSERT INTO `places` VALUES ('368', 'D10', '6', '3', '0');
INSERT INTO `places` VALUES ('369', 'D10', '7', '3', '0');
INSERT INTO `places` VALUES ('370', 'D10', '8', '3', '0');
INSERT INTO `places` VALUES ('371', 'D10', '9', '3', '0');
INSERT INTO `places` VALUES ('372', 'D10', '10', '3', '0');
INSERT INTO `places` VALUES ('373', 'D10', '11', '3', '0');
INSERT INTO `places` VALUES ('374', 'D10', '12', '3', '0');
INSERT INTO `places` VALUES ('375', 'D11', '1', '3', '0');
INSERT INTO `places` VALUES ('376', 'D11', '12', '3', '0');
INSERT INTO `places` VALUES ('377', 'D12', '2', '3', '0');
INSERT INTO `places` VALUES ('378', 'D12', '3', '3', '0');
INSERT INTO `places` VALUES ('379', 'D12', '4', '3', '0');
INSERT INTO `places` VALUES ('380', 'D12', '5', '3', '0');
INSERT INTO `places` VALUES ('381', 'D12', '6', '3', '0');
INSERT INTO `places` VALUES ('382', 'D12', '7', '3', '0');
INSERT INTO `places` VALUES ('383', 'D12', '8', '3', '0');
INSERT INTO `places` VALUES ('384', 'D12', '9', '3', '0');
INSERT INTO `places` VALUES ('385', 'D12', '10', '3', '0');
INSERT INTO `places` VALUES ('386', 'D12', '11', '3', '0');
