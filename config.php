<?php
/*
    This file consists variables and functions used for he SHADES website. 
    Date Created: October 21, 2017
    Author: rhanmiano
*/

define('SITE_NAME', 'SHADES');
define('PROTOCOL',(!empty($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS'] == 'on')) ? 'https://' : 'http://',true);
define('DOMAIN',$_SERVER['HTTP_HOST']);
define('SITE_URL', preg_replace("/\/$/",'',PROTOCOL.DOMAIN.str_replace(array('\\',"index.php","index.html"), '', dirname(htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES))),1).'/',true);// Remove backslashes for Windows compatibility

$site_url = str_replace('\\', '/', SITE_URL);
    
//As webpage opens start session
session_start();

//Variables Declaration;
$page_error = "";
$database_error = "";

DEFINE ('DB_NAME', 'dbase_shades');
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', '');
DEFINE ('DB_HOST', 'localhost');

//Database configuration
    
    /* Attempt MySQL server connection.*/
    $dbcon = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);

    // Check connection
    if(!$dbcon){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    
    $dbaccess = mysqli_select_db($dbcon, DB_NAME);
    
    if(!$dbaccess){
        die ('Unable to access the Database ' . DB_NAME . mysql_error());
    }

//Dynamically set title
function currentPage(){
    $page_title = "";
    $url = $_SERVER["SCRIPT_NAME"];
    $break = explode('/', $url);
    $file = $break[count($break) - 1];
    
    if($file == 'index.php')
        $page_title = "Shades | Home";
    else if($file == 'shades.php')
        $page_title = "Shades | Play";
    else if($file == 'verification.php')
        $page_title = "Shades | Verify Account";
    else if($file == '404.php')
        $page_title = "Error 404";
    else if($file == '403.php')
        $page_title = "Access Denied!";
    
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
    if(isset($_SESSION['current-user'])){
        $loggedin = true;
        return $loggedin;
    }
}
?>