<?php 
include("includes/config.php");

$page_title = "Login Page";
$meta_description = "Login page description blogging website";
$meta_keywords = "php, html, css, laraval, codeigniter, react js";

include("includes/header.php"); //we already started session in the header

// to prevent users/admin from accessing the login.php page until they click logout
if (isset($_SESSION["auth"])){
    if (!isset($_SESSION["message"])){
        $_SESSION["message"] = "You are already logged in";
    }
    header("location: index.php");
    exit(0);
}



include("includes/navbar.php");

?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
             <!-- FOR SUCCESS MESSAGE DURING REGISTRATION and other messages.  both messages in register.php and login.php are coming from registercode.php through message.php--> 
            <?php  include("message.php");  ?>

                <div class="card">
                    <div class="card-header">
                        <h4>Login</h4>
                    </div>
                    <div class="card-body">
                        <form action="logincode.php" method="POST">
                            <div class="form-group mb-3">
                                <label>Email Id</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter Email Address">
                            </div>
                            <div class="form-group mb-3">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Enter Password">
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" name="login_btn" class="btn btn-primary">Login Now</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php 

include("includes/footer.php");

?>