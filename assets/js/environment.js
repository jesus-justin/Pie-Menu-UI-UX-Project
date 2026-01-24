/**
 * Local environment detection
 */

const isMobile = () => {
  return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
};

const isIOS = () => {
  return /iPad|iPhone|iPod/.test(navigator.userAgent);
};

const isAndroid = () => {
  return /Android/.test(navigator.userAgent);
};

const isTouchDevice = () => {
  return (('ontouchstart' in window) ||
    (navigator.maxTouchPoints > 0) ||
    (navigator.msMaxTouchPoints > 0));
};

const isDarkMode = () => {
  return window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
};

const isLowPowerMode = () => {
  return navigator.deviceMemory ? navigator.deviceMemory <= 4 : false;
};

const isSlowConnection = () => {
  const connection = navigator.connection || navigator.mozConnection || navigator.webkitConnection;
  if (!connection) return false;
  return ['slow-2g', '2g', '3g'].includes(connection.effectiveType);
};

const supportsWebGL = () => {
  try {
    const canvas = document.createElement('canvas');
    return !!(window.WebGLRenderingContext && (canvas.getContext('webgl') || canvas.getContext('experimental-webgl')));
  } catch(e) {
    return false;
  }
};

const isOnline = () => {
  return navigator.onLine;
};
