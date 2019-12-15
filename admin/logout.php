<?php
include("./session.php");

$error = '';
$message = '';

if (!isset($_GET['id'])) {
    $query = "SELECT * FROM admin WHERE username = '".$login_session."'";
} else {
    $query = "SELECT * FROM admin WHERE username = '". $_GET['username']."'";
}


$data = mysqli_query($connection, $query);


if (mysqli_num_rows($data) == 1) {
    $row = mysqli_fetch_array($data); 
    $username = $row['username'];
    
    $update_login_query = "UPDATE admin SET out_at = Now() WHERE username = '$username'";
    $update_login_result = mysqli_query($connection, $update_login_query);
    
    if(session_destroy()) {
    header("Location: ../index.php");
    }
}

?>