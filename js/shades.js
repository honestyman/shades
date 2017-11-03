var ans1, ans2, ans3, ans4;
var lives = 3;
var max_timer = 3;
var current_level = 1;

var score = 0;
var prev_val = 0;
var current_val = 0;

$(document).ready(function(){
    
    //Start Game
    $(function(){
       $('#game-btn').click(function(){
           $(this).parent().fadeOut('slow', function(){                
               
                generateBoxes();
               
                initiateStage();

           });
       });
    });
    
    
    
});

function initiateStage(){
    
    //call generate box  
    generateBoxes();
    
    $('.lives').html(lives);
    $('.level').html(current_level);
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


    var answers = [ans1, ans2, ans3, ans4];
    //pass max_timer
    $('span.secs').html(max_timer);

    $('.ans').html(answers);

    $(function(){
        var counter = max_timer;
        var interval = setInterval(function(){

            counter -= 1;
            $( "span.secs" ).html(counter);

            if (counter === 0){                            

                $(function(){
                    $('.box').css('background-color', 'rgba(17, 17, 19, .3)');
                    $('.box > p').css('visibility', 'hidden');  
                });

                //score accumulation

                var stage_clear = false;

                $(".box").click(function(){

                    //disable click events after clicking a div
                    $(this).css('pointer-events', 'none');                                
                    var num = parseInt(($(this).children().text()), 10);        


                    if((num == ans1) || (num == ans2) || (num == ans3) || (num == ans4)){

                        if(num == answers[0]){

                            removeFromArray(answers, answers[0]);

                            accumulateScore();

                            $(this).css('background-color', '#4eff4e');
                            $(this).children().css('visibility', 'visible');
                            $(this).children().html('&#10004;');
                        }
                        else{
                            var i = answers.indexOf(num);
                            removeFromArray(answers, answers[i]);

                            if(score > 0){
                            score -= getRandomNum(0, 5);
                            }
                            lives -= 1;
                            $(this).css('background-color', '#ff7e7e');
                            $(this).children().css('visibility', 'visible');
                            $(this).children().html('&#10060;');
                        }


                    }
                    else{

                        if(score > 0){
                            score -= getRandomNum(0, 5);
                        }
                        lives -= 1;
                        $(this).css('background-color', '#ff7e7e');
                        $(this).children().css('visibility', 'visible');
                        $(this).children().html('&#10060;');

                    }

                    $('.score-here').html(score);
                    $('.lives').html(lives);
                    $('.ans').html(answers);
                    
                    if(lives === 0){
                        $('.card-message-head').children().html('Game Over!');
                        $('#game-btn').html('retry');
                        $('.card-message').fadeIn('slow');
                        
                        lives = 3;
                        score = 0;
                    }
                
                });
                clearInterval(interval);
            }
        }, 1000);


    });
}

function accumulateScore(){
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
}

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


            $('.card-body').append("<div class='box-container'><div class='box " + current_color + "' id='" + box_id_number + "'><p>" + current_val + "</p></div></div>");

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

function removeFromArray(array, element) {
    const index = array.indexOf(element);
    
    if (index !== -1) {
        array.splice(index, 1);
    }
}

function getRandomNum(min, max) {
    return Math.floor(Math.random() * max ) + min;
}

generateBoxes();