<?php
include('config.php');
session_start(); // Start the session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $userID = $_SESSION['session_id'];
    $previous_reading = $_POST['previous_reading'];
    $present_reading = $_POST['present_reading'];
    $previous_reading_date = $_POST['previous_reading_date'];
    $present_reading_date = $_POST['present_reading_date'];
    $total_water_consumption = $_POST['totalWaterConsumption'];
    $calculation_date = date('Y-m-d H:i:s');

    // Insert data into calculator_history table
    $stmt = $conn->prepare("INSERT INTO calculator_history (user_id, previous_reading, present_reading, previous_reading_date, present_reading_date, total_water_consumption, calculation_date) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iiissss", $userID, $previous_reading, $present_reading, $previous_reading_date, $present_reading_date, $total_water_consumption, $calculation_date);

    if ($stmt->execute()) {
        echo "Calculation saved successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
