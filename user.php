<?php
$page_title = "User Profile";
require('inc/header.php'); // Includes database connection and session start

// Check login status
$is_logged_in = isset($_SESSION['username']);
$username = $_SESSION['username'] ?? '';

if (!$is_logged_in) {
    $_SESSION['message'] = "Please log in to view your profile.";
    header('Location: login.php'); // Redirect to login page if not logged in
    exit;
}

// Fetch user data
$stmt = $conn->prepare("SELECT `user_id`, `name`, `user_name`, `email` FROM `userData` WHERE `user_name` = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();

// Fetch user messages
$stmt = $conn->prepare("SELECT `id`, `subject`, `msg` FROM `userMsg` WHERE `username` = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$userMessages = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

// Fetch booking information using username
$stmt = $conn->prepare("SELECT `name`,`checkin`, `checkout`, `totalprice`, `room_id`, `cardNumber`, `expiryMonth`, `expiryYear`, `cvv` FROM `booking` WHERE `user_name` = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$bookingResults = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

// Fetch room information for each booking
$rooms = [];
foreach ($bookingResults as $booking) {
    $room_id = $booking['room_id'];
    $stmt = $conn->prepare("SELECT `room_name`, `descriptions`, `image` FROM `rooms` WHERE `room_id` = ?");
    $stmt->bind_param("i", $room_id);
    $stmt->execute();
    $room = $stmt->get_result()->fetch_assoc();
    $rooms[] = array_merge($booking, $room);
}
?>
<?php require('demo.php'); ?>

<div class="container mt-5">
    <h2 class="font-weight-bold text-danger text-center">Your Booking Information</h2>

    <?php if (isset($_SESSION['message'])): ?>
        <div class="alert alert-info">
            <?php echo htmlspecialchars($_SESSION['message']); ?>
            <?php unset($_SESSION['message']); ?>
        </div>
    <?php endif; ?>

    <?php if (empty($rooms)) : ?>
        <p>No booking information found.</p>
    <?php else : ?>
        <div class="row">
            <?php foreach ($rooms as $room) : ?>
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-img">
                            <img src="<?php echo htmlspecialchars($room['image']); ?>" alt="Room Image">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($room['room_name']); ?></h5>
                            <p class="card-text"><strong>Name:</strong> <?php echo htmlspecialchars($room['name']); ?></p>
                            <p class="card-text"><strong>Check-in:</strong> <?php echo htmlspecialchars($room['checkin']); ?></p>
                            <p class="card-text"><strong>Check-out:</strong> <?php echo htmlspecialchars($room['checkout']); ?></p>
                            <p class="card-text"><strong>Total Price:</strong> <?php echo htmlspecialchars($room['totalprice']); ?></p>
                            <p class="card-text"><strong>Description:</strong> <?php echo htmlspecialchars($room['descriptions']); ?></p>
                            <p class="card-text"><strong>Card Number:</strong> <?php echo htmlspecialchars($room['cardNumber']); ?></p>
                            <p class="card-text"><strong>Expiry Month:</strong> <?php echo htmlspecialchars($room['expiryMonth']); ?></p>
                            <p class="card-text"><strong>Expiry Year:</strong> <?php echo htmlspecialchars($room['expiryYear']); ?></p>
                            <p class="card-text"><strong>CVV:</strong> <?php echo htmlspecialchars($room['cvv']); ?></p>
                        </div>
                        <button class="btn btn-danger cancel-btn" onclick="window.location.href='cancelBooking.php?room_id=<?php echo htmlspecialchars($room['room_id']); ?>'">Cancel Booking</button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
<script>
    // Populate the update modal with message data
    $('#updateModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var subject = button.data('subject');
        var msg = button.data('msg');

        var modal = $(this);
        modal.find('#updateId').val(id);
        modal.find('#updateSubject').val(subject);
        modal.find('#updateMessage').val(msg);
    });
</script>
<?php require('inc/footer.php'); ?>
