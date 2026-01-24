/**
 * Event system for pub/sub pattern
 */

class EventEmitter {
  constructor() {
    this.events = {};
  }

  on(event, handler) {
    if (!this.events[event]) {
      this.events[event] = [];
    }
    this.events[event].push(handler);
    
    // Return unsubscribe function
    return () => {
      this.events[event] = this.events[event].filter(h => h !== handler);
    };
  }

  once(event, handler) {
    const wrapper = (data) => {
      handler(data);
      this.off(event, wrapper);
    };
    this.on(event, wrapper);
    
    return () => this.off(event, wrapper);
  }

  off(event, handler) {
    if (!this.events[event]) return;
    this.events[event] = this.events[event].filter(h => h !== handler);
  }

  emit(event, data) {
    if (!this.events[event]) return;
    this.events[event].forEach(handler => {
      try {
        handler(data);
      } catch (error) {
        console.error(`Error in event handler for ${event}:`, error);
      }
    });
  }

  clear(event) {
    if (event) {
      delete this.events[event];
    } else {
      this.events = {};
    }
  }
}

// Create global event emitter instance
const eventBus = new EventEmitter();
