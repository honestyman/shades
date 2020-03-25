var base_url = 'http://localhost/radian/shades/';

jQuery(document).ready(function($){
    
    //Document Load Animation
    if(localStorage.getItem('background') === null){
        $('.wrap, .cms-aside').css('background-image', 'url("'+base_url+'images/dark-bg.png")');
    }
    else{
        if(localStorage.getItem('background') === 'url("'+base_url+'images/dark-bg.png")'){
            $('.wrap, .cms-aside').css('background-image', localStorage.getItem('background'));            
            $('#theme').html('Light Theme');
            $('.title p').css('background-color', '#36e9f0');
        }
        else if(localStorage.getItem('background') === 'url("'+base_url+'images/light-bg.png")'){
            $('.wrap, .cms-aside').css('background-image', localStorage.getItem('background'));
            $('#theme').html('Dark Theme');
            $('.title p').css('background-color', '#fff');
        }
    }
    
    $('.wrap, .wrapper').fadeIn(800, function(){
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
        //Clean all input fields
        $('.reg-email').val('');
        $('.reg-pass').val('');
        $('.confirm-pass').val('');
        $('.reg-pass').val('');
        $('.log-email').val('');
        $('.log-pass').val('');
        $('.log-admin-user').val('');
        $('.log-admin-pass').val('');
        
        //Default Field Message
        $('.valid-log-email, .valid-email').html('Please enter your  email');
        $('.valid-log-pass, .valid-pass, .valid-admin-pass').html('Please enter your password');     $('.valid-confirm-pass').html('Please retype your password');
        
        //Admin
        $('.valid-admin-user').html('Please enter your  username');
        
        //Change to default color
        $('.valid-log-email, .valid-email, .valid-log-pass, .valid-pass, .valid-confirm-pass, .valid-admin-user, .valid-admin-pass').css('color', '#2d2d2d');
        
        
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
    
    $('#leaderboard').click(function(){
        $('.leaderboard').fadeIn(500);
        $('.leaderboard > div').animate({             top: '50%'
        }, 'slow');
        
    });
    
    $('#about').click(function(){
        $('.about').fadeIn(500);
        $('.about > div').animate({             top: '50%'
        }, 'slow');
        
    });
    
    
    $("#theme").click(function(){
        var current_theme = $('.wrap').css('background-image');
        var current_theme_admin = $('.cms-aside').css('background-image');
        var a = 'url("'+base_url+'images/dark-bg.png")';
        var b = 'url("'+base_url+'images/light-bg.png")'
        
        if(current_theme === a || current_theme_admin === a){
            $('.wrap, .cms-aside').css('background-image', 'url("'+base_url+'images/light-bg.png")');
            
            $('#theme').html('Dark Theme');
            $('.title p').css('background-color', '#fff');
            
            localStorage.setItem('background', 'url("'+base_url+'images/light-bg.png")');
            
        }
        else{
            $('.wrap, .cms-aside').css('background-image', 'url("'+base_url+'images/dark-bg.png")');
            
            $('#theme').html('Light Theme');
            $('.title p').css('background-color', '#36e9f0');
            
            localStorage.setItem('background', 'url("'+base_url+'images/dark-bg.png")');
        }
    });
    
    
    //Admin Dashboard Menus
    $('#side-btn-1').click(function(){
        $('.visible').fadeOut('800', function(){
            $(this).removeClass('visible');
            $('.manage-content').fadeIn('80', function(){
                $(this).addClass('visible');
            });
        });
    });
    
    $('#side-btn-2').click(function(){
        $('.visible').fadeOut('800', function(){
            $(this).removeClass('visible');
            $('.manage-how-to').fadeIn('80', function(){
                $(this).addClass('visible');
            });
        });
    });
    
    $('#side-btn-3').click(function(){
        $('.visible').fadeOut('800', function(){
            $(this).removeClass('visible');
            $('.view-players').fadeIn('80', function(){
                $(this).addClass('visible');
            });
        });
    });
    
});