// ============================================
//  CONTACT FORM — script.js
//  Handles: Client-side validation, char count,
//           loading state, smooth UX
// ============================================

const form       = document.getElementById('contactForm');
const submitBtn  = document.getElementById('submitBtn');
const charCount  = document.getElementById('charCount');
const messageBox = document.getElementById('message');

// ── Character Counter ──────────────────────
if (messageBox) {
  messageBox.addEventListener('input', () => {
    const len = messageBox.value.length;
    charCount.textContent = len;
    charCount.style.color = len > 450 ? '#C0392B' : '#7A7570';
    if (len > 500) {
      messageBox.value = messageBox.value.substring(0, 500);
      charCount.textContent = 500;
    }
  });
}

// ── Helpers ───────────────────────────────
function showError(fieldId, errId, message) {
  const field = document.getElementById(fieldId);
  const err   = document.getElementById(errId);
  if (field) field.classList.add('invalid');
  if (err)   err.textContent = message;
}

function clearError(fieldId, errId) {
  const field = document.getElementById(fieldId);
  const err   = document.getElementById(errId);
  if (field) field.classList.remove('invalid');
  if (err)   err.textContent = '';
}

function isValidEmail(email) {
  return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}

// ── Live validation on blur ─────────────────
document.getElementById('name')?.addEventListener('blur', () => {
  const val = document.getElementById('name').value.trim();
  if (!val)          showError('name', 'nameErr', 'Name is required.');
  else if (val.length < 2) showError('name', 'nameErr', 'Name must be at least 2 characters.');
  else               clearError('name', 'nameErr');
});

document.getElementById('email')?.addEventListener('blur', () => {
  const val = document.getElementById('email').value.trim();
  if (!val)                 showError('email', 'emailErr', 'Email is required.');
  else if (!isValidEmail(val)) showError('email', 'emailErr', 'Please enter a valid email.');
  else                      clearError('email', 'emailErr');
});

document.getElementById('subject')?.addEventListener('change', () => {
  const val = document.getElementById('subject').value;
  if (!val) showError('subject', 'subjectErr', 'Please select a subject.');
  else      clearError('subject', 'subjectErr');
});

messageBox?.addEventListener('blur', () => {
  const val = messageBox.value.trim();
  if (!val)          showError('message', 'msgErr', 'Message cannot be empty.');
  else if (val.length < 10) showError('message', 'msgErr', 'Please write at least 10 characters.');
  else               clearError('message', 'msgErr');
});

// ── Full form validation on submit ─────────
form?.addEventListener('submit', function(e) {
  let isValid = true;

  // Name
  const name = document.getElementById('name').value.trim();
  if (!name || name.length < 2) {
    showError('name', 'nameErr', !name ? 'Name is required.' : 'Name must be at least 2 characters.');
    isValid = false;
  } else clearError('name', 'nameErr');

  // Email
  const email = document.getElementById('email').value.trim();
  if (!email)               { showError('email', 'emailErr', 'Email is required.');           isValid = false; }
  else if (!isValidEmail(email)) { showError('email', 'emailErr', 'Please enter a valid email.'); isValid = false; }
  else clearError('email', 'emailErr');

  // Subject
  const subject = document.getElementById('subject').value;
  if (!subject) { showError('subject', 'subjectErr', 'Please select a subject.'); isValid = false; }
  else          clearError('subject', 'subjectErr');

  // Message
  const msg = messageBox.value.trim();
  if (!msg)           { showError('message', 'msgErr', 'Message cannot be empty.');            isValid = false; }
  else if (msg.length < 10) { showError('message', 'msgErr', 'Please write at least 10 characters.'); isValid = false; }
  else clearError('message', 'msgErr');

  // Consent
  const consent = document.getElementById('consent').checked;
  if (!consent) {
    document.getElementById('consentErr').textContent = 'You must agree to the Privacy Policy.';
    isValid = false;
  } else document.getElementById('consentErr').textContent = '';

  if (!isValid) {
    e.preventDefault();
    // Scroll to first error
    const firstInvalid = form.querySelector('.invalid, .field-error:not(:empty)');
    firstInvalid?.scrollIntoView({ behavior: 'smooth', block: 'center' });
    return;
  }

  // Show loading state
  submitBtn.classList.add('loading');
  submitBtn.querySelector('.btn-text').textContent = 'Sending…';
});

// ── Input animation: clear invalid on type ─
document.querySelectorAll('input, select, textarea').forEach(el => {
  el.addEventListener('input', () => el.classList.remove('invalid'));
});
