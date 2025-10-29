<?php session_start(); ?> <!-- Starting the PHP session to maintain user state across pages -->
<!DOCTYPE html> <!-- Declaring the document as HTML5 -->
<html lang="en"> <!-- Opening the HTML tag and setting the language to English -->
<head> <!-- Opening the head section where metadata and links are defined -->
  <meta charset="UTF-8"> <!-- Setting character encoding to UTF-8 -->
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Setting viewport for responsive design -->
  <title>Templates - TechFolio</title> <!-- Defining the title of the webpage -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&family=Poppins:wght@600&display=swap" rel="stylesheet"> <!-- Linking Google Fonts for styling text -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> <!-- Linking Bootstrap CSS for styling and layout -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> <!-- Linking AOS library for scroll animations -->
  <link href="styles.css" rel="stylesheet"> <!-- Linking the custom stylesheet -->
</head> <!-- Closing the head section -->
<body> <!-- Opening the body where all visible content goes -->

<!-- Navbar --> <!-- Creating a navigation bar -->
<nav class="navbar navbar-expand-lg navbar-dark sticky-top gradient-navbar"> <!-- Defining navbar using Bootstrap classes -->
  <div class="container"> <!-- Creating a container for navbar content -->
    <a class="navbar-brand" href="home.php"> <!-- Defining brand logo link -->
      <img src="tech.png" alt="TechFolio logo" width="40" height="40"> <!-- Displaying brand logo image -->
    </a> <!-- Closing anchor tag -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"> <!-- Creating a toggle button for small screens -->
      <span class="navbar-toggler-icon"></span> <!-- Displaying the toggle icon -->
    </button> <!-- Closing button -->
    <div class="collapse navbar-collapse" id="navbarNav"> <!-- Creating collapsible menu section -->
      <ul class="navbar-nav ms-auto"> <!-- Starting the navbar menu items, aligning to right -->
        <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li> <!-- Linking to Home page -->
        <li class="nav-item"><a class="nav-link" href="create.php">Create Portfolio</a></li> <!-- Linking to Create Portfolio page -->
        <li class="nav-item"><a class="nav-link active" href="templates.php">Templates</a></li> <!-- Linking to Templates page -->
        <li class="nav-item"><a class="nav-link" href="pricing.php">Pricing</a></li> <!-- Linking to Pricing page -->
        <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li> <!-- Linking to Contact Us page -->
        <?php if (!isset($_SESSION['user_id'])): ?> <!-- Checking if user is not logged in -->
          <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li> <!-- Showing Register link -->
          <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li> <!-- Showing Login link -->
        <?php else: ?> <!-- Otherwise (user is logged in) -->
          <li class="nav-item"><a class="nav-link" href="main.php">Dashboard</a></li> <!-- Showing Dashboard link -->
          <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li> <!-- Showing Logout link -->
        <?php endif; ?> <!-- Ending the conditional statement -->
      </ul> <!-- Closing navbar items list -->
    </div> <!-- Closing collapsible div -->
  </div> <!-- Closing container div -->
</nav> <!-- Closing navbar -->

<!-- Hero Section --> <!-- Defining the top hero section of the page -->
<section class="hero-section home-hero text-white text-center d-flex align-items-center"> <!-- Adding classes for styling and layout -->
  <div class="container py-5"> <!-- Adding padding inside a Bootstrap container -->
    <h1 class="display-4 fw-bold">Choose Your Perfect Template</h1> <!-- Displaying main heading -->
    <p class="lead">Select from a variety of beautifully designed templates to showcase your portfolio.</p> <!-- Displaying supporting text -->
    <a href="pricing.php" class="btn btn-primary btn-lg mt-3">Choose Your Plan</a> <!-- Linking to pricing page with a styled button -->
  </div> <!-- Closing container -->
</section> <!-- Closing hero section -->

