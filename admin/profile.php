<?php include "includes/_admin-head.php"; ?>
<?php include "includes/_admin-navbar.php" ?>
<?php
if(isset($_SESSION['account_email'])) {
    $account_email = $_SESSION['account_email'];
    $query = "SELECT * FROM accounts WHERE account_email = '$account_email'";
    $select_profile_query = mysqli_query($connection, $query);
    validateQuery($select_profile_query);
    while($row = mysqli_fetch_assoc($select_profile_query)) {
        $account_email = $row['account_email'];
        $account_password = $row['account_password'];
        $account_type = $row['account_type'];
        $account_id = $row['account_id'];
    }
}

if (isset($_POST['update_profile'])) {
    $account_password = $_POST['account_password'];
    $account_email = $_POST['account_email'];
    $account_type = $_POST['account_type'];
    if (empty($account_password)) {
        $query = "SELECT * FROM accounts WHERE account_id = $account_id";
        $select_account_query = mysqli_query($connection, $query);
        validateQuery($select_account_query);
        while($row = mysqli_fetch_assoc($select_account_query)) {
            $account_password = $row['account_password'];
        }
    }
    $query = "UPDATE accounts SET 
            account_password = '{$account_password}', 
            account_email = '{$account_email}', 
            account_type = '{$account_type}' 
            WHERE account_id = {$account_id}";
    $update_profile_query = mysqli_query($connection, $query);
    validateQuery($update_profile_query);
    $_SESSION['account_email'] = $account_email;
    $_SESSION['account_type'] = $account_type;
    header("Location: profile.php");
}

?>
    <div id="wrapper">
        <?php include "includes/_admin-sidebar.php" ?>
        <div id="content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Breadcrumbs-->
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active">
                                <a href="accounts.php">Accounts</a>
                            </li>
                            <!--<li class="breadcrumb-item">Blank Page</li>-->
                        </ol>
                    </div><!-- /.col-lg-12 -->
                    <!-- Page Content -->
                    <div class="col-lg-12">
                        <h1>All Accounts</h1>
                        <hr>
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <form action="" method="post" enctype=multipart/form-data>
                            <div class="form-group">
                                <label for="account_email">Email</label>
                                <input type="text" name="account_email" id="account_email" class="form-control" value="<?php echo $account_email; ?>">
                            </div>
                            <div class="form-group">
                                <label for="account_password">Password</label>
                                <input type="password" name="account_password" id="account_password" class="form-control" value="<?php echo $account_password; ?>">
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
                                <button type="submit" class="btn btn-primary" name="update_profile">Update</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                        </form>
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            <?php include "includes/_admin-footer.php" ?>
        </div><!-- /.content-wrapper -->
    </div><!-- /#wrapper -->
    <?php include "includes/_admin-logout-modal.php" ?>
<?php include "includes/_admin-body-end.php" ?>