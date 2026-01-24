/**
 * Query string utilities
 */

/**
 * Parse query string to object
 */
function parseQueryString(queryString = window.location.search) {
  const params = new URLSearchParams(queryString);
  const result = {};
  
  for (const [key, value] of params) {
    result[key] = value;
  }
  
  return result;
}

/**
 * Build query string from object
 */
function buildQueryString(params) {
  return new URLSearchParams(params).toString();
}

/**
 * Get single query parameter
 */
function getQueryParam(name, defaultValue = null) {
  const params = new URLSearchParams(window.location.search);
  return params.get(name) || defaultValue;
}

/**
 * Update URL without reload
 */
function updateUrl(path, params = {}) {
  const queryString = buildQueryString(params);
  const fullPath = queryString ? `${path}?${queryString}` : path;
  window.history.replaceState({}, '', fullPath);
}

/**
 * Add parameter to current URL
 */
function addUrlParam(name, value) {
  const params = parseQueryString();
  params[name] = value;
  updateUrl(window.location.pathname, params);
}

/**
 * Remove parameter from current URL
 */
function removeUrlParam(name) {
  const params = parseQueryString();
  delete params[name];
  updateUrl(window.location.pathname, params);
}

/**
 * Check if URL param exists
 */
function hasUrlParam(name) {
  return getQueryParam(name) !== null;
}
