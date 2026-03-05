/* ================================================================
   script.js  —  SecurePortal Application Logic
   INSERT: Link this file in HTML right before </body>,
           AFTER the Bootstrap JS bundle script tag
   ================================================================ */

/* ================================================================
   1. IN-MEMORY USER STORE
   (Replace with a real backend / database in production)
   ================================================================ */
const userStore = {};   // { username: { password, firstName, lastName, email } }


/* ================================================================
   2. BOOTSTRAP INSTANCES  (tab & modal references)
   ================================================================ */
const loginTabEl    = document.getElementById('login-tab');
const registerTabEl = document.getElementById('register-tab');
const loginTab      = new bootstrap.Tab(loginTabEl);
const registerTab   = new bootstrap.Tab(registerTabEl);
const forgotModalEl = document.getElementById('forgotModal');
const forgotModal   = new bootstrap.Modal(forgotModalEl);


/* ================================================================
   3. UTILITY HELPERS
   ================================================================ */

/**
 * Show or hide an alert box with a message.
 * @param {string}  id        - Element ID of the alert div
 * @param {string}  message   - Text to display
 * @param {string}  type      - Bootstrap alert type: 'danger' | 'success' | 'info'
 */
function showAlert(id, message, type = 'danger') {
  const el = document.getElementById(id);
  el.textContent = message;
  el.className = `alert portal-alert alert-${type}`;
  el.classList.remove('d-none');
}

/** Hide an alert box */
function hideAlert(id) {
  const el = document.getElementById(id);
  el.classList.add('d-none');
}

/** Simple email format check */
function isValidEmail(email) {
  return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}

/** Get current time greeting */
function getGreeting() {
  const h = new Date().getHours();
  if (h < 12) return 'Good morning';
  if (h < 17) return 'Good afternoon';
  return 'Good evening';
}

/** Format date/time string for welcome screen */
function getDateTime() {
  return new Date().toLocaleString('en-US', {
    weekday: 'long', month: 'long', day: 'numeric',
    hour: '2-digit', minute: '2-digit'
  });
}


/* ================================================================
   4. TOGGLE PASSWORD VISIBILITY
   Called inline from HTML: onclick="togglePassword('fieldId', btn)"
   ================================================================ */
function togglePassword(fieldId, btn) {
  const input = document.getElementById(fieldId);
  const icon  = btn.querySelector('i');
  if (input.type === 'password') {
    input.type = 'text';
    icon.className = 'bi bi-eye-slash';
  } else {
    input.type = 'password';
    icon.className = 'bi bi-eye';
  }
}


/* ================================================================
   5. PASSWORD STRENGTH METER  (Register form)
   ================================================================ */
document.getElementById('regPassword').addEventListener('input', function () {
  const val     = this.value;
  const bar     = document.getElementById('strengthBar');
  const label   = document.getElementById('strengthLabel');

  let score = 0;
  if (val.length >= 8)           score++;
  if (/[A-Z]/.test(val))         score++;
  if (/[0-9]/.test(val))         score++;
  if (/[^A-Za-z0-9]/.test(val)) score++;

  const levels = [
    { width: '0%',   color: 'transparent', text: '' },
    { width: '25%',  color: '#ff6b6b',     text: 'Weak' },
    { width: '50%',  color: '#f4c76a',     text: 'Fair' },
    { width: '75%',  color: '#4f9eff',     text: 'Good' },
    { width: '100%', color: '#52e0a0',     text: 'Strong' },
  ];

  const level = levels[score];
  bar.style.setProperty('--strength-width', level.width);
  bar.style.setProperty('--strength-color', level.color);
  label.textContent = level.text;
  label.style.color = level.color;
});


/* ================================================================
   6. REGISTER FORM  —  Validation & Submission
   ================================================================ */
