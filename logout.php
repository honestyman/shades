<?php

    require('config.php');

    session_destroy();

    redirect(SITE_URL);
?>