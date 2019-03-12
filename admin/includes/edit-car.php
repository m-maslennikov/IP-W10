<?php
if(isset($_GET['car_id'])) {
    $car_id = $_GET['car_id'];
    $query = "SELECT * FROM cars WHERE car_id = $car_id";
    $select_car_query = mysqli_query($connection, $query);
    validateQuery($select_car_query);
    while($row = mysqli_fetch_assoc($select_car_query)) {
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

updateCar($car_id);

?>

<form action="" method="post" enctype=multipart/form-data>
    <div class="form-group">
        <label for="car_make">Make</label>
        <input type="text" name="car_make" id="car_make" class="form-control" value="<?php echo $car_make; ?>">
    </div>
    <div class="form-group">
        <label for="car_model">Model</label>
        <input type="text" name="car_model" id="car_model" class="form-control" value="<?php echo $car_model; ?>">
    </div>
    <div class="form-group">
        <label for="car_colour">Colour</label>
        <input type="text" name="car_colour" id="car_colour" class="form-control" value="<?php echo $car_colour; ?>">
    </div>
    <div class="form-group">
        <label for="car_status">Status</label>
        <select name="car_status" class="form-control" id="car_status">
            <option value="Available">Available</option>
            <option value="Unavailable">Unavailable</option>
        </select>
    </div>
    <div class="form-group">
        <label for="car_body_type">Body Type</label>
        <input type="text" name="car_body_type" id="car_body_type" class="form-control" value="<?php echo $car_body_type; ?>">
    </div>
    <div class="form-group">
        <label for="car_power">Power</label>
        <input type="text" name="car_power" id="car_power" class="form-control" value="<?php echo $car_power; ?>">
    </div>
    <div class="form-group">
        <label for="category_id">Category</label>
        <select name="category_id" id="category_id" class="form-control">
            <?php
                $query = "SELECT * FROM categories";
                $select_all_categories = mysqli_query($connection, $query);
                validateQuery($select_all_categories);
                while($row = mysqli_fetch_assoc($select_all_categories)) {
                    $category_id = $row['category_id'];
                    $category_name = $row['category_name'];
                    echo "<option value='{$category_id}'>{$category_name}</option>";
                }
            ?>
        </select>
    </div>
    <div class="form-group">
        <img src="../images/<?php echo $car_image; ?>" alt="" width="200px">
    </div>
    <div class="form-group">
        <label for="car_image">Image</label>
        <input type="file" name="car_image" id="car_image" class="form-control-file">
    </div>
    <div class="form-group">
        <label for="car_doors">Doors</label>
        <select name="car_doors" class="form-control" id="car_doors">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
    </div>
    <div class="form-group">
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
    <div class="form-group">
        <button type="submit" class="btn btn-primary" name="update_car">Update</button>
        <button type="reset" class="btn btn-danger">Reset</button>
    </div>
</form>