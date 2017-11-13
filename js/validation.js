// Form Validations for Register


var good_email = false, good_pass = false, good_cpass =false;
var ajaxRequest;

$('.reg-email').on('input', function(e){
    var a = $(this).val();
    var mailformat = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if(a.length === 0){
        $('.valid-email').css('color', 'red');
        $('.valid-email').html("This is a required field");
        good_email = false;
    }
    else if((a.length > 0) && mailformat.test(a)){
        /*clearTimeout(ajaxRequest);
        ajaxRequest = setTimeout(function(sn) {*/
        $.ajax({
          'url'     : 'checkemail.php',
          'method'  : 'POST',
          'dataType' : 'html',
          'data'    : {a: a},
          'success'  : function(response){
                        // show notification
              
                        if(response === 'This email has been registered already'){
                            $('.valid-email').css('color', 'red');
                            $('.valid-email').html(response);
                            good_email = false;
                        }
                        else{
                            $('.valid-email').css('color', 'green');
                            $('.valid-email').html(response);
                            good_email = true;
                        }
                     }
        });
        /*}, 500, a);*/
        
        
        /*$('.valid-email').css('color', 'green');
        $('.valid-email').html('Good to go!');
        good_email = true;*/
    }
    else{
        $('.valid-email').css('color', 'red');
        $('.valid-email').html("Invalid Email");  
        good_email = false;
    }            
});

$('.reg-pass').on('input', function(e){
    var a = $(this).val();
    var conf_pass = $('.confirm-pass').val();

    if((conf_pass.length > 0) && (a===conf_pass)){
        $('.valid-confirm-pass').css('color', 'green');
        $('.valid-confirm-pass').html('Good to go!');
        good_cpass = true;
    }
    else if((conf_pass.length > 0) && (a.length === 0)){
        $('.valid-confirm-pass').css('color', 'red');
        $('.valid-confirm-pass').html("Password mismatch");
        good_cpass = false;
    }
    else if((conf_pass.length > 0) && (a!=conf_pass)){
        $('.valid-confirm-pass').css('color', 'red');
        $('.valid-confirm-pass').html("Password mismatch");
        good_cpass = false;
    }

    if(a.length === 0){
        $('.valid-pass').css('color', 'red');
        $('.valid-pass').html("This is a required field");
        good_pass = false;

    }
    else if((a.length > 7)){  
        $('.valid-pass').css('color', 'green');
        $('.valid-pass').html('Good to go!');
        good_pass = true;
    }                
    else{
        $('.valid-pass').css('color', 'red');
        $('.valid-pass').html("Password should be minimum of 8 characters");
        good_pass = false;
    }            
});    

$('.confirm-pass').on('input', function(e){
    var pass = $('.reg-pass').val();
    var a = $(this).val();
    if(a.length === 0){
        $('.valid-confirm-pass').css('color', 'red');
        $('.valid-confirm-pass').html("This is a required field");
        good_cpass = false;

    }
    else if((a === pass)){  
        $('.valid-confirm-pass').css('color', 'green');
        $('.valid-confirm-pass').html('Good to go!');
        good_cpass = true;
    }                
    else{
        $('.valid-confirm-pass').css('color', 'red');
        $('.valid-confirm-pass').html("Password mismatch");
        good_cpass = false;
    }            
});

$('.confirm-pass, .reg-pass, .reg-email').on('input', function(e){
    if(good_email && good_pass && good_cpass){            
        $('.js-btn').css('opacity', '1');
        $('.js-btn').removeAttr('disabled');

    }
    else if(!(good_email && good_pass && good_cpass)){
        $('.js-btn').css('opacity', '0.5');
        $('.js-btn').prop('disabled', true);
    }                 
});


//Form Validations for Login


var good_lemail = false, good_lpass = false;

$('.log-email').on('input', function(e){
    var a = $(this).val();
    var mailformat = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if(a.length === 0){
        $('.valid-log-email').css('color', 'red');
        $('.valid-log-email').html("This is a required field");
        good_lemail = false;
    }
    else if((a.length > 0) && mailformat.test(a)){  
        $('.valid-log-email').css('color', 'green');
        $('.valid-log-email').html('Good to go!');
        good_lemail = true;
    }
    else{
        $('.valid-log-email').css('color', 'red');
        $('.valid-log-email').html("Invalid Email");  
        good_lemail = false;
    }            
});

