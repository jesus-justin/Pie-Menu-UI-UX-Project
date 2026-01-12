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
