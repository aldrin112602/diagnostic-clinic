<?php
require_once '../config.php';
require_once '../global.php';

$err_msg = $success_msg = null;


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $post = validate_post_data($_POST);

    $date = $post['date'];
    $status = $post['status'];
    $services = $post['services'];
    $username = $post['username'];

    $queryUpdate = "UPDATE booking SET date = '$date', status = '$status', services = '$services' WHERE id={$_GET['id']}";

            
    $pushNotification = "INSERT INTO notifications (username, description) VALUES ('$username', 'An admin updated your booking status to $status.')";

    if ($conn->query($queryUpdate) && $conn->query($pushNotification)) {
        $success_msg = "Booking successfully updated!";
    } else {
        $err_msg = "Error updating booking: " . $conn->error;
    }
    
}
?>

<script>
$(document).ready(function() {
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
    });

    <?php
            if(isset($err_msg)) {
                ?>
    Toast.fire({
        icon: "error",
        title: "<?php echo $err_msg ?>"
    });
    <?php
            }    
            ?>

    <?php
            if(isset($success_msg)) {
                ?>
    Toast.fire({
        icon: "success",
        title: "<?php echo $success_msg ?>"
    });
    <?php
            }    
            ?>
})
</script>