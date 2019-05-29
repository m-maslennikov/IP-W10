<?php $current = 'accounts';
include "includes/_admin-header.php"; ?>
<?php 
if (!isAdmin()) {redirect("index.php");}

if (isset($_GET['action'])) {
    $action = $_GET['action'];
  } else {$action = "";}
  
switch ($action) {
    case 'add':
        include "includes/add-account.php";
        break;
    case 'edit':
        include "includes/edit-account.php";
        break;
    default:
        include "includes/view-all-accounts.php";
        break;
} ?>
<?php include "includes/_admin-footer.php"; ?>
