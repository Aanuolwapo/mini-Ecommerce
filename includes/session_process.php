<?php
include("config.php");

//-----------------------------------------------------------------------------------------------------------------------------------------------
    @session_start();
    if($_SESSION == TRUE){
        
        if($_SESSION['email']){
        
            $detail_session = $_SESSION['email'];
        
        }elseif($_SESSION['username']){
            
             $detail_session = $_SESSION['username'];
        }
        
            $username_session = $_SESSION['username'];
            $query = "SELECT * FROM subscribers WHERE username = '$detail_session' OR email = '$detail_session'";
        
        $update_login_query = "UPDATE subscribers SET in_at = Now() WHERE username = '$detail_session' OR email = '$detail_session'";
        $update_login_result = mysqli_query($connection, $update_login_query);
        
        $data = mysqli_query($connection, $query);


        if (mysqli_num_rows($data) == 1) {
            $row = mysqli_fetch_array($data);
            $user_id = $row['id'];
            $username = $row['username'];
            $user_email = $row['email'];
            $user_mobile = $row['phone_number'];
            $user_firstname = $row['firstname'];
            $user_lastname = $row['lastname'];
        }
    }
?>