/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50624
Source Host           : localhost:3306
Source Database       : shu

Target Server Type    : MYSQL
Target Server Version : 50624
File Encoding         : 65001

Date: 2016-05-20 03:04:04
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for cms_admin
-- ----------------------------
DROP TABLE IF EXISTS `cms_admin`;
CREATE TABLE `cms_admin` (
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of cms_admin
-- ----------------------------
INSERT INTO `cms_admin` VALUES ('admin', 'admin');

-- ----------------------------
-- Table structure for cms_c
-- ----------------------------
DROP TABLE IF EXISTS `cms_c`;
CREATE TABLE `cms_c` (
  `kh` char(50) CHARACTER SET utf8 NOT NULL,
  `km` char(50) CHARACTER SET utf8 NOT NULL,
  `xf` char(50) CHARACTER SET utf8 NOT NULL,
  `xs` char(50) CHARACTER SET utf8 NOT NULL,
  `yxh` char(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`kh`),
  KEY `C_D` (`yxh`),
  CONSTRAINT `C_D` FOREIGN KEY (`yxh`) REFERENCES `cms_d` (`yxh`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of cms_c
-- ----------------------------
INSERT INTO `cms_c` VALUES ('08301001', '分子物理学', '4', '40', '03');
INSERT INTO `cms_c` VALUES ('08302001', '通信学', '3', '30', '02');
INSERT INTO `cms_c` VALUES ('08305001', '离散数学', '4', '40', '01');
INSERT INTO `cms_c` VALUES ('08305002', '数据库原理', '4', '50', '01');
INSERT INTO `cms_c` VALUES ('08305003', '数据结构', '4', '50', '01');
INSERT INTO `cms_c` VALUES ('08305004', '系统结构', '6', '60', '01');

-- ----------------------------
-- Table structure for cms_d
-- ----------------------------
DROP TABLE IF EXISTS `cms_d`;
CREATE TABLE `cms_d` (
  `yxh` char(50) CHARACTER SET utf8 NOT NULL,
  `mc` char(50) CHARACTER SET utf8 NOT NULL,
  `dz` char(50) CHARACTER SET utf8 NOT NULL,
  `lxdh` char(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`yxh`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of cms_d
-- ----------------------------
INSERT INTO `cms_d` VALUES ('01', '计算机学院', '上大东校区三号楼', '65347567');
INSERT INTO `cms_d` VALUES ('02', '通讯学院', '上大东校区二号楼', '65341234');
INSERT INTO `cms_d` VALUES ('03', '材料学院', '上大东校区四号楼', '65347890');

-- ----------------------------
-- Table structure for cms_e
-- ----------------------------
DROP TABLE IF EXISTS `cms_e`;
CREATE TABLE `cms_e` (
  `xh` char(50) CHARACTER SET utf8 NOT NULL,
  `xq` char(50) CHARACTER SET utf8 NOT NULL,
  `kh` char(50) CHARACTER SET utf8 NOT NULL,
  `gh` char(50) CHARACTER SET utf8 NOT NULL,
  `pscj` char(50) CHARACTER SET utf8 DEFAULT NULL,
  `kscj` char(50) CHARACTER SET utf8 DEFAULT NULL,
  `zpcj` char(50) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`xh`,`xq`,`kh`),
  KEY `E_C` (`kh`),
  KEY `E_T` (`gh`),
  CONSTRAINT `E_C` FOREIGN KEY (`kh`) REFERENCES `cms_c` (`kh`),
  CONSTRAINT `E_S` FOREIGN KEY (`xh`) REFERENCES `cms_s` (`xh`),
  CONSTRAINT `E_T` FOREIGN KEY (`gh`) REFERENCES `cms_t` (`gh`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of cms_e
-- ----------------------------
INSERT INTO `cms_e` VALUES ('1101', '2012-2013秋季', '08305001', '0103', '60', '60', '60');
INSERT INTO `cms_e` VALUES ('1102', '2012-2013冬季', '08305002', '0101', '82', '82', '82');
INSERT INTO `cms_e` VALUES ('1102', '2012-2013冬季', '08305004', '0101', null, null, '74');
INSERT INTO `cms_e` VALUES ('1102', '2012-2013秋季', '08305001', '0103', '87', '87', '87');
INSERT INTO `cms_e` VALUES ('1103', '2012-2013冬季', '08305002', '0102', '75', '75', '75');
INSERT INTO `cms_e` VALUES ('1103', '2012-2013冬季', '08305003', '0102', '84', '84', '84');
INSERT INTO `cms_e` VALUES ('1103', '2012-2013秋季', '08305001', '0103', '56', '56', '56');
INSERT INTO `cms_e` VALUES ('1103', '2013-2014冬季', '08305002', '0102', null, null, null);
INSERT INTO `cms_e` VALUES ('1103', '2013-2014秋季', '08305001', '0102', null, null, '80');
INSERT INTO `cms_e` VALUES ('1103', '2013-2014秋季', '08305004', '0101', '78', null, null);
INSERT INTO `cms_e` VALUES ('1104', '2012-2013秋季', '08305001', '0103', '74', '74', '90');
INSERT INTO `cms_e` VALUES ('1104', '2013-2014冬季', '08302001', '0201', null, null, '75');
INSERT INTO `cms_e` VALUES ('1106', '2012-2013冬季', '08305002', '0103', '66', '66', '90');
INSERT INTO `cms_e` VALUES ('1106', '2012-2013秋季', '08305001', '0103', '85', '85', '94');
INSERT INTO `cms_e` VALUES ('1107', '2012-2013冬季', '08305003', '0102', '79', '79', '79');
INSERT INTO `cms_e` VALUES ('1107', '2012-2013秋季', '08305001', '0103', '90', '90', '90');
INSERT INTO `cms_e` VALUES ('1107', '2013-2014冬季', '08302001', '0201', null, null, '60');

-- ----------------------------
-- Table structure for cms_o
-- ----------------------------
DROP TABLE IF EXISTS `cms_o`;
CREATE TABLE `cms_o` (
  `xq` char(50) CHARACTER SET utf8 NOT NULL,
  `kh` char(50) CHARACTER SET utf8 NOT NULL,
  `gh` char(50) CHARACTER SET utf8 NOT NULL,
  `sksj` char(50) CHARACTER SET utf8 NOT NULL,
  `container` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`xq`,`kh`,`gh`,`sksj`),
  KEY `O_T` (`gh`),
  KEY `O_C` (`kh`),
  CONSTRAINT `O_C` FOREIGN KEY (`kh`) REFERENCES `cms_c` (`kh`),
  CONSTRAINT `O_T` FOREIGN KEY (`gh`) REFERENCES `cms_t` (`gh`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of cms_o
-- ----------------------------
INSERT INTO `cms_o` VALUES ('2012-2013冬季', '08305002', '0101', '星期三1-4', '2');
INSERT INTO `cms_o` VALUES ('2012-2013冬季', '08305002', '0102', '星期三1-4', '2');
INSERT INTO `cms_o` VALUES ('2012-2013冬季', '08305002', '0103', '星期三1-4', '2');
INSERT INTO `cms_o` VALUES ('2012-2013冬季', '08305003', '0102', '星期五5-8', '2');
INSERT INTO `cms_o` VALUES ('2012-2013秋季', '08305001', '0103', '星期三5-8', '2');
INSERT INTO `cms_o` VALUES ('2013-2014冬季', '08302001', '0201', '星期一5-8', '2');
INSERT INTO `cms_o` VALUES ('2013-2014冬季', '08305001', '0101', '星期一4-5', '2');
INSERT INTO `cms_o` VALUES ('2013-2014冬季', '08305002', '0102', '星期三1-2', '2');
INSERT INTO `cms_o` VALUES ('2013-2014冬季', '08305004', '0103', '星期五1-2', '2');
INSERT INTO `cms_o` VALUES ('2013-2014秋季', '08305001', '0102', '星期一5-8', '2');
INSERT INTO `cms_o` VALUES ('2013-2014秋季', '08305004', '0101', '星期二1-4', '2');

-- ----------------------------
-- Table structure for cms_s
-- ----------------------------
DROP TABLE IF EXISTS `cms_s`;
CREATE TABLE `cms_s` (
  `xh` char(50) CHARACTER SET utf8 NOT NULL,
  `xm` char(50) CHARACTER SET utf8 NOT NULL,
  `xb` char(50) CHARACTER SET utf8 NOT NULL,
  `csrq` char(50) CHARACTER SET utf8 NOT NULL,
  `jg` char(50) CHARACTER SET utf8 NOT NULL,
  `sjhm` char(50) CHARACTER SET utf8 NOT NULL,
  `yxh` char(50) CHARACTER SET utf8 NOT NULL,
  `stu_pwd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `score` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`xh`),
  KEY `S_D` (`yxh`),
  CONSTRAINT `S_D` FOREIGN KEY (`yxh`) REFERENCES `cms_d` (`yxh`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of cms_s
-- ----------------------------
INSERT INTO `cms_s` VALUES ('1101', '李明', '男', '1993-03-06', '上海', '13613005486', '02', '1101', '3.12');
INSERT INTO `cms_s` VALUES ('1102', '刘晓明', '男', '1992-12-08', '安徽', '18913457890', '01', '1102', '3.33');
INSERT INTO `cms_s` VALUES ('1103', '张颖', '女', '1993-01-05', '江苏', '18826490423', '01', '1103', '2.10');
INSERT INTO `cms_s` VALUES ('1104', '刘晶晶', '女', '1994-11-06', '上海', '13331934111', '01', '1104', '3.42');
INSERT INTO `cms_s` VALUES ('1105', '刘成刚', '男', '1991-06-07', '上海', '18015872567', '01', '1105', '2.44');
INSERT INTO `cms_s` VALUES ('1106', '李二丽', '女', '1993-05-04', '江苏', '18107620945', '01', '1106', '3.98');
INSERT INTO `cms_s` VALUES ('1107', '张晓峰', '男', '1992-08-16', '浙江', '13912341078', '01', '1107', '2.66');

-- ----------------------------
-- Table structure for cms_t
-- ----------------------------
DROP TABLE IF EXISTS `cms_t`;
CREATE TABLE `cms_t` (
  `gh` char(50) CHARACTER SET utf8 NOT NULL,
  `xm` char(50) CHARACTER SET utf8 NOT NULL,
  `xb` char(50) CHARACTER SET utf8 NOT NULL,
  `csrq` char(50) CHARACTER SET utf8 NOT NULL,
  `xl` char(50) CHARACTER SET utf8 NOT NULL,
  `jbgz` char(50) CHARACTER SET utf8 NOT NULL,
  `yxh` char(50) CHARACTER SET utf8 NOT NULL,
  `tea_pwd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`gh`),
  KEY `T_D` (`yxh`),
  CONSTRAINT `T_D` FOREIGN KEY (`yxh`) REFERENCES `cms_d` (`yxh`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of cms_t
-- ----------------------------
INSERT INTO `cms_t` VALUES ('0101', '陈迪茂', '男', '1973-03-06', '讲师', '3567．00', '01', '0101');
INSERT INTO `cms_t` VALUES ('0102', '马小红', '女', '1972-12-08', '讲师', '2845.00', '01', '0102');
INSERT INTO `cms_t` VALUES ('0103', '吴宝钢', '男', '1980-11-06', '讲师', '2554.00', '01', '0103');
INSERT INTO `cms_t` VALUES ('0201', '张心颖', '女', '1960-01-05', '教授', '4200.00', '02', '0201');
