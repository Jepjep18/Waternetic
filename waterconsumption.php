<?php

include('config.php');

// Retrieve the form data
$name = $_POST['name'];
$lastName = $_POST['lastName'];
$middleName = $_POST['middleName'];
$block = $_POST['block'];
$lot = $_POST['lot'];
$phase = $_POST['phase'];
$previousReading = $_POST['previousReading'];
$currentReading = $_POST['currentReading'];
$totalBill = $_POST['totalBill'];

// Prepare the SQL statement to insert data into the 'billing' table
$sql = "INSERT INTO billing (name, lastName, middleName, block, lot, phase, previousReading, currentReading, totalBill)
        VALUES ('$name', '$lastName', '$middleName', '$block', '$lot', '$phase', $previousReading, $currentReading, $totalBill)";

// Execute the SQL statement
if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
