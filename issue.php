<?php
include('config.php');
include('session.php');

$result = $conn->query("SELECT * FROM report_issue");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Example</title>
    <link href="image/finallogo.png" rel="icon">

    <!-- Bootstrap CSS -->
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
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
</head>

<body>
    <div class="container">
        <h1>Report issue request</h1>
        <table class="table table-striped">
    <thead>
        <tr>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>
            <th>Block</th>
            <th>Lot</th>
            <th>Phase</th>
            <th>Message</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Modify your SQL query to fetch records with status 0
        $sql = "SELECT * FROM report_issue WHERE status = 0";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_array($result)) {
            $button_label = "Approve"; // We only display records with status 0, so no need to check status here
            $message = isset($row['message']) ? $row['message'] : 'No message available';

            echo "<tr>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['middleName'] . "</td>";
            echo "<td>" . $row['lastName'] . "</td>";
            echo "<td>" . $row['block'] . "</td>";
            echo "<td>" . $row['lot'] . "</td>";
            echo "<td>" . $row['phase'] . "</td>";
            echo "<td>$message</td>";
            echo "<td><a href='update1.php?id=" . $row['id'] . "'><button class='btn btn-primary'>" . $button_label . "</button></a></td>";
            echo "<td><a href='deleteuser1.php?id=" . $row['id'] . "'><button class='btn btn-danger'>Decline</button></a></td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>
