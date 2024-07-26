<?php
$page_title = "Settings";
require('inc/header.php');

// Initialize variables
$edit_mode = false;

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $hotelname = $_POST['hotelname'];
    $hoteldes = $_POST['hoteldes'];
    $map = $_POST['map'];
    $insta = $_POST['insta'];
    $fb = $_POST['fb'];
    $tw = $_POST['tw'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    // Update settings in the database
    $update_query = "UPDATE `settings` SET 
                        `hotelname` = ?, 
                        `hoteldes` = ?, 
                        `map` = ?, 
                        `insta` = ?, 
                        `fb` = ?, 
                        `tw` = ?, 
                        `phone` = ?, 
                        `email` = ? 
                    WHERE `sr_no` = 1"; // Assuming sr_no = 1 for this example

    $stmt = $conn->prepare($update_query);
    $stmt->bind_param('ssssssss', $hotelname, $hoteldes, $map, $insta, $fb, $tw, $phone, $email);
    
    if ($stmt->execute()) {
        $message = "Settings updated successfully.";
    } else {
        $message = "Error updating settings.";
    }

    $stmt->close();
}

// Fetch settings data
$settings_query = "SELECT `sr_no`, `hotelname`, `hoteldes`, `map`, `insta`, `fb`, `tw`, `phone`, `email` FROM `settings` WHERE `sr_no` = 1";
$settings_result = $conn->query($settings_query);
$settings = $settings_result->fetch_assoc();
?>

<div class="main-content">
    <div class="container-fluid">
        <h2 class="fw-bold text-center text-light p-2 bg-danger mb-3">Settings</h2>
        
        <?php if (isset($message)): ?>
            <div class="alert alert-info"><?php echo htmlspecialchars($message); ?></div>
        <?php endif; ?>

        <?php if ($settings): ?>
            <form method="post">
                <div class="row mb-3">
                    <label for="hotelname" class="col-sm-2 col-form-label">Hotel Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="hotelname" name="hotelname" value="<?php echo htmlspecialchars($settings['hotelname']); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="hoteldes" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="hoteldes" name="hoteldes" rows="3"><?php echo htmlspecialchars($settings['hoteldes']); ?></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="map" class="col-sm-2 col-form-label">Map</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="map" name="map" value="<?php echo htmlspecialchars($settings['map']); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="insta" class="col-sm-2 col-form-label">Instagram</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="insta" name="insta" value="<?php echo htmlspecialchars($settings['insta']); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="fb" class="col-sm-2 col-form-label">Facebook</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="fb" name="fb" value="<?php echo htmlspecialchars($settings['fb']); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="tw" class="col-sm-2 col-form-label">Twitter</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="tw" name="tw" value="<?php echo htmlspecialchars($settings['tw']); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="phone" name="phone" value="<?php echo htmlspecialchars($settings['phone']); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($settings['email']); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-10 offset-sm-2">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </div>
            </form>
        <?php else: ?>
            <p class="text-center">No settings found</p>
        <?php endif; ?>
    </div>
</div>

<?php require('inc/footer.php'); ?>
