<?php
if(isset($_GET['car_id'])) {
  $car_id = $_GET['car_id'];
  $query = "SELECT * FROM cars WHERE car_id = $car_id";
  $select_car_query = mysqli_query($connection, $query);
  validateQuery($select_car_query);
  while($row = mysqli_fetch_assoc($select_car_query)) {
    $car_id = $row['car_id'];
    $car_make = $row['car_make'];
    $car_model = $row['car_model'];
    $car_colour = $row['car_colour'];
    $car_status = $row['car_status'];
    $car_body_type = $row['car_body_type'];
    $car_power = $row['car_power'];
    $category_id = $row['category_id'];
    $car_image = $row['car_image'];
    $car_doors = $row['car_doors'];
    $car_seats = $row['car_seats'];
  }
}

if(isset($_POST['book'])) {
  $booking_booked_start_date = $_POST['booking_booked_start_date'];
  $booking_booked_end_date = $_POST['booking_booked_end_date'];
  $account_id = $_SESSION['account_id'];
  $query = "INSERT INTO bookings (booking_booked_start_date, booking_booked_end_date, account_id, car_id) 
                VALUES ('{$booking_booked_start_date}','{$booking_booked_end_date}','{$account_id}','{$car_id}')";
  $make_new_booking_query = mysqli_query($connection, $query);
  validateQuery($make_new_booking_query);
}

?>
    <!-- Car Details Row -->
    <div class="row">
      
      <div class="col-md-8">
        <img class="img-fluid" src="http://placehold.it/750x500" alt="">
      </div>

      <div class="col-md-4">
        <h3 class="my-3">Description</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus. Mauris ultricies, justo eu convallis placerat, felis enim.</p>
        <h3 class="my-3">Details</h3>
        <ul>
          <li><?php echo $car_colour; ?></li>
          <li><?php echo $car_body_type; ?></li>
          <li><?php echo $car_power; ?></li>
          <li><?php echo $car_doors; ?></li>
          <li><?php echo $car_seats; ?></li>
        </ul>
        <?php if(isset($_SESSION['account_id'])): ?>
        <form action="" method="post">
          <div class="form-group">
            <label for="booking_booked_start_date">Start Date</label>
            <input type="date" name="booking_booked_start_date" id="booking_booked_start_date" class="form-control">
          </div>
          <div class="form-group">
            <label for="booking_booked_end_date">End Date</label>
            <input type="date" name="booking_booked_end_date" id="booking_booked_end_date" class="form-control">
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" name="book">Book</button>
            <button type="reset" class="btn btn-danger">Reset</button>
          </div>
        </form>
        <?php else: ?>
        <a href="user/login.php" class="btn btn-primary" role="button" aria-pressed="true">Log In to Book</a>
        <?php endif; ?>

      </div>

    </div>
    <!-- /.row -->

    <!-- Related Projects Row -->
    <h3 class="my-4">Related Projects</h3>

    <div class="row">

      <div class="col-md-3 col-sm-6 mb-4">
        <a href="#">
          <img class="img-fluid" src="http://placehold.it/500x300" alt="">
        </a>
      </div>

      <div class="col-md-3 col-sm-6 mb-4">
        <a href="#">
          <img class="img-fluid" src="http://placehold.it/500x300" alt="">
        </a>
      </div>

      <div class="col-md-3 col-sm-6 mb-4">
        <a href="#">
          <img class="img-fluid" src="http://placehold.it/500x300" alt="">
        </a>
      </div>

      <div class="col-md-3 col-sm-6 mb-4">
        <a href="#">
          <img class="img-fluid" src="http://placehold.it/500x300" alt="">
        </a>
      </div>

    </div>
    <!-- /.row -->
