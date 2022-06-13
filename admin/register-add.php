<?php

//include("config/dbcon.php"); database is already connected in the authentication file
include("authentication.php"); // this check if the user is logged or not
include("middleware/superadminAuth.php");
include("includes/header.php"); // this is to call the header file

?>

<div class="container-fluid px-4">

    <div class="row mt-4">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Admin/User
                        <a href="view-register.php" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">

                <form action="code.php" method="POST">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="fname">First Name</label>
                            <input type="text" name="fname" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lname">Last Name</label>
                            <input type="text" name="lname" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email">Email Address</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Role as</label>
                            <select name="role_as" class="form-control" required>
                                <option value="">--Select Role--</option>
                                <option value="1">Admin</option>
                                <option value="0">User</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="status">Status</label>
                            <input type="checkbox" name="status" width="70px" height="70px">
                        </div>
                        <div class="col-md-12 mb-3">
                            <button type="submit" name="add_user" class="btn btn-primary">Add Admin/User</button>
                        </div>
                    </div>
                </form>


                </div>
            </div>
        </div>

     </div>

    </div>

<?php

include("includes/footer.php"); // this is to call the footer file

include("includes/scripts.php"); // this is to call the scripts file


?>



