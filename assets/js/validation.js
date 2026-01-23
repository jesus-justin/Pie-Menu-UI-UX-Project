/**
 * Form validation utilities
 */

/**
 * Validate form input on blur
 */
function validateOnBlur(inputId, validatorFn, errorMessage) {
  const input = document.getElementById(inputId);
  if (!input) return;

  input.addEventListener('blur', () => {
    const isValid = validatorFn(input.value);
    const parent = input.parentElement;
    
    // Remove existing error
    const existingError = parent.querySelector('.validation-error');
    if (existingError) {
      existingError.remove();
    }
    
    // Add new error if invalid
    if (!isValid && input.value.length > 0) {
      input.setAttribute('aria-invalid', 'true');
      const error = document.createElement('span');
      error.className = 'validation-error';
      error.textContent = errorMessage;
      error.setAttribute('role', 'alert');
      parent.appendChild(error);
    } else {
      input.removeAttribute('aria-invalid');
    }
  });
}

/**
 * Debounce function for input events
 */
function debounce(func, wait = 300) {
  let timeout;
  return function executedFunction(...args) {
    const later = () => {
      clearTimeout(timeout);
      func(...args);
    };
    clearTimeout(timeout);
    timeout = setTimeout(later, wait);
  };
}

/**
 * Throttle function for scroll/resize events
 */
function throttle(func, limit = 100) {
  let inThrottle;
  return function executedFunction(...args) {
    if (!inThrottle) {
      func.apply(this, args);
      inThrottle = true;
      setTimeout(() => inThrottle = false, limit);
    }
  };
}
