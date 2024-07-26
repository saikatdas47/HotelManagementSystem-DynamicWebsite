<?php
session_start();
include('db_config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $room_name = $conn->real_escape_string($_POST['room_name']);
    $description = $conn->real_escape_string($_POST['descriptions']);
    $image = $_FILES['image']['name'];
    $price = $conn->real_escape_string($_POST['price']);
    $area = $conn->real_escape_string($_POST['area']);
    $quantity = $conn->real_escape_string($_POST['quantity']);
    $adult = $conn->real_escape_string($_POST['adult']);
    $child = $conn->real_escape_string($_POST['child']);
    
    // Handle features as an array and concatenate names
    $features = $_POST['features'];
    $features_list = implode(", ", $features);

    // Image upload path
    $target_dir = "images/rooms/";
    $target_file = $target_dir . basename($image);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    // Insert query
    $sql = "INSERT INTO rooms (room_name, descriptions, image, price, features, area, quantity, adult, child) 
            VALUES ('$room_name', '$description', '$target_file', '$price', '$features_list', '$area', '$quantity', '$adult', '$child')";

    if ($conn->query($sql) === TRUE) {
        header("Location: rooms.php?success=1");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
