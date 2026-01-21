<?php
/**
 * Configuration file for Pie Menu UI/UX Project
 * Centralized settings for the application
 */

// Application settings
define('APP_NAME', 'Pie Menu Navigation');
define('APP_VERSION', '1.1.0');
define('APP_DESCRIPTION', 'Interactive pie menu with modern landing page');

// Color scheme
define('PRIMARY_COLOR', '#667eea');
define('SECONDARY_COLOR', '#764ba2');
define('ACCENT_COLOR', '#6fffd2');

// Database connection
define('DB_HOST', $_ENV['DB_HOST'] ?? 'localhost');
define('DB_NAME', $_ENV['DB_NAME'] ?? 'pie_menu_unique');
define('DB_USER', $_ENV['DB_USER'] ?? 'root');
define('DB_PASS', $_ENV['DB_PASS'] ?? '');
define('DB_CHARSET', 'utf8mb4');

// Security constants
define('BCRYPT_COST', 12);
define('MAX_LOGIN_ATTEMPTS', 5);
define('LOGIN_ATTEMPT_WINDOW', 300);

// Session security settings
ini_set('session.cookie_httponly', 1);
ini_set('session.use_strict_mode', 1);
ini_set('session.cookie_samesite', 'Strict');

// Feature toggles
define('SHOW_HERO_SECTION', true);
define('SHOW_FEATURES_SECTION', true);
define('ENABLE_ANALYTICS', false);

// Menu settings
define('MENU_RADIUS', '200px');
define('MENU_ITEM_SIZE', '74px');
define('MENU_ANIMATION_DURATION', '240ms');
