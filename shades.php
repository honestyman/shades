<?php
    require_once('config.php');
    include('includes/header.php');

    if(!loggedInUser()){
        redirect(SITE_URL);
        exit;
    }
?>


<div class="wrap hidden">
    <div class="container">
        <div class="hey" style="position: absolute;">
            <img src="images/shades-logo-w80.png" alt="Shades Logo" />
            <div class="answers" style="display: none">
                <p>Path 1 = <span class="path1"></span></p>
                <p>Path 2 = <span class="path2"></span></p>
                <p>Path 3 = <span class="path3"></span></p>
                <p>Path 4 = <span class="path4"></span></p>
            </div>
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
        <!--<div class="right" id="#">
            <a href="btn">leaderboard</a>
        </div>-->
    </div>        
</div>    

<?php
    include('includes/footer.php');
?>

