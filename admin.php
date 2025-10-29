<?php
// Starting the session to manage user access
session_start();

// Setting theme based on cookie or defaulting to light mode
$theme = $_COOKIE['techfolio_theme'] ?? 'light';

// Including the database connection file
require_once 'database.php';

// Redirecting to login if user is not an admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

// Loading user's saved theme preference from DB if logged in
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
    $res = $conn->query("SELECT theme FROM users WHERE id = $userId");
    $user = $res->fetch_assoc();
    $theme = $user['theme'] ?? 'light';
}

// Querying total user count
$result = $conn->query("SELECT COUNT(*) AS total FROM users");
$totalUsers = $result->fetch_assoc()['total'];

// Querying total admin count
$result = $conn->query("SELECT COUNT(*) AS total FROM users WHERE role = 'admin'");
$totalAdmins = $result->fetch_assoc()['total'];

// Querying users who registered today
$result = $conn->query("SELECT COUNT(*) AS total FROM users WHERE DATE(registered_at) = CURDATE()");
$totalToday = $result->fetch_assoc()['total'];
?>

<!DOCTYPE html>
<html lang="en"> <!-- Declaring HTML language -->
<head> <!-- Starting head section -->
  <meta charset="UTF-8" /> <!-- Setting character encoding -->
  <title>Admin Dashboard - TechFolio</title> <!-- Setting page title -->
  <meta name="viewport" content="width=device-width, initial-scale=1" /> <!-- Making layout responsive -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" /> <!-- Adding Bootstrap CSS -->
  <link rel="stylesheet" href="styles.css"> <!-- Linking custom stylesheet -->
  <script src="script.js"></script> <!-- Linking custom JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> <!-- Including Bootstrap JS bundle -->
</head>
<body class="<?php echo ($theme === 'dark') ? 'dark-mode' : ''; ?>"> <!-- Applying theme class -->

<nav class="navbar navbar-expand-lg navbar-dark sticky-top gradient-navbar"> <!-- Starting navbar -->
  <div class="container"> <!-- Wrapping navbar content -->
    <a class="navbar-brand" href="home.php"> <!-- Logo link -->
      <img src="tech.png" alt="TechFolio logo" width="40" height="40"> <!-- Logo image -->
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"> <!-- Mobile toggle button -->
      <span class="navbar-toggler-icon"></span> <!-- Toggle icon -->
    </button>
    <div class="collapse navbar-collapse" id="navbarNav"> <!-- Collapsible navbar links -->
      <ul class="navbar-nav ms-auto"> <!-- Right-aligned nav items -->
        <li class="nav-item"><a class="nav-link active" href="admin.php">Dashboard</a></li> <!-- Dashboard link -->
        <li class="nav-item"><a class="nav-link" href="users.php">Users</a></li> <!-- Users link -->
        <li class="nav-item"><a class="nav-link" href="settings.php">Settings</a></li> <!-- Settings link -->
        <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li> <!-- Logout link -->
      </ul>
      <button onclick="toggleTheme()" class="btn btn-sm btn-outline-light ms-2">🌓 Toggle Theme</button> <!-- Theme toggle button -->
    </div>
  </div>
</nav>

<?php if (isset($_SESSION['unverified']) && $_SESSION['unverified']): ?> <!-- Checking email verification -->
  <div class="alert alert-warning text-center m-0 rounded-0"> <!-- Alert box -->
    ⚠️ Your email is not verified. <!-- Alert message -->
    <a href="resend_verification.php" class="btn btn-sm btn-outline-primary ms-2">Resend Verification Link</a> <!-- Resend button -->
  </div>
<?php endif; ?>

<section class="py-5"> <!-- Main section -->
  <div class="container"> <!-- Section container -->
    <h2 class="text-purple text-center mb-4">👑 Admin Dashboard</h2> <!-- Section heading -->

    <div class="row g-4 mb-4"> <!-- Row for stat cards -->
      <div class="col-md-4"> <!-- Stat column -->
        <div class="soft-card text-center"> <!-- Card box -->
          <h6>Total Users</h6> <!-- Stat label -->
          <h3><?= $totalUsers ?></h3> <!-- Stat value -->
        </div>
      </div>
      <div class="col-md-4">
        <div class="soft-card text-center">
          <h6>Total Admins</h6>
          <h3><?= $totalAdmins ?></h3>
        </div>
      </div>
      <div class="col-md-4">
        <div class="soft-card text-center">
          <h6>New Today</h6>
          <h3><?= $totalToday ?></h3>
        </div>
      </div>
    </div>

    <div class="soft-card mb-4"> <!-- Summary box -->
      <h5>📘 Summary</h5> <!-- Summary title -->
      <p>Welcome to your admin dashboard. Use the top navbar to manage users, settings, and view site stats.</p> <!-- Summary text -->
    </div>

    <div class="soft-card text-center"> <!-- Preview image card -->
      <h5 class="mb-3">📊 Data Visualization Preview</h5> <!-- Image heading -->
      <img src="admin1.jpg" alt="Admin Chart Overview" class="img-fluid rounded mx-auto d-block"> <!-- Chart image -->
    </div>
  </div>
</section>

<footer class="text-white text-center py-4 bg-purple"> <!-- Footer -->
  <p>Cookies Policy | Legal Terms | Privacy Policy</p> <!-- Footer links -->
  <p>Connect with us: Instagram | LinkedIn | Twitter | Facebook</p> <!-- Social links -->
  <p>&copy; 2025 Portfolio Creator for Tech. All Rights Reserved.</p> <!-- Copyright -->
</footer>

<div id="cookie-banner" class="cookie-banner" style="display:none;"> <!-- Cookie banner -->
  This site uses cookies to improve your experience. <!-- Cookie message -->
  <button onclick="acceptCookies()">Got it!</button> <!-- Dismiss button -->
</div>

</body>
</html>
