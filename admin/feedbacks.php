<?php $current = 'feedbacks';
include "includes/_admin-header.php"; ?>
<?php 
if (!isAdmin()) {redirect("index.php");}
if (isset($_GET['action'])) {
    $action = $_GET['action'];
  } else {$action = "";}
  
switch ($action) {
    case 'add':
        include "includes/todo.php";
        break;
    case 'edit':
        include "includes/todo.php";
        break;
    case 'view':
        include "includes/view-feedback.php";
        break;
    default:
        include "includes/view-all-feedbacks.php";
        break;
} ?>
<?php include "includes/_admin-footer.php"; ?>
