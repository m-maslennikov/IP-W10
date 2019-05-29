<?php include "includes/_admin-header.php"; ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Categories</h1>
          <p class="mb-4">Some useful info or alerts.</p>

          <div class="row">
            <div class="col-lg-7">
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
                          <th>Name</th>
                          <th>Daily Price</th>
                          <th>Description</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th></th>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Daily Price</th>
                          <th>Description</th>
                          <th>Actions</th>
                        </tr>
                      </tfoot>
                      <tbody>
                      <?php
                      $query = "SELECT * FROM categories";
                      $result = query($query);
                      while($row = fetchArray($result)) {
                          $category_id = $row['category_id'];
                          $category_name = $row['category_name'];
                          $category_description = $row['category_description'];
                          $category_daily_price = $row['category_daily_price'];
                      ?>
                      <tr>
                        <td><input class="checkboxes" type="checkbox" name="feedbacksCheckboxArray[]" value="<?php echo $category_id; ?>" id="selectAllBoxes"></td>
                        <td><?php echo $category_id; ?></td>
                        <td><?php echo $category_name; ?></td>
                        <td><?php echo $category_daily_price; ?></td>
                        <td><?php echo $category_description; ?></td>
                        <td>
                          <a href='categories.php?edit=<?php echo $category_id; ?>' class='text-dark px-1'><i class='fas fa-pencil-alt'></i></a>
                          <a href='categories.php?delete=<?php echo $category_id; ?>' class='text-danger px-1'><i class='fas fa-trash'></i></a>
                        </td>
                      </tr>
                      <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-5">
              <?php
              if(!isset($_GET['edit'])) {
                  include "includes/add-category.php";
              }
              if(isset($_GET['edit'])) {
                  $cat_id = $_GET['edit'];
                  include "includes/edit-category.php";
              }
              ?>
              
              <?php deleteCategory(); ?>
              <?php insertCategory(); ?>
              
            </div>


          </div>


        </div>
        <!-- /.container-fluid -->

        <?php include "includes/_admin-footer.php"; ?>
