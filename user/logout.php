<?php session_start(); ?>
<?php
$_SESSION['account_email'] = null;
$_SESSION['account_type'] = null;
header("Location: login.php");
?>
