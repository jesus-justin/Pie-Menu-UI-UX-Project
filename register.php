<?php
session_start();
require_once __DIR__ . '/db.php';
require_once __DIR__ . '/utils.php';

$errors = '';
$username = trim($_POST['username'] ?? '');

function e(string $value): string {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password'] ?? '';
    $confirm = $_POST['confirm_password'] ?? '';
    $csrf = $_POST['csrf_token'] ?? null;

    $username = trim($username);
    $password = trim($password);
    $confirm = trim($confirm);

    if (!isValidCsrf($csrf)) {
        $errors = 'Security check failed. Please refresh and try again.';
    } elseif ($username === '' || $password === '' || $confirm === '') {
        $errors = 'All fields are required.';
    } elseif (!preg_match('/^[A-Za-z0-9_]{3,32}$/', $username)) {
        $errors = 'Username must be 3-32 characters: letters, numbers, underscore.';
    } elseif (strlen($password) < 8) {
        $errors = 'Password must be at least 8 characters long.';
    } elseif ($password !== $confirm) {
        $errors = 'Passwords do not match.';
    } elseif (empty($_POST['terms'])) {
        $errors = 'You must agree to the Terms of Service and Privacy Policy.';
    } else {
        $db = getDb();
        if (getUserByUsername($db, $username)) {
            $errors = 'That username is already taken.';
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            if (createUser($db, $username, $hash)) {
                header('Location: login.php?registered=1');
                exit;
            }
            $errors = 'Something went wrong while creating your account. Please try again.';
        }
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Create a new account to unlock the Pie Menu navigation experience." />
    <link rel="icon" href="/favicon.ico" type="image/x-icon" />
    <title>Register - Pie Menu</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/style.css" />
</head>
<body>
    <header class="top-nav">
        <div class="brand"><span class="brand-dot"></span>Pie Menu</div>
        <nav class="nav-links">
            <a href="index.php">Landing</a>
            <a href="home.php">Home</a>
            <?php if (!empty($_SESSION['user_id'])): ?>
                <span class="pill-link">Hello, <?php echo htmlspecialchars($_SESSION['username'] ?? 'User', ENT_QUOTES, 'UTF-8'); ?></span>
                <a class="pill-link" href="logout.php">Logout</a>
            <?php else: ?>
                <a class="pill-link" href="login.php?redirect=home.php">Login</a>
            <?php endif; ?>
        </nav>
    </header>

    <main class="auth-wrapper">
        <section class="auth-card">
            <div class="badge">Create Account</div>
            <h1 id="register-heading">Register</h1>
            <p>Set up your credentials to access the menu experience.</p>

            <?php if ($errors): ?>
                <div class="alert error" role="alert" tabindex="-1"><?php echo e($errors); ?></div>
            <?php endif; ?>

            <form method="post" class="form-grid" novalidate aria-labelledby="register-heading">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input class="form-control" type="text" id="username" name="username" value="<?php echo e($username); ?>" autocomplete="username" pattern="[A-Za-z0-9_]{3,32}" minlength="3" maxlength="32" aria-describedby="username-hint" required />
                    <span id="username-hint" class="helper" style="display:none;">3-32 characters: letters, numbers, underscore</span>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <div style="position:relative;">
                        <input class="form-control" type="password" id="password" name="password" autocomplete="new-password" minlength="8" required />
                        <button type="button" class="toggle-password" onclick="togglePassword('password')" aria-label="Show password">👁️</button>
                    </div>
                    <span class="helper">At least 8 characters recommended.</span>
                    <div class="strength-meter" aria-live="polite">
                        <div class="strength-meter-bar" id="passwordStrengthBar"></div>
                        <span class="strength-meter-label" id="passwordStrengthLabel" aria-live="polite">Strength: —</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <div style="position:relative;">
                        <input class="form-control" type="password" id="confirm_password" name="confirm_password" autocomplete="new-password" minlength="8" required />
                        <button type="button" class="toggle-password" onclick="togglePassword('confirm_password')" aria-label="Show password">👁️</button>
                    </div>
                    <span class="helper" id="confirmPasswordHint" aria-live="polite"></span>
                </div>
                <div class="form-group" style="display:flex;align-items:center;gap:8px;">
                    <input type="checkbox" id="terms" name="terms" required style="width:auto;margin:0;" />
                    <label for="terms" style="margin:0;font-weight:normal;cursor:pointer;">I agree to the Terms of Service and Privacy Policy</label>
                </div>
                <input type="hidden" name="csrf_token" value="<?php echo e(ensureCsrfToken()); ?>" />
                <button class="btn btn-primary" type="submit">Create Account</button>
                <p class="helper">Already registered? <a class="muted-link" href="login.php">Log in</a>.</p>
            </form>
        </section>
    </main>
    <footer class="site-footer" style="margin-top:40px; padding:20px; text-align:center; color:#e7ecf7; opacity:0.9;">
        <small>© <?php echo date('Y'); ?> Pie Menu Demo • <a href="index.php" style="color:#e7ecf7;">Landing</a> • <a href="login.php" style="color:#e7ecf7;">Login</a></small>
    </footer>
    <script src="assets/js/auth.js"></script>
</body>
</html>
