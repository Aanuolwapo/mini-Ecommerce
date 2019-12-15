<?php
include('config.php');
session_start();

$user_check = $_SESSION['username'];
$ses_sql = mysqli_query($connection, "SELECT username FROM admin WHERE username = '$user_check'");
$row = mysqli_fetch_array($ses_sql);
$login_session = $row['username'];


if(!isset($_SESSION['username'])){
    header("location: index.php");
}else{
$update_login_query = "UPDATE admin SET in_at = Now() WHERE username = '".$login_session."'";
$update_login_result = mysqli_query($connection, $update_login_query);

}
?>