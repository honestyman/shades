<?php
    require('config.php');
    include('includes/header.php');
?>

<div class="wrap hidden">
    <div class="container">
       <div class="col-12" id="tbl">
          <div class="valign-mid error-page">
              <div class="title"><p>ERROR 403</p></div>
              <a href="<?php echo SITE_URL; ?>"><img src="<?php echo SITE_URL . 'images/shades-logo-w80.png'; ?>" alt="Shades Logo" /></a>
              <p class="def-text">You cannot access this file or directory</p>
              <a href="<?php echo SITE_URL; ?>" class="modal-btn">Please get me back to home</a>
          </div>
       </div>
    </div>
</div>
<?php
    include('includes/footer.php');
?>