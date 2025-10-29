<?php
session_start(); // Starting the session to manage user login state
$theme = $_COOKIE['techfolio_theme'] ?? 'light'; // Getting theme from cookie or defaulting to light
require_once 'database.php'; // Including database connection

if (!isset($_SESSION['user_id'])) { // If user is not logged in
    header("Location: login.php"); // Redirect to login page
    exit(); // Stop further execution
}
if ($_SESSION['role'] === 'admin') { // If the user is an admin
    header("Location: admin.php"); // Redirect to admin dashboard
    exit(); // Stop script after redirection
}

if (isset($_SESSION['user_id'])) { // If user session is set
    $userId = $_SESSION['user_id']; // Get user ID
    $res = $conn->query("SELECT theme FROM users WHERE id = $userId"); // Query user's theme from DB
    $user = $res->fetch_assoc(); // Fetch result
    $theme = $user['theme'] ?? 'light'; // Update theme if found
}

$userId = $_SESSION['user_id']; // Store user ID for reuse
$result = $conn->query("SELECT name, email, registered_at FROM users WHERE id = $userId"); // Query user profile data
$user = $result->fetch_assoc(); // Fetch profile info as associative array
?>

<!DOCTYPE html> <!-- Declaring HTML5 document type -->
<html lang="en"> <!-- Setting language to English -->
<head>
  <meta charset="UTF-8" /> <!-- Character encoding set to UTF-8 -->
  <title>User Dashboard - TechFolio</title> <!-- Webpage title -->
  <meta name="viewport" content="width=device-width, initial-scale=1" /> <!-- Enabling responsive design -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" /> <!-- Linking Bootstrap CSS -->
  <link rel="stylesheet" href="styles.css"> <!-- Linking custom CSS -->
  <script src="script.js"></script> <!-- Linking custom JavaScript -->
</head>
<body class="<?php echo ($theme === 'dark') ? 'dark-mode' : ''; ?>"> <!-- Setting body class based on theme -->

<!-- Navbar section -->
<nav class="navbar navbar-expand-lg navbar-dark sticky-top gradient-navbar"> <!-- Sticky, expandable navbar -->
  <div class="container"> <!-- Centered navbar content -->
    <a class="navbar-brand" href="home.php"> <!-- Logo link to homepage -->
      <img src="tech.png" alt="TechFolio logo" width="40" height="40"> <!-- Brand logo -->
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"> <!-- Mobile navbar toggle -->
      <span class="navbar-toggler-icon"></span> <!-- Icon displayed in collapsed menu -->
    </button>
    <div class="collapse navbar-collapse" id="navbarNav"> <!-- Collapsible navbar content -->
      <ul class="navbar-nav ms-auto"> <!-- Right-aligned navigation links -->
        <li class="nav-item"><a class="nav-link active" href="main.php">Dashboard</a></li>
        <li class="nav-item"><a class="nav-link" href="create.php">Create Portfolio</a></li>
        <li class="nav-item"><a class="nav-link" href="templates.php">Templates</a></li>
        <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
      </ul>
      <button onclick="toggleTheme()" class="btn btn-sm btn-outline-light ms-2">🌓 Toggle Theme</button> <!-- Theme toggle button -->
    </div>
  </div>
</nav>

<!-- Email verification alert if not verified -->
<?php if (isset($_SESSION['unverified']) && $_SESSION['unverified']): ?>
  <div class="alert alert-warning text-center m-0 rounded-0"> <!-- Alert message -->
    ⚠️ Your email is not verified.
    <a href="resend_verification.php" class="btn btn-sm btn-outline-primary ms-2">Resend Verification Link</a>
  </div>
<?php endif; ?>

<!-- Dashboard Main Content -->
<section class="py-5"> <!-- Vertical padding -->
  <div class="container"> <!-- Content container -->
    <div class="text-center mb-4"> <!-- Welcome text -->
      <h2 class="text-purple">👋 Welcome back, <?= htmlspecialchars($user['name']) ?>!</h2>
      <p class="text-muted">Here’s your dashboard overview</p>
    </div>

    <div class="row g-4 mb-4"> <!-- Feature tiles -->
      <div class="col-md-4">
        <div class="dashboard-tile text-center">
          <h6>🎨 Create Portfolio</h6>
          <a href="create.php" class="btn btn-primary w-100 mt-2">Start Now</a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="dashboard-tile text-center">
          <h6>📂 Browse Templates</h6>
          <a href="templates.php" class="btn btn-outline-primary w-100 mt-2">View Gallery</a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="dashboard-tile text-center">
          <h6>📘 Learn & Tutorials</h6>
          <a href="https://support.wix.com/en/" target="_blank" class="btn btn-outline-secondary w-100 mt-2">Explore</a>
        </div>
      </div>
    </div>

    <!-- Profile Info Section -->
    <div class="user-card mb-4">
      <h5 class="text-purple">🧑‍💼 Profile Info</h5>
      <p><strong>Name:</strong> <?= htmlspecialchars($user['name']) ?></p>
      <p><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>
      <p><strong>Member since:</strong> <?= date("F j, Y", strtotime($user['registered_at'])) ?></p>
    </div>

    <!-- Progress Bar Section -->
    <div class="user-card mb-4">
      <h5 class="text-purple">📊 Portfolio Progress</h5>
      <div class="progress" style="height: 20px;">
        <div class="progress-bar bg-purple" role="progressbar" style="width: 70%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">
          70% Complete
        </div>
      </div>
    </div>

    <!-- Activity Section -->
    <div class="user-card">
      <h5 class="text-purple">📰 Recent Activity</h5>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">✅ Registered your account</li>
        <li class="list-group-item">🎯 Selected a starter template</li>
        <li class="list-group-item">📝 Updated contact details</li>
      </ul>
    </div>
  </div>
</section>

<!-- Footer -->
<footer class="text-white text-center py-4 bg-purple"> <!-- Footer with background -->
  <p>Cookies Policy | Legal Terms | Privacy Policy</p>
  <p>Connect with us: Instagram | LinkedIn | Twitter | Facebook</p>
  <p>&copy; 2025 Portfolio Creator for Tech. All Rights Reserved.</p>
</footer>

<!-- Cookie Banner -->
<div id="cookie-banner" class="cookie-banner" style="display:none;"> <!-- Hidden by default -->
  This site uses cookies to improve your experience.
  <button onclick="acceptCookies()">Got it!</button>
</div>

</body>
</html>