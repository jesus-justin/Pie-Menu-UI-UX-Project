<?php
http_response_code(404);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Page not found." />
    <link rel="icon" href="/favicon.ico" type="image/x-icon" />
    <title>404 - Page Not Found</title>
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
            <a class="pill-link" href="login.php">Login</a>
        </nav>
    </header>

    <main class="auth-wrapper">
        <section class="auth-card" style="text-align:center;">
            <div class="badge">404</div>
            <h1>Page Not Found</h1>
            <p style="margin-bottom:24px;">The page you're looking for doesn't exist or has been moved.</p>
            <a href="index.php" class="btn btn-primary">Go Home</a>
        </section>
    </main>

    <footer class="site-footer" style="margin-top:40px; padding:20px; text-align:center; color:#e7ecf7; opacity:0.9;">
        <small>© <?php echo date('Y'); ?> Pie Menu Demo • <a href="index.php" style="color:#e7ecf7;">Landing</a></small>
    </footer>
</body>
</html>
