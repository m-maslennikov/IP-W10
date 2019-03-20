<?php addAccount(); ?>

<!-- This is a part for displaying Add Account form -->
<form action="" method="post" enctype=multipart/form-data>
    <div class="form-group">
        <label for="account_email">Email</label>
        <input type="text" name="account_email" id="account_email" class="form-control">
    </div>

    <div class="form-group">
        <label for="account_password">Password</label>
        <input type="text" name="account_password" id="account_password" class="form-control">
    </div>
    <div class="form-group">
        <label for="account_type">Account Type</label>
        <select name="account_type" class="form-control" id="account_type">
            <option value="customer">Customer</option>
            <option value="staff">Staff</option>
            <option value="admin">Admin</option>
        </select>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary" name="add_account">Add</button>
        <button type="reset" class="btn btn-danger">Reset</button>
    </div>
</form>