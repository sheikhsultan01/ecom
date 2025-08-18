<?php
define('_DIR_', '../');
require_once "db.php";

@mkdir(_DIR_ . 'images/assets');

// Meta Data Table
$db->squery("CREATE TABLE IF NOT EXISTS `meta_data` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `meta_key` varchar(250) NOT NULL,
    `meta_value` varchar(250) NOT NULL,
    `meta_json` text NOT NULL,
    `time` timestamp NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`id`)
    ) ENGINE=InnoDB;");

// Create Table Users
if (_is('create_table_users')) {
  $db->squery("CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(250) NOT NULL,
  `lname` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `image` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `verify_status` int NOT NULL DEFAULT '0',
  `verify_token` varchar(250) NOT NULL,
  `password_forgot_token` varchar(250) NOT NULL,
  `token_expiry_date` timestamp NULL DEFAULT NULL,
  `uid` varchar(250) NOT NULL DEFAULT (UUID()),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
)");
}
// Create Categories table
if (_is('create_categories_table')) {
  $db->squery("CREATE TABLE `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `slug` varchar(250) NOT NULL,
  `description` TEXT NOT NULL,
  `image` varchar(250) NOT NULL,
  `status` ENUM('active', 'inactive') NOT NULL DEFAULT 'active',
  `parent_id` INT NOT NULL DEFAULT '0',
  `uid` varchar(36) NOT NULL DEFAULT (uuid()),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
)");
}
