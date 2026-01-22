# Pie Menu (Kando-inspired)

A slim PHP-first recreation of Simon Schneegans' Kando pie menu with modern authentication and security features.

---

## ✨ Features

### 🎨 Interactive UI
- Modern landing page with hero section
- Interactive radial pie menu with smooth animations
- Fully responsive design (mobile, tablet, desktop)
- Beautiful gradient backgrounds with orbital particle effects
- Zero build step: vanilla PHP + JS + CSS

### 🔐 Security & Authentication
- User registration and login system
- CSRF protection on all forms
- Password strength validation
- Secure session management with remember-me
- Rate limiting helpers
- Input sanitization and validation

### ♿ Accessibility
- Keyboard navigation (arrows to cycle, Enter/Space to activate, Escape to close)
- ARIA labels and landmarks
- Skip-to-content links
- Screen reader friendly
- High contrast focus indicators

### 🚀 Performance
- Font preloading
- Optimized CSS animations
- Efficient database queries
- Static asset caching

## 📋 Requirements

- PHP 8+ (or XAMPP/WAMP)
- MySQL 5.7+
- Modern web browser

## 🚀 Quick Start
1) Requirements: PHP 8+ (or XAMPP), MySQL, and a browser.
2) Create the database and table:
	```sql
	-- In MySQL
	SOURCE pie_menu_unique.sql;
	```
3) Copy `.env.example` to `.env` and configure your database credentials.
4) Configure database credentials in `config.php` (DB_HOST/DB_NAME/DB_USER/DB_PASS).
5) Start PHP locally:
	```bash
	php -S localhost:8080
	```
6) Open http://localhost:8080.
   - Visit `index.php` to Login/Register.
   - After login you’re redirected to `home.php` with the pie menu.

## Project structure
- index.php — landing page (Login/Register)
- home.php — pie menu demo (requires login)
- login.php — credential validation with sessions
- register.php — account creation with hashed passwords
- logout.php — ends session and redirects to login
- pie_menu_unique.sql — database schema
- assets/css/style.css — layout and components
- assets/js/menu.js — radial placement, toggle/keyboard logic

## Customizing
- Edit the `$menuItems` array in `home.php` to change labels, colors, links, and descriptions.
- Tweak `--ring-radius` and `--item-size` in `assets/css/style.css` to resize the ring.
- Replace the Google Font in the `<head>` of `index.php` if you prefer a different display face.
- The center status panel mirrors the hovered/focused item; adjust its copy or styles as needed.

## Attribution
- Inspired by the MIT-licensed Kando project by Simon Schneegans: https://github.com/kando-menu/kando
