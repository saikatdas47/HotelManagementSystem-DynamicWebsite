<?php
$page_title = "Contact Us";
require('inc/header.php');

// Dummy variable for login status
$is_logged_in = isset($_SESSION['user_id']); 
$username = $_SESSION['username'] ?? '';
// Message variables
$message = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!$is_logged_in) {
        $message = 'Please log in to send a message.';
    } else {
        // Get user information
        $user_id = $_SESSION['user_id'];
        $query = "SELECT `name`, `email` FROM `userData` WHERE `user_id` = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
           
            $useremail = $user['email'];

            // Prepare to insert message
            $subject = $_POST['subject'];
            $message_content = $_POST['message'];
            $insert_query = "INSERT INTO `userMsg` (`username`, `useremail`, `subject`, `msg`) VALUES (?, ?, ?, ?)";
            $insert_stmt = $conn->prepare($insert_query);
            $insert_stmt->bind_param("ssss", $username, $useremail, $subject, $message_content);

            if ($insert_stmt->execute()) {
                $message = 'Message sent successfully!';
            } else {
                $message = 'Error sending message. Please try again.';
            }
        } else {
            $message = 'User not found.';
        }
    }
}
?>
<h2 class=" font-weight-bold text-center mt-5 ">Contact Us</h2>
<div class="container mt-5 mb-5">
   
    <div class="row">
        <div class="col-md-6">
            <h2 class="text-center">Our Location</h2>
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.835434509197!2d144.95592831531645!3d-37.81720997975195!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f11fd81%3A0xf57720c7a21b7f0!2sVictoria%20Market!5e0!3m2!1sen!2sau!4v1614084412841!5m2!1sen!2sau" 
                    allowfullscreen>
                </iframe>
            </div>
        </div>
        <div class="col-md-6">
            <h2 class="text-center">Social Media</h2>
            <div class=" justify-content-center flex-wrap">
                <a href="mailto:contact@example.com" class="btn btn-sm btn-outline-primary me-2 mb-2">
                    <i class="fas fa-envelope"></i> Email: themark@gmail.com
                </a>
                <a href="tel:+1234567890" class="btn btn-sm btn-outline-success me-2 mb-2">
                    <i class="fas fa-phone"></i> Phone: +123 456 7890
                </a>
                <a href="https://facebook.com/yourpage" target="_blank" class="btn btn-sm btn-outline-info me-2 mb-2">
                    <i class="fab fa-facebook"></i> FB: TheMark
                </a>
                <a href="https://instagram.com/yourpage" target="_blank" class="btn btn-sm btn-outline-danger me-2 mb-2">
                    <i class="fab fa-instagram"></i> IG: TheMark
                </a>
                <a href="https://twitter.com/yourpage" target="_blank" class="btn btn-sm btn-outline-warning mb-2">
                    <i class="fab fa-twitter"></i> TW: TheMark
                </a>
            </div>
        </div>
    </div>
</div>
<div class="container mt-5 mb-5">
    <h2 class=" font-weight-bold text-center mt-4">Send Us a Message</h2>
    <?php if ($message): ?>
        <div class="alert alert-info text-center">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>
    <form action="" method="POST" class="mt-3">
        <div class="mb-3">
            <label for="subject" class="form-label">Subject</label>
            <input type="text" id="subject" name="subject" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea id="message" name="message" class="form-control" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php require('inc/footer.php'); ?>
