<!DOCTYPE html>
<html lang="en">
<head>    
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Play Shades</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>	
    <link rel="stylesheet" href="scss/shades.css.min">
</head>

<body>
    <div class="wrap">
        <div class="container check-layout">
            <div class="card-holder check-layout">
                <?php			
					$out_value = array();
					$box_id_number = 1; //initialize id number				
				    $shade1 = 0; $shade2 = 0; $shade3 = 0; $shade4 = 0;
                
					for($i = 0; $i<4; $i++){
						for($j = 0; $j<4; $j++){
							
                            
                                $random = rand(1,4);
                                switch($random){
                                    case 1:
                                        $current_value = rand(1,20);//(1,15)(1,20)
                                        while(in_array($current_value,$out_value)){
                                            $current_value = rand(1,25);
                                        }

                                        $current_color = 'shade1';
                                        $shade1 += 1;
                                        break;

                                    case 2:
                                        $current_value = rand(6,30);//(10,25)(11,30)
                                        while(in_array($current_value,$out_value)){
                                            $current_value = rand(1,25);
                                        }

                                        $current_color = 'shade2';
                                        $shade2 += 1;
                                        break;

                                    case 3:
                                        $current_value = rand(13,40);//(20,35)(21,40)
                                        while(in_array($current_value,$out_value)){
                                            $current_value = rand(26,50);
                                        }

                                        $current_color = 'shade3';
                                        $shade3 += 1;
                                        break;	


                                    default:
                                        $current_value = rand(27,50);//(30,50)(31,50)
                                        while(in_array($current_value,$out_value)){
                                            $current_value = rand(26,50);
                                        }

                                        $current_color = 'shade4';
                                        $shade4 += 1;
                                        break;
                                }		
								
							echo "<div class='box-container'><div class='box " . $current_color . "' id='" . $box_id_number. "'><p>" . $current_value . "</p></div><div class='takip'></div></div>";
							
							$out_value[] = $current_value;
							$box_id_number += 1;
						}	
						//echo '<br />';
					}			
				?>
            </div>
        </div>
    </div>    
    
    <script src="js/prefixfree.min.js"></script>
    
</body>
</html>
