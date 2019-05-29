<?php
if(isset($_GET['booking_id'])) {
  $booking_id = $_GET['booking_id'];
  $query = "SELECT a.account_email
                  , b.booking_id
                  , b.booking_booked_start_date
                  , b.booking_booked_start_time
                  , b.booking_booked_end_date
                  , b.booking_booked_end_time
                  , b.booking_real_start_date
                  , b.booking_real_start_time
                  , b.booking_real_end_date
                  , b.booking_real_end_time
                  , b.booking_discount
                  , b.booking_price
                  , b.booking_status
                  , b.booking_comment
                  , b.car_id
                  , c.car_make
                  , c.car_model
            FROM bookings AS b
            INNER JOIN accounts AS a ON b.account_id=a.account_id
            INNER JOIN cars AS c ON b.car_id=c.car_id";
  $result = query($query);
  while($row = fetchArray($result)) {
    $account_email = $row['account_email'];
    $booking_id = $row['booking_id'];
    $booking_booked_start_date = $row['booking_booked_start_date'];
    $booking_booked_start_time = $row['booking_booked_start_time'];
    $booking_booked_end_date = $row['booking_booked_end_date'];
    $booking_booked_end_time = $row['booking_booked_end_time'];
    $booking_real_start_date = $row['booking_real_start_date'];
    $booking_real_start_time = $row['booking_real_start_time'];
    $booking_real_end_date = $row['booking_real_end_date'];
    $booking_real_end_time = $row['booking_real_end_time'];
    $booking_discount = $row['booking_discount'];
    $booking_price = $row['booking_price'];
    $booking_status = $row['booking_status'];
    $booking_comment = $row['booking_comment'];
    $car_id = $row['car_id'];
    $car_make = $row['car_make'];
    $car_model = $row['car_model'];
  }
}
//TODO:
//updateBooking($booking_id);
?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Edit Booking</h1>
          <p class="mb-4">Some useful info or alerts.</p>

          <!-- Basic Card Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><?php echo "ID: $booking_id - $car_make $car_model - $account_email"; ?></h6>
            </div>
            <div class="card-body">
              <form class="user" action="" method="post" enctype=multipart/form-data>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="booking_booked_start_date">booking_booked_start_date</label>
                    <input type="date" name="booking_booked_start_date" id="booking_booked_start_date" class="form-control" value="<?php echo $booking_booked_start_date; ?>">
                  </div>
                  <div class="col-sm-6">
                    <label for="booking_booked_start_time">booking_booked_start_time</label>
                    <input type="time" name="booking_booked_start_time" id="booking_booked_start_time" class="form-control" value="<?php echo $booking_booked_start_time; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="booking_booked_end_date">booking_booked_end_date</label>
                    <input type="date" name="booking_booked_end_date" id="booking_booked_end_date" class="form-control" value="<?php echo $booking_booked_end_date; ?>">
                  </div>
                  <div class="col-sm-6">
                    <label for="booking_booked_end_time">booking_booked_end_time</label>
                    <input type="time" name="booking_booked_end_time" id="booking_booked_end_time" class="form-control" value="<?php echo $booking_booked_end_time; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="booking_real_start_date">booking_real_start_date</label>
                    <input type="date" name="booking_real_start_date" id="booking_real_start_date" class="form-control" value="<?php echo $booking_real_start_date; ?>">
                  </div>
                  <div class="col-sm-6">
                    <label for="booking_real_start_time">booking_real_start_time</label>
                    <input type="time" name="booking_real_start_time" id="booking_real_start_time" class="form-control" value="<?php echo $booking_real_start_time; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="booking_real_end_date">booking_real_end_date</label>
                    <input type="date" name="booking_real_end_date" id="booking_real_end_date" class="form-control" value="<?php echo $booking_real_end_date; ?>">
                  </div>
                  <div class="col-sm-6">
                    <label for="booking_real_end_time">booking_real_end_time</label>
                    <input type="time" name="booking_real_end_time" id="booking_real_end_time" class="form-control" value="<?php echo $booking_real_end_time; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="car_status">Status</label>
                    <select name="car_status" class="form-control" id="car_status">
                    <?php
                    switch ($car_status) {
                      case 'available':
                      echo "<option value='available' selected='selected'>Available</option>";
                      echo "<option value='unavailable'>Unavailable</option>";
                      break;
                      
                      case 'unavailable':
                      echo "<option value='available'>Available</option>";
                      echo "<option value='unavailable' selected='selected'>Unavailable</option>";
                      break;
                      
                      default:
                      echo "<option value='' selected='selected'>Select Status</option>";
                      echo "<option value='available'>Available</option>";
                      echo "<option value='unavailable'>Unavailable</option>";
                      break;
                    }
                    ?>
                    </select>
                  </div>
                  <div class="col-sm-6">
                    <label for="category_id">Category</label>
                    <select name="category_id" id="category_id" class="form-control">
                    <?php
                    $query = "SELECT category_id, category_name FROM categories";
                    $result = query($query);
                    while($row = fetchArray($result)) {
                      $category_id = $row['category_id'];
                      $category_name = $row['category_name'];
                      echo "<option value='{$category_id}'>{$category_name}</option>";
                    }
                    ?>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="car_doors">Doors</label>
                    <select name="car_doors" class="form-control" id="car_doors">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select>
                  </div>
                  <div class="col-sm-6">
                    <label for="car_seats">Seats</label>
                    <select name="car_seats" class="form-control" id="car_seats">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="car_body_type">Body Type</label>
                    <input type="text" name="car_body_type" id="car_body_type" class="form-control" value="<?php echo $car_body_type; ?>">
                  </div>
                  <div class="col-sm-6">
                    <label for="car_power">Power</label>
                    <input type="text" name="car_power" id="car_power" class="form-control" value="<?php echo $car_power; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="car_colour">Colour</label>
                    <input type="text" name="car_colour" id="car_colour" class="form-control" value="<?php echo $car_colour; ?>">
                  </div>
                  <div class="col-sm-3">
                    <img src="../images/<?php echo $car_image; ?>" alt="<?php echo $car_image; ?>" width="200px">
                  </div>
                  <div class="col-sm-3">
                    <input type="file" name="car_image" id="car_image" class="form-control-file">
                  </div>
                </div>
                <hr>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <button type="submit" class="btn btn-primary btn-user btn-block" name="update_booking">
                      <i class="fas fa-save fa-fw"></i> Save
                    </button>
                  </div>
                  <div class="col-sm-6">
                    <button type="reset" class="btn btn-danger btn-user btn-block">
                      <i class="fas fa-undo-alt fa-fw"></i> Reset
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->