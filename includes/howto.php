<div class="modal-wrap how-to hidden">
    <span class="modal-close"></span>
    <div class="modal-container modal-how-to">
        <div class="modal-body">
            <div class="row">
                <div class="col-6">
                    <img src="<?php  echo $SITE_URL . 'images/shade-how-to.png'?>" alt="Shades Sample Card">
                </div>
                <div class="col-6">
                    <div class="row">
                        <div class="modal-head">
                            <h1>How to Play</h1>
                        </div>
                            <p>step 1: &nbsp;
                            <?php
                                $step1 = mysqli_fetch_assoc(mysqli_query($dbcon ,"SELECT * FROM tbl_howto WHERE title = 'Step 1'"));
                                echo $step1['content'];
                            ?>
                            </p>
                            <ul class="shade-guide clearfix">
                                <li class="shade1"></li>
                                <li class="shade2"></li>
                                <li class="shade3"></li>
                                <li class="shade4"></li>
                            </ul>
                            <p>step 2: &nbsp;
                            <?php
                                $step2  = mysqli_fetch_assoc(mysqli_query($dbcon ,"SELECT * FROM tbl_howto WHERE title = 'Step 2'"));
                                echo $step2['content'];
                            ?>
                            </p>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <img src="<?php echo $SITE_URL . 'images/shades-ans.png'?>" alt="Shades Sample Card 2">
                        </div>
                        <div class="col-6">
                            <p>So the proper sequence for this example is:</p>
                            <ul class="shade-guide clearfix">
                                <li class="shade1"><p>7</p></li>
                                <li class="shade2"><p>3</p></li>
                                <li class="shade3"><p>1</p></li>
                                <li class="shade4"><p>11</p></li>
                            </ul>
                            <p style="clear: left;">You have 15 seconds to memorize the values, the grid's shades and number values will be covered after. You can then click each box for the proper sequence.</p>
                        </div>
                    </div>
                    <div class="row">
                        <p>step 3: &nbsp;&nbsp;
                        <?php
                            $step3 = mysqli_fetch_assoc(mysqli_query($dbcon ,"SELECT * FROM tbl_howto WHERE title = 'Step 3'"));
                            echo $step3['content'];
                        ?>
                        </p>
                        <p>step 4: &nbsp;
                        <?php
                            $step4 = mysqli_fetch_assoc(mysqli_query($dbcon ,"SELECT * FROM tbl_howto WHERE title = 'Step 4'"));
                            echo $step4['content'];
                        ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>