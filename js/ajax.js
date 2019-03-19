$(document).ready(function(){
    // Initialize variables
    var emailTimeout = null;
    var email_state = false;
    var emailInput = document.getElementById('account_email');
    var passwordInput = document.getElementById('account_password');
    var cpasswordInput = document.getElementById('account_password_confirmation');
    
  
    //-------------------------
    // Check email input starts
    //-------------------------
    emailInput.onkeyup = function (e) {
        // Clear the timeout if it has been set already.
        // This will prevent the previous task from executing
        // if it has been less than <MILLISECONDS>
        clearTimeout(emailTimeout);
        // Make a new timeout set to go off in 1000ms
        emailTimeout = setTimeout(function () {
            var email = $('#account_email').val();
            if (email == '') {
                email_state = false;
                return;
            }
            $.ajax({
                url: 'functions/ajax.php',
                type: 'post',
                data: {
                    'email_check' : 1,
                    'email' : email,
                },
                success: function(response){
                    if (response == 'taken' ) {
                        email_state = false;
                        $('#email-badge').text('User with this Email already exists').removeClass('badge-success').addClass('badge-danger');
                    } else if (response == 'not_taken') {
                        email_state = true;
                        $('#email-badge').text('');
                    }
                }
            });
        }, 1000);
    };
    //-----------------------
    // Check email input ends
    //-----------------------
  });
  