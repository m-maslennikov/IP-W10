    <div class="row">
        <?php
        if(isset($_GET['category_id'])) {
            $category_id = $_GET['category_id'];
            $query = "SELECT * FROM cars WHERE category_id = $category_id";
            $select_all_cars_from_category_query = mysqli_query($connection, $query);
            validateQuery($select_all_cars_from_category_query);
            while($row = mysqli_fetch_assoc($select_all_cars_from_category_query)) {
                $car_id = $row['car_id'];
                $car_make = $row['car_make'];
                $car_model = $row['car_model'];
                $car_colour = $row['car_colour'];
                $car_status = $row['car_status'];
                $car_body_type = $row['car_body_type'];
                $car_power = $row['car_power'];
                $category_id = $row['category_id'];
                $car_image = $row['car_image'];
                $car_doors = $row['car_doors'];
                $car_seats = $row['car_seats'];

                // Redner All cars in this category
                echo "<div class='col-lg-4 col-sm-6 portfolio-item'>";
                    echo "<div class='card h-100'>";
                        echo "<a href='cars.php?action=view_car&car_id=$car_id'><img class='card-img-top' src='http://placehold.it/700x400' alt=''></a>";
                        echo "<div class='card-body'>";
                            echo "<h4 class='card-title'>";
                                echo "<a href='cars.php?action=view_car&car_id=$car_id' class='text-dark'>$car_make $car_model</a><span class='badge'><i class='fas fa-tag'></i> $category_id</span>";
                            echo "</h4>";
                            echo "<h5>$car_body_type</h5>";
                        echo "</div>";
                        echo "<div class='card-footer'>";
                            echo "<a class='btn btn-outline-dark m-1' href='cars.php?action=view_car&car_id=$car_id'>Book Now</a>";
                            echo "<a class='btn btn-outline-dark m-1' href='cars.php?action=view_car&car_id=$car_id'>View Details</a>";
                        echo "</div>";
                    echo "</div>";
                echo "</div>";
            }
        }
        ?>

      <div class='col-lg-4 col-sm-6 portfolio-item'>
        <div class='card h-100'>
          <a href='cars.php?action=view_car&car_id=$car_id'><img class='card-img-top' src='http://placehold.it/700x400' alt=''></a>
          <div class='card-body'>
            <h4 class='card-title'>
              <a href='cars.php?action=view_car&car_id=$car_id' class='text-dark'>$car_make $car_model</a><span class='badge'><i class='fas fa-tag'></i> $category_id</span>
            </h4>
            <h5>$car_body_type</h5>
          </div>
          <div class='card-footer'>
            <a class='btn btn-outline-dark m-1' href='cars.php?action=view_car&car_id=$car_id'>Book Now</a>
            <a class='btn btn-outline-dark m-1' href='cars.php?action=view_car&car_id=$car_id'>View Details</a>
          </div>
        </div>
      </div>
    
    </div>

    <!-- Pagination -->
    <ul class="pagination justify-content-center">
      <li class="page-item">
        <a class="page-link" href="#" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
          <span class="sr-only">Previous</span>
        </a>
      </li>
      <li class="page-item">
        <a class="page-link" href="#">1</a>
      </li>
      <li class="page-item">
        <a class="page-link" href="#">2</a>
      </li>
      <li class="page-item">
        <a class="page-link" href="#">3</a>
      </li>
      <li class="page-item">
        <a class="page-link" href="#" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
          <span class="sr-only">Next</span>
        </a>
      </li>
    </ul>

  </div>
  <!-- /.container -->
