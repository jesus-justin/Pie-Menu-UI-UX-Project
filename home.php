<?php
session_start();

if (empty($_SESSION['user_id'])) {
    header('Location: login.php?redirect=home.php');
    exit;
}

$menuItems = [
    [
        'label' => 'Home',
        'description' => 'Return to the main page.',
        'href' => '#home',
        'color' => '#5de4c7',
    ],
    [
        'label' => 'About',
        'description' => 'Learn more about us.',
        'href' => '#about',
        'color' => '#7ec8ff',
    ],
    [
        'label' => 'Services',
        'description' => 'Explore what we offer.',
        'href' => '#services',
        'color' => '#ffd166',
    ],
    [
        'label' => 'Portfolio',
        'description' => 'View our featured work.',
        'href' => '#portfolio',
        'color' => '#f7a8ff',
    ],
    [
        'label' => 'Contact',
        'description' => 'Get in touch with us.',
        'href' => '#contact',
        'color' => '#9ae66e',
    ],
    [
        'label' => 'Blog',
        'description' => 'Read our latest articles.',
        'href' => '#blog',
        'color' => '#ffa38f',
    ],
];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Pie menu home page" />
    <title>Home - Pie Menu</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        html { scroll-behavior: smooth; }
        body {
            font-family: 'Space Grotesk', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            overflow-x: hidden;
        }
        .landing-container { min-height: 100vh; display: flex; flex-direction: column; }
        .hero-section { flex: 1; display: flex; align-items: center; justify-content: center; padding: 40px 20px; position: relative; }
        .hero-content { max-width: 1200px; width: 100%; display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: center; }
        .hero-text { color: white; }
        .hero-text h1 { font-size: 3.5rem; font-weight: 700; margin-bottom: 20px; line-height: 1.2; text-shadow: 0 4px 20px rgba(0, 0, 0, 0.2); letter-spacing: -0.5px; }
        .hero-text p { font-size: 1.25rem; margin-bottom: 30px; opacity: 0.95; line-height: 1.6; }
        .cta-buttons { display: flex; gap: 15px; flex-wrap: wrap; }
        .hero-visual { position: relative; display: flex; align-items: center; justify-content: center; min-height: 500px; }
        .menu-container { position: relative; width: 100%; height: 500px; display: flex; align-items: center; justify-content: center; }
        .features-section { background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); padding: 60px 20px; margin-top: 40px; }
        .features-grid { max-width: 1200px; margin: 0 auto; display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px; }
        .feature-card { background: rgba(255,255,255,0.95); padding: 30px; border-radius: 15px; text-align: center; transition: transform 0.3s ease; cursor: pointer; }
        .feature-card:focus-within { outline: 2px solid #667eea; outline-offset: 4px; }
        .feature-card:hover { transform: translateY(-5px); }
        .feature-icon { font-size: 3rem; margin-bottom: 15px; }
        .feature-card h3 { color: #667eea; margin-bottom: 10px; font-size: 1.3rem; }
        .feature-card p { color: #555; line-height: 1.6; }
        .instruction-text { position: absolute; top: 20px; left: 50%; transform: translateX(-50%); background: rgba(255,255,255,0.95); padding: 12px 24px; border-radius: 30px; color: #667eea; font-weight: 600; box-shadow: 0 5px 20px rgba(0,0,0,0.1); animation: pulse 2s infinite; }
        @keyframes pulse { 0%, 100% { transform: translateX(-50%) scale(1); } 50% { transform: translateX(-50%) scale(1.05); } }
        @media (max-width: 968px) {
            .hero-content { grid-template-columns: 1fr; gap: 40px; text-align: center; }
            .hero-text h1 { font-size: 2.5rem; }
            .hero-text p { font-size: 1.1rem; }
            .cta-buttons { justify-content: center; }
        }
    </style>
</head>
<body>
        <header class="top-nav">
            <div class="brand"><span class="brand-dot"></span>Pie Menu</div>
            <nav class="nav-links">
                <span class="pill-link">Hello, <?php echo htmlspecialchars($_SESSION['username'] ?? 'User', ENT_QUOTES, 'UTF-8'); ?></span>
                <a href="index.php">Landing</a>
                <a class="pill-link" href="logout.php">Logout</a>
            </nav>
        </header>

    <div class="landing-container">
        <section class="hero-section">
            <div class="hero-content">
                <div class="hero-text">
                    <h1>Home & Pie Menu Demo</h1>
                    <p>Explore the interactive radial navigation. Use the menu toggle to spin through the actions and see contextual details.</p>
                    <div class="cta-buttons">
                        <button class="btn btn-primary" type="button" onclick="document.getElementById('menuToggle').click()">Open Menu</button>
                        <a class="btn btn-secondary" href="index.php">Go to Landing</a>
                    </div>
                </div>
                
                <div class="hero-visual">
                    <div class="menu-container">
                        <div class="instruction-text">👆 Click the menu button</div>
                        <div class="ring-shell" data-open="false">
                            <div class="ring-axis"></div>
                            <button class="menu-toggle" aria-expanded="false" aria-controls="kando-ring" id="menuToggle">
                                <div class="toggle-icon">
                                    <span class="icon-bar bar-1"></span>
                                    <span class="icon-bar bar-2"></span>
                                    <span class="icon-bar bar-3"></span>
                                    <div class="icon-glow"></div>
                                </div>
                                <div class="toggle-content" style="display: none;">
                                    <span class="toggle-label">Open menu</span>
                                    <span class="toggle-sub">6 focusable actions</span>
                                </div>
                                <div class="toggle-shimmer"></div>
                            </button>
                            <div class="menu-label">MENU</div>
                            <div class="menu-center" aria-live="polite" style="display: none;">
                                <p class="center-eyebrow">Selected</p>
                                <h3 id="centerTitle">Open menu</h3>
                                <p id="centerDesc">Press the toggle to explore the actions.</p>
                            </div>
                            <div id="kando-ring" class="menu-ring" role="navigation" aria-label="Primary actions"></div>
                            <div class="menu-tooltip" id="menuTooltip" role="status" aria-live="polite" style="display: none;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="features-section">
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">🚀</div>
                    <h3>Fast & Intuitive</h3>
                    <p>Navigate with lightning speed using our radial menu design.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🎨</div>
                    <h3>Beautiful Design</h3>
                    <p>Stunning visuals with smooth animations and modern aesthetics.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">⌨️</div>
                    <h3>Keyboard Friendly</h3>
                    <p>Full keyboard support with arrow keys and shortcuts.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">📱</div>
                    <h3>Responsive</h3>
                    <p>Works perfectly on all devices and screen sizes.</p>
                </div>
            </div>
        </section>
    </div>

    <script>
        window.KANDO_MENU = <?php echo json_encode($menuItems, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>;
    </script>
    <script src="assets/js/menu.js"></script>
</body>
</html>
