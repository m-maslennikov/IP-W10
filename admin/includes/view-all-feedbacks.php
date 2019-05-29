<?php deleteFeedback(); ?>
<?php enableFeedback(); ?>
<?php resolveFeedback(); ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Feedbacks</h1>
          <p class="mb-4">Some useful info or alerts.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Placeholder for some info</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th><input type="checkbox" name="bulk_option" id="selectAllBoxes"></th>
                      <th>ID</th>
                      <th>Status</th>
                      <th>Account Email</th>
                      <th>Subject</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th></th>
                      <th>ID</th>
                      <th>Status</th>
                      <th>Account Email</th>
                      <th>Subject</th>
                      <th>Actions</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php
                  $query = "SELECT a.account_email
                                  , f.feedback_id
                                  , f.feedback_status
                                  , f.feedback_subject
                                  , f.feedback_text
                            FROM feedbacks AS f
                            INNER JOIN accounts AS a ON f.account_id=a.account_id";
                  $result = query($query);
                  while($row = fetchArray($result)) {
                      $feedback_id = $row['feedback_id'];
                      $account_email = $row['account_email'];
                      $feedback_status = $row['feedback_status'];
                      $feedback_subject = $row['feedback_subject'];
                  ?>
                  <tr>
                    <td><input class="checkboxes" type="checkbox" name="feedbacksCheckboxArray[]" value="<?php echo $feedback_id; ?>" id="selectAllBoxes"></td>
                    <td><?php echo $feedback_id; ?></td>
                    <td><?php echo $feedback_status; ?></td>
                    <td><?php echo $account_email; ?></td>
                    <td><?php echo $feedback_subject; ?></td>
                    <td>
                      <a href='feedbacks.php?action=view&feedback_id=<?php echo $feedback_id; ?>' class='text-dark px-1'><i class='fas fa-eye'></i></a>
                      <a href='feedbacks.php?enable=<?php echo $feedback_id; ?>' class='text-success px-1'><i class='fas fa-check'></i></a>
                      <a href='feedbacks.php?resolve=<?php echo $feedback_id; ?>' class='text-warning px-1'><i class='fas fa-ban'></i></a>
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