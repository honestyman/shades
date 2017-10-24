var ans1, ans2, ans3, ans4;

jQuery(document).ready(function($){

    //Find the shortest number for each shade
    var path1 = [];
    $(".shade1").each(function(){ 	
        var val = $(this).children().text();
        path1.push(parseInt(val, 10));
    });	

    path1.sort(function(a, b){return a-b});
    ans1 = path1[0];

    var path2 = [];
    $(".shade2").each(function(){ 	
        var val = $(this).children().text();
        path2.push(parseInt(val, 10));                      

    });	

    path2.sort(function(a, b){return a-b});					
    ans2 = path2[0];

    var path3 = [];
    $(".shade3").each(function(){ 	
        var val = $(this).children().text();
        path3.push(parseInt(val, 10));
    });	

    path3.sort(function(a, b){return a-b});					
    ans3 = path3[0];

    var path4 = [];
    $(".shade4").each(function(){ 	
        var val = $(this).children().text();
        path4.push(parseInt(val, 10));
    });	

    path4.sort(function(a, b){return a-b});
    ans4 = path4[0];

    $( ".path1" ).html(ans1);
    $( ".path2" ).html(ans2);
    $( ".path3" ).html(ans3);
    $( ".path4" ).html(ans4);
    
    var score = 0;
    var prev_val = 0;
    var current_val = 0;
    
    $(".box").click(function(){
        var num = $(this).children().text();        
        
        if((num==ans1) || (num==ans2) || (num==ans3) || (num==ans4)){
            
            
            if(prev_val === 0){
                current_val = getRandomNum(24,25);
                score = prev_val + current_val;
                prev_val = current_val;
                current_val = score;
            }
            else{
                score = prev_val + current_val;
                prev_val = current_val;
                current_val = score;
            }
            
            $('.score-here').html(score);
        }
        else{
            score -= 1;
            $('.score-here').html(score);
        }
        
        $(this).animate({
            "opacity": "0"
        }, 250);
    });
        
    $(function(){
        var counter = 10;
        var interval = setInterval(function(){

            counter -= 1;
            $( "span.secs" ).html(counter);

            if (counter === 0){	
                clearInterval(interval);
                $(".reminder").fadeOut(500);
            }
        }, 1000);					
    });
    
    $(function(){
        $(".takip").delay(10000).animate({
            "opacity": "1",
            "top": "0"
        }, 500);
    });
    
    $(function(){
        $("#theme").click(function(){
            var theme1 = document.getElementById('theme').style.backgroundImage = "url('http://localhost/shades/images/dark-bg.png')";
            
            var theme2 = document.getElementById('theme').style.backgroundImage = "url('http://localhost/shades/images/light-bg.png')";
        });
    });
    
    $('.reg-email').on('input', function(e){
        var a = $(this).val();
        var mailformat = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        
        if(a.length === 0){
            $('email').html("Please put your email");
        }
        else if((a.length > 1) && mailformat.test(a)){
            
            $('.valid-email').html('Good to go!');
        }
        else
            $('.valid-email').html("Invalid Email");
    });
});

function generateBoxes(){
    
    
    if($(".box-container").length){
        $('.box-container').remove();
        
        createEachBox();
    }
    
    else{
        createEachBox();
    }    
    
}


function createEachBox(){
    var out_value = [], //box numbers to be pushed here
        box_id_number = 1, //set and id number for each box
        min_val = 1,
        max_val = 20;
    
    var current_val = 0,
        current_color = '';
    
    var shade1_num = 0, shade2_num = 0, shade3_num = 0, shade4_num = 0;
    var range = [1,2,3,4];
    
    for(var i=0; i<4; i++){
        for(var j=0; j<4; j++){


            var random = range[Math.floor(Math.random() * range.length)];
            //var random = getRandomNum(1,4);

            switch(random){
                case 1:
                    current_val = getRandomNum(min_val,max_val);

                    while((jQuery.inArray(current_val, out_value)) > -1){
                        current_val = getRandomNum(min_val,max_val);
                    }
                    current_color  = 'shade1';
                    shade1_num += 1;
                    break;

                case 2:
                    current_val = getRandomNum(min_val,max_val);

                    while((jQuery.inArray(current_val, out_value)) > -1){
                        current_val = getRandomNum(min_val,max_val);
                    }

                    current_color  = 'shade2';
                    shade2_num += 1;
                    break;

                case 3:
                    current_val = getRandomNum(min_val,max_val);

                    while((jQuery.inArray(current_val, out_value)) > -1){
                        current_val = getRandomNum(min_val,max_val);
                    }

                    current_color  = 'shade3';
                    shade3_num += 1;
                    break;

                default:
                    current_val = getRandomNum(min_val,max_val);

                    while((jQuery.inArray(current_val, out_value)) > -1){
                        current_val = getRandomNum(min_val,max_val);
                    }

                    current_color  = 'shade4';
                    shade4_num += 1;
                    break;
            }


            $('.card-holder').append("<div class='box-container'><div class='box " + current_color + "' id='" + box_id_number + "'><p>" + current_val + "</p></div><div class='takip'></div></div>");

            out_value.push(current_val);
            box_id_number += 1;

            if(shade1_num===4){
                var a = range.indexOf(1);
                if (a > -1) {
                    range.splice(a, 1);
                }
            }else if(shade2_num===4){
                var b = range.indexOf(2);
                if (b > -1) {
                    range.splice(b, 1);
                }
            }else if(shade3_num===4){
                var c = range.indexOf(3);
                if (c > -1) {
                    range.splice(c, 1);
                }
            }else if(shade4_num===4){
                var d = range.indexOf(4);
                if (d > -1) {
                    range.splice(d, 1);
                }
            }
        }
    }
}

function getRandomNum(min, max) {
    return Math.floor(Math.random() * max ) + min;
}

generateBoxes();