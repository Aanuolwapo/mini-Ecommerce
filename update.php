<?php 

include('includes/config.php');

if($_SERVER['REQUEST_METHOD'] === "POST" && empty($_POST)){
    $_POST = json_decode(file_get_contents('http://php://input'));
    
    $user_id = $_POST['user_id'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $total_payable = $_POST['total_payable'];
    
     $orders_query = "INSERT INTO store_orders (user_fullname) VALUES ('$user_id')";
     $orders_result = mysqli_query($connection, $orders_query); 
}

?>