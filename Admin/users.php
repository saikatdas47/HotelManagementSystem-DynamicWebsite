<?php
$page_title = "UserPage";
require('inc/header.php');



// Handle delete request
if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);
    $delete_query = "DELETE FROM `userData` WHERE `user_id` = $delete_id";
    if (mysqli_query($conn, $delete_query)) {
        
    } else {
    }
}

// Fetch user data
$query = "SELECT `user_id`, `name`, `user_name`, `email` FROM `userData`";
$result = mysqli_query($conn, $query);
?>

<div class="main-content">
    <div class="container-fluid">
    <h2 class="fw-bold text-center text-light p-2 bg-danger mb-3">User Data</h2>

        <table class="table table-striped mt-4">
            <thead class="thead-dark">
                <tr>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Display each user in a table row
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                            <td>{$row['user_id']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['user_name']}</td>
                            <td>{$row['email']}</td>
                            <td>
                                <a href='#' class='btn btn-danger btn-sm' onclick='confirmDelete({$row['user_id']});'>Delete</a>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' class='text-center'>No users found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script>
function confirmDelete(userId) {
    if (confirm("Are you sure you want to delete this user?")) {
        window.location.href = "?delete_id=" + userId;
    }
}
</script>

<?php require('inc/footer.php'); ?>
