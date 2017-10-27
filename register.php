<?php
/*
    Register Player
*/

    if(isset($_POST['reg'])){
        $email = $pass = $confirm_pass  = "";
        $email = clean_input($dbcon, $_POST['reg-email']);
        $pass = clean_input($dbcon, md5($_POST['reg-pass']));
        
        
        $search_email = mysqli_query($dbcon, "SELECT email FROM tbl_players WHERE email = '$email'");
        $fetch_email = mysqli_num_rows($search_email);
        
        $registered = mysqli_num_rows(mysqli_query($dbcon, "SELECT * FROM tbl_players"));
        $nickname = 'Player' . strval($registered + 1);
        
        if($fetch_email > 0){
            echo "<div class='notice error'>That email has been registered already</div>";
        }
        else{
            $code = rand(111111,999999);
            $to = $email;
            $subject = 'Shades Account Verification';
            $content = '
            <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
            <html lang="en">
            <head>
              <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
              <meta name="viewport" content="width=device-width, initial-scale=1">
              <meta http-equiv="X-UA-Compatible" content="IE=edge">

              <title></title>

              <style type="text/css">
                  body{
                    font-family: HelveticaNeue-Light,Arial,sans-serif;
                    color: #6b6b6b;
                  }

                  table, tr, td{
                  }

                  .divider{
                      background-color: #0e47a3;
                      height: 5px;
                  }

              </style>    
            </head>
            <body style="margin:0; padding:0; background-color:#F2F2F2;">
              <center>
                <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#eeeeee">
                    <tr>
                        <td align="center" valign="top">
                            <table width="640" cellspacing="0" cellpadding="0" border="0" align="center" style="max-width:640px; width:100%;" bgcolor="#FFFFFF">
                              <tr>
                                <td align="center" valign="top" style="padding:10px;">

                                  <table width="600" cellspacing="0" cellpadding="0" border="0" align="center" style="max-width:600px; width:100%;">
                                    <tr>
                                      <td align="center" valign="top" style="padding:10px;">
                                        <img src="https://gallery.mailchimp.com/61d201889df941e467484086f/images/6a68b547-8fbc-4a3c-b2e3-59f752cd8de6.png" width="" height="" style="margin:0; padding:0; border:none; display:block;" border="0" alt="" /> 
                                      </td>
                                    </tr>
                                  </table>  
                                </td>
                              </tr>
                              <tr>
                                <td class="divider" align="center" valign="top">
                                    &nbsp;
                                </td>
                              </tr>
                              <tr>
                                <td align="center" valign="top">
                                    <h1>Thanks for registering to Shades.</h1>
                                </td>
                              </tr>
                              <tr>
                                <td align="left" valign="top" style="padding: 0 30px;">
                                    <p>Greetings!</p>
                                    <p>We\'ve given you a code to complete your account registration. This is essential for the team to verify that everyone who registers to our system is a human being. </p>
                                    <h1>CODE:' . $code .'</h1>
                                    <p>Enjoy playing Shades! We\'re looking to see your name on our Leaderboard soon.</p>
                                    <p>Regards,</p>
                                    <p>The Shades Team</p>
                                </td>
                              </tr>
                              <tr>
                                <td height="10" style="font-size:10px; line-height:10px;">&nbsp;</td>
                              </tr>
                              <tr>
                                <td align="center" valign="top">
                                    <p style="color: gainsboro; font-size: 12px;">Copyright © 2017 | The Shades Team | All rights reserved.</p>
                                    <p style="color: gainsboro; font-size: 12px; font-weight: bold;">You are receiving this email because you\'ve registered on  http://www.shade-online.com</p>
                                </td>
                              </tr>
                              <tr>
                                <td height="10" style="font-size:10px; line-height:10px;">&nbsp;</td>
                              </tr>                     
                            </table> 

                        </td>
                    </tr>
                </table>
              </center>
            </body>
            </html>
            ';
            
            // Set content-type for sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            // Additional headers
            $headers .= 'From: The Shades Team' . "\r\n";
            $headers .= 'Cc: vicismedia206@gmail.com' . "\r\n";
            
            //if(mail($to, $subject, $content, $headers)){
                
            
                $insert = "INSERT INTO tbl_players (email, password, nickname, best_score, status) VALUES ('$email', '$pass', '$nickname', 0, 'inactive')";  
                if(mysqli_query($dbcon, $insert)){
                    echo "<div class='notice success'>Registration Successful. Check your email to verify this account</div>";
                    
                    setcookie("valid-code", $code);
                    setcookie("current-email", $email);
                    header("location: verification.php");
                    exit();
                }
                else{
                    echo "<div class='notice error'>Can't process your request right now.</div>";
                }
                
            /*}
            else{
                echo "<div class='notice error'>Email error</div>";
            }*/
                
            
        }

        

    }
?>