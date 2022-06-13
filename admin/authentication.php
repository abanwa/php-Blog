<?php
session_start();
include("config/dbcon.php");

//check if the user is login or not
if (!isset($_SESSION["auth"])){
    // display message if the user is not logged in
    $_SESSION["message"] = "Login to Access Dashboard";
    header("location: ../login.php");
    exit(0);
} else {
        // check whether the person is an admin or a normal user . and when the person is not an admin and tries to access ADMIN Dashboard from users  access page
        if ($_SESSION["auth_role"] != "1" && $_SESSION["auth_role"] != "2"){
            $_SESSION["message"] = "You are not Authorised as ADMIN";
            header("location: ../login.php");
            exit(0); 
        }
}





?>