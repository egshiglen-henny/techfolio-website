<?php session_start(); ?> <!-- Starting session for user login handling -->
<!DOCTYPE html>
<html lang="en"> <!-- Declaring HTML language -->
<head>
  <meta charset="UTF-8"> <!-- Setting character encoding -->
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Making layout responsive -->
  <title>Contact Us - TechFolio</title> <!-- Setting browser title -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&family=Poppins:wght@600&display=swap" rel="stylesheet"> <!-- Importing Google Fonts -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> <!-- Adding Bootstrap CSS -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> <!-- Linking AOS animation styles -->
  <link href="styles.css" rel="stylesheet"> <!-- Linking custom stylesheet -->
  <script src="script.js" defer></script> <!-- Deferring JavaScript file loading -->
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark sticky-top gradient-navbar"> <!-- Starting navbar -->
  <div class="container"> <!-- Wrapping navbar content -->
    <a class="navbar-brand" href="home.php"> <!-- Logo linking to home page -->
      <img src="tech.png" alt="TechFolio logo" width="40" height="40"> <!-- Logo image -->
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"> <!-- Toggle button for mobile nav -->
      <span class="navbar-toggler-icon"></span> <!-- Hamburger icon -->
    </button>
    <div class="collapse navbar-collapse" id="navbarNav"> <!-- Collapsible nav links -->
      <ul class="navbar-nav ms-auto"> <!-- Right-aligned navigation -->
        <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li> <!-- Home link -->
        <li class="nav-item"><a class="nav-link" href="create.php">Create Portfolio</a></li> <!-- Create page link -->
        <li class="nav-item"><a class="nav-link" href="templates.php">Templates</a></li> <!-- Templates page link -->
        <li class="nav-item"><a class="nav-link" href="pricing.php">Pricing</a></li> <!-- Pricing page link -->
        <li class="nav-item"><a class="nav-link active" href="contact.php">Contact Us</a></li> <!-- Current page: Contact -->
        <?php if (!isset($_SESSION['user_id'])): ?> <!-- If user is not logged in -->
          <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li> <!-- Register link -->
          <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li> <!-- Login link -->
        <?php else: ?> <!-- If user is logged in -->
          <li class="nav-item"><a class="nav-link" href="main.php">Dashboard</a></li> <!-- Dashboard link -->
          <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li> <!-- Logout link -->
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>

<!-- Hero Section -->
<section class="hero-section home-hero text-white text-center d-flex align-items-center"> <!-- Starting hero section -->
  <div class="container py-5"> <!-- Container for hero content -->
    <h1 class="display-4 fw-bold">Contact Us</h1> <!-- Main heading -->
    <p class="lead">We're here to help. Reach out to us with any questions or inquiries.</p> <!-- Subheading -->
    <p>We respect your privacy and protect your data.</p> <!-- Privacy note -->
  </div>
</section>

<!-- Contact Form Section -->
<section class="py-5 contact-form-section" data-aos="fade-up"> <!-- Starting contact form section -->
  <div class="container"> <!-- Form container -->
    <h2 class="text-center text-purple mb-5">Get in Touch</h2> <!-- Section title -->
    <form id="contactForm" onsubmit="return validateForm()" class="mx-auto" style="max-width: 600px;"> <!-- Form element -->
      <div class="mb-3">
        <label for="firstName" class="form-label text-purple">First Name</label> <!-- First name label -->
        <input type="text" class="form-control" id="firstName" name="firstName" /> <!-- First name input -->
      </div>
      <div class="mb-3">
        <label for="surname" class="form-label text-purple">Surname</label> <!-- Surname label -->
        <input type="text" class="form-control" id="surname" name="surname" /> <!-- Surname input -->
      </div>
      <div class="mb-3">
        <label for="phone" class="form-label text-purple">Phone Number</label> <!-- Phone label -->
        <input type="tel" class="form-control" id="phone" name="phone" /> <!-- Phone input -->
      </div>
      <div class="mb-3">
        <label for="email" class="form-label text-purple">Email</label> <!-- Email label -->
        <input type="text" class="form-control" id="email" name="email" /> <!-- Email input -->
      </div>
      <div class="mb-3">
        <label for="message" class="form-label text-purple">Message</label> <!-- Message label -->
        <textarea class="form-control" id="message" name="message" rows="4"></textarea> <!-- Message input -->
      </div>
      <div class="form-check mb-3">
        <input type="checkbox" class="form-check-input" id="consent" name="consent" /> <!-- Consent checkbox -->
        <label class="form-check-label text-purple" for="consent">
          I consent to the collection and processing of my personal data in accordance with the
          <a href="/privacy-policy" class="text-decoration-underline text-purple" target="_blank">Privacy Policy</a>.
        </label>
      </div>

      <!-- Emoji CAPTCHA -->
      <div class="mb-4 text-center"> <!-- Emoji CAPTCHA challenge -->
        <label class="form-label text-purple mb-2">Which one is a 🐱?</label> <!-- CAPTCHA question -->
        <div class="d-flex justify-content-center gap-3">
            <button type="button" class="btn btn-light border rounded-circle fs-4" onclick="selectEmojiCaptcha('🐶', this)">🐶</button>
            <button type="button" class="btn btn-light border rounded-circle fs-4" onclick="selectEmojiCaptcha('🐱', this)">🐱</button>
            <button type="button" class="btn btn-light border rounded-circle fs-4" onclick="selectEmojiCaptcha('🐸', this)">🐸</button>
        </div>
        <input type="hidden" id="emojiCaptchaAnswer" name="emojiCaptchaAnswer"> <!-- Hidden input for CAPTCHA -->
      </div>

      <div class="text-center">
        <button type="submit" class="btn btn-primary px-4">Submit</button> <!-- Submit button -->
      </div>
    </form>
  </div>
</section>

<!-- Footer -->
<footer class="text-white text-center py-4 bg-purple"> <!-- Footer section -->
  <p>Cookies Policy | Legal Terms | Privacy Policy</p> <!-- Legal links -->
  <p>Connect with us: Instagram | LinkedIn | Twitter | Facebook</p> <!-- Social links -->
  <p>&copy; 2025 Portfolio Creator for Tech. All Rights Reserved.</p> <!-- Copyright -->
</footer>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> <!-- Bootstrap JS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> <!-- AOS animation script -->
<script>
  AOS.init({ duration: 1000, once: true }); // Initializing AOS with config
</script>
</body>
</html>