<?php
include('db_config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $feature_name = $conn->real_escape_string($_POST['feature_name']);
    $feature_description = $conn->real_escape_string($_POST['feature_description']);
    $feature_image = $_FILES['feature_image']['name'];

    $target_dir = "images/features/";
    $target_file = $target_dir . basename($feature_image);
    move_uploaded_file($_FILES["feature_image"]["tmp_name"], $target_file);

    $sql = "INSERT INTO features (name, description, image) VALUES ('$feature_name', '$feature_description', '$target_file')";

    if ($conn->query($sql) === TRUE) {
        header("Location: features.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
