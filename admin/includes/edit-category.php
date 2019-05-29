<?php
if (isset($_GET['edit'])) {
    $category_id = $_GET['edit'];
    $query = "SELECT * FROM categories WHERE category_id = $category_id";
    $result = query($query);
    while($row = fetchArray($result)) {
      $category_id = $row['category_id'];
      $category_name = $row['category_name'];
      $category_daily_price = $row['category_daily_price'];
      $category_description = $row['category_description'];
    }
}
updateCategory($category_id); 
?>
              <!-- Basic Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary"><?php echo "ID: $category_id - $category_name"; ?></h6>
                </div>
                <div class="card-body">
                  <form class="user" action="" method="post" enctype=multipart/form-data>
                    <div class="form-group row">
                      <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="category_name">Category name</label>
                        <input type="text" class="form-control" name="category_name" id="category_name" value="<?php echo $category_name; ?>">
                      </div>
                      <div class="col-sm-6">
                        <label for="category_daily_price">Daily price</label>
                        <input type="text" class="form-control" name="category_daily_price" id="category_daily_price" value="<?php echo $category_daily_price; ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col mb-3 mb-sm-0">
                        <label for="category_description">Description</label>
                        <textarea name="category_description" id="category_description" class="form-control" rows="5" cols="10"><?php echo $category_description; ?></textarea>
                      </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                      <div class="col-sm-6 mb-3 mb-sm-0">
                        <button type="submit" class="btn btn-primary btn-user btn-block" name="update_category">
                          <i class="fas fa-save fa-fw"></i> Save
                        </button>
                      </div>
                      <div class="col-sm-6">
                        <button type="reset" class="btn btn-danger btn-user btn-block">
                          <i class="fas fa-undo-alt fa-fw"></i> Reset
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>