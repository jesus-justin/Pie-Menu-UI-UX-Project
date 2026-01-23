<?php
/**
 * Cache management helpers for performance optimization
 */

/**
 * Get cache key for user data
 * 
 * @param int $userId User ID
 * @return string Cache key
 */
function getUserCacheKey(int $userId): string {
    return "user_{$userId}";
}

/**
 * Get cache key for menu items
 * 
 * @return string Cache key
 */
function getMenuCacheKey(): string {
    return "menu_items";
}

/**
 * Check if cache has expired
 * 
 * @param int $timestamp Cache timestamp
 * @param int $ttl Time to live in seconds
 * @return bool True if expired
 */
function isCacheExpired(int $timestamp, int $ttl = 3600): bool {
    return (time() - $timestamp) > $ttl;
}

/**
 * Generate cache version hash
 * 
 * @param string $data Data to hash
 * @return string Version hash
 */
function generateCacheVersion(string $data): string {
    return hash('xxh3', $data);
}
