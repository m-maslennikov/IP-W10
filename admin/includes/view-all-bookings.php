<?php //deleteBooking(); ?>
<?php acceptBooking(); ?>
<?php rejectBooking(); ?>
<?php bulkBookingAction(); ?>
<?php include "includes/_admin-reject-modal.php"; ?>

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
                <?php showAllBookings(); ?>
                </tbody>
            </table>
        </div>
    </div>
</form>