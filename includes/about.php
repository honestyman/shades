<div class="modal-wrap about hidden">
    <span class="modal-close"></span>
    <div class="modal-container modal-about">
        <div class="modal-head">
            <h1>About Shades</h1>
        </div>
        <div class="modal-body" id="about-content">
            <p style="margin-top: 20px;">
                <?php 
            
                    $content  = mysqli_fetch_assoc(mysqli_query($dbcon ,"SELECT * FROM tbl_content WHERE title = 'Game Description'"));

                    echo $content['content'];
                ?>
            </p>
                    
        </div>
    </div>
</div>