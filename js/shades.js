var ans1, ans2, ans3, ans4;
var lives = 3;
var max_timer = 3;
var current_level = 1;

var best = document.getElementsByClassName('best-here').innerHTML;
var score = 0;
var prev_val = 0;
var current_val = 0;

var correct_ans = 0;
var wrong_ans = 0;
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
    
    //Update Best Score Using Ajax
    $('.game-btn').click(function(){
        var bestScore = best;
        var bestLevel = $('.level').html();

        if(!($('.show-score').hasClass('hidden'))){
            $.ajax({
              'url'     : 'update.php',
              'method'  : 'GET',
              'dataType' : 'html',
              'data'     : {bestScore: bestScore, bestLevel: bestLevel},
              'success'  : function(response){
                            // now update player's information 
                            $('.bestlevel').html(bestLevel);
                            $('.highscore').html(bestScore);
                  
                            $('table tbody').html(response);
                         }
            });
        }

    });
    
    
    
});

function initiateStage(){
    
    //call generate box  
    generateBoxes();
    
    $('.score-here').html(score);
    $('.best-here').html(best);
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
    $(function(){
        var counter = max_timer;
        $('span.secs').html(counter);
        
        var interval = setInterval(function(){

            counter -= 1;
            $( "span.secs" ).html(counter);

            if (counter === 0){                            
                
                //Hide Boxes after Timer runs out
                /*$(function(){
                    $('.box').css('background-color', 'rgba(17, 17, 19, .3)');
                    $('.box > p').css('visibility', 'hidden');  
                });*/
                
                
                //score accumulation on click
                var stage_clear = false;

                $(".box").click(function(){

                    //disable click events after clicking a div
                    $(this).css('pointer-events', 'none');                                
                    var num = parseInt(($(this).children().text()), 10);        


                    if((num == ans1) || (num == ans2) || (num == ans3) || (num == ans4)){

                        if(num == answers[0]){ //Current path for correct answer

                            removeFromArray(answers, answers[0]);
                            correct_ans ++;
                            accumulateScore();

                            $(this).css('background-color', '#4eff4e');
                            $(this).children().css('visibility', 'visible');
                            $(this).children().html('&#10004;');
                        }
                        else{
                            var i = answers.indexOf(num);
                            removeFromArray(answers, answers[i]);
                            
                            wrong_ans++;
                            lives -= 1;
                            $(this).css('background-color', '#ff7e7e');
                            $(this).children().css('visibility', 'visible');
                            $(this).children().html('&#10060;');
                        }


                    }
                    else{
                        wrong_ans++;
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
                        $('#game-btn').html('restart');
                        $('.card-message').fadeIn('slow');
                        
                        
                        
                        var check_score = $('.best-here').html();
                        var x = parseInt(check_score, 10);
                        if (score > x){
                            best = score;
                            $('.show-score').removeClass('hidden');
                            $('.best-score').html(best);
                        }
                        else {
                            $('.show-score').addClass('hidden');
                        }
                        
                        lives = 3;
                        score = 0;
                        current_level = 1;
                    }
                    
                    else if((lives > 0) && (answers.length === 0)){
                        $('.card-message-head').children().html('Level ' + current_level + ' done!');
                        $('#game-btn').html('next');
                        $('.card-message').fadeIn('slow');
                        
                        $('.show-score').addClass('hidden');
                        
                        if(current_level % 4 === 0){
                            max_timer = max_timer - 1;
                        }
                        current_level += 1;
                        
                    }
                
                });
                clearInterval(interval);
            }
        }, 1000);


    });
    
    
}



function accumulateScore(){
    score += current_level;
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
    
    if(current_level % 4 === 0){
        max_val += 2;
    }
    
    for(var i=0; i<4; i++){
        var range = [1,2,3,4];
        
        for(var j=0; j<4; j++){
            
            if(range.length>1){
				var random = range[Math.floor(Math.random() * range.length)];
			}
			else{
				var random = range[0];
			}
            //var random = getRandomNum(1,4);

            switch(random){
                case 1:
                    current_val = getRandomNum(min_val,max_val);

                    while((jQuery.inArray(current_val, out_value)) > -1){
                        current_val = getRandomNum(min_val,max_val);
                    }
                    current_color  = 'shade1';
                    removeFromArray(range,random);
                    break;

                case 2:
                    current_val = getRandomNum(min_val,max_val);

                    while((jQuery.inArray(current_val, out_value)) > -1){
                        current_val = getRandomNum(min_val,max_val);
                    }

                    current_color  = 'shade2';
                    removeFromArray(range,random);
                    break;

                case 3:
                    current_val = getRandomNum(min_val,max_val);

                    while((jQuery.inArray(current_val, out_value)) > -1){
                        current_val = getRandomNum(min_val,max_val);
                    }

                    current_color  = 'shade3';
                    removeFromArray(range,random);
                    break;

                default:
                    current_val = getRandomNum(min_val,max_val);

                    while((jQuery.inArray(current_val, out_value)) > -1){
                        current_val = getRandomNum(min_val,max_val);
                    }

                    current_color  = 'shade4';
                    removeFromArray(range,random);
                    break;
            }


            $('.card-body').append("<div class='box-container'><div class='box " + current_color + "' id='" + box_id_number + "'><p>" + current_val + "</p></div></div>");

            out_value.push(current_val);
            box_id_number += 1;
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