<?php
session_start();

if (isset($_POST["logout_btn"])){
    // when we logout, destroy the session we set during the login in the logincode.php
    //session_destroy();
    unset($_SESSION["auth"]);
    unset($_SESSION["auth_role"]);
    unset($_SESSION["auth_user"]);

    $_SESSION["message"] = "Logged out Successfully"; //we have already createda file with the name message.php and have set the session message. all our session messages will be directed there
    header("location: login.php");
    exit(0);
}








?>

