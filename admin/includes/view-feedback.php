<?php
if(isset($_GET['feedback_id'])) {
  $feedback_id = $_GET['feedback_id'];
  $query = "SELECT a.account_email
                  , f.feedback_status
                  , f.feedback_subject
                  , f.feedback_text
            FROM feedbacks AS f
            INNER JOIN accounts AS a ON f.account_id=a.account_id
            WHERE feedback_id = $feedback_id";
  $result = query($query);
  while($row = fetchArray($result)) {
    $account_email = $row['account_email'];
    $feedback_status = $row['feedback_status'];
    $feedback_subject = $row['feedback_subject'];
    $feedback_text = $row['feedback_text'];
  }
}

if(isset($_POST['feedback_reply'])) {
  $subject = "RE: $feedback_subject";
  $message = "Thank you for your feedback. " . $_POST['feedback_reply_text'] . "";
  sendMail($account_email, $account_email, $subject, $message);
  $query = "UPDATE feedbacks SET feedback_status = 'Resolved' WHERE feedback_id = $feedback_id";
  query($query);
  displaySuccessAlert("Message has been sent to the customer. Status changed to Resolved");
}
?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Feedback details</h1>
          <p class="mb-4">Some useful info or alerts.</p>

          <!-- Feedback details Card  -->
          <div class="card <?php if($feedback_status == 'New') {echo ' border-left-warning';}
                                 if($feedback_status == 'Resolved') {echo ' border-left-success';} ?> shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><?php echo "ID: $feedback_id"; ?></h6>
            </div>
            <div class="card-body">
              <p><?php echo $account_email; ?> wrote the following:</p>
              <br>
              <p>Subject: <?php echo $feedback_subject; ?></p>
              <p>Message text: <?php echo $feedback_text; ?></p>
            </div>
          </div>

          <!-- Reply Card  -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Response message to <?php echo $account_email; ?></h6>
            </div>
            <div class="card-body">
              <form class="user" action="" method="post" enctype=multipart/form-data>
                <div class="form-group">
                  <textarea name="feedback_reply_text" id="feedback_reply" class="form-control" rows="10" cols="30"></textarea>
                </div>
                <hr>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <button type="submit" class="btn btn-primary btn-user btn-block" name="feedback_reply">
                      <i class="fas fa-paper-plane fa-fw"></i> Send message
                    </button>
                  </div>
                  <div class="col-sm-6">
                    <button type="reset" class="btn btn-danger btn-user btn-block">
                      <i class="fas fa-undo-alt fa-fw"></i> Reset
                    </button>
                  </div>
                </div>
              </form>

            </div>
          </div>

        </div>
        <!-- /.container-fluid -->