/**
 * Number formatting utilities
 */

/**
 * Format number to currency
 */
function formatCurrency(amount, currency = 'USD', locale = 'en-US') {
  try {
    return new Intl.NumberFormat(locale, {
      style: 'currency',
      currency: currency
    }).format(amount);
  } catch (error) {
    console.warn('Currency formatting failed:', error);
    return `${currency} ${amount}`;
  }
}

/**
 * Format number with thousands separator
 */
function formatNumber(number, decimals = 0) {
  return parseFloat(number).toLocaleString('en-US', {
    minimumFractionDigits: decimals,
    maximumFractionDigits: decimals
  });
}

/**
 * Format number as percentage
 */
function formatPercentage(number, decimals = 0) {
  return formatNumber(number * 100, decimals) + '%';
}

/**
 * Format bytes to readable size
 */
function formatBytes(bytes) {
  const units = ['B', 'KB', 'MB', 'GB', 'TB'];
  let size = Math.abs(bytes);
  let unitIndex = 0;
  
  while (size >= 1024 && unitIndex < units.length - 1) {
    size /= 1024;
    unitIndex++;
  }
  
  return size.toFixed(2) + ' ' + units[unitIndex];
}

/**
 * Parse formatted number back to number
 */
function parseFormattedNumber(str) {
  return parseFloat(str.replace(/[^0-9.-]/g, ''));
}
