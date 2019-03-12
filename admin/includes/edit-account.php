<?php
if(isset($_GET['account_id'])) {
    $account_id = $_GET['account_id'];
    $query = "SELECT * FROM accounts WHERE account_id = $account_id";
    $select_account_query = mysqli_query($connection, $query);
    validateQuery($select_account_query);
    while($row = mysqli_fetch_assoc($select_account_query)) {
        $account_email = $row['account_email'];
        $account_type = $row['account_type'];
    }
}

updateAccount($account_id);

?>

<form action="" method="post" enctype=multipart/form-data>
    <div class="form-group">
        <label for="account_email">Email</label>
        <input type="text" name="account_email" id="account_email" class="form-control" value="<?php echo $account_email; ?>">
    </div>
    <div class="form-group">
        <label for="account_password">Password</label>
        <input type="text" name="account_password" id="account_password" class="form-control">
    </div>
    <div class="form-group">
        <label for="account_type">Account Type</label>
        <select name="account_type" class="form-control" id="account_type">
            <?php
            switch ($account_type) {
                case 'Staff':
                echo "<option value='Customer'>Customer</option>";
                echo "<option value='Staff' selected='selected'>Staff</option>";
                echo "<option value='Admin'>Admin</option>";
                break;
                
                case 'Admin':
                echo "<option value='Customer'>Customer</option>";
                echo "<option value='Staff'>Staff</option>";
                echo "<option value='Admin' selected='selected'>Admin</option>";
                break;
                
                default:
                echo "<option value='Customer' selected='selected'>Customer</option>";
                echo "<option value='Staff'>Staff</option>";
                echo "<option value='Admin'>Admin</option>";
                break;
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary" name="update_account">Update</button>
        <button type="reset" class="btn btn-danger">Reset</button>
    </div>
</form>
