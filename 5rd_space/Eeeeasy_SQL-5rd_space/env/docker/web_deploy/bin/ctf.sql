/*
 Navicat Premium Data Transfer

 Source Server         : easy_php
 Source Server Type    : MySQL
 Source Server Version : 80030 (8.0.30)
 Source Host           : 101.43.122.252:4406
 Source Schema         : ctf

 Target Server Type    : MySQL
 Target Server Version : 80030 (8.0.30)
 File Encoding         : 65001

 Date: 11/09/2022 01:07:21
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for users
-- ----------------------------
CREATE database ctf;
use ctf;
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `msg` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` (`id`, `username`, `password`, `msg`) VALUES (1, 'admin@666', 'admin@88892', 'no_flag');
INSERT INTO `users` (`id`, `username`, `password`, `msg`) VALUES (2, 'ctf@2022', 'ctf@passwd', 'no_flag');
INSERT INTO `users` (`id`, `username`, `password`, `msg`) VALUES (3, 'Flag_Account', 'G1ve_Y0u_@_K3y_70_937_f14g!!!', 'flag');
INSERT INTO `users` (`id`, `username`, `password`, `msg`) VALUES (4, 'pppp@aaaa', 'aaaa@xxxxzzz', 'no_flag');
INSERT INTO `users` (`id`, `username`, `password`, `msg`) VALUES (5, 'flag@aaa', 'flag@password', 'no_flag');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;

ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'ctf_2022_09_08_pwd';