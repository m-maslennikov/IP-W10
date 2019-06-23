// For Datepicker
//var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
$('#booking_booked_start_date').datepicker({
    uiLibrary: 'bootstrap4',
    format: 'yyyy-mm-dd',
    weekStartDay: 1,
    iconsLibrary: 'fontawesome',
    //minDate: today,
    maxDate: function () {
        return $('#booking_booked_end_date').val();
    }   
});

$('#booking_booked_end_date').datepicker({
    uiLibrary: 'bootstrap4',
    format: 'yyyy-mm-dd',
    weekStartDay: 1,
    iconsLibrary: 'fontawesome',
    minDate: function () {
        return $('#booking_booked_start_date').val();
    }
});

$('#booking_real_start_date').datepicker({
    uiLibrary: 'bootstrap4',
    format: 'yyyy-mm-dd',
    weekStartDay: 1,
    iconsLibrary: 'fontawesome',
    //minDate: today,
    maxDate: function () {
        return $('#booking_real_end_date').val();
    }   
});

$('#booking_real_end_date').datepicker({
    uiLibrary: 'bootstrap4',
    format: 'yyyy-mm-dd',
    weekStartDay: 1,
    iconsLibrary: 'fontawesome',
    minDate: function () {
        return $('#booking_real_start_date').val();
    }
});


// ----------------------------------------------------------