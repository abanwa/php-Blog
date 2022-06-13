<?php

session_start();

include("admin/config/dbcon.php");

if (isset($_POST["login_btn"])){

    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password' LIMIT 1";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $num_row = mysqli_num_rows($result);

    if ($num_row > 0){
        // this will go through the table (users) and check for each column values
        foreach($result as $data){
            $user_id = $data["id"];
            $user_name = $data["fname"].' '.$data["lname"]; // storing it in one line
            $user_email = $data["email"];
            $user_role = $data["role_as"]; // if the role is 0, he will be a normal user but it's 1, he will be an admin. 1 = admin, 0 = normal user
        }

        $_SESSION["auth"] = true;
        $_SESSION["auth_role"] = "$user_role"; // 0 = user, 1 = admin, 2 = super admin
        //storing the user data in a SESSION associative array
        $_SESSION["auth_user"] = [
            'user_id' => $user_id,
            'user_name' => $user_name,
            'user_email' => $user_email,
        ];
        // check the role. 1 for admin, 0 for normal user
        if ($_SESSION["auth_role"] == "1"){ // 1 - Admin
            $_SESSION["message"] = "Welcome to Dashboard";
            header("location: admin/index.php");
            exit();
        }
        if ($_SESSION["auth_role"] == "2"){ // 2 - Super Admin
            $_SESSION["message"] = "Welcome to Dashboard";
            header("location: admin/index.php");
            exit();
        } else if ($_SESSION["auth_role"] == "0"){ // 0 - User
            $_SESSION["message"] = "You are logged in";
            header("location: index.php");
            exit();
        } else {
            $_SESSION["message"] = "You are logged in";
            header("location: index.php");
            exit();
        }


    } else {
        $_SESSION["message"] = "Invalid Email or Password";
        header("location: login.php");
        exit();
    }



} else {
    $_SESSION["message"] = "You have to register before you can login";
    header("location: login.php");
    exit();
}





?>