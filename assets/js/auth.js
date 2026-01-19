/**
 * Toggle password visibility
 */
function togglePassword(fieldId) {
  const field = document.getElementById(fieldId);
  const button = field.nextElementSibling;
  
  if (field.type === 'password') {
    field.type = 'text';
    button.textContent = '🙈';
    button.setAttribute('aria-label', 'Hide password');
  } else {
    field.type = 'password';
    button.textContent = '👁️';
    button.setAttribute('aria-label', 'Show password');
  }
}
