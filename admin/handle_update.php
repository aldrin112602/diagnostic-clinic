<?php
require_once '../config.php';
require_once '../global.php';
require_once '../send_mail.php';


$err_msg = $success_msg = null;


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $post = validate_post_data($_POST);

    $date = $post['date'];
    $updated_date = $post['updated_date'];

    $status = $post['status'];
    $username = $post['username'];

    $email = getRows("username = '$username'", "accounts")[0]['email'];

    if($date != $updated_date) {
        // send email
        $body = '
            <!DOCTYPE html>
            <html>
                <head>
                    <title></title>
                </head>
                <body>
                    <p>Dear '. $email .',</p>
                    <p>We hope this message finds you well. We wanted to inform you that there has been a change in your booking due to unforeseen circumstances. Unfortunately, the doctor is not available, or an unexpected event has occurred.</p>
                    <p>Your booking has been rescheduled, and the new date is <b>'. $updated_date .'</b>.</p>
                    <p>We apologize for any inconvenience this may cause and appreciate your understanding. If you have any questions or concerns, please feel free to contact us.</p>
                    <p>Thank you for your cooperation.</p><br>
                    <p>From Diagnostic Clinic</p>
                </body>
            </html>';

        $subject = "Booking has been rescheduled";

        if(send_mail_2($email, $body, $subject)) {
            $queryUpdate = "UPDATE booking SET date = '$updated_date', status = '$status' WHERE id={$_GET['id']}";   
            $pushNotification = "INSERT INTO notifications (username, description) VALUES 
            ('$username', 'An admin updated your booking status to $status.'),
            ('$username', 'An admin rescheduled your booking to $updated_date from $date.')";

            if ($conn->query($queryUpdate) && $conn->query($pushNotification)) {
                $success_msg = "Booking successfully updated!";
            } else {
                $err_msg = "Error updating booking: " . $conn->error;
            }

        } else {
            $err_msg = "Error updating booking: " . $conn->error;
        }
    } else {
        $queryUpdate = "UPDATE booking SET date = '$updated_date', status = '$status' WHERE id={$_GET['id']}";   
        $pushNotification = "INSERT INTO notifications (username, description) VALUES ('$username', 'An admin updated your booking status to $status.')";

        if ($conn->query($queryUpdate) && $conn->query($pushNotification)) {
            $success_msg = "Booking successfully updated!";
        } else {
           $err_msg = "Error updating booking: " . $conn->error;
        }
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