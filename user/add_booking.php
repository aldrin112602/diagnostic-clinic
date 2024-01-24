<?php 
    require_once '../config.php';
    require_once '../global.php';

    if(isset($_SESSION['role'])) {
        if(!$_SESSION['role'] == 'user') {
            header('location: ../admin');
        }
    } else {
        header('location: ../index.php');
    }

    $sql = "SELECT * FROM accounts WHERE username = '{$_SESSION['username']}' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $profile = !empty($row['profile']) ? $row['profile'] : 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Circle-icons-profile.svg/1200px-Circle-icons-profile.svg.png';
    $username = $row['username'] ?? null;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Booking - DIAGNOSTIC CLINIC</title>
    <link rel="stylesheet" href="../src/bootstrap.min.css" />
    <!-- Favicon -->
    <link rel="icon" href="../img/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon" />

    <!-- For mobile devices -->
    <link rel="apple-touch-icon" sizes="180x180" href="images/logo.png" />
    <meta name="msapplication-TileImage" content="images/logo.png" />
    <meta name="msapplication-TileColor" content="#ffffff" />

    <!-- Poppins font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />

    <!-- google icons -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="../assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="../assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/flag-icon-css/flag-icon.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../src/sweetalert2/sweetalert2.all.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- custom styles -->
    <style>
    * {
        font-family: "Poppins", sans-serif;
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        transition: all 0.5s;
    }

    .nav-left-sidebar,
    .dashboard-wrapper {
        background-repeat: no-repeat;
        background-size: 100% 100%;
        background-image: linear-gradient(45deg, #1B4242, #9EC8B9);
    }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div>
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar bg-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">HOME</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-item text-center">
                                <img src="../images/logo.png" alt="DIAGNOSTIC CLINIC logo" class="img-fluid"
                                    width="200px">
                            </li>
                            <li class="nav-item text-center my-4">
                                <img src="<?php echo $profile ?>" alt="Profile avatar" class="img-fluid rounded-circle"
                                    width="100px"><br>
                                <h3 class="text-white py-2"><?php echo $username ?></h3>
                            </li>
                            <li class="nav-item my-1">
                                <a href="./index.php"
                                    class="text-center text-white d-flex align-items-center justify-content-start gap-2 ml-4 fs-6">
                                    <span class="material-symbols-outlined">home</span>
                                    Home
                                </a>
                            </li>
                            <li class="nav-item my-1 current-page">
                                <a href="./add_booking.php"
                                    class="text-center text-white d-flex align-items-center justify-content-start gap-2 ml-4 fs-6">
                                    <span class="material-symbols-outlined">add</span>
                                    Add Booking
                                </a>
                            </li>
                            <li class="nav-item my-1">
                                <a href="./notifications.php"
                                    class="text-center text-white d-flex align-items-center justify-content-start gap-2 ml-4 fs-6">
                                    <span class="material-symbols-outlined">notifications</span>
                                    Notifications
                                </a>
                            </li>
                            <li class="nav-item my-1">
                                <a href="setting.php"
                                    class="text-center text-white d-flex align-items-center justify-content-start gap-2 ml-4 fs-6">
                                    <span class="material-symbols-outlined">settings</span>
                                    Settings
                                </a>
                            </li>
                            <li class="nav-item my-1">
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#bugReport"
                                    class="text-center text-white d-flex align-items-center justify-content-start gap-2 ml-4 fs-6">
                                    <span class="material-symbols-outlined">bug_report</span>
                                    Bug report
                                </a>
                            </li>
                            <li class="nav-item mt-3">
                                <?php  require_once './logout_confirmation.php'; ?>
                                <a href="#" onclick="logoutConfirmation()"
                                    class="text-center text-white d-flex align-items-center justify-content-start gap-2 ml-4 fs-6">
                                    <span class="material-symbols-outlined">logout</span>
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <?php 
                        require_once('../bug_report.php');
                        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['bugTitle'])) {
                            $bugTitle = trim($_POST['bugTitle']);
                            $bugDescription = trim($_POST['bugDescription']);
                            $expectedOutcome = trim($_POST['expectedOutcome']);
                            $actualOutcome = trim($_POST['actualOutcome']);
                            $email = 'caballeroaldrin02@gmail.com';

                            $body = '
                            <!DOCTYPE html>
                            <html>
                                <head>
                                    <title>Bug reported</title>
                                </head>
                                <body>
                                    <p>Dear ' . $email . ',</p>
                                    <p>A bug has been reported with the following details:</p>
                                    <p><b>Title:</b> ' . $bugTitle . '</p>
                                    <p><b>Description:</b> ' . $bugDescription . '</p>
                                    <p><b>Expected Outcome:</b> ' . $expectedOutcome . '</p>
                                    <p><b>Actual Outcome:</b> ' . $actualOutcome . '</p>
                                    <p>If you have any additional information or if further clarification is needed, please respond to this email.</p>
                                    <p>Thank you for your attention to this matter.</p>
                                    <p>Sincerely,<br>Your Bug Reporting System</p>
                                </body>
                            </html>';
                            if(send_mail($email, $body)) {
                                ?>
                    <script>
                    $(document).ready(function() {
                        Swal.fire({
                            title: "Success!",
                            text: "Bug reported successfully",
                            icon: "success"
                        });
                    })
                    </script>
                    <?php
                                        } else {
                                            ?>
                    <script>
                    $(document).ready(function() {
                        Swal.fire({
                            title: "Error!",
                            text: "Something went wrong, please try again",
                            icon: "error"
                        });
                    })
                    </script>
                    <?php
                                        }

                            }
                            ?>
                    <form action="#" method="post" class="modal fade" id="bugReport" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5 d-flex align-items-center justify-content-between gap-3"
                                        id="staticBackdropLabel">Bug report <span
                                            class="material-symbols-outlined fs-3">bug_report</span></h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Please let us know if you encountered a problem while using the app. Your
                                        feedback helps improve the System.</p>
                                    <small for="bugTitle" class="form-label">Bug Title:</small>
                                    <input type="text" id="bugTitle" name="bugTitle" class="form-control rounded"
                                        required>
                                    <br>
                                    <small for="bugDescription" class="form-label">Bug Description:</small>
                                    <textarea id="bugDescription" name="bugDescription" class="form-control rounded"
                                        required></textarea>
                                    <br>
                                    <small for="expectedOutcome" class="form-label">Expected Outcome:</small>
                                    <textarea id="expectedOutcome" name="expectedOutcome" class="form-control rounded"
                                        required></textarea>
                                    <br>
                                    <small for="actualOutcome" class="form-label">Actual Outcome:</small>
                                    <textarea id="actualOutcome" name="actualOutcome" class="form-control rounded"
                                        required></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">

                                <h2
                                    class="pageheader-title font-weight-bold d-flex justify-content-between align-items-center container-fluid">
                                    Booking
                                    <button class="btn btn-sm btn-dark" data-bs-toggle="modal"
                                        data-bs-target="#myBooking">My Booking</button>
                                </h2>

                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="" class="breadcrumb-link">Booking</a>
                                            </li>
                                            <li class="breadcrumb-item active" aria-current="page">index</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <?php require_once './handle_booking.php' ?>
                    <div class="modal fade" id="myBooking" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">My booking</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Date</th>
                                                <th>Services</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>
                                                    <td>{$row['id']}</td>
                                                    <td>{$row['date']}</td>
                                                    <td>{$row['services']}</td>
                                                    <td>{$row['status']}</td>
                                                    <td>";

                                                if ($row['status'] == 'Pending') {
                                                    echo '<button class="btn btn-sm btn-light shadow" onclick="confirmCancellation('. $row['id'] .')">Cancel</button>';
                                                } else {
                                                    echo '<button class="btn btn-sm btn-danger"
                                                    onclick="confirmCancellation('. $row['id'] .', false)">Remove</button>';
                                                }

                                                echo "</td></tr>";

                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
                    function confirmCancellation(reservationId, toCancel = true) {
                        Swal.fire({
                            title: 'Are you sure?',
                            text: 'You won\'t be able to revert this!',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, cancel it!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                handleCancellationAndDeletion(reservationId, toCancel);
                            }
                        });
                    }

                    function handleCancellationAndDeletion(reservationId, toCancel) {
                        const formData = new FormData();
                        formData.append('reservationId', reservationId);
                        fetch((toCancel ? './cancel_reservation.php' : './remove_reservation.php'), {
                                method: 'POST',
                                body: formData,
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    if (toCancel) {
                                        Swal.fire('Cancelled!', 'Your reservation has been cancelled.', 'success')
                                            .then(() => (location.href = './add_booking.php'));
                                        return;
                                    }

                                    Swal.fire('Deleted!', 'Your reservation has been deleted.', 'success')
                                        .then(() => (location.href = './add_booking.php'));

                                } else {
                                    if (toCancel) {
                                        Swal.fire('Error!', 'Failed to cancel reservation.', 'error');
                                        return;
                                    }
                                    Swal.fire('Error!', 'Failed to delete reservation.', 'error');

                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                Swal.fire('Error!', 'An error occurred while processing your request.', 'error');
                            });
                    }
                    </script>



                    <form action="" method="POST" class="col-12 px-5 col-md-8 mx-auto">
                        <h2 class="text-light fw-bold">BOOKING</h2>
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" name="date" required>
                        </div>

                        <div class="form-group">
                            <label for="services">Services</label>
                            <select class="form-control" name="services" required>
                                <option value="Select services">Select Services</option>
                                <option value="OBY">OBY</option>
                                <option value="Laboratory">Laboratory</option>
                                <option value="Pedia">Pedia</option>
                                <option value="Swab">Swab</option>
                                <option value="Vaccine">vaccine</option>
                                <option value="Ultrasound">Ultrasound</option>
                                <option value="Check">Check</option>
                            </select>
                        </div>
                        <div class="my-2">
                            <button class="btn btn-primary btn-sm" type="submit">Book now</button>
                        </div>
                    </form>





                    <!-- ============================================================== -->
                    <!-- end wrapper  -->
                    <!-- ============================================================== -->
                </div>
                <!-- ============================================================== -->
                <!-- end main wrapper  -->
                <!-- ============================================================== -->
                <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
                <!-- bootstap bundle js -->
                <!-- <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script> -->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
                    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
                    crossorigin="anonymous">
                </script>
                <!-- slimscroll js -->
                <script src="../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
                <!-- main js -->
                <script src="../assets/libs/js/main-js.js"></script>
                <!-- chart chartist js -->
                <script src="../assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
                <!-- sparkline js -->
                <script src="../assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
                <!-- morris js -->
                <script src="../assets/vendor/charts/morris-bundle/raphael.min.js"></script>
                <script src="../assets/vendor/charts/morris-bundle/morris.js"></script>
                <!-- chart c3 js -->
                <script src="../assets/vendor/charts/c3charts/c3.min.js"></script>
                <script src="../assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
                <script src="../assets/vendor/charts/c3charts/C3chartjs.js"></script>
                <script src="../assets/libs/js/dashboard.js"></script>
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
</body>

</html>