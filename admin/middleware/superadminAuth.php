<?php

// check whether the person is an admin or a normal user . and when the person is not a super admin and tries to access ADMIN Dashboard from users  access page
if ($_SESSION["auth_role"] != "2"){
    $_SESSION["message"] = "You are not Authorised as SUPER ADMIN for this page";
    header("location: index.php"); //take the person to the dashboard
    exit(0); 
}


?>