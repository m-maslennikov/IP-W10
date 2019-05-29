<?php deleteCar(); ?>
<?php enableCar(); ?>
<?php disableCar(); ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Cars</h1>
          <p class="mb-4">Some useful info or alerts.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><!--Placeholder for some info--></h6>
              <a href="cars.php?action=add" class="btn btn-primary btn-user">Add Car</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th><input type="checkbox" name="bulk_option" id="selectAllBoxes"></th>
                      <th>ID</th>
                      <th>Make and Model</th>
                      <th>Colour</th>
                      <th>Status</th>
                      <th>Body Type</th>
                      <th>Power</th>
                      <th>Category</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th></th>
                      <th>ID</th>
                      <th>Make and Model</th>
                      <th>Colour</th>
                      <th>Status</th>
                      <th>Body Type</th>
                      <th>Power</th>
                      <th>Category</th>
                      <th>Actions</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                    $query = "SELECT c.car_id
                                    , c.car_make
                                    , c.car_model
                                    , c.car_colour
                                    , c.car_status
                                    , c.car_body_type
                                    , c.car_power
                                    , cat.category_name
                              FROM cars AS c
                              INNER JOIN categories AS cat ON c.category_id=cat.category_id";
                    $result = query($query);
                    while($row = fetchArray($result)) {
                        $car_id = $row['car_id'];
                        $car_make = $row['car_make'];
                        $car_model = $row['car_model'];
                        $car_colour = $row['car_colour'];
                        $car_status = $row['car_status'];
                        $car_body_type = $row['car_body_type'];
                        $car_power = $row['car_power'];
                        $category_name = $row['category_name'];
                    ?>
                    <tr>
                      <td><input class="checkboxes" type="checkbox" name="carsCheckboxArray[]" value="<?php echo $car_id; ?>" id="selectAllBoxes"></td>      
                      <td><?php echo $car_id; ?></td>
                      <td><?php echo "$car_make $car_model"; ?></td>
                      <td><?php echo $car_colour; ?></td>
                      <td class=""><?php echo $car_status; ?></td>
                      <td><?php echo $car_body_type; ?></td>
                      <td><?php echo $car_power; ?></td>
                      <td><?php echo $category_name; ?></td>
                      <td>
                        <a href='../cars.php?action=view_car&car_id=<?php echo $car_id; ?>' target='_blank' class='text-dark px-1'><i class='fas fa-eye'></i></a>
                        <a href='cars.php?enable=<?php echo $car_id; ?>' class='text-success px-1'><i class='fas fa-check'></i></a>
                        <a href='cars.php?disable=<?php echo $car_id; ?>' class='text-warning px-1'><i class='fas fa-ban'></i></a>
                        <a href='cars.php?action=edit&car_id=<?php echo $car_id; ?>' class='text-dark px-1'><i class='fas fa-pencil-alt'></i></a>
                        <a href='cars.php?delete=<?php echo $car_id; ?>' class='text-danger px-1'><i class='fas fa-trash'></i></a>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->