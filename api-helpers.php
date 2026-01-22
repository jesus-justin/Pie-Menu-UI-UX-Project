/**
 * API Helper Functions
 * Provides standardized JSON response formats for API endpoints
 */

/**
 * Send JSON success response
 * 
 * @param mixed $data Response data
 * @param string $message Optional success message
 * @param int $statusCode HTTP status code (default 200)
 */
function jsonSuccess($data = null, string $message = 'Success', int $statusCode = 200): void {
    http_response_code($statusCode);
    header('Content-Type: application/json');
    echo json_encode([
        'success' => true,
        'message' => $message,
        'data' => $data,
        'timestamp' => date('c')
    ], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    exit;
}

/**
 * Send JSON error response
 * 
 * @param string $message Error message
 * @param int $statusCode HTTP status code (default 400)
 * @param array $errors Optional validation errors
 */
function jsonError(string $message, int $statusCode = 400, array $errors = []): void {
    http_response_code($statusCode);
    header('Content-Type: application/json');
    echo json_encode([
        'success' => false,
        'message' => $message,
        'errors' => $errors,
        'timestamp' => date('c')
    ], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    exit;
}

/**
 * Validate JSON request body
 * 
 * @return array|null Decoded JSON or null on failure
 */
function getJsonInput(): ?array {
    $input = file_get_contents('php://input');
    if (empty($input)) {
        return null;
    }
    
    $data = json_decode($input, true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        jsonError('Invalid JSON: ' . json_last_error_msg(), 400);
    }
    
    return $data;
}
