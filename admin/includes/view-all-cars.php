<?php deleteCar(); ?>
<?php enableCar(); ?>
<?php disableCar(); ?>
<?php bulkCarAction(); ?>

<form action="" method="post">
    <div class="row justify-content-start">
        <div class="col-lg-4">
            <div class="form-group">
                <select class="form-control" name="bulk_action">
                    <option value="">Select Options</option>
                    <option value="enable">Make Available</option>
                    <option value="disable">Make Unavailable</option>
                    <option value="delete">Delete</option>
                </select>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <input class="btn btn-primary" type="submit" name="" value="Apply">
                <a class="btn btn-primary" href="cars.php?action=add" role="button">Add...</a>
            </div>
        </div>
        <div class="col-lg-5">
            <small>
                <p>
                    <span class="text-dark px-1"><i class='fas fa-eye'></i></span>- View
                    <span class="text-success px-1"><i class='fas fa-check'></i></span>- Enable
                    <span class="text-warning px-1"><i class='fas fa-ban'></i></span>- Disable
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
                        <th>Car ID</th>
                        <th>Make and Model</th>
                        <th>Colour</th>
                        <th>Status</th>
                        <th>Body Type</th>
                        <th>Power</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Doors</th>
                        <th>Seats</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $query = 'SELECT * FROM cars';
                $select_cars = mysqli_query($connection, $query);
                validateQuery($select_cars);
                while($row = mysqli_fetch_assoc($select_cars)) {
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
                    echo "<tr>";
                        ?>

                        <td><input class="checkboxes" type="checkbox" name="carsCheckboxArray[]" value="<?php echo $car_id; ?>" id="selectAllBoxes"></td>
                        
                        <?php
                        echo "<td>{$car_id}</td>";
                        echo "<td>{$car_make} {$car_model}</td>";
                        echo "<td>{$car_colour}</td>";
                        echo "<td>{$car_status}</td>";
                        echo "<td>{$car_body_type}</td>";
                        echo "<td>{$car_power}</td>";
                            $query = "SELECT * FROM categories WHERE category_id = {$category_id}";
                            $select_category_id = mysqli_query($connection, $query);
                            validateQuery($select_category_id);
                            while($row = mysqli_fetch_assoc($select_category_id)) {
                                $category_name = $row['category_name'];
                                echo "<td>{$category_name}</td>";
                            }
                        echo "<td><img width='100px' src='../images/$car_image' alt='$car_image'></td>";
                        echo "<td>{$car_doors}</td>";
                        echo "<td>{$car_seats}</td>";
                        echo "
                            <td>
                                <a href='../cars.php?action=view_car&car_id={$car_id}' target='_blank' class='text-dark px-1'><i class='fas fa-eye'></i></a>
                                <a href='cars.php?enable={$car_id}' class='text-success px-1'><i class='fas fa-check'></i></a>
                                <a href='cars.php?disable={$car_id}' class='text-warning px-1'><i class='fas fa-ban'></i></a>
                                <a href='cars.php?action=edit&car_id={$car_id}' class='text-dark px-1'><i class='fas fa-pencil-alt'></i></a>
                                <a href='cars.php?delete={$car_id}' class='text-danger px-1'><i class='fas fa-trash'></i></a>
                            </td>";
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</form>