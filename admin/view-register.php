<?php

//include("config/dbcon.php"); database is already connected in the authentication file
include("authentication.php"); // this check if the user is logged or not
include("middleware/superadminAuth.php"); // this page will anyone who is not a super admin from viewing this page
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
            <!-- the update success message will display here -->
            <?php include("message.php");  ?>
            <div class="card">
                <div class="card-header">
                    <h4>Registered Users
                        <a href="register-add.php" class="btn btn-primary float-end">Add Admin/User</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table id="myDataTable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Roles</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- php code to select all the registered users from database and display here -->
                            <?php //open
                                $sql = "SELECT * FROM users";
                                $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                                $num_row = mysqli_num_rows($result);

                                if ($num_row > 0){
                                    // using for each
                                    foreach ($result as $row){
                                        ?> <!-- close -->

                                        <tr>
                                            <td><?= $row["id"]; ?></td>
                                            <td><?= $row["fname"]; ?></td>
                                            <td><?= $row["lname"]; ?></td>
                                            <td><?= $row["email"]; ?></td>
                                            <td>
                                                <?php   // checking whether its an admin or user
                                                    if ($row["role_as"] == "1"){
                                                        echo "Admin";
                                                    } else if ($row["role_as"] == "0") {
                                                        echo "User";
                                                    }
                                            
                                                ?>
                                            </td>
                                            <td><a href="edit-register.php?id=<?= $row["id"]; ?>" class="btn btn-success">Edit</a></td>
                                            <td>
                                                <form action="code.php" method="POST">
                                                    <button type="submit" name="user-delete" value="<?= $row["id"]; ?>" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                               
                                        </tr>
                                   
                                        <?php //open

                                    }

                                } else {
                                    ?> <!-- close -->
                                    
                                    <tr>
                                        <td colspan="6">No Record Found</td>
                                    </tr>

                            <?php //open
                                }
                            ?> <!-- close  -->
                            
                        </tbody>
                    </table>

                </div>
            </div>
        </div>



    </div>

<?php

include("includes/footer.php"); // this is to call the footer file

include("includes/scripts.php"); // this is to call the scripts file


?>