DROP DATABASE IF EXISTS `ajaxchatsql`;
CREATE DATABASE `ajaxchatsql` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

DROP USER 'ajaxchatuser'@'localhost';
CREATE USER 'ajaxchatuser'@'localhost' IDENTIFIED BY 'We Love SQL API!';
GRANT ALL PRIVILEGES ON `ajaxchatsql`.* TO 'ajaxchatuser'@'localhost';

USE `ajaxchatsql`;

CREATE TABLE `message` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `text` TEXT NOT NULL,
    `timestamp` TIMESTAMP NOT NULL
);