<?php 
include("includes/config.php"); // session has already been started in the header and database connection too

$page_title = "Home Page";
$meta_description = "Home page description blogging website";
$meta_keywords = "php, html, css, laraval, codeigniter, react js";

// include("admin/config/dbcon.php");

include("includes/header.php"); 

include("includes/navbar.php");

?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card card-body text-center">
                    <h1>404 !</h1>
                    <h4>Page Not Found</h4>
                </div>
            </div>
        </div>
    </div>
</div>


<?php 

include("includes/footer.php");

?>