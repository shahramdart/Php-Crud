<?php
// Start session
session_start();



// Check if user is logged in
if (!isset($_SESSION['valid'])) {
    // If the user is not logged in, redirect to home.php
    header("Location: home.php");
    exit;
}

// Include database configuration
$servername = "localhost";
$username = "root";
$password = "";
$database = "cruds";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if ID is provided in the URL
if (!isset($_GET['id'])) {
    echo "User ID is missing!";
    exit;
}

// Sanitize input (assuming $conn is properly defined)
$id = mysqli_real_escape_string($conn, $_GET['id']);

// Delete user from database
$query = mysqli_query($conn, "DELETE FROM all_users WHERE id = '$id'");

if ($query) {
    // If deletion is successful, redirect to home.php
    header("Location: home.php");
    exit;
} else {
    // Handle deletion failure
    echo "Failed to delete user!";
    // Log the error for debugging
    error_log("Failed to delete user with ID: $id", 0);
}
?>
