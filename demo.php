<!-- HTML Content -->
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h2 class="font-weight-bold">Hi, <span class="text-info"><?php echo htmlspecialchars($user['name']); ?></span></h2>
            <p class="font-weight-bold lead mt-3"><strong class=" font-weight-bold text-success">Username:</strong> <?php echo htmlspecialchars($user['user_name']); ?></p>
            <p class=" font-weight-bold lead"><strong class=" font-weight-bold text-success">Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
        </div>
    </div>
</div>



<div class="container mt-5">
    <h2 class="font-weight-bold text-danger text-center" >Your Sent Messages</h2>
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Subject</th>
                <th class="w-50">Message</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($userMessages as $message): ?>
                <tr>
                    <td><?php echo htmlspecialchars($message['id']); ?></td>
                    <td><?php echo htmlspecialchars($message['subject']); ?></td>
                    <td class="w-50"><?php echo htmlspecialchars($message['msg']); ?></td>
                    <td>
                        <!-- Update Button -->
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#updateModal" data-id="<?php echo htmlspecialchars($message['id']); ?>" data-subject="<?php echo htmlspecialchars($message['subject']); ?>" data-msg="<?php echo htmlspecialchars($message['msg']); ?>">Update</button>

                        <!-- Delete Form -->
                        <form method="post" action="deleteMessage.php" style="display:inline;">
                            <input type="hidden" name="delete_id" value="<?php echo htmlspecialchars($message['id']); ?>">
                            <button type="submit" class="btn btn-danger btn-sm ml-2" onclick="return confirm('Are you sure you want to delete this message?');">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Update Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" action="updateMessage.php">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Update Message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="updateId" name="update_id">
                    <div class="form-group">
                        <label for="updateSubject">Subject</label>
                        <input type="text" class="form-control" id="updateSubject" name="update_subject">
                    </div>
                    <div class="form-group">
                        <label for="updateMessage">Message</label>
                        <textarea class="form-control" id="updateMessage" name="update_msg" rows="4"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- HTML Content -->
<style>
    /* CSS for card styling */
    .card {
        border-radius: 8px;
        transition: box-shadow 0.3s ease-in-out;
        display: flex;
        flex-direction: row;
        align-items: flex-start;
        padding: 15px;
        background-color: #fff; /* Ensure background color is white for cards */
        position: relative;
    }

    .card:hover {
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
    }

    .card-img {
        flex: 0 0 150px; /* Fixed width for image */
        max-width: 150px;
        margin-right: 15px;
    }

    .card-img img {
        width: 100%;
        height: auto;
        border-radius: 8px;
    }

    .card-body {
        flex: 1;
    }

    .card-title {
        font-size: 1.25rem;
        margin-bottom: 1rem;
    }

    .card-text {
        margin-bottom: 0.5rem;
    }

    .cancel-btn {
        position: absolute;
        top: 15px;
        right: 15px;
        background-color: #dc3545; /* Bootstrap danger color */
        color: #fff;
        border: none;
        border-radius: 4px;
        padding: 5px 10px;
        cursor: pointer;
        transition: background-color 0.3s ease-in-out;
    }

    .cancel-btn:hover {
        background-color: #c82333; /* Darker shade of red */
    }
</style>
