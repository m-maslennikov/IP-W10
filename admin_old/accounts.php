<?php include "includes/_admin-head.php"; ?>

<?php 
if(!isAdmin()) {
    redirect("index.php");
}  
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    <a href="accounts.php">Accounts</a>
                </li>
                <!--<li class="breadcrumb-item">Blank Page</li>-->
            </ol>
        </div><!-- /.col-lg-12 -->
        <!-- Page Content -->
        <div class="col-lg-12">
            <h1>All Accounts</h1>
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
                        include "includes/add-account.php";
                        break;
                    case 'edit':
                        include "includes/edit-account.php";
                        break;
                    default:
                        include "includes/view-all-accounts.php";
                        break;
                }
            ?>
        </div><!-- /.col-lg-12 -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->
<?php include "includes/_admin-body-end.php" ?>