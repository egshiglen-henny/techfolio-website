<?php session_start(); ?> <!-- Starting the session to track logged-in users -->
<!DOCTYPE html>
<html lang="en"> <!-- Declaring the language of the page -->
<head>
  <meta charset="UTF-8"> <!-- Setting the character encoding -->
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Making the layout responsive -->
  <title>Create Portfolio - TechFolio</title> <!-- Setting the page title -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&family=Poppins:wght@600&display=swap" rel="stylesheet"> <!-- Importing custom fonts -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> <!-- Linking Bootstrap CSS -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> <!-- Adding AOS animation library -->
  <link rel="stylesheet" href="styles.css"> <!-- Linking custom styles -->
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark sticky-top gradient-navbar"> <!-- Main navigation bar -->
  <div class="container"> <!-- Containing nav content -->
    <a class="navbar-brand" href="home.php"> <!-- Link to homepage -->
      <img src="tech.png" alt="TechFolio logo" width="40" height="40"> <!-- Logo image -->
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"> <!-- Navbar toggle for mobile -->
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav"> <!-- Navbar links container -->
      <ul class="navbar-nav ms-auto"> <!-- Right-aligned nav items -->
        <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
        <li class="nav-item"><a class="nav-link active" href="create.php">Create Portfolio</a></li>
        <li class="nav-item"><a class="nav-link" href="templates.php">Templates</a></li>
        <li class="nav-item"><a class="nav-link" href="pricing.php">Pricing</a></li>
        <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>
        <?php if (!isset($_SESSION['user_id'])): ?> <!-- If user not logged in -->
          <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
          <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
        <?php else: ?> <!-- If user is logged in -->
          <li class="nav-item"><a class="nav-link" href="main.php">Dashboard</a></li>
          <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>

<!-- Hero Section -->
<section class="hero-section home-hero text-white text-center d-flex align-items-center"> <!-- Top hero banner -->
  <div class="container py-5"> <!-- Hero content wrapper -->
    <h1 class="display-4 fw-bold">Create your portfolio, your way</h1> <!-- Hero headline -->
    <p class="lead">Get started with a layout that reflects your style. It's simple and fast!</p> <!-- Subtext -->
    <a href="templates.php" class="btn btn-primary btn-lg mt-4">Browse Templates</a> <!-- CTA button -->
  </div>
</section>

<!-- Layout Choices Section -->
<section class="choose-layout" data-aos="fade-up"> <!-- Section for layout options -->
  <div class="container text-center">
    <h2 class="text-purple mb-4">Choose Your Layout</h2> <!-- Section heading -->
    <p class="mb-5">Pick one of our designer-made layouts and switch between them anytime to showcase your work.</p> <!-- Description -->
    <div class="row g-4"> <!-- Grid of layout cards -->
      <!-- Repeating layout cards -->
      <div class="col-sm-6 col-md-4">
        <div class="card h-100 shadow-sm border-0 hover-scale">
          <img src="layout/layout1.png" class="card-img-top rounded" alt="Minimalist">
          <div class="card-body">
            <h5 class="card-title text-purple">Minimalist</h5>
          </div>
        </div>
      </div>
      <!-- More layouts... each similar structure -->
      <div class="col-sm-6 col-md-4">
        <div class="card h-100 shadow-sm border-0 hover-scale">
          <img src="layout/layout2.png" class="card-img-top rounded" alt="Grid">
          <div class="card-body">
            <h5 class="card-title text-purple">Grid</h5>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-4">
        <div class="card h-100 shadow-sm border-0 hover-scale">
          <img src="layout/layout3.png" class="card-img-top rounded" alt="Modern">
          <div class="card-body">
            <h5 class="card-title text-purple">Modern</h5>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-4">
        <div class="card h-100 shadow-sm border-0 hover-scale">
          <img src="layout/layout4.png" class="card-img-top rounded" alt="Creative">
          <div class="card-body">
            <h5 class="card-title text-purple">Creative</h5>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-4">
        <div class="card h-100 shadow-sm border-0 hover-scale">
          <img src="layout/layout5.png" class="card-img-top rounded" alt="Classic">
          <div class="card-body">
            <h5 class="card-title text-purple">Classic</h5>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-4">
        <div class="card h-100 shadow-sm border-0 hover-scale">
          <img src="layout/layout6.png" class="card-img-top rounded" alt="Vertical">
          <div class="card-body">
            <h5 class="card-title text-purple">Vertical</h5>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Customization Section -->
