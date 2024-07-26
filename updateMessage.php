<?php
session_start(); // Start the session

include('Admin/db_config.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $update_id = $_POST['update_id'];
    $update_subject = $_POST['update_subject'];
    $update_msg = $_POST['update_msg'];

    $stmt = $conn->prepare("UPDATE `userMsg` SET `subject` = ?, `msg` = ? WHERE `id` = ?");
    $stmt->bind_param("ssi", $update_subject, $update_msg, $update_id);
    $stmt->execute();

    header("Location: user.php");
    exit;
}

$conn->close();
?>
