<?php
    require_once('config.php');
    include('includes/header.php');

    if(!loggedInUser()){
        redirect(SITE_URL);
        exit;
    }

    $player = "";
    $player = $_SESSION['current_user'];
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
        
        <div class="game-container js-div" id="tbl">
            
            
            <div class="card-holder">
                <?php
                    $search_user = mysqli_fetch_assoc(mysqli_query($dbcon, "SELECT * FROM tbl_players WHERE nickname='$player'"));
                    $best = $search_user['best_score'];
                ?>
                <div class="card-header">
                    <section class="card-content" id="score">
                        <p>SCORE</p>
                        <p class="score-here">0</p>
                    </section>
                    <section class="card-content title">
                        <p>shades</p>
                    </section>
                    <section class="card-content" id="best">
                        <p>BEST<p>
                        <p class="best-here"><?php echo $best; ?></p>
                    </section>
                </div>
                
                <div class="card-body clearfix">
                    <div class="card-message">
                        <div class="show-score hidden"><h3>New Best Score: <span class="best-score"></span ></h3></div>
                        <div class="card-message-head"><h1>Take the challenge!</h1></div>
                        <button class="btn btn-default btn-orange game-btn" style="font-size: 2em" id="game-btn">Start</button>
                    </div>
                </div>
                
                <div class="card-footer">
                        <section class="card-content modal-btn left" id="how-to">
                            <span>How to Play</span>
                        </section>
                        <section class="card-content" id="time">
                            <h1>TIME</h1>
                            <h1>:<span class="secs">0</span></h1>
                        </section>
                        <section class="card-content modal-btn right" id="theme">
                            <span>Light Theme</span>
                        </section>                                
                </div>
                
                <!-- Absolute divs for Displaying Information-->
                
                <div class="hey" style="position: absolute; top: 0; left: -300px; text-align: left">
                    <section class="btn-wide btn-blue" id="leaderboard" style="margin-top: 50px; text-align: center;">
                        <span>leaderboard</span>
                    </section>
    
                    <section class="title">
                        <p style="font-size: 1.2em; margin-top: 70px;">Level: <span class="level"></span></p>

                        <p style="font-size: 1.2em; margin-top: 20px;">Lives: <span class="lives"></span></p>
                        <p style="font-size: 1.2em; margin-top: 20px;">Guide 
                        </p>
                        <ul class="shade-guide clearfix" style="margin-top: 10px;">
                            <li class="g-shade1"></li>
                            <li class="g-shade2"></li>
                            <li class="g-shade3"></li>
                            <li class="g-shade4"></li>
                        </ul>
                    </section>
                    
                    
                </div>

                <div class="profile">
                   <div style="text-align: right">
                       <p >Hi <?php echo $player; ?>!</p>
                        <a class="modal-btn" href="<?php echo SITE_URL . 'logout.php'; ?>">logout</a>
                        
                        <?php
                            
                            $user = $_SESSION['current_user'];
                            
                            //fetch player's information
                            $search_user = mysqli_fetch_assoc(mysqli_query($dbcon, "SELECT * FROM tbl_players WHERE nickname='$user'"));
                       
                            $bestlevel = $search_user['best_level'];
                            $bestscore = $search_user['best_score'];
                            $date_played = strtotime($search_user['date_last_played']);
                            
                        ?>
                        <section class="title">
                            <p>Best Level Reached</p>
                            <span class="bestlevel"><?php echo $bestlevel; ?></span>
                            <p>Best Score Attained</p>
                            <span class="highscore"><?php echo $bestscore; ?></span>
                            <p>Last Date Played</p>
                            <span class="last-active"><?php echo date("m/d/y", $date_played); ?></span>
                        </section>
                   </div>
                </div>
                      
                <!-- Absolute divs for Displaying Information-->   
            </div>
            
        </div>
        
    </div>  
    <?php
        include('includes/howto.php');
        include('includes/leaderboard.php');
    ?>      
</div>  

<?php
    include('includes/footer.php');
?>

