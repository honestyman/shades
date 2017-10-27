<?php
    require('config.php');
    if(!accessVerification()){
        redirect("index.php");
        exit();
    }

    include('includes/header.php');
?>

<div class="wrap">
    <div class="container">
        <div class="modal-wrap verify">
                <div class="notice success">You're almost there! Please supply the needed information to complete your registration. </div>
                <div class="modal-container">
                    <div class="modal-head">
                        <h1>Verify Your Account</h1>
                    </div>
                    <div class="modal-body">
                        <form class="form-wrap" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" id="verification-form">
                            <input type="text" name="code" class="code" placeholder="verification code">
                            <p class="valid valid-code">Please enter the code we've sent to you</p>
                            <input type="text" name="nick" class="nick" placeholder="nickname">
                            <p class="valid valid-nick">Please give yourself a nickname</p>
                            <button class="js-btn btn-orange btn-wide" name="verify" id="verify" disabled>verify</button>
                            
                            <?php
                                include('verifycode.php');
                            ?>
                            <div class='thecode'><?php echo $_COOKIE['valid-code']; ?></div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
</div>
<?php
    include('includes/footer.php');
?>