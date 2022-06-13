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
                    <h4>Add Category
                        <a href="view-category.php" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">

                <form action="code.php" method="POST">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="slug">Slug (URL)</label>
                            <input type="text" name="slug" class="form-control" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="description">Description</label>
                            <textarea name="description" id="summernote" class="form-control" rows="4" required></textarea>
                        </div>
                        
                        <div class="col-md-12 mb-3">
                            <label for="meta-title">Meta Title</label>
                            <input type="text" name="meta_title" class="form-control" max="191" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="meta-description">Meta Description</label>
                            <textarea name="meta_description" class="form-control"  rows="4" required></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="meta-word">Meta Keyword</label>
                            <textarea name="meta_keyword" class="form-control"  rows="4" required></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="status">Navbar Status</label> <br>
                            <input type="checkbox" name="navbar_status" width="70px" height="70px">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="status">Status</label> <br>
                            <input type="checkbox" name="status" width="70px" height="70px">
                        </div>
                        <div class="col-md-12 mb-3">
                            <button type="submit" name="add_category" class="btn btn-primary">Save Category</button>
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



