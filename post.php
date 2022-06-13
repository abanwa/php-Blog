<?php 

include("includes/config.php"); // session has already been started in the header and database connection too

if (isset($_GET["title"])){
    // validate the url or web address
    $slug = mysqli_real_escape_string($conn, $_GET["title"]);

    $sql = "SELECT slug,meta_title,meta_description,meta_keyword FROM posts WHERE slug = '$slug' LIMIT 1";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $num_row = mysqli_num_rows($result);
    
    if ($num_row > 0){

        $metaPostItem = mysqli_fetch_array($result);

        $page_title = $metaPostItem["meta_title"];
        $meta_description = $metaPostItem["meta_description"];
        $meta_keywords = $metaPostItem["meta_keyword"];

    } else {
        $page_title = "Post Page";
        $meta_description = "Post page description blogging website";
        $meta_keywords = "php, html, css, laraval, codeigniter, react js"; 
    }
} else {
    $page_title = "Post Page";
    $meta_description = "Post page description blogging website";
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

                    $sql = "SELECT * FROM posts WHERE slug = '$slug'";
                    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                    $num_row = mysqli_num_rows($result);
                    
                    if ($num_row > 0){
                       
                        foreach($result as $post){
                            ?>

                                    
                                <div class="card shadow-sm mb-4">
                                    <div class="card-header">
                                        <h5><?= $post["name"]; ?></h5>
                                    </div>
                                        
                                    <div class="card-body">
                                        <label class="text-dark me-2">Posted On: <?= date("d-M-Y", strtotime($post["created_at"])); ?></label> <!-- we want to show it in normal date formate -->
                                            <hr>                                                                      
                                            <?php 
                                            //if image is not empty, show image
                                                if ($post["image"] != null){
                                                    ?>
                                                        <img src="<?= base_url('uploads/posts/'.$post["image"]); ?>" class="w-25" alt="<?= $post["name"]; ?>">
                                                    <?php
                                                }

                                                ?>
                                            
                                        <div>
                                            <?= $post["description"]; ?>
                                        </div>
                                    </div>
                                </div>
                                    

                            <?php
                        }
                        
                    } else {
                        ?>  
                            <h4>No Such Post Found</h4>
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