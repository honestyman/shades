<?php
    require_once('config.php');
    include('includes/header.php');
?>


<div class="wrap">
    <div class="container">
        <div class="left">
            <img src="images/shades-logo-w80.png" alt="Shades Logo" />
            <div class="answers" style="display: none">
                <p>Path 1 = <span class="path1"></span></p>
                <p>Path 2 = <span class="path2"></span></p>
                <p>Path 3 = <span class="path3"></span></p>
                <p>Path 4 = <span class="path4"></span></p>
            </div>
        </div>
        <div class="col-mid" id="tbl">

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


            </div>
            <div class="card-footer">
               <div class="container">
                    <section class="card-content modal-btn left" id="how-to">
                        <a href="#">How to Play</a>
                    </section>
                    <section class="card-content" id="time">
                        <h1>TIME</h1>
                        <h1>:<span class="secs">10</span></h1>
                    </section>
                    <section class="card-content modal-btn right" id="theme">
                        <a href="#">Light Theme</a>
                    </section> 
               </div>                                      
            </div>
        </div>
        <div class="right" id="#">
            <a href="btn">leaderboard</a>
        </div>
    </div>        
</div>    

<?php
    include('includes/footer.php');
?>

