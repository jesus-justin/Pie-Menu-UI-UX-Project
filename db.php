<?php
/**
 * Database layer - Connection and user management functions
 * All database operations use prepared statements for security
 */

require_once __DIR__ . '/config.php';

/**
 * Return shared PDO instance.
 */
function getDb(): PDO {
    static $pdo = null;
    if ($pdo instanceof PDO) {
        return $pdo;
    }

    $dsn = sprintf('mysql:host=%s;dbname=%s;charset=utf8mb4', DB_HOST, DB_NAME);
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
        PDO::ATTR_TIMEOUT => 5,
    ];

    try {
        $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
    } catch (PDOException $e) {
        // Log the error for debugging (in production, log to file)
        debugLog('Database connection failed', ['error' => $e->getMessage()]);
        if (defined('DEBUG_MODE') && DEBUG_MODE) {
            error_log('Database connection failed: ' . $e->getMessage());
            exit('Database connection failed. Please check config.php settings.');
        }
        exit('Service temporarily unavailable. Please try again later.');
    }

    return $pdo;
}

/**
 * Fetch user row by username.
 */
function getUserByUsername(PDO $db, string $username): ?array {
    $stmt = $db->prepare('SELECT id, username, password_hash, created_at FROM users WHERE username = :username LIMIT 1');
    $stmt->execute([':username' => $username]);
    $user = $stmt->fetch();
    return $user ?: null;
}

/**
 * Fetch user row by id.
 */
function getUserById(PDO $db, int $id): ?array {
    $stmt = $db->prepare('SELECT id, username, last_login, created_at FROM users WHERE id = :id LIMIT 1');
    $stmt->execute([':id' => $id]);
    $user = $stmt->fetch();
    return $user ?: null;
}

/**
 * Insert a new user record.
 */
function createUser(PDO $db, string $username, string $passwordHash): bool {
    $stmt = $db->prepare('INSERT INTO users (username, password_hash) VALUES (:username, :password_hash)');
    return $stmt->execute([
        ':username' => $username,
        ':password_hash' => $passwordHash,
    ]);
}

/**
 * Update last login timestamp for user.
 */
function updateLastLogin(PDO $db, int $userId): bool {
    $stmt = $db->prepare('UPDATE users SET last_login = CURRENT_TIMESTAMP WHERE id = :id');
    return $stmt->execute([':id' => $userId]);
}

/**
 * Check if user has admin role (placeholder for future role system).
 */
function isUserAdmin(PDO $db, int $userId): bool {
    // TODO: Implement role-based access control
    // For now, check if user ID is 1 (first user = admin)
    return $userId === 1;
}
