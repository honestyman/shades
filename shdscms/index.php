<?php
    require('../config.php');

    $x = SITE_URL;
    $SITE_URL = str_replace('shdscms/','',$x);   

    include('../includes/header.php');

    if(loggedInAdmin()){
        redirect(SITE_URL . 'admin.php');
        exit();
    }
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
        <div class="col-12 title" id="tbl">
           <div class="valign-mid" style="text-align: center;">
                <p class="shades">shades</p>
                <div class="js-div">
                    <p class="desc">A casual memory game for everyone</p>  

                    <button class="btn-blue btn-big" id="js-play-btn">admin</button>
                    <section class="modal-btn" id="theme">
                        <span>Light Theme</span>
                    </section>
                    <span class="creator">Made with &nbsp; &hearts; &nbsp; by Carl | Rhan | Shaun | Daniel</span>
                </div>

           </div>                
        </div>

    </div>
    <div class="modal-wrap login hidden">
        <span class="modal-close"></span>
        <div class="modal-container">
            <div class="modal-head">
                <h1>Admin Login</h1>
            </div>
            <div class="modal-body">
                <form class="form-wrap" method="post" action="<?php echo htmlspecialchars($SITE_URL . 'shdscms/login.php') ?>" id="log-form">
                    <input type="text" name="admin" placeholder="username" class="log-admin-user">
                    <p class="valid valid-admin-user">Please enter your username</p>
                    <input type="password" name="adminpass" placeholder="password" class="log-admin-pass">
                    <p class="valid valid-admin-pass">Please enter your password</p>
                    <button class="js-btn btn-blue btn-wide" name="log-admin" id="log-admin" disabled>sign in</button>     
                </form>
                <a class="modal-btn" href="<?php echo $SITE_URL ?>" style="margin-top: 10px;">Get back to Home</a>
            </div>
        </div>
    </div>
        

    <?php
        include('../includes/howto.php');
    ?>
</div>

<?php
    include('../includes/footer.php');
?>