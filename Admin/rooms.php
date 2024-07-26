<?php
$page_title = "RoomPage";
require('inc/header.php');
include('db_config.php'); // Ensure this is included to use the database connection

// Fetch features from the database
$sql_features = "SELECT features_id, name FROM features";
$result_features = $conn->query($sql_features);

// Fetch rooms from the database
$sql_rooms = "SELECT * FROM rooms";
$result_rooms = $conn->query($sql_rooms);
?>

<div class="main-content">
    <div class="container mt-2">
        <h2 class="fw-bold text-center text-light p-2 bg-danger mb-3">Manage Rooms</h2>

        <button type="button" class="btn btn-primary mt-4" data-toggle="modal" data-target="#addRoomModal">Add Room</button>



        <!-- Add Room Modal -->
        <div class="modal fade" id="addRoomModal" tabindex="-1" aria-labelledby="addRoomModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addRoomModalLabel">Add New Room</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="insert_room.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="room_name">Room Name</label>
                                <input type="text" class="form-control" id="room_name" name="room_name" required>
                            </div>
                            <div class="form-group">
                                <label for="descriptions">Description</label>
                                <textarea class="form-control" id="descriptions" name="descriptions" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" id="image" name="image" required>
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" class="form-control" id="price" name="price" required>
                            </div>

                            <div class="form-group">
                                <label>Features</label><br>
                                <?php while ($row = $result_features->fetch_assoc()) : ?>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="features[]" id="feature_<?php echo $row['features_id']; ?>" value="<?php echo $row['name']; ?>">
                                        <label class="form-check-label" for="feature_<?php echo $row['features_id']; ?>"><?php echo $row['name']; ?></label>
                                    </div>
                                <?php endwhile; ?>
                            </div>

                            <div class="form-group">
                                <label for="area">Area (sqm)</label>
                                <input type="number" class="form-control" id="area" name="area" required>
                            </div>
                            <div class="form-group">
                                <label for="quantity">Quantity</label>
                                <input type="number" class="form-control" id="quantity" name="quantity" required>
                            </div>
                            <div class="form-group">
                                <label for="adult">Adult Capacity</label>
                                <input type="number" class="form-control" id="adult" name="adult" required>
                            </div>
                            <div class="form-group">
                                <label for="child">Child Capacity</label>
                                <input type="number" class="form-control" id="child" name="child" required>
                            </div>
                            <button type="submit" class="btn btn-success">Add Room</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>






        <!-- Rooms Table -->
        <div class="table-responsive mt-4">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Features</th>
                        <th>Area</th>
                        <th>Quantity</th>
                        <th>Adult</th>
                        <th>Child</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result_rooms->fetch_assoc()) : ?>
                        <tr>
                            <td><?php echo $row['room_id']; ?></td>
                            <td><?php echo $row['room_name']; ?></td>
                            <td><?php echo $row['descriptions']; ?></td>
                            <td><img src="../<?php echo $row['image']; ?>" alt="Room Image" width="100"></td>
                            <td><?php echo $row['price']; ?></td>
                            <td><?php echo $row['features']; ?></td>
                            <td><?php echo $row['area']; ?></td>
                            <td><?php echo $row['quantity']; ?></td>
                            <td><?php echo $row['adult']; ?></td>
                            <td><?php echo $row['child']; ?></td>
                            <td>
                                <!-- Delete Form with Confirmation -->
                                <form action="delete_room.php" method="POST" onsubmit="return confirm('Are you sure you want to delete this room?');">
                                    <input type="hidden" name="room_id" value="<?php echo $row['room_id']; ?>">
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                                <!-- View Description Button -->
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Bootstrap JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>