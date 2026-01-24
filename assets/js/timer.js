/**
 * Timer and clock utilities
 */

/**
 * Create a simple timer
 */
function createTimer(callback, interval, options = {}) {
  let elapsed = 0;
  const timer = {
    start: null,
    interval: null,
    paused: false,
    totalPaused: 0,
    lastPause: 0
  };

  timer.start = () => {
    timer.interval = setInterval(() => {
      if (!timer.paused) {
        elapsed += interval;
        callback(elapsed);
      }
    }, interval);
  };

  timer.pause = () => {
    timer.paused = true;
    timer.lastPause = Date.now();
  };

  timer.resume = () => {
    if (timer.paused) {
      timer.totalPaused += Date.now() - timer.lastPause;
      timer.paused = false;
    }
  };

  timer.stop = () => {
    clearInterval(timer.interval);
    elapsed = 0;
    timer.paused = false;
    timer.totalPaused = 0;
  };

  timer.getElapsed = () => elapsed;
  timer.getElapsedSeconds = () => Math.floor(elapsed / 1000);

  if (options.autoStart !== false) {
    timer.start();
  }

  return timer;
}

/**
 * Sleep/delay function
 */
async function sleep(ms) {
  return new Promise(resolve => setTimeout(resolve, ms));
}

/**
 * Format milliseconds to readable format
 */
function formatDuration(ms) {
  const seconds = Math.floor(ms / 1000);
  const minutes = Math.floor(seconds / 60);
  const hours = Math.floor(minutes / 60);

  if (hours > 0) {
    return `${hours}h ${minutes % 60}m`;
  } else if (minutes > 0) {
    return `${minutes}m ${seconds % 60}s`;
  } else {
    return `${seconds}s`;
  }
}

/**
 * Get time since timestamp
 */
function getTimeSince(date) {
  const seconds = Math.floor((new Date() - new Date(date)) / 1000);
  
  if (seconds < 60) return 'just now';
  if (seconds < 3600) return `${Math.floor(seconds / 60)}m ago`;
  if (seconds < 86400) return `${Math.floor(seconds / 3600)}h ago`;
  if (seconds < 604800) return `${Math.floor(seconds / 86400)}d ago`;
  
  return new Date(date).toLocaleDateString();
}
