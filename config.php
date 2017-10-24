<?php
/*
    This file consists variables and functions used for he SHADES website. 
    Date Created: October 21, 2017
    Author: rhanmiano
*/

//As webpage opens start session
session_start();

//Dynamically set title
function current_page(){
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
?>