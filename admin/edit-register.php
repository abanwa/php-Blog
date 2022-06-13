<?php

//include("config/dbcon.php"); database is already connected in the authentication file
include("authentication.php"); // this check if the user is logged or not
include("middleware/superadminAuth.php");
include("includes/header.php"); // this is to call the header file

?>

<div class="container-fluid px-4">
    <h4 class="mt-4">Users</h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item">Users</li>
    </ol>

    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit User</h4>
                </div>
                <div class="card-body">
                    <!--  php code to update user information in our database -->

                    <?php //open 
                    // get the user id to update from the id in the url from the edit button link we clicked in view-registered.php page by using the get function
                    if (isset($_GET["id"])){
                        $user_id = $_GET["id"];
                        
                        $sql = "SELECT * FROM users WHERE id = '$user_id'";
                        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                        $num_row = mysqli_num_rows($result);

                        if ($num_row > 0){

                            foreach ($result as $user){

                            ?> <!-- close -->

                            <form action="code.php" method="POST">
        <!--  we will use this hidden input which is the id of the user we clicked to update the user in the form. always add a hidden input to get data for update-->
                                <input type="hidden" name="user_id" value="<?= $user["id"]; ?>">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="fname">First Name</label>
                                        <input type="text" name="fname" value="<?= $user["fname"]; ?>" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="lname">Last Name</label>
                                        <input type="text" name="lname" value="<?= $user["lname"]; ?>" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="email">Email Address</label>
                                        <input type="email" name="email" value="<?= $user["email"]; ?>" class="form-control">
                                    </div>
                                    <!-- we don't fetch the password. we just enter a new password whenever we want to update it -->
                                    <div class="col-md-6 mb-3">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">Role as</label>
                                        <select name="role_as" class="form-control" required>
    <!-- After clicking edit button, if the role_as is 1, it will automatically select admin and if it's 0, it will automatically select user-->
                                            <option value="">--Select Role--</option>
                                            <option value="1" <?= $user["role_as"] == "1" ? "selected" : "" ?> >Admin</option>
                                            <option value="0" <?= $user["role_as"] == "0" ? "selected" : "" ?> >User</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="status">Status</label>
<!-- from the database, if the status is 1, it will automatically check, if the status is 0, it won't check  -->
                                        <input type="checkbox" name="status" <?= $user["status"] == "1" ? "checked" : "" ?> width="70px" height="70px">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <button type="submit" name="update_user" class="btn btn-primary">Update User</button>
                                    </div>
                                </div>
                            </form>
               
                    <?php //open

                            }

                        } else {
                        ?> <!-- close   -->
                            <h4>No Record Found!</h4>
                        <?php //open
                        }

                    }

                        ?> <!--  close -->

                </div>
            </div>
        </div>

     </div>

    </div>

<?php

include("includes/footer.php"); // this is to call the footer file

include("includes/scripts.php"); // this is to call the scripts file


?>