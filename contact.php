<?php include "includes/_head.php"; ?>

  <!-- Navigation -->
  <?php include "includes/_navbar.php"; ?>
  <!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">Contact</h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php">Home</a>
      </li>
      <li class="breadcrumb-item active">Contact</li>
    </ol>

    <!-- Content Row -->
    <div class="row">
      <!-- Map Column -->
      <div class="col-lg-8 mb-4">
        <!-- Embedded Google Map -->
        <div id="id_google-map"></div>
      </div>
      <!-- Contact Details Column -->
      <div class="col-lg-4 mb-4">
        <h3>Contact Details</h3>
        <p>20 Hobson St,
          <br>Auckland, New Zealand.
          <br>
        </p>
        <p><abbr title="Phone">P</abbr>: +64 20 4174 1260</p>
        <p><abbr title="Email">E</abbr>:<a href="mailto:m.maslennikov@outlook.com"> m.maslennikov@outlook.com</a></p>
        <p><abbr title="Business Hours">H</abbr>: Monday - Friday: 9:00 AM to 5:00 PM</p>
      </div>
    </div>
    <!-- /.row -->

    <!-- Contact Form -->
    <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
    <div class="row">
      <div class="col-lg-8 mb-4">
      <?php if(loggedIn()) : ?>
        <h3>Send us a Feedback</h3>
        <form action="" method="post">
        <div><?php sendFeedback(); ?></div><!-- For success/fail messages -->
        <div class="form-group">
              <label>Subject:</label>
              <input type="text" name="feedback_subject" class="form-control" id="feedback_subject" required>
          </div>
          <div class="form-group">
              <label>Message:</label>
              <textarea name="feedback_text" rows="10" cols="100" class="form-control" id="feedback_text" maxlength="999" style="resize:none" required></textarea>
          </div>
          
          <button type="submit" class="btn btn-primary" id="send_feedback" name="send_feedback">Send Message</button>
        </form>
        <?php else : ?>
        <h3>Please log in to send a feedback</h3>
        <?php endif ?>
      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Google Map-->
  <script src="js/googleMap.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA2vEBgLA6uUDcbWDj01hEh4r52cVBg3-M&amp;callback=myMap"></script>

<?php 
// Include all common scripts and close BODY tag.
include "includes/_body-end.php"; 
?>