<?php
/**
 * Array utilities for common operations
 */

/**
 * Group array by key
 * 
 * @param array $array Array to group
 * @param string|callable $key Key or callback
 * @return array Grouped array
 */
function groupBy(array $array, $key): array {
    $result = [];
    
    foreach ($array as $item) {
        if (is_callable($key)) {
            $groupKey = $key($item);
        } else {
            $groupKey = $item[$key] ?? null;
        }
        
        if ($groupKey !== null) {
            $result[$groupKey][] = $item;
        }
    }
    
    return $result;
}

/**
 * Flatten multi-dimensional array
 * 
 * @param array $array Array to flatten
 * @return array Flattened array
 */
function flattenArray(array $array): array {
    $result = [];
    
    foreach ($array as $item) {
        if (is_array($item)) {
            $result = array_merge($result, flattenArray($item));
        } else {
            $result[] = $item;
        }
    }
    
    return $result;
}

/**
 * Get array chunk count
 * 
 * @param array $array Array to chunk
 * @param int $size Chunk size
 * @return int Number of chunks
 */
function getChunkCount(array $array, int $size): int {
    return (int) ceil(count($array) / $size);
}

/**
 * Array unique by key
 * 
 * @param array $array Array to filter
 * @param string $key Key to check
 * @return array Unique array
 */
function arrayUniqueByKey(array $array, string $key): array {
    $seen = [];
    $result = [];
    
    foreach ($array as $item) {
        $value = $item[$key] ?? null;
        if (!isset($seen[$value])) {
            $seen[$value] = true;
            $result[] = $item;
        }
    }
    
    return $result;
}
