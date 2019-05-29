<?php deleteAccount(); ?>
<?php enableAccount(); ?>
<?php disableAccount(); ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Accounts</h1>
          <p class="mb-4">Some useful info or alerts.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><!--Placeholder for some info--></h6>
              <a href="accounts.php?action=add" class="btn btn-primary btn-user">Add Account</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th><input type="checkbox" name="bulk_option" id="selectAllBoxes"></th>
                      <th>ID</th>
                      <th>Email</th>
                      <th>Full Name</th>
                      <th>Status</th>
                      <th>Type</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th></th>
                      <th>ID</th>
                      <th>Email</th>
                      <th>Full Name</th>
                      <th>Status</th>
                      <th>Type</th>
                      <th>Actions</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                    $query = 'SELECT * FROM accounts';
                    $result = query($query);
                    while($row = fetchArray($result)) {
                      $account_id = $row['account_id'];
                      $account_type = $row['account_type'];
                      $account_status = $row['account_status'];
                      $account_email = $row['account_email'];
                      $account_first_name = $row['account_first_name'];
                      $account_last_name = $row['account_last_name'];
                    ?>
                    <tr>
                      <td><input class="checkboxes" type="checkbox" name="carsCheckboxArray[]" value="<?php echo $account_id; ?>" id="selectAllBoxes"></td>
                      <td><?php echo $account_id; ?></td>
                      <td><?php echo $account_email; ?></td>
                      <td><?php echo "$account_first_name $account_last_name"; ?></td>
                      <td class="text-capitalize"><?php echo $account_status; ?></td>
                      <td class="text-capitalize"><?php echo $account_type; ?></td>
                      <td>
                        <a href="accounts.php?enable=<?php echo $account_id; ?>" class="text-success px-1"><i class="fas fa-check"></i></a>
                        <a href="accounts.php?disable=<?php echo $account_id; ?>" class="text-warning px-1"><i class="fas fa-ban"></i></a>
                        <a href="accounts.php?action=edit&account_id=<?php echo $account_id; ?>" class="text-dark px-1"><i class="fas fa-pencil-alt"></i></a>
                        <a href="javascript:void(0);" rel="<?php echo $account_id; ?>" class="text-danger px-1 delete-link"><i class="fas fa-trash"></i></a>
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