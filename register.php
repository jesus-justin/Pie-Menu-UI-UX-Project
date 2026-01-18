<?php
session_start();
require_once __DIR__ . '/db.php';

$errors = '';
$username = trim($_POST['username'] ?? '');

function e(string $value): string {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password'] ?? '';
    $confirm = $_POST['confirm_password'] ?? '';
    $username = trim($username);
    $password = trim($password);
    $confirm = trim($confirm);

    if ($username === '' || $password === '' || $confirm === '') {
        $errors = 'All fields are required.';
    } elseif (!preg_match('/^[A-Za-z0-9_]{3,32}$/', $username)) {
        $errors = 'Username must be 3-32 characters: letters, numbers, underscore.';
    } elseif (strlen($password) < 8) {
        $errors = 'Password must be at least 8 characters long.';
    } elseif ($password !== $confirm) {
        $errors = 'Passwords do not match.';
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
            <h1>Register</h1>
            <p>Set up your credentials to access the menu experience.</p>

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
                    <input class="form-control" type="password" id="password" name="password" autocomplete="new-password" required />
                    <span class="helper">At least 8 characters recommended.</span>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input class="form-control" type="password" id="confirm_password" name="confirm_password" autocomplete="new-password" required />
                </div>
                <button class="btn btn-primary" type="submit">Create Account</button>
                <p class="helper">Already registered? <a class="muted-link" href="login.php">Log in</a>.</p>
            </form>
        </section>
    </main>
</body>
</html>