document.getElementById('registerForm').addEventListener('submit', function (e) {
  e.preventDefault();
  hideAlert('registerAlert');

  const firstName = document.getElementById('regFirstName').value.trim();
  const lastName  = document.getElementById('regLastName').value.trim();
  const username  = document.getElementById('regUsername').value.trim();
  const email     = document.getElementById('regEmail').value.trim();
  const password  = document.getElementById('regPassword').value;
  const confirm   = document.getElementById('regConfirmPassword').value;

  // --- Validation ---
  if (!firstName || !lastName) {
    return showAlert('registerAlert', 'Please enter your first and last name.');
  }
  if (!username || username.length < 3) {
    return showAlert('registerAlert', 'Username must be at least 3 characters.');
  }
  if (!isValidEmail(email)) {
    return showAlert('registerAlert', 'Please enter a valid email address.');
  }
  if (password.length < 6) {
    return showAlert('registerAlert', 'Password must be at least 6 characters.');
  }
  if (password !== confirm) {
    return showAlert('registerAlert', 'Passwords do not match.');
  }
  if (userStore[username.toLowerCase()]) {
    return showAlert('registerAlert', 'That username is already taken. Please choose another.');
  }

  // --- Save user ---
  userStore[username.toLowerCase()] = { password, firstName, lastName, email };

  // --- Success feedback, then redirect to Log In tab ---
  showAlert('registerAlert', '✓ Account created! Redirecting you to log in…', 'success');

  setTimeout(() => {
    // Switch to Login tab
    loginTab.show();
    // Pre-fill username for convenience
    document.getElementById('loginUsername').value = username;
    // Reset register form
    document.getElementById('registerForm').reset();
    document.getElementById('strengthBar').style.setProperty('--strength-width', '0%');
    document.getElementById('strengthLabel').textContent = '';
    hideAlert('registerAlert');
  }, 1800);
});


/* ================================================================
   7. LOGIN FORM  —  Validation & Submission
   ================================================================ */
document.getElementById('loginForm').addEventListener('submit', function (e) {
  e.preventDefault();
  hideAlert('loginAlert');

  const username = document.getElementById('loginUsername').value.trim();
  const password = document.getElementById('loginPassword').value;

  if (!username || !password) {
    return showAlert('loginAlert', 'Please fill in all fields.');
  }

  const user = userStore[username.toLowerCase()];

  if (!user || user.password !== password) {
    return showAlert('loginAlert', 'Invalid username or password. Please try again.');
  }

  // --- Login success: show dashboard ---
  showDashboard(user.firstName + ' ' + user.lastName);
});


/* ================================================================
   8. SHOW DASHBOARD  (after successful login)
   ================================================================ */
function showDashboard(fullName) {
  const screen = document.getElementById('dashboardScreen');

  document.getElementById('welcomeName').textContent =
    getGreeting() + ', ' + fullName + '!';
  document.getElementById('welcomeTime').textContent = getDateTime();

  screen.classList.remove('d-none');

  // Reset login form
  document.getElementById('loginForm').reset();
  hideAlert('loginAlert');
}


/* ================================================================
   9. LOGOUT BUTTON
   ================================================================ */
document.getElementById('logoutBtn').addEventListener('click', function () {
  const screen = document.getElementById('dashboardScreen');

  // Fade out
  screen.style.opacity = '0';
  screen.style.transition = 'opacity 0.35s ease';

  setTimeout(() => {
    screen.classList.add('d-none');
    screen.style.opacity = '';
    screen.style.transition = '';
  }, 350);
});


/* ================================================================
   10. FORGOT PASSWORD — Modal Open & Send Reset Link
   ================================================================ */
document.getElementById('forgotPasswordLink').addEventListener('click', function (e) {
  e.preventDefault();
  hideAlert('forgotAlert');
  document.getElementById('forgotEmail').value = '';
  forgotModal.show();
});

document.getElementById('sendResetBtn').addEventListener('click', function () {
  const email = document.getElementById('forgotEmail').value.trim();
  hideAlert('forgotAlert');

  if (!isValidEmail(email)) {
    return showAlert('forgotAlert', 'Please enter a valid email address.', 'danger');
  }

  // Simulate sending (replace with real backend call)
  showAlert('forgotAlert', '✓ Reset link sent! Check your inbox.', 'success');

  setTimeout(() => {
    forgotModal.hide();
    hideAlert('forgotAlert');
  }, 2200);
});


/* ================================================================
   11. TAB SWITCH LINKS  ("Create one" / "Sign in")
   ================================================================ */
document.getElementById('goToRegister').addEventListener('click', function (e) {
  e.preventDefault();
  registerTab.show();
});

document.getElementById('goToLogin').addEventListener('click', function (e) {
  e.preventDefault();
  loginTab.show();
});


/* ================================================================
   12. CLEAR ALERTS ON TAB SWITCH
   ================================================================ */
document.getElementById('login-tab').addEventListener('shown.bs.tab', function () {
  hideAlert('loginAlert');
});
document.getElementById('register-tab').addEventListener('shown.bs.tab', function () {
  hideAlert('registerAlert');
});