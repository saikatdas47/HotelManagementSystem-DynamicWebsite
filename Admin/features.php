<?php
$page_title = "Features";
require('inc/header.php');
?>

<div class="main-content">

    <div class="container mt-2">
    <h2 class="fw-bold text-center text-light p-2 bg-danger mb-3">Manage Features</h2>

        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addFeatureModal">Add Feature</button>

        <!-- Add Feature Modal -->
        <div class="modal fade" id="addFeatureModal" tabindex="-1" aria-labelledby="addFeatureModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addFeatureModalLabel">Add New Feature</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="insert_feature.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="feature_name">Feature Name</label>
                                <input type="text" class="form-control" id="feature_name" name="feature_name" required>
                            </div>
                            <div class="form-group">
                                <label for="feature_description">Description</label>
                                <textarea class="form-control" id="feature_description" name="feature_description" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="feature_image">Image</label>
                                <input type="file" class="form-control" id="feature_image" name="feature_image" required>
                            </div>
                            <button type="submit" class="btn btn-success">Add Feature</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Features Table -->
        <div class="table-responsive mt-4">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Fetch features from the database
                    $sql_features = "SELECT * FROM features";
                    $result_features = $conn->query($sql_features);
$i=1;
                    if ($result_features->num_rows > 0) {
                        while ($row = $result_features->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $i. "</td>";
                            echo "<td>" . $row['name'] . "</td>";
                            echo "<td>" . $row['description'] . "</td>";
                            echo "<td><img src='../".$row['image']."' alt='Feature Image' width='100'></td>";
                            echo "<td>
                                    <form action='delete_feature.php' method='POST'>
                                        <input type='hidden' name='feature_id' value='" . $row['features_id'] . "'>
                                        <button type='submit' class='btn btn-danger btn-sm'>Delete</button>
                                    </form>
                                </td>";
                            echo "</tr>";
                            $i++;
                        }
                    } else {
                        echo "<tr><td colspan='5'>No features found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require('inc/footer.php'); ?>