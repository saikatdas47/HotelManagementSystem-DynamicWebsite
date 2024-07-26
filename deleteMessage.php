<?php
session_start(); // Start the session

include('Admin/db_config.php');



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $delete_id = $_POST['delete_id'];

    $stmt = $conn->prepare("DELETE FROM `userMsg` WHERE `id` = ?");
    $stmt->bind_param("i", $delete_id);
    $stmt->execute();

    header("Location: user.php");
    exit;
}

$conn->close();
?>
