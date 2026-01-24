/**
 * Request utilities for HTTP operations
 */

/**
 * Make HTTP request (fetch wrapper with defaults)
 */
async function request(url, options = {}) {
  const defaults = {
    method: 'GET',
    headers: {
      'Content-Type': 'application/json',
    },
    ...options
  };

  try {
    const response = await fetch(url, defaults);
    
    if (!response.ok) {
      throw new Error(`HTTP ${response.status}: ${response.statusText}`);
    }
    
    const contentType = response.headers.get('content-type');
    if (contentType && contentType.includes('application/json')) {
      return await response.json();
    }
    
    return await response.text();
  } catch (error) {
    console.error('Request failed:', error);
    throw error;
  }
}

/**
 * GET request
 */
function getRequest(url, options = {}) {
  return request(url, { ...options, method: 'GET' });
}

/**
 * POST request
 */
function postRequest(url, data, options = {}) {
  return request(url, {
    ...options,
    method: 'POST',
    body: typeof data === 'string' ? data : JSON.stringify(data)
  });
}

/**
 * PUT request
 */
function putRequest(url, data, options = {}) {
  return request(url, {
    ...options,
    method: 'PUT',
    body: typeof data === 'string' ? data : JSON.stringify(data)
  });
}

/**
 * DELETE request
 */
function deleteRequest(url, options = {}) {
  return request(url, { ...options, method: 'DELETE' });
}

/**
 * Retry request with exponential backoff
 */
async function retryRequest(fn, maxAttempts = 3, delay = 1000) {
  for (let attempt = 0; attempt < maxAttempts; attempt++) {
    try {
      return await fn();
    } catch (error) {
      if (attempt === maxAttempts - 1) throw error;
      await new Promise(resolve => setTimeout(resolve, delay * Math.pow(2, attempt)));
    }
  }
}
