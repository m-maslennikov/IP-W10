<?php include "includes/_head.php"; ?>

<!-- Navigation -->
<?php include "includes/_navbar.php"; ?>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <div class="card mx-auto my-5">
          <div class="card-header">Reset Password</div>
          <div class="card-body">
          <?php displaySessionMessage(); ?>
          <?php recoverPassword(); ?>
            <div class="text-center mb-4">
              <h4>Forgot your password?</h4>
              <p>Enter your email address and we will send you instructions on how to reset your password.</p>
            </div>
            <form action="" method="post">
              <div class="form-group">
                <input type="email" id="account_email" name="account_email" class="form-control" placeholder="Enter email address" required="required" autofocus="autofocus">
              </div>
              <button type="submit" class="btn btn-primary btn-block" name="recover_password">Reset Password</button>
              <input type="hidden" name="token" value="<?php echo generateToken(); ?>">
            </form>
            <div class="text-center">
              <a class="d-block small mt-3" href="register.php">Register an Account</a>
              <a class="d-block small" href="login.php">Login</a>
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