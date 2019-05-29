<?php acceptBooking(); ?>
<?php rejectBooking(); ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Bookings</h1>
          <p class="mb-4">Some useful info or alerts.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Placeholder for some info</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th><input type="checkbox" name="bulk_option" id="selectAllBoxes"></th>
                      <th>ID</th>
                      <th>Make & Model</th>
                      <th>Car ID</th>
                      <th>Account</th>
                      <th>Status</th>
                      <th>Start Date</th>
                      <th>End Date</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th></th>
                      <th>ID</th>
                      <th>Make & Model</th>
                      <th>Car ID</th>
                      <th>Account</th>
                      <th>Status</th>
                      <th>Start Date</th>
                      <th>End Date</th>
                      <th>Actions</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                    $query = "SELECT a.account_email
                                    , b.booking_id
                                    , b.car_id
                                    , b.booking_status
                                    , b.booking_booked_start_date
                                    , b.booking_booked_end_date
                                    , c.car_make
                                    , c.car_model
                              FROM bookings AS b
                              INNER JOIN accounts AS a ON b.account_id=a.account_id
                              INNER JOIN cars AS c ON b.car_id=c.car_id";
                    $result = query($query);
                    while($row = fetchArray($result)) {
                        $booking_id = $row['booking_id'];
                        $car_id = $row['car_id'];
                        $booking_status = $row['booking_status'];
                        $booking_booked_start_date = $row['booking_booked_start_date'];
                        $booking_booked_end_date = $row['booking_booked_end_date'];
                        $car_make = $row['car_make'];
                        $car_model = $row['car_model'];
                        $account_email = $row['account_email'];
                    ?>
                      <tr>
                        <td><input class="checkboxes" type="checkbox" name="bookingsCheckboxArray[]" value="<?php echo $booking_id; ?>" id="selectAllBoxes"></td>
                        <td><?php echo $booking_id; ?></td>
                        <td><?php echo "$car_make $car_model"; ?></td>
                        <td><?php echo $car_id; ?></td>
                        <td><?php echo $account_email; ?></td>
                        <td><?php echo $booking_status; ?></td>
                        <td><?php echo $booking_booked_start_date; ?></td>
                        <td><?php echo $booking_booked_end_date; ?></td>
                        <td>
                          <a href='bookings.php?accept=<?php echo $booking_id; ?>' class='text-success px-1'><i class='fas fa-check'></i></a>
                          <a href='javascript:void(0);' rel='<?php echo $booking_id; ?>' class='text-warning px-1 reject-link'><i class='fas fa-ban'></i></a>
                          <a href='bookings.php?action=edit&booking_id=<?php echo $booking_id; ?>' class='text-dark px-1'><i class='fas fa-pencil-alt'></i></a>
                          <a href='bookings.php?delete=<?php echo $booking_id; ?>' class='text-danger px-1'><i class='fas fa-trash'></i></a>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->