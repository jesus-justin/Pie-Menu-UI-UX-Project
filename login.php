<?php
session_start();
require_once __DIR__ . '/db.php';
require_once __DIR__ . '/utils.php';

$errors = '';
$username = trim($_POST['username'] ?? '');
$registered = isset($_GET['registered']);
$loggedOut = isset($_GET['logged_out']);
$redirect = $_GET['redirect'] ?? $_POST['redirect'] ?? 'home.php';

// Guard against open redirects by allowing only simple php targets in the same app
if (!preg_match('/^[a-zA-Z0-9_-]+\.php$/', $redirect)) {
    $redirect = 'home.php';
}

function e(string $value): string {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Rate limiting check
    if (isRateLimited('login_attempt', MAX_LOGIN_ATTEMPTS, LOGIN_ATTEMPT_WINDOW)) {
        $errors = 'Too many login attempts. Please try again in a few minutes.';
    } else {
        // TODO: Implement rate limiting to prevent brute force attacks
        // Consider: IP-based throttling, account lockout after N failed attempts
        
        $password = $_POST['password'] ?? '';
    $remember = !empty($_POST['remember']);
    $csrf = $_POST['csrf_token'] ?? null;

    if (!isValidCsrf($csrf)) {
        $errors = 'Security check failed. Please refresh and try again.';
    }

    $username = trim($username);
    $password = trim($password);

    if (!$errors && ($username === '' || $password === '')) {
        $errors = 'Please provide both username and password.';
    } elseif (!$errors && !preg_match('/^[A-Za-z0-9_]{3,32}$/', $username)) {
        $errors = 'Invalid username format. Use 3-32 letters, numbers, or underscore.';
    } elseif (!$errors) {
        $db = getDb();
        $user = getUserByUsername($db, $username);
        if ($user && password_verify($password, $user['password_hash'])) {
            // Prevent session fixation
            session_regenerate_id(true);
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            
            // Track last login
            updateLastLogin($db, $user['id']);

            // Extend session lifetime when remember me is checked
            if ($remember) {
                $params = session_get_cookie_params();
                setcookie(session_name(), session_id(), [
                    'expires' => time() + 60 * 60 * 24 * 30,
                    'path' => $params['path'],
                    'domain' => $params['domain'],
                    'secure' => $params['secure'],
                    'httponly' => $params['httponly'],
                    'samesite' => $params['samesite'] ?? 'Strict',
                ]);
            }
            
            header('Location: ' . $redirect);
            exit;
        }
        $errors = 'Invalid username or password.';
    }
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Log in to access your Pie Menu dashboard and interactive navigation." />
    <meta name="theme-color" content="#0a0f1f" />
    <meta name="referrer" content="strict-origin-when-cross-origin" />
    <link rel="icon" href="/favicon.ico" type="image/x-icon" />
    <title>Login - Pie Menu</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/style.css" />
</head>
<body>
    <a href="#main-content" class="skip-link">Skip to main content</a>
    <header class="top-nav">
        <div class="brand"><span class="brand-dot"></span>Pie Menu</div>
        <nav class="nav-links">
            <a href="index.php">Landing</a>
            <a href="home.php">Home</a>
            <a class="pill-link" href="register.php">Register</a>
        </nav>
    </header>

    <main class="auth-wrapper" id="main-content">
        <section class="auth-card">
            <div class="badge">Secure Access</div>
            <h1 id="login-heading">Log In</h1>
            <p>Enter your credentials to access the home page and pie menu demo.</p>

            <?php if ($registered): ?>
                <div class="alert success">Account created successfully. You can log in now.</div>
            <?php endif; ?>

            <?php if ($loggedOut): ?>
                <div class="alert success">You have been logged out.</div>
            <?php endif; ?>

            <?php if ($errors): ?>
                <div class="alert error" role="alert" tabindex="-1"><?php echo e($errors); ?></div>
            <?php endif; ?>

            <form method="post" class="form-grid" novalidate aria-labelledby="login-heading">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input class="form-control" type="text" id="username" name="username" value="<?php echo e($username); ?>" autocomplete="username" pattern="[A-Za-z0-9_]{3,32}" minlength="3" maxlength="32" aria-describedby="username-hint" aria-required="true" required />
                    <span id="username-hint" class="helper" style="display:none;">3-32 characters: letters, numbers, underscore</span>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <div style="position:relative;">
                        <input class="form-control" type="password" id="password" name="password" autocomplete="current-password" minlength="8" aria-required="true" required />
                        <button type="button" class="toggle-password" onclick="togglePassword('password')" aria-label="Show password">👁️</button>
                    </div>
                </div>
                <div class="form-group" style="display:flex;align-items:center;gap:8px;">
                    <input type="checkbox" id="remember" name="remember" style="width:auto;margin:0;" />
                    <label for="remember" style="margin:0;font-weight:normal;cursor:pointer;">Remember me for 30 days</label>
                </div>
                <input type="hidden" name="redirect" value="<?php echo e($redirect); ?>" />
                <input type="hidden" name="csrf_token" value="<?php echo e(ensureCsrfToken()); ?>" />
                <button class="btn btn-primary" type="submit">Log In</button>
                <p class="helper">No account yet? <a class="muted-link" href="register.php">Create one</a>.</p>
            </form>
        </section>
    </main>
    <footer class="site-footer" style="margin-top:40px; padding:20px; text-align:center; color:#e7ecf7; opacity:0.9;">
        <small>© <?php echo date('Y'); ?> Pie Menu Demo • <a href="index.php" style="color:#e7ecf7;">Landing</a> • <a href="register.php" style="color:#e7ecf7;">Register</a></small>
    </footer>
    <script src="assets/js/auth.js"></script>
</body>
</html>
