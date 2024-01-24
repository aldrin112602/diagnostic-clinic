<?php
require_once '../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = mysqli_real_escape_string($conn, $_POST['id']);

    // Delete reservation
    $sql = "DELETE FROM booking WHERE id = '$id'";
    
    $deletedReservation = mysqli_fetch_assoc(mysqli_query($conn, "SELECT username FROM booking WHERE id = '$id'"));
    $username = $deletedReservation['username'];

    // Insert notification
    $pushNotification = "INSERT INTO notifications (username, description) VALUES ('$username', 'An admin removed your booking reservation.')";

    if (mysqli_query($conn, $sql) && mysqli_query($conn, $pushNotification)) {
        $response = array('success' => true);
    } else {
        $response = array('success' => false, 'error' => mysqli_error($conn));
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
