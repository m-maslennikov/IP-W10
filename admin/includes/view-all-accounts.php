<?php deleteAccount(); ?>
<?php enableAccount(); ?>
<?php disableAccount(); ?>

<?php 
if(isset($_POST['checkboxArray'])){
    foreach ($_POST['checkboxArray'] as $account_id) {
        $bulk_action = $_POST['bulk_action'];
        switch ($bulk_action) {
            case 'enable':
                $query = "UPDATE accounts SET account_status = 'Enabled' WHERE account_id = $account_id";
                $make_enable_query = mysqli_query($connection,$query);
                validateQuery($make_enable_query);
                break;
            case 'disable':
                $query = "UPDATE accounts SET account_status = 'Disabled' WHERE account_id = $account_id";
                $make_disable_query = mysqli_query($connection,$query);
                validateQuery($make_disable_query);
                break;
            case 'delete':
                $query = "DELETE FROM accounts WHERE account_id = {$account_id}";
                $delete_car_query = mysqli_query($connection, $query);
                validateQuery($delete_car_query);
                break;
            default:
                //echo "No option selected";
                break;
        }
    }
}
?>
<form action="" method="post">
    <div class="row justify-content-start">
        <div class="col-lg-4">
            <div class="form-group">
                <select class="form-control" name="bulk_action">
                    <option value="">Select Options</option>
                    <option value="enable">Enable</option>
                    <option value="disable">Disable</option>
                    <option value="delete">Delete</option>
                </select>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <input class="btn btn-primary" type="submit" name="" value="Apply">
                <a class="btn btn-primary" href="accounts.php?action=add" role="button">Add...</a>
            </div>
        </div>
        <div class="col-lg-5">
            <small>
            <p><span class="text-success px-1"><i class='fas fa-check'></i></span>- Enable
            <span class="text-warning px-1"><i class='fas fa-ban'></i></span>- Disable
            <span class="text-dark px-1"><i class='fas fa-pencil-alt'></i></span>- Edit
            <span class="text-danger px-1"><i class='fas fa-trash'></i></span>- Delete</p>
            </small>
        </div>
    </div>
    <div class="row justify-content-start">
        <div class="col">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th><input type="checkbox" name="bulk_option" id="selectAllBoxes"></th>
                        <th>ID</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $query = 'SELECT * FROM accounts';
                $select_accounts = mysqli_query($connection, $query);
                validateQuery($select_accounts);
                while($row = mysqli_fetch_assoc($select_accounts)) {
                    $account_id = $row['account_id'];
                    $account_type = $row['account_type'];
                    $account_status = $row['account_status'];
                    $account_email = $row['account_email'];
                    echo "<tr>";
                    ?>

                    <td><input class="checkboxes" type="checkbox" name="checkboxArray[]" value="<?php echo $account_id; ?>" id="selectAllBoxes"></td>

                    <?php
                        echo "<td>{$account_id}</td>";
                        echo "<td>{$account_email}</td>";
                        echo "<td>{$account_status}</td>";
                        echo "<td>{$account_type}</td>";
                        echo "
                            <td>
                                
                                <a href='accounts.php?enable={$account_id}' class='text-success px-1'><i class='fas fa-check'></i></a>
                                <a href='accounts.php?disable={$account_id}' class='text-warning px-1'><i class='fas fa-ban'></i></a>
                                <a href='accounts.php?action=edit&account_id={$account_id}' class='text-dark px-1'><i class='fas fa-pencil-alt'></i></a>
                                <a href='accounts.php?delete={$account_id}' class='text-danger px-1'><i class='fas fa-trash'></i></a>
                                
                            </td>";
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</form>