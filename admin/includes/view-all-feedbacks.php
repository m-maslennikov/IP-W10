<?php //deleteFeedback(); ?>
<?php //enableFeedback(); ?>
<?php //disableFeedback(); ?>
<?php //bulkFeedbackAction(); ?>

<form action="" method="post">
    <div class="row justify-content-start">
        <div class="col-lg-4">
            <div class="form-group">
                <select class="form-control" name="bulk_action">
                    <option value="">Select Options</option>
                    <option value="enable">Make Available</option>
                    <option value="disable">Make Unavailable</option>
                    <option value="delete">Delete</option>
                </select>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <input class="btn btn-primary" type="submit" name="" value="Apply">
                <a class="btn btn-primary" href="feedbacks.php?action=add" role="button">Add...</a>
            </div>
        </div>
        <div class="col-lg-5">
            <small>
                <p>
                    <span class="text-dark px-1"><i class='fas fa-eye'></i></span>- View
                    <span class="text-success px-1"><i class='fas fa-check'></i></span>- Enable
                    <span class="text-warning px-1"><i class='fas fa-ban'></i></span>- Disable
                    <span class="text-dark px-1"><i class='fas fa-pencil-alt'></i></span>- Edit
                    <span class="text-danger px-1"><i class='fas fa-trash'></i></span>- Delete
                </p>
            </small>
        </div>
    </div>
    <div class="row justify-content-start">
        <div class="col">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th><input type="checkbox" name="bulk_option" id="selectAllBoxes"></th>
                        <th>Feedback ID</th>
                        <th>feedback_status</th>
                        <th>account_email</th>
                        <th>feedback_subject</th>
                        <th>feedback_text</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $query = 'SELECT * FROM feedbacks';
                $result = query($query);
                while($row = fetchArray($result)) {
                    $feedback_id = $row['feedback_id'];
                    $account_id = $row['account_id'];
                    $feedback_text = $row['feedback_text'];
                    $feedback_status = $row['feedback_status'];
                    $feedback_subject = $row['feedback_subject'];

                    echo "<tr>";
                        ?>

                        <td><input class="checkboxes" type="checkbox" name="feedbacksCheckboxArray[]" value="<?php echo $feedback_id; ?>" id="selectAllBoxes"></td>
                        
                        <?php
                        echo "<td>{$feedback_id}</td>";
                        echo "<td>{$feedback_status}</td>";
                        $query = "SELECT account_email FROM accounts WHERE account_id = {$account_id}";
                        $result = query($query);
                        while($row = fetchArray($result)) {
                            $account_email = $row['account_email'];
                            echo "<td>{$account_email}</td>";
                        }
                        echo "<td>{$feedback_subject}</td>";
                        echo "<td>{$feedback_text}</td>";
                        echo "
                            <td>
                                <a href='../feedbacks.php?action=view_feedback&feedback_id={$feedback_id}' target='_blank' class='text-dark px-1'><i class='fas fa-eye'></i></a>
                                <a href='feedbacks.php?enable={$feedback_id}' class='text-success px-1'><i class='fas fa-check'></i></a>
                                <a href='feedbacks.php?disable={$feedback_id}' class='text-warning px-1'><i class='fas fa-ban'></i></a>
                                <a href='feedbacks.php?action=edit&feedback_id={$feedback_id}' class='text-dark px-1'><i class='fas fa-pencil-alt'></i></a>
                                <a href='feedbacks.php?delete={$feedback_id}' class='text-danger px-1'><i class='fas fa-trash'></i></a>
                            </td>";
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</form>