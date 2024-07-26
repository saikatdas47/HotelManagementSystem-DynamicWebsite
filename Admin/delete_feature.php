<?php
include('db_config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $feature_id = $_POST['feature_id'];

    $sql = "DELETE FROM features WHERE features_id='$feature_id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: features.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
}
?>
