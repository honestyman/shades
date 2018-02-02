<?php 
    include('../config.php');
        
    /*$x = SITE_URL;
    $SITE_URL = str_replace('guest/','',$x);*/

    $admin = $_SESSION['current_admin'];

    if(isset($_GET['desc'])){
        $desc = mysqli_fetch_assoc(mysqli_query($dbcon ,"SELECT * FROM tbl_content WHERE title = 'Game Description'"));
        $tagline  = mysqli_fetch_assoc(mysqli_query($dbcon ,"SELECT * FROM tbl_content WHERE title = 'Game Tagline'"));
        $btn = mysqli_fetch_assoc(mysqli_query($dbcon ,"SELECT * FROM tbl_content WHERE title = 'Button Copy'"));
        $footer = mysqli_fetch_assoc(mysqli_query($dbcon ,"SELECT * FROM tbl_content WHERE title = 'Page Footer'"));

        echo '<textarea name="game-desc" placeholder="About the Game" class="game-desc">' . $desc['content'] . '</textarea>
        <p class="valid valid-input">To update your game description, edit the content above</p>
        <input type="text" name="game-tagline" value="' . $tagline['content'] . '" placeholder="Tagline" class="game-tagline">
        <p class="valid valid-input">To update your game tagline, edit the value above</p>
        <input type="text" name="home-play-btn" value="' . $btn['content'] .'" placeholder="Button Copy" class="home-play-btn">
        <p class="valid valid-input">To change your play button text, edit the value above</p>
        <input type="text" name="page-footer" value="' . $footer['content'] . '" placeholder="Page Footer" class="page-footer">
        <p class="valid valid-input">To change the footer, edit the value above</p>
        <button class="btn-blue btn-wide" name="update-content" id="update-content">update</button>';
    }

    if(isset($_GET['desc2'])){
            $step1 = mysqli_fetch_assoc(mysqli_query($dbcon ,"SELECT * FROM tbl_howto WHERE title = 'Step 1'"));
            $step2  = mysqli_fetch_assoc(mysqli_query($dbcon ,"SELECT * FROM tbl_howto WHERE title = 'Step 2'"));
            $step3 = mysqli_fetch_assoc(mysqli_query($dbcon ,"SELECT * FROM tbl_howto WHERE title = 'Step 3'"));
            $step4 = mysqli_fetch_assoc(mysqli_query($dbcon ,"SELECT * FROM tbl_howto WHERE title = 'Step 4'"));

            echo '<textarea name="step1" placeholder="Step 1 here" class="step">' . $step1['content'] . '</textarea>
            <p class="valid valid-input">Contents of step 1</p>
            <textarea name="step2" placeholder="Step 2 here" class="step">' . $step2['content'] . '</textarea>
            <p class="valid valid-input">Contents of step 2</p>
            <textarea name="step3" placeholder="Step 3 here" class="step">' . $step3['content'] . '</textarea>
            <p class="valid valid-input">Contents of step 3</p>
            <textarea name="step4" placeholder="Step 4 here" class="step">' . $step4['content'] . '</textarea>
            <p class="valid valid-input">Contents of step 4</p>

            <button class="btn-blue btn-wide" name="update-how-to" id="update-how-to">update</button>';
        }

    if(isset($_GET['desc3'])){ ?>
        <h1>Registered Players</h1>
        <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Email</th>
                        <th>Player</th>
                        <th>Date Registered</th>
                        <th>Last Game</th>
                        <th>Best Level</th>
                        <th>Best Score</th>
                        <th>Status</th>
                        <th>Ban/Unban</th>
                    </tr>
                </thead>
                
                <tbody>
                   <?php $table  = mysqli_query($dbcon ,'SELECT * FROM tbl_players');
                    $id = 0;
                    while($row  = mysqli_fetch_array($table)){ 
                    $date_reg = strtotime($row['date_last_played']);
                    $date_played = strtotime($row['date_last_played']);
                    ?>
                    <tr id="<?php echo $row['id'] ?>"> 
                        <td><?php echo ++$id ?> </td>
                        <td><?php echo $row['email'] ?></td>
                        <td data-target="nick"><?php echo $row['nickname'] ?> </td>
                        <td><?php echo  date("m/d/y", $date_reg) ?></td>
                        <td><?php echo date("m/d/y", $date_played) ?></td>
                        <td><?php echo  $row['best_level'] ?></td>
                        <td><?php echo  $row['best_score'] ?></td>
                        <td data-target="status" class="<?php
                                   if($row['status'] == 'active')
                                       echo 'btn-active';
                                   else
                                       echo 'btn-inactive';
                                   
                                   ?>"><?php echo  $row['status'] ?></td>
                        <td class="btn-inactive" id="<?php echo $row['status'] ?>">
                           <button class="ban-btn <?php echo $row['id'] ?>" data-role="update" data-id="<?php echo $row['id'] ?>" <?php
                            if($row['status'] == 'inactive')
                                echo 'disabled';
                        ?> type="button"> <?php if($row['status'] == 'banned'){echo 'unban';}  else echo 'ban'; ?> </button></td>
                    </tr>
                    <?php } ?>
                    
                </tbody>
                
        </table>
    <?php }

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $status = $_GET['status'];
        
        if($status == 'active')
            mysqli_query($dbcon, "UPDATE tbl_players SET status = 'banned' WHERE id = '$id'");
        elseif($status = 'banned')
            mysqli_query($dbcon, "UPDATE tbl_players SET status = 'active' WHERE id = '$id'");
    }

    if(isset($_POST['step1']) || isset($_POST['step2']) || isset($_POST['step3']) || isset($_POST['step4'])){
        $step1 = clean_input($dbcon, $_POST['step1']);
        $step2 = clean_input($dbcon, $_POST['step2']);
        $step3 = clean_input($dbcon, $_POST['step3']);
        $step4 = clean_input($dbcon, $_POST['step4']);
        
        mysqli_query($dbcon, "UPDATE tbl_howto SET content = '$step1' WHERE title = 'Step 1'");
        mysqli_query($dbcon, "UPDATE tbl_howto SET content = '$step2' WHERE title = 'Step 2'");
        mysqli_query($dbcon, "UPDATE tbl_howto SET content = '$step3' WHERE title = 'Step 3'");
        mysqli_query($dbcon, "UPDATE tbl_howto SET content = '$step4' WHERE title = 'Step 4'");
    }

    if(isset($_POST['about']) || isset($_POST['tagline']) || isset($_POST['btn_copy']) || isset($_POST['page_footer'])){
        $about = clean_input($dbcon, $_POST['about']);
        $tagline = clean_input($dbcon, $_POST['tagline']);
        $btn_copy = clean_input($dbcon, $_POST['btn_copy']);
        $page_footer = clean_input($dbcon, $_POST['page_footer']);
        
        mysqli_query($dbcon, "UPDATE tbl_content SET content = '$about' WHERE title = 'Game Description'");
        mysqli_query($dbcon, "UPDATE tbl_content SET content = '$tagline' WHERE title = 'Game Tagline'");
        mysqli_query($dbcon, "UPDATE tbl_content SET content = '$btn_copy' WHERE title = 'Button Copy'");
        mysqli_query($dbcon, "UPDATE tbl_content SET content = '$page_footer' WHERE title = 'Page Footer'");
        
    }
    
?>