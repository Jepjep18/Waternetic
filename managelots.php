<?php
	include('config.php');
	include('session.php');
	
	$result=$conn->query("SELECT * FROM user WHERE id='".$_SESSION['session_id']."'");
	$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Manage Lots</title>
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
