<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Lots</title>
    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        /* Add any custom styles here */
    </style>
</head>
<body>
    <div class="container">
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <!-- Brand -->
                <a class="navbar-brand" href="index.html">
                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>OWNER</h3>
                </a>

                <!-- Toggle button -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navbar links -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="managelots.php"><i class="fas fa-home me-2"></i>Manage Lots</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="residents.php"><i class="fas fa-users me-2"></i>View Residents</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="financial.php"><i class="fas fa-chart-line me-2"></i>Financials</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="request.php"><i class="fas fa-tools me-2"></i>Requests</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="documents.php"><i class="fas fa-file-alt me-2"></i>Documents</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="table.html"><i class="fa fa-table me-2"></i>Materials</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="issue.php"><i class="fas fa-exclamation-circle me-2"></i>Complain List</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Content -->
        <div class="container mt-5">
            <h1 class="mb-4">Manage Lots</h1>
            <p>Welcome to the Manage Lots page!</p>
            <p>Here, you can perform various actions related to managing lots within your subdivision:</p>
            <ul>
                <li>Add new lots</li>
                <li>Edit existing lot details</li>
                <li>Remove lots</li>
                <li>View occupancy status of lots</li>
                <!-- Add any other relevant actions or information here -->
            </ul>
            <p>Feel free to customize this page further based on your specific requirements.</p>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
