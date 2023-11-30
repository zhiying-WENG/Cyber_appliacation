DROP DATABASE IF EXISTS `files`;
CREATE DATABASE `files`;
use `files`;
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
                                      `id` int NOT NULL AUTO_INCREMENT,
                                      `email` varchar(255) NOT NULL,
                                      `password` varchar(255) NOT NULL,
                                      `lastname` varchar(255) DEFAULT NULL,
                                      `firstname` varchar(255) DEFAULT NULL,
                                      `isPayed` tinyint(1) NOT NULL DEFAULT '0',
                                      `isAdmin` tinyint(1) NOT NULL DEFAULT '0',
                                      PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
DROP TABLE IF EXISTS `file`;
CREATE TABLE IF NOT EXISTS `file` (
                                      `id` int NOT NULL AUTO_INCREMENT,
                                      `path` varchar(255) NOT NULL,
                                      `filename` varchar(255) NOT NULL,
                                      `description` text,
                                      `user_id` int NOT NULL,
                                      `token` varchar(255) DEFAULT NULL,
                                      `password` varchar(255) DEFAULT NULL,
                                      `isPublic` tinyint(1) DEFAULT '0',
                                      `hasPassword` tinyint(1) DEFAULT '0',
                                      `downloadCount` int NOT NULL DEFAULT '0',
                                      `size` int NOT NULL,
                                      `createdAt` datetime NOT NULL,
                                      PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
                                         `id` int NOT NULL AUTO_INCREMENT,
                                         `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
                                         `user_id` int NOT NULL,
                                         `file_id` int NOT NULL,
                                         `created_at` datetime NOT NULL,
                                         PRIMARY KEY (`id`),
                                         KEY `fk_user` (`user_id`),
                                         KEY `fk_file` (`file_id`),
                                         CONSTRAINT `fk_file` FOREIGN KEY (`file_id`) REFERENCES `file` (`id`),
                                         CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;