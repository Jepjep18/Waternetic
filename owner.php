<?php
include('config.php');
include('session.php');

$result = $conn->query("SELECT * FROM user WHERE id='" . $_SESSION['session_id'] . "'");
$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin's Dashboard</title>
    <link href="image/finallogo.png" rel="icon">

    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">


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
            width: 30px;
            /* Adjust width as needed */
            height: auto;
            /* Keeps aspect ratio */
            margin-right: 10px;
            /* Space between logo and text */
            vertical-align: middle;
            /* Aligns image with text */
        }
    </style>
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">

                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary">
                        <img src="./assets/img/finallogo.png" alt="My Logo" class="custom-logo">
                        OWNER
                    </h3>
                </a>

                <div class="d-flex align-items-center ms-4 mb-4">

                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>

                    <div class="ms-3">
                        <h6 class="mb-0"><?php echo $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname']; ?></h6>
                        <span>Subdivision Owner</span>
                    </div>
                </div>

                <div class="navbar-nav w-100">
                    <a href="owner.php" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>

                    <a href="residents.php" class="nav-item nav-link">
                        <i class="fas fa-users me-2"></i>
                        View Residents
                    </a>

                    <a href="financial.php" class="nav-item nav-link">
                        <i class="fas fa-chart-line me-2"></i>Financials
                    </a>
                    <a href="issue.php" class="nav-item nav-link">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        Complain List
                    </a>
                    <a href="viewtransactions.php" class="nav-item nav-link">
                        <i class="fas fa-check-circle me-2"></i>
                        View Transaction
                    </a>
                </div>
            </nav>
        </div>
    </div>


    <div class="content">
        <?php include('includes/nav-admin.php'); ?>



        <div class="content">
            <div class="container-fluid">
                <h2 class="my-4">Subdivision Owner Dashboard</h2>

                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Subdivision Information</h5>
                                <p>Address: 123 Subdivision St, City, Country</p>
                                <p>Total Lots: 100</p>
                                <p>Occupied Lots: 75</p>
                                <p>Vacant Lots: 25</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Actions</h5>
                                <a href="#" class="btn btn-primary mb-2">Manage Lots</a>
                                <a href="#" class="btn btn-primary mb-2">View Residents</a>
                                <a href="#" class="btn btn-primary mb-2">Financials</a>
                                <a href="#" class="btn btn-danger">Emergency Alerts</a>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>



        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="lib/chart/chart.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/tempusdominus/js/moment.min.js"></script>
        <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
        <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
        <script src="js/main.js"></script>
</body>

</html>