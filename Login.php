<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>InfurNest - Register/Login Demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(to right, #ffcc80, #90caf9);
      font-family: Arial, sans-serif;
    }
    .container {
      max-width: 400px;
      margin-top: 3rem;
      background: white;
      border-radius: 10px;
      padding: 2rem;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    h3 {
      text-align: center;
      color: #017bcd;
    }
    .hidden {
      display: none;
    }
  </style>
</head>
<body>
  <div class="container">
    <h3>InfurNest</h3>
    <!-- Login Form -->
    <form id="loginForm">
      <div class="form-floating mb-3">
        <input type="email" class="form-control" id="loginEmail" placeholder="Email" required>
        <label for="loginEmail">Email</label>
      </div>
      <div class="form-floating mb-3">
        <input type="password" class="form-control" id="loginPassword" placeholder="Password" required>
        <label for="loginPassword">Password</label>
      </div>
      <button type="submit" class="btn btn-primary w-100">Log In</button>
      <p class="text-center mt-3">
        <a href="#" id="forgotPasswordLink">Forgot Password?</a> | 
        <a href="#" id="registerLink">Create Account</a>
      </p>
    </form>

    <!-- Register Form -->
    <form id="registerForm" class="hidden">
      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="registerName" placeholder="Full Name" required>
        <label for="registerName">Full Name</label>
      </div>
      <div class="form-floating mb-3">
        <input type="email" class="form-control" id="registerEmail" placeholder="Email" required>
        <label for="registerEmail">Email</label>
      </div>
      <div class="form-floating mb-3">
        <input type="password" class="form-control" id="registerPassword" placeholder="Password" required>
        <label for="registerPassword">Password</label>
      </div>
      <button type="submit" class="btn btn-success w-100">Sign Up</button>
      <p class="text-center mt-3">
        <a href="#" id="backToLoginFromRegister">Back to Login</a>
      </p>
    </form>

    <!-- Forgot Password Form -->
    <form id="forgotPasswordForm" class="hidden">
      <div class="form-floating mb-3">
        <input type="email" class="form-control" id="forgotEmail" placeholder="Email" required>
        <label for="forgotEmail">Email</label>
      </div>
      <button type="submit" class="btn btn-warning w-100">Send OTP</button>
      <p class="text-center mt-3">
        <a href="#" id="backToLoginFromForgot">Back to Login</a>
      </p>
    </form>
  </div>

  <script>
    // Simulate a database of registered users
    const usersDB = [];

    // Forms
    const loginForm = document.getElementById('loginForm');
    const registerForm = document.getElementById('registerForm');
    const forgotPasswordForm = document.getElementById('forgotPasswordForm');

    // Navigation Links
    const registerLink = document.getElementById('registerLink');
    const forgotPasswordLink = document.getElementById('forgotPasswordLink');
    const backToLoginFromRegister = document.getElementById('backToLoginFromRegister');
    const backToLoginFromForgot = document.getElementById('backToLoginFromForgot');

    // Show/Hide Forms
    registerLink.addEventListener('click', (e) => {
      e.preventDefault();
      loginForm.classList.add('hidden');
      registerForm.classList.remove('hidden');
    });

    backToLoginFromRegister.addEventListener('click', (e) => {
      e.preventDefault();
      registerForm.classList.add('hidden');
      loginForm.classList.remove('hidden');
    });

    forgotPasswordLink.addEventListener('click', (e) => {
      e.preventDefault();
      loginForm.classList.add('hidden');
      forgotPasswordForm.classList.remove('hidden');
    });

    backToLoginFromForgot.addEventListener('click', (e) => {
      e.preventDefault();
      forgotPasswordForm.classList.add('hidden');
      loginForm.classList.remove('hidden');
    });

    // Handle Registration Form Submission
    registerForm.addEventListener('submit', (e) => {
      e.preventDefault();

      const name = document.getElementById('registerName').value;
      const email = document.getElementById('registerEmail').value;
      const password = document.getElementById('registerPassword').value;

      // Check if user already exists
      const userExists = usersDB.some((user) => user.email === email);
      if (userExists) {
        alert('You are already registered. Please log in.');
      } else {
        // Add user to "database"
        usersDB.push({ name, email, password });
        alert('Registration successful! You can now log in.');
        registerForm.reset();
        registerForm.classList.add('hidden');
        loginForm.classList.remove('hidden');
      }
    });

    // Handle Login Form Submission
    loginForm.addEventListener('submit', (e) => {
      e.preventDefault();

      const email = document.getElementById('loginEmail').value;
      const password = document.getElementById('loginPassword').value;

      // Check if user exists
      const user = usersDB.find((user) => user.email === email);

      if (!user) {
        alert('No account found with this email. Please register first.');
      } else if (user.password !== password) {
        alert('Incorrect password. Please try again.');
      } else {
        alert(`Welcome back, ${user.name}!`);
      }
    });

    // Handle Forgot Password Form Submission
    forgotPasswordForm.addEventListener('submit', (e) => {
      e.preventDefault();

      const email = document.getElementById('forgotEmail').value;

      // Check if user exists
      const user = usersDB.find((user) => user.email === email);

      if (!user) {
        alert('No account found with this email. Please register first.');
      } else {
        alert('An OTP has been sent to (simulated).');
      }
    });
  </script>
</body>
</html>
