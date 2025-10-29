<?php
session_start(); // Starting session to access user session variables
require_once 'database.php'; // Including database connection file

if (!isset($_SESSION['user_id'])) { // Checking if user is not logged in
    header("Location: login.php"); // Redirecting to login
    exit(); // Stopping further script
}

$userId = $_SESSION['user_id']; // Storing logged-in user ID

// Preparing and executing statement to get email and verification status
$stmt = $conn->prepare("SELECT email, is_verified FROM users WHERE id = ?");
$stmt->bind_param("i", $userId); // Binding parameter
$stmt->execute(); // Running the query
$stmt->bind_result($email, $isVerified); // Binding result variables
$stmt->fetch(); // Fetching result data
$stmt->close(); // Closing the select statement

if ($isVerified) { // Checking if already verified
    echo "<script>alert('✅ Your account is already verified.'); window.location.href='main.php';</script>";
    exit(); // Ending script
}

$token = bin2hex(random_bytes(32)); // Generating a new verification token

// Updating the token in database
$update = $conn->prepare("UPDATE users SET verification_token = ? WHERE id = ?");
$update->bind_param("si", $token, $userId); // Binding new token and user ID
$update->execute(); // Running update query
$update->close(); // Closing the update statement

// Simulating email resend with HTML output
echo "<!DOCTYPE html>
<html lang='en'>
<head>
  <meta charset='UTF-8'> <!-- Setting character encoding -->
  <meta name='viewport' content='width=device-width, initial-scale=1'> <!-- Enabling responsive design -->
  <title>Resending Verification - TechFolio</title> <!-- Setting page title -->
  <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet'> <!-- Linking Bootstrap CSS -->
  <link rel='stylesheet' href='styles.css'> <!-- Linking custom styles -->
</head>
<body>

<nav class='navbar navbar-expand-lg navbar-dark sticky-top gradient-navbar'> <!-- Creating navbar -->
  <div class='container'> <!-- Wrapping navbar content -->
    <a class='navbar-brand' href='home.php'> <!-- Linking logo to home -->
      <img src='tech.png' alt='TechFolio logo' width='40' height='40'> <!-- Showing brand logo -->
    </a>
  </div>
</nav>

<section class='py-5 text-center'> <!-- Creating section for content -->
  <div class='container'> <!-- Wrapping content -->
    <div class='soft-card mx-auto p-4' style='max-width: 600px;'> <!-- Displaying centered card -->
      <h2 class='text-purple mb-3'>🔁 Resending Verification Link</h2> <!-- Showing heading -->
      <p class='lead'>A new confirmation link has been generated.</p> <!-- Displaying message -->
      <a href='confirm_email.php?token=$token' class='btn btn-primary mt-3'>Click here to verify your email</a> <!-- Providing verification link -->
    </div>
  </div>
</section>

<footer class='text-white text-center py-4 bg-purple'> <!-- Creating footer -->
  <p>&copy; 2025 Portfolio Creator for Tech. All Rights Reserved.</p> <!-- Showing copyright -->
</footer>

</body>
</html>";
?>