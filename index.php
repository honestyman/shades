<?php
    require_once('config.php');
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
                            <input type="password" name="password" placeholder="password">
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
                        <form class="form-wrap" action="#" method="post">
                            <input type="email" name="reg-email" class="reg-email" placeholder="email">
                            <p class="valid valid-email" style="color: red">&nbsp;</p>
                            <input type="password" name="password" placeholder="password">
                            <p class="valid eml-valid" style="color: red">Please enter your password (Min: 8 characters)</p>
                            <input type="password" name="password-confirm" placeholder="confirm password">
                            <p class="valid eml-valid" style="color: red">Confirm your password</p>
                            <input class="btn-orange btn-wide" type="submit" value="register">
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