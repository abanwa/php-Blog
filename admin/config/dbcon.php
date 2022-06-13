<?php

$host ="localhost";
$user = "root";
$password = "";
$database = "blog";

$conn = mysqli_connect("$host","$user","$password","$database");

if (!$conn){
    header("location: ../errors/dberror.php"); // we don't want the error to show in the front end, that's why we kept it outside the admin folder
    die();
}


?>