<?php
/*
    This file consists variables and functions used for he SHADES website. 
    Date Created: October 21, 2017
    Author: rhanmiano
*/

define('SITE_NAME', 'SHADES');
define('PROTOCOL', 'https://');
define('DOMAIN',$_SERVER['HTTP_HOST']);
define('SITE_URL', preg_replace("/\/$/",'',PROTOCOL.DOMAIN.str_replace(array('\\',"index.php","index.html"), '', dirname(htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES))),1).'/',true);// Remove backslashes for Windows compatibility

$SITE_URL = SITE_URL;
    
//As webpage opens start session
session_start();

//Variables Declaration;
$page_error = "";
$database_error = "";

DEFINE ('DB_NAME', getenv('DB_NAME'));
DEFINE ('DB_USER', getenv('DB_USER'));
DEFINE ('DB_PASSWORD', getenv('DB_PASSWORD'));
DEFINE ('DB_HOST', getenv('DB_HOST'));

//Database configuration
    
    /* Attempt MySQL server connection.*/
    $dbcon = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);

    // Check connection
    if(!$dbcon){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    
    $dbaccess = mysqli_select_db($dbcon, DB_NAME);
    
    if(!$dbaccess){
        die ('Unable to access the Database ' . DB_NAME . mysqli_connect_error());
    }

//Dynamically set title

function currentPage(){
    $page_title = "";
    $url = $_SERVER["SCRIPT_NAME"];
    $break = explode('/', $url);
    $file = $break[count($break) - 1];
    
    if($file == 'index.php' && $url == '/shades/index.php')
        $page_title = "Shades | Home";
    else if($file == 'shades.php')
        $page_title = "Shades | Play";
    else if($file == 'verification.php')
        $page_title = "Shades | Verify Account";
    else if($file == 'guest.php')
        $page_title = "Shades | Guest";
    else if($file == '404.php')
        $page_title = "Error 404";
    else if($file == '403.php')
        $page_title = "Access Denied!";
    else if($file == 'index.php' && $url == '/shades/guest/index.php')
        $page_title = "Shades | Guest";
    else if($file == 'index.php' && $url == '/shades/shdscms/index.php')
        $page_title = "Shades | Admin";
    else if($file == 'admin.php')
        $page_title = "Shades | Admin";
    
    return $page_title;
}

//Cleaning Form Inputs
function clean_input($con, $data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = mysqli_real_escape_string($con, $data);
    return $data;
}

//Redirect to somewhere
function redirect($url){
    if (!headers_sent())
    {    
        header('Location: '.$url);
        exit;
        }
    else
        {  
        echo '<script type="text/javascript">';
        echo 'window.location.href="'.$url.'";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
        echo '</noscript>'; exit;
    }
}

//Handle Sessions for Verification, Login and Logout
function accessVerification(){
    if(isset($_COOKIE['valid-code']) && $_COOKIE['current-email']){
        $onVerification = true;
        return $onVerification;
    }
}

function loggedInUser(){
    if(isset($_SESSION['current_user'])){
        $loggedin = true;
        return $loggedin;
    }
}

function loggedInAdmin(){
    if(isset($_SESSION['current_admin'])){
        $loggedin = true;
        return $loggedin;
    }
}
?>