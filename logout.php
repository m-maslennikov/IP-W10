<?php
include("functions.php");
session_start();
if(isset($_COOKIE['member_login'])){
    unset($_COOKIE['member_login']);
    setcookie('member_login', '', time() - (30 * 24 * 60 * 60));
    $account_email = $_SESSION['account_email'];
    $query = "UPDATE accounts SET account_rme_cookie = NULL WHERE account_email = '$account_email'";
    query($query);
}
session_destroy();
header("Location: login.php");
?>
