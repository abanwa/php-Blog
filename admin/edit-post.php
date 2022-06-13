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
                    <h4>Edit Post
                        <a href="view-post.php" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                                    <?php 

                                    if (isset($_GET["id"])){
                                        $post_id = $_GET["id"];
                                        $sql = "SELECT * FROM posts WHERE id = '$post_id' LIMIT 1";
                                        $result = mysqli_query($conn, $sql);
                                        $num_row = mysqli_num_rows($result);

                                        if ($num_row > 0){
                                            $post_row = mysqli_fetch_array($result);
                                            ?>
                                            

                                            
                        <!-- always use enctype attribute whenever you want to post a file or image -->
                <form action="code.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <!-- this is the hidden id of the post we want to edit -->
                        <input type="hidden" name="post_id" value="<?= $post_row["id"]; ?>">
                        <div class="col-md-12 mb-3">
                            <label for="name">Category List</label>
                                    <!--  to get all the category from categories table that is visible only using the status to differentiate and display in the select option -->
                                        <?php

                                            $category = "SELECT * FROM categories WHERE status = '0'";
                                            $result = mysqli_query($conn, $category) or die(mysqli_error($conn));
                                            $num_row = mysqli_num_rows($result);

                                            if ($num_row > 0){
                                                    ?>

                                                <select name="category_id" class="form-control" required>
                                                    <option value="">Select Category</option>

                                                    <?php
                                                    foreach ($result as $row){
                                                        ?>
                                                            <!-- we also added the specific category id from the categories table -->
                                                            <option value="<?= $row["id"]; ?>" <?= $row["id"] == $post_row["category_id"] ? "selected" : ""; ?>><?= $row["name"]; ?></option>
                                         <!-- the id of the clicked post in the post table == the id of the category in category table -->
                                                        <?php
                                                        }
                                                        ?>
                                                </select>
                                                    <?php
                                             } else {
                                                    ?>
                                                    <h4>No Category Available</h4>
                                                 <?php 
                                             }

                                                ?>

                           
                           
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" value="<?= $post_row["name"]; ?>" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="slug">Slug (URL)</label>
                            <input type="text" name="slug" class="form-control" value="<?= $post_row["slug"]; ?>" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="description">Description</label>
                            <textarea name="description" id="summernote" class="form-control" rows="4" required><?= htmlentities($post_row["description"]); ?></textarea>
                        </div>
                        
                        <div class="col-md-12 mb-3">
                            <label for="meta-title">Meta Title</label>
                            <input type="text" name="meta_title" class="form-control" value="<?= $post_row["meta_title"]; ?>" max="191" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="meta-description">Meta Description</label>
                            <textarea name="meta_description" class="form-control"  rows="4" required><?= $post_row["meta_description"]; ?></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="meta-word">Meta Keyword</label>
                            <textarea name="meta_keyword" class="form-control"  rows="4" required><?= $post_row["meta_keyword"]; ?></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="slug">Image</label>
                            <input type="hidden" name="old_image" value="<?= $post_row["image"]; ?>">
                            <input type="file" name="image" class="form-control">
                        </div>
                
                        <div class="col-md-6 mb-3">
                            <label for="status">Status</label> <br>
                            <input type="checkbox" name="status" <?= $post_row["status"] == "1" ? "checked" : ""; ?> width="70px" height="70px">
                            checked = hidden, unchecked = visible
                        </div>
                        <div class="col-md-12 mb-3">
                            <button type="submit" name="update_post" class="btn btn-primary">Update Post</button>
                        </div>
                    </div>
                </form>

                                         <?php

                                        } else {
                                            ?>
                                            <h4>No Record Found</h4>

                                            <?php
                                             }
                                        }

                                        ?>

                </div>
            </div>
        </div>

     </div>

    </div>

<?php

include("includes/footer.php"); // this is to call the footer file

include("includes/scripts.php"); // this is to call the scripts file


?>



