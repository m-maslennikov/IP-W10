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

    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

    <title>Rent-a-Car - SDI2</title>

</head>

<body>

<!-- Navigation -->
<?php include "includes/_navbar.php"; ?>

<?php setBookingStep1(); ?>


<div class="ctn-background">
  <!-- Page Content -->
  <nav class="nav nav-pills flex-column flex-sm-row pt-4 px-4">
    <a class="flex-sm-fill text-sm-center nav-link active btn btn-secondary m-1" href="#">Step 1 - Select category and dates</a>
    <a class="flex-sm-fill text-sm-center btn btn-secondary disabled m-1" href="#" tabindex="-1" aria-disabled="true">Step 2 - Select car</a>
    <a class="flex-sm-fill text-sm-center btn btn-secondary disabled m-1" href="#" tabindex="-1" aria-disabled="true">Step 3 - Make a payment</a>
  </nav>

  <div class="container">
    <div class="row pt-4">
      <div class="col-lg-9">
        
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4 my-4">
        <form action="" method="post" id="index_form">
          <div class="card h-100">
            <h4 class="card-header">Book a Car</h4>
            <div class="card-body">
              <div class="form-group">
                <label class="card-text">Start Date</label>
                <input class="form-control" name="booking_booked_start_date" id="booking_booked_start_date" value="<?php echo $_SESSION['booking_booked_start_date']; ?>"/>
              </div>
              <div class="form-group">
                <label class="card-text">End Date</label>
                <input class="form-control" name="booking_booked_end_date" id="booking_booked_end_date" value="<?php echo $_SESSION['booking_booked_end_date']; ?>"/>
              </div>
              <div class="form-group">
                <label class="card-text">Category</label>
                <select class="form-control" name="category_id" id="category_id">
                  <option hidden selected></option>
                  <?php 
                  $query = "SELECT * FROM categories";
                  $result = query($query);
                  while($row = fetchArray($result)) {
                    if ($_SESSION['category_id'] == $row['category_id']){
                      $selected = 'selected="selected"';
                    } else {
                      $selected = '';
                    }
                    $category_name = $row['category_name'];
                    $category_id = $row['category_id'];
                    echo "<option value='$category_id' $selected>$category_name</option>";
                  }
                  ?>
                </select>
                <input type="hidden" id="category_estimated_price_input" name="category_estimated_price_input" value="">
              </div>
            </div>
            <div class="card-footer">
              
            </div>
          </div>
        </form>
      </div>
    
      <!--Category Pop up-->
      <div class="col-lg-4 my-4 category" id="category_popup" hidden>
        <div class="card h-100">
          <img class="card-img-top p-4" src="" alt="category image" id="category_image">
          <div class="card-body">
            <h4 class="card-text" id="category_name">$category_name</h4>
            <p class="card-text" id="category_description">$category_description</p>
            <div class="display-4" id="category_estimated_price">$19.99</div>
            <div class="font-italic" id="days"></div>
          </div>
          <div class="card-footer">
            <button type="submit" form="index_form" class="btn btn-primary no-wrap" name="step1">Proceed</button>
          </div>
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
  <script src="js/scripts.booking1.js"></script>

</body>

</html>
