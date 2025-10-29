<?php
$host = 'localhost'; // Setting the database host (usually localhost)
$username = 'root'; // Setting the MySQL username (default for local)
$password = ''; // Setting the MySQL password (empty by default for XAMPP)
$database = 'techfolio_db'; // Setting the database name for TechFolio

$conn = new mysqli($host, $username, $password, $database); // Creating a new MySQLi connection

// Checking if connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error); // Showing error message and stopping execution
}
?>