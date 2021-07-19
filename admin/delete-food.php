<?php
    //Include constants page    
    include('../config/constants.php');

    //echo "Delete food page";

    if(isset($_GET['id']) && isset($_GET['image_name'])) //Either use '&&' or 'AND'
    {
        //Process to delete
        //echo "process to delete";

        //1. Get ID and image name
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        //2. Remove the image if available
        //Check whether the image is available or not and delete if available
        if($image_name != "")
        {
            //It has image and need to remove from folder
            //Get the image path
            $path = "../images/food/".$image_name;

            //Remove the file from folder
            $remove = unlink($path);

            //Check whether the image is removed or not
            
            if($remove==false)
            {
                //Failed to remove image
                $_SESSION['upload'] = "<div class='error'>Failed to remove image File.</div>";
                //Redirect to manage food page
                header('location:'.SITEURL.'admin/manage-food.php');
                //Stop the process and deleting food
                die();

            }
        }

        //3. Delete food from database
        $sql = "DELETE FROM tbl_food WHERE id=$id";
        //Execute the query
        $res = mysqli_query($conn, $sql);
        //Check whether the query is excuted or not and set the session message respectively
        //4. Redirect to manage food page with Session message
        if($res==true)
        {
            //Food Deleted
            $_SESSION['delete'] = "<div class='success'>Food deleted successfully.</div>";
            //Redirect to manage category page
            header('location:'.SITEURL.'admin/manage-food.php');
        }
        else
        {
            //Failed to delete food
            $_SESSION['delete'] = "<div class='error'>Failed to delete food.</div>";
            //Redirect to manage category page
            header('location:'.SITEURL.'admin/manage-food.php');
        }

        
    }
    else
    {
        //Redirect to manage food page
        echo "Redirect";
        $_SESSION['unauthorize'] = "<div class='error'>Unauthorized Access.</div>";
        //Redirect to manage category page
        header('location:'.SITEURL.'admin/manage-food.php');
    }
?>