<?php
require('config.php');
/*
    Login Player
*/             
    
    if(isset($_POST['log'])){
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
            $get_nickname = mysqli_query($dbcon, "SELECT nickname FROM tbl_players WHERE email='$email'");
            
            
            $_SESSION['current-user'] = $get_nickname;
            redirect(SITE_URL . 'shades.php');
            exit();
        }
    }
?>