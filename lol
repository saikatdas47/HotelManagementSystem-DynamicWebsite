<?php
$page_title = "User Profile";
require('inc/header.php'); // Includes database connection and session start

// Check login status
$is_logged_in = isset($_SESSION['username']);
$username = $_SESSION['username'] ?? '';

if (!$is_logged_in) {
    echo "Please log in to view your profile.";
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
?>
<?php require('demo.php'); ?>

<div class="container mt-5">
    <h2 class="font-weight-bold text-danger text-center" >Your booking information</h2>
  
</div>









<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    // Populate the update modal with message data
    $('#updateModal').on('show.bs.modal', function (event) {
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
