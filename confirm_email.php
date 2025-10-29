<?php
session_start(); // Starting session to handle user login state
require_once 'database.php'; // Including database connection file

$message = ""; // Initializing message variable for status feedback
$success = false; // Initializing success flag as false by default

if (isset($_GET['token'])) { // Checking if the token is present in the URL
    $token = $_GET['token']; // Getting the token from GET request
    $stmt = $conn->prepare("SELECT id FROM users WHERE verification_token = ?"); // Preparing SQL query to find user by token
    $stmt->bind_param("s", $token); // Binding token as string to the query
    $stmt->execute(); // Executing the prepared statement
    $stmt->store_result(); // Storing the result to check row count

    if ($stmt->num_rows === 1) { // If exactly one user is found
        $stmt->bind_result($userId); // Binding the result to $userId
        $stmt->fetch(); // Fetching the userId value

        $update = $conn->prepare("UPDATE users SET is_verified = 1, verification_token = NULL WHERE id = ?"); // Preparing update statement to verify user
        $update->bind_param("i", $userId); // Binding userId as integer
        $update->execute(); // Executing update query

        unset($_SESSION['unverified']); // Removing the unverified flag from session

        $success = true; // Setting success to true to show success message
        $message = "✅ Email Verified! You may now log in."; // Success feedback message
    } else {
        $message = "❌ Invalid or expired verification link."; // Error if token is invalid or expired
    }
    $stmt->close(); // Closing the prepared statement
} else {
    $message = "❌ No token provided. Please use the correct verification link."; // Error if no token is provided
}
?>

<!DOCTYPE html>
<html lang="en"> <!-- Declaring HTML language -->
<head>
  <meta charset="UTF-8" /> <!-- Defining character encoding -->
  <title>Email Confirmation - TechFolio</title> <!-- Setting browser title -->
  <meta name="viewport" content="width=device-width, initial-scale=1" /> <!-- Making it responsive -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" /> <!-- Adding Bootstrap -->
  <link rel="stylesheet" href="styles.css"> <!-- Linking custom stylesheet -->
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark sticky-top gradient-navbar"> <!-- Top navigation bar -->
  <div class="container"> <!-- Container for navbar -->
    <a class="navbar-brand" href="home.php"> <!-- Brand logo linking to home -->
      <img src="tech.png" alt="TechFolio logo" width="40" height="40"> <!-- Logo image -->
    </a>
  </div>
</nav>

<!-- Confirmation Section -->
<section class="py-5 text-center"> <!-- Section for email confirmation -->
  <div class="container"> <!-- Container for layout -->
    <div class="soft-card mx-auto p-4" style="max-width: 600px;"> <!-- Centered confirmation card -->
      <h2 class="text-purple mb-3">📧 Email Confirmation</h2> <!-- Page title -->
      <p class="lead"><?= $message ?></p> <!-- Showing success or error message -->
      <?php if ($success): ?> <!-- If verification succeeded -->
        <a href="login.php" class="btn btn-primary mt-3">Proceed to Login</a> <!-- Button to login page -->
      <?php else: ?> <!-- If verification failed -->
        <a href="home.php" class="btn btn-outline-secondary mt-3">Go Back Home</a> <!-- Button to return to home -->
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- Footer -->
<footer class="text-white text-center py-4 bg-purple"> <!-- Site footer -->
  <p>Cookies Policy | Legal Terms | Privacy Policy</p> <!-- Footer policies -->
  <p>Connect with us: Instagram | LinkedIn | Twitter | Facebook</p> <!-- Social media links -->
  <p>&copy; 2025 Portfolio Creator for Tech. All Rights Reserved.</p> <!-- Copyright -->
</footer>

</body>
</html>