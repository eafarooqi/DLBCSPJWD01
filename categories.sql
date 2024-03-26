/*
 Navicat MySQL Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 80300
 Source Host           : localhost:3306
 Source Schema         : bms

 Target Server Type    : MySQL
 Target Server Version : 80300
 File Encoding         : 65001

 Date: 26/03/2024 13:29:37
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `parent_id` bigint UNSIGNED NULL DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `categories_user_id_foreign`(`user_id`) USING BTREE,
  INDEX `categories_parent_id_foreign`(`parent_id`) USING BTREE,
  CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `categories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES (2, 5, NULL, 'Art & Music', NULL);
INSERT INTO `categories` VALUES (3, 5, 2, 'Art History', NULL);
INSERT INTO `categories` VALUES (4, 5, 2, 'Drawing', NULL);
INSERT INTO `categories` VALUES (5, 5, 2, 'Fashion', NULL);
INSERT INTO `categories` VALUES (6, 5, 2, 'Film', NULL);

SET FOREIGN_KEY_CHECKS = 1;
