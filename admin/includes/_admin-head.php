<?php ob_start(); ?>
<?php session_start(); ?>

<?php 
if (isset($_SESSION['account_type'])) {
    $account_type = $_SESSION['account_type'];
    if ($account_type == 'customer' ) {
        header("Location: ../");
    }
}
?>

<?php include "../includes/db-connection.php"; ?>
<?php include "functions.php"; ?>
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

    <!-- Page level plugin CSS-->
    <!--<link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">-->

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin.css" rel="stylesheet">
    <title>Administration</title>

</head>

<body>