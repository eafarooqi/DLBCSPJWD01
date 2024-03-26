/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 80200
 Source Host           : localhost:3306
 Source Schema         : bms

 Target Server Type    : MySQL
 Target Server Version : 80200
 File Encoding         : 65001

 Date: 26/03/2024 16:29:57
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for genres
-- ----------------------------
DROP TABLE IF EXISTS `genres`;
CREATE TABLE `genres`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(0) UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `genres_user_id_foreign`(`user_id`) USING BTREE,
  CONSTRAINT `genres_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of genres
-- ----------------------------
INSERT INTO `genres` VALUES (2, 1, 'Adventure', NULL);
INSERT INTO `genres` VALUES (3, 1, 'Autobiography', NULL);
INSERT INTO `genres` VALUES (4, 1, 'Biography', NULL);
INSERT INTO `genres` VALUES (5, 1, 'Comedy', NULL);
INSERT INTO `genres` VALUES (6, 1, 'Cooking', NULL);
INSERT INTO `genres` VALUES (7, 1, 'Fantasy', NULL);
INSERT INTO `genres` VALUES (8, 1, 'Fiction', NULL);
INSERT INTO `genres` VALUES (9, 1, 'Health and Wellness', NULL);
INSERT INTO `genres` VALUES (10, 1, 'History', NULL);
INSERT INTO `genres` VALUES (11, 1, 'Horror', NULL);
INSERT INTO `genres` VALUES (12, 1, 'Humor', NULL);
INSERT INTO `genres` VALUES (13, 1, 'Memoir', NULL);
INSERT INTO `genres` VALUES (14, 1, 'Mystery', NULL);
INSERT INTO `genres` VALUES (15, 1, 'Non-fiction', NULL);
INSERT INTO `genres` VALUES (16, 1, 'Philosophy', NULL);
INSERT INTO `genres` VALUES (17, 1, 'Romance', NULL);
INSERT INTO `genres` VALUES (18, 1, 'Science', NULL);
INSERT INTO `genres` VALUES (19, 1, 'Science fiction', NULL);
INSERT INTO `genres` VALUES (20, 1, 'Technology', NULL);
INSERT INTO `genres` VALUES (21, 1, 'Thriller', NULL);
INSERT INTO `genres` VALUES (22, 1, 'Tragedy', NULL);
INSERT INTO `genres` VALUES (23, 1, 'Travel literature', NULL);
INSERT INTO `genres` VALUES (24, 1, 'Spirituality', NULL);

SET FOREIGN_KEY_CHECKS = 1;
