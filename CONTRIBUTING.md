# Contributing to Pie Menu Project

Thank you for considering contributing to this project! Here are some guidelines to help you get started.

## How to Contribute

### Reporting Bugs

If you find a bug, please open an issue with:
- A clear description of the problem
- Steps to reproduce
- Expected vs actual behavior
- Browser/PHP version information
- Screenshots if applicable

### Suggesting Features

Feature suggestions are welcome! Please:
- Check if the feature has already been requested
- Provide a clear use case
- Explain how it benefits users
- Consider implementation complexity

### Pull Requests

1. **Fork** the repository
2. **Create** a feature branch (`git checkout -b feature/amazing-feature`)
3. **Make** your changes
4. **Test** thoroughly
5. **Commit** with clear messages (`git commit -m 'Add amazing feature'`)
6. **Push** to your branch (`git push origin feature/amazing-feature`)
7. **Open** a Pull Request

### Code Style

- **PHP**: Follow PSR-12 coding standards
- **JavaScript**: Use ES6+ features, semicolons, 2-space indentation
- **CSS**: Use meaningful class names, maintain consistent formatting
- **Comments**: Write clear comments for complex logic

### Testing Checklist

Before submitting a PR, ensure:
- [ ] Code works in Chrome, Firefox, and Safari
- [ ] Mobile responsive design is maintained
- [ ] No console errors or warnings
- [ ] Forms validate properly
- [ ] Security best practices followed
- [ ] Accessibility standards met (WCAG 2.1 AA)
- [ ] No SQL injection vulnerabilities
- [ ] CSRF tokens included in forms
- [ ] Input sanitization applied

### Commit Message Guidelines

Use clear, descriptive commit messages:
- **feat**: New feature
- **fix**: Bug fix
- **docs**: Documentation changes
- **style**: Code style/formatting
- **refactor**: Code restructuring
- **test**: Adding tests
- **chore**: Maintenance tasks

Example: `feat: Add email verification to registration`

### Code Review Process

1. Maintainers will review your PR within a few days
2. Address any requested changes
3. Once approved, your PR will be merged
4. You'll be credited in the commit history

## Development Setup

```bash
# Clone your fork
git clone https://github.com/YOUR-USERNAME/Pie-Menu-UI-UX-Project.git
cd Pie-Menu-UI-UX-Project

# Set up environment
cp .env.example .env

# Import database
mysql -u root -p < pie_menu_unique.sql

# Start development server
php -S localhost:8000
```

## Need Help?

- Check existing issues and discussions
- Ask questions in issue comments
- Be patient and respectful

Thank you for contributing! 🎉
