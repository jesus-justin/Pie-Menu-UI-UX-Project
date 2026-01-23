/**
 * Authentication form enhancements
 * Handles password visibility, strength checking, validation, and UX improvements
 */

(function() {
  'use strict';

/**
 * Toggle password visibility
 */
function togglePassword(fieldId) {
  const field = document.getElementById(fieldId);
  const button = field?.nextElementSibling;
  if (!field || !button) return;

  const isPassword = field.type === 'password';
  field.type = isPassword ? 'text' : 'password';
  button.textContent = isPassword ? '🙈' : '👁️';
  button.setAttribute('aria-label', isPassword ? 'Hide password' : 'Show password');
}

function evaluateStrength(password) {
  let score = 0;
  if (password.length >= 8) score += 1;
  if (password.length >= 12) score += 1;
  if (/[A-Z]/.test(password)) score += 1;
  if (/[0-9]/.test(password)) score += 1;
  if (/[^A-Za-z0-9]/.test(password)) score += 1;

  const labels = ['Very weak', 'Weak', 'Fair', 'Good', 'Strong', 'Excellent'];
  const clamped = Math.min(score, labels.length - 1);
  return { score: clamped, label: labels[clamped] };
}

function bindStrengthMeter(fieldId, barId, labelId) {
  const field = document.getElementById(fieldId);
  const bar = document.getElementById(barId);
  const label = document.getElementById(labelId);
  if (!field || !bar || !label) return;

  const update = () => {
    const { score, label: text } = evaluateStrength(field.value);
    const width = (score / 5) * 100;
    const gradient = 'linear-gradient(90deg, #ff6384, #ff9f40, #6fffd2)';
    bar.style.setProperty('--strength-fill', `${width}%`);
    bar.style.setProperty('--strength-color', gradient);
    bar.dataset.score = String(score);
    label.setAttribute('aria-live', 'polite');
    label.textContent = `Strength: ${text}`;
  };

  field.addEventListener('input', update);
  update();
}

function bindPasswordConfirmation(passwordId, confirmId, hintId) {
  const password = document.getElementById(passwordId);
  const confirm = document.getElementById(confirmId);
  const hint = document.getElementById(hintId);
  if (!password || !confirm || !hint) return;

  const sync = () => {
    const hasValue = confirm.value.length > 0;
    const matches = confirm.value === password.value;

    if (!hasValue) {
      confirm.setCustomValidity('');
      hint.textContent = '';
      hint.classList.remove('error', 'success');
      return;
    }

    if (matches) {
      confirm.setCustomValidity('');
      hint.textContent = 'Passwords match';
      hint.classList.remove('error');
      hint.classList.add('success');
    } else {
      confirm.setCustomValidity('Passwords must match');
      hint.textContent = 'Passwords do not match yet';
      hint.classList.remove('success');
      hint.classList.add('error');
    }
  };

  password.addEventListener('input', sync);
  confirm.addEventListener('input', sync);
}

function focusFirstErrorAlert() {
  const alert = document.querySelector('.alert.error');
  if (alert) {
    alert.focus({ preventScroll: false });
  }
}

function bindUsernameHint(fieldId, hintId) {
  const field = document.getElementById(fieldId);
  const hint = document.getElementById(hintId);
  if (!field || !hint) return;

  const pattern = /^[A-Za-z0-9_]{3,32}$/;

  const update = () => {
    if (!field.value) {
      field.setCustomValidity('');
      hint.textContent = '3-32 characters: letters, numbers, underscore';
      hint.classList.remove('error', 'success');
      hint.style.display = 'none';
      return;
    }

    hint.style.display = 'block';

    if (pattern.test(field.value)) {
      field.setCustomValidity('');
      hint.textContent = 'Looks good.';
      hint.classList.remove('error');
      hint.classList.add('success');
    } else {
      field.setCustomValidity('Use 3-32 letters, numbers, underscore.');
      hint.textContent = 'Use 3-32 letters, numbers, underscore.';
      hint.classList.remove('success');
      hint.classList.add('error');
    }
  };

  field.addEventListener('input', update);
  field.addEventListener('focus', update);
  field.addEventListener('blur', update);
  update();
}

function bindLoadingState(formSelector) {
  const form = document.querySelector(formSelector);
  if (!form) return;
  form.addEventListener('submit', () => {
    const submit = form.querySelector('button[type="submit"]');
    if (submit) {
      submit.setAttribute('aria-busy', 'true');
      submit.disabled = true;
    }
  });
}

document.addEventListener('DOMContentLoaded', () => {
  bindStrengthMeter('password', 'passwordStrengthBar', 'passwordStrengthLabel');
  bindPasswordConfirmation('password', 'confirm_password', 'confirmPasswordHint');
  bindUsernameHint('username', 'username-hint');
  focusFirstErrorAlert();
  bindLoadingState('form');
  preventDoubleSubmit();
});

function preventDoubleSubmit() {
  const forms = document.querySelectorAll('form');
  forms.forEach(form => {
    let submitted = false;
    form.addEventListener('submit', (e) => {
      if (submitted) {
        e.preventDefault();
        return false;
      }
      submitted = true;
      setTimeout(() => { submitted = false; }, 3000);
    });
  });
}

})();
