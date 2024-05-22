<?php
	include('config.php');
	include('session.php');
	
	$result=$conn->query("SELECT * FROM user WHERE id='".$_SESSION['session_id']."'");
	$row = mysqli_fetch_array($result);

     // Query to select users with usertype = 'user' and fetch required columns
     $query = "SELECT firstname, middlename, lastname, block, lot, phase FROM user WHERE usertype = 'user'";
     $result = mysqli_query($conn, $query);
?>
<head>
    <meta charset="utf-8">
    <title>Residents</title>
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

<div class="container">
        <!-- Navigation -->
        <!-- Content -->
        <div class="container mt-5">
            <h1 class="mb-4">View Residents</h1>
            <!-- Display user data in a table -->
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Last Name</th>
                            <th>Block</th>
                            <th>Lot</th>
                            <th>Phase</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Check if any users are found
                        if (mysqli_num_rows($result) > 0) {
                            // Loop through each user and display their data
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $row['firstname'] . "</td>";
                                echo "<td>" . $row['middlename'] . "</td>";
                                echo "<td>" . $row['lastname'] . "</td>";
                                echo "<td>" . $row['block'] . "</td>";
                                echo "<td>" . $row['lot'] . "</td>";
                                echo "<td>" . $row['phase'] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            // If no users are found, display a message
                            echo "<tr><td colspan='6'>No residents found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
