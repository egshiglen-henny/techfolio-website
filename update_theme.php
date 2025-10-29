<?php
// Starting a new or resuming an existing session for tracking the user
session_start();

// Including the database connection file to enable running SQL queries
require_once 'database.php';

// Checking if the user is already logged in AND if the theme is being sent through a POST request
if (isset($_SESSION['user_id']) && isset($_POST['theme'])) {
    
    // Getting the logged-in user's ID from the session variable
    $userId = $_SESSION['user_id'];
    
    // Getting the selected theme value from the submitted POST request
    $theme = $_POST['theme'];

    // Preparing a SQL statement for safely updating the user's theme in the database
    $stmt = $conn->prepare("UPDATE users SET theme = ? WHERE id = ?");
    
    // Binding the theme string and user ID integer to the prepared statement
    $stmt->bind_param("si", $theme, $userId);
    
    // Executing the prepared statement to update the theme in the database
    $stmt->execute();
    
    // Closing the prepared statement to free up resources
    $stmt->close();
}
?>
