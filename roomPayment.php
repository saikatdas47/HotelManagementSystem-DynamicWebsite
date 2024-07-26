<?php
$page_title = "Room Payment";
require('inc/header.php');

// Fetch room details from the database based on the room_id
$room_id = isset($_GET['room_id']) ? $_GET['room_id'] : null;

if ($room_id) {
    $stmt = $conn->prepare("SELECT `room_name`, `price`, `features`, `image`, `descriptions`, `area`, `adult`, `child` FROM `rooms` WHERE `room_id` = ?");
    $stmt->bind_param("i", $room_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $room_details = $result->fetch_assoc();
} else {
    die("Room ID is not provided.");
}

$total_amount = 0;
$check_in = null;
$check_out = null;
$payment_processed = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['check_in']) && isset($_POST['check_out'])) {
        $check_in = new DateTime($_POST['check_in']);
        $check_out = new DateTime($_POST['check_out']);
        $interval = $check_in->diff($check_out);
        $nights = $interval->days;
        $total_amount = $nights * $room_details['price'];
    }

    if (isset($_POST['full_name']) && isset($_POST['email'])) {
        $full_name = $_POST['full_name'];
        $email = $_POST['email'];
        $card_number = $_POST['card_number'];
        $expiry_month = $_POST['expiry_month'];
        $expiry_year = $_POST['expiry_year'];
        $cvv = $_POST['cvv'];
        
       
        $user_name = $_SESSION['username'];

        // Prepare and bind parameters
        $stmt = $conn->prepare("INSERT INTO booking (user_name, name, email, checkin, checkout, totalprice, room_id, cardNumber, expiryMonth, expiryYear, cvv) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        
        // Use variables for bind_param
        $check_in_str = $check_in->format('Y-m-d');
        $check_out_str = $check_out->format('Y-m-d');

        $stmt->bind_param("sssssiissss", $user_name, $full_name, $email, $check_in_str, $check_out_str, $total_amount, $room_id, $card_number, $expiry_month, $expiry_year, $cvv);

        // Execute the statement
        if ($stmt->execute()) {
            $payment_processed = true;
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }
}
?>

<div class="container mt-3 mb-3">
    <h2 class="font-weight-bold text-center text-dark p-2 mb-3">Room Payment</h2>
    <div class="row">
        <div class="col-md-6">
            <img src="<?php echo $room_details['image']; ?>" class="img-fluid mb-3" alt="<?php echo $room_details['room_name']; ?>">
            <h4><?php echo $room_details['room_name']; ?></h4>
            <p><strong>Price:</strong> $<?php echo $room_details['price']; ?> per night</p>
            <p><strong>Features:</strong> <?php echo $room_details['features']; ?></p>
            <p><strong>Area:</strong> <?php echo $room_details['area']; ?></p>
            <p><strong>Child:</strong> <?php echo $room_details['child']; ?></p>
            <p><strong>Adult:</strong> <?php echo $room_details['adult']; ?></p>
            <p><?php echo $room_details['descriptions']; ?></p>

            <form method="POST" action="">
                <div class="form-group">
                    <label for="check_in">Check-in Date</label>
                    <input type="date" class="form-control" id="check_in" name="check_in" required>
                </div>
                <div class="form-group">
                    <label for="check_out">Check-out Date</label>
                    <input type="date" class="form-control" id="check_out" name="check_out" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Next</button>
            </form>
        </div>
        <div class="col-md-6">
            <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && !$payment_processed) : ?>
                <div class="mt-3">
                    <p><strong>Total Amount:</strong> $<?php echo $total_amount; ?></p>
                    <p><strong>Check-in Date:</strong> <?php echo $check_in->format('Y-m-d'); ?></p>
                    <p><strong>Check-out Date:</strong> <?php echo $check_out->format('Y-m-d'); ?></p>
                </div>
                <form method="POST" action="">
                    <input type="hidden" name="room_id" value="<?php echo $room_id; ?>">
                    <input type="hidden" name="check_in" value="<?php echo $check_in->format('Y-m-d'); ?>">
                    <input type="hidden" name="check_out" value="<?php echo $check_out->format('Y-m-d'); ?>">
                    <input type="hidden" name="total_amount" value="<?php echo $total_amount; ?>">
                    <div class="form-group">
                        <label for="full_name">Full Name</label>
                        <input type="text" class="form-control" id="full_name" name="full_name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="card_number">Card Number</label>
                        <input type="text" class="form-control" id="card_number" name="card_number" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="expiry_month">Expiry Month</label>
                            <input type="text" class="form-control" id="expiry_month" name="expiry_month" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="expiry_year">Expiry Year</label>
                            <input type="text" class="form-control" id="expiry_year" name="expiry_year" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="cvv">CVV</label>
                            <input type="text" class="form-control" id="cvv" name="cvv" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Pay Now</button>
                </form>
            <?php elseif ($payment_processed) : ?>
                <div class="alert alert-success mt-3" role="alert">
                    Your payment was successfully processed. Thank you for your booking!
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php require('inc/footer.php'); ?>