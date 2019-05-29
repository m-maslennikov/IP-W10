<?php $current = 'cars';
include "includes/_admin-header.php"; ?>
<?php 

if (isset($_GET['action'])) {
    $action = $_GET['action'];
  } else {$action = "";}
  
switch ($action) {
    case 'add':
        include "includes/add-car.php";
        break;
    case 'edit':
        include "includes/edit-car.php";
        break;
    default:
        include "includes/view-all-cars.php";
        break;
} ?>
<?php include "includes/_admin-footer.php"; ?>
