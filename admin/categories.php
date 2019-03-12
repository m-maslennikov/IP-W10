<?php include "includes/_admin-head.php"; ?>
<?php include "includes/_admin-navbar.php" ?>
    <div id="wrapper">
        <?php include "includes/_admin-sidebar.php" ?>
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
                    <div class="col-lg-8">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Daily Price</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php displayAllCategories(); ?>
                            </tbody>
                        </table>
                    </div><!-- /.col-lg-8 -->
                    <div class="col-lg-4">
                        <?php
                        if(!isset($_GET['edit'])) {
                            include "includes/add-categories.php";
                        }
                        ?>

                        <?php
                        if(isset($_GET['edit'])) {
                            $cat_id = $_GET['edit'];
                            include "includes/edit-categories.php";
                        }
                        ?>
                        
                        <?php deleteCategory(); ?>
                        <?php insertCategory(); ?>
                    </div><!-- /.col-lg-4 -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            <?php include "includes/_admin-footer.php" ?>
        </div><!-- /.content-wrapper -->
    </div><!-- /#wrapper -->
    <?php include "includes/_admin-logout-modal.php" ?>
<?php include "includes/_admin-body-end.php" ?>