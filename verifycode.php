<?php
/*
    Verify Player
*/ 
if(isset($_POST['verify'])){
    $code = $nickname = "";
    $code = clean_input($dbcon, $_POST['code']);
    $nickname = clean_input($dbcon, $_POST['nick']);
    $user_to_update = $_COOKIE['current-email'];
    
    $search_nick = mysqli_query($dbcon, "SELECT nickname FROM tbl_players WHERE nickname = '$nickname'");
    $fetch_nick = mysqli_num_rows($search_nick);
    
    if($fetch_nick > 0){
        echo "<div class='notice error'>Someone has that nickname already. Please choose anoher nickname.</div>";
    }
    else{
        $query = "UPDATE tbl_players SET nickname = '$nickname', status = 'active' WHERE email =  '$user_to_update'";  
        if(mysqli_query($dbcon, $query)){
            echo "<div class='notice success'>Success</div>";

            setcookie("valid-code", '', time()-3600);
                    setcookie("current-email", '', time()-3600);
            header("location: index.php");
            exit();
        }
        else{
            echo "<div class='notice error'>Can't process your request right now.</div>";
        }
    }
    
}

?>