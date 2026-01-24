<?php
/**
 * Math utilities for calculations
 */

/**
 * Calculate percentage
 * 
 * @param float $value Current value
 * @param float $total Total value
 * @return float Percentage (0-100)
 */
function getPercentage(float $value, float $total): float {
    return ($total > 0) ? ($value / $total) * 100 : 0;
}

/**
 * Clamp value between min and max
 * 
 * @param float $value Value to clamp
 * @param float $min Minimum value
 * @param float $max Maximum value
 * @return float Clamped value
 */
function clamp(float $value, float $min, float $max): float {
    return max($min, min($max, $value));
}

/**
 * Linear interpolation between two values
 * 
 * @param float $start Start value
 * @param float $end End value
 * @param float $t Interpolation factor (0-1)
 * @return float Interpolated value
 */
function lerp(float $start, float $end, float $t): float {
    return $start + ($end - $start) * $t;
}

/**
 * Map value from one range to another
 * 
 * @param float $value Value to map
 * @param float $inMin Input min
 * @param float $inMax Input max
 * @param float $outMin Output min
 * @param float $outMax Output max
 * @return float Mapped value
 */
function mapRange(float $value, float $inMin, float $inMax, float $outMin, float $outMax): float {
    $normalized = ($value - $inMin) / ($inMax - $inMin);
    return $outMin + $normalized * ($outMax - $outMin);
}

/**
 * Round to nearest increment
 * 
 * @param float $value Value to round
 * @param float $increment Rounding increment
 * @return float Rounded value
 */
function roundToIncrement(float $value, float $increment = 1): float {
    return round($value / $increment) * $increment;
}
