<?php
// General functions that will be used by almost all php pages in the project


// Turn on Output buffering for all pages. It's needed for redirections work properly.
ob_start();

// Torn on Session Control for all pages.
session_start();

// Include DB connection for all pages.
include("db.php");

// Include common functions for all pages.
include("functions.php");

// login user using cookie
if(!loggedIn()){
    if(isset($_COOKIE['member_login'])){
        $account_rme_cookie = $_COOKIE['member_login'];
        $query = "SELECT account_email, account_type, account_id FROM accounts WHERE account_rme_cookie = '$account_rme_cookie'";
        $result = query($query);
        if(rowCount($result) == 1) {
            $row = fetchArray($result);
            $_SESSION['account_id'] = $row['account_id'];
            $_SESSION['account_email'] = $row['account_email'];
            $_SESSION['account_type'] = $row['account_type'];
        }
    }
}

?>