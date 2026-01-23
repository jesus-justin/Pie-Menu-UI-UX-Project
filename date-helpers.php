<?php
/**
 * Date and time utilities
 */

/**
 * Get relative time string (e.g., "2 hours ago")
 * 
 * @param string|int $timestamp Timestamp or datetime string
 * @return string Relative time
 */
function getRelativeTime($timestamp): string {
    if (is_string($timestamp)) {
        $timestamp = strtotime($timestamp);
    }
    
    $now = time();
    $diff = $now - $timestamp;
    
    if ($diff < 60) {
        return 'just now';
    } elseif ($diff < 3600) {
        $mins = floor($diff / 60);
        return "{$mins} minute" . ($mins > 1 ? 's' : '') . ' ago';
    } elseif ($diff < 86400) {
        $hours = floor($diff / 3600);
        return "{$hours} hour" . ($hours > 1 ? 's' : '') . ' ago';
    } elseif ($diff < 604800) {
        $days = floor($diff / 86400);
        return "{$days} day" . ($days > 1 ? 's' : '') . ' ago';
    } else {
        return date('M j, Y', $timestamp);
    }
}

/**
 * Check if date is today
 * 
 * @param string|int $date Date to check
 * @return bool
 */
function isToday($date): bool {
    if (is_string($date)) {
        $date = strtotime($date);
    }
    return date('Y-m-d', $date) === date('Y-m-d');
}

/**
 * Get working days between two dates
 * 
 * @param string|int $start Start date
 * @param string|int $end End date
 * @return int Number of working days
 */
function getWorkingDaysBetween($start, $end): int {
    if (is_string($start)) $start = strtotime($start);
    if (is_string($end)) $end = strtotime($end);
    
    $count = 0;
    $current = $start;
    
    while ($current <= $end) {
        $dayOfWeek = date('N', $current);
        if ($dayOfWeek < 6) { // Monday = 1, Friday = 5
            $count++;
        }
        $current = strtotime('+1 day', $current);
    }
    
    return $count;
}
