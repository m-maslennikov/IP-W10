    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">

      <li class="nav-item"> <!--Dashboard-->
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="nav-item"> <!--Categories-->
        <a class="nav-link" href="categories.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Categories</span>
        </a>
      </li>
      
      <li class="nav-item dropdown"> <!--Cars Menu-->
        <a class="nav-link dropdown-toggle" href="" id="carsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Cars</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="carsDropdown">
          <h6 class="dropdown-header">Actions:</h6>
          <a class="dropdown-item" href="cars.php?action=add">Add Cars</a>
          <a class="dropdown-item" href="cars.php">View All Cars</a>
        </div>
      </li>

      <li class="nav-item dropdown"> <!--Accounts Menu-->
        <a class="nav-link dropdown-toggle" href="#" id="accountsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Accounts</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="accountsDropdown">
          <h6 class="dropdown-header">Actions:</h6>
          <a class="dropdown-item" href="accounts.php?action=add">Add Account</a>
          <a class="dropdown-item" href="accounts.php">View All Accounts</a>
        </div>
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
      <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Charts</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="tables.html">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="profile.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Profile</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Website</span>
        </a>
      </li>
    </ul>
