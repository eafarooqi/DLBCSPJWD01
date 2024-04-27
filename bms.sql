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

 Date: 25/04/2024 06:46:08
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for books
-- ----------------------------
DROP TABLE IF EXISTS `books`;
CREATE TABLE `books`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(0) UNSIGNED NOT NULL,
  `category_id` bigint(0) UNSIGNED NULL DEFAULT NULL,
  `genre_id` bigint(0) UNSIGNED NULL DEFAULT NULL,
  `language_id` bigint(0) UNSIGNED NULL DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `isbn` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `author` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `published_date` date NULL DEFAULT NULL,
  `total_pages` int(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `books_user_id_foreign`(`user_id`) USING BTREE,
  INDEX `books_category_id_foreign`(`category_id`) USING BTREE,
  INDEX `books_genre_id_foreign`(`genre_id`) USING BTREE,
  INDEX `books_language_id_foreign`(`language_id`) USING BTREE,
  CONSTRAINT `books_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `books_genre_id_foreign` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `books_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `books_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of books
-- ----------------------------
INSERT INTO `books` VALUES (1, 1, 3, 3, NULL, 'df', NULL, NULL, NULL, NULL, NULL, '2024-03-18 14:33:14', '2024-03-18 14:33:14', NULL);

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
) ENGINE = InnoDB AUTO_INCREMENT = 63 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

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
) ENGINE = InnoDB AUTO_INCREMENT = 24 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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

-- ----------------------------
-- Table structure for languages
-- ----------------------------
DROP TABLE IF EXISTS `languages`;
CREATE TABLE `languages`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of languages
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(0) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_reset_tokens_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (9, '2024_02_29_144549_create_categories_table', 3);
INSERT INTO `migrations` VALUES (10, '2024_02_29_145054_create_genres_table', 4);
INSERT INTO `migrations` VALUES (11, '2024_03_13_114115_create_languages_table', 4);
INSERT INTO `migrations` VALUES (12, '2024_03_13_114329_create_books_table', 4);

-- ----------------------------
-- Table structure for password_reset_tokens
-- ----------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens`  (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`email`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_reset_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(0) UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp(0) NULL DEFAULT NULL,
  `expires_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token`) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type`, `tokenable_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Ehsan Farooqi', 'e_a_farooqi@hotmail.com', '2024-03-03 15:46:30', '$2y$12$Je8Lv0Jyrx8du0KnTgpMA.M3YPHaWW0BQA57cSAXJabGTN40cA8qO', NULL, '2024-02-24 20:30:36', '2024-03-03 15:46:30');

SET FOREIGN_KEY_CHECKS = 1;
