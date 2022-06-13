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
                    <h4>Edit Category
                        <a href="view-category.php" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">

                                    <?php //open
                                            // get the id to update with get function. we are getting the id from category edit button in view-category.php
                                        if (isset($_GET["id"])){
                                            $category_id = $_GET["id"];
                                            $category_edit = "SELECT * FROM categories WHERE id = '$category_id' LIMIT 1";
                                            $result = mysqli_query($conn, $category_edit) or die(mysqli_error($conn));
                                            $num_row = mysqli_num_rows($result);

                                            if ($num_row > 0){
                                                $row = mysqli_fetch_array($result);
                                                ?> <!-- close -->

                                    <form action="code.php" method="POST">
                                        <input type="hidden" name="category_id" value="<?php echo $row["id"]; ?>">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="name">Name</label>
                                                <input type="text" name="name" value="<?php echo $row["name"]; ?>" class="form-control" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="slug">Slug (URL)</label>
                                                <input type="text" name="slug" value="<?php echo $row["slug"]; ?>" class="form-control" required>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="description">Description</label>
                                                <!-- there is no value attribute in textarea tag, instead just post the php echo code on the textarea  -->
                                                <textarea name="description" class="form-control" rows="4" required><?php echo $row["description"]; ?></textarea>
                                            </div>
                                            
                                            <div class="col-md-12 mb-3">
                                                <label for="meta-title">Meta Title</label>
                                                <input type="text" name="meta_title" value="<?php echo $row["meta_title"]; ?>" class="form-control" max="191" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="meta-description">Meta Description</label>
                                                <textarea name="meta_description" class="form-control" rows="4" required><?php echo $row["meta_description"]; ?></textarea>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="meta-word">Meta Keyword</label>
                                                <textarea name="meta_keyword" class="form-control"  rows="4" required><?php echo $row["meta_keyword"]; ?></textarea>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="status">Navbar Status</label> <br>
                                                <input type="checkbox" name="navbar_status" <?php echo $row["navbar_status"] == "1" ? "checked" : ""; ?>" width="70px" height="70px">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="status">Status</label> <br>
                                                <input type="checkbox" name="status" <?php echo $row["status"] == "1" ? "checked" : ""; ?>" width="70px" height="70px">
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <button type="submit" name="update_category" class="btn btn-primary">Update Category</button>
                                            </div>
                                        </div>
                                    </form>

                                                <?php //open

                                            } else {
                                                ?> <!-- close -->

                                                <h4>No Record Found</h4>

                                                <?php //open
                                            }
                                        }

                                        ?> <!-- close -->

                </div>
            </div>
        </div>

     </div>

    </div>

<?php

include("includes/footer.php"); // this is to call the footer file

include("includes/scripts.php"); // this is to call the scripts file


?>



