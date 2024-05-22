<?php
    include('config.php');
    include('session.php');
    
    // Fetch user information
    $result = $conn->query("SELECT * FROM user WHERE id='".$_SESSION['session_id']."'");
    $row = mysqli_fetch_array($result);

    // Query to get distinct bill types for the dropdown
    $sql = "SELECT DISTINCT bill_type FROM payment_services ORDER BY bill_type";
    $bill_type_result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Generate Report</title>
    <link href="image/finallogo.png" rel="icon">

    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>
        .custom-logo {
            width: 30px; /* Adjust width as needed */
            height: auto; /* Keeps aspect ratio */
            margin-right: 10px; /* Space between logo and text */
            vertical-align: middle; /* Aligns image with text */
        }
    </style>
</head>
<body>
<?php include('includes/nav-admin.php');?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Generate Report</h5>
                </div>
                <div class="card-body">
                    <form action="pdfReport.php" method="post" target="_blank">
                        <div class="form-group">
                            <label for="bill_type">Bill Type</label>
                            <select class="form-control" name="bill_type" id="bill_type">
                                <?php
                                    // Populate bill types from the database
                                    while ($rows = mysqli_fetch_array($bill_type_result)) {
                                        echo '<option value="' . $rows["bill_type"] . '">' . $rows["bill_type"] . '</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <button type="submit" name="button" class="btn btn-primary">Generate Report</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Upload Report</h5>
                </div>
                <div class="card-body">
                    <form action="upload_report_handler.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="upload_file">Upload File</label>
                            <input type="file" class="form-control-file" name="upload_file" id="upload_file" required>
                        </div>
                        <!-- Hidden input field to store the selected bill_type -->
                        <input type="hidden" name="bill_type" id="bill_type_hidden">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="js/bootstrap.bundle.min.js"></script>

<!-- Script to set the selected bill_type value into the hidden input field -->
<script>
    document.getElementById('bill_type').addEventListener('change', function() {
        document.getElementById('bill_type_hidden').value = this.value;
    });
</script>
</body>
</html>
