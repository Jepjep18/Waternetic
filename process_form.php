<?php
include('config.php');
include('session.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $block = $_POST['block'];
    $lot = $_POST['lot'];
    $phase = $_POST['phase'];
    $present_reading = $_POST['present_reading'];
    $previous_reading = $_POST['previous_reading'];
    $present_reading_date = $_POST['present_reading_date'];
    $previous_reading_date = $_POST['previous_reading_date'];
    $delivery_date = $_POST['delivery_date'];
    $actual_consumption = $_POST['actual_consumption'];
    $total_amount_due = $_POST['total_amount_due'];

    // Insert data into statement_of_account table
    $stmt = $conn->prepare("INSERT INTO statement_of_account (firstname, middlename, lastname, block, lot, phase, present_reading, previous_reading, present_reading_date, previous_reading_date, delivery_date, actual_consumption, total_amount_due) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssddssddd", $firstname, $middlename, $lastname, $block, $lot, $phase, $present_reading, $previous_reading, $present_reading_date, $previous_reading_date, $delivery_date, $actual_consumption, $total_amount_due);

    if ($stmt->execute()) {
        // If data insertion is successful, echo a JavaScript message
        echo "<script>alert('Data inserted successfully'); window.location='reader.php';</script>";
    } else {
        echo "Error submitting form: " . $stmt->error;
    }
    
    // Close statement
    $stmt->close();
    } else {
        echo "Error: Form submission method not allowed.";
    }
    

?>
