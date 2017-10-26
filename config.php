<?php
/*
    This file consists variables and functions used for he SHADES website. 
    Date Created: October 21, 2017
    Author: rhanmiano
*/

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
    
    return $page_title;
}

//Cleaning Form Inputs
function clean_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = mysql_real_escape_string($data);
    return $data;
}

?>