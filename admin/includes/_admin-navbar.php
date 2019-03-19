<nav class="navbar navbar-expand navbar-dark bg-dark static-top">
  <a class="navbar-brand mr-1" href="index.php">Admin Panel</a>
  <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
    <i class="fas fa-bars"></i>
  </button>
<!-- Navbar -->
<ul class="navbar-nav  ml-md-auto">
  <li class="nav-item dropdown no-arrow">
    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <?php 
      if(loggedIn()){
        echo $_SESSION['account_email'];
      } else {echo "go log in";}
      ?>
      <i class="fas fa-user-circle fa-fw"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
      <a class="dropdown-item" href="../profile.php">Profile</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="../logout.php">Logout</a>
    </div>
  </li>
</ul>

</nav>