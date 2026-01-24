<?php
/**
 * File upload utilities
 */

/**
 * Validate file upload
 * 
 * @param array $file $_FILES array
 * @param array $allowedTypes Allowed MIME types
 * @param int $maxSize Max file size in bytes
 * @return array ['valid' => bool, 'error' => string|null]
 */
function validateFileUpload(array $file, array $allowedTypes = [], int $maxSize = 5242880): array {
    if (!isset($file['tmp_name']) || $file['error'] !== UPLOAD_ERR_OK) {
        return [
            'valid' => false,
            'error' => 'File upload failed'
        ];
    }
    
    if ($file['size'] > $maxSize) {
        return [
            'valid' => false,
            'error' => 'File size exceeds limit'
        ];
    }
    
    if (!empty($allowedTypes)) {
        $mimeType = mime_content_type($file['tmp_name']);
        if (!in_array($mimeType, $allowedTypes)) {
            return [
                'valid' => false,
                'error' => 'File type not allowed'
            ];
        }
    }
    
    return ['valid' => true];
}

/**
 * Generate safe filename
 * 
 * @param string $filename Original filename
 * @return string Safe filename
 */
function generateSafeFilename(string $filename): string {
    $filename = preg_replace('/[^a-zA-Z0-9._-]/', '', $filename);
    $filename = preg_replace('/\.{2,}/', '.', $filename);
    return substr($filename, 0, 255);
}

/**
 * Get file extension
 * 
 * @param string $filename Filename
 * @return string Extension
 */
function getFileExtension(string $filename): string {
    $parts = explode('.', $filename);
    return strtolower(end($parts));
}

/**
 * Format file size for display
 * 
 * @param int $bytes Size in bytes
 * @return string Formatted size
 */
function formatFileSize(int $bytes): string {
    $units = ['B', 'KB', 'MB', 'GB', 'TB'];
    $bytes = max($bytes, 0);
    $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
    $pow = min($pow, count($units) - 1);
    $bytes /= (1 << (10 * $pow));
    
    return round($bytes, 2) . ' ' . $units[$pow];
}
