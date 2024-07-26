<?php
session_start(); // Start the session

include('Admin/db_config.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if username or email already exists
    $check_query = $conn->prepare("SELECT user_id FROM userData WHERE user_name = ? OR email = ?");
    $check_query->bind_param("ss", $username, $email);
    $check_query->execute();
    $check_query->store_result();

    if ($check_query->num_rows > 0) {
        echo "Username or Email already exists. Please choose a different one.";
    } else {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO userData (name, user_name, email, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $username, $email, $hashed_password);

        // Execute the statement
        if ($stmt->execute()) {
            // Registration successful, set session variables for automatic login
            $_SESSION['user_id'] = $stmt->insert_id; // Use the auto-generated user_id from the insert operation
            $_SESSION['username'] = $username;

            echo "Registration successful!";
            header("Location: index.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    }

    // Close the check query and connection
    $check_query->close();
    $conn->close();
}
?>
