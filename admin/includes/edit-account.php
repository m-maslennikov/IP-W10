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
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Edit Account</h1>
          <p class="mb-4">Some useful info or alerts.</p>

          <!-- Basic Card Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><?php echo "ID: $account_id - $account_email"; ?></h6>
            </div>
            <div class="card-body">
              <form class="user" action="" method="post" enctype=multipart/form-data>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="account_email">Email</label>
                    <input type="email" class="form-control" name="account_email" id="account_email" value="<?php echo $account_email; ?>">
                  </div>
                  <div class="col-sm-6">
                    <label for="account_password">Password</label>
                    <input type="password" class="form-control" name="account_password" id="account_password">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="account_first_name">First Name</label>
                    <input type="text" class="form-control" name="account_first_name" id="account_first_name" value="<?php echo $account_first_name; ?>">
                  </div>
                  <div class="col-sm-6">
                    <label for="account_last_name">Last Name</label>
                    <input type="text" class="form-control" name="account_last_name" id="account_last_name" value="<?php echo $account_last_name; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="account_type">Account type</label>
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
                  <div class="col-sm-6">
                    <label for="account_status">Account status</label>
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
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="account_dob">Birthday</label>
                    <input type="date" name="account_dob" id="account_dob" class="form-control" value="<?php echo $account_dob; ?>">
                  </div>
                  <div class="col-sm-6">
                    <label for="account_phone">Phone</label>
                    <input type="tel" name="account_phone" id="account_phone" class="form-control" value="<?php echo $account_phone; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="account_address">Home Address</label>
                  <input type="text" name="account_address" id="account_address" class="form-control" value="<?php echo $account_address; ?>">
                </div>
                <hr>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <button type="submit" class="btn btn-primary btn-user btn-block" name="update_account">
                      <i class="fas fa-save fa-fw"></i> Save
                    </button>
                  </div>
                  <div class="col-sm-6">
                    <button type="reset" class="btn btn-danger btn-user btn-block">
                      <i class="fas fa-undo-alt fa-fw"></i> Reset
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->