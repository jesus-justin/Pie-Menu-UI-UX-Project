# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [1.2.0] - 2026-01-23

### Added
- Cache management helper functions
- Request logging and analytics helpers
- HTTP header management utilities
- String manipulation utilities (truncate, slugify, highlight)
- Form validation and debounce utilities
- localStorage utility functions with error handling
- EditorConfig for consistent code style
- package.json with project metadata
- Client IP detection helper function
- Prefers-reduced-motion media query support
- Menu keyboard navigation focus management
- aria-live attributes for accessibility

### Changed
- Database connection timeout configuration
- CSS custom properties for shadows and border radius
- Enhanced password strength meter accessibility
- Improved logout function to clear remember-me cookies
- Username normalization using cleanInput

## [1.1.0] - 2026-01-21

### Added
- Environment configuration template (.env.example)
- Application constants file for centralized config
- 404 error page
- XML sitemap for SEO
- Security policy documentation (SECURITY.md)
- Contributing guidelines (CONTRIBUTING.md)
- Skip-to-content accessibility links
- ARIA attributes for better screen reader support
- Theme-color meta tags for mobile browsers
- Font preloading for performance
- Rate limiting helpers in utils.php
- Email validation function
- Form double-submission prevention
- Mobile responsive layout improvements
- Strict mode in JavaScript files
- Enhanced focus visibility for buttons

### Changed
- Improved README with comprehensive feature list
- Enhanced password toggle button styling
- Better error alert accessibility with role and tabindex
- Live username validation feedback
- Updated meta tags with security headers
- Environment-based database configuration

### Security
- Added CSRF token validation to all forms
- Implemented password strength meter
- Added remember-me session persistence
- Enforced terms acceptance on registration
- Added security constants to config
- HTTP security headers via .htaccess

## [1.0.0] - 2026-01-15

### Added
- Initial release
- Pie menu navigation system
- User authentication (login/register)
- Session management
- Database schema
- Responsive CSS design
- Interactive JavaScript menu
- Landing page
- Home dashboard

[1.1.0]: https://github.com/jesus-justin/Pie-Menu-UI-UX-Project/compare/v1.0.0...v1.1.0
[1.0.0]: https://github.com/jesus-justin/Pie-Menu-UI-UX-Project/releases/tag/v1.0.0

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
