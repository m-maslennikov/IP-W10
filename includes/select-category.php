<?php setBookingInfo(); ?>
<div class="card-header">
    <div class="row">
    <div class="col-lg-4 text-center">
        <button class="btn btn-outline-secondary active btn-sm btn-block steps" id="category_step">Select Category</button>
    </div>
    <div class="col-lg-4 text-center">
        <button class="btn btn-outline-secondary btn-sm btn-block steps disabled" id="car_step">Select Car</button>
    </div>
    <div class="col-lg-4 text-center">
        <button class="btn btn-outline-secondary btn-sm btn-block steps disabled" id="payment_step">Confirm Payment</button>
    </div>
    </div>
</div>
<div class="row select-category">  
    <div class="col-5 text-center">
        <?php 
        while($row = fetchArray($result)){
            $category_name = $row['category_name'];
            echo "<h2 class='my-3 category' id='$category_name'></h2>";
        }
        ?>
    </div>
</div>
<div class="row select-category">
    <div class="col-5 text-center">
        <img src="images/full-size1.jpg" class="my-5" alt="" style="width: 80%">
    </div>
    <div class="col-4 text-left">
        <?php 
            $query = "SELECT * FROM categories";
            $result = query($query);
            while($row = fetchArray($result)){
                $category_name_description = $row['category_name'];
                $category_description = $row['category_description'];
                $category_description_name = "category_description_".$category_name_description;
                echo "<p class='category' id='$category_description_name'>$category_description</p>";
            }
        ?>
    <br><br><br>
    <h4>Price Description</h4>
        <?php
            $query = "SELECT * FROM categories";
            $result = query($query);
            while($row = fetchArray($result)){
                $category_name_price = $row['category_name'];
                $category_daily_price = $row['category_daily_price'];
                $category_name_daily_price = $category_name_price."_category_daily_price";
                $category_name_simluated_price = $category_name_price."_simulated_price";
                echo "<p hidden id='$category_name_daily_price'>$category_daily_price</p>";
                echo "<p class='category' id='$category_name_simluated_price'></p>";
            }
        ?>
    </div>
    <div class="col-3">
        <form action="" method="post">
            <div class="form-group">
                <label class="col-lg control-label">Start Date</label>
                <div class="col">
                    <input class="form-control inputchangecategory" type="date" name="startdate" id="startdate" format="yyyy-mm-dd" value="<?php echo $_SESSION['datefrom'];?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg control-label">End Date</label>
                <div class="col">
                    <input class="form-control inputchangecategory" type="date" name="enddate" id="enddate" value="<?php echo $_SESSION['dateto'];?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg control-label">Category</label>
                <select class="form-control mx-3 inputchangecategory col" name="categories" id="categories"  style="width:90%">
                    <?php 
                        $query = "SELECT * FROM categories";
                        $result = query($query);
                        while($row = fetchArray($result)) {
                            $category_name = $row['category_name'];
                            $category_description = $row['category_description'];
                            if ($_SESSION['category'] == $category_name){
                            echo "<option selected value=$category_name>$category_name</option>";
                        } else {
                            echo "<option value=$category_name>$category_name</option>";
                        }
                    }?>
                </select>
            </div>
            <div class="col-lg text-center">
                <button type="submit" name="index_page_book" id="button_select_car" class="btn btn-primary no-wrap">Select a Car</button>
            </div>
        </form>
    </div>
</div>