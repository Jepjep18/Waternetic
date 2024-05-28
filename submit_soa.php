<?php
include('config.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $user_id = intval($_POST['user_id']);
    $present_reading = floatval($_POST['present_reading']);
    $previous_reading = floatval($_POST['previous_reading']);
    $consumption = floatval($_POST['consumption']);
    $rate = floatval($_POST['rate']);
    $total_due = floatval($_POST['total_due']);
    $statement_date = $_POST['statement_date'];

    // Prepare and execute SQL query to insert data into statement_of_account table
    $stmt = $conn->prepare("
        INSERT INTO statement_of_account (user_id, present_reading, previous_reading, consumption, rate, total_due, statement_date)
        VALUES (?, ?, ?, ?, ?, ?, ?)
    ");
    $stmt->bind_param("iddidss", $user_id, $present_reading, $previous_reading, $consumption, $rate, $total_due, $statement_date);

    if ($stmt->execute()) {
        // Redirect to cashier.php after successful submission
        header("Location: cashier.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method.";
}
?>
