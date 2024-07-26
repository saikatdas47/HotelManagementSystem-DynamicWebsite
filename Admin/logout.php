<?php
session_start(); // Start session to access session variables

// Check if session variable is set
if (isset($_SESSION['admin_username'])) {
    // Unset session variables
    unset($_SESSION['admin_username']);
    // Destroy the session
    session_destroy();
}

// Redirect to login page
header("Location: index.php");
exit;
?>
