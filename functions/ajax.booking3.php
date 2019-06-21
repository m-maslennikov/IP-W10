<?php
include("db.php");
ob_start();

// Torn on Session Control for all pages.
session_start();

// AJAX backend: calculate price and return result to the AJAX frontend javascript.
if (isset($_POST['calculate_discount'])) {
    $err=0;
    if(isset($_POST['promocode']) && $_POST['promocode'] != ""){
        $promocode=$_POST['promocode'];
        $query = "SELECT * FROM promocodes WHERE promocode_text='$promocode'";
        $result = query($query);
        if(rowcount($result) ==1){
            $row = fetchArray($result);
            $promocode_expired = $row['promocode_expired'];
            $promocode_id = $row['promocode_id'];
            if ($promocode_expired != true){
                $promocode_discount = $row['promocode_discount'];
                $current_price = $_SESSION['category_estimated_price_input'];
                $new_price = $current_price*$promocode_discount;
                $_SESSION['new_price'] = $new_price;
                $_SESSION['promocode_used'] = $promocode_id;
            } else {
                $err=1;
            }
        } else {
            $err=2;
        }
    } else {
        $err=3;
    }

    if($err>0){
        $response = array("err"=>$err);
        header("Content-Type: application/json");
        echo json_encode($response);
    } else {
        $response = array("err"=>$err,
        "new_price"=>$new_price);
        header("Content-Type: application/json");
        echo json_encode($response);
    } 
    exit();
} // EOF
?>


[1,2,3,4] false sum=8
true or false

[1.2.4.4] = true