$('.log-pass').on('input', function(e){
    var a = $(this).val();

    if(a.length === 0){
        $('.valid-log-pass').css('color', 'red');
        $('.valid-log-pass').html("This is a required field");
        good_lpass = false;

    }
    else if((a.length > 7)){  
        $('.valid-log-pass').css('color', 'green');
        $('.valid-log-pass').html('Good to go!');
        good_lpass = true;
    }                
    else{
        $('.valid-log-pass').css('color', 'red');
        $('.valid-log-pass').html("Password should be minimum of 8 characters");
        good_lpass = false;
    }            
});

$('.log-pass, .log-email').on('input', function(e){
    if(good_lemail && good_lpass){            
        $('.js-btn').css('opacity', '1');
        $('.js-btn').removeAttr('disabled');

    }
    else if(!(good_lemail && good_lpass)){
        $('.js-btn').css('opacity', '0.5');
        $('.js-btn').prop('disabled', true);
    }                 
});


// Form Validations for Verification


var good_code = false, good_nick = false;
var getCode = $('.thecode').text();

$('.code').on('input', function(e){
    var a = $(this).val();
    if(a.length === 0){
        $('.valid-code').css('color', 'red');
        $('.valid-code').html("This is a required field");
        good_code = false;

    }
    else if((a === getCode)){  
        $('.valid-code').css('color', 'green');
        $('.valid-code').html('Good to go!');
        good_code = true;
    }                
    else{
        $('.valid-code').css('color', 'red');
        $('.valid-code').html("Invalid Code");
        good_code = false;
    }            
});

$('.nick').on('input', function(e){
    var a = $(this).val();
    if(a.length === 0){
        $('.valid-nick').css('color', 'red');
        $('.valid-confirm-pass').html("This is a required field");
        good_nick = false;

    }
    else if((a.length > 3)){  
        $('.valid-nick').css('color', 'green');
        $('.valid-nick').html('Good to go!');
        good_nick = true;
    }                
    else{
        $('.valid-nick').css('color', 'red');
        $('.valid-nick').html("Minimum of 4 characters");
        good_nick = false;
    }            
});

$('.code, .nick').on('input', function(e){
    if(good_code && good_nick){            
        $('.js-btn').css('opacity', '1');
        $('.js-btn').removeAttr('disabled');

    }
    else if(!(good_code && good_nick)){
        $('.js-btn').css('opacity', '0.5');
        $('.js-btn').prop('disabled', true);
    }                 
});


//Form Validations for Admin Login


var good_admin_user = false, good_admin_pass = false;

$('.log-admin-user').on('input', function(e){
    var a = $(this).val();

    if(a.length === 0){
        $('.valid-admin-user').css('color', 'red');
        $('.valid-admin-user').html("This is a required field");
        good_admin_user = false;
    }
    else if((a.length > 0)){  
        $('.valid-admin-user').css('color', 'green');
        $('.valid-admin-user').html('Good to go!');
        good_admin_user = true;
    }
    else{
        $('.valid-admin-user').css('color', 'red');
        $('.valid-admin-user').html("Invalid Username");  
        good_admin_user = false;
    }            
});

$('.log-admin-pass').on('input', function(e){
    var a = $(this).val();

    if(a.length === 0){
        $('.valid-admin-pass').css('color', 'red');
        $('.valid-admin-pass').html("This is a required field");
        good_admin_pass = false;

    }
    else if((a.length > 7)){  
        $('.valid-admin-pass').css('color', 'green');
        $('.valid-admin-pass').html('Good to go!');
        good_admin_pass = true;
    }                
    else{
        $('.valid-admin-pass').css('color', 'red');
        $('.valid-admin-pass').html("Password should be minimum of 8 characters");
        good_admin_pass = false;
    }            
});

$('.log-admin-pass, .log-admin-user').on('input', function(e){
    if(good_admin_user && good_admin_pass){            
        $('.js-btn').css('opacity', '1');
        $('.js-btn').removeAttr('disabled');

    }
    else if(!(good_admin_user && good_admin_pass)){
        $('.js-btn').css('opacity', '0.5');
        $('.js-btn').prop('disabled', true);
    }                 
});


//Make sure to clear input after submitting
$('#verify').click(function(){
    /*$.post($('#verification-form').attr('action'),
        $('#verification-form:input').serializeArray(),
        function(info){
        
        $('.notice').empty();
        $('.notice').html(info);
        
        clearInput();
    });
    
    $('#verification-form').submit(function(){
        return false;
    });*/
        
});

function clearInput(){
    $('#reg-form:input').each(function(){        
        $(this).val('');
    });
}


