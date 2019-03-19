
    <!-- Car Details Row -->
    <div class="row">
      
      <div class="col-md-8">
        <img class="img-fluid" src="http://placehold.it/750x500" alt="">
      </div>

      <div class="col-md-4">
        <h3 class="my-3">Description</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus. Mauris ultricies, justo eu convallis placerat, felis enim.</p>
        <h3 class="my-3">Details</h3>
        <ul>
          <?php showCar(); ?>
        </ul>
        <?php if(loggedIn()): ?>
        <form action="" method="post">
        <?php bookCar(); ?>
          <div class="form-group">
            <label for="booking_booked_start_date">Start Date</label>
            <input type="date" name="booking_booked_start_date" id="booking_booked_start_date" class="form-control">
          </div>
          <div class="form-group">
            <label for="booking_booked_end_date">End Date</label>
            <input type="date" name="booking_booked_end_date" id="booking_booked_end_date" class="form-control">
          </div>
          <input type="hidden" name="car_id" value="<?php echo clean($_GET['car_id']); ?>">
          <div class="form-group">
            <button type="submit" class="btn btn-primary" name="book">Book</button>
            <button type="reset" class="btn btn-danger">Reset</button>
          </div>
        </form>
        <?php else: ?>
        <a href="login.php" class="btn btn-primary" role="button" aria-pressed="true">Log In to Book</a>
        <?php endif; ?>

      </div>

    </div>
    <!-- /.row -->

    <!-- Simillar Cars Row -->
    <h3 class="my-4">Simillar Cars</h3>

    <div class="row">

      <div class="col-md-3 col-sm-6 mb-4">
        <a href="#">
          <img class="img-fluid" src="http://placehold.it/500x300" alt="">
        </a>
      </div>

      <div class="col-md-3 col-sm-6 mb-4">
        <a href="#">
          <img class="img-fluid" src="http://placehold.it/500x300" alt="">
        </a>
      </div>

      <div class="col-md-3 col-sm-6 mb-4">
        <a href="#">
          <img class="img-fluid" src="http://placehold.it/500x300" alt="">
        </a>
      </div>

      <div class="col-md-3 col-sm-6 mb-4">
        <a href="#">
          <img class="img-fluid" src="http://placehold.it/500x300" alt="">
        </a>
      </div>

    </div>
    <!-- /.row -->
