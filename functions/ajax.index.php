<?php
include("db.php");

// AJAX backend: calculate price and return result to the AJAX frontend javascript.
if (isset($_POST['show_estimated_price'])) {
    $err=0;
    if(isset($_POST['booking_booked_start_date']) && $_POST['booking_booked_start_date'] != ""){
        $booking_booked_start_date = strtotime($_POST['booking_booked_start_date']);
    } else {
        $err++;
    }
    if(isset($_POST['booking_booked_end_date']) && $_POST['booking_booked_end_date'] != ""){
        $booking_booked_end_date = strtotime($_POST['booking_booked_end_date']);
    } else {
        $err++;
    }
    if(isset($_POST['category_id']) && $_POST['category_id'] != ""){
        $category_id = $_POST['category_id'];
    } else {
        $err++;
    }
    if($err>0){
        $response = array("err"=>$err);
        header("Content-Type: application/json");
        echo json_encode($response);
    } else {
        $query = "SELECT * FROM categories WHERE category_id=$category_id";
        $result = query($query);
        $row = fetchArray($result);
        $category_daily_price = $row['category_daily_price'];
        $category_image = $row['category_image'];
        $category_name = $row['category_name'];
        $category_description = $row['category_description'];
        $days = ceil(abs($booking_booked_end_date - $booking_booked_start_date) / 86400);
        $estimated_price = $category_daily_price * $days;
        $response = array("err"=>$err,
                        "category_name"=>$category_name,
                        "category_image"=>$category_image,
                        "category_description"=>$category_description,
                        "estimated_price"=>$estimated_price,
                        "days"=>$days);
        header("Content-Type: application/json");
        echo json_encode($response);
    }
    exit();
} // EOF
?>