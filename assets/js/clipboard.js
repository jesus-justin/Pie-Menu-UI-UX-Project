/**
 * Clipboard utilities
 */

/**
 * Copy text to clipboard
 */
async function copyToClipboard(text) {
  try {
    if (navigator.clipboard && navigator.clipboard.writeText) {
      await navigator.clipboard.writeText(text);
      return true;
    } else {
      // Fallback for older browsers
      const textarea = document.createElement('textarea');
      textarea.value = text;
      textarea.style.position = 'fixed';
      textarea.style.opacity = '0';
      document.body.appendChild(textarea);
      textarea.select();
      const success = document.execCommand('copy');
      document.body.removeChild(textarea);
      return success;
    }
  } catch (error) {
    console.error('Failed to copy:', error);
    return false;
  }
}

/**
 * Read from clipboard
 */
async function readFromClipboard() {
  try {
    if (navigator.clipboard && navigator.clipboard.readText) {
      return await navigator.clipboard.readText();
    } else {
      console.warn('Clipboard reading not supported');
      return null;
    }
  } catch (error) {
    console.error('Failed to read clipboard:', error);
    return null;
  }
}

/**
 * Copy element text to clipboard
 */
async function copyElementText(selector) {
  const element = document.querySelector(selector);
  if (!element) {
    console.error(`Element not found: ${selector}`);
    return false;
  }
  return copyToClipboard(element.textContent || element.value);
}

/**
 * Share data using Web Share API
 */
async function shareData(data) {
  if (!navigator.share) {
    console.warn('Web Share API not supported');
    return false;
  }

  try {
    await navigator.share({
      title: data.title || document.title,
      text: data.text || '',
      url: data.url || window.location.href,
      ...data
    });
    return true;
  } catch (error) {
    if (error.name !== 'AbortError') {
      console.error('Share failed:', error);
    }
    return false;
  }
}
