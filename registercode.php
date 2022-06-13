<?php 

session_start();

 //NOTE: we gave the default role_as and status as 0 when the register in the users table in blog database
include("admin/config/dbcon.php");

if (isset($_POST["register-btn"])){

    $fname = mysqli_real_escape_string($conn, $_POST["fname"]); 
    $lname = mysqli_real_escape_string($conn, $_POST["lname"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $con_password = mysqli_real_escape_string($conn, $_POST["cpassword"]);

// Validations 
if ($password == $con_password){
    // check if the email is already registered or not
    $checkemail = "SELECT email from users WHERE email = '$email'";
    $result = mysqli_query($conn, $checkemail) or die(mysqli_error($conn));
    $num_row = mysqli_num_rows($result);

    if ($num_row > 0){
        // Email already exist
        $_SESSION["message"] = "Email Already Exist";
        header("Location: register.php");
        exit(0);
    } else {
        // if email is not in the database, insert the user
        $sql = "INSERT INTO users (fname, lname, email, password) VALUES ('$fname', '$lname', '$email', '$password')";
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        if ($result){
            $_SESSION["message"] = "Registered Successfully";
            header("Location: login.php"); //go to login page if you have been successfully registered.
            exit(0);
        } else {
            $_SESSION["message"] = "Something is wrong";
            header("Location: register.php");
            exit(0);
        }
    }



} else {
    $_SESSION["message"] = "Password and Confirm Password does not match";
    header("Location: register.php");
    exit(0);
}












} else {
    header("location: register.php");
    exit(0);
}







?>