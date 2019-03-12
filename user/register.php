<?php include "includes/_user-head-start.php"; ?>
  <title>Register</title>
<?php include "includes/_user-head-end.php"; ?>

<?php register(); ?>

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register an Account</div>
      <div class="card-body">
        <form action="" method="post">
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="account_email" name="account_email" class="form-control" placeholder="Email address" required="required">
              <label for="account_email">Email address</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="account_password" name="account_password" class="form-control" placeholder="Password" required="required">
                  <label for="account_password">Password</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="account_password_confirmation" name="account_password_confirmation" class="form-control" placeholder="Confirm password" required="required">
                  <label for="account_password_confirmation">Confirm password</label>
                </div>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block" name="register_account">Register</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="login.php">Login Page</a>
          <a class="d-block small" href="forgot-password.php">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>

<?php include "includes/_user-body-end.php"; ?>