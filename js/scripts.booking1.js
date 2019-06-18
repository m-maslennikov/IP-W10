function calculateEstimatedPrice(){
    //some code
    var booking_booked_start_date = $('#booking_booked_start_date').val();
    var booking_booked_end_date = $('#booking_booked_end_date').val();
    var category_id = $('#category_id').val();
    $.ajax({
        url: 'functions/ajax.index.php',
        dataType: "JSON",
        type: 'post',
        data: {
            'show_estimated_price' : 1,
            'booking_booked_start_date' : booking_booked_start_date,
            'booking_booked_end_date' : booking_booked_end_date,
            'category_id' : category_id
        },
        success: function(response){
            if (response.err > 0) {
                console.log(response.err);
            } else {
                console.log(response.category_name);
                console.log(response.category_image);
                console.log(response.category_description);
                console.log(response.estimated_price);
                $('#category_image').attr("src","images/cars/"+response.category_image);
                $('#category_name').text(response.category_name);
                $('#category_description').text(response.category_description);
                $('#days').text("for "+response.days+" days");
                $('#category_estimated_price').text("$"+response.estimated_price);
                $('#category_estimated_price_input').val(response.estimated_price);
                $('#category_popup').attr("hidden",false);
            }
        }
    });
}



// For Datepicker
var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
$('#booking_booked_start_date').datepicker({
    uiLibrary: 'bootstrap4',
    format: 'yyyy-mm-dd',

    weekStartDay: 1,
    iconsLibrary: 'fontawesome',
    minDate: today,
    maxDate: function () {
        return $('#booking_booked_end_date').val();
    },
    close: function (e) {
        calculateEstimatedPrice();
    }    
});

$('#booking_booked_end_date').datepicker({
    uiLibrary: 'bootstrap4',
    format: 'yyyy-mm-dd',

    weekStartDay: 1,
    iconsLibrary: 'fontawesome',
    minDate: function () {
        return $('#booking_booked_start_date').val();
    },
    close: function (e) {
        calculateEstimatedPrice();
    }
});

$("#category_id").change(function() {
    calculateEstimatedPrice();
});

$(document).ready(calculateEstimatedPrice());

// ----------------------------------------------------------