<?php
// Turn on Output buffering for all pages. It's needed for redirections work properly.
ob_start();

// Torn on Session Control for all pages.
session_start();

// Include DB connection for all pages.
include("db.php");

// Include common functions for all pages.
include("functions.php");
?>