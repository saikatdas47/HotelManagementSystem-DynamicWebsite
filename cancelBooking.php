<?php
session_start(); // Start the session

include('Admin/db_config.php');
// Check login status
$is_logged_in = isset($_SESSION['username']);
$username = $_SESSION['username'] ?? '';

if (!$is_logged_in) {
    $_SESSION['message'] = "Please log in to cancel bookings.";
    header('Location: user.php'); // Redirect back to user profile
    exit;
}

// Ensure a room_id is provided
if (!isset($_GET['room_id']) || !is_numeric($_GET['room_id'])) {
    $_SESSION['message'] = "Invalid room ID.";
    header('Location: user.php'); // Redirect back to user profile
    exit;
}

$room_id = $_GET['room_id'];

// Fetch the booking for the given room_id
$stmt = $conn->prepare("SELECT `checkin` FROM `booking` WHERE `room_id` = ? AND `user_name` = ?");
$stmt->bind_param("is", $room_id, $username);
$stmt->execute();
$booking = $stmt->get_result()->fetch_assoc();

if ($booking) {
    $checkin_date = $booking['checkin'];
    $current_date = date('Y-m-d');

    // Check if current date is before the check-in date
    if ($current_date < $checkin_date) {
        // Delete the booking
        $stmt = $conn->prepare("DELETE FROM `booking` WHERE `room_id` = ? AND `user_name` = ?");
        $stmt->bind_param("is", $room_id, $username);
        $stmt->execute();

        $_SESSION['message'] = "Booking cancelled successfully.";
    } else {
        $_SESSION['message'] = "You cannot cancel a booking that is already past the check-in date.";
    }
} else {
    $_SESSION['message'] = "Booking not found.";
}

header('Location: user.php'); // Redirect back to user profile
exit;
?>
