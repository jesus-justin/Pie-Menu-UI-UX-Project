# Pie Menu (Kando-inspired)

A slim PHP-first recreation of Simon Schneegans' Kando pie menu. This version keeps the interaction model and bold visuals, but removes build tooling and stays fully data-driven from a single `index.php`.

## What you get
- Radial action menu rendered from a PHP array
- Hover/focus tooltip, per-item colors, and smooth reveal
- Keyboard support: arrows to cycle, Enter/Space to activate, Escape to close
- Zero build step: vanilla PHP + JS + CSS

## Quick start
1) Requirements: PHP 8+ (or XAMPP) and a browser.
2) From this folder run the built-in server:
	```bash
	php -S localhost:8080
	```
3) Open http://localhost:8080 to play with the menu.

If you are using XAMPP on Windows, place this folder under `htdocs` (already present here) and browse to `http://localhost/Pie-Menu-UI-UX-Project`.

## Project structure
- index.php — entry point that defines menu data and markup
- assets/css/style.css — visual system, layout, and connector styling
- assets/js/menu.js — radial placement, toggle/keyboard logic, center status panel

## Customizing
- Edit the `$menuItems` array in `index.php` to change labels, colors, links, and descriptions.
- Tweak `--ring-radius` and `--item-size` in `assets/css/style.css` to resize the ring.
- Replace the Google Font in the `<head>` of `index.php` if you prefer a different display face.
- The center status panel mirrors the hovered/focused item; adjust its copy or styles as needed.

## Attribution
- Inspired by the MIT-licensed Kando project by Simon Schneegans: https://github.com/kando-menu/kando
