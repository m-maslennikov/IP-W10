<?php include "includes/admin-head-start.php"; ?>
    <title>Posts - Administration</title>
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
                                <a href="index.php">Posts</a>
                            </li>
                            <!--<li class="breadcrumb-item">Blank Page</li>-->
                        </ol>
                    </div><!-- /.col-lg-12 -->
                    <!-- Page Content -->
                    <div class="col-lg-12">
                        <h1>All Posts</h1>
                        <hr>
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <?php 
                            if (isset($_GET['source'])) {
                                $source = $_GET['source'];
                            } else {
                                $source = "";
                            }
                            switch ($source) {
                                case 'add_post':
                                    include "includes/add-post.php";
                                    break;
                                case 'edit_post':
                                    include "includes/edit-post.php";
                                    break;
                                default:
                                    include "includes/view-all-posts.php";
                                    break;
                            }
                        ?>
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            <?php include "includes/admin-footer.php" ?>
        </div><!-- /.content-wrapper -->
    </div><!-- /#wrapper -->
    <?php include "includes/admin-logout-modal.php" ?>
<?php include "includes/admin-body-end.php" ?>