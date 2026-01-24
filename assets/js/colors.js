/**
 * Color utility functions
 */

/**
 * Convert hex color to RGB
 */
function hexToRgb(hexColor) {
  const hex = hexColor.replace('#', '');
  const r = parseInt(hex.substring(0, 2), 16);
  const g = parseInt(hex.substring(2, 4), 16);
  const b = parseInt(hex.substring(4, 6), 16);
  return { r, g, b };
}

/**
 * Convert RGB to hex color
 */
function rgbToHex(r, g, b) {
  return '#' + [r, g, b]
    .map(x => {
      const hex = x.toString(16);
      return hex.length === 1 ? '0' + hex : hex;
    })
    .join('')
    .toUpperCase();
}

/**
 * Get luminance of color (0-1)
 */
function getColorLuminance(hexColor) {
  const { r, g, b } = hexToRgb(hexColor);
  return (0.299 * r + 0.587 * g + 0.114 * b) / 255;
}

/**
 * Check if color is light or dark
 */
function isLightColor(hexColor) {
  return getColorLuminance(hexColor) > 0.5;
}

/**
 * Get contrasting text color (black or white)
 */
function getContrastColor(hexColor) {
  return isLightColor(hexColor) ? '#000000' : '#FFFFFF';
}

/**
 * Lighten color by amount
 */
function lightenColor(hexColor, amount) {
  const { r, g, b } = hexToRgb(hexColor);
  const newR = Math.min(255, r + amount);
  const newG = Math.min(255, g + amount);
  const newB = Math.min(255, b + amount);
  return rgbToHex(newR, newG, newB);
}

/**
 * Darken color by amount
 */
function darkenColor(hexColor, amount) {
  const { r, g, b } = hexToRgb(hexColor);
  const newR = Math.max(0, r - amount);
  const newG = Math.max(0, g - amount);
  const newB = Math.max(0, b - amount);
  return rgbToHex(newR, newG, newB);
}
