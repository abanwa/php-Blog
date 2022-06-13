<?php

//we have already started session in the authentication.php page
//include("config/dbcon.php"); database is already connected in the authentication file
include("authentication.php"); // this check if the user is logged or not


            // TO Add User / Admin in register-add.php from view-register.php

if (isset($_POST["add_user"])){
    //get all the input values from the register-add.php form
    $fname = mysqli_real_escape_string($conn, $_POST["fname"]);
    $lname = mysqli_real_escape_string($conn, $_POST["lname"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $role_as = mysqli_real_escape_string($conn, $_POST["role_as"]);
    $status = $_POST['status'] == true ? '1' : '0';

        // Add user/admin in the database
    $sql = "INSERT INTO users (fname, lname, email, password, role_as, status) VALUES ('$fname', '$lname', '$email', '$password',
             '$role_as', '$status')";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    if ($result){
        $role = ($role_as == "1") ? "Admin" : "User";
        $_SESSION["message"] = "$role Added Successfully";
        header("location: view-register.php");
        exit(0);
    } else {
        $_SESSION["message"] = "Something went wrong";
        header("location: view-register.php");
        exit(0);
    }
}





            // TO Update User  edit-register.php from view-register.php

if (isset($_POST["update_user"])){
    //get all the input values from the edit-register.php form
    $user_id = mysqli_real_escape_string($conn, $_POST["user_id"]);
    $fname = mysqli_real_escape_string($conn, $_POST["fname"]);
    $lname = mysqli_real_escape_string($conn, $_POST["lname"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $role_as = mysqli_real_escape_string($conn, $_POST["role_as"]);
    $status = mysqli_real_escape_string($conn, $_POST["status"] == "true" ? "1" : "0");

    // Update the user/admin in the database
    $sql = "UPDATE users SET fname = '$fname', lname = '$lname', email = '$email', password = '$password', role_as = '$role_as',
             status = '$status' WHERE id = '$user_id'";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    if ($result){
        $role = ($role_as == "1") ? "Admin" : "User";
        $_SESSION["message"] = "$role Updated Successfully";
        header("location: view-register.php");
        exit(0);
    } else {
        $_SESSION["message"] = "Something went wrong when trying to update";
        header("location: view-register.php");
        exit(0);
    }


}


            // To Delete User / Admin in view-register.php

            if (isset($_POST["user-delete"])){
                // the id is from the id of the value of the delete button from view-register.php
                $user_id = $_POST["user-delete"];
            
                $sql = "DELETE FROM users WHERE id = '$user_id'";
                $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            
                if ($result){
                    $role = ($role_as == "1") ? "Admin" : "User";
                    $_SESSION["message"] = "$role Deleted Successfully";
                    header("location: view-register.php");
                    exit(0);
                } else {
                    $_SESSION["message"] = "Something went wrong. can not delete";
                    header("location: view-register.php");
                    exit(0);
                }
            }
            
            

// To Add Category in add-category.php

if (isset($_POST["add_category"])){
    //get all the input values from the add-category.php form
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    // validate the url for slug
    $string = preg_replace('/[^A-Za-z0-9\-]', '-', $_POST["slug"]);  //remove all special characters
    $final_string = preg_replace('/-+/', '-', $string);
    $slug = $final_string;

    $description = mysqli_real_escape_string($conn, $_POST["description"]);
    $meta_title = mysqli_real_escape_string($conn, $_POST["meta_title"]);
    $meta_description = mysqli_real_escape_string($conn, $_POST["meta_description"]);
    $meta_keyword = mysqli_real_escape_string($conn, $_POST["meta_keyword"]);
    $navbar_status = mysqli_real_escape_string($conn, $_POST["navbar_status"] == true ? "1" : "0");
    $status = mysqli_real_escape_string($conn, $_POST["status"] == true ? "1" : "0");

    $sql = "INSERT INTO categories (name, slug, description, meta_title, meta_description, meta_keyword, navbar_status, status) VALUES 
            ('$name', '$slug', '$description', '$meta_title', '$meta_description', '$meta_keyword', '$navbar_status', '$status')";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    if ($result){
        $_SESSION["message"] = "Category Added Successfully";
        header("location: add-category.php");
        exit(0);
    } else {
        $_SESSION["message"] = "Something went wrong when trying to add category";
        header("location: add-category.php");
        exit(0);
    }

}



            // Update Category in edit-category.php through view-category.php by clicking the edit button

    if (isset($_POST["update_category"])){
        //get all the input values from the edit-category.php form
        $category_id = $_POST["category_id"];
        $name = mysqli_real_escape_string($conn, $_POST["name"]);
        // validate the url for slug
        $string = preg_replace('/[^A-Za-z0-9\-]', '-', $_POST["slug"]);  //remove all special characters
        $final_string = preg_replace('/-+/', '-', $string);
        $slug = $final_string;

        $description = mysqli_real_escape_string($conn, $_POST["description"]);
        $meta_title = mysqli_real_escape_string($conn, $_POST["meta_title"]);
        $meta_description = mysqli_real_escape_string($conn, $_POST["meta_description"]);
        $meta_keyword = mysqli_real_escape_string($conn, $_POST["meta_keyword"]);
        $navbar_status = mysqli_real_escape_string($conn, $_POST["navbar_status"] == true ? "1" : "0");
        $status = $_POST["status"] == true ? "1" : "0";

                // Update category in the database
        $update_category = "UPDATE categories SET name = '$name', slug = '$slug', description = '$description', meta_title = '$meta_title', 
                            meta_description = '$meta_description', meta_keyword = '$meta_keyword', navbar_status = '$navbar_status',
                            status = '$status' WHERE id = '$category_id'";
        $result = mysqli_query($conn, $update_category) or die(mysqli_error($conn));

        if ($result){
            $_SESSION["message"] = "Category Updated Successfully";
            header("location: edit-category.php?id=$category_id");
            exit(0);
        } else {
            $_SESSION["message"] = "Something went wrong when trying to update category";
            header("location: edit-category.php?id=$category_id");
            exit(0);
        }
    }







            // To Post a Post in The Database That will be displayed in the frontend for Users to see and Read

    if (isset($_POST["add_post"])){
        // get all the input values from add-post.php
        $category_id = $_POST["category_id"];
        $name = mysqli_real_escape_string($conn, $_POST["name"]);
       // validate the url for slug
       $string = preg_replace('/[^A-Za-z0-9\-]/', '-', $_POST["slug"]);  //remove all special characters
       $final_string = preg_replace('/-+/', '-', $string);
       $slug = $final_string;

        $description = mysqli_real_escape_string($conn, $_POST["description"]);
        $meta_title = mysqli_real_escape_string($conn, $_POST["meta_title"]);
        $meta_description = mysqli_real_escape_string($conn, $_POST["meta_description"]);
        $meta_keyword = mysqli_real_escape_string($conn, $_POST["meta_keyword"]);

        $image = mysqli_real_escape_string($conn, $_FILES["image"]["name"]);
        // i want to rename my image so that it won't have one image name in my database
        $image_extension = pathinfo($image, PATHINFO_EXTENSION);
        $filename = time().".".$image_extension; // the new image name

        $status = mysqli_real_escape_string($conn, $_POST["status"] == true ? "1" : "0");

        $sql = "INSERT INTO posts (category_id, name, slug, description, image, meta_title, meta_description, meta_keyword, status) 
                VALUES ('$category_id', '$name', '$slug', '$description', '$filename', '$meta_title', '$meta_description', '$meta_keyword', '$status')";
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        if ($result){
            // when the image is uploaded in our database, the temporary image should also be saved in our local server . so we have to created a folder where it will be saved which is outside our admin folder. the upload path is ../uploads/posts/'the filename'
            move_uploaded_file($_FILES["image"]["tmp_name"], "../uploads/posts/".$filename);
            $_SESSION["message"] = "Post Added Successfully";
            header("location: add-post.php");
            exit(0);
        } else {
            $_SESSION["message"] = "Something went wrong when trying to add post";
            header("location: add-post.php");
            exit(0);
        }

    }


                /// To Edit the Post

    if (isset($_POST["update_post"])){
        $post_id = $_POST["post_id"]; // the id we want to update

        $category_id = $_POST["category_id"];
        $name = mysqli_real_escape_string($conn, $_POST["name"]);
      
        // validate the url for slug
        $string = preg_replace('/[^A-Za-z0-9\-]/', '-', $_POST["slug"]);  //remove all special characters
        $final_string = preg_replace('/-+/', '-', $string);
        $slug = $final_string;

        $description = mysqli_real_escape_string($conn, $_POST["description"]);
        $meta_title = mysqli_real_escape_string($conn, $_POST["meta_title"]);
        $meta_description = mysqli_real_escape_string($conn, $_POST["meta_description"]);
        $meta_keyword = mysqli_real_escape_string($conn, $_POST["meta_keyword"]);


        $old_filename = $_POST["old_image"];
        $image = mysqli_real_escape_string($conn, $_FILES["image"]["name"]);
        //check if we are putting a new image,then we create a new image name ... otherwise we leave the old one

        $update_filename = "";
        if ($image != NULL){
            //if we put new image, we have to rename and add to database
                // i want to rename my image so that it won't have one image name in my database
            $image_extension = pathinfo($image, PATHINFO_EXTENSION);
            $filename = time().".".$image_extension;
            $update_filename = $filename;
        } else {
            $update_filename = $old_filename;
        }

        $status =  $_POST["status"] == true ? "1" : "0";

        // update statement
        $sql = "UPDATE posts SET category_id = '$category_id', name = '$name', slug = '$slug', description = '$description', 
                image = '$update_filename', meta_title = '$meta_title', meta_description = '$meta_description', meta_keyword = '$meta_keyword',
                status = '$status' WHERE id = '$post_id'";
        $result = mysqli_query($conn, $sql);

        if ($result){
            if ($image != NULL){
                if (file_exists('../uploads/posts/'.$old_filename)){
                    // if the image is already in that folder, delete that image
                    unlink('../uploads/posts/'.$old_filename);
                }
                    // when the image is uploaded in our database, the temporary image should also be saved in our local server . so we have to created a folder where it will be saved which is outside our admin folder. the upload path is ../uploads/posts/'the filename'
                move_uploaded_file($_FILES["image"]["tmp_name"], '../uploads/posts/'.$update_filename);
            }
           
            $_SESSION["message"] = "Post Updated Successfully";
            header("location: edit-post.php?id=".$post_id);
            exit(0);
        } else {
            $_SESSION["message"] = "Something went wrong when trying to update post";
            header("location: edit-post.php?id=".$post_id);
            exit(0);
        }


    }


    
                    /// To delete a Post

    if (isset($_POST["delete_post_btn"])){
        $post_id = $_POST["delete_post_btn"];

        // before we delete the post, we also have to delete the image. we have to selete the image to delete

        $img_sql = "SELECT * FROM posts WHERE id = '$post_id' LIMIT 1";
        $img_result = mysqli_query($conn, $img_sql);
        $img_result_data = mysqli_fetch_array($img_result);
        // get the image from the result
        $image = $img_result_data["image"];

        
        $sql = "DELETE FROM posts WHERE id = '$post_id' LIMIT 1";
        $result = mysqli_query($conn, $sql);

        
        if ($result){
                if (file_exists("../uploads/posts/$image")){
                    // if the image is already in that folder, delete that image
                    unlink("../uploads/posts/$image");
                }
           
            $_SESSION["message"] = "Post Deleted Successfully";
            header("location: view-post.php");
            exit(0);
        } else {
            $_SESSION["message"] = "Something went wrong when trying to delete post";
            header("location: view-post.php");
            exit(0);
        }

    }








?>