<?php
$menuItems = [
    [
        'label' => 'Sketch',
        'description' => 'Rough ideas with zero friction.',
        'href' => '#sketch',
        'color' => '#5de4c7',
    ],
    [
        'label' => 'Prototype',
        'description' => 'Wire interactions before code.',
        'href' => '#prototype',
        'color' => '#7ec8ff',
    ],
    [
        'label' => 'Build',
        'description' => 'Ship components with intent.',
        'href' => '#build',
        'color' => '#ffd166',
    ],
    [
        'label' => 'Test',
        'description' => 'Validate flows with users.',
        'href' => '#test',
        'color' => '#f7a8ff',
    ],
    [
        'label' => 'Measure',
        'description' => 'Track what matters.',
        'href' => '#measure',
        'color' => '#9ae66e',
    ],
    [
        'label' => 'Launch',
        'description' => 'Push to production with calm.',
        'href' => '#launch',
        'color' => '#ffa38f',
    ],
];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Kando-inspired radial pie menu built with PHP" />
    <title>Kando-inspired Pie Menu (PHP)</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600&display=swap" rel="stylesheet" />
    <!-- Kando-inspired Pie Menu v1.0 -->
    <link rel="stylesheet" href="assets/css/style.css" />
</head>
<body>
    <main class="page">
        <header class="hero" style="display: none;">
            <p class="eyebrow">Kando-inspired</p>
            <h1>Radial action menu</h1>
            <p class="lede">A compact PHP-first recreation of the Kando pie menu. Data-driven, keyboard-friendly, and ready to drop into a XAMPP project.</p>
            <div class="cta-row">
                <button class="chip" id="chipToggle">Toggle menu</button>
                <span class="hint">Press Space or Enter while the toggle is focused.</span>
            </div>
        </header>

        <section class="canvas" aria-label="Interactive pie menu">
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
                <div class="menu-label">menu</div>
                <div class="menu-center" aria-live="polite" style="display: none;">
                    <p class="center-eyebrow">Selected</p>
                    <h3 id="centerTitle">Open menu</h3>
                    <p id="centerDesc">Press the toggle to explore the actions.</p>
                </div>
                <div id="kando-ring" class="menu-ring" role="navigation" aria-label="Primary actions"></div>
                <div class="menu-tooltip" id="menuTooltip" role="status" aria-live="polite" style="display: none;"></div>
            </div>
        </section>

        <section class="notes" id="sketch" style="display: none;">
            <h2>What changed vs. upstream</h2>
            <ul>
                <li>Slimmed to a single PHP page with static data; no build tooling required.</li>
                <li>Menu items are injected from a PHP array and rendered on the client.</li>
                <li>Keyboard navigation (arrow keys) and Escape to collapse.</li>
                <li>CSS-driven reveal animation, with custom color per slice.</li>
                <li>Minimal dependencies: vanilla PHP + vanilla JS.</li>
            </ul>
        </section>
    </main>

    <script>
        window.KANDO_MENU = <?php echo json_encode($menuItems, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>;
    </script>
    <script src="assets/js/menu.js"></script>
</body>
</html>
