/**
 * Notification and toast utilities
 */

/**
 * Show toast notification
 */
function showToast(message, type = 'info', duration = 3000) {
  const toast = document.createElement('div');
  toast.className = `toast toast-${type}`;
  toast.setAttribute('role', 'alert');
  toast.setAttribute('aria-live', 'polite');
  toast.textContent = message;
  
  // Add styles
  const style = document.createElement('style');
  if (!document.querySelector('#toast-styles')) {
    style.id = 'toast-styles';
    style.textContent = `
      .toast {
        position: fixed;
        bottom: 20px;
        right: 20px;
        padding: 12px 20px;
        border-radius: 8px;
        color: white;
        font-size: 14px;
        animation: slideIn 0.3s ease;
        z-index: 9999;
      }
      .toast-info { background-color: #3b82f6; }
      .toast-success { background-color: #10b981; }
      .toast-warning { background-color: #f59e0b; }
      .toast-error { background-color: #ef4444; }
      @keyframes slideIn {
        from { transform: translateX(400px); opacity: 0; }
        to { transform: translateX(0); opacity: 1; }
      }
    `;
    document.head.appendChild(style);
  }
  
  document.body.appendChild(toast);
  
  if (duration > 0) {
    setTimeout(() => {
      toast.style.animation = 'slideIn 0.3s ease reverse';
      setTimeout(() => toast.remove(), 300);
    }, duration);
  }
  
  return toast;
}

/**
 * Show success toast
 */
function showSuccess(message, duration = 3000) {
  return showToast(message, 'success', duration);
}

/**
 * Show error toast
 */
function showError(message, duration = 3000) {
  return showToast(message, 'error', duration);
}

/**
 * Show warning toast
 */
function showWarning(message, duration = 3000) {
  return showToast(message, 'warning', duration);
}

/**
 * Show info toast
 */
function showInfo(message, duration = 3000) {
  return showToast(message, 'info', duration);
}
