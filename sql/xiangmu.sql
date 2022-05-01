/*
 Navicat Premium Data Transfer

 Source Server         : jixiang
 Source Server Type    : MySQL
 Source Server Version : 50726
 Source Host           : localhost:3306
 Source Schema         : xiangmu

 Target Server Type    : MySQL
 Target Server Version : 50726
 File Encoding         : 65001

 Date: 14/04/2022 19:59:11
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for hyw_admin
-- ----------------------------
DROP TABLE IF EXISTS `hyw_admin`;
CREATE TABLE `hyw_admin`  (
  `id` int(16) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id',
  `user_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '用户名',
  `password` char(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '密码',
  `create_time` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '创建时间',
  `update_time` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '修改时间',
  `delete_time` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '结束时间',
  `update_person` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '修改人',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `user_name`(`user_name`) USING BTREE COMMENT '唯一用户名'
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of hyw_admin
-- ----------------------------
INSERT INTO `hyw_admin` VALUES (1, 'admin1', 'e10adc3949ba59abbe56e057f20f883e', '1649752063', '1649752063', NULL, NULL);
INSERT INTO `hyw_admin` VALUES (2, 'admin2', 'e10adc3949ba59abbe56e057f20f883e', '1649839432', '1649839432', NULL, NULL);

-- ----------------------------
-- Table structure for hyw_admin_role
-- ----------------------------
DROP TABLE IF EXISTS `hyw_admin_role`;
CREATE TABLE `hyw_admin_role`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `admin_id` int(11) NULL DEFAULT NULL COMMENT '用户id',
  `role_id` int(11) NULL DEFAULT NULL COMMENT '角色id',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '中间表' ROW_FORMAT = FIXED;

-- ----------------------------
-- Records of hyw_admin_role
-- ----------------------------
INSERT INTO `hyw_admin_role` VALUES (1, 1, 1);
INSERT INTO `hyw_admin_role` VALUES (2, 1, 2);
INSERT INTO `hyw_admin_role` VALUES (3, 1, 3);
INSERT INTO `hyw_admin_role` VALUES (4, 2, 4);
INSERT INTO `hyw_admin_role` VALUES (5, 2, 5);

-- ----------------------------
-- Table structure for hyw_permissions
-- ----------------------------
DROP TABLE IF EXISTS `hyw_permissions`;
CREATE TABLE `hyw_permissions`  (
  `permissions_id` int(32) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '权限ID',
  `permissions_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '权限名称',
  `create_time` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '权限创建时间',
  PRIMARY KEY (`permissions_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '权限表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of hyw_permissions
-- ----------------------------

-- ----------------------------
-- Table structure for hyw_role
-- ----------------------------
DROP TABLE IF EXISTS `hyw_role`;
CREATE TABLE `hyw_role`  (
  `id` int(32) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '角色id',
  `role_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '角色名称',
  `permissions_id` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '角色权限',
  `create_time` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '   角色表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of hyw_role
-- ----------------------------
INSERT INTO `hyw_role` VALUES (1, ' 超级管理员', NULL, NULL);
INSERT INTO `hyw_role` VALUES (2, '管理员', NULL, NULL);
INSERT INTO `hyw_role` VALUES (3, '测试人员', NULL, NULL);
INSERT INTO `hyw_role` VALUES (4, '开发人员', NULL, NULL);
INSERT INTO `hyw_role` VALUES (5, '运营人员', NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
