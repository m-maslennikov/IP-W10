<?php addInspection(); ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Add Inspection</h1>
          <p class="mb-4">Some useful info or alerts.</p>

          <!-- Basic Card Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">New Inspection Info</h6>
            </div>
            <div class="card-body">
              <form class="user" action="" method="post" enctype=multipart/form-data>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="car_id">Car to be inspected</label>
                    <select name="car_id" id="car_id" class="form-control">
                    <?php
                    $query = "SELECT car_id, car_make, car_model FROM cars";
                    $result = query($query);
                    while($row = fetchArray($result)) {
                      $car_id = $row['car_id'];
                      $car_make = $row['car_make'];
                      $car_model = $row['car_model'];
                      echo "<option value='{$car_id}'>(ID: $car_id) $car_make $car_model</option>";
                    }
                    ?>
                    </select>
                  </div>
                  <div class="col-sm-6">
                    <label for="inspection_type_id">Inspection Type</label>
                    <select name="inspection_type_id" id="inspection_type_id" class="form-control">
                    <?php
                    $query = "SELECT inspection_type_id, inspection_type_name FROM inspection_types";
                    $result = query($query);
                    while($row = fetchArray($result)) {
                      $inspection_type_id = $row['inspection_type_id'];
                      $inspection_type_name = $row['inspection_type_name'];
                      echo "<option value='{$inspection_type_id}'>{$inspection_type_name}</option>";
                    }
                    ?>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="inspection_start_date">Inspection start date</label>
                    <input type="datetime-local" name="inspection_start_date" id="inspection_start_date" class="form-control" value="<?php echo date("Y-m-d\TH:i"); ?>">
                  </div>
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="inspection_end_date">Inspection end date</label>
                    <input type="datetime-local" name="inspection_end_date" id="inspection_end_date" class="form-control" value="<?php echo date("Y-m-d\TH:i", strtotime('1 day')); ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="account_id">Inspector</label>
                    <select name="account_id" id="account_id" class="form-control">
                    <?php
                    $query = "SELECT account_id, account_email FROM accounts WHERE account_type='staff'";
                    $result = query($query);
                    while($row = fetchArray($result)) {
                      $account_id = $row['account_id'];
                      $account_email = $row['account_email'];
                      echo "<option value='{$account_id}'>$account_email</option>";
                    }
                    ?>
                    </select>
                  </div>
                  <div class="col-sm-6">
                    <label for="inspection_score">Inspection Score</label>
                    <select name="inspection_score" id="inspection_score" class="form-control">
                      <option value='NULL'>N/A</option>
                      <option value='1'>1</option>
                      <option value='2'>2</option>
                      <option value='3'>3</option>
                      <option value='4'>4</option>
                      <option value='5'>5</option>
                    </select>
                  </div>
                </div>
                <hr>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <button type="submit" class="btn btn-primary btn-user btn-block" name="add_inspection">
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