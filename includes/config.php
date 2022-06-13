<?php 
session_start();

// the config.php file is in all files / pages
include("admin/config/dbcon.php");

function base_url($slug){
    echo "http://localhost/php_blog/$slug";
}
?>