<!-- Filter and Sort --> <!-- Starting the filtering and sorting options section -->
<section class="filter-sort" data-aos="fade-up"> <!-- Applying scroll animation to section -->
  <div class="container text-center"> <!-- Centering content inside a container -->
    <h2 class="text-purple mb-4">Find Your Ideal Template</h2> <!-- Displaying section title -->
    <p class="text-muted mb-4">Use the options below to filter and sort templates by category, style, or popularity.</p> <!-- Providing instructions for the form -->
    <form class="row justify-content-center gx-3 gy-2 align-items-end"> <!-- Starting responsive form layout -->
      <div class="col-md-3"> <!-- Creating column for category selection -->
        <label for="categorySelect" class="form-label">Category</label> <!-- Labeling category dropdown -->
        <select class="form-select" id="categorySelect"> <!-- Starting category dropdown -->
          <option selected disabled>Choose...</option> <!-- Placeholder option -->
          <option>Creative</option> <!-- Option for Creative category -->
          <option>Modern</option> <!-- Option for Modern category -->
          <option>Classic</option> <!-- Option for Classic category -->
          <option>Grid</option> <!-- Option for Grid category -->
          <option>Minimal</option> <!-- Option for Minimal category -->
          <option>Vertical</option> <!-- Option for Vertical category -->
        </select> <!-- Ending dropdown -->
      </div> <!-- Ending category column -->
      <div class="col-md-3"> <!-- Creating column for sort selection -->
        <label for="sortSelect" class="form-label">Sort by</label> <!-- Labeling sort dropdown -->
        <select class="form-select" id="sortSelect"> <!-- Starting sort dropdown -->
          <option selected disabled>Choose...</option> <!-- Placeholder option -->
          <option>Popular</option> <!-- Sorting option: Popular -->
          <option>Newest</option> <!-- Sorting option: Newest -->
          <option>Oldest</option> <!-- Sorting option: Oldest -->
          <option>Price: Low → High</option> <!-- Sorting option: Price Low to High -->
          <option>Price: High → Low</option> <!-- Sorting option: Price High to Low -->
        </select> <!-- Ending dropdown -->
      </div> <!-- Ending sort column -->
      <div class="col-md-auto"> <!-- Creating column for reset button -->
        <label class="form-label invisible">Reset</label> <!-- Providing label for alignment only -->
        <button type="reset" class="btn btn-outline-secondary w-100">Reset</button> <!-- Adding reset button -->
      </div> <!-- Ending reset column -->
    </form> <!-- Ending form -->
  </div> <!-- Closing container -->
</section> <!-- Closing filter and sort section -->

