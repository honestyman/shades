<?php

    include('config.php');

    if(isset($_POST['a'])){
        $email = $_POST['a'];
        
        $check_email = mysqli_query($dbcon, "SELECT email FROM tbl_players WHERE email = '$email'");
        $fetch_email = mysqli_num_rows($check_email);
        
        if($fetch_email > 0){
            echo "This email has been registered already";
        }
        else{
            echo "Good to go!";
        }
    }

?>