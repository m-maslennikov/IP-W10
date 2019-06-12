$(document).ready(function(e){ 
    $('.category').hide();

    //Shows Category Name
    var categoryfromindex = $('#categories option:selected').val();
    $catname = $('#'+categoryfromindex).text(categoryfromindex);
    $catname.css('display', 'block');

    //Shows Category Description
    var descriptionid = 'category_description_'+categoryfromindex;
    $('#'+descriptionid).css('display','block');

    //Calculate price
    var datefrom = $('#startdate').val();
    var dateto = $('#enddate').val();
    var category_name_daily_price = categoryfromindex+'_category_daily_price';    
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
    var category_name_simulated_price = categoryfromindex+'_simulated_price';
    $('#'+category_name_simulated_price).text(simulatedprice);
    //Shows Price Description
    $('#'+category_name_simulated_price).css('display', 'block');

    //Actions on changes on the select category
    $('.inputchangecategory').change(function(e){
    
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
            
            //Shows Category Name
            $el = $('#'+categoryselected).text(categoryselected);
            $('.category').hide();
            $el.css('display', 'block');

            //Shows Price Description
            $('#'+category_name_simulated_price).css('display', 'block');
            
            //Shows Category Description
            $eldesc = $('#category_description_'+categoryselected);
            $eldesc.css('display','block');       
        }   
    })

    //Changes the car information
    $('.select-car').change(function(e){
        var car_selected = $('#select-car option:selected').val();

    })

    //Changes the Step through Steps bar
   /* $('.steps').click(function(){
        var step_clicked = $(this).attr('id');
        switch(step_clicked){
            case 'car_step':
                $('#car_step').addClass('active');
                $('#category_step, #payment_step').removeClass('active');
                $('.select-category').hide();
                $('.select-car').show();
                break;
            case 'payment_step':
                $('#payment_step').addClass('active');
                $('#car_step, #category_step').removeClass('active');
                $('.select-car').hide();
                $('.select-category').hide();
                break;  
            case 'category_step':
                $('#category_step').addClass('active');
                $('#car_step, #payment_step').removeClass('active');
                $('.select-car').hide();
                $('.select-category').show();
                break;
        }
    })

    //Changes the Step through the Button 'Select Car'
    $('#button_select_car').click(function(){
        $('#car_step').addClass('active');
        $('#category_step, #payment_step').removeClass('active');
        $('.select-category').hide();
        $('.select-car').show();
    })
*/
});
