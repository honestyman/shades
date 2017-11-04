jQuery(document).ready(function($){
    
    $('.wrap').fadeIn(800, function(){
        $('.js-div').animate({ 
                'margin-bottom': '0px',
                opacity: 1
            }, 'slow', 'swing' , function(){
            
            
            $('.shades').animate({
                opacity: 1
            }, 1000);
            $('.shades').addClass('tracking-in-expand');
            
            $('#js-card-image').animate({ 
                'margin-bottom': '0px',
                opacity: 1
            }, 500, 'swing');
        });  
    });
    
    $('#js-play-btn').click(function(){
        $('.reg-email').val('');
        $('.reg-pass').val('');
        $('.confirm-pass').val('');
        $('.reg-pass').val('');
        $('.log-email').val('');
        $('.log-pass').val('');
        
        $('.valid-log-email, .valid-email').html('Please enter your  email');
        $('.valid-log-email, .valid-email, .valid-log-pass, .valid-pass, .valid-confirm-pass').css('color', '#2d2d2d');
        $('.valid-log-pass, .valid-pass').html('Please enter your password');        
        $('.valid-confirm-pass').html('Please retype your  password');
        
        
        $('.login').fadeIn('slow');
        $('.login > div').animate({            
            top: '50%'
        }, 'slow');
        
    });
    
    $('.modal-close').click(function(){        
        $(this).parent().fadeOut('slow');
        $(this).siblings().animate({
            top: '45%'
        }, 'slow');
    });
    
    $('.link-to-reg').click(function(){
        $('.login').fadeOut('slow', function(){
            $('.register').fadeIn(500);
            $('.register > div').animate({             top: '50%'
            }, 'slow');
        });
        
        $('.login > div').animate({            
            top: '45%'
        }, 'slow');
        
    });
    
    $('.link-to-log').click(function(){
        $('.register').fadeOut('slow', function(){
            $('.login').fadeIn(500);
            $('.login > div').animate({             top: '50%'
            }, 'slow');
        });
        
        $('.register > div').animate({            
            top: '45%'
        }, 'slow');
        
    });
    
    $('#how-to').click(function(){
        $('.how-to').fadeIn(500);
        $('.how-to > div').animate({             top: '50%'
        }, 'slow');
        
    });
    
    
    $("#theme > span").click(function(){
        var current_theme = $('.wrap').css('background-image');
        var a = 'url("http://localhost/shades/images/dark-bg.png")';
        var b = 'url("http://localhost/shades/images/light-bg.png")'
        
        if(current_theme === a){
            $('.wrap').css('background-image', 'url("http://localhost/shades/images/light-bg.png")');
            
            $(this).html('Dark Theme');
            $('.title p').css('background-color', '#fff');
            
        }
        else{
            $('.wrap').css('background-image', 'url("http://localhost/shades/images/dark-bg.png")');
            
            $(this).html('Light Theme');
            $('.title p').css('background-color', '#36e9f0');
        }
    });
    
    
    
});