<?php include('config.php'); include('session.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Form</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Payment Form</h5>
                    </div>
                    <div class="card-body">
                        <?php
                        if ($_SERVER["REQUEST_METHOD"] === "POST") {
                            if (isset($_FILES["upload_image"]) && !empty($_FILES["upload_image"]["name"])) {
                                $bill_type = isset($_POST['bill_type']) ? $_POST['bill_type'] : '';
                                $customer_id = isset($_POST['customer_id']) ? $_POST['customer_id'] : '';
                                $full_name = isset($_POST['firstname']) ? $_POST['firstname'] : '';
                                $middle_name = isset($_POST['middlename']) ? $_POST['middlename'] : '';
                                $surname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
                                $block = isset($_POST['block']) ? $_POST['block'] : '';
                                $lot = isset($_POST['lot']) ? $_POST['lot'] : '';
                                $phase = isset($_POST['phase']) ? $_POST['phase'] : '';
                                $amount = isset($_POST['amount']) ? $_POST['amount'] : '';
                                $mode_of_payment = isset($_POST['mode_of_payment']) ? $_POST['mode_of_payment'] : '';

                                if ($bill_type === 'installation') {
                                    $amount = '1000';
                                }

                                $upload_dir = "upload/";
                                $uploaded_file = $upload_dir . basename($_FILES["upload_image"]["name"]);
                                $upload_ok = 1;
                                $image_file_type = strtolower(pathinfo($uploaded_file, PATHINFO_EXTENSION));

                                $check = getimagesize($_FILES["upload_image"]["tmp_name"]);
                                if ($check === false) {
                                    echo "<div class='alert alert-danger'>File is not an image.</div>";
                                    $upload_ok = 0;
                                }

                                if ($_FILES["upload_image"]["size"] > 500000) {
                                    echo "<div class='alert alert-danger'>Sorry, your file is too large.</div>";
                                    $upload_ok = 0;
                                }

                                if ($image_file_type != "jpg" && $image_file_type != "png" && $image_file_type != "jpeg" && $image_file_type != "gif") {
                                    echo "<div class='alert alert-danger'>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</div>";
                                    $upload_ok = 0;
                                }

                                if ($upload_ok == 1) {
                                    if (move_uploaded_file($_FILES["upload_image"]["tmp_name"], $uploaded_file)) {
                                        $sql = "INSERT INTO payment_services (bill_type, customer_id, firstname, middlename, lastname, block, lot, phase, amount, mode_of_payment, uploaded_image) VALUES ('$bill_type', '$customer_id','$full_name', '$middle_name', '$surname', '$block', '$lot', '$phase', '$amount', '$mode_of_payment', '$uploaded_file')";
                                        if (mysqli_query($conn, $sql)) {
                                            echo '<div class="alert alert-success">Thank you for your payment, ' . $full_name . ' ' . $middle_name . ' ' . $surname . '! Your payment of ₱ ' . $amount . ' has been successfully processed via ' . $mode_of_payment . '.</div>';
                                        } else {
                                            echo "<div class='alert alert-danger'>Error: " . mysqli_error($conn) . "</div>";
                                        }
                                    } else {
                                        echo "<div class='alert alert-danger'>Sorry, there was an error uploading your file.</div>";
                                    }
                                }
                            } else {
                                echo "<div class='alert alert-danger'>No file uploaded.</div>";
                            }
                        }
                        ?>
                        <!-- Payment Form -->
                    <form method="post" enctype="multipart/form-data">
                        <!-- ... (Your existing form fields) ... -->
                        <div class="form-group">
                            <a href="user.php" class="btn btn-secondary">Home</a>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php mysqli_close($conn); ?>