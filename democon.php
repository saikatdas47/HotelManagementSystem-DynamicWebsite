<?php
$page_title = "Rooms";
require('inc/header.php');

// Dummy variable for login status
$is_logged_in = isset($_SESSION['user_id']); // Change this to false to simulate a non-logged-in user



// Fetch last 4 rooms from the database
$sql = "SELECT `room_id`, `room_name`, `descriptions`, `image`, `price`, `features`, `area`, `quantity`, `adult`, `child` 
        FROM `rooms` 
        ORDER BY `room_id`";
$result = $conn->query($sql);


?>
<!-- Room Cards -->
<style>
.room-card {
    transition: transform 0.3s, box-shadow 0.3s;
    overflow: hidden;
    height: 100%;
}

.room-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
}

.room-card img {
    transition: transform 0.3s;
}

.room-card:hover img {
    transform: scale(1.05);
}

.card-body {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}
</style>
<h2 class="font-weight-bold text-center text-dark p-2 mt-2">Our Rooms</h2>
<div class="container mt-4">
    <div class="row">
        <?php while ($row = $result->fetch_assoc()): ?>
        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
            <div class="card room-card">
                <img src="<?php echo $row['image']; ?>" class="card-img-top" alt="<?php echo $row['room_name']; ?>">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['room_name']; ?></h5>
                    <p class="card-text">Price: $<?php echo $row['price']; ?> per night</p>
                    <p class="card-text">Features: <?php echo $row['features']; ?></p>
                    <p class="card-text">Area: <?php echo $row['area']; ?> sqm</p>
                    <p class="card-text">Quantity: <?php echo $row['quantity']; ?></p>
                    <a href="#" class="btn btn-info mb-2" data-toggle="modal" data-target="#roomModal_<?php echo $row['room_id']; ?>">More Details</a>
                    <?php if ($is_logged_in): ?>
                    <a href="#" class="btn btn-success">Book Now</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Modal for Room Details -->
        <div class="modal fade" id="roomModal_<?php echo $row['room_id']; ?>" tabindex="-1" aria-labelledby="roomModalLabel_<?php echo $row['room_id']; ?>" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="roomModalLabel_<?php echo $row['room_id']; ?>">Room Details - <?php echo $row['room_name']; ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body p-5">
                        <img src="<?php echo $row['image']; ?>" class="img-fluid mb-3" alt="<?php echo $row['room_name']; ?>">
                        <p><strong>Description:</strong> <?php echo $row['descriptions']; ?></p>
                        <p><strong>Price:</strong> $<?php echo $row['price']; ?> per night</p>
                        <p><strong>Features:</strong> <?php echo $row['features']; ?></p>
                        <p><strong>Area:</strong> <?php echo $row['area']; ?> sqm</p>
                        <p><strong>Quantity:</strong> <?php echo $row['quantity']; ?></p>
                        <p><strong>Adult Capacity:</strong> <?php echo $row['adult']; ?></p>
                        <p><strong>Child Capacity:</strong> <?php echo $row['child']; ?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</div>


    <?php require('inc/footer.php'); ?>