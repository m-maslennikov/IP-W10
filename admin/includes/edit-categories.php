<?php
if (isset($_GET['edit'])) {
    $category_id = $_GET['edit'];
    $query = "SELECT * FROM categories WHERE category_id = {$category_id}";
    $select_category_id = mysqli_query($connection, $query);
    validateQuery($select_category_id);
    $selected_category = mysqli_fetch_assoc($select_category_id);
    $selected_category_id = $selected_category['category_id'];
    $selected_category_name = $selected_category['category_name'];
    $selected_category_daily_price = $selected_category['category_daily_price'];
    $selected_category_description = $selected_category['category_description'];
}

updateCategory($category_id); 
?>

<form action="" method="post">
    <div class="form-group">
        <h2>Edit category ID <?php echo $selected_category_id; ?></h2>
    </div>
    <div class="form-group">
        <label for="category_name">Category Name</label>
        <input class="form-control" type="text" name="category_name" value="<?php echo $selected_category_name; ?>">
    </div>
    <div class="form-group">
        <label for="category_daily_price">Daily price</label>
        <input class="form-control" type="text" name="category_daily_price" value="<?php echo $selected_category_daily_price; ?>">
    </div>
    <div class="form-group">
        <label for="category_description">Description</label>
        <input class="form-control" type="text" name="category_description" value="<?php echo $selected_category_description; ?>">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary" name="update_category">Update</button>
        <button type="reset" class="btn btn-danger">Reset</button>
    </div>
</form>