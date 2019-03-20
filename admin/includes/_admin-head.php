<?php 
include "../functions/init.php"; 

// This file contains all common HEAD html markup for all admin folder PHP files in this project.
// And Admin app Navbar and Sidebar 
?>

<?php 
// Check for staff or admin. Redirect to root index.php if not staff/admin
if(!isAdmin() && !isStaff()) {
    redirect("../");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Google Charts-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- Custom styles for this template-->
    <link href="../css/sb-admin.css" rel="stylesheet">
    <title>Administration</title>

</head>

<body>

<?php include "includes/_admin-navbar.php"; ?>

<div id="wrapper">

<?php include "includes/_admin-sidebar.php" ?>

<div id="content-wrapper">