<?php session_start(); ?> <!-- Starting PHP session for user authentication -->
<script>
  localStorage.removeItem('theme'); // Removing saved theme preference from localStorage
  window.location.href = 'login.php'; // Redirecting user to login page
</script>

<!DOCTYPE html> <!-- Declaring document as HTML5 -->
<html lang="en"> <!-- Setting the language to English -->
<head>
  <meta charset="UTF-8"> <!-- Character encoding set to UTF-8 -->
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Ensuring mobile responsiveness -->
  <title>Login - TechFolio</title> <!-- Setting the title of the page -->

  <!-- Google Fonts for typography -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&family=Poppins:wght@600&display=swap" rel="stylesheet">

  <!-- Bootstrap CSS for layout and design -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom CSS file -->
  <link href="styles.css" rel="stylesheet">
  <script src="script.js" defer></script> <!-- Linking external JavaScript with defer -->
</head>
<body>

<!-- Navbar section -->
<nav class="navbar navbar-expand-lg navbar-dark sticky-top gradient-navbar"> <!-- Creating sticky navbar -->
  <div class="container"> <!-- Bootstrap container -->
    <a class="navbar-brand" href="home.php"> <!-- Logo link to home -->
      <img src="tech.png" alt="TechFolio logo" width="40" height="40"> <!-- TechFolio logo -->
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"> <!-- Toggler for mobile menu -->
      <span class="navbar-toggler-icon"></span> <!-- Icon inside the toggle button -->
    </button>
    <div class="collapse navbar-collapse" id="navbarNav"> <!-- Collapsible content -->
      <ul class="navbar-nav ms-auto"> <!-- Right-aligned nav links -->
        <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="create.php">Create Portfolio</a></li>
        <li class="nav-item"><a class="nav-link" href="templates.php">Templates</a></li>
        <li class="nav-item"><a class="nav-link" href="pricing.php">Pricing</a></li>
        <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>
        <li class="nav-item"><a class="nav-link active" href="login.php">Login</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Login form section -->
<section class="py-5"> <!-- Adding vertical padding -->
  <div class="container"> <!-- Centered layout container -->
    <div class="mx-auto" style="max-width: 500px;"> <!-- Centering the form block -->
      <div class="text-center mb-4"> <!-- Title and intro -->
        <h2 class="text-purple">Hi, Welcome to <strong>TechFolio</strong> 💜</h2>
        <p class="text-muted">Log in to manage your portfolio</p>
      </div>
      <form id="loginForm" action="process_login.php" method="POST" onsubmit="return validateLoginForm()"> <!-- Login form with validation -->
        <div class="mb-3"> <!-- Email input field -->
          <label for="email" class="form-label text-purple">Email</label>
          <input type="text" class="form-control" id="email" name="email" />
        </div>
        <div class="mb-3"> <!-- Password input field -->
          <label for="password" class="form-label text-purple">Password</label>
          <input type="password" class="form-control" id="password" name="password" />
        </div>

        <!-- CAPTCHA Section -->
        <div class="mb-3"> <!-- CAPTCHA display block -->
          <label for="captcha" class="form-label text-purple">Enter CAPTCHA</label>
          <p id="captchaText" class="border rounded text-center p-2 fw-bold fs-5 bg-light-purple"></p> <!-- CAPTCHA text will be injected here -->
          <input type="text" class="form-control" id="captcha" placeholder="Type the CAPTCHA above" /> <!-- CAPTCHA input -->
        </div>

        <div class="mb-3 text-center"> <!-- Forgot password link -->
          <a href="forgot_password.php" class="text-purple">Forgot Password?</a>
        </div>
        <div class="text-center mb-3"> <!-- Submit button -->
          <button type="submit" class="btn btn-primary px-4 bg-purple border-0">Login</button>
        </div>
        <div class="text-center"> <!-- Link to register page -->
          <small class="text-muted">Don’t have an account?
            <a href="register.php" class="text-purple fw-bold">Register here</a>
          </small>
        </div>
      </form>
    </div>
  </div>
</section>

<!-- Footer section -->
<footer class="text-white text-center py-4 bg-purple"> <!-- Purple-themed footer -->
  <p>Cookies Policy | Legal Terms | Privacy Policy</p> <!-- Legal links -->
  <p>Connect with us: Instagram | LinkedIn | Twitter | Facebook</p> <!-- Social media -->
  <p>&copy; 2025 Portfolio Creator for Tech. All Rights Reserved.</p> <!-- Copyright -->
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> <!-- Including Bootstrap JS -->
</body>
</html>