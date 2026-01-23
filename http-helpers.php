<?php
/**
 * HTTP header management and response utilities
 */

/**
 * Set JSON response headers
 * 
 * @return void
 */
function setJsonHeaders(): void {
    header('Content-Type: application/json; charset=utf-8');
    header('X-Content-Type-Options: nosniff');
}

/**
 * Set cache headers
 * 
 * @param int $ttl Time to live in seconds
 * @return void
 */
function setCacheHeaders(int $ttl = 3600): void {
    header("Cache-Control: public, max-age={$ttl}");
    header("Expires: " . gmdate('D, d M Y H:i:s T', time() + $ttl));
}

/**
 * Set no-cache headers
 * 
 * @return void
 */
function setNoCacheHeaders(): void {
    header('Cache-Control: no-cache, no-store, must-revalidate, private');
    header('Pragma: no-cache');
    header('Expires: 0');
}

/**
 * Set CORS headers
 * 
 * @param string $origin Allowed origin
 * @return void
 */
function setCorsHeaders(string $origin = '*'): void {
    header("Access-Control-Allow-Origin: {$origin}");
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type, Authorization');
    header('Access-Control-Max-Age: 86400');
}

/**
 * Send HTTP error response
 * 
 * @param int $code HTTP status code
 * @param string $message Error message
 * @return void
 */
function sendErrorResponse(int $code, string $message): void {
    http_response_code($code);
    setJsonHeaders();
    echo json_encode(['error' => $message, 'status' => $code]);
    exit;
}
