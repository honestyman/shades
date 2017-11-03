<?php
    require('config.php');
    if(loggedInUser()){
        redirect(SITE_URL . 'shades.php');
        exit();
    }

    include('includes/header.php');
?>

    <div class="wrap hidden">
        <div class="container">
            <?php
                if(isset($_COOKIE['current-snotice'])){
                    echo '<div class="notice notice-gen success">' . $_COOKIE['current-snotice'] . '</div>';
                }
        
                elseif(isset($_COOKIE['current-enotice'])){
                    echo '<div class="notice notice-gen error">' . $_COOKIE['current-enotice'] . '</div>';
                }
            ?>
            <div class="col-6 title" id="tbl">
               <div class=" valign-mid">
                    <p class="shades">shades</p>
                    <div class="js-div">
                        <p class="desc">A casual memory game for everyone</p>  
                    
                        <button class="btn-blue btn-big" id="js-play-btn">Play</button>
                        <section class="modal-btn" id="how-to">
                            <span>How to Play</span>
                        </section>
                        <section class="modal-btn" id="theme">
                            <span>Light Theme</span>
                        </section>
                        <span class="creator">Made with &nbsp; &hearts; &nbsp; by Carl | Rhan | Shaun | Daniel</span>
                    </div>
                    
               </div>                
            </div>
            <div class="col-6" id="tbl">
               <div class="valign-mid">
                   <img class="right" src="images/sample-card.png" alt="Sample Shades Container" id="js-card-image" />                   
               </div>             
            </div>
            
            <div class="modal-wrap login hidden">
                <span class="modal-close"></span>
                <div class="modal-container">
                    <div class="modal-head">
                        <h1>Login to play</h1>
                    </div>
                    <div class="modal-body">
                        <form class="form-wrap" method="post" action="<?php echo htmlspecialchars(SITE_URL . 'login.php') ?>" id="log-form">
                            <input type="email" name="email" placeholder="email" class="log-email">
                            <p class="valid valid-log-email">Please enter your registered email</p>
                            <input type="password" name="password" placeholder="password" class="log-pass">
                            <p class="valid valid-log-pass">Please enter your password</p>
                            <button class="js-btn btn-blue btn-wide" name="log" id="log" disabled>sign in</button>     
                        </form>
                        <a href="#" class="modal-btn link-to-reg">Or register an account</a>
                    </div>
                </div>
            </div>
            
            <div class="modal-wrap register hidden">
                <span class="modal-close"></span>
                <div class="modal-container">
                    <div class="modal-head">
                        <h1>Register an account</h1>
                    </div>
                    <div class="modal-body">
                        <form class="form-wrap" action="<?php echo htmlspecialchars(SITE_URL . 'register.php') ?>" method="post" id="reg-form">
                            <input type="email" name="reg-email" class="reg-email" placeholder="email">
                            <p class="valid valid-email">Please enter your email</p>
                            <input type="password" name="reg-pass" class="reg-pass" placeholder="password">
                            <p class="valid valid-pass">Please enter your password</p>
                            <input type="password" name="confirm-pass" class="confirm-pass" placeholder="confirm password">
                            <p class="valid valid-confirm-pass">Please retype your password</p>
                            <button class="js-btn btn-orange btn-wide" name="reg" id="reg" disabled>register</button>  
                        </form>
                        
                        <a href="#" class="modal-btn link-to-log">I have an account</a>
                    </div>
                </div>
            </div>
            
            
        </div>
    </div>

<?php
    include('includes/footer.php');
?>