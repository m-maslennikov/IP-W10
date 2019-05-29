<?php deleteFeedback(); ?>
<?php enableFeedback(); ?>
<?php resolveFeedback(); ?>
<?php bulkFeedbackAction(); ?>

<form action="" method="post">
    <div class="row justify-content-start">
        <div class="col-lg-4">
            <div class="form-group">
                <select class="form-control" name="bulk_action">
                    <option value="">Select Options</option>
                    <option value="enable">Make New</option>
                    <option value="resolved">Make Resolved</option>
                    <option value="delete">Delete</option>
                </select>
            </div>
            <div class="form-group">
                <a class="btn btn-primary" href="feedbacks.php?list=new" role="button">View New</a>
                <a class="btn btn-primary" href="feedbacks.php?list=resolved" role="button">View Resolved</a>
                <a class="btn btn-primary" href="feedbacks.php" role="button">View All</a>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <input class="btn btn-primary" type="submit" name="" value="Apply">
            </div>
        </div>
        <div class="col-lg-5">
            <small>
                <p>
                    <span class="text-dark px-1"><i class='fas fa-eye'></i></span>- View
                    <span class="text-success px-1"><i class='fas fa-check'></i></span>- Enable
                    <span class="text-warning px-1"><i class='fas fa-ban'></i></span>- Resolve
                    <span class="text-dark px-1"><i class='fas fa-pencil-alt'></i></span>- Edit
                    <span class="text-danger px-1"><i class='fas fa-trash'></i></span>- Delete
                </p>
            </small>
        </div>
    </div>
    <div class="row justify-content-start">
        <div class="col">
        
        <?php //show tables by status
                if (isset($_GET['list'])) {
                    $list = $_GET['list'];
                } else {
                    $list = "";
                }
                switch ($list) {
                    case 'new':
                        include "includes/new-feedbacks-table.php";
                        break;
                    case 'resolved':
                        include "includes/resolved-feedbacks-table.php";
                        break;
                    default:
                        include "includes/all-feedbacks-table.php";
                        break;
                }
            ?>


            
        </div>
    </div>
</form>