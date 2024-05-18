<?php

// Define database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "waternetic";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Retrieve form data
    $name = $_POST["name"];
    $middleName = $_POST["middleName"];
    $lastName = $_POST["lastName"];
    $block = $_POST["block"];
    $lot = $_POST["lot"];
    $phase = $_POST["phase"];
    $message = $_POST["message"];
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Prepare SQL statement to insert data into report_issue table
    $sql = "INSERT INTO report_issue (name, middleName, lastName, block, lot, phase, message) VALUES (?, ?, ?, ?, ?, ?, ?)";
    
    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $name, $middleName, $lastName, $block, $lot, $phase, $message);
    
    // Execute the statement
    if ($stmt->execute()) {
        // Redirect user to user.php after successful submission
        header("Location: user.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    // Close statement and connection
    $stmt->close();
    $conn->close();
    
} else {
    // If the form is not submitted, redirect the user to the form page
    header("Location: issue_reporting_form.php");
    exit;
}

?>
