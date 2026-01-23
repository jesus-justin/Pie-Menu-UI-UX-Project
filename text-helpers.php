<?php
/**
 * String manipulation and text utilities
 */

/**
 * Truncate string to length with ellipsis
 * 
 * @param string $str String to truncate
 * @param int $length Maximum length
 * @param string $suffix Suffix to add
 * @return string Truncated string
 */
function truncateString(string $str, int $length = 50, string $suffix = '...'): string {
    if (strlen($str) <= $length) {
        return $str;
    }
    return substr($str, 0, $length - strlen($suffix)) . $suffix;
}

/**
 * Convert string to slug format
 * 
 * @param string $str String to slugify
 * @return string Slug
 */
function slugify(string $str): string {
    $str = mb_strtolower($str, 'UTF-8');
    $str = preg_replace('/[^a-z0-9]+/', '-', $str);
    return trim($str, '-');
}

/**
 * Convert camelCase to kebab-case
 * 
 * @param string $str CamelCase string
 * @return string kebab-case string
 */
function camelToKebab(string $str): string {
    return strtolower(preg_replace('/(?<!^)([A-Z])/', '-$1', $str));
}

/**
 * Highlight search term in text
 * 
 * @param string $text Text to search in
 * @param string $term Term to highlight
 * @param string $tag HTML tag to wrap with
 * @return string Highlighted text
 */
function highlightText(string $text, string $term, string $tag = 'mark'): string {
    if (empty($term)) {
        return $text;
    }
    $pattern = '/' . preg_quote($term, '/') . '/i';
    return preg_replace($pattern, "<{$tag}>$0</{$tag}>", $text);
}
