<div class="card-header">
    <div class="row">
    <div class="col-lg-4 text-center">
        <button class="btn btn-outline-secondary btn-sm btn-block steps" id="category_step">Select Category</button>
    </div>
    <div class="col-lg-4 text-center">
        <button class="btn btn-outline-secondary active btn-sm btn-block steps" id="car_step">Select Car</button>
    </div>
    <div class="col-lg-4 text-center">
        <button class="btn btn-outline-secondary btn-sm btn-block steps" id="payment_step">Confirm Payment</button>
    </div>
    </div>
</div>
<div class="row">  
    <div class="col-5 text-center">
        <h2 class="my-3" id="car_category_name"><?php echo $_SESSION['category']; ?></h2>
    </div>
</div>
<div class="row">
    <div class="col-5 text-center">
        <img src="images/full-size1.jpg" class="my-5" alt="" style="width: 80%">
    </div>
    <div class="col-4 text-left">
        <select class="form-control select-car" id="select-car" style="width:50%">
            <?php 
                $category_selected = $_SESSION['category'];
                $query = "SELECT 
                            cars.car_make
                            , cars.car_model
                            , cars.car_colour
                            , cars.car_body_type
                            , cars.car_power
                            , cars.car_doors
                            , cars.car_seats
                            , categories.category_name
                            FROM 
                            cars as cars
                            INNER JOIN 
                            categories as categories ON
                            cars.category_id = categories.category_id
                            WHERE categories.category_name = '$category_selected'";
                $result = query($query);
                while($row = fetchArray($result)) {
                    $car_make = $row['car_make'];
                    $car_model = $row['car_model'];
                    $car_make_model = $car_make.' '.$car_model;
                    echo "<option id='$car_make_model' value=$car_make_model>$car_make_model</option>";
                }
            ?>
        </select>
        <br>
    <h4>Car Details</h4>
        <?php
            $result = query($query);
            while($row = fetchArray($result)) {
                $car_colour = $row['car_colour'];
                $car_body_type = $row['car_body_type'];
                $car_power = $row['car_power'];
                $car_doors = $row['car_doors'];
                $car_seats = $row['car_seats'];
                echo "<p class='car_selected'>Color: $car_colour <br> Body Type: $car_body_type <br> Power: $car_power hp <br>Doors: $car_doors <br>Seats: $car_seats</p>";
            }
        ?>
    </div>
    <div class="col-3">
        <h4>Price Description</h4>
            <?php
                calculatePrice();
            ?>
        <div class="col-lg text-center">
            <button type="submit" name="index_page_book" class="btn btn-primary no-wrap">Confirm Payment</button>
            
        </div>
    </div>
</div>