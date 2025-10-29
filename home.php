<?php
// Starting the session to keep track of whether a user is logged in or not
session_start();

// Getting the 'techfolio_theme' cookie value if it's set
// If the cookie isn't found, we default to 'light' theme for the site appearance
$theme = $_COOKIE['techfolio_theme'] ?? 'light'; 
?>

<!DOCTYPE html> <!-- Declaring HTML5 document type -->
<html lang="en"> <!-- Setting the language to English -->
<head>
  <meta charset="UTF-8"> <!-- Defining character encoding -->
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Making the site responsive -->
  <title>Home - TechFolio</title> <!-- Setting the page title -->

  <!-- Loading Google Fonts for custom typography -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&family=Poppins:wght@600&display=swap" rel="stylesheet">
  <!-- Linking Bootstrap CSS for layout and components -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Linking AOS CSS for animations on scroll -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <!-- Linking custom stylesheet -->
  <link href="styles.css" rel="stylesheet">
  <!-- Linking JavaScript and deferring execution -->
  <script src="script.js" defer></script>
</head>
<body class="<?php echo ($theme === 'dark') ? 'dark-mode' : ''; ?>"> <!-- Applying dark mode if theme is set -->

<!-- Navbar start -->
<nav class="navbar navbar-expand-lg navbar-dark sticky-top gradient-navbar"> <!-- Bootstrap navbar -->
  <div class="container"> <!-- Wrapping content inside container -->
    <a class="navbar-brand" href="home.php"> <!-- Logo linking to home -->
      <img src="tech.png" alt="TechFolio logo" width="40" height="40">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span> <!-- Hamburger menu icon -->
    </button>
    <div class="collapse navbar-collapse" id="navbarNav"> <!-- Collapsible nav links -->
      <ul class="navbar-nav ms-auto"> <!-- Aligning nav items to right -->
        <li class="nav-item"><a class="nav-link active" href="home.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="create.php">Create Portfolio</a></li>
        <li class="nav-item"><a class="nav-link" href="templates.php">Templates</a></li>
        <li class="nav-item"><a class="nav-link" href="pricing.php">Pricing</a></li>
        <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>
        <!-- Show Register/Login if user is not logged in -->
        <?php if (!isset($_SESSION['user_id'])): ?>
          <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
          <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
        <?php else: ?> <!-- Otherwise show Dashboard/Logout -->
          <li class="nav-item"><a class="nav-link" href="main.php">Dashboard</a></li>
          <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
<!-- Navbar end -->

<!-- Hero section: the big intro with call-to-action button -->
<section class="hero-section home-hero text-white text-center d-flex align-items-center"> <!-- Hero section with styling and alignment -->
  <div class="container py-5"> <!-- Container with vertical padding -->
    <h1 class="display-3 fw-bold">Build your portfolio and your future with TechFolio</h1> <!-- Main headline -->
    <p class="lead">Showcase your skills in a beautifully designed portfolio that will help you stand out and achieve more.</p> <!-- Subheading -->
    <a href="create.php" class="btn btn-primary btn-lg mt-4">Create Your Portfolio</a> <!-- CTA button -->
  </div>
</section>

<!-- Feature section to highlight site benefits -->
<section class="py-5 feature-section" data-aos="fade-up"> <!-- Starting features section -->
  <div class="container"> <!-- Wrapping content in container -->
    <div class="row g-4 justify-content-center text-center"> <!-- Grid layout with spacing and centered text -->
      <!-- First feature -->
      <div class="col-md-4 d-flex flex-column align-items-center text-center"> <!-- Column for first feature -->
        <img src="features/feature1.png" alt="Highlight Skills" class="img-fluid rounded shadow feature-img mb-3"> <!-- Feature image -->
        <h3 class="text-purple">💼 Highlight Your Skills</h3> <!-- Feature title -->
        <p>Create a professional portfolio to showcase your expertise and projects.</p> <!-- Feature description -->
      </div>
      <!-- Second feature -->
      <div class="col-md-4 d-flex flex-column align-items-center text-center"> <!-- Column for second feature -->
        <img src="features/feature2.jpg" alt="Client Reach" class="img-fluid rounded shadow feature-img mb-3">
        <h3 class="text-purple">📣 Reach More People</h3>
        <p>Attract potential clients or employers with a visually stunning portfolio and seamless online experience.</p>
      </div>
      <!-- Third feature -->
      <div class="col-md-4 d-flex flex-column align-items-center text-center"> <!-- Column for third feature -->
        <img src="features/feature3.jpg" alt="Tailored Portfolios" class="img-fluid rounded shadow feature-img mb-3">
        <h3 class="text-purple">🧩 Tailored for You</h3>
        <p>Whether you're a student, freelancer, or professional — TechFolio adapts to your unique brand and purpose.</p>
      </div>
    </div>
  </div>
</section>

<!-- Carousel to show off portfolio templates -->
<section class="py-5 bg-light-purple" data-aos="fade-up"> <!-- Starting templates carousel section -->
  <div class="container text-center"> <!-- Centered container -->
    <h2 class="text-purple mb-4">Explore Our Templates</h2> <!-- Section heading -->
    <div id="templateCarousel" class="carousel slide" data-bs-ride="carousel"> <!-- Bootstrap carousel component -->
      <div class="carousel-inner"> <!-- Carousel content wrapper -->
        <!-- First carousel item: active by default -->
        <div class="carousel-item active">
          <div class="row g-3 justify-content-center">
            <div class="col-md-4"><img src="templates/template1.jpg" class="img-fluid rounded" alt="Template 1"><p>Template 1</p></div>
            <div class="col-md-4"><img src="templates/template2.jpg" class="img-fluid rounded" alt="Template 2"><p>Template 2</p></div>
            <div class="col-md-4"><img src="templates/template3.jpg" class="img-fluid rounded" alt="Template 3"><p>Template 3</p></div>
          </div>
        </div>
        <!-- Second carousel item -->
        <div class="carousel-item">
          <div class="row g-3 justify-content-center">
            <div class="col-md-4"><img src="templates/template4.png" class="img-fluid rounded" alt="Template 4"><p>Template 4</p></div>
            <div class="col-md-4"><img src="templates/template5.png" class="img-fluid rounded" alt="Template 5"><p>Template 5</p></div>
            <div class="col-md-4"><img src="templates/template6.png" class="img-fluid rounded" alt="Template 6"><p>Template 6</p></div>
          </div>
        </div>
      </div>
      <!-- Carousel controls for left and right -->
      <button class="carousel-control-prev" type="button" data-bs-target="#templateCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#templateCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
      </button>
    </div>
  </div>
