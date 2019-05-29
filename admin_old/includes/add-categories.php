<!-- This is a part for displaying Add Category form -->
<form action="" method="post">
    <div class="form-group">
        <h2>Add new category</h2>
    </div>
    <div class="form-group">
        <label for="category_name">Category Name</label>
        <input class="form-control" type="text" name="category_name">
    </div>
    <div class="form-group">
        <label for="category_daily_price">Daily price</label>
        <input class="form-control" type="text" name="category_daily_price">
    </div>
    <div class="form-group">
        <label for="category_description">Description</label>
        <input class="form-control" type="text" name="category_description">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary" name="add_category">Add</button>
        <button type="reset" class="btn btn-danger">Reset</button>
    </div>
</form>