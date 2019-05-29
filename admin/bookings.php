<?php $current = 'bookings';
include "includes/_admin-header.php"; ?>
<?php 

if (isset($_GET['action'])) {
    $action = $_GET['action'];
  } else {$action = "";}
  
switch ($action) {
    case 'add':
        include "includes/add-booking.php";
        break;
    case 'edit':
        include "includes/edit-booking.php";
        break;
    default:
        include "includes/view-all-bookings.php";
        break;
} ?>
<?php include "includes/_admin-footer.php"; ?>
