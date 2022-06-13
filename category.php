<?php 

include("includes/config.php"); // session has already been started in the header and database connection too

if (isset($_GET["title"])){
    // validate the url or web address
    $slug = mysqli_real_escape_string($conn, $_GET["title"]);

    $sql = "SELECT slug,meta_title,meta_description,meta_keyword FROM categories WHERE slug = '$slug' AND status = '0' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $num_row = mysqli_num_rows($result);
    
    if ($num_row > 0){
        $cat_item = mysqli_fetch_array($result);

        $page_title = $cat_item["meta_title"];
        $meta_description = $cat_item["meta_description"];
        $meta_keywords = $cat_item["meta_keyword"];

    } else {
        $page_title = "Category Page";
        $meta_description = "Category page description blogging website";
        $meta_keywords = "php, html, css, laraval, codeigniter, react js"; 
    }
} else {
    $page_title = "Category Page";
    $meta_description = "Category page description blogging website";
    $meta_keywords = "php, html, css, laraval, codeigniter, react js";
}



include("includes/header.php");

include("includes/navbar.php");

?>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <?php 
            // this is the title we will get when the user click the items on the navbar
                if (isset($_GET["title"])){
                    // validate the url or web address
                    $slug = mysqli_real_escape_string($conn, $_GET["title"]);

                    $sql = "SELECT id,slug FROM categories WHERE slug = '$slug' AND status = '0' LIMIT 1";
                    $result = mysqli_query($conn, $sql);
                    $num_row = mysqli_num_rows($result);
                    
                    if ($num_row > 0){
                        $cat_item = mysqli_fetch_array($result);
                        $cat_id = $cat_item["id"];
                        
                        // use the cat_id to fetch data from the post
                        $sql = "SELECT category_id,name,slug,created_at FROM posts WHERE category_id = '$cat_id' AND status = '0'";
                        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                        $num_row = mysqli_num_rows($result);

                        if ($num_row > 0){
                            foreach($result as $post){
                                ?>

                                        <a href="<?= base_url('post/'.$post["slug"]); ?>" class="text-decoration-none">
                                            <div class="card card-body shadow-sm mb-4">
                                                <h5><?= $post["name"]; ?></h5>
                                                <div>
                                                <label class="text-dark me-2">Posted On: <?= date("d-M-Y", strtotime($post["created_at"])); ?></label> <!-- we want to show it in normal date formate -->
                                            </div>
                                        </div>
                                        </a>

                                <?php
                            }
                        } else {
                            ?>
                                <h4>No Post Avaliable</h4>

                            <?php
                        }
                    } else {
                        ?>  
                            <h4>No Such Category Found</h4>
                        <?php
                    }
                } else {
                    ?>
                    <h4>No such URL found</h4>

                <?php
                }



                ?>
                
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h4>Advertise Area</h4>
                    </div>
                    <div class="card-body">
                        your advertise
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php 

include("includes/footer.php");

?>