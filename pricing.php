<?php session_start(); ?> <!-- Starting the PHP session to handle login state -->
<!DOCTYPE html> <!-- Declaring the HTML5 document type -->
<html lang="en"> <!-- Setting the language of the document -->
<head>
  <meta charset="UTF-8"> <!-- Declaring the character encoding -->
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Enabling responsive scaling on mobile devices -->
  <title>Pricing - TechFolio</title> <!-- Setting the page title -->

  <!-- Google Fonts for typography -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&family=Poppins:wght@600&display=swap" rel="stylesheet">

  <!-- Bootstrap CSS for layout and components -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- AOS (Animate On Scroll) library CSS -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <!-- Custom stylesheet -->
  <link href="styles.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark sticky-top gradient-navbar"> <!-- Sticky dark gradient navbar -->
  <div class="container"> <!-- Navbar content container -->
    <a class="navbar-brand" href="home.php"> <!-- Logo that links to the homepage -->
      <img src="tech.png" alt="TechFolio logo" width="40" height="40"> <!-- Logo image -->
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"> <!-- Toggle button for mobile -->
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav"> <!-- Collapsible menu items -->
      <ul class="navbar-nav ms-auto"> <!-- Right-aligned nav links -->
        <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="create.php">Create Portfolio</a></li>
        <li class="nav-item"><a class="nav-link" href="templates.php">Templates</a></li>
        <li class="nav-item"><a class="nav-link active" href="pricing.php">Pricing</a></li>
        <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>
        <?php if (!isset($_SESSION['user_id'])): ?> <!-- Show if user is not logged in -->
          <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
          <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
        <?php else: ?> <!-- Show if user is logged in -->
          <li class="nav-item"><a class="nav-link" href="main.php">Dashboard</a></li>
          <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>

<!-- Hero Section -->
<section class="hero-section home-hero text-white text-center d-flex align-items-center"> <!-- Hero banner -->
  <div class="container py-5"> <!-- Banner container -->
    <h1 class="display-4 fw-bold">TechFolio Plans</h1> <!-- Main heading -->
    <p class="lead">Simple and affordable pricing plans tailored for your needs.</p> <!-- Subtitle -->
  </div>
</section>

<!-- Pricing Section -->
<section class="pricing-section" data-aos="fade-up"> <!-- Animated pricing plans section -->
  <div class="container"> <!-- Container for the cards -->
    <h2 class="text-center text-purple mb-5">Choose Your Plan</h2> <!-- Section title -->
    <div class="row g-4 justify-content-center"> <!-- Row of pricing cards -->

      <!-- Basic Plan -->
      <div class="col-md-4">
        <div class="card h-100 shadow-sm border-0 d-flex flex-column justify-content-between pricing-card">
          <div class="card-body text-center d-flex flex-column">
            <h5 class="card-title">Basic</h5>
            <h6 class="card-subtitle mb-3 text-muted">€15/month</h6>
            <ul class="list-unstyled mb-4 text-start px-4 flex-grow-1">
              <li>✅ 1 Portfolio</li>
              <li>✅ Free domain for 1 year</li>
              <li>✅ 2 GB storage space</li>
              <li>✅ Multi-cloud hosting</li>
              <li>✅ 2 site collaborations</li>
              <li>✅ Basic Templates</li>
              <li>✅ Customizable Features</li>
              <li>✅ 24/7 Support</li>
            </ul>
            <a href="create.php" class="btn btn-primary">Choose Basic</a>
          </div>
        </div>
      </div>

      <!-- Pro Plan -->
      <div class="col-md-4">
        <div class="card h-100 shadow-sm border-0 d-flex flex-column justify-content-between pricing-card">
          <div class="card-body text-center d-flex flex-column">
            <h5 class="card-title">Pro <span class="badge bg-warning text-dark ms-2" title="Our most recommended plan">Most Popular</span></h5>
            <h6 class="card-subtitle mb-3 text-muted">€25/month</h6>
            <ul class="list-unstyled mb-4 text-start px-4 flex-grow-1">
              <li>✅ Up to 5 Portfolios</li>
              <li>✅ Free domain for 1 year</li>
              <li>✅ 50 GB storage space</li>
              <li>✅ Multi-cloud hosting</li>
              <li>✅ Basic marketing suite</li>
              <li>✅ 5 site collaborations</li>
              <li>✅ Advanced Templates</li>
              <li>✅ Custom Domain</li>
              <li>✅ Priority Support</li>
            </ul>
            <a href="create.php" class="btn btn-primary">Choose Pro</a>
          </div>
        </div>
      </div>

      <!-- Premium Plan -->
      <div class="col-md-4">
        <div class="card h-100 shadow-sm border-0 d-flex flex-column justify-content-between pricing-card">
          <div class="card-body text-center d-flex flex-column">
            <h5 class="card-title">Premium</h5>
            <h6 class="card-subtitle mb-3 text-muted">€35/month</h6>
            <ul class="list-unstyled mb-4 text-start px-4 flex-grow-1">
              <li>✅ Unlimited Portfolios</li>
              <li>✅ Free domain for 1 year</li>
              <li>✅ 100 GB storage space</li>
              <li>✅ Multi-cloud hosting</li>
              <li>✅ Standard marketing suite</li>
              <li>✅ 10 site collaborations</li>
              <li>✅ All Templates</li>
              <li>✅ Dedicated Support</li>
            </ul>
            <a href="create.php" class="btn btn-primary">Choose Premium</a>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- Footer -->
<footer class="text-white text-center py-4 bg-purple"> <!-- Footer with branding -->
  <p>Cookies Policy | Legal Terms | Privacy Policy</p> <!-- Policy links -->
  <p>Connect with us: Instagram | LinkedIn | Twitter | Facebook</p> <!-- Social media -->
  <p>&copy; 2025 Portfolio Creator for Tech. All Rights Reserved.</p> <!-- Copyright -->
</footer>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> <!-- Bootstrap JS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> <!-- AOS animation library -->
<script>
  AOS.init({ duration: 1000, once: true }); // Initializing AOS with custom settings
</script>
</body>
</html>