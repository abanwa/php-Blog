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
                    <h4>View Post
                        <a href="add-post.php" class="btn btn-primary float-end">Add Post</a>
                    </h4>
                </div>
                <div class="card-body">

                    <table id="myDataTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php
                                    // fetch the records in our post table
// we want to select all from post table as p and only the name from categories table as c, the name as cname where 
//the id in the category table is equal to the id category id in the posts table
                                    // $sql = "SELECT * FROM posts WHERE status != '2'";
                                    $sql = "SELECT p.*, c.name AS cname FROM posts p,categories c WHERE c.id = p.category_id";
                                    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                                    $num_row = mysqli_num_rows($result);

                                    if ($num_row > 0){
                                        foreach ($result as $row){
                                            ?>
                                                <tr>
                                                    <td><?= $row["id"]; ?></td>
                                                    <td><?= $row["name"]; ?></td>
                                                    <td><?= $row["cname"]; ?></td>
                                                    <td><img src="../uploads/posts/<?= $row['image']; ?>" width="60px" height="60px"></td>
                                                    <td>
                                                        <?= $row["status"] == "1" ? "Hidden" : "Visible"; ?>
                                                    </td>
                                                    <td>
                                                        <a href="edit-post.php?id=<?= $row["id"]; ?>" class="btn btn-success">Edit Post</a>
                                                    </td>
                                                    <td>
                                                        <form action="code.php" method="POST">
                                                            <button type="submit" name="delete_post_btn" value="<?= $row["id"]; ?>" class="btn btn-danger">Delete Post</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php
                                        }
                                    } else {
                                        ?>
                                            <tr>
                                                <td colspan="6"><h4>No Record Found</h4></td>
                                            </tr>

                                        <?php
                                    }


                                ?>
                            
                        </tbody>

                    </table>

                </div>
            </div>
        </div>

     </div>

    </div>

<?php

include("includes/footer.php"); // this is to call the footer file

include("includes/scripts.php"); // this is to call the scripts file