<?php
    require('config.php');
    if(!accessVerification()){
        redirect("index.php");
        exit();
    }

    include('includes/header.php');
?>

<div class="wrap">
    <div class="container">
        
        
            <?php
                if(isset($_COOKIE['current-snotice'])){
                    echo '<div class="notice notice-gen success">' . $_COOKIE['current-snotice'] . '</div>';
                }
        
                elseif(isset($_COOKIE['current-enotice'])){
                    echo '<div class="notice notice-gen error">' . $_COOKIE['current-enotice'] . '</div>';
                }
            ?>
        
        <div class="modal-wrap verify">
                
                <div class="modal-container">
                    <div class="modal-head">
                        <h1>Verify Your Account</h1>
                    </div>
                    <div class="modal-body">
                        <form class="form-wrap" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" id="verification-form">
                            <input type="text" name="code" class="code" placeholder="verification code">
                            <p class="valid valid-code">Please enter the code we've sent to you</p>
                            <input type="text" name="nick" class="nick" placeholder="nickname">
                            <p class="valid valid-nick">Please give yourself a nickname</p>
                            <button class="js-btn btn-orange btn-wide" name="verify" id="verify" disabled>verify</button>
                            
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
                                        
                                        setcookie('current-snotice', 'Hi ' . $nickname . '! Your account has been verified successfully. Please login to play.', time()+5);
                                        setcookie("valid-code", '', time()-3600);
                                        setcookie("current-email", '', time()-3600);
                                        redirect(SITE_URL);
                                        exit();
                                    }
                                    else{
                                        setcookie('current-enotice', 'Can\'t process your request right now.');
                                        //echo "<div class='notice error'>Can't process your request right now.</div>";
                                    }
                                }

                            }

                            ?>
                            <div class='thecode'><?php echo $_COOKIE['valid-code']; ?></div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
</div>
<?php
    include('includes/footer.php');
?>