<?php
    require('config.php');
    include('includes/header.php');
?>

    <div class="wrap">
        <div class="container">
            <div class="col-6 title" id="tbl">
               <div class="valign-mid">
                    <p>shades</p>
                    <p class="desc">A casual memory game for everyone</p>
                    
                    <button class="btn-blue btn-big">Play</button>
                    <section class="modal-btn" id="how-to">
                        <a href="#">How to Play</a>
                    </section>
                    <section class="modal-btn" id="theme">
                        <a href="#">Light Theme</a>
                    </section>
                    <span class="creator">Made with &nbsp; &hearts; &nbsp; by Carl | Rhan | Shaun | Daniel</span>
               </div>                
            </div>
            <div class="col-6" id="tbl">
               <div class="valign-mid">
                   <img class="right" src="images/sample-card.png" alt="Sample Shades Container" />
                   
                   
               </div>             
            </div>
            
            <div class="modal-wrap login hidden">
                <div class="modal-container">
                    <div class="modal-head">
                        <h1>Login to shades</h1>
                    </div>
                    <div class="modal-body">
                        <form class="form-wrap" action="#" method="post">
                            <input type="email" name="email" placeholder="email">
                            <p class="valid valid-email">Please enter your registered email</p>
                            <input type="password" name="password" placeholder="password">
                            <p class="valid valid-email">Please enter your password</p>
                            <input class="btn-blue btn-wide" type="submit" value="sign in">
                        </form>
                        <a href="#" class="modal-btn">Or register an account</a>
                    </div>
                </div>
            </div>
            
            <div class="modal-wrap register">
                <div class="modal-container">
                    <div class="modal-head">
                        <h1>Register an account</h1>
                    </div>
                    <div class="modal-body">
                        <form class="form-wrap" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" id="reg-form">
                            <input type="email" name="reg-email" class="reg-email" placeholder="email">
                            <p class="valid valid-email">Please enter your email</p>
                            <input type="password" name="reg-pass" class="reg-pass" placeholder="password">
                            <p class="valid valid-pass">Please enter your password</p>
                            <input type="password" name="confirm-pass" class="confirm-pass" placeholder="confirm password">
                            <p class="valid valid-confirm-pass">Please retype your password</p>
                            <button class="js-btn btn-orange btn-wide" name="reg" id="reg" disabled>register</button>
                            
                            <?php
                                include('register.php');
                            ?>
                            <!--<div class="notice success"></div>-->
                        </form>
                        
                        <a href="#" class="modal-btn">I have an account</a>
                    </div>
                </div>
            </div>
            
            
        </div>
    </div>

<?php
    include('includes/footer.php');
?>