<?php include "includes/_head.php"; ?>

<!-- Navigation -->
<?php include "includes/_navbar.php"; ?>

<div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <div class="card mx-auto my-5">
          <div class="card-header">Create a new password</div>
          <div class="card-body">
          <?php displaySessionMessage(); ?>
          <?php resetPassword(); ?>
          
            <form action="" method="post">
              <div class="form-group">
                <div class="form-row">
                  <div class="col-lg-6">
                    <input type="password" id="account_password" name="account_password" class="form-control" placeholder="New password" required="required">
                  </div>
                  <div class="col-lg-6">
                    <input type="password" id="account_password_confirmation" name="account_password_confirmation" class="form-control" placeholder="Confirm new password" required="required">
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary btn-block" name="register_account">Set new password</button>
              <input type="hidden" name="token" value="<?php echo generateToken(); ?>">
            </form>
            <div class="text-center">
              <a class="d-block small mt-3" href="login.php">Login</a>
              <a class="d-block small" href="forgot-password.php">Forgot Password?</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </div>

<?php 
// Include all common scripts and close BODY tag.
include "includes/_body-end.php"; 
?>