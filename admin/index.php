<?php

//include("config/dbcon.php"); database is already connected in the authentication file
include("authentication.php"); // this check if the user is logged or not
include("includes/header.php"); // this is to call the header file

?>

<div class="container-fluid px-4">
    <h1 class="mt-4">PHP Admin Panel For Blogging</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <?php include("message.php"); ?>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Total Categories
                        <!-- fetch the total categories -->
                        <?php 

                            $dash_category_sql = "SELECT * FROM categories";
                            $result = mysqli_query($conn, $dash_category_sql);
                            $num_row = mysqli_num_rows($result);

                            if ($num_row){
                                ?>
                                    <h4 class="mb-0"><?= $num_row; ?></h4>
                                <?php
                            } else {
                                ?>
                                <h4 class="mb-0">No Data</h4>

                                <?php
                            }
                            ?>
                    
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">Total Posts

                                <!-- fetch the total post -->
                        <?php 

                            $dash_post_sql = "SELECT * FROM posts";
                            $result = mysqli_query($conn, $dash_post_sql);
                            $num_row = mysqli_num_rows($result);

                            if ($num_row){
                                ?>
                                    <h4 class="mb-0"><?= $num_row; ?></h4>
                                <?php
                            } else {
                                ?>
                                <h4 class="mb-0">No Data</h4>

                                <?php
                            }
                        ?>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">Total Users
                            <!-- fetch the total users -->
                            <?php 

                                $dash_users_sql = "SELECT * FROM users";
                                $result = mysqli_query($conn, $dash_users_sql);
                                $num_row = mysqli_num_rows($result);

                                if ($num_row){
                                    ?>
                                        <h4 class="mb-0"><?= $num_row; ?></h4>
                                    <?php
                                } else {
                                    ?>
                                    <h4 class="mb-0">No Data</h4>

                                    <?php
                                }
                            ?>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">Total Blocked Users
                            <!-- fetch the total users -->
                            <?php 

                                $dash_blockedusers_sql = "SELECT * FROM users WHERE status = '1'";
                                $result = mysqli_query($conn, $dash_blockedusers_sql);
                                $num_row = mysqli_num_rows($result);

                                if ($num_row){
                                    ?>
                                        <h4 class="mb-0"><?= $num_row; ?></h4>
                                    <?php
                                } else {
                                    ?>
                                    <h4 class="mb-0">0</h4>

                                    <?php
                                }
                            ?>         
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php

include("includes/footer.php"); // this is to call the footer file

include("includes/scripts.php"); // this is to call the scripts file


?>