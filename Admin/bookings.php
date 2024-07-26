<?php
$page_title = "Bookingpage";
require('inc/header.php');

// Database connection

// Fetch booking information
$query = "SELECT `id`, `user_name`, `name`, `email`, `checkin`, `checkout`, `totalprice`, `room_id`, `cardNumber`, `expiryMonth`, `expiryYear`, `cvv` FROM `booking`";
$result = $conn->query($query);
?>

<div class="main-content">
    <div class="container-fluid">
    <h2 class="fw-bold text-center text-light p-2 bg-danger mb-3">Booking Information</h2>
        <table class="table table-bordered table-striped mt-3">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>User Name</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Check-in</th>
                    <th>Check-out</th>
                    <th>Total Price</th>
                    <th>Room ID</th>
                    <th>Card Number</th>
                    <th>Expiry Month</th>
                    <th>Expiry Year</th>
                    <th>CVV</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['user_name'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['checkin'] . "</td>";
                        echo "<td>" . $row['checkout'] . "</td>";
                        echo "<td>" . $row['totalprice'] . "</td>";
                        echo "<td>" . $row['room_id'] . "</td>";
                        echo "<td>" . $row['cardNumber'] . "</td>";
                        echo "<td>" . $row['expiryMonth'] . "</td>";
                        echo "<td>" . $row['expiryYear'] . "</td>";
                        echo "<td>" . $row['cvv'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='12'>No bookings found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php require('inc/footer.php'); ?>
