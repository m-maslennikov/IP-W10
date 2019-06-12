<?php include "includes/_head.php"; 
 
$query = "SELECT * FROM categories";
$result = query($query);
?>

  <!-- Navigation -->
  <?php include "includes/_navbar.php"; ?>
  <?php displaySessionMessage(); ?>
  <header>
    <div class="container-fluid">
      <div class="row ctn-background">
        <div class="col-lg align-self-center">
          <div class="card">
            <?php 
              if (isset($_GET['action'])) {
                $action = $_GET['action'];
              } else {
                $action = "";
              }
              
              switch ($action) {
                case 'select_car':
                include "includes/select-car.php";
                break;
                
                case 'view_payment':
                include "includes/payment-step.php";
                break;
                
                default:
                include "includes/select-category.php";
                break;
              }
            ?>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Page Content -->
  <!-- /.container -->

<?php 
// Include all common scripts and close BODY tag.
include "includes/_body-end.php"; 
?>