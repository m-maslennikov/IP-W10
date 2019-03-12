<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
    <a class="navbar-brand" href="index.php">Rent-a-Car</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
        <li class="nav-item"><a class="nav-link" href="cars.php">Vehicles</a></li>
        <li class="nav-item"><a class="nav-link" href="user/login.php">Login</a></li>
        <li class="nav-item"><a class="nav-link" href="user/register.php">Register</a></li>
      </ul>
      <ul class="nav navbar-nav">
      <?php  if (isset($_SESSION['account_email'])) : ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownUsername" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php echo $_SESSION['account_email']; ?>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
          <a class="dropdown-item" href="admin/profile.php">My Profile</a>
          <a class="dropdown-item" href="user/logout.php">Logout</a>
        </div>
      </li>
      <?php endif ?>
      <?php  if (!isset($_SESSION['account_email'])) : ?>
      <li class="nav-item"><a class="nav-link" href="user/login.php">Login</a></li>
      <li class="nav-item"><a class="nav-link" href="user/register.php">Register</a></li>
      <?php endif ?>
    </ul>
  </div>
</div>
</nav>
