<?php
session_start(); // Starting the session to access session variables
require_once 'database.php'; // Including the database connection file

if (isset($_SESSION['user_id'])) { // Checking if a user is logged in
    $userId = $_SESSION['user_id']; // Storing the user's ID from the session
    $conn->query("UPDATE users SET theme = 'light' WHERE id = $userId"); // Resetting the user's theme preference to 'light' in the database
}
session_unset(); // Clearing all session variables
session_destroy(); // Destroying the current session
header("Location: home.php"); // Redirecting the user to the home page
exit(); // Ensuring no further script is executed
?>