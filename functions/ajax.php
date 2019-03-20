<?php
include("db.php");

// AJAX backend: check if email already registered and return result to the AJAX frontend javascript.
if (isset($_POST['email_check'])) {
    $email = $_POST['email'];
    $query = "SELECT account_email FROM accounts WHERE account_email='$email'";
    $result = query($query);
    if (rowCount($result) > 0) {
        echo "taken";
    } else {
        echo "not_taken";
    }
    exit();
} // EOF
?>