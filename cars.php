<?php include "includes/_head.php"; ?>
<!-- Navigation -->
<?php include "includes/_navbar.php"; ?>

<!-- Page Content -->
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">Our Cars</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active">Categories</li>
    </ol>

    <!-- Categories list / Catrgory Cars / Individual Car -->
    <?php 
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
    } else {
        $action = "";
    }
    switch ($action) {
        case 'view_category':
        include "includes/cars-view-category.php";
        break;
        
        case 'view_car':
        include "includes/cars-view-car.php";
        break;
        
        default:
        include "includes/cars-view-all-categories.php";
        break;
    }
    ?>

</div>
<!-- /.container -->

  <!-- Footer -->
  <footer class="py-4 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright © Rent-a-Car Aspire2 LLC, 2019</p>
    </div>
  </footer>
  <!-- Bootstrap core JavaScript -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
  <script>
    var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
    $('#booking_booked_start_date').datepicker({
        uiLibrary: 'bootstrap4',
        format: 'yyyy-mm-dd',
        weekStartDay: 1,
        iconsLibrary: 'fontawesome',
        minDate: today,
        maxDate: function () {
            return $('#booking_booked_end_date').val();
        }  
    });

    $('#booking_booked_end_date').datepicker({
        uiLibrary: 'bootstrap4',
        format: 'yyyy-mm-dd',
        weekStartDay: 1,
        iconsLibrary: 'fontawesome',
        minDate: function () {
            return $('#booking_booked_start_date').val();
        }
    });
  </script>
</body>

</html>