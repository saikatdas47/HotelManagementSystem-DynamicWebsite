<?php
$page_title = "Homepage";
require('inc/header.php');

// Dummy variable for login status
$is_logged_in = isset($_SESSION['user_id']); // Change this to false to simulate a non-logged-in user



// Fetch last 4 rooms from the database
$sql = "SELECT `room_id`, `room_name`, `descriptions`, `image`, `price`, `features`, `area`, `quantity`, `adult`, `child` 
        FROM `rooms` 
        ORDER BY `room_id` DESC 
        LIMIT 4";
$result = $conn->query($sql);

// Fetch last 4 fes from the database
$sql_features = "SELECT `features_id`, `name`, `image`, `description` 
                 FROM `features` 
                 ORDER BY `features_id` DESC 
                 LIMIT 4";
$result_features = $conn->query($sql_features);

?>
<div class="container-fluid text-center mt-2">
    <!-- Swiper Carousel -->
    <div class="swiper-container rounded shadow">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="images/carousel/1.jpg" class="w-100 d-block" />
            </div>
            <div class="swiper-slide">
                <img src="images/carousel/2.jpg" class="w-100 d-block" />
            </div>
            <div class="swiper-slide">
                <img src="images/carousel/3.jpg" class="w-100 d-block" />
            </div>
            <div class="swiper-slide">
                <img src="images/carousel/4.jpg" class="w-100 d-block" />
            </div>
            <div class="swiper-slide">
                <img src="images/carousel/5.jpg" class="w-100 d-block" />
            </div>
            <div class="swiper-slide">
                <img src="images/carousel/6.jpg" class="w-100 d-block" />
            </div>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</div>

<!-- Hotel Description -->
<div class="container text-center mt-4">
    <h1 class="font-weight-bold text-center text-light p-2 bg-danger mb-3">Welcome to The Mark</h1>
    <p class="font-weight-bold text-center text-dark">Description</p>
</div>

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
<h2 class="font-weight-bold text-center text-dark p-2 ">Our Rooms</h2>
<div class="container mt-4">
    <div class="row">
        <?php while ($row = $result->fetch_assoc()): ?>
        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
            <div class="card room-card">
                <img src="<?php echo $row['image']; ?>" class="card-img-top" alt="<?php echo $row['room_name']; ?>">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['room_name']; ?></h5>
                    <p class="card-text">Price: $<?php echo $row['price']; ?> per day</p>
                    <p class="card-text">Features: <?php echo $row['features']; ?></p>
                    <p class="card-text">Area: <?php echo $row['area']; ?> sqm</p>
                    <p class="card-text">Quantity: <?php echo $row['quantity']; ?></p>
                    <a href="#" class="btn btn-info mb-2" data-toggle="modal" data-target="#roomModal_<?php echo $row['room_id']; ?>">More Details</a>
                    <?php if ($is_logged_in): ?>
                        <a href="roomPayment.php?room_id=<?php echo $row['room_id']; ?>" class="btn btn-success">Book Now</a>
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

<div class="text-center mt-3">
    <h2 class="fw-bold">
        <a href="rooms.php" class="btn btn-outline-dark btn-lg text-decoration-none">
            More Rooms <i class="fas fa-chevron-right ms-2"></i>
        </a>
    </h2>
</div>
<style>
.feature-card {
    transition: transform 0.3s, box-shadow 0.3s;
    overflow: hidden;
    height: 100%;
    border-radius: 10px;
}

.feature-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
}

.feature-card img {
    transition: transform 0.3s;
    max-height: 250px;
    /* Adjust maximum height as needed */
    object-fit: cover;
    /* Ensure images maintain aspect ratio and cover the container */
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}

.feature-card:hover img {
    transform: scale(1.1);
    /* Scale up image on hover */
}

.feature-card .card-body {
    padding: 1rem;
}

.feature-card .card-title {
    font-size: 1.2rem;
    font-weight: bold;
}

.feature-card .card-text {
    color: #666;
}

/* Adjustments for responsiveness */
@media (max-width: 768px) {
    .feature-card {
        height: auto;
    }

    .feature-card img {
        height: 200px;
        /* Adjust height for smaller screens */
    }
}
</style>
<<div class="container mt-4">
    <h2 class="font-weight-bold text-center text-dark p-2">Our Features</h2>
    <div class="row">
        <?php while ($row_features = $result_features->fetch_assoc()): ?>
        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
            <div class="card feature-card">
                <img src="<?php echo $row_features['image']; ?>" class="card-img-top p-4"
                    alt="<?php echo $row_features['name']; ?>">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row_features['name']; ?></h5>
                    <p class="card-text"><?php echo $row_features['description']; ?></p>
                </div>
            </div>
        </div>
        <?php endwhile; ?>

    </div>
    </div>
    <div class="text-center mt-3">
    <h2 class="fw-bold">
        <a href="features.php" class="btn btn-outline-dark btn-lg text-decoration-none">
            More Features <i class="fas fa-chevron-right ms-2"></i>
        </a>
    </h2>
</div>



<h2 class="font-weight-bold text-center mt-5 ">Contact Us</h2>
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


    <?php require('inc/footer.php'); ?>