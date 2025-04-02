/*
Navicat MySQL Data Transfer

Source Server         : PHP
Source Server Version : 50533
Source Host           : localhost:3306
Source Database       : usermanager

Target Server Type    : MYSQL
Target Server Version : 50533
File Encoding         : 65001

Date: 2025-04-02 11:12:49
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `admin`
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `user_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(60) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'admin', 'e10adc3949ba59abbe56e057f20f883e');
INSERT INTO `admin` VALUES ('2', 'Zhenhe', '8B9172CB9FCEEB2B2FF2186703361BD3');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `uid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(15) NOT NULL DEFAULT '',
  `password` char(32) NOT NULL DEFAULT '',
  `email` varchar(40) NOT NULL DEFAULT '',
  `sex` char(10) NOT NULL DEFAULT '男',
  `time` date DEFAULT NULL,
  `img` char(50) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', '熊明', '123456', 'xda@qq.com', '男', '2025-03-19', 'img/bicycle.jpg');
INSERT INTO `users` VALUES ('2', '王伟', '123456', 'wangw@qq.com', '男', '2025-03-19', 'img/bicycle.jpg');
INSERT INTO `users` VALUES ('3', '李芳', '123456', 'lifang@qq.com', '女', '2025-03-19', 'img/bicycle.jpg');
INSERT INTO `users` VALUES ('4', '张兰', '123456', 'zhangl@qq.com', '女', '2025-03-19', 'img/bicycle.jpg');
INSERT INTO `users` VALUES ('24', 'QPP', 'abc123', 'QPP@qq.com', '男', '2025-03-26', 'img/f_202503262203259022.jpg');
INSERT INTO `users` VALUES ('25', 'Zhenhe', 'Zhenhe123456', 'Zhenhe@163.com', '女', '2025-03-26', 'img/f_202503262203407122.jpg');
INSERT INTO `users` VALUES ('29', 'CS', '123sss', 'CS@163.co', '女', '2025-03-26', 'img/f_202503270003506983.jpg');
INSERT INTO `users` VALUES ('30', '用户007', '************', 'Michael@007.com', '男', '2025-03-26', 'img/f_202503270003197666.jpg');
INSERT INTO `users` VALUES ('32', '我是', 'yonghu6', 'yonghu@qq.com', '男', '2025-04-02', 'img/f_202504021004262216.gif');
