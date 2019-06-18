<?php
include("db.php");

// AJAX backend: calculate price and return result to the AJAX frontend javascript.
if (isset($_POST['show_estimated_price'])) {
    $err=0;
    if(isset($_POST['car_id'])){
        $car_id=$_POST['car_id'];
    } else {
        $err++;
    }

    if($err>0){
        $response = array("err"=>$err);
        header("Content-Type: application/json");
        echo json_encode($response);

    } else {

        $query = "SELECT * FROM cars WHERE car_id=$car_id";
        $result = query($query);
        $row = fetchArray($result);
        
        $car_make = $row['car_make'];
        $car_model = $row['car_model'];
        $car_image = $row['car_image'];
        $car_doors = $row['car_doors'];
        $car_seats = $row['car_seats'];
        $car_colour = $row['car_colour'];

        $response = array("err"=>$err,
                        "car_make"=>$car_make,
                        "car_model"=>$car_model,
                        "car_image"=>$car_image,
                        "car_doors"=>$car_doors,
                        "car_seats"=>$car_seats,
                        "car_colour"=>$car_colour);

        header("Content-Type: application/json");
        echo json_encode($response);

    }
    exit();
} // EOF
?>