<section class="custom-section" data-aos="fade-up"> <!-- Section showing how to customize -->
  <div class="container">
    <div class="row align-items-center text-center text-md-start">
      <div class="col-md-4">
        <h5 class="text-purple">📚 What You'll Learn</h5>
        <ul class="list-unstyled">
          <li>✔ How to pick a layout</li>
          <li>✔ Add your personal touch</li>
          <li>✔ Publish instantly</li>
        </ul>
      </div>
      <div class="col-md-4">
        <div class="ratio ratio-16x9">
          <iframe src="https://www.youtube.com/embed/ahVXQeWXJq8?si=TcpTG-cmcr_XMrIW" title="YouTube tutorial" allowfullscreen></iframe>
        </div>
      </div>
      <div class="col-md-4">
        <h5 class="text-purple">💡 Quick Tips</h5>
        <p>Start with the “Modern” template for a sleek layout, then customize fonts, colors, and sections to make it your own!</p>
      </div>
    </div>
  </div>
</section>

<!-- Blog Section -->
<section class="blog-section" data-aos="fade-up"> <!-- Section showing portfolio tips -->
  <div class="container text-center">
    <h2 class="text-purple mb-4">Get Inspired</h2>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="card blog">
          <img src="blog/blog1.png" alt="Blog 1">
          <a href="https://www.wix.com/blog/how-to-make-online-design-portfolio-guide">
            Top 10 Tips to Create a Design Portfolio
          </a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card blog">
          <img src="blog/blog2.png" alt="Blog 2">
          <a href="https://www.hostinger.com/tutorials/how-to-make-an-online-portfolio">
            How to Build a Portfolio in 11 Steps
          </a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card blog">
          <img src="blog/blog3.png" alt="Blog 3">
          <a href="https://www.w3schools.com/howto/howto_website_create_portfolio.asp">
            Portfolio Creation Tutorial
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- FAQ Section -->
<section class="faq-section" data-aos="fade-up"> <!-- FAQ area -->
  <div class="container">
    <h2 class="text-center text-purple mb-5">Frequently Asked Questions</h2>
    <div class="accordion" id="faqAccordion"> <!-- FAQ accordion -->
      <!-- FAQ Item 1 -->
      <div class="accordion-item">
        <h2 class="accordion-header" id="faqOne">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
            How do I start creating my portfolio?
          </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Choose a layout, then customize your content — no coding needed.
          </div>
        </div>
      </div>

      <!-- FAQ Item 2 -->
      <div class="accordion-item">
        <h2 class="accordion-header" id="faqTwo">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
            Can I change templates later?
          </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Yes! You can switch layouts at any time without losing your content.
          </div>
        </div>
      </div>

      <!-- FAQ Item 3 -->
      <div class="accordion-item">
        <h2 class="accordion-header" id="faqThree">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
            Is it mobile-friendly?
          </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            All templates are responsive and look great on mobile, tablet, and desktop.
          </div>
        </div>
      </div>

      <!-- FAQ Item 4 -->
      <div class="accordion-item">
        <h2 class="accordion-header" id="faqFour">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour">
            Can I use my own domain?
          </button>
        </h2>
        <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Absolutely! You can connect your own domain to give your portfolio a professional touch.
          </div>
        </div>
      </div>

      <!-- FAQ Item 5 -->
      <div class="accordion-item">
        <h2 class="accordion-header" id="faqFive">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive">
            Is there a free version available?
          </button>
        </h2>
        <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Yes, our Basic plan is free and offers all the essential tools to get you started.
          </div>
        </div>
      </div>
    </div>
    <div class="text-center mt-5"> <!-- Contact support CTA -->
      <p class="mb-1">❓ Still have questions?</p>
      <a href="contact.php" class="btn btn-outline-light text-purple border-purple">Contact Support</a>
    </div>
  </div>
</section>

<!-- Footer -->
<footer class="text-white text-center py-4 bg-purple"> <!-- Page footer -->
  <p>Cookies Policy | Legal Terms | Privacy Policy</p>
  <p>Connect with us: Instagram | LinkedIn | Twitter | Facebook</p>
  <p>&copy; 2025 Portfolio Creator for Tech. All Rights Reserved.</p>
</footer>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> <!-- Bootstrap JS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> <!-- AOS animation lib -->
<script>
  AOS.init({ duration: 1000, once: true }); // Initializing AOS
</script>
</body>
</html>