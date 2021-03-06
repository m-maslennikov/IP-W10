<?php include "includes/_admin-head.php"; ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    <a href="cars.php">Cars</a>
                </li>
                <!--<li class="breadcrumb-item">Blank Page</li>-->
            </ol>
        </div><!-- /.col-lg-12 -->
        <!-- Page Content -->
        <div class="col-lg-12">
            <h1>All Cars</h1>
            <hr>
        </div><!-- /.col-lg-12 -->
    </div><!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <?php 
                if (isset($_GET['action'])) {
                    $action = $_GET['action'];
                } else {
                    $action = "";
                }
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
                }
            ?>
        </div><!-- /.col-lg-12 -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->
<?php include "includes/_admin-body-end.php" ?>