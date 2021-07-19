<?php

    //include constants.php for SITEURL
    include('../config/constants.php');
    //1. Destroy the Session
    session_destroy(); //Unsets $_SESSION['user']

    //2. Redirect to Login page
    header('location:'.SITEURL.'admin/login.php'); 



?>