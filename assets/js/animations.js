/**
 * Animation utilities
 */

/**
 * Animate element with keyframes
 */
function animate(element, keyframes, options = {}) {
  if (!element || !element.animate) return null;
  
  return element.animate(keyframes, {
    duration: options.duration || 300,
    easing: options.easing || 'ease-in-out',
    fill: options.fill || 'forwards',
    ...options
  });
}

/**
 * Fade in animation
 */
function fadeIn(element, duration = 300) {
  return animate(element, [
    { opacity: 0 },
    { opacity: 1 }
  ], { duration });
}

/**
 * Fade out animation
 */
function fadeOut(element, duration = 300) {
  return animate(element, [
    { opacity: 1 },
    { opacity: 0 }
  ], { duration, fill: 'forwards' });
}

/**
 * Slide in animation
 */
function slideIn(element, direction = 'left', duration = 300) {
  const offset = direction === 'left' ? '-100%' : direction === 'right' ? '100%' : '0';
  const transform = direction === 'up' ? 'translateY(100%)' : direction === 'down' ? 'translateY(-100%)' : `translateX(${offset})`;
  
  return animate(element, [
    { transform, opacity: 0 },
    { transform: 'translate(0)', opacity: 1 }
  ], { duration });
}

/**
 * Scale animation
 */
function scale(element, from = 0.5, to = 1, duration = 300) {
  return animate(element, [
    { transform: `scale(${from})`, opacity: 0 },
    { transform: `scale(${to})`, opacity: 1 }
  ], { duration });
}

/**
 * Rotate animation
 */
function rotate(element, degrees = 360, duration = 1000) {
  return animate(element, [
    { transform: 'rotate(0deg)' },
    { transform: `rotate(${degrees}deg)` }
  ], { duration });
}
