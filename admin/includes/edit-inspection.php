<?php
if(isset($_GET['inspection_id'])) {
  $inspection_id = $_GET['inspection_id'];
  $query = "SELECT i.inspection_id
                  , i.inspection_status
                  , i.inspection_start_date
                  , i.inspection_end_date
                  , i.inspection_score
                  , a.account_email
                  , c.car_make
                  , c.car_model
                  , c.car_id
                  , it.inspection_type_name
            FROM inspections AS i
            INNER JOIN accounts AS a ON i.account_id=a.account_id
            INNER JOIN cars AS c ON i.car_id=c.car_id
            INNER JOIN inspection_types AS it ON i.inspection_type_id=it.inspection_type_id
            WHERE inspection_id = $inspection_id";
  $result = query($query);
  while($row = fetchArray($result)) {
    $inspection_id = $row['inspection_id'];
    $inspection_status = $row['inspection_status'];
    $inspection_start_date = date_format(date_create($row['inspection_start_date']), 'Y-m-d\TH:i:s');
    $inspection_end_date = date_format(date_create($row['inspection_end_date']), 'Y-m-d\TH:i:s');
    $inspection_score = $row['inspection_score'];
    $account_email = $row['account_email'];
    $car_make = $row['car_make'];
    $car_model = $row['car_model'];
    $car_id = $row['car_id'];
    $inspection_type_name = $row['inspection_type_name'];
  }
}
updateInspection($inspection_id);
?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Edit Inspection</h1>
          <p class="mb-4">Some useful info or alerts.</p>

          <!-- Basic Card Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><?php echo "ID: $inspection_id - $car_make $car_model"; ?></h6>
            </div>
            <div class="card-body">
              <form class="user" action="" method="post" enctype=multipart/form-data>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="car_id">Car to be inspected</label>
                    <input disabled type="text" class="form-control" value="<?php echo "$car_id: $car_make $car_model"; ?>">
                    <input type="hidden" name="car_id" id="car_id" value="<?php echo $car_id; ?>">
                  </div>
                  <div class="col-sm-6">
                    <label for="inspection_type_id">Inspection Type</label>
                    <input disabled type="text" name="inspection_type_id" id="inspection_type_id" class="form-control" value="<?php echo $inspection_type_name; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="inspection_start_date">Inspection start date</label>
                    <input type="datetime-local" name="inspection_start_date" id="inspection_start_date" class="form-control" value="<?php echo $inspection_start_date; ?>">
                  </div>
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="inspection_end_date">Inspection end date</label>
                    <input type="datetime-local" name="inspection_end_date" id="inspection_end_date" class="form-control" value="<?php echo $inspection_end_date; ?>">
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
                      <option value='NULL' <?php if(empty($inspection_score)) {echo ' selected="selected"';} ?>>N/A</option>
                      <option value='1' <?php if($inspection_score == '1') {echo ' selected="selected"';} ?>>1</option>
                      <option value='2' <?php if($inspection_score == '2') {echo ' selected="selected"';} ?>>2</option>
                      <option value='3' <?php if($inspection_score == '3') {echo ' selected="selected"';} ?>>3</option>
                      <option value='4' <?php if($inspection_score == '4') {echo ' selected="selected"';} ?>>4</option>
                      <option value='5' <?php if($inspection_score == '5') {echo ' selected="selected"';} ?>>5</option>
                    </select>
                  </div>
                </div>
                <hr>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <button type="submit" class="btn btn-primary btn-user btn-block" name="update_inspection">
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