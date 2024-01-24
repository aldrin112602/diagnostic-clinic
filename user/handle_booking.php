<?php   
require_once '../config.php';
require_once '../global.php';
if(isset($_SESSION['reset_verification']) || isset($_SESSION['new_password'])) header('location: ../forgot_password.php');

$username = $err_msg = $success_msg = null;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $post = validate_post_data($_POST);
    
    $username = $_SESSION['username'];
    $date = $post['date'];
    $services = $post['services'];
    $service_type = $post['service_type'];
    

    $queryInsert = "INSERT INTO booking (username, date, service_type, services) VALUES ('$username', '$date', '$service_type', '$services')";

    if ($conn->query($queryInsert)) {
        $success_msg = "Booking successfully created!";
    } else {
        $err_msg = "Error creating booking: " . $conn->error;
    }

    
    
}

$querySelect = "SELECT * FROM booking WHERE username = '{$_SESSION['username']}'";
$result = $conn->query($querySelect);