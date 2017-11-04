<?php
require('config.php');
/*
    Login Player
*/             
    
    if(isset($_POST['log'])){
        $code = rand(111111,999999);
        $email = $pass = $confirm_pass  = "";
        $email = clean_input($dbcon, $_POST['email']);
        $pass = clean_input($dbcon, md5($_POST['password']));
        
        $search_email = mysqli_query($dbcon, "SELECT * FROM tbl_players WHERE (email='$email' AND password='$pass')");
        $fetch_email = mysqli_num_rows($search_email);

        if($fetch_email === 0){
            setcookie('current-enotice', 'Invalid Email or Password', time()+5);
            redirect(SITE_URL);
            exit();
        }
        else{
            
            $check_user = mysqli_fetch_array($search_email);
            
            if($check_user['status'] == 'inactive'){
                setcookie("valid-code", $code);
                setcookie("current-email", $email);
                setcookie("current-enotice", "You haven't verified your account yet. Click <a href='verification.php' style='text-decoration: underline'>here</a> to verify.", time()+10);
                redirect(SITE_URL);
                exit();
                
            }
            
            else{
                $search_nickname = mysqli_fetch_assoc(mysqli_query($dbcon, "SELECT * FROM tbl_players WHERE email='$email'"));
                $get_nickname = $search_nickname['nickname'];
                
                $_SESSION['current_user'] = $get_nickname;
                redirect(SITE_URL . 'shades.php');
                exit();
            }
            
        }
    }
?>