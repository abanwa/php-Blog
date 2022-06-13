<?php 
include("includes/config.php"); // session has already been started in the header and database connection too

$page_title = "Home Page";
$meta_description = "Home page description blogging website";
$meta_keywords = "php, html, css, laraval, codeigniter, react js";

// include("admin/config/dbcon.php");

include("includes/header.php"); 

include("includes/navbar.php");

?>

<div class="py-5 bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                        <!--  DISPLAY MESSAGE WHEN LOGGED IN AS A NORMAL USER and the message will only display when the page we are coming from has a session message -->
                <h3 class="text-white">Category</h3>
                <div class="underline"></div>
                
            </div>

                    <?php

                        $homeCategory = "SELECT * FROM categories WHERE navbar_status = '0' AND status = '0' LIMIT 12";
                        $result = mysqli_query($conn, $homeCategory);
                        $num_row = mysqli_num_rows($result);

                        if ($num_row > 0){
                            foreach($result as $homeCatItems){
                                ?>
                                    
                                    <div class="col-md-3 mb-4">
                                        <a class="text-decoration-none" href="category.php?title=<?= $homeCatItems["slug"]; ?>">
                                            <div class="card card-body">
                                                <?= $homeCatItems["name"]; ?>
                                            </div>
                                        </a>
                                    </div>
                                   
                                <?php 
                            }
                        }

                ?>


        </div>
    </div>
</div>

<div class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                        <!--  DISPLAY MESSAGE WHEN LOGGED IN AS A NORMAL USER and the message will only display when the page we are coming from has a session message -->
                <h3 class="text-dark">Funda od Web IT</h3>
                <div class="underline"></div>
                <p>Hey guys, I am destiny from bingpay. So, I want to update you guys about what we are building. We are building bingpay API.
                    APIs businesses can leverage on to build amazing financial products for their customers. You can integrate services like airtime purchase,
                     data purchase, utility bills and the amazing part is we accept airtime payment.
                </p>
                
            </div>
        </div>
    </div>
</div>

                                                                    <!--  FOR THE LATEST POSTS -->


<div class="py-5 bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h3 class="text-white">Latest Post</h3>
                <div class="underline"></div>


                    <?php

                            $homePosts = "SELECT * FROM posts WHERE status = '0' ORDER BY id DESC LIMIT 12";
                            $result = mysqli_query($conn, $homePosts);
                            $num_row = mysqli_num_rows($result);

                            if ($num_row > 0){
                                foreach($result as $homePostItems){
                                    ?>
                                        
                                        <div class="mb-4">
                                            <a class="text-decoration-none" href="post.php?title=<?= $homePostItems["slug"]; ?>">
                                                <div class="card card-body bg-light">
                                                    <?= $homePostItems["name"]; ?>
                                                </div>
                                            </a>
                                        </div>
                                    
                                    <?php 
                                }
                            }

                    ?>
                
            </div>

            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h4>Reach Us</h4>
                    </div>
                    <div class="card-body">
                        info@example.com
                    </div>

                </div>

            </div>

                    


        </div>
    </div>
</div>



<?php 

include("includes/footer.php");

?>