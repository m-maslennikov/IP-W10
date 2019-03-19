    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">

      <li class="nav-item"> <!--Dashboard-->
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="nav-item dropdown"> <!--Cars Menu-->
        <a class="nav-link dropdown-toggle" href="" id="carsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-car"></i>
          <span>Cars</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="carsDropdown">
          <h6 class="dropdown-header">Actions:</h6>
          <a class="dropdown-item" href="cars.php?action=add">Add a car</a>
          <a class="dropdown-item" href="cars.php">View all cars</a>
        </div>
      </li>
      <?php if(isAdmin()) : ?>
      <li class="nav-item dropdown"> <!--Accounts Menu-->
        <a class="nav-link dropdown-toggle" href="#" id="accountsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="far fa-address-book"></i>
          <span>Accounts</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="accountsDropdown">
          <h6 class="dropdown-header">Actions:</h6>
          <a class="dropdown-item" href="accounts.php?action=add">Add an account</a>
          <a class="dropdown-item" href="accounts.php">View all accounts</a>
        </div>
      </li>
      <?php endif ?>

      <li class="nav-item"> <!--Bookings-->
        <a class="nav-link" href="bookings.php">
          <i class="far fa-calendar-alt"></i>
          <span>Bookings</span>
        </a>
      </li>

      <li class="nav-item"> <!--Categories-->
        <a class="nav-link" href="categories.php">
          <i class="fas fa-bars"></i>
          <span>Categories</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="tables.html">
          <i class="far fa-comment"></i>
          <span>Feedbacks</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="../index.php">
          <i class="fas fa-home"></i>
          <span>Website</span>
        </a>
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pages</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Login Screens:</h6>
          <a class="dropdown-item" href="../user/login.php">Login</a>
          <a class="dropdown-item" href="../user/register.php">Register</a>
          <a class="dropdown-item" href="../user/forgot-password.php">Forgot Password</a>
          <div class="dropdown-divider"></div>
          <h6 class="dropdown-header">Other Pages:</h6>
          <a class="dropdown-item" href="404.html">404 Page</a>
          <a class="dropdown-item active" href="blank.html">Blank Page</a>
        </div>
      </li>
      
    </ul>
