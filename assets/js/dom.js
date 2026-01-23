/**
 * DOM manipulation and event utilities
 */

/**
 * Safely query elements from DOM
 */
function $(selector) {
  return document.querySelector(selector);
}

/**
 * Safely query all elements from DOM
 */
function $$(selector) {
  return document.querySelectorAll(selector);
}

/**
 * Add event listener with cleanup support
 */
function on(element, event, handler, options = false) {
  if (!element) return;
  element.addEventListener(event, handler, options);
  
  // Return cleanup function
  return () => {
    element.removeEventListener(event, handler, options);
  };
}

/**
 * Delegate event handling
 */
function delegate(parent, selector, event, handler) {
  if (!parent) return;
  
  parent.addEventListener(event, (e) => {
    const target = e.target.closest(selector);
    if (target && parent.contains(target)) {
      handler.call(target, e);
    }
  });
}

/**
 * Add CSS class to element
 */
function addClass(element, className) {
  if (element) {
    element.classList.add(...className.split(' '));
  }
}

/**
 * Remove CSS class from element
 */
function removeClass(element, className) {
  if (element) {
    element.classList.remove(...className.split(' '));
  }
}

/**
 * Toggle CSS class on element
 */
function toggleClass(element, className, force) {
  if (element) {
    element.classList.toggle(className, force);
  }
}

/**
 * Check if element has class
 */
function hasClass(element, className) {
  return element ? element.classList.contains(className) : false;
}
