<?php
include('config.php');
include('session.php');

// Check if ID is provided in the URL
if(isset($_GET['id'])) {
    // Sanitize the ID to prevent SQL injection
    $id = intval($_GET['id']);

    // Prepare and execute SQL query to fetch data from water_consumption table
    $stmt = $conn->prepare("SELECT * FROM water_consumption WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch data
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Calculate total water consumption
        $presentReading = $row['current_reading'];
        $previousReading = $row['previous_reading'];
        $consumption = $presentReading - $previousReading;
        $rate = 0;

        if ($consumption <= 5) {
            $rate = 108.50;
        } elseif ($consumption <= 10) {
            $rate = 21.70;
        } elseif ($consumption <= 20) {
            $rate = 23.90;
        } elseif ($consumption <= 30) {
            $rate = 26.00;
        } elseif ($consumption <= 40) {
            $rate = 28.20;
        } else {
            $rate = 30.40;
        }

        $totalDue = $consumption * $rate;
    } else {
        // No data found for the provided ID
        $row = null;
        $totalDue = 0;
    }

    // Close statement
    $stmt->close();
} else {
    // No ID provided in the URL
    $row = null;
    $totalDue = 0;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Your head content here -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <title>Billing Statement</title>
    <link href="image/finallogo.png" rel="icon">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f8f9fc; /* Optional background color */
        }

        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .name {
            text-align: justify;
        }
    </style>
</head>
<body>
<div class="container">
    <?php if($row): ?>
        <h1>LS Properties Inc</h1>
        <p>Don Lorenzo Homes Phase 2, Upper Piedad Toril, Davao City</p>
        <hr>
        <!-- Display data from water_consumption table -->
        <h2 class="name">Name: <?php echo htmlspecialchars($row['firstname']) . ' ' . htmlspecialchars($row['middlename']) . ' ' . htmlspecialchars($row['lastname']); ?></h2>
        <h2 class="name">Address: Block <?php echo htmlspecialchars($row['block']) . '  Lot  ' . htmlspecialchars($row['lot']) . ' Phase  ' . htmlspecialchars($row['phase']); ?></h2>
        <hr>
        <h2>STATEMENT OF ACCOUNT</h2>
        <hr>
        <p class="name">Present Reading Date: <?php echo date('Y-m-d'); ?></p>
        <p class="name">Previous Reading Date: <?php echo date('Y-m-d'); ?></p>
        <p class="name">Delivery Date: <?php echo date('Y-m-d'); ?></p>
        <hr>
        <!-- Display present and previous reading -->
        <p>Present Reading: <?php echo isset($presentReading) ? htmlspecialchars($presentReading) : 'N/A'; ?></p>
        <p>Previous Reading: <?php echo isset($previousReading) ? htmlspecialchars($previousReading) : 'N/A'; ?></p>
        <!-- Display calculated total water consumption and total amount due -->
        <p>Actual Consumption: <?php echo isset($consumption) ? htmlspecialchars($consumption) : 'N/A'; ?></p>
        <p>Total Amount Due: Php <?php echo isset($totalDue) ? number_format($totalDue, 2) : 'N/A'; ?></p>
        <button onclick="window.print()">Print</button>
    <?php else: ?>
        <p>No data found for the provided ID.</p>
    <?php endif; ?>
</div>

</body>
</html>
