<?php
// Start the session
session_start();
?>

<!DOCTYPE html> <!-- Declaring HTML5 document type -->
<html lang="en"> <!-- Setting the language to English -->
<head>
  <meta charset="UTF-8"> <!-- Defining character encoding -->
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Enabling responsive design -->
  <title>Register - TechFolio</title> <!-- Setting the title of the page -->

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&family=Poppins:wght@600&display=swap" rel="stylesheet"> <!-- Custom fonts -->

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> <!-- Bootstrap framework -->

  <!-- Custom CSS -->
  <link href="styles.css" rel="stylesheet"> <!-- Link to custom styling -->
  <script src="script.js" defer></script> <!-- Defer custom JS until DOM is loaded -->
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark sticky-top gradient-navbar"> <!-- Navbar with gradient and sticky behavior -->
  <div class="container"> <!-- Container to center content -->
    <a class="navbar-brand" href="home.php"> <!-- Brand logo linking to home -->
      <img src="tech.png" alt="TechFolio logo" width="40" height="40"> <!-- Brand logo image -->
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"> <!-- Button for mobile navbar -->
      <span class="navbar-toggler-icon"></span> <!-- Icon inside toggle button -->
    </button>
    <div class="collapse navbar-collapse" id="navbarNav"> <!-- Collapsible navigation menu -->
      <ul class="navbar-nav ms-auto"> <!-- Right-aligned navigation links -->
        <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="create.php">Create Portfolio</a></li>
        <li class="nav-item"><a class="nav-link" href="templates.php">Templates</a></li>
        <li class="nav-item"><a class="nav-link" href="pricing.php">Pricing</a></li>
        <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>
        <li class="nav-item"><a class="nav-link active" href="register.php">Register</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Registration Form -->
<section class="py-5"> <!-- Form section with padding -->
  <div class="container"> <!-- Container for alignment -->
    <h2 class="text-purple text-center mb-4">Create Your Account</h2> <!-- Section heading -->

    <form action="process_register.php" method="POST" onsubmit="return validateRegisterForm()" class="mx-auto" style="max-width: 600px;"> <!-- Registration form -->
      <div class="mb-3">
        <label for="firstName" class="form-label text-purple">First Name</label> <!-- Label for first name -->
        <input type="text" class="form-control" name="firstName" id="firstName" > <!-- First name input field -->
      </div>
      <div class="mb-3">
        <label for="surname" class="form-label text-purple">Surname</label> <!-- Label for surname -->
        <input type="text" class="form-control" name="surname" id="surname" > <!-- Surname input field -->
      </div>
      <div class="mb-3">
        <label for="email" class="form-label text-purple">Email</label> <!-- Label for email -->
        <input type="text" class="form-control" name="email" id="email" > <!-- Email input field -->
      </div>
      <div class="mb-3">
        <label for="password" class="form-label text-purple">Password</label> <!-- Label for password -->
        <input type="password" class="form-control" name="password" id="password" > <!-- Password input field -->
      </div>
      <div class="mb-3">
        <label for="confirm_password" class="form-label text-purple">Confirm Password</label> <!-- Label for confirm password -->
        <input type="password" class="form-control" name="confirm_password" id="confirm_password" > <!-- Confirm password input -->
      </div>

      <!-- JavaScript CAPTCHA  -->
      <div class="mb-3">
        <label class="form-label text-purple" id="captcha-question">Loading CAPTCHA...</label> <!-- CAPTCHA question label -->
        <input type="number" class="form-control" id="captcha-input" placeholder="Your answer" > <!-- CAPTCHA answer input -->
      </div>

      <div class="text-center"> <!-- Submit button wrapper -->
        <button type="submit" class="btn btn-primary px-4 bg-purple border-0">Register</button> <!-- Submit button -->
      </div>
      <div class="text-center mt-3"> <!-- Additional links -->
        <small class="text-muted">Already have an account?
            <a href="login.php" class="text-purple fw-bold">Log in here</a>
        </small>
      </div>

    </form>
  </div>
</section>

<!-- Footer -->
<footer class="text-white text-center py-4 bg-purple"> <!-- Footer section -->
  <p>Cookies Policy | Legal Terms | Privacy Policy</p> <!-- Policy links -->
  <p>Connect with us: Instagram | LinkedIn | Twitter | Facebook</p> <!-- Social media links -->
  <p>&copy; 2025 Portfolio Creator for Tech. All Rights Reserved.</p> <!-- Copyright -->
</footer>

<!-- Bootstrap Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> <!-- Bootstrap JS bundle -->
</body>
</html>