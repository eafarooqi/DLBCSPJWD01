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

 Date: 26/03/2024 16:29:45
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(0) UNSIGNED NOT NULL,
  `parent_id` bigint(0) UNSIGNED NULL DEFAULT NULL,
  `group_id` int(0) NULL DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `categories_user_id_foreign`(`user_id`) USING BTREE,
  INDEX `categories_parent_id_foreign`(`parent_id`) USING BTREE,
  CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `categories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES (2, 1, NULL, 2, 'Art & Music', NULL);
INSERT INTO `categories` VALUES (3, 1, 2, 2, 'Art History', NULL);
INSERT INTO `categories` VALUES (4, 1, 2, 2, 'Drawing', NULL);
INSERT INTO `categories` VALUES (5, 1, 2, 2, 'Fashion', NULL);
INSERT INTO `categories` VALUES (6, 1, 2, 2, 'Film', NULL);
INSERT INTO `categories` VALUES (7, 1, NULL, 7, 'Biographies', NULL);
INSERT INTO `categories` VALUES (8, 1, 7, 7, 'Ethnic & Cultural', NULL);
INSERT INTO `categories` VALUES (9, 1, 7, 7, 'Historical', NULL);
INSERT INTO `categories` VALUES (10, 1, NULL, 10, 'Business', NULL);
INSERT INTO `categories` VALUES (11, 1, 10, 10, 'Careers', NULL);
INSERT INTO `categories` VALUES (12, 1, 10, 10, 'Economics', NULL);
INSERT INTO `categories` VALUES (13, 1, 10, 10, 'Finance', NULL);
INSERT INTO `categories` VALUES (14, 1, 10, 10, 'Industries', NULL);
INSERT INTO `categories` VALUES (15, 1, NULL, 15, 'Comics', NULL);
INSERT INTO `categories` VALUES (16, 1, 15, 15, 'DC Comics', NULL);
INSERT INTO `categories` VALUES (17, 1, 15, 15, 'Fantasy', NULL);
INSERT INTO `categories` VALUES (18, 1, NULL, 18, 'Computers & Tech', NULL);
INSERT INTO `categories` VALUES (19, 1, 18, 18, 'Apple', NULL);
INSERT INTO `categories` VALUES (20, 1, 18, 18, 'Computer Science', NULL);
INSERT INTO `categories` VALUES (21, 1, 18, 18, 'Databases', NULL);
INSERT INTO `categories` VALUES (22, 1, 18, 18, 'Computers & Internet', NULL);
INSERT INTO `categories` VALUES (23, 1, 18, 18, 'Cybersecurity', NULL);
INSERT INTO `categories` VALUES (24, 1, 18, 18, 'Graphic Design', NULL);
INSERT INTO `categories` VALUES (25, 1, 18, 18, 'Operating Systems', NULL);
INSERT INTO `categories` VALUES (26, 1, 18, 18, 'Programming', NULL);
INSERT INTO `categories` VALUES (27, 1, NULL, 27, 'Cooking', NULL);
INSERT INTO `categories` VALUES (28, 1, 27, 27, 'Asian', NULL);
INSERT INTO `categories` VALUES (29, 1, 27, 27, 'Baking', NULL);
INSERT INTO `categories` VALUES (30, 1, 27, 27, 'BBQ', NULL);
INSERT INTO `categories` VALUES (31, 1, 27, 27, 'Desserts', NULL);
INSERT INTO `categories` VALUES (32, 1, 27, 27, 'Diet & Weight Loss', NULL);
INSERT INTO `categories` VALUES (33, 1, NULL, 33, 'Entertainment', NULL);
INSERT INTO `categories` VALUES (34, 1, 33, 33, 'Games', NULL);
INSERT INTO `categories` VALUES (35, 1, 33, 33, 'Movies', NULL);
INSERT INTO `categories` VALUES (36, 1, 33, 33, 'Cartoons', NULL);
INSERT INTO `categories` VALUES (37, 1, 33, 33, 'Comedy', NULL);
INSERT INTO `categories` VALUES (38, 1, NULL, 38, 'Health & Fitness', NULL);
INSERT INTO `categories` VALUES (39, 1, 38, 38, 'Beauty, Grooming & Style', NULL);
INSERT INTO `categories` VALUES (40, 1, 38, 38, 'Children\'s Health', NULL);
INSERT INTO `categories` VALUES (41, 1, NULL, 41, 'Hobbies & Crafts', NULL);
INSERT INTO `categories` VALUES (42, 1, 41, 41, 'Antiques', NULL);
INSERT INTO `categories` VALUES (43, 1, 41, 41, 'Collecting', NULL);
INSERT INTO `categories` VALUES (44, 1, NULL, 44, 'Kids', NULL);
INSERT INTO `categories` VALUES (45, 1, 44, 44, 'Activity Books', NULL);
INSERT INTO `categories` VALUES (46, 1, 44, 44, 'Animals', NULL);
INSERT INTO `categories` VALUES (47, 1, 44, 44, 'Fairy Tales', NULL);
INSERT INTO `categories` VALUES (48, 1, NULL, 48, 'Medical', NULL);
INSERT INTO `categories` VALUES (49, 1, 48, 48, 'Clinical', NULL);
INSERT INTO `categories` VALUES (50, 1, 48, 48, 'Dentistry', NULL);
INSERT INTO `categories` VALUES (51, 1, NULL, 51, 'Sports', NULL);
INSERT INTO `categories` VALUES (52, 1, 51, 51, 'Basketball', NULL);
INSERT INTO `categories` VALUES (53, 1, 51, 51, 'Olympic Games', NULL);
INSERT INTO `categories` VALUES (54, 1, 51, 51, 'Tennis', NULL);
INSERT INTO `categories` VALUES (55, 1, NULL, 55, 'Travel', NULL);
INSERT INTO `categories` VALUES (56, 1, 55, 55, 'Africa', NULL);
INSERT INTO `categories` VALUES (57, 1, 55, 55, 'Asia', NULL);
INSERT INTO `categories` VALUES (58, 1, 55, 55, 'Europe', NULL);
INSERT INTO `categories` VALUES (59, 1, 55, 55, 'Ancient Egypt', NULL);
INSERT INTO `categories` VALUES (60, 1, 55, 55, 'Travel Guide', NULL);
INSERT INTO `categories` VALUES (61, 1, 55, 55, 'Wildlife', NULL);
INSERT INTO `categories` VALUES (63, 1, 2, 2, 'fgf', '2024-03-26 14:48:26');

SET FOREIGN_KEY_CHECKS = 1;
