<?php
include('config.php');
include('session.php');

// Check if form submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if file upload field exists and is not empty
    if (isset($_FILES["upload_image"]) && !empty($_FILES["upload_image"]["name"])) {
        // Get form data
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

        // Handle file upload
        $upload_dir = "upload/";
        $uploaded_file = $upload_dir . basename($_FILES["upload_image"]["name"]);
        $upload_ok = 1;
        $image_file_type = strtolower(pathinfo($uploaded_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["upload_image"]["tmp_name"]);
        if($check === false) {
            echo "File is not an image.";
            $upload_ok = 0;
        }

        // Check file size
        if ($_FILES["upload_image"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $upload_ok = 0;
        }

        // Allow certain file formats
        if($image_file_type != "jpg" && $image_file_type != "png" && $image_file_type != "jpeg" && $image_file_type != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $upload_ok = 0;
        }

        // Upload file if everything is ok
        if ($upload_ok == 1) {
            if (move_uploaded_file($_FILES["upload_image"]["tmp_name"], $uploaded_file)) {
                // Insert data into the database
                $sql = "INSERT INTO payment_services (bill_type, customer_id, firstname, middlename, lastname, block, lot, phase, amount, mode_of_payment, uploaded_image) 
                        VALUES ('$bill_type', '$customer_id','$full_name', '$middle_name', '$surname', '$block', '$lot', '$phase', '$amount', '$mode_of_payment', '$uploaded_file')";

                if (mysqli_query($conn, $sql)) {
                    // Display the confirmation message inside a box
                    echo '<div class="container mt-5">
                              <div class="row justify-content-center">
                                  <div class="col-md-6">
                                      <div class="alert alert-success" role="alert">
                                          Thank you for your payment, ' . $full_name . ' ' . $middle_name . ' ' . $surname . '! Your payment of ₱ ' . $amount . ' has been successfully processed via ' . $mode_of_payment . '.
                                      </div>
                                  </div>
                              </div>
                            </div>';
                } else {
                    echo "Error: " . mysqli_error($conn); // Display MySQL error message
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        echo "No file uploaded.";
    }
}

mysqli_close($conn);
?>