<!-- Template Gallery --> <!-- Starting template gallery section -->
<!-- Starting the section for displaying the template gallery -->
<section class="template-gallery" data-aos="fade-up"> <!-- Defining the section and applying scroll animation -->

  <!-- Creating a responsive container to center and contain content -->
  <div class="container">

    <!-- Adding a centered purple heading with bottom spacing -->
    <h2 class="text-center text-purple mb-5">Explore Our Templates</h2>

    <!-- Starting a row with gutter spacing for grid layout -->
    <div class="row g-4">

      <!-- Adding first template card using a 4-column layout and flex alignment -->
      <div class="col-md-4 d-flex">
        <!-- Creating a card with full width, shadow effect and scaling on hover -->
        <div class="card w-100 shadow-sm hover-scale">
          <!-- Displaying template image at the top and rounding the corners -->
          <img src="templates/template1.jpg" class="card-img-top rounded">
          <!-- Creating card body with centered alignment -->
          <div class="card-body text-center">
            <!-- Showing the template title with purple text -->
            <h5 class="card-title text-purple">Ayelet Raziel</h5>
            <!-- Adding button for using the template, linking to create page -->
            <a href="create.php" class="btn btn-primary">Use Template</a>
          </div> <!-- Closing card-body -->
        </div> <!-- Closing card -->
      </div> <!-- Closing column -->

      <!-- Repeating the card structure for each of the remaining templates -->
      <!-- Template 2 -->
      <div class="col-md-4 d-flex">
        <div class="card w-100 shadow-sm hover-scale">
          <img src="templates/template2.jpg" class="card-img-top rounded">
          <div class="card-body text-center">
            <h5 class="card-title text-purple">David Milan</h5>
            <a href="create.php" class="btn btn-primary">Use Template</a>
          </div>
        </div>
      </div>

      <!-- Template 3 -->
      <div class="col-md-4 d-flex">
        <div class="card w-100 shadow-sm hover-scale">
          <img src="templates/template3.jpg" class="card-img-top rounded">
          <div class="card-body text-center">
            <h5 class="card-title text-purple">Pedro Campos</h5>
            <a href="create.php" class="btn btn-primary">Use Template</a>
          </div>
        </div>
      </div>

      <!-- Template 4 -->
      <div class="col-md-4 d-flex">
        <div class="card w-100 shadow-sm hover-scale">
          <img src="templates/template4.png" class="card-img-top rounded">
          <div class="card-body text-center">
            <h5 class="card-title text-purple">Isobel Barber</h5>
            <a href="create.php" class="btn btn-primary">Use Template</a>
          </div>
        </div>
      </div>
      
      <!-- Template 5 -->
      <div class="col-md-4 d-flex">
        <div class="card w-100 shadow-sm hover-scale">
          <img src="templates/template5.png" class="card-img-top rounded">
          <div class="card-body text-center">
            <h5 class="card-title text-purple">Mark Clennon</h5>
            <a href="create.php" class="btn btn-primary">Use Template</a>
          </div>
        </div>
      </div>

      <!-- Template 6 -->
      <div class="col-md-4 d-flex">
        <div class="card w-100 shadow-sm hover-scale">
          <img src="templates/template6.png" class="card-img-top rounded">
          <div class="card-body text-center">
            <h5 class="card-title text-purple">Yukai Du</h5>
            <a href="create.php" class="btn btn-primary">Use Template</a>
          </div>
        </div>
      </div>

      <!-- Template 7 -->
      <div class="col-md-4 d-flex">
        <div class="card w-100 shadow-sm hover-scale">
          <img src="templates/template7.jpg" class="card-img-top rounded">
          <div class="card-body text-center">
            <h5 class="card-title text-purple">Baugasm</h5>
            <a href="create.php" class="btn btn-primary">Use Template</a>
          </div>
        </div>
      </div>

      <!-- Template 8 -->
      <div class="col-md-4 d-flex">
        <div class="card w-100 shadow-sm hover-scale">
          <img src="templates/template8.jpg" class="card-img-top rounded">
          <div class="card-body text-center">
            <h5 class="card-title text-purple">Christina Lee</h5>
            <a href="create.php" class="btn btn-primary">Use Template</a>
          </div>
        </div>
      </div>

      <!-- Template 9 -->
      <div class="col-md-4 d-flex">
        <div class="card w-100 shadow-sm hover-scale">
          <img src="templates/template9.jpg" class="card-img-top rounded">
          <div class="card-body text-center">
            <h5 class="card-title text-purple">Alessandro Casagrande</h5>
            <a href="create.php" class="btn btn-primary">Use Template</a>
          </div>
        </div>
      </div>

      <!-- Template 10 -->
      <div class="col-md-4 d-flex">
        <div class="card w-100 shadow-sm hover-scale">
          <img src="templates/template10.png" class="card-img-top rounded">
          <div class="card-body text-center">
            <h5 class="card-title text-purple">Wendy Ju</h5>
            <a href="create.php" class="btn btn-primary">Use Template</a>
          </div>
        </div>
      </div>

      <!-- Template 11 -->
      <div class="col-md-4 d-flex">
        <div class="card w-100 shadow-sm hover-scale">
          <img src="templates/template11.png" class="card-img-top rounded">
          <div class="card-body text-center">
            <h5 class="card-title text-purple">Yannis Loukos</h5>
            <a href="create.php" class="btn btn-primary">Use Template</a>
          </div>
        </div>
      </div>

      <!-- Template 12 -->
      <div class="col-md-4 d-flex">
        <div class="card w-100 shadow-sm hover-scale">
          <img src="templates/template12.png" class="card-img-top rounded">
          <div class="card-body text-center">
            <h5 class="card-title text-purple">Chen Liang</h5>
            <a href="create.php" class="btn btn-primary">Use Template</a>
          </div>
        </div>
      </div>

      <!-- Template 13 -->
      <div class="col-md-4 d-flex">
        <div class="card w-100 shadow-sm hover-scale">
          <img src="templates/template13.png" class="card-img-top rounded">
          <div class="card-body text-center">
            <h5 class="card-title text-purple">Jacqueline Liu</h5>
            <a href="create.php" class="btn btn-primary">Use Template</a>
          </div>
        </div>
      </div>

      <!-- Template 14 -->
      <div class="col-md-4 d-flex">
        <div class="card w-100 shadow-sm hover-scale">
          <img src="templates/template14.png" class="card-img-top rounded">
          <div class="card-body text-center">
            <h5 class="card-title text-purple">Agnieszka Nowak</h5>
            <a href="create.php" class="btn btn-primary">Use Template</a>
          </div>
        </div>
      </div>

      <!-- Template 15 -->
      <div class="col-md-4 d-flex">
        <div class="card w-100 shadow-sm hover-scale">
          <img src="templates/template15.png" class="card-img-top rounded">
          <div class="card-body text-center">
            <h5 class="card-title text-purple">Lena Röhrs</h5>
            <a href="create.php" class="btn btn-primary">Use Template</a>
          </div>
        </div>
      </div>

      <!-- Template 16 -->
      <!-- Displaying video templates using <video> tag instead of <img> -->
      <div class="col-md-4 d-flex">
        <div class="card w-100 shadow-sm hover-scale">
          <video class="card-img-top rounded" autoplay muted loop>
            <source src="templates/template16.mp4" type="video/mp4" />
          </video>
          <div class="card-body text-center">
            <h5 class="card-title text-purple">Giovanni Rovelli</h5>
            <a href="create.php" class="btn btn-primary">Use Template</a>
          </div>
        </div>
      </div>

      <!-- Template 17 -->
      <div class="col-md-4 d-flex">
        <div class="card w-100 shadow-sm hover-scale">
          <video class="card-img-top rounded" autoplay muted loop>
            <source src="templates/template17.mp4" type="video/mp4" />
          </video>
          <div class="card-body text-center">
            <h5 class="card-title text-purple">Modern Studio</h5>
            <a href="create.php" class="btn btn-primary">Use Template</a>
          </div>
        </div>
      </div>
      
      <!-- Template 18 -->
      <div class="col-md-4 d-flex">
        <div class="card w-100 shadow-sm hover-scale">
          <video class="card-img-top rounded" autoplay muted loop>
            <source src="templates/template18.mp4" type="video/mp4" />
          </video>
          <div class="card-body text-center">
            <h5 class="card-title text-purple">Modern Studio</h5>
            <a href="create.php" class="btn btn-primary">Use Template</a>
          </div>
        </div>
      </div>

    </div> <!-- Closing the row with all templates -->
  </div> <!-- Closing the container block -->
</section> <!-- Finishing the full template gallery section -->

<!-- Footer --> <!-- Creating the footer section of the website -->
<footer class="text-white text-center py-4 bg-purple"> <!-- Styling footer with padding and color -->
  <p>Cookies Policy | Legal Terms | Privacy Policy</p> <!-- Displaying policy links -->
  <p>Connect with us: Instagram | LinkedIn | Twitter | Facebook</p> <!-- Displaying social media links -->
  <p>&copy; 2025 Portfolio Creator for Tech. All Rights Reserved.</p> <!-- Showing copyright -->
</footer> <!-- Closing footer -->

<!-- Scripts --> <!-- Adding JavaScript and library scripts at the bottom for better performance -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> <!-- Loading Bootstrap JavaScript bundle -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> <!-- Loading AOS JavaScript library -->
<script>
  AOS.init({ duration: 1000, once: true }); // Initializing AOS with animation duration and setting one-time trigger
</script> <!-- Ending script -->
</body> <!-- Closing body tag -->
</html> <!-- Closing html tag -->
