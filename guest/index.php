<?php
    require('../config.php');

    $x = SITE_URL;
    $SITE_URL = str_replace('guest/','',$x);   

    include('../includes/header.php');
?>

<div class="wrap hidden">
    <div class="container">
        <div class="hey" style="position: absolute;">
            <section class="btn-wide btn-blue" id="leaderboard" style="margin-top: 50px; text-align: center;">
                <span>leaderboard</span>
            </section>
            
            <section class="title">
                <p style="font-size: 1.5em; margin-top: 30px;">Level: <span class="level"></span></p>
                
                <p style="font-size: 1.5em; margin-top: 20px;">Lives: <span class="lives"></span></p>
                <p style="font-size: 1.5em; margin-top: 20px;">Guide 
                </p>
                <ul class="shade-guide clearfix" style="margin-top: 10px;">
                    <li class="g-shade1"></li>
                    <li class="g-shade2"></li>
                    <li class="g-shade3"></li>
                    <li class="g-shade4"></li>
                </ul>
            </section>
        </div>
        <div class="game-container js-div" id="tbl">

            <div class="card-holder">
                
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
                        <p class="best-here">0</p>
                    </section>
                </div>
                
                <div class="card-body clearfix">
                    <div class="card-message">
                        <div class="show-score hidden"><h3>New Best Score: <span class="best-score"></span ></h3></div>
                        <div class="card-message-head"><h1>Take the challenge!</h1></div>
                        <button class="btn btn-default btn-orange" style="font-size: 2em" id="game-btn">Start</button>
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
            </div>
            
        </div>
        
        
    </div>   
    <?php
        include('../includes/howto.php');
        include('../includes/leaderboard.php');
    ?>     
</div>      
<?php
    include('../includes/footer.php');
?>
