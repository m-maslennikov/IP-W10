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

<?php setBookingStep2(); ?>


<div class="ctn-background">
  <!-- Page Content -->
  <nav class="nav nav-pills flex-column flex-sm-row pt-4 px-4">
    <a class="flex-sm-fill text-sm-center btn btn-secondary m-1" href="booking_step1.php"><span class="text-success"><i class="fas fa-check"></i></span> Step 1 - Select category and dates</a>
    <a class="flex-sm-fill text-sm-center nav-link active btn btn-secondary m-1" href="#" tabindex="-1" aria-disabled="true">Step 2 - Select car</a>
    <a class="flex-sm-fill text-sm-center btn btn-secondary disabled m-1" href="#" tabindex="-1" aria-disabled="true">Step 3 - Make a payment</a>
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
            ?>
            <p class="card-text"><strong>Vehicle type: </strong><?php echo $category_name ?></p>
          </div>
          <div class="card-footer">
            <a class="btn btn-primary" href="booking_step1.php">Change</a>
          </div>
        </div>
        <div class="card h-100">
          <form action="" method="post" id="index_form">
            <h4 class="card-header">Select your <?php echo $category_name ?> car</h4>
            <div class="card-body">
              <div class="form-group">
                <select class="form-control" name="car_id" id="car_id">
                <?php 
                $query = "SELECT car_id, car_make, car_model FROM cars WHERE category_id=$category_id AND car_status='available'";
                $result = query($query);
                while($row = fetchArray($result)) {
                  $car_id = $row['car_id'];
                  $car_make = $row['car_make'];
                  $car_model = $row['car_model'];
                  echo "<option value=$car_id>$car_make $car_model</option>";
                }
                ?>
                </select>
              </div>
              <div class="card-body" id="car_popup" hidden>
                <img class="card-img-top p-4" src="" alt="car image" id="car_image">
                <p><strong>Seats: </strong><span class="card-text" id="car_seats"></span></p>
                <p><strong>Doors: </strong><span class="card-text" id="car_doors"></span></p>
                <p><strong>Colour: </strong><span class="card-text" id="car_colour"></span></p>
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary" name="step2">Proceed to payment</button>
            </div>
          </form>
        </div>
      </div>
      </div>
      <div class="col-lg-8 my-4">
        
      </div>
    </div>
  </div>
  <!-- /.container -->
</div>

  <!-- Bootstrap core JavaScript -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
  <script src="js/scripts.booking2.js"></script>


</body>

</html>
