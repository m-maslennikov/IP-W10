<!-- Icon Cards-->
<!-- This file renders a dashboard for admin/staff -->
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fas fa-fw fa-users"></i>
              </div>
              <div class="mr-5">
                <?php echo entityCount("accounts"); ?> Accounts
              </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="accounts.php">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fas fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fas fa-fw fa-list"></i>
              </div>
              <div class="mr-5">
              <?php echo newFeedbackCount(); ?> New Feedbacks
              </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="cars.php">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fas fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fas fa-fw fa-shopping-cart"></i>
              </div>
              <div class="mr-5">
              <?php echo entityCount("categories"); ?> Categories
              </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="categories.php">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fas fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fas fa-fw fa-life-ring"></i>
              </div>
              <div class="mr-5">
              <?php echo newBookingsCount(); ?> New Bookings              
              </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="bookings.php">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fas fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      </div>

      <!-- Google Chart-->
      <div class="row">
        <script type="text/javascript">
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChart);
        
        function drawChart() {
          var data = google.visualization.arrayToDataTable([
            ['Data', 'Count'],
            <?php
            $element_text = ['Total Accounts','Total Cars','Total Categories','Total Bookings'];
            $element_count = [entityCount("accounts"),entityCount("cars"),entityCount("categories"),entityCount("bookings")];
            for ($i=0; $i < 4; $i++) { 
              echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";
            }
            ?>
          ]);
          
          var options = {
            chart: {
              title: '',
              subtitle: '',
            }
          };
          
          var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
          
          chart.draw(data, google.charts.Bar.convertOptions(options));
        }
        </script>
      </div>
      <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>