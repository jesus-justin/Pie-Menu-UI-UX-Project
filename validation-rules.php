<?php
/**
 * Validation rule definitions and validators
 */

/**
 * Validate required field
 */
function validateRequired($value): bool {
    return !empty($value) && $value !== '' && $value !== '0';
}

/**
 * Validate min length
 */
function validateMinLength($value, int $min): bool {
    return strlen((string)$value) >= $min;
}

/**
 * Validate max length
 */
function validateMaxLength($value, int $max): bool {
    return strlen((string)$value) <= $max;
}

/**
 * Validate between length
 */
function validateBetweenLength($value, int $min, int $max): bool {
    $len = strlen((string)$value);
    return $len >= $min && $len <= $max;
}

/**
 * Validate URL format
 */
function validateUrl(string $value): bool {
    return filter_var($value, FILTER_VALIDATE_URL) !== false;
}

/**
 * Validate IP address
 */
function validateIp(string $value): bool {
    return filter_var($value, FILTER_VALIDATE_IP) !== false;
}

/**
 * Validate numeric value
 */
function validateNumeric($value): bool {
    return is_numeric($value);
}

/**
 * Validate integer value
 */
function validateInteger($value): bool {
    return filter_var($value, FILTER_VALIDATE_INT) !== false;
}

/**
 * Validate array contains only specific values
 */
function validateInArray($value, array $allowed): bool {
    return in_array($value, $allowed, true);
}

/**
 * Validate regex pattern match
 */
function validateRegex(string $value, string $pattern): bool {
    return preg_match($pattern, $value) > 0;
}
