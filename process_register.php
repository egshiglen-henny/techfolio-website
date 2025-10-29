<?php
session_start(); // Starting the session to maintain user state
require_once 'database.php'; // Including the database connection file

function sanitize($data) { // Function to sanitize form input
    return htmlspecialchars(stripslashes(trim($data))); // Removing unwanted characters and encoding HTML entities
}

$firstName = sanitize($_POST['firstName']); // Sanitizing first name
$surname = sanitize($_POST['surname']); // Sanitizing surname
$email = sanitize($_POST['email']); // Sanitizing email
$password = $_POST['password']; // Getting password directly (not sanitized)
$confirmPassword = $_POST['confirm_password']; // Getting confirm password
$name = $firstName . " " . $surname; // Combining first name and surname into full name

if (empty($firstName) || empty($surname) || empty($email) || empty($password) || empty($confirmPassword)) {
    die("❌ All fields are required."); // Stopping if any field is empty
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { // Validating email format
    die("❌ Invalid email format.");
}
if ($password !== $confirmPassword) { // Checking if passwords match
    die("❌ Passwords do not match.");
}

$hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Hashing the password for security
$role = ($email === 'admin@techfolio.com') ? 'admin' : 'user'; // Setting role based on email
$token = bin2hex(random_bytes(32)); // Generating email verification token

$check = $conn->prepare("SELECT id FROM users WHERE email = ?"); // Preparing query to check if email exists
$check->bind_param("s", $email); // Binding email to query
$check->execute(); // Executing the query
$check->store_result(); // Storing result to check row count
if ($check->num_rows > 0) { // If email already exists
    echo "<script>alert('❌ Email already registered.'); window.location.href='login.php';</script>";
    exit(); // Stop execution
}
$check->close(); // Closing the check statement

$query = "INSERT INTO users (name, email, password, role, verification_token, is_verified, registered_at) VALUES (?, ?, ?, ?, ?, 0, NOW())"; // Insert new user query
$stmt = $conn->prepare($query); // Preparing insert query
$stmt->bind_param("sssss", $name, $email, $hashedPassword, $role, $token); // Binding values to query

if ($stmt->execute()) { // If insert successful
    // Output styled confirmation page
    echo <<<HTML
<!DOCTYPE html> <!-- Declaring the document type -->
<html lang="en"> <!-- Setting the document language -->
<head>
  <meta charset="UTF-8" /> <!-- Defining character encoding -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" /> <!-- Enabling responsive design -->
  <title>Registration Successful - TechFolio</title> <!-- Setting the page title -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> <!-- Linking Bootstrap CSS -->
  <link rel="stylesheet" href="styles.css"> <!-- Linking custom stylesheet -->
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark sticky-top gradient-navbar"> <!-- Navigation bar -->
  <div class="container"> <!-- Bootstrap container for navbar content -->
    <a class="navbar-brand" href="home.php"> <!-- Brand link -->
      <img src="tech.png" alt="TechFolio logo" width="40" height="40"> <!-- Brand logo image -->
    </a>
  </div>
</nav>

<section class="py-5 text-center"> <!-- Main section with vertical padding and centered text -->
  <div class="container"> <!-- Container for layout -->
    <div class="soft-card mx-auto p-4" style="max-width: 600px;"> <!-- Centered card with padding and max width -->
      <h2 class="text-purple mb-3">🎉 Registration Successful!</h2> <!-- Success heading -->
      <p class="lead">To complete your registration, please verify your email.</p> <!-- Informational paragraph -->
      <a href="confirm_email.php?token=$token" class="btn btn-primary mt-3">Click here to verify your email</a> <!-- Verification button -->
    </div>
  </div>
</section>

<footer class="text-white text-center py-4 bg-purple"> <!-- Footer with purple background -->
  <p>Cookies Policy | Legal Terms | Privacy Policy</p> <!-- Footer links -->
  <p>Connect with us: Instagram | LinkedIn | Twitter | Facebook</p> <!-- Social media links -->
  <p>&copy; 2025 Portfolio Creator for Tech. All Rights Reserved.</p> <!-- Copyright -->
</footer>

</body>
</html>
HTML;
} else {
    echo "<script>alert('❌ Something went wrong.'); window.location.href='register.php';</script>"; // Alert on failure
}

$stmt->close(); // Closing the insert statement
$conn->close(); // Closing the database connection
?>