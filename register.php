<?php 
include("includes/config.php");


$page_title = "Register Page";
$meta_description = "Register page description blogging website";
$meta_keywords = "php, html, css, laraval, codeigniter, react js";

include("includes/header.php"); // we already started session in our header

// to prevent users/admin from accessing the register.php page  until they click logout
if (isset($_SESSION["auth"])){
    $_SESSION["message"] = "You are already logged in";
    header("location: index.php");
    exit(0);
}



include("includes/navbar.php");

?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
            <!-- FOR ERROR MESSAGE DURING REGISTRATION -->
                <?php  include("message.php");  ?>

                <div class="card">
                    <div class="card-header">
                        <h4>Register</h4>
                    </div>
                    <div class="card-body">
                        <!-- Form -->
                    <form action="registercode.php" method="POST">
                        <div class="form-group mb-3">
                                <label>First Name</label>
                                <input type="text" name="fname" class="form-control" placeholder="Enter First Name" required>
                            </div>
                            <div class="form-group mb-3">
                                <label>Last Name</label>
                                <input type="text" name="lname" class="form-control" placeholder="Enter Last Name" required>
                            </div>
                            <div class="form-group mb-3">
                                <label>Email Id</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter Email Address" required>
                            </div>
                            <div class="form-group mb-3">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
                            </div>
                            <div class="form-group mb-3">
                                <label>Confirm Password</label>
                                <input type="password" name="cpassword" class="form-control" placeholder="Re-enter Password" required>
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" name="register-btn" class="btn btn-primary">Register Now</button>
                            </div>
                        </form>
                        <!-- End form -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php 

include("includes/footer.php");

?>
           

