<?php
session_start(); // Starting session to manage login state
require_once 'database.php'; // Including database connection

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') { // Checking if user is not admin
    header("Location: login.php"); // Redirecting to login if unauthorized
    exit(); // Stopping script
}

// Defining sample site settings
$settings = [
    'Site Title' => 'TechFolio', // Site title
    'Theme Color' => 'Purple/Blue Gradient', // Color theme used across site
    'User Verification Required' => 'Yes', // User email verification status
    'Max Upload Size' => '10MB' // Upload size limit for user content
];
?>

<!DOCTYPE html> <!-- Declaring HTML5 document -->
<html lang="en"> <!-- Setting language to English -->
<head>
  <meta charset="UTF-8" /> <!-- Setting character encoding -->
  <title>Settings - TechFolio</title> <!-- Defining page title -->
  <meta name="viewport" content="width=device-width, initial-scale=1" /> <!-- Enabling responsive design -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" /> <!-- Including Bootstrap CSS -->
  <link rel="stylesheet" href="styles.css"> <!-- Linking custom styles -->
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark sticky-top gradient-navbar"> <!-- Defining sticky top navigation -->
  <div class="container"> <!-- Wrapping navbar content -->
    <a class="navbar-brand" href="home.php"> <!-- Logo link -->
      <img src="tech.png" alt="TechFolio logo" width="40" height="40"> <!-- Logo image -->
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"> <!-- Toggle button -->
      <span class="navbar-toggler-icon"></span> <!-- Icon for toggle -->
    </button>
    <div class="collapse navbar-collapse" id="navbarNav"> <!-- Collapsible section -->
      <ul class="navbar-nav ms-auto"> <!-- Navigation list aligned to right -->
        <li class="nav-item"><a class="nav-link" href="admin.php">Dashboard</a></li> <!-- Admin dashboard link -->
        <li class="nav-item"><a class="nav-link" href="users.php">Users</a></li> <!-- Users management link -->
        <li class="nav-item"><a class="nav-link active" href="settings.php">Settings</a></li> <!-- Active page link -->
        <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li> <!-- Logout option -->
      </ul>
    </div>
  </div>
</nav>

<!-- Main Content -->
<section class="py-5"> <!-- Adding vertical padding -->
  <div class="container"> <!-- Wrapping main content -->
    <h2 class="text-purple text-center mb-4">⚙️ Site Settings</h2> <!-- Section heading -->

    <div class="row g-4"> <!-- Responsive row layout -->
      <?php foreach ($settings as $label => $value): ?> <!-- Looping through settings array -->
      <div class="col-md-6"> <!-- Each setting in its own column -->
        <div class="soft-card"> <!-- Custom styled card -->
          <h6 class="text-muted"><?= $label ?></h6> <!-- Setting name -->
          <p class="fw-bold"><?= $value ?></p> <!-- Setting value -->
        </div>
      </div>
      <?php endforeach; ?> <!-- Ending PHP loop -->
    </div>

    <div class="soft-card mt-5"> <!-- Admin-specific options section -->
      <h5 class="text-purple">🔐 Admin Options</h5> <!-- Section heading -->
      <ul class="list-group list-group-flush"> <!-- Displaying admin privileges -->
        <li class="list-group-item">Manage feature access for users</li> <!-- Option 1 -->
        <li class="list-group-item">Review submitted portfolios</li> <!-- Option 2 -->
        <li class="list-group-item">Control content visibility</li> <!-- Option 3 -->
      </ul>
    </div>
  </div>
</section>

<!-- Footer -->
<footer class="text-white text-center py-4 bg-purple"> <!-- Creating styled footer -->
  <p>Cookies Policy | Legal Terms | Privacy Policy</p> <!-- Policy links -->
  <p>Connect with us: Instagram | LinkedIn | Twitter | Facebook</p> <!-- Social links -->
  <p>&copy; 2025 Portfolio Creator for Tech. All Rights Reserved.</p> <!-- Copyright -->
</footer>

<!-- Bootstrap Script -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> <!-- Including Bootstrap JS -->
</body>
</html>