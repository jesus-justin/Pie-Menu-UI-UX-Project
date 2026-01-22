<?php
/**
 * Utility functions for Pie Menu project
 */

/**
 * Sanitize HTML output
 */
function sanitize($input) {
    return htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
}

/**
 * Generate menu item HTML
 */
function renderMenuItem($label, $description, $color) {
    return [
        'label' => sanitize($label),
        'description' => sanitize($description),
        'color' => sanitize($color)
    ];
}

/**
 * Get contrast color for text based on background
 */
function getContrastColor($hexColor) {
    // Remove # if present
    $hex = str_replace('#', '', $hexColor);
    
    // Convert to RGB
    $r = hexdec(substr($hex, 0, 2));
    $g = hexdec(substr($hex, 2, 2));
    $b = hexdec(substr($hex, 4, 2));
    
    // Calculate luminance
    $luminance = (0.299 * $r + 0.587 * $g + 0.114 * $b) / 255;
    
    return $luminance > 0.5 ? '#000000' : '#FFFFFF';
}

/**
 * Check if script is running in CLI mode
 */
function isCliMode() {
    return php_sapi_name() === 'cli';
}

/**
 * Enhanced input trimming and normalization
 */
function cleanInput(string $input): string {
    return trim(preg_replace('/\s+/', ' ', $input));
}

/**
 * Validate username format
 */
function isValidUsername(string $username): bool {
    return (bool) preg_match('/^[A-Za-z0-9_]{3,32}$/', $username);
}

/**
 * Get total user count from database
 */
function getUserCount(PDO $db): int {
    $stmt = $db->query('SELECT COUNT(*) FROM users');
    return (int) $stmt->fetchColumn();
}

/**
 * Sanitize output for HTML display
 * 
 * @param string $text Text to sanitize
 * @return string HTML-safe text
 */
function sanitizeOutput(string $text): string {
    return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
}

/**
 * Format timestamp for display
 */
function formatTimestamp(?string $timestamp): string {
    if (!$timestamp) {
        return 'Never';
    }
    $date = new DateTime($timestamp);
    return $date->format('M j, Y g:i A');
}

/**
 * CSRF helpers
 */
function ensureCsrfToken(): string {
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function isValidCsrf(?string $token): bool {
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
    return is_string($token) && hash_equals($_SESSION['csrf_token'] ?? '', $token);
}

/**
 * Validate email format
 */
function isValidEmail(string $email): bool {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

/**
 * Generate a secure random token
 */
function generateSecureToken(int $length = 32): string {
    return bin2hex(random_bytes($length));
}

/**
 * Rate limiting helper - check if action is allowed
 */
function isRateLimited(string $key, int $maxAttempts = 5, int $windowSeconds = 300): bool {
    if (!isset($_SESSION['rate_limit'])) {
        $_SESSION['rate_limit'] = [];
    }

    $now = time();
    $attempts = &$_SESSION['rate_limit'][$key];

    if (!isset($attempts) || ($now - $attempts['first']) > $windowSeconds) {
        $attempts = ['first' => $now, 'count' => 1];
        return false;
    }

    $attempts['count']++;
    return $attempts['count'] > $maxAttempts;
}

/**
 * Validate password strength
 */
function validatePasswordStrength(string $password): array {
    $errors = [];
    
    if (strlen($password) < 8) {
        $errors[] = 'Password must be at least 8 characters long';
    }
    if (!preg_match('/[A-Z]/', $password)) {
        $errors[] = 'Password must contain at least one uppercase letter';
    }
    if (!preg_match('/[a-z]/', $password)) {
        $errors[] = 'Password must contain at least one lowercase letter';
    }
    if (!preg_match('/[0-9]/', $password)) {
        $errors[] = 'Password must contain at least one number';
    }
    
    return $errors;
}

/**
 * Log debug message when debug mode is enabled
 */
function debugLog(string $message, array $context = []): void {
    if (defined('DEBUG_MODE') && DEBUG_MODE) {
        $timestamp = date('Y-m-d H:i:s');
        $contextStr = !empty($context) ? ' ' . json_encode($context) : '';
        error_log("[{$timestamp}] {$message}{$contextStr}");
    }
}
