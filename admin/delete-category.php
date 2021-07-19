<?php 

    
    //Include constants file
    include('../config/constants.php');

    //echo "Delete Page";
    //Check whether the id and image_name value is set or not
    if(isset($_GET['id']) AND isset($_GET['image_name']))
    {
        //Get the value and delete
        //echo "Get Value and Delete";
        $id = $_GET['id'];
        $image_name = $_GET['imgage_name'];

        //Remove the physical file is available
        if($image_name != "")
        {
            //image is available so remove it.
            $path = "../images/category".$image_name;
            //Remove the image
            $remove = unlink($path);

            //If failed to remove image then add an error message and stop the process
            if($remove==false)
            {
                //Set the session message
                $_SESSION['remove'] = "<div class='error'>Failed to Remove Category Image.</div>";
                //Redirect to manage category page
                header('location:'.SITEURL.'admin/manage-category.php');
                //Stop process
                die();
            }
        }

        //Delete data from database
        //SQL query to delete data from database
        $sql = "DELETE FROM tbl_category WHERE id=$id";

        //Execute the query
        $res = mysqli_query($conn, $sql);

        //Check whether the data deleted from database or not
        if($res==true)
        {
            //Set success message and redirect
            $_SESSION['delete'] = "<div class='success'>Category deleted successfully.</div>";
            //Redirect to manage category page
            header('location:'.SITEURL.'admin/manage-category.php');
        }
        else
        {
            //Set failed message and redirect
            $_SESSION['delete'] = "<div class='error'>Category deleted successfully.</div>";
            //Redirect to manage category page
            header('location:'.SITEURL.'admin/manage-category.php');
        }


    }
    else
    {
        //redirect to manage category page
        header('location:'.SITEURL.'admin/manage-category.php');
    }


?>