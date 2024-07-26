<?php
include('db_config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $room_id = $_POST['room_id'];

    // SQL to delete a record
    $sql = "DELETE FROM rooms WHERE room_id='$room_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();

    header("Location: rooms.php");
    exit;
}
?>
