/*
Navicat MySQL Data Transfer

Source Server         : LocalHost
Source Server Version : 50616
Source Host           : localhost:3306
Source Database       : sqlstock

Target Server Type    : MYSQL
Target Server Version : 50616
File Encoding         : 65001

Date: 2014-07-28 13:45:21
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for data
-- ----------------------------
DROP TABLE IF EXISTS `data`;
CREATE TABLE `data` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `col1` varchar(255) DEFAULT NULL,
  `col2` varchar(255) DEFAULT NULL,
  `col3` varchar(255) DEFAULT NULL,
  `col4` varchar(255) DEFAULT NULL,
  `col5` varchar(255) DEFAULT NULL,
  `col6` varchar(255) DEFAULT NULL,
  `col7` varchar(255) DEFAULT NULL,
  `col8` varchar(255) DEFAULT NULL,
  `col9` varchar(255) DEFAULT NULL,
  `col10` varchar(255) DEFAULT NULL,
  `col11` varchar(255) DEFAULT NULL,
  `col12` varchar(255) DEFAULT NULL,
  `col13` varchar(255) DEFAULT NULL,
  `col14` varchar(255) DEFAULT NULL,
  `col15` varchar(255) DEFAULT NULL,
  `col16` varchar(255) DEFAULT NULL,
  `col17` varchar(255) DEFAULT NULL,
  `col18` varchar(255) DEFAULT NULL,
  `col19` varchar(255) DEFAULT NULL,
  `col20` varchar(255) DEFAULT NULL,
  `col21` varchar(255) DEFAULT NULL,
  `col22` varchar(255) DEFAULT NULL,
  `col23` varchar(255) DEFAULT NULL,
  `col24` varchar(255) DEFAULT NULL,
  `col25` varchar(255) DEFAULT NULL,
  `col26` varchar(255) DEFAULT NULL,
  `col27` varchar(255) DEFAULT NULL,
  `col28` varchar(255) DEFAULT NULL,
  `col29` varchar(255) DEFAULT NULL,
  `col30` varchar(255) DEFAULT NULL,
  `col31` varchar(255) DEFAULT NULL,
  `col32` varchar(255) DEFAULT NULL,
  `col33` varchar(255) DEFAULT NULL,
  `col34` varchar(255) DEFAULT NULL,
  `col35` varchar(255) DEFAULT NULL,
  `col36` varchar(255) DEFAULT NULL,
  `col37` varchar(255) DEFAULT NULL,
  `col38` varchar(255) DEFAULT NULL,
  `col39` varchar(255) DEFAULT NULL,
  `col40` varchar(255) DEFAULT NULL,
  `col41` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
