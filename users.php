<?php
// Starting the session to track user login state
session_start(); 

// Including the database connection script for executing queries
require_once 'database.php'; 

// Checking if the user is not logged in or not an admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    // Redirecting non-admins or guests to login page
    header("Location: login.php"); 
    exit(); // Stopping script execution after redirection
}

// Getting the role filter from the URL parameter, defaulting to 'all' if not set
$filter = isset($_GET['filter']) ? $_GET['filter'] : 'all'; 

// If filtering by specific roles (admin or user)
if ($filter === 'admin' || $filter === 'user') {
    // Fetching users with matching role from the database
    $users = $conn->query("SELECT id, name, email, role FROM users WHERE role = '$filter'"); 
} else {
    // Fetching all users if no specific filter is applied
    $users = $conn->query("SELECT id, name, email, role FROM users"); 
}

// Checking if the role update form was submitted
if (isset($_POST['update_role'])) {
    $userId = $_POST['user_id']; // Getting the user ID from the form
    $newRole = $_POST['role']; // Getting the selected new role
    // Updating the user role in the database
    $conn->query("UPDATE users SET role = '$newRole' WHERE id = $userId"); 
    header("Location: users.php"); // Reloading the page after updating
    exit(); // Ending execution after redirection
}

// Checking if the user deletion form was submitted
if (isset($_POST['delete_user'])) {
    $userId = $_POST['user_id']; // Getting the user ID from the form
    // Deleting the user record from the database
    $conn->query("DELETE FROM users WHERE id = $userId"); 
    header("Location: users.php"); // Reloading the page after deletion
    exit(); // Stopping the script
}
?>

<!DOCTYPE html> <!-- Declaring HTML5 document type -->
<html lang="en"> <!-- Setting page language to English -->
<head>
  <meta charset="UTF-8" /> <!-- Defining character encoding -->
  <title>User Management - TechFolio</title> <!-- Setting page title -->
  <meta name="viewport" content="width=device-width, initial-scale=1" /> <!-- Enabling responsive layout -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" /> <!-- Linking Bootstrap CSS -->
  <link rel="stylesheet" href="styles.css"> <!-- Linking custom stylesheet -->
</head>
<body>

<!-- Navbar section for page navigation -->
<nav class="navbar navbar-expand-lg navbar-dark sticky-top gradient-navbar">
  <div class="container"> <!-- Containing navbar elements -->
    <a class="navbar-brand" href="home.php"> <!-- Branding link to home -->
      <img src="tech.png" alt="TechFolio logo" width="40" height="40"> <!-- Displaying logo image -->
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"> <!-- Toggling navbar for mobile view -->
      <span class="navbar-toggler-icon"></span> <!-- Displaying toggle icon -->
    </button>
    <div class="collapse navbar-collapse" id="navbarNav"> <!-- Collapsing content area -->
      <ul class="navbar-nav ms-auto"> <!-- Aligning nav links to the right -->
        <li class="nav-item"><a class="nav-link" href="admin.php">Dashboard</a></li> <!-- Dashboard link -->
        <li class="nav-item"><a class="nav-link active" href="users.php">Users</a></li> <!-- Active Users link -->
        <li class="nav-item"><a class="nav-link" href="settings.php">Settings</a></li> <!-- Settings link -->
        <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li> <!-- Logout link -->
      </ul>
    </div>
  </div>
</nav>

<!-- Main content section -->
<section class="py-5"> <!-- Adding vertical padding -->
  <div class="container"> <!-- Wrapping content -->
    <h2 class="text-purple text-center mb-4">👥 Manage Users</h2> <!-- Section heading -->

    <!-- Role filter form for selecting user types -->
    <form method="GET" class="d-flex gap-2 mb-4 justify-content-center"> <!-- GET method form -->
      <label class="form-label mt-2">Filter by Role:</label> <!-- Label for dropdown -->
      <select name="filter" class="form-select w-auto"> <!-- Dropdown to choose role filter -->
        <option value="all" <?= $filter === 'all' ? 'selected' : '' ?>>All</option> <!-- Showing all users -->
        <option value="admin" <?= $filter === 'admin' ? 'selected' : '' ?>>Admin</option> <!-- Filtering admins only -->
        <option value="user" <?= $filter === 'user' ? 'selected' : '' ?>>User</option> <!-- Filtering users only -->
      </select>
      <button type="submit" class="btn btn-primary">Apply</button> <!-- Submitting the filter -->
    </form>

    <!-- Displaying users in a responsive table -->
    <div class="table-responsive soft-card"> <!-- Scrollable table wrapper -->
      <table class="table table-striped align-middle"> <!-- Styling table with striped rows -->
        <thead>
          <tr>
            <th>ID</th><th>Name</th><th>Email</th><th>Role</th><th>Actions</th> <!-- Defining table headers -->
          </tr>
        </thead>
        <tbody>
        <?php while ($user = $users->fetch_assoc()): ?> <!-- Looping through each user record -->
          <tr>
            <td><?= $user['id'] ?></td> <!-- Displaying user ID -->
            <td><?= htmlspecialchars($user['name']) ?></td> <!-- Showing sanitized name -->
            <td><?= htmlspecialchars($user['email']) ?></td> <!-- Showing sanitized email -->
            <td>
              <!-- Role update form inside the table -->
              <form method="POST" class="d-flex align-items-center gap-2"> <!-- POST method for role update -->
                <input type="hidden" name="user_id" value="<?= $user['id'] ?>"> <!-- Passing user ID hiddenly -->
                <select name="role" class="form-select form-select-sm w-auto"> <!-- Selecting new role -->
                  <option value="user" <?= $user['role'] === 'user' ? 'selected' : '' ?>>user</option> <!-- Option: user -->
                  <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : '' ?>>admin</option> <!-- Option: admin -->
                </select>
                <button type="submit" name="update_role" class="btn btn-sm btn-success">Update</button> <!-- Submitting role update -->
              </form>
            </td>
            <td>
              <!-- User deletion form -->
              <form method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');"> <!-- Deletion confirmation -->
                <input type="hidden" name="user_id" value="<?= $user['id'] ?>"> <!-- Hidden user ID field -->
                <button type="submit" name="delete_user" class="btn btn-sm btn-danger">Delete</button> <!-- Deleting user button -->
              </form>
            </td>
          </tr>
        <?php endwhile; ?> <!-- Ending the loop -->
        </tbody>
      </table>
    </div>
  </div>
</section>

<!-- Footer area for legal and contact info -->
<footer class="text-white text-center py-4 bg-purple"> <!-- Styling footer -->
  <p>Cookies Policy | Legal Terms | Privacy Policy</p> <!-- Showing policy links -->
  <p>Connect with us: Instagram | LinkedIn | Twitter | Facebook</p> <!-- Displaying social links -->
  <p>&copy; 2025 Portfolio Creator for Tech. All Rights Reserved.</p> <!-- Copyright text -->
</footer>

<!-- Including Bootstrap JS for interactivity -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
