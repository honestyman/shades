<?php
    require('../config.php');    

    $x = SITE_URL;
    $SITE_URL = str_replace('shdscms/','',$x); 
    
    include('../includes/header.php');

    if(!loggedInAdmin()){
        setcookie('current-enotice', 'You are not logged in', time()+5);
        redirect(SITE_URL);
        exit;
    }

    $admin = $_SESSION['current_admin'];
?>
<div class="wrapper hidden">
    <div class="row">
        <!-- MENU SIDE BAR -->
        <div class="cms-aside col-3 title">            
            <div class="valign-mid" style="text-align: center;">
                <p class="asdf">shades</p>
                <div class="js-div">
                    <p class="desc">A casual memory game for everyone</p>
                    
                    <section class="modal-btn" id="how-to">
                        <a href="<?php echo $SITE_URL; ?>" target="_blank"><span>Visit Website</span></a>
                    </section>
                    <section class="modal-btn" id="side-btn-1">
                        <span>Manage Content</span>
                    </section>
                    <section class="modal-btn" id="side-btn-2">
                        <span>Manage How To</span>
                    </section>
                    <section class="modal-btn" id="side-btn-3">
                        <span>View Players</span>
                    </section>                    
                    <section class="modal-btn">
                        <span id="theme">Light Theme</span>
                    </section>
                    <section class="modal-btn" id="logout">
                        <a href="<?php echo SITE_URL . 'logout.php'; ?>"><span>Logout</span></a>
                    </section>
                </div>                
            </div>
        </div>
        <!-- MENU SIDE BAR -->
        
        <div class="cms-body col-9">
            <!-- WELCOME DIV -->
            <div class="js-div content-center welcome visible">
                <h1>Hi Admin <?php echo $admin; ?>!</h1>
                <p class="kicker">what do you want to do?</p>
                <p class="kicker">please choose an action on the admin dashboard</p>
            </div>
            <!-- WELCOME DIV -->
            
            <!-- MANAGE CONTENT FORM -->
            <div class="content-main manage-content hidden">
                <h1>Manage Content</h1>
                <form class="form-wrap" method="post" action="<?php echo htmlspecialchars(SITE_URL) ?>" id="admin-form1">
                         
                </form>
            </div>
            <!-- MANAGE CONTENT FORM -->
            
            <!-- MANAGE HOW TO CONTENT FORM -->
            <div class="content-main manage-how-to hidden">
                <h1>Manage How To</h1>
                <form class="form-wrap" method="post" action="<?php echo htmlspecialchars(SITE_URL) ?>" id="admin-form2">
                        
                </form>
            </div>
            <!-- MANAGE HOW TO CONTENT FORM -->
                
            <!-- VIEW PLAYERS -->
            <div class="content-main view-players hidden">
                
                
            </div>
            <!-- VIEW PLAYERS -->
            
        </div>
    </div>
</div>
<?php
    include('../includes/footer.php');
?>