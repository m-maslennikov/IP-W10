<?php include "includes/_head.php"; ?>
<!-- Navigation -->
<?php include "includes/_navbar.php"; ?>

<!-- Page Content -->
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">Car categories</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active">Categories</li>
    </ol>

    <!-- Categories list / Catrgory Cars / Individual Car -->
    <?php 
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
    } else {
        $action = "";
    }
    switch ($action) {
        case 'view_category':
        include "includes/cars-view-category.php";
        break;
        
        case 'view_car':
        include "includes/cars-view-car.php";
        break;
        
        default:
        include "includes/cars-view-all-categories.php";
        break;
    }
    ?>

</div>
<!-- /.container -->

<?php 
// Include footer and all common scripts and close BODY tag.
include "includes/_body-end.php"; 
?>
