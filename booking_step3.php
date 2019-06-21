<?php 
include("functions/init.php");

// This file contains all common HEAD html markup for all root PHP files in this project.
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

   
  
    
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <!-- Font Awesome v5 -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    
    <link href="css/card-js.min.css" rel="stylesheet" type="text/css" />

    <!-- Custom style -->
    <style>
    body {
      padding-top: 56px;
      background-image: url("images/index.jpg");
      background-position: center; /* Center the image */
      background-repeat: no-repeat; /* Do not repeat the image */
      background-size: cover; /* Resize the background image to cover the entire container */
    }
    </style>

    <title>Rent-a-Car - SDI2</title>

</head>

<body>

<!-- Navigation -->
<?php include "includes/_navbar.php"; ?>

<div class="ctn-background">
  <!-- Page Content -->
  <nav class="nav nav-pills flex-column flex-sm-row pt-4 px-4">
    <a class="flex-sm-fill text-sm-center btn btn-secondary m-1" href="booking_step1.php"><span class="text-success"><i class="fas fa-check"></i></span> Step 1 - Select category and dates</a>
    <a class="flex-sm-fill text-sm-center btn btn-secondary m-1" href="booking_step2.php"><span class="text-success"><i class="fas fa-check"></i></span> Step 2 - Select car</a>
    <a class="flex-sm-fill text-sm-center nav-link active btn btn-secondary m-1" href="#" tabindex="-1" aria-disabled="true"> Step 3 - Make a payment</a>
  </nav>

  <div class="container">
    <div class="row">
      <div class="col my-4">
        <div class="card-columns">
          <div class="card h-100">
            <h4 class="card-header">Booking Info</h4>
            <div class="card-body">
              <p class="card-text"><strong>Pickup Date: </strong><?php echo $_SESSION['booking_booked_start_date']; ?></p>
              <p class="card-text"><strong>Return Date: </strong><?php echo $_SESSION['booking_booked_end_date']; ?></p>
              <?php 
                $category_id = $_SESSION['category_id'];
                $query = "SELECT category_name FROM categories WHERE category_id=$category_id";
                $result = query($query);
                $row = fetchArray($result);
                $category_name = $row['category_name'];

                $car_id = $_SESSION['car_id'];
                $query = "SELECT car_id, car_make, car_model, car_colour FROM cars WHERE car_id=$car_id";
                $result = query($query);
                $row = fetchArray($result);
                $car_id = $row['car_id'];
                $car_make = $row['car_make'];
                $car_model = $row['car_model'];
                $car_colour = $row['car_colour'];
              ?>
              <p class="card-text"><strong>Vehicle type: </strong><?php echo $category_name ?></p>
              <p class="card-text"><strong>Car: </strong><?php echo "$car_make $car_model" ?></p>
              <p class="card-text"><strong>Colour: </strong><?php echo $car_colour ?></p>
              <div class="form-group">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Promo code" aria-label="Promo code" aria-describedby="basic-addon2" id="promocode">
                  <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="apply_promocode_button">Apply</button>
                  </div>
                </div> <!-- input-group.// -->
              </div> <!-- form-group.// -->
            </div>
            <div class="card-footer">
            <p class="card-text"><strong>Price: </strong>
              <span class="display-4" id="category_estimated_price"><?php echo $_SESSION['category_estimated_price_input']; ?></span></p>
            </div>
          </div>

          <?php if(loggedIn()): ?>
          <div class="card h-100">
          <?php setBookingStep3(); ?>
            <h4 class="card-header">Payment Details</h4>
            <div class="card-body">
              <form role="form" action="" method="post" id="step3_form">
                <div class="card-js">
                  <input class="card-number my-custom-class" name="card-number">
                  <input class="name" id="the-card-name-id" name="card-holders-name" placeholder="Name on card">
                  <input class="expiry-month" name="expiry-month">
                  <input class="expiry-year" name="expiry-year">
                  <input class="cvc" name="cvc">
                </div>
              </form>
            </div>
            <div class="card-footer">
              <button class="btn btn-primary btn-block" name="step3" form="step3_form" type="submit">Confirm</button>
            </div>
          </div>
          <?php else: ?>
          <div class="card h-100">
            <h4 class="card-header">Log In to proceed</h4>
            <div class="card-body">
              <a href="login.php" class="btn btn-primary btn-block">Log In</a>
              <a href="register.php" class="btn btn-primary btn-block">Register</a>
            </div>
            <div class="card-footer">
              
            </div>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <!-- /.container -->
</div>

  <!-- Bootstrap core JavaScript -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
  <script src="js/scripts.booking3.js"></script>
  <script src="js/card-js.min.js"></script>


</body>

</html>
