<?php
include("db.php");
// AJAX check if email already registered
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