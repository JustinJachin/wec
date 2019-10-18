/*
 Navicat Premium Data Transfer

 Source Server         : mysql
 Source Server Type    : MySQL
 Source Server Version : 50553
 Source Host           : localhost:3306
 Source Schema         : wc

 Target Server Type    : MySQL
 Target Server Version : 50553
 File Encoding         : 65001

 Date: 18/10/2019 13:10:54
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for article
-- ----------------------------
DROP TABLE IF EXISTS `article`;
CREATE TABLE `article`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '标题',
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '内容',
  `picture` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '标题图片',
  `read` int(11) NOT NULL DEFAULT 0 COMMENT '浏览量',
  `typeId` int(11) NOT NULL DEFAULT 0 COMMENT '分类',
  `flag` tinyint(1) NOT NULL COMMENT '是否是轮播图',
  `create_time` int(11) NOT NULL COMMENT '发布时间',
  `update_time` int(11) NOT NULL COMMENT '更新时间',
  `status` tinyint(2) NOT NULL DEFAULT 1 COMMENT '状态',
  `delete_time` int(11) NULL DEFAULT 1 COMMENT '删除时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of article
-- ----------------------------
INSERT INTO `article` VALUES (1, '测试1', '<p style=\"text-align: center; \"><img src=\"/../static/uploads/f7\\f3ce3fd039702a3b46fcbcff155466.jpg\" style=\"width: 50%;\"></p><p style=\"text-align: center;\">这里环境很不错，值得一去</p><p><br></p><table class=\"table table-bordered\"><tbody><tr><td>天数</td><td>价格（元/天）</td><td>人数</td></tr><tr><td>5</td><td>1400</td><td>20</td></tr><tr><td>7</td><td>1200</td><td>18</td></tr></tbody></table><p><br></p>', '/uploads/d7\\3dd0b67391a113150eb5661f8ff00d.jpg', 6, 1, 1, 1571365394, 1571365514, 1, 1);
INSERT INTO `article` VALUES (2, '测试2', '<p>测试2</p>', '/uploads/79\\a9052d0abb7d5cbc8c123cc5dfece5.jpg', 0, 1, 0, 1571365550, 1571365550, 1, 1);
INSERT INTO `article` VALUES (3, '测试3', '<p>测试3</p>', '/uploads/79\\a9052d0abb7d5cbc8c123cc5dfece5.jpg', 0, 1, 1, 1571365599, 1571365599, 1, 1);
INSERT INTO `article` VALUES (4, '测试4', '<p>测试4</p>', '/uploads/f7\\f3ce3fd039702a3b46fcbcff155466.jpg', 0, 0, 1, 1571365614, 1571365614, 1, 1);
INSERT INTO `article` VALUES (5, '测试5', '<p>测试5</p>', '/uploads/f7\\f3ce3fd039702a3b46fcbcff155466.jpg', 5, 2, 0, 1571365755, 1571365755, 1, 1);
INSERT INTO `article` VALUES (6, '测试6', '<p>测试6</p>', '/uploads/f7\\f3ce3fd039702a3b46fcbcff155466.jpg', 0, 6, 0, 1571365776, 1571365776, 1, 1);
INSERT INTO `article` VALUES (7, '测试7', '<p>测试7&nbsp; enenen 成功</p>', '/uploads/79\\a9052d0abb7d5cbc8c123cc5dfece5.jpg', 0, 7, 0, 1571365793, 1571375333, 1, 1);
INSERT INTO `article` VALUES (8, '测试8', '<p>测试8</p>', '/uploads/f7\\f3ce3fd039702a3b46fcbcff155466.jpg', 0, 8, 0, 1571365807, 1571365807, 1, 1);
INSERT INTO `article` VALUES (9, '测试9', '<p>测试9</p>', '/uploads/79\\a9052d0abb7d5cbc8c123cc5dfece5.jpg', 0, 8, 0, 1571365826, 1571365826, 1, 1);
INSERT INTO `article` VALUES (10, '测试10', '<p>测试101</p>', '/uploads/f7\\f3ce3fd039702a3b46fcbcff155466.jpg', 0, 0, 1, 1571367393, 1571375160, 1, 1);
INSERT INTO `article` VALUES (11, '测试11', '<p>测试111</p>', '/uploads/d7\\3dd0b67391a113150eb5661f8ff00d.jpg', 0, 7, 0, 1571367426, 1571367426, 1, 1);

-- ----------------------------
-- Table structure for type
-- ----------------------------
DROP TABLE IF EXISTS `type`;
CREATE TABLE `type`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of type
-- ----------------------------
INSERT INTO `type` VALUES (1, '海岛', 1570764695);
INSERT INTO `type` VALUES (2, '东南亚', 1570764700);
INSERT INTO `type` VALUES (6, '欧美澳非', 1571365248);
INSERT INTO `type` VALUES (7, '港澳台', 1571365254);
INSERT INTO `type` VALUES (8, '日韩', 1571365259);

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `login_time` int(11) NULL DEFAULT NULL,
  `login_ip` varchar(24) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete_time` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'admin', 'wc99b3988466f46c1d740687caf2979300', 1557898848, 1570759268, NULL, NULL, 1, NULL);

SET FOREIGN_KEY_CHECKS = 1;
