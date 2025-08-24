<?php
define('_DIR_', '../');
require_once "db.php";

@mkdir(_DIR_ . 'images/assets');
@mkdir(_DIR_ . 'images/products');

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
// Create products table
if (_is('create_products_table')) {
  $db->squery("CREATE TABLE `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(250) NOT NULL,
  `description` TEXT NOT NULL,
  `images` JSON NOT NULL DEFAULT (JSON_OBJECT()),
  `sku` VARCHAR(100) NOT NULL,
  `category_id` INT NOT NULL,
  `brand` VARCHAR(250) NOT NULL,
  `tags` JSON NOT NULL DEFAULT (JSON_ARRAY()),
  `price` VARCHAR(50) NOT NULL,
  `sale_price` VARCHAR(50) NOT NULL,
  `cost_price` VARCHAR(50) NOT NULL,
  `quantity` INT NOT NULL,
  `alert_qty` INT NOT NULL,
  `weight` VARCHAR(50) NOT NULL,
  `status` ENUM('active', 'inactive','draft') NOT NULL DEFAULT 'active',
  `visibility` ENUM('private', 'public') NOT NULL DEFAULT 'public',
  `uid` VARCHAR(36) NOT NULL DEFAULT (uuid()),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
)");
}
// Alter Table User add column is_seller
if (_is('add_is_seller_column_in_users_table')) {
  $db->squery("ALTER TABLE users ADD `is_seller` TINYINT(1) NOT NULL DEFAULT '0'");
}
// Add profile related columns in users table
if (_is('add_profile_related_columns_in_users_table')) {
  $db->squery("ALTER TABLE users ADD `address` JSON NOT NULL DEFAULT (JSON_OBJECT()), ADD `date_of_birth` DATE DEFAULT NULL, ADD `bio` TEXT DEFAULT NULL, ADD `gender` ENUM('male', 'female','other') NOT NULL DEFAULT 'male'");
}

// Create carts table
if (_is('create_carts_table')) {
  $db->squery("CREATE TABLE `carts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` INT NOT NULL,
  `attributes` JSON NOT NULL DEFAULT (JSON_OBJECT()),
  `user_id` INT NOT NULL,
  `qty` INT NOT NULL,
  `unit_price` VARCHAR(50) NOT NULL,
  `status` ENUM('pending', 'placed') NOT NULL DEFAULT 'pending',
  `uid` VARCHAR(36) NOT NULL DEFAULT (uuid()),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
)");
}

// Create orders table
if (_is('create_orders_table')) {
  $db->squery("CREATE TABLE `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `products` JSON NOT NULL DEFAULT (JSON_OBJECT()),
  `address` JSON NOT NULL DEFAULT (JSON_OBJECT()),
  `user_id` INT NOT NULL,
  `amount` VARCHAR(50) NOT NULL,
  `status` ENUM('pending', 'confirmed','in_transit','completed','cancelled','archived') NOT NULL DEFAULT 'pending',
  `uid` VARCHAR(36) NOT NULL DEFAULT (uuid()),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
)");
}
