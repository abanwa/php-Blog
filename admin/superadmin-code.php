<?php  

include("authentication.php");
include("middleware/superadminAuth.php");



                //  To Delete/hidden Category From The Database By setting the status to 2 / or 1 which is invisible

                if (isset($_POST["delete_category"])){
                    // get the id to delete from the delete button you clicked. the id is the value on the delete button
                    $category_id = $_POST["delete_category"];
                            // delete the category by setting the status to 2 
                    $delete_category = "UPDATE categories SET satus = '2' WHERE id = '$category_id' LIMIT 1";
                    $result = mysqli_query($conn, $delete_category) or die(mysqli_error($conn));
                
                    if ($result){
                        $_SESSION["message"] = "Category Deleted Successfully";
                        header("location: view-category.php");
                        exit(0);
                    } else {
                        $_SESSION["message"] = "Something went wrong when trying to delete category";
                        header("location: view-category.php");
                        exit(0);
                    }
                }


?>