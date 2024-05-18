<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $id = $_POST["id"]; 
    $orNumber = $_POST["or_number"];
    $name = $_POST["name"];
    $middleName = $_POST["middle_name"];
    $lastName = $_POST["last_name"];
    $bill_type = $_POST["bill_type"];
    $block = $_POST["block"];
    $lot = $_POST["lot"];
    $phase = $_POST["phase"];
    $amount = $_POST["amount"];

    // Database connection parameters
    $host = "localhost"; // Replace with your actual host name
    $username = "root"; // Replace with your actual username
    $password = ""; // Replace with your actual password
    $dbname = "waternetic"; // Replace with your actual database name

    // Create a new MySQLi instance
    $conn = new mysqli($host, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE payment_services SET status='1' WHERE id ='$id'";
    $conn->query($sql);

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO OR_details (or_number, name, middle_name, last_name, bill_type, block, lot, phase, amount) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // Bind the parameters
    $stmt->bind_param("sssssssss", $orNumber, $name, $middleName, $lastName, $bill_type, $block, $lot, $phase, $amount);

    // Execute the statement
    if ($stmt->execute()) {
        header("Location: cashierlist.php");
        exit(); // Make sure to include an exit() call after setting the location header
    } else {
        echo "Error inserting record.";
    }
    

    // Close the connection
    $conn->close();
}
?>
