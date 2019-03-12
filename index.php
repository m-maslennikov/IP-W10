<?php include "includes/head-start.php"; ?>
  <title>Modern Business - Start Bootstrap Template</title>
<?php include "includes/head-end.php"; ?>

  <!-- Navigation -->
  <?php include "includes/navigation.php"; ?>
  
  <header>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <!-- Slide One - Set the background image for this slide in the line below -->
        <div class="carousel-item active" style="background-image: url('images/cars2.png')">
          <div class="carousel-caption d-none d-md-block">
            <h3 class="text-dark">We have different cars available</h3>
            <a href="cars.php" class="btn btn-outline-dark btn-lg" role="button" aria-pressed="true">View more</a>
          </div>
        </div>
        <!-- Slide Two - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('http://placehold.it/1920x1080')">
          <div class="carousel-caption d-none d-md-block">
            <h3>Try our Premium cars</h3>
            <a href="cars.php?action=view_category&category_id=2" class="btn btn-outline-dark btn-lg" role="button" aria-pressed="true">View more</a>
          </div>
        </div>
        <!-- Slide Three - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('http://placehold.it/1920x1080')">
          <div class="carousel-caption d-none d-md-block">
            <h3>Sport</h3>
            <a href="#" class="btn btn-outline-dark btn-lg" role="button" aria-pressed="true">View more</a>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </header>

  <!-- Page Content -->
  <!-- /.container -->

  <!-- Footer -->
  <?php include "includes/footer.php"; ?>
  
<?php include "includes/body-end.php"; ?>