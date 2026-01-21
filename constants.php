/**
 * Application constants
 */

// Version information
const APP_VERSION = '1.0.0';
const API_VERSION = 'v1';

// Validation rules
const USERNAME_MIN_LENGTH = 3;
const USERNAME_MAX_LENGTH = 32;
const PASSWORD_MIN_LENGTH = 8;
const PASSWORD_MAX_LENGTH = 128;

// Session constants
const REMEMBER_ME_DURATION = 2592000; // 30 days in seconds
const SESSION_TIMEOUT = 3600; // 1 hour

// Pagination
const DEFAULT_PAGE_SIZE = 20;
const MAX_PAGE_SIZE = 100;

// File upload limits (in bytes)
const MAX_AVATAR_SIZE = 2097152; // 2MB
const ALLOWED_IMAGE_TYPES = ['image/jpeg', 'image/png', 'image/webp'];

// Rate limiting
const RATE_LIMIT_LOGIN = 5;
const RATE_LIMIT_REGISTER = 3;
const RATE_LIMIT_WINDOW = 300; // 5 minutes

// HTTP status codes
const HTTP_OK = 200;
const HTTP_CREATED = 201;
const HTTP_BAD_REQUEST = 400;
const HTTP_UNAUTHORIZED = 401;
const HTTP_FORBIDDEN = 403;
const HTTP_NOT_FOUND = 404;
const HTTP_INTERNAL_ERROR = 500;

// Error messages
const ERROR_INVALID_CREDENTIALS = 'Invalid username or password.';
const ERROR_USERNAME_TAKEN = 'That username is already taken.';
const ERROR_CSRF_INVALID = 'Security check failed. Please refresh and try again.';
const ERROR_RATE_LIMITED = 'Too many attempts. Please try again later.';
const ERROR_REQUIRED_FIELDS = 'All fields are required.';
const ERROR_PASSWORD_MISMATCH = 'Passwords do not match.';
const ERROR_TERMS_REQUIRED = 'You must agree to the Terms of Service.';

// Success messages
const SUCCESS_REGISTERED = 'Account created successfully. You can log in now.';
const SUCCESS_LOGIN = 'Welcome back!';
const SUCCESS_LOGOUT = 'You have been logged out.';
