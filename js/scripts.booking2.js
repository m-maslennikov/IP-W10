function showCarInfo(){
    //some code
    var car_id = $('#car_id').val();
    $.ajax({
        url: 'functions/ajax.booking2.php',
        dataType: "JSON",
        type: 'post',
        data: {
            'show_estimated_price' : 1,
            'car_id' : car_id
        },
        success: function(response){
            
            if (response.err > 0) {
                console.log(response.err);
            } else {
                console.log(response.car_make);
                console.log(response.car_image);
                console.log(response.car_model);
                console.log(response.car_doors);
                console.log(response.car_seats);
                console.log(response.car_colour);

                $('#car_image').attr("src","images/cars/"+response.car_image);
                //$('#car_make_model').text(response.car_make+" "+response.car_model);
                $('#car_doors').text(response.car_doors);
                $('#car_seats').text(response.car_seats);
                $('#car_colour').text(response.car_colour);
                $('#car_popup').attr("hidden",false);
            }
            
        }
    });
}


$("#car_id").change(function() {
    showCarInfo();
});

$(document).ready(showCarInfo());

// ----------------------------------------------------------