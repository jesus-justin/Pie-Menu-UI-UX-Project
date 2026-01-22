<?php
session_start();

// Clear all session data and destroy the session
$_SESSION = [];

// Delete session cookie
if (ini_get('session.use_cookies')) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
}

// Delete remember-me cookie if exists
if (isset($_COOKIE['remember_token'])) {
    setcookie('remember_token', '', time() - 42000, '/', '', isset($_SERVER['HTTPS']), true);
}

session_destroy();

// Redirect to login with a logged_out flag
header('Location: login.php?logged_out=1');
exit;
