<?php
$page_title = "Features";
require('inc/header.php');

// Dummy variable for login status
$is_logged_in = isset($_SESSION['user_id']); // Change this to false to simulate a non-logged-in user

// Fetch last 4 fes from the database
$sql_features = "SELECT `features_id`, `name`, `image`, `description` 
                 FROM `features` 
                 ORDER BY `features_id`";
$result_features = $conn->query($sql_features);

?>

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
<h2 class="font-weight-bold text-center text-dark p-2 mt-2">Our Features</h2>
<div class="container mt-4">
    
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

    <?php require('inc/footer.php'); ?>