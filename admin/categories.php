<?php include "includes/admin-head-start.php"; ?>
    <title>Categories</title>
<?php include "includes/admin-head-end.php"; ?>
<?php include "includes/admin-navbar.php" ?>
    <div id="wrapper">
        <?php include "includes/admin-sidebar.php" ?>
        <div id="content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Breadcrumbs-->
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active">
                                <a href="categories.php">Categories</a>
                            </li>
                            <!--<li class="breadcrumb-item">Blank Page</li>-->
                        </ol>
                    </div><!-- /.col-lg-12 -->
                    <!-- Page Content -->
                    <div class="col-lg-12">
                        <h1>Categories</h1>
                        <hr>
                    </div><!-- /.col-lg-12 -->
                    <div class="col-lg-6">
                        <?php insertCategories(); ?>
                        <?php
                            if(!isset($_GET['edit'])) {
                                include "includes/add-categories.php";
                                }
                        ?>
                        <?php
                            if(isset($_GET['edit'])) {
                                $cat_id = $_GET['edit'];
                                include "includes/update-categories.php";
                                }
                        ?>
                    </div><!-- /.col-lg-6 -->
                    <div class="col-lg-6">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Category Title</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php findAllCategories(); ?>
                                <?php deleteCategories(); ?>
                            </tbody>
                        </table>
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            <?php include "includes/admin-footer.php" ?>
        </div><!-- /.content-wrapper -->
    </div><!-- /#wrapper -->
    <?php include "includes/admin-logout-modal.php" ?>
<?php include "includes/admin-body-end.php" ?>