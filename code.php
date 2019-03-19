<?php include "includes/_head.php"; ?>

<!-- Navigation -->
<?php include "includes/_navbar.php"; ?>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <div class="card mx-auto my-5">
          <div class="card-header">Enter the code</div>
          <div class="card-body">
          <?php displaySessionMessage(); ?>
          <?php validateCode(); ?>
            <div class="text-center mb-4">
              <h4>Enter Validation Code</h4>
              <p>Enter your validation code which was sent to your email to reset your password.</p>
            </div>
            <form action="" method="post">
              <div class="form-group">
                <input type="text" id="account_validation_code" name="account_validation_code" class="form-control" placeholder="Validation Code" required="required" autofocus="autofocus">
              </div>
              <button type="submit" class="btn btn-primary btn-block" name="recover_password">Reset Password</button>
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