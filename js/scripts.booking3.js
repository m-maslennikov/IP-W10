function applyPromocode(){
    //some code
    var promocode = $('#promocode').val();
    $.ajax({
        url: 'functions/ajax.booking3.php',
        dataType: "JSON",
        type: 'post',
        data: {
            'calculate_discount' : 1,
            'promocode' : promocode
        },
        success: function(response){
            
            if (response.err > 0) {
                console.log(response.err);
            } else {
                console.log(response.new_price);
                $('#category_estimated_price').text(response.new_price);
            }
            
        }
    });
}


$("#apply_promocode_button").click(function() {
    applyPromocode();
});

// ----------------------------------------------------------