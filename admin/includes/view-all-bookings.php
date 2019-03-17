<?php //deleteBooking(); ?>
<?php acceptBooking(); ?>
<?php rejectBooking(); ?>

<?php 
if(isset($_POST['checkboxArray'])){
    foreach ($_POST['checkboxArray'] as $booking_id) {
        $bulk_action = $_POST['bulk_action'];
        switch ($bulk_action) {
            case 'accept':
                $query = "UPDATE bookings SET booking_status = 'Accepted' WHERE booking_id = $booking_id";
                $make_accept_query = mysqli_query($connection,$query);
                validateQuery($make_accept_query);
                break;
            case 'reject':
                $query = "UPDATE bookings SET booking_status = 'Rejected' WHERE booking_id = $booking_id";
                $make_accept_query = mysqli_query($connection,$query);
                validateQuery($make_accept_query);
                break;
            case 'delete':
                $query = "DELETE FROM bookings WHERE booking_id = {$booking_id}";
                $delete_booking_query = mysqli_query($connection, $query);
                validateQuery($delete_booking_query);
                break;
            default:
                //echo "No option selected";
                break;
        }
    }
}
?>
<form action="" method="post">
    <div class="row justify-content-start">
        <div class="col-lg-4">
            <div class="form-group">
                <select class="form-control" name="bulk_action">
                    <option value="">Select Options</option>
                    <option value="accept">Accept</option>
                    <option value="reject">Reject</option>
                    <option value="delete">Delete</option>
                </select>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <input class="btn btn-primary" type="submit" name="" value="Apply">
                <a class="btn btn-primary" href="bookings.php?action=add" role="button">Add...</a>
            </div>
        </div>
        <div class="col-lg-5">
            <small>
                <p>
                    <span class="text-success px-1"><i class='fas fa-check'></i></span>- Accept
                    <span class="text-warning px-1"><i class='fas fa-ban'></i></span>- Reject
                    <span class="text-dark px-1"><i class='fas fa-pencil-alt'></i></span>- Edit
                    <span class="text-danger px-1"><i class='fas fa-trash'></i></span>- Delete
                </p>
            </small>
        </div>
    </div>
    <div class="row justify-content-start">
        <div class="col">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th><input type="checkbox" name="bulk_option" id="selectAllBoxes"></th>
                        <th>Booking ID</th>
                        <th>Make & Model</th>
                        <th>Car ID</th>
                        <th>Account</th>
                        <th>Status</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $query = 'SELECT * FROM bookings';
                $select_bookings = mysqli_query($connection, $query);
                validateQuery($select_bookings);
                while($row = mysqli_fetch_assoc($select_bookings)) {
                    $booking_id = $row['booking_id'];
                    $car_id = $row['car_id'];
                    $account_id = $row['account_id'];
                    $booking_status = $row['booking_status'];
                    $booking_booked_start_date = $row['booking_booked_start_date'];
                    $booking_booked_end_date = $row['booking_booked_end_date'];
                    
                    echo "<tr>";
                        ?>

                        <td><input class="checkboxes" type="checkbox" name="checkboxArray[]" value="<?php echo $booking_id; ?>" id="selectAllBoxes"></td>
                        
                        <?php
                        echo "<td>{$booking_id}</td>";

                        $query = "SELECT * FROM cars WHERE car_id = {$car_id}";
                        $select_car_id = mysqli_query($connection, $query);
                        validateQuery($select_car_id);
                        while($row = mysqli_fetch_assoc($select_car_id)) {
                            $car_make = $row['car_make'];
                            $car_model = $row['car_model'];
                            echo "<td>{$car_make} {$car_model}</td>";
                        }

                        echo "<td>{$car_id}</td>";

                        $query = "SELECT * FROM accounts WHERE account_id = {$account_id}";
                        $select_account_id = mysqli_query($connection, $query);
                        validateQuery($select_account_id);
                        while($row = mysqli_fetch_assoc($select_account_id)) {
                            $account_email = $row['account_email'];
                            echo "<td>{$account_email}</td>";
                        }

                        echo "<td>{$booking_status}</td>";
                        echo "<td>{$booking_booked_start_date}</td>";
                        echo "<td>{$booking_booked_end_date}</td>";
                        echo "
                            <td>
                                <a href='../bookings.php?action=view_booking&booking_id={$booking_id}' target='_blank' class='text-dark px-1'><i class='fas fa-eye'></i></a>
                                <a href='bookings.php?accept={$booking_id}' class='text-success px-1'><i class='fas fa-check'></i></a>
                                <a href='bookings.php?reject={$booking_id}' class='text-warning px-1'><i class='fas fa-ban'></i></a>
                                <a href='bookings.php?action=edit&booking_id={$booking_id}' class='text-dark px-1'><i class='fas fa-pencil-alt'></i></a>
                                <a href='bookings.php?delete={$booking_id}' class='text-danger px-1'><i class='fas fa-trash'></i></a>
                            </td>";
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</form>