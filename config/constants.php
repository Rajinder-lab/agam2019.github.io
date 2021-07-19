<?php

        // ob_start();
        //Start Session
        session_start();

        // ob_start();

        //Create Constants to Store from Repeating Values
        define('SITEURL', 'http://localhost/agam/');
        define('LOCALHOST', 'localhost');
        define('DB_USERNAME', 'root');
        define('DB_PASSWORD', '');
        define('DB_NAME', 'agam');  

        $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); //Database Connection
        $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); //Selecting Database
?>