<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate user ID
    $userId = $_POST['user_id'];
    if (!empty($userId)) {
        // Sanitize input data
        $previousReading = $_POST['previous_reading'];
        $currentReading = $_POST['current_reading'];
        $previousReadingDate = $_POST['previous_reading_date'];
        $currentReadingDate = $_POST['current_reading_date'];

        // Perform any necessary validation on the input data here

        // Calculate total water consumption
        $totalConsumption = $currentReading - $previousReading;

        // Calculate total due based on consumption rate
        $rate = 0;
        if ($totalConsumption <= 5) {
            $rate = 108.50;
        } elseif ($totalConsumption <= 10) {
            $rate = 21.70;
        } elseif ($totalConsumption <= 20) {
            $rate = 23.90;
        } elseif ($totalConsumption <= 30) {
            $rate = 26.00;
        } elseif ($totalConsumption <= 40) {
            $rate = 28.20;
        } else {
            $rate = 30.40;
        }
        $totalDue = $totalConsumption * $rate;

        // Database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "waternetic";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and bind SQL statement
        $stmt = $conn->prepare("INSERT INTO water_consumptionn (user_id, previous_reading, current_reading, total_consumption, total_due, previous_reading_date, current_reading_date) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("iiiddss", $userId, $previousReading, $currentReading, $totalConsumption, $totalDue, $previousReadingDate, $currentReadingDate);

        // Execute SQL statement
        if ($stmt->execute() === TRUE) {
            // Success message
            echo "<script>alert('Water consumption data submitted successfully.'); window.location.href = 'reader.php';</script>";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close statement and connection
        $stmt->close();
        $conn->close();
    } else {
        echo "Invalid user ID.";
    }
} else {
    echo "Form submission method not allowed.";
}
?>
