<?php addCar(); ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Add Car</h1>
          <p class="mb-4">Some useful info or alerts.</p>

          <!-- Basic Card Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">New Car Info</h6>
            </div>
            <div class="card-body">
              <form class="user" action="" method="post" enctype=multipart/form-data>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="car_make">Make</label>
                    <input type="text" class="form-control" name="car_make" id="car_make" class="form-control">
                  </div>
                  <div class="col-sm-6">
                    <label for="car_model">Model</label>
                    <input type="text" class="form-control" name="car_model" id="car_model" class="form-control">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="car_status">Status</label>
                    <select name="car_status" class="form-control" id="car_status">
                      <option value='available'>Available</option>
                      <option value='unavailable'>Unavailable</option>
                    </select>
                  </div>
                  <div class="col-sm-6">
                    <label for="category_id">Category</label>
                    <select name="category_id" id="category_id" class="form-control">
                    <?php
                    $query = "SELECT category_id, category_name FROM categories";
                    $result = query($query);
                    while($row = fetchArray($result)) {
                      $category_id = $row['category_id'];
                      $category_name = $row['category_name'];
                      echo "<option value='{$category_id}'>{$category_name}</option>";
                    }
                    ?>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="car_doors">Doors</label>
                    <select name="car_doors" class="form-control" id="car_doors">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select>
                  </div>
                  <div class="col-sm-6">
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
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="car_body_type">Body Type</label>
                    <input type="text" name="car_body_type" id="car_body_type" class="form-control">
                  </div>
                  <div class="col-sm-6">
                    <label for="car_power">Power</label>
                    <input type="text" name="car_power" id="car_power" class="form-control">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="car_colour">Colour</label>
                    <input type="text" name="car_colour" id="car_colour" class="form-control">
                  </div>
                  <div class="col-sm-6">
                    <label for="car_image">Image</label>
                    <input type="file" name="car_image" id="car_image" class="form-control-file">
                  </div>
                </div>
                <hr>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <button type="submit" class="btn btn-primary btn-user btn-block" name="add_car">
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
        </div>
        <!-- /.container-fluid -->