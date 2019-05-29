<?php addAccount(); ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Add Account</h1>
          <p class="mb-4">Some useful info or alerts.</p>

          <!-- Basic Card Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">New Account</h6>
            </div>
            <div class="card-body">
              <form class="user" action="" method="post" enctype=multipart/form-data>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="account_email">Email</label>
                    <input type="email" class="form-control" name="account_email" id="account_email">
                  </div>
                  <div class="col-sm-6">
                    <label for="account_password">Password</label>
                    <input type="password" class="form-control" name="account_password" id="account_password">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="account_first_name">First Name</label>
                    <input type="text" class="form-control" name="account_first_name" id="account_first_name">
                  </div>
                  <div class="col-sm-6">
                    <label for="account_last_name">Last Name</label>
                    <input type="text" class="form-control" name="account_last_name" id="account_last_name">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="account_type">Account type</label>
                    <select name="account_type" class="form-control" id="account_type">
                      <option value='customer' selected='selected'>Customer</option>
                      <option value='staff'>Staff</option>
                      <option value='admin'>Admin</option>
                    </select>
                  </div>
                  <div class="col-sm-6">
                    <label for="account_status">Account status</label>
                    <select name="account_status" class="form-control" id="account_status">
                      <option value='enabled' selected='selected'>Enabled</option>
                      <option value='disabled'>Disabled</option>
                    </select>
                  </div>
                </div>
                <hr>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <button type="submit" class="btn btn-primary btn-user btn-block" name="add_account">
                      <i class="fas fa-save fa-fw"></i> Add
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