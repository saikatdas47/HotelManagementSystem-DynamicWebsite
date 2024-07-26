<?php
$page_title = "Messsage";
require('inc/header.php');


// Delete message logic
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];
    $delete_query = "DELETE FROM `userMsg` WHERE `id` = $delete_id";
    mysqli_query($conn, $delete_query);
}

// Fetch messages from the database
$query = "SELECT `id`, `username`, `useremail`, `subject`, `msg` FROM `userMsg`";
$result = mysqli_query($conn, $query);
?>

<div class="main-content">
    <div class="container-fluid">
    <h2 class="fw-bold text-center text-light p-2 bg-danger mb-3">User Messages</h2>
        <table class="table table-striped mt-4">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>User Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['username']}</td>
                                <td>{$row['useremail']}</td>
                                <td>{$row['subject']}</td>
                                <td>{$row['msg']}</td>
                                <td>
                                    <form action='' method='POST' class='d-inline'>
                                        <input type='hidden' name='delete_id' value='{$row['id']}'>
                                        <button type='submit' class='btn btn-danger btn-sm'>Delete</button>
                                    </form>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' class='text-center'>No messages found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php require('inc/footer.php'); ?>
