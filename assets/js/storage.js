/**
 * Local storage utilities for client-side persistence
 */

/**
 * Safely set item in localStorage
 */
function safeSetStorage(key, value) {
  try {
    const stringValue = typeof value === 'string' ? value : JSON.stringify(value);
    localStorage.setItem(key, stringValue);
    return true;
  } catch (e) {
    console.warn(`Failed to set localStorage[${key}]:`, e.message);
    return false;
  }
}

/**
 * Safely get item from localStorage
 */
function safeGetStorage(key, defaultValue = null) {
  try {
    const item = localStorage.getItem(key);
    if (item === null) return defaultValue;
    
    try {
      return JSON.parse(item);
    } catch {
      return item;
    }
  } catch (e) {
    console.warn(`Failed to get localStorage[${key}]:`, e.message);
    return defaultValue;
  }
}

/**
 * Remove item from localStorage
 */
function safeRemoveStorage(key) {
  try {
    localStorage.removeItem(key);
    return true;
  } catch (e) {
    console.warn(`Failed to remove localStorage[${key}]:`, e.message);
    return false;
  }
}

/**
 * Clear all localStorage items
 */
function safeClearStorage() {
  try {
    localStorage.clear();
    return true;
  } catch (e) {
    console.warn('Failed to clear localStorage:', e.message);
    return false;
  }
}
