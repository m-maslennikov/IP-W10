<?php include "includes/_head.php"; ?>

<?php 
if(isset($_SESSION['account_email'])) {
  $account_email = $_SESSION['account_email'];
  $query = "SELECT * FROM accounts WHERE account_email = '$account_email'";
  $result = query($query);
  while($row = fetchArray($result)) {
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
    <div class="col-lg-6">
      <div class="card mx-auto mb-4">
        <?php updateProfile(); ?>
        <div class="card-header">
          Personal Info
        </div>
        <div class="card-body">
          <form action="" method="post">
            <div class="form-group">
              <div class="form-row">
                <div class="col-lg-6">
                  <input type="text" name="account_first_name" class="form-control" placeholder="First Name" required="required" value="<?php echo $account_first_name; ?>" >
                </div>
                <div class="col-lg-6">
                  <input type="text" name="account_last_name" class="form-control" placeholder="Last Name" required="required" value="<?php echo $account_last_name; ?>">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-lg-6">
                  <input id="account_dob" name="account_dob" class="form-control" placeholder="Date of Birth" required="required" value="<?php echo $account_dob; ?>">
                </div>
                <div class="col-lg-6">
                  <input type="text" name="account_phone" class="form-control" placeholder="Phone No." required="required" value="<?php echo $account_phone; ?>">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-lg-6">
                  <input type="email" name="account_email" class="form-control" placeholder="Email address" required="required" value="<?php echo $account_email; ?>">
                </div>
                <div class="col-lg-6">
                  <input type="text" name="account_address" class="form-control" placeholder="Address" required="required" value="<?php echo $account_address; ?>">
                </div>
              </div>
            </div>
            <input type="submit" class="btn btn-primary" name="update_profile" value="Save Changes">
            <span></span>
            <input type="reset" class="btn btn-outline-secondary" value="Cancel">
          </form>
        </div>
      </div>
      <div class="card mx-auto mb-4">
        <div class="card-header">
          Update Credit Card Details
        </div>
        <div class="card-body">
          <form action="updatecard.php" method="post">
            <div class="form-group">
              <div class="form-row">
                <div class="col-lg-6">
                  <input type="text" id="account_cardname" name="account_cardname" class="form-control" placeholder="Name on Card" required="required" value="<?php echo $cardname; ?>">
                </div>
                <div class="col-lg-6">
                  <input type="text" id="account_cardnumber" name="account_cardnumber" class="form-control" placeholder="Card Number" pattern="[0-9]{13,16}" required="required" value="<?php echo $cardnumber; ?>">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-lg-6">
                  <input type="month" min="2019-06" value="2019-06" id="account_cardexpiry" name="account_cardexpiry" class="form-control" placeholder="Expiry Date" required="required" value="<?php echo $cardexpiry; ?>">
                </div>
                <div class="col-lg-6">
                  <input type="text" id="account_cardcode" name="account_cardcode" class="form-control" placeholder="CVV" required="required" pattern="[0-9]{3,4}" value="<?php echo $cardcode; ?>">
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block" name="submit2">Update Card Details</button>
          </form>
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <!-- <div class="card mx-auto mb-4">
        <div class="card-header">
          Update Photograph
        </div>
        <div class="card-body">
          <form action="updatepic.php" method="post" enctype="multipart/form-data">
            <label>Browse Pic</label>
            <img src="<?php  echo $pic; ?>" width="160"/>
            <input name="file1" type="file" />
            <button type="submit" class="btn btn-primary btn-block" name="submit3">Update Photograph</button>
          </form>
        </div>
      </div> -->
      <div class="card mx-auto mb-4">
        <div class="card-header">
        <?php validateUserPassword(); ?>
          Change Password
        </div>
        <div class="card-body">
          <form action="" method="post">
            <div class="form-group">
              <div class="form-row">
                <div class="col-lg-12">
                  <input type="password" name="account_password" class="form-control" placeholder="Current Password">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-lg-12">
                  <input type="password" name="new_account_password" class="form-control" placeholder="New Password">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-lg-12">
                  <input type="password" name="new_account_password_confirmation" class="form-control" placeholder="Confirm password" required="required">
                </div>
              </div>
            </div>
            <input type="submit" class="btn btn-primary" name="update_password" value="Update password">
            <span></span>
            <input type="reset" class="btn btn-outline-secondary" value="Cancel">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<hr>

  <!-- Footer -->
  <footer class="py-4 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright © Rent-a-Car Aspire2 LLC, 2019</p>
    </div>
  </footer>
  <!-- Bootstrap core JavaScript -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
  <script>
    var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
    $('#account_dob').datepicker({
      uiLibrary: 'bootstrap4',
      format: 'yyyy-mm-dd',
      weekStartDay: 1,
      iconsLibrary: 'fontawesome',
      maxDate: today
    });
  </script>

</body>

</html>