<?php 
$query = "SELECT * FROM categories";
$result = query($query);

setIndexPageBooking();
?>

<div class="col-lg-3 offset-lg-2 align-self-center">
    <div class="card">
        <div class="card-header"> Book a Car </div>
        <form action="" method="post" class="my-2">
            <div class="form-group">
                <label class="col-lg control-label">Start Date</label>
                <div class="col-lg">
                    <input class="form-control inputchange" type="date" name="startdate" id="startdate" format="yyyy-mm-dd">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg control-label">End Date</label>
                <div class="col-lg">
                    <input class="form-control inputchange" type="date" name="enddate" id="enddate">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg control-label">Category</label>
                <select class="form-control mx-3 inputchange" name="categories" id="categories"  style="width:90%">
                    <option hidden selected></option>
                        <?php while($row = fetchArray($result)) {
                            $category_name = $row['category_name'];
                            $category_description = $row['category_description'];
                            $category_daily_price = $row['category_daily_price'];
                            echo "<option value=$category_name>$category_name</option>";}?>
                </select>
            </div>
            <div class="col-lg-3 text-right">
                <button type="submit" class="btn btn-primary no-wrap" name="index_page_book">Book</button>
                <!--<input type="submit" class="btn btn-primary" value="Book" name="index_page_book">
                <a href="newbooking.php" name="index_page_book" role="button" aria="true" class="btn btn-primary no-wrap">Book</a>-->
            </div>
        </form>
    </div>
</div>
<!--Category Pop up-->
<?php 
    $query = "SELECT * FROM categories";
    $result = query($query);
    while($row = fetchArray($result)){
        $category_name = $row['category_name'];
        $category_description = $row['category_description'];
        $category_daily_price = $row['category_daily_price'];
        $category_name_daily_price = $category_name ."_category_daily_price";
        $category_name_simluated_price = $category_name."_simulated_price";
        echo "<p hidden id='$category_name_daily_price'>$category_daily_price</p>";
        echo "<div class='col-lg-3 align-self-center category' id='$category_name'>";
        echo "<div class='card'>";
        echo "<div class='card-header'>$category_name</div>";
        echo "<img class='img-fluid mx-4 my-2' src='images/full-size1.jpg' alt=''>";
        echo "<h5 class='card-title mx-4'>$category_name</h5>";
        echo "<p class='card-text mx-4'>$category_description</p>";
        echo "<h2 class='text-right mx-5 my-3' id='$category_name_simluated_price'></h2>";
        echo "</div>";
        echo "</div>";
    }?>