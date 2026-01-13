<?php
session_start();
require_once __DIR__ . '/db.php';

$errors = '';
$username = trim($_POST['username'] ?? '');
$registered = isset($_GET['registered']);
$redirect = $_GET['redirect'] ?? $_POST['redirect'] ?? 'home.php';

// Guard against open redirects by allowing only simple php targets in the same app
if (!preg_match('/^[a-zA-Z0-9_-]+\.php$/', $redirect)) {
    $redirect = 'home.php';
}

function e(string $value): string {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password'] ?? '';

    if ($username === '' || $password === '') {
        $errors = 'Please provide both username and password.';
    } else {
        $db = getDb();
        $user = getUserByUsername($db, $username);
        if ($user && password_verify($password, $user['password_hash'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header('Location: ' . $redirect);
            exit;
        }
        $errors = 'Invalid username or password.';
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Pie Menu</title>
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
            <a class="pill-link" href="register.php">Register</a>
        </nav>
    </header>

    <main class="auth-wrapper">
        <section class="auth-card">
            <div class="badge">Secure Access</div>
            <h1>Log In</h1>
            <p>Enter your credentials to access the home page and pie menu demo.</p>

            <?php if ($registered): ?>
                <div class="alert success">Account created successfully. You can log in now.</div>
            <?php endif; ?>

            <?php if ($errors): ?>
                <div class="alert error"><?php echo e($errors); ?></div>
            <?php endif; ?>

            <form method="post" class="form-grid" novalidate>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input class="form-control" type="text" id="username" name="username" value="<?php echo e($username); ?>" autocomplete="username" required />
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" id="password" name="password" autocomplete="current-password" required />
                </div>
                <input type="hidden" name="redirect" value="<?php echo e($redirect); ?>" />
                <button class="btn btn-primary" type="submit">Log In</button>
                <p class="helper">No account yet? <a class="muted-link" href="register.php">Create one</a>.</p>
            </form>
        </section>
    </main>
</body>
</html>
