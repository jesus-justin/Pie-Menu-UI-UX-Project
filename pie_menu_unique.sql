-- Run these statements in MySQL to set up authentication storage
CREATE DATABASE IF NOT EXISTS pie_menu_unique CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE pie_menu_unique;

CREATE TABLE IF NOT EXISTS users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(64) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;
