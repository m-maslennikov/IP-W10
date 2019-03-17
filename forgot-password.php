<?php include "includes/_head.php"; ?>

<!-- Navigation -->
<?php include "includes/_navbar.php"; ?>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <div class="card mx-auto my-5">
          <div class="card-header">Reset Password</div>
          <div class="card-body">
            <div class="text-center mb-4">
              <h4>Forgot your password?</h4>
              <p>Enter your email address and we will send you instructions on how to reset your password.</p>
            </div>
            <form>
              <div class="form-group">
                <div class="form-label-group">
                  <input type="email" id="inputEmail" class="form-control" placeholder="Enter email address" required="required" autofocus="autofocus">
                  <label for="inputEmail">Enter email address</label>
                </div>
              </div>
              <a class="btn btn-primary btn-block" href="login.php">Reset Password</a>
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