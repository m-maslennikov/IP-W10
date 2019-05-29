<?php $current = 'inspections';
include "includes/_admin-header.php"; ?>
<?php 
if (!isAdmin()) {redirect("index.php");}
if (isset($_GET['action'])) {
    $action = $_GET['action'];
  } else {$action = "";}
  
switch ($action) {
    case 'add':
        include "includes/add-inspection.php";
        break;
    case 'edit':
        include "includes/todo.php";
        break;
    case 'view':
        include "includes/todo.php";
        break;
    default:
        include "includes/view-all-inspections.php";
        break;
} ?>
<?php include "includes/_admin-footer.php"; ?>
