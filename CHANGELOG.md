# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [1.0.0] - 2026-01-12
## [1.1.0] - 2026-01-17

### Added
- Login and Register pages with session-based authentication
- `home.php` hosting the pie menu demo, gated behind login
- Database schema `pie_menu_unique.sql` and PDO helper `db.php`
- Logout endpoint to end sessions cleanly
- Navigation and auth form styles in CSS

### Changed
- Landing page now routes to auth actions; pie menu moved to Home
- README updated with DB setup and auth flow

### Security
- Input trimming and username format restrictions
- Session fixation prevention on successful login

### Added
- Modern landing page with hero section and call-to-action buttons
- Interactive pie menu navigation with smooth animations
- Feature showcase section with emoji icons
- Responsive design for mobile, tablet, and desktop devices
- Accessibility features including focus states and keyboard navigation
- Centralized configuration file for easy customization
- Utility functions for menu rendering and color contrast calculation
- Comprehensive .gitignore file
- Detailed README documentation
- Smooth scroll behavior for better user experience

### Features
- 6 customizable navigation menu items (Home, About, Services, Portfolio, Contact, Blog)
- Color-coded menu buttons with custom hexadecimal colors
- Hover effects with lift animations
- Keyboard support (arrow keys, Enter/Space, Escape)
- Mobile-first responsive design
- Clean, modern purple gradient aesthetic
- Zero build tooling required (vanilla PHP, JS, CSS)

### Improved
- Hero heading now includes text shadow and letter spacing
- Button interactions with active state animations
- Mobile typography scaling for better readability
- Feature cards with hover effects and focus states
- Overall visual hierarchy and user experience

### Developer Experience
- Well-organized codebase structure
- Modular PHP configuration system
- Reusable utility functions
- Clear commit history with semantic versioning
