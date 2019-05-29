<?php
if(isset($_GET['car_id'])) {
  $car_id = $_GET['car_id'];
  $query = "SELECT * FROM cars WHERE car_id = $car_id";
  $result = query($query);
  while($row = fetchArray($result)) {
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
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Edit Car</h1>
          <p class="mb-4">Some useful info or alerts.</p>

          <!-- Basic Card Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><?php echo "ID: $car_id - $car_make $car_model"; ?></h6>
            </div>
            <div class="card-body">
              <form class="user" action="" method="post" enctype=multipart/form-data>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="car_make">Make</label>
                    <input type="text" class="form-control" placeholder="Make" name="car_make" id="car_make" class="form-control" value="<?php echo $car_make; ?>">
                  </div>
                  <div class="col-sm-6">
                    <label for="car_model">Model</label>
                    <input type="text" class="form-control" placeholder="Model" name="car_model" id="car_model" class="form-control" value="<?php echo $car_model; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="car_status">Status</label>
                    <select name="car_status" class="form-control" id="car_status">
                    <?php
                    switch ($car_status) {
                      case 'available':
                      echo "<option value='available' selected='selected'>Available</option>";
                      echo "<option value='unavailable'>Unavailable</option>";
                      break;
                      
                      case 'unavailable':
                      echo "<option value='available'>Available</option>";
                      echo "<option value='unavailable' selected='selected'>Unavailable</option>";
                      break;
                      
                      default:
                      echo "<option value='' selected='selected'>Select Status</option>";
                      echo "<option value='available'>Available</option>";
                      echo "<option value='unavailable'>Unavailable</option>";
                      break;
                    }
                    ?>
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
                      <option value="1" <?php if($car_doors == '1') {echo ' selected="selected"';} ?>>1</option>
                      <option value="2" <?php if($car_doors == '2') {echo ' selected="selected"';} ?>>2</option>
                      <option value="3" <?php if($car_doors == '3') {echo ' selected="selected"';} ?>>3</option>
                      <option value="4" <?php if($car_doors == '4') {echo ' selected="selected"';} ?>>4</option>
                      <option value="5" <?php if($car_doors == '5') {echo ' selected="selected"';} ?>>5</option>
                    </select>
                  </div>
                  <div class="col-sm-6">
                    <label for="car_seats">Seats</label>
                    <select name="car_seats" class="form-control" id="car_seats">
                      <option value="1" <?php if($car_seats == '1') {echo ' selected="selected"';} ?>>1</option>
                      <option value="2" <?php if($car_seats == '2') {echo ' selected="selected"';} ?>>2</option>
                      <option value="3" <?php if($car_seats == '3') {echo ' selected="selected"';} ?>>3</option>
                      <option value="4" <?php if($car_seats == '4') {echo ' selected="selected"';} ?>>4</option>
                      <option value="5" <?php if($car_seats == '5') {echo ' selected="selected"';} ?>>5</option>
                      <option value="6" <?php if($car_seats == '6') {echo ' selected="selected"';} ?>>6</option>
                      <option value="7" <?php if($car_seats == '7') {echo ' selected="selected"';} ?>>7</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="car_body_type">Body Type</label>
                    <input type="text" name="car_body_type" id="car_body_type" class="form-control" value="<?php echo $car_body_type; ?>">
                  </div>
                  <div class="col-sm-6">
                    <label for="car_power">Power</label>
                    <input type="text" name="car_power" id="car_power" class="form-control" value="<?php echo $car_power; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="car_colour">Colour</label>
                    <input type="text" name="car_colour" id="car_colour" class="form-control" value="<?php echo $car_colour; ?>">
                  </div>
                  <div class="col-sm-3">
                    <img src="../images/<?php echo $car_image; ?>" alt="<?php echo $car_image; ?>" width="200px">
                  </div>
                  <div class="col-sm-3">
                    <input type="file" name="car_image" id="car_image" class="form-control-file">
                  </div>
                </div>
                <hr>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <button type="submit" class="btn btn-primary btn-user btn-block" name="update_car">
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