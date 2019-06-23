<?php
if(isset($_GET['booking_id'])) {
  $booking_id = $_GET['booking_id'];
  $query = "SELECT a.account_email
                  , b.booking_id
                  , b.booking_booked_start_date
                  , b.booking_booked_end_date
                  , b.booking_real_start_date
                  , b.booking_real_end_date
                  , b.booking_price
                  , b.booking_status
                  , b.booking_comment
                  , b.car_id
                  , c.car_make
                  , c.car_model
                  , p.promocode_text
            FROM bookings AS b
            INNER JOIN accounts AS a ON b.account_id=a.account_id
            INNER JOIN cars AS c ON b.car_id=c.car_id
            INNER JOIN promocodes AS p ON b.promocode_id=p.promocode_id
            WHERE booking_id = $booking_id";
  $result = query($query);
  while($row = fetchArray($result)) {
    $account_email = $row['account_email'];
    $booking_id = $row['booking_id'];
    $booking_booked_start_date = $row['booking_booked_start_date'];
    $booking_booked_end_date = $row['booking_booked_end_date'];
    $booking_real_start_date = $row['booking_real_start_date'];
    $booking_real_end_date = $row['booking_real_end_date'];
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
                    <input name="booking_booked_start_date" id="booking_booked_start_date" class="form-control" value="<?php echo $booking_booked_start_date; ?>">
                  </div>
                  <div class="col-sm-6">
                    <label for="booking_booked_start_time">booking_booked_start_time</label>

                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="booking_booked_end_date">booking_booked_end_date</label>
                    <input name="booking_booked_end_date" id="booking_booked_end_date" class="form-control" value="<?php echo $booking_booked_end_date; ?>">
                  </div>
                  <div class="col-sm-6">
                    <label for="booking_booked_end_time">booking_booked_end_time</label>

                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="booking_real_start_date">booking_real_start_date</label>
                    <input name="booking_real_start_date" id="booking_real_start_date" class="form-control" value="<?php echo $booking_real_start_date; ?>">
                  </div>
                  <div class="col-sm-6">
                    <label for="booking_real_start_time">booking_real_start_time</label>

                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="booking_real_end_date">booking_real_end_date</label>
                    <input name="booking_real_end_date" id="booking_real_end_date" class="form-control" value="<?php echo $booking_real_end_date; ?>">
                  </div>
                  <div class="col-sm-6">
                    <label for="booking_real_end_time">booking_real_end_time</label>

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