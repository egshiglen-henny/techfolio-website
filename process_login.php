<?php
session_start(); // Starting session to manage user login state
require_once 'database.php'; // Including database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") { // Checking if the form was submitted via POST
    $email = trim($_POST['email']); // Getting and trimming email input
    $password = $_POST['password']; // Getting password input (no trim in case of intentional spaces)

    $sql = "SELECT * FROM users WHERE email = ? LIMIT 1"; // SQL query to select user by email
    $stmt = $conn->prepare($sql); // Preparing the SQL statement
    $stmt->bind_param("s", $email); // Binding the email parameter as a string
    $stmt->execute(); // Executing the prepared statement
    $result = $stmt->get_result(); // Getting the result from the executed statement

    if ($result->num_rows === 1) { // If exactly one user is found
        $user = $result->fetch_assoc(); // Fetching user data into associative array
        if (password_verify($password, $user['password'])) { // Verifying the entered password with the hashed one
            $_SESSION['user_id'] = $user['id']; // Setting session variable for user ID
            $_SESSION['name'] = $user['name']; // Storing user name in session
            $_SESSION['email'] = $user['email']; // Storing user email in session
            $_SESSION['role'] = $user['role']; // Storing user role (admin/user)

            if ($user['is_verified'] == 0) { // Checking if email is not verified
                $_SESSION['unverified'] = true; // Setting unverified flag in session
            } else {
                unset($_SESSION['unverified']); // Clearing unverified flag if verified
            }

            header("Location: main.php"); // Redirecting to user dashboard
            exit(); // Stopping further execution
        } else {
            // If password is incorrect, show alert and redirect back to login
            echo "<script>alert('Invalid password.'); window.location.href='login.php';</script>"; 
        }
    } else {
        // If no user is found with the provided email
        echo "<script>alert('User not found.'); window.location.href='login.php';</script>";
    }

    $stmt->close(); // Closing the prepared statement
    $conn->close(); // Closing the database connection
} else {
    header("Location: login.php"); // If accessed without POST, redirect to login
    exit(); // Stopping script
}
?>