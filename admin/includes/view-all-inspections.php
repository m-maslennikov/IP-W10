<?php //deleteInspection(); ?>
<?php //enableInspection(); ?>
<?php //resolveInspection(); ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Inspections</h1>
          <p class="mb-4">Some useful info or alerts.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"> </h6>
              <a href="inspections.php?action=add" class="btn btn-primary btn-user">Add Inspection</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th><input type="checkbox" name="bulk_option" id="selectAllBoxes"></th>
                      <th>ID</th>
                      <th>Start date</th>
                      <th>Start time</th>
                      <th>End date</th>
                      <th>End time</th>
                      <th>Score</th>
                      <th>Email</th>
                      <th>Car</th>
                      <th>Type</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th></th>
                      <th>ID</th>
                      <th>Start date</th>
                      <th>Start time</th>
                      <th>End date</th>
                      <th>End time</th>
                      <th>Score</th>
                      <th>Email</th>
                      <th>Car</th>
                      <th>Type</th>
                      <th>Actions</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php
                  $query = "SELECT i.inspection_id
                                  , i.inspection_start_date
                                  , i.inspection_start_time
                                  , i.inspection_end_date
                                  , i.inspection_end_time
                                  , i.inspection_score
                                  , a.account_email
                                  , c.car_make
                                  , c.car_model
                                  , c.car_id
                                  , it.inspection_type_name
                                  , it.inspection_type_max_score
                            FROM inspections AS i
                            INNER JOIN accounts AS a ON i.account_id=a.account_id
                            INNER JOIN cars AS c ON i.car_id=c.car_id
                            INNER JOIN inspection_types AS it ON i.inspection_type_id=it.inspection_type_id";
                  $result = query($query);
                  while($row = fetchArray($result)) {
                      $inspection_id = $row['inspection_id'];
                      $inspection_start_date = $row['inspection_start_date'];
                      $inspection_start_time = $row['inspection_start_time'];
                      $inspection_end_date = $row['inspection_end_date'];
                      $inspection_end_time = $row['inspection_end_time'];
                      $inspection_score = $row['inspection_score'];
                      $account_email = $row['account_email'];
                      $car_make = $row['car_make'];
                      $car_model = $row['car_model'];
                      $car_id = $row['car_id'];
                      $inspection_type_name = $row['inspection_type_name'];
                      $inspection_type_max_score = $row['inspection_type_max_score'];
                  ?>
                  <tr>
                    <td><input class="checkboxes" type="checkbox" name="inspectionsCheckboxArray[]" value="<?php echo $inspection_id; ?>" id="selectAllBoxes"></td>
                    <td><?php echo $inspection_id; ?></td>
                    <td><?php echo $inspection_start_date; ?></td>
                    <td><?php echo $inspection_start_time; ?></td>
                    <td><?php echo $inspection_end_date; ?></td>
                    <td><?php echo $inspection_end_time; ?></td>
                    <td><?php echo $inspection_score; ?></td>
                    <td><?php echo $account_email; ?></td>
                    <td><?php echo "$car_id: $car_make $car_model"; ?></td>
                    <td><?php echo $inspection_type_name; ?></td>
                    <td>
                      <a href='inspections.php?action=view&inspection_id=<?php echo $inspection_id; ?>' class='text-dark px-1'><i class='fas fa-eye'></i></a>
                      <a href='inspections.php?enable=<?php echo $inspection_id; ?>' class='text-success px-1'><i class='fas fa-check'></i></a>
                      <a href='inspections.php?resolve=<?php echo $inspection_id; ?>' class='text-warning px-1'><i class='fas fa-ban'></i></a>
                      <a href='inspections.php?action=edit&inspection_id=<?php echo $inspection_id; ?>' class='text-dark px-1'><i class='fas fa-pencil-alt'></i></a>
                      <a href='inspections.php?delete=<?php echo $inspection_id; ?>' class='text-danger px-1'><i class='fas fa-trash'></i></a>
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