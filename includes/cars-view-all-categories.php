<?php
$query = "SELECT * FROM categories";
$select_all_categories_query = mysqli_query($connection, $query);
validateQuery($select_all_categories_query);
while($row = mysqli_fetch_assoc($select_all_categories_query)) {
    $category_id = $row['category_id'];
    $category_name = $row['category_name'];
    $category_description = $row['category_description'];
    $category_daily_price = $row['category_daily_price'];
    echo "<div class='row'>";
        echo "<div class='col-md-7'>";
            echo "<a href='cars.php?action=view_category&category_id=$category_id'>";
                echo "<img class='img-fluid rounded mb-3 mb-md-0' src='http://placehold.it/700x300' alt=''>";
            echo "</a>";
        echo "</div>";
        echo "<div class='col-md-5'>";
            echo "<h3>$category_name</h3>";
            echo "<p>$category_description</p>";
            echo "<a class='btn btn-primary' href='cars.php?action=view_category&category_id=$category_id'>View More<span class='glyphicon glyphicon-chevron-right'></span></a>";
        echo "</div>";
    echo "</div>";
    echo "<hr>";
}
?>

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