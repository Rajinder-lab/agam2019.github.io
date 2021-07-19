<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
         <h1>Add Admin</h1>

         <br><br>

        <?php
        
        if(isset($_SESSION['add'])) //Checking whether the Session is Set of not
                {
                    echo $_SESSION['add']; //Display Session Message is Set
                    unset($_SESSION['add']); //Removing Session Message
                }

        

        ?>
         <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td>
                     <input type="text" name="full_name" placeholder="Enter Your Name">
                    </td>
                  </tr>

                  <tr>
                    <td>Username: </td>
                    <td>
                      <input type="text" name="username" placeholder="Your username">
                    </td>
                  </tr>

                  <tr>
                    <td>Password: </td>
                    <td>
                  <input type="password" name="password" placeholder="Enter Your password">
                    </td>
                  </tr>
                  <tr>
                      <td colspan="2">
                        <input type="submit"name="submit" value="Add Admin" class="btn-secondary">

                      </td>

                  </tr>
        </table>
    </form>




</div>


</div>


        <?php include('partials/footer.php'); ?>    

<?php
        //Process the value from form and Save it in Database

        //Check whether the submit button is clicked or not

        if(isset($_POST['submit']))
    {
        // Button Clicked
        // echo "Button Clicked";

        //1. Get the Data from form
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']); //Password Encryption with MD5


        //2. SQl Query to Save the Data into Database
            $sql = "INSERT INTO tbl_admin SET
                full_name='$full_name',
                username='$username',
                password='$password'
            ";
 
        //3. Executing Query and Saving Data into Database
        $res = mysqli_query($conn, $sql) or die(mysqli_error());
      
        //4. Check whether the (Query is Executed) data is inserted or not and display appropriate message
        if($res==TRUE)

        {
            
            // Data Inserted
            // echo "Data Inserted";
            //Create a Session Variable to Display Message
            $_SESSION['add'] = "Admin Added Successfully";
            //Redirect Page to Manage Admmin
            header("location:".SITEURL.'admin/manage-admin.php');

        }

        
        else

        {
            // //Failed to Insert Data
            // echo "Failed to insert Data";
            //Create a Session Variable to Display Message
            $_SESSION['add'] - "Failed to Add Admin";
            //Redirect Page to Add Admmin
            header("location:".SITEURL.'admin/add-admin.php');
        }

    }
        
    
       
?>