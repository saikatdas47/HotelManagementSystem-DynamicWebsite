<?php
session_start(); // Start the session

include('Admin/db_config.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $username = $_POST['loginUsername'];
    $password = $_POST['loginPassword'];

    // Validate username and password (you should validate against your database)
    // For demonstration purposes, I'm assuming a simple check

    // Query the database to validate the credentials
    $stmt = $conn->prepare("SELECT user_id, user_name, password FROM userData WHERE user_name = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    // Check if user exists
    if ($stmt->num_rows == 1) {
        $stmt->bind_result($user_id, $db_username, $db_password);
        $stmt->fetch();

        // Verify password
        if (password_verify($password, $db_password)) {
            // Password is correct, set session variables
            $_SESSION['user_id'] = $user_id;
            $_SESSION['username'] = $db_username;

            // Redirect to index.php or any other page after successful login
            header("Location: index.php");
            exit();
        } else {
            // Incorrect password
            echo "Incorrect password. Please try again.";
        }
    } else {
        // User not found
        echo "User not found. Please try again.";
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
