<?php
    require_once('config.php');
    include('includes/header.php');
?>


<div class="wrap">
    <div class="container">
        <div class="left">
            <img src="images/shades-logo-w80.png" alt="Shades Logo" style="margin-top: 10; cursor: pointer;" onclick="generateBoxes()" />
            <div class="answers" style="display: none">
                <p>Path 1 = <span class="path1"></span></p>
                <p>Path 2 = <span class="path2"></span></p>
                <p>Path 3 = <span class="path3"></span></p>
                <p>Path 4 = <span class="path4"></span></p>
            </div>
        </div>
        <div class="col-mid" id="tbl">

            <div class="card-holder valign-mid">
                <div class="card-header">
                <section class="card-content" id="score">
                    <p>SCORE</p>
                    <p class="score-here">0</p>
                </section>
                <section class="card-content" id="title">
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
                    <section class="card-content left" id="how-to">
                    <p>How to Play</p>
                    </section>
                    <section class="card-content" id="time">
                        <h1>TIME</h1>
                        <h1>:<span class="secs">10</span></h1>
                    </section>
                    <section class="card-content right" id="theme">
                        <p>Light Theme<p>
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

