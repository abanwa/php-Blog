<?php

//include("config/dbcon.php"); database is already connected in the authentication file
include("authentication.php"); // this check if the user is logged or not
include("includes/header.php"); // this is to call the header file

?>

<div class="container-fluid px-4">

    <div class="row mt-4">
        <div class="col-md-12">
            <!-- this is where the message will be displayed -->
            <?php include("message.php"); ?>

            <div class="card">
                <div class="card-header">
                    <h4>View Category
                        <a href="add-category.php" class="btn btn-primary float-end">Add Category</a>
                    </h4>
                </div>
                <div class="card-body">
                   
                     
                    <div class="table-responsive">
                        <!-- we connected our id to the script.php page to make the table flexible.. pluggings -->
                        <table id="myDataTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Stauts</th>
                                    <th>Edit</th>
                                    <!-- also hide the delete colum if the admin is not a super admin -->
                                    <?php if ($_SESSION["auth_role"] == "2"){
                                                         ?>
                                    <th>Delete</th>
                                    <?php
                                        }
                                    ?>
                                </tr>
                            </thead>
                                <tbody>

                                    <!-- the table -->
                                    <?php //open
                                        // this will select the categories when the status is not equal to 2
                                    $categories_sql = "SELECT * FROM categories wHERE status != '2'";
                                    $result = mysqli_query($conn, $categories_sql) or die(mysqli_error($conn));
                                    $num_row = mysqli_num_rows($result);

                                    if ($num_row > 0) {
                                        foreach ($result as $row){

                                        ?> <!-- close -->
                            
                                            <tr>
                                                <td><?php echo $row["id"]; ?></td>
                                                <td><?php echo $row["name"]; ?></td>
                                                <td>
                                                    <?php
                                                       echo  $row["status"] == "1" ? "Hidden" : "Visible";
                                                    ?>
                                                 </td>
                                                <td>
                                                    <a href="edit-category.php?id=<?= $row["id"] ?>" class="btn btn-success">Edit</a>
                                                </td>

                                                <!-- i want only the super admin to see the delete button, from logincode.php, we got the session -->
                                                <?php if ($_SESSION["auth_role"] == "2"){
                                                         ?>
                                                <td>
                                                    <form action="superadmin-code.php" method="POST">
                                                        <button type="submit" name="delete_category" value="<?php echo $row["id"]; ?>" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                                <?php
                                                    }
                                                ?>
                                            </tr>
                        
                                    <?php //open
                                        }
                                    } else {

                                            ?> <!-- close -->
                                            <tr>
                                                <td colspan="5"><h4>No Record Found</h4></td>
                                            </tr>

                                        <?php // open
                                    }

                                    ?> <!-- close -->

                            
                                </tbody>
                            </table>
                    </div>

                </div>
            </div>
        </div>

     </div>

    </div>

<?php

include("includes/footer.php"); // this is to call the footer file

include("includes/scripts.php"); // this is to call the scripts file


?>



