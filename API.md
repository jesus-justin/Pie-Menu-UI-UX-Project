# API Documentation

## Overview

This document describes the utility libraries and helper functions available in the Pie Menu project.

## JavaScript Utilities

### Animation (`assets/js/animations.js`)
- `animate(element, keyframes, options)` - Animate element using Web Animations API
- `fadeIn(element, duration)` - Fade in animation
- `fadeOut(element, duration)` - Fade out animation
- `slideIn(element, direction, duration)` - Slide in from direction
- `scale(element, from, to, duration)` - Scale animation
- `rotate(element, degrees, duration)` - Rotation animation

### Clipboard (`assets/js/clipboard.js`)
- `copyToClipboard(text)` - Copy text to clipboard
- `readFromClipboard()` - Read from clipboard
- `copyElementText(selector)` - Copy element content to clipboard
- `shareData(data)` - Share using Web Share API

### Colors (`assets/js/colors.js`)
- `hexToRgb(hexColor)` - Convert hex to RGB
- `rgbToHex(r, g, b)` - Convert RGB to hex
- `getColorLuminance(hexColor)` - Get color luminance
- `isLightColor(hexColor)` - Check if color is light
- `getContrastColor(hexColor)` - Get contrasting text color
- `lightenColor(hexColor, amount)` - Lighten color
- `darkenColor(hexColor, amount)` - Darken color

### DOM (`assets/js/dom.js`)
- `$(selector)` - Query single element
- `$$(selector)` - Query multiple elements
- `on(element, event, handler)` - Add event listener
- `delegate(parent, selector, event, handler)` - Delegate event handling
- `addClass(element, className)` - Add CSS class
- `removeClass(element, className)` - Remove CSS class
- `toggleClass(element, className)` - Toggle CSS class
- `hasClass(element, className)` - Check for CSS class

### Environment (`assets/js/environment.js`)
- `isMobile()` - Detect mobile device
- `isIOS()` - Detect iOS
- `isAndroid()` - Detect Android
- `isTouchDevice()` - Detect touch capability
- `isDarkMode()` - Detect dark mode preference
- `isLowPowerMode()` - Detect low power mode
- `isSlowConnection()` - Detect slow network
- `supportsWebGL()` - Check WebGL support
- `isOnline()` - Check online status

### Geolocation (`assets/js/geolocation.js`)
- `getCurrentPosition(options)` - Get current location
- `watchPosition(callback, options)` - Watch location changes
- `clearPositionWatch(watchId)` - Stop watching location
- `calculateDistance(lat1, lon1, lat2, lon2)` - Calculate distance between points

### Notifications (`assets/js/notifications.js`)
- `showToast(message, type, duration)` - Show toast notification
- `showSuccess(message, duration)` - Show success toast
- `showError(message, duration)` - Show error toast
- `showWarning(message, duration)` - Show warning toast
- `showInfo(message, duration)` - Show info toast

### Number Format (`assets/js/number-format.js`)
- `formatCurrency(amount, currency, locale)` - Format as currency
- `formatNumber(number, decimals)` - Format with thousands separator
- `formatPercentage(number, decimals)` - Format as percentage
- `formatBytes(bytes)` - Format file size
- `parseFormattedNumber(str)` - Parse formatted number

### Requests (`assets/js/requests.js`)
- `request(url, options)` - Make HTTP request
- `getRequest(url, options)` - GET request
- `postRequest(url, data, options)` - POST request
- `putRequest(url, data, options)` - PUT request
- `deleteRequest(url, options)` - DELETE request
- `retryRequest(fn, maxAttempts, delay)` - Retry with backoff

### Timer (`assets/js/timer.js`)
- `createTimer(callback, interval, options)` - Create a timer
- `sleep(ms)` - Delay function
- `formatDuration(ms)` - Format duration
- `getTimeSince(date)` - Get relative time

### URL (`assets/js/url.js`)
- `parseQueryString(queryString)` - Parse query parameters
- `buildQueryString(params)` - Build query string
- `getQueryParam(name, defaultValue)` - Get single parameter
- `updateUrl(path, params)` - Update URL
- `addUrlParam(name, value)` - Add URL parameter
- `removeUrlParam(name)` - Remove URL parameter
- `hasUrlParam(name)` - Check parameter exists

## PHP Utilities

### Array Helpers (`array-helpers.php`)
- `groupBy(array, key)` - Group by key
- `flattenArray(array)` - Flatten array
- `getChunkCount(array, size)` - Get chunk count
- `arrayUniqueByKey(array, key)` - Get unique by key

### Math Helpers (`math-helpers.php`)
- `getPercentage(value, total)` - Calculate percentage
- `clamp(value, min, max)` - Clamp value
- `lerp(start, end, t)` - Linear interpolation
- `mapRange(value, inMin, inMax, outMin, outMax)` - Map range
- `roundToIncrement(value, increment)` - Round to increment

### File Helpers (`file-helpers.php`)
- `validateFileUpload(file, allowedTypes, maxSize)` - Validate upload
- `generateSafeFilename(filename)` - Safe filename
- `getFileExtension(filename)` - Get extension
- `formatFileSize(bytes)` - Format file size

### Validation Rules (`validation-rules.php`)
- `validateRequired(value)` - Required field
- `validateMinLength(value, min)` - Min length
- `validateMaxLength(value, max)` - Max length
- `validateBetweenLength(value, min, max)` - Between length
- `validateUrl(value)` - URL format
- `validateIp(value)` - IP address
- `validateNumeric(value)` - Numeric
- `validateInteger(value)` - Integer
- `validateInArray(value, allowed)` - In array
- `validateRegex(value, pattern)` - Regex match

## Security Features

- Input validation and sanitization
- CSRF protection on all forms
- Password hashing with bcrypt
- Rate limiting for login attempts
- Bot detection and prevention
- XSS protection via output escaping
- Secure session management
- SQL injection prevention with prepared statements

## Accessibility Features

- ARIA labels and landmarks
- Keyboard navigation support
- High contrast focus states
- Screen reader friendly
- Respects prefers-reduced-motion
- Focus management
- Live regions for dynamic content
