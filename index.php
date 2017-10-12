
				
			<script>
			$(document).ready(function(){
                //Hide box on click
				$(".box, .box > p").click(function(){
					$(this).animate({
						"opacity": "0"
					}, 750);
				});

                //Hide all the boxes after n seconds
				$(function(){
					$(".takip").delay(10000).animate({
						"opacity": "1",
						"top": "0"
					}, 500);
				});

                //Timer
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

				var ans1;
				var ans2;
				var ans3;
				var ans4;
				
                //Find the shortest number for each shade
				$(function(){
					var path1 = [];
					$(".shade1").each(function(){ 	
						$val = $(this).children().text();
						path1.push(parseInt($val, 10));
					});	
					
					path1.sort(function(a, b){return a-b});
					ans1 = path1[0];
					
					var path2 = [];
					$(".shade2").each(function(){ 	
						$val = $(this).children().text();
						path2.push(parseInt($val, 10));                      
                        
					});	
					
					path2.sort(function(a, b){return a-b});					
					ans2 = path2[0];
                    var i = 0;
                    while(ans2 <= ans1){
                        ans2 = path2[i];
                        i+=1;
                    }
                    
					var path3 = [];
					$(".shade3").each(function(){ 	
						$val = $(this).children().text();
						path3.push(parseInt($val, 10));
					});	
					
					path3.sort(function(a, b){return a-b});					
					ans3 = path3[0];
                    var j = 0;
                    while(ans3 <= ans2){
                        ans3 = path3[j];
                        j+=1;
                    }
                    
					var path4 = [];
					$(".shade4").each(function(){ 	
						$val = $(this).children().text();
						path4.push(parseInt($val, 10));
					});	
					
					path4.sort(function(a, b){return a-b});
                    ans4 = path4[0];
                    var k = 0;
                    while(ans4 <= ans3){
                        ans4 = path4[k];
                        k+=1;
                    }
                    
					$( ".path1" ).html(ans1);
					$( ".path2" ).html(ans2);
					$( ".path3" ).html(ans3);
					$( ".path4" ).html(ans4);
					
				});
				
				
			});
		</script>