</section>

<!-- Benefits section: reasons to use TechFolio -->
<section class="py-5 benefits-section" data-aos="fade-up"> <!-- Starting benefits section -->
  <div class="container text-center">
    <h2 class="text-purple mb-4">Why Choose Us?</h2>
    <div class="row g-4">
      <!-- Benefit card 1 -->
      <div class="col-md-4">
        <div class="p-4 bg-white rounded shadow">
          <h3>✨ Effortless portfolio creation</h3>
          <p>Build your portfolio in just minutes with our intuitive, user-friendly tools—no coding required!</p>
        </div>
      </div>
      <!-- Benefit card 2 -->
      <div class="col-md-4">
        <div class="p-4 bg-white rounded shadow">
          <h3>🎨 Fully custom templates</h3>
          <p>Choose from a range of modern templates and personalize every detail to showcase your unique style.</p>
        </div>
      </div>
      <!-- Benefit card 3 -->
      <div class="col-md-4">
        <div class="p-4 bg-white rounded shadow">
          <h3>💬 Guidance every step of the way</h3>
          <p>From template selection to final launch, we provide expert tips and support to help you succeed.</p>
        </div>
      </div>
    </div>
    <!-- CTA button to start building -->
    <a href="create.php" class="btn btn-primary btn-lg mt-5">Start Building</a>
  </div>
</section>

<!-- About us: story, mission and more -->
<section class="py-5 bg-light" data-aos="fade-up"> <!-- Starting the about us section -->
  <div class="container text-center"> <!-- Centered container for content -->
    <h2 class="text-purple mb-5">Our Philosophy at a Glance</h2> <!-- Section heading -->
    <div class="row g-4"> <!-- Grid for three cards -->
      <div class="col-md-4"> <!-- First card column -->
        <div class="card h-100 shadow-sm"> <!-- Card with shadow and full height -->
          <div class="card-body"> <!-- Card content wrapper -->
            <h5 class="card-title">🌟 About Us</h5> <!-- Card title -->
            <p class="card-text">We simplify the portfolio creation process, guiding you every step of the way so you can showcase your skills with confidence.</p> <!-- Card description -->
          </div>
        </div>
      </div>
      <div class="col-md-4"> <!-- Second card column -->
        <div class="card h-100 shadow-sm">
          <div class="card-body">
            <h5 class="card-title">🎯 Our Mission</h5>
            <p class="card-text">Empowering developers, designers, and tech professionals to create stunning, professional portfolios effortlessly.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4"> <!-- Third card column -->
        <div class="card h-100 shadow-sm">
          <div class="card-body">
            <h5 class="card-title">📖 Our Story</h5>
            <p class="card-text">Founded by developers who understand the struggle, we created TechFolio to take the guesswork out of building a professional portfolio.</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Learning + video + tip row -->
    <div class="row align-items-center mt-5"> <!-- Row for extra content -->
      <div class="col-md-4 text-start"> <!-- First column: learning list -->
        <h5 class="text-purple">✨ What You'll Learn</h5>
        <ul class="list-unstyled">
          <li>✔ How to pick a template</li>
          <li>✔ Customize your portfolio</li>
          <li>✔ Publish it in minutes</li>
        </ul>
      </div>
      <div class="col-md-4 text-center"> <!-- Middle column: embedded video -->
        <h4 class="text-purple mb-3">Watch How It Works</h4>
        <video class="img-fluid rounded shadow" autoplay muted loop>
          <source src="aboutus.mp4" type="video/mp4">
          Your browser does not support the video tag.
        </video>
      </div>
      <div class="col-md-4 text-start"> <!-- Third column: quick tip -->
        <h5 class="text-purple">💡 Quick Tip</h5>
        <p>Use the “Modern” template to get started fast — it’s our most popular pick among first-time users!</p>
      </div>
    </div>
  </div>
</section>

<!-- Footer with policies and socials -->
<footer class="text-white text-center py-4 bg-purple"> <!-- Footer section -->
  <p>Cookies Policy | Legal Terms | Privacy Policy</p> <!-- Legal links -->
  <p>Connect with us: Instagram | LinkedIn | Twitter | Facebook</p> <!-- Social links -->
  <p>&copy; 2025 Portfolio Creator for Tech. All Rights Reserved.</p> <!-- Copyright -->
</footer>

<!-- Bootstrap JS and AOS animations -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> <!-- Including Bootstrap bundle JS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> <!-- Including AOS for animations -->
<script>
  AOS.init({ duration: 1000, once: true }); // Initializing AOS with custom settings
</script>

<!-- Cookie banner with dismiss button -->
<div id="cookie-banner" class="cookie-banner" style="display:none;"> <!-- Hidden banner that shows once for consent -->
  This site uses cookies to improve your experience. <!-- Banner message -->
  <button onclick="acceptCookies()">Got it!</button> <!-- Button to dismiss and accept -->
</div>

</body>
</html>