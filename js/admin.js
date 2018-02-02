$(document).ready(function(){
    
    $(function(){
        $('#side-btn-1').click(function(){
            $.ajax({
              'url'     : 'checkvals.php',
              'method'  : 'GET',
              'dataType' : 'html',
              'data'    : {desc: 1},
              'success'  : function(response){
                            // show content to input field 
                            $('#admin-form1').html(response);
                  
                            $('#update-content').click(function(){
                                var about = $('textarea[name=game-desc]').val();
                                var tagline = $('input[name=game-tagline]').val();
                                var btn_copy = $('input[name=home-play-btn]').val();
                                var page_footer = $('input[name=page-footer]').val();
                                
                                if(confirm('Save changes to Website Contents?')){
                                    $.ajax({
                                      'url'     : 'checkvals.php',
                                      'method'  : 'POST',
                                      'dataType' : 'html',
                                      'data'    : {about: about, tagline: tagline, btn_copy: btn_copy, page_footer: page_footer},
                                      'success'  : function(response){
                                                    // show content to input field 
                                                    alert('Website Contents Have Been Updated Successfully!');
                                                 }
                                    });
                                }
                            });
                         }
            });
        });
    });
    
    $(function(){
        $('#side-btn-2').click(function(){
            $.ajax({
              'url'     : 'checkvals.php',
              'method'  : 'GET',
              'dataType' : 'html',
              'data'    : {desc2: 2},
              'success'  : function(response){
                            // show content to input field 
                            $('#admin-form2').html(response);
                  
                  
                            $('#update-how-to').click(function(){
                                var step1 = $('textarea[name=step1]').val();
                                var step2 = $('textarea[name=step2]').val();
                                var step3 = $('textarea[name=step3]').val();
                                var step4 = $('textarea[name=step4]').val();
                                
                                if(confirm('Save changes to How To?')){
                                    $.ajax({
                                      'url'     : 'checkvals.php',
                                      'method'  : 'POST',
                                      'dataType' : 'html',
                                      'data'    : {step1: step1, step2: step2, step3: step3, step4: step4},
                                      'success'  : function(response){
                                                    // show content to input field 
                                                    alert('Your Instructions Have Been Updated Successfully!');
                                                 }
                                    });
                                }
                            });
                         }
            });
        });
    });
    
    $(function(){
        $('#side-btn-3').click(function(){
            $.ajax({
              'url'     : 'checkvals.php',
              'method'  : 'GET',
              'dataType' : 'html',
              'data'    : {desc3: 3},
              'success'  : function(response){
                            // show content to input field 
                            $('.view-players').html(response);
                  
                            
                            $('button[data-role=update]').click(function(){
                                var id = $(this).data('id');
                                var player = $('#'+id).children('td[data-target=nick]').text();
                                var status = $('#'+id).children('td[data-target=status]').text();

                                if(status == 'active'){
                                    if(confirm('Are you sure you want to ban ' + player + '?')){
                                
                                        $.ajax({
                                          'url'     : 'checkvals.php',
                                          'method'  : 'GET',
                                          'dataType' : 'html',
                                          'data'    : {id: id, status: status},
                                          'success'  : function(response){
                                                        // show content to input field 
                                                        $('#'+id).children('td[data-target=status]').text('banned');
                                                        $('#'+id).children('td[data-target=status]').removeClass('btn-active');
                                                        $('#'+id).children('td[data-target=status]').addClass('btn-inactive');
                                                        
                                                        $('.'+id).html('unban');
                                                     }
                                        });
                                    }
                                }
                                else if(status == 'banned'){
                                    if(confirm('Are you sure you want to unban ' + player + '?')){
                                
                                        $.ajax({
                                          'url'     : 'checkvals.php',
                                          'method'  : 'GET',
                                          'dataType' : 'html',
                                          'data'    : {id: id, status: status},
                                          'success'  : function(response){
                                                        // show content to input field 
                                                        $('#'+id).children('td[data-target=status]').text('active');
                                                        $('#'+id).children('td[data-target=status]').removeClass('btn-inactive');
                                                        $('#'+id).children('td[data-target=status]').addClass('btn-active');
                                              
                                                        $('.'+id).html('ban');
                                                     }
                                        });
                                    }
                                }
                                

                            });
                         }
            });
        });
    });
    

    
    
    
    
});
