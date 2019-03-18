<?php include "includes/_head.php"; ?>

<!-- Navigation -->
<?php include "includes/_navbar.php"; ?>
<?php displaySessionMessage(); ?>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <div class="card mx-auto my-5">
        <?php login(); ?>
          <div class="card-header">Login</div>
          <div class="card-body">
            <form action="" method="post">
              <div class="form-group">
                <div class="form-label-group">
                  <input type="email" id="account_email" name="account_email" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">
                  <label for="account_email">Email address</label>
                </div>
              </div>
              <div class="form-group">
                <div class="form-label-group">
                  <input type="password" id="account_password" name="account_password" class="form-control" placeholder="Password" required="required">
                  <label for="account_password">Password</label>
                </div>
              </div>
              <div class="g-recaptcha" data-sitekey="6LcZx5cUAAAAAGo0SgYP8CWpaSTlB1s5yattyGxb"></div>
              <div class="form-group">
                <div class="checkbox">
                  <!--<label><input type="checkbox" value="remember_me">Remember Password</label>-->
                </div>
              </div>
              <button type="submit" class="btn btn-primary btn-block" name="login">Login</button>
            </form>
            <div class="text-center">
              <a class="d-block small mt-3" href="register.php">Register an Account</a>
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