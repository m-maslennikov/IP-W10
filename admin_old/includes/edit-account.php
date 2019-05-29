<?php
if(isset($_GET['account_id'])) {
    $account_id = $_GET['account_id'];
    $query = "SELECT * FROM accounts WHERE account_id = $account_id";
    $select_account_query = mysqli_query($connection, $query);
    validateQuery($select_account_query);
    while($row = mysqli_fetch_assoc($select_account_query)) {
        $account_email = $row['account_email'];
        $account_type = $row['account_type'];
        $account_status = $row['account_status'];
        $account_first_name = $row['account_first_name'];
        $account_last_name = $row['account_last_name'];
        $account_dob = $row['account_dob'];
        $account_address = $row['account_address'];
        $account_phone = $row['account_phone'];
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
                case 'staff':
                echo "<option value='customer'>Customer</option>";
                echo "<option value='staff' selected='selected'>Staff</option>";
                echo "<option value='admin'>Admin</option>";
                break;
                
                case 'admin':
                echo "<option value='customer'>Customer</option>";
                echo "<option value='staff'>Staff</option>";
                echo "<option value='admin' selected='selected'>Admin</option>";
                break;
                
                default:
                echo "<option value='customer' selected='selected'>Customer</option>";
                echo "<option value='staff'>Staff</option>";
                echo "<option value='admin'>Admin</option>";
                break;
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="account_status">Account Status</label>
        <select name="account_status" class="form-control" id="account_status">
            <?php
            switch ($account_status) {
                case 'enabled':
                echo "<option value='enabled' selected='selected'>Enabled</option>";
                echo "<option value='disabled'>Disabled</option>";
                break;
                
                case 'disabled':
                echo "<option value='enabled'>Enabled</option>";
                echo "<option value='disabled' selected='selected'>Disabled</option>";
                break;
                
                default:
                echo "<option value='' selected='selected'>Please Select</option>";
                echo "<option value='enabled'>Enabled</option>";
                echo "<option value='disabled'>Disabled</option>";
                break;
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="account_first_name">First Name</label>
        <input type="text" name="account_first_name" id="account_first_name" class="form-control" value="<?php echo $account_first_name; ?>">
    </div>
    <div class="form-group">
        <label for="account_last_name">Last Name</label>
        <input type="text" name="account_last_name" id="account_last_name" class="form-control" value="<?php echo $account_last_name; ?>">
    </div>
    <div class="form-group">
        <label for="account_dob">Date of Birth</label>
        <input type="date" name="account_dob" id="account_dob" class="form-control" value="<?php echo $account_dob; ?>">
    </div>
    <div class="form-group">
        <label for="account_address">Address</label>
        <input type="text" name="account_address" id="account_address" class="form-control" value="<?php echo $account_address; ?>">
    </div>
    <div class="form-group">
        <label for="account_phone">Phone</label>
        <input type="tel" name="account_phone" id="account_phone" class="form-control" value="<?php echo $account_phone; ?>">
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary" name="update_account">Update</button>
        <button type="reset" class="btn btn-danger">Reset</button>
    </div>
</form>
