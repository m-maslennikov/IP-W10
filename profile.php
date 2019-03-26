<?php include "includes/_head.php"; ?>

<?php 
if(isset($_SESSION['account_email'])) {
  $account_email = $_SESSION['account_email'];
  $query = "SELECT * FROM accounts WHERE account_email = '$account_email'";
  $result = query($query);
  while($row = fetchArray($query)) {
      $account_email = $row['account_email'];
      $account_password = $row['account_password'];
      $account_id = $row['account_id'];
      $account_first_name = $row['account_first_name'];
      $account_last_name = $row['account_last_name'];
      $account_phone = $row['account_phone'];
      $account_address = $row['account_address'];
      $account_dob = $row['account_dob'];
  }
}
?>


  <!-- Navigation -->
  <?php include "includes/_navbar.php"; ?>

<div class="container">
    <h1>Edit Profile</h1>
    <hr>
    
	<div class="row">
      <!-- left column -->
      <div class="col-md-3">
        <div class="text-center">
          <img src="//placehold.it/100" class="avatar img-circle" alt="avatar">
          <h6>Upload a different photo...</h6>
          
          <input type="file" class="form-control">
        </div>
      </div>
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <?php updateProfile(); ?>
        <?php validateUserPassword(); ?>
        <h3>Personal info</h3>
        
        <form action="" method="post">
          <div class="form-group">
            <label class="col-lg-3 control-label">First name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="account_first_name" value="<?php echo $account_first_name; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Last name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="account_last_name" value="<?php echo $account_last_name; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Date of Birth:</label>
            <div class="col-lg-8">
              <input class="form-control" type="date" name="account_dob" value="<?php echo $account_dob; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Phone:</label>
            <div class="col-lg-8">
              <input class="form-control" type="tel" name="account_phone" value="<?php echo $account_phone; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Address:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="account_address" value="<?php echo $account_address; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input class="form-control" type="email" name="account_email" value="<?php echo $account_email; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input type="submit" class="btn btn-primary" name="update_profile" value="Save Changes">
              <span></span>
              <input type="reset" class="btn btn-default" value="Cancel">
            </div>
          </div>
        </form>

        <?php //updateProfile(); ?>
        <h3>Change password</h3>
        <form action="" method="post">
          <div class="form-group">
            <label class="col-md-3 control-label">Current Password:</label>
            <div class="col-md-8">
              <input class="form-control" type="password" name="account_password">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">New Password:</label>
            <div class="col-md-8">
              <input class="form-control" type="password" name="new_account_password">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Confirm password:</label>
            <div class="col-md-8">
              <input class="form-control" type="password" name="new_account_password_confirmation">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input type="submit" class="btn btn-primary" name="update_password" value="Update password">
              <span></span>
              <input type="reset" class="btn btn-default" value="Cancel">
            </div>
          </div>
        </form>
      </div>
  </div>
</div>
<hr>

<?php 
// Include all common scripts and close BODY tag.
include "includes/_body-end.php"; 
?>