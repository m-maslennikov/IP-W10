<?php addCar(); ?>

<!-- This is a part for displaying Add Car form -->
<form action="" method="post" enctype=multipart/form-data>
    <div class="form-group">
        <label for="car_make">Make</label>
        <input type="text" name="car_make" id="car_make" class="form-control">
    </div>
    <div class="form-group">
        <label for="car_model">Model</label>
        <input type="text" name="car_model" id="car_model" class="form-control">
    </div>
    <div class="form-group">
        <label for="car_colour">Colour</label>
        <input type="text" name="car_colour" id="car_colour" class="form-control">
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
        <input type="text" name="car_body_type" id="car_body_type" class="form-control">
    </div>
    <div class="form-group">
        <label for="car_power">Power</label>
        <input type="text" name="car_power" id="car_power" class="form-control">
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
        <button type="submit" class="btn btn-primary" name="add_car">Add</button>
        <button type="reset" class="btn btn-danger">Reset</button>
    </div>
</form>