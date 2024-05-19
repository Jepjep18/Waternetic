<?php
	include('config.php');
	include('session.php');
	
	$result=$conn->query("SELECT * FROM user WHERE id='".$_SESSION['session_id']."'");
	$row = mysqli_fetch_array($result);
?>
<head>
    <meta charset="utf-8">
    <title>Requests</title>
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
            <h1 class="mb-4">Requests</h1>
            <p>This page allows you to handle maintenance requests or complaints submitted by residents.</p>
            <!-- Add any specific content related to handling requests -->
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
