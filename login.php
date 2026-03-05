<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Secure Portal</title>

  <!-- ============================================================
       INSERT #1 — Bootstrap CSS (CDN)
       Place inside <head>, before your custom CSS
  ============================================================ -->
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
  />

  <!-- Bootstrap Icons -->
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
  />

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&family=DM+Sans:wght@300;400;500;600&display=swap"
    rel="stylesheet"
  />

  <!-- ============================================================
       INSERT #2 — Custom CSS File
       Place after Bootstrap CSS, still inside <head>
  ============================================================ -->
  <link rel="stylesheet" href="style.css" />
</head>
<body>

  <!-- ============================================================
       INSERT #3 — BACKGROUND DECORATION
       Decorative blobs / ambient light layers
  ============================================================ -->
  <div class="bg-blob blob-1"></div>
  <div class="bg-blob blob-2"></div>
  <div class="bg-blob blob-3"></div>

  <!-- ============================================================
       INSERT #4 — MAIN WRAPPER
       Centered card that holds all panels
  ============================================================ -->
  <div class="portal-wrapper">
    <div class="portal-card" id="portalCard">

      <!-- ── Brand / Logo ── -->
      <div class="brand-header text-center mb-4">
        <div class="brand-icon">
          <i class="bi bi-shield-lock-fill"></i>
        </div>
        <h1 class="brand-name">SecurePortal</h1>
        <p class="brand-tagline">Your gateway to a safer digital world</p>
      </div>

      <!-- ============================================================
           INSERT #5 — TAB NAVIGATION (Log In / Register)
      ============================================================ -->
      <ul class="nav portal-tabs mb-4" id="authTabs" role="tablist">
        <li class="nav-item flex-fill" role="presentation">
          <button
            class="nav-link active w-100"
            id="login-tab"
            data-bs-toggle="tab"
            data-bs-target="#loginPanel"
            type="button"
            role="tab"
          >
            <i class="bi bi-box-arrow-in-right me-1"></i> Log In
          </button>
        </li>
        <li class="nav-item flex-fill" role="presentation">
          <button
            class="nav-link w-100"
            id="register-tab"
            data-bs-toggle="tab"
            data-bs-target="#registerPanel"
            type="button"
            role="tab"
          >
            <i class="bi bi-person-plus me-1"></i> Register
          </button>
        </li>
      </ul>

      <!-- ============================================================
           INSERT #6 — TAB CONTENT PANELS
      ============================================================ -->
      <div class="tab-content" id="authTabContent">

        <!-- ── LOGIN PANEL ── -->
        <div class="tab-pane fade show active" id="loginPanel" role="tabpanel">
          <form id="loginForm" novalidate>

            <!-- Alert box (hidden by default) -->
            <div class="alert portal-alert d-none" id="loginAlert" role="alert"></div>

            <div class="form-floating mb-3">
              <input
                type="text"
                class="form-control portal-input"
                id="loginUsername"
                placeholder="Username"
                required
              />
              <label for="loginUsername">
                <i class="bi bi-person me-1"></i> Username
              </label>
            </div>

            <div class="form-floating mb-1 password-wrapper">
              <input
                type="password"
                class="form-control portal-input"
                id="loginPassword"
                placeholder="Password"
                required
              />
              <label for="loginPassword">
                <i class="bi bi-lock me-1"></i> Password
              </label>
              <button type="button" class="toggle-pass" onclick="togglePassword('loginPassword', this)">
                <i class="bi bi-eye"></i>
              </button>
            </div>

            <!-- Forgot Password link -->
            <div class="text-end mb-4">
              <a href="#" class="forgot-link" id="forgotPasswordLink">
                Forgot Password?
              </a>
            </div>

            <button type="submit" class="btn portal-btn w-100 mb-3">
              <span class="btn-text">Log In</span>
              <i class="bi bi-arrow-right-circle ms-2"></i>
            </button>

            <p class="switch-hint text-center">
              Don't have an account?
              <a href="#" class="switch-link" id="goToRegister">Create one</a>
            </p>
          </form>
        </div>
        <!-- ── END LOGIN PANEL ── -->

        <!-- ── REGISTER PANEL ── -->
        <div class="tab-pane fade" id="registerPanel" role="tabpanel">
          <form id="registerForm" novalidate>

            <div class="alert portal-alert d-none" id="registerAlert" role="alert"></div>

            <div class="row g-3 mb-3">
              <div class="col-sm-6">
                <div class="form-floating">
                  <input
                    type="text"
                    class="form-control portal-input"
                    id="regFirstName"
                    placeholder="First Name"
                    required
                  />
                  <label for="regFirstName">First Name</label>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-floating">
                  <input
                    type="text"
                    class="form-control portal-input"
                    id="regLastName"
                    placeholder="Last Name"
                    required
                  />
                  <label for="regLastName">Last Name</label>
                </div>
              </div>
            </div>

            <div class="form-floating mb-3">
              <input
                type="text"
                class="form-control portal-input"
                id="regUsername"
                placeholder="Username"
                required
              />
              <label for="regUsername">
                <i class="bi bi-at me-1"></i> Username
              </label>
            </div>

            <div class="form-floating mb-3">
              <input
                type="email"
                class="form-control portal-input"
                id="regEmail"
                placeholder="Email"
                required
              />
              <label for="regEmail">
                <i class="bi bi-envelope me-1"></i> Email Address
              </label>
            </div>

            <div class="form-floating mb-3 password-wrapper">
              <input
                type="password"
                class="form-control portal-input"
                id="regPassword"
                placeholder="Password"
                required
              />
              <label for="regPassword">
                <i class="bi bi-lock me-1"></i> Password
              </label>
              <button type="button" class="toggle-pass" onclick="togglePassword('regPassword', this)">
                <i class="bi bi-eye"></i>
              </button>
            </div>

            <!-- Password strength bar -->
            <div class="strength-bar-wrap mb-3">
              <div class="strength-bar" id="strengthBar"></div>
              <small class="strength-label" id="strengthLabel"></small>
            </div>

            <div class="form-floating mb-4 password-wrapper">
              <input
                type="password"
                class="form-control portal-input"
                id="regConfirmPassword"
                placeholder="Confirm Password"
                required
              />
              <label for="regConfirmPassword">
                <i class="bi bi-lock-fill me-1"></i> Confirm Password
              </label>
              <button type="button" class="toggle-pass" onclick="togglePassword('regConfirmPassword', this)">
                <i class="bi bi-eye"></i>
              </button>
            </div>

            <button type="submit" class="btn portal-btn w-100 mb-3">
              <span class="btn-text">Create Account</span>
              <i class="bi bi-person-check ms-2"></i>
            </button>

            <p class="switch-hint text-center">
              Already have an account?
              <a href="#" class="switch-link" id="goToLogin">Sign in</a>
            </p>
          </form>
        </div>
        <!-- ── END REGISTER PANEL ── -->

      </div>
      <!-- end tab-content -->

    </div>
    <!-- end portal-card -->
  </div>
  <!-- end portal-wrapper -->

  <!-- ============================================================
       INSERT #7 — FORGOT PASSWORD MODAL
  ============================================================ -->
  <div class="modal fade" id="forgotModal" tabindex="-1" aria-labelledby="forgotModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content portal-modal">
        <div class="modal-header border-0 pb-0">
          <h5 class="modal-title" id="forgotModalLabel">
            <i class="bi bi-key me-2"></i>Reset Password
          </h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body pt-2">
          <p class="modal-desc">Enter the email address linked to your account and we'll send you a reset link.</p>
          <div class="alert portal-alert d-none" id="forgotAlert" role="alert"></div>
          <div class="form-floating">
            <input
              type="email"
              class="form-control portal-input"
              id="forgotEmail"
              placeholder="Email"
            />
            <label for="forgotEmail">
              <i class="bi bi-envelope me-1"></i> Email Address
            </label>
          </div>
        </div>
        <div class="modal-footer border-0 pt-0">
          <button type="button" class="btn portal-btn-outline" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn portal-btn" id="sendResetBtn">
            Send Reset Link <i class="bi bi-send ms-1"></i>
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- ============================================================
       INSERT #8 — DASHBOARD / WELCOME SCREEN (shown after login)
  ============================================================ -->
  <div class="dashboard-screen d-none" id="dashboardScreen">
    <div class="dashboard-card">
      <div class="dash-glow"></div>
      <div class="text-center">
        <div class="avatar-ring">
          <i class="bi bi-person-fill avatar-icon"></i>
        </div>
        <p class="welcome-sub">Welcome back,</p>
        <h2 class="welcome-name" id="welcomeName">User</h2>
        <p class="welcome-time" id="welcomeTime"></p>
        <div class="dash-divider"></div>
        <p class="dash-message">You are now securely logged in to your portal.</p>
        <button class="btn portal-btn mt-3" id="logoutBtn">
          <i class="bi bi-box-arrow-left me-2"></i>Log Out
        </button>
      </div>
    </div>
  </div>

  <!-- ============================================================
       INSERT #9 — Bootstrap JS Bundle (CDN)
       Place right before </body>
  ============================================================ -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- ============================================================
       INSERT #10 — Custom JS File
       Place after Bootstrap JS, right before </body>
  ============================================================ -->
  <script src="script.js"></script>

</body>
</html>