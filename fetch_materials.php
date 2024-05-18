<?php
// Establish connection to your database
include('config.php'); // Include your database connection script

// Check if customer_id is provided in the request
if (isset($_GET['customer_id'])) {
    // Sanitize the input
    $customer_id = mysqli_real_escape_string($conn, $_GET['customer_id']);

    // Query to fetch materials data based on customer_id
    $sql = "SELECT * FROM materials WHERE customer_id = $customer_id";

    // Execute the query
    $result = mysqli_query($conn, $sql);

    // Fetch data as associative array
    $materialsData = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $materialsData[] = $row;
    }

    // Return materials data as JSON
    echo json_encode($materialsData);
} else {
    // Handle case where customer_id is not provided
    echo json_encode(['error' => 'Customer ID not provided']);
}
?>
