<?php
require('../config.php');
/*
    Login Admin
*/             
    
    if(isset($_POST['log-admin'])){
        $admin = $pass = "";
        $admin = clean_input($dbcon, $_POST['admin']);
        $pass = clean_input($dbcon, md5($_POST['adminpass']));
        
        $search_admin = mysqli_query($dbcon, "SELECT * FROM tbl_admin WHERE (admin_user='$admin' AND admin_pass='$pass')");
        $fetch_admin = mysqli_num_rows($search_admin);

        if($fetch_admin === 0){
            setcookie('current-enotice', 'Invalid Admin Username or Password', time()+5);
            redirect(SITE_URL);
            exit();
        }
        else{

            $_SESSION['current_admin'] = $admin;
            redirect(SITE_URL . 'admin.php');
            exit();            
        }
    }
?>