# Security Policy

## Reporting Security Vulnerabilities

If you discover a security vulnerability in this project, please report it by:

1. **Email**: Contact the maintainers directly at security@example.com
2. **Private GitHub Issue**: Use GitHub's private vulnerability reporting feature

Please do **not** report security vulnerabilities through public GitHub issues.

## Security Best Practices

This project implements several security measures:

- **CSRF Protection**: All forms include CSRF tokens
- **Password Hashing**: Using PHP's `password_hash()` with bcrypt
- **Session Security**: Secure session configuration with HTTP-only cookies
- **Input Validation**: Server-side validation for all user inputs
- **SQL Injection Prevention**: Prepared statements with PDO
- **XSS Protection**: Output escaping with `htmlspecialchars()`

## Supported Versions

| Version | Supported          |
| ------- | ------------------ |
| 1.1.x   | :white_check_mark: |
| 1.0.x   | :white_check_mark: |

## Known Security Considerations

- Remember to configure proper session timeout in production
- Ensure HTTPS is enabled for all authentication pages
- Configure secure cookie settings in php.ini
- Implement rate limiting on login attempts (helper provided)
- Review and update dependencies regularly

## Response Timeline

- We aim to acknowledge security reports within 48 hours
- We will provide a fix or mitigation plan within 7 days for critical issues
- Updates will be released as soon as patches are verified
