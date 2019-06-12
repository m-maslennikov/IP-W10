<?php include "includes/_head.php"; ?>

  <!-- Navigation -->
  <?php include "includes/_navbar.php"; ?>
  <?php displaySessionMessage(); ?>
  <header>
    <div class="container-fluid">
      <div class="row ctn-background">
          <?php include "includes/cards.php"; ?>
      </div>
    </div>
  </header>

  <!-- Page Content -->
  <!-- /.container -->

<?php 
// Include all common scripts and close BODY tag.
include "includes/_body-end.php"; 
?>

<!--<option id="Budget" class="catpopup" value="Budget">Budget</option>
                    <option id="Premium" value="Premium">Premium</option>
                    <option id="Sport" value="Sport">Sport</option>
                    <option id="Luxury" value="Luxury">Luxury</option>-->