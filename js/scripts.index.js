// Datepicker
//$('[data-toggle="datepicker"]').datepicker();


$(document).ready(function(){
    
    $('.category').hide();
    $('.inputchange').change(function(e){
    
    var categoryselected = $('#categories option:selected').val();
    var datefrom = $('#startdate').val();
    var dateto = $('#enddate').val();

    
    if (categoryselected !== ""||datefrom !== ""||dateto!==""){
        //Calculate days
        var category_name_daily_price = categoryselected+'_category_daily_price';
        
        var dailyprice = $('#'+category_name_daily_price).text();
        
        datefrom = datefrom.split('-');
        dateto = dateto.split('-');

        datefrom = new Date(datefrom[0], datefrom[1], datefrom[2]);
        dateto = new Date(dateto[0], dateto[1], dateto[2]);

        datefrom_unixtime = parseInt(datefrom.getTime()/1000);
        dateto_unixtime = parseInt(dateto.getTime()/1000);

        var timeDiff = dateto_unixtime - datefrom_unixtime;
        var timeDiffinHours = timeDiff/60/60;
        var timeDiffinDays = timeDiffinHours/24;
        
        var simulatedprice = 'NZD ' + timeDiffinDays*dailyprice + '.00';
        
        var category_name_simulated_price = categoryselected+'_simulated_price';
        $('#'+category_name_simulated_price).text(simulatedprice);
    
        //Category Popup
        
        var $el = $('#' + categoryselected);
        $('.category').hide();
        $el.css('display', 'block');
    }   
    })
});

/*$(document).ready(function(){
    function selectCategory(){
        var category = $('#categories option:selected').val();
        return category;
    }
    $('#categories').change(function(e){
        var category = selectCategory();
        
        $.ajax({
            type: "POST",
            url: "functions/pass_value.php",
            data: {'category': category},
            contenttype: "application/json; charset=utf-8",
            dataType: 'text',
            cache: false,
            success: function(data){
                data1=jQuery.parseJSON(data);
                alert(data1.category_name);
            }
        });
        return false;
    });
    

});
*/



// ----------------------------------------------------------