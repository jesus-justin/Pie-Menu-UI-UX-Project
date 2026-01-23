<?php
/**
 * Request logging and analytics helpers
 */

/**
 * Log page view
 * 
 * @param string $page Page identifier
 * @param string $referrer Referrer URL
 * @return void
 */
function logPageView(string $page, string $referrer = ''): void {
    $timestamp = date('Y-m-d H:i:s');
    $userAgent = $_SERVER['HTTP_USER_AGENT'] ?? 'Unknown';
    $ip = $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';
    
    $log = "[{$timestamp}] Page: {$page} | IP: {$ip} | Referrer: {$referrer}\n";
    
    if (defined('DEBUG_MODE') && DEBUG_MODE) {
        error_log($log, 3, __DIR__ . '/logs/pageviews.log');
    }
}

/**
 * Log API request
 * 
 * @param string $endpoint API endpoint
 * @param string $method HTTP method
 * @param int $statusCode Response status
 * @return void
 */
function logApiRequest(string $endpoint, string $method, int $statusCode): void {
    $timestamp = date('Y-m-d H:i:s');
    $log = "[{$timestamp}] API: {$method} {$endpoint} - Status: {$statusCode}\n";
    
    if (defined('DEBUG_MODE') && DEBUG_MODE) {
        error_log($log, 3, __DIR__ . '/logs/api.log');
    }
}

/**
 * Get request duration in milliseconds
 * 
 * @return float Duration
 */
function getRequestDuration(): float {
    if (!defined('REQUEST_START_TIME')) {
        return 0;
    }
    return (microtime(true) - REQUEST_START_TIME) * 1000;
}
