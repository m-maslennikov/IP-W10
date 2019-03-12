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
                                <a href="index.php">Dashboard</a>
                            </li>
                            <!--<li class="breadcrumb-item">Blank Page</li>-->
                        </ol>
                    </div><!-- /.col-lg-12 -->
                    <!-- Page Content -->
                    <div class="col-lg-12">
                        <h1>Dashboard</h1><small><?php echo $_SESSION['account_email']; ?></small>
                        <hr>
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
                <?php include "includes/_admin-widgets.php" ?>
            </div><!-- /.container-fluid -->
            <?php include "includes/_admin-footer.php" ?>
        </div><!-- /.content-wrapper -->
    </div><!-- /#wrapper -->
    <?php include "includes/_admin-logout-modal.php" ?>
<?php include "includes/_admin-body-end.php" ?>